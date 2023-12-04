<?php
// [tm-portfoliobox]
if( !function_exists('thememount_sc_portfoliobox') ){
function thememount_sc_portfoliobox( $atts, $content=NULL ){
	
	global $tm_sc_params_portfoliobox;
	$options_list = tm_create_options_list($tm_sc_params_portfoliobox);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	
	$h2 		= $title;
	$h4 		= $subtitle;
	$txt_align 	= $align;
	
	
	global $wp_query;
	$old_wp_query = $wp_query;
	
	//Hide pagination and sortable links when view is carousel
	if($view=='carousel'){
		$pagination = 'no';
		$sortable   = 'no';
	}
	
	//Hide pagination when sortable is on 
	if($sortable=='yes' && $pagination=='yes'){
		$pagination = 'no';
	}
	
	
	// Adding prettyPhoto JS and CSS file
	wp_enqueue_script( 'prettyphoto' );
	wp_enqueue_style( 'prettyphoto' );
	
	// Box width
	$boxwidth       = ( $view == 'carousel' ) ? 'fix' : $column ;
	$headerCarslBtn = ( $view == 'carousel' ) ? 'carouselbtn="yes"' : '' ;
	$itemWrapper    = ( $view == 'carousel' ) ? 'thememount-carousel-items-wrapper' : '' ;
	$itemCol        = ( $view == 'carousel' ) ? 'thememount-carousel-col-'.$column : '' ;
	$rowFix         = ( $view == 'carousel' ) ? '' : 'multi-columns-row' ;
	$boxwidth       = $column ;
	
	// adding DATA tags
	$datatags = tm_carousel_data_html( get_defined_vars() );
	
	$rand = mt_rand(1000, 9999);
	$rand .= mt_rand(1000, 9999);
	
	// Generating Button Code
	$btnCode = '';
	if( trim($btntext)!='' && trim($btnlink)!='' ){
		$btnCode = '<div class="kwayy-pf-btn kwayy-center">' . do_shortcode('[vc_button title="'.$btntext.'" target="_self" color="skincolor" size="wpb_regularsize" href="'.$btnlink.'" btn_effect="colortoborder" showicon="withouticon" iconposition="left"]') . '</div>';
	}
	
	$return = '<div class="row '.$rowFix.' thememount-portfolio-boxes-wrapper thememount-portfolio-view-'.$view.' thememount-effect-'.$view.' thememount-items-col-'.$column.' thememount-portfolio-design-'.$pdesign.' '.$itemCol.' '.$el_class.'" id="thememount-portfolio-id-'.$rand.'"  '.$datatags.'>';
		
		$portfolioWrapperStart = '<div class="thememount-portfolio-boxes col-xs-12 col-sm-12 col-md-12 col-lg-12">';
		$portfolioWrapperEnd   = '</div>';
		$contentWrapperStart   = '<div class="thememount-portfolio-text col-xs-12 col-sm-12 col-md-12 col-lg-12">';
		$contentWrapperEnd     = '</div>';
		
		$return .= $contentWrapperStart;
		$return .= tm_vc_element_heading( get_defined_vars() );
		$return .= $contentWrapperEnd;
		
		//Protect against arbitrary paged values
		$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
		
		$args = array(
			//'post_status'    => 'published',
			'post_type'      => 'portfolio',
			'posts_per_page' => $show,
			'paged'          => $paged,
			'orderby'        => $orderby,
			'order'          => $order,
		);
		
		// Creating array for multiple category
		if(strpos($category, ',') !== false) {
			$category = explode(',',$category);
		}
		
		if ( $category ) { // CeP: (2)
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'portfolio_category',
					'field'    => 'slug',
					'terms'    => $category,
				),
			);
		}
		$wp_query = new WP_Query( $args );
		
		// The Loop
		if ( $wp_query->have_posts() ) {
			$boxesClass = '';
			
			// Check if sortable enabled. Than add class to make the ISOTOPE work
			if( $sortable=='yes' ){
				$boxesClass = 'portfolio-wrapper';
			}
			
			$return          .= $portfolioWrapperStart;
			$pagination_class = ( $pagination=='yes' ) ? ' thememount-with-pagination' : '' ; // Pagination
			$portfolioBoxes   = '<div class="thememount-items-wrapper row multi-columns-row '.$itemWrapper.' thememount-portfolio-boxes-inner '.$boxesClass.' row'.$pagination_class.'">';
			
			// If sorting is enabled
			$cat_list = array();
			
			
			while ( $wp_query->have_posts() ) {
				$wp_query->the_post();
				$portfolioBoxes .= thememount_portfoliobox( $boxwidth, $pdesign );
				
				if ( $sortable == 'yes' ){
		
					if( is_array($category) && count($category)>0 ){ // Selected category
						foreach( $category as $slug ){
							$catInfo = get_term_by('slug', $slug, 'portfolio_category');
							$cat_list[ $slug ] = $catInfo->name;
						}
					}else if($category!=''){ //Single category
						$catInfo = get_term_by('slug', $category, 'portfolio_category');
						$cat_list[ $catInfo->slug ] = $catInfo->name;
					}else {  // All Category
						$cat_name = get_the_terms( get_the_ID() , 'portfolio_category' );
						if( is_array($cat_name) && count($cat_name)>0 ){
							foreach( $cat_name as $cat ){
								$cat_list[ $cat->slug ] = $cat->name;
							}
						}
					}
				}  // if
				
				
				
			} // while
			
			$portfolioBoxes .= '</div>';
			
			if( is_array($cat_list) && count($cat_list)>0 ){
				$cat_list = array_unique( $cat_list );  // Category Filter list
				ksort($cat_list);  // Sort array by name
				$tm_all_word = ( isset($allword) && trim($allword)!='' ) ? __($allword, 'apicona') : __('All', 'apicona') ;
				$return .= '<nav class="portfolio-sortable-list container">';
				$return .= '<ul>';
				$return .= '<li><a class="selected" href="#" data-filter="*">'.$tm_all_word.'</a></li>';
				foreach( $cat_list as $slug=>$name ){
					if( term_exists( $slug, 'portfolio_category' ) ){
						$return .= '<li><a class="" href="#" data-filter=".'.$slug.'">'.$name.'</a></li>';
					}
				}
				$return .= '</ul>';
				$return .= '</nav>';
			}
			$return .= $portfolioBoxes;  // Portfolio Boxes
			if( $pagination=='yes' ){ $return .= tm_apiconaadv_paging_nav(true); }  // Pagination
			$return .= $btnCode; //button
			$return .= $portfolioWrapperEnd;
		} // if
		
		/* Restore original Post Data */
		wp_reset_postdata();
		
		$wp_query = $old_wp_query;
		
	$return .= '</div>';
	
	return $return;
}
}
add_shortcode( 'portfoliobox', 'thememount_sc_portfoliobox' );