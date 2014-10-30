<?php
/**
 * The template used for displaying page content in page-static.php
 *
 * @package bladzijde
 */
?>
<?php if ( of_get_option( 'call_to_action_uploader' ) ) : ?>
<section class="call-to-action static-page-content" style="background: url('<?php echo of_get_option( 'call_to_action_uploader' ); ?>') no-repeat center center fixed;  background-size: cover; opacity: 0.9; ">
	<?php else : ?>
<section class="call-to-action static-page-content">
	<?php endif; ?>	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="front-page-wrap clear">
				<header class="entry-header static-page-title">
					<?php the_title( '<h1 id="call-to-action-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="call-to-action-content big-text clear">
					<?php 

						if ( has_post_thumbnail() ) :  ?>
						<?php if ( 'left' == of_get_option( 'example_select', 'left' ) ) { ?>

					<div class="post-thumbnail  <?php echo of_get_option( 'example_select', 'left' ); ?>">
						<?php the_post_thumbnail();?>
						</div>

						<div class="static-entry-content-thumbnail right">
							<div class="call-action-overlay">
								<?php the_content(); ?>
							</div>
						</div><!-- .entry-content -->

                    <?php } else { ?>
                      <div class="post-thumbnail right">
						<?php the_post_thumbnail();?>
						</div>

						<div class="static-entry-content-thumbnail left">
							<div class="call-action-overlay">
								<?php the_content(); ?>
							</div>
						</div><!-- .entry-content -->
                     <?php } ?><!-- end IF statment Left or Right Alignment -->

					 	<?php else : ?>

					 	<div class="static-entry-content">
							<div class="call-action-overlay">
								<?php the_content(); ?>
							</div>
						</div><!-- .entry-content -->
					 	<?php endif; ?> <!-- end IF statment Thumbnail -->
					 </div><!-- clear-->

				<footer class="entry-footer">
					<?php edit_post_link( __( 'Edit', 'bladzijde' ), '<span class="edit-link">', '</span>' ); ?>
				</footer><!-- .entry-footer -->
			</div><!-- .front-page-wrap -->
		</article><!-- #post-## -->
	</section><!-- #call-to-action -->