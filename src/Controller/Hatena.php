<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Share_Buttons\Controller;

use Inc2734\WP_Share_Buttons\Model;

/**
 * Hatena button
 */
class Hatena extends Controller {

	public function _shortcode( $attributes ) {
		if ( ! isset( $attributes['post_id'] ) ) {
			return;
		}

		$attributes = shortcode_atts( [
			'type'    => 'balloon',
			'post_id' => '',
		], $attributes );

		if ( 'official' === $attributes['type'] ) {
			$file = 'official';
		} else {
			$file = 'hatena';
		}

		$count_cache = new Model\Count_Cache( $attributes['post_id'], 'hatena' );
		$has_cache   = $count_cache->is_enabled();
		$expiration  = $count_cache->get_cache_expiration();
		$cache       = $count_cache->get();
		$count       = ( ! is_null( $cache ) ) ? $cache : 0;

		return $this->render( 'hatena/' . $file, [
			'type'       => $attributes['type'],
			'post_id'    => $attributes['post_id'],
			'has_cache'  => $has_cache,
			'expiration' => $expiration,
			'count'      => $count,
		] );
	}
}
