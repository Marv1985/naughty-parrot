let currentTimeline;
let currentMouseMoveHandler;

const run_intro_images_slide_in = () => {
    const mouse_move_images = document.querySelector('.mouse_move_images');

    if (!mouse_move_images) return;

    // Kill previous timeline if exists
    if (currentTimeline) {
        currentTimeline.kill();
    }

    // Remove old mousemove listener
    if (currentMouseMoveHandler) {
        document.removeEventListener("mousemove", currentMouseMoveHandler);
    }

    // Throttle function
    const throttle = (func, limit) => {
        let inThrottle;
        return function (...args) {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    };

    // Move images on mousemove animation
    const mouse_move_image = () => {
        const images = document.querySelectorAll(".parallax-img");

        const imageData = Array.from(images).map(img => {
            const speed = parseFloat(img.getAttribute("data-speed")) || 10;
            const rect = img.getBoundingClientRect();
            const style = window.getComputedStyle(img);
            const matrix = new DOMMatrixReadOnly(style.transform);

            return {
                el: img,
                speed,
                originalX: matrix.m41 || 0,
                originalY: matrix.m42 || 0
            };
        });

        const handleMouseMove = throttle((event) => {
            const centerX = window.innerWidth / 2;
            const centerY = window.innerHeight / 2;

            const offsetX = (event.clientX - centerX) / centerX;
            const offsetY = (event.clientY - centerY) / centerY;

            imageData.forEach(({ el, speed, originalX, originalY }) => {
                const moveX = originalX - offsetX * speed;
                const moveY = originalY - offsetY * speed;

                gsap.to(el, {
                    x: moveX,
                    y: moveY,
                    ease: "power2.out",
                    duration: 0.5
                });
            });
        }, 50);

        currentMouseMoveHandler = handleMouseMove;
        document.addEventListener("mousemove", handleMouseMove);
    };

    const tl = gsap.timeline({ ease: "sine.out" });
    currentTimeline = tl;

    const img_1 = document.querySelector('.mouse_move_images img:nth-of-type(1)')
    const img_2 = document.querySelector('.mouse_move_images img:nth-of-type(2)')
    const img_3 = document.querySelector('.mouse_move_images img:nth-of-type(3)')

    if (window.innerWidth < 800) {
        if (img_1) {
            tl.fromTo(img_1,
                { x: '0%', y: '-101%' },
                { x: 0, y: '-71%', duration: 2 }, 0
            );
        }
        if (img_2) {
            tl.fromTo(img_2,
                { x: '30%', y: '-100%' },
                { x: 0, y: '-57%', duration: 2 }, 0
            );
        }
        if (img_3) {
            tl.fromTo(img_3,
                { x: '0%', y: '-94%' },
                { y: '-27%', duration: 1.8 }, 0
            );
        }
    } else {
        if (img_1) {
            tl.fromTo(img_1,
                { x: '0%', y: '-100%' },
                { x: 0, y: '-74%', duration: 2 }, 0
            );
        }
        if (img_2) {
            tl.fromTo(img_2,
                { x: '-40%', y: '-100%' },
                { x: 0, y: '-63%', duration: 2 }, 0
            );
        }
        if (img_3) {
            tl.fromTo(img_3,
                { y: '-100%' },
                { y: '-39%', duration: 1.8 }, 0
            );
        }
    
        tl.eventCallback("onComplete", mouse_move_image);
    }
    
};

document.addEventListener('DOMContentLoaded', run_intro_images_slide_in);
let lastWidth = window.innerWidth;

window.addEventListener('resize', () => {
    if (window.innerWidth !== lastWidth) {
        lastWidth = window.innerWidth;
        run_intro_images_slide_in();
    }
});

