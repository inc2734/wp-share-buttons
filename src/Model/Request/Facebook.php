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
class Facebook extends Request {

	/**
	 * Get count from API
	 *
	 * @param string $permalink
	 * @return int Count
	 */
	protected function _get_count( $permalink ) {
		$request  = "https://graph.facebook.com/?id=$permalink";
		$response = wp_remote_get( $request );
		$body = wp_remote_retrieve_body( $response );
		$body = json_decode( $body, true );

		if ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ) {
			error_log( '[WP Share Buttons] Facebook request / ' . $request . ' / ' . json_encode( $body ) );
		}

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
