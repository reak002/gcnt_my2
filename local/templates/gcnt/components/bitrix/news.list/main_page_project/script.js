let global_project_splider;

$(document).ready(function (){
    global_project_splider = init_project_slider();
});
$(window).resize(function() {
    try{
        global_project_splider.destroy();
        global_project_splider = init_project_slider();
    }
    catch (e) {
        console.log(e);
    }
});

function init_project_slider() {
    let project_splide;
    try{
        if($(window).width() > 1120){
            project_splide = new Splide( '.project_list', {
                type   : 'loop',
                perPage: 3,
                rewind : true,
                gap: '20px',
                pagination: false,
                direction: 'ttb',
                height   : '490px',
                autoplay: true,
            } ).mount();
        }
        else{
            project_splide = new Splide( '.project_list', {
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
    return project_splide;
};

