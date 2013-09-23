<?php

/**
 * Project:     Captcha-Bank: A PHP class for creating and managing form CAPTCHA images<br />
 * File:        captcha_bank_show.php<br />*/

require_once dirname(__FILE__) . '/captcha_bank_image.php';

$img = new captcha_bank_image();


$img->display();  // outputs the image and content headers to the browser
