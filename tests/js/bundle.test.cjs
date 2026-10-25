const assert = require('node:assert/strict');
const { readFileSync } = require('node:fs');
const { resolve } = require('node:path');
const { test } = require('node:test');
const { runInNewContext } = require('node:vm');

const bundle = readFileSync(resolve(__dirname, '../../src/assets/js/wp-share-buttons.js'), 'utf8');

function element(attributes = {}) {
  return {
    style: {},
    listeners: {},
    classList: { add() {} },
    getAttribute: (name) => attributes[name] ?? null,
    addEventListener(name, callback) { this.listeners[name] = callback; },
    select() {},
    remove() { this.removed = true; },
  };
}

function loadBundle(service, { cached = false, count = true, copyResult = true } = {}) {
  const link = element({ href: `https://example.org/share/${service}` });
  const counter = { textContent: '-' };
  const button = element({
    'data-wp-share-buttons-postid': '42',
    'data-wp-share-buttons-has-cache': cached ? '1' : '',
    'data-title': 'A title & 日本語',
    'data-url': 'https://example.org/post/',
    'data-hashtags': 'WordPress, 日本語',
  });
  button.querySelector = (selector) => selector === '.wp-share-button__button' ? link : count ? counter : null;
  const requests = [];
  const popups = [];
  const children = [];
  const timers = [];
  const commands = [];
  const document = {
    body: { appendChild: (child) => children.push(child) },
    createElement: () => element(),
    execCommand: (command) => { commands.push(command); return copyResult; },
    querySelector: () => null,
    querySelectorAll: (selector) => selector === `.wp-share-button--${service}` ? [button] : [],
    addEventListener(name, callback) {
      assert.equal(name, 'DOMContentLoaded');
      this.ready = callback;
    },
  };
  class XMLHttpRequest {
    constructor() { requests.push(this); }
    open(...args) { this.openArgs = args; }
    send(body) { this.body = body; }
    respond(status, response) {
      this.readyState = 4;
      this.status = status;
      this.response = JSON.stringify(response);
      this.onreadystatechange();
    }
  }
  const context = {
    document,
    XMLHttpRequest,
    window: { open: (...args) => popups.push(args) },
    setTimeout: (callback, delay) => timers.push({ callback, delay }),
    inc2734_wp_share_buttons: { copy_success: 'Copied!', copy_failed: 'Copy failed!' },
  };
  for (const name of ['facebook', 'hatena', 'feedly']) {
    context[`inc2734_wp_share_buttons_${name}`] = {
      endpoint: 'https://example.org/wp-admin/admin-ajax.php',
      action: `wp_share_buttons_${name}`,
      _ajax_nonce: 'test-nonce',
    };
  }
  runInNewContext(bundle, context);
  assert.equal(requests.length, 0);
  document.ready();
  return { link, button, counter, requests, popups, children, timers, commands };
}

const popupServices = {
  facebook: ['Share on Facebook', 670, 400],
  twitter: ['Share on Twitter', 550, 400],
  x: ['Share on X', 550, 400],
  threads: ['Send to Threads', 670, 530],
  hatena: ['Hatena Bookmark', 510, 420],
  line: ['Send to LINE', 670, 530],
  pocket: ['Pocket', 550, 350],
};

for (const [service, [title, width, height]] of Object.entries(popupServices)) {
  test(`${service} opens its share link in the expected popup`, () => {
    const { link, popups } = loadBundle(service, { cached: true });
    let prevented = false;
    link.listeners.click({ preventDefault() { prevented = true; } });
    assert.equal(prevented, true);
    assert.deepEqual(popups, [[
      `https://example.org/share/${service}`,
      title,
      `width=${width}, height=${height}, menubar=no, toolbar=no, scrollbars=yes`,
    ]]);
  });
}

for (const service of ['facebook', 'hatena', 'feedly']) {
  test(`${service} fetches and updates an uncached count`, () => {
    const { requests, counter } = loadBundle(service);
    assert.equal(requests.length, 1);
    const [request] = requests;
    assert.equal(request.openArgs[0], 'GET');
    const url = new URL(request.openArgs[1]);
    assert.equal(url.pathname, '/wp-admin/admin-ajax.php');
    assert.equal(url.searchParams.get('action'), `wp_share_buttons_${service}`);
    assert.equal(url.searchParams.get('_ajax_nonce'), 'test-nonce');
    assert.equal(url.searchParams.get('post_id'), '42');
    assert.equal(request.openArgs[2], true);
    assert.equal(request.body, null);
    request.respond(500, { count: 99 });
    assert.equal(counter.textContent, '-');
    request.respond(200, { count: 12 });
    assert.equal(counter.textContent, 12);
  });

  test(`${service} skips requests for cached counts and icon-only buttons`, () => {
    assert.equal(loadBundle(service, { cached: true }).requests.length, 0);
    assert.equal(loadBundle(service, { count: false }).requests.length, 0);
  });
}

test('Pinterest retains its regular link behavior', () => {
  const { link, requests, popups } = loadBundle('pinterest');
  assert.equal(link.listeners.click, undefined);
  assert.equal(requests.length, 0);
  assert.equal(popups.length, 0);
});

for (const copyResult of [true, false]) {
  test(`copy reports ${copyResult ? 'success' : 'failure'} and removes temporary elements`, () => {
    const { button, children, timers, commands } = loadBundle('copy', { copyResult });
    assert.equal(button.listeners.click(), copyResult);
    assert.deepEqual(commands, ['copy']);
    assert.equal(children[0].value, 'A title & 日本語 https://example.org/post/ #WordPress #日本語');
    assert.equal(children[0].removed, true);
    assert.equal(children[1].textContent, copyResult ? 'Copied!' : 'Copy failed!');
    assert.equal(timers[0].delay, 2000);
    timers[0].callback();
    assert.equal(children[1].removed, true);
  });
}
