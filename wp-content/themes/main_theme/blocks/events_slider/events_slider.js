const events_slider = () => {

    const events_slider_parent = document.querySelector('.events_slider_parent')

    if(!events_slider_parent) return

    const events_slider_swiper = events_slider_parent.querySelector('.swiper')
    const next = events_slider_parent.querySelector('.swiper-button-next')
    const prev = events_slider_parent.querySelector('.swiper-button-prev')

    const swiper = new Swiper(events_slider_swiper, {
        speed: 400,
        spaceBetween: 40,
        grabCursor: true,
        autoplay: {
            delay: 5000,
          },
        navigation: {
            nextEl: next,
            prevEl: prev,
          },
          breakpoints: {
            800: {
                spaceBetween: 130
            },
        }
      });

}

window.addEventListener('DOMContentLoaded', events_slider)