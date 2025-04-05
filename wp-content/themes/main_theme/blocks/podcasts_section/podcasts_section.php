<?php 
/**
 * Podcasts Section Block template.
 *
 * @param array $block The block settings and attributes.
 */

// VARS

?>

<section>
    <div class="podcasts_parent max_width">
        <?php if (have_rows('podcasts')) : ?>
            <?php while (have_rows('podcasts')) : the_row(); 
                $image_id = get_sub_field('image'); 
                $image_url = wp_get_attachment_url($image_id);
                $filetype = wp_check_filetype($image_url);

                $text = esc_html(get_sub_field('text'));
                $button_text = esc_html(get_sub_field('button_text'));
                $button_url = esc_url(get_sub_field('button_url'));
            ?>
                <a class="podcast" href="<?php echo $button_url; ?>" target="_blank">
                    <?php 
                    // Check if the image is an SVG
                    if ($filetype['ext'] === 'svg') {
                        // Get the SVG contents and output it inline
                        echo file_get_contents($image_url);
                    } else {
                        // Output a normal <img> tag for non-SVG images
                        echo '<img src="' . esc_url($image_url) . '" alt="user selected image">';
                    }
                    ?>
                    <p class="podcast_title"><?php echo $text; ?></p>
                    <p class="podcast_button"><?php echo $button_text; ?></p>
                </a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
