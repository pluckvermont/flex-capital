<?php
/*
Pricing Column Element
*/
	
	global $target_arr, $button_colors, $size_arr2, $alignment;
	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name'                    => __( 'Pricing Table Column', 'Creativo' ),
		// shortcode name

		'base'                    => 'vc_price_column',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Add a pricing table column.', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/pricing-column.png', // Simply pass url to your icon here,
		// don't show params window after adding

		'weight'                  => 17,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
						'type' => 'dropdown',
						'heading' => __( 'Column Type', 'js_composer' ),
						'param_name' => 'col_type',
						'value' => array( 
							__('Normal','Creativo') => 'normal', 
							__('Promo','Creativo') => 'promo' 
						),
						'description' => __( 'Select the type of the Pricing Column. Use Promo to make the column stand out.', 'js_composer' )
						
					),
					array(
					  "type" => "colorpicker",
					  "holder" => "div",
					  "class" => "",
					  "heading" => __("Pricing Column Border Color", 'Creativo'),
					  "param_name" => "col_border_color",
					  "value" => '#f1f1f1', 
					  "description" => __("Choose a color for the border of the Pricing Column", 'Creativo'),		  
					),	
						
					array(
						'type' => 'textfield',
						'heading' => __( 'Heading Text', 'js_composer' ),
						'param_name' => 'heading_text',
						'value' => 'Business',
						'description' => __( 'Enter the heading text for the pricing table.', 'js_composer' )
					),
					array(
					  "type" => "colorpicker",
					  "holder" => "div",
					  "class" => "",
					  "heading" => __("Heading Text Color", 'Creativo'),
					  "param_name" => "heading_text_color",
					  "value" => '#313131', 
					  "description" => __("Choose a color for the heading text", 'Creativo'),		  
					),
					array(
					  "type" => "colorpicker",
					  "holder" => "div",
					  "class" => "",
					  "heading" => __("Heading Background Color", 'Creativo'),
					  "param_name" => "heading_bg_color",
					  "value" => '#ffffff', 
					  "description" => __("Choose a background color for the Heading area", 'Creativo'),		  
					),	
					array(
						'type' => 'textfield',
						'heading' => __( 'Price', 'js_composer' ),
						'param_name' => 'price',
						'value' => '29',
						'description' => __( 'Enter the price', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Billing Interval', 'js_composer' ),
						'param_name' => 'interval',
						'value' => 'monthly',
						'description' => __( 'Enter the text for monthly billing interval', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Currency', 'js_composer' ),
						'param_name' => 'currency',
						'value' => '$',
						'description' => __( 'Enter the currency text', 'js_composer' )
					),
					array(
					  "type" => "colorpicker",		  
					  "heading" => __("Price, Currency and Billing Color", 'Creativo'),
					  "param_name" => "pcb_color",
					  "value" => '#5bc98c', 
					  "description" => __("Choose a color for the Price, Currency and Billing Interval text", 'Creativo'),		  
					),	
					array(
						'type' => 'textarea_html',
						'holder' => 'div',
						'heading' => __( 'Pricing Column features', 'js_composer' ),
						'param_name' => 'content',
						'description' => __( 'Enter the pricing column features text', 'js_composer' ),
						'value' => '<ul><li>15 Projects</li><li>30 GB Storage</li><li>Unlimited Data Transfer</li><li>50 GB Bandwith</li><li>Enhanced Security</li></ul>'			
					),	
					array(
					  "type" => "colorpicker",
					  "holder" => "div",
					  "class" => "",
					  "heading" => __("Pricing Features Text Color", 'Creativo'),
					  "param_name" => "pf_text_color",
					  "value" => '#969595', 
					  "description" => __("Choose a color for the Pricing Column Features Text", 'Creativo'),		  
					),	
					array(
					  "type" => "colorpicker",
					  "holder" => "div",
					  "class" => "",
					  "heading" => __("Pricing Features Background Color", 'Creativo'),
					  "param_name" => "pf_bg_color",
					  "value" => '#ffffff', 
					  "description" => __("Choose a background color for the Pricing Column Features ", 'Creativo'),		  
					),	
					array(
						'type' => 'dropdown',
						'heading' => __( 'Enable Button', 'js_composer' ),
						'param_name' => 'en_button',
						'value' => array( 
							__('Yes','Creativo') => 'yes', 
							__('No','Creativo') => 'no' 
						)
						
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Text on the button', 'js_composer' ),			
						'param_name' => 'title',
						'value' => __( 'Text on the button', 'js_composer' ),
						'description' => __( 'Text on the button.', 'js_composer' ),
						'dependency' => array(
							'element' => 'en_button',
							'value' => 'yes',				
						)
					),
					array(
						'type' => 'href',
						'heading' => __( 'URL (Link)', 'js_composer' ),
						'param_name' => 'href',
						'description' => __( 'Button link.', 'js_composer' ),
						'dependency' => array(
							'element' => 'en_button',
							'value' => 'yes',				
						)
					),
					array(
						'type' => 'dropdown',
						'heading' => __( 'Target', 'js_composer' ),
						'param_name' => 'target',
						'value' => $target_arr,
						'dependency' => array(
							'element' => 'href',
							'not_empty' => true,
							'callback' => 'vc_button_param_target_callback'
						),
						
					),
					array(
						'type' => 'dropdown',
						'heading' => __( 'Color', 'js_composer' ),
						'param_name' => 'color',
						'value' => $button_colors,
						'description' => __( 'Button color.', 'js_composer' ),
						'dependency' => array(
							'element' => 'en_button',
							'value' => 'yes',				
						)
						//'param_holder_class' => 'vc_colored-dropdown'
					),

					array(
						'type' => 'dropdown',
						'heading' => __( 'Size', 'js_composer' ),
						'param_name' => 'size',
						'value' => $size_arr2,
						'description' => __( 'Button size.', 'js_composer' ),
						'dependency' => array(
							'element' => 'en_button',
							'value' => 'yes',				
						)
					),
					array(
					  "type" => "dropdown",
					  "heading" => __("Align", "Creativo"),
					  "param_name" => "align",
					  "value" => $alignment,
					  "description" => __("Button alignment.", "Creativo"),
					  'dependency' => array(
							'element' => 'en_button',
							'value' => 'yes',				
						)
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