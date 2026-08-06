<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package The_Golden_Dragon
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( '404 · Page not found.', 'kispa' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'The page may have moved, or the address may be incomplete.', 'kispa' ); ?></p>
			</div><!-- .page-content -->
			<a class="kispa-button kispa-button--red" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return Home', 'kispa' ); ?></a>
		</section><!-- .error-404 -->

	</main><!-- #main -->
<?php
get_footer();
?>
