$(document).ready(function (){

    $('body').on('change','.custom_filter select',function (){
        $(this).closest("form").submit();
    });
})