<?php
// [portfoliobox]
if( !function_exists('kwayy_sc_portfoliobox') ){
function kwayy_sc_portfoliobox( $atts, $content=NULL ){
	extract( shortcode_atts( array(
		//'textposition' => 'left',
		'title'        => '',
		'subtitle'     => '',
		'align'        => 'left',
		'sortable'     => 'no',
		'allword'	   => '',
		//'sepicon'      => 'NO_ICON',
		'btntext'      => '',
		'btnlink'      => '',
		'show'         => '3',
		'column'       => 'three',
		'view'         => 'default',
		'category' 	   => '', // CeP: (1)
		'carousel_autoplay' 	   => '1',
		'carousel_autoplay'        => '1',
		'carousel_loop'            => '0',
		'carousel_autoplayspeed'   => '800',
		'carousel_autoplaytimeout' => '4500',
		'pagination'   			   => 'no',
	), $atts ) );
	
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
	
	// Box width
	$boxwidth       = ( $view == 'carousel' ) ? 'fix' : $column ;
	$headerCarslBtn = ( $view == 'carousel' ) ? 'carouselbtn="yes"' : '' ;
	$itemWrapper    = ( $view == 'carousel' ) ? 'kwayy-carousel-items-wrapper' : '' ;
	$itemCol        = ( $view == 'carousel' ) ? 'kwayy-carousel-col-'.$column : '' ;
	$rowFix         = ( $view == 'carousel' ) ? '' : 'multi-columns-row' ;
	
	// adding DATA tags
	$datatags = '';
	if( $view == 'carousel' ){
		// carousel_autoplay
		$datatags = 'data-autoplay="'.$carousel_autoplay.'"';
		
		// carousel_autoplayspeed
		$datatags .= ' data-autoplayspeed="'.$carousel_autoplayspeed.'"';
		
		// carousel_autoplaytimeout
		$datatags .= ' data-autoplaytimeout="'.$carousel_autoplaytimeout.'"';
		
		// carousel_loop
		$datatags .= ' data-loop="'.$carousel_loop.'"';
		
	}
	
	$rand = mt_rand(1000, 9999);
	$rand .= mt_rand(1000, 9999);
	
	
	// Generating Button Code
	$btnCode = '';
	if( trim($btntext)!='' && trim($btnlink)!='' ){
		$btnCode = '<div class="kwayy-pf-btn kwayy-center">' . do_shortcode('[vc_button title="'.$btntext.'" target="_self" color="skincolor" size="wpb_regularsize" href="'.$btnlink.'" btn_effect="colortoborder" showicon="withouticon" iconposition="left"]') . '</div>';
	}
	
	
	$return = '<div class="row '.$rowFix.' kwayy-portfolio-boxes-wrapper kwayy-portfolio-view-'.$view.' kwayy-effect-'.$view.' kwayy-items-col-'.$column.' '.$itemCol.'" id="kwayy-portfolio-id-'.$rand.'" '.$datatags.'>';
		
		$portfolioWrapperStart = '<div class="kwayy-portfolio-boxes col-xs-12 col-sm-12 col-md-12 col-lg-12">';
		$portfolioWrapperEnd   = '</div>';
		$contentWrapperStart   = '<div class="kwayy-portfolio-text col-xs-12 col-sm-12 col-md-12 col-lg-12">';
		$contentWrapperEnd     = '</div>';
		
		
		$return .= $contentWrapperStart;
			if( trim($title)!='' ) {
				// Title and Subtitle
				$return .= do_shortcode('[heading text="'.$title.'" tag="h2" '.$headerCarslBtn.' style="linedot" align="'.$align.'" subtext="'.$subtitle.'"]');
			}
			
			// Carousel Buttons
			//if( $view == 'carousel' ){ $return .= $carouselControls; }
			
		$return .= $contentWrapperEnd;
		
		//Protect against arbitrary paged values
		$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
		
		$args = array(
			//'post_status'    => 'published',
			'post_type'      => 'portfolio',
			'posts_per_page' => $show,
			'paged'          => $paged,
		);
		
		// Creating array for multiple category
		if(strpos($category, ',') !== false) {
			$category = explode(',',$category);
		}
		
		if ( $category ) { // CeP: (2)
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'portfolio_category',
					'field' => 'slug',
					'terms' => $category,
				),
			);
		}
		$wp_query = new WP_Query( $args );
		
		
		
		// The Loop
		if ( $wp_query->have_posts() ) {
		
			$return          .= $portfolioWrapperStart;
			$pagination_class = ( $pagination=='yes' ) ? ' kwayy-with-pagination' : '' ; // Pagination
			$portfolioBoxes   = '<div class="kwayy-items-wrapper '.$itemWrapper.' kwayy-portfolio-boxes-inner portfolio-wrapper row'.$pagination_class.'">';
			
			// If sorting is enabled
			$cat_list = array();
			
			while ( $wp_query->have_posts() ) {
				$wp_query->the_post();
				$portfolioBoxes .= kwayy_portfoliobox( $boxwidth );
				
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
				
				// All Word replacement 
				$tm_all_word = ( trim($allword)!='' ) ? __($allword, 'apicona') : __('All', 'apicona') ;
			
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
			if( $pagination=='yes'){ $return .= apicona_paging_nav(true); }  // Pagination
			$return .= $btnCode;  // Button
			$return .= $portfolioWrapperEnd;
		} // if
		
		/* Restore original Post Data */
		wp_reset_postdata();
		
		$wp_query = $old_wp_query;
		
	$return .= '</div>';
	
	return $return;
}
}
add_shortcode( 'portfoliobox', 'kwayy_sc_portfoliobox' );