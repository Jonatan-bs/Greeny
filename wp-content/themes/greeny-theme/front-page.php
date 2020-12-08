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
            with our <a href="#" class="color-contrast">starter pack</a>
        </p>
    </div>
<!-- Products -->
    <div class="content">
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
                            <?php echo woocommerce_get_product_thumbnail(); ?>
                        </a>
                        <a href="<?php the_permalink(); ?>">
                            <h3><?php the_title(); ?></h3>
                        </a>
                        <?php echo $price; ?>
                    </div>
                    <?php
                
                
                endwhile;
            
            }
        ?>
    </div>
<!-- Symbols -->
<!-- About Greeny juices -->
    <section class="about-greeny">
        <div class="content">
            tst
        </div>

    </section>
<!-- Blog -->
<!-- Newsletter -->
</div>
<?php get_footer(); ?>


