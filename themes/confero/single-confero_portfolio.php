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
		<?php echo do_shortcode('[portfolioMeta portfolio="' . get_the_ID() . '"]'); ?>
		<?php echo do_shortcode('[portfolioImages portfolio="' . get_the_ID() . '"]'); ?>
	<?php endwhile; ?>

	</main><!-- #main -->

<?php
get_footer();
