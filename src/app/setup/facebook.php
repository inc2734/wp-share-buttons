<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * For API CORS
 */
class Inc2734_WP_Share_Buttons_Facebook extends Inc2734_WP_Share_Buttons_Abstract_CORS {

	/**
	 * Get count from API
	 *
	 * @param string $permalink
	 * @return int Count
	 */
	protected function _get_count( $permalink ) {
		$response  = wp_remote_get( "https://graph.facebook.com/?id=$permalink" );
		$body = wp_remote_retrieve_body( $response );
		$body = json_decode( $body, true );

		if ( ! is_array( $body ) ) {
			return '-';
		}

		if ( ! isset( $body['share'] ) || ! is_array( $body['share'] ) ) {
			return '-';
		}

		if ( ! isset( $body['share']['share_count'] ) ) {
			return '-';
		}

		return $body['share']['share_count'];
	}
}
