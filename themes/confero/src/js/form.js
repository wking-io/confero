import { compose, curry, ifElse } from 'ramda';
import { addClass, removeClass, getProp, findParent, hasClass, isElmNode, trace } from './helpers';

const hideLabel = addClass('label-hide');
const showLabel = removeClass('label-hide');
const isEmpty = str => str.length > 0;
const hasValue = compose(trace, isEmpty, getProp('value'));

const getChild = curry((sel, parent) => {
  const el = isElmNode(parent) && parent.querySelector(sel);
  return el || { error: 'element not found' };
});
export const findLabel = compose(
  getChild('.gfield_label'),
  findParent(hasClass('contact-form__input')),
);

export const handleLabels = ifElse(
  hasValue,
  compose(hideLabel, findLabel),
  compose(showLabel, findLabel),
);
