<?php $tour=ThemexTour::getTour($post->ID); ?>
<div class="column <?php echo $GLOBALS['width']; ?>col <?php echo $GLOBALS['counter']==$GLOBALS['columns'] ? 'last':''; ?>">
	<div class="tour-thumb-container">
		<div class="tour-thumb">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('preview'); ?></a>
			<div class="tour-caption">
				<h5 class="tour-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				<?php if(!empty($tour['destination']) || !empty($tour['duration'])) { ?>
				<div class="tour-meta">
					<?php if($tour['destination']) { ?>
					<div class="tour-destination"><div class="colored-icon icon-2"></div><?php echo $tour['destination']; ?></div>
					<?php } ?>
					<?php if($tour['duration']) { ?>
					<div class="tour-duration"><?php echo $tour['duration']; ?></div>
					<?php } ?>
				</div>
				<?php } ?>
			</div>			
		</div>
		<div class="block-background"></div>
	</div>
</div>