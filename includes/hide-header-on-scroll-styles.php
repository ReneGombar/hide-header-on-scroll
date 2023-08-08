<?php
// Enqueue Front-end styles
function hide_header_on_scroll_enqueue_front_end_styles() {
    // Front-end Enqueue CSS
    wp_register_style(
        'hide-header-on-scroll-frontend',
        HIDE_HEADER_PLUGIN_URL . 'front-end/css/hide-header-on-scroll-front-end.css',
        [],
        time()
    );

    //enqueue front end styles on all pages posts . . . 
    wp_enqueue_style('hide-header-on-scroll-frontend');
}
add_action('wp_enqueue_scripts', 'hide_header_on_scroll_enqueue_front_end_styles');


//Enqueue Admin styles
function hide_header_on_scroll_enqueue_admin_styles($hook){
    // register admin styles
    wp_register_style(
        'hide-header-on-scroll-admin',
        HIDE_HEADER_PLUGIN_URL . 'admin/css/hide-header-on-scroll-admin.css',
        [],
        time(),
    );

    // enqueue the style if on plugin admin page
    if( 'settings_page_hideonscroll' == $hook ){
        wp_enqueue_style( 'hide-header-on-scroll-admin' );
    }
}
add_action('admin_enqueue_scripts', 'hide_header_on_scroll_enqueue_admin_styles');
