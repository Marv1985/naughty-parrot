
<div class="socials">
    <?php if( have_rows('socials') ): ?>
        <?php while( have_rows('socials') ): the_row(); 
            $icon = esc_url(get_sub_field('icon'));
            $url = esc_url(get_sub_field('url'));
            ?>
            <a target='_blank' href="<?php echo $url; ?>">
                <img src="<?php echo $icon; ?>" alt="socials">
            </a>
        <?php endwhile; ?>
    <?php endif; ?>
</div>  