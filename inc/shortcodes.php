<?php

/**
 * FontAwesome shortcode
 */
function horizons_2015_fa_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'class' => 'fa-circle'
    ), $atts );
    return sprintf('<span class="fa %s"></span>', $atts['class']);
}
add_shortcode( 'fa','horizons_2015_fa_shortcode' );

/**
 * Vis classes on text in navbar
 */
function horizons_2015_bootstrap_visibility( $atts, $content ) {
    $atts = shortcode_atts( array(
        'show' => '',
        'hide' => ''
    ), $atts );
    $classes = array();
    foreach (explode(',', $atts['show']) as $size) {
        $size = trim($size);
        $classes[] = "visible-$size";
    }
    foreach (explode(',', $atts['hide']) as $size) {
        $size = trim($size);
        $classes[] = "hidden-$size";
    }
    return sprintf('<span class="%s">%s</span>', implode(' ', $classes), $content);
}
add_shortcode( 'bs-vis','horizons_2015_bootstrap_visibility' );

/**
 * Screenreader shortcode
 */
function horizons_2015_sr_shortcode( $atts, $content ) {
    return sprintf('<span class="sr-only">%s</span>', $content);
}
add_shortcode( 'sr-only','horizons_2015_sr_shortcode' );
