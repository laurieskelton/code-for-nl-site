<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package bladzijde
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
			        <?php if ( 1 == of_get_option('footer_checkbox') ) { ?>  
                       <nav id="footer-navigation" class="footer-navigation clear" role="navigation">
			                <div class="footer-wrap clear">
			    				<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
			                </div> <!--footer wrap-->
						</nav><!-- #footer-navigation -->
                    <?php } else { ?>
                      
                     <?php } ?>
                     
		<div class="site-info clear">
			<?php if ( 1 == of_get_option('footer_text_checkbox') ) { ?> 
			 	<?php echo of_get_option( 'footer_text', 'no entry' ); ?>
			<?php } else { ?>

			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'bladzijde' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'bladzijde' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'bladzijde' ), 'bladzijde', 'L Skelton' ); ?>

			<?php } ?><!-- END Conditional Statment for Alternative Footer Text -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
