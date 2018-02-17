import { curry, compose, reduce } from 'ramda';
import Player from '@vimeo/player';
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
} from './helpers';

const getByDataAttr = curry((attr, elms, val) => elms.find(el => el.dataset[attr] === `${val}`));

const showFilm = compose(
  addClass('the-video__wrapper--open'),
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

const playerReducer = (acc, el) =>
  Object.assign(acc, { [el.dataset.filmId]: new Player(el.firstElementChild) });

const players = reduce(playerReducer, {}, domAll('.the-video__wrapper'));

const pausePlayer = curry((obj, el) => {
  const id = el.dataset.filmId;
  obj[id].pause();
  return el;
});

const hideVideo = (e) => {
  if (containsClass('the-video', e.target)) {
    removeClass('the-video--open', dom('.the-video'));
    compose(removeClass('the-video__wrapper--open'), pausePlayer(players), dom)(
      '.the-video__wrapper--open',
    );
  }
  return e;
};

if (elExists('.the-video')) {
  eventOn('click', compose(showFilmWrapped, showVideo), domAll('.open-video'));
  eventOn('click', compose(hideVideo), domAll('.the-video'));
}
