<?php
// Remove actions
remove_action( 'woocommerce_account_content', 'woocommerce_output_all_notices', 5 );

// Remove messages
add_filter( 'wc_add_to_cart_message_html', '__return_null' );

