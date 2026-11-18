<?php 
	
	$cmg_navbar = get_field('cmg_navbar' , 'option');
		$top = $cmg_navbar['top'];
			$top_background_color = $top['background_color'];
			$top_text_color = $top['text_color'];
			$top_icon_color = $top['icon_color'];
			
			if($top_background_color) {
				$top_background_color = "style='background-color: " . $top_background_color . "'";
			}
			
			if($top_text_color) {
				$top_text_color = "style='color: " . $top_text_color . "'";
			}
			
			if($top_icon_color) {
				$top_icon_color = "style='color: " . $top_icon_color . "'";
			}

		$main = $cmg_navbar['main'];
			$main_background_color = $main['background_color'];
			$main_text_color = $main['text_color'];
			$main_text_case = $main['text_case'];
			$main_text_size = $main['text_size'];
			$main_text_weight = $main['text_weight'];
			
			if($main_background_color) {
				$main_background_color = "style='background-color: " . $main_background_color . "'";
			} 
	
	$cmg_contact_info = get_field('cmg_contact_info' , 'option');
		$email = $cmg_contact_info['email'];
		$phone = $cmg_contact_info['phone'];
		$hours = $cmg_contact_info['hours'];
		$social_media = $cmg_contact_info['social_media'];
		$locations = $cmg_contact_info['locations'];
?>

<style>
	#navbar-main-menu .nav-link {
		color: <?php echo $main_text_color;?>;
		text-transform: <?php echo $main_text_case;?>;
		font-size: <?php echo $main_text_size;?>px;
		font-weight: <?php echo $main_text_weight;?>;
	}
	
	#toggler span {
		background-color: <?php echo $main_text_color;?>;
	}
</style>

<div class="fixed-top">
	
	<?php
	if($email || $phone || $locations) {?>
	<section id="bcb-navbar-top" class="p-2 d-none" <?php echo $top_background_color;?>>
		<div class="container">
			<div class="row align-items-center">

				<div class="col-6">
					<div class="d-flex gap-2 gap-lg-3">
						
						<?php
						if($email) {?>
						<a href="mailto:<?php echo $email;?>" class="mb-0" <?php echo $top_text_color;?>><i class="fa-solid fa-envelope me-2" <?php echo $top_icon_color;?>></i><span class="d-none d-lg-inline"><?php echo $email;?></span></a>
						<?php }?>
						
						<?php
						if($phone) {?>
						<a href="tel:<?php echo $phone;?>" class="mb-0" <?php echo $top_text_color;?>><i class="fa-solid fa-phone me-2" <?php echo $top_icon_color;?>></i><span class="d-none d-lg-inline"><?php echo $phone;?></span></a>
						<?php }?>
						
						<?php
						if($locations) {?>
						<a href="#0" class="mb-0" <?php echo $top_text_color;?> data-bs-toggle="modal" data-bs-target="#cmg-modal-location"><i class="fa-solid fa-location-dot me-2" <?php echo $top_icon_color;?>></i><span class="d-none d-lg-inline">Location</span></a>
						<?php }?>
						
					</div>
				</div>

				<?php
				if($social_media) {?>
				<div class="col-6">
					<div class="d-flex gap-2 gap-lg-3 justify-content-end">
						<?php
							foreach($social_media as $social) {
							$icon = $social['icon'];
							$link = $social['link'];?>
							<a href="<?php echo $link;?>"target="_blank" <?php echo $top_text_color;?> class="mb-0"><i class="<?php echo $icon;?>"></i></a>
						<?php }?>
					</div>
				</div>
				<?php }?>

			</div>
		</div>
	</section>
	<?php }?>

	<nav id="bcb-main-navbar" class="navbar-light navbar navbar-expand-lg py-0 <?php echo esc_attr(get_theme_mod('navbar_classes'));?>" <?php echo $main_background_color;?>>
		<div class="container <?php echo esc_attr(get_theme_mod('navbar_inner_classes'));?>">

			<a id="navbar-brand-logo" class="navbar-brand" href="<?php echo get_site_url();?>"> 
				<?php if(has_custom_logo()) {?>
					<img src="<?php echo esc_url(bcb_image_url(get_theme_mod('custom_logo')));?>" alt="<?php echo esc_attr(get_bloginfo());?>" />	
				<?php } else {
					get_template_part('template-parts/navbar/navbar' , 'logo');
				}?>
			</a>

			<button id="toggler" class="navbar-toggler collapsed border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-main-menu" aria-controls="navbar-main-menu" aria-expanded="false" aria-label="Toggle Navigation">
				<?php get_template_part('template-parts/navbar/navbar' , 'toggler');?>
			</button>

			<div id="navbar-main-menu" class="navbar-collapse collapse">
				<?php bcb_main_nav(); ?>
			</div>

		</div>
	</nav>

</div>