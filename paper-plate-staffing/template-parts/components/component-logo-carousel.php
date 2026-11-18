<style>
#pps-logo-carousel .owl-carousel img {

	height: 150px !important;
}

.owl-nav {
	display: none!important;
}
</style>

<section id="pps-logo-carousel" class="p-3">
	<div class="container">
		<div class="row g-4 g-lg-5">
			<div class="col-12">
				<div class="owl-carousel owl-theme">
					
					<div class="item">
						<img class="w-100 object-fit-contain" src="<?php echo bcb_image_url(556);?>" alt="<?php echo bcb_image_url(556);?>"/>
					</div>
					<div class="item">
						<img class="w-100 object-fit-contain" src="<?php echo bcb_image_url(580);?>" alt="<?php echo bcb_image_url(580);?>"/>
					</div>
					<div class="item">
						<img class="w-100 object-fit-contain" src="<?php echo bcb_image_url(560);?>" alt="<?php echo bcb_image_url(560);?>"/>
					</div>									
					<div class="item">
						<img class="w-100 object-fit-contain" src="<?php echo bcb_image_url(563);?>" alt="<?php echo bcb_image_url(563);?>"/>
					</div>	
					<div class="item">
						<img class="w-100 object-fit-contain" src="<?php echo bcb_image_url(581);?>" alt="<?php echo bcb_image_url(581);?>"/>
					</div>
					<div class="item">
						<img class="w-100 object-fit-contain" src="<?php echo bcb_image_url(559);?>" alt="<?php echo bcb_image_url(559);?>"/>
					</div>	
						
				</div>
			</div>				
		</div>
	</div>
</section>

<script>
    jQuery('.owl-carousel').owlCarousel({
		loop: true,
		margin: 10,
		nav: true,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: false,
		slideTransition: 'linear',
		autoplaySpeed: 3000,  
        responsive: {
            0: {
                items: 2
            },
            922: {
                items: 3
            },
            1200: {
                items: 5
            }
        }
    });
</script>