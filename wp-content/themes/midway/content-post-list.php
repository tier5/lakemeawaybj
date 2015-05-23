<article <?php post_class('post clearfix'); ?>>
	<?php if(has_post_thumbnail()) { ?>
	<div class="column fivecol post-featured-image">
		<div class="featured-image">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('normal'); ?></a>
		</div>
	</div>
	<div class="column sevencol last">
	<?php } else { ?>
	<div class="fullwidth-section">
	<?php } ?>
		<div class="post-content">
			<div class="section-title">
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			</div>
			<?php the_excerpt(); ?>
			<footer class="post-footer clearfix">
				<a href="<?php the_permalink(); ?>" class="button small"><span><?php _e('Read More','midway'); ?></span></a>
				<?php if(comments_open()) { ?>
				<div class="post-comment-count"><?php comments_number('0','1','%'); ?></div>
				<?php } ?>
				<div class="post-info">
					<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time>
				</div>
			</footer>
		</div>
	</div>
</article>