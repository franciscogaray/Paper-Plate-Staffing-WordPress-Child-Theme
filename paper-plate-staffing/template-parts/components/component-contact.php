<style>
	.has-form label {
		color: <?php echo $label_color;?>!important;
	}
</style>

<?php 
	$cmg_contact_info = get_field('cmg_contact_info' , 'option');
		$locations = $cmg_contact_info['locations'];
		$google_embed = $locations[0]['google_embed'];
		$email = $cmg_contact_info['email'];
		$hours = $cmg_contact_info['hours'];
		$phone = $cmg_contact_info['phone'];
		$contact_form = $cmg_contact_info['contact_form'];
		$social_media = $cmg_contact_info['social_media'];
		$containers_radius = get_field('cmg_styles_containers_radius' , 'option');
	
	if($containers_radius && $background) {
		$c_radius = "style='border-radius: " . $containers_radius . "px; background-color: " . $background . "'";
	} elseif($containers_radius) {
		$c_radius = "style='border-radius: " . $containers_radius . "px;'";
	} elseif($background) {
		$c_radius = "style='background-color: " . $background . "'";
	}
	$containers_shadow = get_field('cmg_styles_containers_shadow' , 'option');
?>

<section id="cmg-contact" class="px-3 py-4 p-lg-5 position-relative <?php echo $background_class;?>" <?php echo $bg;?>>
	<div class="container py-4 py-lg-5 position-relative z-front">
        <div class="row align-items-end g-4 g-lg-5">
            
			<div class="col-lg-6">
				<div class="has-form p-4 p-lg-5 <?php echo $containers_shadow;?>" <?php echo $c_radius;?>>
					<?php
					if($title) {?>
					<h2 class="<?php echo $heading_weight . ' ' .  $heading_class;?>" <?php echo $h_color;?>><?php echo $title;?></h2>
					<?php }?>
					<?php
					if($subtitle) {?>
					<p class="fs-5 <?php echo $body_weight . ' ' .  $body_class;?>" <?php echo $b_color;?>><?php echo $subtitle;?></p>
					<?php }?>
					<?php echo do_shortcode('[wpforms id="' . $contact_form . '"]') ?>
				</div>
			</div>

			<div class="col-lg-6">
				
				<div class="col-12">
					
					<?php
					if($email) {?>
					<p class="fs-5"><a href="mailto:<?php echo $email;?>" class="mb-0" <?php echo $it_color;?>><i class="fa-solid fa-envelope me-2" <?php echo $i_color;?>></i><?php echo $email;?></a></p>
					<?php }?>
					
					<?php
					if($phone) {?>
					<p class="fs-5"><a href="tel:<?php echo $phone;?>" class="mb-0" <?php echo $it_color;?>><i class="fa-solid fa-phone me-2" <?php echo $i_color;?>></i><?php echo $phone;?></a></p>
					<?php }?>
					
					<?php
					if($hours) {?>
					<p class="fs-5" <?php echo $it_color;?>><i class="fa-solid fa-clock me-2" <?php echo $i_color;?>></i><?php echo $hours;?></p>
					<?php }?>
					
					<?php
					if($social_media) {?>
					<div class="d-flex gap-3 mb-3">
						<?php
						foreach($social_media as $social) {
							$icon = $social['icon'];
							$link = $social['link'];
						?>
						<a href="<?php echo $link;?>" target="_blank" class="mb-0 fs-5" <?php echo $i_color;?>><i class="<?php echo $icon;?>"></i></a>
						<?php }?>
					</div>
					<?php }?>
				</div>
				
				<?php
				if($google_embed) {?>
				<div class="overflow-hidden" <?php echo $c_radius;?>>
					<div class="ratio ratio-4x3">
						<?php echo $google_embed;?>
					</div>
				</div>
				<?php }?>
			
			</div>
		
		</div>
	</div>
	<?php
	if($background_overlay) {?>
	<div class="overlay position-absolute z-back" style="background: <?php echo $background_overlay;?>"></div>
	<?php }?>
</section>