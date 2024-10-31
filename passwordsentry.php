<?php
/**index.php?phpfox-upgrade=true
* Plugin Name:		PasswordSentry
* Plugin URI:		https://www.password-sentry.com/
* Description:		Integrates Password Sentry (PS) app into the WordPress (WP) environment to track logins.
* Version:		1.0.15
* Requires at least:	5.7.2
* Requires PHP:		5.6
* Author:		Password Sentry (Daniel Abrams)
* Author URI:		https://www.password-sentry.com/
* License:		GPL v2 or later
* License URI:		https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:		passwordsentry
* Domain Path:		/languages
*/
$pswpp_settings	= pswpp_load_settings();
function pswpp_load_settings() {
	$pswpp_settings	= array('pswpp_api_endpoint_url' => '', 'pswpp_show_credit_link' => 'no');
	$settings	= get_option("pswpp_settings");
	if (! empty($settings)) {
		foreach ($settings as $key => $val) {
			$pswpp_settings[$key]	= $val;
		}
	}
	update_option("pswpp_settings", $pswpp_settings);
	return $pswpp_settings;
}
function pswpp_get_domain() {
	$protocols	= array('http://', 'https://', 'http://www.', 'https://www.', 'www.');
	return str_replace($protocols, '', $_SERVER['HTTP_HOST']);
}
function pswpp_load_settings_page() {
	$pswpp_settings	= pswpp_load_settings();
	wp_register_script('custom_js0', '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit');
	wp_enqueue_script('custom_js0');
	wp_register_script('custom_js1', esc_url(plugins_url('assets/js/bootstrap.min.js', __FILE__)));
	wp_enqueue_script('custom_js1');
	wp_register_style('custom_css1', esc_url(plugins_url('assets/css/bootstrap.min.css', __FILE__)));
	wp_enqueue_style('custom_css1');
	wp_register_style('custom_css2', esc_url(plugins_url('assets/css/font-awesome.min.css', __FILE__)));
	wp_enqueue_style('custom_css2');
	wp_register_style('custom_css3', esc_url(plugins_url('assets/css/cssps.css', __FILE__)));
	wp_enqueue_style('custom_css3');
	$error	= '';
	if (isset($_POST['pswpp_update_settings'])) {
		if (check_admin_referer('pswpp_update-options')) {
			$pswpp_status		= sanitize_text_field($_POST['pswpp_status']);
			$pswpp_show_credit_link	= sanitize_text_field($_POST['pswpp_show_credit_link']);
			$pswpp_api_endpoint_url	= esc_url($_POST['pswpp_api_endpoint_url']);
			if ($pswpp_api_endpoint_url) {
				$res	= wp_remote_retrieve_body(wp_remote_get($pswpp_api_endpoint_url));
				if (! $res) {
					$error[]	= translate('Cannot retrieve the PS API Endpoint URL!');
				}
				else {
					preg_match('/Members Tracking Fatal Error/', $res, $matches);
					if (! $matches) {
						$error[]	= translate('PS API Endpoint URL does not appear to be valid!');
					}
				}
				if (($error) and ($pswpp_status == 'enabled')) {
					$error[]	= translate('Cannot enable Tracking if invalid PS API Endpoint URL defined!');
				}
			}
			else {
				if ($pswpp_status == 'enabled') {
					$error[]	= translate('Cannot enable Tracking if PS API Endpoint URL not defined!');
				}
			}
			if (! $error) {
				if ($pswpp_api_endpoint_url) {
					$pswpp_settings['pswpp_api_endpoint_url']	= $pswpp_api_endpoint_url;
				}
				if (($pswpp_status) and (($pswpp_status == 'disabled') or ($pswpp_status == 'enabled'))) {
					$pswpp_settings['pswpp_status']		= $pswpp_status;
				}
				if (($pswpp_show_credit_link) and (($pswpp_show_credit_link == 'yes') or ($pswpp_show_credit_link == 'no'))) {
					$pswpp_settings['pswpp_show_credit_link']	= $pswpp_show_credit_link;
				}
				update_option("pswpp_settings", $pswpp_settings);
				?>
				<div class="alert alert-success" style="margin-top:20px;">
					<?php _e("Plugin Settings Updated!", "passwordsentry"); ?>
				</div>
				<?php
			}
			else {
				?>
				<div class="alert alert-danger" style="margin-top:20px;">
					<?php
					foreach ($error as $key => $val) {
						echo "<p>" . esc_attr($val) . "</p><br/>";
					}
					?>
				</div>
				<?php
			}
		}
	}
	?>
	<div class="wrap">
		<img src="<?php echo esc_url(plugins_url('assets/img/logops.png', __FILE__)); ?>" title="Password Sentry"><br/><br/>
		<form method="post" action="<?php echo esc_attr($_SERVER["REQUEST_URI"]); ?>">
			<?php
			wp_nonce_field('pswpp_update-options');
			if (($pswpp_settings['pswpp_api_endpoint_url']) and (! $error)) {
				$psadmincpurl	= preg_replace('/sentry\.php\?setupname=(.*)/', 'admincp', $pswpp_settings['pswpp_api_endpoint_url']);
				echo '<a target="_blank" href="' . esc_url($psadmincpurl) . '" class="btn btn-primary"><span class="dashicons dashicons-admin-generic"></span> PS AdminCP</a><br/><br/>';
			}
			?>
			<div id="google_translate_element" style="width:200px;margin:0 auto;"></div>
			<script>
			function googleTranslateElementInit() {
				new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
			}
			</script><br/>
			<div style="border:1px solid #000;padding:10px;margin:10px;">
				<h2><?php _e('PS Links', "passwordsentry") ?></h2>
				<div style="border:1px solid #EAEAEA;padding:10px;margin:10px;">
					<h3><?php _e('Download PS', "passwordsentry") ?></h3>
					<a target="_blank" href="https://www.password-sentry.com/signup/" class="btn btn-success"><?php _e('Download PS', "passwordsentry") ?></a>
					<div class="alert alert-info">
						<?php _e("Note that you must first download and install PS before you can activate, configure, and use this plugin.", "passwordsentry"); ?>
					</div>
				</div>
				<div style="border:1px solid #EAEAEA;padding:10px;margin:10px;">
					<h3><?php _e('Support', "passwordsentry") ?></h3>
					<a target="_blank" href="https://www.password-sentry.com/owners/priority-support/" class="btn btn-danger"><span class="dashicons dashicons-format-chat"></span> <?php _e('Support', "passwordsentry") ?></a><br/><br/>
				</div>
			</div>
			<div style="border:1px solid #000;padding:10px;margin:10px;">
				<h2><?php _e('Plugin Settings', "passwordsentry") ?></h2>
				<div style="border:1px solid #EAEAEA;padding:10px;margin:10px;">
					<h3><?php _e('PS API Endpoint URL', "passwordsentry") ?></h3>
					<div class="alert alert-info">
						<?php _e('URL to PS sentry.php file. Must be in the following format: <b>https://www.yoursite.com/ps_installation_folder/sentry.php?setupname=setup1</b>', "passwordsentry") ?><br/><br/>
						<?php _e('After a user successfully logs in, the plugin will ping the <b>PS API Endpoint URL</b>. PS tracks the login, and takes any action as appropriate. For example, deny access and suspend the user if the number of unique logins for that user exceeds threshold (as defined via PS AdminCP).', "passwordsentry") ?><br/><br/>
						<?php _e('You must first download and install PS before you can use this plugin. Note that the plugin will not be active until you have defined <b>PS API Endpoint URL</b>.', "passwordsentry") ?><br/><br/>
					</div>
					<p><input type="text" name="pswpp_api_endpoint_url" class="form-control" value="<?php echo esc_attr($pswpp_settings['pswpp_api_endpoint_url']); ?>"></p>
				</div>
				<div style="border:1px solid #EAEAEA;padding:10px;margin:10px;">
					<h3><?php _e('Status', "passwordsentry") ?></h3>
					<div class="alert alert-info">
						<?php _e('If enabled, Plugin will track logins. To stop or pause tracking, set to Disabled.', "passwordsentry") ?>
					</div>
					<input type="radio" name="pswpp_status" value="enabled" <?php if ($pswpp_settings['pswpp_status'] == "enabled") echo "checked"; ?>>&nbsp;<b><?php _e('Enabled', "passwordsentry") ?></b><br/>
					<input type="radio" name="pswpp_status" value="disabled" <?php if ($pswpp_settings['pswpp_status'] == "disabled" || $pswpp_settings['pswpp_status'] == "") echo "checked"; ?>>&nbsp;<b><?php _e('Disabled', "passwordsentry") ?></b><br/>
				</div>
				<div style="border:1px solid #EAEAEA;padding:10px;margin:10px;">
					<h3><?php _e('Credit Link', "passwordsentry") ?></h3>
					<div class="alert alert-info">
						<?php _e('If enabled, Password Sentry will display the following message on the login page (link opens in new window)', "passwordsentry") ?>:
					</div>
					<blockquote>
						<?php _e('WordPress Login protected by', "passwordsentry") ?> <a target="_blank" href="https://www.password-sentry.com/">Password Sentry</a>
					</blockquote>
					<div class="alert alert-info">
						<?php _e('Optional. This goes a long ways to deter people from sharing passwords and from trying to guess passwords, and also spreads the word about the plugin so others can protect their blogs. Default value is disabled. You can enable or disable this message below', "passwordsentry") ?>:
					</div>
					<input type="radio" name="pswpp_show_credit_link" value="yes" <?php if ($pswpp_settings['pswpp_show_credit_link'] == "yes") echo "checked"; ?>>&nbsp;<b><?php _e('Show Credit Link [Recommended]', "passwordsentry") ?></b><br/>
					<input type="radio" name="pswpp_show_credit_link" value="no" <?php if ($pswpp_settings['pswpp_show_credit_link'] == "no" || $pswpp_settings['pswpp_show_credit_link'] == "") echo "checked"; ?>>&nbsp;<b><?php _e('Hide Credit Link', "passwordsentry") ?></b><br/>
				</div>
				<div class="submit">
					<input type="submit" class="btn btn-primary" name="pswpp_update_settings" value="<?php _e('Update Plugin Settings', "passwordsentry") ?>" />
				</div>
				<?php _e('Thank you for protecting your WordPress site with', "passwordsentry") ?> <b><a target="_blank" href="https://www.password-sentry.com/">Password Sentry</a></b>!
			</div>
		</form>
	</div>
	<?php
}
function pswpp_add_options_page() {
	add_options_page('Password Sentry', 'Password Sentry', 'manage_options', basename(__FILE__), 'pswpp_load_settings_page');
}
function pswpp_credit_link(){
	global $pswpp_settings;
	if (($pswpp_settings['pswpp_show_credit_link'] == "yes") and (($pswpp_settings['pswpp_status'] == "enabled"))) {
		echo "<p>";
		_e('WordPress Login protected by', "passwordsentry");
		echo ' <a target="_blank" href="https://www.password-sentry.com/">Password Sentry</a><br/><br/><br/></p>';
	}
}
function pswpp_isJSON($string) {
	return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
}
function pswpp_check($user, $username) {
	global $pswpp_settings;
	if (($pswpp_settings['pswpp_api_endpoint_url']) and ($pswpp_settings['pswpp_status'] == "enabled")) {
		$url	= $pswpp_settings['pswpp_api_endpoint_url'] . "&user=" . $user . "&mode=1&ip=" . $_SERVER['REMOTE_ADDR'];
		$res	= wp_remote_retrieve_body(wp_remote_get($url));
		if ($user and $res) {
			if (pswpp_isJSON($res)) {
				$res	= json_decode($res);
				if ($res->status != "PASS") {
					header("Location: " . esc_url($res->redirect));
					exit();
				}
			}
			else {
				if ($res != 'PASS') {
					header("Location: " . esc_url($res));
					exit();
				}
			}
		}
	}
	return;
}
add_action('admin_menu', 'pswpp_add_options_page');
add_action('login_form', 'pswpp_credit_link');
add_action('wp_login', 'pswpp_check', 10, 2);
add_action('plugins_loaded', 'pswpp_init', 10);
function pswpp_init() {
	load_plugin_textdomain("passwordsentry", false, dirname(plugin_basename(__FILE__)) . '/languages/');
}
add_filter('plugin_row_meta', 'pswpp_links', 10, 4);
function pswpp_links($links_array, $plugin_file, $plugin_data, $status) {
	if (strpos($plugin_file, 'passwordsentry.php' ) !== false) {
		$url		= get_option('siteurl') . '/wp-admin/options-general.php?page=passwordsentry.php';
		$links_array[]	= '<a href="' . esc_url($url) . '">Settings</a>';
	}
	return $links_array;
}
?>