'use strict';

import $ from 'jquery';
import Inc2734_WP_Share_Buttons_Button from './button.js';
import Inc2734_WP_Share_Buttons_Share_Count from './share-count.js';
import Inc2734_WP_Share_Buttons_Popup from './popup.js';

export default class Inc2734_WP_Share_Buttons_Line extends Inc2734_WP_Share_Buttons_Button {
  constructor(button, params) {
    super(button, params);
  }

  popup() {
    new Inc2734_WP_Share_Buttons_Popup(
      this.button.find('.wp-share-button__button'),
      'Send to LINE',
      670,
      530
    );
  }
}
