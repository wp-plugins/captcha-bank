<?php
global $wpdb;
global $current_user;
$current_user = wp_get_current_user();
if (!current_user_can("edit_posts") && ! current_user_can("edit_pages"))
{
	return;
}
else
{
	if(isset($_REQUEST["param"]))
	{
		if($_REQUEST["param"] == "update_settings")
		{
			$ux_label  = esc_attr($_REQUEST['ux_label']);
			$ux_tooltip  = esc_attr($_REQUEST['ux_tooltip']);
			$ux_characters  = intval($_REQUEST['ux_characters']);
			$ux_image_width  = intval($_REQUEST['ux_image_width']);
			$ux_image_height  = intval($_REQUEST['ux_image_height']);
			$ux_bg_image  = esc_attr($_REQUEST['ux_bg_image']);
			$ux_text_color  = esc_attr($_REQUEST['ux_text_color']);
			$ux_fonts  = 'AHGBold.ttf';
			$ux_case_sensitive  = isset($_REQUEST['ux_case_sensitive'])? intval($_REQUEST['ux_case_sensitive']):0;
			$ux_lines  = isset($_REQUEST['ux_lines'])? intval($_REQUEST['ux_lines']):0;
			$ux_number_of_lines  = intval($_REQUEST['ux_number_of_lines']);
			$ux_line_color  = esc_attr($_REQUEST['ux_line_color']);
			$ux_noise  = isset($_REQUEST['ux_noise'])? intval($_REQUEST['ux_noise']):0;
			$ux_noise_level  = intval($_REQUEST['ux_noise_level']);
			$ux_noise_color  = esc_attr($_REQUEST['ux_noise_color']);
			$ux_text_transparency  = isset($_REQUEST['ux_text_transparency'])? intval($_REQUEST['ux_text_transparency']):0;
			$ux_transparency_percent = intval($_REQUEST['ux_transparency_percent']);
			$ux_captcha_type = esc_attr($_REQUEST['ux_captcha_type']);
			$ux_distortion  = isset($_REQUEST['ux_distortion'])? intval($_REQUEST['ux_distortion']):0;
			$ux_distortion_level  = doubleval($_REQUEST['ux_distortion_level']);
			$ux_img_signature  = isset($_REQUEST['ux_img_signature'])? intval($_REQUEST['ux_img_signature']):0;
			$ux_signature = esc_attr($_REQUEST['ux_signature']);
			$ux_signature_color = esc_attr($_REQUEST['ux_signature_color']);
			$ux_captcha_on_login_form = isset($_REQUEST['ux_captcha_on_login_form'])? intval($_REQUEST['ux_captcha_on_login_form']):0;
			$ux_captcha_on_comment_form = isset($_REQUEST['ux_captcha_on_comment_form'])? intval($_REQUEST['ux_captcha_on_comment_form']):0;
			$ux_captcha_on_admin_comment_form = isset($_REQUEST['ux_captcha_on_admin_comment_form'])? intval($_REQUEST['ux_captcha_on_admin_comment_form']):0;
			$ux_captcha_on_register_form = isset($_REQUEST['ux_captcha_on_register_form'])? intval($_REQUEST['ux_captcha_on_register_form']):0;
			$ux_captcha_on_lostpassword_form = isset($_REQUEST['ux_captcha_on_lostpassword_form'])? intval($_REQUEST['ux_captcha_on_lostpassword_form']):0;
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_label,
					'label'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_tooltip,
					'tooltip'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_characters,
					'no_of_characters'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_image_width,
					'image_width'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_image_height,
					'image_height'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_bg_image,
					'background_image'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_text_color,
					'text_color'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_fonts,
					'fonts'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_case_sensitive,
					'case_sensitive'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_lines,
					'lines_on_image'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_number_of_lines,
					'no_of_lines'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_line_color,
					'lines_color'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_noise,
					'noise'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_noise_level,
					'noise_level'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_noise_color,
					'noise_color'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_text_transparency,
					'text_trasparency'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_transparency_percent,
					'trasparency_percentage'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_captcha_type,
					'captcha_type'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_distortion,
					'distortion'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_distortion_level,
					'distortion_level'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_img_signature,
					'image_signature'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_signature,
					'signature'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_signature_color,
					'signature_color'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_captcha_on_login_form,
					'captcha_on_login_form'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_captcha_on_comment_form,
					'captcha_on_comment_form'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_captcha_on_admin_comment_form,
					'captcha_on_admin_comment_form'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_captcha_on_register_form,
					'captcha_on_register_form'
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".captcha_bank_settings()." SET settings_value = %s  WHERE settings_key = %s",
					$ux_captcha_on_lostpassword_form,
					'captcha_on_lost_password_form'
				)
			);
			die();
		}
	}
}
?>