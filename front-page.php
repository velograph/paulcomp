<?php
/**
 * Template Name: Front Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Wildeor
 */

get_header(); ?>

<script>
	jQuery(document).ready(function(){
	  jQuery('.home-page-slider').slick({
		  arrows: false,
		  dots: true,
		  mobileFirst: true,
		  lazyLoad: 'ondemand',
	  });
	});
</script>

<?php while ( have_posts() ) : the_post(); ?>

	<!-- Begin Gallery -->

	<section class="home-page-slider">

		<?php

		$images = get_field('gallery');

		if( $images ): ?>
			<?php foreach( $images as $image ): ?>

				<picture>
					<!--[if IE 9]><video style="display: none"><![endif]-->
					<source
						srcset="<?php echo $image['sizes']['portal-mobile']; ?>"
						media="(max-width: 500px)" />
					<source
						srcset="<?php echo $image['sizes']['portal-tablet']; ?>"
						media="(max-width: 860px)" />
					<source
						srcset="<?php echo $image['sizes']['portal-desktop']; ?>"
						media="(max-width: 1180px)" />
					<source
						srcset="<?php echo $image['sizes']['portal-retina']; ?>"
						media="(min-width: 1181px)" />
					<!--[if IE 9]></video><![endif]-->
					<img srcset="<?php echo $image['sizes']['portal-desktop']; ?>">
				</picture>

			<?php endforeach; ?>
		<?php endif; ?>

	</section>

<!-- End Gallery -->

<!-- Begin Page Lead In -->

	<section class="page-lead-in page-content">
		<?php the_field('lead_in_copy'); ?>

		<div class="lead-in-title">
			<h1><?php the_field('lead_in_title'); ?></h1>
		</div>
	</section>

<!-- End Page Lead In -->

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
