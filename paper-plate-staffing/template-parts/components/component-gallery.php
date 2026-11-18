<section id="cmg-gallery" class="px-3 py-4 p-lg-5 position-relative <?php echo $background_class;?>" <?php echo $bg;?>>
	<div class="container py-4 py-lg-5 position-relative z-front">
       
		<?php include(__DIR__ . '/component-section-heading.php');?>
		
		<div class="row row-cols-2 row-cols-lg-<?php echo $columns;?> g-4">
            <?php
			$containers_radius = get_field('cmg_styles_containers_radius' , 'option');
			if($containers_radius) {
				$c_radius = "style='border-radius: " . $containers_radius . "px;'";
			}
			$containers_shadow = get_field('cmg_styles_containers_shadow' , 'option');
			if($gallery) {
			foreach($gallery as $image_id) {?>
			<div class="col">
				<a href="<?php echo bcb_image_url($image_id);?>" data-fancybox="gallery">
					<img src="<?php echo bcb_image_url($image_id, 'medium_large');?>" alt="<?php echo bcb_image_alt($image_id);?>" class="w-100 object-fit mh-300 p-2 bg-white <?php echo $containers_shadow;?>" <?php echo $c_radius;?>/>
				</a>
			</div>
			<?php }}?>
		</div>
		
		<?php include(__DIR__ . '/component-section-button.php');?>
	
	</div>
	
	<?php
	if($background_overlay) {?>
	<div class="overlay position-absolute z-back" style="background: <?php echo $background_overlay;?>"></div>
	<?php }?>

</section>