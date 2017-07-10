<?php
/*
Box Title Element
*/


	//global $vc_add_css_animation;
	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name'                    => __( 'Box Title', 'Creativo' ),
		// shortcode name

		'base'                    => 'ctitle',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Add a descriptive Title to your section.', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/box-title.png', // Simply pass url to your icon here,
		// don't show params window after adding

		'weight'                  => 30,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
						'type' => 'textfield',
						'heading' => __( 'Title', 'js_composer' ),
						'param_name' => 'title',
						'holder' => 'div',
						'value' => __( 'We sell quality', 'js_composer' ),
						'description' => __( 'Separator title.', 'js_composer' )
					),
					array(
					  "type" => "dropdown",
					  "heading" => __("Force Uppercase", "Creativo"),
					  "param_name" => "uppercase",
					  "admin_label" => true,
					  "value" => array(__('Yes', "Creativo") => "yes", __('No', "Creativo") => "no"),
					  "description" => __("Force the title to use uppercase letters.", "Creativo")
					),
					array(
					  "type" => "colorpicker",
					  "holder" => "div",
					  "class" => "",
					  "heading" => __("Title color", 'Creativo'),
					  "param_name" => "color",
					  "value" => '#666666', //Default Red color
					  "description" => __("Choose title color", 'Creativo')
					),		
					array(
					  "type" => "colorpicker",
					  "holder" => "div",
					  "class" => "",
					  "heading" => __("Title background color", 'Creativo'),
					  "param_name" => "background",
					  "value" => '#fff', //Default Red color
					  "description" => __("Choose title background color", 'Creativo')
					),
					array(
					  "type" => "textfield",
					  "heading" => __("Font Size (px)", "Creativo"),
					  "param_name" => "font_size",
					  "admin_label" => true,
					  "value" => '30',
					  "description" => __("Enter the font size of the Title, in pixels.", "Creativo")
					),		
					array(
					  "type" => "dropdown",
					  "heading" => __("Font Weight", "Creativo"),
					  "param_name" => "font_weight",
					  "admin_label" => true,
					  "value" => array('normal' ,400, 500, 600, 700),
					  "description" => __("Select the font weight of the Title.", "Creativo")
					),
					array(
					  "type" => "dropdown",
					  "heading" => __("Title Positioning", "Creativo"),
					  "param_name" => "position",
					  "value" => array(__('Center', "Creativo") => "center", __('Left', "Creativo") => "left", __('Right', "Creativo") => "right"),
					  "description" => __("Select the positioning of the Title.", "Creativo")
					),
					array(
						'type' => 'colorpicker',
						'heading' => __( 'Title Separator Color', 'js_composer' ),
						'param_name' => 'separator_color',
						'description' => __( 'Select a custom separator color for your element.', 'js_composer' ),			
						'element' => 'color',
						'value' => "#ebebeb"			
					),		
					array(
						'type' => 'dropdown',
						'heading' => __( 'Element width', 'js_composer' ),
						'param_name' => 'el_width',
						'value' => getVcShared( 'separator widths' ),
						'description' => __( 'Select the width of the Title element in percents.', 'js_composer' )
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
						'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
					)
				),
				//'js_view' => 'VcTextSeparatorView',		    			
		
	);
	

