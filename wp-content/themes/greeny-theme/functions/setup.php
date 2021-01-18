<?php


// Load style sheets
function load_stylesheets(){
    wp_register_style('stylesheet', get_template_directory_uri() . '/app.css', '', 1, 'all');
    wp_enqueue_style('stylesheet');
};

add_action( 'wp_enqueue_scripts', 'load_stylesheets');

// Load scripts
function load_javascript(){
    wp_register_script('app', get_template_directory_uri() . '/app.js', '', 1, true);
    wp_enqueue_script('app');
};
add_action( 'wp_enqueue_scripts', 'load_javascript');

//Support
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' ); 

//register menus
register_nav_menus(
    array(
        'primary-menu' => 'Primary Menu',
        'secundary-menu' => 'Secundary Menu',
        'primary-menu-mobile' => 'Primary Menu Mobile'
    )
    
);

//add image size
add_image_size('custom_product_thumbnail', 420, 300, true); 

//Change style in WYSIWYG editor
add_action( 'after_setup_theme', 'gutenberg_css' );
 
function gutenberg_css(){
 
	add_theme_support( 'editor-styles' );
	add_editor_style( 'editor.css' ); 
 
}

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


//Add Google Font Set
 function font_typekit() {
echo '<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Caveat+Brush&family=Josefin+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">';
 }
 //Add fonts
add_action('wp_head', 'font_typekit');

// Add favicon
function add_favicon() { ?>
    <link rel="shortcut icon" href="/wp-content/themes/greeny-theme/favicons/favicon-32x32.png" >
<?php }
add_action('wp_head', 'add_favicon');
add_action('admin_head', 'add_favicon');


// Remove menu items on my account page
add_filter ( 'woocommerce_account_menu_items', 'remove_my_account_links' );
function remove_my_account_links( $menu_links ){

	unset( $menu_links['downloads'] );

	return $menu_links;
 
}