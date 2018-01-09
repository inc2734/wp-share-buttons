<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<div id="wp-share-buttons-twitter-<?php echo esc_attr( $post_id ); ?>"
	class="wp-share-button wp-share-button--<?php echo esc_attr( $type ); ?> wp-share-button--twitter"
	data-wp-share-buttons-postid="<?php echo esc_attr( $post_id ); ?>"
	data-wp-share-buttons-has-cache="<?php echo esc_attr( $has_cache ); ?>"
	data-wp-share-buttons-cache-expiration="<?php echo esc_attr( $expiration ); ?>"
>
	<?php if ( 'icon' !== $type ) : ?>
		<div class="wp-share-button__count">
			<?php echo esc_html( $count ); ?>
		</div>
	<?php endif; ?>
	<a class="wp-share-button__button" href="https://twitter.com/share?&amp;text=<?php echo esc_attr( urlencode( $title ) ); ?>&amp;url=<?php echo esc_attr( urlencode( get_permalink( $post_id ) ) ); ?>" target="_blank">
		<span class="wp-share-button__icon wp-share-button__icon--twitter"></span>
		<span class="wp-share-button__label"><?php esc_html_e( 'Tweet', 'inc2734-wp-share-buttons' ); ?></span>
	</a>
</div>
