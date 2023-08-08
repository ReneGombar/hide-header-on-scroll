<?php
function hide_header_on_scroll_plugin_settings_page(){
    add_submenu_page(
        'options-general.php',
        'Hide Header on Scroll',
        'Hide Header',
        'manage_options',
        'hideonscroll',
        'hide_header_on_scroll_plugin_settings_page_markup',
        'dashicons-welcome-learn-more',
        100
    );
}
add_action('admin_menu','hide_header_on_scroll_plugin_settings_page');


//template page of the plugin settings page
function hide_header_on_scroll_plugin_settings_page_markup(){
    //check user pirivileges
    if (!current_user_can('manage_options')){
        return;
    }
    // display Plugin Temaplate page
    // include ( HIDE_HEADER_PLUGIN_PATH .  'admin/templates/settings-page.php');    
    include ( HIDE_HEADER_PLUGIN_PATH .  'admin/templates/settings-page_2.php');    
}