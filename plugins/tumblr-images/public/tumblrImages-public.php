<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.wking.io
 * @since      1.0.0
 *
 * @package    tumblrImages
 * @subpackage tumblrImages/public
 */

 require_once TUMBLR_IMAGES_PLUGIN_DIRECTORY . 'includes/lib/tumblrImages-api.php';

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    tumblrImages
 * @subpackage tumblrImages/public
 * @author     Will King <contact@wking.io>
 */
class tumblrImages_Public {

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
		 * defined in tumblrImages_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The tumblrImages_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tumblrImages-public.css', array(), $this->version, 'all' );

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
		 * defined in tumblrImages_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The tumblrImages_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tumblrImages-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
  * Register portfolio shortcodes.
  *
  * @since 1.0.0
  *
  * @author Will King
  * @return void
  */
  public function tumblrImages_register_shortcodes() {
		add_shortcode( 'tumblrImages', array( $this, 'display_tumblrImages' ) );
	}

	/**
  * Display project tile.
  *
  * @since 1.0.0
  *
  * @author Will King
  * @return string Project tile markup
  */
	public function display_tumblrImages($atts) {
		$a = shortcode_atts( array(
			'wrapperclass' => 'tumblr-item',
			'imgclass' => 'tumblr-img'
		), $atts );
		// get number of slides
		// get images
		$api = new TI_Api();
		$images = $api->getImagePosts();

		ob_start(); ?>
		<?php foreach($images as $i => $img) : ?>
			<div class="<?php echo $a['wrapperclass']; ?>" data-tumblr-image="<?php echo $i; ?>">
				<img class="<?php echo $a['imgclass']; ?>" src="<?php echo $img['url']; ?>" alt="<?php echo $img['title']; ?>"/>
				<div class="visually-hidden">
					<h2><?php echo $img['title']; ?></h2>
					<p><?php echo $img['caption'] ?></p>
				</div>
			</div>
		<?php endforeach; ?>
		<?php return ob_get_clean();
	}

}
