<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Abstract share buttons
 */
class Inc2734_WP_Share_Buttons_Shortcode_Buttons extends Inc2734_WP_Share_Buttons_Abstract_Shortcode {

	public function _shortcode( $attributes ) {
		if ( ! isset( $attributes['post_id'] ) ) {
			return;
		}

		$attributes = shortcode_atts( array(
			'type'    => 'balloon',
			'title'   => get_the_title( $attributes['post_id'] ) . ' - ' . get_bloginfo( 'name' ),
			'post_id' => '',
		), $attributes );

		return do_shortcode( $this->render( 'buttons', array(
			'type'    => $attributes['type'],
			'title'   => $attributes['title'],
			'post_id' => $attributes['post_id'],
		) ) );
	}
}
