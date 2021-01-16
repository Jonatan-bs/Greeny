<?php

// Template + positions
add_action('admin_init', 'add_component_position_meta_boxes', 1);

// Add meta fields
function add_component_position_meta_boxes() {
	add_meta_box( 'component-position-fields', 'Component Position Fields', 'component_position_meta_box_display', 'product', 'normal', 'default');
}

// create frontend
function component_position_meta_box_display() {
    $options = [
        [
            "value" => "content",
            "title" => "Main text"
        ],
        [
            "value" => "symbols",
            "title" => "Symbols"
        ],
        [
            "value" => "ingredients",
            "title" => "Ingredients"
        ]

    ];

    global $post;
    
	$component_position_fields = get_post_meta($post->ID, 'component_position_fields', false);
    
	wp_nonce_field( 'component_position_meta_box_nonce', 'component_position_meta_box_nonce' );
	?>
    <script type="text/javascript">
    // Create new field on click
	jQuery(document).ready(function( $ ){
		$( '#component-position' ).on('click', '.add-row', function() {
			var row = $(this).closest('#component-position').find('.empty-row.screen-reader-text').clone(true);
            row.removeClass( 'empty-row screen-reader-text' );
            row.find('select').prop("disabled", false)
			row.insertBefore( '#component-position-fieldset-one tbody>tr:last' );
			return false;
		});
  	
		$( '.remove-row' ).on('click', function() {
			$(this).parents('tr').remove();
			return false;
		});
    });
    

    </script>
    
    <div id="component-position">
        <table id="component-position-fieldset-one" width="100%">
            <thead>
                <tr>
                    <th width="100%">Component</th>
                </tr>
            </thead>
            <tbody>
            <?php
            
            if ( $component_position_fields ) :
            
            foreach ( $component_position_fields as $field ) {
                ?>
                <tr>
                    <td>
                    <select name="component[]" class="widefat" selected="<?php if($field['component'] != '') echo esc_attr( $field['component'] ); ?>"> 
                        <?php foreach( $options as $option){ ?>
                        
                            <option value="<?php echo $option['value'] ?>" 
                                <?php if( $option['value'] === $field['component']) echo 'selected="selected"' ?> 
                            >
                                <?php echo $option['title'] ?>
                            </option>


                        <?php } ?>
                    </select>   
                    
                    <td><a class="button remove-row" href="#">Remove</a></td>
                </tr>
                <?php
            }

            else :

                ?>
                    <tr>
                        <td>
                        <select name="component[]" class="widefat"> 
                            <?php foreach( $options as $option){ ?>
                            
                                <option value="<?php echo $option['value'] ?>" 
                                    <?php if( $option['value'] === 'content') echo 'selected="selected"' ?> 
                                >
                                    <?php echo $option['title'] ?>
                                </option>


                            <?php } ?>
                        </select>   
                        
                        <td><a class="button remove-row" href="#">Remove</a></td>
                    </tr>
                <?php
           
            endif; ?>
            
            <!-- empty hidden one for jQuery -->
            <tr class="empty-row screen-reader-text">
                <td>
                    <select disabled='disabled' name="component[]" class="widefat"> 
                        <?php foreach( $options as $option){ ?>
                            
                            <option value="<?php echo $option['value'] ?>">                             
                                <?php echo $option['title'] ?>
                            </option>


                        <?php } ?>
                    </select> 
                </td>
                <td><a class="button remove-row" href="#">Remove</a></td>
            </tr>
            </tbody>
        </table>
        
        <p><a class="add-row" class="button" href="#">Add component</a></p>
    </div>
	<?php
};

// Save post meta 
add_action('save_post', 'component_position_meta_box_save');
function component_position_meta_box_save($post_id) {
	if ( ! isset( $_POST['component_position_meta_box_nonce'] ) ||
	! wp_verify_nonce( $_POST['component_position_meta_box_nonce'], 'component_position_meta_box_nonce' ) )
		return;
	
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	
	if (!current_user_can('edit_post', $post_id))
		return;
	
	$old = get_post_meta($post_id, 'component_position_fields', true);
    
    $new = array();
	
	$components = $_POST['component'];
    
    $count = count( $components );
    
	for ( $i = 0; $i < $count; $i++ ) {
		if ( $components[$i] ) :
			$new[$i]['component'] = stripslashes( strip_tags( $components[$i] ) );
		endif;
    }
    
	if ( !empty( $new ) && $new != $old )
		update_post_meta( $post_id, 'component_position_fields', $new );
	elseif ( empty($new) && $old )
		delete_post_meta( $post_id, 'component_position_fields', $old );
}

