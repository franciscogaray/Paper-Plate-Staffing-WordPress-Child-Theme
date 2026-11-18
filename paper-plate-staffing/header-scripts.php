<?php
	// Colors
	$primary_color = get_field('cmg_styles_colors_primary' , 'option');
	$secondary_color = get_field('cmg_styles_colors_secondary' , 'option');
	$dark_color = get_field('cmg_styles_colors_dark' , 'option');
	
	// Button
	$button_primary_text = get_field('cmg_styles_button_primary_text' , 'option');
	$button_secondary_text = get_field('cmg_styles_button_secondary_text' , 'option');
	$button_case = get_field('cmg_styles_button_case' , 'option');
	$button_radius = get_field('cmg_styles_button_radius' , 'option');
	$button_weight = get_field('cmg_styles_button_weight' , 'option');
	$button_size = get_field('cmg_styles_button_size' , 'option');
	$button_padding_x = get_field('cmg_styles_button_padding_x' , 'option');
	$button_padding_y = get_field('cmg_styles_button_padding_y' , 'option');
	$button_font_style = get_field('cmg_styles_button_font_style' , 'option');
	
	if( $button_font_style == "Header") {
		$font_style = "--cmg-font-header";
	} else {
		$font_style = "--cmg-font-body";
	}
	
	// Fonts
	$header_font = get_field('cmg_styles_fonts_header' , 'option');
	$body_font = get_field('cmg_styles_fonts_body' , 'option');
	
	// Font Scripts
	echo get_field('cmg_styles_fonts_scripts' , 'option');
	
	// Logo Size
	$logo_desktop_size = get_field('cmg_navbar_logo_desktop_size' , 'option');
	$logo_mobile_size = get_field('cmg_navbar_logo_mobile_size' , 'option');
	
	// Navbar
	$cmg_navbar = get_field('cmg_navbar' , 'option');
		$main = $cmg_navbar['main'];
		$main_text = $main['text'];
		$main_case = $main['case'];
		$main_custom_text_color = $main['custom_text_color'];

		if($main_text == "custom") {
			$main_custom_text = $main_custom_text_color;
		} else {
			$main_custom_text = "var(--" . $main_text . ")";
		}
?>

<style>
	:root {
		--cmg-primary: <?php echo $primary_color;?>;
		--cmg-secondary: <?php echo $secondary_color;?>;
		--cmg-dark: <?php echo $dark_color;?>;
		--cmg-font-header: <?php echo $header_font;?>;
		--cmg-font-body: <?php echo $body_font;?>;
	}
	
	@font-face {
		font-family: 'Kostic Roc Grotesk';
		src: url('/wp-content/themes/paper-plate-staffing/fonts/kostic-roc-grotesk.woff2') format('woff2'),
			 url('/wp-content/themes/paper-plate-staffing/fonts/kostic-roc-grotesk.woff2') format('woff');
		font-weight: normal;
		font-style: normal;
	}
	
	#navbar-main-menu .nav-link:before {
		content: '';
		position: absolute;
		height: 2px;
		width: 0;
		background: var(--cmg-primary);
		bottom: 0;
		transition: all .3s;
		left: 50%;
		transform: translatex(-50%);
	}

	#navbar-main-menu .nav-link:hover:before {
		width: 80%;
	}
	
	#navbar-main-menu .nav-link {
		color: <?php echo $main_custom_text;?>!important;
		text-transform: <?php echo $main_case;?>!important;
		position: relative!important;
	}

	#navbar-main-menu .nav-item:last-child .nav-link {
		background: var(--cmg-primary);
		font-weight: <?php echo $button_weight;?>!important;
		border-radius: <?php echo $button_radius;?>px!important;
		margin-left: 15px;
		padding-left: <?php echo $button_padding_x;?>px;
		padding-right: <?php echo $button_padding_x;?>px;
		text-transform: <?php echo $button_case;?>!important;
		color: <?php echo $button_primary_text;?>!important;
	}
	
	#navbar-brand-logo img {
		padding-top: 15px;
		padding-bottom: 15px;
	}
	
	@media (min-width: 992px) {
		#navbar-brand-logo img {
			display: none;
		}

		.navbar-nav img {
			width: 250px;
			padding: 15px;
		}

		#navbar-main-menu .navbar-nav {
			margin-left: 0 !important;
			margin-right: 0;
		}

		.navbar-nav li {
			margin-top: auto;
			margin-bottom: auto;
		}
		
		#menu-item-528 .nav-link:before {
			display: none;
		}
		
		li#menu-item-528 {
			margin-left: 185px;
			margin-right: 125px;
		}
	}
	
	.btn {
		font-family: var(<?php echo $font_style;?>)!important;
		font-weight: <?php echo $button_weight;?>!important;
		border-radius: <?php echo $button_radius;?>px!important;
		padding: <?php echo $button_padding_y;?>px <?php echo $button_padding_x;?>px!important;
		font-size: <?php echo $button_size;?>px!important;
		text-transform: <?php echo $button_case;?>!important;
	}
	
	.has-form .wpforms-submit {
		border-radius: <?php echo $button_radius;?>px!important;
	}
	
	.cmg-btn-primary {
		background-color: var(--cmg-primary)!important;
		color: <?php echo $button_primary_text;?>!important;
	}

	.cmg-btn-primary:hover {
		background-color: var(--cmg-primary)!important;
		color: <?php echo $button_primary_text;?>!important;
	}

	.cmg-btn-secondary {
		background-color: var(--cmg-secondary)!important;
		color: <?php echo $button_secondary_text;?>!important;
	}

	.cmg-btn-secondary:hover {
		background-color: var(--cmg-secondary);
		color: <?php echo $button_secondary_text;?>!important;
	}
	
	.rounded-lg {
		border-radius: <?php echo $button_radius;?>px!important;
	}
	
	@media (max-width: 992px) {
		
		#navbar-brand-logo img {
			width: <?php echo $logo_mobile_size;?>px;
		}
		
		#navbar-main-menu .nav-item .nav-link {
			margin-left: 10px;
			display: inline-block
		}
		
		#navbar-main-menu .nav-item:last-child .nav-link {
			display: inline-block;
			margin-bottom: 20px;
			margin-top: 10px;
			margin-left: 10px;
		}
		
		#navbar-main-menu .nav-link:before {
			content: '';
			position: absolute;
			height: 2px;
			width: 0;
			background: var(--cmg-primary);
			bottom: 0;
			transition: all .3s;
			left: 0%;
			transform: translatex(0%);
		}

		#navbar-main-menu .nav-link:hover:before {
			width: 100%;
		}
		
		#navbar-main-menu .nav-item:last-child .nav-link:before {
			display: none;
		}
	}
</style>