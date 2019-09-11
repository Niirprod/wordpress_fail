<?php

/*

Template Name: Fullwidth with Page Header

*/

get_header(); ?>
<div class="page-content-header">
    <div class="inner-content">	    

	
	<div class="entry-header">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
	</div><!-- .entry-header -->
    </div>	
</div>

	<div id="primary" class="content-area fullwidth">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php
get_footer();
