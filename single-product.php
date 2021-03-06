<?php
/**
 * The template for displaying all single posts.
 *
 * @package Paul Component Engineering
 * @version     2.4.7
 */

get_header(); ?>

	<script>
	jQuery(document).ready(function(){

		jQuery(".accordion").hide();
		jQuery('.value').each(function() {
		    var $dropdown = jQuery(this);

		    jQuery(".accordion-hook", $dropdown).click(function(e) {
		      e.preventDefault();
		      $div = jQuery(".accordion", $dropdown);
		      $div.toggle('blind');
		      jQuery(".accordion").not($div).hide('blind');
		      return false;
		    });

		});

		  jQuery('html').click(function(){
		    jQuery(".accordion").hide('blind');
		  });

	});
	</script>

	<?php get_template_part('partials/breadcrumbs'); ?>

	<?php do_action( 'woocommerce_before_single_product' ); ?>

	<section class="product-container">

		<?php while ( have_posts() ) : the_post(); ?>

			<section class="product-section product-top">

				<script>
					jQuery(document).ready(function(){
						jQuery('.product-image').slick({
						  slidesToShow: 1,
						  slidesToScroll: 1,
						  arrows: false,
						  asNavFor: '.product-thumbs'
						});
						jQuery('.product-thumbs').slick({
						  slidesToShow: 3,
						  slidesToScroll: 1,
						  arrows: false,
						  asNavFor: '.product-image',
						  dots: false,
						  focusOnSelect: true
						});

						jQuery('.supporting-video-container').slick({
						  slidesToShow: 1,
						  slidesToScroll: 1,
						  dots: true,
						  arrows: false,
						});

						var video_width = jQuery('.supporting-video-container').width();
						var iframe_height = ( video_width * ('.' + 75) );
						jQuery('.supporting-video-container').css('height', iframe_height);
						jQuery('.supporting-video iframe').css('height', iframe_height);
					});
				</script>

				<div class="product-gallery-container">

					<div class="product-image">

						<?php if( get_field('gallery') ) : ?>

							<?php

							$images = get_field('gallery');

							if( $images ): ?>
								<?php foreach( $images as $image ): ?>

									<picture class="portal-image">
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

						<?php else: ?>

							<?php $mobile_page_banner = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'portal-mobile'); ?>
							<?php $tablet_page_banner = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'portal-tablet'); ?>
							<?php $desktop_page_banner = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'portal-desktop'); ?>
							<?php $retina_page_banner = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'portal-retina'); ?>

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

						<?php endif; ?>

					</div>

					<div class="product-thumbs">

						<?php

						$images = get_field('gallery');

						if( $images ): ?>
							<?php foreach( $images as $image ): ?>

								<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />

							<?php endforeach; ?>
						<?php endif; ?>

					</div>

				</div>

				<div class="product-add-to-cart">

					<h4><?php the_title(); ?></h4>

<?php $dealer_user = wp_get_current_user();
if ( in_array( 'dealer', (array) $dealer_user->roles ) ) { ?>
	<strong>Dealers: Your pricing will appear in the <a href="/cart">cart</a>. We are currently working on showing your pricing on product pages. Thanks for your patience!</strong><br />
<?php } ?>

					<?php if( $product->is_type( 'simple' ) ) : ?>

						<div class="simple-product">
							<?php if ( $price_html = $product->get_price_html() ) : ?>
								<h3><span class="price"><?php echo $price_html; ?></span></h3>
							<?php endif; ?>

					<?php endif; ?>
						<?php
							/**
							* woocommerce_single_product_summary hook
							*
							* @hooked woocommerce_template_single_title - 5
							* @hooked woocommerce_template_single_rating - 10
							* @hooked woocommerce_template_single_price - 10
							* @hooked woocommerce_template_single_excerpt - 20
							* @hooked woocommerce_template_single_add_to_cart - 30
							* @hooked woocommerce_template_single_meta - 40
							* @hooked woocommerce_template_single_sharing - 50
							*/
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
							do_action( 'woocommerce_single_product_summary' );
						?>
					<?php if( $product->is_type( 'simple' ) ) : ?>
						</div>
					<?php endif; ?>

					<div class="lead-in-copy">
						<?php the_excerpt(); ?>
					</div>
				</div>

			</section>

			<section class="product-section product-middle">

				<div class="tech-specs">

					<!-- Tech Specifications Content -->
					<?php if( have_rows('technical_specification_rows') ) : ?>

						<h4>Technical Information</h4>
						<ul>
							<?php while ( have_rows('technical_specification_rows') ) : ?>

								<?php the_row(); ?>

								<?php if( get_row_layout() == 'spec' ) : ?>

									<li>
										<div class="key"><small><?php the_sub_field('key'); ?></small></div>

										<div class="value">
											<small>
												<?php if(get_sub_field('answer') == "Text") : ?>

													<?php the_sub_field('value'); ?>

												<?php elseif(get_sub_field('answer') == "File Download") : ?>

													<a href="<?php the_sub_field('file_download'); ?>">Download</a>

												<?php elseif(get_sub_field('answer') == "Inline Answer") : ?>

													<span class="accordion-hook"><?php the_sub_field('inline_title'); ?>&darr;</span>
													<div class="accordion">
														<?php the_sub_field('inline_answer'); ?>
													</div>

												<?php endif; ?>
											</small>
										</div>
									</li>

								<?php endif; ?>

							<?php endwhile; ?>
						</ul>

					<?php endif; ?>

				</div>

				<?php if( have_rows('video_repeater') ) : ?>

					<div class="supporting-video-container">
					    <?php while ( have_rows('video_repeater') ) : ?>

					        <?php the_row(); ?>

							<div class="supporting-video">
								<?php the_sub_field('video'); ?>
							</div>

					    <?php endwhile; ?>
					</div>

				<?php elseif( the_content() ) : ?>
					<div class="product-story">
						<?php
							if($post->content=="")
							{ ?>
							<?php } else {
						?>
						<?php } ?>

						<h4>Product Story</h4>
						<?php the_content(); ?>
					</div>
				<?php endif; ?>

			</section>

			<?php if( have_rows('video_repeater') ) : ?>
				<section class="product-section product-bottom">
					<div class="product-story">
						<h4>Product Story</h4>
						<?php the_content(); ?>
					</div>
				</section>
			<?php else: ?>
			<?php endif; ?>

			<section class="product-section related-products">
				<!-- <h4>Related Products</h4> -->
				<?php
					remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
					remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
					do_action( 'woocommerce_after_single_product_summary' );
				?>
			</section>

		<?php endwhile; // end of the loop. ?>

	</section>

<?php get_footer(); ?>
