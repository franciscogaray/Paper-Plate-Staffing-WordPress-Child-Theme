<?php 
	$cmg_contact_info = get_field('cmg_contact_info' , 'option');
	$locations = $cmg_contact_info['locations'];
?>

<!-- Modal Location -->
<div class="modal fade" id="cmg-modal-location" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header cmg-bg-primary text-white">
				<h1 class="modal-title fs-5">Location</h1>
				<div data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></div>
			</div>
			<div class="modal-body">
				<?php
				if($locations) {
				foreach($locations as $location) {
					$address = $location['address'];
					$city = $location['city'];
					$state = $location['state'];
					$zip = $location['zip'];
					$google_link = $location['google_link'];
					$google_embed = $location['google_embed'];?>
					<p class="text-center"><?php echo $address . ', ' .  $city . ', ' . $state . ' ' . $zip;?></p>
					<div class="ratio ratio-16x9 mb-3">
  						<?php echo $google_embed;?>
					</div>
					<div>
						<a href="<?php echo $google_link;?>" target="_blank" class="btn cmg-btn-primary">Get Direction</a>
					</div>
				<?php wp_reset_postdata();}}?>
			</div>
		</div>
	</div>
</div>