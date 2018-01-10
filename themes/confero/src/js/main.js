import * as R from 'ramda';

import '../scss/main.scss';
import '../fonts/bd45538f-4200-4946-b177-02de8337032d.eot';
import '../fonts/700cfd4c-3384-4654-abe1-aa1a6e8058e4.woff2';
import '../fonts/9908cdad-7524-4206-819e-4f345a666324.woff';
import '../fonts/b710c26a-f1ae-4fb8-a9fe-570fd829cbf1.ttf';
import '../fonts/c9e387df-c0d3-42e1-8de6-78c41f68594c.svg';
import '../fonts/38471ac0-7849-4a39-9f97-f89d78f42142.eot';
import '../fonts/79803af7-369c-4a5f-bc95-fb69ee7e77f8.woff2';
import '../fonts/483a662e-88d8-4865-8dd3-1515c67fe28b.woff';
import '../fonts/d29e72e3-fcd5-4fa6-8cfb-986a2e33e105.ttf';
import '../fonts/1e08e1b1-b459-4819-95bc-54667cb4d9b5.svg';
import '../fonts/b247e158-e647-4a3d-9637-944de5124043.eot';
import '../fonts/bc0668e2-e5c8-45ce-954d-3b998c6b6803.woff2';
import '../fonts/2ef5ecda-1772-45e2-843f-a13f5d76ed3a.woff';
import '../fonts/33cf10ca-a6bb-4888-a320-d38720c9847b.ttf';
import '../fonts/3428a0e6-cb4d-408a-8331-cc78554ab49c.svg';
import '../fonts/620781dc-b993-429f-ace1-722c9b2ba789.eot';
import '../fonts/2829a59f-b2f8-4272-a496-b2e4e9bdc87e.woff2';
import '../fonts/3bd69eb9-2110-4d97-989e-99a659576659.woff';
import '../fonts/8edaed62-069c-4a3b-87f5-fc14b5cdaec3.ttf';
import '../fonts/d5c40f0a-3098-4a2b-8cbb-84524c2a29bc.svg';

import { initTumblrSlider, initHeroSlider, initStepsSlider } from './sliders';
import { dom, toggleClassOnEvent, toggleAttrOnEvent } from './helpers';

const { compose, head } = R;

// Tumblr Slider Initialization
const tumblrSliderWrapper = '.tumblr-slider';
initTumblrSlider(tumblrSliderWrapper);

// Hero Slider Initialization
const heroSliderWrapper = '.hero-slider';
initHeroSlider(heroSliderWrapper);

// Step Slider Initialization
const stepSliderWrapper = '.steps-slider';
initStepsSlider(stepSliderWrapper);

// Toggle Nav
const nav = dom('.nav');
const navToggle = dom('.menu-toggle');
const toggleNavOnEvent = toggleClassOnEvent(head(nav), 'nav--open');
const toggleExpandedOnEvent = toggleAttrOnEvent(head(navToggle), 'aria-expanded');
navToggle.forEach(el =>
  el.addEventListener('click', compose(toggleExpandedOnEvent, toggleNavOnEvent)),
);
