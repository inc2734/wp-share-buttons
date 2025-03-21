<?php
/**
 * @package inc2734/wp-share-buttons
 * @author inc2734
 * @license GPL-2.0+
 */

$query = array(
	'text' => $title . ' ' . get_permalink( $post_id ),
);
?>
<div id="wp-share-buttons-threads-<?php echo esc_attr( $post_id ); ?>"
	class="wp-share-button wp-share-button--<?php echo esc_attr( $type ); ?> wp-share-button--threads"
>
	<a class="wp-share-button__button" href="<?php echo esc_url( 'https://www.threads.net/intent/post?' . http_build_query( $query, '', '&amp;' ) ); ?>" target="_blank">
		<span class="wp-share-button__icon wp-share-button__icon--threads">
			<?php
			$svg_path = get_template_directory() . '/vendor/inc2734/wp-share-buttons/src/assets/img/threads.svg';
			if ( file_exists( $svg_path ) ) {
				include $svg_path;
			}
			?>
		</span>
		<span class="wp-share-button__label"><?php esc_html_e( 'Threads', 'inc2734-wp-share-buttons' ); ?></span>
	</a>
</div>
