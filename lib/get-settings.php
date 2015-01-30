<?php
$captcha_settings = $wpdb->get_results
(
	"SELECT * FROM " .  captcha_bank_settings()
);
if (count($captcha_settings) != 0) 
{
	$captcha_settings_keys = array();
	for ($flag = 0; $flag < count($captcha_settings); $flag++)
	{
		array_push($captcha_settings_keys, $captcha_settings[$flag]->settings_key);
	}

	$index = array_search("captch_title", $captcha_settings_keys);
	$captcha_title = $captcha_settings[$index]->settings_value;
	
	$index = array_search("captcha_tooltip", $captcha_settings_keys);
	$captcha_tooltip = $captcha_settings[$index]->settings_value;
	
	$index = array_search("captcha_for_login", $captcha_settings_keys);
	$captcha_for_login= $captcha_settings[$index]->settings_value;
	
	$index = array_search("captcha_for_register", $captcha_settings_keys);
	$captcha_for_register= $captcha_settings[$index]->settings_value;
	
	$index = array_search("captcha_for_reset_password", $captcha_settings_keys);
	$captcha_for_reset_password= $captcha_settings[$index]->settings_value;
	
	$index = array_search("captcha_for_comment", $captcha_settings_keys);
	$captcha_for_comment = $captcha_settings[$index]->settings_value;
	
	$index = array_search("captcha_for_admin_comment", $captcha_settings_keys);
	$captcha_for_admin_comment = $captcha_settings[$index]->settings_value;
	
	$index = array_search("captcha_for_contact_bank", $captcha_settings_keys);
	$captcha_for_contact_bank = $captcha_settings[$index]->settings_value;
	
	$index = array_search("hide_captcha_for_reg_user", $captcha_settings_keys);
	$hide_captcha_for_reg_user = $captcha_settings[$index]->settings_value;
	
	$index = array_search("captcha_characters", $captcha_settings_keys);
	$captcha_characters = $captcha_settings[$index]->settings_value;
	
	$index = array_search("captcha_type", $captcha_settings_keys);
	$captcha_type = $captcha_settings[$index]->settings_value;
	
	$index = array_search("captcha_width", $captcha_settings_keys);
	$captcha_width = $captcha_settings[$index]->settings_value;
	
	$index = array_search("captcha_height", $captcha_settings_keys);
	$captcha_height = $captcha_settings[$index]->settings_value;
	
	$index = array_search("captcha_case_sensitive", $captcha_settings_keys);
	$captcha_case_sensitive= $captcha_settings[$index]->settings_value;
	
	$index = array_search("captcha_text_color", $captcha_settings_keys);
	$captcha_text_color =$captcha_settings[$index]->settings_value;
	
	$index = array_search("captcha_font", $captcha_settings_keys);
	$captcha_font =$captcha_settings[$index]->settings_value;
	
	$index = array_search("show_lines", $captcha_settings_keys);
	$show_lines = $captcha_settings[$index]->settings_value;
	
	$index = array_search("no_of_lines", $captcha_settings_keys);
	$no_of_lines= $captcha_settings[$index]->settings_value;
	
	$index = array_search("lines_color", $captcha_settings_keys);
	$lines_color= $captcha_settings[$index]->settings_value;
	
	$index = array_search("show_noise", $captcha_settings_keys);
	$show_noise = $captcha_settings[$index]->settings_value;
	
	$index = array_search("noise_level", $captcha_settings_keys);
	$noise_level= $captcha_settings[$index]->settings_value;
	
	$index = array_search("noise_color", $captcha_settings_keys);
	$noise_color =$captcha_settings[$index]->settings_value;
	
	$index = array_search("text_trasparency", $captcha_settings_keys);
	$text_trasparency= $captcha_settings[$index]->settings_value;
	
	$index = array_search("trasparency_percentage", $captcha_settings_keys);
	$trasparency_percentage= $captcha_settings[$index]->settings_value;
	
	$index = array_search("show_signature", $captcha_settings_keys);
	$show_signature= $captcha_settings[$index]->settings_value;
	
	$index = array_search("signature", $captcha_settings_keys);
	$signature =$captcha_settings[$index]->settings_value;
	
	$index = array_search("signature_color", $captcha_settings_keys);
	$signature_color= $captcha_settings[$index]->settings_value;
	
	$index = array_search("background_image", $captcha_settings_keys);
	$captcha_background= $captcha_settings[$index]->settings_value;
	
	$index = array_search("font_size", $captcha_settings_keys);
	$font_size= $captcha_settings[$index]->settings_value;
	
	$index = array_search("show_border", $captcha_settings_keys);
	$show_border= $captcha_settings[$index]->settings_value;
	
	$index = array_search("border_size", $captcha_settings_keys);
	$border_size= $captcha_settings[$index]->settings_value;
	
	$index = array_search("border_color", $captcha_settings_keys);
	$border_color= $captcha_settings[$index]->settings_value;
	
	$index = array_search("captcha_empty_msg", $captcha_settings_keys);
	$captcha_empty_msg= $captcha_settings[$index]->settings_value;
	
	$index = array_search("captcha_invalid_msg", $captcha_settings_keys);
	$captcha_invalid_msg= $captcha_settings[$index]->settings_value;
	
	$index = array_search("font_size", $captcha_settings_keys);
	$captcha_font_size= $captcha_settings[$index]->settings_value;
	
	$index = array_search("text_case", $captcha_settings_keys);
	$text_case= $captcha_settings[$index]->settings_value;
	
	$index = array_search("auto_ip_block", $captcha_settings_keys);
	$auto_ip_block= $captcha_settings[$index]->settings_value;
	
	$index = array_search("max_login_attempts", $captcha_settings_keys);
	$max_login_attempts= $captcha_settings[$index]->settings_value;
	
	$index = array_search("ip_block_msg", $captcha_settings_keys);
	$ip_block_msg= $captcha_settings[$index]->settings_value;
	
	$index = array_search("max_login_msg", $captcha_settings_keys);
	$max_login_msg= $captcha_settings[$index]->settings_value;
	
	$index = array_search("max_login_exceeded_msg", $captcha_settings_keys);
	$max_login_exceeded_msg= $captcha_settings[$index]->settings_value;
}	
?>