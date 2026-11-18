<?php
	if( have_rows('components') ) {
    while ( have_rows('components') ) { the_row();
        
		// Case: Header Slider
		if( get_row_layout() == 'slider' ) {
		include(__DIR__ . '/component-content-styles.php');
			$slides = get_sub_field('slides');
			$slide_effect = get_sub_field('slide_effect');

			$i = 0;
			if($slides) {
		?>
		
		<div class="swiper mainHeaderSwiper">
    		<div class="swiper-wrapper">
			
			<?php
			foreach($slides as $slide) {
				$background = $slide['background'];
				$title = $slide['title'];
				$description = $slide['description'];
				$button_text = $slide['button_text'];
				$button_url = $slide['button_url'];
				$button_text_2 = $slide['button_text_2'];
				$button_url_2 = $slide['button_url_2'];
				
				include(__DIR__ . '/component-header.php');
				
				}?>
		
			</div>
			
			<div class="swiper-button-next text-white"></div>
    		<div class="swiper-button-prev text-white"></div>
		
		</div>
		
		<?php $i++; }}?>
		
		<?php
		// Case: About
		if( get_row_layout() == 'about' ) {
			include(__DIR__ . '/component-content-styles.php');
			$image_position = get_sub_field('image_position');
			$images = get_sub_field('images');
			$content = get_sub_field('content');
			$title = $content['title'];
			$description = $content['description'];
			$button_text = $content['button_text'];
			$button_url = $content['button_url'];
			include(__DIR__ . '/component-about.php');	
		}?>
		
		<?php
		// Case: Services
		if( get_row_layout() == 'services' ) {
			include(__DIR__ . '/component-content-styles.php');
			include(__DIR__ . '/component-section-content.php');
			$columns = get_sub_field('columns');
			$cards = get_sub_field('cards');
			include(__DIR__ . '/component-services.php');		
		}?>
		
		<?php
		// Case: Gallery
		if( get_row_layout() == 'gallery' ) {
			include(__DIR__ . '/component-content-styles.php');
			include(__DIR__ . '/component-section-content.php');
			$columns = get_sub_field('columns');
			$gallery = get_sub_field('gallery');
			include(__DIR__ . '/component-gallery.php');	
		}?>
		
		<?php
		// Case: FAQ
		if( get_row_layout() == 'faqs' ) {
			include(__DIR__ . '/component-content-styles.php');
			include(__DIR__ . '/component-section-content.php');
			$columns = get_sub_field('columns');
			$heading_color_open = get_sub_field('heading_color_open');
				$background_open = $heading_color_open['background'];
				$text_open = $heading_color_open['text'];
			$heading_color_closed = get_sub_field('heading_color_closed');
				$background_closed = $heading_color_closed['background'];
				$text_closed = $heading_color_closed['text'];
			$faq = get_sub_field('faq');
			include(__DIR__ . '/component-faq.php');	
		}?>
		
		<?php
		// Case: Reviews
		if( get_row_layout() == 'reviews' ) {
			include(__DIR__ . '/component-content-styles.php');
			include(__DIR__ . '/component-section-content.php');
			$title = get_sub_field('title');
			$subtitle = get_sub_field('subtitle');
			include(__DIR__ . '/component-reviews.php');	
		}?>
		
		<?php
		// Case: Contact
		if( get_row_layout() == 'contact' ) {
			include(__DIR__ . '/component-content-styles.php');
			$icon = get_sub_field('icon');
				$icon_color = $icon['color'];
				$icon_text_color = $icon['text_color'];
			
			if($icon_color) {
				$i_color = "style='color: " . $icon_color . ";'";
			}
			
			if($icon_text_color) {
				$it_color = "style='color: " . $icon_text_color . ";'";
			}
			
			$form = get_sub_field('form');
				$background = $form['background'];
				$label_color = $form['label_color'];
				$title = $form['title'];
				$subtitle = $form['subtitle'];

			include(__DIR__ . '/component-contact.php');	
		}?>
		
		<?php
		// Case: Custom Template
		if( get_row_layout() == 'custom_template' ) {
			include(__DIR__ . '/component-content-styles.php');
			include(__DIR__ . '/component-section-content.php');
			$custom_template = get_sub_field('template_name');
			include(__DIR__ . '/component-' . $custom_template . '.php');	
		}?>
				
<?php }};?>

<!-- Initialize Swiper -->
<script>
	var swiper = new Swiper(".mainHeaderSwiper", {
		effect: "<?php echo $slide_effect;?>",
		//autoHeight: true,
		loop: true,
		speed: 1500,
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	});
</script>