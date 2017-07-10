<?php
/*
Section Separator Element
*/

	//global $vc_add_css_animation;
	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name'                    => __( 'Section Separator', 'Creativo' ),
		// shortcode name

		'base'                    => 'section_separator',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Add a nice Section Separator.', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/candy.png', // Simply pass url to your icon here,
		// don't show params window after adding

		'weight'                  => 27,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
					  "type" => "dropdown",
					  "heading" => __("Size", "Creativo"),
					  "param_name" => "size",
					  "admin_label" => true,
					  "value" => array(__('Small', "Creativo") => "ss_small", __('Medium', "Creativo") => "ss_medium", __('Large', "Creativo") => "ss_big"),
					  "description" => __("Select the size of the separator.", "Creativo")
					),
					array(
					  "type" => "dropdown",
					  "heading" => __("Position", "Creativo"),
					  "param_name" => "position",
					  "admin_label" => true,
					  "value" => array(__('Center', "Creativo") => "sp_center", __('Left', "Creativo") => "sp_left", __('Right', "Creativo") => "sp_right"),
					  "description" => __("Select the position of the separator icon.", "Creativo")
					),
					array(
					  "type" => "textfield",
					  "heading" => __("Border Width(px)", 'Creativo'),
					  "param_name" => "border_w",
					  "value" => "1",
					  "description" => __("Enter the size of the border in pixels. Default: 1", 'Creativo')
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Border color", 'Creativo'),
					  "param_name" => "border_color",		  
					  "description" => __("Select the color of the border", 'Creativo')
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Background color", 'Creativo'),
					  "param_name" => "sep_bg_color",		  
					  "description" => __("Select the background color of the separtor", 'Creativo')
					),
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'js_composer' ),
						'param_name' => 'el_class',
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' )
					)
				),		    			
		
	);