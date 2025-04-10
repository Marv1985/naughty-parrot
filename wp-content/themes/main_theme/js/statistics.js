const statistics = () => {
    const statisticsParent = document.querySelector('.statistics_parent');

    if (!statisticsParent) return;

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: statisticsParent,
            start: '50% bottom',
            // markers: true,
            toggleActions: 'play none none none',
            once: true,
        },
    });

    gsap.utils.toArray('.counter').forEach((el, index) => {
        const target = { val: 0 };
        const endValue = parseFloat(el.getAttribute('data-number'));
        const notation = el.querySelector('span')?.outerHTML || ''; // Preserve notation

        tl.to(target, {
            val: endValue,
            duration: 3,
            delay: index * 0.7,
            onUpdate: () => {
                el.innerHTML = `${Number.isInteger(endValue) ? Math.round(target.val) : target.val.toFixed(1)} ${notation}`;
            },
        }, 0);
    });
};

document.addEventListener('DOMContentLoaded', statistics);
