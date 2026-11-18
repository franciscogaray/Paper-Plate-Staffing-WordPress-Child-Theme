<?php

/* Template Name: Forms */

get_header();
$headers = get_field('headers' , 'option');
?>

<main id="main-container" role="main" class="container-fluid px-0">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-content">
			<?php 
				get_template_part('template-parts/common/common', 'header');
				get_template_part('template-parts/pages/page', 'forms');
			?>
		</div>

	</article>
</main>

<?php get_footer();?>