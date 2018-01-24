<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package johnsonKreis
 */

get_header(); ?>
	<main id="main" class="main" role="main">

		<section class="error-404 not-found">
			<div class="container">
				<h1 class="error-404__title">Looks like you found a page that doesn't exist!</h1>
				<p class="error-404__subtitle">You can get back to the home page by clicking here</p>
				<a href="<?php echo home_url(); ?>" class="btn btn--ghost">Homepage</a>
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
