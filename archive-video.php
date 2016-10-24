<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Paul Component Engineering
 */

get_header(); ?>

	<div id="primary" class="video-portals page-content">

		<?php
		$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		$terms = get_terms( 'category', array(
			'hide_empty' => 1,
			'orderby' => 'count',
			'order' => 'DESC',
			'child_of' => $current_term->term_id,
		) );
		?>

		<?php
		// now run a query for each animal family
		foreach( $terms as $term ) {

			// Define the query
			$args = array(
				'post_type' => 'video',
				'category_name' => $term->slug
			);
			$query = new WP_Query( $args ); ?>

			<h3><?php echo $term->name; ?></h3>

			<div class="portal-container">

				<?php while ( $query->have_posts() ) : $query->the_post(); ?>

					<div class="portal">
						<div class="embed-container">
							<?php the_field('video_embed'); ?>
						</div>
						<p>
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</p>
						<small>
							<?php

							$product_link = get_field('product_link');
							$product_category = get_field('product_category');

							if( $product_link ) :

								$post = $product_link;
								setup_postdata( $post );

								?>
									Featuring: <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<?php wp_reset_postdata();

							elseif( $product_category ) : ?>

								Featuring: <a href="<?php echo get_term_link( $product_category ); ?>"><?php echo $product_category->name; ?></a>

							<?php endif; ?>
						</small>
					</div>

				<?php endwhile; ?>

			</div>

			<?php wp_reset_postdata(); } ?>

<!-- End -->

		<!-- <?php while ( have_posts() ) : the_post(); ?>

			<div class="portal-container">

				<div class="portal">
					<div class="embed-container">
						<?php the_field('video_embed'); ?>
					</div>
					<p>
						<?php

						$product_link = get_field('product_link');
						$product_category = get_field('product_category');

						if( $product_link ) :

							$post = $product_link;
							setup_postdata( $post );

							?>
								Featuring: <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<?php wp_reset_postdata();

						elseif( $product_category ) : ?>

							Featuring: <a href="<?php echo get_term_link( $product_category ); ?>"><?php echo $product_category->name; ?></a>

						<?php endif; ?>
					</p>
				</div>

			</div>

		<?php endwhile; ?> -->

	</div>

<?php get_footer(); ?>
