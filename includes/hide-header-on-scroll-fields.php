<?php
//setup plugin sections and fileds
function hide_header_plugin_settings(){

    //check if options exist in db
    if( !get_option('hide_header_plugin_settings')){
        add_option('hide_header_plugin_settings');
    }


    // First setup settings section
    add_settings_section(
        //unique name for the section
        'hide_header_plugin_settings_section',

        //section title
        __( 'Hide Header on Scroll Settings Section', 'hideonscroll' ),

        // callback for an optional decription
        'hide_header_plugin_settings_section_markup',

        //admin page to add section to
        'hideonscroll'
    );

    // Setup input for Header Element ID
    add_settings_field(
        //unique field name
        'hide_header_plugin_settings_header_id',

        //Field Title
        __('Header element ID','hideonscroll'),

        //callback for field markup
        'hide_header_plugin_header_id_field_markup',

        //page to go on
        'hideonscroll',

        //section to go in
        'hide_header_plugin_settings_section',

        //array with arguments
        array(
            'description' => __('ID of the header element. OceanWP default: "site-header"','hideonscroll')
        )
    );

    add_settings_field(
        //unique field name
        'hide_header_plugin_settings_main_id',

        //Field Title
        __('Main div element ID','hideonscroll'),

        //callback for field markup
        'hide_header_plugin_main_id_field_markup',

        //page to go on
        'hideonscroll',

        //section to go in
        'hide_header_plugin_settings_section',

        //array with arguments
        array(
            'description' => __('ID of the main div element. OceanWP default: "main"','hideonscroll')
        )
    );


    add_settings_field(
        //unique field name
        'hide_header_plugin_settings_header_height',

        //Field Title
        __('Height of the header (px)','hideonscroll'),

        //callback for field markup
        'hide_header_plugin_header_height_markup',

        //page to go on
        'hideonscroll',

        //section to go in
        'hide_header_plugin_settings_section',

        //array with arguments
        array(
            'description' => __('In OceanWP You can find this value in the page customizer > Header > General > Height(px)','hideonscroll')
        )
    );

    add_settings_field(
        //unique field name
        'hide_header_plugin_settings_hide_after_scroll',

        //Field Title
        __('Hide the Header after scrolled (px)','hideonscroll'),

        //callback for field markup
        'hide_header_plugin_hide_after_scroll_markup',

        //page to go on
        'hideonscroll',

        //section to go in
        'hide_header_plugin_settings_section',

        //array with arguments
        array(
            'description' => __('Amount of scroll in pixels when the header turns invisible. Preferably more than Header Height.','hideonscroll')
        )
    );

    add_settings_field(
        //unique field name
        'hide_header_plugin_settings_animation_length',

        //Field Title
        __('Animation length (seconds)','hideonscroll'),

        //callback for field markup
        'hide_header_plugin_animation_length_field_markup',

        //page to go on
        'hideonscroll',

        //section to go in
        'hide_header_plugin_settings_section',

        //array with arguments
        array(
            'description' => __('Length of the hiding animation from visible to invisible. default:1','hideonscroll')
        )
    );


    register_setting(
        'hide_header_plugin_settings',
        'hide_header_plugin_settings'
    );
}

add_action('admin_init','hide_header_plugin_settings');

//call the field templates
include( HIDE_HEADER_PLUGIN_PATH . '/admin/templates/hide-header-plugin-settings-markup.php');
