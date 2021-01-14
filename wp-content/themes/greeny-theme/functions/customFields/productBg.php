<?php

// Background color on single product page
add_action('admin_init', 'single_product_background_color', 1);

// Add meta fields
function single_product_background_color() {
	add_meta_box( 'background_color', 'Background Color', 'single_product_background_color_display', 'product', 'normal', 'default');
}

// create frontend
function single_product_background_color_display() {
    global $post;
    $options = [
        [
            "value" => "#709CAF",
            "title" => "Default"
        ],
        [
            "value" => "#d54970",
            "title" => "Red"
        ],


    ];

	$background_color = get_post_meta($post->ID, 'background_color', true);

	wp_nonce_field( 'single_product_background_color_display_nonce', 'single_product_background_color_display_nonce' );
	?>
    
    <div id="background_color">
        <table id="background_color_table" width="100%">
            <thead>
                <tr>
                    <th width="100%">Background Color</th>
                </tr>
            </thead>
            <tbody>
            <?php
            
            
                ?>
                <tr>
                    <td>
                    <select name="background_color" class="widefat" ?>"> 
                        <?php foreach( $options as $option){ ?>
                        
                            <option value="<?php echo $option['value'] ?>" 
                                <?php if( $option['value'] === $background_color) echo 'selected="selected"' ?> 
                            >
                                <?php echo $option['title'] ?>
                            </option>


                        <?php } ?>
                    </select>   
                    
                </tr>
                
            
            </tbody>
        </table>
        
    </div>
	<?php
};

// Save post meta 
add_action('save_post', 'background_color_save');
function background_color_save($post_id) {
    
	if ( ! isset( $_POST['single_product_background_color_display_nonce'] ) ||
	! wp_verify_nonce( $_POST['single_product_background_color_display_nonce'], 'single_product_background_color_display_nonce' ) )
		return;
	
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	
	if (!current_user_can('edit_post', $post_id))
		return;    

    update_post_meta( $post_id, 'background_color', $_POST['background_color']);
	
}