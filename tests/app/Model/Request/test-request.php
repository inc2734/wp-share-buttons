<?php
use Inc2734\WP_Share_Buttons\Bootstrap;
use Inc2734\WP_Share_Buttons\App\Model\Count_Cache;
use Inc2734\WP_Share_Buttons\App\Model\Requester\Hatena;

class Inc2734_WP_Share_Buttons_Requester_Test extends WP_UnitTestCase {

	public function setup() {
		parent::setup();

		// Loading reaquired files
		new Bootstrap();

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
		$object = new Hatena( 'hatena' );

		// Pattern: ! isset( $_GET['post_id'] )
		ob_start();
		$object->_ajax();
		$response = json_decode( ob_get_clean(), true );
		$this->assertEquals( '-', $response['count'] );

		// Pattern: no cache
		$_GET['post_id'] = $this->factory->post->create();
		$count_cache = new Count_Cache( $_GET['post_id'], 'hatena' );
		$cache = $count_cache->get();
		$this->assertFalse( $cache );
		ob_start();
		$object->_ajax();
		$response = json_decode( ob_get_clean(), true );
		$this->assertSame( 1, preg_match( '/^\d+$/', $response['count'] ) );
		$this->assertFalse( $count_cache->get() );
	}
}
