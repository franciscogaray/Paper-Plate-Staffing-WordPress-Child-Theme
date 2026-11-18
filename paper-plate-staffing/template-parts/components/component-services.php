<style>
/* Mobile specific styles */
@media (max-width: 767px) {
    .read-more-wrap {
        display: -webkit-box;
        -webkit-line-clamp: 3; /* Limit to 3 lines */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .read-more-btn {
        display: inline-block;
        margin-top: 5px;
        cursor: pointer;
        color: #007bff;
        font-weight: bold;
		font-size: 1rem !important;
    }

    /* Optionally, style the "Read Less" button to match */
    .read-less-btn {
        display: inline-block;
        margin-top: 5px;
        cursor: pointer;
        color: #007bff;
        font-weight: bold;
		font-size: 1rem !important;
    }
}
@media (min-width: 992px) {
	.read-more-btn {
		display: none !important;
	}
}
</style>

<section id="cmg-services" class="px-3 py-4 p-lg-5 position-relative <?php echo $background_class;?>" <?php echo $bg;?>>
	<div class="container py-4 py-lg-5 position-relative z-front">
       
		<?php include(__DIR__ . '/component-section-heading.php');?>
	   
	   	<div class="row row-cols-1 row-cols-lg-<?php echo $columns;?> g-4 g-lg-5">
            <?php
			$containers_radius = get_field('cmg_styles_containers_radius' , 'option');
			if($containers_radius) {
				$c_radius = "style='border-radius: " . $containers_radius . "px;'";
			}
			$containers_shadow = get_field('cmg_styles_containers_shadow' , 'option');
			if($cards) {
			foreach($cards as $card) {
				$image = $card['image'];
				$title = $card['title'];
				$heading = $card['heading'];
				$description = $card['description'];
				$list = $card['list'];
				$button_text = $card['button_text'];
				$button_url = $card['button_url'];
			?>
			<div class="col">
				<div class="card border-0 <?php echo $containers_shadow;?> h-100 overflow-hidden" <?php echo $c_radius;?>>
					<img src="<?php echo bcb_image_url($image);?>" alt="<?php echo bcb_image_alt($image);?>" class="card-img-top">
					<div class="card-body p-4">
						<h2 class="fw-bold mb-2 <?php echo $heading_weight . ' ' .  $heading_class;?>" <?php echo $h_color;?>><?php echo $title;?></h2>
						<p class="mb-0 <?php echo $body_weight . ' ' .  $body_class;?>" <?php echo $b_color;?>>
							<span class="read-more-wrap"><?php echo $description;?></span>
							<span class="read-more-btn btn cmg-btn-primary">Read more</span>
							<span class="read-less-btn btn cmg-btn-primary" style="display:none;">Read less</span>
						</p>
						<?php
						if($list) {?>
						<ul class="mt-3 ps-4">
						<?php
						foreach($list as $li) {?>
							<li <?php echo $b_color;?>><?php echo $li['item'];?></li>
						<?php }?>
						</ul>
						<?php }?>
					</div>
					<?php
					if($button_text) {?>
					<div class="card-footer bg-transparent border-0 px-4 pt-0 pb-4 mt-3">
						<a href="<?php echo $button_url;?>" class="btn btn-icon-reveal <?php echo $button_color;?>"><?php echo $button_text;?> <i class="fa-solid fa-chevron-right"></i></a>
					</div>
					<?php }?>
				</div>
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

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    const readMoreBtns = document.querySelectorAll('.read-more-btn');
    const readLessBtns = document.querySelectorAll('.read-less-btn');
    const readMoreWraps = document.querySelectorAll('.read-more-wrap');

    readMoreBtns.forEach((btn, index) => {
        btn.addEventListener('click', function() {
            // Show full text
            readMoreWraps[index].style.webkitLineClamp = 'unset';
            readMoreBtns[index].style.display = 'none';
            readLessBtns[index].style.display = 'inline-block';
        });
    });

    readLessBtns.forEach((btn, index) => {
        btn.addEventListener('click', function() {
            // Truncate text after 3 lines
            readMoreWraps[index].style.webkitLineClamp = '3';
            readLessBtns[index].style.display = 'none';
            readMoreBtns[index].style.display = 'inline-block';
        });
    });
});
</script>