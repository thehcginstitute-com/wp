<?php
/**
 * Portfolio box
 *
 *
 * @package WordPress
 * @subpackage Apicona 
 * @since Apicona 1.0
 */

global $apicona;
$themestyle 	= tm_get_theme_style();
$pfcat_column 	= ( isset($apicona['pfcat_column']) && trim(esc_attr($apicona['pfcat_column']))!='' ) ? trim($apicona['pfcat_column']) : 'three' ;


if( $themestyle == 'apiconaadv' ){
	echo thememount_portfoliobox($pfcat_column); 
}else if ( $themestyle == 'apicona' ){
	echo kwayy_portfoliobox($pfcat_column);
}

