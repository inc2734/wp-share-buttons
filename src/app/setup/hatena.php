<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * For API CORS
 */
class Inc2734_WP_Share_Buttons_Hatena extends Inc2734_WP_Share_Buttons_Abstract_CORS {

	/**
	 * Get count from API
	 *
	 * @param string $permalink
	 * @return int Count
	 */
	protected function _get_count( $permalink ) {
		$response  = wp_remote_get( "https://b.hatena.ne.jp/entry.count?url=$permalink" );
		$body = wp_remote_retrieve_body( $response );

		if ( '' === $body ) {
			return 0;
		}

		return $body;
	}
}
