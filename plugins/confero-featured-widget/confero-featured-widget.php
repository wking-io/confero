<?php
/*
Plugin Name: Confero Featured Widget
Plugin URI: http://wking.io/
Description: Add widget to add and manage Featured In logos.
Version: 1.0.0
Author: William King
Author URI: http://wking.io/
License: GPLv2
*/

class confero_featured_widget extends WP_Widget {

  public function __construct() {
    $widget_options = array(
      'classname' => 'confero_featured_widget',
      'description' => 'This is a widget to manage the logos where Confero has been featured',
    );
    parent::__construct( 'confero_featured_widget', 'Confero Featured Widget', $widget_options );
  }

  public function widget( $args, $instance ) { ?>
      <h2><?php echo $instance['title']; ?></h2>
      <ul class="featured-in__list">
        <?php if( have_rows('company_logos', 'widget_' . $args['widget_id']) ): ?>
          <?php while ( have_rows('company_logos', 'widget_' . $args['widget_id']) ) : the_row(); ?>
            <?php $img = get_sub_field('logo', 'widget_' . $args['widget_id']); ?>
            <img class="featured-in__list__item" src="<?php echo $img['sizes']['featured-logo']; ?>" alt="<?php echo $img['title']; ?>" />
          <?php endwhile; ?>
        <?php endif; ?>
      </ul>
      <?php
  }

  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		?>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<?php 
  }

  public function update($new_instance, $old_instance) {
  	$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
  }

}

function confero_register_featured_widget() {
  register_widget( 'confero_featured_widget' );
}

add_action( 'widgets_init', 'confero_register_featured_widget' ); 

/**
 * Add Widget fields
 *
 * @since  1.0.0
 *
 * @author Will King
 * @return void
 */
function confero_register_featured_widget_fields() {
  if( function_exists('acf_add_local_field_group') ):
    $field_location = array(
      array(
        array(
          'param' => 'widget',
          'operator' => '==',
          'value' => 'confero_featured_widget',
        ),
      ),
    );

    $field_setup = array(
      array(
        'key' => 'field_company_logos',
        'label' => 'Company Logos',
        'name' => 'company_logos',
        'type' => 'repeater',
        'instructions' => 'Add a logo for each company you want to show in the Featured section showing on the media pages.',
        'button_label' => 'Add Logo',
        'sub_fields' => array(
          array(
            'key' => 'field_logo',
            'label' => 'Logo',
            'name' => 'logo',
            'type' => 'image',
            'instructions' => 'Since the background will be a dark grey please upload white logos with transparent backgrounds.',
            'return_format' => 'array',
            'preview_size' => 'medium',
            'mime_types' => 'png',
          ),
        ),
      ),
    );

    acf_add_local_field_group(array(
      'key' => 'featured_widget',
      'title' => 'Featured Widget',
      'fields' => $field_setup,
      'location' => $field_location,
    ));
  endif;
}

add_action( 'init', 'confero_register_featured_widget_fields' );

/**
 * Register product photo sizes.
 *
 * @since 1.0.0
 *
 * @author Will King
 * @return void
 */
function confero_register_featured_widget_sizes() {
  add_image_size( 'featured-logo', 400 );
}

add_action( 'init', 'confero_register_featured_widget_sizes' );
  
?>
