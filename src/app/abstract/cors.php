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
	 * Social service name
	 * @var string
	 */
	protected $service_name;

	/**
	 * @param string $service_name
	 */
	public function __construct( $service_name ) {
		$this->service_name = $service_name;

		add_action( 'after_setup_theme', function() {
			add_action( 'wp_enqueue_scripts', array( $this, '_add_localize_script' ) );
			add_action( 'wp_ajax_inc2734_wp_share_buttons_' . $this->service_name, array( $this, '_ajax' ) );
			add_action( 'wp_ajax_nopriv_inc2734_wp_share_buttons_' . $this->service_name, array( $this, '_ajax' ) );
		} );
	}

	/**
	 * Setup localize script
	 *
	 * @return void
	 */
	public function _add_localize_script() {
		$handle = get_template();
		if ( ! wp_script_is( get_template() ) && wp_script_is( get_stylesheet() ) ) {
			$handle = get_stylesheet();
		}
		$handle = apply_filters( 'inc2734_wp_share_buttons_localize_script_handle', $handle );

		wp_localize_script(
			$handle,
			'inc2734_wp_share_buttons_' . $this->service_name,
			array(
				'endpoint'    => admin_url( 'admin-ajax.php' ),
				'action'      => 'inc2734_wp_share_buttons_' . $this->service_name,
				'_ajax_nonce' => wp_create_nonce( 'inc2734_wp_share_buttons_' . $this->service_name ),
			)
		);
	}

	/**
	 * Ajax
	 *
	 * @return void
	 * @SuppressWarnings(PHPMD.UnusedLocalVariable)
	 */
	public function _ajax() {
		// @todo It does not move if it is erased ...
		global $post;

		check_ajax_referer( 'inc2734_wp_share_buttons_' . $this->service_name );

		if ( ! isset( $_GET['post_id'] ) ) {
			$this->_send_json( '-' );
			return;
		}

		$post_id = $_GET['post_id'];
		$count_cache = new Inc2734_WP_Share_Buttons_Count_Cache( $post_id, $this->service_name );

		$cache = $count_cache->get();
		if ( $cache ) {
			$this->_send_json( $cache );
			return;
		}

		$count = $this->_request();
		$count_cache->update( $count );
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
		wp_send_json( [
			'count' => $count,
		] );
	}

	/**
	 * Request to API
	 *
	 * @return int Count
	 */
	protected function _request() {
		if ( empty( $_GET['post_id'] ) ) {
			return '-';
		}

		$permalink = get_permalink( $_GET['post_id'] );

		if ( false === strpos( $permalink, 'https://' ) || 0 < strpos( $permalink, 'https://' ) ) {
			$count = $this->_get_count( rawurlencode( $permalink ) );
		} else {
			$count = $this->_get_count( rawurlencode( $permalink ) );
			if ( apply_filters( 'inc2734_wp_share_buttons_apply_https_total_count', true ) ) {
				$count += $this->_get_count( rawurlencode( str_replace( 'https://', 'http://', $permalink ) ) );
			}
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
