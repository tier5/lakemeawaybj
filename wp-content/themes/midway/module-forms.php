<div class="hidden">
	<div class="booking-form popup-form" id="booking-form">
		<div class="section-title popup-title"><h4></h4></div>
		<form action="<?php echo AJAX_URL; ?>" method="POST" class="formatted-form ajax-form">			
			<?php ThemexForm::renderData('booking', 'submit'); ?>
			<input type="hidden" name="id" value="" class="popup-id" />
			<input type="hidden" name="slug" value="booking" />
			<input type="hidden" class="action" value="<?php echo THEMEX_PREFIX; ?>form_submit" />
			<a class="submit-button button" href="#"><?php _e('Submit', 'midway'); ?></a>
		</form>
	</div>
	<!-- booking form -->
	<div class="question-form popup-form" id="question-form">
		<div class="section-title popup-title"><h4></h4></div>
		<form action="<?php echo AJAX_URL; ?>" method="POST" class="formatted-form ajax-form">
			<?php ThemexForm::renderData('question', 'submit'); ?>
			<input type="hidden" name="id" value="" class="popup-id" />
			<input type="hidden" name="slug" value="question" />
			<input type="hidden" class="action" value="<?php echo THEMEX_PREFIX; ?>form_submit" />
			<a class="submit-button button" href="#"><?php _e('Submit', 'midway'); ?></a>
		</form>
	</div>
	<!-- question form -->
</div>