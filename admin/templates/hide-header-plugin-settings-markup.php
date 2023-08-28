<?php 

//section markup
function hide_header_plugin_settings_section_markup(){
    echo '<p class="warning">' . esc_html( 'Plugin does not support TOP-BAR !!!','hideonscroll' ) .'</p>';
    esc_html_e( 'Setup Steps:','hideonscroll' );
    echo '<ol >';
        echo '<li>'. esc_html('Enter the Header element id. Default for OceanWP is "site-header". You can find this information by opening your site in the browser and using the browser inspector element tab.','hideonscroll') .'</li>';
        echo '<li>'. esc_html('Enter the Main Div element id. Default for OceanWP is "main". You can find this information by opening your site in the browser and using the browser inspector element tab.','hideonscroll') .'</li>';
        echo '<li>'. esc_html('Change the Height of the header to match your needs. For OceanWP you can find this information in Page Customizer > Header > General > Height (px). For other Themes you can use the browsers element inspector, which will display the selected elements height','hideonscroll') .'</li>';
        echo '<li>'. esc_html('Set the amount of scroll when the header turns invisible in pixels. Preferably more than the Header Height.','hideonscroll') .'</li>';
        echo '<li>'. esc_html('Set the duration of the fade in/out animation of the header in seconds.','hideonscroll') .'</li>';
    
    echo '</ol>';
    
}   

//Detect elements cjebox markup
/*function hide_header_plugin_detect_checkbox_field_markup($args)
{   
    
    $options = get_option('hide_header_plugin_settings');
    
    if (isset ($options['detect_checkbox'])){
        $detect_checkbox = esc_html($options['detect_checkbox']);
    }
    else{
        $detect_checkbox = 0;
    }
    $html = '<input type="checkbox" id="hide_header_plugin_detect_checkbox" name="hide_header_plugin_settings[detect_checkbox]"';
    $html .= 'value="1" ' .checked(1, $detect_checkbox, false) . '/>';
    echo $html;
    echo '<label for="hide_header_plugin_detect_checkbox">' . $args['label'] . '</label>';
    ?>
    
    <i href="#" class='tooltip'>
        <span class='why'>
            i
        </span>
        <span class='tip'><?php esc_html_e( $args['description'] , 'hideonscroll')?></span>
    </i>
    <?php
}*/


//header height markup
function hide_header_plugin_header_height_markup($args){
    
    $options = get_option('hide_header_plugin_settings');
    $header_height = '';

    if( isset( $options['header_height'])){
        $header_height = esc_html(( $options['header_height']));
    }
    echo'<input type="text" id="hide_header_plugin_headerheight" name="hide_header_plugin_settings[header_height]" value="' . __($header_height , 'hideonscroll') . '" />';
    ?>
    <i href="#" class='tooltip'>
        <span class='why'>
            i
        </span>
        <span class='tip'><?php esc_html_e( $args['description'] , 'hideonscroll')?></span>
    </i>
    <?php
}

function hide_header_plugin_hide_after_scroll_markup($args){
    $options = get_option('hide_header_plugin_settings');
    $hide_after_scroll = '';

    if( isset( $options['hide_after_scroll'])){
        $hide_after_scroll = esc_html(( $options['hide_after_scroll']));
    }
    
    echo'<input type="text" id="hide_header_plugin_hideafterscroll" name="hide_header_plugin_settings[hide_after_scroll]" value="' . __($hide_after_scroll) . '" />';
    ?>
    <i href="#" class='tooltip'>
        <span class='why'>
            i
        </span>
        <span class='tip'><?php esc_html_e( $args['description'] , 'hideonscroll')?></span>
    </i>
    <?php
}


function hide_header_plugin_animation_length_field_markup($args){
    $options = get_option('hide_header_plugin_settings');
    $animation_length = '';

    if( isset( $options['animation_length'])){
        $animation_length = esc_html(( $options['animation_length']));
    }
    
    echo'<input type="text" id="hide_header_plugin_animationlength" name="hide_header_plugin_settings[animation_length]" value="' . __($animation_length) . '" />';
    ?>
    <i href="#" class='tooltip'>
        <span class='why'>
            i
        </span>
        <span class='tip'><?php esc_html_e( $args['description'] , 'hideonscroll')?></span>
    </i>
    <?php
}


function hide_header_plugin_header_id_field_markup($args){
    $options = get_option('hide_header_plugin_settings');
    $header_id = '';

    if( isset( $options['header_id'])){
        $header_id = esc_html(( $options['header_id']));
    }
    
    echo'<input type="text" id="hide_header_plugin_headerid" name="hide_header_plugin_settings[header_id]" value="' . __($header_id , 'hideonscroll') . '" />';
    ?>
    <i href="#" class='tooltip'>
        <span class='why'>
            i
        </span>
        <span class='tip'><?php esc_html_e( $args['description'] , 'hideonscroll')?></span>
    </i>
    <?php
}

function hide_header_plugin_main_id_field_markup ($args){
    $options = get_option('hide_header_plugin_settings');
    $main_id = '';

    if( isset( $options['main_id'])){
        $main_id = esc_html(( $options['main_id']));
    }
    
    echo'<input type="text" id="hide_header_plugin_mainid" name="hide_header_plugin_settings[main_id]" value="' . __($main_id , 'hideonscroll') . '" />';
    ?>
    <i href="#" class='tooltip'>
        <span class='why'>
            i
        </span>
        <span class='tip'><?php esc_html_e( $args['description'] , 'hideonscroll')?></span>
    </i>
    <?php
}
