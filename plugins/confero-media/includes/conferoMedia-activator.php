<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.wking.io
 * @since      1.0.0
 *
 * @package    conferoMedia
 * @subpackage conferoMedia/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    conferoMedia
 * @subpackage conferoMedia/includes
 * @author     Will King <contact@wking.io>
 */
class conferoMedia_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		// Check that ACF is active, if not abort!
		if ( !is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
			// Stop activation redirect and show error
			wp_die('Sorry, but this plugin requires that Advanced Custom Fields is installed and active. <br><a href="' . admin_url( 'plugins.php' ) . '">&laquo; Return to Plugins</a>');
		}
		flush_rewrite_rules();
	}

}
