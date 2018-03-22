import { compose } from 'ramda';
import Player from '@vimeo/player';
import { initStepsSlider } from './sliders';
import {
  elExists,
  dom,
  domAll,
  eventOn,
  addClass,
  removeClass,
  hasClass,
  wrapEvent,
} from './helpers';

// Step Slider Initialization
const stepSliderWrapper = '.steps-slider';
initStepsSlider(stepSliderWrapper);

const pauseLoop = el => () => el.pause();
const playLoop = el => () => el.play();

// Open Bio Video
const showVideo = wrapEvent(addClass, ['the-video--open', dom('.the-video')]);
eventOn('click', compose(pauseLoop(dom('.promo-video__bg')), showVideo), domAll('.open-video'));

// Pause Bio Video
const pausePlayer = (el) => {
  const player = new Player(el);
  player.pause();
  return player;
};

// Close Bio Video
const hideVideo = (e) => {
  if (hasClass('the-video', e.target)) {
    removeClass('the-video--open', dom('.the-video'));
    pausePlayer(dom('.the-video__wrapper iframe'));
  }
  return e;
};

if (elExists('.the-video')) {
  eventOn('click', compose(playLoop(dom('.promo-video__bg')), hideVideo), dom('.the-video'));
}
