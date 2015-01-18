<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<a href="#" class="pull-left copyright">© Copyright. Todos los derechos reservados.</a>
		<div class="pull-right">
			<a href="https://www.facebook.com" class="rsociales"><img src="<?php bloginfo('url');?>/wp-content/uploads/2015/01/rfacebook.png"/></a>
			<a href="https://twitter.com/" class="rsociales"><img src="<?php bloginfo('url');?>/wp-content/uploads/2015/01/rtwitter.png"/></a>
			<a href="https://plus.google.com/" class="rsociales"><img src="<?php bloginfo('url');?>/wp-content/uploads/2015/01/rgoogleplus.png"/></a>
		</div>
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

<script>
	$(window).load(function() {
	    $(".flexslider").flexslider({
	        animation: "slide",
	    });
	});
</script>
</body>
</html>
