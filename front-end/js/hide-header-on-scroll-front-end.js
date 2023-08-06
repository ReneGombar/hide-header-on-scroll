
//function adds new class to header based on scroll value

document.addEventListener('DOMContentLoaded', function() {    

    //console.log(is_admin_bar_showing())


    // retrieve data from back-end
    wp.ajax.post( "get_data", {} )
    .done(function(response) {
        apply_plugin(response);
    });

    // after data is received, apply plugin function
    function apply_plugin(response){
        
        //console.log(response);
        
        const header = document.querySelector("#site-header");
        const mainWindow = document.querySelector("#main")
        
        const headerHeight = header.offsetHeight;
        mainWindow.style.setProperty(`--top-margin`, `'${headerHeight}px'`);
        
        header.classList.add("visible-header");
        
        mainWindow.classList.add("top-margin");
        
        // mainWindow.style.marginTop(response.header_height*5);

        //function to hide the scroll
        function hideHeaderOnScroll(){
            if (window.scrollY > response.hide_at_scrollY) {
                // header.classList.add("hidden-header");
                header.style.opacity = 0;
            }
            else{
                // header.classList.remove("hidden-header");
                header.style.opacity = 1;
            }
        };

        hideHeaderOnScroll();

        window.addEventListener('scroll',hideHeaderOnScroll);
    };

});