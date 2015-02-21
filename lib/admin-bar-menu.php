<?php 
if (!is_user_logged_in()) 
{
	return;
}
else
{
	$wp_admin_bar->add_menu(array(
		"id" => "captcha_bank_links",
		"title" => "<img src=\"" . plugins_url("/assets/images/icon.png", dirname(__file__)) .
		"\" width=\"25\" height=\"25\" style=\"vertical-align:text-top; margin-right:5px;\" />WP Captcha Bank",
		"href" => site_url() . "/wp-admin/admin.php?page=captcha_bank",
	));
	$wp_admin_bar->add_menu(array(
		"parent" => "captcha_bank_links",
		"id" => "captcha_bank_settings_links",
		"href" => site_url() . "/wp-admin/admin.php?page=captcha_bank",
		"title" => __("Captcha Settings", captcha_bank)
	));
	$wp_admin_bar->add_menu(array(
		"parent" => "captcha_bank_links",
		"id" => "captcha_bank_updates_links",
		"href" => site_url() . "/wp-admin/admin.php?page=wpcb_plugin_updates",
		"title" => __("Plugin Updates", captcha_bank)
	));
	$wp_admin_bar->add_menu(array(
		"parent" => "captcha_bank_links",
		"id" => "captcha_bank_login_logs",
		"href" => site_url() . "/wp-admin/admin.php?page=wpcb_login_logs",
		"title" => __("Login Logs", captcha_bank)
	));
	$wp_admin_bar->add_menu(array(
		"parent" => "captcha_bank_links",
		"id" => "captcha_bank_plugin_settings",
		"href" => site_url() . "/wp-admin/admin.php?page=wpcb_plugin_settings",
		"title" => __("Plugin Settings", captcha_bank)
	));
	$wp_admin_bar->add_menu(array(
		"parent" => "captcha_bank_links",
		"id" => "captcha_bank_feedback",
		"href" => site_url() . "/wp-admin/admin.php?page=wpcb_feature_requests",
		"title" => __("Feature Requests", captcha_bank)
	));
	$wp_admin_bar->add_menu(array(
		"parent" => "captcha_bank_links",
		"id" => "captcha_bank_system_status_links",
		"href" => site_url() . "/wp-admin/admin.php?page=wpcb_system_status",
		"title" => __("System Status", captcha_bank)
	));
	$wp_admin_bar->add_menu(array(
		"parent" => "captcha_bank_links",
		"id" => "captcha_bank_recommended_plugins",
		"href" => site_url() . "/wp-admin/admin.php?page=wpcb_recommended_plugins",
		"title" => __("Recommendations", captcha_bank)
	));
	$wp_admin_bar->add_menu(array(
		"parent" => "captcha_bank_links",
		"id" => "captcha_bank_purchase_premium_edition",
		"href" => site_url() . "/wp-admin/admin.php?page=wpcb_purchase_premium_edition",
		"title" => __("Premium Editions", captcha_bank)
	));
	$wp_admin_bar->add_menu(array(
		"parent" => "captcha_bank_links",
		"id" => "captcha_bank_other_services",
		"href" => site_url() . "/wp-admin/admin.php?page=wpcb_other_services",
		"title" => __("Our Other Services", captcha_bank)
	));
}
?>