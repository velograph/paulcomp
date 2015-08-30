<?php
/**
 * Template Name: Contact
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Paul Component Engineering
 */

get_header(); ?>

	<div id="primary" class="contact">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php $mobile_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-mobile'); ?>
			<?php $tablet_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-tablet'); ?>
			<?php $desktop_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-desktop'); ?>
			<?php $retina_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-retina'); ?>

			<div class="banner-image">
				<picture>
					<!--[if IE 9]><video style="display: none"><![endif]-->
					<source
						srcset="<?php echo $mobile_page_banner[0]; ?>"
						media="(max-width: 500px)" />
					<source
						srcset="<?php echo $tablet_page_banner[0]; ?>"
						media="(max-width: 860px)" />
					<source
						srcset="<?php echo $desktop_page_banner[0]; ?>"
						media="(max-width: 1180px)" />
					<source
						srcset="<?php echo $retina_page_banner[0]; ?>"
						media="(min-width: 1181px)" />
					<!--[if IE 9]></video><![endif]-->
					<img srcset="<?php echo $desktop_page_banner[0]; ?>">
				</picture>
			</div>

			<section class="page-content">

				<div class="lead-in-title">
					<h1><?php the_title(); ?></h1>
				</div>

				<div class="column lead-in-copy">
					<h4>Headquarters</h4>
					<?php the_field('column_one'); ?>
				</div>

				<div class="column lead-in-copy">
					<h4>Email</h4>
					<?php the_field('column_two'); ?>
				</div>

			</section>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
