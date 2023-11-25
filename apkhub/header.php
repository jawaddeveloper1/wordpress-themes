<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package APK_Hub
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
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'apkhub' ); ?></a>
	
	<!-- Header -->
	<div class="header-container">
		<header class="apkhub-header">
				<!-- Site Branding -->
				<div class="site-branding">
					<?php the_custom_logo(); 
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					?>
				</div>
			
				<!-- Navigation -->
				<nav class="apkhub-navigation">
					<div class="apkhub-hamburger">
						<span class="apkhub-mobilemenu-bar"></span>
						<span class="apkhub-mobilemenu-bar"></span>
						<span class="apkhub-mobilemenu-bar"></span>
            		</div>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav>
		</header>
		<div class="apkhub-nav-overlay">

		</div>
	</div>
	<div class="main-container">
