document.addEventListener('DOMContentLoaded', function() {    
    
    //add detect button event listener
    const detectButton = document.querySelector('#plugin_detect_button')
    detectButton.addEventListener('click',detectButtonHandler)

    function detectButtonHandler(){
        window.location.href = option.url + '?hide_header_detection_run=true'
    }

    //add submit plugin event
    const submitButton = document.querySelector('#plugin_submit_button')
    submitButton.addEventListener('click',submitButtonHandler)

    function submitButtonHandler(){
        window.location.href = option.url + '/wp-admin/options-general.php?page=hideonscroll'
    }
    


    
    //to see if we are coming back from a detection run check url params
    //get url search params for detection
    const urlParams = new URLSearchParams(window.location.search);
    //urlParams.get('hide_header_plugin_header_id') ? afterDetection() : withoutDetection()


    // let detectedValues = null
    // try {
    //     detectedValues = JSON.parse(localStorage.getItem('hide_header_plugin'))
    //     console.log(detectedValues)
    // }
    // catch{
    //     console.log('Local Storage Not Found')
    // }

    //    console.log(option.url)
    // detectedValues != null ? afterDetection() : afterDetection()

    function afterDetection(){

            document.querySelector('#hide_header_plugin_headerid').value = urlParams.get('hide_header_plugin_header_id')
            document.querySelector('#hide_header_plugin_mainid').value = urlParams.get('hide_header_plugin_main_id')

        }
    
    function withoutDetection(){
        null
    }
    
});