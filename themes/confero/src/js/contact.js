import { initTumblrSlider } from './sliders';
import { handleLabels } from './form';
import { domAll, eventOn, wrapEvent } from './helpers';

// Tumblr Slider Initialization
const tumblrSliderWrapper = '.tumblr-slider';
initTumblrSlider(tumblrSliderWrapper);

// Show/Hide Labels depending on input values
const formFields = domAll('.gfield_visibility_visible input, .gfield_visibility_visible textarea');

formFields.forEach((field) => {
  handleLabels(field);
  eventOn('keyup', wrapEvent(handleLabels, [field]), field);
  eventOn('focus', wrapEvent(handleLabels, [field]), field);
  eventOn('blur', wrapEvent(handleLabels, [field]), field);
});
