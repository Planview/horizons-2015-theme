<?php

if ( ! defined('ACF_LITE') ) {
    define('ACF_LITE', true);
}
include_once get_template_directory() . '/vendor/advanced-custom-fields/acf.php';

/**
 * Shortcut function for the pathnames for custom fields files
 */
function horizons_2015_custom_fields($filename) {
    include_once get_template_directory() . "/custom-fields/$filename";
}
