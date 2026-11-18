<?php

$content_styles = get_sub_field('content_styles');

$background = $content_styles['background'];
	$background_class = $background['class'];
	$background_image = $background['image'];
	$background_style = $background['style'];
	$background_overlay = $background['overlay'];
	$background_color = $background['color'];

	if($background_color) {
		$bg = "style='background-color:" . $background_color . "';";
	} elseif(!$background_color && $background_image && $background_style == "cover") {
		$bg = "style='background-image: url(" . $background_image . "); background-size: cover;'";
	} elseif($background_image && $background_style == "repeat") {
		$bg = "style='background-image: url(" . $background_image . "); background-repeat: repeat;'";
	} elseif($background_image && $background_style == "fixed") { 
		$bg = "style='background-image: url(" . $background_image . "); background-attachment: fixed; background-size: cover;'";
	}

$heading = $content_styles['heading'];
	$heading_color = $heading['color'];
	$heading_weight = $heading['weight'];
	$heading_class = $heading['class'];

$body = $content_styles['body'];
	$body_color = $body['color'];
	$body_weight = $body['weight'];
	$body_class = $body['class'];

$button_color = $content_styles['button_color'];

if($heading_color) {
	$h_color = "style='color: " . $heading_color . ";'";
}

if($body_color) {
	$b_color = "style='color: " . $body_color . ";'";
}?>