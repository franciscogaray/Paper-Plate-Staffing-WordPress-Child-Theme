<div id="cmg-header" class="swiper-slide <?php echo $background_class;?>">
	<section id="cmg-slide-<?php echo $i;?>" class="px-3 py-4 p-lg-5" style="background: url(<?php echo bcb_image_url($background);?>) center/cover">
		<div class="container position-relative z-front">
			<div class="row">
				<div class="col-lg-12 text-center">
					
					<?php
					if($title) {?>
					<h1 class="display-3 lh-sm text-shadow <?php echo $heading_weight . ' ' .  $heading_class;?>" <?php echo $h_color;?>><?php echo $title;?></h1>
					<?php }?>
					
					<?php
					if($description) {?>
					<p class="fs-5 mb-4 <?php echo $body_weight . ' ' . $body_class;?>" <?php echo $b_color;?>><?php echo $description;?></p>
					<?php }?>
					
					<div class="d-flex flex-column flex-lg-row gap-2 gap-lg-3 justify-content-center">
					<?php
					if($button_text) {?>
					<a href="<?php echo $button_url;?>" class="btn <?php echo $button_color;?> btn-icon-reveal"><?php echo $button_text;?> <i class="fa-solid fa-chevron-right"></i></a>
					<?php }?>
					
					<?php
					if($button_text_2) {?>
					<a href="<?php echo $button_url_2;?>" class="btn cmg-btn-secondary btn-icon-reveal"><?php echo $button_text_2;?> <i class="fa-solid fa-chevron-right"></i></a>
					<?php }?>
					</div>
					
				</div>
			</div>
		</div>
		
		<?php
		if($background_overlay) {?>
		<div class="overlay position-absolute z-back" style="background: <?php echo $background_overlay;?>"></div>
		<?php }?>
	
	</section>
</div>