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

			<?php
			$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			$terms = get_terms( 'product_cat', array(
				'hide_empty' => 1,
				'orderby' => 'name',
				'child_of' => $current_term->term_id,
			) );
			?>

			<?php
			// now run a query for each animal family
			foreach( $terms as $term ) {

			    // Define the query
			    $args = array(
			        'post_type' => 'product',
			        'product_cat' => $term->slug
			    );
			    $query = new WP_Query( $args ); ?>

				<h2><?php echo $term->name; ?></h2>

				<div class="portal-container page-content">

			        <?php while ( $query->have_posts() ) : $query->the_post(); ?>

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
								<img srcset="<?php echo $desktop_page_banner[0]; ?>">
							</picture>
							<h4>
								<?php the_title(); ?>
							</h4>
						</a>
			        </div>

					<?php endwhile; ?>

			    </div>

			    <?php wp_reset_postdata(); } ?>

		<?php endif; ?>

	</div>

<!-- End Shop Sections -->

<?php get_footer(); ?>
