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
	$captcha_lang = array();
	$captcha_translated_lang = array();
	
	array_push($captcha_lang, "bg_BG", "ja", "ko_KR", "ms_MY", "sl_SI", "sq_AL", "sr_RS", "es_ES", "nl_NL", "uk", "sv_SE", "fr_FR", "et", "it_IT",
	 "fi", "he_IL", "ru_RU", "be_BY", "tr", "th", "ar", "hu_HU", "cs_CZ", "pl_PL", "da_DK", "sk_SK", "zh_CN", "id_ID", "el_GR",
	"hr", "nb", "ro_RO");
	
	array_push($captcha_translated_lang, "en_GB", "en_US" , "pt_PT", "pt_BR", "de_DE");
	$language = get_locale();
	?>
	<div id="welcome-panel" class="welcome-panel" style="width:1000px;padding:0px !important;background-color: #f9f9f9 !important">
		<div class="welcome-panel-content">
			<img src="<?php echo plugins_url("/assets/images/captcha-bank.png" , dirname(__FILE__)); ?>" />
			<div class="welcome-panel-column-container">
				<div class="welcome-panel-column" style="width:240px !important;">
					<h4 class="welcome-screen-margin">
						<?php _e("Get Started", captcha_bank); ?>
					</h4>
						<a class="button button-primary button-hero" href="#">
							<?php _e("Watch Captcha Video!", captcha_bank); ?>
						</a>
						<p>or, 
							<a target="_blank" href="http://tech-banker.com/products/wp-captcha-bank/knowledge-base/">
								<?php _e("read documentation here", captcha_bank); ?>
							</a>
						</p>
				</div>
				<div class="welcome-panel-column" style="width:250px !important;">
					<h4 class="welcome-screen-margin"><?php _e("Go Premium", captcha_bank); ?></h4>
					<ul>
						<li>
							<a href="http://tech-banker.com/products/wp-captcha-bank/" target="_blank" class="welcome-icon">
								<?php _e("Features", captcha_bank); ?>
							</a>
						</li>
						<li>
							<a href="http://tech-banker.com/products/wp-captcha-bank/demo/" target="_blank" class="welcome-icon">
								<?php _e("Online Demos", captcha_bank); ?>
							</a>
						</li>
						<li>
							<a href="http://tech-banker.com/products/wp-captcha-bank/pricing/" target="_blank" class="welcome-icon">
								<?php _e("Premium Pricing Plans", captcha_bank); ?>
							</a>
						</li>
					</ul>
				</div>
				<div class="welcome-panel-column" style="width:240px !important;">
					<h4 class="welcome-screen-margin">
						<?php _e("Knowledge Base", captcha_bank); ?>
					</h4>
					<ul>
						<li>
							<a href="http://tech-banker.com/forums/forum/captcha-bank-support/" target="_blank" class="welcome-icon">
								<?php _e("Support Forum", captcha_bank); ?>
							</a>
						</li>
						<li>
							<a href="http://tech-banker.com/products/wp-captcha-bank/knowledge-base/" target="_blank" class="welcome-icon">
								<?php _e("FAQ's", captcha_bank); ?>
							</a>
						</li>
						<li>
							<a href="http://tech-banker.com/products/wp-captcha-bank/" target="_blank" class="welcome-icon">
								<?php _e("Detailed Features", captcha_bank); ?>
							</a>
						</li>
					</ul>
				</div>
				<div class="welcome-panel-column welcome-panel-last" style="width:250px !important;">
					<h4 class="welcome-screen-margin"><?php _e("More Actions", captcha_bank); ?></h4>
					<ul>
						<li>
							<a href="admin.php?page=wpcb_recommended_plugins" class="welcome-icon">
								<?php _e("Recommendations", captcha_bank); ?>
							</a>
						</li>
						<li>
							<a href="admin.php?page=wpcb_other_services" class="welcome-icon">
								<?php _e("Our Other Services", captcha_bank); ?>
							</a>
						</li>
						<li>
							<a href="http://tech-banker.com/shop/uncategorized/order-customization-wp-captcha-bank/" target="_blank" class="welcome-icon">
								<?php _e("Plugin Customization", captcha_bank); ?>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php
	if(in_array($language, $captcha_lang))
	{
		?>
		<div class="custom-message red" style="display: block;margin-top:30px;width:963px;">
			<span style="padding: 4px 0;">
				<strong>
					<p style="font:12px/1.0em Arial !important;">
						If you would like to translate & help us, we will reward you with a free Pro Version License of WP Captcha Bank worth 12£.
					</p>
					<p style="font:12px/1.0em Arial !important;">Contact Us at <a target="_blank" href="http://tech-banker.com">http://tech-banker.com</a> or email us at <a href="mailto:support@tech-banker.com">support@tech-banker.com</a></p>
				</strong>
			</span>
		</div>
		<?php
	}
	elseif(!(in_array($language, $captcha_translated_lang)) && !(in_array($language, $captcha_lang)) && $language != "")
	{
		?>
		<div class="custom-message red" style="display: block;margin-top:30px;width:963px;">
			<span style="padding: 4px 0;">
				<strong>
					<p style="font:12px/1.0em Arial !important;">
						If you would like to translate WP Captcha Bank in your native language, we will reward you with a free Pro Version License of WP Captcha Bank worth 12£.
					</p>
					<p style="font:12px/1.0em Arial !important;">Contact Us at <a target="_blank" href="http://tech-banker.com">http://tech-banker.com</a> or email us at <a href="mailto:support@tech-banker.com">support@tech-banker.com</a></p>
				</strong>
			</span>
		</div>
		<?php
	}
	?>
	<h2 class="nav-tab-wrapper" style="max-width: 1000px;">
		<a class="nav-tab coustom-nav-tab" id="captcha_bank" href="admin.php?page=captcha_bank">
			<?php _e("Captcha Settings", captcha_bank);?>
		</a>
		<a class="nav-tab coustom-nav-tab" id="wpcb_login_logs" href="admin.php?page=wpcb_login_logs">
			<?php _e("Login Logs", captcha_bank);?>
		</a>
		<a class="nav-tab coustom-nav-tab" id="wpcb_plugin_settings" href="admin.php?page=wpcb_plugin_settings">
			<?php _e("Plugin Settings", captcha_bank);?>
		</a>
		<a class="nav-tab coustom-nav-tab" id="wpcb_purchase_premium_edition" href="admin.php?page=wpcb_purchase_premium_edition">
			<?php _e("Premium Editions", captcha_bank);?>
		</a>
		<a class="nav-tab coustom-nav-tab" id="wpcb_recommended_plugins" href="admin.php?page=wpcb_recommended_plugins">
			<?php _e("Recommendations", captcha_bank);?>
		</a>
		<a class="nav-tab coustom-nav-tab" id="wpcb_other_services" href="admin.php?page=wpcb_other_services">
			<?php _e("Our Other Services", captcha_bank);?>
		</a>
	</h2>
	<script>
	jQuery(document).ready(function()
	{
		jQuery(".nav-tab-wrapper > a#<?php echo $_REQUEST["page"];?>").addClass("nav-tab-active");
	});
	</script>
	<?php 
}
?>