<?php
get_header();

$layout=ThemexCore::getOption('blog_layout','right');

if($layout=='left') {
?>
<aside class="column fourcol">
<?php get_sidebar(); ?>
</aside>
<div class="column eightcol last">
<?php } else if($layout=='right') { ?>
<div class="column eightcol">
<?php } else { ?>
<div class="fullwidth-section">
<?php } ?>
	<?php 
	while(have_posts()) {
	the_post();
	?>
	<article <?php post_class('post full-post'); ?>>
		<?php if(has_post_thumbnail()) { ?>
		<div class="post-featured-image">
			<div class="featured-image">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('wide'); ?></a>
			</div>
		</div>
		<?php } ?>
		<div class="post-content">
			<div class="section-title">
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			</div>
			<?php the_content(); ?>			
		</div>
		<footer class="post-footer clearfix">
			<?php if(comments_open()) { ?>
			<div class="post-comment-count"><?php comments_number('0','1','%'); ?></div>
			<?php } ?>
			<div class="post-info">
				<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(ThemexCore::getOption('date_format','m/d/Y')); ?></time>&nbsp;
				<?php _e('in','midway'); ?>&nbsp;
				<?php the_category(', '); ?>
			</div>
			<div class="post-tags"><?php the_tags('','',''); ?></div>
		</footer>
	</article>
	<?php comments_template(); ?>
	<?php } ?>
</div>
<?php if($layout=='right') { ?>
<aside class="column fourcol last">
<?php get_sidebar(); ?>
</aside>
<?php } ?>
<?php get_footer(); ?>