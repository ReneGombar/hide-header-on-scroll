<?php 

//section markup
function hide_header_plugin_settings_section_markup(){
    esc_html_e( 'Plugin settings section description','hideonscroll' );
}   

//header height markup
function hide_header_plugin_header_height_markup($args){
    $options = get_option('hide_header_plugin_settings');
    $header_height = '';

    if( isset( $options['header_height'])){
        $header_height = esc_html(( $options['header_height']));
    }
    echo'<input type="text" id="hide_header_plugin_headerheight" name="hide_header_plugin_settings[header_height]" value="' . $header_height . '" />';
    ?>
    <i href="#" class='tooltip'>
        <span class='why'>
            i
        </span>
        <span class='tip'><?php echo $args['description']?></span>
    </i>
    <?php
}

function hide_header_plugin_hide_at_height_field_markup($args){
    $options = get_option('hide_header_plugin_settings');
    $hide_at_height = '';

    if( isset( $options['hide_at_height'])){
        $hide_at_height = esc_html(( $options['hide_at_height']));
    }
    
    echo'<input type="text" id="hide_header_plugin_hideatheight" name="hide_header_plugin_settings[hide_at_height]" value="' . $hide_at_height . '" />';
    ?>
    <i href="#" class='tooltip'>
        <span class='why'>
            i
        </span>
        <span class='tip'><?php echo $args['description']?></span>
    </i>
    <?php
}
