<style>
	.cmg-faq .accordion-button {
		background: <?php echo $background_open;?>;
		color: <?php echo $text_open;?>
	}
	
	.cmg-faq .accordion-button.collapsed {
		background: <?php echo $background_closed;?>;
		color: <?php echo $text_closed;?>
	}
</style>

<section id="cmg-faq-<?php echo get_row_index(); ?>" class="cmg-faq px-3 py-4 p-lg-5 position-relative <?php echo $background_class;?>" <?php echo $bg;?>>
	<div class="container py-4 py-lg-5 position-relative z-front">
		
		<?php include(__DIR__ . '/component-section-heading.php');?>
		
		<div class="row row-cols-1 row-cols-lg-<?php echo $columns;?> g-3 accordion" id="cmg-accordion">
				  
			<?php
			$containers_radius = get_field('cmg_styles_containers_radius' , 'option');
			if($containers_radius) {
				$c_radius = "style='border-radius: " . $containers_radius . "px;'";
			}
			$containers_shadow = get_field('cmg_styles_containers_shadow' , 'option');
			$i = 0;
			if($faq) {
			foreach($faq as $f) {
			$question = $f['question'];
			$answer = $f['answer'];?>
			
			<div class="col">
				<div class="accordion-item border-0 overflow-hidden <?php echo $containers_shadow;?>" <?php echo $c_radius;?>>
					<h2 class="accordion-header <?php echo $heading_weight . ' ' .  $heading_class;?>">
						<div class="accordion-button d-flex justify-content-between fs-5 collapsed" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $i;?>" aria-expanded="true"><?php echo $question;?> <i class="bi bi-chevron-up"></i></div>
					</h2>
					<div id="collapse-<?php echo $i;?>" class="accordion-collapse collapse" data-bs-parent="#cmg-accordion">
						<div class="accordion-body <?php echo $body_weight . ' ' .  $body_class;?>">
							<?php echo $answer;?>
						</div>
					</div>
				</div>
			</div>
			
			<?php $i++; }}?>
				  
		</div>
	
		<?php include(__DIR__ . '/component-section-button.php');?>
	
	</div>
	
	<?php
	if($background_overlay) {?>
	<div class="overlay position-absolute z-back" style="background: <?php echo $background_overlay;?>"></div>
	<?php }?>

</section>