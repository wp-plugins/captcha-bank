<?php 
ob_start();
session_start();
if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
{
	include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
}

//Add captcha on login form
if($captcha_for_login == "1")
{
	add_action( "login_form", "captcha_bank_form" );
	add_filter("wp_authenticate_user","captcha_bank_login_check",20,2 );
}

//Add captcha on register form
if($captcha_for_register == "1")
{
	add_action( "register_form", "captcha_bank_form" );
	add_action( "register_post", "captcha_bank_register_post",10,3);
}

//this add captcha on login form, register form, lost password form, comment form
if ( ! function_exists( "captcha_bank_form" ) ) 
{
	function captcha_bank_form() 
	{
		global $wpdb;
		if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
		{
			include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
		}
		$captcha_url = admin_url("admin-ajax.php"). "?captcha_code=";
		?>
		<label>
			<?php _e("Enter Code", captcha_bank); ?>
			<span style="color: #b94a48;">*</span>
		</label>
		<input type="text" name="captcha_challenge_field" id="captcha_challenge_field" class="captcha_challenge_field" />
		<label style="display:block;"><?php echo $captcha_title;?></label>
		<?php
			if($show_border == "1")
			{
				?>
				<img src="<?php echo $captcha_url . rand(111,99999);?>" class="captcha_code_img"  id="captcha_code_img" title="<?php echo $captcha_tooltip;?>" style= "margin-top:10px; cursor:pointer; border:<?php echo $border_size?>px solid <?php echo $border_color?>" />
				<?php
			}
			else
			{
				?>
				<img src="<?php echo $captcha_url . rand(111,99999);?>" class="captcha_code_img"  id="captcha_code_img" title="<?php echo $captcha_tooltip;?>" style= "margin-top:10px; cursor:pointer;" />
				<?php
			}
		?>
		<img style= "vertical-align: top !important; margin-top:9px; cursor:pointer;" onclick="refresh(); " alt="Reload Image" height="25" width="25" src="<?php echo plugins_url("/assets/images/refresh-icon.png",dirname(__FILE__))?>"/>
		
		<script type="text/javascript">
			function refresh()
			{
				var randNum = Math.floor((Math.random() * 99999) + 1);
				jQuery("#captcha_code_img").attr("src","<?php echo $captcha_url; ?>"+randNum);
				return true;
			}
		</script>
		<?php
	}
}


//this function is to check captcha code in login form
function captcha_bank_login_check($user, $password) 
{
	global $wpdb,$errors;
	if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
	{
		include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
	}
	$err = captcha_login_errors();
	if($err)
	{
		if($errors == NULL) $errors;		
		if($errors == NULL) $errors = new WP_Error();
		if($err == "empty")
		{
			$error = new WP_Error( "captcha_wrong", "Captcha Code is empty. Please enter captcha code.");
			return $error;
		}
		else if($err == "invalid")
		{
			$error = new WP_Error( "captcha_wrong", "The Captcha Code does not match. Please Try Again.");
			return $error;
		}
	}
	return $user;
}

//this function is to check captcha code in registration form
function captcha_bank_register_post($user,$email,$errors)
{
	global $wpdb;
	if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
	{
		include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
	}
	$err = captcha_errors();
	if($err)
	{
		if($err == "empty")
		{
			$errors->add("captcha_error", "Captcha Code is empty. Please enter captcha code.");
			return $errors;
		}
		else if($err == "invalid")
		{
			$errors->add("captcha_error", "The Captcha Code does not match. Please Try Again.");
			return $errors;
		}
	}
}

function captcha_login_errors($errors = NULL)
{
	global $wpdb;
	if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
	{
		include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
	}
	if(!class_exists("insert_log_data"))
	{
		class insert_log_data
		{
			function insert_data($tbl, $data)
			{
				global $wpdb;
				$wpdb->insert($tbl,$data);
			}
		}
	}
	if(isset($_REQUEST["captcha_challenge_field"]))
	{
		$setting_value = array();
		$ipAddress = getIpAddress();
		$date_time = date("Y-m-d H:i:s");
		$log_data = get_ip_location($ipAddress);
		$insert = new insert_log_data();
		$setting_value["username"] = $_REQUEST["log"];
		$setting_value["ip_address"] = $ipAddress;
		if($log_data->city =="" || $log_data->country_name =="")
		{
			$setting_value["geo_location"] = $log_data->city.$log_data->country_name;
		}
		else
		{
			$setting_value["geo_location"] = $log_data->city.", ".$log_data->country_name;
		}
		$setting_value["latitude"] = $log_data->latitude;
		$setting_value["longitude"] = $log_data->longitude;
		$setting_value["date_time"] = $date_time;
		if($captcha_case_sensitive == "1")
		{
			$captcha_challenge_field = trim($_REQUEST["captcha_challenge_field"]);
		}
		else 
		{
			$captcha_challenge_field = strtolower(trim($_REQUEST["captcha_challenge_field"]));
		}	
		if(strlen($captcha_challenge_field)<=0)
		{
			$errors = "empty";
			$setting_value["captcha_status"] = 0;
		}
		else 
		{
			$setting_value["captcha_status"] = 1;
		}
		if(strlen($captcha_challenge_field)>0)
		{
			if(isset($_SESSION["6_letters_code"]))
			{
				if($captcha_case_sensitive == "1")
				{
					$code = $_SESSION["6_letters_code"];
				}
				else 
				{
					$code = strtolower($_SESSION["6_letters_code"]);
				}
				
				if($code != $captcha_challenge_field)
				{
					$errors = "invalid";	
					$setting_value["captcha_status"] = 0;
				}
				else
				{
					$setting_value["captcha_status"] = 1;
				}
			}
		}
		$insert->insert_data(captcha_bank_log(),$setting_value);
	}
	return $errors;
}
function captcha_errors($errors = NULL)
{
	global $wpdb;
	if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
	{
		include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
	}
	if(isset($_REQUEST["captcha_challenge_field"]))
	{
		if($captcha_case_sensitive == "1")
		{
			$captcha_challenge_field = trim($_REQUEST["captcha_challenge_field"]);
		}
		else
		{
			$captcha_challenge_field = strtolower(trim($_REQUEST["captcha_challenge_field"]));
		}
		if(strlen($captcha_challenge_field)<=0)
		{
			$errors = "empty";
		}
		if(strlen($captcha_challenge_field)>0)
		{
			if(isset($_SESSION["6_letters_code"]))
			{
				if($captcha_case_sensitive == "1")
				{
					$code = $_SESSION["6_letters_code"];
				}
				else
				{
					$code = strtolower($_SESSION["6_letters_code"]);
				}
				if($code != $captcha_challenge_field)
				{
					$errors = "invalid";
				}
			}
		}
	}
	return $errors;
}
function get_ip_location($ip)
{
	$apiCall = "freegeoip.net/json/".$ip;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $apiCall);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
	$jsonData = curl_exec($ch);
	return json_decode($jsonData);
}
if(!function_exists("getIpAddress"))
{
	function getIpAddress()
	{
		foreach (array("HTTP_CLIENT_IP", "HTTP_X_FORWARDED_FOR", "HTTP_X_FORWARDED", "HTTP_X_CLUSTER_CLIENT_IP", "HTTP_FORWARDED_FOR", "HTTP_FORWARDED", "REMOTE_ADDR") as $key)
		{
			if (array_key_exists($key, $_SERVER) === true)
			{
				foreach (explode(",", $_SERVER[$key]) as $ip)
				{
					return $ip = trim($ip); // just to be safe
				}
			}
		}
	}
}
ob_get_clean();
?>
