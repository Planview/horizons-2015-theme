<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Horizons 2015
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function horizons_2015_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'horizons_2015_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function horizons_2015_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'horizons-2015' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'horizons_2015_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function horizons_2015_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'horizons_2015_render_title' );
endif;

/**
 * Polyfills for IE8
 */
function horizons_2015_ie_polyfills() { ?>
<!--[if lte IE 8]>
    <style>.bg-size{-ms-behavior:url('<?php echo get_template_directory_uri() . '/bower_components/background-size-polyfill/backgroundsize.min.htc' ?>')}</style>
    <script src="<?php echo get_template_directory_uri() . '/bower_components/respond/dest/respond.min.js' ?>"></script>
<![endif]-->
<?php }
add_action( 'wp_head', 'horizons_2015_ie_polyfills', 60 );

/**
 * Replace the last occurrance of a string
 *
 * from http://stackoverflow.com/questions/3835636/php-replace-last-occurence-of-a-string-in-a-string
 */
function str_lreplace($search, $replace, $subject)
{
    $pos = strrpos($subject, $search);

    if($pos !== false)
    {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }

    return $subject;
}

/**
 * Add some classes to the edit post link
 */
function horizons_2015_edit_post_link( $link ) {
    return preg_replace(
        '/(<a [^>]*class=([\'"]))([^\'"]*)([^>]*)/',
        '$1$3 label label-danger$4',
        $link
    );
}
add_filter( 'edit_post_link', 'horizons_2015_edit_post_link' );
