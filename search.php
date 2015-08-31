<?php
/**
 * The template for displaying search results pages.
 *
 * @package Paul Component Engineering
 */

get_header(); ?>

<script>
jQuery(document).ready(function(){

	jQuery('.portal').matchHeight();

});
</script>

	<section id="primary" class="shop-portals content-area">

		<?php if ( have_posts() ) : ?>

				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'Paul Component Engineering' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

					<div class="portal-container page-content">

						<?php while ( have_posts() ) : the_post(); ?>

							<div class="portal" id="post-<?php the_ID(); ?>">
								<a href="<?php the_permalink(); ?>">
									<?php $mobile_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-mobile'); ?>
									<?php $tablet_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-tablet'); ?>
									<?php $desktop_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-desktop'); ?>
									<?php $retina_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-retina'); ?>

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
									<h4>
										<?php the_title(); ?>
									</h4>
								</a>
							</div>

						<?php endwhile; ?>

					</div>

			<?php basis_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</section><!-- #primary -->

<?php get_footer(); ?>
