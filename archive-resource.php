<?php
/* Template Name: Resource Search Template */
//=== AM CODE CHALLENGE ARCHIVE PAGE ===

//init variable

$paged = ( get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;

$the_query = new WP_Query(array(
	'post_type' => 'resource',
	'posts_per_page' => 10,
	'paged' 	=> $paged,
	'orderby' => 'menu_order',
	'order' => 'desc',
));

$taxonomies = get_object_taxonomies('resource');

get_header();

?>

	<main id="primary" class="site-main">
        <div class="container">
			<div class="row">
				<div class="col-12">

					<div class="card mb-5">

						<div class="card-body">

							<h2 class="card-title">
								Filter Resources
							</h2>

							<div class="flex w-100  row mt-4">
								<div class="col-12 mb-4">
									<?php get_search_form(); ?>
								</div>
							</div>

							<div class="row mb-4">
								<?php
									foreach($taxonomies as $taxonomy) {
										?>
										<div class="col">
											<label for="<?php echo $taxonomy; ?>" class="h5">Filter by <?php echo ucfirst($taxonomy) ?></label>
											<select class="form-control" onchange="filterFunction(this)" name="<?php echo $taxonomy; ?>" id="<?php echo $taxonomy; ?>">
												<?php
													$terms = get_terms(
														array(
															'taxonomy' => $taxonomy,
															'hide_empty' => false
														)
													);

													foreach($terms as $term){
														?>
														<option data-tax="<?php echo $taxonomy; ?>" value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>

														<?php
													}
												?>
											</select>
										</div>
										<?php
									}
								?>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-10 offset-1">
					<?php
					if($the_query->have_posts() ) :
                        ?>
                        <div class="resource-list">
                            <?php
                            while ($the_query->have_posts() ) : $the_query->the_post();
    						?>
    						<div class="card mb-4">
    							<div class="card-body">
    								<h5 class="card-title"><?php the_title(); ?></h5>
    								<h6 class="subtitle mb-2 text-muted"><?php echo get_the_date('F d, Y', $id )  ?></h6>
    								<a href="<?php the_permalink(); ?>">Learn More</a>
    							</div>
    						</div>
    						<?php
    						endwhile;
							?>
							<ul class="pagination">
							    <?php
							        echo paginate_links( array(
							            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
							            'total'        => $the_query->max_num_pages,
							            'current'      => max( 1, get_query_var( 'paged' ) ),
							            'format'       => '?paged=%#%',
							            'show_all'     => false,
							            'type'         => 'plain',
							            'end_size'     => 2,
							            'mid_size'     => 1,
							            'prev_next'    => false,
							            'add_args'     => false,
							            'add_fragment' => '',
										'before_page_number' => '<li class="page-item mr-2"> ',
										'after_page_number' => ' </li>'
							        ) );
							    ?>
							</ul>
							<?php
                            wp_reset_postdata();
                            ?>
                        </div>
                        <?php
					endif;
					 ?>
				</div>
			</div>
        </div>
	</main><!-- #main -->

<script type="text/javascript">
    function filterFunction(val){
        jQuery.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        dataType: 'html',
        data: {
          action: 'am_filter_resources',
          taxvalue: jQuery(val).attr('id'),
          termvalue: jQuery(val).val()
        },
        success: function(res) {
          jQuery('.resource-list').html(res);
        }
      })
    }
</script>
