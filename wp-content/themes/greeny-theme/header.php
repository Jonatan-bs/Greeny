<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Greeny</title>
    <?php wp_head(); ?>
</head>
    <header>
        <div class="container">
            <a href="<?php bloginfo( 'url' )?>">
                <img src="<?php bloginfo('template_directory')?>/images/logo-light.svg" alt="logo" class="logo">
            </a>
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
    
