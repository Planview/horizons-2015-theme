<?php

/**
 * Do the page header classes
 */
function horizons_2015_page_header_classes(array $classes) {
     $classes = apply_filters( 'horizons_2015_page_header_classes', $classes );

     echo esc_attr( implode(' ', $classes) );
}

/**
 * Get into the loop for a moment if it's a page, and get a custom field
 */
function horizons_2015_page_information( $field ) {
    if ( ! is_page() ) return null;

    $page_id = get_queried_object_id();

    return get_field( $field, $page_id );
}

/**
 * Add more classes to the header
 */
function horizons_2015_page_header_classes_settable( $classes ) {
    $classes[] = horizons_2015_page_information( 'horizons_2015_page_location' );

    if ( horizons_2015_page_information( 'horizons_2015_homepage_design' ) ) {
        $classes[] = 'home';
    }

    return $classes;
}
add_filter( 'horizons_2015_page_header_classes', 'horizons_2015_page_header_classes_settable' );
