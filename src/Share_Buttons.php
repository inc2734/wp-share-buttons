<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Share_Buttons;

use Inc2734\WP_Share_Buttons\Model\Request;
use Inc2734\WP_Share_Buttons\Controller;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Share_Buttons {

	public function __construct() {
		load_textdomain( 'inc2734-wp-share-buttons', __DIR__ . '/languages/' . get_locale() . '.mo' );

		new Request\Facebook( 'facebook' );
		new Controller\Facebook( 'wp_share_buttons_facebook' );

		new Request\Twitter( 'twitter' );
		new Controller\Twitter( 'wp_share_buttons_twitter' );

		new Request\Hatena( 'hatena' );
		new Controller\Hatena( 'wp_share_buttons_hatena' );

		new Request\Feedly( 'feedly' );
		new Controller\Feedly( 'wp_share_buttons_feedly' );

		new Controller\GooglePlus( 'wp_share_buttons_google_plus' );
		new Controller\Line( 'wp_share_buttons_line' );
		new Controller\Pocket( 'wp_share_buttons_pocket' );
		new Controller\Feed( 'wp_share_buttons_feed' );
		new Controller\Buttons( 'wp_share_buttons' );
	}
}
