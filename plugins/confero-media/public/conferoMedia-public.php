<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.wking.io
 * @since      1.0.0
 *
 * @package    conferoMedia
 * @subpackage conferoMedia/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    conferoMedia
 * @subpackage conferoMedia/public
 * @author     Will King <contact@wking.io>
 */
class conferoMedia_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/conferoMedia-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/conferoMedia-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
  * Register portfolio shortcodes.
  *
  * @since 1.0.0
  *
  * @author Will King
  * @return void
  */
  public function confero_register_media_shortcodes() {
	}

	/**
  * Display project tile.
  *
  * @since 1.0.0
  *
  * @author Will King
  * @return string Project tile markup
  */
	function display_media_tile( $atts ) {
		$a = shortcode_atts( array(
			"media" => '123',
		), $atts );

		ob_start(); ?>
		<a class="media-tile" data-media-id=""></a>
		<?php return ob_get_clean();
	}

	/**
  * Display project tile.
  *
  * @since 1.0.0
  *
  * @author Will King
  * @return string Project tile markup
  */
	function display_media_thumb( $atts ) {
		$a = shortcode_atts( array(
			"media" => '123',
			"class" => 'title',
		), $atts );
		$title = get_the_title( $a['media'] );
		$link = get_field('media_url', $a['media']);

		ob_start(); ?>
		<h3 class="<?php echo $a['class']; ?>"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h3>
		<?php return ob_get_clean();
	}

	/**
  * Display project meta info.
  *
  * @since 1.0.0
  *
  * @author Will King
  * @return string Project tile markup
  */
	function display_media_meta( $atts ) {
		$a = shortcode_atts( array(
			"media" => '123',
			"class" => 'title',
		), $atts );
		$title = get_the_title( $a['project'] );
		$link = get_field('project_website', $a['project']);

		ob_start(); ?>
		<h3 class="<?php echo $a['class']; ?>"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h3>
		<?php return ob_get_clean();
	}

	/**
  * Display portfolio images in successive divs.
  *
  * @since 1.0.0
  *
  * @author Will King
  * @return string Portfolio Item Images
  */
	function display_media_images( $atts ) {
		$a = shortcode_atts( array(
			"project" => '123',
			"class" => 'image',
		), $atts );
		$images = get_field( 'project_images',  $a['project'] );
		ob_start();
		foreach ( $images as $image ) : ?>
			<div class="<?php echo $a['class']; ?>">
				<img
					class="<?php echo $a['class'] . '__img'; ?>"
					src="<?php echo $image['url']; ?>" 
					alt="<?php echo $image['title'] ?>"
				/>
			</div>
		<?php endforeach;
		return ob_get_clean();
	}

}
