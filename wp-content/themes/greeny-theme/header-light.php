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
                    <img  class="symbol" src="<?php echo get_template_directory_uri() ?>/images/account-light.svg" alt="account" >
                </a>
                <a href="<?php echo get_page_link( get_page_by_title( 'cart' )->ID ); ?>">
                    <img  class="symbol" src="<?php echo get_template_directory_uri() ?>/images/cart-light.svg" alt="cart" >
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
    
