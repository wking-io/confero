import * as R from 'ramda';
import {
  dom,
  domAll,
  addClass,
  elExists,
  eventOn,
  wrapEvent,
  containsClass,
  removeClass,
  findParent,
  getProp,
  trace,
} from './helpers';

const { curry, compose } = R;

const getByDataAttr = curry((attr, elms, val) => elms.find(el => el.dataset[attr] === `${val}`));

const showFilm = compose(
  addClass('the-video__wrapper--open'),
  trace,
  getByDataAttr('filmId', domAll('.the-video__wrapper')),
);

const showFilmWrapped = (e) => {
  if (containsClass('open-video', e.target)) {
    showFilm(compose(getProp('filmId'), getProp('dataset'))(e.target));
  }
  showFilm(
    compose(getProp('filmId'), getProp('dataset'), findParent(containsClass('open-video')))(
      e.target,
    ),
  );
  return e;
};

const showVideo = wrapEvent(addClass, ['the-video--open', dom('.the-video')]);

const hideVideo = (e) => {
  if (containsClass('the-video', e.target)) {
    removeClass('the-video--open', dom('.the-video'));
    removeClass('the-video__wrapper--open', dom('.the-video__wrapper--open'));
  }
  return e;
};

if (elExists('.the-video')) {
  eventOn('click', compose(showFilmWrapped, showVideo), domAll('.open-video'));
  eventOn('click', compose(hideVideo), domAll('.the-video'));
}
