<section id="cmg-about" class="px-3 py-4 p-lg-5 position-relative <?php echo $background_class;?>" <?php echo $bg;?>>
	<div class="container py-4 py-lg-5 position-relative z-front">
        <div class="row align-items-center">
			
			<div class="col-lg-11 text-center mx-auto">
				
				<?php
				if($title) {?>
				<h2 class="display-3 mb-3 <?php echo $heading_weight . ' ' .  $heading_class;?>" <?php echo $h_color;?>><?php echo $title;?></h2>
				<?php }?>
				
				<?php
				if($description) {?>
				<div class="fs-5 mb-4 <?php echo $body_weight . ' ' .  $body_class;?>" <?php echo $b_color;?>><?php echo $description;?></div>
				<?php }?>
				
				<?php
				if($button_text) {?>
				<a href="<?php echo $button_url;?>" class="btn <?php echo $button_color;?> btn-icon-reveal"><?php echo $button_text;?> <i class="fa-solid fa-chevron-right"></i></a>
				<?php }?>
			
			</div>
		
		</div>
	</div>
	
	<?php
	if($background_overlay) {?>
	<div class="overlay position-absolute z-back" style="background: <?php echo $background_overlay;?>"></div>
	<?php }?>
	
</section>