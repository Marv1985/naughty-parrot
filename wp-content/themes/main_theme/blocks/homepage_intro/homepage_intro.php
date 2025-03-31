<?php 
/**
 * Homepage Intro Block template.
 *
 * @param array $block The block settings and attributes.
 */

// VARS
$header_image = esc_url(get_field('header_image'));
$mobile_image = esc_url(get_field('logo', 'option'));
$spinning_image_part_one = esc_url(get_field('spinning_image_part_one'));
$spinning_image_part_two = esc_url(get_field('spinning_image_part_two'));
?>

<div class="homepage_intro_parent">
    <?php get_template_part( 'template_parts/mouse_move_images'); ?>
    <div class="intro_container">
        <div class="intro_title_and_image">
            <img class='mobile_image' class='header_image' src="<?php echo $mobile_image; ?>" alt="Mobile image">
            <img class='header_image' src="<?php echo $header_image; ?>" alt="Intro header image">
            <a href='#artist_of_the_month' class="spinning_image_container">
                <img class='spinning_image' src="<?php echo $spinning_image_part_one; ?>" alt="User selected image">
                <img class='feathers' src="<?php echo $spinning_image_part_two; ?>" alt="User selected image">
            </a>
        </div>
        <!-- Buttons -->
        <div class="large_buttons max_width">
            <?php if( have_rows('large_buttons') ): ?>
                <?php while( have_rows('large_buttons') ): the_row(); 
                    $custom_url_or_page_link = get_sub_field('custom_url_or_page_link');
                    $page_link = esc_url(get_sub_field('page_link'));
                    $custom_url = esc_url(get_sub_field('custom_url'));
                    $button_text = esc_html(get_sub_field('button_text'));
                    $hover_color = esc_attr(get_sub_field('hover_color'));
                    ?>
                    <?php if($custom_url_or_page_link === 'Page Link'): ?>
                        <div class="large_buttons_button">
                            <a href="<?php echo $page_link; ?>" class='<?php echo $hover_color; ?>'>
                                <?php echo $button_text; ?>
                            </a>
                            <div class="after"></div>
                        </div>
                    <?php elseif($custom_url_or_page_link === 'Custom Url'): ?>
                        <div class="large_buttons_button">
                            <a href="<?php echo $custom_url; ?>" class='<?php echo $hover_color; ?>'>
                                <?php echo $button_text; ?>
                            </a>
                            <div class="after"></div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>


