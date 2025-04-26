const banner_slider = () => {

    const banner_slider_parent = document.querySelector('.banner_slider_parent');

    if (!banner_slider_parent) return; 

    const banner_slider_swiper = banner_slider_parent.querySelector('.swiper');
   
    const swiper = new Swiper(banner_slider_swiper, {
        spaceBetween: 13,
        loop: true,
        speed: 5000,  
        // centeredSlides: true,                                                            
        slidesPerView: 'auto',
        updateOnWindowResize: true,
        autoplay: {
            reverseDirection: true,
            delay: 0
        },
        allowTouchMove: false,
        breakpoints: {
            800: {
                spaceBetween: 20
            },
        }
    });

}

window.addEventListener('DOMContentLoaded', banner_slider)