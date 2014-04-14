<?php
/*
 Plugin Name: Captcha Bank
 Plugin URI: http://wordpress.org/plugins/captcha-bank
 Description: This plugin allows you to implement security captcha form into web forms to prevent spam.
 Author: contact-banker
 Version: 1.6
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
register_uninstall_hook(__FILE__,'plugin_delete_script');
/*************************************************************************************/

if(file_exists(CAPTCHA_BK_PLUGIN_DIR. '/lib/captcha_bank_class.php'))
{
	 include_once CAPTCHA_BK_PLUGIN_DIR. '/lib/captcha_bank_class.php';
}

function plugin_install_script()
{
	
	include_once CAPTCHA_BK_PLUGIN_DIR .'/lib/install_database_script.php';
}
function plugin_delete_script()
{
	global $wpdb;
	$wpdb->query
	(
		$wpdb->prepare
		(
			"UPDATE ".$wpdb->prefix ."usermeta SET meta_value = %s WHERE meta_key = %s",
			"wp330_toolbar,wp330_saving_widgets,wp340_choose_image_from_library,wp340_customize_current_theme_link,wp350_media,wp360_revisions,wp360_locks",
			"dismissed_wp_pointers"
		)
	);
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
	add_submenu_page('captcha_bank_setting', 'Settings', __('Settings', captcha_bank), 'administrator', 'captcha_bank_setting', 'captcha_bank_setting');
	add_submenu_page('captcha_bank_setting', 'Documentation', __('Documentation', captcha_bank), 'administrator', 'captcha_bank_documentation', 'captcha_bank_documentation');
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

function captcha_bank_documentation()
{
	global $wpdb;
	include_once CAPTCHA_BK_PLUGIN_DIR .'/captcha_bank_documentation.php';
}

//--------------------------------------------------------------------------------------------------------------//
// FUNCTIONS FOR REPLACING TABLE NAMES
//--------------------------------------------------------------------------------------------------------------//

function captcha_bank_settings()
{
	global $wpdb;
	return $wpdb->prefix . 'captcha_bank_settings';
}

/*****************************************************************************************************************/
function captcha_bank_enqueue_pointer_script_style( $hook_suffix ) {
		// Assume pointer shouldn't be shown

	$enqueue_pointer_script_style = false;
 
		// Get array list of dismissed pointers for current user and convert it to array

	$dismissed_pointers = explode( ',', get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
 
		// Check if our pointer is not among dismissed ones
	if( !in_array( 'captcha_bank_pointer', $dismissed_pointers ) ) {
		$enqueue_pointer_script_style = true;

		// Add footer scripts using callback function
		add_action( 'admin_print_footer_scripts', 'captcha_bank_pointer_print_scripts' );
	}
 
		// Enqueue pointer CSS and JS files, if needed
	if( $enqueue_pointer_script_style ) {
		wp_enqueue_style( 'wp-pointer' );
		wp_enqueue_script( 'wp-pointer' );
	}
}
add_action( 'admin_enqueue_scripts', 'captcha_bank_enqueue_pointer_script_style' );
 
function captcha_bank_pointer_print_scripts() {
 
	$pointer_content  = "<h3>Captcha Bank</h3>";
	$pointer_content .= "<p>If you are using Captcha Bank for the first time, you can view this <a href=http://www.youtube.com/embed/jxq9_f7uYfM target=_blank>video</a> to setup the Plugin.</p>";
	?>

	<script type="text/javascript">
	jQuery(document).ready( function($) {
		$('#toplevel_page_captcha_bank_setting').pointer({
			content:'<?php echo $pointer_content; ?>',
			position:{
				edge:   'left', // arrow direction
				align:  'center' // vertical alignment
				},
			pointerWidth:   350,
			close:function() {
					$.post( ajaxurl, {
					pointer: 'captcha_bank_pointer', // pointer ID
					action: 'dismiss-wp-pointer'
				});
			}
		}).pointer('open');
	});
	</script>
 
<?php
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