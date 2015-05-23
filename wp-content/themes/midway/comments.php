<?php if(!post_password_required() && (have_comments() || comments_open())) { ?>
<div class="post-comments clearfix">
	<div class="section-title">
		<h1><?php _e('Comments','midway'); ?></h1>
	</div>
	<?php if(have_comments()) { ?>
	<div class="comments-list" id="comments">		
		<ul>
			<?php
			wp_list_comments(array(
				'avatar_size' => 100,
				'callback' => array('ThemexInterface', 'renderComment'),
			));
			?>
		</ul>
	</div>
	<nav class="pagination comments-pagination">
	<?php paginate_comments_links(array('prev_text' => '', 'next_text' => '')); ?>
	</nav>
	<?php } ?>
	<?php if(comments_open()) { ?>
	<?php comment_form(); ?>
	<?php } ?>
</div>
<!-- post comments -->
<?php } ?>