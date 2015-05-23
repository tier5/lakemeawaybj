<?php
/*
Template Name: Galleries
*/

get_header();

$GLOBALS['width']=ThemexCore::getOption('galleries_layout', 'three');
$GLOBALS['columns']=$GLOBALS['width']=='four'?3:4;
$GLOBALS['caption']=ThemexCore::getOption('galleries_caption', 'visible');
$GLOBALS['counter']=0;

echo category_description();
?>
<div class="items-grid">
	<?php 
	ThemexTour::queryGalleries();	
	while (have_posts()) {
		the_post();
		$GLOBALS['counter']++;
					//the_post_thumbnail();
		get_template_part('content', 'gallery');

		if($GLOBALS['counter']==$GLOBALS['columns']) {
			echo '<div class="clear"></div>';
			$GLOBALS['counter']=0;						
		}
	}
	 ?>
	
	
	<div class="clear"></div>
</div>

<?php ThemexInterface::renderPagination(); ?>
<?php get_footer(); ?>