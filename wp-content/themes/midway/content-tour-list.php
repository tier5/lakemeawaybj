<?php $tour=ThemexTour::getTour($post->ID, true); ?>
<div class="full-tour clearfix">	
	<div class="<?php if(is_single()) { ?>sixcol<?php } else { ?>fivecol<?php } ?> column">		
		<div class="content-slider-container tour-slider-container">
			<?php if(is_single()) { ?>
			<div class="content-slider tour-slider">
				<?php if(!empty($tour['video_url'])) { ?>
				<div class="embedded-video">
					<?php echo wp_oembed_get($tour['video_url']); ?>
				</div>
				<?php } else { ?>
				<ul>
				<?php if(!empty($tour['images'])) { ?>
					<?php foreach($tour['images'] as $image) { ?>
					<li>
						<img src="<?php echo wp_get_attachment_url($image->ID); ?>" alt="" />
						<?php if($image->post_content) { ?>
						<div class="featured-image-caption visible-caption">
							<h4><?php echo strip_tags($image->post_content); ?></h4>
						</div>
						<?php } ?>
					</li>
					<?php } ?>
				<?php } else { ?>
					<li><?php the_post_thumbnail('extended'); ?></li>
				<?php } ?>
				</ul>
				<div class="arrow arrow-left content-slider-arrow"></div>
				<div class="arrow arrow-right content-slider-arrow"></div>
				<?php } ?>
				<input type="hidden" class="slider-speed" value="400" />
				<input type="hidden" class="slider-pause" value="0" />
			</div>
			<div class="block-background layer-1"></div>
			<div class="block-background layer-2"></div>
			<?php } else { ?>
			<div class="featured-image">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('extended'); ?></a>
			</div>
			<div class="block-background layer-2"></div>
			<?php } ?>
		</div>		
	</div>
	<div class="<?php if(is_single()) { ?>sixcol<?php } else { ?>sevencol<?php } ?> column last">
		<div class="section-title">
		<?php if(is_single()) { ?>			
			<h1><?php the_title(); ?></h1>
		<?php } else { ?>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php } ?>
		</div>
		<ul class="tour-meta">
		<?php if($tour['destination']) { ?>
			<li><div class="colored-icon icon-2"></div><strong><?php _e('Destination','midway'); ?>:</strong> <?php echo $tour['destination']; ?></li>
		<?php } ?>
		<?php if($tour['duration']) { ?>
			<li><div class="colored-icon icon-1"><span></span></div><strong><?php _e('Duration','midway'); ?>:</strong> <?php echo $tour['duration']; ?></li>
		<?php } ?>
		<?php if($tour['date_departure']) { ?>
			<li><div class="colored-icon icon-6"><span></span></div><strong><?php _e('Departs','midway'); ?>:</strong> <?php echo $tour['date_departure']; ?></li>
		<?php } ?>
		<?php if($tour['date_arrival']) { ?>
			<li><div class="colored-icon icon-7"><span></span></div><strong><?php _e('Arrives','midway'); ?>:</strong> <?php echo $tour['date_arrival']; ?></li>
		<?php } ?>
		<?php if($tour['price']) { ?>
			<li><div class="colored-icon icon-3"><span></span></div><strong><?php _e('Price','midway'); ?>:</strong> <?php echo $tour['price']; ?></li>
		<?php } ?>
		</ul>
		<?php if(is_single()) { ?>
			<?php the_excerpt(); ?>
		<?php } else { ?>
			<p><?php echo themex_sections(get_the_excerpt(), 1); ?></p>
		<?php } ?>
		<footer class="tour-footer">
		<?php if($tour['booking']!='0') { ?>
			<?php if($tour['booking_url']) { ?>
			<a target="_blank" href="<?php echo $tour['booking_url']; ?>" class="button small"><span><?php _e('Book Now','midway'); ?></span></a>
			<?php } else if(ThemexForm::isActive('booking')) { ?>
			<a href="#booking-form" data-id="<?php the_ID(); ?>" data-title="<?php the_title(); ?>" class="button small colorbox inline"><span><?php _e('Book Now','midway'); ?></span></a>
			<?php } ?>
		<?php } ?>
		<?php if(ThemexForm::isActive('question')) { ?>
			<a href="#question-form" data-id="<?php the_ID(); ?>" data-title="<?php the_title(); ?>" class="button grey small colorbox inline"><span><?php _e('Ask a Question','midway'); ?></span></a>
		<?php } ?>
		</footer>
	</div>
</div>