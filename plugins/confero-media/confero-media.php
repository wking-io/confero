<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.wking.io
 * @since             1.0.0
 * @package           conferoMedia
 *
 * @wordpress-plugin
 * Plugin Name:       Confero Media
 * Plugin URI:        http://www.christopherconfero.com
 * Description:       This plugin handles setup and management for the media projects
 * Version:           1.0.0
 * Author:            Will King
 * Author URI:        https://www.wking.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       confero-media
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'MEDIA_PLUGIN_VERSION', '1.0.0' );
define( 'MEDIA_PLUGIN_NAME', 'confero-media' );
define( 'MEDIA_PLUGIN_DIRECTORY', plugin_dir_path( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/conferoMedia-activator.php
 */
function activate_conferoMedia() {
	require_once MEDIA_PLUGIN_DIRECTORY . 'includes/conferoMedia-activator.php';
	conferoMedia_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/conferoMedia-deactivator.php
 */
function deactivate_conferoMedia() {
	require_once MEDIA_PLUGIN_DIRECTORY . 'includes/conferoMedia-deactivator.php';
	conferoMedia_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_conferoMedia' );
register_deactivation_hook( __FILE__, 'deactivate_conferoMedia' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require MEDIA_PLUGIN_DIRECTORY . 'includes/conferoMedia.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_conferoMedia() {

	$plugin = new conferoMedia();
	$plugin->run();

}
run_conferoMedia();
