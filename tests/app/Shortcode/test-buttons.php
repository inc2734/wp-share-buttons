<?php
use Inc2734\WP_Share_Buttons\Bootstrap;
use Inc2734\WP_Share_Buttons\App\Model\Count_Cache;

class Inc2734_WP_Share_Buttons_Shortcode_Test extends WP_UnitTestCase {

	public function set_up() {
		parent::set_up();
		new Bootstrap();
	}

	/**
	 * @dataProvider share_links
	 */
	public function test_share_link_destination( $service, $destination, $url_source = 'post' ) {
		$post_id = self::factory()->post->create();
		$html    = do_shortcode( '[wp_share_buttons_' . $service . ' post_id="' . $post_id . '" title="Share 日本語"]' );

		$this->assertStringContainsString( 'wp-share-button--' . $service, $html );
		$this->assertSame( 1, preg_match( '/href="([^"]+)"/', $html, $matches ) );
		$href = html_entity_decode( $matches[1], ENT_QUOTES, 'UTF-8' );
		$this->assertStringStartsWith( $destination, $href );
		if ( 'post' === $url_source ) {
			$this->assertStringContainsString( get_permalink( $post_id ), urldecode( $href ) );
		} elseif ( 'feed' === $url_source ) {
			$this->assertStringContainsString( get_bloginfo( 'rss2_url' ), urldecode( $href ) );
		}
	}

	public static function share_links() {
		return array(
			'facebook'  => array( 'facebook', 'https://www.facebook.com/sharer/sharer.php?' ),
			'twitter'   => array( 'twitter', 'https://twitter.com/intent/tweet?' ),
			'x'         => array( 'x', 'https://twitter.com/intent/tweet?' ),
			'threads'   => array( 'threads', 'https://www.threads.net/intent/post?' ),
			'hatena'    => array( 'hatena', 'http://b.hatena.ne.jp/add?' ),
			'feedly'    => array( 'feedly', 'https://feedly.com/i/subscription/feed/', 'feed' ),
			'line'      => array( 'line', 'https://line.me/R/msg/text/?' ),
			'pocket'    => array( 'pocket', 'https://getpocket.com/edit?' ),
			'pinterest' => array( 'pinterest', 'https://www.pinterest.com/pin/create/button/', null ),
			'feed'      => array( 'feed', 'http', 'feed' ),
		);
	}

	public function test_x_link_preserves_title_and_hashtags() {
		$post_id = self::factory()->post->create();
		$html    = do_shortcode( '[wp_share_buttons_x post_id="' . $post_id . '" title="Share & 日本語" hashtags="WordPress,日本語"]' );
		preg_match( '/href="([^"]+)"/', $html, $matches );
		parse_str( wp_parse_url( html_entity_decode( $matches[1], ENT_QUOTES, 'UTF-8' ), PHP_URL_QUERY ), $query );

		$this->assertSame( 'Share & 日本語', $query['text'] );
		$this->assertSame( get_permalink( $post_id ), $query['url'] );
		$this->assertSame( 'WordPress,日本語', $query['hashtags'] );
	}

	public function test_copy_button_preserves_escaped_attributes() {
		$post_id = self::factory()->post->create();
		$html    = do_shortcode( '[wp_share_buttons_copy post_id="' . $post_id . '" title="Share & 日本語" hashtags="WordPress,日本語"]' );

		$this->assertStringContainsString( 'data-title="Share &amp; 日本語"', $html );
		$this->assertStringContainsString( 'data-url="' . esc_attr( get_permalink( $post_id ) ) . '"', $html );
		$this->assertStringContainsString( 'data-hashtags="WordPress,日本語"', $html );
	}

	public function test_all_layouts_render_buttons_and_cached_counts() {
		$post_id = self::factory()->post->create();
		$this->go_to( get_permalink( $post_id ) );
		foreach ( array( 'facebook', 'hatena', 'feedly' ) as $service ) {
			$cache = new Count_Cache( $post_id, $service );
			$cache->update( 12 );
		}
		foreach ( array( 'balloon', 'horizontal', 'icon', 'block', 'official' ) as $type ) {
			$html = do_shortcode( '[wp_share_buttons type="' . $type . '" post_id="' . $post_id . '"]' );
			$this->assertStringContainsString( 'wp-share-buttons--' . $type, $html );
			$this->assertStringNotContainsString( '[wp_share_buttons_', $html );
			$this->assertSame( 9, substr_count( $html, 'class="wp-share-buttons__item"' ) );
			if ( in_array( $type, array( 'balloon', 'horizontal', 'block' ), true ) ) {
				$this->assertSame( 3, substr_count( $html, 'data-wp-share-buttons-has-cache="1"' ) );
				$this->assertSame( 3, preg_match_all( '/class="wp-share-button__count">\s*12\s*</', $html ) );
			}
		}
	}
}
