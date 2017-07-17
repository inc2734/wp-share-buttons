<div class="wp-share-button wp-share-button--<?php echo esc_attr( $type ); ?> wp-share-button--feedly"
	data-wp-share-buttons-postid="<?php the_ID(); ?>"
	data-wp-share-buttons-has-cache="<?php echo esc_attr( $has_cache ); ?>"
>
	<?php if ( 'icon' !== $type ) : ?>
		<div class="wp-share-button__count">
			<?php echo esc_html( $count ); ?>
		</div>
	<?php endif; ?>
	<a class="wp-share-button__button" href="http://cloud.feedly.com/#subscription%2Ffeed%2F<?php echo esc_attr( urlencode( get_bloginfo( 'rss2_url' ) ) ); ?>" target="_blank">
		<span class="wp-share-button__icon wp-share-button__icon--feedly"></span>
		<span class="wp-share-button__label"><?php echo esc_html( apply_filters( 'inc2734_wp_share_buttons_feedly_label', 'Feedly' ) ); ?></span>
	</a>
</div>
