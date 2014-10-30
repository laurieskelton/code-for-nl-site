<?php
/**
 * Template Name: Blog Template
 *
 * @package bladzijde
 */

get_header(); ?>
<!--Blog Template Page -->
<!-- section id = #area1 -->
<div id="primary" class="content-area blog-page blog">
	<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', 'blog');
				?>

			<?php endwhile; ?>


		<?php else : ?>

			<?php get_template_part( 'content', 'blog'); ?>

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
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$the_cat = of_get_option( 'select_categories_blog', 'no entry' );
				$args = array(
								'cat' => $the_cat,
								'paged' => $paged,
							);
				$wp_query = new WP_Query(  $args );

				while ( $wp_query->have_posts() ) {
				$wp_query->the_post();


				?>

<!--Blog Post Content -->
<!-- section id can either begin with #area2 or #area3 depending on whether the fixed scroll image is enabled or not-->
<section class="blog-page-content category-content">
	<div class="front-page-wrap">
		<header class="entry-header">
			<a href="<?php the_permalink(); ?>"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>
				<div class="blog entry-meta">
					<?php bladzijde_posted_on(); ?>
				</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
		<div class="category-content-wrap clear">
					<?php 

						if ( has_post_thumbnail() ) :  ?>


					<div class="blog post-thumbnail">
						<?php the_post_thumbnail();?>
					</div>

						<div class="blog-entry-content blog">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<?php the_content(get_post_format()); ?>
							</article>
						</div><!-- .entry-content -->

                    <?php else : ?>

					 	<div class="blog-entry-content blog">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="clear">
									<?php the_content(get_post_format()); ?>
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
	
	<div class="pagination">
	  <?php bladzijde_paging_nav(); ?>
	</div>


	</main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>
<?php get_sidebar('footer'); ?>