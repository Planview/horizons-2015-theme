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
