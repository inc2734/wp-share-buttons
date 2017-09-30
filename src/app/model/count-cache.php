<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Count cache control
 */
class Inc2734_WP_Share_Buttons_Count_Cache {

	/**
	 * @var int
	 */
	protected $post_id;

	/**
	 * @var string
	 */
	protected $service_name;

	/**
	 * @param int $post_id
	 * @param string $service_name Social service name
	 */
	public function __construct( $post_id, $service_name ) {
		$this->post_id      = $post_id;
		$this->service_name = $service_name;
	}

	/**
	 * Return count cache
	 *
	 * @return null|int
	 */
	public function get() {
		$cache = get_post_meta( $this->post_id, '_inc2734_count_cache_' . $this->service_name, true );
		if ( $cache && time() <= $cache['expiration'] ) {
			return $cache['count'];
		}
	}

	/**
	 * Return true when have count cache
	 *
	 * @return bool
	 */
	public function is_enabled() {
		$cache = $this->get();
		return ( ! is_null( $cache ) );
	}

	/**
	 * Update count cache
	 *
	 * @return bool
	 */
	public function update( $count ) {
		update_post_meta( $this->post_id, '_inc2734_count_cache_' . $this->service_name, [
			'count'      => $count,
			'expiration' => time() + (int) apply_filters( 'inc2734_wp_share_buttons_count_cache_seconds', 60 * 5 ),
		] );
	}
}
