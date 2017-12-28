<?php
class Inc2734_WP_Share_Buttons_Twitter_Test extends WP_UnitTestCase {

	public function setup() {
		parent::setup();

		// Loading reaquired files
		new Inc2734\WP_Share_Buttons\Share_Buttons();
	}

	public function tearDown() {
		parent::tearDown();
	}

	/**
	 * @test
	 */
	public function _get_count() {
		$object = new Inc2734_WP_Share_Buttons_Twitter( 'wp_share_buttons_twitter' );
		$reflection = new \ReflectionClass( $object );
		$method = $reflection->getMethod( '_get_count' );
		$method->setAccessible( true );
		$response = $method->invoke( $object, 'http://example.org/' );
		$this->assertSame( 0, preg_match( '/^\d+$/', $response ) );
	}
}
