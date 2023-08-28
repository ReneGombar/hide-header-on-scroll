<?php 
function form_settings(){
    ?>
                
        <form action="options.php" method="post">
                <?php settings_fields('hide_header_plugin_settings'); ?>
                <?php do_settings_sections('hideonscroll'); ?>
                <?php submit_button('Save changes','primary','plugin_submit_button'); ?>
        </form>
    <?php
};

?>

<div class="wrap">
    <div class="hide-header-container">
        <div class="center">
            <div class="detectionBlock">
            
            <?php 
            //first check if returning from a detection run.
            
                if (isset ($_GET["hide_header_plugin_header_id"]) && isset ($_GET["hide_header_plugin_main_id"])){
                    
                    echo "<h2 style='color:green'>Detection was succsesfull</h2>";
                    echo "<h4 style='color:orange'>Enter the following information into the fields bellow and save.</h4>";
                    echo "Detected Header element ID: <strong>" . $_GET["hide_header_plugin_header_id"]. "</strong>";
                    echo "<br>";
                    echo "Detected Main div element ID: <strong>" . $_GET["hide_header_plugin_main_id"]. "</strong>";
                    echo "<br>";
                    echo "Detected Heigh of the header: <strong>" . $_GET["hide_header_plugin_header_height"]. "</strong>";
                    echo "<br>";
                    echo "<br>";
                    
                }
                //2. check if header and main ids are set in db 
                elseif (get_option('hide_header_plugin_settings')['header_id'] !="not set" && get_option('hide_header_plugin_settings')['main_id'] !="not set" ){
                    echo "<br>";
                    echo "<h3 style='color:green'>Previous settings found</h3>";
                    echo "<br>";
                    
                }
                else {
                    echo "<h3 style='color:red'>Element IDs are not set. Run DETECT</h3>";
                    echo "<br>";
            }
                
            ?>
            <button id="plugin_detect_button">DETECT</button>
            </div>
            <?php form_settings()?>
        <p>Contact: rgombar@gmail.com</p>
        </div>
    </div>
</div>