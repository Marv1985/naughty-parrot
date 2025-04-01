const image_slider = () => {

    const image_slider_parent = document.querySelector('.image_slider_parent');

    if (!image_slider_parent) return; 

    const image_slider_swiper = image_slider_parent.querySelector('.swiper');
   
    const swiper = new Swiper(image_slider_swiper, {
        spaceBetween: 20,
        loop: true,
        speed: 8000,  
        centeredSlides: true,                                                            
        slidesPerView: 'auto',
        updateOnWindowResize: true,
        autoplay: {
            delay: 0
        },
        allowTouchMove: false,
        breakpoints: {
            800: {
                spaceBetween: 35
                },
        }
    });
}

window.addEventListener('DOMContentLoaded', image_slider)