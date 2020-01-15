<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

$query = [
	'u' => get_permalink( $post_id ),
];
?>
<div id="wp-share-buttons-facebook-<?php echo esc_attr( $post_id ); ?>"
	class="wp-share-button wp-share-button--<?php echo esc_attr( $type ); ?> wp-share-button--facebook"
	data-wp-share-buttons-postid="<?php echo esc_attr( $post_id ); ?>"
	data-wp-share-buttons-has-cache="<?php echo esc_attr( $has_cache ); ?>"
	data-wp-share-buttons-cache-expiration="<?php echo esc_attr( $expiration ); ?>"
>
	<?php if ( 'icon' !== $type ) : ?>
		<div class="wp-share-button__count">
			<?php echo esc_html( $count ); ?>
		</div>
	<?php endif; ?>
	<a class="wp-share-button__button" href="<?php echo esc_url( 'https://www.facebook.com/sharer/sharer.php?' . http_build_query( $query, '', '&amp;' ) ); ?>" target="_blank">
		<span class="wp-share-button__icon wp-share-button__icon--facebook">
			<?php
			$svg_path = get_template_directory() . '/vendor/inc2734/wp-share-buttons/src/assets/img/facebook.svg';
			if ( file_exists( $svg_path ) ) {
				include( $svg_path );
			}
			?>
		</span>
		<span class="wp-share-button__label"><?php esc_html_e( 'Share', 'inc2734-wp-share-buttons' ); ?></span>
	</a>
</div>
