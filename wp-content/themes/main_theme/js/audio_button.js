const audio_button = () => {
    const audio_buttons = document.querySelectorAll('.audio_button');

    if (!audio_buttons.length) return; 

    const unmuteAudio = () => {
        const audio = document.querySelector("audio");
        if (audio.paused) {
            audio.play();  
        } else {
            audio.pause();
        }
    }

    audio_buttons.forEach((audio_button) => {
        const play_pause_button = audio_button.querySelector('.play_pause_button');

        play_pause_button.addEventListener('click', () => {
            unmuteAudio();
            // Toggle the 'playing' class on all play/pause buttons
            const allPlayPauseButtons = document.querySelectorAll('.play_pause_button');
            allPlayPauseButtons.forEach(btn => btn.classList.toggle('playing'));
        });

        const audio_button_swiper = audio_button.querySelector('.swiper');

        const swiper = new Swiper(audio_button_swiper, {
            spaceBetween: 10,
            loop: true,
            speed: 20000,                                                              
            slidesPerView: 'auto',
            updateOnWindowResize: true,
            autoplay: {
                delay: 0
            },
            allowTouchMove: false
        });
    });
};

document.addEventListener('DOMContentLoaded', audio_button);
