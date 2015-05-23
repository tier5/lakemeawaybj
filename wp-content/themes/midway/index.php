<?php
if(is_tax(array('tour_type', 'tour_destination', 'tour_category')) || themex_search()) {
	get_template_part('template', 'tours');
} else if(is_tax('gallery_category')) {
	get_template_part('template', 'galleries');
} else {
	get_template_part('template', 'posts');
}
?>