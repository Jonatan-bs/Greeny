<?php 
$product = $args['product'];
?>

<div style="background: <?php echo get_post_meta( $post->ID, 'background_color', true ) ?>" id="product-<?php the_ID(); ?>" <?php wc_product_class( 'header-padding single-product-showcase', $product ); ?>>
    
    <div class="product-wrap">
        <div class="product-image-width">
            <div class="aspect-wrap">
                <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false );?>
                <img  class="product-image animate slideInCenter" src="<?php echo $src[0];?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true ); ?>">
                <div class="circle"></div>
            </div>
        </div> 

        <div class="info">
            <p  class="title" > 
                <?php echo the_title() ?>
            </p>
            <?php
                if($product->is_type( 'variable' ) ){
            ?>
           <?php /* var_dump( $product->get_available_variations()[1] ) */ ?>
            <select id="variants">
            <?php
                foreach ( $product->get_available_variations() as $variation ){
            ?>
                    <option value="<?php echo $variation["variation_id"]; ?>" 
                        data-is_purchasable="<?php echo $variation["is_purchasable"]?>" 
                        data-is_in_stock="<?php echo $variation["is_in_stock"]?>" 
                        data-id="<?php echo $variation["variation_id"]?>" 
                        data-sales-price="<?php echo $variation["display_price"] != $variation["display_regular_price"] ? $variation["display_price"] : '' ?>" 
                        data-price="<?php echo $variation["display_regular_price"]?>" 
                        data-currency_symbol="<?php echo get_woocommerce_currency_symbol() ?>"
                        >
                        
                            <?php  echo $variation['attributes']["attribute_type"]; ?>
                    </option>
            <?php
                }
            ?>
            </select>
            <?php
            }
            ?>
            <?php
            
            $is_purchasable = $product->is_type( 'variable' ) ? $product->get_available_variations()[0]["is_purchasable"] : $product->is_purchasable();
            
            // Set sales price
            if($product->is_type( 'variable' )){
                if($product->get_available_variations()[0]["display_price"] != $product->get_available_variations()[0]["display_regular_price"]){
                    $get_sale_price = $product->get_available_variations()[0]["display_price"];
                } else {
                    $get_sale_price = null;
                }
            } else {
                $get_sale_price = $product->get_sale_price();
            }

            $get_regular_price = $product->is_type( 'variable' ) ? $product->get_available_variations()[0]["display_regular_price"] : $product->get_regular_price();
            $is_in_stock = $product->is_type( 'variable' ) ? $product->get_available_variations()[0]["is_in_stock"] : $product->is_in_stock();
            $id = esc_attr( $product->get_id() );
            $variation_id = $product->is_type( 'variable' ) ? $product->get_available_variations()[0]["variation_id"] : '';

            ?>

            <p class="price <?php if ($get_sale_price) {?> onsale <?php } ?>">            

            <?php if($is_purchasable && $is_in_stock){?> 
                    <span class="sales-price <?php if (!$get_sale_price) { echo 'hidden'; }?>"><?php echo $get_regular_price, get_woocommerce_currency_symbol() ?></span>
                    <span class="displayPrice">
                        <?php 
                        if (!$get_sale_price) { 
                            echo $get_regular_price, get_woocommerce_currency_symbol();
                        } else {
                            echo $get_sale_price, get_woocommerce_currency_symbol();
                        }?>
                    </span>
                    
            <? } else {?>
                <div class="outofstock">Out of stock</div>
            <?php } ?>

            </p>

            <?php 
                if ($is_purchasable && $is_in_stock) {
            ?>   
                <div  class="add-to-cart-button pointer light" data-id="<?php echo $id; ?>" data-variationId="<?php echo $variation_id; ?>" > 
                    <p>Add to cart</p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>	