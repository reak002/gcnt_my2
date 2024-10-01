$(document).ready(function (){
    // console.log('1');
    try{
        var gallery = document.getElementsByClassName( 'other_img_list' );
        for ( var i = 0, len = gallery.length; i < len; i++ ) {
            new Splide( gallery[ i ], {
                // type   : 'loop',
                perPage: 4,
                rewind : true,
                gap: '20px',
                pagination: false,
                direction: 'ttb',
                height   : '365px',
                autoplay: true,
                breakpoints: {
                    1120: {
                        perPage: 1,
                    },
                }
            } ).mount();
        }
    }
    catch (e) {
        console.log(e);
    }

    // $('body').on('click','.right .splide__slide img',function (){
    //     let src = $(this).attr('src');
    //     let left = $(this).closest('.gallery').find('.left')
    //     let bg_img = left.find('.bg_img');
    //     let img = left.find('img');
    //     console.log(src);
    //     console.log(bg_img);
    //     console.log(img);
    //     $(bg_img).css('background-image','url('+ src +')');
    //     $(img).attr('src',src);
    // });
});

function init_gallery($selector){
    try{

    }
    catch (e) {
        console.log(e);
    }
}