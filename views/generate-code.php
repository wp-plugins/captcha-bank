<?php
// defining the image type to be shown in browser widow
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-Type: image/png");
//Settings: You can customize the captcha here
if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
{
	include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
}
switch($captcha_type)
{
	case "digits":
		$charset = "0123456789";
	break;

	case "alphabets":
		if($text_case == "random")
		{
			$charset = "ABCDEFGHKLMNPRSTUVWYZabcdefghklmnprstuvwyz";
		}
		elseif($text_case == "upper")
		{
			$charset = "ABCDEFGHKLMNPRSTUVWYZ";
		}
		else
		{
			$charset = "abcdefghklmnprstuvwyz";
		}
	break;

	case "both":
		if($text_case == "random")
		{
			$charset = "ABCDEFGHKLMNPRSTUVWYZabcdefghklmnprstuvwyz0123456789";
		}
		elseif($text_case == "upper")
		{
			$charset = "ABCDEFGHKLMNPRSTUVWYZ0123456789";
		}
		else
		{
			$charset = "abcdefghklmnprstuvwyz0123456789";
		}
	break;
}
$captcha_enable_space = 5;
$code = "";
$code_string = "";
$space = "";

$captcha_font = WP_CAPTCHA_BK_PLUGIN_DIR."fonts/".$captcha_font;
if($captcha_enable_space == 1) $space = " ";
$i = 0;
while ($i < $captcha_characters)
{
	$c = substr($charset, mt_rand(0, strlen($charset)-1), 1);
	$code_string .= $c.$space;
	$code .= $c;
	$i++;
}

/*create image*/
$size_font = $captcha_height * ($captcha_font_size/50);
$image = imagecreatetruecolor($captcha_width, $captcha_height);
$tmpimg_distortion =imagecreate($captcha_width * 5, $captcha_height * 5);

/* setting the captcha text transparency*/
if($text_trasparency == "1")
{
	$alpha = intval($trasparency_percentage / 100 * 127);
	$arr_text_color = hexrgb($captcha_text_color);
	$image_text_color = imagecolorallocatealpha($image, $arr_text_color["red"], $arr_text_color["green"], $arr_text_color["blue"], $alpha);
}
else
{
	$arr_text_color = hexrgb($captcha_text_color);
	$image_text_color = imagecolorallocate($image, $arr_text_color["red"], $arr_text_color["green"], $arr_text_color["blue"]);
}

/* Displaying background image for Captcha*/
set_background($image,$captcha_width, $captcha_height, $captcha_background);

/* generating lines randomly in background of image */
if($show_lines == "1")
{
	$arr_line_color = hexrgb($lines_color);
	$image_line_color = imagecolorallocate($image, $arr_line_color["red"], $arr_line_color["green"], $arr_line_color["blue"]);
	for( $i=0; $i<$no_of_lines; $i++ ) 
	{
		imageline($image, mt_rand(0,$captcha_width), mt_rand(0,$captcha_height),mt_rand(0,$captcha_width), mt_rand(0,$captcha_height), $image_line_color);
	}
}

/* generating the dots randomly in background */
if($show_noise == "1")
{
	$arr_dots_color = hexrgb($noise_color);
	$image_dots_color = imagecolorallocate($image, $arr_dots_color["red"], $arr_dots_color["green"], $arr_dots_color["blue"]);
	for( $i=0; $i<$noise_level; $i++ ) 
	{
		imagefilledellipse($image, mt_rand(0,$captcha_width),	mt_rand(0,$captcha_height), 2, 3, $image_dots_color);
	}
}

/* create signature on captcha */
if($show_signature == "1")
{
	$arr_signature_color = hexrgb($signature_color);
	$image_signature_color = imagecolorallocate($image, $arr_signature_color["red"], $arr_signature_color["green"], $arr_signature_color["blue"]);
	if (trim($signature) != "")
	{
		$bbox = imagettfbbox(10, 0, $captcha_font, $signature);
		$textlen = $bbox[2] - $bbox[0];
		$x = $captcha_width - $textlen - 5;
		$y = $captcha_height - 3;
		 
		imagettftext($image, 10, 0, $x, $y, $image_signature_color, $captcha_font,  $signature);
	}
}

/* create a text box and add 6 letters code in it */
$textbox = imagettfbbox($size_font, 0, $captcha_font, $code_string);
$x = ($captcha_width - $textbox[4])/2;
$y = ($captcha_height - $textbox[5])/2;
imagettftext($image, $size_font, 0, $x, $y, $image_text_color, $captcha_font , $code_string);

/* generating background image for Captcha*/
function set_background($image,$captcha_width, $captcha_height, $captcha_background)
{
	$bg_img =  WP_CAPTCHA_BK_PLUGIN_DIR . "/backgrounds/".$captcha_background;
	$dat = @getimagesize($bg_img);
	if($dat == false) 
	{
		return;
	}
	switch($dat[2])
	{
		case 1:  $newim = @imagecreatefromgif($bg_img); break;
		case 2:  $newim = @imagecreatefromjpeg($bg_img); break;
		case 3:  $newim = @imagecreatefrompng($bg_img); break;
		default: return;
	}
	if(!$newim) return;
	imagecopyresampled($image, $newim, 0, 0, 0, 0,$captcha_width, $captcha_height, imagesx($newim), imagesy($newim));
}
/* Show captcha image in the page html page */
imagepng($image);
imagedestroy($image);
$_SESSION["6_letters_code"] = $code;

function hexrgb ($hexstr)
{
	$int = hexdec($hexstr);
	return array("red" => 0xFF & ($int >> 0x10),"green" => 0xFF & ($int >> 0x8),"blue" => 0xFF & $int);
}
?>
