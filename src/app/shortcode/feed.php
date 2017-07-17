<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

class Inc2734_WP_Share_Buttons_Shortcode_Feed extends Inc2734_WP_Share_Buttons_Abstract_Shortcode {

	public function _shortcode( $attributes ) {
		if ( ! isset( $attributes['post_id'] ) ) {
			return;
		}

		$attributes = shortcode_atts( array(
			'type'    => 'balloon',
			'post_id' => '',
		), $attributes );

		return $this->render( 'feed/feed', array(
			'type'    => $attributes['type'],
			'post_id' => $attributes['post_id'],
		) );
	}
}
