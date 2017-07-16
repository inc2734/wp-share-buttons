<?php
$target = str_replace( array( 'https://', 'http://' ), '', $permalink );
if ( 0 === strpos( $permalink, 'https://' ) ) {
	$target = 's/' . $target;
}
?>

<a href="http://b.hatena.ne.jp/entry/<?php echo esc_attr( $target ); ?>" class="hatena-bookmark-button" data-hatena-bookmark-layout="basic-label-counter" data-hatena-bookmark-lang="ja" title="<?php echo esc_html( apply_filters( 'inc2734_wp_share_buttons_hatena_label', 'Bookmark' ) ); ?>">
	<img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="<?php echo esc_html( apply_filters( 'inc2734_wp_share_buttons_hatena_label', 'Bookmark' ) ); ?>" width="20" height="20" style="border: none;" />
</a>
<script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
