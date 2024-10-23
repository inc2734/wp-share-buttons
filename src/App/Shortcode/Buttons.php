<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Share_Buttons\App\Shortcode;

use Inc2734\WP_Share_Buttons\App\Contract\Shortcode\Button as Base;

class Buttons extends Base {

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

		$title = $this->get_document_title( $attributes['post_id'] );

		$attributes = shortcode_atts(
			array(
				'type'    => 'balloon',
				'title'   => $title,
				'post_id' => '',
			),
			$attributes
		);

		return do_shortcode(
			$this->render(
				'buttons',
				array(
					'type'    => $attributes['type'],
					'title'   => $attributes['title'],
					'post_id' => $attributes['post_id'],
				)
			)
		);
	}
}
