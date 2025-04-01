<?php 
/**
 * Image Slider Block template.
 *
 * @param array $block The block settings and attributes.
 */

// VARS

?>

<section>
    <div class="image_slider_parent">
        <?php if( have_rows('image_slider') ): ?>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php while( have_rows('image_slider') ): the_row(); 
                        $image = esc_url(get_sub_field('image'));
                        $orientation = esc_attr(get_sub_field('orientation'));
                        ?>
                        <div class="swiper-slide <?php echo $orientation; ?>">
                            <img src="<?php echo $image; ?>" alt="User selected image">
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>



    
 