<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package jordan
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700,400italic' rel='stylesheet' type='text/css'>
<link rel="icon" href="http://www.jordanisadore.com/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="http://www.jordanisadore.com/favicon.ico" type="image/x-icon" />
<?php wp_head(); ?>
</head>

<body>

<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php //show title or Header image
			if ( get_header_image() ) {
				echo '<a href="'. home_url() .'"><img alt="'. esc_attr( get_bloginfo( 'name' ) ) .'" title="'. esc_attr( get_bloginfo( 'name' ) ) .'" class="header-image" src="' . esc_url( get_header_image() ) . '" /></a>';
			} else { ?>
				<h1 class="site-title"><a title="<?php bloginfo( 'name' ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php } ?>

			<?php if ( get_bloginfo( 'description' ) ) { ?>
				<h2 class="description">
					<?php bloginfo( 'description' ); ?>
				</h2>
			<?php } ?>
			</div>

	  	<?php if ( has_nav_menu( 'primary' ) ) { ?>


			<nav id="site-navigation" class="main-navigation" role="navigation">

				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

			</nav><!-- #site-navigation -->


		<div class="menu-mobile">
			<div class="site-branding-mobile">
						<?php //show title or Header image
						if ( get_header_image() ) {
							echo '<a href="'. home_url() .'"><img alt="'. esc_attr( get_bloginfo( 'name' ) ) .'" title="'. esc_attr( get_bloginfo( 'name' ) ) .'" class="header-image" src="' . esc_url( get_header_image() ) . '" /></a>';
						} else { ?>
							<h1 class="site-title"><a title="<?php bloginfo( 'name' ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php } ?>

			</div>

	  				<div id="menu-toggle">
	  					<i class="fa fa-bars"></i>
   					</div>

	  				<nav id="site-navigation-mobile" class="main-navigation" role="navigation">

						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

					</nav><!-- #site-navigation-mobile -->

					<?php if ( get_bloginfo( 'description' ) ) { ?>
				<h2 class="description">
					<?php bloginfo( 'description' ); ?>
				</h2>
			<?php } ?>


	  	</div>

		<?php } ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
