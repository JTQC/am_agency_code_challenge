<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package am_code_challenge
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'am-code-challenge' ); ?></a>

	<header id="masthead" class="site-header mb-5 bg-dark-blue pt-3 pb-3 ">
		<div class="container-fluid">
			<div class="row ml-5">
				<div class="col-12">
					<div class="site-branding row">
						<div class="logo col-8"><a class="text-white" href="/">am_agency_code_challenge</a></div>						
					</div><!-- .site-branding -->
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
