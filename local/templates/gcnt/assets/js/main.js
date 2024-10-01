'use strict';
$(window).unbind('scroll');
// var myHash = location.hash;
// location.hash = '';

$(document).ready(function () {
    $(window).bind('scroll');


    let body = $('body');

    body.on('click','.search_toggle',function () {
        let center_block = $('header > .top > .center');
        center_block.toggleClass('hidden_block');
       if(center_block.hasClass('hidden_block')){
           $('.cup_for_mobile').removeClass('cupped');
       }else{
           $('.cup_for_mobile').addClass('cupped');
       }
    });

    body.on('click','.burger_menu',function () {
        let bottom_block = $('header > .bottom');
        bottom_block.toggleClass('open_mobile_menu');
       if(bottom_block.hasClass('open_mobile_menu')){
           $('.cup_for_mobile').addClass('cupped');
       }else{
           $('.cup_for_mobile').removeClass('cupped');
       }
    });

    body.on('click','.close_burger',function () {
        let bottom_block = $('header > .bottom');
        bottom_block.toggleClass('open_mobile_menu');
       if(bottom_block.hasClass('open_mobile_menu')){
           $('.cup_for_mobile').addClass('cupped');
       }else{
           let center_block = $('header > .top > .center');
           // center_block.toggleClass('hidden_block');
           if(center_block.hasClass('hidden_block')){
               $('.cup_for_mobile').removeClass('cupped');
           }else{
               $('.cup_for_mobile').addClass('cupped');
           }
       }
    });

    $('input[type="tel"]').inputmask({
        mask: '(+7 (999) 999-99-99)|(8 (999) 999-99-99)'
    });

    body.on('click','[data-action="open_feedback"]',function (){
        let folderPath = BX.message('TEMPLATE_PATH');
        let id = $(this).attr('data-feedback-id');
        let hide_msg = $(this).attr('data-hide-msg');
        let title = $(this).html();
        $.ajax({
            type: 'POST',
            url: folderPath+'/include_area/modal_feedback.php',
            data: 'IB_ID='+id+'&HIDE_MSG='+hide_msg+'&A_URL='+folderPath+'/include_area/modal_feedback.php',
            success: function(data){
                createModal(title,data);
                $('input[type="tel"]').inputmask({
                    mask: '(+7 (999) 999-99-99)|(8 (999) 999-99-99)'
                });
                console.lo

                if($('.bvi-panel-close')?.length > 0){
                    $('.bvi-panel-close').click();
                    $('.bvi-open.have_not_eye').click();
                }
            }
        });
    });

    body.on('submit','form[data-ajax="Y"][name="feedback"]',function (e){
        e.preventDefault();
        let folderPath = BX.message('TEMPLATE_PATH');
        let form = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: folderPath+'/include_area/modal_feedback.php',
            data: form+'&A_URL='+folderPath+'/include_area/modal_feedback.php',
            success: function(data){
                $('.modal_window .body').html(data);
            }
        });
    });

    body.on('click','[data-action="open_subscribe"]',function (){
        let folderPath = BX.message('TEMPLATE_PATH');
        let id = $(this).attr('data-feedback-id');
        let title = $(this).html();
        $.ajax({
            type: 'POST',
            url: folderPath+'/include_area/modal_subscribe.php',
            data: 'IB_ID='+id+'&A_URL='+folderPath+'/include_area/modal_subscribe.php',
            success: function(data){
                createModal(title,data);
                $('input[type="tel"]').inputmask({
                    mask: '(+7 (999) 999-99-99)|(8 (999) 999-99-99)'
                });
            }
        });
    });

    body.on('submit','form[data-ajax="Y"][name="subscribe"]',function (e){
        e.preventDefault();
        let folderPath = BX.message('TEMPLATE_PATH');
        let form = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: folderPath+'/include_area/modal_subscribe.php',
            data: form+'&A_URL='+folderPath+'/include_area/modal_subscribe.php',
            success: function(data){
                $('.modal_window .body').html(data);
            }
        });
    });

    body.on('click','.modal_window .cross',function (){
        $('.modal_window').remove();
    })

    init_gallery_snippet();
    init_video_snippet();

    body.on('click','.right .splide__slide img',function (){
        let src = $(this).attr('src');
        let left = $(this).closest('.gallery').find('.left')
        let bg_img = left.find('.bg_img');
        let img = left.find('img');
        console.log(src);
        console.log(bg_img);
        console.log(img);
        $(bg_img).css('background-image','url('+ src +')');
        $(img).attr('src',src);
    });

    body.on('click','#to_top',function (){
        $('html, body').stop().animate(
            { scrollTop: '0' },
            {
                duration: 2000,
            }
        )
    });

    let myHash = location.hash; //получаем значение хеша

    if(myHash[1] !== undefined){
        if( myHash === 'svg_map' || myHash === '#svg_map'){

            $('html, body').stop().animate(
                { scrollTop: $('.splide__list').offset().top + 195},
                {
                    duration: 1000,
                }
            )
        }

    }



    document.addEventListener('play', function(e){
        var audios = document.getElementsByTagName('audio');
        for(var i = 0, len = audios.length; i < len;i++){
            if(audios[i] != e.target){
                audios[i].pause();
            }
        }
    }, true);
});

$(window).scroll(function (){
    if(window.pageYOffset){
        $('#to_top').addClass('visible');
    }
    else{
        $('#to_top').removeClass('visible');
    }

    if($(window).width() < 1120) {
        if(window.pageYOffset){
            $('.top > .inner_wrapper > .social_link_list').addClass('hide_this_social');
        }
        else{
            $('.top > .inner_wrapper > .social_link_list').removeClass('hide_this_social');
        }
    }

});



function createModal(title,html){
    $('body')
        .append('<div class="modal_window">\n' +
            '    <div class="modal_inner">\n' +
            '        <div class="header">\n' +
            '            <div class="title">\n' +
            '                '+title+'\n' +
            '            </div>\n' +
            '            <div class="cross">\n' +
            '                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
            '                    <path d="M16.9577 0.661165L9.49993 8.11893L2.04217 0.661165C1.66079 0.279783 1.04248 0.279784 0.6611 0.661165C0.279718 1.04255 0.279718 1.66085 0.6611 2.04223L8.11887 9.5L0.6611 16.9578C0.279718 17.3391 0.279718 17.9575 0.6611 18.3388C1.04248 18.7202 1.66079 18.7202 2.04217 18.3388L9.49993 10.8811L16.9577 18.3388C17.3391 18.7202 17.9574 18.7202 18.3388 18.3388C18.7202 17.9575 18.7202 17.3391 18.3388 16.9578L10.881 9.5L18.3388 2.04223C18.7202 1.66085 18.7202 1.04255 18.3388 0.661165C17.9574 0.279784 17.3391 0.279783 16.9577 0.661165Z" fill="#000"/>\n' +
            '                </svg>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div class="body">\n' +
            '            '+html+'\n' +
            '        </div>\n' +
            '    </div>\n' +
            '</div>');
}

function init_gallery_snippet(){
    try {
        $('.gallery_snippet').each(function( index ) {
            let $item = $( this );
            let id = parseInt($( this ).text().split('#')[1].replace('%', ''));
            console.log( id );
            let folderPath = BX.message('TEMPLATE_PATH');
            $.ajax({
                type: 'POST',
                url: folderPath+'/include_area/snippet_gallery.php',
                data: 'ID='+id,
                success: function(data){
                    $item.html(data);
                    $item.addClass('ready');
                    re_init_gallery($item);
                }
            });
        });
    }
    catch (e) {
        console.log(e.toString());
    }
}
function init_video_snippet(){
    try {
        $('.video_snippet').each(function( index ) {
            let $item = $( this );

            let $arrText = $item.text().split(' ');
            let option = {
                width: 0,
                height : 0,
                align : 'center',
            };
            for(let text of $arrText){
                if(text.includes('width')){
                   let width = text.replaceAll('\[width\]', '');
                   if(width!=='XXX')
                       option.width = width;
                }
                else if(text.includes('height')){
                    let height = text.replaceAll('\[height\]', '');
                    if(height!=='XXX')
                        option.height = height;
                }
                else if(text.includes('align')){
                    let align = text.replaceAll('\[align\]', '');
                    if(align!=='XXX')
                        option.align = align;
                }
            }
            
            console.log(option);


            let link = $item.text().split('###')[1].replace('[~]', '').replace('[~]', '');
            $( this ).html('');
            $( this ).append('<video controls="controls" preload="metadata"><source /></video>');
            let video = $( this ).find('video');
            let source = $( this ).find('source');
            if(option.width !== 0){
                video.attr('width',option.width)
            }
            if(option.height !== 0){
                video.attr('height',option.height)
            }
            if(option.align !== 0){
                $( this ).css('text-align',option.align)
            }
            source.attr('src',link);
            source.attr('type','video/mp4; codecs="avc1.42E01E, mp4a.40.2"');

            $item.addClass('ready');

        });
    }
    catch (e) {
        console.log(e.toString());
    }
}

function re_init_gallery(element){
    try{
        var gallery = element.find( '.other_img_list' );
        for ( var i = 0, len = gallery.length; i < len; i++ ) {
            if($(window).width() > 1120) {
                new Splide(gallery[i], {
                    // type   : 'loop',
                    perPage: 4,
                    rewind: true,
                    gap: '20px',
                    pagination: false,
                    direction: 'ttb',
                    height: '365px',
                    autoplay: true,
                    breakpoints: {
                        1120: {
                            perPage: 1,
                        },
                    }
                }).mount();
            }
            else{
                new Splide(gallery[i], {
                    type   : 'loop',
                    perPage: 4,
                    rewind : true,
                    pagination: true,
                    autoplay: true,
                    // height: '200px',
                    width: '95vw',
                    gap: '15px'
                } ).mount();


            }
        }

        if($(window).width() < 1120) {
            try{
                var slides = $( '.splide__slide' );
                for ( var j = 0, len2 = slides.length; j < len2; j++ ) {
                    let slide = jQuery(slides[j]);

                   let img =  slide.find('img');
                   let src = img.attr('src');
                    console.log(src);
                    $(img).css('opacity',0);
                    $(img).closest('.splide__slide').css('background-image','url('+src+')');
                    // $(slides[j]).css('backgroundImage',src);
                }
            }
            catch (e) {
                console.log(e);
            }
        }

    }
    catch (e) {
        console.log(e);
    }
}