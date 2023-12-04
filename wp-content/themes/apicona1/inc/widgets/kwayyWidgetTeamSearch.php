<?php

add_action( 'widgets_init', 'thememount_widget_team_search' );

function thememount_widget_team_search() {
	register_widget( 'thememount_widget_team_search' );
}



/*function thememount_addhttp($url) {
	if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
		$url = "http://" . $url;
	}
	return $url;
}*/




class thememount_widget_team_search extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	
	function __construct() {
		
		$apicona = get_option('apicona');
		
		// Team Type Title 
		$team_type_title = ( isset($apicona['team_type_title']) && trim($apicona['team_type_title'])!='' ) ? __($apicona['team_type_title'], 'apicona') : __('Team Members','apicona');
	
	
		$widget_style = array('classname'   => 'thememount_widget_team_search',
							  'description' => sprintf( __("Show %s (Team Member) Search Form", 'apicona'), $team_type_title ) );
							  
		$widget_define = array('show_id'   => 'thememount_single_team_search',
							   'get_tips'  => 'true',
							   'get_title' => 'true');
							   
		$control_styles = array('width'   => 300,
								'height'  => 350,
								'id_base' => 'thememount_widget_team_search');
								
		$widget_change = array('change1' => 'delay',
							   'change2' => 'effect',
							   'change3' => 'slide',
							   'change4' => 100,
							   'change5' => 0);
							   
		parent::__construct(
			'thememount_widget_team_search', // Base ID
			sprintf( __("Kwayy %s (Team Member) Search", 'apicona'), $team_type_title ), // Name
			$widget_style // Args
		);
	}


	function widget( $args, $cur_instance ) {
		extract( $args );
		//include_once('../phpflickr-library/phpFlickr.php');
		
		$title   	 		= apply_filters( 'widget_title', $cur_instance['title'] );
		$form_desc   		= $cur_instance['form_desc'];
		$search   	 		= $cur_instance['search'];
		$selectplaceholder  = $cur_instance['selectplaceholder'];
		$submit_btn 		= $cur_instance['submit_btn'];
		$form_type   		= $cur_instance['form_type'];
		
		
		
		// /*
		 // *  WPML Translation ready
		 // */
		
		// // Phone
		// if ( function_exists( 'icl_register_string' ) ) {
			// icl_register_string( 'ThemeMount Contact Widget', 'Phone Number' . $this->id, $Phone );
		// }
		// if ( function_exists( 'icl_t' ) ) {
			// $Phone = icl_t( 'ThemeMount Contact Widget', 'Phone Number' . $this->id, $Phone );
		// }
		
		// // Email
		// if ( function_exists( 'icl_register_string' ) ) {
			// icl_register_string( 'ThemeMount Contact Widget', 'Email Address' . $this->id, $Email );
		// }
		// if ( function_exists( 'icl_t' ) ) {
			// $Email = icl_t( 'ThemeMount Contact Widget', 'Email Address' . $this->id, $Email );
		// }
		
		// // Website
		// if ( function_exists( 'icl_register_string' ) ) {
			// icl_register_string( 'ThemeMount Contact Widget', 'Website URL' . $this->id, $Website );
		// }
		// if ( function_exists( 'icl_t' ) ) {
			// $Website = icl_t( 'ThemeMount Contact Widget', 'Website URL' . $this->id, $Website );
		// }
		
		// // Address
		// if ( function_exists( 'icl_register_string' ) ) {
			// icl_register_string( 'ThemeMount Contact Widget', 'Address' . $this->id, $Address );
		// }
		// if ( function_exists( 'icl_t' ) ) {
			// $Address = icl_t( 'ThemeMount Contact Widget', 'Address' . $this->id, $Address );
		// }
		
		// // Time
		// if ( function_exists( 'icl_register_string' ) ) {
			// icl_register_string( 'ThemeMount Contact Widget', 'Time' . $this->id, $Time );
		// }
		// if ( function_exists( 'icl_t' ) ) {
			// $Time = icl_t( 'ThemeMount Contact Widget', 'Time' . $this->id, $Time );
		// }
		
		
		echo $before_widget;
		
		
		//if ( $title ) echo $before_title . $title . $after_title;	
	
		
		$form = thememount_team_search_form($title, $form_desc, $search, $submit_btn, $form_type, $selectplaceholder);
		
		echo $form;
		
		
		/*echo '<ul class="thememount_widget_team_search_wrapper">'; ?>
			
			<?php if( trim($Phone)!='' ): ?><li class="thememount-contact-phonenumber fa fa-phone"><?php echo nl2br($Phone); ?></li><?php endif; ?>
			<?php if( trim($Email)!='' ): ?><li class="thememount-contact-email fa fa-envelope-o"><?php echo '<a href="mailto:'.$Email.'" target="_blank">'.$Email.'</a>'; ?></li><?php endif; ?>
			<?php if( trim($Website)!='' ): ?><li class="thememount-contact-website fa fa-globe"><?php echo '<a href="'.thememount_addhttp($Website).'" target="_blank">'.$Website.'</a>'; ?></li><?php endif; ?>
			<?php if( trim($Address)!='' ): ?><li class="thememount-contact-address  fa fa-map-marker"><?php echo nl2br($Address); ?></li><?php endif; ?>
			<?php if( trim($Time)!='' ): ?><li class="thememount-contact-time fa fa-clock-o"><?php echo nl2br($Time); ?></li><?php endif; ?>
			
			<?php 
		echo '</ul>';*/
		
		echo $after_widget;	
		
		
	}
		
	function update( $new_instance, $org_instance ) {
		$cur_instance 						= $org_instance;
		$cur_instance['title']   			= strip_tags( $new_instance['title'] );
		$cur_instance['form_desc']  		= $new_instance['form_desc'];
		$cur_instance['search']   			= $new_instance['search'];
		$cur_instance['selectplaceholder']  = $new_instance['selectplaceholder'];
		$cur_instance['submit_btn'] 		= $new_instance['submit_btn'];
		$cur_instance['form_type'] 			= $new_instance['form_type'];
		return $cur_instance;
	}
		 
	function form( $cur_instance ) {
		$defaults = array(
					'title'  	 => 'Team Search',
					'form_desc'  => 'Search Team Members by name and also by section',
					'search'     => 'Search By Name',
					'selectplaceholder'     => 'All Section',
					'submit_btn' => "Search",
					'form_type'  => "Form Type",
		);
		
		$cur_instance = wp_parse_args( (array) $cur_instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Form Title', 'apicona'); ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $cur_instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'form_desc' ); ?>"><?php _e('Form Description', 'apicona'); ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'form_desc' ); ?>" name="<?php echo $this->get_field_name( 'form_desc' ); ?>" value="<?php echo $cur_instance['form_desc']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'search' ); ?>"><?php _e('Search Placeholder', 'apicona'); ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'search' ); ?>" name="<?php echo $this->get_field_name( 'search' ); ?>" value="<?php echo $cur_instance['search']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'selectplaceholder' ); ?>"><?php _e('All Sections', 'apicona'); ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'selectplaceholder' ); ?>" name="<?php echo $this->get_field_name( 'selectplaceholder' ); ?>" value="<?php echo $cur_instance['selectplaceholder']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'submit_btn' ); ?>"><?php _e('Search Button Text', 'apicona'); ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'submit_btn' ); ?>" name="<?php echo $this->get_field_name( 'submit_btn' ); ?>" value="<?php echo $cur_instance['submit_btn']; ?>" />
		</p>
		
		<?php // We are hidding this field because, we have planned this option or future. Just created this for testing purpose ?>
		<p style="display:none;">
			<label for="<?php echo $this->get_field_id( 'form_type' ); ?>"><?php _e('From Type', 'apicona'); ?>:</label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'form_type' ); ?>" name="<?php echo $this->get_field_name( 'form_type' ); ?>">
			<?php
			$selected = 'vertical';
			if( !empty($cur_instance['form_type']) ){ $selected = $cur_instance['form_type']; }
			$type = array('vertical' => 'Vertical', 'horizontal'=> 'Horizontal');
			foreach($type as $key => $val){
				$selected_tag = '';
				if( $selected == $key ){ $selected_tag = ' selected'; }
				echo '<option value="'. $key .'"'. $selected_tag .'>'. $val .'</option>'."\n";
			}
			?>
			</select>
		</p>
		
		
		
		<?php
	}
}
