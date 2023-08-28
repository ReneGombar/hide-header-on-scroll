<?php
// Activation hook
function hide_header_on_scroll_plugin_activate() {
    // create new table entry in options table
    $options = [];  
    $options['header_id'] = 'not set';
    $options['main_id'] = 'not set';
    $options['header_height'] = 100;
    $options['hide_after_scroll'] = 100;
    $options['animation_length'] = 1;

    add_option('hide_header_plugin_settings', $options);
}
register_activation_hook( HIDE_HEADER_PLUGIN_FOLDER , 'hide_header_on_scroll_plugin_activate');


// Deactivation hook
function hide_header_on_scroll_plugin_deactivate() {
    // delete entry from options table
    delete_option('hide_header_plugin_settings');
}
register_deactivation_hook( HIDE_HEADER_PLUGIN_FOLDER, 'hide_header_on_scroll_plugin_deactivate');
