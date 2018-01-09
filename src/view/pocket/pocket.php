<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<div id="wp-share-buttons-pocket-<?php echo esc_attr( $post_id ); ?>"
	class="wp-share-button wp-share-button--<?php echo esc_attr( $type ); ?> wp-share-button--pocket"
>
	<?php if ( 'icon' !== $type ) : ?>
		<div class="wp-share-button__count">-</div>
	<?php endif; ?>
	<a class="wp-share-button__button" href="https://getpocket.com/edit?url=<?php the_permalink( $post_id ); ?>&amp;title=<?php echo esc_attr( $title ); ?>" target="_blank">
		<span class="wp-share-button__icon wp-share-button__icon--pocket"></span>
		<span class="wp-share-button__label"><?php esc_html_e( 'Pocket', 'inc2734-wp-share-buttons' ); ?></span>
	</a>
</div>
