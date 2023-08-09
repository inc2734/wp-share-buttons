<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Share_Buttons\App\Shortcode;

use Inc2734\WP_Share_Buttons\App\Contract\Shortcode\Button as Base;

class X extends Base {

	/**
	 * Register shortcode.
	 *
	 * @param array $attributes The shortcode attributes.
	 * @return string
	 */
	public function _shortcode( $attributes ) {
		if ( ! isset( $attributes['post_id'] ) ) {
			return;
		}

		$title = wp_strip_all_tags( get_the_title( $attributes['post_id'] ) . ' - ' . get_bloginfo( 'name' ) );

		$attributes = shortcode_atts(
			array(
				'type'     => 'balloon',
				'title'    => apply_filters( 'inc2734_wp_share_buttons_shared_title', $title, 'x' ),
				'post_id'  => '',
				'hashtags' => apply_filters( 'inc2734_wp_share_buttons_shared_hashtags', '', 'x' ),
			),
			$attributes
		);

		if ( 'official' === $attributes['type'] ) {
			$file = 'official';
		} else {
			$file = 'x';
		}

		return $this->render(
			'x/' . $file,
			array(
				'type'     => $attributes['type'],
				'title'    => $attributes['title'],
				'post_id'  => $attributes['post_id'],
				'hashtags' => $attributes['hashtags'],
			)
		);
	}
}
