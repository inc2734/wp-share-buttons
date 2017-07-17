<div class="wp-share-button wp-share-button--<?php echo esc_attr( $type ); ?> wp-share-button--line">
	<?php if ( 'icon' !== $type ) : ?>
		<div class="wp-share-button__count">-</div>
	<?php endif; ?>
	<a class="wp-share-button__button" href="https://timeline.line.me/social-plugin/share?url=<?php echo esc_attr( urlencode( get_permalink() ) ); ?>" target="_blank">
		<span class="wp-share-button__icon wp-share-button__icon--line"></span>
		<span class="wp-share-button__label"><?php echo esc_html( apply_filters( 'inc2734_wp_share_buttons_line_label', 'LINE' ) ); ?></span>
	</a>
</div>
