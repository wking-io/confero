import { initStepsSlider } from './sliders';
import {
  elExists,
  dom,
  domAll,
  eventOn,
  addClass,
  removeClass,
  containsClass,
  wrapEvent,
} from './helpers';

// Step Slider Initialization
const stepSliderWrapper = '.steps-slider';
initStepsSlider(stepSliderWrapper);

// Open Bio Video
const showVideo = wrapEvent(addClass, ['the-video--open', dom('.the-video')]);
eventOn('click', showVideo, domAll('.open-video'));

// Close Bio Video
const hideVideo = (e) => {
  if (containsClass('the-video', e.target)) {
    removeClass('the-video--open', dom('.the-video'));
  }
  return e;
};

if (elExists('.the-video')) eventOn('click', hideVideo, dom('.the-video'));
