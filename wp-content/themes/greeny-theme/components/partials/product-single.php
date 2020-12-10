<?php
    $product = $args['product'];
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