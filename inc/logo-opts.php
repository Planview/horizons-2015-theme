<?php

function horizons_2015_admin_menu() {
    add_theme_page(
        __( 'Theme Options', 'horizons-2015' ),
        __( 'Options', 'horizons-2015' ),
        'edit_theme_options',
        'horizons-2015-opts',
        'horizons_2015_theme_opts_page'
    );
}
add_action( 'admin_menu', 'horizons_2015_admin_menu' );

function horizons_2015_register_settings() {
    add_settings_section( 'homepages', 'Homepage URLs', '__return_true', 'horizons-2015-opts' );
    register_setting( 'horizons-2015-opts', 'horizons_2015_home_austin', 'horizons_2015_url_sanitize' );
    register_setting( 'horizons-2015-opts', 'horizons_2015_home_london', 'horizons_2015_url_sanitize' );
    add_settings_field(
        'horizons_2015_home_austin',
        'Austin Home URL',
        'horizons_2015_opts_text',
        'horizons-2015-opts',
        'homepages',
        array(
            'name' => 'horizons_2015_home_austin',
            'label' => 'Homepage URL for Austin navigation',
            'label_for' => 'horizons_2015_home_austin'
        )
    );
    add_settings_field(
        'horizons_2015_home_london',
        'London Home URL',
        'horizons_2015_opts_text',
        'horizons-2015-opts',
        'homepages',
        array(
            'name' => 'horizons_2015_home_london',
            'label' => 'Homepage URL for London navigation',
            'label_for' => 'horizons_2015_home_london'
        )
    );
}
add_action( 'admin_init', 'horizons_2015_register_settings' );

function horizons_2015_theme_opts_page() {
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        wp_die( __( 'You do not have sufficent permissions to access this page' ) );
    }

    include get_template_directory() . '/admin/options.php';
}

function horizons_2015_url_sanitize( $val ) {
    return filter_var( $val, FILTER_VALIDATE_URL ) ? $val : '';
}

function horizons_2015_opts_text( $args ) {
    printf(
        '<input type="text" name="%1$s" id="%1$s" value="%2$s" placeholder="%3$s" class="regular-text">',
        esc_attr( $args['name'] ),
        esc_url( get_option( $args['name'], '' ) ),
        esc_attr( $args['label'] )
    );
}
