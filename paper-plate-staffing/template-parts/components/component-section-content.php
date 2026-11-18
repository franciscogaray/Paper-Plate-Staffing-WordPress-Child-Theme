<?php

$section_content = get_sub_field('section_content');
	
	$section_content_title = $section_content['title'];
		$title_text = $section_content_title['text'];
		$title_color = $section_content_title['color'];
		$title_weight = $section_content_title['weight'];
		$title_class = $section_content_title['class'];
		
	$section_content_subtitle = $section_content['subtitle'];
		$subtitle_text = $section_content_subtitle['text'];
		$subtitle_color = $section_content_subtitle['color'];
		$subtitle_weight = $section_content_subtitle['weight'];
		$subtitle_class = $section_content_subtitle['class'];
		
		if($title_color) {
			$st_color = "style='color: " . $title_color . ";'";
		}
		
		if($subtitle_color) {
			$sst_color = "style='color: " . $subtitle_color . ";'";
		}
		
	$section_content_button = $section_content['button'];
		$section_button_label = $section_content_button['label'];
		$section_button_link = $section_content_button['link'];
		$section_button_color = $section_content_button['color'];	
?>