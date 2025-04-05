<?php 
/**
 * Single Artist Post Block template.
 *
 * @param array $block The block settings and attributes.
 */

// VARS
$title = esc_html(get_field('title'));
$sub_title = esc_html(get_field('sub_title'));
$image = esc_url(get_field('image'));
?>

<section>
    <div class="single_artist_post_parent max_width">
        <h1><?php echo $title; ?></h1>
        <p><?php echo $sub_title; ?></p>
        <img src="<?php echo $image; ?>" alt="artist">

        <?php if( have_rows('socials') ): ?>
            <?php while( have_rows('socials') ): the_row(); 
                $image = esc_url(get_sub_field('image'));
                $url = esc_url(get_sub_field('url'));
                ?>
                <a href="<?php echo $url; ?>">
                    <img src="<?php echo $image; ?>" alt="social media link">
                </a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>