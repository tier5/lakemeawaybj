<?php
$video=ThemexCore::getPostMeta($post->ID, 'video_url');
$permalink=empty($video)?wp_get_attachment_url(get_post_thumbnail_id($post->ID)):'#gallery-'.$post->ID;
?>
<div class="column gallery-item <?php echo $GLOBALS['width']; ?>col <?php echo $GLOBALS['counter']==$GLOBALS['columns'] ? 'last':''; ?>">
	<div class="featured-image">
		<a href="<?php echo $permalink; ?>" class="colorbox <?php if($video) { ?>inline<?php } ?>" data-group="gallery" title="<?php the_title(); ?>">
			<?php the_post_thumbnail('preview'); ?>
		</a>
		<a class="featured-image-caption <?php echo $GLOBALS['caption']; ?>-caption" href="#">
			<h6><?php the_title(); ?></h6>
		</a>			
	</div>
	<div class="hidden">					
		<?php if($video) { ?>
		<div class="gallery-video" id="gallery-<?php echo $post->ID; ?>">
			<div class="embedded-video">
				<?php echo wp_oembed_get($video); ?>
			</div>
		</div>
		<?php 
		} else {
			foreach(ThemexCore::getAttachments($post->ID) as $image) {
				$url=wp_get_attachment_url($image->ID);
				if($url!=$permalink) {
				?>
				<a class="colorbox" href="<?php echo $url; ?>" data-group="gallery-<?php the_ID(); ?>" title="<?php echo htmlspecialchars(strip_tags($image->post_content)); ?>"></a>
				<?php
				}
			}
		}
		?>
	</div>
	<div class="block-background"></div>
</div>