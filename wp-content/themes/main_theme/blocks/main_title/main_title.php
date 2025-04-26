<?php 
/**
 * Main Title Block template.
 *
 * @param array $block The block settings and attributes.
 */

// VARS
$header = esc_html(get_field('header'));
$sub_title = esc_html(get_field('sub_title'));
$margin_bottom = esc_attr(get_field('margin_bottom'));
$hide_intro_images = esc_attr(get_field('hide_intro_images'));
$dark_or_light_only = get_field('dark_or_light_only');
?>

<?php if (is_page('84')): ?>
    <?php if ($dark_or_light_only === 'Party'): ?>
        <section class='party_theme'>
    <?php elseif ($dark_or_light_only === 'Chill'): ?>
        <section class='chill_theme'>
    <?php else: ?>
        <section style='display: none;'>
    <?php endif; ?>
<?php else: ?>
    <section>
<?php endif; ?>

    <div class="main_title_parent <?php echo $margin_bottom ? 'margin_bottom' : ''; ?>">
        <div>
        <?php get_template_part( 'template_parts/mouse_move_images'); ?>
        </div>
        <div class="title_container max_width">
            <h1><?php echo $header; ?></h1>
            <?php if($sub_title): ?>
            <h3><?php echo $sub_title; ?></h3>
            <?php endif; ?>
        </div>
        <?php if(is_page('84')): ?>
            <div class="theme_switch_button">
                <?php get_template_part( 'template_parts/dark_mode_button'); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
