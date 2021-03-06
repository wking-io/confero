<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package johnsonKreis
 */

$portfolio_categories = array_reverse( get_terms('event-type') );

function cmp($a, $b) {
	$priority = array(
		'editorial' => 0,
		'weddings' => 1,
		'social' => 2,
		'corporate' => 3,
		'vip' => 4,
		'christopher' => 5
	);

	return ($priority[$a->slug] < $priority[$b->slug]) ? -1 : 1;
}

uasort($portfolio_categories, 'cmp');

get_header(); ?>
  <main id="main" class="main main--event" role="main">

    <div class="container">

        <ul class="post-filter">
          <li class="post-filter__item"><a class="post-filter__link" href="<?php echo home_url() . '/portfolio'; ?>">All</a></li>
          <?php if ( ! empty( $portfolio_categories ) ) : ?>
            <?php foreach ( $portfolio_categories as $cat ) : ?>
              <?php if ($cat->slug !== 'vip' && $cat->slug !== 'christopher') : ?>
                <li class="post-filter__item"><a class="post-filter__link <?php if ( $term === $cat->slug ) { echo 'post-filter__link--active';} ?>" href="<?php echo home_url() . '/portfolio/event/' . $cat->slug; ?>"><?php echo $cat->name; ?></a></li>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>

  <?php if ( have_posts() ) : ?>
    

      <section class="gallery flex">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php echo do_shortcode('[portfolioTile portfolio="' . get_the_ID() . '"]'); ?>
        <?php endwhile; ?>
      </section>

  <?php else : ?>

    <?php get_template_part( 'template-parts/content', 'none' ); ?>

  <?php endif; ?>
  
    </div>

  </main><!-- #main -->

<?php
get_footer();
