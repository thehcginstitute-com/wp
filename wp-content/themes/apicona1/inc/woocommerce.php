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


/**************** WooCommerce Settings ******************/
if( function_exists('is_woocommerce') ){  /* Check if WooCommerce plugin activated */
	
	global $apicona;
	
	// Remove breadcrumb from woocommerce_before_main_content
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
	remove_action( 'woocommerce_before_main_content', 'woocommerce_page_title', 20);
	
	// Remove Page Title
	function kwayy_wc_title(){return '';}
	add_action( 'woocommerce_show_page_title', 'kwayy_wc_title' );
	
	
	// Remove "product" class from product thumb LI
	if( !function_exists('kwayy_wc_remove_product_class') ){
		function kwayy_wc_remove_product_class($classes) {
			$classes = array_diff($classes, array("product"));
			return $classes;
		}
	}
	
	
	/**
	 * WooCommerce Extra Feature
	 * --------------------------
	 *
	 * Change number of related products on product page
	 * Set your own value for 'posts_per_page'
	 *
	 */ 
	function woo_related_products_limit() {
		//$posts_per_page = 4;
		global $product, $woocommerce_loop;
		$related = $product->get_related();
		if ( sizeof( $related ) == 0 ) return;
		
		$args = array(
			'post_type'        		=> 'product',
			'no_found_rows'    		=> 1,
			'posts_per_page'   		=> 4,
			'ignore_sticky_posts' 	=> 1,
			'orderby'             	=> 'rand',
			'post__in'            	=> $related,
			'post__not_in'        	=> array($product->id)
		);
		return $args;
	}
	add_filter( 'woocommerce_related_products_args', 'woo_related_products_limit' );
	
	//product per page
	$wc_productPerPage = !empty($apicona['woocommerce-product-per-page']) ? trim(esc_attr($apicona['woocommerce-product-per-page'])) : 9 ;
	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$wc_productPerPage.';' ), 20 );

	
	/**
	 *  Hide "Read More" button if no stock for a product (in product box)
	 */
	if (!function_exists('woocommerce_template_loop_add_to_cart')) {
	function woocommerce_template_loop_add_to_cart( $args = array() ) {
		global $product;
		
		if (!$product->is_in_stock()) return;
		
		if( thememount_get_woo_version_number() < 2.5 ){
			// If WooCommerce older than v2.5
			woocommerce_get_template('loop/add-to-cart.php');
			
			
		} else {
			// If WooCommerce newer than v2.5
			if ( $product ) {
				$defaults = array(
					'quantity' => 1,
					'class'    => implode( ' ', array_filter( array(
						'button',
						'product_type_' . $product->product_type,
						$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
						$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : ''
					) ) )
				);
				$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );
				wc_get_template( 'loop/add-to-cart.php', $args );
			}
			
		}
		
		
		
	}
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
	


}


/**
 * Define image sizes
 */
function kwayy_woocommerce_image_dimensions() {
	
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
add_action( 'init', 'kwayy_woocommerce_image_dimensions', 1 );
