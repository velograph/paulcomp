<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template.
 *
 * Override this template by copying it to yourtheme/woocommerce/taxonomy-product_cat.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

<!-- Begin Shop Sections -->

	<section class="page-content">
		<?php do_action( 'woocommerce_before_main_content' ); ?>
	</section>

	<div class="shop-portals">

		<?php if( is_tax('product_cat', 'components') ) : ?>

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

		<?php elseif( is_tax('product_cat', 'service-parts') ) : ?>

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

		<?php elseif( is_tax('product_cat', 'accessories-apparel') ) : ?>

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

		<?php else: ?>

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

			<?php endif; ?>

		<?php endif; ?>

	</div>

<!-- End Shop Sections -->

<?php get_footer(); ?>
