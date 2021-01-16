<?php
//// Load more functionality

function loadmore_ajax_handler(){

    $args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1;
	$args['post_status'] = 'publish';
            
           
            $args = array(
                'post_type'           => 'product',
                'post_status'         => 'publish',
                'posts_per_page'      => 3,
                'orderby'             => 'menu_order',
                'order'               => 'ASC',
                'paged'               => $args['paged']
            );
            
            $productsQuery = new WP_Query( $args );
                
            if ($productsQuery->have_posts()) {
            
                while ($productsQuery->have_posts()) : 
                
                    $productsQuery->the_post();
                    
                    $args['product'] = get_product( $productsQuery->post->ID );
                    $args['loadMore'] = true;

                    ?>
                        <?php  get_template_part('components/partials/product', 'single', $args);?>
                       
                    <?php
                
                
                endwhile;
            
            }
        
	die; // here we exit the script and even no wp_reset_query() required!
}
add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

