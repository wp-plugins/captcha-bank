<?php
/*
 Plugin Name: Captcha Bank
 Plugin URI: http://wordpress.org/plugins/captcha-bank
 Description: This plugin allows you to implement security captcha form into web forms to prevent spam.
 Author: contact-banker
 Version: 1.3
 Author URI: http://wordpress.org/plugins/captcha-bank
*/
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//   D e f i n e     CONSTANTS //////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if (!defined('CAPTCHA_DEBUG_MODE'))    define('CAPTCHA_DEBUG_MODE',  false );
	if (!defined('CAPTCHA_BK_FILE'))       define('CAPTCHA_BK_FILE',  __FILE__ );
	if (!defined('CAPTCHA_CONTENT_DIR'))      define('CAPTCHA_CONTENT_DIR', ABSPATH . 'wp-content');
	if (!defined('CAPTCHA_CONTENT_URL'))      define('CAPTCHA_CONTENT_URL', site_url() . '/wp-content');
	if (!defined('CAPTCHA_PLUGIN_DIR'))       define('CAPTCHA_PLUGIN_DIR', CAPTCHA_CONTENT_DIR . '/plugins');
	if (!defined('CAPTCHA_PLUGIN_URL'))       define('CAPTCHA_PLUGIN_URL', CAPTCHA_CONTENT_URL . '/plugins');
	if (!defined('CAPTCHA_BK_PLUGIN_FILENAME'))  define('CAPTCHA_BK_PLUGIN_FILENAME',  basename( __FILE__ ) );
	if (!defined('CAPTCHA_BK_PLUGIN_DIRNAME'))   define('CAPTCHA_BK_PLUGIN_DIRNAME',  plugin_basename(dirname(__FILE__)) );
	if (!defined('CAPTCHA_BK_PLUGIN_DIR')) define('CAPTCHA_BK_PLUGIN_DIR', CAPTCHA_PLUGIN_DIR.'/'.CAPTCHA_BK_PLUGIN_DIRNAME );
	if (!defined('CAPTCHA_BK_PLUGIN_URL')) define('CAPTCHA_BK_PLUGIN_URL', site_url().'/wp-content/plugins/'.CAPTCHA_BK_PLUGIN_DIRNAME );
	if (!defined('captcha_bank')) define('captcha_bank', 'captcha_bank');
	
/*************************************************************************************/
register_activation_hook(__FILE__,'plugin_install_script');
register_deactivation_hook(__FILE__,'plugin_delete_script');
/*************************************************************************************/

if(file_exists(CAPTCHA_BK_PLUGIN_DIR. '/lib/captcha_bank_class.php'))
{
	 include_once CAPTCHA_BK_PLUGIN_DIR. '/lib/captcha_bank_class.php';
}

function plugin_install_script()
{
	exec ("find ".ABSPATH."wp-content/plugins/".plugin_basename(dirname(__FILE__))."/assets/fonts -type f -exec chmod 0755 {} +");
	include_once CAPTCHA_BK_PLUGIN_DIR .'/lib/install_database_script.php';
}
function plugin_delete_script()
{
	
}

//--------------------------------------------------------------------------------------------------------------//
// ACTION HOOK FOR CREATING MENUS
//---------------------------------------------------------------------------------------------------------------//
add_action('admin_menu', 'create_captcha_bank_menues');
add_action('init','js_calls');
add_action('admin_init','css_calls');

//--------------------------------------------------------------------------------------------------------------//
// CODE FOR CREATING MENUS
//---------------------------------------------------------------------------------------------------------------//
function create_captcha_bank_menues()
{
	global $wpdb;
	$menu = add_menu_page('Captcha Bank', __('Captcha Bank', captcha_bank), 'administrator', 'captcha_bank_setting','',CAPTCHA_BK_PLUGIN_URL . '/assets/images/icon.png');
	add_submenu_page('', 'Settings', __('Settings', captcha_bank), 'administrator', 'captcha_bank_setting', 'captcha_bank_setting');
}
//--------------------------------------------------------------------------------------------------------------//
//CODE FOR CALLING JAVASCRIPT FUNCTIONS
//--------------------------------------------------------------------------------------------------------------//
function js_calls()
{
	wp_enqueue_script('jquery');
	wp_enqueue_script('mColorPicker_small.js', CAPTCHA_BK_PLUGIN_URL .'/assets/js/colorpicker/js/mColorPicker_small.js');
	wp_enqueue_script('jquery.validate.min.js', CAPTCHA_BK_PLUGIN_URL .'/assets/js/jquery.validate.min.js');
}

//--------------------------------------------------------------------------------------------------------------//
// CODE FOR CALLING STYLE SHEETS
//--------------------------------------------------------------------------------------------------------------//
function css_calls()
{
	wp_enqueue_style('main', CAPTCHA_BK_PLUGIN_URL . '/assets/css/main.css');
	wp_enqueue_style('system-message', CAPTCHA_BK_PLUGIN_URL . '/assets/css/system-message.css');
}

//--------------------------------------------------------------------------------------------------------------//
// CODE FOR CREATING PAGES
//---------------------------------------------------------------------------------------------------------------//

function captcha_bank_setting()
{
	global $wpdb;
	include_once CAPTCHA_BK_PLUGIN_DIR .'/captcha_bank_settings.php';
}

//--------------------------------------------------------------------------------------------------------------//
// FUNCTIONS FOR REPLACING TABLE NAMES
//--------------------------------------------------------------------------------------------------------------//

function captcha_bank_settings()
{
	global $wpdb;
	return $wpdb->prefix . 'captcha_bank_settings';
}

//--------------------------------------------------------------------------------------------------------------//
// REGISTER AJAX BASED FUNCTIONS TO BE CALLED ON ACTION TYPE AS PER WORDPRESS GUIDELINES
//--------------------------------------------------------------------------------------------------------------//

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case "captcha_settings_library":
		add_action( 'admin_init', 'captcha_settings_library');
		function captcha_settings_library()
		{
			global $wpdb;
			include_once CAPTCHA_BK_PLUGIN_DIR . '/lib/captcha_settings_class.php';
		}
		break;
	}
}

if(isset($_REQUEST['sid']))
{
	add_action( 'init', 'get_captcha_settings_library');
	function get_captcha_settings_library()
	{
		global $wpdb;
		include_once CAPTCHA_BK_PLUGIN_DIR . '/captcha_bank_show.php';
		die();
	}
}
?>