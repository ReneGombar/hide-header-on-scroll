<?php
//enqueue the script to wp here
function hook_javascript() {
    //get plugin options from the DB
    $options = get_option('hide_header_on_scroll_option');
    

    ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {    
                //check if user is logged in
                let userIsLoggedIn = '<?php echo (is_user_logged_in()); ?>'

                // get header element
                const header = document.querySelector("<?php echo $options['header_id'];?>")
                
                //try to get the admin top bar element
                const topBar = document.querySelector("#wpadminbar")
                
                //get the main div of the page
                const mainWindow = document.querySelector("<?php echo $options['main_div_id'];?>")  
                
                //if header exists add a new class to it 
                header 
                    ? header.classList.add("visible-header") 
                    : console.log('ERROR: header element with the id of <?php echo $options['header_id'];?> does not exist!')
                
                //check if user is logged in and if the Admin Top Bar is rendered on the page
                if (userIsLoggedIn ==="1"  && topBar) {
                    header.style.marginTop = '<?php echo (32); ?>px';
                }

                // add the top margin to the main page to offset it the header height
                mainWindow 
                    ? mainWindow.style.marginTop = '<?php echo ( $options['header_height'] );?>px'
                    : console.log('ERROR: main div element with the id of <?php echo $options['main_div_id'];?> does not exist!')
                
                console.log(mainWindow)

                //function to hide the scroll
                function hideHeaderOnScroll(){
                    if (header && window.scrollY > <?php echo ( $options['hide_at_scrollY'] );?>) {
                        header.style.opacity = 0;
                    }
                    else if (header && window.scrollY <= <?php echo ( $options['hide_at_scrollY'] );?>){
                        header.style.opacity = 1;
                    }
                    else
                    {
                        console.log('Header does not exist')
                    }
                };

                hideHeaderOnScroll();

                window.addEventListener('scroll',hideHeaderOnScroll);
            });
        </script>
    <?php
}
add_action('wp', 'hook_javascript');