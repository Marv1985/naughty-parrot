<div class="statistics_parent">
    <div class="max_width">
        <?php if( have_rows('statistics', 'option') ): ?>
            <?php while( have_rows('statistics', 'option') ): the_row(); 
                $figure = esc_html(get_sub_field('figure'));
                $notation = esc_html(get_sub_field('notation'));
                $text = esc_html(get_sub_field('text'));
                ?>
                <div class="stat">
                    <p class="counter" data-number="<?php echo $figure; ?>">
                        0
                        <?php if($notation): ?>
                            <span><?php echo $notation; ?></span>
                        <?php endif; ?>
                    </p>
                    <p><?php echo $text; ?></p>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>