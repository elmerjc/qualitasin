<?php 
/*
	Template Name: Blank
*/

get_header();

?>

<div class="container">

	<?php

	if (have_posts()) : while (have_posts()) : the_post();

		the_content();	

	endwhile;

   endif;

   wp_reset_query();

	?>
	
</div>


<?php get_footer(); ?>