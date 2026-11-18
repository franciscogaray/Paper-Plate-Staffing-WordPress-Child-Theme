<?php
$review_args = array(
    'post_type'       => 'review',
    'post_status'     => 'publish',
    'posts_per_page'   => -1,
);

$the_review = new WP_query($review_args);
?>

<section id="cmg-reviews" class="position-relative px-3 py-4 p-lg-5 position-relative <?php echo $background_class;?>" <?php echo $bg;?>>
	<div class="container py-4 py-lg-5 position-relative z-front">
        <div class="row justify-content-center">
            
			<div class="col-lg-8 col-xl-7">
				
				<?php
				if($title_text) {?>
				<h2 class="display-4 <?php echo $title_weight . ' ' . $title_class;?>" <?php echo $st_color;?>><?php echo $title_text;?></h2>
				<?php }?>
		
				<?php
				if($subtitle_text) {?>
				<p class="fs-5 <?php echo $subtitle_weight . ' ' . $subtitle_class;?>" <?php echo $sst_color;?>><?php echo $subtitle_text;?></p>
				<?php }?>

				<div class="swiper mySwiper">
					<div class="swiper-wrapper">

						<?php
						if($the_review->have_posts()) {
						while($the_review->have_posts()) { $the_review->the_post();?>
						<div class="swiper-slide">
							<p class="mb-4 <?php echo $body_weight . ' ' .  $body_class;?>"><?php echo get_the_content();?></p>
							<p class="mb-0 <?php echo $body_weight . ' ' .  $body_class;?>">- <?php echo get_the_title();?></p>
						</div>
						<?php wp_reset_postdata(); }}?>

					</div>
					<div class="swiper-pagination position-static mt-3 text-start"></div>
				</div>
			</div>
		
		</div>
		<?php include(__DIR__ . '/component-section-button.php');?>
	</div>
	<?php
	if($background_overlay) {?>
	<div class="overlay position-absolute z-back" style="background: <?php echo $background_overlay;?>"></div>
	<?php }?>
</section>

<script>
var swiper = new Swiper("#cmg-reviews .mySwiper", {
	speed: 1000,
	spaceBetween: 0,
	autoplay: {
		delay: 8000,
	},
   	autoHeight: true,
	pagination: {
		el: ".swiper-pagination",
		clickable: true,
	},
});
</script>