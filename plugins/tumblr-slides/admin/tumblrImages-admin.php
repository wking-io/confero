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
	 * The cpt name for this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $media_cpt    The slug for the plugins custom post type.
	 */
	private $media_cpt;

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
		$this->tumblr_slug 	= 'tumblr_images';

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
		add_menu_page(
				__( 'Tumblr Images',  $this->plugin_name),
				'Tumblr Images',
				'manage_options',
				'tumblr-images',
				array( $this, 'setup_tumblrImages_menu_page' ),
				'dashicons-slides',
				58
		);
	}

	/**
	 * Register a custom menu page.
	 */
	public function setup_tumblrImages_menu_page() {
		include_once( TUMBLR_IMAGES_PLUGIN_DIR . 'admin/partials/tumblrImages-admin-display.php' );
	}

	// /**
	//  * Add Projects Fields
	//  *
	//  * @since  1.0.0
	//  *
	//  * @author Will King
	//  * @return void
	//  */
	// public function confero_register_media_fields() {
	// 	if ( function_exists( 'acf_add_local_field_group' ) ) :
	// 		$field_location = array(
	// 			array(
	// 				array(
	// 					'param'    => 'post_type',
	// 					'operator' => '==',
	// 					'value'    => $this->media_cpt,
	// 				),
	// 			),
	// 		);

	// 		$field_setup = array(
	// 			array(
	// 				'key' => 'field_media_type',
	// 				'label' => 'Media Type',
	// 				'name' => 'media_type',
	// 				'type' => 'radio',
	// 				'instructions' => 'Choose what type of media is being published',
	// 				'choices' => array(
	// 					'publications' => 'Publications',
	// 					'film' => 'Film',
	// 				),
	// 				'allow_null' => 0,
	// 				'layout' => 'horizontal',
	// 				'return_format' => 'value',
	// 			),
	// 			array(
	// 				'key' => 'field_publication_cover',
	// 				'label' => 'Publication Cover',
	// 				'name' => 'publication_cover',
	// 				'type' => 'image',
	// 				'return_format' => 'array',
	// 				'preview_size' => 'medium',
	// 				'conditional_logic' => array(
	// 					array(
	// 						array(
	// 							'field' => 'field_media_type',
	// 							'operator' => '==',
	// 							'value' => 'publications',
	// 						),
	// 					),
	// 				),
	// 			),
	// 			array(
	// 				'key' => 'field_publication_spread',
	// 				'label' => 'Publication Spread',
	// 				'name' => 'publication_spread',
	// 				'type' => 'file',
	// 				'instructions' => 'Upload the Magazine Spread here. PDF only.',
	// 				'conditional_logic' => array(
	// 					array(
	// 						array(
	// 							'field' => 'field_media_type',
	// 							'operator' => '==',
	// 							'value' => 'publications',
	// 						),
	// 					),
	// 				),
	// 				'return_format' => 'url',
	// 				'mime_types' => 'pdf',
	// 			),
	// 			array(
	// 				'key' => 'field_film_location',
	// 				'label' => 'Film Location',
	// 				'name' => 'film_location',
	// 				'type' => 'text',
	// 				'conditional_logic' => array(
	// 					array(
	// 						array(
	// 							'field' => 'field_media_type',
	// 							'operator' => '==',
	// 							'value' => 'film',
	// 						),
	// 					),
	// 				),
	// 			),
	// 			array(
	// 				'key' => 'field_film_thumbnail',
	// 				'label' => 'Film Thumbnail',
	// 				'name' => 'film_thumbnail',
	// 				'type' => 'image',
	// 				'return_format' => 'array',
	// 				'preview_size' => 'medium',
	// 				'conditional_logic' => array(
	// 					array(
	// 						array(
	// 							'field' => 'field_media_type',
	// 							'operator' => '==',
	// 							'value' => 'film',
	// 						),
	// 					),
	// 				),
	// 			),
	// 			array(
	// 				'key' => 'field_film_embed',
	// 				'label' => 'Film Embed',
	// 				'name' => 'film_embed',
	// 				'type' => 'oembed',
	// 				'instructions' => 'Paste the link from Vimeo here',
	// 				'conditional_logic' => array(
	// 					array(
	// 						array(
	// 							'field' => 'field_media_type',
	// 							'operator' => '==',
	// 							'value' => 'film',
	// 						),
	// 					),
	// 				),
	// 			),
	// 		);

	// 		acf_add_local_field_group(array(
	// 			'key'      => 'media_info',
	// 			'title'    => 'Media Info',
	// 			'fields'   => $field_setup,
	// 			'location' => $field_location,
	// 		));
	// 	endif;
	// }

}
