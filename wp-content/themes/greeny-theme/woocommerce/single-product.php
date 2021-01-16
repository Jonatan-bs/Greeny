<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header('light'); ?>
<div id="single-product">
	
			<?php while ( have_posts() ) : ?>
				<?php the_post(); 
				// $args = $product);
				?>
				
				<?php get_template_part('components/single-product-showcase', null, ['product' => $product]); ?>
				
				<?php 
					$components = get_post_meta( $post->ID, 'component_position_fields', true );
				?>
				<div class="content text ">
					
					<div class="nav">
						<a href="#" data-section="description" class="active">Description</a>
						<a href="#" data-section="reviews" >Reviews</a>
					</div>

					<section class="description content mb">

					
					<?php  
						
						if($components){
							foreach($components as $component){
								switch ($component['component']) {
									case 'content':
										// the_content();
										break;
									case 'symbols':
										get_template_part('components/symbols');
										break;
									case 'ingredients':
										get_template_part('components/ingredients');
										break;
									case 'hideContent':
										break;
									
								}
							}
						} else{
							if ( !empty( get_the_content() ) ){
								the_content();
							} else{
								echo "There's no description for this product" ;
							}
						}
						
					?>
					</section>
					<section class="reviews mb hidden">
						<?php comments_template(); ?>
					</section>
					<?php if ($product->is_purchasable()) { ?>   
						<div class="flexcenter mb">
							<div class="add-to-cart-button light pointer button" data-id="<?php echo esc_attr( $product->get_id() ); ?>" > 
								<p> 
									Add to cart
								</p>
								<img class="symbol" src="<?php echo get_template_directory_uri() ?>/images/cart-add-light.svg" alt="add to cart" >
							</div>
						</div>
					<?php } ?>

					<?php
						// Related Products 
						// do_action( 'woocommerce_after_single_product_summary' );
						echo $hideContent?  '' : '<hr>';
						$args['product-id'] = $product->get_id() ;
					 	get_template_part('components/products', 'related', $args); ?>

					
				</div>

			<?php endwhile; ?>
		
<?php

get_footer( 'shop' );

