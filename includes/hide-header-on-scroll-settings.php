<?php 

//add settings link to the plugin in the plugin listings page
function hide_header_on_scroll_add_settings_link($links){
    $settings_link= '<a href="admin.php?page=hideonscroll">' . __('Settings','hideonscroll') . '</a>';
    array_push($links, $settings_link);
    return ( $links);
}

$filter_name = 'plugin_action_links_' . HIDE_HEADER_PLUGIN_BASENAME;

add_filter($filter_name, 'hide_header_on_scroll_add_settings_link');