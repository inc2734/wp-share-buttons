<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Added share buttons
 */
class Inc2734_WP_Share_Buttons {

	public function __construct() {
		load_textdomain( 'inc2734-wp-share-buttons', __DIR__ . '/languages/' . get_locale() . '.mo' );

		$includes = array(
			'/app/abstract',
			'/app/model',
			'/app/setup',
			'/app/shortcode',
		);
		foreach ( $includes as $include ) {
			foreach ( glob( __DIR__ . $include . '/*.php' ) as $file ) {
				require_once( $file );
			}
		}

		new Inc2734_WP_Share_Buttons_Facebook( 'facebook' );
		new Inc2734_WP_Share_Buttons_Shortcode_Facebook( 'wp_share_buttons_facebook' );

		new Inc2734_WP_Share_Buttons_Twitter( 'twitter' );
		new Inc2734_WP_Share_Buttons_Shortcode_Twitter( 'wp_share_buttons_twitter' );

		new Inc2734_WP_Share_Buttons_Hatena( 'hatena' );
		new Inc2734_WP_Share_Buttons_Shortcode_Hatena( 'wp_share_buttons_hatena' );

		new Inc2734_WP_Share_Buttons_Feedly( 'feedly' );
		new Inc2734_WP_Share_Buttons_Shortcode_Feedly( 'wp_share_buttons_feedly' );

		new Inc2734_WP_Share_Buttons_Shortcode_Line( 'wp_share_buttons_line' );
		new Inc2734_WP_Share_Buttons_Shortcode_Pocket( 'wp_share_buttons_pocket' );
		new Inc2734_WP_Share_Buttons_Shortcode_Feed( 'wp_share_buttons_feed' );
		new Inc2734_WP_Share_Buttons_Shortcode_Buttons( 'wp_share_buttons' );
	}
}
