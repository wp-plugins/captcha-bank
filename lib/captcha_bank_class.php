<?php
global $wpdb;
if (count($wpdb->get_var('SHOW TABLES LIKE "' . captcha_bank_settings() . '"')) == 1)
{
	$settings = $wpdb -> get_col
	(
		$wpdb -> prepare
		(
			'SELECT settings_value FROM ' . captcha_bank_settings() . " ORDER BY settings_id ASC",""
		)
	);
	if(count($settings) > 0)
	{
		$settings_array = array();
		for($flag=0; $flag < count($settings); $flag++)
		{
			array_push($settings_array, $settings[$flag]);
		} 
	
	
	/*************************************************************************************/
		//Add captch on login form
		if($settings_array[23] == 1)
		{
			add_action( 'login_form', 'captcha_bank_form' );
			add_filter('wp_authenticate_user','captcha_bank_login_check',10,2 );
		}
		
		//Add captcha on register form
		if($settings_array[26] == 1)
		{
		add_action( 'register_form', 'captcha_bank_form' );
		add_action( 'register_post', 'captcha_bank_register_post',10,3);
		}
		
		//Add captcha on Lostpassword form
		if($settings_array[27] == 1)
		{
			add_action( 'lostpassword_form', 'captcha_bank_form' );
			add_action( 'allow_password_reset', 'captcha_bank_lostpassword_post',1);
		}
		
		//Add captcha on comment form
		if($settings_array[24] == 1)
		{
			add_action( 'comment_form_after_fields', 'captcha_bank_form');
			add_action( 'pre_comment_on_post', 'captcha_bank_comment_post' );
		}
		
		//Add captcha on comment form when admin is login
		if($settings_array[25] == 1)
		{
			add_action('comment_form_logged_in_after', 'captcha_bank_form');
			add_action( 'pre_comment_on_post', 'captcha_bank_comment_post' );
		}
	}
}	
/*************************************************************************************/
	//this function is to add captcha
function captcha_bank_form()
{
	global $wpdb;
	$settings = $wpdb -> get_col
	(
		$wpdb -> prepare
		(
			'SELECT settings_value FROM ' . captcha_bank_settings() . " ORDER BY settings_id ASC",""
		)
	);
	$settings_array = array();
	for($flag=0; $flag < count($settings); $flag++)
	{
		array_push($settings_array, $settings[$flag]);
	} 
?>
<label><?php echo $settings_array[0];?></label>
	<p>
		<img id="captcha_image" title="<?php echo $settings_array[1];?>" style="border: 1px solid #000; margin-right: 15px; cursor: pointer;" src="<?php echo admin_url('admin-ajax.php') . "?sid=" .md5(uniqid());  ?>"  align="left" />
		<a tabindex="-1" style="border-style: none;" href="#" title="Refresh Image" onclick="document.getElementById('captcha_image').src = '<?php echo admin_url('admin-ajax.php') . "?sid=" .md5(uniqid());  ?>'; this.blur(); return false"><img src="<?php echo CAPTCHA_BK_PLUGIN_URL ."/refresh.png"?>" alt="Reload Image" height="32" width="32" onclick="this.blur()" align="bottom" border="0" /></a><br />
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
	require_once CAPTCHA_BK_PLUGIN_DIR . '/captcha_bank_image.php';
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
	require_once CAPTCHA_BK_PLUGIN_DIR . '/captcha_bank_image.php';
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
	require_once CAPTCHA_BK_PLUGIN_DIR . '/captcha_bank_image.php';
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
	require_once CAPTCHA_BK_PLUGIN_DIR . '/captcha_bank_image.php';
	$captchaBankImage = new captcha_bank_image();
	if ($captchaBankImage->check($captcha_code) == false) {
		wp_die( '<p><span><strong>Error</strong>: The Captcha Code does not match. Please Try Again.</span></p>');
	}
	else{
		return ;
	}
}

?>
