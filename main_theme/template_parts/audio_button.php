<?php 
    $audio_file = esc_url(get_field('audio', 'option'));
    $title = esc_html(get_field('title', 'option'));
    $svg_file = get_template_directory() . '/img/play-icon.svg'; 
    $svg_content = file_get_contents($svg_file);
?>

<div class="audio_button_container">
    <audio class='audio' loop>
        <source src="<?php echo esc_url($audio_file); ?>" type="audio/mpeg">
        Your browser does not support the audio tag.
    </audio>
    <div class="audio_button">
        <button class="play_pause_button">
            <div class="pause">
                <hr>
                <hr>
            </div>
            <div class="play">
                <?php echo $svg_content; ?>
            </div>
        </button>
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <p><?php echo $title; ?></p>
                </div>
                <div class="swiper-slide">
                    <p><?php echo $title; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
    