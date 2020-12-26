<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Greeny</title>
    <?php wp_head(); ?>
</head>
    <header class="light greeny">
        <div class="container">
            <a href="<?php bloginfo( 'url' )?>">
                <img src="<?php bloginfo('template_directory')?>/images/logo-light.svg" alt="logo" class="logo">
            </a>
            <div class="symbols">
                <a href="<?php echo get_page_link( 9 ); ?>">
                    <div class="account symbol">
                        <img src="<?php echo get_template_directory_uri() ?>/images/account-light.svg" alt="account" >
                    </div>
                </a>
                <a href="<?php echo get_page_link( get_page_by_title( 'cart' )->ID ); ?>">
                    <div class="add-to-cart symbol">
                        <img  class="" src="<?php echo get_template_directory_uri() ?>/images/cart-light.svg" alt="cart" >
                        <div class="qty" <?php if(!WC()->cart->get_cart_contents_count()) : ?> style="display:none" <?php endif ?>>
                                    <span >
                                        <?php echo WC()->cart->get_cart_contents_count(); ?>
                                    </span>
                        </div>
                    </div>
                </a>
            </div>
            <?php
                wp_nav_menu( 
                    array(
                        'menu_class' => 'primary-menu',        
                        'theme_location' => 'primary-menu'
                    ) 
                )
            ?>
        </div>
    </header>
<body <?php body_class() ?>>
    
