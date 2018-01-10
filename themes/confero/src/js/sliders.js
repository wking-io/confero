import $ from 'jquery';
import 'slick-carousel';
import { classList } from './helpers';

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
    nextArrow: document.querySelector(`${context} .slick-next`),
    prevArrow: document.querySelector(`${context} .slick-prev`),
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
    nextArrow: document.querySelector(`${context} .slick-next`),
    prevArrow: document.querySelector(`${context} .slick-prev`),
  });

  $(`${context} .slider-prev`).click(() => $(`${context} .slider`).slick('slickPrev'));
  $(`${context} .slider-next`).click(() => $(`${context} .slider`).slick('slickNext'));
}

const fancyNav = (context) => {
  const navItems = Array.from(document.querySelectorAll('.fancy-nav__item')).map((item, index) => {
    item.addEventListener('click', () => {
      $(`${context} .slider__items`).slick('slickGoTo', index);
    });

    return item;
  });

  // On before slide change
  /* eslint-disable eqeqeq */
  $(`${context} .slider__items`).on('beforeChange', (event, slick, currentSlide, nextSlide) => {
    navItems.map((item) => {
      item.dataset.sliderState = 'waiting';
      return true;
    });
    navItems[nextSlide].dataset.sliderState = 'current';

    if (nextSlide == 0) {
      navItems[3].dataset.sliderState = 'prev';
    } else {
      navItems[nextSlide - 1].dataset.sliderState = 'prev';
    }

    if (nextSlide == 3) {
      navItems[0].dataset.sliderState = 'next';
    } else {
      navItems[nextSlide + 1].dataset.sliderState = 'next';
    }
  });
};

export function initStepsSlider(context) {
  $(`${context} .slider`).slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 7500,
    adaptiveHeight: true,
  });

  fancyNav(context);
}

export function destroySlider(context) {
  $(`${context} .slider`).slick('unslick');
}
