<?php
use Inc2734\WP_Share_Buttons\Bootstrap;
use Inc2734\WP_Share_Buttons\App\Model\Requester\Feedly;

class Inc2734_WP_Share_Buttons_Feedly_Test extends WP_UnitTestCase {

	public function set_up() {
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
		add_filter( 'pre_http_request', function( $response, $args, $url ) {
			$this->assertSame( 'https://cloud.feedly.com/v3/feeds/feed%2Fhttp%3A%2F%2Fexample.org%2F', $url );
			return array(
				'response' => array( 'code' => 200 ),
				'body'     => wp_json_encode( array( 'subscribers' => 42 ) ),
			);
		}, 10, 3 );

		$object = new Feedly( 'wp_share_buttons_feedly' );
		$reflection = new \ReflectionClass( $object );
		$method = $reflection->getMethod( '_get_count' );
		$method->setAccessible( true );
		$response = $method->invoke( $object, 'http://example.org/' );
		$this->assertSame( 42, $response );
	}

	public function test_failed_request_returns_placeholder() {
		add_filter( 'pre_http_request', function() {
			return new WP_Error( 'http_request_failed', 'Connection failed.' );
		} );
		$object = new Feedly();
		$method = new \ReflectionMethod( $object, '_get_count' );
		$method->setAccessible( true );
		$this->assertSame( '-', $method->invoke( $object, 'http://example.org/' ) );
	}
}
