<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package brainstormtech
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
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'brainstormtech' ); ?></a>

	<header id="header" class="site-header">
        <div class="container-fluid">
            <div class="header-areas flex fac fjb">

<!--                <div class="logo-nav flex fac">-->
                    <div class="logo tac trans">
                        <?php the_custom_logo(); ?>
                    </div>

                    <nav id="menu-nav" class="main-navigation trans flex fac">
<!--                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">--><?php //esc_html_e( 'Primary Menu', 'brainstormtech' ); ?><!--</button>-->
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                            )
                        );
                        ?>
                    </nav><!-- #site-navigation -->
<!--                </div>-->

                <div class="light-dark-mood">
                    <input type="checkbox" id="toggle">
                </div>

            </div>
        </div>
    </header><!-- #masthead -->
    <main id="primary" class="site-main">

