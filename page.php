<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Horizons 2015
 */

get_header(); ?>

    <main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <header class="<?php horizons_2015_page_header_classes( ['jumbotron', 'jumbo-header'] ); ?>" data-stellar-background-ratio="0.5">
                <div class="container text-center jumbo-content">
                    <?php the_field( 'horizons_2015_jumbotron_content' ); ?>
                </div>
            </header>

            <?php get_template_part( 'content', 'page' ); ?>

        <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
