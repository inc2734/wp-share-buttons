'use strict';

import $ from 'jquery';
import Inc2734_WP_Share_Buttons_Facebook from './facebook.js';
import Inc2734_WP_Share_Buttons_Twitter from './twitter.js';
import Inc2734_WP_Share_Buttons_Hatena from './hatena.js';
import Inc2734_WP_Share_Buttons_GooglePlus from './google-plus.js';
import Inc2734_WP_Share_Buttons_Line from './line.js';
import Inc2734_WP_Share_Buttons_Pocket from './pocket.js';
import Inc2734_WP_Share_Buttons_Feedly from './feedly.js';

export default class Inc2734_WP_Share_Buttons {
  constructor() {
    $(() => {
      $('.wp-share-button--facebook').each((i, e) => {
        new Inc2734_WP_Share_Buttons_Facebook($(e));
      });

      $('.wp-share-button--twitter').each((i, e) => {
        new Inc2734_WP_Share_Buttons_Twitter($(e));
      });

      $('.wp-share-button--hatena').each((i, e) => {
        new Inc2734_WP_Share_Buttons_Hatena($(e));
      });

      $('.wp-share-button--google-plus').each((i, e) => {
        new Inc2734_WP_Share_Buttons_GooglePlus($(e));
      });

      $('.wp-share-button--line').each((i, e) => {
        new Inc2734_WP_Share_Buttons_Line($(e));
      });

      $('.wp-share-button--pocket').each((i, e) => {
        new Inc2734_WP_Share_Buttons_Pocket($(e));
      });

      $('.wp-share-button--feedly').each((i, e) => {
        new Inc2734_WP_Share_Buttons_Feedly($(e));
      });
    });
  }
}
