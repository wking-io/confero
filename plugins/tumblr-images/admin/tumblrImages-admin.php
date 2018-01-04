<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.wking.io
 * @since      1.0.0
 *
 * @package    tumblrImages
 * @subpackage tumblrImages/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    tumblrImages
 * @subpackage tumblrImages/admin
 * @author     Will King <contact@wking.io>
 */
class tumblrImages_Admin {

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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
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
		 * defined in tumblrImages_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The tumblrImages_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tumblrImages-admin.css', array(), $this->version, 'all' );

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
		 * defined in tumblrImages_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The tumblrImages_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tumblrImages-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register a custom menu page.
	 */
	public function tumblrImages_register_menu_page() {
		if( function_exists('acf_add_options_page') ) {
	
			acf_add_options_page(array(
				'page_title' 	=> __('Tumblr Images', $this->plugin_name),
				'menu_title'	=> __('Tumblr Images', $this->plugin_name),
				'menu_slug' 	=> $this->plugin_name,
				'position'		=> 58,
				'icon_url'		=> 'dashicons-slides',
				'redirect'		=> false
			));
			
		}
	}

	/**
	 * Add Tumblr Images Fields
	 *
	 * @since  1.0.0
	 *
	 * @author Will King
	 * @return void
	 */
	public function tumblrImages_register_menu_fields() {
		if( function_exists('acf_add_local_field_group') ):

			acf_add_local_field_group(array(
				'key' => 'tumblr_account_settings',
				'title' => 'Tumblr Account Settings',
				'fields' => array(
					array(
						'key' => 'field_tumblr_blog_name',
						'label' => 'Tumblr Blog Name',
						'name' => 'tumblr_blog_name',
						'type' => 'text',
						'instructions' => 'Enter the name of the blog you want to pull images from. If you blogs URL is \'theartofanimation.tumblr.com\' you will enter \'theartofanimation\'.',
						'placeholder' => 'theartofanimation',
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'options_page',
							'operator' => '==',
							'value' => 'acf-options-tumblr-images',
						),
					),
				),
			));
			
			endif;
	}

}
