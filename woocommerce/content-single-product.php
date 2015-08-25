<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="product-section">

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
			  asNavFor: '.product-image',
			  dots: true,
			//   centerMode: true,
			  focusOnSelect: true
			});
		});

		</script>

		<div class="product-gallery-container">

			<div class="product-image">

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
							<img srcset="<?php echo $portal_desktop[0]; ?>">
						</picture>

					<?php endforeach; ?>
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

		<div class="summary entry-summary">

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
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
				do_action( 'woocommerce_single_product_summary' );
			?>

			<?php the_content(); ?>

		</div><!-- .summary -->

	</div><!-- .product-section -->

	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">

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
			do_action( 'woocommerce_single_product_summary' );
		?>

	</div><!-- .summary -->

	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
