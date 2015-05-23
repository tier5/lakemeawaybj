<article <?php post_class('post'); ?>>
	<?php if(has_post_thumbnail()) { ?>
		<div class="featured-image">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('normal'); ?></a>
		</div>
	<?php } ?>
	<div class="post-content">
		<h5 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<p><?php echo themex_sections(get_the_excerpt(), 1); ?></p>
	</div>
	<footer class="post-footer clearfix">
		<a href="<?php the_permalink(); ?>" class="button small"><?php _e('Read More','midway'); ?></a>
		<?php if(comments_open()) { ?>
		<div class="post-comment-count"><?php comments_number('0','1','%'); ?></div>
		<?php } ?>
		<div class="post-info">
			<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time>
		</div>
	</footer>
</article>