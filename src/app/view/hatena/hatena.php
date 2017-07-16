<div class="wp-share-button wp-share-button--<?php echo esc_attr( $type ); ?> wp-share-button--hatena"
	data-wp-share-buttons-url="<?php echo esc_attr( $permalink ); ?>"
	data-wp-share-buttons-postid="<?php the_ID(); ?>"
	data-wp-share-buttons-has-cache="<?php echo esc_attr( $has_cache ); ?>"
>
	<?php if ( 'icon' !== $type ) : ?>
		<div class="wp-share-button__count">
			<?php echo esc_html( $count ); ?>
		</div>
	<?php endif; ?>
	<a class="wp-share-button__button" href="<?php echo esc_url( 'http://b.hatena.ne.jp/add?mode=confirm&amp;url=' . $permalink ); ?>" target="_blank">
		<span class="wp-share-button__icon wp-share-button__icon--hatena"></span>
		<span class="wp-share-button__label"><?php echo esc_html( apply_filters( 'inc2734_wp_share_buttons_hatena_label', 'Bookmark' ) ); ?></span>
	</a>
</div>
