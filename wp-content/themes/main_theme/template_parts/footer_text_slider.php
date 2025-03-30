<div class="footer_text_slider_parent">
    <?php if( have_rows('text_slider', 'option') ): ?>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php while( have_rows('text_slider', 'option') ): the_row(); 
                    $text = esc_html(get_sub_field('text'));
                    ?>
                    <div class="swiper-slide">
                        <p><?php echo $text; ?></p>
                        <span class='dot'></span>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
 
  