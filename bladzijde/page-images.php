<?php
/**
 * Template Name: Mugshot Image Page Template
 *
 * @package bladzijde
 */

get_header(); ?>

	<div id="primary" class="content-area mugshot-page">
		<main id="main" class="site-main" role="main">
					<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', 'mugshot');
				?>

			<?php endwhile; ?>

			<?php bladzijde_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'mugshot'); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>