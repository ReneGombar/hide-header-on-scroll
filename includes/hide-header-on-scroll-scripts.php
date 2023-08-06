<?php
// Enqueue scripts and styles
function hide_header_on_scroll_enqueue_front_end_scripts() {
    // Front-end Enqueue JavaScript
    // wp_enqueue_script(
    //     'hide-header-on-scroll-script',
    //     HIDE_HEADER_PLUGIN_URL . 'front-end/js/hide-header-on-scroll-front-end.js',
    //     [ 'wp-util' ],
    //     '1.0',
    //     true
    // );

    // Front-end Enqueue CSS
    wp_enqueue_style(
        'hide-header-on-scroll-style',
        HIDE_HEADER_PLUGIN_URL . 'front-end/css/hide-header-on-scroll-front-end.css',
        [],
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'hide_header_on_scroll_enqueue_front_end_scripts');


//Enqueue Admin styles and scripts
function hide_header_on_scroll_enqueue_admin_scripts(){
    //enqueue admin scripts
    wp_enqueue_script(
        'hide-header-on-scroll-script',
        HIDE_HEADER_PLUGIN_URL . 'admin/js/hide-header-on-scroll-admin.js',
        [],
        '1.0',
        true
    );
    
    // enqueue admin styles
    wp_enqueue_style(
        'hide-header-on-scroll-style',
        HIDE_HEADER_PLUGIN_URL . 'admin/css/hide-header-on-scroll-admin.css',
        [],
        time(),
    );
}
add_action('admin_enqueue_scripts', 'hide_header_on_scroll_enqueue_admin_scripts');
