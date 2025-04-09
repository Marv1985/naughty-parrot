<?php 
/**
 * Events themed Section Block template.
 *
 * @param array $block The block settings and attributes.
 */

// VARS
$dark_or_light_only = esc_attr(get_field('dark_or_light_only'));
$taxonomy_slug = strtolower($dark_or_light_only);
?>


<?php if (is_page('86')): ?>
    <?php if ($dark_or_light_only === 'Party'): ?>
        <section class='party_theme'>
    <?php elseif ($dark_or_light_only === 'Chill'): ?>
        <section class='chill_theme'>
    <?php else: ?>
        <section class="events_page">
    <?php endif; ?>
<?php else: ?>
    <section>
<?php endif; ?>
    <div class="events_themed_parent">
        
            <?php
            // WP_Query arguments
            $args = array(
                'post_type'      => 'event',
                'posts_per_page' => -1,
                'tax_query'      => array(
                    array(
                        'taxonomy' => $taxonomy_slug,
                        'operator' => 'EXISTS',
                    ),
                ),
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

                    <div class="event_section">
                        <div class="container max_width">
                            <div class="top">
                                <div class="left">
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
                                <div class="right">
                                    <p class='web_tickets'><?php echo $price; ?></p>
                                </div>
                            </div>
                            <div class="bottom">
                                    <h3><?php echo $title; ?></h3>
                                    <div class="other_buttons">
                                    <a class="permalink White Border button" href="<?php the_permalink(); ?>">
                                        More Info
                                    </a>
                                    <a class="Fill Border button" href="<?php echo $tickets_url; ?>"><?php echo $tickets_text; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <?php
                endwhile;
                // Restore original post data
                wp_reset_postdata();
            endif;
        ?>
    </div>
</section>
