<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Share_Buttons\Controller;

/**
 * Pocket button
 */
class Pocket extends Controller {

	public function _shortcode( $attributes ) {
		if ( ! isset( $attributes['post_id'] ) ) {
			return;
		}

		$title = wp_strip_all_tags( get_the_title( $attributes['post_id'] ) . ' - ' . get_bloginfo( 'name' ) );

		$attributes = shortcode_atts(
			[
				'type'    => 'balloon',
				'title'   => apply_filters( 'inc2734_wp_share_buttons_shared_title', $title, 'pocket' ),
				'post_id' => '',
			],
			$attributes
		);

		if ( 'official' === $attributes['type'] ) {
			$file = 'official';
		} else {
			$file = 'pocket';
		}

		return $this->render(
			'pocket/' . $file,
			[
				'type'    => $attributes['type'],
				'title'   => $attributes['title'],
				'post_id' => $attributes['post_id'],
			]
		);
	}
}
