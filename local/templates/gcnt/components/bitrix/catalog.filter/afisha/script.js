$(document).ready(function (){

    $('body').on('change','.filter_element [type="radio"]',function (){
        $(this).closest("form").submit();
    });

    $('body').on('click','[name="arrFilter_form"]',function (){
        $(this).toggleClass('closeFilter');
    });

    if(window.innerWidth < 1120){
        $('[name="arrFilter_form"]').addClass('closeFilter');
    }
})