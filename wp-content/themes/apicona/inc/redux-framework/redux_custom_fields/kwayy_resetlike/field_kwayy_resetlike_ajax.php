<?php

/*
 * NOTE: This file must call in functions.php
 *
 *
 /*

/*** Ajax Callback ***/

if( !class_exists( 'kwayy_resetlike' ) ) {

	class kwayy_resetlike{
		
		
		function __construct(){
			add_action( 'wp_ajax_kwayy_resetlike', array( &$this , 'ajax_process_resetlike' ) );
			/*include_once('demo-content-scripts.php');
			global $kwayy_demo_installation;
			$kwayy_demo_installation = new kwayy_demo_installation;*/
		}
		
		
		/**
		 * Decide if the given meta key maps to information we will want to import
		 *
		 * @param string $key The meta key to check
		 * @return string|bool The key if we do want to import, false if not
		 */
		function is_valid_meta_key( $key ) {
			// skip attachment metadata since we'll regenerate it from scratch
			// skip _edit_lock as not relevant for import
			if ( in_array( $key, array( '_wp_attached_file', '_wp_attachment_metadata', '_edit_lock' ) ) )
				return false;
			return $key;
		}
		
		
		
		
		/**
		 * Added to http_request_timeout filter to force timeout at 60 seconds during import
		 * @return int 60
		 */
		function bump_request_timeout() {
			return 600;
		}
		
		
		
		
		/**
		 * Restter function
		 **/
		function ajax_process_resetlike() {
			$answer = array();
			$args   = array(
				'post_type'        => 'portfolio',
				'post_status'      => 'publish',
				'posts_per_page'   => -1,
				//'caller_get_posts' => 1
			);
			$pf = null;
			
			$pf = new WP_Query($args);
			if( $pf->have_posts() ) {
				while ($pf->have_posts()) :
					$pf->the_post();
					update_post_meta(get_the_ID(), 'kwayy_likes' , '0' );
				endwhile;
			}
			wp_reset_query();  // Restore global post data stomped by the_post().
			
			// Return results
			$answer['content'] = __('Done... All LIKEs are reset to zero.', 'apicona');
			$answer['answer']  = 'finished';
			die( json_encode( $answer ) );
	
	
		}


	} // END class

} // END if


add_action('admin_init', 'kwayy_call_resetlike');
function kwayy_call_resetlike(){
	// For AJAX callback
	$kwayy_resetlike = new kwayy_resetlike;
}



