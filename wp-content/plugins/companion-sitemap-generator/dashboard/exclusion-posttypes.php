<?php

$post_types = get_post_types( array( 'public' => true ), 'names', 'and' ); 

if( isset( $_POST['submit'] ) ) {

	check_admin_referer( 'csg_save_posttypes' );

	global $wpdb;
	$table_name 		= $wpdb->prefix . "csg_sitemap";

	$exclPostTypes 		= '';
	$excludeCounter 	= '0';

	// For all post types
	foreach ( $post_types  as $post_type ) {
		if( $post_type != 'attachment' ) {
			if( isset( $_POST['exclude_'.$post_type] ) == '' ) {
				$exclPostTypes .= sanitize_text_field( $post_type ).', ';
				$excludeCounter++;
			}
		}
	}

	// Add taxonomies 
	$taxonomies = csg_get_taxonomies();

	// Loop trough all
	foreach( $taxonomies as $taxonomie ) {

		// Get information of current one
		$thisTaxonomie = get_taxonomy( $taxonomie );

		if( isset( $_POST['exclude_'.$thisTaxonomie->name] ) == '' ) {
			$exclPostTypes .= sanitize_text_field( $thisTaxonomie->name ).', ';
			$excludeCounter++;
		}

	}

	$wpdb->query( $wpdb->prepare( "UPDATE $table_name SET onoroff = %s WHERE name = 'posttypes'", $exclPostTypes ) );

	csg_select_succes( $excludeCounter );
}

?>

<form method="POST">

	<table class="form-table">

	<?php 

	// Add posttypes
	foreach ( $post_types  as $post_type ) {
		if( $post_type != 'attachment' ) {
			$post_typeO 		= get_post_type_object( $post_type ); 
			$post_type_name 	= $post_typeO->label;
			?>
			<tr>
				<th scope="row"><?php echo $post_type_name; ?></th>
				<td>
					<fieldset>
						<input id='exclude_<?php echo $post_type; ?>' name='exclude_<?php echo $post_type; ?>' type='checkbox' <?php if( !in_array( $post_type, csg_exclude_posttypes() ) ) { echo "CHECKED"; } ?> > <label for="exclude_<?php echo $post_type; ?>"><?php _e('Uncheck to exclude.', 'companion-sitemap-generator'); ?></label>
					</fieldset>
				</td>
			</tr>
		<?php }
	}

	// Add taxonomies 
	$taxonomies = csg_get_taxonomies();

	// If there are any taxonomies
	if ( $taxonomies ) {

		// Loop trough all
		foreach( $taxonomies as $taxonomie ) {

			// Get information of current one
			$thisTaxonomie = get_taxonomy( $taxonomie );

			?>

			<tr>
				<th scope="row"><?php echo $thisTaxonomie->label; ?> <p style='opacity: .6; margin: 0; font-size: 14px;'>(<?php echo $thisTaxonomie->name; ?>)</p></th>
				<td>
					<fieldset>
						<input id='exclude_<?php echo $thisTaxonomie->name; ?>' name='exclude_<?php echo $thisTaxonomie->name; ?>' type='checkbox' <?php if( !in_array( $thisTaxonomie->name, csg_exclude_posttypes() ) ) { echo "CHECKED"; } ?> > 
						<label for="exclude_<?php echo $thisTaxonomie->name; ?>"><?php _e('Uncheck to exclude.', 'companion-sitemap-generator'); ?></label>
					</fieldset>
				</td>
			</tr>

		<?php } 
	} 

	?>

	</table>

	<?php wp_nonce_field( 'csg_save_posttypes' ); ?>	

	<?php submit_button(); ?>

</form>