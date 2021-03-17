<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package am_code_challenge
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container-fluid">
			<div class="row">
				<div class="offset-1 col-10">
					<?php

                    //declare variables
                    $id = $post->ID;

                    $download_url = get_post_meta($id, 'post_download_url');

                    $post_type = $post->post_type;

                    $taxonomies = get_object_taxonomies($post_type);

					while ( have_posts() ) :
						the_post();

                        if(has_post_thumbnail($id) ){
                            echo "<img src='".get_the_post_thumbnail_url()."' class='img-fluid mb-3'>";
                        }

                        if(get_the_title($id) ){
                            echo "<h1>".get_the_title($id)."</h1>";
                        }

                        if( !empty($taxonomies) ){
                            foreach($taxonomies as $taxonomy){

                                echo "<ul class='list-unstyled list-inline mb-2 ml-1'>";
                                echo "<li class='text-capitalize list-inline-item uppercase'><strong>".$taxonomy.": </strong></li>";

                                $terms = get_the_terms($id, $taxonomy);

                                if( !empty($terms) ) {
                                    foreach ($terms as $term){
                                        echo "<li class='list-inline-item'><a href=/".$term->name.">".$term->name."</a></li>";
                                    }
                                }

                                echo "</ul>";
                            }
                        }

                        echo "<p class='ml-1'>".get_the_date('F d, Y', $id )."</p>";

                        the_content();

						?>

						<div class="row">

						<?php
                        if( !empty($download_url) ){
                            echo "<div class='col-md-2 col-sm-2'><a class='mt-3 btn bg-red text-white' href='$download_url[0]'>Download Here</a></div>";
                        }
						?>
						<div clas="col-md-2 col-sm-2"><a class='mt-3 btn bg-red text-white' href='/resource'>Return to Resource List</a></div>
						</div>

						<?php

					endwhile; // End of the loop.
					?>
				</div>
			</div>
		</div>
	</main><!-- #main -->
