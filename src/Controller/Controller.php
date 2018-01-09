<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Share_Buttons\Controller;

/**
 * Abstract share button shortcodes
 *
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
abstract class Controller {

	/**
	 * @var string
	 */
	protected $shortcode_name;

	public function __construct( $shortcode_name ) {
		$this->shortcode_name = $shortcode_name;
		add_shortcode( $this->shortcode_name, [ $this, '_shortcode' ] );
	}

	abstract public function _shortcode( $attributes );

	protected function render( $filepath, $vars ) {
		$filepath = __DIR__ . '/../view/' . $filepath . '.php';
		if ( file_exists( $filepath ) ) {
			ob_start();
			// @todo Using getter method
			// @codingStandardsIgnoreStart
			extract( $vars );
			// @codingStandardsIgnoreEnd
			include( $filepath );
			return ob_get_clean();
		}
	}
}
