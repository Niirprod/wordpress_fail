<?php

/**
 * Template Name: Front Page
 * @package million-shades
 * 
 */

get_header(); ?>


<div class="inner-content"> <!-- inner-container of page content area -->  

	<div id="primary" class="content-area"> <!-- primary area(except sidebar) of page content area -->  
	

		<main id="main" class="site-main" role="main"> <!-- main content of page -->  
			
			
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			
			
		</main><!-- main -->
	</div><!-- primary -->


	<?php get_sidebar(); ?>
</div><!-- primary -->
<?php get_footer(); ?>
