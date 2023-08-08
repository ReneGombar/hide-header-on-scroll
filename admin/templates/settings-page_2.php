<div class="wrap">
<div class="hide-header-container">
        <div class="center">
        
        <form action="options.php" method="post">
            <?php settings_fields('hide_header_plugin_settings'); ?>
            <?php do_settings_sections('hideonscroll'); ?>
            <?php submit_button(); ?>
            
        </form>
        <br/>
        
        <?php 
        $options = get_option('hide_header_plugin_settings');
        var_dump($options);
        ?>
        
        </div>
    </div>
</div>