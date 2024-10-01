$(document).ready(function (){
    try{
        new Splide( '.news_list', {
            type   : 'loop',
            perPage: 3,
            rewind : true,
            gap: '20px',
            pagination: false,
            autoplay: true,
            'arrowPath' : 'M30.4596 5.45962C30.7135 5.20578 30.7135 4.79422 30.4596 4.54038L26.323 0.403804C26.0692 0.149963 25.6576 0.149963 25.4038 0.403804C25.15 0.657644 25.15 1.0692 25.4038 1.32304L29.0808 5L25.4038 8.67695C25.15 8.93079 25.15 9.34235 25.4038 9.59619C25.6576 9.85003 26.0692 9.85003 26.323 9.59619L30.4596 5.45962ZM5.68248e-08 5.65L30 5.65L30 4.35L-5.68248e-08 4.35L5.68248e-08 5.65Z',
            breakpoints: {
                1120: {
                    perPage: 1,
                    pagination: true,
                },
            }
        } ).mount();
    }
    catch (e) {
        console.log(e);
    }
});