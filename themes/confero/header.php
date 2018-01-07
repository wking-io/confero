<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package johnsonKreis
 */

 $dark_theme = is_page('converse') ? 'theme--dark' : '';

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class($dark_theme); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'confero' ); ?></a>

	<header id="masthead" class="header flex items-end" role="banner">
		<div class="logo">
			<h1 class="logo--desktop"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Confero</a></h1>
			<h1 class="logo--mobile"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 59.47">
					<path d="M29.76 53.64a23.25 23.25 0 0 1-11.88-3.22A23.88 23.88 0 0 1 6 29.71a23.69 23.69 0 0 1 3.18-12 23.29 23.29 0 0 1 8.7-8.7 23.34 23.34 0 0 1 11.88-3.18A23.9 23.9 0 0 1 38 7.27a24.38 24.38 0 0 1 7.08 4.21l-1.13 1.33a22.75 22.75 0 0 0-6.57-3.91 21.84 21.84 0 0 0-7.61-1.33 22.11 22.11 0 0 0-19.07 11 22.39 22.39 0 0 0 0 22.18 21.9 21.9 0 0 0 8.06 8.1 21.75 21.75 0 0 0 19.1 1.41 22.15 22.15 0 0 0 6.94-4.44l1.2 1.34a24.07 24.07 0 0 1-7.48 4.78 23.07 23.07 0 0 1-8.76 1.7z"/>
					<path d="M42 52.14a24.65 24.65 0 0 1-6 2.39 25.49 25.49 0 0 1-6.28.79A24.62 24.62 0 0 1 17 51.89a25.65 25.65 0 0 1-9.31-9.31 24.9 24.9 0 0 1-3.41-12.82 25.32 25.32 0 0 1 3.43-12.87A25.91 25.91 0 0 1 17 7.54a25.42 25.42 0 0 1 29.12 2.64L48.87 7a30 30 0 0 0-5.74-3.82A30.66 30.66 0 0 0 36.55.8 29.63 29.63 0 0 0 14.88 4 29.76 29.76 0 0 0 4 14.84a28.79 28.79 0 0 0-4 14.87 29.53 29.53 0 0 0 14.84 25.74 29 29 0 0 0 14.92 4 28.89 28.89 0 0 0 20.24-8l-2.85-3.1A25.72 25.72 0 0 1 42 52.14z"/>
				</svg>
			</a></h1>
		</div><!-- .site-branding -->

		<nav class="main-navigation" role="navigation">
			<div class="nav__toggle">
				<button class="menu-toggle" aria-expanded="false">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu_class' => 'list-reset nav__menu__wrapper', 'container_class' => 'nav__menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
