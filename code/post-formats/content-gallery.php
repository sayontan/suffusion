<?php
/**
 * Special handling for the Gallery post format. This tackles two displays separately: a gallery displayed as a part of an archive vis-a-vis a
 * gallery displayed by itself.
 *
 * @since 3.9.1
 * @package Suffusion
 * @subpackage Formats
 */

global $query_string, $post, $suf_gallery_format_thumb_count, $suf_gallery_format_thumb_panel_position, $suf_gallery_format_disable, $suf_gallery_random_thumbs_disable;

if (isset($suf_gallery_format_disable) && $suf_gallery_format_disable == 'on') {
	get_template_part('post-formats/content');
	return;
}

if (!is_single()) {
	if (has_post_thumbnail()) {
		// use the thumbnail ("featured image")
		$thumb_id = get_post_thumbnail_id();
	}
	else {
		$attachments = get_children(
			array(
				'post_parent' => get_the_ID(),
				'post_status' => 'inherit',
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'order' => 'ASC',
				'orderby' => 'menu_order ID',
				'numberposts' => 1,
			)
		);
		if (!empty($attachments)) {
			$thumb_id = array_keys($attachments)[0];
		}
	}

	$post_not_in_array = isset($thumb_id) ? array($thumb_id) : array();

	$post_id = get_the_ID();
	if (get_post_gallery()) {
		$first_post_gallery = get_post_gallery($post, false);
		if (isset($first_post_gallery['id']) && $first_post_gallery['id'] != $post_id) {
			$post_id = $first_post_gallery['id'];
		}
	}

	$args = array(
		'post_parent' => $post_id,
		'post_status' => 'inherit',
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'orderby' => 'rand',
		'posts_per_page' => $suf_gallery_format_thumb_count + 1,
//		'post__not_in' => $post_not_in_array,
		'update_post_term_cache' => false,
	);

	if (isset($suf_gallery_random_thumbs_disable) && $suf_gallery_random_thumbs_disable == 'on') {
		$args['orderby'] = 'menu_order ID';
		$args['order'] = 'ASC';
	}
	
	$images = new WP_Query($args);

	$content = $post->post_content;

	$thumbnails = array();
	foreach ($images->posts as $image) {
		if (isset($thumb_id) && $image->ID == $thumb_id) {
			continue;
		}
		$img = suffusion_get_image(array('gallery-thumb' => true, 'attachment-id' => $image->ID, 'no-link' => true));
		$title = get_the_title($image->ID);
		$thumbnails[] = '<a href="' . get_permalink($image->ID) . '" title="'.esc_attr($title).'">' . $img . '</a>';
		if (count($thumbnails) == $suf_gallery_format_thumb_count) {
			break;
		}
	}
	$photo_count = $images->found_posts;

	$mores = preg_match('/<!--more(.*?)?-->/', $content, $matches);
	$nextpages = preg_match('/<!--nextpage(.*?)?-->/', $content, $matches);
	if (!$mores && !$nextpages) {
		echo "<div class='gallery-container fix'>";
		echo "<div class='gallery-leading'>";
		if (has_post_thumbnail()) {
			// use the thumbnail ("featured image")
			the_post_thumbnail('full');
		}
		else {
			$post_id = get_the_ID();
			if (get_post_gallery()) {
				$first_post_gallery = get_post_gallery($post, false);
				if (isset($first_post_gallery['id']) && $first_post_gallery['id'] != $post_id) {
					$post_id = $first_post_gallery['id'];
				}
				else if (isset($first_post_gallery['ids'])) {
					$gallery_image_ids = explode(',', $first_post_gallery['ids']);
					$photo_count = count($gallery_image_ids);
					$thumb_id = $gallery_image_ids[0];
					$src = wp_get_attachment_image($thumb_id, 'full');
					$title = esc_attr(get_the_title($thumb_id));
					echo "<a href='".get_permalink($thumb_id)."' title='".$title."'>".$src."</a>";
					if (empty($thumbnails)) {
						$gallery_image_ctr = 0;
						if (!isset($suf_gallery_random_thumbs_disable) || empty($suf_gallery_random_thumbs_disable)) {
							shuffle($gallery_image_ids);
						}
						foreach ($gallery_image_ids as $gallery_image_id) {
							if (isset($thumb_id) && $thumb_id != $gallery_image_id) {
								$img = suffusion_get_image(array('gallery-thumb' => true, 'attachment-id' => $gallery_image_id, 'no-link' => true));
								$title = esc_attr(get_the_title($gallery_image_ids[$gallery_image_ctr]));
								$thumbnails[] = '<a href="'.get_permalink($gallery_image_id).'" title="'.$title.'">'.$img.'</a>';
								$gallery_image_ctr++;
								if ($gallery_image_ctr == $suf_gallery_format_thumb_count) {
									break;
								}
							}
						}
					}
				}
			}

			$attachments = get_children(
				array(
					'post_parent' => $post_id,
					'post_status' => 'inherit',
					'post_type' => 'attachment',
					'post_mime_type' => 'image',
					'order' => 'ASC',
					'orderby' => 'menu_order ID',
					'numberposts' => 1,
				)
			);
			foreach ($attachments as $thumb_id => $attachment) {
				$src = wp_get_attachment_image($thumb_id, 'full');
				echo "<a href='".get_permalink()."' title='".esc_attr(get_the_title())."'>".$src."</a>";
			}
		}
		echo "</div>";

		echo "<div class='gallery-contents $suf_gallery_format_thumb_panel_position'>";

		$content = strip_shortcodes($content); // We don't want the [gallery] shortcode to run here ...
		$content = apply_filters('the_content', $content); // ... but we don't want the formatting to get stripped bare either.
		echo $content;

		echo "<div class='gallery-thumbs'>";
		foreach ($thumbnails as $thumbnail) {
			echo $thumbnail;
		}
		echo "</div>";

		echo "<div class='gallery-photo-counter fix'><a href='".get_permalink()."'>".sprintf(__('This gallery contains %1$s photos', 'suffusion'), $photo_count).'</a></div>';
		echo "</div><!-- /.gallery-contents -->\n";
		echo "</div><!-- /.gallery-container -->\n";
	}
	else {
		if (has_post_thumbnail()) {
			// use the thumbnail ("featured image")
			the_post_thumbnail('full');
		}
		the_content(sprintf(__('View %1$s photos', 'suffusion'), $photo_count).' &raquo;');
	}
}
else {
	if (has_post_thumbnail()) {
		// use the thumbnail ("featured image")
		the_post_thumbnail('full');
	}
	$continue = __('Continue reading &raquo;', 'suffusion');
	the_content($continue);
}