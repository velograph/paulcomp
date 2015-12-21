<?php
/**
 * Template Name: Shop
 *
 * @package Paul Component Engineering
 * @version     2.0.0
 */

get_header(); ?>

	<script>
	jQuery(document).ready(function(){
		jQuery( "#tabs" ).tabs();
	});

	</script>

	<!-- Begin Shop Sections -->

		<section class="portal-container">

			<!-- <div class="leading-shop-image">

				<?php $mobile_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( 8 ), 'page-banner-mobile'); ?>
				<?php $tablet_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( 8 ), 'page-banner-tablet'); ?>
				<?php $desktop_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( 8 ), 'page-banner-desktop'); ?>
				<?php $retina_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( 8 ), 'page-banner-retina'); ?>

				<picture>
					<!--[if IE 9]><video style="display: none"><![endif]
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
					<!--[if IE 9]></video><![endif]
					<img srcset="<?php echo $image[0]; ?>">
				</picture>

				<div class="overlay">
					<h1 class="thumb-title">
						Shop
					</h1>
				</div>

			</div> -->

			<div class="shop-portals">

				<div id="tabs">
					<ul>
						<li class="tab-trigger">
							<a href="#components-tab">
								<?php
									global $post,$wpdb;
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
									<h2 class="thumb-title">
										Components
									</h2>
									<span class="arrow-up">&nbsp;</span>
								</div>
								<span class="mobile-arrow-up">&nbsp;</span>

							</a>
						</li>
						<li class="tab-trigger">
							<a href="#spare-parts-tab">
								<?php
									global $post,$wpdb;
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
									<h2 class="thumb-title">
										Service Parts
									</h2>
									<span class="arrow-up">&nbsp;</span>
								</div>
								<span class="mobile-arrow-up">&nbsp;</span>

							</a>
						</li>
						<li class="tab-trigger">
							<a href="#apparel-accessories-tab">
								<?php
									global $post,$wpdb;
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
									<h2 class="thumb-title">
										Apparel &amp; Accessories
									</h2>
									<span class="arrow-up">&nbsp;</span>
								</div>
								<span class="mobile-arrow-up">&nbsp;</span>

							</a>
						</li>
					</ul>
					<div id="components-tab">
						<h2 class="mobile-tab-title">
							Components
						</h2>
						<div class="portal-container page-content">

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
						<h2 class="mobile-tab-title">Service Parts</h2>
						<div class="portal-container page-content">

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
						<h2 class="mobile-tab-title">Apparel &amp; Accessories</h2>
						<div class="portal-container page-content">

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

<?php get_footer(); ?>
