<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package brainstormtech
 */

get_header();
?>


        <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At fugiat hic iure quibusdam saepe. Fuga, ullam voluptatum. Atque culpa, est ipsa laborum nobis nostrum sint sunt totam vel, veritatis, voluptatum.</h1>
		<?php
		while ( have_posts() ) :
			the_post();

			the_content();
		endwhile; // End of the loop.
		?>



<?php
get_footer();
