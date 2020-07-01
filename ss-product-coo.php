<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://sunrisesoftlab.in
 * @since             1.0.0
 * @package           Ss_Product_Coo
 *
 * @wordpress-plugin
 * Plugin Name:       Product Country of Origin
 * Plugin URI:        https://sunrisesoftlab.in/product-country-of-origin
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Viral Mehta
 * Author URI:        https://sunrisesoftlab.in/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ss-product-coo
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SS_PRODUCT_COO_VERSION', '1.0.0' );


define( 'SS_DOMAIN', 'ss_product_coo' );

define ( 'DEBUG_PATH', plugin_dir_path( __FILE__ ) );

if ( !defined( 'SS_THEME_DIR' ))
    define( 'SS_THEME_DIR', ABSPATH . 'wp-content/themes/' . get_template() );

if (!defined( 'SS_PLUGIN_NAME' ))
    define( 'SS_PLUGIN_NAME', trim(dirname(plugin_basename(__FILE__)), '/') );

if (!defined( 'SS_PLUGIN_DIR' ))
    define( 'SS_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . SS_PLUGIN_NAME );

if (!defined( 'SS_PLUGIN_URL' ))
    define( 'SS_PLUGIN_URL', WP_PLUGIN_URL . '/' . SS_PLUGIN_NAME );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ss-product-coo-activator.php
 */
function activate_ss_product_coo() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ss-product-coo-activator.php';
	Ss_Product_Coo_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ss-product-coo-deactivator.php
 */
function deactivate_ss_product_coo() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ss-product-coo-deactivator.php';
	Ss_Product_Coo_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ss_product_coo' );
register_deactivation_hook( __FILE__, 'deactivate_ss_product_coo' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ss-product-coo.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
global $plugin_ss_product_coo; 
$plugin_ss_product_coo = new Ss_Product_Coo();
$plugin_ss_product_coo->run();