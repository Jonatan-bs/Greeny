<?php
/**
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( );
?>

<div class="content header-padding">
	<?php  get_template_part('components/products','list');?>
</div>
<?php
get_footer();
