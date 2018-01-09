<?php
use Inc2734\WP_Share_Buttons\Share_Buttons;
use Inc2734\WP_Share_Buttons\Model\Count_Cache;
use Inc2734\WP_Share_Buttons\Model\Request\Facebook;

class Inc2734_WP_Share_Buttons_Request_Test extends WP_UnitTestCase {

	public function setup() {
		parent::setup();

		// Loading reaquired files
		new Share_Buttons();

		// Through nonce check
		$nonce = wp_create_nonce( 'wp_share_buttons_facebook' );
		$_REQUEST['_ajax_nonce'] = $nonce;
		add_filter( 'wp_doing_ajax', '__return_true' );
		add_filter( 'wp_die_ajax_handler', function( $ajax_wp_die_handler ) {
			return '__return_true';
		} );
	}

	public function tearDown() {
		parent::tearDown();
	}

	/**
	 * @test
	 */
	public function _ajax() {
		$object = new Facebook( 'facebook' );

		// Pattern: ! isset( $_GET['post_id'] )
		ob_start();
		$object->_ajax();
		$response = json_decode( ob_get_clean(), true );
		$this->assertEquals( '-', $response['count'] );

		// Pattern: no cache
		$_GET['post_id'] = $this->factory->post->create();
		$count_cache = new Count_Cache( $_GET['post_id'], 'facebook' );
		$cache = $count_cache->get();
		$this->assertNull( $cache );
		ob_start();
		$object->_ajax();
		$response = json_decode( ob_get_clean(), true );
		$this->assertSame( 1, preg_match( '/^\d+$/', $response['count'] ) );
		$this->assertNotEquals( '', $count_cache->get() );
	}
}
