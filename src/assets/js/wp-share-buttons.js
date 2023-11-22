/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/src/js/_button.js":
/*!*******************************!*\
  !*** ./src/src/js/_button.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Inc2734_WP_Share_Buttons_Button)
/* harmony export */ });
class Inc2734_WP_Share_Buttons_Button {
  constructor(button, params = {}) {
    this.button = button;
    this.countComponent = this.button.querySelector('.wp-share-button__count');
    this.buttonComponent = this.button.querySelector('.wp-share-button__button');
    const defaultParams = {
      post_id: this.button.getAttribute('data-wp-share-buttons-postid')
    };
    this.params = {};
    for (const key in defaultParams) {
      this.params[key] = 'undefined' !== typeof params[key] ? params[key] : defaultParams[key];
    }
    if (!this.button.getAttribute('data-wp-share-buttons-has-cache')) {
      if (!!this.countComponent) {
        this.count();
      }
    }
    this.popup();
  }
  count() {}
  popup() {}
}

/***/ }),

/***/ "./src/src/js/_copy.js":
/*!*****************************!*\
  !*** ./src/src/js/_copy.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Inc2734_WP_Share_Buttons_Copy)
/* harmony export */ });
class Inc2734_WP_Share_Buttons_Copy {
  constructor(button) {
    const copyMessage = document.querySelector('.wp-share-buttons-copy-message');
    if (!!copyMessage) {
      return;
    }
    const handleClick = () => {
      const title = button.getAttribute('data-title');
      const url = button.getAttribute('data-url');
      let hashtags = button.getAttribute('data-hashtags');
      if (!!hashtags) {
        hashtags = hashtags.split(',');
        for (let i = 0; i < hashtags.length; i++) {
          hashtags[i] = `#${hashtags[i].trim()}`;
        }
        hashtags = hashtags.join(' ');
      }
      const input = document.createElement('input');
      const text = `${title} ${url} ${hashtags}`;
      input.value = text.trim();
      input.style.position = 'fixed';
      input.style.top = '100%';
      document.body.appendChild(input);
      input.select();
      const result = document.execCommand('copy');
      input.remove();
      const message = result ? inc2734_wp_share_buttons.copy_success : inc2734_wp_share_buttons.copy_failed;
      const messageWrapper = document.createElement('div');
      messageWrapper.classList.add('wp-share-buttons-copy-message');
      messageWrapper.textContent = message;
      document.body.appendChild(messageWrapper);
      setTimeout(() => messageWrapper.remove(), 2000);
      return result;
    };
    button.addEventListener('click', handleClick, false);
  }
}

/***/ }),

/***/ "./src/src/js/_facebook.js":
/*!*********************************!*\
  !*** ./src/src/js/_facebook.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Inc2734_WP_Share_Buttons_Facebook)
/* harmony export */ });
/* harmony import */ var _button_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_button.js */ "./src/src/js/_button.js");
/* harmony import */ var _share_count_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./_share-count.js */ "./src/src/js/_share-count.js");
/* harmony import */ var _popup_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./_popup.js */ "./src/src/js/_popup.js");



class Inc2734_WP_Share_Buttons_Facebook extends _button_js__WEBPACK_IMPORTED_MODULE_0__["default"] {
  count() {
    new _share_count_js__WEBPACK_IMPORTED_MODULE_1__["default"](inc2734_wp_share_buttons_facebook.endpoint, 'json', {
      action: inc2734_wp_share_buttons_facebook.action,
      _ajax_nonce: inc2734_wp_share_buttons_facebook._ajax_nonce,
      post_id: this.params.post_id,
      url: this.params.url
    }).request({
      done: json => this.countComponent.textContent = json.count
    });
  }
  popup() {
    new _popup_js__WEBPACK_IMPORTED_MODULE_2__["default"](this.buttonComponent, 'Share on Facebook', 670, 400);
  }
}

/***/ }),

/***/ "./src/src/js/_feedly.js":
/*!*******************************!*\
  !*** ./src/src/js/_feedly.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Inc2734_WP_Share_Buttons_Feedly)
/* harmony export */ });
/* harmony import */ var _button_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_button.js */ "./src/src/js/_button.js");
/* harmony import */ var _share_count_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./_share-count.js */ "./src/src/js/_share-count.js");


class Inc2734_WP_Share_Buttons_Feedly extends _button_js__WEBPACK_IMPORTED_MODULE_0__["default"] {
  count() {
    new _share_count_js__WEBPACK_IMPORTED_MODULE_1__["default"](inc2734_wp_share_buttons_feedly.endpoint, 'json', {
      action: inc2734_wp_share_buttons_feedly.action,
      _ajax_nonce: inc2734_wp_share_buttons_feedly._ajax_nonce,
      post_id: this.params.post_id,
      url: this.params.url
    }).request({
      done: json => this.countComponent.textContent = json.count
    });
  }
}

/***/ }),

/***/ "./src/src/js/_hatena.js":
/*!*******************************!*\
  !*** ./src/src/js/_hatena.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Inc2734_WP_Share_Buttons_Hatena)
/* harmony export */ });
/* harmony import */ var _button_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_button.js */ "./src/src/js/_button.js");
/* harmony import */ var _share_count_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./_share-count.js */ "./src/src/js/_share-count.js");
/* harmony import */ var _popup_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./_popup.js */ "./src/src/js/_popup.js");



class Inc2734_WP_Share_Buttons_Hatena extends _button_js__WEBPACK_IMPORTED_MODULE_0__["default"] {
  count() {
    new _share_count_js__WEBPACK_IMPORTED_MODULE_1__["default"](inc2734_wp_share_buttons_hatena.endpoint, 'json', {
      action: inc2734_wp_share_buttons_hatena.action,
      _ajax_nonce: inc2734_wp_share_buttons_hatena._ajax_nonce,
      post_id: this.params.post_id,
      url: this.params.url
    }).request({
      done: json => this.countComponent.textContent = json.count
    });
  }
  popup() {
    new _popup_js__WEBPACK_IMPORTED_MODULE_2__["default"](this.buttonComponent, 'Hatena Bookmark', 510, 420);
  }
}

/***/ }),

/***/ "./src/src/js/_line.js":
/*!*****************************!*\
  !*** ./src/src/js/_line.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Inc2734_WP_Share_Buttons_Line)
/* harmony export */ });
/* harmony import */ var _button_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_button.js */ "./src/src/js/_button.js");
/* harmony import */ var _popup_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./_popup.js */ "./src/src/js/_popup.js");


class Inc2734_WP_Share_Buttons_Line extends _button_js__WEBPACK_IMPORTED_MODULE_0__["default"] {
  popup() {
    new _popup_js__WEBPACK_IMPORTED_MODULE_1__["default"](this.buttonComponent, 'Send to LINE', 670, 530);
  }
}

/***/ }),

/***/ "./src/src/js/_pinterest.js":
/*!**********************************!*\
  !*** ./src/src/js/_pinterest.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Inc2734_WP_Share_Buttons_Pinterest)
/* harmony export */ });
/* harmony import */ var _button_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_button.js */ "./src/src/js/_button.js");

class Inc2734_WP_Share_Buttons_Pinterest extends _button_js__WEBPACK_IMPORTED_MODULE_0__["default"] {}

/***/ }),

/***/ "./src/src/js/_pocket.js":
/*!*******************************!*\
  !*** ./src/src/js/_pocket.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Inc2734_WP_Share_Buttons_Pocket)
/* harmony export */ });
/* harmony import */ var _button_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_button.js */ "./src/src/js/_button.js");
/* harmony import */ var _popup_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./_popup.js */ "./src/src/js/_popup.js");


class Inc2734_WP_Share_Buttons_Pocket extends _button_js__WEBPACK_IMPORTED_MODULE_0__["default"] {
  popup() {
    new _popup_js__WEBPACK_IMPORTED_MODULE_1__["default"](this.buttonComponent, 'Pocket', 550, 350);
  }
}

/***/ }),

/***/ "./src/src/js/_popup.js":
/*!******************************!*\
  !*** ./src/src/js/_popup.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Inc2734_WP_Share_Buttons_Popup)
/* harmony export */ });
class Inc2734_WP_Share_Buttons_Popup {
  constructor(target, title, width, height) {
    const handleClick = event => {
      event.preventDefault();
      window.open(target.getAttribute('href'), title, `width=${parseInt(width)}, height=${parseInt(height)}, menubar=no, toolbar=no, scrollbars=yes`);
    };
    target.addEventListener('click', handleClick, false);
  }
}

/***/ }),

/***/ "./src/src/js/_share-count.js":
/*!************************************!*\
  !*** ./src/src/js/_share-count.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Inc2734_WP_Share_Buttons_Share_Count)
/* harmony export */ });
class Inc2734_WP_Share_Buttons_Share_Count {
  constructor(target, type = 'jsonp', data = {}) {
    this.target = target;
    this.type = type;
    this.data = data;
  }
  request(args) {
    const xhr = new XMLHttpRequest();
    const queryString = Object.keys(this.data).map(key => `${key}=${this.data[key]}`).join('&');
    const url = `${this.target}?${queryString}`;
    xhr.onreadystatechange = () => {
      if (4 === xhr.readyState) {
        if (200 === xhr.status) {
          args.done(JSON.parse(xhr.response));
        }
      }
    };
    xhr.open('GET', url, true);
    xhr.send(null);
  }
}

/***/ }),

/***/ "./src/src/js/_twitter.js":
/*!********************************!*\
  !*** ./src/src/js/_twitter.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Inc2734_WP_Share_Buttons_Twitter)
/* harmony export */ });
/* harmony import */ var _button_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_button.js */ "./src/src/js/_button.js");
/* harmony import */ var _share_count_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./_share-count.js */ "./src/src/js/_share-count.js");
/* harmony import */ var _popup_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./_popup.js */ "./src/src/js/_popup.js");



class Inc2734_WP_Share_Buttons_Twitter extends _button_js__WEBPACK_IMPORTED_MODULE_0__["default"] {
  count() {
    new _share_count_js__WEBPACK_IMPORTED_MODULE_1__["default"](inc2734_wp_share_buttons_twitter.endpoint, 'json', {
      action: inc2734_wp_share_buttons_twitter.action,
      _ajax_nonce: inc2734_wp_share_buttons_twitter._ajax_nonce,
      post_id: this.params.post_id,
      url: this.params.url
    }).request({
      done: json => this.countComponent.textContent = json.count
    });
  }
  popup() {
    new _popup_js__WEBPACK_IMPORTED_MODULE_2__["default"](this.buttonComponent, 'Share on Twitter', 550, 400);
  }
}

/***/ }),

/***/ "./src/src/js/_x.js":
/*!**************************!*\
  !*** ./src/src/js/_x.js ***!
  \**************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Inc2734_WP_Share_Buttons_X)
/* harmony export */ });
/* harmony import */ var _button_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_button.js */ "./src/src/js/_button.js");
/* harmony import */ var _popup_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./_popup.js */ "./src/src/js/_popup.js");


class Inc2734_WP_Share_Buttons_X extends _button_js__WEBPACK_IMPORTED_MODULE_0__["default"] {
  popup() {
    new _popup_js__WEBPACK_IMPORTED_MODULE_1__["default"](this.buttonComponent, 'Share on X', 550, 400);
  }
}

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!****************************************!*\
  !*** ./src/src/js/wp-share-buttons.js ***!
  \****************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _facebook_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_facebook.js */ "./src/src/js/_facebook.js");
/* harmony import */ var _twitter_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./_twitter.js */ "./src/src/js/_twitter.js");
/* harmony import */ var _x_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./_x.js */ "./src/src/js/_x.js");
/* harmony import */ var _hatena_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./_hatena.js */ "./src/src/js/_hatena.js");
/* harmony import */ var _line_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./_line.js */ "./src/src/js/_line.js");
/* harmony import */ var _pocket_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./_pocket.js */ "./src/src/js/_pocket.js");
/* harmony import */ var _pinterest_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./_pinterest.js */ "./src/src/js/_pinterest.js");
/* harmony import */ var _feedly_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./_feedly.js */ "./src/src/js/_feedly.js");
/* harmony import */ var _copy_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./_copy.js */ "./src/src/js/_copy.js");









document.addEventListener('DOMContentLoaded', () => {
  const facebookButtons = document.querySelectorAll('.wp-share-button--facebook');
  [].slice.call(facebookButtons).forEach(button => new _facebook_js__WEBPACK_IMPORTED_MODULE_0__["default"](button));
  const twitterButtons = document.querySelectorAll('.wp-share-button--twitter');
  [].slice.call(twitterButtons).forEach(button => new _twitter_js__WEBPACK_IMPORTED_MODULE_1__["default"](button));
  const xButtons = document.querySelectorAll('.wp-share-button--x');
  [].slice.call(xButtons).forEach(button => new _x_js__WEBPACK_IMPORTED_MODULE_2__["default"](button));
  const hatenaButtons = document.querySelectorAll('.wp-share-button--hatena');
  [].slice.call(hatenaButtons).forEach(button => new _hatena_js__WEBPACK_IMPORTED_MODULE_3__["default"](button));
  const lineButtons = document.querySelectorAll('.wp-share-button--line');
  [].slice.call(lineButtons).forEach(button => new _line_js__WEBPACK_IMPORTED_MODULE_4__["default"](button));
  const pocketButtons = document.querySelectorAll('.wp-share-button--pocket');
  [].slice.call(pocketButtons).forEach(button => new _pocket_js__WEBPACK_IMPORTED_MODULE_5__["default"](button));
  const pinterestButtons = document.querySelectorAll('.wp-share-button--pinterest');
  [].slice.call(pinterestButtons).forEach(button => new _pinterest_js__WEBPACK_IMPORTED_MODULE_6__["default"](button));
  const feedlyButtons = document.querySelectorAll('.wp-share-button--feedly');
  [].slice.call(feedlyButtons).forEach(button => new _feedly_js__WEBPACK_IMPORTED_MODULE_7__["default"](button));
  const copyButtons = document.querySelectorAll('.wp-share-button--copy');
  [].slice.call(copyButtons).forEach(button => new _copy_js__WEBPACK_IMPORTED_MODULE_8__["default"](button));
});
})();

/******/ })()
;
//# sourceMappingURL=wp-share-buttons.js.map