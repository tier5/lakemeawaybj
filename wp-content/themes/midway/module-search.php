<div class="tour-search-form placeholder-form">
	<div class="form-title">
		<h4><?php _e('Search Our Properties', 'midway'); ?></h4>
	</div>
	<form role="search" method="get" action="<?php echo SITE_URL; ?>/tour-search-results/">
		<?php if(!ThemexCore::checkOption('search_destination')) { ?>
		<div class="select-field">
			<span><?php _e('All Destinations','midway'); ?></span>
			<?php 
			wp_dropdown_categories( array(
				'taxonomy' => 'tour_destination', 
				'name' => 'destination', 
				'id' => 'destination', 
				'hierarchical' => 1,
				'orderby' => 'title',
				'show_option_all' => __('All Destinations','midway'), 
				'selected' => isset($_GET['destination'])?$_GET['destination']:'',
			)); 
			?>
		</div>
		<?php } ?>
		<?php if(!ThemexCore::checkOption('search_type')) { ?>
		<div class="select-field">
			<span><?php _e('All Types','midway'); ?></span>
			<?php
			wp_dropdown_categories( array(
				'taxonomy' => 'tour_type', 
				'name' => 'type', 
				'id' => 'type', 
				'hierarchical' => 1,
				'orderby' => 'title',
				'show_option_all' => __('All Types','midway'), 
				'selected' => isset($_GET['type'])?$_GET['type']:'',
			));
			?>
		</div>
		<?php } ?>
		<?php if(!ThemexCore::checkOption('search_date')) { ?>
		<div class="field-container">
			<input type="text" name="date_dep" class="date-field" value="<?php echo isset($_GET['date_dep'])?$_GET['date_dep']:__('Departure Date', 'midway'); ?>" />
		</div>
		<div class="field-container">
			<input type="text" name="date_arr" class="date-field reverse" value="<?php echo isset($_GET['date_arr'])?$_GET['date_arr']:__('Arrival Date', 'midway'); ?>" />
		</div>
		<?php } ?>
		<?php ThemexForm::renderData('search', 'search', $_GET); ?>
		<?php if(!ThemexCore::checkOption('search_price')) { ?>
		<div class="range-slider">
			<div class="range-min"><?php echo ThemexTour::getPrice(0, '<span>', '</span>'); ?></div>
			<div class="range-max"><?php echo ThemexTour::getPrice(0, '<span>', '</span>'); ?></div>
			<div class="ui-slider"></div>
			<input type="hidden" name="price_min" value="<?php echo isset($_GET['price_min'])?$_GET['price_min']:'0'; ?>" class="range-min" />
			<input type="hidden" name="price_max" value="<?php echo isset($_GET['price_max'])?$_GET['price_max']:'0'; ?>" class="range-max" />
			<input type="hidden" value="<?php echo ThemexTour::getMarginalPrice(); ?>" class="range-min-value" />
			<input type="hidden" value="<?php echo ThemexTour::getMarginalPrice(true); ?>" class="range-max-value" />
		</div>
		<?php } ?>
		<div class="form-button">
			<div class="button-container">
				<a href="#" class="button submit-button"><?php _e('Search Now','midway'); ?></a>
			</div>
		</div>
		<input type="hidden" name="s" value="" />
	</form>
</div>
<!-- tour search form -->