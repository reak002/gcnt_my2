$(document).ready(function (){

    $('body').on('change','.custom_filter select',function (){
        $(this).closest("form").submit();
    });

    $('body').on('click','[name="arrFilter_form"]',function (){
        $(this).removeClass('closeFilter');
    });

    if(window.innerWidth < 1120){
        $('[name="arrFilter_form"]').addClass('closeFilter');
    }
})