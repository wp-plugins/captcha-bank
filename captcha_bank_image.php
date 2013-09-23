<?php
class captcha_bank_image
{
    /**
     * Renders captcha as a JPEG image
     */
    const captchaBank_image_jpeg = 1;
    /**
     * Renders captcha as a PNG image (default)
     */
    const captchaBank_image_png  = 2;
    /**
     * Renders captcha as a GIF image
     */
    const captchaBank_image_gif  = 3;

    /**
     * Create a normal alphanumeric captcha
     */
    const captchaBank_string     = 0;
    /**
     * Create a captcha consisting of a simple math problem
     */
    const captchaBank_mathematics = 1;

    /*%*********************************************************************%*/
    // Properties

    /**
     * The width of the captcha image
     */
    public $image_width = 215;
    /**
     * The height of the captcha image
     */
    public $image_height = 80;
    /**
     * The type of the image, default = png
     */
    public $image_type   = self::captchaBank_image_png;

    /**
     * The background color of the captcha
     */
    public $image_bg_color = '#ffffff';
    /**
     * The color of the captcha text
     */
    public $text_color     = '#e00000';
    /**
     * The color of the lines over the captcha
     */
    public $line_color     = '#707070';
    /**
     * The color of the noise that is drawn
     */
    public $noise_color    = '#707070';

    /**
     * How transparent to make the text 0 = completely opaque, 100 = invisible
     */
    public $text_transparency_percentage = 20;
    /**
     * Whether or not to draw the text transparently, true = use transparency, false = no transparency
     */
    public $use_transparent_text         = true;

    /**
     * The length of the captcha code
     */
    public $code_length    = 6;
    /**
     * Whether the captcha should be case sensitive (not recommended, use only for maximum protection)
     */
    public $case_sensitive = true;
    /**
     * The character set to use for generating the captcha code
     */
    public $charset        = 'ABCDEFGHKLMNPRSTUVWYZabcdefghklmnprstuvwyz23456789';
    /**
     * How long in seconds a captcha remains valid, after this time it will not be accepted
     */
    public $expiry_time    = 900;

    /**
     * The session name CaptchaBankImage should use, only set this if your application uses a custom session name
     * It is recommended to set this value below so it is used by all CaptchaBankImage scripts
     */
    public $session_name   = null;

    /**
     * The level of distortion, 0.75 = normal, 1.0 = very high distortion
     */
    public $perturbation = 0.85;

    /**
     * How many lines to draw over the captcha code to increase security
     */
    public $num_lines    = 5;

    /**
     * The level of noise (random dots) to place on the image, 0-10
     */
    public $noise_level  = 2;

    /**
     * The signature text to draw on the bottom corner of the image
     */
    public $image_signature = '';

    /**
     * The color of the signature text
     */
    public $signature_color = '#707070';

    /**
     * The path to the ttf font file to use for the signature text, defaults to $ttf_file (AHGBold.ttf)
     */
    public $signature_font;

    /**
     * The type of captcha to create, either alphanumeric, or a math problem<br />
     */
    public $captcha_type  = self::captchaBank_string; // or self::captchaBank_mathematics;

    /**
     * The captcha namespace, use this if you have multiple forms on a single page, blank if you do not use multiple forms on one page
     */
    public $namespace;

    /**
     * The font file to use to draw the captcha code, leave blank for default font AHGBold.ttf
     */
    public $ttf_file;

    /**
     * Captcha ID if using static captcha
     */
    protected static $_captchaId = null;

    protected $im;
    protected $tmpimg;
    protected $bgimg;
    protected $iscale = 5;

    public $CaptchaBankImage_path = null;

    /**
     * The captcha challenge value (either the case-sensitive/insensitive word captcha, or the solution to the math captcha)
     */
    protected $code;

    /**
     * The display value of the captcha to draw on the image (the word captcha, or the math equation to present to the user)
     */
    protected $code_display;

    /**
     * Captcha code supplied by user [set from captcha_bank_image::check()]
     */
    protected $captcha_code;

    /**
     * Flag indicating whether or not a PHP session should be started and used
     */
    protected $no_session;

    /**
     * Flag indicating whether or not HTTP headers will be sent when outputting captcha image
     */
    protected $send_headers;


    // gd color resources that are allocated for drawing the image
    protected $gdbgcolor;
    protected $gdtextcolor;
    protected $gdlinecolor;
    protected $gdsignaturecolor;

    /**
     * Create a new captcha_bank_image object, pass options to set in the constructor.<br />
     */
    public function __construct($options = array())
    {
        $this->CaptchaBankImage_path = dirname(__FILE__);

        if (is_array($options) && sizeof($options) > 0) {
            foreach($options as $prop => $val) {
                 $this->$prop = $val;
            }
        }

        $this->image_bg_color  = $this->initColor($this->image_bg_color,  '#ffffff');
        $this->text_color      = $this->initColor($this->text_color,      '#616161');
        $this->line_color      = $this->initColor($this->line_color,      '#616161');
        $this->noise_color     = $this->initColor($this->noise_color,     '#616161');
        $this->signature_color = $this->initColor($this->signature_color, '#616161');

        if (is_null($this->ttf_file)) {
            $this->ttf_file = $this->CaptchaBankImage_path . '/AHGBold.ttf';
        }

        $this->signature_font = $this->ttf_file;

        if (is_null($this->code_length) || (int)$this->code_length < 1) {
            $this->code_length = 6;
        }

        if (is_null($this->perturbation) || !is_numeric($this->perturbation)) {
            $this->perturbation = 0.75;
        }

        if (is_null($this->namespace) || !is_string($this->namespace)) {
            $this->namespace = 'default';
        }

        if (is_null($this->no_session)) {
            $this->no_session = false;
        }

        if ($this->no_session != true) {
            // Initialize session or attach to existing
            if ( session_id() == '' ) { // no session has been started yet, which is needed for validation
                if (!is_null($this->session_name) && trim($this->session_name) != '') {
                    session_name(trim($this->session_name)); // set session name if provided
                }
                session_start();
            }
        }
    }

    /**
     * Return the absolute path to the Securimage directory
     */
    public static function getPath()
    {
        return dirname(__FILE__);
    }

    /**
     * Generate a new captcha ID or retrieve the current ID
     */
    public static function getCaptchaId()
    {
            return captcha_bank_image::$_captchaId;
    }

    /**
     * Validate a captcha code input against a captcha ID
     */
    public static function checkByCaptchaId()
    {
            return false;
    }


    /**
     * Used to serve a captcha image to the browser
     */
    public function  display($background_image = 'backgrounds/bg4.jpg')
    {
        set_error_handler(array(&$this, 'errorHandler'));

        if($background_image != '' && is_readable($background_image)) {
            $this->bgimg = $background_image;
        }

        $this->doImage();
    }

    /**
     * Check a submitted code against the stored value
     */
    public function check($code)
    {
        $this->code_entered = $code;
        $this->validate();
		
        return $this->correct_code;
    }

    /**
     * Return the code from the session.  If none exists yet, an empty string is returned
     */
    public function getCode($array = false, $returnExisting = false)
    {
        $code = '';
        $time = 0;
        $disp = 'error';

        if ($returnExisting && strlen($this->code) > 0) {
            if ($array) {
                return array('code' => $this->code,
                             'display' => $this->code_display,
                             'code_display' => $this->code_display,
                             'time' => 0);
            } else {
                return $this->code;
            }
        }

        if ($this->no_session != true) {
            if (isset($_SESSION['captchaBankImage_code_value'][$this->namespace]) &&
                    trim($_SESSION['captchaBankImage_code_value'][$this->namespace]) != '') {
                if ($this->isCodeExpired(
                        $_SESSION['captchaBankImage_code_ctime'][$this->namespace]) == false) {
                    $code = $_SESSION['captchaBankImage_code_value'][$this->namespace];
                    $time = $_SESSION['captchaBankImage_code_ctime'][$this->namespace];
                    $disp = $_SESSION['captchaBankImage_code_disp'] [$this->namespace];
                }
						
            }
        }


        if ($array == true) {
            return array('code' => $code, 'ctime' => $time, 'display' => $disp);
        } else {
            return $code;
        }
    }

    /**
     * The main image drawing routing, responsible for constructing the entire image and serving it
     */
    protected function doImage()
    {
        if( ($this->use_transparent_text == true || $this->bgimg != '') && function_exists('imagecreatetruecolor')) {
            $imagecreate = 'imagecreatetruecolor';
        } else {
            $imagecreate = 'imagecreate';
        }

        $this->im     = $imagecreate($this->image_width, $this->image_height);
        $this->tmpimg = $imagecreate($this->image_width * $this->iscale, $this->image_height * $this->iscale);
        $this->allocateColors();
        imagepalettecopy($this->tmpimg, $this->im);

        $this->setBackground();

        $code = '';

        if ($code == '') {
            // if the code was not set using display_value or was not found in
            // the database, create a new code
            $this->createCode();
        }

        if ($this->noise_level > 0) {
            $this->drawNoise();
        }

        $this->drawWord();

        if ($this->perturbation > 0 && is_readable($this->ttf_file)) {
            $this->distortedCopy();
        }

        if ($this->num_lines > 0) {
            $this->drawLines();
        }

        if (trim($this->image_signature) != '') {
            $this->addSignature();
        }

        $this->output();
    }

    /**
     * Allocate the colors to be used for the image
     */
    protected function allocateColors()
    {
        // allocate bg color first for imagecreate
        $this->gdbgcolor = imagecolorallocate($this->im,
                                              $this->image_bg_color->r,
                                              $this->image_bg_color->g,
                                              $this->image_bg_color->b);

        $alpha = intval($this->text_transparency_percentage / 100 * 127);

        if ($this->use_transparent_text == true) {
            $this->gdtextcolor = imagecolorallocatealpha($this->im,
                                                         $this->text_color->r,
                                                         $this->text_color->g,
                                                         $this->text_color->b,
                                                         $alpha);
            $this->gdlinecolor = imagecolorallocatealpha($this->im,
                                                         $this->line_color->r,
                                                         $this->line_color->g,
                                                         $this->line_color->b,
                                                         $alpha);
            $this->gdnoisecolor = imagecolorallocatealpha($this->im,
                                                          $this->noise_color->r,
                                                          $this->noise_color->g,
                                                          $this->noise_color->b,
                                                          $alpha);
        } else {
            $this->gdtextcolor = imagecolorallocate($this->im,
                                                    $this->text_color->r,
                                                    $this->text_color->g,
                                                    $this->text_color->b);
            $this->gdlinecolor = imagecolorallocate($this->im,
                                                    $this->line_color->r,
                                                    $this->line_color->g,
                                                    $this->line_color->b);
            $this->gdnoisecolor = imagecolorallocate($this->im,
                                                          $this->noise_color->r,
                                                          $this->noise_color->g,
                                                          $this->noise_color->b);
        }

        $this->gdsignaturecolor = imagecolorallocate($this->im,
                                                     $this->signature_color->r,
                                                     $this->signature_color->g,
                                                     $this->signature_color->b);

    }

    /**
     * The the background color, or background image to be used
     */
    protected function setBackground()
    {
        // set background color of image by drawing a rectangle since imagecreatetruecolor doesn't set a bg color
        imagefilledrectangle($this->im, 0, 0,
                             $this->image_width, $this->image_height,
                             $this->gdbgcolor);
        imagefilledrectangle($this->tmpimg, 0, 0,
                             $this->image_width * $this->iscale, $this->image_height * $this->iscale,
                             $this->gdbgcolor);

        if ($this->bgimg == '') {
            return;
        }

        $dat = @getimagesize($this->bgimg);
        if($dat == false) {
            return;
        }

        switch($dat[2]) {
            case 1:  $newim = @imagecreatefromgif($this->bgimg); break;
            case 2:  $newim = @imagecreatefromjpeg($this->bgimg); break;
            case 3:  $newim = @imagecreatefrompng($this->bgimg); break;
            default: return;
        }

        if(!$newim) return;

        imagecopyresized($this->im, $newim, 0, 0, 0, 0,
                         $this->image_width, $this->image_height,
                         imagesx($newim), imagesy($newim));
    }

    /**
     * Generates the code or math problem and saves the value to the session
     */
    public function createCode()
    {
        $this->code = false;

        switch($this->captcha_type) {
            case self::captchaBank_mathematics:
            {
                do {
                    $signs = array('+', '-', 'x');
                    $left  = mt_rand(1, 10);
                    $right = mt_rand(1, 5);
                    $sign  = $signs[mt_rand(0, 2)];

                    switch($sign) {
                        case 'x': $c = $left * $right; break;
                        case '-': $c = $left - $right; break;
                        default:  $c = $left + $right; break;
                    }
                } while ($c <= 0); // no negative #'s or 0

                $this->code         = $c;
                $this->code_display = "$left $sign $right";
                break;
            }

            default:
            {

                if ($this->code == false) {
                    $this->code = $this->generateCode($this->code_length);
                }

                $this->code_display = $this->code;
                $this->code         = ($this->case_sensitive) ? $this->code : strtolower($this->code);
            } // default
        }

         $this->saveData();
    }

    /**
     * Draws the captcha code on the image
     */
    protected function drawWord()
    {
        $width2  = $this->image_width * $this->iscale;
        $height2 = $this->image_height * $this->iscale;

        if (!is_readable($this->ttf_file)) {
            imagestring($this->im, 4, 10, ($this->image_height / 2) - 5, 'Failed to load TTF font file!', $this->gdtextcolor);
        } else {
            if ($this->perturbation > 0) {
                $font_size = $height2 * .4;
                $bb = imageftbbox($font_size, 0, $this->ttf_file, $this->code_display);
                $tx = $bb[4] - $bb[0];
                $ty = $bb[5] - $bb[1];
                $x  = floor($width2 / 2 - $tx / 2 - $bb[0]);
                $y  = round($height2 / 2 - $ty / 2 - $bb[1]);

                imagettftext($this->tmpimg, $font_size, 0, $x, $y, $this->gdtextcolor, $this->ttf_file, $this->code_display);
            } else {
                $font_size = $this->image_height * .4;
                $bb = imageftbbox($font_size, 0, $this->ttf_file, $this->code_display);
                $tx = $bb[4] - $bb[0];
                $ty = $bb[5] - $bb[1];
                $x  = floor($this->image_width / 2 - $tx / 2 - $bb[0]);
                $y  = round($this->image_height / 2 - $ty / 2 - $bb[1]);

                imagettftext($this->im, $font_size, 0, $x, $y, $this->gdtextcolor, $this->ttf_file, $this->code_display);
            }
        }

    }

    /**
     * Copies the captcha image to the final image with distortion applied
     */
    protected function distortedCopy()
    {
        $numpoles = 3; // distortion factor
        // make array of poles AKA attractor points
        for ($i = 0; $i < $numpoles; ++ $i) {
            $px[$i]  = mt_rand($this->image_width  * 0.2, $this->image_width  * 0.8);
            $py[$i]  = mt_rand($this->image_height * 0.2, $this->image_height * 0.8);
            $rad[$i] = mt_rand($this->image_height * 0.2, $this->image_height * 0.8);
            $tmp     = ((- $this->frand()) * 0.15) - .15;
            $amp[$i] = $this->perturbation * $tmp;
        }

        $bgCol = imagecolorat($this->tmpimg, 0, 0);
        $width2 = $this->iscale * $this->image_width;
        $height2 = $this->iscale * $this->image_height;
        imagepalettecopy($this->im, $this->tmpimg); // copy palette to final image so text colors come across
        // loop over $img pixels, take pixels from $tmpimg with distortion field
        for ($ix = 0; $ix < $this->image_width; ++ $ix) {
            for ($iy = 0; $iy < $this->image_height; ++ $iy) {
                $x = $ix;
                $y = $iy;
                for ($i = 0; $i < $numpoles; ++ $i) {
                    $dx = $ix - $px[$i];
                    $dy = $iy - $py[$i];
                    if ($dx == 0 && $dy == 0) {
                        continue;
                    }
                    $r = sqrt($dx * $dx + $dy * $dy);
                    if ($r > $rad[$i]) {
                        continue;
                    }
                    $rscale = $amp[$i] * sin(3.14 * $r / $rad[$i]);
                    $x += $dx * $rscale;
                    $y += $dy * $rscale;
                }
                $c = $bgCol;
                $x *= $this->iscale;
                $y *= $this->iscale;
                if ($x >= 0 && $x < $width2 && $y >= 0 && $y < $height2) {
                    $c = imagecolorat($this->tmpimg, $x, $y);
                }
                if ($c != $bgCol) { // only copy pixels of letters to preserve any background image
                    imagesetpixel($this->im, $ix, $iy, $c);
                }
            }
        }
    }

    /**
     * Draws distorted lines on the image
     */
    protected function drawLines()
    {
        for ($line = 0; $line < $this->num_lines; ++ $line) {
            $x = $this->image_width * (1 + $line) / ($this->num_lines + 1);
            $x += (0.5 - $this->frand()) * $this->image_width / $this->num_lines;
            $y = mt_rand($this->image_height * 0.1, $this->image_height * 0.9);

            $theta = ($this->frand() - 0.5) * M_PI * 0.7;
            $w = $this->image_width;
            $len = mt_rand($w * 0.4, $w * 0.7);
            $lwid = mt_rand(0, 2);

            $k = $this->frand() * 0.6 + 0.2;
            $k = $k * $k * 0.5;
            $phi = $this->frand() * 6.28;
            $step = 0.5;
            $dx = $step * cos($theta);
            $dy = $step * sin($theta);
            $n = $len / $step;
            $amp = 1.5 * $this->frand() / ($k + 5.0 / $len);
            $x0 = $x - 0.5 * $len * cos($theta);
            $y0 = $y - 0.5 * $len * sin($theta);

            $ldx = round(- $dy * $lwid);
            $ldy = round($dx * $lwid);

            for ($i = 0; $i < $n; ++ $i) {
                $x = $x0 + $i * $dx + $amp * $dy * sin($k * $i * $step + $phi);
                $y = $y0 + $i * $dy - $amp * $dx * sin($k * $i * $step + $phi);
                imagefilledrectangle($this->im, $x, $y, $x + $lwid, $y + $lwid, $this->gdlinecolor);
            }
        }
    }

    /**
     * Draws random noise on the image
     */
    protected function drawNoise()
    {
        if ($this->noise_level > 10) {
            $noise_level = 10;
        } else {
            $noise_level = $this->noise_level;
        }

        $t0 = microtime(true);

        $noise_level *= 125; // an arbitrary number that works well on a 1-10 scale

        $points = $this->image_width * $this->image_height * $this->iscale;
        $height = $this->image_height * $this->iscale;
        $width  = $this->image_width * $this->iscale;
        for ($i = 0; $i < $noise_level; ++$i) {
            $x = mt_rand(10, $width);
            $y = mt_rand(10, $height);
            $size = mt_rand(7, 10);
            if ($x - $size <= 0 && $y - $size <= 0) continue; // dont cover 0,0 since it is used by imagedistortedcopy
            imagefilledarc($this->tmpimg, $x, $y, $size, $size, 0, 360, $this->gdnoisecolor, IMG_ARC_PIE);
        }

        $t1 = microtime(true);

        $t = $t1 - $t0;

    }

    /**
    * Print signature text on image
    */
    protected function addSignature()
    {
        $bbox = imagettfbbox(10, 0, $this->signature_font, $this->image_signature);
        $textlen = $bbox[2] - $bbox[0];
        $x = $this->image_width - $textlen - 5;
        $y = $this->image_height - 3;

        imagettftext($this->im, 10, 0, $x, $y, $this->gdsignaturecolor, $this->signature_font, $this->image_signature);
    }

    /**
     * Sends the appropriate image and cache headers and outputs image to the browser
     */
    protected function output()
    {
        if ($this->canSendHeaders() || $this->send_headers == false) {
            if ($this->send_headers) {
                // only send the content-type headers if no headers have been output
                // this will ease debugging on misconfigured servers where warnings
                // may have been output which break the image and prevent easily viewing
                // source to see the error.
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
                header("Cache-Control: no-store, no-cache, must-revalidate");
                header("Cache-Control: post-check=0, pre-check=0", false);
                header("Pragma: no-cache");
            }

            switch ($this->image_type) {
                case self::captchaBank_image_jpeg:
                    if ($this->send_headers) header("Content-Type: image/jpeg");
                    imagejpeg($this->im, null, 90);
                    break;
                case self::captchaBank_image_gif:
                    if ($this->send_headers) header("Content-Type: image/gif");
                    imagegif($this->im);
                    break;
                default:
                    if ($this->send_headers) header("Content-Type: image/png");
                    imagepng($this->im);
                    break;
            }
        } else {
            echo '<hr /><strong>'
                .'Failed to generate captcha image, content has already been '
                .'output.<br />This is most likely due to misconfiguration or '
                .'a PHP error was sent to the browser.</strong>';
        }

        imagedestroy($this->im);
        restore_error_handler();

    }

    /**
     * Generates a random captcha code from the set character set
     */
    protected function generateCode()
    {
        $code = '';

        if (function_exists('mb_strlen')) {
            for($i = 1, $cslen = mb_strlen($this->charset); $i <= $this->code_length; ++$i) {
                $code .= mb_substr($this->charset, mt_rand(0, $cslen - 1), 1, 'UTF-8');
            }
        } else {
            for($i = 1, $cslen = strlen($this->charset); $i <= $this->code_length; ++$i) {
                $code .= substr($this->charset, mt_rand(0, $cslen - 1), 1);
            }
        }

        return $code;
    }

    /**
     * Checks the entered code against the value stored in the session or sqlite database, handles case sensitivity
     * Also clears the stored codes if the code was entered correctly to prevent re-use
     */
    protected function validate()
    {
        if (!is_string($this->code) || strlen($this->code) == 0) {
            $code = $this->getCode();
            // returns stored code, or an empty string if no stored code was found
            // checks the session and database if enabled
        } else {
            $code = $this->code;
        }

        if ($this->case_sensitive == true && preg_match('/[A-Z]/', $code)) {
            // case sensitive was set from captcha_bank_show.php but not in class
            // the code saved in the session has capitals so set case sensitive to true
            $this->case_sensitive = true;
        }

        $code_entered = trim( (($this->case_sensitive) ? $this->code_entered
                                                       : strtolower($this->code_entered))
                        );
        $this->correct_code = false;

        if ($code != '') {
            if (strpos($code, ' ') !== false) {
                // for multi word captchas, remove more than once space from input
                $code_entered = preg_replace('/\s+/', ' ', $code_entered);
                $code_entered = strtolower($code_entered);
            }

            if ($code == $code_entered) {
                $this->correct_code = true;
                if ($this->no_session != true) {
                    $_SESSION['captchaBankImage_code_value'][$this->namespace] = '';
                    $_SESSION['captchaBankImage_code_ctime'][$this->namespace] = '';
                }
            }
        }
    }

    /**
     * Save data to session namespace and database if used
     */
    protected function saveData()
    {
        if ($this->no_session != true) {
            if (isset($_SESSION['captchaBankImage_code_value']) && is_scalar($_SESSION['captchaBankImage_code_value'])) {
                // fix for migration from v2 - v3
                unset($_SESSION['captchaBankImage_code_value']);
                unset($_SESSION['captchaBankImage_code_ctime']);
            }

            $_SESSION['captchaBankImage_code_disp'] [$this->namespace] = $this->code_display;
            $_SESSION['captchaBankImage_code_value'][$this->namespace] = $this->code;
            $_SESSION['captchaBankImage_code_ctime'][$this->namespace] = time();
        }
    }
    /**
     * Checks to see if the captcha code has expired and cannot be used
     */
    protected function isCodeExpired($creation_time)
    {
        $expired = true;

        if (!is_numeric($this->expiry_time) || $this->expiry_time < 1) {
            $expired = false;
        } else if (time() - $creation_time < $this->expiry_time) {
            $expired = false;
        }

        return $expired;
    }

    /**
     * Checks to see if headers can be sent and if any error has been output to the browser
     */
    protected function canSendHeaders()
    {
        if (headers_sent()) {
            // output has been flushed and headers have already been sent
            return false;
        } else if (strlen((string)ob_get_contents()) > 0) {
            // headers haven't been sent, but there is data in the buffer that will break image data
            return false;
        }

        return true;
    }

    /**
     * Return a random float between 0 and 0.9999
     */
    function frand()
    {
        return 0.0001 * mt_rand(0,9999);
    }

    /**
     * Convert an html color code to a CaptchaBankImage_Color
     */
    protected function initColor($color, $default)
    {
        if ($color == null) {
            return new CaptchaBankImage_Color($default);
        } else if (is_string($color)) {
            try {
                return new CaptchaBankImage_Color($color);
            } catch(Exception $e) {
                return new CaptchaBankImage_Color($default);
            }
        } else if (is_array($color) && sizeof($color) == 3) {
            return new CaptchaBankImage_Color($color[0], $color[1], $color[2]);
        } else {
            return new CaptchaBankImage_Color($default);
        }
    }

    /**
     * Error handler used when outputting captcha image
     */
    public function errorHandler($errno, $errstr, $errfile = '', $errline = 0, $errcontext = array())
    {
        // get the current error reporting level
        $level = error_reporting();

        // if error was supressed or $errno not set in current error level
        if ($level == 0 || ($level & $errno) == 0) {
            return true;
        }

        return false;
    }
}


/**
 * Color object for captcha_bank_image CAPTCHA
 */
class CaptchaBankImage_Color
{
    public $r;
    public $g;
    public $b;

    /**
     * Create a new CaptchaBankImage_Color object.<br />
     * Constructor expects 1 or 3 arguments.<br />
     * When passing a single argument, specify the color using HTML hex format,<br />
     * $color = new CaptchaBankImage_Color('#0080FF')
     */
    public function __construct($color = '#ffffff')
    {
        $args = func_get_args();

        if (sizeof($args) == 0) {
            $this->r = 255;
            $this->g = 255;
            $this->b = 255;
        } else if (sizeof($args) == 1) {
            // set based on html code
            if (substr($color, 0, 1) == '#') {
                $color = substr($color, 1);
            }

            if (strlen($color) != 3 && strlen($color) != 6) {
                throw new InvalidArgumentException(
                  'Invalid HTML color code passed to CaptchaBankImage_Color'
                );
            }

            $this->constructHTML($color);
        } else if (sizeof($args) == 3) {
            $this->constructRGB($args[0], $args[1], $args[2]);
        } else {
            throw new InvalidArgumentException(
              'CaptchaBankImage_Color constructor expects 0, 1 or 3 arguments; ' . sizeof($args) . ' given'
            );
        }
    }

    /**
     * Construct from an rgb triplet
     */
    protected function constructRGB($red, $green, $blue)
    {
        if ($red < 0)     $red   = 0;
        if ($red > 255)   $red   = 255;
        if ($green < 0)   $green = 0;
        if ($green > 255) $green = 255;
        if ($blue < 0)    $blue  = 0;
        if ($blue > 255)  $blue  = 255;

        $this->r = $red;
        $this->g = $green;
        $this->b = $blue;
    }

    /**
     * Construct from an html hex color code
     */
    protected function constructHTML($color)
    {
        if (strlen($color) == 3) {
            $red   = str_repeat(substr($color, 0, 1), 2);
            $green = str_repeat(substr($color, 1, 1), 2);
            $blue  = str_repeat(substr($color, 2, 1), 2);
        } else {
            $red   = substr($color, 0, 2);
            $green = substr($color, 2, 2);
            $blue  = substr($color, 4, 2);
        }

        $this->r = hexdec($red);
        $this->g = hexdec($green);
        $this->b = hexdec($blue);
    }
}
