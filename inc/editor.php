<?php

/**
 * Functions for making TinyMCE play nice
 */
function horizons_2015_tinymce_styles() {
    add_editor_style( getenv('PV_AVENIR_CSS') );
    add_editor_style( 'css/editor.css' );
}
add_action( 'after_setup_theme', 'horizons_2015_tinymce_styles' );

/**
 * Make the editor play nice, because it wasn't before
 */
function horizons_2015_tinymce_settings_filter ( $settings ) {
    static $defaults = array();
    if ( empty($defaults) && $settings['selector'] === '#content' ) {
        $defaults = $settings;
        $opts = '*,*[*]';
        if ( ! isset( $defaults['valid_elements'] ) ) {
            $defaults['valid_elements'] = $opts;
        } else {
            $defaults['valid_elements'] .= ',' . $opts;
        }
    }
    if ( ! empty($defaults) ) {
        $selector = $settings['selector'];
        $settings = $defaults;
        $settings['selector'] = $selector;
    }
    return $settings;
}
add_filter( 'tiny_mce_before_init', 'horizons_2015_tinymce_settings_filter' );
