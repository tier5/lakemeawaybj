				<?php if(is_active_sidebar('footer')) { ?>
				<div class="clear"></div>
				<div class="footer-widgets clearfix">
					<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer')) ?>
				</div>
				<?php } ?>
			</div>		
		</section>
		<!-- content -->
		<footer class="container site-footer">		
			<div class="row">
				<div class="footer-left">
				  <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-left')) ?>
				</div>
				<div class="footer-right">
				<?php wp_nav_menu(array('theme_location' => 'footer_menu', 'container_class' => 'menu')); ?>
				<div class="copyright">
					<?php echo themex_get_string('copyright', 'option', ThemexCore::getOption('copyright', 'Midway Theme &copy; '.date('Y'))); ?>
					</div>
				</div>
			</div>
		</footer>
		<!-- footer -->
		<div class="substrate bottom-substrate">
			<?php ThemexStyle::renderBackground(); ?>
		</div>
	</div>
<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43004535-10', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>