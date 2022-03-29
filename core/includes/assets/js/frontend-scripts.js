/*------------------------- 
Frontend related javascript
-------------------------*/
function OpenFilter() {
    document.getElementById('filter_scroll').classList.toggle('filter_block_hide')
    document.getElementById('searchBar_block').classList.toggle('searchBar_block_sidenav_change')
    document.getElementById('searchBar_filter').classList.toggle('hide-div')
    document.getElementById('body_content').classList.toggle('body_content_skews')
    document.getElementById('display_option').classList.toggle('display_option_skrew')
}

function showNavBarFilter() {
    document.getElementById('resourses_filter').classList.toggle('show-resources-div')
    document.getElementById('resourses_filter_whole').classList.toggle('show-filter-div')
}

function UnfoldFilter(divID, arrowID) {
    document.getElementById(divID).classList.toggle('filter_category_open')
    document.getElementById(arrowID).classList.toggle('filter_arrow_rotate')
}

function DisplayOption() {
    const images = document.querySelectorAll('.body_content_images_div');
    const image = document.querySelectorAll('.content_images');
    document.querySelector('#displayOptionBtn').classList.toggle('display_option_highlight')
    document.querySelector('.body_content_images').classList.toggle('body_content_images_OptionChange')
    images.forEach(el => {
        el.classList.toggle('body_content_images_div_OptionChange');
    })

    image.forEach(el => {
        el.classList.toggle('content_images_OptionChange');
    })
    DisplayOptionBtn()
}

function DisplayOptionBtn() {
    document.getElementById('display_option').classList.toggle('show_display_option')
    document.getElementById('displayOptionArrow').classList.toggle('display_option_arrow')
    document.getElementById('body_content').classList.toggle('display_option_body')
}

window.addEventListener('resize', function (event) {
    var newWidth = window.innerWidth;
    if (newWidth <= 800) {
        if (document.querySelector("#body_content_images").classList.contains("body_content_images_OptionChange")) {
            DisplayOption()
        }
    }
});
              
(function ($) {
    $(document).on("click", function (e) {
        alert('sdvwev')
        if ($(e.target).is("#resourses_filter") === false) {
            $("#resourses_filter").removeClass("show-div");
        }
    });
});

(function( $ ) {

	"use strict";

    $(document).ready( function() {
        $.ajax({
            type : "post",
            dataType : "json",
            url : ioxopsdown.ajaxurl,
            data : {
                action: "my_demo_ajax_call", 
                demo_data : 'test_data', 
                ajax_nonce_parameter: ioxopsdown.security_nonce
            },
            success: function(response) {
                console.log( response );
            }
        });
    });

})( jQuery );