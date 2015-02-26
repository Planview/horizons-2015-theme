<div class="wrap">
    <h2>Theme Options</h2>

    <form action="<?php echo admin_url( 'options.php' ); ?>" method="post">
        <?php settings_fields( 'horizons-2015-opts' ); ?>
            <?php do_settings_sections( 'horizons-2015-opts' ); ?>
        <?php submit_button(); ?>
    </form>
</div> <!-- .wrap -->
