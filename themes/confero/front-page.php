<?php get_header(); ?>

	<main id="main" class="main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<section class="hero">
			<?php if( have_rows('hero_slides_desktop') || have_rows('hero_slides_mobile') ) : ?>
				<div class="hero-slider">
					<div class="slider--desktop">
						<div class="slider content">
							<?php while ( have_rows('hero_slides_desktop') ) : the_row(); 
								$img = get_sub_field('hero_slides_desktop_img'); 
								$link = get_sub_field('hero_slides_desktop_link'); ?>

								<div class="hero-slider__item">
									<?php if ($link) : ?>
										<a class="hero-slider__link" href="<?php echo home_url() . $link; ?>">
											<img src="<?php echo $img['sizes']['full']; ?>" class="hero-slider__img" />
										</a>
									<?php else : ?>
										<img src="<?php echo $img['sizes']['full']; ?>" class="hero-slider__img" />
									<?php endif; ?>
								</div>
							<?php endwhile; ?>
						</div>
					</div>

					<div class="slider--tablet">
						<div class="slider content">
							<?php while ( have_rows('hero_slides_tablet') ) : the_row(); 
								$img = get_sub_field('hero_slides_tablet_img'); 
								$link = get_sub_field('hero_slides_tablet_link'); ?>

								<div class="hero-slider__item">
									<?php if ($link) : ?>
										<a class="hero-slider__link" href="<?php echo home_url() . $link; ?>">
											<img src="<?php echo $img['sizes']['full-sm']; ?>" class="hero-slider__img" />
										</a>
									<?php else : ?>
										<img src="<?php echo $img['sizes']['full-sm']; ?>" class="hero-slider__img" />
									<?php endif; ?>
								</div>
							<?php endwhile; ?>
						</div>
					</div>

					<div class="slider--mobile">
						<div class="content slider">
							<?php while ( have_rows('hero_slides_mobile') ) : the_row();
								$img = get_sub_field('hero_slides_mobile_img'); 
								$link = get_sub_field('hero_slides_mobile_link'); error_log( print_r( $img, true ) );?>

								<div class="hero-slider__item">
									<?php if ($link) : ?>
										<a class="hero-slider__link" href="<?php echo home_url() . $link; ?>">
											<img src="<?php echo $img['sizes']['tablet']; ?>" class="hero-slider__img" />
										</a>
									<?php else : ?>
										<img src="<?php echo $img['sizes']['tablet']; ?>" class="hero-slider__img" />
									<?php endif; ?>
								</div>
							<?php endwhile; ?>
						</div>
					</div>

					<button class="hero-slider__btn slider-prev" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81.24 141.42">
              <polygon class="svg-fill" points="10.53 0 81.24 70.71 10.53 141.42 0 130.89 60.44 70.71 0.13 10.4 10.53 0"/>
            </svg>
          </button>

					<button class="hero-slider__btn slider-next" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81.24 141.42">
              <polygon class="svg-fill" points="10.53 0 81.24 70.71 10.53 141.42 0 130.89 60.44 70.71 0.13 10.4 10.53 0"/>
            </svg>
          </button>

				</div>
			<?php endif; ?>
			</section>
			<section class="home-service-tiles">
				<div class="content flex">
					<?php if( have_rows('home_service_tiles') ) : ?>
						<?php while ( have_rows('home_service_tiles') ) : the_row(); 
							$tile_img = get_sub_field('home_service_img');
							$tile_text = get_sub_field('home_service_text');
							$tile_text_position = get_sub_field('home_service_position');
							$is_custom = get_sub_field('home_service_custom_toggle');
							$tile_link = $is_custom ? get_sub_field('home_service_custom_link') : get_sub_field('home_service_link'); ?>
	
							<div class="service-tile service-tile--compact">
								<div class="service-tile__bg" <?php if ( ! empty( $tile_img ) ) { echo 'style="background-image: url(' . $tile_img['sizes']['large'] . ');"'; } ?>></div>
								<a class="service-tile__link" href="<?php echo $is_custom ? $tile_link : home_url() . $tile_link; ?>">
									<?php if ( $tile_text ) : ?>
										<h2 class="service-tile__title <?php echo ! empty( $tile_text_position ) ? $tile_text_position : 'top-left';  ?>"><?php echo $tile_text; ?></h2>
									<?php endif; ?>
								</a>
							</div>
	
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</section>

		<?php endwhile; ?>

	</main><!-- #main -->
<?php get_footer();
