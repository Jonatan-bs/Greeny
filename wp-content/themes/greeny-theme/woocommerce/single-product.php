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
					$hideContent = false;
					
					foreach($components as $component){
						if($component['component'] === 'hideContent'):
							$hideContent = true;
							break;
						endif;
					}

				?>
				<div class="content text ">
					<section class="content mb <?php echo $hideContent? 'hidden' : ''; ?>">

					
					<?php  
						if(!$hideContent){
							if($components){
								foreach($components as $component){
									switch ($component['component']) {
										case 'content':
											the_content();
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
								the_content();
							}
						}
					?>
					</section>
					<?php if ($product->is_purchasable() && !$hideContent) { ?>   
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
						// do_action( 'woocommerce_after_single_product_summary' );
						echo $hideContent?  '' : '<hr>';
						$args['product-id'] = $product->get_id() ;
					 	get_template_part('components/products', 'related', $args); ?>

					
				</div>

			<?php endwhile; ?>
		
<?php

get_footer( 'shop' );

