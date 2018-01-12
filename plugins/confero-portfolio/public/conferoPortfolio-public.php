<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.wking.io
 * @since      1.0.0
 *
 * @package    conferoPortfolio
 * @subpackage conferoPortfolio/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    conferoPortfolio
 * @subpackage conferoPortfolio/public
 * @author     Will King <contact@wking.io>
 */
class conferoPortfolio_Public {

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
		 * defined in conferoPortfolio_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The conferoPortfolio_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/conferoPortfolio-public.css', array(), $this->version, 'all' );

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
		 * defined in conferoPortfolio_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The conferoPortfolio_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/conferoPortfolio-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
  * Register portfolio shortcodes.
  *
  * @since 1.0.0
  *
  * @author Will King
  * @return void
  */
  public function confero_register_portfolio_shortcodes() {
		add_shortcode('portfolioTile', array($this, 'display_portfolio_tile'));
		add_shortcode('portfolioMeta', array($this, 'display_portfolio_meta'));
		add_shortcode('portfolioImages', array($this, 'display_portfolio_images'));
	}

	/**
  * Display project tile.
  *
  * @since 1.0.0
  *
  * @author Will King
  * @return string Project tile markup
  */
	function display_portfolio_tile( $atts ) {
		$a = shortcode_atts( array(
			'portfolio' => '123',
		), $atts );

		$thumb = get_field('event_thumbnail', $a['portfolio']);
		$title = get_the_title( $a['portfolio'] );
		$link = get_the_permalink( $a['portfolio'] );
		$location = get_field( 'event_location', $a['portfolio'] );

		ob_start(); ?>
		<div class="tile" data-portfolio-id="<?php echo $a['portfolio']; ?>">
			<a class="tile__link" href="<?php echo $link; ?>">
				<img class="tile__thumb" src="<?php echo $thumb['sizes']['portfolio'] ?>" alt="<?php echo $title ?>">
				<h2 class="tile__heading"><?php echo $title; ?></h2>
				<p class="tile__subheading"><?php echo $location; ?></p>
			</a>
		</div>
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
	function display_portfolio_meta( $atts ) {
		$a = shortcode_atts( array(
			'portfolio' => '123',
		), $atts );
		$title = get_the_title( $a['portfolio'] );
		$photo = get_field('photographer', $a['portfolio']);

		ob_start(); ?>
		<h1 class="portfolio__heading"><?php echo $title; ?></h1>
		<?php if ($photo['photographer_website']) : ?>
			<p class="portfolio__photo"><a class="portfolio__photo__link" href="<?php echo $photo['photographer_website']; ?>" target="_blank"><?php echo $photo['photographer_name']; ?></a></p>
		<?php else:  ?>
			<p><?php echo $photo['photographer_name']; ?></p>
		<?php endif; ?>
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
	function display_portfolio_images( $atts ) {
		$a = shortcode_atts( array(
			"portfolio" => '123',
		), $atts );
		$images = get_field( 'event_images',  $a['portfolio'] );
		ob_start();
		foreach ( $images as $image ) : ?>
			<div class="portfolio__item">
				<img
					class="portfolio__img"
					src="<?php echo $image['url']; ?>" 
					alt="<?php echo $image['title'] ?>"
				/>
			</div>
		<?php endforeach;
		return ob_get_clean();
	}

}
