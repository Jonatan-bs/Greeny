<div class="product-list mb center">
    <div class="content col-4">
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
                    
                    $product = get_product( $featured_query->post->ID );
                    $price = $product->get_price_html();
            
                    ?>
                    <div class="product">
                        <a href="<?php the_permalink(); ?>">
                            <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false );?>
                            <img  class="image" src="<?echo $src[0];?>" alt="">
                        </a>
                        <a href="<?php the_permalink(); ?>">
                            <p class="display-md color-dark  title"><?php the_title(); ?></p>
                        </a>
                        <p class="color-medium excerpt"><?php echo strip_tags( get_the_excerpt() ) ?></p>
                        <div class="flex">
                            <p class="price"><?php echo $price; ?></p>
                            <img  class="add-to-cart-button pointer" data-id="<?php echo esc_attr( $product->get_id() ); ?>" src="<?php echo get_template_directory_uri() ?>/images/cart-add.svg" alt="add to cart" >
                        </div>
                    </div>
                    <?php
                
                
                endwhile;
            
            }
        ?>
    </div>

    <div class="flexcenter">
        <a class="page-link" href="<?php echo get_page_link( get_page_by_title( 'shop' )->ID ); ?>">Shop</a>
    </div>
</div>