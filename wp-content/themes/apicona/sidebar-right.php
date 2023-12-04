<?php
/**
 * The sidebar containing the sidebar 2.
 *
 */

global $wp_registered_sidebars;
global $apicona;

$no_widget_title      = __('No Widget Found', 'apicona');
$no_widget_desc_text  = __( 'We don\'t find any widget to show. Please add some widgets by going to <strong>Admin > Appearance > Widgets</strong> and add widgets in <strong>"%s"</strong> area.', 'apicona' );
$no_widget_desc_text_no_widget = __( 'We don\'t find any widget to show. Please add some widgets by going to <strong>Admin > Appearance > Widgets</strong> section.', 'apicona' );

?>

<?php
if( is_page() ){
	?>
	
	<?php
	$sidebar2      = 'sidebar-right-page';
	$sidebar2_page = get_post_meta($post->ID,'_kwayy_page_options_rightsidebar',true);
	if( trim($sidebar2_page)!='' ){ $sidebar2 = trim($sidebar2_page); }
	
	
	// The Events Calendar
	if( function_exists('tribe_is_upcoming') ){
		if (get_post_type()=='tribe_events'){
			$events_sidebar = ( isset($apicona['sidebar_events']) && trim($apicona['sidebar_events'])!='' ) ? esc_attr($apicona['sidebar_events']) : 'no' ; // Global settings
			if( $events_sidebar=='right' ){
				$sidebar2 = 'sidebar-events';
			}
		}
	}
	
	
	// Language translation
	if( isset($wp_registered_sidebars[$sidebar2]['name']) ){
		$no_widget_desc  = sprintf( $no_widget_desc_text, $wp_registered_sidebars[$sidebar2]['name'] );
	} else {
		$no_widget_desc  = $no_widget_desc_text_no_widget;
	}
	?>
	
	<aside id="sidebar-right" class="widget-area col-md-3 col-lg-3 col-xs-12 sidebar" role="complementary">
		<?php if ( ! dynamic_sidebar( $sidebar2 ) ) : ?>

			<div class="kwayy-centertext">
				<h3><?php echo $no_widget_title; ?></h3>
				<br />
				<p><?php echo $no_widget_desc; ?></p>
				
			</div>

		<?php endif; // end sidebar widget area ?>
		
	</aside><!-- #sidebar-right -->
	
	
	<?php
} elseif( is_home() || is_single() ){
	
	$pageid   = get_option('page_for_posts');
	$postType = 'page';
	if( is_single() ){
		global $post;
		$pageid   = $post->ID;
		$postType = 'post';
	}
	
	
	?>
	
	<?php
	global $wp_registered_sidebars;
	$sidebar2      = 'sidebar-right-blog';
	$sidebar2_blog = get_post_meta( $pageid ,'_kwayy_'.$postType.'_options_rightsidebar',true);
	if( trim($sidebar2_blog)!='' ){ $sidebar2 = trim($sidebar2_blog); }


	// The Events Calendar
	if( function_exists('tribe_is_upcoming') ){
		if ( get_post_type() == 'tribe_events' || tribe_is_upcoming() || tribe_is_month() || tribe_is_by_date() || tribe_is_day() || is_single('tribe_events') ){
			$events_sidebar = ( isset($apicona['sidebar_events']) && trim($apicona['sidebar_events'])!='' ) ? esc_attr($apicona['sidebar_events']) : 'no' ; // Global settings
			if( $events_sidebar=='right' ){
				$sidebar2 = 'sidebar-events';
			}
		}
	}
	
	
	// Language translation
	if( isset($wp_registered_sidebars[$sidebar2]['name']) && trim($wp_registered_sidebars[$sidebar2]['name'])!='' ){
		$no_widget_desc  = sprintf( $no_widget_desc_text, $wp_registered_sidebars[$sidebar2]['name'] );
	} else {
		$no_widget_desc  = $no_widget_desc_text_no_widget;
	}
	
	
	?>

	<aside id="sidebar-right" class="widget-area col-md-3 col-lg-3 col-xs-12 sidebar" role="complementary">
		<?php //dynamic_sidebar( $sidebar2 ); ?>
		<?php if ( ! dynamic_sidebar( $sidebar2 ) ) : ?>

			<div class="kwayy-centertext">
				<h3><?php echo $no_widget_title; ?></h3>
				<br />
				<p><?php echo $no_widget_desc; ?></p>
				
			</div>

		<?php endif; // end sidebar widget area ?>
		
	</aside><!-- #sidebar-right -->
		
	<?php
} elseif( is_search() ) {
	$no_widget_desc  = sprintf( $no_widget_desc_text, $wp_registered_sidebars['sidebar-right-search']['name'] );
	?>
	<aside id="sidebar-right" class="widget-area col-md-3 col-lg-3 col-xs-12 sidebar" role="complementary">
		<?php if ( ! dynamic_sidebar( 'sidebar-right-search' ) ) : ?>

			<div class="kwayy-centertext">
				<h3><?php echo $no_widget_title; ?></h3>
				<br />
				<p><?php echo $no_widget_desc; ?></p>
				
			</div>

		<?php endif; // end sidebar widget area ?>
		
	</aside><!-- #sidebar-right -->
	
	
	
	<?php
} elseif( function_exists('is_bbpress') && is_bbpress() ) {
	$bbpressSidebar = isset($apicona['sidebar_bbpress']) ? $apicona['sidebar_bbpress'] : 'right' ;
	if( isset($wp_registered_sidebars['sidebar-bbpress']['name']) ){
		$no_widget_desc  = sprintf( $no_widget_desc_text, $wp_registered_sidebars['sidebar-bbpress']['name'] );
	} else {
		$no_widget_desc  = $no_widget_desc_text_no_widget;
	}
		

?>
	
	<?php if( $bbpressSidebar=='right' ): ?>
	
		<aside id="sidebar-right" class="widget-area col-md-3 col-lg-3 col-xs-12 sidebar bbpress-sidebar" role="complementary">
			<?php if ( ! dynamic_sidebar( 'sidebar-bbpress' ) ) : ?>

				<div class="kwayy-centertext">
					<h3><?php echo $no_widget_title; ?></h3>
					<br />
					<p><?php echo $no_widget_desc; ?></p>
					
				</div>

			<?php endif; // end sidebar widget area ?>
			
		</aside><!-- #sidebar-right -->
		
	<?php endif; ?>
	
	
	
	<?php
} elseif( (function_exists('tribe_is_upcoming')) && (get_post_type() == 'tribe_events' || tribe_is_upcoming() || tribe_is_month() || tribe_is_by_date() || tribe_is_day() || is_single('tribe_events'))){
	
	$sidebar2 = 'sidebar-events';

	
	
	// Language translation
	$no_widget_desc  = sprintf( $no_widget_desc_text, $wp_registered_sidebars[$sidebar2]['name'] );
	
	?>
	
	<aside id="sidebar-right" class="widget-area col-md-3 col-lg-3 col-xs-12 sidebar tm-events-sidebar tm-events-sidebar-right" role="complementary">
		<?php if ( ! dynamic_sidebar( $sidebar2 ) ) : ?>

			<div class="thememount-centertext">
				<h3><?php echo $no_widget_title; ?></h3>
				<br />
				<p><?php echo $no_widget_desc; ?></p>
				
			</div>

		<?php endif; // end sidebar widget area ?>
		
	</aside><!-- #sidebar-right -->
	
	
	

	<?php
} else {
	//$no_widget_desc  = sprintf( $no_widget_desc_text, $wp_registered_sidebars['sidebar-right-blog']['name'] );
	
	global $apicona;
	$sidebar2 = $apicona['sidebar_blog']; // Global settings
	
	$sidebar2      = 'sidebar-right-blog';
	$sidebar2_post = get_post_meta($post->ID,'_kwayy_post_options_rightsidebar',true);
	if( trim($sidebar2_post)!='' ){ $sidebar2 = trim($sidebar2_post); }
	
	// Language translation
	if( isset($wp_registered_sidebars[$sidebar2]['name']) ){
		$no_widget_desc  = sprintf( $no_widget_desc_text, $wp_registered_sidebars[$sidebar2]['name'] );
	} else {
		$no_widget_desc  = $no_widget_desc_text_no_widget;
	}
	
	
	?>
	<aside id="sidebar-right" class="widget-area col-md-3 col-lg-3 col-xs-12 sidebar" role="complementary">
		<?php if ( ! dynamic_sidebar( $sidebar2 ) ) : ?>

			<div class="kwayy-centertext">
				<h3><?php echo $no_widget_title; ?></h3>
				<br />
				<p><?php echo $no_widget_desc; ?></p>
				
			</div>

		<?php endif; // end sidebar widget area ?>
		
	</aside><!-- #sidebar-right -->
		
		
	
	<?php
}
