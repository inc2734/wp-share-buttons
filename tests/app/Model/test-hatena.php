<?php
use Inc2734\WP_Share_Buttons\Bootstrap;
use Inc2734\WP_Share_Buttons\App\Model\Requester\Hatena;

class Inc2734_WP_Share_Buttons_Hatena_Test extends WP_UnitTestCase {

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
			$this->assertSame( 'https://b.hatena.ne.jp/entry.count?url=http://example.org/', $url );
			return array(
				'response' => array( 'code' => 200 ),
				'body'     => '42',
			);
		}, 10, 3 );

		$object = new Hatena( 'wp_share_buttons_hatena' );
		$reflection = new \ReflectionClass( $object );
		$method = $reflection->getMethod( '_get_count' );
		$method->setAccessible( true );
		$response = $method->invoke( $object, 'http://example.org/' );
		$this->assertSame( '42', $response );
	}
}
