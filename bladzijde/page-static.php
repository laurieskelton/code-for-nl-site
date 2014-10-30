<?php
/**
 * Template Name: Category Page Template for Static Front Page 
 *
 * @package bladzijde
 */

get_header(); ?>

<!-- section id = #area1 -->
<div id="primary" class="content-area static-page">
	<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', 'static');
				?>

			<?php endwhile; ?>

			<?php bladzijde_paging_nav(); ?>

	<?php if ( of_get_option( 'fixed_image_uploader' ) ) : ?>
	<!-- section id = #area2 -->
	<section class="scroll-section">
		<div class="fixed-image-scroll" style="background: url('<?php echo of_get_option( 'fixed_image_uploader' ); ?>') no-repeat center center fixed;  background-size: cover; ">
			<article class="box-fixed-image">
				<div class="blurb">
					<?php 
					
					$key="blurb"; 

					echo '<blockquote id="the-blurb-sytles">'. get_post_meta($post->ID, $key, true).'</blockquote>';

					?>
				</div>
			</article>
		</div>
	</section>
	<?php else : ?>
	 		
	<?php endif; ?>
	<!-- END section id= area2-->

		<?php else : ?>

			<?php get_template_part( 'content', 'static'); ?>

		<?php endif; 
		/* Restore original Post Data 
 * NB: Because we are using new WP_Query we aren't stomping on the 
 * original $wp_query and it does not need to be reset with 
 * wp_reset_query(). We just need to set the post data back up with
 * wp_reset_postdata().
 */
		wp_reset_postdata();
		?>



<?php
			
			//get the category content
				$the_cat = of_get_option( 'select_categories', 'no entry' );
				$args = array(
								'cat' => $the_cat,
							);
				$query = new WP_Query(  $args );

				while ( $query->have_posts() ) {
				$query->the_post();

				?>


<!-- section id can either begin with #area2 or #area3 depending on whether the fixed scroll image is enabled or not-->
<section class="static-page-content category-content">
	<div class="front-page-wrap">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<div class="category-content-wrap clear">
					<?php 

						if ( has_post_thumbnail() ) :  ?>

					<?php if ( 'left' == of_get_option( 'example_select', 'left' ) ) { ?>

					<div class="post-thumbnail  <?php echo of_get_option( 'example_select', 'left' ); ?>">
						<?php the_post_thumbnail();?>
						</div>

						<div class="static-entry-content-thumbnail right">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<?php the_content(); ?>
							</article>
						</div><!-- .entry-content -->

                    <?php } else { ?>
                      <div class="post-thumbnail right">
						<?php the_post_thumbnail();?>
						</div>

						<div class="static-entry-content-thumbnail left">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<?php the_content(); ?>
							</article>
						</div><!-- .entry-content -->
                     <?php } ?><!-- end IF statment Left or Right Alignment -->

					 	<?php else : ?>

					 	<div class="static-entry-content">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="clear">
									<?php the_content(); ?>
								</div>
							</article>
						</div><!-- .entry-content -->
					 	<?php endif; ?> <!-- end IF statment Thumbnail -->

		</div><!-- .category-content-wrap -->
	</div><!-- .front-page-wrap -->
</section><!-- .category-content -->
				
<?php }
/* Restore original Post Data 
 * NB: Because we are using new WP_Query we aren't stomping on the 
 * original $wp_query and it does not need to be reset with 
 * wp_reset_query(). We just need to set the post data back up with
 * wp_reset_postdata().
 */
wp_reset_postdata(); ?>



	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
<?php get_sidebar('footer'); ?>