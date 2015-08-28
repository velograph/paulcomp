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

									<?php $mobile_page_banner = wp_get_attachment_image_src(get_sub_field('banner_image'), 'page-banner-mobile'); ?>
									<?php $tablet_page_banner = wp_get_attachment_image_src(get_sub_field('banner_image'), 'page-banner-tablet'); ?>
									<?php $desktop_page_banner = wp_get_attachment_image_src(get_sub_field('banner_image'), 'page-banner-desktop'); ?>
									<?php $retina_page_banner = wp_get_attachment_image_src(get_sub_field('banner_image'), 'page-banner-retina'); ?>

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

										<?php if( get_sub_field('caption_toggle') ) : ?>
											<div class="caption">
												<small><?php the_sub_field('caption'); ?></small>
											</div>
										<?php endif; ?>
									</div>

								</div>

					        <?php endif; ?>

						<?php  if( get_row_layout() == 'two_up_banner_images' ) : ?>

							<?php if( have_rows('banner_image_content') ) : ?>

								<div class="two-image-banner">

									<?php while ( have_rows('banner_image_content') ) : ?>

								        <?php the_row(); ?>

								        <?php if( get_row_layout() == 'banner_image' ) : ?>

											<?php $mobile_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'portal-mobile'); ?>
											<?php $tablet_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'portal-tablet'); ?>
											<?php $desktop_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'portal-desktop'); ?>
											<?php $retina_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'portal-retina'); ?>

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

												<?php if( get_sub_field('caption_toggle') ) : ?>
													<div class="caption">
														<small><?php the_sub_field('caption'); ?></small>
													</div>
												<?php endif; ?>
											</div>

								        <?php endif; ?>

							    	<?php endwhile; ?>

								</div>

							<?php endif; ?>

				        <?php endif; ?>

				    <?php endwhile; ?>

				<?php endif; ?>

			</section>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
