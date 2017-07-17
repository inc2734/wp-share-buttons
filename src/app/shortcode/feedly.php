<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

class Inc2734_WP_Share_Buttons_Shortcode_Feedly extends Inc2734_WP_Share_Buttons_Abstract_Shortcode {

	public function _shortcode( $attributes ) {
		if ( ! isset( $attributes['post_id'] ) ) {
			return;
		}

		$attributes = shortcode_atts( array(
			'type'    => 'balloon',
			'post_id' => '',
		), $attributes );

		if ( 'official' === $attributes['type'] ) {
			$file = 'official';
		} else {
			$file = 'feedly';
		}

		$count_cache = new Inc2734_WP_Share_Buttons_Count_Cache( $attributes['post_id'], 'feedly' );
		$has_cache   = $count_cache->is_enabled();
		$cache       = $count_cache->get();
		$count       = ( ! is_null( $cache ) ) ? $cache : 0;

		return $this->render( 'feedly/' . $file, array(
			'type'      => $attributes['type'],
			'post_id'   => $attributes['post_id'],
			'has_cache' => $has_cache,
			'count'     => $count,
		) );
	}
}
