<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Paul Component Engineering
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<div class="page-content">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php if( get_field('two_columns_toggle') ) : ?>
					<!-- Flexible Content -->
					<?php if( have_rows('two_column_container') ) : ?>

						    <?php while ( have_rows('two_column_container') ) : ?>

						        <?php the_row(); ?>

						        <?php if( get_row_layout() == 'two_columns' ) : ?>

									<div class="two-column-row row">
										<div class="column column-one">
							            	<?php the_sub_field('column_one'); ?>
										</div>

										<div class="column">
							            	<?php the_sub_field('text'); ?>

											<?php $mobile_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'page-banner-mobile'); ?>
											<?php $tablet_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'page-banner-tablet'); ?>
											<?php $desktop_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'page-banner-desktop'); ?>
											<?php $retina_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'page-banner-retina'); ?>

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
									</div>

						        <?php endif; ?>

						    <?php endwhile; ?>

						<?php else: ?>

					<?php endif; ?>

				<?php endif; ?>

				<?php the_content(); ?>

			<?php endwhile; // end of the loop. ?>

		</div>

	</div><!-- #primary -->

<?php get_footer(); ?>
