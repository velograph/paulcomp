<?php
/**
 * Template Name: 404
 *
 * @package Paul Component Engineering
 */

get_header(); ?>

	<div id="primary" class="four-oh-four">

		<div class="message">
			<h3>That page doesn't seem to exist. But that's ok!</h3>
			<a href="/shop" class="button">Go To Shop</a>
		</div>

		<?php $mobile_page_banner = wp_get_attachment_image_src(get_post_thumbnail_id( '1406' ), 'page-banner-mobile'); ?>
		<?php $tablet_page_banner = wp_get_attachment_image_src(get_post_thumbnail_id( '1406' ), 'page-banner-tablet'); ?>
		<?php $desktop_page_banner = wp_get_attachment_image_src(get_post_thumbnail_id( '1406' ), 'page-banner-desktop'); ?>
		<?php $retina_page_banner = wp_get_attachment_image_src(get_post_thumbnail_id( '1406' ), 'page-banner-retina'); ?>

		<div class="background-image">
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
				<img srcset="<?php echo $image[0]; ?>">
			</picture>
		</div>

	</div><!-- #primary -->

<?php get_footer(); ?>
