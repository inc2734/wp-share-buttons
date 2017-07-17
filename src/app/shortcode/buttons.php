<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

class Inc2734_WP_Share_Buttons_Shortcode_Buttons extends Inc2734_WP_Share_Buttons_Abstract_Shortcode {

	public function _shortcode( $attributes ) {
		$attributes = shortcode_atts( array(
			'type'  => 'balloon',
			'title' => get_the_title() . ' - ' . get_bloginfo( 'name' ),
		), $attributes );

		return do_shortcode( $this->render( 'buttons', array(
			'type'  => $attributes['type'],
			'title' => $attributes['title'],
		) ) );
	}
}
