<?php 
switch($captcha_role)
{
	case "administrator":
		$user_role_permission = "manage_options";
	break;
	case "editor":
		$user_role_permission = "publish_pages";
	break;
	case "author":
		$user_role_permission = "publish_posts";
	break;
}
if (!current_user_can($user_role_permission))
{
	return;
}
else
{
	$settings_captcha = wp_create_nonce( "captcha_settings" );
	if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
	{
		include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
	}
	$captcha_url = admin_url("admin-ajax.php"). "?captcha_code=";
	?>
	<div id="message" class="top-right message" style="display: none;">
		<div class="message-notification"></div>
		<div class="message-notification ui-corner-all growl-success" >
			<div onclick="message_close('message');" id="close-message" class="message-close">x</div>
			<div class="message-header"><?php _e("Success!",  captcha_bank); ?></div>
			<div class="message-message"><?php _e("Settings has been updated",  captcha_bank); ?></div>
		</div>
	</div>
	<form id="frm_wp_captcha_settings" class="layout-form wpcb-page-width" method="post">
		<div class="fluid-layout">
			<div class="layout-span12 responsive">
				<div class="widget-layout wpcb-body-background">
					<div class="widget-layout-title">
						<h4>
							<?php _e("Captcha Settings", captcha_bank); ?>
						</h4>
					</div>
					<div class="widget-layout-body">
						<input type="submit" value="<?php _e("Save Changes", captcha_bank); ?>" class="btn btn-success" style="float:right; margin-top: 5px;"/>
						<div class="fluid-layout">
							<div class="layout-span12 responsive">
								<div class="separator-doubled"></div>
								<div class="framework_tabs">
									<ul class="framework_tab-links">
										<li class="active">
											<a href="#general_settings"><?php _e("General Settings", captcha_bank); ?></a>
										</li>
										<li>
											<a href="#layout_settings"><?php _e("Layout Settings", captcha_bank); ?></a>
										</li>
										<li>
											<a href="#font_settings"><?php _e("Font Settings", captcha_bank); ?></a>
										</li>
										<li>
											<a href="#display_settings"><?php _e("Display Settings ", captcha_bank); ?></a>
										</li>
										<li>
											<a href="#security_settings"><?php _e("Security Settings ", captcha_bank); ?></a>
										</li>
										<li>
											<a href="#message_settings"><?php _e("Message Settings ", captcha_bank); ?></a>
										</li>
									</ul>
									<div class="framework_tab-content">
										<div id="general_settings" class="framework_tab active">
											<div class="widget-layout" style="margin-bottom:0px;">
												<div class="widget-layout-title">
													<h4>
														<?php _e("General Settings", captcha_bank); ?>
													</h4>
												</div>
												<div class="widget-layout-body">
													<div class="layout-control-group">
														<label class="layout-control-label">
														<?php _e("Captcha Title", captcha_bank); ?> : <span class="error">*</span>
															<span class="hovertip" data-original-title ='<?php _e("Allows you to add Title for the Captcha which is displayed above the Captcha Image.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha ">
												 			<input type="text" class="layout-span11" id="ux_txt_title" name="ux_txt_title" value="<?php _e( $captcha_title,captcha_bank); ?>" placeholder="<?php _e( "Enter the title for your captcha here.",captcha_bank); ?>"/>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Captcha Tooltip", captcha_bank); ?> : <span class="error">*</span>
															<span class="hovertip" data-original-title ='<?php _e("Allows you to add Tooltip for Captcha which would be displayed when you hover on the Captcha Image.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha">
															<input type="text" class="layout-span11" id="ux_txt_tooltip" name="ux_txt_tooltip" value="<?php _e($captcha_tooltip,captcha_bank); ?>" placeholder="<?php _e( "Enter the tooltip for your captcha.",captcha_bank); ?>"/>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Captcha Characters", captcha_bank); ?> : <span class="error">*</span>
															<span class="hovertip" data-original-title ='<?php _e("Allows you to enter the number of characters to be displayed on Captcha Image.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha ">
														 	<input type="text" class="layout-span11" id="ux_txt_char" onkeypress="return OnlyNumbers(event)" name="ux_txt_char" value="<?php echo $captcha_characters;?>" placeholder="<?php _e( "Enter the number of characters you want to display on your captcha.",captcha_bank); ?>" />
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Captcha Type", captcha_bank); ?> : 
															<span class="hovertip" data-original-title ='<?php _e("Allows you to select type of Captcha to be displayed i.e. Only alphabets, Only Digits and both Alphabets and Digits.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha ">
														 	<select name="ux_ddl_action" id="ux_ddl_action" class="layout-span11">
																<option value="both">
																	<?php _e("Alphabets And Digits", captcha_bank ); ?>
																</option>
																<option value="alphabets">
																	<?php _e("Only Alphabets",captcha_bank ); ?>
																</option>
																<option value="digits" >
																	<?php _e("Only Digits ", captcha_bank); ?>
																</option>
															</select>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Text Case", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Allows you to set type of Captcha characters in three different cases i.e. Upper Case, Lower Case or Ramdom.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha rdl_captcha">
															<?php 
																if($text_case == "upper")
																{
																	?>
																	<input type="radio" id="ux_rdl_upper" name= "ux_rdl_text_case" checked="checked" value="upper" > <?php _e("Upper", captcha_bank ); ?>
																	<input type="radio" id="ux_rdl_lower" name= "ux_rdl_text_case" value="lower" > <?php _e("Lower", captcha_bank ); ?>
																	<input type="radio" id="ux_rdl_random" name= "ux_rdl_text_case" value="random" > <?php _e("Random", captcha_bank ); ?>
																	<?php
																}
																elseif($text_case == "lower")
																{
																	?>
																	<input type="radio" id="ux_rdl_upper" name= "ux_rdl_text_case" value="upper" > <?php _e( "Upper", captcha_bank ); ?>
																	<input type="radio" id="ux_rdl_lower" name= "ux_rdl_text_case" checked="checked" value="lower" > <?php _e( "Lower", captcha_bank ); ?>
																	<input type="radio" id="ux_rdl_random" name= "ux_rdl_text_case" value="random" > <?php _e( "Random", captcha_bank ); ?>
																	<?php 
																}
																else
																{
																	?>
																	<input type="radio" id="ux_rdl_upper" name= "ux_rdl_text_case" value="upper" > <?php _e( "Upper", captcha_bank ); ?>
																	<input type="radio" id="ux_rdl_lower" name= "ux_rdl_text_case" value="lower" > <?php _e( "Lower", captcha_bank ); ?>
																	<input type="radio" id="ux_rdl_random" name= "ux_rdl_text_case" checked="checked" value="random" > <?php _e( "Random", captcha_bank ); ?>
																	<?php 
																}
															?>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Captcha Width", captcha_bank); ?> : <span class="error">*</span>
															<span class="hovertip" data-original-title ='<?php _e("Allows you to set the width of Captcha Image as per the requirement.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha ">
														 	<input type="text" class="layout-span11" id="ux_txt_width" onkeypress="return OnlyNumbers(event)" name="ux_txt_width" value="<?php  echo $captcha_width;?>" placeholder="<?php _e( "Enter the width for the captcha image.",captcha_bank); ?>"/>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Captcha Height", captcha_bank); ?> : <span class="error">*</span>
															<span class="hovertip" data-original-title ='<?php _e("Allows you to set the height of Captcha Image as per the requirement.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha ">
														 	<input type="text" class="layout-span11" id="ux_txt_height" onkeypress="return OnlyNumbers(event)" name="ux_txt_height" value="<?php echo  $captcha_height; ?>" placeholder="<?php _e( "Enter the height for the captcha image.",captcha_bank); ?>"/>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Case Sensitive", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Allows you make the Captcha text Case Sensitive while typing the Captcha Code.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span> 
														</label>
														<div class="layout-controls custom-layout-controls-captcha rdl_captcha">
															<input type="checkbox" id="ux_chk_case" value="1" <?php echo $captcha_case_sensitive == "1" ? "checked=\"checked\"" : "";?> /><label class="wpcb-layout-controls-label"><?php _e("Yes, make it case sensitive.", captcha_bank); ?>  </label>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Captcha Preview", captcha_bank); ?> : 
															<span class="hovertip" data-original-title ='<?php _e("Allows you to preview the Captcha Image once the above settings are saved.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha">
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
															<span class="error_note">
																<?php _e("Note* : Click on the Save Changes Button in order to view the Captcha Preview.", captcha_bank); ?> 
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="display_settings" class="framework_tab">
											<div class="widget-layout" style="margin-bottom:0px;">
												<div class="widget-layout-title">
													<h4><?php _e("Display Settings", captcha_bank); ?></h4>
												</div>
												<div class="widget-layout-body">
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Enable Captcha For", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Allows you to display Captcha on Login Form, Registration Form, Comment Form, Admin Comment Form, Contact Bank Form, Reset Password Form and Hide Captcha for Registered User.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha rdl_captcha">
															<span class="check-bottom">
																<input type="checkbox" id="ux_chk_log" <?php echo $captcha_for_login == "1" ? "checked=\"checked\"" : "";?>/>
																<label class="wpcb-layout-controls-label">
																	<?php _e("Login Form", captcha_bank); ?>
																</label>
															</span>
															<span class="check-bottom">
																<input type="checkbox" id="ux_chk_reg" <?php echo $captcha_for_register == "1" ? "checked=\"checked\"" : ""; ?>/>
																<label class="wpcb-layout-controls-label">
																	<?php _e("Registration Form", captcha_bank); ?>
																</label>
															</span>
															<span class="check-bottom">
																<input type="checkbox" id="ux_chk_reset" <?php echo $captcha_for_reset_password == "1" ? "checked=\"checked\"" : ""; ?> disabled="disabled"/>
																<label class="wpcb-layout-controls-label">
																	<?php _e("Reset Password Form", captcha_bank); ?><i class="premium_error_note"><?php _e(" (Available in Premium Editions)", captcha_bank); ?></i>
																</label>
															</span>
															<span class="check-bottom">
																<input type="checkbox"  id="ux_chk_comment" <?php echo $captcha_for_comment == "1" ? "checked=\"checked\"" : ""; ?> disabled="disabled"/>
																<label class="wpcb-layout-controls-label">
																	<?php _e("Comment Form", captcha_bank); ?><i class="premium_error_note"><?php _e(" (Available in Premium Editions)", captcha_bank); ?></i>
																</label>
															</span>
															<span class="check-bottom">
																<input type="checkbox"  id="ux_chk_admin_comment" <?php echo $captcha_for_admin_comment == "1" ? "checked=\"checked\"" : ""; ?> disabled="disabled"/>
																<label class="wpcb-layout-controls-label">
																	<?php _e("Admin Comment Form", captcha_bank); ?><i class="premium_error_note"><?php _e(" (Available in Premium Editions)", captcha_bank); ?></i>
																</label>
															</span>
															<span class="check-bottom">
																<input type="checkbox"  id="ux_chk_contact" <?php echo $captcha_for_contact_bank == "1" ? "checked=\"checked\"" : ""; ?> disabled="disabled"/>
																<label class="wpcb-layout-controls-label">
																	<?php _e("Contact Bank Form", captcha_bank); ?><i class="premium_error_note"><?php _e(" (Available in Premium Editions)", captcha_bank); ?></i>
																</label>
															</span>
															<span class="check-bottom">
																<input type="checkbox" id="ux_chk_hide" <?php echo $hide_captcha_for_reg_user == "1" ? "checked=\"checked\"" : ""; ?> disabled="disabled"/>
																<label class="wpcb-layout-controls-label">
																	<?php _e("Hide Captcha for Registered User", captcha_bank); ?><i class="premium_error_note"><?php _e(" (Available in Premium Editions)", captcha_bank); ?></i>
																</label>
															</span>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Captcha Preview", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Allows you to preview the Captcha Image once the above settings are saved.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha">
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
															<span class="error_note">
																<?php _e("Note* : Click on the Save Changes Button in order to view the Captcha Preview.", captcha_bank); ?> 
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="layout_settings" class="framework_tab">
											<div class="widget-layout" style="margin-bottom:0px;">
												<div class="widget-layout-title">
													<h4><?php _e("Layout Settings", captcha_bank); ?><i class="premium_error_note"><?php _e(" (Available in Premium Editions)", captcha_bank); ?></i></h4>
												</div>
												<div class="widget-layout-body">
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Captcha Background", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Allows you to set Background Image for the Captcha.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha ">
														 	<select name="ux_ddl_background" id="ux_ddl_background" onchange ="captcha_background();" class="layout-span11">
																<option disabled="disabled" value= "bg1.gif">Pattern 1</option>
																<option disabled="disabled" value= "bg2.gif">Pattern 2</option>
																<option disabled="disabled" value= "bg3.jpg">Pattern 3</option>
																<option disabled="disabled" selected="selected" value= "bg4.jpg">Pattern 4</option>
																<option disabled="disabled" value= "bg5.jpg">Pattern 5</option>
																<option disabled="disabled" value= "bg6.png">Pattern 6</option>
																<option disabled="disabled" value= "bg7.gif">Pattern 7</option>
																<option disabled="disabled" value= "bg8.gif">Pattern 8</option>
																<option disabled="disabled" value= "bg9.gif">Pattern 9</option>
																<option disabled="disabled" value= "bg10.gif">Pattern 10</option>
																<option disabled="disabled" value= "bg11.gif">Pattern 11</option>
																<option disabled="disabled" value= "bg12.gif">Pattern 12</option>
																<option disabled="disabled" value= "bg13.gif">Pattern 13</option>
																<option disabled="disabled" value= "bg14.gif">Pattern 14</option>
																<option disabled="disabled" value= "bg15.gif">Pattern 15</option>
																<option disabled="disabled" value= "bg16.gif">Pattern 16</option>
																<option disabled="disabled" value= "bg17.jpg">Pattern 17</option>
																<option disabled="disabled" value= "bg18.png">Pattern 18</option>
															</select>
															<img  id= "captcha_background_image" src="<?php echo WP_CAPTCHA_BK_PLUGIN_REF . '/backgrounds/'.$captcha_background?>" style="margin-top:10px" height="50" width="200" />
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Show Border", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Allows you to set Border with different size and color for the Captcha Image.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha rdl_captcha">
															<?php
																if($show_border == "1")
																{
																	?>
																	<input type="radio" id="ux_rdl_enable_border" name= "ux_rdl_enable_border" checked="checked" onclick="enable_border();" value="1" disabled="disabled" > <?php _e( "Enable", captcha_bank ); ?>
																	<input type="radio" style="margin-left:10px;" id="ux_rdl_enable_border" name="ux_rdl_enable_border" onclick="enable_border();" value="0" disabled="disabled" > <?php _e( "Disable", captcha_bank ); ?>
																	<?php
																}
																else
																{
																	?>
																	<input type="radio" id="ux_rdl_enable_border" name= "ux_rdl_enable_border" onclick="enable_border();" value="1" disabled="disabled" > <?php _e( "Enable", captcha_bank ); ?>
																	<input type="radio" style="margin-left:10px;" id="ux_rdl_enable_border" name="ux_rdl_enable_border" checked="checked" onclick="enable_border();" value="0" disabled="disabled"> <?php _e( "Disable", captcha_bank ); ?>
																	<?php
																}
																?>
														</div>
													</div>
													<div class="layout-control-group" id="ux_div_show_border" style="display: none;">
														<div class="layout-control-group">
															<label class="layout-control-label">
																<?php _e("Border Size", captcha_bank); ?> : <span class="error">*</span>
															</label>
															<div class="layout-controls custom-layout-controls-captcha">
																<input type="text" class="layout-span11" id="ux_txt_border_size" name="ux_txt_border_size"  onkeypress="return OnlyNumbers(event)" value="<?php echo $border_size ; ?>" placeholder="<?php _e( "Enter the border size for your captcha image.",captcha_bank); ?>"/>
															</div>
														</div>
														<div class="layout-control-group">
															<label class="layout-control-label">
																<?php _e("Border Color", captcha_bank); ?> : <span class="error">*</span>
															</label>
															<div class="layout-controls custom-layout-controls-captcha">
																<input type="text" class="layout-span11" name="ux_txt_border_color" id="ux_txt_border_color" placeholder="<?php _e( "Select the color for Border on Captcha.",captcha_bank); ?>"
																onclick="ux_clr_border_text();" value="<?php echo $border_color;?>" style="background-color:<?php echo $border_color;?>;"/>
																<img onclick="ux_clr_border_text();" style="vertical-align: middle;margin-left: 5px;"
																src="<?php echo plugins_url("/assets/images/color.png" , dirname(__FILE__)) ?>"/>
																<div id="clr_text_border_color"></div>
															</div>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Show Lines", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Allows you to set different colors and number of lines on the Captcha Image.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha rdl_captcha">
															<?php
																if($show_lines == "1")
																{
																	?>
																	<input type="radio" id="ux_rdl_enable_lines" name= "ux_rdl_enable_lines" checked="checked" onclick="enable_lines();" value="1" disabled="disabled"> <?php _e( "Enable", captcha_bank ); ?>
																	<input type="radio" style="margin-left:10px;" id="ux_rdl_disable_lines" name="ux_rdl_enable_lines" onclick="enable_lines();" value="0" disabled="disabled"> <?php _e( "Disable", captcha_bank ); ?>
																	<?php
																}
																else
																{
																	?>
																	<input type="radio" id="ux_rdl_enable_lines" name= "ux_rdl_enable_lines" onclick="enable_lines();" value="1" disabled="disabled"> <?php _e( "Enable", captcha_bank ); ?>
																	<input type="radio" style="margin-left:10px;" id="ux_rdl_disable_lines" name="ux_rdl_enable_lines" checked="checked" onclick="enable_lines();" value="0" disabled="disabled"> <?php _e( "Disable", captcha_bank ); ?>
																	<?php
																}
																?>
														</div>
													</div>
													<div class="layout-control-group" id="ux_div_show_lines" style="display: none;">
														<div class="layout-control-group">
															<label class="layout-control-label">
																<?php _e("No of Lines", captcha_bank); ?> : <span class="error">*</span> 
															</label>
															<div class="layout-controls custom-layout-controls-captcha">
																<input type="text" class="layout-span11" id="ux_txt_line" name="ux_txt_line"  onkeypress="return OnlyNumbers(event)" value="<?php echo $no_of_lines ; ?>" placeholder="<?php _e( "Enter the number of lines you want to show on your captcha image.",captcha_bank); ?>" />
															</div>
														</div>
														<div class="layout-control-group">
															<label class="layout-control-label">
																<?php _e("Line Color", captcha_bank); ?> : <span class="error">*</span> 
															</label>
															<div class="layout-controls custom-layout-controls-captcha">
																<input type="text" class="layout-span11" name="ux_txt_lcolor" id="ux_txt_lcolor" placeholder="<?php _e( "Select the color for Lines on Captcha.",captcha_bank); ?>"
																onclick="ux_clr_ltext();" value="<?php echo $lines_color;?>" style="background-color:<?php echo $lines_color;?>;"/>
																<img onclick="ux_clr_ltext();" style="vertical-align: middle;margin-left: 5px;"
																src="<?php echo plugins_url("/assets/images/color.png" , dirname(__FILE__)) ?>"/>
																<div id="clr_text_lcolor"></div>
															</div>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Show Noise", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Allows you to set different colors and number of dots on the Captcha Image.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha rdl_captcha">
																<?php
																if($show_noise == "1")
																{
																	?>
																	<input type="radio" id="ux_rdl_enable_noise" name= "ux_rdl_show_noise" checked="checked" onclick="enable_noise();" value="1" disabled="disabled"> <?php _e("Enable", captcha_bank); ?>
																	<input type="radio" id="ux_rdl_disable_noise"  style="margin-left:10px;" name="ux_rdl_show_noise" onclick="enable_noise();" value="0" disabled="disabled"> <?php _e("Disable", captcha_bank); ?>
																	<?php
																}
																else
																{
																	?>
																	<input type="radio" id="ux_rdl_enable_noise" name= "ux_rdl_show_noise" onclick="enable_noise();" value="1" disabled="disabled"> <?php _e("Enable", captcha_bank ); ?>
																	<input type="radio" id="ux_rdl_disable_noise" style="margin-left:10px;" name="ux_rdl_show_noise" checked="checked" onclick="enable_noise();" value="0" disabled="disabled"> <?php _e("Disable", captcha_bank ); ?>
																	<?php
																}
																?>	
														</div>
													</div>
													<div class="layout-control-group" id="ux_div_show_noise" style="display: none;">
														<div class="layout-control-group">
															<label class="layout-control-label">
																<?php _e("Noise Level", captcha_bank); ?> : <span class="error">*</span>
															</label>
															<div class="layout-controls custom-layout-controls-captcha">
																<input type="text" class="layout-span11" id="ux_txt_noise" name="ux_txt_noise"  onkeypress="return OnlyNumbers(event)" value="<?php echo $noise_level;?>" placeholder="<?php _e( "Enter the number of noise or dots you want to show on your captcha image.",captcha_bank); ?>"/>
															</div>
														</div>
														<div class="layout-control-group">
															<label class="layout-control-label">
																<?php _e("Noise Color", captcha_bank); ?> : <span class="error">*</span>
															 </label>
															<div class="layout-controls custom-layout-controls-captcha">
																<input type="text" class="layout-span11" name="ux_txt_ncolor" id="ux_txt_ncolor" placeholder="<?php _e( "Select the color for Noise/Dots on Captcha.",captcha_bank); ?>"
																onclick="ux_clr_ntext();" value="<?php echo $noise_color;?>" style="background-color:<?php echo $noise_color;?> ;"/>
																<img onclick="ux_clr_ntext();" style="vertical-align: middle;margin-left: 5px;"
																src="<?php echo plugins_url("/assets/images/color.png" , dirname(__FILE__)) ?>"/>
																<div id="clr_text_ncolor"></div>
															</div>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Text Transparency", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Allows you to set the transparency of the Captcha text in percentage as per the requirement.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha rdl_captcha">
															<?php
																if($text_trasparency== "1")
																{
																	?>
																	<input type="radio" id="ux_rdl_enable_transprancy" name= "ux_rdl_enable_transprancy" checked="checked"  onclick="enable_text();"  value="1" disabled="disabled"> <?php _e( "Enable", captcha_bank ); ?>
																	<input type="radio" id="ux_rdl_disable_transprancy" style="margin-left:10px;" name="ux_rdl_enable_transprancy" onclick="enable_text();"   value="0" disabled="disabled"> <?php _e( "Disable", captcha_bank ); ?>
																	<?php
																}
																else
																{
																	?>
																	<input type="radio" id="ux_rdl_enable_transprancy" name= "ux_rdl_enable_transprancy" onclick="enable_text();"  value="1" disabled="disabled"> <?php _e( "Enable", captcha_bank ); ?>
																	<input type="radio" id="ux_rdl_disable_transprancy"  style="margin-left:10px;" name="ux_rdl_enable_transprancy" checked="checked" onclick="enable_text();"  value="0" disabled="disabled"> <?php _e( "Disable", captcha_bank ); ?> 
																	<?php
																}
																?>
														</div>
													</div>
													<div class="layout-control-group" id="ux_div_show_per" style="display: none;">
														<div class="layout-control-group">
															<label class="layout-control-label">
																<?php _e("Percentage", captcha_bank); ?> : <span class="error">*</span> 
															</label>
															<div class="layout-controls custom-layout-controls-captcha">
																<input type="text" class="layout-span11" id="ux_txt_per" name="ux_txt_per" onblur="set_text_value('tranparency_percentage')" onkeyup="set_text_value('tranparency_percentage')" onkeypress="return OnlyNumbers(event)" value="<?php echo $trasparency_percentage; ?>" placeholder="<?php _e( "Enter the text transprancy percentage (1 to 100 ) for your captcha image here.",captcha_bank); ?>"/>
															</div>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Signature", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Allows you to set the Captcha Signature (a small text) below the captcha characters.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha rdl_captcha">
															<?php
																if($show_signature == "1")
																{
																	?>
																	<input type="radio" id="ux_rdl_enable_signature" name= "ux_rdl_enable_signature" onclick= "enable_sign();" checked="checked" value="1" disabled="disabled"> <?php _e( "Enable", captcha_bank ); ?>
																	<input type="radio" id="ux_rdl_disable_signature" style="margin-left:10px;" name="ux_rdl_enable_signature" onclick= "enable_sign();" value="0" disabled="disabled"> <?php _e( "Disable", captcha_bank ); ?>
																	<?php
																}
																else
																{
																	?>
																	<input type="radio" id="ux_rdl_enable_signature" name= "ux_rdl_enable_signature" onclick= "enable_sign();" value="1" disabled="disabled"> <?php _e( "Enable", captcha_bank ); ?>
																	<input type="radio" id="ux_rdl_disable_signature"style="margin-left:10px;"  name="ux_rdl_enable_signature" checked="checked" onclick= "enable_sign();" value="0" disabled="disabled"> <?php _e( "Disable", captcha_bank ); ?>
																	<?php
																}
																?>
														</div>
													</div>
													<div class="layout-control-group" id="ux_div_show_sigtext" style="display: none;">
														<div class="layout-control-group">
															<label class="layout-control-label">
																<?php _e("Signature Text", captcha_bank); ?> : <span class="error">*</span>
															</label>
															<div class="layout-controls custom-layout-controls-captcha">
																<input type="text" class="layout-span11" id="ux_txt_sig" name="ux_txt_sig" value="<?php echo $signature;?>" placeholder="<?php _e( "Enter the signature text for your captcha image here.",captcha_bank); ?>"/>
															</div>
														</div>
														<div class="layout-control-group">
															<label class="layout-control-label">
																<?php _e("Signature Color ", captcha_bank); ?> : <span class="error">*</span>
															</label>
															<div class="layout-controls custom-layout-controls-captcha">
																<input type="text" class="layout-span11" name="ux_txt_bcolor" id="ux_txt_bcolor" placeholder="<?php _e( "Select the color for Signature on Captcha.",captcha_bank); ?>"
																onclick="ux_clr_btext();" value="<?php echo $signature_color ;?>" style="background-color:<?php echo $signature_color;?>;"/>
																<img onclick="ux_clr_btext();" style="vertical-align: middle;margin-left: 5px;"
																src="<?php echo plugins_url("/assets/images/color.png" , dirname(__FILE__));?>"/>
																<div id="clr_text_bcolor"></div>
															</div>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Captcha Preview", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Allows you to preview the Captcha Image once the above settings are saved.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha">
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
														<span class="error_note"><?php _e("Note* : Click on the Save Changes Button in order to view the Captcha Preview.", captcha_bank); ?> </span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="font_settings" class="framework_tab">
											<div class="widget-layout" style="margin-bottom:0px;">
												<div class="widget-layout-title">
													<h4><?php _e("Font Settings", captcha_bank); ?><i class="premium_error_note"><?php _e(" (Available in Premium Editions)", captcha_bank); ?></i></h4>
												</div>
												<div class="widget-layout-body">
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Font Family", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Allows you to select Font Family for the Captcha Text.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha ">
														 	<select name="ux_ddl_font_family" id="ux_ddl_font_family" class="layout-span11">
																<option disabled="disabled" selected="selected" value="AHGBold.ttf">Alte Haas Grotesk</option>
																<option disabled="disabled" value="coopbl.ttf">Cooper Black</option>
																<option disabled="disabled" value="segoepr.ttf">Segoe Print</option>
																<option disabled="disabled" value="tahomabd.ttf">Tahoma</option>
																<option disabled="disabled" value="trebuc.ttf">Trebuchet MS</option>
																<option disabled="disabled" value="verdana.ttf">Verdana</option>
															</select>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Font Size", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Allows you to select Font Size for the Captcha Text.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span> 
														</label>
														<div class="layout-controls custom-layout-controls-captcha ">
														 	<select name="ux_ddl_font_size" id="ux_ddl_font_size" class="layout-span11">
														 	<?php
																for ($flag1 = 8; $flag1 <= 30; $flag1++)
																{
																	?>
																	<option 
																		<?php if ($flag1 == $font_size) echo "selected=\"selected\"" ?>
																		value="<?php echo $flag1;?>" disabled="disabled"><?php echo $flag1; ?>
																	</option>
																	<?php
																	$flag1++;
																}
															?>
															</select>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Font Color", captcha_bank); ?> : <span class="error">*</span>
															<span class="hovertip" data-original-title ='<?php _e("Allows you to select Font Color for the Captcha text making it more creative and attractive.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha">
															<input type="text" class="layout-span11" name="ux_txt_color" id="ux_txt_color" disabled="disabled" placeholder="<?php _e( "Select the color for Captcha Text.",captcha_bank); ?>"
																onclick="ux_clr_text();" value="<?php echo $captcha_text_color;?>" style="background-color:<?php echo $captcha_text_color;?>;"/>
																<img onclick="ux_clr_text();" style="vertical-align: middle;margin-left: 5px;"
																src="<?php echo plugins_url("/assets/images/color.png" , dirname(__FILE__)) ?>"/>
															<div id="clr_text_color"></div>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Captcha Preview", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Allows you to preview the Captcha Image once the above settings are saved.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha">
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
														<span class="error_note"><?php _e("Note* : Click on the Save Changes Button in order to view the Captcha Preview.", captcha_bank); ?> </span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="security_settings" class="framework_tab">
											<div class="widget-layout" style="margin-bottom:0px;">
												<div class="widget-layout-title">
													<h4><?php _e("Security Settings", captcha_bank); ?><i class="premium_error_note"><?php _e(" (Available in Premium Editions)", captcha_bank); ?></i></h4>
												</div>
												<div class="widget-layout-body">
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Auto IP Block", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Allows you to Blocks IP addresses for next 24 hours when the limit of login attempts is reached.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha rdl_captcha">
														<?php
															if($auto_ip_block == "1")
															{
																?>
																<input type="radio" id="ux_rdl_enable_auto_ip" name= "ux_rdl_enable_auto_ip" onclick= "enable_auto_ip();" checked="checked" value="1" disabled="disabled"> <?php _e( "Enable", captcha_bank ); ?>
																<input type="radio" id="ux_rdkl_disable_auto_ip" style="margin-left:10px;" name="ux_rdl_enable_auto_ip" onclick= "enable_auto_ip();" value="0" disabled="disabled"> <?php _e( "Disable", captcha_bank ); ?>
																<?php
															}
															else
															{
																?>
																<input type="radio" id="ux_rdl_enable_auto_ip" name= "ux_rdl_enable_auto_ip" onclick= "enable_auto_ip();" value="1" disabled="disabled"> <?php _e( "Enable", captcha_bank ); ?>
																<input type="radio" id="ux_rdl_disable_auto_ip" style="margin-left:10px;" name="ux_rdl_enable_auto_ip" checked="checked" onclick= "enable_auto_ip();" value="0" disabled="disabled"> <?php _e( "Disable", captcha_bank ); ?>
																<?php
															}
															?>
														</div>
													</div>
													<div class="layout-control-group" id="ux_div_show_attempts" style="display: none;">
														<div class="layout-control-group">
															<label class="layout-control-label">
																<?php _e("Max Login Attempts", captcha_bank); ?> : <span class="error">*</span>
																<span class="hovertip" data-original-title ='<?php _e("Allows you to set number of login attempts left for the user incase Captcha code is left empty or filled invalid.",captcha_bank) ;?>'>
																	<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
																</span>
															</label>
															<div class="layout-controls custom-layout-controls-captcha">
																<input type="text" class="layout-span11" id="ux_txt_login_attempts" name="ux_txt_login_attempts"  disabled="disabled" onkeypress="return OnlyNumbers(event)" value="<?php echo $max_login_attempts;?>" placeholder="<?php _e( "Enter the number of login attempts for the user.",captcha_bank); ?>"/>
															</div>
														</div>
													</div>
														<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Block IP Address", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Allows you to add single IP Addresses for blocking it that are considered undesirable or hostile.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha ">
															<input disabled="disabled" type="text" class="layout-span8" id="ux_txt_block_ip" onkeypress ="return OnlyDigitsDots(event);" name="ux_txt_block_ip" maxlength="15" placeholder="<?php _e( "Enter the IP Address here which you want to block.",captcha_bank); ?>"/>
															<input type="button" value="<?php _e("Add Block IP Address", captcha_bank); ?>" onclick="add_block_ip();" class="btn btn-success" />
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Blocked IP Addresses", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Blocked IP Addresses shows the complete list of IP Addresses that are blocked by the user. You can also delete these IP Addresses by selecting (multiple) it and the click on Delete Button.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha ">
														 	<select multiple="multiple" name="ux_ddl_blocked_ip" id="ux_ddl_blocked_ip" class="layout-span11" disabled="disabled">
															</select>
															<input type="button" value="<?php _e("Delete Block IP Addresses", captcha_bank); ?>" class="btn btn-success" onclick="delete_block_ip();" style=" margin-top: 12px;"/>
														</div>
													</div>
													<div class="layout-control-group">
															<label class="layout-control-label">
																<?php _e("Block Start IP Range", captcha_bank); ?> :
																<span class="hovertip" data-original-title ='<?php _e("Allows you to enter Start IP Address of the IP Address Range to be blocked.",captcha_bank) ;?>'>
																	<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
																</span>
															</label>
															<div class="layout-controls custom-layout-controls-captcha ">
																<input disabled="disabled" type="text" class="layout-span11" id="ux_txt_start_ip" name="ux_txt_start_ip" maxlength="15" placeholder="<?php _e( "Enter the Start IP Range to be blocked.",captcha_bank); ?>"/>
															</div>
														</div>
														<div class="layout-control-group">
															<label class="layout-control-label">
																<?php _e("Block End IP Range", captcha_bank); ?> :
																<span class="hovertip" data-original-title ='<?php _e("Allows you to enter End IP Address of the IP Address Range to be blocked.",captcha_bank) ;?>'>
																	<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
																</span>
															</label>
															<div class="layout-controls custom-layout-controls-captcha ">
																<input disabled="disabled" type="text" class="layout-span11" id="ux_txt_end_ip" name="ux_txt_end_ip" maxlength="15" placeholder="<?php _e( "Enter the End IP Range to be blocked.",captcha_bank); ?>" />
																<input type="button" value="<?php _e("Add Block IP Range", captcha_bank); ?>" class="btn btn-success" onclick="add_block_ip_range();" style=" margin-top: 12px;" />
															</div>
														</div>
														<div class="layout-control-group">
															<label class="layout-control-label">
																<?php _e("Blocked IP Range", captcha_bank); ?> :
																<span class="hovertip" data-original-title ='<?php _e("Blocked IP Range show the list of all the IP Addresses range that are blocked by the user. You can also delete these IP Addresses by selecting (multiple) it and the click on Delete Button.",captcha_bank) ;?>'>
																	<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
																</span>
															</label>
															<div class="layout-controls custom-layout-controls-captcha ">
															 	<select multiple="multiple" name="ux_ddl_blocked_ip_range" id="ux_ddl_blocked_ip_range" class="layout-span11" disabled="disabled">
																</select>
																<input type="button" value="<?php _e("Delete Block IP Range", captcha_bank); ?>" onclick="delete_block_ip_range();" class="btn btn-success" style=" margin-top: 12px;"/>
															</div>
														</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Captcha Preview", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Allows you to preview the Captcha Image once the above settings are saved.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha">
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
														<span class="error_note"><?php _e("Note* : Click on the Save Changes Button in order to view the Captcha Preview.", captcha_bank); ?> </span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="message_settings" class="framework_tab">
											<div class="widget-layout" style="margin-bottom:0px;">
												<div class="widget-layout-title">
													<h4><?php _e("Message Settings", captcha_bank); ?><i class="premium_error_note"><?php _e(" (Available in Premium Editions)", captcha_bank); ?></i></h4>
												</div>
												<div class="widget-layout-body">
													<div class="layout-control-group">
														<label class="layout-control-label-captcha">
															<?php _e("Captcha Empty Error", captcha_bank); ?> : <span class="error">*</span>
															<span class="hovertip" data-original-title ='<?php _e("Allows you to set error message for captcha which is displayed when user fills the Captcha code empty.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha ">
												 			<textarea  disabled="disabled" class="layout-span11" id="ux_txt_empty_err" name="ux_txt_empty_err" placeholder="<?php _e( "Enter the error message here for the users who fill the captcha code empty.",captcha_bank); ?>"><?php _e( $captcha_empty_msg,captcha_bank); ?></textarea>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label-captcha">
															<?php _e("Captcha Invalid Error", captcha_bank); ?> : <span class="error">*</span>
															<span class="hovertip" data-original-title ='<?php _e("Allows you to set error message for captcha which is displayed when user fills the Captcha code invalid.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha">
															<textarea disabled="disabled" class="layout-span11" id="ux_txt_invalid_err" name="ux_txt_invalid_err" placeholder="<?php _e( "Enter the error message here for the users who fill the captcha code invalid.",captcha_bank); ?>"><?php _e( $captcha_invalid_msg,captcha_bank); ?></textarea>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("IP Block Message", captcha_bank); ?> : <span class="error">*</span>
															<span class="hovertip" data-original-title ='<?php _e("Allows you to set error message when IP Address is blocked from Login Logs or from Security Settings.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha ">
												 			<textarea disabled="disabled" class="layout-span11" id="ux_txt_blockip_err" name="ux_txt_blockip_err" placeholder="<?php _e( "Enter the error message here when the IP is Blocked.",captcha_bank); ?>"><?php _e( $ip_block_msg,captcha_bank); ?></textarea>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label-captcha">
															<?php _e("Max Login Attempts", captcha_bank); ?> : <span class="error">*</span>
															<span class="hovertip" data-original-title ='<?php _e("Allows you to set error message for login attempts left incase the Captcha code is left empty or filled invalid by the user.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha">
															<textarea disabled="disabled" class="layout-span11" id="ux_txt_login_attempts_err" name="ux_txt_login_attempts_err" placeholder="<?php _e( "Enter the error message here for Maxium login Attempts.",captcha_bank); ?>"><?php _e( $max_login_msg,captcha_bank); ?></textarea>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label-captcha">
															<?php _e("Max Login Exceeded Error", captcha_bank); ?> : <span class="error">*</span>
															<span class="hovertip" data-original-title ='<?php _e("Allows you to set error message which is displayed when the user exceed the maximum login attempts and the IP gets blocked for 24 hours.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha">
															<textarea disabled="disabled" class="layout-span11" id="ux_txt_login_exceeded_err" name="ux_txt_login_exceeded_err" rows="4" placeholder="<?php _e( "Enter the error message here for Maxium login Exceeded.",captcha_bank); ?>"><?php _e( $max_login_exceeded_msg,captcha_bank); ?></textarea>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Captcha Preview", captcha_bank); ?> :
															<span class="hovertip" data-original-title ='<?php _e("Allows you to preview the Captcha Image once the above settings are saved.",captcha_bank) ;?>'>
																<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
															</span>
														</label>
														<div class="layout-controls custom-layout-controls-captcha">
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
														<span class="error_note"><?php _e("Note* : Click on the Save Changes Button in order to view the Captcha Preview.", captcha_bank); ?> </span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="separator-doubled"></div>
								<input type="submit" value="<?php _e("Save Changes", captcha_bank); ?>" class="btn btn-success" style="float:right; margin-top: 12px;"/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<script type="text/javascript">
		var captcha_settings_array = [];
		jQuery(".hovertip").tooltip({placement: "right"});
		jQuery(document).ready(function()
		{
			jQuery("#ux_ddl_action").val("<?php echo $captcha_type;?>");
		});
		
		function OnlyNumbers(evt) 
		{
			var charCode = (evt.which) ? evt.which : event.keyCode;
			return (charCode > 47 && charCode < 58) || charCode == 127 || charCode == 8;
		}
		
		function OnlyDigitsDots(evt) 
		{
			var theEvent = evt || window.event;
			var key = theEvent.keyCode || theEvent.which;
			key = String.fromCharCode( key );
			var regex = /[0-9]|\./;
			if( !regex.test(key) ) 
			{
				theEvent.returnValue = false;
				if(theEvent.preventDefault) theEvent.preventDefault();
			}
		}
		function add_block_ip()
		{
			jQuery("#top-error").remove();
			var error_message = jQuery("<div id=\"top-error\" class=\"top-right top-error\" style=\"display: block;\"><div class=\"top-error-notification\"></div><div class=\"top-error-notification ui-corner-all growl-top-error\" ><div onclick=\"message_close('top-error');\" id=\"close-top-error\" class=\"top-error-close\">x</div><div class=\"top-error-header\"><?php _e("Error!",  captcha_bank); ?></div><div class=\"top-error-top-error\"><?php _e( "This Feature is Available in Premium Editions!", captcha_bank ); ?></div></div></div>");
			jQuery("body").append(error_message);
		}
		function delete_block_ip()
		{
			jQuery("#top-error").remove();
			var error_message = jQuery("<div id=\"top-error\" class=\"top-right top-error\" style=\"display: block;\"><div class=\"top-error-notification\"></div><div class=\"top-error-notification ui-corner-all growl-top-error\" ><div onclick=\"message_close('top-error');\" id=\"close-top-error\" class=\"top-error-close\">x</div><div class=\"top-error-header\"><?php _e("Error!",  captcha_bank); ?></div><div class=\"top-error-top-error\"><?php _e( "This Feature is Available in Premium Editions!", captcha_bank ); ?></div></div></div>");
			jQuery("body").append(error_message);
		}
		function add_block_ip_range()
		{
			jQuery("#top-error").remove();
			var error_message = jQuery("<div id=\"top-error\" class=\"top-right top-error\" style=\"display: block;\"><div class=\"top-error-notification\"></div><div class=\"top-error-notification ui-corner-all growl-top-error\" ><div onclick=\"message_close('top-error');\" id=\"close-top-error\" class=\"top-error-close\">x</div><div class=\"top-error-header\"><?php _e("Error!",  captcha_bank); ?></div><div class=\"top-error-top-error\"><?php _e( "This Feature is Available in Premium Editions!", captcha_bank ); ?></div></div></div>");
			jQuery("body").append(error_message);
		}
		function ux_clr_text()
		{
			jQuery("#clr_text_color").farbtastic("#ux_txt_color");
			jQuery("#clr_text_color").slideDown();
			jQuery("#ux_txt_color").focus();
		}
		function delete_block_ip_range()
		{
			jQuery("#top-error").remove();
			var error_message = jQuery("<div id=\"top-error\" class=\"top-right top-error\" style=\"display: block;\"><div class=\"top-error-notification\"></div><div class=\"top-error-notification ui-corner-all growl-top-error\" ><div onclick=\"message_close('top-error');\" id=\"close-top-error\" class=\"top-error-close\">x</div><div class=\"top-error-header\"><?php _e("Error!",  captcha_bank); ?></div><div class=\"top-error-top-error\"><?php _e( "This Feature is Available in Premium Editions!", captcha_bank ); ?></div></div></div>");
			jQuery("body").append(error_message);	
		}
		jQuery("#ux_txt_color").blur(function ()
		{
			jQuery("#clr_text_color").slideUp()
		});
		jQuery(".framework_tabs .framework_tab-links a").on("click", function(e)
		{
			var currentAttrValue = jQuery(this).attr("href");
			// Show/Hide Tabs
			jQuery(".framework_tabs " + currentAttrValue).show().siblings().hide();
			// Change/remove current tab to active
			jQuery(this).parent("li").addClass("active").siblings().removeClass("active");
			e.preventDefault();
		});
		
		jQuery("#frm_wp_captcha_settings").validate
		({
			submitHandler: function(form)
			{
				var overlay_opacity = jQuery("<div class=\"opacity_overlay\"></div>");
				jQuery("body").append(overlay_opacity);
				var overlay = jQuery("<div class=\"loader_opacity\"><div class=\"processing_overlay\"></div></div>");
				jQuery("body").append(overlay)
				captcha_settings_array.push({"captch_title": jQuery("#ux_txt_title").val() == "" ? "<?php _e('Captcha',captcha_bank)?>" :  jQuery("#ux_txt_title").val()});
				captcha_settings_array.push({"captcha_tooltip": jQuery("#ux_txt_tooltip").val() == "" ? "<?php _e("This is your Captcha tooltip",captcha_bank)?>" : jQuery("#ux_txt_tooltip").val()});
				captcha_settings_array.push({"captcha_for_login": jQuery("#ux_chk_log").prop("checked") == true ? "1" : "0"});
				captcha_settings_array.push({"captcha_for_register": jQuery("#ux_chk_reg").prop("checked") == true ? "1" : "0"}); 
				captcha_settings_array.push({"captcha_characters": jQuery("#ux_txt_char").val() == "" ? "4" : jQuery("#ux_txt_char").val()});
				captcha_settings_array.push({"captcha_type": jQuery("#ux_ddl_action").val()});
				captcha_settings_array.push({"text_case": jQuery("input[type=radio][name=ux_rdl_text_case]:checked").val()});
				captcha_settings_array.push({"captcha_width": jQuery("#ux_txt_width").val() == "" ? "215" :  jQuery("#ux_txt_width").val()});
				captcha_settings_array.push({"captcha_height": jQuery("#ux_txt_height").val() == "" ? "80" : jQuery("#ux_txt_height").val()});
				captcha_settings_array.push({"captcha_case_sensitive": jQuery("#ux_chk_case").prop("checked") == true ? "1" : "0"});
				jQuery.post(ajaxurl, "captcha_settings_array=" + encodeURIComponent(JSON.stringify(captcha_settings_array)) +
				"&param=update_captcha_settings&action=captcha_settings_library&_wpnonce=<?php echo $settings_captcha;?>", function (data)
				{
					jQuery("body,html").animate({scrollTop: jQuery("body,html").position().top}, "slow");
					setTimeout(function () 
					{
						jQuery("#message").css("display", "block");
						jQuery(".loader_opacity").remove();
						jQuery(".opacity_overlay").remove();
					}, 2000);
					setTimeout(function ()
					{
						jQuery("#message").css("display", "none");
						window.location.href = "admin.php?page=captcha_bank";
					}, 4000);
				});
			}
		});
		if (typeof(message_close) != "function")
		{
			function message_close(id)
			{
				jQuery("#"+id).css("display", "none");
			}
		}
	</script>
<?php
}
?>