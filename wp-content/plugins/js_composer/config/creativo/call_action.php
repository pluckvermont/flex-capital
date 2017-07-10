<?php
/*
Call to Action Element
*/

	global $target_arr, $style_arr, $button_colors, $size_arr2;
	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name'                    => __( 'Call to Action - Creativo', 'Creativo' ),
		// shortcode name

		'base'                    => 'tagline_box',
		// shortcode base [test_element]

		'category'                => __( 'Creativo', 'Creativo' ),
		// param category tab in add elements view

		'description'             => __( 'Catch visitors attention with CTA block.', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/call_action.png', // Simply pass url to your icon here,
		// don't show params window after adding

		'weight'                  => 21,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
					  "type" => "dropdown",
					  "heading" => __("Action Box Style", "Creativo"),
					  "param_name" => "action_box_style",
					  "value" => $style_arr,
					  "description" => __("Select the style of the Action Box - Style 2 will center the elements of the Action Box.", "Creativo")
					),		  
					array(
					  "type" => "textarea",
					  'admin_label' => true,
					  "heading" => __("Big Text", "Creativo"),
					  "param_name" => "call_text",
					  "value" => __("Heading Text Here", "Creativo"),
					  "description" => __("Enter your heading text here.", "Creativo")
					),
					array(
					  "type" => "textarea",
					  'admin_label' => true,
					  "heading" => __("Small Text", "Creativo"),
					  "param_name" => "call_text_small",
					  "value" => __("Subheading text here", "Creativo"),
					  "description" => __("Enter your subheading text here.", "Creativo")
					),		
					array(
					  "type" => "textfield",
					  "heading" => __("Text on the button", "Creativo"),
					  "param_name" => "title",
					  "value" => __("Text on the button", "Creativo"),
					  "description" => __("Text on the button.", "Creativo")
					),
					array(
					  "type" => "textfield",
					  "heading" => __("URL (Link)", "Creativo"),
					  "param_name" => "href",
					  "description" => __("Button link.", "Creativo")
					),
					array(
					  "type" => "dropdown",
					  "heading" => __("Target", "Creativo"),
					  "param_name" => "target",
					  "value" => $target_arr,
					  "dependency" => Array('element' => "href", 'not_empty' => true)
					),
					array(
					  "type" => "dropdown",
					  "heading" => __("Color", "Creativo"),
					  "param_name" => "color",
					  "value" => $button_colors,
					  "description" => __("Button color.", "Creativo")
					),
					array(
					  "type" => "dropdown",
					  "heading" => __("Size", "Creativo"),
					  "param_name" => "size",
					  "value" => $size_arr2,
					  "description" => __("Button size.", "Creativo")
					),
					array(
					  "type" => "textfield",
					  "heading" => __("Extra class name", "Creativo"),
					  "param_name" => "el_class",
					  "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "Creativo")
					)	
				),		    			
		
	);

