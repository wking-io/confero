<?php
/*
Plugin Name: Confero Social Widget
Plugin URI: http://wking.io/
Description: Add widget to add and manage social accounts for facebook, twitter, and instagram.
Version: 1.0.0
Author: William King
Author URI: http://wking.io/
License: GPLv2
*/

class confero_social_widget extends WP_Widget {

  public function __construct() {
    $widget_options = array(
      'classname' => 'confero_social_widget',
      'description' => 'This is a widget to manage social accounts for Christopher Confero',
    );
    parent::__construct( 'confero_social_widget', 'Confero Social Widget', $widget_options );
  }

  public function widget( $args, $instance ) {
    $url_twitter = apply_filters('url_twitter', $instance['url_twitter']);
    $url_facebook = apply_filters('url_facebook', $instance['url_facebook']);
    $url_pinterest = apply_filters('url_instagram', $instance['url_pinterest']);
    $url_instagram = apply_filters('url_instagram', $instance['url_instagram']);
    
    ?>

    <a class="social-link" href="<?php echo $url_twitter; ?>" target="_blank">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 40.5">
        <path class="svg--fill" d="M50,4.79A20.49,20.49,0,0,1,44.11,6.4,10.25,10.25,0,0,0,48.62.75,20.58,20.58,0,0,1,42.1,3.23a10.26,10.26,0,0,0-17.48,9.32A29.15,29.15,0,0,1,3.48,1.87,10.21,10.21,0,0,0,6.66,15.52,10.25,10.25,0,0,1,2,14.24s0,.09,0,.13a10.24,10.24,0,0,0,8.23,10,10.31,10.31,0,0,1-4.63.17,10.27,10.27,0,0,0,9.58,7.1A20.62,20.62,0,0,1,2.45,36,21.08,21.08,0,0,1,0,35.91,29.1,29.1,0,0,0,15.72,40.5c18.87,0,29.19-15.58,29.19-29.09,0-.44,0-.88,0-1.32A20.79,20.79,0,0,0,50,4.79Z"/>
      </svg>
    </a>
    <a class="social-link" href="<?php echo $url_facebook; ?>" target="_blank">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.75 40.5">
        <path class="svg--fill" d="M18.75,13.11H12.36V8.91A1.71,1.71,0,0,1,14.14,7h4.51V0L12.44,0C5.55,0,4,5.18,4,8.49v4.63H0v7.15H4V40.5h8.38V20.26H18Z"/>
      </svg>
    </a>
    <a class="social-link" href="<?php echo $url_pinterest; ?>" target="_blank">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 161.89 209.02">
        <path class="svg--fill" d="M83.75 0C29 0 0 36.71 0 76.72c0 18.58 9.89 41.72 25.72 49.09 2.41 1.12 3.69.63 4.23-1.69.43-1.77 2.57-10.36 3.53-14.37a3.78 3.78 0 0 0-.89-3.65c-5.21-6.33-9.41-18-9.41-28.92 0-27.94 21.17-55 57.22-55 31.16 0 52.94 21.21 52.94 51.56 0 34.29-17.29 58-39.83 58-12.45 0-21.76-10.27-18.78-22.92 3.59-15.05 10.51-31.33 10.51-42.18 0-9.75-5.23-17.87-16-17.87-12.71 0-22.93 13.16-22.93 30.8a45.57 45.57 0 0 0 3.8 18.8s-12.56 53.13-14.85 63c-3.92 16.78.51 44 .9 46.34a1.31 1.31 0 0 0 2.41.63c1.24-1.64 16.38-24.35 20.66-40.77 1.52-5.93 7.88-30.13 7.88-30.13 4.15 7.88 16.21 14.55 29.05 14.55 38.22 0 65.78-35.17 65.78-78.84C161.89 31.34 127.72 0 83.75 0"/>
      </svg>
    </a>
    <a class="social-link" href="<?php echo $url_instagram; ?>" target="_blank">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40.5 40.5">
        <path class="svg--fill" d="M20.25,9.72A10.42,10.42,0,1,0,30.67,20.14,10.43,10.43,0,0,0,20.25,9.72Zm0,17.11a6.69,6.69,0,1,1,6.69-6.69A6.7,6.7,0,0,1,20.25,26.83Z"/>
        <circle class="svg--fill" cx="31.06" cy="9.46" r="2.37"/>
        <path class="svg--fill" d="M37.23,3.31A11.75,11.75,0,0,0,28.66,0H11.84C4.76,0,0,4.76,0,11.84V28.57a11.81,11.81,0,0,0,3.41,8.72,11.93,11.93,0,0,0,8.52,3.21H28.57a12,12,0,0,0,8.6-3.21,11.72,11.72,0,0,0,3.34-8.64V11.84A11.79,11.79,0,0,0,37.23,3.31Zm-.46,25.34a8.1,8.1,0,0,1-2.21,6,8.35,8.35,0,0,1-6,2.14H11.93A8.29,8.29,0,0,1,6,34.61a8.18,8.18,0,0,1-2.28-6V11.84a8.16,8.16,0,0,1,2.18-6,8.18,8.18,0,0,1,5.93-2.16H28.66a8.12,8.12,0,0,1,5.93,2.21,8.15,8.15,0,0,1,2.18,5.9Z"/>
      </svg>
    </a>

    <?php
  }

  public function form( $instance ) {

    $url_twitter = ! empty( $instance['url_twitter'] ) ? $instance['url_twitter'] : esc_html( '#' );
    $url_facebook = ! empty( $instance['url_facebook'] ) ? $instance['url_facebook'] : esc_html( '#' );
    $url_pinterest = ! empty( $instance['url_pinterest'] ) ? $instance['url_pinterest'] : esc_html( '#' );
    $url_instagram = ! empty( $instance['url_instagram'] ) ? $instance['url_instagram'] : esc_html( '#' );

  	// markup for form ?>
    <p>
  		<label for="<?php echo $this->get_field_id( 'url_twitter' ); ?>">Twitter URL:</label>
  		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'url_twitter' ); ?>" name="<?php echo $this->get_field_name( 'url_twitter' ); ?>" value="<?php echo esc_attr( $url_twitter ); ?>">
  	</p>
  	<p>
  		<label for="<?php echo $this->get_field_id( 'url_facebook' ); ?>">Facebook URL:</label>
  		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'url_facebook' ); ?>" name="<?php echo $this->get_field_name( 'url_facebook' ); ?>" value="<?php echo esc_attr( $url_facebook ); ?>">
  	</p>
  	<p>
  		<label for="<?php echo $this->get_field_id( 'url_pinterest' ); ?>">Pinterest URL:</label>
  		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'url_pinterest' ); ?>" name="<?php echo $this->get_field_name( 'url_pinterest' ); ?>" value="<?php echo esc_attr( $url_pinterest ); ?>">
  	</p>
  	<p>
  		<label for="<?php echo $this->get_field_id( 'url_instagram' ); ?>">Instagram URL:</label>
  		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'url_instagram' ); ?>" name="<?php echo $this->get_field_name( 'url_instagram' ); ?>" value="<?php echo esc_attr( $url_instagram ); ?>">
  	</p>

  <?php }

  public function update($new_instance, $old_instance) {
    $instance = array();
    $instance['url_twitter'] = (! empty( $new_instance['url_twitter'] ) ) ? strip_tags( $new_instance['url_twitter'] ) : '';
  	$instance['url_facebook'] = (! empty( $new_instance['url_facebook'] ) ) ? strip_tags( $new_instance['url_facebook'] ) : '';
    $instance['url_pinterest'] = (! empty( $new_instance['url_pinterest'] ) ) ? strip_tags( $new_instance['url_pinterest'] ) : '';
    $instance['url_instagram'] = (! empty( $new_instance['url_instagram'] ) ) ? strip_tags( $new_instance['url_instagram'] ) : '';

  	return $instance;
  }

}

function confero_register_social_widget() {
  register_widget( 'confero_social_widget' );
}

add_action( 'widgets_init', 'confero_register_social_widget' ); ?>
