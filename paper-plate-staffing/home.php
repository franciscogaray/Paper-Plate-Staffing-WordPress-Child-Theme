<?php

/* Template Name: Home */

get_header();
$headers = get_field('headers' , 'option');
?>

<main id="main-container" role="main" class="container-fluid px-0">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-content">
			<?php 
				get_template_part('template-parts/components/component', 'main');
			?>
		</div>

	</article>
</main>

<?php get_footer();?>