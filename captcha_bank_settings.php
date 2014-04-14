<?php
error_reporting(0);
session_start();
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
<div class="block well" >
	<div class="navbar">
		<div class="navbar-inner">
			<h5><?php _e( "Captcha Bank Settings", captcha_bank ); ?></h5>
		</div>
	</div>
	<div class="body" style="margin:10px;">
		<div class="row-fluid">
			<div class="span12">
				<div id="captcha_settings_message" class="message green" style="display: none;"> 
					<p><strong><?php _e("Success! Captcha settings has been saved.", captcha_bank); ?></strong></p>
				</div>
				<form id="captcha_settings" class="form-horizontal" method="post">
					<div class="row-fluid">
						<div class="span8">
							<div class="block well">
								<div class="body">
									<div class="control-group">
										<label class="control-label"><?php _e( "Captcha Label", captcha_bank ); ?> :</label>
										<div class = "controls">
											<input name="ux_label" type="text" id="ux_label" class="span12"  value="<?php echo $settings_array[0]; ?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><?php _e( "Captcha Tooltip", captcha_bank ); ?> :</label>
										<div class = "controls">
											<input name="ux_tooltip" type="text" id="ux_tooltip" class="span12"  value="<?php echo $settings_array[1]; ?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><?php _e( "Number of Captcha Characters to be Displayed", captcha_bank ); ?> :</label>
										<div class = "controls">
											<input name="ux_characters" type="text" id="ux_characters" class="span12" onblur="set_text_value('no_characters')" onkeyup="set_text_value('noise_level')" onkeypress="return OnlyNumbers(event)"  value="<?php echo $settings_array[2]; ?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><?php _e( "Captcha Width", captcha_bank ); ?> : <?php _e( "(in pixels)", captcha_bank ); ?></label>
										<div class = "controls">
											<input name="ux_image_width" type="text" id="ux_image_width" class="span12" onkeypress="return OnlyNumbers(event)"  value="<?php echo $settings_array[3]; ?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><?php _e( "Captcha Height", captcha_bank ); ?> : <?php _e( "(in pixels)", captcha_bank ); ?></label>
										<div class = "controls">
											<input name="ux_image_height" type="text" id="ux_image_height" class="span12" onkeypress="return OnlyNumbers(event)"  value="<?php echo $settings_array[4]; ?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><?php _e( "Captcha Type", captcha_bank ); ?> :</label>
										<div class = "controls">
											<select name="ux_captcha_type" id="ux_captcha_type" class="span12">
												<?php 
												if($settings_array[17] == "digits")
												{
													?>
													<option value="both"><?php _e( "Both Alphabets & Digits ", captcha_bank ); ?></option>
													<option value="alphabets"><?php _e( "Only Alphabets ", captcha_bank ); ?></option>
													<option value="digits" selected="selected"><?php _e( "Only Digits ", captcha_bank ); ?></option>
													<?php
												}
												elseif($settings_array[17] == "alphabets")
												{
													?>
													<option value="both"><?php _e( "Both Alphabets & Digits ", captcha_bank ); ?></option>
													<option value="alphabets" selected="selected"><?php _e( "Only Alphabets ", captcha_bank ); ?></option>
													<option value="digits"><?php _e( "Only Digits ", captcha_bank ); ?></option>
													<?php
												}
												else 
												{
													?>
													<option value="both" selected="selected"><?php _e( "Both Alphabets & Digits ", captcha_bank ); ?></option>
													<option value="alphabets"><?php _e( "Only Alphabets ", captcha_bank ); ?></option>
													<option value="digits"><?php _e( "Only Digits ", captcha_bank ); ?></option>
													<?php
												}
												?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><?php _e( "Is Captcha to be Case Sensitive?", captcha_bank ); ?> :</label>
										<div class = "controls">
											<?php
											if($settings_array[8] == 1)
											{
												?>
												<input name="ux_case_sensitive" type="checkbox" checked="checked" id="ux_case_sensitive" value="1"/>
												<?php
											}
											else 
											{
												?>
												<input name="ux_case_sensitive" type="checkbox" id="ux_case_sensitive" value="1"/>
												<?php
											}
											?>
											
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><?php _e( "Captcha Background Pattern", captcha_bank ); ?> :</label>
										<div class = "controls">
											<?php
												if($settings_array[5] == "bg3.jpg" )
												{
													?>
														<input type="radio" name="ux_bg_image" id="bg3"  checked="checked" value="bg3.jpg" style="vertical-align: top !important;margin-top:20px;margin-right:10px;"/>
														<img src="<?php echo CAPTCHA_BK_PLUGIN_URL . '/assets/backgrounds/bg3.jpg'?>" height="50" width="200" />
													
														<input type="radio" name="ux_bg_image" id="bg4" value="bg4.jpg" style="vertical-align: top !important;margin-top:20px;margin-right:10px;margin-left:10px;" />
														<img src="<?php echo CAPTCHA_BK_PLUGIN_URL . '/assets/backgrounds/bg4.jpg'?>" height="50" width="200" /><br/><br/>
													
														<input type="radio" name="ux_bg_image" id="bg5" value="bg5.jpg" style="vertical-align: top !important;margin-top:20px;margin-right:10px;"/>
														<img src="<?php echo CAPTCHA_BK_PLUGIN_URL . '/assets/backgrounds/bg5.jpg'?>" height="50" width="200" />
														
													
														<input type="radio" name="ux_bg_image" id="bg6" value="bg6.png" style="vertical-align: top !important;margin-top:20px;margin-right:10px;margin-left:10px;" />
														<img src="<?php echo CAPTCHA_BK_PLUGIN_URL . '/assets/backgrounds/bg6.png'?>" height="50" width="200" />
													<?php
												}
												elseif($settings_array[5] == "bg4.jpg" )
												{
													?>
														<input type="radio" name="ux_bg_image" id="bg3" value="bg3.jpg" style="vertical-align: top !important;margin-top:20px;margin-right:10px;"/>
														<img src="<?php echo CAPTCHA_BK_PLUGIN_URL . '/assets/backgrounds/bg3.jpg'?>" height="50" width="200" />
													
														<input type="radio" name="ux_bg_image" id="bg4" checked="checked" value="bg4.jpg" style="vertical-align: top !important;margin-top:20px;margin-right:10px;margin-left:10px;" />
														<img src="<?php echo CAPTCHA_BK_PLUGIN_URL . '/assets/backgrounds/bg4.jpg'?>" height="50" width="200" /><br/><br/>
														
													
														<input type="radio" name="ux_bg_image" id="bg5" value="bg5.jpg" style="vertical-align: top !important;margin-top:20px;margin-right:10px;"/>
														<img src="<?php echo CAPTCHA_BK_PLUGIN_URL . '/assets/backgrounds/bg5.jpg'?>" height="50" width="200" />
														
													
														<input type="radio" name="ux_bg_image" id="bg6" value="bg6.png" style="vertical-align: top !important;margin-top:20px;margin-right:10px;margin-left:10px;" />
														<img src="<?php echo CAPTCHA_BK_PLUGIN_URL . '/assets/backgrounds/bg6.png'?>" height="50" width="200" />
													<?php
												}
												elseif($settings_array[5] == "bg5.jpg")
												{
													?>
														<input type="radio" name="ux_bg_image" id="bg3"   value="bg3.jpg" style="vertical-align: top !important;margin-top:20px;margin-right:10px;"/>
														<img src="<?php echo CAPTCHA_BK_PLUGIN_URL . '/assets/backgrounds/bg3.jpg'?>" height="50" width="200" />
													
														<input type="radio" name="ux_bg_image" id="bg4" value="bg4.jpg" style="vertical-align: top !important;margin-top:20px;margin-right:10px;margin-left:10px;" />
														<img src="<?php echo CAPTCHA_BK_PLUGIN_URL . '/assets/backgrounds/bg4.jpg'?>" height="50" width="200" /><br/><br/>
														
														<input type="radio" name="ux_bg_image" id="bg5" value="bg5.jpg" checked="checked" style="vertical-align: top !important;margin-top:20px;margin-right:10px;"/>
														<img src="<?php echo CAPTCHA_BK_PLUGIN_URL . '/assets/backgrounds/bg5.jpg'?>" height="50" width="200" />
													
														<input type="radio" name="ux_bg_image" id="bg6" value="bg6.png" style="vertical-align: top !important;margin-top:20px;margin-right:10px;margin-left:10px;" />
														<img src="<?php echo CAPTCHA_BK_PLUGIN_URL . '/assets/backgrounds/bg6.png'?>" height="50" width="200" />
													<?php
												}
												else
												{
													?>
														<input type="radio" name="ux_bg_image" id="bg3"   value="bg3.jpg" style="vertical-align: top !important;margin-top:20px;margin-right:10px;"/>
														<img src="<?php echo CAPTCHA_BK_PLUGIN_URL . '/assets/backgrounds/bg3.jpg'?>" height="50" width="200" />
													
														<input type="radio" name="ux_bg_image" id="bg4" value="bg4.jpg" style="vertical-align: top !important;margin-top:20px;margin-right:10px;margin-left:10px;" />
														<img src="<?php echo CAPTCHA_BK_PLUGIN_URL . '/assets/backgrounds/bg4.jpg'?>" height="50" width="200" /><br/><br/>
													
														<input type="radio" name="ux_bg_image" id="bg5" value="bg5.jpg"  style="vertical-align: top !important;margin-top:20px;margin-right:10px;"/>
														<img src="<?php echo CAPTCHA_BK_PLUGIN_URL . '/assets/backgrounds/bg5.jpg'?>" height="50" width="200" />
													
														<input type="radio" name="ux_bg_image" id="bg6" value="bg6.png" checked="checked" style="vertical-align: top !important;margin-top:20px;margin-right:10px;margin-left:10px;" />
														<img src="<?php echo CAPTCHA_BK_PLUGIN_URL . '/assets/backgrounds/bg6.png'?>" height="50" width="200" />
													<?php
												}
												?>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><?php _e( "Captcha Text Color", captcha_bank ); ?> :</label>
										<div class = "controls">
											<input name="ux_text_color" type="color" id="ux_text_color" class="span10"  hex="true"  value="<?php echo $settings_array[6]; ?>"/>
										</div>
									</div>
									
									<div class="control-group">
										<label class="control-label"><?php _e( "Show Lines on Captcha Background", captcha_bank ); ?> :</label>
										<div class = "controls">
											<?php
											
											if($settings_array[9] == 1)
											{
												?>
												<input type="checkbox"  name="ux_lines" checked="checked" id="ux_lines" value="1" onclick="image_lines_hide_show();" />
												<?php
											}
											else
											{
												?>
												<input type="checkbox"  name="ux_lines" id="ux_lines" value="1" onclick="image_lines_hide_show();" />
												<?php
											}
											?>
											
										</div>
									</div>
									<div class="control-group" id="number_of_lines">
										<label class="control-label"><?php _e( "Number Of Lines to be Displayed", captcha_bank ); ?> :</label>
										<div class = "controls">
											<input type="text"  name="ux_number_of_lines" id="ux_number_of_lines" class="span12" onkeypress="return OnlyNumbers(event)" value="<?php echo $settings_array[10]; ?>"  />
										</div>
									</div>
									<div class="control-group" id="line_color">
										<label class="control-label"><?php _e( "Line Color", captcha_bank ); ?> :</label>
										<div class = "controls">
											<input type="color"  name="ux_line_color" id="ux_line_color" hex="true" class="span10" value="<?php echo $settings_array[11]; ?>"  />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><?php _e( "Show Noise on Captcha", captcha_bank ); ?> :</label>
										<div class = "controls">
											<?php
											
											if($settings_array[12] == 1)
											{
												?>
												<input type="checkbox"  name="ux_noise" checked="checked" id="ux_noise" value="1" onclick="noise_hide_show();" />
												<?php
											}
											else
											{
												?>
												<input type="checkbox"  name="ux_noise" id="ux_noise" value="1" onclick="noise_hide_show();" />
												<?php
											}
											?>
											
										</div>
									</div>
									<div class="control-group" id="noise_level">
										<label class="control-label"><?php _e( "Noice Level", captcha_bank ); ?> :</label>
										<div class = "controls">
											<input type="text"  name="ux_noise_level" id="ux_noise_level" class="span12" onblur="set_text_value('noise_level')" onkeyup="set_text_value('noise_level')" onkeypress="return OnlyNumbers(event)" value="<?php echo $settings_array[13]; ?>"  />
										</div>
									</div>
									<div class="control-group" id="noise_color">
										<label class="control-label"><?php _e( "Noise Color", captcha_bank ); ?> :</label>
										<div class = "controls">
											<input type="color"  name="ux_noise_color" id="ux_noise_color" class="span10"  hex="true"  value="<?php echo $settings_array[14]; ?>"  />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><?php _e( "Show Text Transparency", captcha_bank ); ?> :</label>
										<div class = "controls">
											<?php
											
											if($settings_array[15] == 1)
											{
												?>
												<input type="checkbox"  name="ux_text_transparency" checked="checked" id="ux_text_transparency" value="1" onclick="transparency_hide_show();" />
												<?php
											}
											else
											{
												?>
												<input type="checkbox"  name="ux_text_transparency" id="ux_text_transparency" value="1" onclick="transparency_hide_show();" />
												<?php
											}
											?>
											
										</div>
									</div>
									<div class="control-group" id="text_transparency">
										<label class="control-label"><?php _e( "Text Transparency Percentage", captcha_bank ); ?> :</label>
										<div class = "controls">
											<input type="text"  name="ux_transparency_percent" id="ux_transparency_percent" class="span12"   onblur="set_text_value('tranparency_percentage')" onkeyup="set_text_value('tranparency_percentage')" onkeypress="return OnlyNumbers(event)"  value="<?php echo $settings_array[16]; ?>"  />
										</div>
									</div>
									
									<div class="control-group">
										<label class="control-label"><?php _e( "Distortion", captcha_bank ); ?> :</label>
										<div class = "controls">
											<?php
											if($settings_array[18]==1)
											{
												?>
												<input type="checkbox" name="ux_distortion" checked="checked"  id="ux_distortion" value="1" onclick="distortion_hide_show();"/>
												<?php
											}
											else
											{
												?>
												<input type="checkbox" name="ux_distortion" id="ux_distortion" value="1" onclick="distortion_hide_show();"/>
												<?php
											}
											?>
										</div>
									</div>
									<div class="control-group" id="distortion">
										<label class="control-label"><?php _e( "Level of Distortion", captcha_bank ); ?> :</label>
										<div class = "controls">
											<input type="text"  name="ux_distortion_level" id="ux_distortion_level" class="span12"  onblur="set_text_value('distortion_level')" onkeyup="set_text_value('distortion_level')" onkeypress="return OnlyNumbers(event)" value="<?php echo $settings_array[19]; ?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><?php _e( "Image Signature", captcha_bank ); ?> :</label>
										<div class = "controls">
											<?php
											if($settings_array[20]==1)
											{
												?>
												<input type="checkbox" name="ux_img_signature" checked="checked"  id="ux_img_signature" value="1" onclick="signature_hide_show();"/>
												<?php
											}
											else
											{
												?>
												<input type="checkbox" name="ux_img_signature" id="ux_img_signature" value="1" onclick="signature_hide_show();"/>
												<?php
											}
											?>
										</div>
									</div>
									<div class="control-group" id="image_signature">
										<label class="control-label"><?php _e( "Signature", captcha_bank ); ?> :</label>
										<div class = "controls">
											<input type="text"  name="ux_signature" id="ux_signature" class="span12"   value="<?php echo $settings_array[21]; ?>"/>
										</div>
									</div>
									<div class="control-group" id="signature_color">
										<label class="control-label"><?php _e( "Signature Color", captcha_bank ); ?> :</label>
										<div class = "controls">
											<input type="color"  name="ux_signature_color" id="ux_signature_color" class="span10" hex="true" value="<?php echo $settings_array[22]; ?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><?php _e( "Captcha on login form", captcha_bank ); ?> :</label>
										<div class = "controls">
											<?php
											
											if($settings_array[23] == 1)
											{
												?>
												<input type="checkbox"  name="ux_captcha_on_login_form" checked="checked" id="ux_captcha_on_login_form" value="1" />
												<?php
											}
											else
											{
												?>
												<input type="checkbox"  name="ux_captcha_on_login_form" id="ux_captcha_on_login_form" value="1"  />
												<?php
											}
											?>
											
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><?php _e( "Captcha on Comment form", captcha_bank ); ?> :</label>
										<div class = "controls">
											<?php
											
											if($settings_array[24] == 1)
											{
												?>
												<input type="checkbox"  name="ux_captcha_on_comment_form" checked="checked" id="ux_captcha_on_comment_form" value="1" />
												<?php
											}
											else
											{
												?>
												<input type="checkbox"  name="ux_captcha_on_comment_form" id="ux_captcha_on_comment_form" value="1"  />
												<?php
											}
											?>
											
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><?php _e( "Captcha on admin Comment form", captcha_bank ); ?> :</label>
										<div class = "controls">
											<?php
											
											if($settings_array[25] == 1)
											{
												?>
												<input type="checkbox"  name="ux_captcha_on_admin_comment_form" checked="checked" id="ux_captcha_on_admin_comment_form" value="1" />
												<?php
											}
											else
											{
												?>
												<input type="checkbox"  name="ux_captcha_on_admin_comment_form" id="ux_captcha_on_admin_comment_form" value="1"  />
												<?php
											}
											?>
											
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><?php _e( "Captcha on Register form", captcha_bank ); ?> :</label>
										<div class = "controls">
											<?php
											
											if($settings_array[26] == 1)
											{
												?>
												<input type="checkbox"  name="ux_captcha_on_register_form" checked="checked" id="ux_captcha_on_register_form" value="1" />
												<?php
											}
											else
											{
												?>
												<input type="checkbox"  name="ux_captcha_on_register_form" id="ux_captcha_on_register_form" value="1"  />
												<?php
											}
											?>
											
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><?php _e( "Captcha on Lost Password form", captcha_bank ); ?> :</label>
										<div class = "controls">
											<?php
											
											if($settings_array[27] == 1)
											{
												?>
												<input type="checkbox"  name="ux_captcha_on_lostpassword_form" checked="checked" id="ux_captcha_on_lostpassword_form" value="1" />
												<?php
											}
											else
											{
												?>
												<input type="checkbox"  name="ux_captcha_on_lostpassword_form" id="ux_captcha_on_lostpassword_form" value="1"  />
												<?php
											}
											?>
											
										</div>
									</div>
									<div class="control-group" style="border-bottom:none !important">
										<label></label>
										<div class="controls" id="ux_div_submit">
											<button type="submit" class="btn btn-primary">
												<span>
													<?php _e( "Save Settings", captcha_bank); ?>
												</span>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="span4">
							<div class="block well">
								<div class="control-group">
									<label class="control-label"><?php echo $settings_array[0];?></label>
									<img id="captcha_image" title="<?php echo $settings_array[1];?>" style="border: 1px solid #000;margin-right: 15px; cursor: pointer;" src="<?php echo admin_url('admin-ajax.php') . "?sid=" .md5(uniqid());  ?>"  align="left" />
									<a style="float:left;" id="Refresh" href="#" title="Refresh Image" ><img src="<?php echo CAPTCHA_BK_PLUGIN_URL ."/refresh.png"?>" alt="Reload Image" height="25" width="25" onclick="this.blur()" align="bottom" border="0" /></a><br />
								</div>
								<div class="control-group">
									<label class="control-label"><strong>Enter Code*:</strong></label>
									<div class="controls">
										<input type="text" name="security_code" class="span10" maxlength="16" />	
									</div>
									
								</div>
							</div>
						</div>
						<div class="span4">
							<div class="block well">
								<?php
								if (version_compare(PHP_VERSION, '5.2.0', '<'))
								{
									echo 'CaptchaBankImage requires PHP 5.2.0 or greater in order to run.  You are '
									.'using ' . PHP_VERSION . ' which is very outdated.  Please consider '
									.'upgrading to a newer, more secure version of PHP.<br /<br />';
									exit;
								}
								$GLOBALS['session_start_error'] = null;
								set_error_handler('session_error_handler', E_ALL);
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
											header('Location: admin.php?page=captcha_bank_setting&tested=1');
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
								<div class="control-group">
									<p><?php _e( "This script will test your PHP installation to see if Captcha Bank will run on your server. ", captcha_bank ); ?></p>
								</div>
								<div class="control-group">
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
								</div>
								<div class="control-group">
									<strong>
										<?php _e( "GD Support ", captcha_bank ); ?>:
									</strong>
									<?php print_status($gd_support = extension_loaded('gd')); ?>
								</div>
								<?php if ($gd_support) $gd_info = gd_info(); else $gd_info = array(); ?>
								<?php if ($gd_support); ?>
								<div class="control-group">
									<strong>
										<?php _e( "GD Version ", captcha_bank ); ?>:
									</strong>
									<?php echo $gd_info['GD Version']; ?>
								</div>
								<?php //endif; ?>
								<div class="control-group">
									<strong>
										<?php _e( "imageftbbox function ", captcha_bank ); ?>:
									</strong>
									<?php print_status(function_exists('imageftbbox')); ?>
									<?php if (function_exists('imageftbbox') == false): ?>
									<br />The <a href="http://php.net/imageftbbox" target="_new">imageftbbox()</a>
									<?php _e( "function is not included with your gd build.  This function is required. ", captcha_bank ); ?> 
									<?php endif; ?>
								</div>
								<div class="control-group">
									<strong>
										<?php _e( "TTF Support (FreeType) ", captcha_bank ); ?>:
									</strong>
									<?php print_status($gd_support && $gd_info['FreeType Support']); ?>
									<?php if ($gd_support && $gd_info['FreeType Support'] == false): ?>
									<br />
									<?php _e( "No FreeType support.  You cannot use Captcha Bank 3.0, but can use 2.0 with gd fonts. ", captcha_bank ); ?>
									<?php endif; ?>
								</div>
								<div class="control-group">
									<strong>
										<?php _e( "JPEG Support ", captcha_bank ); ?>:
									</strong>
									<?php print_status($gd_support && ((isset($gd_info['JPG Support']) || isset($gd_info['JPEG Support'])))); ?>
								</div>
								<div class="control-group">
									<strong>
										<?php _e( "PNG Support ", captcha_bank ); ?>:
									</strong>
									<?php print_status($gd_support && $gd_info['PNG Support']); ?>
								</div>
								<div class="control-group">
									<strong>
										<?php _e( "GIF Read Support", captcha_bank ); ?>:
									</strong>
									<?php print_status($gd_support && $gd_info['GIF Read Support']); ?>
								</div>
								<div class="control-group">
									<strong>
										<?php _e( "GIF Create Support", captcha_bank ); ?>:
									</strong>
									<?php print_status($gd_support && $gd_info['GIF Create Support']); ?>
								</div>
								<div class="control-group">
									<strong>
										<?php _e( "SQLite Support", captcha_bank ); ?>:
									</strong>
									<?php print_status(extension_loaded('pdo_sqlite')); ?><br />
									<?php if (extension_loaded('pdo_sqlite')): ?>
									<?php _e( "SQLite is available. If you choose to use it, Captcha Bank can support users who do not accept cookies.", captcha_bank ); ?>
									<?php else: ?>
									<?php _e( "No SQLite support. Captcha Bank will work but your visitors must accept cookies.", captcha_bank ); ?>
									<?php endif; ?>
								</div>
								<div class="control-group">
									<strong>
										<?php _e( "MySQL Support", captcha_bank ); ?>:
									</strong>
									<?php print_status(extension_loaded('pdo_mysql')); ?><br />
									<?php if (extension_loaded('pdo_mysql')): ?>
									<?php _e( "MySQL is available. If you choose to use it, Captcha Bank can support users who do not accept cookies by storing codes in MySQL.", captcha_bank ); ?>
									<?php else: ?>
									<?php _e( "No MySQL support. Captcha Bank will work but your visitors must accept cookies.", captcha_bank ); ?>
									<?php endif; ?>
								</div>
								<div class="control-group">
									<strong>
										<?php _e( "PostgreSQL Support", captcha_bank ); ?>:
									</strong>
									<?php print_status(extension_loaded('pdo_pgsql')); ?><br />
									<?php if (extension_loaded('pdo_pgsql')): ?>
									<?php _e( "PostgreSQL is available.", captcha_bank ); ?>
									<?php else: ?>
									<?php _e( "No PostgreSQL support.", captcha_bank ); ?>
									<?php endif; ?>
								</div>
								<div class="control-group">
									<?php if ($gd_support && function_exists('imageftbbox')): ?>
									<?php if ($GLOBALS['session_start_error'] != null): ?>
									<?php _e( "There is a warning, but otherwise you meet the requirements for using Captcha Bank.", captcha_bank ); ?>
									<?php else: ?>
									<?php _e( "Your server meets the requirements for using Captcha Bank!", captcha_bank ); ?>
									<?php endif; ?>
									<div style="margin-top:20px;text-align:center">
										<img src="<?php echo CAPTCHA_BK_PLUGIN_URL . '/captcha_bank_test.php?testimage=1' ?>" alt="Test Image" align="bottom" />
									</div>
									<?php else: ?>
									<?php _e( "Based on the requirements, you do not have what it takes to run Captcha Bank :", captcha_bank ); ?> :
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function() 
	{
		image_lines_hide_show();
		transparency_hide_show();
		distortion_hide_show();
		signature_hide_show();
		noise_hide_show();
		jQuery.fn.mColorPicker.defaults = {
			currentId: false,
			currentInput: false,
			currentColor: false,
			changeColor: false,
			color: false,
			imageFolder: '<?php echo CAPTCHA_BK_PLUGIN_URL; ?>/assets/js/colorpicker/images/',
			swatches: [
				"#ffffff",
				"#ffff00",
				"#00ff00",
				"#00ffff",
				"#0000ff",
				"#ff00ff",
				"#ff0000",
				"#4c2b11",
				"#3b3b3b",
				"#000000"
			]
		};
	});
	jQuery("#captcha_settings").validate
	({

		submitHandler: function(form)
		{
			jQuery.post(ajaxurl, jQuery(form).serialize() +"&param=update_settings&action=captcha_settings_library", function(data)
			{
				jQuery('#captcha_settings_message').css('display','block');
				jQuery('body,html').animate({
				scrollTop: jQuery('body,html').position().top}, 'slow');
				setTimeout(function()
				{
					jQuery('#captcha_settings_message').css('display','none');
					window.location.href = "admin.php?page=captcha_bank_setting";
				}, 2000);
			});
		}	
	});
	function image_lines_hide_show()
	{
		var ux_lines = jQuery("#ux_lines").prop("checked");
		if(ux_lines == true)
		{
			jQuery("#number_of_lines").css('display','block');
			jQuery("#line_color").css('display','block');
		}
		else
		{
			jQuery("#number_of_lines").css('display','none');
			jQuery("#line_color").css('display','none');
		}
	}
	function noise_hide_show()
	{
		var ux_noise = jQuery("#ux_noise").prop("checked");
		if(ux_noise == true)
		{
			jQuery("#noise_level").css('display','block');
			jQuery("#noise_color").css('display','block');
		}
		else
		{
			jQuery("#noise_level").css('display','none');
			jQuery("#noise_color").css('display','none');
		}
	}
	function transparency_hide_show()
	{
		var ux_transparency = jQuery("#ux_text_transparency").prop("checked");
		if(ux_transparency == true)
		{
			jQuery("#text_transparency").css('display','block');
		}
		else
		{
			jQuery("#text_transparency").css('display','none');
		}
	}
	function distortion_hide_show()
	{
		var ux_distortion = jQuery("#ux_distortion").prop("checked");
		if(ux_distortion == true)
		{
			jQuery("#distortion").css('display','block');
		}
		else
		{
			jQuery("#distortion").css('display','none');
		}
	}
	function signature_hide_show()
	{
		var ux_signature = jQuery("#ux_img_signature").prop("checked");
		if(ux_signature == true)
		{
			jQuery("#image_signature").css('display','block');
			jQuery("#signature_color").css('display','block');
		}
		else
		{
			jQuery("#image_signature").css('display','none');
			jQuery("#signature_color").css('display','none');
		}
	}
	function OnlyNumbers(evt) 
	{
		var charCode = (evt.which) ? evt.which : event.keyCode;
		if ((charCode > 47 && charCode < 58) || charCode == 127 || charCode == 8) 
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	function set_text_value(text_type)
	{
		if(text_type == "tranparency_percentage")
		{
			var val =jQuery("#ux_transparency_percent").val();
			if(val > 100)
			{
				jQuery("#ux_transparency_percent").val(100);
			}
			else if(val < 1)
			{
				jQuery("#ux_transparency_percent").val(1);
			}
		}
		if(text_type == "distortion_level")
		{
			var val =jQuery("#ux_distortion_level").val();
			if(val > 1)
			{
				jQuery("#ux_distortion_level").val(1);
			}
			else if(val < 0.1)
			{
				jQuery("#ux_distortion_level").val(0.1);
			}
		}
		if(text_type == "noise_level")
		{
			var val =jQuery("#ux_noise_level").val();
			if(val > 10)
			{
				jQuery("#ux_noise_level").val(10);
			}
			else if(val < 1)
			{
				jQuery("#ux_noise_level").val(1);
			}ux_characters
		}
		if(text_type == "no_characters")
		{
			var val =jQuery("#ux_characters").val();
			if(val > 9)
			{
				jQuery("#ux_characters").val(9);
			}
			else if(val < 1)
			{
				jQuery("#ux_characters").val(1);
			}ux_characters
		}
	}
	jQuery('#Refresh').click(function(){
		document.getElementById('captcha_image').src = '<?php echo admin_url('admin-ajax.php') . "?sid=" ?>' + Math.random();
	});
</script>