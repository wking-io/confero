<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.wking.io
 * @since      1.0.0
 *
 * @package    conferoMedia
 * @subpackage conferoMedia/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    conferoMedia
 * @subpackage conferoMedia/admin
 * @author     Will King <contact@wking.io>
 */
class conferoMedia_Admin {

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
		$this->media_cpt 	= 'confero_media';

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
		 * defined in conferoMedia_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The conferoMedia_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/conferoMedia-admin.css', array(), $this->version, 'all' );

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
		 * defined in conferoMedia_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The conferoMedia_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/conferoMedia-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the Post Type for Portfolio.
	 *
	 * @since    1.0.0
	 */
	public function confero_register_media_cpt() {
		$labels = array(
			'name'               => _x( 'Confero Media', 'post type general name', $this->plugin_name ),
			'singular_name'      => _x( 'Confero Media', 'post type singular name', $this->plugin_name ),
			'menu_name'          => _x( 'Confero Media', 'admin menu', $this->plugin_name ),
			'name_admin_bar'     => _x( 'Confero Media', 'add new on admin bar', $this->plugin_name ),
			'add_new'            => _x( 'Add New', 'Confero media', $this->plugin_name ),
			'add_new_item'       => __( 'Add New Confero Media', $this->plugin_name ),
			'new_item'           => __( 'New Confero Media', $this->plugin_name ),
			'edit_item'          => __( 'Edit Confero Media', $this->plugin_name ),
			'view_item'          => __( 'View Confero Media', $this->plugin_name ),
			'all_items'          => __( 'Confero Media', $this->plugin_name ),
			'search_items'       => __( 'Search Confero Media', $this->plugin_name ),
			'parent_item_colon'  => __( 'Parent Media:', $this->plugin_name ),
			'not_found'          => __( 'No Confero Media found.', $this->plugin_name ),
			'not_found_in_trash' => __( 'No Confero Media found in Trash.', $this->plugin_name ),
		);

		$args = array(
			'labels'             => apply_filters( 'confero_media_cpt_labels', $labels ),
			'description'        => __( 'Confero Media Custom Post Type.', $this->plugin_name ),
			'public'             => true,
			'query_var'          => true,
			'rewrite'            => array(
					'slug' => 'media',
			),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon'					 => 'dashicons-format-chat',
			'supports'           => array( 'title' ),
		);
		register_post_type( $this->media_cpt, apply_filters( 'confero_media_cpt_args', $args ) );
	}

/**
 * Register the Taxonomy for Portfolio Events.
 *
 * @since    1.0.0
 */
function confero_register_media_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Media Types', 'taxonomy general name', $this->plugin_name ),
		'singular_name'     => _x( 'Media Type', 'taxonomy singular name', $this->plugin_name ),
		'search_items'      => __( 'Search Media Types', $this->plugin_name ),
		'all_items'         => __( 'All Media Types', $this->plugin_name ),
		'parent_item'       => __( 'Parent Media Type', $this->plugin_name ),
		'parent_item_colon' => __( 'Parent Media Type:', $this->plugin_name ),
		'edit_item'         => __( 'Edit Media Type', $this->plugin_name ),
		'update_item'       => __( 'Update Media Type', $this->plugin_name ),
		'add_new_item'      => __( 'Add New Media Type', $this->plugin_name ),
		'new_item_name'     => __( 'New Media Type Name', $this->plugin_name ),
		'menu_name'         => __( 'Media Type', $this->plugin_name ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'						=> array( 'slug' => 'media/type', 'with_front' => false ),
	);

	register_taxonomy( 'media-type', $this->media_cpt, $args );
}

	/**
	 * Add Projects Fields
	 *
	 * @since  1.0.0
	 *
	 * @author Will King
	 * @return void
	 */
	public function confero_register_media_fields() {
		if ( function_exists( 'acf_add_local_field_group' ) ) :
			$field_location = array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => $this->media_cpt,
					),
				),
			);

			$field_setup = array(
				array(
					'key' => 'field_media_type',
					'label' => 'Media Type',
					'name' => 'media_type',
					'type' => 'radio',
					'instructions' => 'Choose what type of media is being published',
					'choices' => array(
						'publications' => 'Publications',
						'film' => 'Film',
					),
					'allow_null' => 0,
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
				array(
					'key' => 'field_publication_cover',
					'label' => 'Publication Cover',
					'name' => 'publication_cover',
					'type' => 'image',
					'return_format' => 'array',
					'preview_size' => 'medium',
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_media_type',
								'operator' => '==',
								'value' => 'publications',
							),
						),
					),
				),
				array(
					'key' => 'field_publication_spread',
					'label' => 'Publication Spread',
					'name' => 'publication_spread',
					'type' => 'file',
					'instructions' => 'Upload the Magazine Spread here. PDF only.',
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_media_type',
								'operator' => '==',
								'value' => 'publications',
							),
						),
					),
					'return_format' => 'url',
					'mime_types' => 'pdf',
				),
				array(
					'key' => 'field_film_thumbnail',
					'label' => 'Film Thumbnail',
					'name' => 'film_thumbnail',
					'type' => 'image',
					'return_format' => 'array',
					'preview_size' => 'medium',
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_media_type',
								'operator' => '==',
								'value' => 'film',
							),
						),
					),
				),
				array(
					'key' => 'field_film_embed',
					'label' => 'Film Embed',
					'name' => 'film_embed',
					'type' => 'oembed',
					'instructions' => 'Paste the link from Vimeo here',
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_media_type',
								'operator' => '==',
								'value' => 'film',
							),
						),
					),
				),
			);

			acf_add_local_field_group(array(
				'key'      => 'media_info',
				'title'    => 'Media Info',
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
	public function confero_register_media_sizes() {
		add_image_size( 'thumb', 510, 340, array( 'center', 'center' ) );
		add_image_size( 'magazine', 600, 800, array( 'center', 'top' ) );
		add_image_size( 'magazine-s', 420, 560, array( 'center', 'top' ) );
	}

}
