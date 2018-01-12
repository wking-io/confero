<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package johnsonKreis
 */

get_header(); ?>

	<main id="main" class="main" role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<section class="portfolio-item">
			<div class="container">
				<?php echo do_shortcode('[portfolioMeta portfolio="' . get_the_ID() . '" classname="portfolio-item"]'); ?>
				<div class="portfolio-slider">
					<div class="slider"><?php echo do_shortcode('[portfolioImages portfolio="' . get_the_ID() . '" classname="portfolio-item"]'); ?></div>
					<div class="slider-secondary">
						<div class="slider-arrows">
							<button class="portfolio-slider__btn slider-prev" role="button">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81.24 141.42">
									<polygon class="svg-fill" points="10.53 0 81.24 70.71 10.53 141.42 0 130.89 60.44 70.71 0.13 10.4 10.53 0"/>
								</svg>
							</button>
	
							<button class="portfolio-slider__btn slider-next" role="button">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81.24 141.42">
									<polygon class="svg-fill" points="10.53 0 81.24 70.71 10.53 141.42 0 130.89 60.44 70.71 0.13 10.4 10.53 0"/>
								</svg>
							</button>
						</div>
						<div class="slider-sub"><?php echo do_shortcode('[portfolioImages portfolio="' . get_the_ID() . '" size="portfolio-s" classname="portfolio-item"]'); ?></div>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; ?>

	</main><!-- #main -->

<?php
get_footer();
