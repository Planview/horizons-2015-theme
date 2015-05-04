<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Horizons 2015
 */
?>

        <footer class="site-footer">
            <div class="container">
                <?php wp_nav_menu( array(
                    'theme_location' => 'social',
                    'container' => 'nav',
                    'container_class' => 'social-nav',
                    'menu_class' => 'list-inline',
                    'fallback_cb' => false,
                    'depth' => 1
                ) ); ?>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="copyright"><?php printf(
                            __('&copy; Copyright %s Planview Horizons Customer Conference', 'horizons_2015'),
                            date('Y')
                        ); ?></p>
                    </div>
                    <div class="col-sm-6">
                        <?php echo str_lreplace(
                            '</li><li class="divider">|',
                            '',
                            wp_nav_menu( array(
                                'echo' => false,
                                'theme_location' => 'switcher',
                                'container' => 'nav',
                                'container_class' => 'switcher',
                                'menu_class' => 'list-inline text-right',
                                'fallback_cb' => false,
                                'after' => '</li><li class="divider">|',
                                'depth' => 1,
                            ) )
                        ); ?>
                    </div>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>

    </body>
</html>
