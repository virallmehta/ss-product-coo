<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://sunrisesoftlab.in
 * @since      1.0.0
 *
 * @package    Ss_Product_Coo
 * @subpackage Ss_Product_Coo/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ss_Product_Coo
 * @subpackage Ss_Product_Coo/includes
 * @author     Viral Mehta <virallmehta@gmail.com>
 */
class Ss_Product_Coo_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ss-product-coo',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
