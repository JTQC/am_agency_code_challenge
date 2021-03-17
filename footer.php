<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package am_code_challenge
 */

?>

	<footer id="colophon" class="site-footer footer mt-5">
		<div class="container-fluid">
			<div class="row bg-red pt-5 pb-5 text-light">
				<div class="offset-1">
					<div class="site-info">
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'am-code-challenge' ) ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly powered by %s', 'am-code-challenge' ), 'WordPress' );
							?>
						</a>
						<span class="sep"> | </span>
							<?php
							/* translators: 1: Theme name, 2: Theme author. */
							printf( esc_html__( 'Theme: %1$s by %2$s.', 'am-code-challenge' ), 'am-code-challenge', '<a href="http://underscores.me/">Underscores.me</a>' );
							?>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
