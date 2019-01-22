<?php
use Inc2734\WP_Share_Buttons\Bootstrap;
use Inc2734\WP_Share_Buttons\App\Model\Requester\Twitter;

class Inc2734_WP_Share_Buttons_Twitter_Test extends WP_UnitTestCase {

	public function setup() {
		parent::setup();

		// Loading reaquired files
		new Bootstrap();
	}

	public function tearDown() {
		parent::tearDown();
	}

	/**
	 * @test
	 */
	public function _get_count() {
		$object = new Twitter( 'wp_share_buttons_twitter' );
		$reflection = new \ReflectionClass( $object );
		$method = $reflection->getMethod( '_get_count' );
		$method->setAccessible( true );
		$response = $method->invoke( $object, 'http://example.org/' );
		$this->assertSame( '-', $response );
	}
}
