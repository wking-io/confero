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

export function destroySlider(context) {
  $(`${context} .slider`).slick('unslick');
}
