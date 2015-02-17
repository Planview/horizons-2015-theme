<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Horizons 2015
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function horizons_2015_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'horizons_2015_jetpack_setup' );
