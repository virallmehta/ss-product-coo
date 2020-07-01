<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://sunrisesoftlab.in
 * @since      1.0.0
 *
 * @package    Ss_Product_Coo
 * @subpackage Ss_Product_Coo/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ss_Product_Coo
 * @subpackage Ss_Product_Coo/admin
 * @author     Viral Mehta <virallmehta@gmail.com>
 */
class Ss_Product_Coo_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Store plugin main class to allow public access.
	 *
	 * @since    1.0.0
	 * @var object      The main class.
	 */
	public $main;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $plugin_main ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->main = $plugin_main;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ss_Product_Coo_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ss_Product_Coo_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ss-product-coo-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ss_Product_Coo_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ss_Product_Coo_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ss-product-coo-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function product_coo_data_tab( $product_data_tabs ) {
		$product_data_tabs['vd_pcoo'] = array(
            'label' => esc_html( 'Country of Origin', SS_DOMAIN ),
            'target' => 'ss_pcoo_tab_content',
            'class' => array( 'show_if_simple', 'show_if_variable' )
        );
        
        return $product_data_tabs;

	}

	public function product_coo_data_panel_wrap() {
		global $woocommerce, $post;
        ?>
        <div id="ss_pcoo_tab_content" class="panel ss_pcoo_tab_content woocommerce_options_panel hidden">
            <div class="ss_pcoo_fields">
                <?php 
                	woocommerce_wp_checkbox(
					    array(
					    	'id'            => '_chk_show_coo',
					      	'label'         => 'Show Country of Origin',
					    )
				    );

				    woocommerce_wp_select(
					    array(
					      	'id'      => '_sel_coo',
					      	'label'   =>  'Select Country',
					      	'options' => countryList(),
					   )
				    );
                ?>
            </div>
        </div>
        <?php
    }

    function product_coo_meta_save( $post_id ) {

	    $woocommerce_custom_product_checkbox = isset($_POST['_chk_show_coo']) ? 'yes' : 'no';
	    update_post_meta($post_id, '_chk_show_coo', $woocommerce_custom_product_checkbox);
	    
	    $woocommerce_custom_product_select = $_POST['_sel_coo'];
	    if (!empty($woocommerce_custom_product_select))
	        update_post_meta($post_id, '_sel_coo', esc_attr($woocommerce_custom_product_select));
	   
	}	

}
