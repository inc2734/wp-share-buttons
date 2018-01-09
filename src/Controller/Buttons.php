<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Share_Buttons\Controller;

/**
 * Abstract share buttons
 */
class Buttons extends Controller {

	public function _shortcode( $attributes ) {
		if ( ! isset( $attributes['post_id'] ) ) {
			return;
		}

		$attributes = shortcode_atts( [
			'type'    => 'balloon',
			'title'   => get_the_title( $attributes['post_id'] ) . ' - ' . get_bloginfo( 'name' ),
			'post_id' => '',
		], $attributes );

		return do_shortcode( $this->render( 'buttons', [
			'type'    => $attributes['type'],
			'title'   => $attributes['title'],
			'post_id' => $attributes['post_id'],
		] ) );
	}
}
