<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Contact form7 vendor
 * =======
 * Plugin Contact form 7 vendor
 * To fix issues when shortcode doesn't exists in frontend editor. #1053, #1054 etc.
 * @since 4.3
 */
class Vc_Vendor_ContactForm7 implements Vc_Vendor_Interface {

	/**
	 * Add action when contact form 7 is initialized to add shortcode.
	 * @since 4.3
	 */
	public function load() {

		vc_lean_map( 'contact-form-7-mod', array(
			$this,
			'addShortcodeSettings',
		) );
	}

	/**
	 * Mapping settings for lean method.
	 *
	 * @since 4.9
	 *
	 * @param $tag
	 *
	 * @return array
	 */
	public function addShortcodeSettings( $tag ) {
		/**
		 * Add Shortcode To Visual Composer
		 */
		$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

		$contact_forms = array();
		if ( $cf7 ) {
			foreach ( $cf7 as $cform ) {
				$contact_forms[ $cform->post_title ] = $cform->ID;
			}
		} else {
			$contact_forms[ __( 'No contact forms found', 'js_composer' ) ] = 0;
		}

		return array(
			'base' => $tag,
			'name' => __( 'Contact Form 7', 'js_composer' ),
			'icon' => 'icon-wpb-contactform7',
			'category' => __( 'Content', 'js_composer' ),
			'description' => __( 'Place Contact Form7', 'js_composer' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Form title', 'js_composer' ),
					'param_name' => 'title',
					'admin_label' => true,
					'description' => __( 'What text use as form title. Leave blank if no title is needed.', 'js_composer' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Select contact form', 'js_composer' ),
					'param_name' => 'id',
					'value' => $contact_forms,
					'save_always' => true,
					'description' => __( 'Choose previously created contact form from the drop down list.', 'js_composer' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Style', 'js_composer' ),
					'param_name' => 'style',
					'value' => array( 
						__('Default','Creativo') => 'default', 
						__('Custom','Creativo') => 'custom' 
					)					
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Input Fields Font Size (px)', 'js_composer' ),
					'param_name' => 'input_font_size',
					'value' => '13px',
					'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
					'description' => __( 'Enter the font size in pixels for the Input Fields of this form. Default is 13px.', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Labels Font Size (px)', 'js_composer' ),
					'param_name' => 'label_font_size',
					'value' => '13px',
					'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
					'description' => __( 'Enter the font size in pixels for the Labels of this form. Default is 13px.', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Input Fields Padding', 'js_composer' ),
					'param_name' => 'padding',
					'value' => '10px',
					'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
					'description' => __( 'Enter the padding in pixels for the Input Fields. Default is: 10px', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Textarea height (px)', 'js_composer' ),
					'param_name' => 'textarea_height',
					'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
					'description' => __( 'Enter a fixed value in pixels for the textarea element used inside this form. Leave empty if you don\'t want to use this feature.', 'js_composer' )
				),
				array(
				  "type" => "colorpicker",		  
				  "heading" => __("Label Color", 'Creativo'),
				  "param_name" => "label_color",
				  "value" => '#666666', 
				  'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
				),
				array(
				  "type" => "colorpicker",		  
				  "heading" => __("Input Fields Background Color", 'Creativo'),
				  "param_name" => "input_bg",
				  "value" => '#ffffff', 
				  'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
				),
				array(
				  "type" => "colorpicker",		  
				  "heading" => __("Input Fields Background Color on Focus", 'Creativo'),
				  "param_name" => "input_bg_focus",
				  "value" => '#ffffff', 
				  'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
				),
				array(
					'type' => 'checkbox',
					'heading' => __( 'Disable Input Fields Borders', 'js_composer' ),
					'param_name' => 'el_borders',
					'value' => array( 
						__( 'Border Left', 'js_composer' ) => 'left',  
						__( 'Border Right', 'js_composer' ) => 'right',
						__( 'Border Top', 'js_composer' ) => 'top',
						__( 'Border Bottom', 'js_composer' ) => 'bottom'
					),
					'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
					'description' => __( 'Check the locations above to disable borders for the Input Fields. E.g: check Border Left if you do not want to show Input Fields with a border left.', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Input Fields Border Width (px)', 'js_composer' ),
					'param_name' => 'border_width',
					'value' => '1px',
					'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
					'description' => __( 'Enter a fixed value in pixels for the border width of the Input Fields of this form. Default is 1px.', 'js_composer' )
				),
				
				array(
				  "type" => "colorpicker",		  
				  "heading" => __("Input Fields Border Color", 'Creativo'),
				  "param_name" => "input_border",
				  "value" => '#CCCCCC', 
				  //"description" => __("Choose a background color for the employee image when hover", 'Creativo'),
				  'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
				),
				array(
				  "type" => "colorpicker",		  
				  "heading" => __("Input Fields Border Color on Focus", 'Creativo'),
				  "param_name" => "input_border_focus",
				  "value" => '#CCCCCC', 
				  //"description" => __("Choose a background color for the employee image when hover", 'Creativo'),
				  'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
				),
				array(
				  "type" => "colorpicker",		  
				  "heading" => __("Input Fields Text Color", 'Creativo'),
				  "param_name" => "input_text",
				  "value" => '#b2b2b6', 
				  //"description" => __("Choose a background color for the employee image when hover", 'Creativo'),
				  'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
				),
				array(
				  "type" => "colorpicker",		  
				  "heading" => __("Input Fields Text Color on Focus", 'Creativo'),
				  "param_name" => "input_text_focus",
				  "value" => '#555555', 
				  //"description" => __("Choose a background color for the employee image when hover", 'Creativo'),
				  'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
				),
				
				array(
					'type' => 'dropdown',
					'heading' => __( 'Submit Button Full Width?', 'js_composer' ),
					'param_name' => 'btn_full',
					'value' => array( 
						__('No','Creativo') => 'no', 
						__('Yes','Creativo') => 'yes' 
					),
					'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),					
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Submit Button Font Size (px)', 'js_composer' ),
					'param_name' => 'btn_font_size',
					'value' => '12px',
					'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
					'description' => __( 'Enter the font size in pixels for the Submit Button of this form. Default is 12px.', 'js_composer' )
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Submit Button Font Weight', 'js_composer' ),
					'param_name' => 'btn_font_weight',
					'value' => array( 600,400,500,700,900 ),
					'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),					
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Submit Button Top/Bottom Padding', 'js_composer' ),
					'param_name' => 'btn_padding_top',
					'value' => '10px',
					'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
					'description' => __( 'Enter the top/bottom padding in pixels for the Submit Button. Default is: 10px', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Submit Button Left/Right Padding', 'js_composer' ),
					'param_name' => 'btn_padding_side',
					'value' => '12px',
					'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
					'description' => __( 'Enter the left/right padding in pixels for the Submit Button. Default is: 12px', 'js_composer' )
				),
				
				array(
				  "type" => "colorpicker",		  
				  "heading" => __("Submit Button Background Color", 'Creativo'),
				  "param_name" => "btn_bg",
				  "value" => '#5bc98c', 
				  //"description" => __("Choose a background color for the employee image when hover", 'Creativo'),
				  'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
				),
				array(
				  "type" => "colorpicker",		  
				  "heading" => __("Submit Button Background Color on Hover", 'Creativo'),
				  "param_name" => "btn_bg_hover",
				  "value" => '#479e85', 
				  //"description" => __("Choose a background color for the employee image when hover", 'Creativo'),
				  'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
				),
				
				array(
				  "type" => "colorpicker",		  
				  "heading" => __("Submit Button Border Color", 'Creativo'),
				  "param_name" => "btn_border",
				  "value" => '#5bc98c', 
				  //"description" => __("Choose a background color for the employee image when hover", 'Creativo'),
				  'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
				),
				array(
				  "type" => "colorpicker",		  
				  "heading" => __("Submit Button Border Color on Hover", 'Creativo'),
				  "param_name" => "btn_border_hover",
				  "value" => '#479e85', 
				  //"description" => __("Choose a background color for the employee image when hover", 'Creativo'),
				  'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
				),
				
				array(
				  "type" => "colorpicker",		  
				  "heading" => __("Submit Button Text Color", 'Creativo'),
				  "param_name" => "btn_text",
				  "value" => '#FFFFFF', 
				  //"description" => __("Choose a background color for the employee image when hover", 'Creativo'),
				  'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
				),
				array(
				  "type" => "colorpicker",		  
				  "heading" => __("Submit Button Text Color on Hover", 'Creativo'),
				  "param_name" => "btn_text_hover",
				  "value" => '#FFFFFF', 
				  //"description" => __("Choose a background color for the employee image when hover", 'Creativo'),
				  'dependency' => array(
						'element' => 'style',
						'value' => 'custom',
					),
				),
			),
		);
	}
}
