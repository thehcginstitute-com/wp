<?php
/**
 * Team Member box
 *
 *
 * @package WordPress
 * @subpackage Apicona
 * @since Apicona 1.0
 */

global $apicona;
$themestyle = tm_get_theme_style();

$teamcat_column = ( isset($apicona['teamcat_column']) && trim($apicona['teamcat_column'])!='' ) ? trim($apicona['teamcat_column']) : 'three' ;

?>
<?php 

if( $themestyle == 'apiconaadv' ){
	echo thememount_teammemberbox($teamcat_column);
}else if( $themestyle == 'apicona' ){
	echo kwayy_teammemberbox($teamcat_column); 
}

?>
