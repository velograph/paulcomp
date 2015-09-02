<?php
/**
 * Template Name: Story
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Paul Component Engineering
 */

get_header(); ?>

<script>

	jQuery(document).ready(function(){

		jQuery('.two-image-banner .banner-image img').matchHeight();

	});

</script>

	<div id="primary" class="content-area">

		<?php while ( have_posts() ) : the_post(); ?>

			<section class="story-sections">

				<!-- Flexible Content -->
				<?php if( have_rows('story_sections') ) : ?>

				    <?php while ( have_rows('story_sections') ) : ?>

				        <?php the_row(); ?>

						<?php if( get_row_layout() == 'full_banner_image' ) : ?>

							<div class="full-banner-image">

								<?php $mobile_page_banner = wp_get_attachment_image_src(get_sub_field('banner_image'), 'story-banner-mobile'); ?>
								<?php $tablet_page_banner = wp_get_attachment_image_src(get_sub_field('banner_image'), 'story-banner-tablet'); ?>
								<?php $desktop_page_banner = wp_get_attachment_image_src(get_sub_field('banner_image'), 'story-banner-desktop'); ?>
								<?php $retina_page_banner = wp_get_attachment_image_src(get_sub_field('banner_image'), 'story-banner-retina'); ?>

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
										<img srcset="<?php echo $image[0]; ?>">
									</picture>

									<?php if( get_sub_field('caption_toggle') ) : ?>
										<div class="caption">
											<small><?php the_sub_field('caption'); ?></small>
										</div>
									<?php endif; ?>
								</div>

							</div>

				        <?php endif; ?>

						<?php if( get_row_layout() == 'two_up_banner_images' ) : ?>

							<div class="two-up-banner-images">

								<div class="column">

									<?php $mobile_page_banner = wp_get_attachment_image_src(get_sub_field('column_one_photo'), 'portal-mobile'); ?>
									<?php $tablet_page_banner = wp_get_attachment_image_src(get_sub_field('column_one_photo'), 'portal-tablet'); ?>
									<?php $desktop_page_banner = wp_get_attachment_image_src(get_sub_field('column_one_photo'), 'portal-desktop'); ?>
									<?php $retina_page_banner = wp_get_attachment_image_src(get_sub_field('column_one_photo'), 'portal-retina'); ?>

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

									<div class="caption">
										<small><?php the_sub_field('caption_one'); ?></small>
									</div>

								</div>

								<div class="column">

									<?php $mobile_page_banner = wp_get_attachment_image_src(get_sub_field('column_two_photo'), 'portal-mobile'); ?>
									<?php $tablet_page_banner = wp_get_attachment_image_src(get_sub_field('column_two_photo'), 'portal-tablet'); ?>
									<?php $desktop_page_banner = wp_get_attachment_image_src(get_sub_field('column_two_photo'), 'portal-desktop'); ?>
									<?php $retina_page_banner = wp_get_attachment_image_src(get_sub_field('column_two_photo'), 'portal-retina'); ?>

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

									<div class="caption">
										<small><?php the_sub_field('caption_two'); ?></small>
									</div>

								</div>

							</div>

						<?php endif; ?>

						<?php if( get_row_layout() == 'lead_in_copy' ) : ?>

							<div class="lead-in-copy <?php if( get_sub_field('color_scheme') == 'Light text on dark background' ) : ?>light-scheme <?php elseif( get_sub_field('color_scheme') == 'Light text on medium background' ) : ?>medium-scheme <?php elseif( get_sub_field('color_scheme') == 'Dark text on light background' ) : ?>dark-scheme<?php endif; ?>">

								<div class="page-content">

									<div class="story-content">

										<?php the_sub_field('title'); ?>
										<?php the_sub_field('content'); ?>

									</div>

								</div>

							</div>

						<?php endif; ?>

						<?php if( get_row_layout() == 'two_small_photos' ) : ?>

							<div class="two-small-photos <?php if( get_sub_field('color_scheme') == 'Light text on dark background' ) : ?>light-scheme <?php else: ?>dark-scheme<?php endif; ?>">

								<div class="page-content">

									<div class="column">

										<?php $mobile_page_banner = wp_get_attachment_image_src(get_sub_field('column_one_photo'), 'portal-mobile'); ?>
										<?php $tablet_page_banner = wp_get_attachment_image_src(get_sub_field('column_one_photo'), 'portal-tablet'); ?>
										<?php $desktop_page_banner = wp_get_attachment_image_src(get_sub_field('column_one_photo'), 'portal-desktop'); ?>
										<?php $retina_page_banner = wp_get_attachment_image_src(get_sub_field('column_one_photo'), 'portal-retina'); ?>

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

									<div class="column">

										<?php $mobile_page_banner = wp_get_attachment_image_src(get_sub_field('column_two_photo'), 'portal-mobile'); ?>
										<?php $tablet_page_banner = wp_get_attachment_image_src(get_sub_field('column_two_photo'), 'portal-tablet'); ?>
										<?php $desktop_page_banner = wp_get_attachment_image_src(get_sub_field('column_two_photo'), 'portal-desktop'); ?>
										<?php $retina_page_banner = wp_get_attachment_image_src(get_sub_field('column_two_photo'), 'portal-retina'); ?>

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

								</div>

							</div>

						<?php endif; ?>

						<?php if( get_row_layout() == 'one_photo_one_text' ) : ?>

							<div class="one-photo-one-text container <?php if( get_sub_field('color_scheme') == 'Light text on dark background' ) : ?>light-scheme <?php else: ?>dark-scheme<?php endif; ?>">

								<div class="page-content">

									<div class="column">

										<?php $mobile_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'portal-mobile'); ?>
										<?php $tablet_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'portal-tablet'); ?>
										<?php $desktop_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'portal-desktop'); ?>
										<?php $retina_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'portal-retina'); ?>

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

									<div class="column">

										<?php the_sub_field('title'); ?>
										<?php the_sub_field('text'); ?>

									</div>

								</div>

							</div>

						<?php endif; ?>

						<?php if( get_row_layout() == 'full_width_body_copy' ) : ?>

							<div class="body-copy <?php if( get_sub_field('color_scheme') == 'Light text on dark background' ) : ?>light-scheme <?php else: ?>dark-scheme<?php endif; ?>">

								<div class="page-content">

									<div class="story-content">

										<?php the_sub_field('title'); ?>
										<?php the_sub_field('text'); ?>

									</div>

								</div>

							</div>

						<?php endif; ?>

						<?php if( get_row_layout() == 'call_to_action' ) : ?>

							<div class="call-to-action">

								<div class="page-content">

									<div class="title">

										<?php the_sub_field('title'); ?>

									</div>

								</div>

								<div class="story-content">

									<h2><a href="/shop" class="button"><?php the_sub_field('button_text'); ?></a></h2>

									<div class="call-to-action-image">
										<?php $mobile_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'story-banner-mobile'); ?>
										<?php $tablet_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'story-banner-tablet'); ?>
										<?php $desktop_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'story-banner-desktop'); ?>
										<?php $retina_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'story-banner-retina'); ?>

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

								</div>

							</div>

						<?php endif; ?>

			    	<?php endwhile; ?>

				<?php endif; ?>

			</section>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
