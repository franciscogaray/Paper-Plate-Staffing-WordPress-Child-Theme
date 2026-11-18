<style>
#pps-logo-carousel .swiper-slide img {
  filter: grayscale(100%);
  opacity: 75%;
}
</style>

<section id="pps-logo-carousel" class="p-3">
	<div class="container">
	
		<div class="row g-4 g-lg-5">
			<div class="col">

				<div class="swiper">
					<div class="swiper-wrapper">
					
						<!-- First Iteration -->
						<div class="swiper-slide">
							<img class="w-100 object-fit-contain" style="height: 200px !important;" src="<?php echo bcb_image_url(558);?>" alt="<?php echo bcb_image_url(558);?>"/>
						</div>
						<div class="swiper-slide">
							<img class="w-100 object-fit-contain" style="height: 200px !important;" src="<?php echo bcb_image_url(556);?>" alt="<?php echo bcb_image_url(556);?>"/>
						</div>
						<div class="swiper-slide">
							<img class="w-100 object-fit-contain" style="height: 200px !important;" src="<?php echo bcb_image_url(563);?>" alt="<?php echo bcb_image_url(563);?>"/>
						</div>
						<div class="swiper-slide">
							<img class="w-100 object-fit-contain" style="height: 200px !important;" src="<?php echo bcb_image_url(559);?>" alt="<?php echo bcb_image_url(559);?>"/>
						</div>	
						<div class="swiper-slide">
							<img class="w-100 object-fit-contain" style="height: 200px !important;" src="<?php echo bcb_image_url(560);?>" alt="<?php echo bcb_image_url(560);?>"/>
						</div>									
						<div class="swiper-slide">
							<img class="w-100 object-fit-contain" style="height: 200px !important;" src="<?php echo bcb_image_url(557);?>" alt="<?php echo bcb_image_url(557);?>"/>
						</div>		
						
						<!-- Second Iteration -->
						<div class="swiper-slide">
							<img class="w-100 object-fit-contain" style="height: 200px !important;" src="<?php echo bcb_image_url(558);?>" alt="<?php echo bcb_image_url(558);?>"/>
						</div>
						<div class="swiper-slide">
							<img class="w-100 object-fit-contain" style="height: 200px !important;" src="<?php echo bcb_image_url(5586);?>" alt="<?php echo bcb_image_url(556);?>"/>
						</div>
						<div class="swiper-slide">
							<img class="w-100 object-fit-contain" style="height: 200px !important;" src="<?php echo bcb_image_url(563);?>" alt="<?php echo bcb_image_url(563);?>"/>
						</div>
						<div class="swiper-slide">
							<img class="w-100 object-fit-contain" style="height: 200px !important;" src="<?php echo bcb_image_url(559);?>" alt="<?php echo bcb_image_url(559);?>"/>
						</div>	
						<div class="swiper-slide">
							<img class="w-100 object-fit-contain" style="height: 200px !important;" src="<?php echo bcb_image_url(560);?>" alt="<?php echo bcb_image_url(560);?>"/>
						</div>									
						<div class="swiper-slide">
							<img class="w-100 object-fit-contain" style="height: 200px !important;" src="<?php echo bcb_image_url(557);?>" alt="<?php echo bcb_image_url(557);?>"/>
						</div>								
						
					</div>
				</div>
				
			</div>				
		</div>
	</div>
</section>

<script>
    var swiper = new Swiper('#pps-logo-carousel .swiper', {
        loop: true,	
		speed: 1000,
		slidesPerView: 2,
		spaceBetween: 10,
		autoplay: {
			delay: 1000,
		},
		breakpoints: {
			992: {
			  slidesPerView: 4,
			  slidesPerGroup: 1,
			  spaceBetween: 40
			}
		},
    })
</script>