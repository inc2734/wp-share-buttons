'use strict';

import $ from 'jquery';
import Inc2734_WP_Share_Buttons_Button from './button.js';
import Inc2734_WP_Share_Buttons_Share_Count from './share-count.js';

export default class Inc2734_WP_Share_Buttons_Feedly extends Inc2734_WP_Share_Buttons_Button {
  constructor(button, params) {
    super(button, params);
  }

  count() {
    new Inc2734_WP_Share_Buttons_Share_Count(inc2734_wp_share_buttons_feedly.endpoint, 'json', {
        action     : inc2734_wp_share_buttons_feedly.action,
        _ajax_nonce: inc2734_wp_share_buttons_feedly._ajax_nonce,
        post_id    : this.params.post_id,
        url        : this.params.url
      }
    ).request().done((json) => {
      this.button.find('.wp-share-button__count').text(json.count);
    });
  }
}
