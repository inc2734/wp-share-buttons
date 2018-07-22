# WP Share Buttons

[![Build Status](https://travis-ci.org/inc2734/wp-share-buttons.svg?branch=master)](https://travis-ci.org/inc2734/wp-share-buttons)
[![Latest Stable Version](https://poser.pugx.org/inc2734/wp-share-buttons/v/stable)](https://packagist.org/packages/inc2734/wp-share-buttons)
[![License](https://poser.pugx.org/inc2734/wp-share-buttons/license)](https://packagist.org/packages/inc2734/wp-share-buttons)

This library adds share button shortcodes for WordPress.
This buttons display to sum http and https counts.
And, It works lightly with asynchronous display and caching.

When SNS Count Cache plugin is activated WP Share Buttons uses that counts.

This buttons can use for singular pages.

## Install
```
$ composer require inc2734/wp-share-buttons
```

## How to use
```
<?php
// When Using composer auto loader
new Inc2734\WP_Share_Buttons\Share_Buttons();
```

```
// Using default styles (.scss)
@import 'vendor/inc2734/wp-share-buttons/src/assets/scss/wp-share-buttons';
```

```
// Setup js
import Inc2734_WP_Share_Buttons from 'vendor/inc2734/wp-share-buttons/src/assets/js/wp-share-buttons.js';
new Inc2734_WP_Share_Buttons();
```

## Shortcodes
### All buttons
```
[wp_share_buttons type="(Optional)" title="(Optional)" post_id="(Required)"]

type:
Baloon, horizontal, icon, block, official
When type is not official, buttons sums http and https counts.
```

### Facebook
```
[wp_share_buttons_facebook type="(Optional)" post_id="(Required)"]
```

### Twitter
```
[wp_share_buttons_twitter type="(Optional)" title="(Optional)" post_id="(Required)"]
```

### Hatna Bookmark
```
[wp_share_buttons_hatena type="(Optional)" post_id="(Required)"]
```

### Feedly
```
[wp_share_buttons_feedly type="(Optional)" post_id="(Required)"]
```

### Pocket
```
[wp_share_buttons_pocket type="(Optional)" title="(Optional)" post_id="(Required)"]
```

### Line
```
[wp_share_buttons_line type="(Optional)" post_id="(Required)"]
```

### Feed
```
[wp_share_buttons_feed type="(Optional)" post_id="(Required)"]
```

## Filter hooks
### inc2734_wp_share_buttons_count_cache_seconds
```
/**
 * Set count cache time
 *
 * @param  {int} $seconds
 * @return {int}
 */
add_filter( 'inc2734_wp_share_buttons_count_cache_seconds', function( $seconds ) {
  return 300;
} );
```

### inc2734_wp_share_buttons_apply_https_total_count
```
/**
 * When permalink is https, whether or not to sum http and https
 *
 * @param  {bool} $bool
 * @return {bool}
 */
add_filter( 'inc2734_wp_share_buttons_apply_https_total_count', function( $bool ) {
  return true;
} );
```

### inc2734_wp_share_buttons_facebook_label
```
/**
 * Set label of Facebook button
 *
 * @param  {string} $label
 * @return {string}
 */
add_filter( 'inc2734_wp_share_buttons_facebook_label', function( $label ) {
  return 'Share';
} );
```

### inc2734_wp_share_buttons_feed_label
```
/**
 * Set label of feed button
 *
 * @param  {string} $label
 * @return {string}
 */
add_filter( 'inc2734_wp_share_buttons_feed_label', function( $label ) {
  return 'Feed';
} );
```

### inc2734_wp_share_buttons_feedly_label
```
/**
 * Set label of Feedly button
 *
 * @param  {string} $label
 * @return {string}
 */
add_filter( 'inc2734_wp_share_buttons_feedly_label', function( $label ) {
  return 'Feedly';
} );
```

### inc2734_wp_share_buttons_hatena_label
```
/**
 * Set label of Hatena bookmark button
 *
 * @param  {string} $label
 * @return {string}
 */
add_filter( 'inc2734_wp_share_buttons_hatena_label', function( $label ) {
  return 'Bookmark';
} );
```

### inc2734_wp_share_buttons_line_label
```
/**
 * Set label of LINE button
 *
 * @param  {string} $label
 * @return {string}
 */
add_filter( 'inc2734_wp_share_buttons_line_label', function( $label ) {
  return 'LINE';
} );
```

### inc2734_wp_share_buttons_pocket_label
```
/**
 * Set label of Pocket button
 *
 * @param  {string} $label
 * @return {string}
 */
add_filter( 'inc2734_wp_share_buttons_pocket_label', function( $label ) {
  return 'Pocket';
} );
```

### inc2734_wp_share_buttons_twitter_label
```
/**
 * Set label of Twitter button
 *
 * @param  {string} $label
 * @return {string}
 */
add_filter( 'inc2734_wp_share_buttons_twitter_label', function( $label ) {
  return 'Tweet';
} );
```

### inc2734_wp_share_buttons_localize_script_handle
```
/**
 * Set handle of localize_script
 *
 * @param  {string} $handle
 * @return {string}
 */
add_filter( 'inc2734_wp_share_buttons_localize_script_handle', function( $handle ) {
  return $handle;
} );
```
