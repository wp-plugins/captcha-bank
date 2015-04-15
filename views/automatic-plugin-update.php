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
	$auto_captcha_updates = wp_create_nonce("auto_update_captcha_plugin");
	?>
	<form id="frm_auto_update" class="layout-form wpcb-page-width">
		<div class="fluid-layout">
			<div class="layout-span12">
				<div class="widget-layout wpcb-body-background">
					<div class="widget-layout-title">
						<h4>
							<?php _e("Plugin Updates", captcha_bank); ?>
						</h4>
					</div>
					<div class="widget-layout-body">
						<div class="layout-control-group" style="margin: 10px 0 0 0 ;">
							<label class="layout-control-label"><?php _e("Plugin Updates", captcha_bank); ?> :</label>
							<div class="layout-controls-radio">
								<?php $captcha_updates = get_option("captcha-bank-automatic-update");?>
								<input type="radio" name="ux_captcha_update" id="ux_enable_update" onclick="captcha_bank_autoupdate(this);" <?php echo $captcha_updates == "1" ? "checked=\"checked\"" : "";?> value="1"><label style="vertical-align: baseline;"><?php _e("Enable", captcha_bank); ?></label>
								<input type="radio" name="ux_captcha_update" id="ux_disable_update" onclick="captcha_bank_autoupdate(this);" <?php echo $captcha_updates == "0" ? "checked=\"checked\"" : "";?> style="margin-left: 10px;" value="0"><label style="vertical-align: baseline;"><?php _e("Disable", captcha_bank); ?></label>
							</div>
						</div>
						<div class="layout-control-group" style="margin:10px 0 10px 0 ;">
							<strong><i>This feature allows the plugin to update itself automatically when a new version is available on WordPress Repository.<br/>This allows to stay updated to the latest features. If you would like to disable automatic updates, choose  the disable option above.</i></strong>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<script type="text/javascript">
		function captcha_bank_autoupdate(control)
		{
			var captcha_updates = jQuery(control).val();
			jQuery.post(ajaxurl, "captcha_updates="+captcha_updates+"&param=captcha_plugin_updates&action=captcha_settings_library&_wpnonce=<?php echo $auto_captcha_updates;?>", function(data)
			{
			});
		}
	</script>
<?php
}
?>