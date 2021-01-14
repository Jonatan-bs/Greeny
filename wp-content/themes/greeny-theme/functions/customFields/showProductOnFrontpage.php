<?php 

// Show product on frontpage

// Background color on single product page
add_action('admin_init', 'single_show_on_frontpage', 1);

// Add meta fields
function single_show_on_frontpage() {
	add_meta_box( 'show_on_frontpage', 'Show on frontpage', 'show_on_frontpage_display', 'product', 'side', 'default');
}

// create frontend
function show_on_frontpage_display() {
    global $post;


    $show_on_frontpage = get_post_meta($post->ID, 'show_on_frontpage', true);
	wp_nonce_field( 'show_on_frontpage_display_nonce', 'show_on_frontpage_display_nonce' );
	?>
    
    <div id="show_on_frontpage">
        <input type="checkbox" name="show_on_frontpage" value="1" <?php checked($show_on_frontpage, true, true); ?>"/>
    </div>
	<?php
};

// Save post meta 
add_action('save_post', 'show_on_frontpage_save');
function show_on_frontpage_save($post_id) {
    
	if ( ! isset( $_POST['show_on_frontpage_display_nonce'] ) ||
	! wp_verify_nonce( $_POST['show_on_frontpage_display_nonce'], 'show_on_frontpage_display_nonce' ) )
		return;
	
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	
	if (!current_user_can('edit_post', $post_id))
		return;    

    update_post_meta( $post_id, 'show_on_frontpage', $_POST['show_on_frontpage']);
	
}

