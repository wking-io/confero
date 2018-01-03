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
 * @package           conferoPortfolio
 *
 * @wordpress-plugin
 * Plugin Name:       Confero Portfolio
 * Plugin URI:        http://www.christopherconfero.com
 * Description:       This plugin handles setup and management for the portfolio projects
 * Version:           1.0.0
 * Author:            Will King
 * Author URI:        https://www.wking.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       confero-portfolio
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PORTFOLIO_PLUGIN_VERSION', '1.0.0' );
define( 'PORTFOLIO_PLUGIN_NAME', 'confero-portfolio' );
define( 'PORTFOLIO_PLUGIN_DIRECTORY', plugin_dir_path( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/conferoPortfolio-activator.php
 */
function activate_conferoPortfolio() {
	require_once PORTFOLIO_PLUGIN_DIRECTORY . 'includes/conferoPortfolio-activator.php';
	conferoPortfolio_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/conferoPortfolio-deactivator.php
 */
function deactivate_conferoPortfolio() {
	require_once PORTFOLIO_PLUGIN_DIRECTORY . 'includes/conferoPortfolio-deactivator.php';
	conferoPortfolio_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_conferoPortfolio' );
register_deactivation_hook( __FILE__, 'deactivate_conferoPortfolio' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require PORTFOLIO_PLUGIN_DIRECTORY . 'includes/conferoPortfolio.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_conferoPortfolio() {

	$plugin = new conferoPortfolio();
	$plugin->run();

}
run_conferoPortfolio();
