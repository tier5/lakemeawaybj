<?php 
ThemexTour::queryRelatedTours($post->ID);
if(have_posts()) {
?>
<div class="related-tours clearfix">
	<div class="section-title">
		<h1><?php _e('Related Tours','midway'); ?></h1>
	</div>
	<div class="items-grid">
	<?php	
	$GLOBALS['columns']=4;
	$GLOBALS['width']='three';
	$GLOBALS['counter']=0;

	while(have_posts()) {
		the_post();
		$GLOBALS['counter']++;
				
		get_template_part('content', 'tour-grid');

		if($GLOBALS['counter']==$GLOBALS['columns']) {
			echo '<div class="clear"></div>';
			$GLOBALS['counter']=0;		
		}
	}
	?>
	</div>
</div>
<!-- related tours -->
<?php } ?>