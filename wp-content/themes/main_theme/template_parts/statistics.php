<div class="statistics_parent">
    <div class="max_width">
        <?php if( have_rows('statistics', 'option') ): ?>
            <?php while( have_rows('statistics', 'option') ): the_row(); 
                $figure = esc_html(get_sub_field('figure'));
                $notation = esc_html(get_sub_field('notation'));
                $text = esc_html(get_sub_field('text'));
                $image_id = get_sub_field('image'); 
                $image_url = wp_get_attachment_url($image_id);
                ?>
                <div class="stat">
                    <p class="counter" data-number="<?php echo $figure; ?>">
                        <?php if($figure): ?>
                        0
                        <?php endif; ?>
                        <?php if($notation): ?>
                            <span><?php echo $notation; ?></span>
                        <?php endif; ?>
                    </p>
                    <?php if($image_id): ?>
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
                    <?php endif; ?>
                    <p><?php echo $text; ?></p>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>