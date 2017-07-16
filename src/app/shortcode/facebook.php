<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

class Inc2734_WP_Share_Buttons_Shortcode_Facebook extends Inc2734_WP_Share_Buttons_Abstract_Shortcode {

	public function _shortcode( $attributes ) {
		$attributes = shortcode_atts( array(
			'type'      => 'balloon',
			'permalink' => get_permalink(),
		), $attributes );

		if ( 'official' === $attributes['type'] ) {
			$file = 'official';
		} else {
			$file = 'facebook';
		}

		$has_cache = inc2734_wp_share_buttons_has_count_cache( get_the_ID(), $this->shortcode_name );
		$cache     = inc2734_wp_share_buttons_get_count_cache( get_the_ID(), $this->shortcode_name );
		$count     = ( ! is_null( $cache ) ) ? $cache : 0;

		return $this->render( 'facebook/' . $file, array(
			'type'      => $attributes['type'],
			'permalink' => $attributes['permalink'],
			'has_cache' => $has_cache,
			'count'     => $count,
		) );
	}
}
