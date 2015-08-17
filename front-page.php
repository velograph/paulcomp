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

	  if (jQuery(window).width() > 860) {
		  jQuery( "#tabs" ).tabs();
	  }

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

<!-- Begin Shop Sections -->

	<section class="portal-container">

		<div class="leading-shop-image">

			<?php $mobile_page_banner = wp_get_attachment_image_src(get_field('main_shop_image'), 'mobile-page-banner'); ?>
			<?php $tablet_page_banner = wp_get_attachment_image_src(get_field('main_shop_image'), 'tablet-page-banner'); ?>
			<?php $desktop_page_banner = wp_get_attachment_image_src(get_field('main_shop_image'), 'desktop-page-banner'); ?>
			<?php $retina_page_banner = wp_get_attachment_image_src(get_field('main_shop_image'), 'retina-page-banner'); ?>

			<a href="/shop">
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

				<div class="overlay">
					<h1 class="thumb-title">
						Shop
					</h1>
				</div>

			</a>

		</div>

		<div class="shop-portals">

			<div id="tabs">
				<ul>
					<li class="tab-trigger">
						<a href="#components-tab">
							<?php
								$cat_id = 7;
								$table_name = $wpdb->prefix . "woocommerce_termmeta";
								$query="SELECT meta_value FROM {$table_name} WHERE `meta_key`='thumbnail_id' and woocommerce_term_id ={$cat_id} LIMIT 0 , 30";
								$result =  $wpdb->get_results($query);

								foreach($result as $result1){
									$img_id= $result1->meta_value;
								}
							?>
							<img src="<?php echo wp_get_attachment_url( $img_id ); ?>" alt="category image">

							<div class="overlay">
								<h1 class="thumb-title">
									Components
								</h1>
							</div>

						</a>
					</li>
					<li class="tab-trigger">
						<a href="#spare-parts-tab">
							<?php
								$cat_id = 11;
								$table_name = $wpdb->prefix . "woocommerce_termmeta";
								$query="SELECT meta_value FROM {$table_name} WHERE `meta_key`='thumbnail_id' and woocommerce_term_id ={$cat_id} LIMIT 0 , 30";
								$result =  $wpdb->get_results($query);

								foreach($result as $result1){
									$img_id= $result1->meta_value;
								}
							?>
							<img src="<?php echo wp_get_attachment_url( $img_id ); ?>" alt="category image">

							<div class="overlay">
								<h1 class="thumb-title">
									Spare Parts
								</h1>
							</div>

						</a>
					</li>
					<li class="tab-trigger">
						<a href="#merchandise-tab">
							<?php
								$cat_id = 9;
								$table_name = $wpdb->prefix . "woocommerce_termmeta";
								$query="SELECT meta_value FROM {$table_name} WHERE `meta_key`='thumbnail_id' and woocommerce_term_id ={$cat_id} LIMIT 0 , 30";
								$result =  $wpdb->get_results($query);

								foreach($result as $result1){
									$img_id= $result1->meta_value;
								}
							?>
							<img src="<?php echo wp_get_attachment_url( $img_id ); ?>" alt="category image">

							<div class="overlay">
								<h1 class="thumb-title">
									Merchandise
								</h1>
							</div>

						</a>
					</li>
				</ul>
				<div id="components-tab">
					<div class="portal-container page-content">

						<?php // Components ?>
						<?php
						    $prod_categories = get_terms( 'product_cat', array(
						        'orderby' => 'name',
						        'order' => 'ASC',
								'child_of' => 7,
						        'hide_empty' => 1
						    ));
						    foreach( $prod_categories as $prod_cat ) :
						        $cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
						        $cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );
								$term_link = get_term_link( $prod_cat, 'product_cat' );
							?>

							<div class="portal">

								<a href="<?php echo $term_link; ?>">
									<img src="<?php echo $cat_thumb_url; ?>" />
								</a>

								<a href="<?php echo $term_link; ?>">
									<?php echo $prod_cat->name; ?>
								</a>

							</div>

						<?php endforeach; wp_reset_query(); ?>

					</div>
				</div>

				<div id="spare-parts-tab">
					<div class="portal-container page-content">

						<?php // spare Parts ?>
						<?php
							$prod_categories = get_terms( 'product_cat', array(
								'orderby' => 'name',
								'order' => 'ASC',
								'child_of' => 11,
								'hide_empty' => 1
							));
							foreach( $prod_categories as $prod_cat ) :
								$cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
								$cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );
								$term_link = get_term_link( $prod_cat, 'product_cat' );
						?>

						<div class="portal">

							<a href="<?php echo $term_link; ?>">
								<img src="<?php echo $cat_thumb_url; ?>" />
							</a>

							<a href="<?php echo $term_link; ?>">
								<h3><?php the_title(); ?></h3>
							</a>

						</div>

						<?php endforeach; wp_reset_query(); ?>

					</div>
				</div>

				<div id="merchandise-tab">
					<div class="portal-container page-content">

						<?php // Merchandise ?>
						<?php
							$prod_categories = get_terms( 'product_cat', array(
								'orderby' => 'name',
								'order' => 'ASC',
								'child_of' => 9,
								'hide_empty' => 1
							));
							foreach( $prod_categories as $prod_cat ) :
								$cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
								$cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );
								$term_link = get_term_link( $prod_cat, 'product_cat' );
						?>

						<div class="portal">

							<a href="<?php echo $term_link; ?>">
								<img src="<?php echo $cat_thumb_url; ?>" />
							</a>

							<a href="<?php echo $term_link; ?>">
								<h3><?php the_title(); ?></h3>
							</a>

						</div>

						<?php endforeach; wp_reset_query(); ?>

					</div>
				</div>

			</div><!-- #tabs -->

		</div><!-- .shop-portals -->

	</section>

<!-- End Shop Sections -->

<!-- Begin Story Section -->

	<section class="story-lead-in-container">
		<?php $mobile_page_banner = wp_get_attachment_image_src(get_field('story_leading_image'), 'mobile-page-banner'); ?>
		<?php $tablet_page_banner = wp_get_attachment_image_src(get_field('story_leading_image'), 'tablet-page-banner'); ?>
		<?php $desktop_page_banner = wp_get_attachment_image_src(get_field('story_leading_image'), 'desktop-page-banner'); ?>
		<?php $retina_page_banner = wp_get_attachment_image_src(get_field('story_leading_image'), 'retina-page-banner'); ?>

		<picture class="full-width-image">
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

		<div class="story-lead-in page-content">
			<h1><?php the_field('story_title'); ?></h1>
			<h4><?php the_field('story_tagline'); ?></h4>

			<div class="story-image">
				<?php $mobile_page_banner = wp_get_attachment_image_src(get_field('story_supporting_image'), 'mobile-page-banner'); ?>
				<?php $tablet_page_banner = wp_get_attachment_image_src(get_field('story_supporting_image'), 'tablet-page-banner'); ?>
				<?php $desktop_page_banner = wp_get_attachment_image_src(get_field('story_supporting_image'), 'desktop-page-banner'); ?>
				<?php $retina_page_banner = wp_get_attachment_image_src(get_field('story_supporting_image'), 'retina-page-banner'); ?>

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

			<div class="story-content">
				<?php the_field('story_content'); ?>
			</div>
		</div>

	</section><!-- .story-lead-in -->

<!-- End Story Section -->

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
