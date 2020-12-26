<?php
    $product = $args['product'];
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'product', $product ); ?> >
    <a href="<?php the_permalink(); ?>">
        <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false );?>
        <img  class="product-image" src="<?echo $src[0];?>" alt="">
        
        <?php if(!$product->is_in_stock()){?> 
            <div class="info outofstock">Out of stock</div>
        <? } ?>
        <?php if($product->is_on_sale()){?> 
            <div class="info sale">Sale!</div>
        <? } ?>

        <!-- Show if bestseller -->
    </a>
    <a href="<?php the_permalink(); ?>">
        <p class="display-md color-dark  title"><?php the_title(); ?></p>
    </a>
    <p class="color-medium excerpt"><?php echo strip_tags( get_the_excerpt() ) ?></p>
    <div class="flex">

        <?php 
            if ($product->is_purchasable() ) {
        ?>
            
            <p class="price <?php if ($product->get_sale_price()) {?> onsale <?php } ?>">
                <?php if ($product->get_sale_price()) {?>
                    <span class="sales-price"><?php echo $product->get_sale_price(), get_woocommerce_currency_symbol() ?></span>
                <?php } ?>
                <?php echo $product->get_regular_price(), get_woocommerce_currency_symbol() ?>
            </p>
            <div class="add-to-cart-button pointer" data-id="<?php echo esc_attr( $product->get_id() ); ?>" >
                <img src="<?php echo get_template_directory_uri() ?>/images/cart-add.svg" alt="add to cart" >
            </div>
        <?php
            } else {
        ?>
            <!-- <a class="read-more" href="<?php the_permalink(); ?>">Read more</a>    --> 
        <?php } ?>
   
    <?php //wp_localize_script( 'app', 'php_vars', array('product' => $args['product']) ); ?>
    </div>
</div>