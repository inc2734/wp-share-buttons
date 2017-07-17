<div id="wp-share-buttons-feed-<?php echo esc_attr( $post_id ); ?>"
	class="wp-share-button wp-share-button--<?php echo esc_attr( $type ); ?> wp-share-button--feed"
>
	<?php if ( 'icon' !== $type ) : ?>
		<div class="wp-share-button__count">-</div>
	<?php endif; ?>
	<a class="wp-share-button__button" href="<?php bloginfo( 'rss2_url' ); ?>" target="_blank">
		<span class="wp-share-button__icon wp-share-button__icon--feed"></span>
		<span class="wp-share-button__label"><?php echo esc_html( apply_filters( 'inc2734_wp_share_buttons_feed_label', 'Feed' ) ); ?></span>
	</a>
</div>
