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
				
				<div class="content text">
					<section class="content mb">

					
					<?php  
							$components = get_post_meta( $post->ID, 'component_position_fields', true );
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
										
									}
								}
							} else{
								the_content();
							}
							
					?>
					</section>
					
				</div>

			<?php endwhile; ?>
		
<?php
get_footer( 'shop' );

