<?php
if($title_text || $subtitle_text ) {?>
<div class="row justify-content-center mb-4">
	<div class="col-lg-8">
		
		<?php
		if($title_text) {?>
		<h2 class="display-3 <?php echo $title_weight . ' ' . $title_class;?>" <?php echo $st_color;?>><?php echo $title_text;?></h2>
		<?php }?>
		
		<?php
		if($subtitle_text) {?>
		<p class="fs-5 <?php echo $subtitle_weight . ' ' . $subtitle_class;?>" <?php echo $sst_color;?>><?php echo $subtitle_text;?></p>
		<?php }?>
	
	</div>
</div>
<?php }?>