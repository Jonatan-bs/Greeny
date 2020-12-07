<?php 

// Load style sheets
function load_stylesheets(){
    wp_register_style('stylesheet', get_template_directory_uri() . '/app.css', '', 1, 'all');
    wp_enqueue_style('stylesheet');
};

add_action( 'wp_enqueue_scripts', 'load_stylesheets');

// Load scripts
function load_javascript(){
    wp_register_script('custom', get_template_directory_uri() . '/app.js', '', 1, true);
    wp_enqueue_script('custom');
};
add_action( 'wp_enqueue_scripts', 'load_javascript');

//Support
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' ); 

//register menus
register_nav_menus(
    array(
        'primary-menu' => 'Primary Menu',
        'secundary-menu' => 'secundary-menu'
    )
);

//add image size
add_image_size('post_image', 1100, 750, false); 

// Add a widget
register_sidebar(
    array(
        'name' => 'Page Sidebar',
        'id' => 'page-sidebar',
        'class' => '',
        'before_title' => '<h4>',
        'before_title' => '</h4>',
        
    )
);

// Declare woocommerce support
function add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'add_woocommerce_support' );

    
// Add favicon
function add_favicon() { ?>
    <link rel="shortcut icon" href="/wp-content/themes/greeny-theme/favicons/favicon-32x32.png" >
<?php }
add_action('wp_head', 'add_favicon');
add_action('admin_head', 'add_favicon');