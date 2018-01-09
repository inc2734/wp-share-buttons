<?php
use Inc2734\WP_Share_Buttons\Share_Buttons;
use Inc2734\WP_Share_Buttons\Model\Request\Facebook;

class Inc2734_WP_Share_Buttons_Facebook_Test extends WP_UnitTestCase {

	public function setup() {
		parent::setup();

		// Loading reaquired files
		new Share_Buttons();
	}

	public function tearDown() {
		parent::tearDown();
	}

	/**
	 * @test
	 */
	public function _get_count() {
		$object = new Facebook( 'wp_share_buttons_facebook' );
		$reflection = new \ReflectionClass( $object );
		$method = $reflection->getMethod( '_get_count' );
		$method->setAccessible( true );
		$response = $method->invoke( $object, 'http://example.org/' );
		$this->assertSame( 1, preg_match( '/^\d+$/', $response ) );
	}
}
