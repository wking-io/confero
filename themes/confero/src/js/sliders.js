import $ from 'jquery';
import 'slick-carousel';
import {
  classList,
  dom,
  domAll,
  setProp,
  getProp,
  findParent,
  containsClass,
  eventOn,
} from './helpers';

export function initTumblrSlider(context) {
  const loading = status => (e) => {
    classList(status, 'loading', e.target);
  };

  $(`${context} .slider`).on('init', loading('remove'));
  $(`${context} .slider`).on('reInit', loading('remove'));
  $(`${context} .slider`).on('destroy', loading('add'));

  $(`${context} .slider`).slick({
    infinite: true,
    autoplay: true,
    cssEase: 'ease-in',
    speed: 400,
    arrows: false,
    variableWidth: true,
    slidesToShow: 1,
    nextArrow: dom(`${context} .slick-next`),
    prevArrow: dom(`${context} .slick-prev`),
    responsive: [
      {
        breakpoint: 800,
        settings: {
          centerMode: true,
        },
      },
    ],
  });

  $(`${context} .slider-prev`).click(() => $(`${context} .slider`).slick('slickPrev'));
  $(`${context} .slider-next`).click(() => $(`${context} .slider`).slick('slickNext'));
}

export function initHeroSlider(context) {
  $(`${context} .slider`).slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 7500,
    adaptiveHeight: true,
  });

  $(`${context} .slider-prev`).click(() => $(`${context} .slider`).slick('slickPrev'));
  $(`${context} .slider-next`).click(() => $(`${context} .slider`).slick('slickNext'));
}

const fancyNav = (context) => {
  const goToSlide = (e) => {
    $(`${context} .slider`).slick('slickGoTo', e.target.dataset.slideIndex);
    return e;
  };
  eventOn('click', goToSlide, domAll('.nav-item'));

  // On before slide change
  /* eslint-disable eqeqeq */
  $(`${context} .slider`).on('beforeChange', (event, slick, currentSlide, nextSlide) => {
    const parentEl = findParent(containsClass('steps-slider'), event.target);
    setProp('activeSlide', nextSlide, getProp('dataset', parentEl));
  });
};

export function initStepsSlider(context) {
  $(`${context} .slider`).slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 10000,
    adaptiveHeight: true,
  });

  fancyNav(context);
}

export function initPortfolioSlider(context) {
  $(`${context} .slider`).slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    arrows: false,
    fade: true,
    asNavFor: `${context} .slider-sub`,
    responsive: [
      {
        breakpoint: 455,
        settings: 'unslick',
      },
    ],
  });

  $(`${context} .slider-sub`).slick({
    infinite: true,
    slidesToShow: 3,
    variableWidth: true,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
    asNavFor: `${context} .slider`,
    focusOnSelect: true,
    responsive: [
      {
        breakpoint: 455,
        settings: 'unslick',
      },
    ],
  });

  $(`${context} .slider-prev`).click(() => $(`${context} .slider-sub`).slick('slickPrev'));
  $(`${context} .slider-next`).click(() => $(`${context} .slider-sub`).slick('slickNext'));
}

export function destroySlider(context) {
  $(`${context} .slider`).slick('unslick');
  $(`${context} .slider-sub`).slick('unslick');
}
