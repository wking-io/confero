<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.wking.io
 * @since      1.0.0
 *
 * @package    conferoPortfolio
 * @subpackage conferoPortfolio/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    conferoPortfolio
 * @subpackage conferoPortfolio/admin
 * @author     Will King <contact@wking.io>
 */
class conferoPortfolio_Admin {

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
	 * @var      string    $products_cpt    The slug for the plugins custom post type.
	 */
	private $products_cpt;

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
		$this->products_cpt 	= 'confero_portfolio';

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
		 * defined in conferoPortfolio_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The conferoPortfolio_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/conferoPortfolio-admin.css', array(), $this->version, 'all' );

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
		 * defined in conferoPortfolio_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The conferoPortfolio_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/conferoPortfolio-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the Post Type for Portfolio.
	 *
	 * @since    1.0.0
	 */
	public function confero_register_portfolio_cpt() {
		$labels = array(
			'name'               => _x( 'Confero Portfolio', 'post type general name', $this->plugin_name ),
			'singular_name'      => _x( 'Confero Portfolio', 'post type singular name', $this->plugin_name ),
			'menu_name'          => _x( 'Confero Portfolio', 'admin menu', $this->plugin_name ),
			'name_admin_bar'     => _x( 'Confero Portfolio', 'add new on admin bar', $this->plugin_name ),
			'add_new'            => _x( 'Add New', 'event', $this->plugin_name ),
			'add_new_item'       => __( 'Add New Event', $this->plugin_name ),
			'new_item'           => __( 'New Event', $this->plugin_name ),
			'edit_item'          => __( 'Edit Event', $this->plugin_name ),
			'view_item'          => __( 'View Event', $this->plugin_name ),
			'all_items'          => __( 'Portfolio', $this->plugin_name ),
			'search_items'       => __( 'Search Portfolio', $this->plugin_name ),
			'parent_item_colon'  => __( 'Parent Event:', $this->plugin_name ),
			'not_found'          => __( 'No Events found.', $this->plugin_name ),
			'not_found_in_trash' => __( 'No Events found in Trash.', $this->plugin_name ),
		);

		$args = array(
			'labels'             => apply_filters( 'confero_portfolio_cpt_labels', $labels ),
			'description'        => __( 'Portfolio Custom Post Type.', $this->plugin_name ),
			'public'             => true,
			'query_var'          => true,
			'rewrite'            => array(
					'slug' => 'portfolio',
			),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon'					 => 'dashicons-camera',
			'supports'           => array( 'title' ),
		);
		register_post_type( $this->products_cpt, apply_filters( 'confero_portfolio_cpt_args', $args ) );
	}

/**
 * Register the Taxonomy for Portfolio Events.
 *
 * @since    1.0.0
 */
function confero_register_portfolio_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Event Types', 'taxonomy general name', $this->plugin_name ),
		'singular_name'     => _x( 'Event Type', 'taxonomy singular name', $this->plugin_name ),
		'search_items'      => __( 'Search Event Types', $this->plugin_name ),
		'all_items'         => __( 'All Event Types', $this->plugin_name ),
		'parent_item'       => __( 'Parent Event Type', $this->plugin_name ),
		'parent_item_colon' => __( 'Parent Event Type:', $this->plugin_name ),
		'edit_item'         => __( 'Edit Event Type', $this->plugin_name ),
		'update_item'       => __( 'Update Event Type', $this->plugin_name ),
		'add_new_item'      => __( 'Add New Event Type', $this->plugin_name ),
		'new_item_name'     => __( 'New Event Type Name', $this->plugin_name ),
		'menu_name'         => __( 'Event Type', $this->plugin_name ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'						=> array( 'slug' => 'portfolio', 'with_front' => false ),
	);

	register_taxonomy( 'event-type', $this->products_cpt, $args );
}

	/**
	 * Add Projects Fields
	 *
	 * @since  1.0.0
	 *
	 * @author Will King
	 * @return void
	 */
	public function confero_register_portfolio_fields() {
		if ( function_exists( 'acf_add_local_field_group' ) ) :
			$field_location = array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => $this->products_cpt,
					),
				),
			);

			$field_setup = array(
				array(
					'key'     			=> 'field_event_location',
					'label'   			=> __( 'Event Location', $this->plugin_name ),
					'name'    			=> 'event_location',
					'type'    			=> 'text',
				),
				array(
					'key' => 'field_photographer',
					'label' => 'Photographer',
					'name' => 'photographer',
					'type' => 'group',
					'layout' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_photographer_name',
							'label' => 'Photographer Name',
							'name' => 'photographer_name',
							'type' => 'text',
						),
						array(
							'key' => 'field_photographer_website',
							'label' => 'Photographer Website',
							'name' => 'photographer_website',
							'type' => 'url',
						),
					),
				),
				array(
					'key'     			=> 'field_event_thumbnail',
					'label'   			=> __( 'Event Thumbnail', $this->plugin_name ),
					'name'    			=> 'event_thumbnail',
					'type'    			=> 'image',
					'return_format' => 'array',
					'mime_types' 		=> 'jpg, png',
				),
				array(
					'key'      => 'field_event_images',
					'label'    => __( 'Project images for popup', $this->plugin_name ),
					'name'     => 'project_images',
					'type'     			=> 'gallery',
					'min'          	=> 1,
				),
			);
			acf_add_local_field_group(array(
				'key'      => 'event_info',
				'title'    => 'Event Info',
				'fields'   => $field_setup,
				'location' => $field_location,
			));
		endif;
	}

	/**
   * Register product photo sizes.
   *
   * @since 1.0.0
   *
   * @author Will King
   * @return void
   */
	public function confero_register_portfolio_sizes() {
		add_image_size( 'thumb', 510, 340, array( 'center', 'center' ) );
		add_image_size( 'portfolio', 684, 456, array( 'center', 'center' ) );
		add_image_size( 'portfolio-s', 402, 268, array( 'center', 'center' ) );
	}

}
