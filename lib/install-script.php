<?php
if(!class_exists("save_captcha_settings"))
{
	class save_captcha_settings
	{
		function insert_data($tbl, $data)
		{
			global $wpdb;
			$wpdb->insert($tbl,$data);
		}
	}
}

if(!function_exists("create_table_captcha_settings"))
{
	function create_table_captcha_settings()
	{
		global $wpdb;
		$sql = "CREATE TABLE " . captcha_bank_settings() . "(
				settings_id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				settings_key VARCHAR(200) NOT NULL,
				settings_value VARCHAR(200) NOT NULL,
				PRIMARY KEY (settings_id)
				) DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
		dbDelta($sql);

	}
}

if(!function_exists("create_licensing_table"))
{
	function create_licensing_table()
	{
		global $wpdb;
		$sql = "CREATE TABLE " . captcha_bank_licensing() . "(
				licensing_id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				version VARCHAR(10) NOT NULL,
				type VARCHAR(100) NOT NULL,
				url TEXT NOT NULL,
				api_key TEXT,
				order_id VARCHAR(100),
				PRIMARY KEY (licensing_id)
				) DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
		dbDelta($sql);
	}
}
if(!function_exists("create_table_captcha_log"))
{
	function create_table_captcha_log()
	{
		global $wpdb;
		$sql = "CREATE TABLE " . captcha_bank_log() . "(
				id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				username VARCHAR(100) NOT NULL,
				ip_address VARCHAR(20) NOT NULL,
				geo_location VARCHAR(200) NOT NULL,
				latitude VARCHAR(50) NOT NULL,
				longitude VARCHAR(50) NOT NULL,
				date_time DATETIME,
				captcha_status INTEGER(1) NOT NULL,
				block_ip INTEGER(1) NOT NULL,
				PRIMARY KEY (id)
				) DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
		dbDelta($sql);
	}
}
if(!function_exists("create_table_block_single_ip"))
{
	function create_table_block_single_ip()
	{
		global $wpdb;
		$sql = "CREATE TABLE " . captcha_bank_block_single_ip() . "(
				id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				block_ip_address VARCHAR(20) NOT NULL,
				PRIMARY KEY (id)
				) DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
		dbDelta($sql);
	}
}
if(!function_exists("create_table_block_range_ip"))
{
	function create_table_block_range_ip()
	{
		global $wpdb;
		$sql = "CREATE TABLE " . captcha_bank_block_range_ip() . "(
				id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				block_start_range VARCHAR(20) NOT NULL,
				block_end_range VARCHAR(20) NOT NULL,
				PRIMARY KEY (id)
				) DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
		dbDelta($sql);
	}
}
if(!function_exists("create_table_plugin_settings"))
{
	function create_table_plugin_settings()
	{
		global $wpdb;
		$sql = "CREATE TABLE " . captcha_bank_plugin_settings() . "(
				plugin_settings_id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				plugin_settings_key TEXT NOT NULL,
				plugin_settings_value TEXT NOT NULL,
				PRIMARY KEY (plugin_settings_id)
				) DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
		dbDelta($sql);
	}
}

global $wpdb;
require_once(ABSPATH . "wp-admin/includes/upgrade.php");
$version = get_option("captcha-bank-version-number");
if($version == "")
{
	if (count($wpdb->get_var("SHOW TABLES LIKE '" . captcha_bank_settings() . "'")) == 0)
	{
		create_table_captcha_settings();
		
		if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/settings-include.php"))
		{
			include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/settings-include.php";
		}
	}
	else
	{
		$db_captcha_settings = $wpdb->get_results
		(
			"SELECT * FROM " .  captcha_bank_settings()
		);
		
		$sql = "DROP TABLE " . captcha_bank_settings();
		$wpdb->query($sql);
		
		create_table_captcha_settings();
		
		$insert = new save_captcha_settings();
		$setting_value = array();
		$captcha_settings = array();
		
		if (count($db_captcha_settings) != 0)
		{
			$captcha_settings_keys = array();
			for($flag = 0; $flag < count($db_captcha_settings); $flag++) {
				array_push($captcha_settings_keys, $db_captcha_settings[$flag]->settings_key);
			}
		
			$index = array_search("label", $captcha_settings_keys);
			$captcha_settings["captch_title"] =$db_captcha_settings[$index]->settings_value;
		
			$index = array_search("tooltip", $captcha_settings_keys);
			$captcha_settings["captcha_tooltip"] =$db_captcha_settings[$index]->settings_value;
		
			$index = array_search("captcha_on_login_form", $captcha_settings_keys);
			$captcha_settings["captcha_for_login"] = intval($db_captcha_settings[$index]->settings_value);
				
			$index = array_search("captcha_on_register_form", $captcha_settings_keys);
			$captcha_settings["captcha_for_register"] =  intval($db_captcha_settings[$index]->settings_value);
				
			$index = array_search("captcha_on_lost_password_form", $captcha_settings_keys);
			$captcha_settings["captcha_for_reset_password"] =  intval($db_captcha_settings[$index]->settings_value);
				
			$index = array_search("captcha_on_comment_form", $captcha_settings_keys);
			$captcha_settings["captcha_for_comment"] = intval($db_captcha_settings[$index]->settings_value);
				
			$index = array_search("captcha_on_admin_comment_form", $captcha_settings_keys);
			$captcha_settings["captcha_for_admin_comment"] =  intval($db_captcha_settings[$index]->settings_value);
				
			$captcha_settings["captcha_for_contact_bank"] = "0";
				
			$captcha_settings["hide_captcha_for_reg_user"] = "0";
				
			$index = array_search("no_of_characters", $captcha_settings_keys);
			$captcha_settings["captcha_characters"] = intval($db_captcha_settings[$index]->settings_value);
		
			$index = array_search("captcha_type", $captcha_settings_keys);
			$captcha_settings["captcha_type"] =  $db_captcha_settings[$index]->settings_value;
				
			$index = array_search("image_width", $captcha_settings_keys);
			$captcha_settings["captcha_width"] = intval($db_captcha_settings[$index]->settings_value);
				
			$index = array_search("image_height", $captcha_settings_keys);
			$captcha_settings["captcha_height"] = intval($db_captcha_settings[$index]->settings_value);
				
			$index = array_search("case_sensitive", $captcha_settings_keys);
			$captcha_settings["captcha_case_sensitive"] = intval($db_captcha_settings[$index]->settings_value);
				
			$index = array_search("text_color", $captcha_settings_keys);
			$captcha_settings["captcha_text_color"] = $db_captcha_settings[$index]->settings_value;
				
			$captcha_settings["captcha_font"] = "AHGBold.ttf";
				
			$index = array_search("lines_on_image", $captcha_settings_keys);
			$captcha_settings["show_lines"] = intval($db_captcha_settings[$index]->settings_value);
				
			$index = array_search("no_of_lines", $captcha_settings_keys);
			$captcha_settings["no_of_lines"] = intval($db_captcha_settings[$index]->settings_value);
				
			$index = array_search("lines_color", $captcha_settings_keys);
			$captcha_settings["lines_color"] = $db_captcha_settings[$index]->settings_value;
				
			$index = array_search("noise", $captcha_settings_keys);
			$captcha_settings["show_noise"] =  intval($db_captcha_settings[$index]->settings_value);
				
			$index = array_search("noise_level", $captcha_settings_keys);
			$captcha_settings["noise_level"] =  intval($db_captcha_settings[$index]->settings_value);
				
			$index = array_search("noise_color", $captcha_settings_keys);
			$captcha_settings["noise_color"] = $db_captcha_settings[$index]->settings_value;
				
			$index = array_search("text_trasparency", $captcha_settings_keys);
			$captcha_settings["text_trasparency"] = intval($db_captcha_settings[$index]->settings_value);
				
			$index = array_search("trasparency_percentage", $captcha_settings_keys);
			$captcha_settings["trasparency_percentage"] =  intval($db_captcha_settings[$index]->settings_value);
				
			$index = array_search("image_signature", $captcha_settings_keys);
			$captcha_settings["show_signature"] = intval($db_captcha_settings[$index]->settings_value);
				
			$index = array_search("signature", $captcha_settings_keys);
			$captcha_settings["signature"] = $db_captcha_settings[$index]->settings_value;
				
			$index = array_search("signature_color", $captcha_settings_keys);
			$captcha_settings["signature_color"] =  $db_captcha_settings[$index]->settings_value;
				
			$index = array_search("background_image", $captcha_settings_keys);
			$captcha_settings["background_image"] = $db_captcha_settings[$index]->settings_value;
				
			$captcha_settings["font_size"] = "30";
			$captcha_settings["show_border"] = "0";
			$captcha_settings["border_size"] = "1";
			$captcha_settings["border_color"] = "#000000";
			$captcha_settings["captcha_empty_msg"] = __("Captcha Code is empty. Please enter captcha code.", captcha_bank);
			$captcha_settings["captcha_invalid_msg"] = __("The Captcha Code does not match. Please Try Again.", captcha_bank);
			$captcha_settings["text_case"] = __("random :", captcha_bank);
			$captcha_settings["auto_ip_block"] = "1";
			$captcha_settings["max_login_attempts"] = "5";
			$captcha_settings["ip_block_msg"] =__("Your IP has been blocked!", captcha_bank);
			$captcha_settings["max_login_msg"] =__("Maximum Login attempts left [maxAttempts]", captcha_bank) ;
			$captcha_settings["max_login_exceeded_msg"] = __("You have Exceeded Maximum Login Attempts.\n So, your IP has been blocked for today. \n Kindly, try again after 24 Hours.", captcha_bank);
		
			foreach ($captcha_settings as $val => $innerKey)
			{
				$setting_value["settings_key"] = $val;
				$setting_value["settings_value"] = $innerKey;
				$insert->insert_data(captcha_bank_settings(),$setting_value);
			}
		}
	}
	if (count($wpdb->get_var("SHOW TABLES LIKE '" . captcha_bank_licensing() . "'")) == 0)
	{
		create_licensing_table();
	}
	if (count($wpdb->get_var("SHOW TABLES LIKE '" . captcha_bank_log() . "'")) == 0)
	{
		create_table_captcha_log();
	}
	if (count($wpdb->get_var("SHOW TABLES LIKE '" . captcha_bank_block_single_ip() . "'")) == 0)
	{
		create_table_block_single_ip();
	}
	if (count($wpdb->get_var("SHOW TABLES LIKE '" . captcha_bank_block_range_ip() . "'")) == 0)
	{
		create_table_block_range_ip();
	}
	if (count($wpdb->get_var("SHOW TABLES LIKE '" . captcha_bank_plugin_settings() . "'")) == 0)
	{
		create_table_plugin_settings();
		$insert_plugin_settings = new save_captcha_settings();
		$plugin_setting_value = array();
		$plugin_settings = array();
		$plugin_settings["show_captcha_plugin_menu_admin"] = "1";
		$plugin_settings["show_captcha_plugin_menu_editor"] = "1";
		$plugin_settings["show_captcha_plugin_menu_author"] = "1";
		$plugin_settings["show_captcha_plugin_menu_contributor"] = "0";
		$plugin_settings["show_captcha_plugin_menu_subscriber"] = "0";
		$plugin_settings["captcha_menu_top_bar"] = "1";
		
		foreach ($plugin_settings as $val => $innerKey)
		{
			$plugin_setting_value["plugin_settings_key"] = $val;
			$plugin_setting_value["plugin_settings_value"] = $innerKey;
			$insert_plugin_settings->insert_data(captcha_bank_plugin_settings(),$plugin_setting_value);
		}
	}
}
update_option("captcha-bank-version-number","2.0.2");
 ?>