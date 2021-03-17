<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package am_code_challenge
 */

?>

<div class="card mb-4">
	<div class="card-body">
		<h5 class="card-title"><?php the_title(); ?></h5>
		<h6 class="subtitle mb-2 text-muted"><?php echo get_the_date('F d, Y', $id )  ?></h6>
		<a href="<?php the_permalink(); ?>">Learn More</a>
	</div>
</div>
