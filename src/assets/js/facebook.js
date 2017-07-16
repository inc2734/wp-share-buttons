'use strict';

import $ from 'jquery';
import Inc2734_WP_Share_Buttons_Button from './button.js';
import Inc2734_WP_Share_Buttons_Share_Count from './share-count.js';
import Inc2734_WP_Share_Buttons_Popup from './popup.js';

export default class Inc2734_WP_Share_Buttons_Facebook extends Inc2734_WP_Share_Buttons_Button {
  constructor(button, params) {
    super(button, params);
  }

  count() {
    const api = wp_share_buttons_facebook.endpoint;
    new Inc2734_WP_Share_Buttons_Share_Count(api, 'json', {
        action     : wp_share_buttons_facebook.action,
        _ajax_nonce: wp_share_buttons_facebook._ajax_nonce,
        post_id    : this.params.post_id,
        url        : this.params.url
      }
    ).request().done((json) => {
      this.button.find('.wp-share-button__count').text(json.count);
    });
  }

  popup() {
    new Inc2734_WP_Share_Buttons_Popup(
      this.button.find('.wp-share-button__button'),
      'Share on Facebook',
      670,
      400
    );
  }
}
