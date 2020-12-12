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


//Add Google Font Set
 function youttheme_font_typekit() {
 echo '<script src="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap"></script>';
echo '<script src="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Lora:ital@0;1&display=swap"></script>';
echo '<script src="https://fonts.googleapis.com/css2?family=Caveat+Brush&family=Josefin+Sans&display=swap"></script>';
 }
 //Add fonts
add_action('wp_head', 'youttheme_font_typekit');

// Add favicon
function add_favicon() { ?>
    <link rel="shortcut icon" href="/wp-content/themes/greeny-theme/favicons/favicon-32x32.png" >
<?php }
add_action('wp_head', 'add_favicon');
add_action('admin_head', 'add_favicon');



// Add custom ingrediants fields to products

/**
 * Repeatable Custom Fields in a Metabox
 * Author: Helen Hou-Sandi
 *
 * From a bespoke system, so currently not modular - will fix soon
 * Note that this particular metadata is saved as one multidimensional array (serialized)
 */
 


add_action('admin_init', 'hhs_add_meta_boxes', 1);

// Add meta fields
function hhs_add_meta_boxes() {
	add_meta_box( 'ingredients-fields', 'Ingredients Fields', 'hhs_ingredients_meta_box_display', 'product', 'normal', 'default');
}

// create frontend
function hhs_ingredients_meta_box_display() {
	global $post;

	$ingredients_fields = get_post_meta($post->ID, 'ingredients_fields', true);

	wp_nonce_field( 'hhs_ingredients_meta_box_nonce', 'hhs_ingredients_meta_box_nonce' );
	?>
    <script type="text/javascript">
    // Create new field on click
	jQuery(document).ready(function( $ ){
		$( '#add-row' ).on('click', function() {
			var row = $( '.empty-row.screen-reader-text' ).clone(true);
			row.removeClass( 'empty-row screen-reader-text' );
			row.insertBefore( '#ingredients-fieldset-one tbody>tr:last' );
			return false;
		});
  	
		$( '.remove-row' ).on('click', function() {
			$(this).parents('tr').remove();
			return false;
		});
    });
    // Use media library
    jQuery(function($){
    $('body').on('click', '.upload_image_button', function(e){
        e.preventDefault();
  
        var button = $(this),
        uploader = wp.media({
            title: 'Ingredients symbols',
            library : {
                uploadedTo : wp.media.view.settings.post.id,
                type : 'image'
            },
            button: {
                text: 'Use this image'
            },
            multiple: false
        }).on('select', function() {
            var attachment = uploader.state().get('selection').first().toJSON();
            button.closest('tr').find('.upload_image').val(attachment.id);
            button.closest('tr').find( ".ingredient-symbol" ).attr( {"src": attachment.url, 'width': attachment.sizes.thumbnail.width, 'height': attachment.sizes.thumbnail.height})
            button.closest('tr').find('input.upload_image_button').hide()
        })
        .open();
    });
});

    </script>
    
  
	<table id="ingredients-fieldset-one" width="100%">
	<thead>
		<tr>
			<th width="20%">Title</th>
			<th width="40%">Text</th>
			<th width="20%">Image</th>
			<th width="10%">Percentage</th>
			<th width="10%"></th>
		</tr>
	</thead>
	<tbody>
	<?php
	
	if ( $ingredients_fields ) :
	
	foreach ( $ingredients_fields as $field ) {
	?>
	<tr>
        <td><input class="widefat" type="text" name="title[]"  value="<?php if($field['title'] != '') echo esc_attr( $field['title'] ); ?>" /></td>
		<td><textarea class="widefat" name="text[]"> <?php if($field['text'] != '') echo esc_attr( $field['text'] ); ?> </textarea></td>
        <td><input class="upload_image" type="hidden" size="36" name="image[]" value="<?php if($field['image'] != '') echo esc_attr( $field['image'] ); ?>" />
        <?php 
        if($field['image'] != '') {
           $image_attr = wp_get_attachment_image_src(  esc_attr( $field['image'], 'thumbnail' ));
        ?>
        <img class="ingredient-symbol upload_image_button" src="<?php echo $image_attr[0] ?>" width="<?php echo $image_attr[1] ?>" height="<?php echo $image_attr[2] ?>" alt="">
        <?php   
        } else {
        ?>
        <img class="ingredient-symbol upload_image_button"/>
        <input class="upload_image_button" type="button" value="Upload Image" /></td>
        <?php     
        }
        ?>
        <td><input class="widefat" type="number" name="percentage[]"  value="<?php if($field['percentage'] != '') echo esc_attr( $field['percentage'] ); ?>" /></td>

		<td><a class="button remove-row" href="#">Remove</a></td>
	</tr>
	<?php
	}
	else :
	// show a blank one
	?>
	<tr>
        <td><input class="widefat" type="text" name="title[]" /></td>
        <td><textarea type="text" class="widefat" name="text[]"  ></textarea></td>
        <td><input class="upload_image" type="hidden" size="36" name="image[]" />
        <img class="ingredient-symbol upload_image_button"/>
        <input class="upload_image_button" type="button" value="Upload Image" /></td>
        <td><input class="widefat" type="number" name="percentage[]" /></td>
		<td><a class="button remove-row" href="#">Remove</a></td>
	</tr>
	<?php endif; ?>
	
	<!-- empty hidden one for jQuery -->
	<tr class="empty-row screen-reader-text">
        <td><input class="widefat" type="text" name="title[]" /></td>
        <td><textarea type="text" class="widefat" name="text[]"> </textarea></td>
        <td><input class="upload_image" type="hidden" size="36" name="image[]" />
        <img class="ingredient-symbol upload_image_button"/>
        <input class="upload_image_button" type="button" value="Upload Image" /></td>
        <td><input class="widefat" type="number" name="percentage[]" /></td>
		<td><a class="button remove-row" href="#">Remove</a></td>
	</tr>
	</tbody>
	</table>
	
	<p><a id="add-row" class="button" href="#">Add another</a></p>
	<?php
}

// Save post meta 
add_action('save_post', 'hhs_ingredients_meta_box_save');
function hhs_ingredients_meta_box_save($post_id) {
	if ( ! isset( $_POST['hhs_ingredients_meta_box_nonce'] ) ||
	! wp_verify_nonce( $_POST['hhs_ingredients_meta_box_nonce'], 'hhs_ingredients_meta_box_nonce' ) )
		return;
	
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	
	if (!current_user_can('edit_post', $post_id))
		return;
	
	$old = get_post_meta($post_id, 'ingredients_fields', true);
	$new = array();
	
	$titles = $_POST['title'];
	$texts = $_POST['text'];
	$images = $_POST['image'];
	$percentages = $_POST['percentage'];
	
    $count = count( $texts );
    
	for ( $i = 0; $i < $count; $i++ ) {
		if ( $texts[$i] != '' &&  $images[$i] != '' && $titles[$i] != '' && $percentages[$i] != ''  ) :
			$new[$i]['title'] = stripslashes( strip_tags( $texts[$i] ) );
			$new[$i]['text'] = stripslashes( strip_tags( $texts[$i] ) );
			$new[$i]['percentage'] = stripslashes( strip_tags( $percentages[$i] ) );
			$new[$i]['image'] = stripslashes( strip_tags( $images[$i] ) );
		endif;
    }
    
	if ( !empty( $new ) && $new != $old )
		update_post_meta( $post_id, 'ingredients_fields', $new );
	elseif ( empty($new) && $old )
		delete_post_meta( $post_id, 'ingredients_fields', $old );
}
