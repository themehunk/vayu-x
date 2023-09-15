<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

if (!class_exists('VayuMenuSettings')) {
	class VayuMenuSettings
	{

		private $global_settings;
		public function __construct()
		{
			$this->global_settings = get_option('vayu_x_theme_options');
			add_action('admin_menu', array($this, 'vayu_x_admin_page'));

			add_action('wp_footer', array($this, 'vayu_x_show_footer_scripts'));
		}


		public function vayu_x_show_footer_scripts()
		{
			$global_settings = $this->global_settings;
			if(!empty($global_settings['backtotop'])){
				wp_enqueue_script('vayu-x-totop-init');
			}
			if(!empty($global_settings['preloader']) && is_singular('post')){
				wp_enqueue_script('vayu-x-preloader');
			}
		}


		public function vayu_x_admin_page()
		{

			add_theme_page(
				'Vayu XTheme Options',
				'Theme Options',
				'edit_theme_options',
				'vayutheme_settings',
				array($this, 'themeoptions_page')
			);

		}

		public function themeoptions_page()
		{

			if (!current_user_can('edit_theme_options')) {
				wp_die('Unauthorized user');
			}

			// Get the active tab from the $_GET param
			$default_tab = null;
			$tab         = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : $default_tab;

?>
			<div class="wrap">
				<style>
					.wrap {
						background: white;
						max-width: 900px;
						margin: 2.5em auto;
						border: 1px solid #dbdde2;
						box-shadow: 0 10px 20px #ececec;
						text-align: center
					}

					.wrap .notice,
					.wrap .error {
						display: none
					}

					.wrap h2 {
						font-size: 1.5em;
						margin-bottom: 1em;
						font-weight: bold;
						padding: 15px;
						background: #f4f4f4;
					}

					.gs-introtext {
						font-size: 14px;
						max-width: 500px;
						margin: 0 auto 50px auto
					}

					.gs-intro-video iframe {
						box-shadow: 10px 10px 20px rgb(0 0 0 / 15%);
					}

					.gs-intro-video {
						margin-bottom: 40px
					}

					.wrap h1 {
						text-align: left;
						padding: 15px 20px;
						margin: -1px -1px 0px -1px;
						font-size: 13px;
						font-weight: bold;
						text-transform: uppercase;
						box-shadow: 0 3px 8px rgb(0 0 0 / 5%);
					}

					.gs-padd {
						padding: 25px;
						text-align: left;
						background-color: #fbfbfb
					}

					.rtl .gs-padd {
						text-align: right
					}

					.wp-core-ui .button-primary {
						background-color: #2184f9
					}

					.nav-tab-active,
					.nav-tab-active:focus,
					.nav-tab-active:focus:active,
					.nav-tab-active:hover {
						border-bottom: 1px solid #fbfbfb;
						background: #fbfbfb;
					}

					.nav-tab-wrapper {
						padding-left: 20px
					}

					.wrap .fs-notice {
						margin: 0 25px 35px 25px !important
					}

					.wrap .fs-plugin-title {
						display: none !important
					}
				</style>
				<h1><?php echo esc_html(get_admin_page_title()); ?></h1>

				<div class="tab-content gs-padd">
					<?php
							$global_settings = get_option('vayu_x_theme_options');
							$sitesettings = get_option('gspb_global_settings');
							$localfont = (!empty($sitesettings['localfont'])) ? json_decode($sitesettings['localfont'], true) : array();

							if (isset($_POST['vayu-x_save_theme_settings'])) {
								if (!wp_verify_nonce($_POST['vayu-x_settings_field'], 'vayu-x_settings_page_action')) {
									esc_html_e("Sorry, your nonce did not verify.", 'vayu-x');
									return;
								}

								
								$global_settings['preloader'] = !empty($_POST['preloader']) ? sanitize_text_field($_POST['preloader']) : '';
								$global_settings['backtotop'] = !empty($_POST['backtotop']) ? sanitize_text_field($_POST['backtotop']) : '';
								


								update_option('vayu_x_theme_options', $global_settings);
							}


							$preloader = !empty($global_settings['preloader']) ? esc_attr($global_settings['preloader']) : '';
							$backtotop = !empty($global_settings['backtotop']) ? esc_attr($global_settings['backtotop']) : '';
							?>
								<div class="vayu-x_settings_form">
									<form method="POST">
										<?php wp_nonce_field('vayu-x_settings_page_action', 'vayu-x_settings_field'); ?>
										
										<h2><?php esc_html_e("Dynamic Options", 'vayu-x'); ?></h2>
										<table class="form-table">
											<tr>
												<th> <label for="preloader"><?php esc_html_e("Preloader", 'vayu-x'); ?></label> </th>
												<td>
													<input type="checkbox" name="preloader" <?php checked( $preloader, 'on' ) ?> /> <?php esc_html_e( 'Yes', 'vayu-x' );?>
												</td>
											</tr>
											<tr>
												<th> <label for="backtotop"><?php esc_html_e("Back to Top button", 'vayu-x'); ?></label> </th>
												<td>
													<input type="checkbox" name="backtotop" <?php checked( $backtotop, 'on' ) ?> /> <?php esc_html_e( 'Yes', 'vayu-x' );?>
												</td>
											</tr>

										</table>
										
										<div style="margin-top:20px"></div>
										<input type="submit" name="vayu-x_save_theme_settings" value="<?php esc_attr_e("Save settings", "vayu-x"); ?>" class="button button-primary button-large">
									</form>
								</div>
							<?php
					?>
				</div>
			</div>
		<?php
		}

		
	}
}
?>