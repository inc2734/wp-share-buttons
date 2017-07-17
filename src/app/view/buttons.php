<div id="wp-share-buttons-<?php the_ID(); ?>" class="wp-share-buttons wp-share-buttons--<?php echo esc_attr( $type ); ?>">
	<ul class="wp-share-buttons__list">
		<li class="wp-share-buttons__item">
			[wp_share_buttons_facebook type="<?php echo esc_attr( $type ); ?>"]
		</li>
		<li class="wp-share-buttons__item">
			[wp_share_buttons_twitter type="<?php echo esc_attr( $type ); ?>" title="<?php echo esc_attr( $title ); ?>"]
		</li>
		<li class="wp-share-buttons__item">
			[wp_share_buttons_hatena type="<?php echo esc_attr( $type ); ?>" title="<?php echo esc_attr( $title ); ?>"]
		</li>
		<li class="wp-share-buttons__item">
			[wp_share_buttons_feedly type="<?php echo esc_attr( $type ); ?>"]
		</li>
		<li class="wp-share-buttons__item">
			[wp_share_buttons_line type="<?php echo esc_attr( $type ); ?>" title="<?php echo esc_attr( $title ); ?>"]
		</li>
		<li class="wp-share-buttons__item">
			[wp_share_buttons_pocket type="<?php echo esc_attr( $type ); ?>" title="<?php echo esc_attr( $title ); ?>"]
		</li>
		<li class="wp-share-buttons__item">
			[wp_share_buttons_feed type="<?php echo esc_attr( $type ); ?>"]
		</li>
	</ul>
</div>
