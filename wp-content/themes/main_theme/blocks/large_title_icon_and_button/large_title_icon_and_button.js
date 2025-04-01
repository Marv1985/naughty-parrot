const large_title_icon_and_button = () => {
    const large_title_icon_and_button_parent = document.querySelector('.large_title_icon_and_button_parent');

    if (!large_title_icon_and_button_parent) return;

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: large_title_icon_and_button_parent,
            start: '50% bottom',
            // markers: true,
            toggleActions: 'play none none none',
            once: true,
        },
    });

    if (window.innerWidth < 500) {
        tl.to('.icon', {
            rotation: 20, 
            yoyo: true, 
            repeat: 7,  
            duration: 0.3, 
            ease: 'power1.inOut',
        })
        .to('.icon', {
            rotation: 0, 
            duration: 0.3, 
            ease: 'power1.out', 
            x: '105%',
            y: '-22%'
        });

    } else {
        tl.to('.icon', {
            rotation: 20, 
            yoyo: true,  
            repeat: 7,   
            duration: 0.3, 
            ease: 'power1.inOut',
        })
        .to('.icon', {
            rotation: 0,   
            duration: 0.3, 
            ease: 'power1.out',
            x: '110%',
            y: '3%'
        });
    }
};

document.addEventListener('DOMContentLoaded', large_title_icon_and_button);
