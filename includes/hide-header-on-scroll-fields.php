<?php
function hide_header_plugin_settings(){

    if( !get_option('hide_header_plugin_settings')){
        add_option('hide_header_plugin_settings');
    }

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

    add_settings_field(
        //unique field name
        'hide_header_plugin_settings_header_height',

        //Field Title
        __('Height of the header (pixels)','hideonscroll'),

        //callback for field markup
        'hide_header_plugin_header_height_markup',

        //page to go on
        'hideonscroll',

        //section to go in
        'hide_header_plugin_settings_section',

        //array with arguments
        array(
            'description' => __('You can find this value in the page customizer > Header > General > Height(px)','hideonscroll')
        )
    );

    add_settings_field(
        //unique field name
        'hide_header_plugin_settings_hide_at_height',

        //Field Title
        __('Hide the Header when scrolled (pixels)','hideonscroll'),

        //callback for field markup
        'hide_header_plugin_hide_at_height_field_markup',

        //page to go on
        'hideonscroll',

        //section to go in
        'hide_header_plugin_settings_section',

        //array with arguments
        array(
            'description' => __('Amount of scroll when the header turns invisible.','hideonscroll')
        )
    );


    register_setting(
        'hide_header_plugin_settings',
        'hide_header_plugin_settings'
    );
}

add_action('admin_init','hide_header_plugin_settings');

//call the field templates
include( HIDE_HEADER_PLUGIN_PATH . '/admin/templates/hide-header-plugin-settings-text-input.php');
