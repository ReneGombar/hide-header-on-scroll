<?php
// Here we add , edit , read , delete the Plugin settings from the DB table

function hide_header_on_scroll_options (){

    $options = [
    ];  

    $options['header_height'] = 100;
    $options['hide_at_scrollY'] = 100;
    $options['hide_animation_duration'] = 1;

    $options['header_id'] = '#site-header';
    $options['main_div_id'] = '#main';


    if (!get_option('hide_header_on_scroll_options')){
        
        // add the options to the table if not already in table   
        add_option('hide_header_on_scroll_option', $options);
    }

    // update the table
    update_option('hide_header_on_scroll_option', $options);

    //remove option from table
    //delete_option('hide_header');
}

add_action('admin_init','hide_header_on_scroll_options');


