const intro_images_slide_in = () => {
    const mouse_move_images = document.querySelector('.mouse_move_images');

    if (!mouse_move_images) return;

    let tl = gsap.timeline({
        ease: "sine.out"
    });

    if (window.innerWidth < 800) {
        // Adjusted values for smaller screens
        tl.fromTo('.mouse_move_images img:nth-of-type(1)',
            {x: '-50%', y: '-101%'},
            {x: 0, y: '-71%', duration: 2}, 0
        );
        tl.fromTo('.mouse_move_images img:nth-of-type(2)',
            {x: '30%', y: '-100%'},
            {x: 0, y: '-57%', duration: 2}, 0
        );
        tl.fromTo('.mouse_move_images img:nth-of-type(3)',
            {x: '0%', y: '-94%'},
            {y: '-27%', duration: 1.8}, 0
        );
    } else {
        // Default values for larger screens
        tl.fromTo('.mouse_move_images img:nth-of-type(1)',
            {x: '70%', y: '-100%'},
            {x: 0, y: '-74%', duration: 2}, 0
        );
        tl.fromTo('.mouse_move_images img:nth-of-type(2)',
            {x: '-40%', y: '-100%'},
            {x: 0, y: '-63%', duration: 2}, 0
        );
        tl.fromTo('.mouse_move_images img:nth-of-type(3)',
            {y: '-100%'},
            {y: '-39%', duration: 1.8}, 0
        );
    }
};

document.addEventListener('DOMContentLoaded', intro_images_slide_in)
