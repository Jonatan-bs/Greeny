<?php

    // Add variables to scripts
    add_action( 'wp_enqueue_scripts', function(){
        global $wp_query; 

        wp_localize_script('app', 'attr', array( 
            'siteurl' => get_option('siteurl'), 
            'imageurl' => get_template_directory_uri() . '/images/',  
            'cartQty' => WC()->cart->get_cart_contents_count(),
            'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
            'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
            'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
            'max_page' => $wp_query->max_num_pages

        ));
    });