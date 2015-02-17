<?php

function horizons_2015_page_country() {
    if ( in_the_loop() ) {
        return get_field('horizons_page_country');
    } else {
        the_post();
        $country = get_field('horizons_page_country');
        rewind_posts();

        return $country;
    }
}
