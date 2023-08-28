//! add element detection here instead of the admin script file


document.addEventListener('DOMContentLoaded', function() {    
    
    //console.log(settings)
    
    //get url search params for detect
    const urlParams = new URLSearchParams(window.location.search);
    
    if (urlParams.get('hide_header_detection_run') === "true") {
        detectElements()
    }  
    else {
        //only run if the header and main are set
        if (settings.header_id !== "not set" && settings.main_id !=="not set"){
            applyNewHeader()
        }
    } 
    
    // function is triggred when the url contains detect true string
    function detectElements(){
        console.log('detecting run')
        const header = document.querySelector('header') ? document.querySelector('header').id : 'NOT FOUND'
        const main = document.querySelector('main') ? document.querySelector('main').id : 'NOT FOUND'
        const header_height = document.querySelector('header') ? document.querySelector('header').offsetHeight : 'NOT FOUND'

        const answer = confirm(`Detecting Element IDs: \n\n   Header Element ID:  "${header}" 
            \n   Main Element ID:  "${main}"
            \n   Header Height:  "${header_height}"
            \n Please note down the IDs and enter them in the Plugin Settings Page.`);
        
        if (answer) {
            const elemInfo = {};
            elemInfo.header = header;
            elemInfo.main = main;
            elemInfo.header_height = header_height;
        
            (header && main !== "NOT FOUND") 
                ? localStorage.setItem("hide_header_plugin", JSON.stringify(elemInfo)) 
                : null

            $url_path = settings.url
            $url_path += '/wp-admin/options-general.php?page=hideonscroll'
            $url_path += `&hide_header_plugin_header_id=${elemInfo.header}`
            $url_path += `&hide_header_plugin_main_id=${elemInfo.main}`
            $url_path += `&hide_header_plugin_header_height=${elemInfo.header_height}`
            
            window.location.href = encodeURI($url_path)
        }

        else{
            localStorage.removeItem("hide_header_plugin")
        }
    }

    // main function that hides the header on scroll
    function applyNewHeader(){
        // get header element
            const header = document.querySelector(`#${settings.header_id}`)
            //get the main div of the page
            const mainWindow = document.querySelector(`#${settings.main_id}`)  

            //try to get the Admin top bar element
            const adminTopBar = document.querySelector("#wpadminbar")

            //try to get the Front end Top Bar Element
            // const frontEndTopBar = document.querySelector("#top-bar-wrap")
            
            const adminTopBarHeight =  adminTopBar ? adminTopBar.clientHeight : 0
            // const frontTopBarHeight =  frontEndTopBar ? frontEndTopBar.offsetHeight  : 0

            //console.log('admin top bar height: ' + adminTopBarHeight)
            // console.log('front-end top bar height: ' + frontTopBarHeight)

            // add the admin bar to the total offset
            const topMarginOffset = (adminTopBar ? adminTopBarHeight : 0) 

            //if header exists add styles to it 
            if (header){
                header.style.position = 'fixed'
                header.style.top = 0
                header.style.transition = `${settings.animation_length}s linear`
            }
            else{
                console.log(`ERROR: header element with the id of #${settings.header_id} does not exist!`)
            }

            {/* frontEndTopBar
            ? frontEndTopBar.classList.add("visible-topBar") 
            : console.log(`ERROR: top-bar element with the id of ${options.header_id} does not exist!`)
            */}

            //check if Admin Top Bar is present and appply margin offset
            topMarginOffset > 0 
                ? header 
                    ? header.style.marginTop = `${topMarginOffset}px` 
                    : null
                :null

            // add the top margin to the main page to offset it the header height
            mainWindow 
                ? mainWindow.style.marginTop = `${settings.header_height}px`
                : console.log(`ERROR: main div element with the id of #${settings.main_id} does not exist!`)

            //function to hide the scroll
            const hideAtScroll = window.innerWidth < 500 ?  Math.floor(settings.hide_after_scroll / 2 ) :  settings.hide_after_scroll
            
            hideHeaderOnScroll()
            window.addEventListener('scroll',hideHeaderOnScroll);


            function hideHeaderOnScroll(){

                if (header && window.scrollY > hideAtScroll) {
                    header.style.opacity = 0;
                    // frontEndTopBar ? frontEndTopBar.style.opacity = 0 : null
                }
                else if (header && window.scrollY <= hideAtScroll){
                    header.style.opacity = 1;
                    // frontEndTopBar ? frontEndTopBar.style.opacity = 1 : null
                }
                else
                {
                    console.log('ERROR: Header does not exist!')
                }
            };
        }

    // Ajax retrieve data from back-end
    // wp.ajax.post( "get_data", {} )
    // .done(function(response) {
    //     apply_plugin(response);
    // });

});