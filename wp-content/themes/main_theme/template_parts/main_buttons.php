

<div class="main_buttons_parent">
    <?php if( have_rows('main_buttons') ): ?>
        <?php while( have_rows('main_buttons') ): the_row(); 
            $button_type = get_sub_field('button_type');
            $page_link = esc_url(get_sub_field('page_link'));
            $custom_url = esc_url(get_sub_field('custom_url'));
            $button_text = esc_html(get_sub_field('button_text'));
            $button_color = esc_attr(get_sub_field('button_color'));
            ?>
            <?php if($button_type === 'Page Link'): ?>
                <a class='<?php echo $button_color; ?> button' href="<?php echo $page_link; ?>"><?php echo $button_text; ?></a>
            <?php elseif($button_type === 'Custom Url'): ?>
                <a class='<?php echo $button_color; ?> button' href="<?php echo $custom_url; ?>"><?php echo $button_text; ?></a>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
</div>