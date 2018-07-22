<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Share_Buttons\Model\Request;

/**
 * For API CORS
 */
class Hatena extends Request {

	/**
	 * Get count from API
	 *
	 * @param string $permalink
	 * @return int Count
	 */
	protected function _get_count( $permalink ) {
		$request  = "https://b.hatena.ne.jp/entry.count?url=$permalink";
		$response = wp_remote_get( $request );
		$body = wp_remote_retrieve_body( $response );

		if ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ) {
			error_log( '[WP Share Buttons] Hatena request / ' . $request . ' / ' . json_encode( $body ) );
		}

		if ( '' === $body ) {
			return 0;
		}

		return $body;
	}
}
