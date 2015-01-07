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
	?>
<div class="fluid-layout wpcb-page-width">
	<div class="layout-span12">
		<div class="widget-layout">
			<div class="widget-layout-title">
				<h4>
					<?php _e("Premium Editions", captcha_bank);?>
				</h4>
			</div>
			<div class="widget-layout-body">
				<div class="fluid-layout wpcb-page-width">
					<div class="layout-span12">
						<h1 style="text-align: center; margin-bottom: 40px">
							<?php _e("WP Captcha Bank is an one time Investment. Its Worth it!", captcha_bank); ?>
						</h1>
						<div id="captcha_bank_pricing" class="p_table_responsive p_table_hide_caption_column p_table_1 p_table_1_1 css3_grid_clearfix p_table_hover_disabled">
							<div class="caption_column column_0_responsive" style="width: 22.5%;">
								<ul>
									<li class="css3_grid_row_0 header_row_1 align_center css3_grid_row_0_responsive radius5_topleft">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align"></span> 
										</span>
									</li>
									<li class="css3_grid_row_1 header_row_2 css3_grid_row_1_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<h2 class="caption">
													<?php _e("choose", captcha_bank); ?>
													<span> 
														<?php _e("your", captcha_bank); ?>
													</span> 
													<?php _e("plan", captcha_bank); ?>
												</h2>
											</span> 
										</span>
									</li>
									<li class="css3_grid_row_2 row_style_4 css3_grid_row_2_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Domains per License", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Number of websites that can use the plugin on purchase of a License.", captcha_bank); ?>
														</span>
														<?php _e("Domains per License", captcha_bank); ?>
													</span> 
												</span> 
											</span> 
										</span>
									</li>
									<li class="css3_grid_row_3 row_style_2 css3_grid_row_3_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Multisite Compatibility", captcha_bank); ?>*
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Allows you to use this Plugin with network of sites / Multisites WordPress. But you need to have separate license for each domain.", captcha_bank); ?>
														</span>
														<?php _e("Multisite Compatibility", captcha_bank); ?>*
													</span> 
												</span>
											</span> 
										</span>
									</li>
									<li class="css3_grid_row_3 row_style_4 css3_grid_row_3_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Technical Support", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Technical Support by the Development Team for Installation, Bug Fixing, Plugin Compatibility Issues.", captcha_bank); ?>
														</span>
														<?php _e("Technical Support", captcha_bank); ?>
													</span> 
												</span>
											</span> 
										</span>
									</li>
									<li class="css3_grid_row_4 row_style_2 css3_grid_row_4_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Plugin Updates", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Automatic Plugin Update Notification with New Features, Bug Fixing and much more.", captcha_bank); ?>
														</span>
														<?php _e("Plugin Updates", captcha_bank); ?>
													</span> 
												</span> 
											</span> 
										</span>
									</li>
									<li class="css3_grid_row_5 row_style_4 css3_grid_row_5_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Multi-Lingual", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Multi-Lingual Facility allows the plugin to be used in 36 languages.", captcha_bank); ?>
														</span>
														<?php _e("Multi-Lingual", captcha_bank); ?>
													</span>
												</span> 
											</span> 
										</span>
									</li>
									<li class="css3_grid_row_6 row_style_2 css3_grid_row_6_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Login Logs", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
														<?php _e("Allows you to track the
																current users who are logged in into you website and show
																there Geo Location on the map. It shows various details
																such as Username, IP Address, Location, Login Date &amp;
																Time, Login Status, Action to Block or White list IP
																Address.", captcha_bank); ?>
														</span>
														<?php _e("Login Logs", captcha_bank); ?>
													</span>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_7 row_style_4 css3_grid_row_7_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha General Settings", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Allows you to set various
																	settings for Captcha which includes Title, Tooltip,
																	number of characters, Captcha type, Text Case for
																	Captcha, Captcha text case sensitivity, Width and
																	Height", captcha_bank); ?>
														</span>
														<?php _e("Captcha General Settings", captcha_bank); ?>
													</span> 
												</span> 
											</span>
										</span>
									</li>
									<li class="css3_grid_row_8 row_style_2 css3_grid_row_8_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Login", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Allows you to display Captcha on WordPress Login Form.", captcha_bank); ?>
														</span>
														<?php _e("Captcha For Login", captcha_bank); ?>
													</span>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_9 row_style_4 css3_grid_row_9_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Registration", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
														<?php _e("Allows you to display Captcha on WordPress Registration Form.", captcha_bank); ?>
														</span>
														<?php _e("Captcha For Registration", captcha_bank); ?>
													</span>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_10 row_style_2 css3_grid_row_10_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Comments", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Allows you to display Captcha on WordPress Comments Form.", captcha_bank); ?>
														</span>
														<?php _e("Captcha For Comments", captcha_bank); ?>
													</span>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_11 row_style_4 css3_grid_row_11_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Admin Comments", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Allows you to display Captcha on WordPress Admin Comment Form.", captcha_bank); ?>
														</span>
														<?php _e("Captcha For Admin Comments", captcha_bank); ?>
													</span>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_12 row_style_2 css3_grid_row_12_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Reset/Lost Password", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Allows you to display Captcha on WordPress Reset/Lost Password Form.", captcha_bank); ?>
														</span>
														<?php _e("Captcha For Reset/Lost Password", captcha_bank); ?>
													</span>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_13 row_style_4 css3_grid_row_13_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Hide Captcha For Users", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Allows you to hide Captcha for Admin Comment form when the user is other than Administrator.", captcha_bank); ?>
														</span>
														<?php _e("Hide Captcha For Users", captcha_bank); ?>
													</span>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_14 row_style_2 css3_grid_row_14_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha Layout Settings", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Allows you to set various Layout Settings such as Background, Lines, Dots, Text Transparency, and Signature for Captcha.", captcha_bank); ?>
														</span>
														<?php _e("Captcha Layout Settings", captcha_bank); ?>
													</span>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_15 row_style_4 css3_grid_row_15_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha Font Settings", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Allows you to set different Font Settings (Font Family, Font Size, and Font Color) for Captcha Text.", captcha_bank); ?>
														</span>
														<?php _e("Captcha Font Settings", captcha_bank); ?>
													</span>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_16 row_style_2 css3_grid_row_16_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha Message Settings", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Allows you to set different
																	settings for error messages such as Captcha Empty Error,
																	Captcha Invalid Error, IP Block Message, Max Login
																	Attempts and Maximum Login Exceeded Error.", captcha_bank); ?>
														</span>
														<?php _e("Captcha Message Settings", captcha_bank); ?>
													</span>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_17 row_style_4 css3_grid_row_17_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Contact Bank", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Allows you to Integrate Captcha on Contact Bank Form. For this you need to purchase both the plugins separately.", captcha_bank); ?>
														</span>
														<?php _e("Captcha For Contact Bank", captcha_bank); ?>
													</span>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_18 row_style_2 css3_grid_row_18_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Roles and Capabilities", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Allows you to controls the capabilities of WP Captcha Bank among different roles of WordPress users.", captcha_bank); ?>
														</span>
														<?php _e("Roles and Capabilities", captcha_bank); ?>
													</span>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_19 row_style_4 css3_grid_row_19_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Block Login IP Address", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Allows you to block the IP Addresses of the login users from the Login Logs if he is considered as unauthorized.", captcha_bank); ?>
														</span>
														<?php _e("Block Login IP Address", captcha_bank); ?>
													</span>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_20 row_style_2 css3_grid_row_20_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Max Login Attempts", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Allows you to set number of login attempts left for the user incase Captcha code is left empty or filled invalid.", captcha_bank); ?>
														</span>
														<?php _e("Max Login Attempts", captcha_bank); ?>
													</span>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_21 row_style_4 css3_grid_row_21_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Auto IP Block", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Allows you to Blocks IP addresses for next 24 hours when the limit of login attempts is reached.", captcha_bank); ?>
														</span>
														<?php _e("Auto IP Block", captcha_bank); ?>
													</span>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_22 row_style_2 css3_grid_row_22_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Block IP Ranges", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Allows you to block range of IP Addresses that are considered undesirable or hostile.", captcha_bank); ?>
														</span>
														<?php _e("Block IP Ranges", captcha_bank); ?>
													</span>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_23 row_style_4 css3_grid_row_23_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Block Single IP Address", captcha_bank); ?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Allows you to add single IP Address for blocking it as per your requirement.", captcha_bank); ?>
														</span>
														<?php _e("Block Single IP Address", captcha_bank); ?>
													</span>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_24 footer_row css3_grid_row_24_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align"></span>
										</span>
									</li>
								</ul>
							</div>
							<div class="column_1 column_1_responsive" style="width: 15.5%;">
								<div class="column_ribbon ribbon_style2_free"></div>
								<ul>
									<li class="css3_grid_row_0 header_row_1 align_center css3_grid_row_0_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<h2 class="col1">
													<?php _e("Lite", captcha_bank); ?>
												</h2>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_1 header_row_2 css3_grid_row_1_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<h1 class="col1">
													<?php _e("FREE", captcha_bank); ?>
												</h1>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_2 row_style_3 css3_grid_row_2_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
												<span class="css3_hidden_caption">
													<?php _e("Domains per License", captcha_bank); ?>
												</span>
												<?php _e("1", captcha_bank); ?>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_3 row_style_1 css3_grid_row_3_responsive align_center">
									<span class="css3_grid_vertical_align_table">
										<span class="css3_grid_vertical_align">
											<span>
												<span class="css3_hidden_caption">
													<?php _e("Multisite Compatibility", captcha_bank); ?>
												</span>
												<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes"> 
											</span>
										</span>
									</span>
									</li>
									<li class="css3_grid_row_3 row_style_3 css3_grid_row_3_responsive align_center">
									<span class="css3_grid_vertical_align_table">
										<span class="css3_grid_vertical_align">
											<span>
												<span class="css3_hidden_caption">
													<?php _e("Technical Support", captcha_bank); ?>
												</span>
												<?php _e("None", captcha_bank); ?>
											</span>
										</span>
									</span>
									</li>
									<li class="css3_grid_row_4 row_style_1 css3_grid_row_4_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Plugin Updates", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes"> 
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_5 row_style_3 css3_grid_row_5_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Multi-Lingual", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_6 row_style_1 css3_grid_row_6_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Login Logs", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_7 row_style_3 css3_grid_row_7_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha General Settings", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_8 row_style_1 css3_grid_row_8_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Login", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_9 row_style_3 css3_grid_row_9_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Registration", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes"> 
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_10 row_style_1 css3_grid_row_10_responsive align_center">
									<span class="css3_grid_vertical_align_table">
										<span class="css3_grid_vertical_align">
											<span>
												<span class="css3_hidden_caption">
													<?php _e("Captcha For Comments", captcha_bank); ?>
												</span>
												<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
											</span>
										</span>
									</span>
										</li>
									<li class="css3_grid_row_11 row_style_3 css3_grid_row_11_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Admin Comments", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_12 row_style_1 css3_grid_row_12_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Reset/Lost Password", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_13 row_style_3 css3_grid_row_13_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Hide Captcha For Users", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_14 row_style_1 css3_grid_row_14_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha Layout Settings", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_15 row_style_3 css3_grid_row_15_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha Font Settings", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_16 row_style_1 css3_grid_row_16_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha Message Settings", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_17 row_style_3 css3_grid_row_17_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Contact Bank", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_18 row_style_1 css3_grid_row_18_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Roles and Capabilities", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_19 row_style_3 css3_grid_row_19_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Block Login IP Address", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_20 row_style_1 css3_grid_row_20_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Max Login Attempts", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_21 row_style_3 css3_grid_row_21_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Auto IP Block", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_22 row_style_1 css3_grid_row_22_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Block IP Ranges", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_23 row_style_3 css3_grid_row_23_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Block Single IP Address", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_24 footer_row css3_grid_row_24_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<a target="_blank" href="http://wordpress.org/plugins/captcha-bank/" class="sign_up sign_up_orange radius3">
													<?php _e("Download!", captcha_bank); ?>
												</a>
											</span>
										</span>
									</li>
								</ul>
							</div>
							<div class="column_2 column_2_responsive" style="width: 15.5%;">
								<div class="column_ribbon ribbon_style2_heart"></div>
								<ul>
									<li class="css3_grid_row_0 header_row_1 align_center css3_grid_row_0_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<h2 class="col1">
													<?php _e("Eco", captcha_bank); ?>
												</h2>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_1 header_row_2 css3_grid_row_1_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span class="css3_grid_tooltip">
													<span>
														<?php _e("You just need to pay for once for life time.", captcha_bank); ?>
													</span>
													 <h1 class="col1">
														&euro;<span><?php _e("11", captcha_bank); ?></span>
													</h1>
													<h3 class="col1">
														<?php _e("one time", captcha_bank); ?>
													</h3>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_2 row_style_4 css3_grid_row_2_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Domains per License", captcha_bank); ?>
													</span>
													<?php _e("1", captcha_bank); ?>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_3 row_style_2 css3_grid_row_3_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Multisite Compatibility", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_3 row_style_4 css3_grid_row_3_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Technical Support", captcha_bank); ?>
													</span>
													<?php _e("1 Week", captcha_bank); ?>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_4 row_style_2 css3_grid_row_4_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Plugin Updates", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_5 row_style_4 css3_grid_row_5_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Multi-Lingual", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_6 row_style_2 css3_grid_row_6_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Login Logs", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_7 row_style_4 css3_grid_row_7_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha General Settings", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_8 row_style_2 css3_grid_row_8_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Login", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_9 row_style_4 css3_grid_row_9_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Registration", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_10 row_style_2 css3_grid_row_10_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Comments", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_11 row_style_4 css3_grid_row_11_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Admin Comments", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_12 row_style_2 css3_grid_row_12_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Reset/Lost Password", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_13 row_style_4 css3_grid_row_13_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Hide Captcha For Users", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_14 row_style_2 css3_grid_row_14_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha Layout Settings", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_15 row_style_4 css3_grid_row_15_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha Font Settings", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_16 row_style_2 css3_grid_row_16_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">Captcha Message Settings</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_17 row_style_4 css3_grid_row_17_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Contact Bank", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_18 row_style_2 css3_grid_row_18_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Roles and Capabilities", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_19 row_style_4 css3_grid_row_19_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Block Login IP Address", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_20 row_style_2 css3_grid_row_20_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Max Login Attempts", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_21 row_style_4 css3_grid_row_21_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Auto IP Block", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_22 row_style_2 css3_grid_row_22_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Block IP Ranges", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_23 row_style_4 css3_grid_row_23_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Block Single IP Address", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_24 footer_row css3_grid_row_24_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<a href="http://tech-banker.com/shop/wp-captcha-bank/wp-captcha-bank-eco-edition/" target="_blank" class="sign_up sign_up_orange radius3">
													<?php _e("Order Now!", captcha_bank); ?>
												</a>
											</span>
										</span>
									</li>
								</ul>
							</div>
							<div class="column_3 column_3_responsive" style="width: 15.5%;">
								<div class="column_ribbon ribbon_style2_best"></div>
								<ul>
									<li class="css3_grid_row_0 header_row_1 align_center css3_grid_row_0_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<h2 class="col2">
													<?php _e("Pro", captcha_bank); ?>
												</h2>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_1 header_row_2 css3_grid_row_1_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span class="css3_grid_tooltip">
													<span>
														<?php _e("You just need to pay for once for life time.", captcha_bank); ?>
													</span>
													<h1 class="col1">
														&euro;<span><?php _e("17", captcha_bank); ?></span>
													</h1>
													<h3 class="col1">
														<?php _e("one time", captcha_bank); ?>
													</h3>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_2 row_style_3 css3_grid_row_2_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Domains per License", captcha_bank); ?>
													</span>
													<?php _e("1", captcha_bank); ?>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_3 row_style_1 css3_grid_row_3_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Multisite Compatibility", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_3 row_style_3 css3_grid_row_3_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Technical Support", captcha_bank); ?>
													</span>
													<?php _e("1 Month", captcha_bank); ?>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_4 row_style_1 css3_grid_row_4_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Plugin Updates", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_5 row_style_3 css3_grid_row_5_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Multi-Lingual", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_6 row_style_1 css3_grid_row_6_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Login Logs", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_7 row_style_3 css3_grid_row_7_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha General Settings", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_8 row_style_1 css3_grid_row_8_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Login", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_9 row_style_3 css3_grid_row_9_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Registration", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_10 row_style_1 css3_grid_row_10_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Comments", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_11 row_style_3 css3_grid_row_11_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Admin Comments", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_12 row_style_1 css3_grid_row_12_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Reset/Lost Password", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_13 row_style_3 css3_grid_row_13_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Hide Captcha For Users", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_14 row_style_1 css3_grid_row_14_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha Layout Settings", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_15 row_style_3 css3_grid_row_15_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha Font Settings", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_16 row_style_1 css3_grid_row_16_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha Message Settings", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_17 row_style_3 css3_grid_row_17_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Contact Bank", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_18 row_style_1 css3_grid_row_18_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Roles and Capabilities", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_19 row_style_3 css3_grid_row_19_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Block Login IP Address", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_20 row_style_1 css3_grid_row_20_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Max Login Attempts", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_21 row_style_3 css3_grid_row_21_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Auto IP Block", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_22 row_style_1 css3_grid_row_22_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Block IP Ranges", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_23 row_style_3 css3_grid_row_23_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Block Single IP Address", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_24 footer_row css3_grid_row_24_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<a href="http://tech-banker.com/shop/wp-captcha-bank/captcha-bank-pro-edition/" target="_blank" class="sign_up sign_up_orange radius3">
													<?php _e("Order Now!", captcha_bank); ?>
												</a>
											</span>
										</span>
									</li>
								</ul>
							</div>
							<div class="column_4 column_4_responsive" style="width: 15.5%;">
								<div class="column_ribbon ribbon_style2_hot"></div>
								<ul>
									<li class="css3_grid_row_0 header_row_1 align_center css3_grid_row_0_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<h2 class="col1">
													<?php _e("Developer", captcha_bank); ?>
												</h2>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_1 header_row_2 css3_grid_row_1_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span class="css3_grid_tooltip">
													<span>
														<?php _e("You just need to pay for once for life time.", captcha_bank); ?>
													</span>
													<h1 class="col1">
														&euro;<span><?php _e("69", captcha_bank); ?></span>
													</h1>
													<h3 class="col1">
														<?php _e("one time", captcha_bank); ?>
													</h3>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_2 row_style_4 css3_grid_row_2_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Domains per License", captcha_bank); ?>
													</span>
													<?php _e("5", captcha_bank); ?>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_3 row_style_2 css3_grid_row_3_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Multisite Compatibility", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_3 row_style_4 css3_grid_row_3_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Technical Support", captcha_bank); ?>
													</span>
													<?php _e("1 Year", captcha_bank); ?>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_4 row_style_2 css3_grid_row_4_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Plugin Updates", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_5 row_style_4 css3_grid_row_5_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Multi-Lingual", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_6 row_style_2 css3_grid_row_6_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Login Logs", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_7 row_style_4 css3_grid_row_7_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha General Settings", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_8 row_style_2 css3_grid_row_8_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Login", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_9 row_style_4 css3_grid_row_9_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Registration", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_10 row_style_2 css3_grid_row_10_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Comments", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_11 row_style_4 css3_grid_row_11_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Admin Comments", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_12 row_style_2 css3_grid_row_12_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Reset/Lost Password", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_13 row_style_4 css3_grid_row_13_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Hide Captcha For Users", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_14 row_style_2 css3_grid_row_14_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha Layout Settings", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_15 row_style_4 css3_grid_row_15_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha Font Settings", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_16 row_style_2 css3_grid_row_16_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha Message Settings", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_17 row_style_4 css3_grid_row_17_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Contact Bank", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_18 row_style_2 css3_grid_row_18_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
													<?php _e("Roles and Capabilities", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_19 row_style_4 css3_grid_row_19_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Block Login IP Address", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_20 row_style_2 css3_grid_row_20_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Max Login Attempts", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_21 row_style_4 css3_grid_row_21_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Auto IP Block", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_22 row_style_2 css3_grid_row_22_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Block IP Ranges", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_23 row_style_4 css3_grid_row_23_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Block Single IP Address", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_24 footer_row css3_grid_row_24_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<a href="http://tech-banker.com/shop/wp-captcha-bank/captcha-bank-developer-edition/" target="_blank" class="sign_up sign_up_orange radius3">
													<?php _e("Order Now!", captcha_bank); ?>
												</a>
											</span>
										</span>
									</li>
								</ul>
							</div>
							<div class="column_1 column_5_responsive" style="width: 15.5%;">
								<div class="column_ribbon ribbon_style2_save"></div>
								<ul>
									<li class="css3_grid_row_0 header_row_1 align_center css3_grid_row_0_responsive radius5_topright">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<h2 class="col1">
													<?php _e("Extended", captcha_bank); ?>
												</h2>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_1 header_row_2 css3_grid_row_1_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span class="css3_grid_tooltip">
													<span>
														<?php _e("You just need to pay for once for life time.", captcha_bank); ?>
													</span>
													<h1 class="col1">
														&euro;<span><?php _e("545", captcha_bank); ?></span>
													</h1>
													<h3 class="col1">
														<?php _e("one time", captcha_bank); ?>
													</h3>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_2 row_style_3 css3_grid_row_2_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Domains per License", captcha_bank); ?>
													</span>
													<?php _e("50", captcha_bank); ?>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_3 row_style_1 css3_grid_row_3_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Multisite Compatibility", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_3 row_style_3 css3_grid_row_3_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Technical Support", captcha_bank); ?>
													</span>
													<?php _e("1 Year", captcha_bank); ?>
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_4 row_style_1 css3_grid_row_4_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Plugin Updates", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_5 row_style_3 css3_grid_row_5_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Multi-Lingual", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_6 row_style_1 css3_grid_row_6_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Login Logs", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_7 row_style_3 css3_grid_row_7_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha General Settings", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_8 row_style_1 css3_grid_row_8_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Login", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_9 row_style_3 css3_grid_row_9_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Registration", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_10 row_style_1 css3_grid_row_10_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Comments", captcha_bank); ?>
													</span>
													<img
													src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_11 row_style_3 css3_grid_row_11_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Admin Comments", captcha_bank); ?>
													</span>
													<img
													src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_12 row_style_1 css3_grid_row_12_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Reset/Lost Password", captcha_bank); ?>
													</span>
													<img
													src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_13 row_style_3 css3_grid_row_13_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Hide Captcha For Users", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_14 row_style_1 css3_grid_row_14_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha Layout Settings", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_15 row_style_3 css3_grid_row_15_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha Font Settings", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_16 row_style_1 css3_grid_row_16_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha Message Settings", captcha_bank); ?>
													</span>
													<img
													src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_17 row_style_3 css3_grid_row_17_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Captcha For Contact Bank", captcha_bank); ?>
													</span><img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_18 row_style_1 css3_grid_row_18_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Roles and Capabilities", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_19 row_style_3 css3_grid_row_19_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Block Login IP Address", captcha_bank); ?>
													</span>
													<img
													src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>"Block Login IP Addressalt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_20 row_style_1 css3_grid_row_20_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Max Login Attempts", captcha_bank); ?>
													</span>
													<img
													src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_21 row_style_3 css3_grid_row_21_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Auto IP Block", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_22 row_style_1 css3_grid_row_22_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Block IP Ranges", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_23 row_style_3 css3_grid_row_23_responsive align_center">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Block Single IP Address", captcha_bank); ?>
													</span>
													<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
												</span>
											</span>
										</span>
									</li>
									<li class="css3_grid_row_24 footer_row css3_grid_row_24_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<a href="http://tech-banker.com/shop/wp-captcha-bank/captcha-bank-extended-edition/" target="_blank" class="sign_up sign_up_orange radius3">
												<?php _e("Order Now!", captcha_bank); ?>
												</a>
											</span>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}
?>