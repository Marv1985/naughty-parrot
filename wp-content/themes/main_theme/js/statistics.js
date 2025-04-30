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
        const endValue = parseFloat(el.getAttribute('data-number'));
    
        // Skip if endValue is not a valid number
        if (isNaN(endValue)) return;
    
        const target = { val: 0 };
        const notation = el.querySelector('span')?.outerHTML || '';
    
        tl.to(target, {
            val: endValue,
            duration: 3,
            delay: index * 0.7,
            onUpdate: () => {
                const currentVal = typeof target.val === 'number' ? target.val : 0;
                el.innerHTML = `${Number.isInteger(endValue) ? Math.round(currentVal) : currentVal.toFixed(1)} ${notation}`;
            },
        }, 0);
    });
    
};

document.addEventListener('DOMContentLoaded', statistics);
