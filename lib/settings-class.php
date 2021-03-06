<?php
switch($captcha_role)
{
	case "administrator":
		$user_role_permission = "manage_options";
	break;
	case "editor":
		$user_role_permission = "publish_pages";
	break;
	case "author":
		$user_role_permission = "publish_posts";
	break;
}

if (!current_user_can($user_role_permission))
{
	return;
}
else
{
	if(!class_exists("save_captcha_setting"))
	{
		class save_captcha_setting
		{
			function update_data($tbl, $data, $where)
			{
				global $wpdb;
				$wpdb->update($tbl,$data,$where);
			}
		}
	}
	
	if(isset($_REQUEST["param"]))
	{
		switch($_REQUEST["param"])
		{
			case "update_captcha_settings":
				if(wp_verify_nonce( $_REQUEST["_wpnonce"], "captcha_settings"))
				{
					$update = new save_captcha_setting();
					$setting_value = array();
					$setting_key = array();
					$captcha_settings_array = json_decode(stripcslashes(html_entity_decode($_REQUEST["captcha_settings_array"])));
					foreach ($captcha_settings_array as $val => $innerKey)
					{
						$setting_value["settings_value"] = htmlspecialchars(htmlspecialchars_decode((string)current($innerKey)));
						$setting_key["settings_key"] = key($innerKey);
						$update->update_data(captcha_bank_settings(),$setting_value,$setting_key);
					}
					die();
				}
			break;
			case "captcha_plugin_updates":
				if(wp_verify_nonce( $_REQUEST["_wpnonce"], "auto_update_captcha_plugin"))
				{
					$captcha_updates = intval($_REQUEST["captcha_updates"]);
					update_option("captcha-bank-automatic-update", $captcha_updates);
					die();
				}
			break;
		}
	}
}
?>