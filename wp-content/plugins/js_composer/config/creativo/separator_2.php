<?php
/*
Separator 2 Element
*/

	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name'                    => __( 'Separator 2', 'Creativo' ),
		// shortcode name

		'base'                    => 'vc_separator_2',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Stylish separator.', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/separator.png', // Simply pass url to your icon here,
		// don't show params window after adding

		'weight'                  => 28,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
					  "type" => "dropdown",
					  "heading" => __("Style", "Creativo"),
					  "param_name" => "style",
					  "value" => array(__('Small line', "Creativo") => "line", __('Line + Symbol', "Creativo") => "line_symbol"),
					  "description" => __("Select the style for the separator.", "Creativo")
					),
					array(
						'type' => 'dropdown',
						'heading' => __( 'Icon library', 'js_composer' ),
						'value' => array(
							__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
							__( 'Open Iconic', 'js_composer' ) => 'openiconic',
							__( 'Typicons', 'js_composer' ) => 'typicons',
							__( 'Entypo', 'js_composer' ) => 'entypo',
							__( 'Linecons', 'js_composer' ) => 'linecons'
						),
						'param_name' => 'icon_type',
						'dependency' => array(
							'element' => 'style',
							'value' => array( 'line_symbol' )
						),
						'description' => __( 'Select icon library.', 'js_composer' ),
					),
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Icon', 'js_composer' ),
						'param_name' => 'icon_fontawesome',
			            'value' => 'fa fa-info-circle',
						'settings' => array(
							'emptyIcon' => false, // default true, display an "EMPTY" icon?
							'iconsPerPage' => 2000, // default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'fontawesome',
						),
						'description' => __( 'Select icon from library.', 'js_composer' ),
					),
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Icon', 'js_composer' ),
						'param_name' => 'icon_openiconic',
						'settings' => array(
							'emptyIcon' => false, // default true, display an "EMPTY" icon?
							'type' => 'openiconic',
							'iconsPerPage' => 2000, // default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'openiconic',
						),
						'description' => __( 'Select icon from library.', 'js_composer' ),
					),
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Icon', 'js_composer' ),
						'param_name' => 'icon_typicons',
						'settings' => array(
							'emptyIcon' => false, // default true, display an "EMPTY" icon?
							'type' => 'typicons',
							'iconsPerPage' => 2000, // default 100, how many icons per/page to display
						),
						'dependency' => array(
						'element' => 'icon_type',
						'value' => 'typicons',
					),
						'description' => __( 'Select icon from library.', 'js_composer' ),
					),
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Icon', 'js_composer' ),
						'param_name' => 'icon_entypo',
						'settings' => array(
							'emptyIcon' => false, // default true, display an "EMPTY" icon?
							'type' => 'entypo',
							'iconsPerPage' => 2000, // default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'entypo',
						),
					),
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Icon', 'js_composer' ),
						'param_name' => 'icon_linecons',
						'settings' => array(
							'emptyIcon' => false, // default true, display an "EMPTY" icon?
							'type' => 'linecons',
							'iconsPerPage' => 2000, // default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'linecons',
						),
						'description' => __( 'Select icon from library.', 'js_composer' ),
					),
					array(
					  "type" => "colorpicker",
					  "holder" => "div",
					  "class" => "",
					  "heading" => __("Line Color", 'Creativo'),
					  "param_name" => "color_line",
					  "value" => '#444', //Default Red color
					  "description" => __("Choose the color of the Small Line ", 'Creativo'),
					  
					),		
					array(
					  "type" => "colorpicker",
					  "holder" => "div",
					  "class" => "",
					  "heading" => __("Symbol Color", 'Creativo'),
					  "param_name" => "color_symbol",
					  "value" => '#444', //Default Red color
					  "description" => __("Choose the color of the Symbol", 'Creativo'),
					  'dependency' => array(
							'element' => 'style',
							'value' => array( 'symbol','line_symbol' )
						),
					),	

					array(
					  "type" => "colorpicker",
					  "holder" => "div",
					  "class" => "",
					  "heading" => __("Symbol Background Color", 'Creativo'),
					  "param_name" => "bg_symbol",
					  "value" => '', //Default Red color
					  "description" => __("Add a background color for the symbol. Leave empty to not use any background color.", 'Creativo'),
					  'dependency' => array(
							'element' => 'style',
							'value' => array( 'symbol','line_symbol' )
						),
					),	
					array(
					  "type" => "colorpicker",
					  "holder" => "div",
					  "class" => "",
					  "heading" => __("Symbol Border Color", 'Creativo'),
					  "param_name" => "border_symbol",
					  "value" => '', //Default Red color
					  "description" => __("Add a border color for the symbol. Leave empty to not use any border color.", 'Creativo'),
					  'dependency' => array(
							'element' => 'style',
							'value' => array( 'symbol','line_symbol' )
						),
					),	
					
					array(
						'type' => 'dropdown',
						'heading' => __( 'Position', 'js_composer' ),
						'param_name' => 'separator_position',
						'value' => array(
							__( 'Align center', 'js_composer' ) => 'center_sep',
							__( 'Align left', 'js_composer' ) => 'left_sep',
							__( 'Align right', 'js_composer' ) => "right_sep"
						),
						'description' => __( 'Select element location.', 'js_composer' )
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
						'type' => 'dropdown',
						'heading' => __( 'Symbol Size', 'js_composer' ),
						'param_name' => 'symbol_size',
						'value' => array(
							__( 'Default', 'js_composer' ) => 'normal',
							__( 'Small', 'js_composer' ) => 'small',
							__( 'Extra Small', 'js_composer' ) => "extra_small",
							__( 'Large', 'js_composer' ) => 'large',
							__( 'Extra Large', 'js_composer' ) => "extra_large"
						),
						'description' => __( 'Select the size of the symbol used for separator.', 'js_composer' ),
						'dependency' => array(
							'element' => 'style',
							'value' =>  'line_symbol'
						),
					),
					array(
						'type' => 'dropdown',
						'heading' => __( 'Separator Width', 'js_composer' ),
						'param_name' => 'sep_width',
						'value' => array(
							__( 'Small', 'js_composer' ) => 'small',
							__( 'Medium', 'js_composer' ) => 'medium',
							__( 'Full', 'js_composer' ) => "full"
						),
						'description' => __( 'Select element location.', 'js_composer' ),
						'dependency' => array(
							'element' => 'style',
							'value' =>  'line_symbol'
						),
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'js_composer' ),
						'param_name' => 'el_class',
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' )
					)
				),		    			
		
	);