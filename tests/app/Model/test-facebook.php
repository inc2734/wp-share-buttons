<?php
use Inc2734\WP_Share_Buttons\Bootstrap;
use Inc2734\WP_Share_Buttons\App\Model\Requester\Facebook;

class Inc2734_WP_Share_Buttons_Facebook_Test extends WP_UnitTestCase {

	public function set_tup() {
		parent::set_up();

		// Loading reaquired files
		new Bootstrap();
	}

	public function tear_down() {
		parent::tear_down();
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
		$this->assertSame( '-', $response );
	}
}
