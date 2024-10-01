"use strict";

$(document).ready(()=>{
    $('body').on('click','.section_name',function(){
        // $('.section_name').not(this).parent().removeClass('open');
        $(this).parent().toggleClass('open');
        // $('html, body').stop().animate(
        //     { scrollTop: $(this).offset().top - 165},
        //     {
        //         duration: 500,
        //
        //     }
        // )
    });
})