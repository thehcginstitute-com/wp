<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$themestyle = tm_get_theme_style();

get_header();

if( $themestyle == 'apiconaadv' ){

global $apicona;
$sidebar = esc_attr($apicona['sidebar_events']); // Global settings

$primaryclass = '';
if( $sidebar!='no' ){
	$primaryclass = setPrimaryClass($sidebar);
}
?>
	<?php if( $sidebar!='no' && $sidebar!='' ): ?>
		<div class="container"><div class="row">
	<?php endif; ?>

	<div id="primary" class="content-area <?php echo $primaryclass; ?>">
		<div id="tribe-events-pg-template">
			<?php tribe_events_before_html(); ?>
			<?php tribe_get_view(); ?>
			<?php tribe_events_after_html(); ?>
		</div> <!-- #tribe-events-pg-template -->
	</div>
	
	<?php
	// Sidebar 1 (Left Sidebar)
	if($sidebar=='left' || $sidebar=='right'){
		get_sidebar($sidebar);
	}
	?>
	
<?php if( $sidebar!='no' && $sidebar!='' ): ?>
	</div><!-- .row -->  </div><!-- .container -->
<?php endif;

}else if( $themestyle == 'apicona' ){ ?>

<div class="container">
<div class="row">

	<div id="tribe-events-pg-template" class="col-md-12 col-lg-12 col-xs-12">
		<?php tribe_events_before_html(); ?>
		<?php tribe_get_view(); ?>
		<?php tribe_events_after_html(); ?>
	</div> <!-- #tribe-events-pg-template -->

</div> <!-- .row -->
</div> <!-- .container -->

<?php } //endif ?>
<?php get_footer(); ?>
