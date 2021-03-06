<?php
/**
 * Template Name: Front Page
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

	  jQuery('.home-page-slider').slick({
		  arrows: false,
		  dots: true,
		  autoplay: true,
		  autoplaySpeed: 3000,
		  mobileFirst: true,
		  lazyLoad: 'ondemand',
	  });

	//   if (jQuery(window).width() > 860) {
		  jQuery( "#tabs" ).tabs();
	//   }

	  jQuery('.mobile-tab-title').matchHeight();
	  jQuery('.portal img').matchHeight();

	});

</script>

<?php while ( have_posts() ) : the_post(); ?>

	<!-- Begin Gallery -->

	<section class="home-page-slider">

		<!-- Repeater -->
		<?php if( have_rows('gallery_images') ) : ?>

		    <?php while ( have_rows('gallery_images') ) : ?>

		        <?php the_row(); ?>

				<?php $mobile_page_banner = wp_get_attachment_image_src(get_sub_field('slider_image'), 'page-banner-mobile'); ?>
				<?php $tablet_page_banner = wp_get_attachment_image_src(get_sub_field('slider_image'), 'page-banner-tablet'); ?>
				<?php $desktop_page_banner = wp_get_attachment_image_src(get_sub_field('slider_image'), 'page-banner-desktop'); ?>
				<?php $retina_page_banner = wp_get_attachment_image_src(get_sub_field('slider_image'), 'page-banner-retina'); ?>

				<a href="<?php echo the_sub_field('page_link'); ?>">
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

					<div class="slide-caption <?php if( get_sub_field( 'caption_position' ) == 'Top of image') : ?>top-caption <?php else: ?>bottom-caption <?php endif; ?>">
						<?php the_sub_field('caption'); ?>
					</div>
				</a>

		    <?php endwhile; ?>

		<?php endif; ?>

	</section>

<!-- End Gallery -->

<!-- Begin Page Lead In -->

	<section class="page-lead-in page-content">
		<div class="lead-in-copy">
			<?php the_field('lead_in_copy'); ?>
		</div>

		<div class="lead-in-title">
			<h1><?php the_field('lead_in_title'); ?></h1>
		</div>
	</section>

<!-- End Page Lead In -->

<!-- Begin Shop Sections -->

	<section class="portal-container">

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
							<img src="https://paulcomp.com/wp-content/uploads/2015/08/klamper_lifestyle_web.jpg" alt="category image">
							<h3 class="mobile-tab-title">Components</h3>

							<div class="overlay">
								<h2 class="thumb-title">
									Components
								</h2>
								<span class="arrow-up">&nbsp;</span>
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
							<img src="https://paulcomp.com/wp-content/uploads/2015/10/service_parts.jpg" alt="category image">
							<h3 class="mobile-tab-title">Service Parts</h3>

							<div class="overlay">
								<h2 class="thumb-title">
									Service Parts
								</h2>
								<span class="arrow-up">&nbsp;</span>
							</div>

						</a>
					</li>
					<li class="tab-trigger">
						<a href="#apparel-accessories-tab">
							<?php
								$cat_id = 9;
								$table_name = $wpdb->prefix . "woocommerce_termmeta";
								$query="SELECT meta_value FROM {$table_name} WHERE `meta_key`='thumbnail_id' and woocommerce_term_id ={$cat_id} LIMIT 0 , 30";
								$result =  $wpdb->get_results($query);

								foreach($result as $result1){
									$img_id= $result1->meta_value;
								}
							?>
							<img src="https://paulcomp.com/wp-content/uploads/2015/08/merchandise_web.jpg" alt="category image">
							<h3 class="mobile-tab-title">Apparel &amp; Accessories</h3>

							<div class="overlay">
								<h2 class="thumb-title">
									Apparel &amp; Accessories
								</h2>
								<span class="arrow-up">&nbsp;</span>
							</div>

						</a>
					</li>
				</ul>
				<div id="components-tab">
					<div class="portal-container">

						<?php // Components ?>
						<?php
						    $prod_categories = get_terms( 'product_cat', array(
						        'orderby' => 'name',
						        'order' => 'ASC',
								'parent' => 7,
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
									<h4>
										<?php echo $prod_cat->name; ?>
									</h4>
								</a>

							</div>

						<?php endforeach; wp_reset_query(); ?>

					</div>
				</div>

				<div id="spare-parts-tab">
					<div class="portal-container">

						<?php // Service Parts ?>
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
									<h4>
										<?php echo $prod_cat->name; ?>
									</h4>
								</a>

							</div>

						<?php endforeach; wp_reset_query(); ?>

					</div>
				</div>

				<div id="apparel-accessories-tab">
					<div class="portal-container">

						<?php // apparel-accessories ?>
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

							<div class="accessories-apparel-portal portal">

								<a href="<?php echo $term_link; ?>">
									<img src="<?php echo $cat_thumb_url; ?>" />
									<h4>
										<?php echo $prod_cat->name; ?>
									</h4>
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
		<?php $mobile_page_banner = wp_get_attachment_image_src(get_field('story_leading_image'), 'page-banner-mobile'); ?>
		<?php $tablet_page_banner = wp_get_attachment_image_src(get_field('story_leading_image'), 'page-banner-tablet'); ?>
		<?php $desktop_page_banner = wp_get_attachment_image_src(get_field('story_leading_image'), 'page-banner-desktop'); ?>
		<?php $retina_page_banner = wp_get_attachment_image_src(get_field('story_leading_image'), 'page-banner-retina'); ?>

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
			<img srcset="<?php echo $image[0]; ?>">
		</picture>

		<div class="story-lead-in page-content">
			<h1><?php the_field('story_title'); ?></h1>
			<h4><?php the_field('story_tagline'); ?></h4>

			<div class="story-image">
				<?php $mobile_page_banner = wp_get_attachment_image_src(get_field('story_supporting_image'), 'portal-mobile'); ?>
				<?php $tablet_page_banner = wp_get_attachment_image_src(get_field('story_supporting_image'), 'portal-tablet'); ?>
				<?php $desktop_page_banner = wp_get_attachment_image_src(get_field('story_supporting_image'), 'portal-desktop'); ?>
				<?php $retina_page_banner = wp_get_attachment_image_src(get_field('story_supporting_image'), 'portal-retina'); ?>

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

			<div class="lead-in-copy story-content">
				<?php the_field('story_content'); ?>
				<p><a href="/story">Keep Reading ></a></p>
			</div>
		</div>

	</section><!-- .story-lead-in -->

<!-- End Story Section -->

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
