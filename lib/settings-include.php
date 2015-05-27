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
$insert = new save_captcha_settings();
$setting_value = array();
$captcha_settings = array();
$captcha_settings["captch_title"] = __("Captcha", captcha_bank);"Captcha";
$captcha_settings["captcha_tooltip"] = __("This is your Captcha tooltip", captcha_bank);"";
$captcha_settings["captcha_for_login"] = "1";
$captcha_settings["captcha_for_register"] = "0";
$captcha_settings["captcha_for_reset_password"] = "0";
$captcha_settings["captcha_for_comment"] = "0";
$captcha_settings["captcha_for_admin_comment"] = "0";
$captcha_settings["captcha_for_contact_bank"] = "0";
$captcha_settings["hide_captcha_for_reg_user"] = "0";
$captcha_settings["captcha_characters"] = "4";
$captcha_settings["captcha_type"] = "alphabets";
$captcha_settings["captcha_width"] = "215";
$captcha_settings["captcha_height"] = "80";
$captcha_settings["captcha_case_sensitive"] = "1";
$captcha_settings["captcha_text_color"] = "#000000";
$captcha_settings["captcha_font"] = "AHGBold.ttf";
$captcha_settings["show_lines"] = "0";
$captcha_settings["no_of_lines"] = "5";
$captcha_settings["lines_color"] = "#707070";
$captcha_settings["show_noise"] = "0";
$captcha_settings["noise_level"] = "500";
$captcha_settings["noise_color"] = "#707070";
$captcha_settings["text_trasparency"] = "0";
$captcha_settings["trasparency_percentage"] = "40";
$captcha_settings["show_signature"] = "0";
$captcha_settings["signature"] = __("Captcha-Bank", captcha_bank);
$captcha_settings["signature_color"] = "#000000";
$captcha_settings["background_image"] = "bg4.jpg";
$captcha_settings["font_size"] = "30";
$captcha_settings["show_border"] = "0";
$captcha_settings["border_size"] = "1";
$captcha_settings["border_color"] = "#000000";
$captcha_settings["captcha_empty_msg"] =  __("Captcha Code is empty. Please enter captcha code.", captcha_bank);
$captcha_settings["captcha_invalid_msg"] = __("The Captcha Code does not match. Please Try Again.", captcha_bank);
$captcha_settings["text_case"] = __("random", captcha_bank);
$captcha_settings["auto_ip_block"] = "1";
$captcha_settings["max_login_attempts"] = "5";
$captcha_settings["ip_block_msg"] = __("Your IP has been blocked!", captcha_bank);
$captcha_settings["max_login_msg"] = __("Maximum Login attempts left [maxAttempts]", captcha_bank);
$captcha_settings["max_login_exceeded_msg"] = __("You have Exceeded Maximum Login Attempts.\nSo, your IP has been blocked for today. \nKindly, try again after 24 Hours.", captcha_bank);
foreach ($captcha_settings as $val => $innerKey)
{
	$setting_value["settings_key"] = $val;
	$setting_value["settings_value"] = $innerKey;
	$insert->insert_data(captcha_bank_settings(),$setting_value);
}
?>