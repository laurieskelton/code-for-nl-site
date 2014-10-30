<?php
/**
 * The template used for displaying page content in page-blog.php
 *
 * @package bladzijde
 */
?>
<!--Blog Template Content -->
<section class="sticky blog-template">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="front-page-wrap clear">
				<header class="entry-header blog-page-title">
					<?php the_title( '<h1 id="blog-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="blog-sticky-content clear">
					<?php 

						if ( has_post_thumbnail() ) :  ?>
						<?php if ( 'left' == of_get_option( 'example_select', 'left' ) ) { ?>

					<div class="post-thumbnail  <?php echo of_get_option( 'example_select', 'left' ); ?>">
						<?php the_post_thumbnail();?>
						</div>

						<div class="blog-thumbnail-content right">
								<?php the_content(); ?>
						</div><!-- .entry-content -->

                    <?php } else { ?>
                      <div class="post-thumbnail right">
						<?php the_post_thumbnail();?>
						</div>

						<div class="blog-thumbnail-content left">
								<?php the_content(); ?>
						</div><!-- .entry-content -->
                     <?php } ?><!-- end IF statment Left or Right Alignment -->

					 	<?php else : ?>

					 	<div class="blog-entry-content">
								<?php the_content(); ?>
						</div><!-- .entry-content -->
					 	<?php endif; ?> <!-- end IF statment Thumbnail -->
					 </div><!-- .blog-sticky-contentclear-->

				<footer class="entry-footer">
					<?php edit_post_link( __( 'Edit', 'bladzijde' ), '<span class="edit-link">', '</span>' ); ?>
				</footer><!-- .entry-footer -->
			</div><!-- .front-page-wrap -->
		</article><!-- #post-## -->
	</section><!-- #call-to-action -->