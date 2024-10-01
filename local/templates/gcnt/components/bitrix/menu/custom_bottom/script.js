$(document).ready(function (){
    $('body').on('click','.open_menu_akordeon',function (){
        let parent = $(this).parent().parent();
        parent.find('.children-item-wrapper').toggleClass('open');
        parent.find('.open_menu_akordeon').toggleClass('open');
    })
});
