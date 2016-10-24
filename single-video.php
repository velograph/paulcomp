<?php
/**
 * The template for displaying all single posts.
 *
 * @package Paul Component Engineering
 */

get_header(); ?>

	<div class="content-area">

		<div class="single-video-container">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="video">

					<h2><?php the_title(); ?></h2>

					<div class="embed-container">
						<?php the_field('video_embed'); ?>
					</div>

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

	</div>

<?php get_footer(); ?>
