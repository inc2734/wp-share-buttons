<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

class Inc2734_WP_Share_Buttons_Shortcode_Feed extends Inc2734_WP_Share_Buttons_Abstract_Shortcode {

	public function _shortcode( $attributes ) {
		$attributes = shortcode_atts( array(
			'type' => 'balloon',
			'feed' => get_bloginfo( 'rss2_url' ),
		), $attributes );

		return $this->render( 'feed/feed', array(
			'type' => $attributes['type'],
			'feed' => $attributes['feed'],
		) );
	}
}
