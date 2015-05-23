<?php
$query=new WP_Query(array(
	'post_type' =>'slide',
	'showposts' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'meta_key' => '_thumbnail_id',
));

if($query->have_posts()) {
?>
<div class="main-slider-container content-slider-container">
	<div class="content-slider main-slider">
		<ul>
			<?php
			while($query->have_posts()) {
				$query->the_post(); 
				get_template_part('content', 'slide');
			}
			?>				
		</ul>
		<div class="arrow arrow-left content-slider-arrow"></div>
		<div class="arrow arrow-right content-slider-arrow"></div>
		<input type="hidden" class="slider-pause" value="<?php echo ThemexCore::getOption('slider_pause', '0'); ?>" />
		<input type="hidden" class="slider-speed" value="<?php echo ThemexCore::getOption('slider_speed', '400'); ?>" />
		<input type="hidden" class="slider-effect" value="<?php echo ThemexCore::getOption('slider_type', 'fade'); ?>" />
	</div>
	<div class="block-background layer-1"></div>
	<div class="block-background layer-2"></div>
</div>
<?php } ?>