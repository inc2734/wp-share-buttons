<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

$query = array(
	'url'  => get_permalink( $post_id ),
	'text' => get_the_title( $post_id ) . ' - ' . get_bloginfo( 'name' ),
);
?>
<div id="wp-share-buttons-line-<?php echo esc_attr( $post_id ); ?>"
	class="wp-share-button wp-share-button--<?php echo esc_attr( $type ); ?> wp-share-button--line"
>
	<?php if ( 'icon' !== $type ) : ?>
		<div class="wp-share-button__count">-</div>
	<?php endif; ?>
	<a class="wp-share-button__button" href="<?php echo esc_url( 'https://line.me/R/msg/text/?' . sprintf( '%1$s %2$s', rawurlencode( $query['text'] ), rawurlencode( $query['url'] ) ) ); ?>" target="_blank">
		<span class="wp-share-button__icon wp-share-button__icon--line">
			<?php
			$svg_path = get_template_directory() . '/vendor/inc2734/wp-share-buttons/src/assets/img/line.svg';
			if ( file_exists( $svg_path ) ) {
				include $svg_path;
			}
			?>
		</span>
		<span class="wp-share-button__label"><?php esc_html_e( 'LINE', 'inc2734-wp-share-buttons' ); ?></span>
	</a>
</div>
