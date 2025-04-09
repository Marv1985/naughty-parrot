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

                $text = esc_html(get_sub_field('text'));
                $button_text = esc_html(get_sub_field('button_text'));
                $button_url = esc_url(get_sub_field('button_url'));
            ?>
                <a class="podcast" href="<?php echo $button_url; ?>" target="_blank">
                    <?php 
                    // Check if the image is an SVG
                    $response = wp_remote_get($image_url);

                    if (is_wp_error($response)) {
                        echo '<img src="' . esc_url($image_url) . '" alt="user selected image">';
                    } else {
                        $svg_contents = wp_remote_retrieve_body($response);
                        if (strpos($svg_contents, '<svg') !== false) {
                            echo $svg_contents;
                        } else {
                            echo '<img src="' . esc_url($image_url) . '" alt="user selected image">';
                        }
                    }

                    ?>
                    <p class="podcast_title"><?php echo $text; ?></p>
                    <p class="podcast_button"><?php echo $button_text; ?></p>
                </a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
