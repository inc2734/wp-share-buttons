<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Share_Buttons;

use Inc2734\WP_Share_Buttons\App\Shortcode;

class Bootstrap {

	/**
	 * Constructor.
	 */
	public function __construct() {
		new Shortcode\Facebook( 'wp_share_buttons_facebook' );
		new Shortcode\Twitter( 'wp_share_buttons_twitter' );
		new Shortcode\X( 'wp_share_buttons_x' );
		new Shortcode\Threads( 'wp_share_buttons_threads' );
		new Shortcode\Hatena( 'wp_share_buttons_hatena' );
		new Shortcode\Feedly( 'wp_share_buttons_feedly' );
		new Shortcode\GooglePlus( 'wp_share_buttons_google_plus' );
		new Shortcode\Line( 'wp_share_buttons_line' );
		new Shortcode\Pocket( 'wp_share_buttons_pocket' );
		new Shortcode\Pinterest( 'wp_share_buttons_pinterest' );
		new Shortcode\Feed( 'wp_share_buttons_feed' );
		new Shortcode\Copy( 'wp_share_buttons_copy' );
		new Shortcode\Buttons( 'wp_share_buttons' );

		add_action( 'init', array( $this, '_init' ) );
		add_action( 'wp_enqueue_scripts', array( $this, '_enqueue_scripts' ), 9 );
		add_action( 'wp_enqueue_scripts', array( $this, '_enqueue_styles' ), 9 );
		add_action( 'enqueue_block_editor_assets', array( $this, '_enqueue_styles' ), 9 );
		add_action( 'after_setup_theme', array( $this, '_add_editor_style' ) );
	}

	/**
	 * Load textdomain.
	 */
	public function _init() {
		load_textdomain( 'inc2734-wp-share-buttons', __DIR__ . '/languages/' . get_locale() . '.mo' );
	}

	/**
	 * Enqueue scripts.
	 */
	public function _enqueue_scripts() {
		wp_enqueue_script(
			'wp-share-buttons',
			get_template_directory_uri() . '/vendor/inc2734/wp-share-buttons/src/assets/js/wp-share-buttons.js',
			array(),
			filemtime( get_template_directory() . '/vendor/inc2734/wp-share-buttons/src/assets/js/wp-share-buttons.js' ),
			array(
				'in_footer' => false,
				'strategy'  => 'defer',
			)
		);

		wp_localize_script(
			'wp-share-buttons',
			'inc2734_wp_share_buttons',
			array(
				'copy_success' => __( 'Copied !', 'inc2734-wp-share-buttons' ),
				'copy_failed'  => __( 'Copy failed !', 'inc2734-wp-share-buttons' ),
			)
		);
	}

	/**
	 * Enqueue styles.
	 */
	public function _enqueue_styles() {
		wp_enqueue_style(
			'wp-share-buttons',
			get_template_directory_uri() . '/vendor/inc2734/wp-share-buttons/src/assets/css/wp-share-buttons.css',
			array(),
			filemtime( get_template_directory() . '/vendor/inc2734/wp-share-buttons/src/assets/css/wp-share-buttons.css' )
		);
	}

	/**
	 * Add editor style.
	 */
	public function _add_editor_style() {
		add_editor_style(
			array(
				'vendor/inc2734/wp-share-buttons/src/assets/css/wp-share-buttons.css',
			)
		);
	}
}
