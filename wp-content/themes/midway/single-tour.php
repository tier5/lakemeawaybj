<?php get_header(); ?>
<?php the_post(); ?>
<?php get_template_part('content', 'tour-list'); ?>
<?php get_template_part('module', 'forms'); ?>
<?php the_content(); ?>
<?php get_template_part('module', 'related'); ?>
<?php get_footer(); ?>