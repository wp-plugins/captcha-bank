<?php
$captcha_plugin_settings = $wpdb->get_results
(
	"SELECT * FROM " .  captcha_bank_plugin_settings()
);
if (count($captcha_plugin_settings) != 0)
{
	$captcha_plugin_settings_keys = array();
	for ($flag = 0; $flag < count($captcha_plugin_settings); $flag++)
	{
		array_push($captcha_plugin_settings_keys, $captcha_plugin_settings[$flag]->plugin_settings_key);
	}
	$index = array_search("show_captcha_plugin_menu_admin", $captcha_plugin_settings_keys);
	$captcha_admin_role =$captcha_plugin_settings[$index]->plugin_settings_value;
	
	$index = array_search("show_captcha_plugin_menu_editor", $captcha_plugin_settings_keys);
	$captcha_editor_role =$captcha_plugin_settings[$index]->plugin_settings_value;
	
	$index = array_search("show_captcha_plugin_menu_author", $captcha_plugin_settings_keys);
	$captcha_author_role =$captcha_plugin_settings[$index]->plugin_settings_value;
	
	$index = array_search("show_captcha_plugin_menu_contributor", $captcha_plugin_settings_keys);
	$captcha_contributor_role =$captcha_plugin_settings[$index]->plugin_settings_value;	
	
	$index = array_search("show_captcha_plugin_menu_subscriber", $captcha_plugin_settings_keys);
	$captcha_subscriber_role =$captcha_plugin_settings[$index]->plugin_settings_value;
	
	$index = array_search("captcha_menu_top_bar", $captcha_plugin_settings_keys);
	$captcha_menu_top_bar =$captcha_plugin_settings[$index]->plugin_settings_value;
}
?>