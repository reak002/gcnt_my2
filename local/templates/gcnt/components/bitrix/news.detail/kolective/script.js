$(document).ready(function () {

    let C_ID = $('[name="COLECTIVE_ID"]').val();
    $('[name="COLECTIVE"]').val(C_ID);

    $('body').on('click','#to_invite',function (e){
        e.preventDefault();
        $('html, body').stop().animate(
            { scrollTop: $('#fb_form').offset().top - 250 },
            {
                duration: 2000,
            }
        )
    });
    $('body').on('click','.btn.resend',function (e){
        $('form[name="feedback"]').clear();
        $(window).bind('scroll');
        e.preventDefault();
        location.reload();
    });

});