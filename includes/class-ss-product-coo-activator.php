<?php

/**
 * Fired during plugin activation
 *
 * @link       https://sunrisesoftlab.in
 * @since      1.0.0
 *
 * @package    Ss_Product_Coo
 * @subpackage Ss_Product_Coo/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ss_Product_Coo
 * @subpackage Ss_Product_Coo/includes
 * @author     Viral Mehta <virallmehta@gmail.com>
 */
class Ss_Product_Coo_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		if ( !class_exists( 'WooCommerce' ) ) {
			deactivate_plugins( plugin_basename( __FILE__ ) );

			wp_die( esc_html__( 'This plugin requires WooCommerce. Download it from WooCommerce official website', SS_DOMAIN ) . ' &rarr; https://woocommerce.com' );
			exit;
		}
	}

}
