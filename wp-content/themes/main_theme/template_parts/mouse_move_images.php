<div class="mouse_move_images">
    <?php if( have_rows('images_repeater') ): ?>
        <?php 
        $index = 0;
        while( have_rows('images_repeater') ): the_row(); 
            $image = esc_url(get_sub_field('image'));
            $speed = ($index + 0.1); // Adjust multiplier as needed
            ?>
            <img src="<?php echo $image; ?>" alt="user selected image" class="parallax-img" data-speed="<?php echo $speed; ?>">
        <?php 
            $index++;
        endwhile; 
        ?>
    <?php endif; ?>
</div>
