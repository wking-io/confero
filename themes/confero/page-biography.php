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
$nums = array( 'one', 'two', 'three', 'four', 'five' );

$i = 0;

if ( have_rows('confero_steps') ) :
  while ( have_rows('confero_steps') ) : the_row();
    $steps[$i]['num'] = $nums[$i];
    $steps[$i]['title'] = get_sub_field('step_title'); 
    $steps[$i]['content'] = get_sub_field('step_content');
    $i++;
	endwhile;
endif;

?>

  <main id="main" class="main" role="main">
    <section class="biography">
      <div class="container flex items-start">
        <div class="biography__info">
          <h2 class="biography__title"><?php echo $bio_title ?></h2>
          <div class="biography__content"><?php echo $bio_content; ?></div>
          <a class="biography__btn btn btn--ghost" href="<?php echo home_url() . '/portfolio/christopher-in-action/'; ?>">See Christopher Confero In Action</a>
        </div>
        <div class="biography__headshot">
          <img src="<?php echo $bio_img['url'] ?>" alt="" class="biography__headshot__img">
        </div>
      </div>
    </section>

    <section class="promo-video">
      <video playsinline="" autoplay="" muted="" loop="" preload="auto" class="promo-video__bg" poster="<?php echo $promo_bg['sizes']['full']; ?>">
        <?php $bg_video = get_field('promo_video_bg_loop'); ?>
        <source src="<?php echo $bg_video['url']; ?>" type="<?php echo 'video/mp4' ?>">
        Your browser does not support the video tag.
      </video>
      <div class="promo-video__overlay"></div>
      <div class="container flex">
        <div class="promo-video__play">
          <button class="promo-video__play__btn open-video">
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
        <div class="philosophy__content"><p><?php echo $philosophy_content;?></p></div>
      </div>
    </section>

    <?php if (! empty( $steps ) ) : ?>
      <section class="steps-slider" data-active-slide="0">
        <div class="container">
          <ul class="steps-slider__nav flex">
            <?php foreach ( $steps as $i => $step ) : ?>
              <li class="nav-item steps-slider__nav__item steps-slider__nav__item--desktop" data-slide-index="<?php echo $i; ?>"><?php echo 'Step ' . $step['num']; ?></li>
              <li class="nav-item steps-slider__nav__item steps-slider__nav__item--mobile" data-slide-index="<?php echo $i; ?>"><?php echo '0' . ($i + 1); ?></li>
            <?php endforeach; ?>
          </ul>
          <div class="slider">
            <?php foreach ( $steps as $step ) : ?>
              <div>
                <div class="steps-slider__item flex">
                  <h3 class="steps-slider__title"><?php echo $step['title']; ?></h3>
                  <div class="steps-slider__content"><?php echo $step['content']; ?></div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    <?php endif; ?>

    <section class="the-video">
      <div class="container">
        <div class="the-video__wrapper"><?php echo $promo_video; ?></div>
      </div>
    </section>

  </main><!-- #main -->

<?php get_footer();

