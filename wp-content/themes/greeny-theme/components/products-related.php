<div id="related-products" class="product-list center">
    <h2>Related Products</h2>
    <div class="content col-4 gap-5">
        <?php

            $related_products_IDs = wc_get_related_products($args['product-id'],3);
            
            $meta_query  = WC()->query->get_meta_query();
            $meta_query[] = array(
                array(
                    'ID' => $related_products_IDs,
			        'operator' => 'IN'
                )
            );
            
            // $tax_query   = WC()->query->get_tax_query();
            // $tax_query[] = array(
            //     'taxonomy' => 'product_visibility',
            //     'field'    => 'name',
            //     'terms'    => 'featured',
            //     'operator' => 'IN',
            // );
            
            $args = array(
                'post_type'           => 'product',
                'post_status'         => 'publish',
                'posts_per_page'      => -1,
                // 'meta_query'          => $meta_query,
                'post__in'            => $related_products_IDs
                // 'tax_query'           => $tax_query,
            );
            
            $featured_query = new WP_Query( $args );
                
            if ($featured_query->have_posts()) {
            
                while ($featured_query->have_posts()) : 
                
                    $featured_query->the_post();
                    
                    $args['product'] = get_product( $featured_query->post->ID );            
                    ?>
                        <?php  get_template_part('components/partials/product', 'single', $args);?>
                       
                    <?php
                
                
                endwhile;
            
            }
        ?>
    </div>

</div>