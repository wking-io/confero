<?php get_header(); ?>

  <main id="main" class="main" role="main">

      <section class="services">
        <?php if( have_rows('service_tiles') ): ?>
          <?php while ( have_rows('service_tiles') ) : the_row();
            $tile_img = get_sub_field('service_img');
            $tile_title = get_sub_field('service_title');
            $tile_description = get_sub_field('service_description');
            $tile_link_text = get_sub_field('service_link_text');
            $tile_link_url = get_sub_field('service_link_url'); ?>

            <div class="service-tile">
              <img class="service-tile__bg" src="<?php echo $tile_img['url']; ?>" />
              <div class="service-tile__overlay"></div>
              <div class="service-tile__info flex">
                <div class="service-tile__header">
                  <h2 class="service-tile__title"><?php echo $tile_title; ?></h2>
                  <a class="service-tile__link btn btn--ghost btn--ghost-light" href="<?php echo home_url() . $tile_link_url; ?>"><?php echo $tile_link_text; ?></a>
                </div>
                <div class="service-tile__description"><?php echo $tile_description; ?></div>
                <a class="service-tile__link--mobile btn btn--ghost" href="<?php echo home_url() . $tile_link_url; ?>"><?php echo $tile_link_text; ?></a>
              </div>
            </div>

          <?php endwhile; ?>
        <?php endif; ?>
      </section>

  </main><!-- #main -->

<?php get_footer();

