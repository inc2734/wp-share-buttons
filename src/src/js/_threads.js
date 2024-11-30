import Inc2734_WP_Share_Buttons_Button from './_button.js';
import Inc2734_WP_Share_Buttons_Popup from './_popup.js';

export default class Inc2734_WP_Share_Buttons_Threads extends Inc2734_WP_Share_Buttons_Button {
  popup() {
    new Inc2734_WP_Share_Buttons_Popup(
      this.buttonComponent,
      'Send to Threads',
      670,
      530
    );
  }
}
