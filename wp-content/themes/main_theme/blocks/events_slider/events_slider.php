<?php 
/**
 * Events Slider Block template.
 *
 * @param array $block The block settings and attributes.
 */

// VARS
$title = esc_html(get_field('title'));
?>

<section>
    <div class="events_slider_parent">
        <div class="max_width events_slider_header">
            <h2><?php echo $title; ?></h2>
            <?php get_template_part( 'template_parts/main_buttons'); ?>
        </div>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php
                // WP_Query arguments
                $args = array(
                    'post_type'      => 'event',
                    'posts_per_page' => 6,
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
                        $post_type = 'event';
                        $taxonomies = get_object_taxonomies($post_type, 'names');
                        $date = $blocks[0]['attrs']['data']['date'];
                        if ($date) {
                            $formatted_date = date_i18n('l jS F Y', strtotime($date));
                        }
                        $place_url = $blocks[0]['attrs']['data']['place_url'];
                        $place = $blocks[0]['attrs']['data']['place'];
                        $price = $blocks[0]['attrs']['data']['price'];
                        $title = $blocks[0]['attrs']['data']['title'];
                        $tickets_url = $blocks[0]['attrs']['data']['tickets_url'];
                        $tickets_text = $blocks[0]['attrs']['data']['tickets_text'];

                        $image_id = $blocks[0]['attrs']['data']['image']; // Get the image ID
                        $image_url = wp_get_attachment_image_url($image_id, 'full');
                        ?>

                        <div class="swiper-slide">
                            <!-- INFO -->
                            <div class="info">
                                <div class='left_side'>
                                    <span class='category'>
                                        <?php 
                                        foreach ($taxonomies as $taxonomy) {
                                            $terms = get_the_terms(get_the_ID(), $taxonomy);
                                            if ($terms && ! is_wp_error($terms)) {
                                                echo ucfirst($taxonomy);
                                            }
                                        }
                                            ?>
                                    </span>
                                    <p class='date'><?php echo esc_html($formatted_date); ?></p>
                                    <a class='place' href='<?php echo $place_url ? $place_url : ""; ?>' target='_blank'>
                                        <div class="location_dot">
                                            <span></span>
                                        </div>
                                        <?php echo $place; ?>
                                    </a>
                                </div>
                                <p class='web_tickets'><?php echo $price; ?></p>
                            </div>
                            <!-- TITLE -->
                            <div class="title">
                                <h3><?php echo $title; ?></h3>
                                <p class='mobile_tickets'><?php echo $price; ?></p>
                                <div class="other_buttons">
                                    <a class="permalink White Border button" href="<?php the_permalink(); ?>">
                                        More Info
                                    </a>
                                    <?php if($tickets_url): ?>
                                    <a class="Fill Border button" href="<?php echo $tickets_url; ?>"><?php echo $tickets_text; ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- IMAGE -->
                            <div class="image">
                                <img src="<?php echo esc_url($image_url); ?>" alt="Event Image">
                            </div>
                        </div>
                        
                    <?php
                    endwhile;
                    // Restore original post data
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <?php get_template_part( 'template_parts/slider_buttons'); ?>
        </div>
    </div>
</section>