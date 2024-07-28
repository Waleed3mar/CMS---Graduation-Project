<?php
	$blogslider_layout = isset($args['blogslider_layout']) ? $args['blogslider_layout'] : 'one';
	$alignment_class = isset($args['meta_alignment_class']) ? $args['meta_alignment_class'] : '';
	$meta_date = isset($args['meta_date']) ? $args['meta_date'] : '';
?>
<div class="dnxte-content-wrapper">
    <<?php echo et_core_esc_previously($processed_header_level); ?> class="dnxte-entry-title">
		<a href="<?php esc_url(the_permalink());?>">
        	<?php the_title(); ?>
		</a>
    </<?php echo et_core_esc_previously($processed_header_level); ?>>
    <div class="dnxte-post-meta <?php esc_attr($alignment_class);  ?>">
		<?php 
			global $authordata;

				$author = 'off' !== $args['show_author'] 
				? sprintf(
					'<span class="dnxte-authovcard">
						<span class="author vcard"><img src=" %1$s" /> %2$s</span> 
					</span>',
					esc_url(get_avatar_url($authordata->ID)),
					et_pb_get_the_author_posts_link()
				) : '';

				$date_icon = sprintf('<span class="dnxte-blogslider-content-icon">%1$s</span>', et_pb_process_font_icon('}'));
					
				$bottom_date = 'bottom' == $args['date_position'] ? sprintf(
					'<span class="dnxte-blog-published">%2$s %1$s</span>',
					get_the_date( $meta_date ),
					$date_icon
					) : '';

				// $bottom_date = 'bottom' == $args['date_position'] ? sprintf(
				// 	'<span class="dnxte-blog-published">%2$s %1$s</span>',
				// 	the_time('l, F jS, Y'),
				// 	$date_icon
				// 	) : '';

				$category_icon = ' <span class="dnxte-blogslider-content-icon" ></span>';

				$categories_list = 'off' !== $args['show_categories'] ? et_builder_get_the_term_list(', ') : '';
				
				$categories = 'off' !== $args['show_categories'] ? sprintf(
					'<span class="dnxte-blog-post-categories">
						%2$s
						%1$s
					</span>',
					et_core_esc_wp($categories_list),
					et_core_intentionally_unescaped( $category_icon, 'fixed_string' )
				) : '';

				printf('%1$s %2$s %3$s', 
					et_core_esc_previously( $author ),
					et_core_esc_previously( $bottom_date ),
					et_core_esc_previously( $categories )
				);
			?>
    </div>
    <div class="dnxte-blog-post-content">
		<?php 
		$content = '';
		if ('on' === $args['show_excerpt']) {
			global $post;


				if ( has_excerpt() ) {
		
					$content = apply_filters( 'the_excerpt', $post->post_excerpt );
					$content = rtrim( wp_trim_words( $content, $excerpt_length) );
			
				} else{
					$content = $post->post_content;
					$content = preg_replace( '@\[caption[^\]]*?\].*?\[\/caption]@si', '', $content );
					$content = preg_replace( '@\[et_pb_post_nav[^\]]*?\].*?\[\/et_pb_post_nav]@si', '', $content );
					$content = preg_replace( '@\[audio[^\]]*?\].*?\[\/audio]@si', '', $content );
					$content = preg_replace( '@\[embed[^\]]*?\].*?\[\/embed]@si', '', $content );
					$content = wp_strip_all_tags( $content );
					$content = et_strip_shortcodes( $content );
					$content = et_builder_strip_dynamic_content( $content );
					$content = apply_filters( 'et_truncate_post', $content, get_the_ID() );
					$content = rtrim( wp_trim_words( $content, $excerpt_length) );
				}
			}
			
			echo et_core_intentionally_unescaped( $content, 'html' );

		?>
    </div>
	<?php
	if('one' != $blogslider_layout){
		?>
		<div class="dnxte-readmorewrapper">
			<?php echo et_core_esc_previously($dnxte_more); ?>
		</div>
		<?php
	}
	?>	
</div>

<?php
if('one' == $blogslider_layout){
	?>
	<div class="dnxte-readmorewrapper">
		<?php echo et_core_esc_previously($dnxte_more); ?>
	</div>
	<?php
}
?>