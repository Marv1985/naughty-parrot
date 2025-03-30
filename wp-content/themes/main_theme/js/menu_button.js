const menu_button = () => {
    const menuButton = document.querySelector('.menu_button');
    const header = document.querySelector('.header');
    const popOutMenu = document.querySelector('.pop_out_menu');
    const menu = document.querySelector('.pop_out_menu .menu');
    const body = document.querySelector('body');
    const lis = menu.querySelectorAll('li');

    if (!menuButton) return;

    // GSAP Timeline for menu opening
    const menuTimeline = gsap.timeline({ paused: true });

    menuTimeline
        .fromTo(
            popOutMenu,
            { autoAlpha: 0, width: 0, height: 0, borderRadius: '50%', position: 'fixed' }, 
            { right: 0, autoAlpha: 1, borderRadius: 0, duration: 0.2, width: '100vw', height: '100vh', ease: 'sine.out' }
        )
        .set(body, { overflowX: 'hidden' }, 0);

    // GSAP Timeline for menu items
    const menuItemsTimeline = gsap.timeline({ paused: true });

    menuItemsTimeline
        .to(menu, { overflow: 'auto', duration: 0, delay: 0.2 })
        .from(lis, {
            opacity: 0,
            y: 35,
            duration: 0.4,
            ease: "power1.out",
            stagger: 0.1,
            delay: .1
        })

    // Click event to toggle menu
    menuButton.addEventListener('click', () => {
        header.classList.toggle('open_pop_out_menu');
        menuButton.classList.toggle('is_active');

        if (header.classList.contains('open_pop_out_menu')) {
            menuTimeline.play();
            menuItemsTimeline.play();
        } else {
            gsap.set(lis, { opacity: 0, y: 20 }); 
            menuItemsTimeline.pause(0);
            menuTimeline.reverse();
        }
    });
};

document.addEventListener('DOMContentLoaded', menu_button);
