<?php 
/**
 * Title and Text Area Block template.
 *
 * @param array $block The block settings and attributes.
 */

// VARS
$title = esc_html(get_field('title'));
$text_area_wysiwyg = wp_kses_post(get_field('text_area_wysiwyg'));
$dark_or_light_only = esc_attr(get_field('dark_or_light_only'));
?>

<?php if (is_page('84')): ?>
    <?php if ($dark_or_light_only === 'Party'): ?>
        <section class='party_theme'>
    <?php elseif ($dark_or_light_only === 'Chill'): ?>
        <section class='chill_theme'>
    <?php else: ?>
        <section class="about_us_page">
    <?php endif; ?>
<?php else: ?>
    <section>
<?php endif; ?>
    <div class="title_and_text_area_parent max_width">
        <?php if($title): ?>
            <h3><?php echo $title; ?></h3>
        <?php endif; ?>
        <?php if($text_area_wysiwyg): ?>
            <?php echo $text_area_wysiwyg; ?>
        <?php endif; ?>
    </div>
</section>
