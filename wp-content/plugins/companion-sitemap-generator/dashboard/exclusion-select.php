<?php

// Get all exisiting post types
$post_types = get_post_types( array( 'public' => true ), 'names', 'and' ); 

if( isset( $_POST['submit'] ) ) {

	check_admin_referer( 'csg_save_select' );

	global $wpdb;
	$table_name = $wpdb->prefix . "csg_sitemap";

	$excludeposts 	= '';
	$excludeCounter = 0;

	if( !empty( $_POST['post'] ) ) {

		foreach ( $_POST['post'] as $key ) {
			$excludeposts .= sanitize_text_field( $key ).', ';
			$excludeCounter++;
		}

		$wpdb->query( $wpdb->prepare( "UPDATE $table_name SET onoroff = %s WHERE name = 'exclude'", $excludeposts ) );

	} else {

		$wpdb->query( $wpdb->prepare( "UPDATE $table_name SET onoroff = %s WHERE name = 'exclude'", '' ) );

	}


	csg_select_succes( $excludeCounter );
}

?>

<ul class="subsubsub">
	<?php
	if( !isset( $_GET['ptt'] ) ) {
		$ptt = 'post';
	} else {
		$ptt = $_GET['ptt'];
	}

	$i = 0;
	foreach ( $post_types as $post_type ) {
		if( $post_type != 'attachment' ) {
			$post_typeO 		= get_post_type_object( $post_type ); 
			$post_type_name 	= $post_typeO->label;
			if( $i != '0' ) echo " | ";
			echo '<li><a data-table="table-'.$post_type.'" class="showtable table-'.$post_type; if( $i == 0 ) { echo " current"; } echo ' ">'.$post_type_name.'</a></li>';
			$i++;
		}
	}

	?>
</ul>

<br class="clear" />
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

	foreach ( $post_types  as $post_type ) {
		if( $post_type != 'attachment' ) {
			create_table( $post_type );
		}
	}

	function create_table( $postType ) { ?>

		<table class="wp-list-table widefat striped table-<?php echo $postType; ?> csg-table">

			<thead>
				<tr>
					<td  id='cb' class='manage-column column-cb check-column'><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input id="cb-select-all-1" type="checkbox" /></td>
					<th scope="col" id='title' class='manage-column column-title column-primary'><?php _e('Title', 'companion-sitemap-generator'); ?></th>
					<th scope="col" id='permalink' class='manage-column'><?php _e('Permalink', 'companion-sitemap-generator'); ?></th>
					<?php if( csg_is_multilingual() ) {
						echo "<th scope='col' id='permalink' class='manage-column'>".__( 'Languages', 'companion-sitemap-generator' )."</th>";
					} ?>
				</tr>
			</thead>

			<tbody id="the-list">
				<?php 

				// Create empty string
				$csg_sitemap_content = '';

				// Arguments for selecting pages
				$csg_sitemap_args = array(
					'sortby'			=> 'date',
					'order' 			=> 'desc',
					'post_type' 		=> $postType, 
					'posts_per_page' 	=> '-1',
					'post_status' 		=> 'publish'
				);

				// If is multilingual add language filter
				if( csg_is_multilingual() ) {
					$csg_sitemap_args['lang'] = csg_default_language();
				}

				$frontpageid = get_option('page_on_front');

				// The Query
				query_posts( $csg_sitemap_args );

				// The Loop
				if( have_posts() ) :
				while ( have_posts() ) : the_post();

					global $wpdb;
					$table_name = $wpdb->prefix . "sitemap-excludes"; 

					if( in_array( get_the_id(), csg_exclude() ) ) {
						$checked = 'CHECKED';
					} else {
						$checked = '';
					}

					if( get_the_id() == $frontpageid ) {
						$showmore = '<span class="post-state">&dash; '.__( "Front page" , "companion-sitemap-generator" ).'</span>';
					} else {
						$showmore = '';
					}

					echo '
					<tr id="post-'.get_the_id().'">
						<th scope="row" class="check-column">			
							<label class="screen-reader-text" for="cb-select-'.get_the_id().'">Select '. get_the_title() .'</label>
							<input id="cb-select-'.get_the_id().'" type="checkbox" name="post[]" value="'.get_the_id().'" '.$checked.'/>
						</th>
						<td class="title column-title column-primary page-title" data-colname="Title">
							<strong><a href="'. get_the_permalink() .'" target="_blank">'. get_the_title() .'</a> '.$showmore.'</strong>
						</td>
						<td class="permalink column-permalink column-secondar page-permalink" data-colname="Permalink">
							'. get_the_permalink() .'
						</td>';
						if( csg_is_multilingual() ) {
							echo '<td class="languages column-languages column-secondar page-languages" data-colname="Permalink">
							<ol>'; 
							foreach ( csg_languages() as $key => $lang ) {
								if( csg_post_translation_id( get_the_ID(), $lang ) != '' ) {
									echo '<li>'.$lang.'</li>';
								}
							}
							echo '</ol></td>';
						}
					echo '</tr>';

					$showmore = '';
					$checked = '';

				endwhile;

				else:
					
					echo '<tr class="no-items"><td class="colspanchange" colspan="3">';
					echo sprintf( esc_html__( 
						'Nothing found in %1$s.', 'companion-sitemap-generator' 
					), $postType );
					echo '</td></tr>';

				endif;

				// Reset Query
				wp_reset_query();

				?>
			</tbody>
		</table>

	<?php }

	wp_nonce_field( 'csg_save_select' );

	submit_button(); ?>
</form>