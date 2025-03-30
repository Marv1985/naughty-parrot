const footer_text_slider = () => {
    const footer_text_slider_parent = document.querySelector('.footer_text_slider_parent');

    if (!footer_text_slider_parent) return; 

    const footer_text_slider_swiper = footer_text_slider_parent.querySelector('.swiper');
   
    const swiper = new Swiper(footer_text_slider_swiper, {
        spaceBetween: 20,
        loop: true,
        speed: 10000,  
        centeredSlides: true,                                                            
        slidesPerView: 'auto',
        updateOnWindowResize: true,
        autoplay: {
            delay: 0
        },
        allowTouchMove: false
    });
};

document.addEventListener('DOMContentLoaded', footer_text_slider);
