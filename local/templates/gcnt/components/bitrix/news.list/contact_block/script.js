$(document).ready(function () {
    $('body').on('click','.contact_block > .tabs_wrapper > .header > div',function () {
        $('.contact_block > .tabs_wrapper > .header > div').not(this).removeClass('active');
        $(this).addClass('active');
        let id = $(this).attr('data-tab-id');
        $('.blocks > div').not('#tab_'+id).removeClass('active');
        $('#tab_'+id).addClass('active');
    });
});