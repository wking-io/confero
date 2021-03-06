import { ifElse, map, curry, partial } from 'ramda';

export const elExists = classname => document.querySelector(classname);

export const isElmNode = el => el && el.nodeType === 1;
const isArray = a => Array.isArray(a);

const branch = fn => ifElse(isArray, map(fn), fn);

export function dom(selector, root) {
  const el =
    root && isElmNode(root) ? root.querySelector(selector) : document.querySelector(selector);
  return el || { error: 'element not found' };
}

export function domAll(selector, root = false) {
  const elms = isElmNode(root)
    ? root.querySelectorAll(selector)
    : document.querySelectorAll(selector);
  return Array.from(elms) || [];
}

// 3. Adding, Removing, and toggling classes on elements

function _classList(method, className, el) {
  el.classList[method](className);
  return el;
}

export const classList = curry((method, className, el) =>
  branch(partial(_classList, [method, className]))(el),
);

export const addClass = classList('add');
export const removeClass = classList('remove');
export const toggleClass = classList('toggle');

function _hasClass(className, el) {
  return el.classList.contains(className);
}

export const hasClass = curry((className, el) => branch(partial(_hasClass, [className]))(el));

function _setAttr(attr, val, el) {
  el.setAttribute(attr, val);
  return el;
}

export const setAttr = curry((attr, val, el) => branch(partial(_setAttr, [attr, val]))(el));

function _getAttr(attr, el) {
  return el.getAttribute(attr);
}

export const getAttr = curry((attr, el) => branch(partial(_getAttr, [attr]))(el));

const _findParent = (pred, el) => {
  if (el === document.body) {
    return el;
  }
  return pred(el.parentElement) ? el.parentElement : _findParent(pred, el.parentElement);
};

export const findParent = curry((pred, el) => branch(partial(_findParent, [pred]))(el));

const _eventOn = (event, cb, el) => {
  el.addEventListener(event, cb);
  return el;
};

export const eventOn = curry((event, cb, el) => branch(partial(_eventOn, [event, cb]))(el));

export function preventDefault(e) {
  e.preventDefault();
  return e;
}

export const setProp = curry((prop, value, obj) => {
  obj[prop] = value;
  return obj;
});

export const getProp = curry((prop, obj) => obj[prop] || false);

export const wrapEvent = (fn, args = []) => (e) => {
  fn(...args);
  return e;
};

export const wrapEventIf = (pred, fn, args = []) => (e) => {
  if (pred(e.target)) fn(...args);
  return e;
};

export const trace = (val) => {
  console.log(val);
  return val;
};
