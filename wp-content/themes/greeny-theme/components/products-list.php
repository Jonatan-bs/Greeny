<div class="product-list center">
    <div class="content col-4 gap-5 loadMoreTarget mb-1 ">
        <?php
            
            $args = array(
                'post_type'           => 'product',
                'post_status'         => 'publish',
                'posts_per_page'      => 9,
                'orderby'             => 'menu_order',
                'order'               => 'ASC',
                'paged'               => 1 
            );
            
            $productsQuery = new WP_Query( $args );
                
            if ($productsQuery->have_posts()) {
            
                while ($productsQuery->have_posts()) : 
                
                    $productsQuery->the_post();
                    
                    $args['product'] = get_product( $productsQuery->post->ID );            
                    ?>
                        <?php  get_template_part('components/partials/product', 'single', $args);?>
                       
                    <?php
                
                
                endwhile;
            
            }
        ?>
    </div>
    <?php
        if (  $productsQuery->max_num_pages > 1 )
        echo '<div class="loadmore button mb-1">Load more</div>'; // you can use <a> as well
    ?>

</div>