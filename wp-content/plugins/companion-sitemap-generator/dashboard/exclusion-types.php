<?php

// Default types
$types 		= array( 
	'category' => __( 'Categories', 'companion-sitemap-generator' ), 
	'post_tag' => __( 'Tags', 'companion-sitemap-generator' ) 
);

// Get taxonomies 
$taxonomies = csg_get_taxonomies();
if ( $taxonomies ) {
	foreach( $taxonomies as $taxonomie ) {
		$thisTaxonomie = get_taxonomy( $taxonomie );
		$types[$thisTaxonomie->name] = $thisTaxonomie->label;
	} 
}

// Submit
if( isset( $_POST['submit'] ) ) {

	check_admin_referer( 'csg_save_types' );

	global $wpdb;
	$table_name = $wpdb->prefix."csg_sitemap";

	$excludeposts 	= '';
	$excludeCounter = 0;

	if( !empty( $_POST['post'] ) ) {

		foreach ( $_POST['post'] as $key ) {
			$excludeposts .= sanitize_text_field( $key ).', ';
			$excludeCounter++;
		}

		$wpdb->query( $wpdb->prepare( "UPDATE {$table_name} SET onoroff = %s WHERE name = 'ctam'", $excludeposts ) );

	} else {

		$wpdb->query( $wpdb->prepare( "UPDATE {$table_name} SET onoroff = %s WHERE name = 'ctam'", '' ) );

	}

	csg_select_succes( $excludeCounter );

}

// Show subtabs
echo "<ul class='subsubsub'>";
	$i = 0;
	foreach ( $types as $type => $type_name ) {
		if( $i != '0' ) echo " | ";
		echo '<li><a data-table="table-'.$type.'" class="showtable table-'.$type; if( $i == 0 ) { echo " current"; } echo ' ">'.$type_name.'</a></li>';
		$i++;
	}
echo "</ul>";

echo "<br class='clear'>";

?>

<form method="POST">

	<script>
		jQuery( '.showtable' ).click(function() {

			jQuery( '.showtable' ).removeClass( 'current' );
			jQuery(this).addClass( 'current' );

			var thisClass = jQuery(this).attr( 'data-table' );

			jQuery( '.wp-list-table' ).hide();
			jQuery( '.'+thisClass ).show();

			console.log( '.wp-list-table .'+thisClass );


		});
	</script>

	<?php 

	submit_button();

	foreach ( $types  as $type => $type_name ) {
		create_table( $type );
	}

	function create_table( $type ) { ?>

		<table class="wp-list-table widefat striped table-<?php echo $type; ?> csg-table">

			<thead>
				<tr>
					<td  id='cb' class='manage-column column-cb check-column'><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input id="cb-select-all-1" type="checkbox" /></td>
					<th scope="col" id='title' class='manage-column column-title column-primary'><?php _e( 'Title', 'companion-sitemap-generator' ); ?></th>
					<th scope="col" id='permalink' class='manage-column'><?php _e( 'Permalink', 'companion-sitemap-generator' ); ?></th>
					<?php if( csg_is_multilingual() ) {
						echo "<th scope='col' id='permalink' class='manage-column'>".__( 'Languages', 'companion-sitemap-generator' )."</th>";
					} ?>
				</tr>
			</thead>

			<tbody id="the-list">
				<?php 

				$taxonomie = $type;
					
				// Get all terms by taxonomy
				global $wp_version;
				if ( version_compare( $wp_version, '4.5.0', '>=' ) ) {
					$terms = get_terms( array( 'taxonomy' => $taxonomie ) );
				} else {
					$terms = get_terms( $taxonomie );
				}

				if( !empty( $terms ) ) {

					foreach( $terms as $key => $term ) {

						$tid 		= $term->term_id;
						$catName 	= $term->name;
						$catLink 	= get_term_link( $tid );

						if( in_array( $tid, csg_exclude_ctam() ) ) {
							$checked = 'CHECKED';
						} else {
							$checked = '';
						}

						echo '<tr id="'.$tid.'">
							<th scope="row" class="check-column">			
								<label class="screen-reader-text" for="cb-select-'.$tid.'">Select '.$catName.'</label>
								<input id="cb-select-'.$tid.'" type="checkbox" name="post[]" value="'.$tid.'" '.$checked.'/>
							</th>
							<td class="title column-title column-primary page-title" data-colname="Title">
								<strong><a href="'.$catLink.'" target="_blank">'.$catName.'</a></strong>
							</td>
							<td class="permalink column-permalink column-secondary page-permalink" data-colname="Permalink">
								'.$catLink.'
							</td>';
							if( csg_is_multilingual() ) {
								echo '<td class="languages column-languages column-secondar page-languages" data-colname="Permalink">
								'.csg_get_term_language( $tid ).'
								</td>';
							}
						echo '</tr>';

					}

				} else {
					
					echo '<tr class="no-items"><td class="colspanchange" colspan="3">';
					echo sprintf( esc_html__( 
						'Nothing found in %1$s.', 'companion-sitemap-generator' 
					), $taxonomie );
					echo '</td></tr>';

				}
			
				?>
			</tbody>
		</table>

	<?php }

	wp_nonce_field( 'csg_save_types' );

	submit_button(); ?>
</form>