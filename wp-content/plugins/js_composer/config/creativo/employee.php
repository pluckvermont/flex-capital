<?php
/*
Team Member Element
*/
	global $target_arr;
	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name'                    => __( 'Team Member', 'Creativo' ),
		// shortcode name

		'base'                    => 'vc_employee',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Add a team member element.', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/team-member.png', // Simply pass url to your icon here,
		// don't show params window after adding

		'weight'                  => 16,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
						'type' => 'dropdown',
						'heading' => __( 'Style', 'js_composer' ),
						'param_name' => 'employee_style',
						'value' => array( 
							__('Vertical','Creativo') => 'vertical', 
							__('Horizontal','Creativo') => 'horizontal' 
						)
						
					),
					
					array(
						'type' => 'attach_image',
						'heading' => __( 'Employee Image', 'js_composer' ),
						'param_name' => 'image',
						'value' => '',
						'description' => __( 'Select an image from the media library to be used as your employee profile image.', 'js_composer' )
					),
					
					array(
						'type' => 'dropdown',
						'heading' => __( 'Image Style', 'js_composer' ),
						'param_name' => 'img_style',
						'value' => array( 
							__('Square','Creativo') => 'square', 
							__('Round','Creativo') => 'round' 
						)
						
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Employee name', 'js_composer' ),
						'param_name' => 'name',
						'description' => __( 'Enter the name of the employee', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Employee position', 'js_composer' ),
						'param_name' => 'position',
						'description' => __( 'Enter the position of the employee', 'js_composer' )
					),
					
					array(
						'type' => 'textarea_html',
						'holder' => 'div',
						'heading' => __( 'Employee Short Bio', 'js_composer' ),
						'param_name' => 'content',
						'value' => __( '<p>Add here something about your Employee.</p>', 'js_composer' )
					),	
					array(
						'type' => 'textfield',
						'heading' => __( 'Employee URL (Link)', 'js_composer' ),
						'param_name' => 'href',
						'value' => '',
						'description' => __( 'Enter a custom link for this Employee element.', 'js_composer' ),
					),
					array(
						'type' => 'dropdown',
						'heading' => __( 'Target', 'js_composer' ),
						'param_name' => 'target',
						'value' => $target_arr,
						'dependency' => array(
							'element' => 'href',
							'not_empty' => true,				
						),
						
					),	
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Facebook URL', 'js_composer' ),
						'param_name' => 'facebook',
						'description' => __( 'Enter the Facebook url of your employee', 'js_composer' )
					),
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Twitter URL', 'js_composer' ),
						'param_name' => 'twitter',
						'description' => __( 'Enter the Twitter url of your employee', 'js_composer' )
					),
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Google+ URL', 'js_composer' ),
						'param_name' => 'gplus',
						'description' => __( 'Enter the Google Plus url of your employee', 'js_composer' )
					),
					
					array(
						'type' => 'textfield',
						'heading' => __( 'LinkedIn URL', 'js_composer' ),
						'param_name' => 'linkedin',
						'description' => __( 'Enter the LinkedIn url of your employee', 'js_composer' )
					),
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Instagram URL', 'js_composer' ),
						'param_name' => 'instagram',
						'description' => __( 'Enter the instagram url of your employee', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Pinterest URL', 'js_composer' ),
						'param_name' => 'pinterest',
						'description' => __( 'Enter the pinterest url of your employee', 'js_composer' )
					),
					array(
						'type' => 'dropdown',
						'heading' => __( 'Colors', 'js_composer' ),
						'description' => __( 'Select Custom if you want to alter the design and style of the Employee element. Leave Default to use the default color system.', 'js_composer' ),
						'param_name' => 'colors',
						'value' => array( 
							__('Default','Creativo') => 'default', 
							__('Custom','Creativo') => 'custom' 
						)
						
					),
					array(
					  "type" => "colorpicker",		  
					  "heading" => __("Image Hover Background Color", 'Creativo'),
					  "param_name" => "img_hover_color",
					  "value" => '#000000', 
			//		  "description" => __("Choose a background color for the employee image when hover", 'Creativo'),
					  'dependency' => array(
							'element' => 'colors',
							'value' => 'custom',
						),
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Image Hover Opacity', 'js_composer' ),
						'param_name' => 'opacity',
						'value' => '0.6',
						'description' => __( 'Change the opacity for the background color - lower value means less opacity. Use values between 0 and 1.', 'js_composer' ),
						'dependency' => array(
							'element' => 'colors',
							'value' => 'custom',
						)
					),
					array(
					  "type" => "colorpicker",		  
					  'heading' => __( 'Image Hover Icon Color', 'js_composer' ),
					  'param_name' => 'icon_color',
				      'value' => '#ffffff', 
			//		  "description" => __("Choose a background color for the employee image when hover", 'Creativo'),
					  'dependency' => array(
							'element' => 'colors',
							'value' => 'custom',
						),
					),

					array(
					  "type" => "colorpicker",		  
					  "heading" => __("Employee Description Background Color", 'Creativo'),
					  "param_name" => "description_bg",
					  "value" => '#ffffff', 
			//		  "description" => __("Choose a background color for the employee image when hover", 'Creativo'),
					  'dependency' => array(
							'element' => 'colors',
							'value' => 'custom',
						),
					),
					array(
					  "type" => "colorpicker",		  
					  "heading" => __("Employee Name Text Color", 'Creativo'),
					  "param_name" => "name_color",
					  "value" => '#444444', 
			//		  "description" => __("Choose a background color for the employee image when hover", 'Creativo'),
					  'dependency' => array(
							'element' => 'colors',
							'value' => 'custom',
						),
					),
					array(
					  "type" => "colorpicker",		  
					  "heading" => __("Employee Position Text Color", 'Creativo'),
					  "param_name" => "position_color",
					  "value" => '#CCCCCC', 
			//		  "description" => __("Choose a background color for the employee image when hover", 'Creativo'),
					  'dependency' => array(
							'element' => 'colors',
							'value' => 'custom',
						),
					),
					array(
					  "type" => "colorpicker",		  
					  "heading" => __("Employee Separator Color", 'Creativo'),
					  "param_name" => "separator_color",
					  "value" => '#f1f1f1', 
			//		  "description" => __("Choose a background color for the employee image when hover", 'Creativo'),
					  'dependency' => array(
							'element' => 'colors',
							'value' => 'custom',
						),
					),
					array(
					  "type" => "colorpicker",		  
					  "heading" => __("Employee Description Text Color", 'Creativo'),
					  "param_name" => "description_color",
					  "value" => '#f1f1f1', 
			//		  "description" => __("Choose a background color for the employee image when hover", 'Creativo'),
					  'dependency' => array(
							'element' => 'colors',
							'value' => 'custom',
						),
					),
					array(
					  "type" => "colorpicker",		  
					  "heading" => __("Employee Description Border Color", 'Creativo'),
					  "param_name" => "desc_border_color",
					  "value" => '#f1f1f1', 
					  "description" => __("This will affect the border color of the description container but only when using the Square Image option above.", 'Creativo'),
					  'dependency' => array(
							'element' => 'colors',
							'value' => 'custom',
						),
					),
					array(
					  "type" => "colorpicker",		  
					  "heading" => __("Social Icons Background Color", 'Creativo'),
					  "param_name" => "sc_bg",
					  "value" => '#f1f1f1', 
					 // "description" => __("This will affect the border color of the description container but only when using the Square Image option above.", 'Creativo'),
					  'dependency' => array(
							'element' => 'colors',
							'value' => 'custom',
						),
					),
					array(
					  "type" => "colorpicker",		  
					  "heading" => __("Social Icons Font Color", 'Creativo'),
					  "param_name" => "sc_color",
					  "value" => '#f1f1f1', 
					  //"description" => __("This will affect the border color of the description container but only when using the Square Image option above.", 'Creativo'),
					  'dependency' => array(
							'element' => 'colors',
							'value' => 'custom',
						),
					),
					
					vc_map_add_css_animation(),

					array(
					  "type" => "textfield",
					  "heading" => __("Animation Delay (miliseconds)", "Creativo"),
					  "param_name" => "delay",
					  "description" => __("Add animation delay in miliseconds. E.g: 1000 = 1 second.", "Creativo")
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'js_composer' ),
						'param_name' => 'el_class',
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
					),					
				  		
				),		    			
		
	);