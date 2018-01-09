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
export const containsClass = curry((className, el) => el.classList.contains(className));

export const setAttr = curry((attr, val, el) => {
  el.setAttribute(attr, val);
  return el;
});

export const getAttr = curry((prop, el) => el.getAttribute(prop));

export function preventDefault(e) {
  e.preventDefault();
  return e;
}

export const setProp = curry((prop, value, obj) => {
  obj[prop] = value;
  return obj;
});

export const getProp = curry((prop, obj) => obj[prop] || false);
export const flipAttr = (attr, el) => (getAttr(attr, el) === 'true' ? 'false' : 'true');

export function toggleClassOnEvent(el, classname) {
  return function loadedToggle(e) {
    toggleClass(classname, el);
    return e;
  };
}

export function toggleAttrOnEvent(el, attr) {
  return function loadedToggle(e) {
    setAttr(attr, flipAttr(attr, el), el);
    return e;
  };
}
