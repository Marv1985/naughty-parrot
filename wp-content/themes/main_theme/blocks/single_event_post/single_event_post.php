<?php 
/**
 * Single Event Post Block template.
 *
 * @param array $block The block settings and attributes.
 */

// VARS
$date = get_field('date');
if ($date) {
    $formatted_date = date_i18n('l jS F Y', strtotime($date));
}

$image = esc_url(get_field('image'));
$title = esc_html(get_field('title'));
$text_area = wp_kses_post(get_field('text_area'));
$place_url = esc_url(get_field('place_url'));
$place = esc_html(get_field('place'));
$image = esc_url(get_field('image'));
$price = esc_html(get_field('price'));
$tickets_url = esc_html(get_field('tickets_url'));
$tickets_text = esc_html(get_field('tickets_text'));

// Get taxonomies associated with the "event" post type (replace 'event' with your custom post type slug)
$post_type = 'event';
$taxonomies = get_object_taxonomies($post_type, 'names');

?>

<section>

    <div class="single_event_post_parent max_width">
        <img src="<?php echo $image; ?>" alt="User selected image">

        <div class="content_area">
            <div class="left">
                <h1><?php echo $title ?></h1>
                <?php echo $text_area; ?>
            </div>
            <div class="right">

                <?php 
                    foreach ($taxonomies as $taxonomy) {
                        $terms = get_the_terms(get_the_ID(), $taxonomy);
                        if ($terms && ! is_wp_error($terms)) {
                            echo '<span class="category">' . ucfirst($taxonomy) . '</span>';
                        }
                    }
                ?>
                <p><?php echo esc_html($formatted_date); ?></p>
                <a class='place' href='<?php echo $place_url ? $place_url : ""; ?>' target='_blank'>
                    <div class="location_dot">
                        <span></span>
                    </div>
                    <?php echo $place; ?>
                </a>
                <p><?php echo $price; ?></p>
                
               

                <?php if($tickets_url): ?>
                <a class="Fill Border button" href="<?php echo $tickets_url; ?>"><?php echo $tickets_text; ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
