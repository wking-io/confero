<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package johnsonKreis
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="footer flex items-center" role="contentinfo">
		<div class="footer__info flex">
			<p class="footer__info__item">404.585.8025</p>
			<p class="footer__info__item"><a href="emailto:hello@christopherconfero.com">hello@christopherconfero.com</a></p>
		</div>

		<?php if ( is_active_sidebar( 'social-widget-area' ) ) : ?>
			<div class="footer__social social-links flex">
				<?php dynamic_sidebar( 'social-widget-area' ); ?>
			</div>
		<?php endif; ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
