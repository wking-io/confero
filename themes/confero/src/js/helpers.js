import * as R from 'ramda';

const { curry } = R;

function isElmNode(el) {
  return el && el.nodeType === 1;
}

export function dom(sel, root = false) {
  const elms = isElmNode(root) ? root.querySelectorAll(sel) : document.querySelectorAll(sel);
  return elms || [];
}

export const classList = curry((method, className, el) => {
  el.classList[method](className);
  return el;
});

export const addClass = classList('add');
export const removeClass = classList('remove');
export const toggleClass = classList('toggle');
export const containsClass = classList('contains');

export const setAttr = curry((attr, val, el) => {
  el.setAttribute(attr, val);
  return el;
});

export function preventDefault(e) {
  e.preventDefault();
  return e;
}
