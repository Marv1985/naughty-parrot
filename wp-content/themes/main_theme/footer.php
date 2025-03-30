<?php 
	$privacy_policy = esc_html(get_field('privacy_policy', 'option'));
	$terms_and_conditions = esc_html(get_field('terms_&_conditions', 'option'));
?>
			
			
			<footer class="footer" role="contentinfo">
				<?php get_template_part( 'template_parts/footer_text_slider'); ?>
				<?php get_template_part( 'template_parts/statistics'); ?>
				<?php get_template_part( 'template_parts/footer_form'); ?>

				<div class="small_print max_width">
					<p class="copyright">
						&copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?> 
					</p>
					<div class="page_links">
						<a href="<?php echo $privacy_policy; ?>">Privacy Policy</a>
						<a href="<?php echo $terms_and_conditions; ?>">Terms & Conditions</a>
					</div>
				</div>
				

			</footer>

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
