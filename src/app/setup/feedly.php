<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * For API CORS
 */
class Inc2734_WP_Share_Buttons_Feedly extends Inc2734_WP_Share_Buttons_Abstract_CORS {

	/**
	 * Get count from API
	 *
	 * @param string $permalink
	 * @return int Count
	 */
	protected function _get_count( $permalink ) {
		$feed_url = rawurlencode( $permalink );
		$response = wp_remote_get( "https://cloud.feedly.com/v3/feeds/feed%2F$feed_url" );
		$body = wp_remote_retrieve_body( $response );
		$body = json_decode( $body, true );

		if ( ! is_array( $body ) ) {
			return '-';
		}

		if ( ! isset( $body['subscribers'] ) ) {
			return 0;
		}

		return $body['subscribers'];
	}
}
