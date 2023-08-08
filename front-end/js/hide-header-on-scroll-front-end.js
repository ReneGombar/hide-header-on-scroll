
//function adds new styles to header based on scroll value

document.addEventListener('DOMContentLoaded', function() {    

    console.log(settings)
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

    console.log('admin top bar height: ' + adminTopBarHeight)
    // console.log('front-end top bar height: ' + frontTopBarHeight)

    // add the admin bar to the total offset
    const topMarginOffset = (adminTopBar ? adminTopBarHeight : 0) 


    //if header exists add a new css class to it 
    header 
    ? header.classList.add("visible-header") 
    : console.log(`ERROR: header element with the id of #${settings.header_id} does not exist!`)
    
    {/* frontEndTopBar
    ? frontEndTopBar.classList.add("visible-topBar") 
    : console.log(`ERROR: top-bar element with the id of ${options.header_id} does not exist!`)
    */}

    //check if Admin Top Bar is present and appply margin offset
    topMarginOffset > 0 ? header.style.marginTop = `${topMarginOffset}px` : null
    
    // add the top margin to the main page to offset it the header height
    mainWindow 
        ? mainWindow.style.marginTop = `${settings.header_height}px`
        : console.log(`ERROR: main div element with the id of #${settings.main_id} does not exist!`)

    //function to hide the scroll
    const hideAtScroll = window.innerWidth < 500 ?  Math.floor(settings.hide_after_scroll / 2 ) :  settings.hide_after_scroll
    

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

    hideHeaderOnScroll();

    window.addEventListener('scroll',hideHeaderOnScroll);

    // Ajax retrieve data from back-end
    // wp.ajax.post( "get_data", {} )
    // .done(function(response) {
    //     apply_plugin(response);
    // });

});