<?php
/**
 * Template Name: Dealer Application
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Paul Component Engineering
 */

get_header(); ?>

	<div class="dealer-application">

		<div class="page-content">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>

			<?php endwhile; // end of the loop. ?>

		</div>

	</div><!-- #primary -->

<?php get_footer(); ?>
