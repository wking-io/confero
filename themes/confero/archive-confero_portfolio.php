<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package johnsonKreis
 */

$portfolio_categories = array_reverse( get_terms('event-type') );
get_header(); ?>
	<main id="main" class="main" role="main">
	
	<?php if ( have_posts() ) : ?>
		<div class="container">

			<ul class="post-filter">
				<li class="post-filter__item"><a class="post-filter__link post-filter__link--active" href="<?php echo home_url() . '/portfolio/event/'; ?>">All</a></li>
				<?php if ( ! empty( $portfolio_categories ) ) : ?>
					<?php foreach ( $portfolio_categories as $cat ) : ?>
						<li class="post-filter__item"><a class="post-filter__link" href="<?php echo home_url() . '/portfolio/event/' . $cat->slug; ?>"><?php echo $cat->name; ?></a></li>
					<?php endforeach; ?>
				<?php endif; ?>
			</ul>

			<section class="gallery flex">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php echo do_shortcode('[portfolioTile portfolio="' . get_the_ID() . '"]'); ?>
				<?php endwhile; ?>
			</section>

			<?php the_posts_navigation(array(
				'prev_text' => '<button class="btn btn--ghost"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81.24 141.42"><polygon class="svg-fill" points="10.53 0 81.24 70.71 10.53 141.42 0 130.89 60.44 70.71 0.13 10.4 10.53 0"/></svg> Older Events</button>',
				'next_text' => '<button class="btn btn--ghost"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81.24 141.42"><polygon class="svg-fill" points="10.53 0 81.24 70.71 10.53 141.42 0 130.89 60.44 70.71 0.13 10.4 10.53 0"/></svg> New Events</button>'
			)); ?>

		</div>

	<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	<?php endif; ?>

	</main><!-- #main -->

<?php
get_footer();
