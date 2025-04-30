<?php 
    $header = esc_html(get_field('header', 'option'));
    $footer_logo = esc_url(get_field('footer_logo', 'option'));
    $telephone_number = esc_attr(get_field('telephone_number', 'option'));
    $email = esc_attr(get_field('email', 'option'));
    $address_url = esc_url(get_field('address_url', 'option'));
    $address = wp_kses_post(get_field('address', 'option'));
?>

<div class="footer_form_parent max_width">
    <h2><?php echo $header; ?></h2>
    
    <div class="form">FORM GOES HERE</div>

    <div class="navigation">

        <a class='footer_logo' href="<?php echo home_url(); ?>">
            <img src="<?php echo $footer_logo; ?>" alt="logo">
        </a>

        <div class="nav_links">
            <h3>LEARN MORE</h3>
            <?php learn_more(); ?>
        </div>

        <div class="nav_links">
            <h3>GET INVOLVED</h3>
            <?php get_involved(); ?>
        </div>

        <div id="contact" class="nav_links contact">
            <h3>GET IN TOUCH</h3>
            <?php if($address): ?>
                <a class="address" href="<?php echo $address_url; ?>" target="_blank"><?php echo $address; ?></a>
            <?php endif; ?>
            <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
            <?php if($telephone_number): ?>
                <a href="tel:<?php echo $telephone_number; ?>"><?php echo $telephone_number; ?></a>
            <?php endif; ?>
        </div>

        <div class="back_to_top">
            <a href='#top-of-page'>
                BACK<br>
                TO TOP
            </a>
        </div>

    </div>
</div>