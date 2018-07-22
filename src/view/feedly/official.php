<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<a href='https://feedly.com/i/subscription/feed/<?php echo esc_attr( urlencode( get_bloginfo( 'rss2_url' ) ) ); ?>'  target='_blank'>
	<img id='feedlyFollow' src='https://s3.feedly.com/img/follows/feedly-follow-rectangle-flat-small_2x.png' alt='<?php esc_html_e( 'Feedly', 'inc2734-wp-share-buttons' ); ?>' style="width:66px; height: 20px">
</a>
