<div class="product-list center">
    <div class="content col-4 gap-5">
        <?php
            $meta_query  = WC()->query->get_meta_query();
            $tax_query   = WC()->query->get_tax_query();
            $tax_query[] = array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
                'operator' => 'IN',
            );
            
            $args = array(
                'post_type'           => 'product',
                'post_status'         => 'publish',
                'posts_per_page'      => 3,
                'meta_query'          => $meta_query,
                'tax_query'           => $tax_query,
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

    <div class="flexcenter">
        <a class="page-link" href="<?php echo get_page_link( get_page_by_title( 'shop' )->ID ); ?>">Shop</a>
    </div>
</div>