<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Hatena button
 */
class Inc2734_WP_Share_Buttons_Shortcode_Hatena extends Inc2734_WP_Share_Buttons_Abstract_Shortcode {

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
			$file = 'hatena';
		}

		$count_cache = new Inc2734_WP_Share_Buttons_Count_Cache( $attributes['post_id'], 'hatena' );
		$has_cache   = $count_cache->is_enabled();
		$expiration  = $count_cache->get_cache_expiration();
		$cache       = $count_cache->get();
		$count       = ( ! is_null( $cache ) ) ? $cache : 0;

		return $this->render( 'hatena/' . $file, array(
			'type'       => $attributes['type'],
			'post_id'    => $attributes['post_id'],
			'has_cache'  => $has_cache,
			'expiration' => $expiration,
			'count'      => $count,
		) );
	}
}
