<?php

// Enqueue Front-end scripts
function hide_header_on_scroll_enqueue_front_end_scripts() {
    
    wp_register_script('hide-header-on-scroll-frontend',
        HIDE_HEADER_PLUGIN_URL . 'front-end/js/hide-header-on-scroll-front-end.js',
        [],
        '1.0',
        true
    );

    wp_enqueue_script('hide-header-on-scroll-frontend');
    
    $settings = get_option('hide_header_plugin_settings');
    $settings['logged_in'] = is_user_logged_in();

    //provide variables to the front end script
    wp_add_inline_script( 'hide-header-on-scroll-frontend', 'const settings = ' . json_encode( $settings ), 'before' );
}

add_action('wp', 'hide_header_on_scroll_enqueue_front_end_scripts');


//Enqueue Admin scripts
function hide_header_on_scroll_enqueue_admin_scripts(){
    //enqueue admin scripts NONE SO FAR
    wp_enqueue_script(
        'hide-header-on-scroll-script',
        HIDE_HEADER_PLUGIN_URL . 'admin/js/hide-header-on-scroll-admin.js',
        [],
        '1.0',
        true
    );
    
}
// add_action('admin_enqueue_scripts', 'hide_header_on_scroll_enqueue_admin_scripts');