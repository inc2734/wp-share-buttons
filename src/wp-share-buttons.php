<?php
/**
 * @package inc2734/wp-vshare-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

$includes = array(
	'/app/abstract',
	'/app/setup',
	'/app/shortcode',
);
foreach ( $includes as $include ) {
	foreach ( glob( __DIR__ . $include . '/*.php' ) as $file ) {
		require_once( $file );
	}
}

class Inc2734_WP_Share_Buttons {

	public function __construct() {
		new Inc2734_WP_Share_Buttons_Facebook( 'wp_share_buttons_facebook' );
		new Inc2734_WP_Share_Buttons_Shortcode_Facebook( 'wp_share_buttons_facebook');

		new Inc2734_WP_Share_Buttons_Twitter( 'wp_share_buttons_twitter' );
		new Inc2734_WP_Share_Buttons_Shortcode_Twitter( 'wp_share_buttons_twitter' );

		new Inc2734_WP_Share_Buttons_Hatena( 'wp_share_buttons_hatena' );
		new Inc2734_WP_Share_Buttons_Shortcode_Hatena( 'wp_share_buttons_hatena' );

		new Inc2734_WP_Share_Buttons_Feedly( 'wp_share_buttons_feedly' );
		new Inc2734_WP_Share_Buttons_Shortcode_Feedly( 'wp_share_buttons_feedly' );

		new Inc2734_WP_Share_Buttons_Shortcode_Line( 'wp_share_buttons_line' );
		new Inc2734_WP_Share_Buttons_Shortcode_Pocket( 'wp_share_buttons_pocket' );
		new Inc2734_WP_Share_Buttons_Shortcode_Feed( 'wp_share_buttons_feed' );
		new Inc2734_WP_Share_Buttons_Shortcode_Buttons( 'wp_share_buttons' );
	}
}

/**
 * Return count cache
 *
 * @param int $post_id
 * @param string $name Social service name
 * @return null|int
 */
function inc2734_wp_share_buttons_get_count_cache( $post_id, $name ) {
	$cache = get_post_meta( $post_id, '_' . $name . '_count', true );
	if ( $cache && time() <= $cache['expiration'] ) {
		return $cache['count'];
	}
}

/**
 * Return true when have count cache
 *
 * @param int $post_id
 * @param string $name Social service name
 * @return bool
 */
function inc2734_wp_share_buttons_has_count_cache( $post_id, $name ) {
	$cache = inc2734_wp_share_buttons_get_count_cache( $post_id, $name );
	return ( ! is_null( $cache ) );
}
