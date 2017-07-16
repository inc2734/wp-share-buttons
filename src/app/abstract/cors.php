<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * For API CORS
 */
abstract class Inc2734_WP_Share_Buttons_Abstract_CORS {

	/**
	 * Base name
	 * @var string
	 */
	protected $name;

	/**
	 * @param string $name
	 */
	public function __construct( $name ) {
		$this->name = $name;
		add_action( 'wp_enqueue_scripts', array( $this, '_add_localize_script' ) );
		add_action( 'wp_ajax_' . $this->name       , array( $this, '_ajax' ) );
		add_action( 'wp_ajax_nopriv_' . $this->name, array( $this, '_ajax' ) );
	}

	/**
	 * Setup localize script
	 *
	 * @return void
	 */
	public function _add_localize_script() {
		wp_localize_script(
			get_stylesheet(),
			$this->name,
			array(
				'endpoint'    => admin_url( 'admin-ajax.php' ),
				'action'      => $this->name,
				'_ajax_nonce' => wp_create_nonce( $this->name )
			)
		);
	}

	/**
	 * Ajax
	 *
	 * @return void
	 */
	public function _ajax() {
		global $post;

		check_ajax_referer( $this->name );

		if ( ! isset( $_GET['post_id'] ) ) {
			$this->_send_json( '-' );
			return;
		}

		$post_id = $_GET['post_id'];
		$cache = inc2734_wp_share_buttons_get_count_cache( $post_id, $this->name );
		if ( $cache ) {
			$this->_send_json( $cache );
			return;
		}

		$count = $this->_request();
		update_post_meta( $post_id, '_' . $this->name . '_count', [
			'count'      => $count,
			'expiration' => time() + (int) apply_filters( 'inc2734_wp_share_buttons_count_cache_seconds', 60 * 5 ),
		] );
		$this->_send_json( $count );
	}

	/**
	 * Send json
	 *
	 * @param array $count
	 * @return json
	 */
	protected function _send_json( $count ) {
		if ( ! preg_match( '/^[\d\-]+$/', $count ) ) {
			$count = 0;
		}
		wp_send_json( [ 'count' => $count ] );
	}

	/**
	 * Request to API
	 *
	 * @return int Count
	 */
	protected function _request() {
		if ( empty( $_GET['url'] ) ) {
			return '-';
		}

		$permalink = $_GET['url'];

		if ( false !== strpos( $permalink, 'https://' ) ) {
			$permalink = rawurlencode( $permalink );
			$count  = $this->_get_count( $permalink );
			if ( apply_filters( 'inc2734_wp_share_buttons_apply_https_total_count', true ) ) {
				$count += $this->_get_count( str_replace( 'https://', 'http://', $permalink ) );
			}
		} else {
			$permalink = rawurlencode( $_GET['url'] );
			$count  = $this->_get_count( $permalink );
		}

		return $count;
	}

	/**
	 * Get count from API
	 *
	 * @param string $permalink
	 * @return int Count
	 */
	abstract protected function _get_count( $permalink );
}
