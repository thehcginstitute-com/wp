<?php
/**
 * The sidebar containing the top footer widget area
 *
 * If no active widgets in this sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Apicona 
 * @since Apicona 1.0
 */


$apicona = get_option('apicona');

$footer_col = '3_3_3_3';
if( isset($apicona['top_footer_widget_column']) && trim($apicona['top_footer_widget_column'])!='' ){
	$footer_col = esc_attr($apicona['top_footer_widget_column']);
	
}

if($footer_col == '3_3_3_3'){
	?>
	
	<div id="footer-top" class="sidebar-container" role="complementary">
		
		<?php if ( is_active_sidebar( 'first-top-footer-widget-area' ) ) : ?>
		<div class="widget-area col-xs-12 col-sm-6 col-md-3 col-lg-3">
			<?php dynamic_sidebar( 'first-top-footer-widget-area' ); ?>
		</div><!-- .widget-area -->
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'second-top-footer-widget-area' ) ) : ?>
		<div class="widget-area col-xs-12 col-sm-6 col-md-3 col-lg-3">
			<?php dynamic_sidebar( 'second-top-footer-widget-area' ); ?>
		</div><!-- .widget-area -->
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'third-top-footer-widget-area' ) ) : ?>
		<div class="widget-area col-xs-12 col-sm-6 col-md-3 col-lg-3">
			<?php dynamic_sidebar( 'third-top-footer-widget-area' ); ?>
		</div><!-- .widget-area -->
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'fourth-top-footer-widget-area' ) ) : ?>
		<div class="widget-area col-xs-12 col-sm-6 col-md-3 col-lg-3">
			<?php dynamic_sidebar( 'fourth-top-footer-widget-area' ); ?>
		</div><!-- .widget-area -->
		<?php endif; ?>
		
		
		
	</div><!-- #footer-top -->
	
	
	<?php
} else {

	$footer_col = explode('_', $footer_col);
	if( is_array($footer_col) && count($footer_col)>0 ){
		?>
		<div id="footer-top" class="sidebar-container" role="complementary">
		<?php
		$x = 1;
		foreach($footer_col as $col){
			// Widget position
			$sidebar = 'fourth';
			switch($x){
				case 1 :
					$sidebar = 'first';
					break;
				case 2 :
					$sidebar = 'second';
					break;
				case 3 :
					$sidebar = 'third';
					break;
				case 4 :
					$sidebar = 'fourth';
					break;
				
			}
			
			// ROW width class
			$row_class = 'col-xs-12 col-sm-'.$col.' col-md-'.$col.' col-lg-'.$col;
			
			
			if ( is_active_sidebar( $sidebar.'-top-footer-widget-area' ) ) : ?>
			
			<div class="widget-area <?php echo $row_class; ?>">
				<?php dynamic_sidebar( $sidebar.'-top-footer-widget-area' ); ?>
			</div><!-- .widget-area -->
			
			<?php endif;
			
			$x++;
		} // Foreach
		?>
		
		</div><!-- #footer-top -->
		
		<?php
		
	} // If

} // if


