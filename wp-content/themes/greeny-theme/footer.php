<footer>
    <div class="some-buttons">
        <a href="#"><img  class="symbol" src="<?php echo get_template_directory_uri() ?>/images/instagram.svg" alt="instagram" ></a>
        <a href="#"><img  class="symbol" src="<?php echo get_template_directory_uri() ?>/images/twitter.svg" alt="twitter" ></a>
        <a href="#"> <img  class="symbol" src="<?php echo get_template_directory_uri() ?>/images/facebook.svg" alt="facebook" ></a>

    </div>
    <?php
        wp_nav_menu( 
            array(
                'menu_class' => 'secundary-menu',        
                'theme_location' => 'secundary-menu'
            ) 
        )
    ?>
</footer>

<?php wp_footer(); ?>
</body>
</html>