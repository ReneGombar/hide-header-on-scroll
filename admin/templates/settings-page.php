<?php 
$options = get_option('hide_header_on_scroll_option')
?>

<div class="container">
        <div class="center">
        <h1 class="align-center"><?php echo esc_html(get_admin_page_title()); ?> Plugin Settings</h1> 
        <form class="inputForm" action="options.php" method="post">
            <label for="height">
                <strong class='lg'>Height of the header (pixels)</strong>
                <br>
                You can find this value in the page customizer > Header > General > Height(px)
            </label>  
            <input class="pluginSettingsInput" type="text" placeholder="0" name="height" value="<?php echo $options['header_height']?>">
            <br/>

            <label for="visibleUntil">
                <strong class='lg'>Hide the header at (pixels)</strong>
                <br>
                Amount of scroll when the header turns invisible.
            </label>  
            <input class="pluginSettingsInput" type="text" placeholder="0" name="visibleUntil" value="<?php echo $options['hide_at_scrollY']?>">
            <br/>
            
            <label for="hideAnimation">
                <strong class='lg'>Animation length (seconds)</strong>
                <br>
                Length of the hiding animation from visible to invisible
            </label>  
            <input class="pluginSettingsInput" type="text" placeholder="0" name="hideAnimation" value="<?php echo $options['hide_animation_duration']?>">
            
            <?php
            settings_fields('custom-header-css-group');
            do_settings_sections('custom-header-css');
            submit_button('Save Changes');
            ?>
        </form>
        <br/>
        <ul>

        <?php foreach ($options as $option): ?>
            <li><?php echo $option;?></li>
        <?php endforeach; ?>
        
        </ul>
        
        <div class="todo">
            TODO:
            <ul>
                <li>Option to change the id of the header. Default: "#site-header"</li>
                <li>Option to change the id of the main page body. Default: "#main"</li>
                <li>Checkbox for main page "top-margin" and value. Default: "True, value: header-height"</li>
            </ul>    
    
        </div>
        </div>
    </div>