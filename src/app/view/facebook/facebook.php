<div id="wp-share-buttons-facebook-<?php echo esc_attr( $post_id ); ?>"
	class="wp-share-button wp-share-button--<?php echo esc_attr( $type ); ?> wp-share-button--facebook"
	data-wp-share-buttons-postid="<?php echo esc_attr( $post_id ); ?>"
	data-wp-share-buttons-has-cache="<?php echo esc_attr( $has_cache ); ?>"
>
	<?php if ( 'icon' !== $type ) : ?>
		<div class="wp-share-button__count">
			<?php echo esc_html( $count ); ?>
		</div>
	<?php endif; ?>
	<a class="wp-share-button__button" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink( $post_id ); ?>" target="_blank">
		<span class="wp-share-button__icon wp-share-button__icon--facebook"></span>
		<span class="wp-share-button__label"><?php echo esc_html( apply_filters( 'inc2734_wp_share_buttons_facebook_label', 'Share' ) ); ?></span>
	</a>
</div>
