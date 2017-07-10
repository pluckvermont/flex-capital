<?php
/*
Separator Element
*/

	//global $vc_add_css_animation;
	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name'                    => __( 'Separator', 'Creativo' ),
		// shortcode name

		'base'                    => 'vc_separator',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Add a Horizontal separator line.', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/separator-simple.png', // Simply pass url to your icon here,
		// don't show params window after adding

		'weight'                  => 29,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
					  "type" => "dropdown",
					  "heading" => __("Style", "Creativo"),
					  "param_name" => "style",
					  "value" => array(__('Dotted', "Creativo") => "dotted", __('Solid', "Creativo") => "solid", __('Double', "Creativo") => "double", __('Blank','Creativo') => "blank"),
					  "description" => __("Select the style for the separator.", "Creativo")
					),
					array(
					  "type" => "colorpicker",
					  "holder" => "div",
					  "class" => "",
					  "heading" => __("Color", 'Creativo'),
					  "param_name" => "color",
					  "value" => '#666666', //Default Red color
					  "description" => __("Choose the color of the separator element", 'Creativo')
					),

					array(
					  "type" => "textfield",
					  "heading" => __("Padding Top(px)", "Creativo"),
					  "param_name" => "padding_top",
					  "value" => "0",
					  "description" => __("Select a value for the padding top. Enter 0 for no padding top", "Creativo")
					),
					array(
					  "type" => "textfield",
					  "heading" => __("Padding Bottom(px)", "Creativo"),
					  "param_name" => "padding_bottom",
					  "value" => "0",
					  "description" => __("Select a value for the padding bottom. Enter 0 for no padding bottom", "Creativo")
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'js_composer' ),
						'param_name' => 'el_class',
						'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
					)
				),		    			
		
	);