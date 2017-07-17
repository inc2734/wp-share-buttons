<?php
$fb_locale = 'en_US';
if ( 'ja' === get_locale() ) {
	$fb_locale = 'ja_JP';
}
?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php echo esc_js( $fb_locale ); ?>/sdk.js#xfbml=1&version=v2.7&appId=260089250777871";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true">
	<a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><?php echo esc_html( apply_filters( 'inc2734_wp_share_buttons_facebook_label', 'Share' ) ); ?></a>
</div>
