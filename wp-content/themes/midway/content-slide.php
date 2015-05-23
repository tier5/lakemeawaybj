<?php 
$video=ThemexCore::getPostMeta($post->ID, 'video_url'); 
$link=ThemexCore::getPostMeta($post->ID, 'link_url');
?>
<li>
	<div class="featured-image">
	<?php if(!empty($video)) { ?>
		<div class="embedded-video">
			<?php echo wp_oembed_get($video); ?>
		</div>
	<?php } else { ?>		
		<?php if($link) { ?>
		<a href="<?php echo $link; ?>">
			<?php the_post_thumbnail('large'); ?>
		</a>
		<?php } else { ?>
		<?php the_post_thumbnail('large'); ?>
		<?php } ?>		
	<?php } ?>
	</div>
	<?php if(get_the_content() && empty($video)) { ?>
	<div class="featured-image-caption visible-caption">
		<h4><?php the_content(); ?></h4>
	</div>
	<?php } ?>
</li>