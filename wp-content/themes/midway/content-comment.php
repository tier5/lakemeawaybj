<li id="comment-<?php echo $comment->comment_ID; ?>">
	<div class="comment clearfix">
		<div class="avatar-container">
			<div class="featured-image">
				<?php echo get_avatar($comment, 100); ?>
			</div>
		</div>
		<div class="comment-text">
			<header class="comment-header clearfix">				
				<h6 class="comment-author"><?php comment_author_link(); ?></h6>
				<time class="comment-date" datetime="<?php comment_time('Y-m-d'); ?>"><?php comment_time(get_option('date_format')); ?></time>
				<?php 
				comment_reply_link(array(
					'depth' => $GLOBALS['depth'],
					'max_depth' => get_option('thread_comments_depth'),
				));
				?>
			</header>
			<?php comment_text(); ?>
		</div>
	</div>