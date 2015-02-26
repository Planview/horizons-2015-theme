<?php

function horizons_2015_page_country() {
    return horizons_2015_page_information( 'horizons_2015_page_location', get_queried_object_id() ) ?: null;
}

function horizons_2015_home_url() {
    if ( ! is_page() ) {
        return home_url( '/' );
    }
    return get_option( 'horizons_2015_home_' . horizons_2015_page_country() ) ?: home_url( '/' );
}
