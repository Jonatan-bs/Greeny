<?php
    $product = $args['product'];
    $loadMore = $args['loadMore'] ? 'activated ' : '';
    $classes = $loadMore . 'product animate slideIn sequence'
    
?>
<div  id="product-<?php the_ID(); ?>" <?php wc_product_class( $classes , $product ); 

?> >
    <a href="<?php the_permalink(); ?>">
        <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false );?>
        <img  class="product-image" src="<?echo $src[0];?>"  alt="<?php echo get_post_meta( get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true ); ?>">
        
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
            if ($product->is_purchasable() && $product->is_in_stock()) {
        ?>
            
            <p class="price <?php if ($product->get_sale_price()) {?> onsale <?php } ?>">
                <?php if(!$product->is_type( 'variable' )) { ?>
                    <?php if ($product->get_sale_price()) {?>
                        <span class="sales-price"><?php echo $product->get_sale_price(), get_woocommerce_currency_symbol() ?></span>
                    <?php } ?>
                    <?php echo wc_format_decimal($product->get_regular_price(),2), get_woocommerce_currency_symbol() ?>
                <?php } elseif ($product->is_type( 'variable' )){ 
                    
                            if( $product->get_variation_price() !== $product->get_variation_price('max')){ ?>
                                <span class="sales-price">
                                    <?php echo wc_format_decimal($product->get_variation_price(),2), get_woocommerce_currency_symbol() ?>
                                     - 
                                    <?php echo wc_format_decimal($product->get_variation_price('max'),2), get_woocommerce_currency_symbol() ?>
                                </span>
                            <?php } else { ?>
                                <span class="sales-price">
                                    <?php echo wc_format_decimal($product->get_variation_price(),2), get_woocommerce_currency_symbol() ?>
                                </span>
                            <?php }
                    
                    ?>
                <?php } ?>
            </p>
            <?php if(!$product->is_type( 'variable' )) { ?>
                <div class="add-to-cart-button pointer" data-id="<?php echo esc_attr( $product->get_id() ); ?>" >
                    <img src="<?php echo get_template_directory_uri() ?>/images/cart-add.svg" alt="add to cart" >
                </div>
            <?php } ?>
        <?php
            } else {
        ?>
            <!-- <a class="read-more" href="<?php the_permalink(); ?>">Read more</a>    --> 
        <?php } ?>
   
    <?php //wp_localize_script( 'app', 'php_vars', array('product' => $args['product']) ); ?>
    </div>
</div>