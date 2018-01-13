<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package johnsonKreis
 */

$media_categories = array_reverse( get_terms('media-type') );
$film_ids = array();

get_header(); ?>
  <main id="main" class="main" role="main">
  
  <?php if ( have_posts() ) : ?>
    <div class="container">

      <ul class="post-filter">
        <?php if ( ! empty( $media_categories ) ) : ?>
          <?php foreach ( $media_categories as $cat ) : ?>
            <li class="post-filter__item"><a class="post-filter__link <?php if ( $term === $cat->slug ) { echo 'post-filter__link--active';} ?>" href="<?php echo home_url() . '/media/' . $cat->slug; ?>"><?php echo $cat->name; ?></a></li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>

      <?php if ($term === 'film') : ?>
        <section class="gallery flex">
          <?php while ( have_posts() ) : the_post(); ?>
            <?php $film_ids[] = get_the_ID(); ?>
            <?php echo do_shortcode('[filmTile film="' . get_the_ID() . '"]'); ?>
          <?php endwhile; ?>
        </section>

        <?php the_posts_navigation(array(
          'prev_text' => '<button class="btn btn--ghost"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81.24 141.42"><polygon class="svg-fill" points="10.53 0 81.24 70.71 10.53 141.42 0 130.89 60.44 70.71 0.13 10.4 10.53 0"/></svg> Older Films</button>',
          'next_text' => '<button class="btn btn--ghost"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81.24 141.42"><polygon class="svg-fill" points="10.53 0 81.24 70.71 10.53 141.42 0 130.89 60.44 70.71 0.13 10.4 10.53 0"/></svg> Newer Films</button>'
        )); ?>

        <section class="the-video the-video--film">
          <div class="container">
            <?php foreach ( $film_ids as $id ) :
              echo do_shortcode('[filmVideo film="' . $id . '"]');
            endforeach; ?>
          </div>
        </section>

      <?php elseif ($term === 'publication') : ?>
      <?php endif; ?>
      
    </div>

  <?php else : ?>

    <?php get_template_part( 'template-parts/content', 'none' ); ?>

  <?php endif; ?>

  </main><!-- #main -->

<?php
get_footer();
