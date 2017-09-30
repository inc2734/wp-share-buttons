<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Abstract share button shortcodes
 */
abstract class Inc2734_WP_Share_Buttons_Abstract_Shortcode {

	/**
	 * @var string
	 */
	protected $shortcode_name;

	public function __construct( $shortcode_name ) {
		$this->shortcode_name = $shortcode_name;
		add_shortcode( $this->shortcode_name, array( $this, '_shortcode' ) );
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
