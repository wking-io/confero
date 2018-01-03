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
 * @package           tumblrImages
 *
 * @wordpress-plugin
 * Plugin Name:       Tumblr Slides
 * Plugin URI:        http://www.christopherconfero.com
 * Description:       This plugin pulls in images from your tumblr account and turns it into slides
 * Version:           1.0.0
 * Author:            Will King
 * Author URI:        https://www.wking.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tumblr-images
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'TUMBLR_IMAGES_PLUGIN_VERSION', '1.0.0' );
define( 'TUMBLR_IMAGES_PLUGIN_NAME', 'tumblr-images' );
define( 'TUMBLR_IMAGES_PLUGIN_DIRECTORY', plugin_dir_path( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/tumblrImages-activator.php
 */
function activate_tumblrImages() {
	require_once TUMBLR_IMAGES_PLUGIN_DIRECTORY . 'includes/tumblrImages-activator.php';
	tumblrImages_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/tumblrImages-deactivator.php
 */
function deactivate_tumblrImages() {
	require_once TUMBLR_IMAGES_PLUGIN_DIRECTORY . 'includes/tumblrImages-deactivator.php';
	tumblrImages_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tumblrImages' );
register_deactivation_hook( __FILE__, 'deactivate_tumblrImages' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require TUMBLR_IMAGES_PLUGIN_DIRECTORY . 'includes/tumblrImages.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_tumblrImages() {

	$plugin = new tumblrImages();
	$plugin->run();

}
run_tumblrImages();
