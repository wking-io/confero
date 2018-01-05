<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package johnsonKreis
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
        <section>
          <h1><?php the_field('converse_heading'); ?></h1>
          <p><?php the_field('converse_content'); ?></p>

          <?php if( have_rows('converse_options') ): ?>
            <div>
            <?php while ( have_rows('converse_options') ) : the_row(); ?>

              <h2><?php the_sub_field('converse_title'); ?></h2>
              <p><?php the_sub_field('converse_info'); ?></p>

            <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </section>
			<?php endwhile; ?>

      <section class="tumblr-slider">
        <div class="slider">
          <?php echo do_shortcode( '[tumblrImages wrapperclass="tumblr-slider__item" imgclass="tumblr-slider__img"]' ); ?>
        </div>
        <div class="tumblr-slider__nav slider-nav slider-nav--right">
          <button class="tumblr-slider__nav__btn slider-nav__btn slider-nav__btn--dark slider-prev" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81.24 141.42">
              <polygon fill="#fff" points="10.53 0 81.24 70.71 10.53 141.42 0 130.89 60.44 70.71 0.13 10.4 10.53 0"/>
            </svg>
          </button>
          <button class="tumblr-slider__nav__btn slider-nav__btn slider-nav__btn--dark slider-next" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81.24 141.42">
              <polygon fill="#fff" points="10.53 0 81.24 70.71 10.53 141.42 0 130.89 60.44 70.71 0.13 10.4 10.53 0"/>
            </svg>
          </button>
        </div>
      </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if ( is_active_sidebar( 'social-widget-area' ) ) : ?>
<div class="social-links">
  <?php dynamic_sidebar( 'social-widget-area' ); ?>
</div>
<?php endif;

get_footer();

