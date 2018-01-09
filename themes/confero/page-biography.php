<?php get_header();

$bio_title = get_field('biography_title');
$bio_content = get_field('biography_content');
$bio_img = get_field('biography_img');

$promo_video = get_field('promo_video');
$promo_bg = get_field('promo_video_bg');
$promo_title = get_field('promo_video_title');
$promo_subtitle = get_field('promo_video_subtitle');
$promo_description = get_field('promo_video_description');

$philosophy_title = get_field('philosophy_title');
$philosophy_content = get_field('philosophy_content');

$steps = array();
$nums = array(
  1 => 'one',
  2 => 'two',
  3 => 'three',
  4 => 'four',
  5 => 'five',
);

$i = 1;

if ( have_rows('hero_slides_desktop') ) :
  while ( have_rows('hero_slides_desktop') ) : the_row();
    $steps[$i]['num'] = $nums[$i];
    $steps[$i]['title'] = get_sub_field('step_title'); 
    $steps[$i]['content'] = get_sub_field('step_content');
    $i++;
	endwhile;
endif;

?>

  <main id="main" class="main" role="main">
    <section class="biography">
      <div class="container">
        <div class="biography__info">
          <h2 class="biography__title"><?php echo $bio_title ?></h2>
          <div><?php echo $bio_content; ?></div>
          <button class="biography__btn btn btn--ghost">See Christopher Confero In Action</button>
        </div>
        <img src="<?php echo $bio_img['url'] ?>" alt="" class="biography__img">
      </div>
    </section>

    <section class="promo-video" <?php if ($promo_bg) { echo 'style="background-image: url(' . $promo_bg . ')" '; }?>>
      <div class="promo-video__overlay"></div>
      <div class="container">
        <div class="promo-video__play">
          <button class="promo-video__play__btn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 68 82">
              <path fill-rule="evenodd" d="M68 41L0 82V0z"/>
            </svg>
          </button>
        </div>
        <div class="promo-video__info">
          <h2 class="promo-video__title"><?php echo $promo_title;?></h2>
          <h3 class="promo-video__subtitle"><?php echo $promo_subtitle;?></h3>
          <div class="promo-video__description"><?php echo $promo_description;?></div>
        </div>
      </div>
    </section>

    <section class="philosophy">
      <div class="container">
        <h2 class="philosophy__title"><?php echo $philosophy_title;?></h2>
        <div class="philosophy__content"><?php echo $philosophy_content;?></div>
      </div>
    </section>

    <?php if (! empty( $steps ) ) : ?>
      <section class="steps">
        <div class="container">
          <?php if ( ! empty( $steps['num'] ) ) : ?>
            <ul class="steps__nav">
              <?php foreach ( $steps as $step ) : ?>
                <li class="steps__nav__item"><?php echo 'Step ' . $step['num']; ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>
      </section>
    <?php endif; ?>

  </main><!-- #main -->

<?php get_footer();

