<?php
//--------------------------------------------------------------------------------------------------------------//
// CODE FOR CREATING MENUS
//---------------------------------------------------------------------------------------------------------------//
if (!is_user_logged_in())
{
	return;
}
else
{
	add_menu_page("Captcha Bank","WP Captcha Bank", "read", "captcha_bank", "", plugins_url("/assets/images/icon.png" , dirname(__FILE__)));
	add_submenu_page("captcha_bank", "Settings", __("Captcha Settings", captcha_bank), "read", "captcha_bank", "captcha_bank");
	add_submenu_page("captcha_bank", "Plugin Updates", __("Plugin Updates", captcha_bank), "read", "wpcb_plugin_updates", "wpcb_plugin_updates");
	add_submenu_page("captcha_bank", "Login Logs", __("Login Logs", captcha_bank), "read", "wpcb_login_logs", "wpcb_login_logs");
	add_submenu_page("captcha_bank", "Plugin Settings", __("Plugin Settings", captcha_bank), "read", "wpcb_plugin_settings", "wpcb_plugin_settings");
	add_submenu_page("captcha_bank", "System Status", __("System Status", captcha_bank), "read", "wpcb_system_status", "wpcb_system_status");
	add_submenu_page("captcha_bank", "Recommendations", __("Recommendations", captcha_bank), "read", "wpcb_recommended_plugins", "wpcb_recommended_plugins");
	add_submenu_page("captcha_bank", "Premium Editions", __("Premium Editions", captcha_bank), "read", "wpcb_purchase_premium_edition", "wpcb_purchase_premium_edition");
	add_submenu_page("captcha_bank", " Our Other Services ", __("Our Other Services", captcha_bank), "read", "wpcb_other_services", "wpcb_other_services");
	//--------------------------------------------------------------------------------------------------------------//
	// CODE FOR CREATING PAGES
	//---------------------------------------------------------------------------------------------------------------//
	
	if(!function_exists("captcha_bank"))
	{
		function captcha_bank()
		{
			global $wpdb,$current_user,$user_role_permission,$wp_version;
			if(is_super_admin())
			{
				$captcha_role = "administrator";
			}
			else
			{
				$captcha_role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$captcha_role);
				$captcha_role = $current_user->role[0];
			}
			if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/views/header.php"))
			{
				include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/views/header.php";
			}
			if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/views/settings.php"))
			{
				include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/views/settings.php";
			}
		}
	}
	if(!function_exists("wpcb_plugin_updates"))
	{
		function wpcb_plugin_updates()
		{
			global $wpdb,$current_user,$user_role_permission,$wp_version;
			if(is_super_admin())
			{
				$captcha_role = "administrator";
			}
			else
			{
				$captcha_role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$captcha_role);
				$captcha_role = $current_user->role[0];
			}
			if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/views/header.php"))
			{
				include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/views/header.php";
			}
			if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/views/automatic-plugin-update.php"))
			{
				include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/views/automatic-plugin-update.php";
			}
		}
	}
	if(!function_exists("wpcb_system_status"))
	{
		function wpcb_system_status()
		{
			global $wpdb,$current_user,$user_role_permission,$wp_version;
			if(is_super_admin())
			{
				$captcha_role = "administrator";
			}
			else
			{
				$captcha_role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$captcha_role);
				$captcha_role = $current_user->role[0];
			}
			if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/views/header.php"))
			{
				include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/views/header.php";
			}
			if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/views/system-status.php"))
			{
				include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/views/system-status.php";
			}
	
		}
	}
	if(!function_exists("wpcb_login_logs"))
	{
		function wpcb_login_logs()
		{
			global $wpdb,$current_user,$user_role_permission,$wp_version;
			if(is_super_admin())
			{
				$captcha_role = "administrator";
			}
			else
			{
				$captcha_role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$captcha_role);
				$captcha_role = $current_user->role[0];
			}
			if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/views/header.php"))
			{
				include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/views/header.php";
			}
			if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/views/login-logs.php"))
			{
				include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/views/login-logs.php";
			}
		}
	}
	if(!function_exists("wpcb_recommended_plugins"))
	{
		function wpcb_recommended_plugins()
		{
			global $wpdb,$current_user,$user_role_permission,$wp_version;
			if(is_super_admin())
			{
				$captcha_role = "administrator";
			}
			else
			{
				$captcha_role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$captcha_role);
				$captcha_role = $current_user->role[0];
			}
			if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/views/header.php"))
			{
				include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/views/header.php";
			}
			if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/views/recommended-plugins.php"))
			{
				include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/views/recommended-plugins.php";
			}
		}
	}
	if(!function_exists("wpcb_purchase_premium_edition"))
	{
		function wpcb_purchase_premium_edition()
		{
			global $wpdb,$current_user,$user_role_permission,$wp_version;
			if(is_super_admin())
			{
				$captcha_role = "administrator";
			}
			else
			{
				$captcha_role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$captcha_role);
				$captcha_role = $current_user->role[0];
			}
			if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/views/header.php"))
			{
				include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/views/header.php";
			}
			if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/views/purchase-premium-edition.php"))
			{
				include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/views/purchase-premium-edition.php";
			}
		}
	}
	if(!function_exists("wpcb_other_services"))
	{
		function wpcb_other_services()
		{
			global $wpdb,$current_user,$user_role_permission,$wp_version;
			if(is_super_admin())
			{
				$captcha_role = "administrator";
			}
			else
			{
				$captcha_role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$captcha_role);
				$captcha_role = $current_user->role[0];
			}
			if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/views/header.php"))
			{
				include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/views/header.php";
			}
			if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/views/other-services.php"))
			{
				include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/views/other-services.php";
			}
		}
	}
	if(!function_exists("wpcb_plugin_settings"))
	{
		function wpcb_plugin_settings()
		{
			global $wpdb,$current_user,$user_role_permission,$wp_version;
			if(is_super_admin())
			{
				$captcha_role = "administrator";
			}
			else
			{
				$captcha_role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$captcha_role);
				$captcha_role = $current_user->role[0];
			}
			if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/views/header.php"))
			{
				include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/views/header.php";
			}
			if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/views/plugin-settings.php"))
			{
				include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/views/plugin-settings.php";
			}
		}
	}
}

?>