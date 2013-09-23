<?php
/*
 Plugin Name: Captcha Bank
 Plugin URI:
 Description:
 Author: Tech-Banker
 Version: 1.0
 Author URI:
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
	
	//Add captch to login form 
	add_action( 'login_form', 'captcha_bank_form' );
	add_filter('wp_authenticate_user','captcha_bank_login_check',10,2 );
	
	//Add captcha to register form
	add_action( 'register_form', 'captcha_bank_form' );
	add_action( 'register_post', 'captcha_bank_register_post',10,3);
	
	//Add captcha to Lostpassword form
	add_action( 'lostpassword_form', 'captcha_bank_form' );
	add_action( 'allow_password_reset', 'captcha_bank_lostpassword_post',1);
	
	//Add captcha to comment form
	add_action( 'comment_form_after_fields', 'captcha_bank_form');
	add_action('comment_form_logged_in_after', 'captcha_bank_form');
	add_action( 'pre_comment_on_post', 'captcha_bank_comment_post' );
	
	
/*************************************************************************************/
	//code to display captcha 
function captcha_bank_form()
{
?>
	<p>
		<img id="siimage" style="border: 1px solid #000; margin-right: 15px" src="<?php echo CAPTCHA_BK_PLUGIN_URL . "/captcha_bank_show.php?sid=<?php echo md5(uniqid()) ?>"?>" alt="CAPTCHA Image" align="left" />
		<a tabindex="-1" style="border-style: none;" href="#" title="Refresh Image" onclick="document.getElementById('siimage').src = '<?php echo CAPTCHA_BK_PLUGIN_URL . "/captcha_bank_show.php?sid="?>' + Math.random(); this.blur(); return false"><img src="<?php echo CAPTCHA_BK_PLUGIN_URL ."/refresh.png"?>" alt="Reload Image" height="32" width="32" onclick="this.blur()" align="bottom" border="0" /></a><br />
		<strong>Enter Code*:</strong><br />
		<input type="text" name="security_code" size="12" maxlength="16" />
	</p>
<?php
}
/*************************************************************************************/

//this function is to check captcha code in login form
function captcha_bank_login_check($user, $password)
{
	$captcha_code = @$_POST['security_code'];
	require_once dirname(__FILE__) . '/captcha_bank_image.php';
	$captchaBankImage = new captcha_bank_image();
	if ($captchaBankImage->check($captcha_code) == false) {
		$error = new WP_Error( 'captcha_wrong', 'Error, the Captcha Code does not match. Please Try Again.' );
		return $error;
	}
	return $user;
}
/*************************************************************************************/

//this function is to check captcha code in register form
function captcha_bank_register_post($user,$email,$errors)
{
	$captcha_code = @$_POST['security_code'];
	require_once dirname(__FILE__) . '/captcha_bank_image.php';
	$captchaBankImage = new captcha_bank_image();
 
	if ($captchaBankImage->check($captcha_code) == false) 
	{
		$errors->add('captcha_error', '<p><span><strong>Error</strong>: The Captcha Code does not match. Please Try Again.</span></p>');
		return $errors;
	}
}
/*************************************************************************************/

//this function to check captcha code in lostpassword form
function captcha_bank_lostpassword_post($user)
{
	$captcha_code = @$_POST['security_code'];
	require_once dirname(__FILE__) . '/captcha_bank_image.php';
	$captchaBankImage = new captcha_bank_image();
	if ($captchaBankImage->check($captcha_code) == false) {
		$user = new WP_Error( 'captcha_wrong', 'Error, the Captcha Code does not match. Please Try Again.' );
		return $user;
	}
	return TRUE;
}
/*************************************************************************************/

//This function is to check captcha code in comment form
function captcha_bank_comment_post()
{
	$captcha_code = @$_POST['security_code'];
	require_once dirname(__FILE__) . '/captcha_bank_image.php';
	$captchaBankImage = new captcha_bank_image();
	if ($captchaBankImage->check($captcha_code) == false) {
		wp_die( '<p><span><strong>Error</strong>: The Captcha Code does not match. Please Try Again.</span></p>');
	}
	else{
		return ;
	}
}

?>
