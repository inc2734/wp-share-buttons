<?php
$permalink = get_permalink( $post_id );
$target = str_replace( array( 'https://', 'http://' ), '', $permalink );
if ( 0 === strpos( $permalink, 'https://' ) ) {
	$target = 's/' . $target;
}
?>

<a href="http://b.hatena.ne.jp/entry/<?php echo esc_attr( $target ); ?>" class="hatena-bookmark-button" data-hatena-bookmark-layout="basic-label-counter" data-hatena-bookmark-lang="ja" title="<?php esc_html_e( 'Bookmark', 'inc2734-wp-share-buttons' ); ?>">
	<img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="<?php esc_html_e( 'Bookmark', 'inc2734-wp-share-buttons' ); ?>" width="20" height="20" style="border: none;" />
</a>
<script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
