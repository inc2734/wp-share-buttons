<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

class Inc2734_WP_Share_Buttons_Shortcode_Line extends Inc2734_WP_Share_Buttons_Abstract_Shortcode {

	public function _shortcode( $attributes ) {
		$attributes = shortcode_atts( array(
			'type'  => 'balloon',
			'title' => wp_get_document_title(),
		), $attributes );

		if ( 'official' === $attributes['type'] ) {
			$file = 'official';
		} else {
			$file = 'line';
		}

		return $this->render( 'line/' . $file, array(
			'type' => $attributes['type'],
		) );
	}
}
