<?php
/**
 * Redux Framework is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Redux Framework is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Redux Framework. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package     ReduxFramework
 * @subpackage  Field_Color
 * @author      Daniel J Griffiths (Ghost1227)
 * @author      Dovy Paukstys
 * @version     3.0.0
 */

 
 
 
// Exit if accessed directly
if (!defined('ABSPATH')){
    exit;
}

// Don't duplicate me!
if( !class_exists( 'ReduxFramework_kwayy_switch_theme_style' ) ) {

    /**
     * Main ReduxFramework_kwayy_switch_theme_style
     *
     * @since       1.0.0
     */
	//class ReduxFramework_kwayy_switch_theme_style extends ReduxFramework {
	class ReduxFramework_kwayy_switch_theme_style{
	
		/**
		 * Field Constructor.
		 *
		 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
		 *
	 	 * @since 		1.0.0
	 	 * @access		public
	 	 * @return		void
		 */
		function __construct( $field = array(), $value ='', $parent ) {
        
			//parent::__construct( $parent->sections, $parent->args );
			$this->parent = $parent;
			$this->field = $field;
			$this->value = $value;
		
		}
	
		/**
		 * Field Render Function.
		 *
		 * Takes the vars and outputs the HTML for the field in the settings
	 	 *
	 	 * @since 		1.0.0
	 	 * @access		public
	 	 * @return		void
		 */
		function render() {
			
			// active class as per themestyle value
			$apicona_active = '';
			$apiconaadv_active = '';
			$themestyle = tm_get_theme_style();
			
			if( $themestyle == 'apicona' ){
				$apicona_active = 'switch-theme-thumb-active';
			}else if ( $themestyle == 'apiconaadv' ){
				$apiconaadv_active = 'switch-theme-thumb-active';
			}
			
				
				
				echo '<input type="hidden" id="' . $this->field['id'] . '" name="' . $this->field['name'] . $this->field['name_suffix'] . '" value="' . esc_attr( $this->value ) . '" class="regular-text" />';
			

			?>

			<div class="thememount-style-switcher-wrapper">
				
				<input type="button" class="button button-primary" id="thememount-style-switcher-btn" value="Change Theme Style">
				
				<!--<div id="thememount-style-switcher" style="display:none;">-->
				<div id="thememount-style-switcher" style="display:none;">
				
					
				
					<div id="thememount-style-switcher-box">
						<div class="switch-theme-data-layout">
							<h3><?php esc_attr_e("Change Theme Style", "apicona") ?>  <small>(<?php esc_attr_e("by clicking on the thumbnail", "apicona"); ?>)</small>: </h3>
							
							<p><?php esc_attr_e("We are providing two style to select. Both style contians mostly same features.","apicona"); ?></p>

							<p><?php esc_attr_e("But the Apicona Advanced style has some extra features in Theme Options, page/post options and also fresh new layout. We recommend you to select Apicona Advanced. Please select style below:","apicona"); ?></p>
							
							<br><br>
							
							<input type="hidden" id="theme-style" name="import-layout-color" value="<?php echo esc_attr($themestyle); ?>" />
							
							<a href="#" class="switch-theme-thumb switch-theme-thumb-white <?php echo $apicona_active; ?>" data-style="apicona">
								<span class="switch-theme-imgwrapper"><img src="<?php echo esc_url( get_template_directory_uri() . "/inc/redux-framework/redux_custom_fields/kwayy_switch_theme_style/apicona-layout-thumb.png" ); ?>" /></span>
								<span class="switch-theme-overlay"><span class="tm-active-icon"><img src="<?php echo esc_url( get_template_directory_uri() . "/inc/redux-framework/redux_custom_fields/kwayy_switch_theme_style/active-arrow.png" ); ?>" /></span></span>
								<div class="thememount-demo-link-title"><img src="<?php echo esc_url( get_template_directory_uri() . "/inc/redux-framework/redux_custom_fields/kwayy_switch_theme_style/apicona-small-logo.jpg" ); ?>" /></div>
							</a>
							<a href="#" class="switch-theme-thumb switch-theme-thumb-dark <?php echo $apiconaadv_active; ?>" data-style="apiconaadv">
								<span class="switch-theme-imgwrapper"><img src="<?php echo esc_url( get_template_directory_uri() . "/inc/redux-framework/redux_custom_fields/kwayy_switch_theme_style/apiconaadv-layout-thumb.png" ); ?>" /></span>
								<span class="switch-theme-overlay"><span class="tm-active-icon"><img src="<?php echo esc_url( get_template_directory_uri() . "/inc/redux-framework/redux_custom_fields/kwayy_switch_theme_style/active-arrow.png" ); ?>" /></span></span>
								<div class="thememount-demo-link-title"><img src="<?php echo esc_url( get_template_directory_uri() . "/inc/redux-framework/redux_custom_fields/kwayy_switch_theme_style/apiconaadv-small-logo.jpg" ); ?>" /></div>
								<div class="tm-style-switcher-new-tag"><img src="<?php echo esc_url( get_template_directory_uri() . "/inc/redux-framework/redux_custom_fields/kwayy_switch_theme_style/new.png" ); ?>" /></div>
							</a>
						
					
					
							<div class="switch-theme-data-text">
								
								<p><?php esc_attr_e("This style switching process will do this:","apicona"); ?></p>
								<ul class="thememount-normal-list">
									<li><?php esc_attr_e("Switch style layout","apicona"); ?></li>
									<li><?php esc_attr_e("Copy Theme Options from your current layout in selected layout","apicona"); ?></li>
									<li><?php esc_attr_e("Add some extra options in Theme Options","apicona"); ?></li>
									<li><?php esc_attr_e("Add some extra options in Page Builder elements","apicona"); ?></li>
								</ul>
								
								<div class="thememount-style-swicher-notice">
									<?php esc_attr_e('This migration process will try to copy all your settings in new style automatically. But still you need to do some steps manually.', 'apiconaadv')?>
									<a href="http://apicona.thememount.com/documentation/migrate.html" target="_blank"><?php esc_attr_e('Please click here to read this instructions before and after this process.', 'apiconaadv')?></a>
								</div>
								
								<div id="tm-style-switcher-results" style="display:none;"></div>
								
								<br /><br />
								<input type="button" class="button button-primary <?php echo $this->field['id']; ?>" id="kwayy_switch_theme_style_yes" value="<?php esc_attr_e('I agree, continue merge Theme Options', 'apiconaadv')?>" disabled="disabled" /> &nbsp; 
								<input type="button" class="button" id="kwayy_switch_theme_style_cancel" value="Cancel" /> 
							</div>
						
						
						</div><!-- .switch-theme-data-layout -->
					
					</div>
				</div>
				
		<div class="clear"></div></div>
		<?php
		}
	
		/**
		 * Enqueue Function.
		 *
		 * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
		 *
		 * @since		1.0.0
		 * @access		public
		 * @return		void
		 */
		public function enqueue() {

			// Function for demo content setup
			wp_enqueue_script(
				'redux-field_kwayy_switch_theme_style-js',
				get_template_directory_uri() . '/inc/redux-framework/redux_custom_fields/kwayy_switch_theme_style/field_kwayy_switch_theme_style.js',
				array( 'jquery' ),
				time(),
				true
			);

			wp_enqueue_style(
				'redux-field_kwayy_switch_theme_style-css',
				get_template_directory_uri() . '/inc/redux-framework/redux_custom_fields/kwayy_switch_theme_style/field_kwayy_switch_theme_style.css',
				time(),
				true
			);
			
			
		}
		
	
	}
}











