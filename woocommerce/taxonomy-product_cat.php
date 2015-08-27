<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<section class="page-content">
	<?php do_action( 'woocommerce_before_main_content' ); ?>
</section>

<div class="shop-portals">

	<?php

	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); // get current term
	$parent = get_term($term->parent, get_query_var('taxonomy') ); // get parent term
	$children = get_term_children($term->term_id, get_query_var('taxonomy')); // get children
	if(($parent->term_id!="" && sizeof($children)>0)) : ?>

		<!-- Has parent and children -->

		<?php $terms = wp_get_post_terms( $post->ID, 'product_cat' );
		if ( !empty( $terms ) && !is_wp_error( $terms ) ) : ?>
			<?php foreach ( $terms as $term ) : ?>
				<?php if ( $term->parent == $cat_name ) : ?>

					<?php
					$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
					$terms = get_terms( 'product_cat', array(
						'hide_empty' => 1,
						'orderby' => 'name',
						'child_of' => $current_term->term_id,
					) );
					?>

					<?php
					// now run a query for each product family
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
			<?php endforeach; ?>

	<?php endif; ?>

	<?php elseif(($parent->term_id!="") && (sizeof($children)==0)) : ?>

		<!-- Has parent, no children -->

		<?php get_template_part('single', 'product'); ?>

	<?php elseif(($parent->term_id=="") && (sizeof($children)>0)) : ?>

		<!-- No parent, has children -->
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

<<<<<<< HEAD
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
=======
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
>>>>>>> Feature/shop

	<?php endif; ?>

<?php endif; ?>

</div>

<?php get_footer( 'shop' ); ?>
