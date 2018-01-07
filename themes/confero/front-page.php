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
	<main class="main" role="main">

		<?php while ( have_posts() ) : the_post();

			$desktop_images = get_field('hero_images_desktop');
			$mobile_images = get_field('hero_images_mobile'); 
			$service_tiles = get_field('home_service_tiles'); ?>

			<section class="hero">
			<?php if ( ! empty( $desktop_images ) || ! empty( $mobile_images ) ) : ?>
				<div class="hero-slider">

					<div class="slider slider--desktop">
						<?php foreach ( $desktop_images as $img ) : error_log( print_r( $img, true ) ); ?>
							<div class="hero-slider__item">
								<img src="<?php echo $img['url']; ?>" class="hero-slider__img" />
							</div>
						<?php endforeach; ?>
					</div>

					<div class="slider slider--mobile">
						<?php foreach ( $mobile_images as $img ) : ?>
							<div class="hero-slider__item">
								<img src="<?php echo $img['sizes']['medium_large']; ?>" class="hero-slider__img" />
							</div>
						<?php endforeach; ?>
					</div>

					<button class="hero-slider__btn slider-nav__btn slider-prev" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81.24 141.42">
              <polygon points="10.53 0 81.24 70.71 10.53 141.42 0 130.89 60.44 70.71 0.13 10.4 10.53 0"/>
            </svg>
          </button>

					<button class="hero-slider__btn slider-nav__btn slider-next" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81.24 141.42">
              <polygon points="10.53 0 81.24 70.71 10.53 141.42 0 130.89 60.44 70.71 0.13 10.4 10.53 0"/>
            </svg>
          </button>

				</div>
			<?php endif; ?>
			</section>
			<section class="home-service-tiles">
				<?php if( have_rows('home_service_tiles') ) : ?>
					<?php while ( have_rows('home_service_tiles') ) : the_row(); 
						$tile_img = get_sub_field('home_service_img');
						$tile_text = get_sub_field('home_service_text');
						$tile_text_position = get_sub_field('home_text_position');
						$tile_link = get_sub_field('home_service_link'); ?>

						<a href="<?php echo home_url() . $tile_link; ?>">
							<div class="service-tile service-tile--compact" <?php if ( ! empty( $tile_img ) ) { echo 'style="background-image: url(' . $tile_img['url'] . ');"'; } ?>>
								<?php if ( $tile_text ) : ?>
									<h2 class="service-tile__title <?php echo ! empty( $tile_text_position ) ? $tile_text_position : 'top-left';  ?>"><?php echo $tile_text; ?></h2>
								<?php endif; ?>
							</div>
						</a>

					<?php endwhile; ?>
				<?php endif; ?>
			</section>

		<?php endwhile; ?>

	</main><!-- #main -->
<?php get_footer();
