<?php 
/**
 * Large Title Icon and Button Block template.
 *
 * @param array $block The block settings and attributes.
 */

// VARS
$small_title_p1 = esc_html(get_field('small_title_p1'));
$small_title_p2 = esc_html(get_field('small_title_p2'));
$large_title = wp_kses_post(get_field('large_title'));
$icon = esc_url(get_field('icon'));
?>

<section>
    <div class="large_title_icon_and_button_parent max_width">
        <h3>
            <?php echo $small_title_p1; ?>
            <span><?php echo $small_title_p2; ?></span>
            <img class='icon' src="<?php echo $icon; ?>" alt="icon">
        </h3>
        <h2><?php echo $large_title; ?></h2>
        <?php get_template_part( 'template_parts/main_buttons'); ?>
    </div>
</section>
