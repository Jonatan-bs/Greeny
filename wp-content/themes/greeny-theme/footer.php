</div>
<?php  get_template_part('components/mobile-menu');?>
<footer>
    <div class="some-buttons">
        <div>
            <a href="#"><img  class="symbol" src="<?php echo get_template_directory_uri() ?>/images/instagram.svg" alt="instagram" ></a>
        </div>
        <div>
            <a href="#"><img  class="symbol" src="<?php echo get_template_directory_uri() ?>/images/twitter.svg" alt="twitter" ></a>
        </div>
        <div>
            <a href="#"> <img  class="symbol" src="<?php echo get_template_directory_uri() ?>/images/facebook.svg" alt="facebook" ></a>
        </div>

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