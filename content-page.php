<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Horizons 2015
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>
    <?php if ( ! get_field('horizons_2015_homepage_design') ) : ?>
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->
    <?php endif; ?>

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php edit_post_link( __( 'Edit', 'horizons-2015' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
