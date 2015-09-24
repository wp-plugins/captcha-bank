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
	if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-plugin-settings.php"))
	{
		include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-plugin-settings.php";
	}
?>
<div id="top-error" class="top-right top-error" style="display: none;">
	<div class="top-error-notification"></div>
	<div class="top-error-notification ui-corner-all growl-top-error" >
		<div onclick="error_message_close();" id="close-top-error" class="top-error-close">x</div>
		<div class="top-error-header"><?php _e("Error!",  captcha_bank); ?></div>
		<div class="top-error-top-error"><?php _e("This feature is only avaliable in Premium Versions.",  captcha_bank); ?></div>
	</div>
</div>
	<form class="layout-form wpcb-page-width" id="frm_wp_plugin_settings" method="post">
		<div class="fluid-layout wpcb-page-width">
			<div class="layout-span12">
				<div class="widget-layout">
					<div class="widget-layout-title">
						<h4>
							<?php _e("Plugin Settings", captcha_bank); ?>
							<i class="premium_error_note"><?php _e(" (Available in Premium Editions)", captcha_bank); ?></i>
						</h4>
					</div>
					<div class="widget-layout-body">
						<div class="fluid-layout">
							<div class="layout-span12 responsive">
								<div class="layout-control-group">
									<label class="layout-control-label-captcha">
										<?php _e("Show Captcha Plugin Menu", captcha_bank); ?> :
										<span class="hovertip" data-original-title ='<?php _e("Allows you to control the capabilities of WP Captcha Bank among different roles of WordPress users.",captcha_bank) ;?>'>
											<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
										</span>
									</label>
									<div class="layout-controls custom-layout-controls-captcha rdl_captcha">
										<span class="check-bottom">
											<input type="checkbox" id="ux_chk_admin" name="ux_chk_admin" disabled="disabled" value="1" <?php echo $captcha_admin_role == "1" ? "checked=\"checked\"" : "";?> />
											<label class="wpcb-layout-controls-label">
												<?php _e("Administrator", captcha_bank); ?>
											</label>
										</span>
										<span class="check-bottom">
											<input type="checkbox" id="ux_chk_editor" name="ux_chk_editor" disabled="disabled" value="1" <?php echo $captcha_editor_role == "1" ? "checked=\"checked\"" : "";?>/>
											<label class="wpcb-layout-controls-label">
												<?php _e("Editor", captcha_bank); ?>
											</label>
										</span>
										<span class="check-bottom">
											<input type="checkbox" id="ux_chk_author" name="ux_chk_author" disabled="disabled" value="1" <?php echo $captcha_author_role == "1" ? "checked=\"checked\"" : "";?>/>
											<label class="wpcb-layout-controls-label">
												<?php _e("Author", captcha_bank); ?>
											</label>
										</span>
										<span class="check-bottom">
											<input type="checkbox"  id="ux_chk_contributor" name="ux_chk_contributor" disabled="disabled" value="1" <?php echo $captcha_contributor_role == "1" ? "checked=\"checked\"" : "";?>/>
											<label class="wpcb-layout-controls-label">
												<?php _e("Contributor", captcha_bank); ?>
											</label>
										</span>
										<span class="check-bottom">
											<input type="checkbox"  id="ux_chk_admin_subscriber" name="ux_chk_admin_subscriber" disabled="disabled" value="1" <?php echo $captcha_subscriber_role == "1" ? "checked=\"checked\"" : "";?>/>
											<label class="wpcb-layout-controls-label">
												<?php _e("Subscriber", captcha_bank); ?>
											</label>
										</span>
									</div>
								</div>
								<div class="layout-control-group">
									<label class="layout-control-label-captcha">
										<?php _e("Captcha Menu Top Bar", captcha_bank); ?> :
										<span class="hovertip" data-original-title ='<?php _e("Allows you to enable or disable WP Captcha Bank for top menu bar among different roles of WordPress users.",captcha_bank) ;?>'>
											<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
										</span>
									</label>
									<div class="layout-controls custom-layout-controls-captcha rdl_captcha">
									<?php
										if($captcha_menu_top_bar == "1")
										{
											?>
											<input type="radio" id="ux_rdl_enable_border" name= "ux_rdl_enable_menu" disabled="disabled" checked="checked"  value="1" > <?php _e( "Enable", captcha_bank ); ?>
											<input type="radio" style="margin-left:10px;" id="ux_rdl_enable_border" disabled="disabled" name="ux_rdl_enable_menu" value="0" > <?php _e( "Disable", captcha_bank ); ?>
											<?php
										}
										else
										{
											?>
											<input type="radio" id="ux_rdl_enable_border" name= "ux_rdl_enable_menu" disabled="disabled" value="1" > <?php _e( "Enable", captcha_bank ); ?>
											<input type="radio" style="margin-left:10px;" id="ux_rdl_enable_border" disabled="disabled" checked="checked"  name="ux_rdl_enable_menu" value="0" > <?php _e( "Disable", captcha_bank ); ?>
											<?php
										}
										?>
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
	jQuery(".hovertip").tooltip_tip({placement: "right"});
	jQuery("#frm_wp_plugin_settings").validate
	({
		submitHandler: function(form)
		{
			jQuery("#top-error").remove();
			var premium_error = jQuery("<div id=\"top-error\" class=\"top-right top-error\" style=\"display: block;\"><div class=\"top-error-notification\"></div><div class=\"top-error-notification ui-corner-all growl-top-error\" ><div onclick=\"error_message_close();\" id=\"close-top-error\" class=\"top-error-close\">x</div><div class=\"top-error-header\"><?php _e("Error!",  captcha_bank); ?></div><div class=\"top-error-top-error\"><?php _e("This feature is available in Premium Editions!",captcha_bank) ?></div></div></div>");
			jQuery("body").append(premium_error);
		}
	});
	function error_message_close()
	{
		jQuery("#top-error").remove();
	}
	</script>
	<?php 
}
	?>