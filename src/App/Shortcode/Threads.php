<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Share_Buttons\App\Shortcode;

use Inc2734\WP_Share_Buttons\App\Contract\Shortcode\Button as Base;

class Threads extends Base {

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

		$title = empty( $attributes['title'] )
			? $this->get_document_title( $attributes['post_id'] )
			: $attributes['title'];

		$attributes['title'] = apply_filters( 'inc2734_wp_share_buttons_shared_title', $title, 'threads' );

		$attributes = shortcode_atts(
			array(
				'type'    => 'balloon',
				'post_id' => '',
				'title'   => '',
			),
			$attributes
		);

		return $this->render(
			'threads/threads',
			array(
				'type'    => $attributes['type'],
				'title'   => $attributes['title'],
				'post_id' => $attributes['post_id'],
			)
		);
	}
}
