<?php

/**
 * Do shortcodes in nav menu titles
 */
function horizons_2015_nav_shortcodes( $title ) {
    return do_shortcode( $title );
}

/**
 * Add the shortcodes filter at the beginning of the nav menu
 */
function horizons_2015_pre_wp_nav_menu( $val ) {
    add_filter( 'the_title', 'horizons_2015_nav_shortcodes', 1 );
    return $val;
}
add_filter( 'pre_wp_nav_menu', 'horizons_2015_pre_wp_nav_menu' );

/**
 * Remove the shortcodes filter after the menu
 */
function horizons_2015_wp_nav_menu( $val ) {
    remove_filter( 'the_title', 'horizons_2015_nav_shortcodes' );
    return $val;
}
add_filter( 'wp_nav_menu', 'horizons_2015_wp_nav_menu' );

/**
 * Add filter for the Social menu links to add some classes
 */
function horizons_2015_add_social_nav_filter( $args ) {
    if ( isset( $args['theme_location'] ) && 'social' === $args['theme_location'] ) {
        add_filter( 'nav_menu_link_attributes', 'horizons_2015_social_nav_class' );
        add_filter( 'wp_nav_menu', 'horizons_2015_remove_social_nav_filter', 1 );
    }

    return $args;
}
add_filter( 'wp_nav_menu_args', 'horizons_2015_add_social_nav_filter' );

/**
 * Add the classes to the social menu links
 */
function horizons_2015_social_nav_class( $atts ) {
    if ( isset( $atts['class'] ) ) {
        $atts['class'] .= ' social-link';
    } else {
        $atts['class'] = 'social-link';
    }

    return $atts;
}

/**
 * Remove the filter that added classes to the social menu
 */
function horizons_2015_remove_social_nav_filter( $val ) {
    remove_filter( 'nav_menu_link_attributes', 'horizons_2015_social_nav_class' );
    remove_filter( 'wp_nav_menu', 'horizons_2015_remove_social_nav_filter' );
    return $val;
}
