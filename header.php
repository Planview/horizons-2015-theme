<?php
/**
* The header for our theme.
*
* Displays all of the <head> section and everything up till <div id="content">
*
* @package Horizons 2015
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="site-header navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container"><!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only"><?php _e('Toggle navigation', 'horizons_2015') ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand horizons" href="<?php echo home_url( '/' ); ?>"><span class="navbar-logo horizons"><?php bloginfo( 'name' ); ?></span></a>
            </div>
            <a href="http://planview.com" class="navbar-brand planview pull-right hidden-xs hidden-sm"><span class="planview navbar-logo"><?php _e('Planview', 'planview'); ?></span></a>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <?php wp_nav_menu( array(
                'theme_location' => horizons_2015_page_information( 'horizons_2015_page_location' ) ?: 'primary',
                'container' => 'nav',
                'container_class' => 'collapse navbar-collapse',
                'menu_class' => 'nav navbar-nav',
                'echo' => true,
                'fallback_cb' => false,
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new The_Bootstrap_Nav_Walker
            ) ); ?>
        </div>
    </header>

