<?php
class Inc2734_WP_Share_Buttons_Abstract_CORS_Test extends WP_UnitTestCase {

	public function setup() {
		parent::setup();

		// Loading reaquired files
		new Inc2734\WP_Share_Buttons\Share_Buttons();

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
		$object = new Inc2734_WP_Share_Buttons_Facebook( 'wp_share_buttons_facebook' );

		// Pattern: ! isset( $_GET['post_id'] )
		ob_start();
		$object->_ajax();
		$response = json_decode( ob_get_clean(), true );
		$this->assertEquals( '-', $response['count'] );

		// Pattern: ! isset( $_GET['url'] )
		$_GET['post_id'] = $this->factory->post->create();
		ob_start();
		$object->_ajax();
		$response = json_decode( ob_get_clean(), true );
		$this->assertEquals( '-', $response['count'] );

		// Pattern: no cache
		$_GET['post_id'] = $this->factory->post->create();
		$_GET['url']     = 'http://example.org/';
		$cache = get_post_meta( $_GET['post_id'], '_wp_share_buttons_facebook_count', true );
		$this->assertEquals( '', $cache );
		ob_start();
		$object->_ajax();
		$response = json_decode( ob_get_clean(), true );
		$this->assertSame( 1, preg_match( '/^\d+$/', $response['count'] ) );
		$cache = get_post_meta( $_GET['post_id'], '_wp_share_buttons_facebook_count', true );
		$this->assertNotEquals( '', $cache );
	}
}
