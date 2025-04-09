<?php 
/**
 * Artists Of The Month Block template.
 *
 * @param array $block The block settings and attributes.
 */

// VARS
$small_title = esc_html(get_field('small_title'));
$large_title = esc_html(get_field('large_title'));
$icon = esc_url(get_field('icon'));
?>

<section>
    <div class="artists_of_the_month_parent max_width">
        <div id='artist_of_the_month'></div>
        <div class="title">
            <h3>
                <img class='mobile_icon' src="<?php echo $icon; ?>" alt="icon">
                <span><?php echo $small_title; ?></span>
            </h3>
            <h2>
                <img class='web_icon' src="<?php echo $icon; ?>" alt="icon">
                <span><?php echo $large_title; ?></span>
            </h2>
        </div>

        <div class="artists_container">
            <?php
            // WP_Query arguments
            $args = array(
                'post_type'      => 'artist',
                'posts_per_page' => 2,
            );

            // The Query
            $whats_on_query = new WP_Query($args);

            // The Loop
            if ($whats_on_query->have_posts()) :
                while ($whats_on_query->have_posts()) :
                    $whats_on_query->the_post();
                    $id = get_the_ID();
                    // Get the post content
                    $post_content = get_the_content();
                    // Parse the blocks within the post content
                    $blocks = parse_blocks($post_content);
                    // block fields
                    $title = $blocks[0]['attrs']['data']['title'];
                    $sub_title = $blocks[0]['attrs']['data']['sub_title'];
                    $image_id = $blocks[0]['attrs']['data']['image']; // Get the image ID
                    $image_url = wp_get_attachment_image_url($image_id, 'full');

                    // Access socials data
                    $socials = [];
                    for ($i = 0; $i < $blocks[0]['attrs']['data']['socials']; $i++) {
                        $social_image = isset($blocks[0]['attrs']['data']["socials_{$i}_image"]) ? $blocks[0]['attrs']['data']["socials_{$i}_image"] : '';
                        $social_url = isset($blocks[0]['attrs']['data']["socials_{$i}_url"]) ? $blocks[0]['attrs']['data']["socials_{$i}_url"] : '';
                        
                        if ($social_image && $social_url) {
                            $socials[] = [
                                'image' => wp_get_attachment_image_url($social_image, 'full'), // Get the full-size image URL
                                'url'   => $social_url,
                            ];
                        }
                    }
                    ?>

                    <div class="artist">
                        <p class='artist_title'><?php echo $title; ?></p>
                        
                        <img class='artist_image' src="<?php echo $image_url; ?>" alt="artist">

                        <?php if ($socials): ?>
                            <div class="socials">
                                <?php foreach ($socials as $social): ?>
                                    <a href="<?php echo esc_url($social['url']); ?>" target="_blank">
                                        <img src="<?php echo esc_url($social['image']); ?>" alt="social media link">
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <p class='artist_sub_title'><?php echo $sub_title; ?></p>
                    </div>

                <?php endwhile; ?>
                <!-- Restore original post data -->
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>

