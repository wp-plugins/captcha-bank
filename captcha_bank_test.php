<?php
/**
 * Captcha Bank Test Script
 *
 * Upload this PHP script to your web server and call it from the browser.
 * The script will tell you if you meet the requirements for running Captcha Bank.
 * It also checks for common problems with PHP sessions that prevent Captcha Bank from working.
 *
 */
if (version_compare(PHP_VERSION, '5.2.0', '<'))
{
	echo 'CaptchaBankImage requires PHP 5.2.0 or greater in order to run.  You are '
	.'using ' . PHP_VERSION . ' which is very outdated.  Please consider '
	.'upgrading to a newer, more secure version of PHP.<br /<br />';
	exit;
}
$GLOBALS['session_start_error'] = null;
$level = error_reporting(0);
set_error_handler('session_error_handler', E_ALL);
session_name('captchaBankImage_test');
$sessionStarted = @session_start();
//restore_error_handler();
session_test();
if (isset($_GET['testimage']) && $_GET['testimage'] == '1')
{
	$im    = imagecreate(225, 225);
	$white = imagecolorallocate($im, 255, 255, 255);
	$black = imagecolorallocate($im,   0,   0,   0);
	$red   = imagecolorallocate($im, 255,   0,   0);
	$green = imagecolorallocate($im,   0, 255,   0);
	$blue  = imagecolorallocate($im,   0,   0, 255);
// draw the head
	imagearc($im, 100, 120, 200, 200,  0, 360, $black);
// mouth
	imagearc($im, 100, 120, 150, 150, 25, 155, $red);
// left and then the right eye
	imagearc($im,  60,  95,  50,  50,  0, 360, $green);
	imagearc($im, 140,  95,  50,  50,  0, 360, $blue);
	imagestring($im, 5, 15, 1, 'Captcha Bank Will Work!!', $blue);
	imagestring($im, 2, 5, 20, ':) :) :)', $black);
	imagestring($im, 2, 5, 30, ':) :)', $black);
	imagestring($im, 2, 5, 40, ':)', $black);
	imagestring($im, 2, 150, 20, '(: (: (:', $black);
	imagestring($im, 2, 168, 30, '(: (:', $black);
	imagestring($im, 2, 186, 40, '(:', $black);
	header('Content-type: image/png');
	imagepng($im, null, 3);
	exit;
}
function session_test()
{
	if (!isset($_GET['testimage'])) 
	{
		if (isset($_GET['tested'])) 
		{
			if (!isset($_SESSION['captchaBankImage_test_value'])) 
			{
				$GLOBALS['session_start_error'] = 
				"The session started successfully, but the test value "
				."was not found.<br />Click <a href=\"{$_SERVER['PHP_SELF']}\">"
				."here</a> to try the test again.<br />Make sure cookies are enabled in your browser.<br />";
			}
		} 
		else 
		{
			if ($GLOBALS['session_start_error'] != null) 
			{
				echo '<strong>Failed to start the PHP session.</strong><br /><br />'
				.'The <a href="http://php.net/sessions" target="_blank">session</a>'
				.' did not start properly.  This could indicate a problem '
				.'the PHP configuration on this server.<br /><br />'
				.'The following error occurred when attempting to call <i>session_start()</i>:<br />'
				.'<pre style="margin: 25px">' . htmlspecialchars($GLOBALS['session_start_error']) . '</pre>'
				.'<span style="color: #f00">In order for Captcha Bank to work, you '
				.'must resolve the error.</span><br /><br />'
				.'If after searching <a href="https://google.com" target="_blank">Google</a> '
				.'and <a href="http://stackoverflow.com/search" target="_blank">StackOverflow</a> '
				.'for causes to the problem and you still cannot resolve the error, contact '
				.'<a href="http://phpcaptcha.org/contact" target="_blank">the developers</a> '
				.'of Captcha Bank for assistance.<br />Provide as much information about the problem '
				.' and error as possible, and we can help resolve the issue.';
				exit;
			}
			$_SESSION['captchaBankImage_test_value'] = 'test';
			header('Location: admin.php?page=captcha_bank_test&tested=1');
			exit;
		}
	}
}
function print_status($supported)
{
	if ($supported)
	{
		echo "<span style=\"color: #00f\">Yes!</span>";
	}
	else 
	{
		echo "<span style=\"color: #f00; font-weight: bold\">No</span>";
	}
}
function session_error_handler($errno, $errstr, $errfile, $errline)
{
	$GLOBALS['session_start_error'] = $errstr;
	return true;
}
?>
<h2><?php _e( "Captcha-Bank Image Test Script ", captcha_bank ); ?></h2>
<p><?php _e( "This script will test your PHP installation to see if Captcha Bank will run on your server. ", captcha_bank ); ?></p>
<ul>
	<li>
		<strong>
			<?php _e( "Session Functionality ", captcha_bank ); ?>:
		</strong>
		<?php print_status($GLOBALS['session_start_error'] == null); ?>
		<?php if ($GLOBALS['session_start_error'] != null): ?>
		<br /><span style="color: #f00">
			<?php _e( "There may be a problem with session support. ", captcha_bank ); ?></span><br />
			<?php echo $GLOBALS['session_start_error'] ?>
		<br />
		<?php endif; ?>
	</li>
	<li>
		<strong>
			<?php _e( "GD Support ", captcha_bank ); ?>:
		</strong>
		<?php print_status($gd_support = extension_loaded('gd')); ?>
	</li>
		<?php if ($gd_support) $gd_info = gd_info(); else $gd_info = array(); ?>
		<?php if ($gd_support): ?>
	<li>
		<strong>
			<?php _e( "GD Version ", captcha_bank ); ?>:
		</strong>
		<?php echo $gd_info['GD Version']; ?>
	</li>
		<?php endif; ?>
	<li>
		<strong>
			<?php _e( "imageftbbox function ", captcha_bank ); ?>:
		</strong>
		<?php print_status(function_exists('imageftbbox')); ?>
		<?php if (function_exists('imageftbbox') == false): ?>
			<br />The <a href="http://php.net/imageftbbox" target="_new">imageftbbox()</a>
			<?php _e( "function is not included with your gd build.  This function is required. ", captcha_bank ); ?> 
			<?php endif; ?>
	</li>
	<li>
		<strong>
			<?php _e( "TTF Support (FreeType) ", captcha_bank ); ?>:
		</strong>
		<?php print_status($gd_support && $gd_info['FreeType Support']); ?>
		<?php if ($gd_support && $gd_info['FreeType Support'] == false): ?>
			<br />
			<?php _e( "No FreeType support.  You cannot use Captcha Bank 3.0, but can use 2.0 with gd fonts. ", captcha_bank ); ?>
			<?php endif; ?>
	</li>
	<li>
		<strong>
			<?php _e( "JPEG Support ", captcha_bank ); ?>:
		</strong>
		<?php print_status($gd_support && ((isset($gd_info['JPG Support']) || isset($gd_info['JPEG Support'])))); ?>
	</li>
	<li>
		<strong>
			<?php _e( "PNG Support ", captcha_bank ); ?>:
		</strong>
		<?php print_status($gd_support && $gd_info['PNG Support']); ?>
	</li>
	<li>
		<strong>
			<?php _e( "GIF Read Support", captcha_bank ); ?>:
		</strong>
		<?php print_status($gd_support && $gd_info['GIF Read Support']); ?>
	</li>
	<li>
		<strong>
			<?php _e( "GIF Create Support", captcha_bank ); ?>:
		</strong>
		<?php print_status($gd_support && $gd_info['GIF Create Support']); ?>
	</li>
	<li>
		<strong>
			<?php _e( "SQLite Support", captcha_bank ); ?>:
		</strong>
		<?php print_status(extension_loaded('pdo_sqlite')); ?><br />
		<?php if (extension_loaded('pdo_sqlite')): ?>
		<?php _e( "SQLite is available.  If you choose to use it, Captcha Bank can support users who do not accept cookies.", captcha_bank ); ?>
		<?php else: ?>
		<?php _e( "No SQLite support. Captcha Bank will work but your visitors must accept cookies.", captcha_bank ); ?>
		<?php endif; ?>
	</li>
	<li>
		<strong>
			<?php _e( "MySQL Support", captcha_bank ); ?>:
		</strong>
		<?php print_status(extension_loaded('pdo_mysql')); ?><br />
		<?php if (extension_loaded('pdo_mysql')): ?>
		<?php _e( "MySQL is available.  If you choose to use it, Captcha Bank can support users who do not accept cookies by storing codes in MySQL.", captcha_bank ); ?>
		<?php else: ?>
		<?php _e( "No MySQL support. Captcha Bank will work but your visitors must accept cookies.", captcha_bank ); ?>
		<?php endif; ?>
	</li>
	<li>
		<strong>
			<?php _e( "PostgreSQL Support", captcha_bank ); ?>:
		</strong>
		<?php print_status(extension_loaded('pdo_pgsql')); ?><br />
		<?php if (extension_loaded('pdo_pgsql')): ?>
		<?php _e( "PostgreSQL is available.", captcha_bank ); ?>
		<?php else: ?>
		<?php _e( "No PostgreSQL support.", captcha_bank ); ?>
		<?php endif; ?>
	</li>
</ul>
		<?php if ($gd_support && function_exists('imageftbbox')): ?>
		<?php if ($GLOBALS['session_start_error'] != null): ?>
		<?php _e( "There is a warning, but otherwise you meet the requirements for using Captcha Bank.", captcha_bank ); ?>
		<?php else: ?>
		<?php _e( "Your server meets the requirements for using Captcha Bank!", captcha_bank ); ?>
		<?php endif; ?>
		<br /><br />
			<img src="<?php echo CAPTCHA_BK_PLUGIN_URL . '/captcha_bank_test.php?testimage=1' ?>" alt="Test Image" align="bottom" />
		<?php else: ?>
		<?php _e( "Based on the requirements, you do not have what it takes to run Captcha Bank :", captcha_bank ); ?> :
		<?php endif; ?>
