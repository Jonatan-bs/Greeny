<?php get_header('components/header.php'); ?>
<div id="front-page">

<!-- HERO -->
    <div class="hero">
        <div class="text">
            <p class="text-display color-contrast font-display">a convenient way to add fruits and vegetables into your diet</p>
            <p class="text-body color-light">Simply add water or any kind of milk and ENJOY!</p>            
        </div>
        <img src="<?php echo get_template_directory_uri() ?>/images/hero-img.png" alt="sachets">
    </div>

<!-- Starter pack CTA -->
    <div class="starterpack">
        
        <div class="blue-circle"></div>
        <div class="blue-circle"></div>
        <div class="blue-circle"></div>

        <div class="fruits">
            <img src="<?php echo get_template_directory_uri() ?>/images/fruit/pineapple-blue.svg" alt="pineapple" style=" transform: translate(-70px, 10px) rotate(-15deg); width: 150px;">
            <img src="<?php echo get_template_directory_uri() ?>/images/fruit/lime-blue.svg" alt="lime" style=" transform: translate(30px, 60px) rotate(25deg); width: 100px;">
        </div>
        <p class="font-display text-display color-primary" >
            Start or complement your diet today <br>
            with our <a href="<?php echo get_permalink(38) ?>" class="color-contrast-dark">starter pack</a>
        </p>
    </div>
<!-- Products -->
    <div class="content col-4 featured-products">
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
                    <div class="featured-product">
                        <a href="<?php the_permalink(); ?>">
                            <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false );?>
                            <img  class="image" src="<?echo $src[0];?>" alt="">
                        </a>
                        <a href="<?php the_permalink(); ?>">
                            <p class="font-display color-dark text-display title"><?php the_title(); ?></p>
                        </a>
                        <p class="color-medium excerpt"><?php echo strip_tags( get_the_excerpt() ) ?></p>
                        <div class="flex">
                            <p class="price"><?php echo $price; ?></p>
                            <img  class="add-to-cart-button" data-id="<?php echo esc_attr( $product->get_id() ); ?>" src="<?php echo get_template_directory_uri() ?>/images/cart-add.svg" alt="add to cart" >
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
<!-- Symbols -->
    <div class="symbols-container">
        <p class="font-display color-secondary-light text-title" style="top: -210px; left: -260px;">All our juices are</p>
        <img  class="arrow" src="<?php echo get_template_directory_uri() ?>/images/arrow.svg" alt="arrow" style="top: -40px; left: -160px;">
        <div class="symbols">
            <div>
                <img  class="arrow" src="<?php echo get_template_directory_uri() ?>/images/symbol1.png" alt="vegan" >
                <p class="font-display color-secondary-light ">Vegan</p>
            </div>
            <div>
                <img  class="arrow" src="<?php echo get_template_directory_uri() ?>/images/symbol1.png" alt="vegan" >
                <p class="font-display color-secondary-light ">Vegan</p>
            </div>
            <div>
                <img  class="arrow" src="<?php echo get_template_directory_uri() ?>/images/symbol1.png" alt="vegan" >
                <p class="font-display color-secondary-light ">Vegan</p>
            </div>
            <div>
                <img  class="arrow" src="<?php echo get_template_directory_uri() ?>/images/symbol1.png" alt="vegan" >
                <p class="font-display color-secondary-light ">Vegan</p>
            </div>
            
            
        </div>
    </div>
    
<!-- About Greeny juices -->
    <div class="flexcenter">
        <h2 class="color-primary text-title"> Why Greeny Juices?</h2>
    </div>
    <section class="about-greeny">
        <div class="content">
            <div class="cards">
                <div class="card text-display">
                    <img  class="symbol" src="<?php echo get_template_directory_uri() ?>/images/satchels-symbol.svg" alt="vegan" >
                    <p class="font-display color-light">It’s a convenient way to add fruits and vegetables into your diet without worrying about choosing the right ingredients by yourself.</p>
                </div>
                <div class="card text-display">
                    <img  class="symbol" src="<?php echo get_template_directory_uri() ?>/images/satchels-symbol.svg" alt="vegan" >
                    <p class="font-display color-light">It’s a convenient way to add fruits and vegetables into your diet without worrying about choosing the right ingredients by yourself.</p>
                </div>
                <div class="card text-display">
                    <img  class="symbol" src="<?php echo get_template_directory_uri() ?>/images/satchels-symbol.svg" alt="vegan" >
                    <p class="font-display color-light">It’s a convenient way to add fruits and vegetables into your diet without worrying about choosing the right ingredients by yourself.</p>
                </div>
                <div class="card text-display">
                    <img  class="symbol" src="<?php echo get_template_directory_uri() ?>/images/satchels-symbol.svg" alt="vegan" >
                    <p class="font-display color-light">It’s a convenient way to add fruits and vegetables into your diet without worrying about choosing the right ingredients by yourself.</p>
                </div>
            </div>
        </div>

    </section>
<!-- Blog -->
    <div class="content">
        <?php $wpb_all_query = new WP_Query(
            array(
                'post_type'=>'post', 
                'post_status'=>'publish', 
                'posts_per_page'=>-1
                )
        ); ?>
    
        <?php if ( $wpb_all_query->have_posts() ) : ?>
        
        
            <!-- the loop -->
            <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                <div class="blog-card">
                    <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false );?>
                    <img  class="image" src="<?echo $src[0];?>" alt=""/>
                    <div class="container">
                        <a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <div class="excerpt"> <?php the_excerpt(); ?> </div>
                    </div>
                </div>
            
            <?php endwhile; ?>
            <!-- end of the loop -->
        
        
            <?php wp_reset_postdata(); ?>
        
        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
    </div>
    <div class="flexcenter">
        <a class="page-link" href="<?php echo get_page_link( get_page_by_title( 'blog' )->ID ); ?>">Blog</a>
    </div>

<!-- Newsletter -->
    <div class="content">
        <div class="newsletter">
            <img src="<?php echo get_template_directory_uri() ?>/images/paperplane.svg" class="paperplane" alt="paperplane">
            
            <div class="title">Subscribe</div>
            <div class="subtitle">to our newsletter</div>
            <hr>
            <div class="text">Get <span class="big">10%</span> off your first order </div>
            <?php echo do_shortcode( '[email-subscribers-form id="1"]', true); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>


