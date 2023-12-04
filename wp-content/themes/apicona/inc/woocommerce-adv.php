<?php

/*
 * Move position of "Add to Cart" button from SHOP page in WooCommerce
 */
if( !function_exists('tm_wc_move_loop_button') ){
function tm_wc_move_loop_button(){
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10 );
}
}
if( function_exists('is_woocommerce') ){
	add_action('init','tm_wc_move_loop_button');
}


/*
 *  WooCommerce Settings
 */
if( function_exists('is_woocommerce') ){  /* Check if WooCommerce plugin activated */
	
	// Remove breadcrumb from woocommerce_before_main_content
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
	remove_action( 'woocommerce_before_main_content', 'woocommerce_page_title', 20);
	
	// Remove Page Title
	function thememount_wc_title(){return '';}
	add_action( 'woocommerce_show_page_title', 'thememount_wc_title' );
	
	
	// Change number or products per row to 3
	add_filter('loop_shop_columns', 'loop_columns');
	if (!function_exists('loop_columns')){
		function loop_columns() {
			global $apicona;
			$woocommerce_column = ( isset($apicona['woocommerce-column']) && trim($apicona['woocommerce-column'])!='' ) ? trim($apicona['woocommerce-column']) :3 ;
			return $woocommerce_column; // 3 products per row
		}
	}
	
	
	// Remove "product" class from product thumb LI
	if( !function_exists('thememount_wc_remove_product_class') ){
		function thememount_wc_remove_product_class($classes) {
			$classes = array_diff($classes, array("product"));
			return $classes;
		}
	}
	
	

	
	/*
	 *  WooCommerce : Settings for related products on single page
	 */
	$wc_single_showRelated = (isset($apicona['wc-single-show-related']) && trim($apicona['wc-single-show-related'])!='') ? $apicona['wc-single-show-related'] : '1' ;
	//var_dump($wc_single_showRelated);
	if( $wc_single_showRelated=='0' ){
		// Remove Related Products
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
	} else {
		// Show Related Products

		// Single product related products : Column
		add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
		function jk_related_products_args( $args ) {
			global $apicona;
			$wc_related_column = ( isset($apicona['wc-single-related-column']) && trim($apicona['wc-single-related-column'])!='' ) ? intval(trim($apicona['wc-single-related-column'])) : 3 ;
			//var_dump($apicona['wc-single-related-column']);
			$args['columns'] = $wc_related_column; // arranged in 2 columns
			return $args;
		}
		
		function woo_related_products_limit() {
			//$posts_per_page = 4;
			global $product, $woocommerce_loop, $apicona;
			$related = $product->get_related();
			if ( sizeof( $related ) == 0 ) return;
			
			$wc_related_count = ( isset($apicona['wc-single-related-count']) && trim($apicona['wc-single-related-count'])!='' ) ? intval(trim($apicona['wc-single-related-count'])) : 3 ;
			
			$args = array(
				'post_type'        		=> 'product',
				'no_found_rows'    		=> 1,
				'posts_per_page'   		=> $wc_related_count,
				'ignore_sticky_posts' 	=> 1,
				'orderby'             	=> 'rand',
				'post__in'            	=> $related,
				'post__not_in'        	=> array($product->id)
			);
			return $args;
		}
		add_filter( 'woocommerce_related_products_args', 'woo_related_products_limit' );

		
	}

	
	// Display xx products per page. Goes in functions.php
	add_filter( 'loop_shop_per_page', function($cols) {
		global $apicona;
		$wc_productPerPage = ( isset($apicona['woocommerce-product-per-page']) && trim($apicona['woocommerce-product-per-page'])!='' ) ? trim($apicona['woocommerce-product-per-page']) : 9 ;
		return $wc_productPerPage;
	}, 20 );


}




/**
 * Define image sizes
 */
function thememount_woocommerce_image_dimensions() {
	
	$tm_wc_sizeadded = get_option('tm_wc_sizeadded');
	
	if( $tm_wc_sizeadded!='yes' ){
		$catalog = array(
			'width' 	=> '520',	// px
			'height'	=> '520',	// px
			'crop'		=> 1 		// true
		);

		$single = array(
			'width' 	=> '800',	// px
			'height'	=> '800',	// px
			'crop'		=> 1 		// true
		);

		$thumbnail = array(
			'width' 	=> '120',	// px
			'height'	=> '120',	// px
			'crop'		=> 0 		// false
		);

		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
		update_option( 'shop_single_image_size', $single ); 		// Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
		
		update_option('tm_wc_sizeadded','yes');
		
	}
}
add_action( 'init', 'thememount_woocommerce_image_dimensions', 1 );

// WooCommerce: Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?><span class="cart-contents"><?php echo $woocommerce->cart->cart_contents_count ?></span><?php
	$fragments['span.cart-contents'] = ob_get_clean();
	return $fragments;
}





function thememount_get_woo_version_number() {
    // If get_plugins() isn't available, require it
	if ( ! function_exists( 'get_plugins' ) )
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	
	// Create the plugins folder and file variables
	$plugin_folder = get_plugins( '/' . 'woocommerce' );
	$plugin_file = 'woocommerce.php';
	
	// If the plugin version number is set, return it 
	if ( isset( $plugin_folder[$plugin_file]['Version'] ) ) {
		return $plugin_folder[$plugin_file]['Version'];

	} else {
	// Otherwise return null
		return NULL;
	}
}


/*
 *  WooCommerce sales flash
 */
function tm_wc_custom_replace_sale_text( $html ) {
    return str_replace( __( 'Sale!', 'woocommerce' ), __( '<span>Sale!</span>', 'woocommerce' ), $html );
}
$themestyle = tm_get_theme_style();
if( $themestyle == 'apiconaadv' ){
	add_filter( 'woocommerce_sale_flash', 'tm_wc_custom_replace_sale_text' );
}
