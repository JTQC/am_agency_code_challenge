<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package am_code_challenge
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="container">
			<div class="row">
				<div class="col-8">
					<?php
					while ( have_posts() ) :
						the_post();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>
				<div class="col-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>

	</main><!-- #main -->

<?php

get_footer();
