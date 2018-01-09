<?php get_header(); ?>

  <main id="main" class="main" role="main">

    <section class="converse">
      <div class="container">
        <h1 class="converse__heading"><?php the_field('converse_heading'); ?></h1>
        <p class="converse__content"><?php the_field('converse_content'); ?></p>

        <?php if( have_rows('converse_options') ): ?>
          <div class="converse__options flex">
          <?php while ( have_rows('converse_options') ) : the_row(); ?>
            <div class="converse__options__item">
              <h2 class="converse__options__title"><?php the_sub_field('converse_title'); ?></h2>
              <p class="converse__options__info"><?php the_sub_field('converse_info'); ?></p>
            </div>

          <?php endwhile; ?>
          </div>
        <?php endif; ?>
      </div>
    </section>

    <section class="tumblr-slider">
      <div class="slider">
        <?php echo do_shortcode( '[tumblrImages wrapperclass="tumblr-slider__item" imgclass="tumblr-slider__img"]' ); ?>
      </div>
      <div class="tumblr-slider__nav slider-nav slider-nav--right">
        <button class="tumblr-slider__nav__btn slider-nav__btn slider-nav__btn slider-prev" role="button">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81.24 141.42">
            <polygon fill="#fff" points="10.53 0 81.24 70.71 10.53 141.42 0 130.89 60.44 70.71 0.13 10.4 10.53 0"/>
          </svg>
        </button>
        <button class="tumblr-slider__nav__btn slider-nav__btn slider-nav__btn slider-next" role="button">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81.24 141.42">
            <polygon fill="#fff" points="10.53 0 81.24 70.71 10.53 141.42 0 130.89 60.44 70.71 0.13 10.4 10.53 0"/>
          </svg>
        </button>
      </div>
    </section>

  </main><!-- #main -->

  <?php if ( is_active_sidebar( 'social-widget-area' ) ) : ?>
  <div class="social-links flex">
    <?php dynamic_sidebar( 'social-widget-area' ); ?>
  </div>
  <?php endif;

get_footer();

