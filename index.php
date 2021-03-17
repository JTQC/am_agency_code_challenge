<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
				<div class="col-12">
					<div class="text-holder">
						<ul class="list-unstyled">
							<li class="h1"><a href="/resource/sample-resource-one/">Sample Single Resource</a></li>
							<li class="h1"><a href="/resource">Sample Resource Index</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</main>
