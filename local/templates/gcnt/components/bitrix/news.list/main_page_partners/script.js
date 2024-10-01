let global_partners_slider;

$(document).ready(function (){
    global_partners_slider = init_partners_slider();
});
$(window).resize(function() {
    try{
        global_partners_slider.destroy();
        global_partners_slider = init_partners_slider();
    }
    catch (e) {
        console.log(e);
    }
});

function init_partners_slider(){
    let partners_splide;
    try{
        if($(window).width() > 1120){
            partners_splide = new Splide( '.partners_list', {
                type   : 'loop',
                perPage: 5,
                rewind : true,
                gap: '20px',
                pagination: false,
                direction: 'ttb',
                height   : '490px',
                autoplay: true,
            } ).mount();
        }
        else{
            partners_splide = new Splide( '.partners_list', {
                type   : 'loop',
                perPage: 1,
                rewind : true,
                pagination: false,
                autoplay: true,
            } ).mount();
        }
    }
    catch (e) {
        console.log(e);
    }

    return partners_splide;
}