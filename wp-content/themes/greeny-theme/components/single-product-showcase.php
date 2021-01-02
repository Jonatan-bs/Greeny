<?php 
$product = $args['product'];
?>

<div style="background: <?php echo get_post_meta( $post->ID, 'background_color', true ) ?>" id="product-<?php the_ID(); ?>" <?php wc_product_class( 'header-padding single-product-showcase', $product ); ?>>
    
    <div class="product-wrap">
        <div class="product-image-width">
            <div class="aspect-wrap">
                <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false );?>
                <img  class="product-image animate slideInCenter" src="<?php echo $src[0];?>" alt="">
                <div class="circle"></div>
            </div>
        </div> 

        <div class="info">
            <p  class="title" > 
                <?php echo the_title() ?>
            </p>

                    
            <p class="price <?php if ($product->get_sale_price()) {?> onsale <?php } ?>">

            <?php if($product->is_purchasable()){?> 
                <?php if ($product->get_sale_price()) {?>
                    <span class="sales-price"><?php echo $product->get_sale_price(), get_woocommerce_currency_symbol() ?></span>
                <?php } ?>
                <?php echo $product->get_regular_price(), get_woocommerce_currency_symbol()?>
            <? } else if (!$product->is_in_stock()){?>
                <div class="outofstock">Out of stock</div>
            <?php } ?>

            </p>

            <?php 
                if ($product->is_purchasable() ) {
            ?>   
                <div  class="add-to-cart-button pointer light" data-id="<?php echo esc_attr( $product->get_id() ); ?>" > 
                    <p>Add to cart</p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>	