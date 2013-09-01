<?php
/**
 * The template for displaying all content.
 *
 * If there aren't any other templates present to
 * display content, it falls back to index.php
 *
 * @package required+ Foundation
 * @since required+ Foundation 0.1.0
 */

get_header(); ?>

	<!-- Row for main content area -->
	<div id="content" class="row">

		<div id="main" class="large-8 columns" role="main">

			<div class="post-box">
				
				<?php if( is_archive() ) : ?>
					<?php if ( have_posts() ) : ?>

						<?php
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							 *
							 * We reset this later so we can run the loop
							 * properly with a call to rewind_posts().
							 */
							the_post();
		
							/* Get the archive title for the specific archive we are
							 * dealing with.
							 */
							required_archive_title();
		
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();
						?>
		
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
		
							<?php
								/* Include the Post-Format-specific template for the content.
								 * If you want to overload this in a child theme then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'content', get_post_format() );
							?>
		
						<?php endwhile; ?>
		
					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
		
					<?php if ( function_exists( 'required_pagination' ) ) {
						required_pagination();
					} ?>

				<?php else : ?>

					<?php if ( have_posts() ) : ?>
		
						<?php while ( have_posts() ) : the_post(); ?>
		
							<?php get_template_part( 'content', get_post_format() ); ?>
		
						<?php endwhile; ?>
		
					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
		
					<?php if ( function_exists( 'required_pagination' ) ) {
							required_pagination();
						} 
					?>
				<?php endif; ?>
			</div>

		</div><!-- /#main -->

		
		<?php get_sidebar(); ?>
			

	</div><!-- End Content row -->

<?php get_footer(); ?>