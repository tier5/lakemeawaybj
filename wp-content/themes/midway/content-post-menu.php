<article <?php post_class('post clearfix'); ?>>
	<?php if(has_post_thumbnail()) { ?>
	<div class="post-featured-image">
		<div class="featured-image">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('normal'); ?></a>
		</div>
	</div>
	<div class="post-content">
	<?php } else { ?>
	<div class="fullwidth-section">
	<?php } ?>
		<h6 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
		<footer class="post-footer clearfix">
			<?php if(comments_open()) { ?>
			<div class="post-comment-count"><?php comments_number('0','1','%'); ?></div>
			<?php } ?>
			<div class="post-info">
				<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time>
			</div>
		</footer>
	</div>
</article>