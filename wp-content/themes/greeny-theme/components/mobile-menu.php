<div id="mobile-menu">
    <div class="symbols">
        <a href="<?php echo get_page_link( 9 ); ?>">
            <div class="account symbol">
                <img src="<?php echo get_template_directory_uri() ?>/images/account-light.svg" alt="account" >
            </div>
        </a>
        <a href="<?php echo get_page_link( get_page_by_title( 'cart' )->ID ); ?>">
            <div class="add-to-cart symbol">
                <img  class="" src="<?php echo get_template_directory_uri() ?>/images/cart-light.svg" alt="cart" >
                
                    <div class="qty" <?php if(WC()->cart->get_cart_contents_count()) : ?> <?php endif ?>>
                            <span >
                                <?php echo WC()->cart->get_cart_contents_count(); ?>
                            </span>
                    </div>
                

            </div>
        </a>
        <div class="symbol">
            <div class="burger-menu">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>  
</div>

<div id="mobile-nav">
        <?php
            wp_nav_menu( 
                array(
                    'menu_class' => 'primary-menu-mobile',        
                    'theme_location' => 'primary-menu-mobile'
                ) 
            )
        ?>
</div>