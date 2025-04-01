<?php 
/**
 * Banner Slider Block template.
 *
 * @param array $block The block settings and attributes.
 */

// VARS

?>

<section>
    <div class="banner_slider_parent">
        <?php if( have_rows('banner_slider') ): ?>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php while( have_rows('banner_slider') ): the_row(); 
                        $icon = esc_url(get_sub_field('icon'));
                        $url = esc_url(get_sub_field('url'));
                        $text = esc_html(get_sub_field('text'));
                        ?>
                        <div class="swiper-slide">
                            <a href="<?php echo $url; ?>">
                                <img src="<?php echo $icon; ?>" alt="User selected image">
                                <?php echo $text; ?>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
