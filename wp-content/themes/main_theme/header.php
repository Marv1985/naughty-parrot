<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favi.ico" sizes="any">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favi.png" sizes="16x16">
		<link rel="icon" type="image/apng" href="<?php echo get_template_directory_uri(); ?>/img/favi.apng">


		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body id='top_of_page' <?php body_class(); ?>>

	<?php 
		$logo = esc_url(get_field('logo', 'option'));
		$mobile_logo = esc_url(get_field('mobile_logo', 'option'));
		$mobile_logo_svg = file_get_contents($mobile_logo);
	?>

		
			<header class="header" role="banner">
				<?php get_template_part( 'template_parts/menu'); ?>
				<div class="max_width">
					<a class='web_logo' href="<?php echo home_url(); ?>"><img src="<?php echo $logo; ?>" alt="logo"></a>
					<a class='mobile_logo' href="<?php echo home_url(); ?>"><?php echo $mobile_logo_svg; ?></a>
					<div class="right_side">
						<?php if(!is_page('86')): ?>
							<?php get_template_part( 'template_parts/dark_mode_button'); ?>
						<?php endif; ?>
						<?php get_template_part( 'template_parts/menu_button'); ?>
					</div>
				</div>
			</header>

			<div class="center_buttons">
				<div class="max_width">
					<?php get_template_part( 'template_parts/audio_button'); ?>
					<div class="socials">
						<?php if( have_rows('socials', 'option') ): ?>
							<?php while( have_rows('socials', 'option') ): the_row(); 
								$icon = esc_url(get_sub_field('icon'));
								$url = esc_url(get_sub_field('url'));
								?>
								<a target='_blank' href="<?php echo $url; ?>">
									<img src="<?php echo $icon; ?>" alt="socials">
								</a>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>  
				</div>
			</div>
			
			<?php get_template_part( 'template_parts/mobile_bottom_fixed_buttons'); ?>
