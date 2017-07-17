<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

class Inc2734_WP_Share_Buttons_Shortcode_Pocket extends Inc2734_WP_Share_Buttons_Abstract_Shortcode {

	public function _shortcode( $attributes ) {
		$attributes = shortcode_atts( array(
			'type' => 'balloon',
		), $attributes );

		if ( 'official' === $attributes['type'] ) {
			$file = 'official';
		} else {
			$file = 'pocket';
		}

		return $this->render( 'pocket/' . $file, array(
			'type' => $attributes['type'],
		) );
	}
}
