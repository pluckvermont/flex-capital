<?php
/*
Counter Element
*/

return array(
		'name'                    => __( 'Counter', 'Creativo' ),
		// shortcode name

		'base'                    => 'vc_counter',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Add a custom counter element.', 'Creativo' ),
		// element description in add elements view

		//'front_enqueue_js' => get_template_directory_uri().'/js/vc/counter.js',

		'icon' => get_template_directory_uri() . '/images/vc/counter.png', // Simply pass url to your icon here,
		// don't show params window after adding

		'weight'                  => 24,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
						'type' => 'dropdown',
						'heading' => __( 'Element alignment', 'js_composer' ),
						'param_name' => 'position',
						'value' => array(
							__( 'Align left', 'js_composer' ) => 'left',
							__( 'Align center', 'js_composer' ) => 'center',
							__( 'Align right', 'js_composer' ) => 'right'
						),
						'description' => __( 'Select alignment of the counter element.', 'js_composer' )
					),
					
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Icon', 'js_composer' ),
						'param_name' => 'icon_fontawesome',
			            'value' => 'fa fa-adjust',
						'settings' => array(
							'emptyIcon' => true, // default true, display an "EMPTY" icon?
							'iconsPerPage' => 2000, // default 100, how many icons per/page to display
						),		
						'admin_label' => true,	
						'description' => __( 'Select icon from library.', 'js_composer' ),
					),
					
					array(
						'type' => 'colorpicker',
						'heading' => __( 'Icon color', 'js_composer' ),
						'param_name' => 'icon_color',
						'value' => '#444444',
						'description' => __( 'Select the color of the description.', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Icon Size', 'js_composer' ),
						'param_name' => 'icon_size',
						'value' => '30',
						'description' => __( 'Enter the icon size in pixels.', 'js_composer' )
					),
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Counter starting value', 'js_composer' ),
						'param_name' => 'data_from',
						'value' => '0',
						'admin_label' => true,
						'description' => __( 'Enter the starting value for the counter. E.g: 0, if you want the counter to start from 0.', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Counter ending value', 'js_composer' ),
						'param_name' => 'data_to',
						'value' => '800',
						'admin_label' => true,
						'description' => __( 'Enter the ending value for the counter. This value should be a lot bigger than the <strong>Counter starts from</strong> value', 'js_composer' )
					), 
					array(
						'type' => 'dropdown',
						'heading' => __( 'Add comma separator', 'js_composer' ),
						'param_name' => 'comma_separator',
						'value' => array(
							__( 'No', 'js_composer' ) => 'no',
							__( 'Yes', 'js_composer' ) => 'yes'
						),
						'description' => __( 'Add a comma separator to the counting value.', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Refresh Interval', 'js_composer' ),
						'value' => '50',
						'param_name' => 'data_refresh_interval',
						'description' => __( 'This value will be incremented to the Counter starting value until the Counter ending value is reached', 'js_composer' )
					),
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Counter Speed', 'js_composer' ),
						'value' => '2000',
						'param_name' => 'data_speed',
						'description' => __( 'Enter the counter speed in miliseconds. E.g: 2000 = 2 seconds.', 'js_composer' )
					),
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Counter Font Size', 'js_composer' ),
						'value' => '30',
						'param_name' => 'font_size',
						'description' => __( 'Specify the font size of the counter.', 'js_composer' )
					),
					
					array(
						'type' => 'colorpicker',
						'heading' => __( 'Counter font color', 'js_composer' ),
						'param_name' => 'font_color',
						'value' => '#444444',
						'description' => __( 'Select the font color of the counter.', 'js_composer' )
					),
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Counter Prefix', 'js_composer' ),
						'value' => '',
						'param_name' => 'prefix',
						'description' => __( 'This text goes before the counter.', 'js_composer' )
					),
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Counter Suffix', 'js_composer' ),
						'value' => '',
						'param_name' => 'suffix',
						'description' => __( 'This text goes after the counter.', 'js_composer' )
					),
					
					
					array(
						'type' => 'textarea_html',
						'heading' => __( 'Description', 'js_composer' ),
						'value' => '<p>Optionally you can add a short description text.</p>',
						'param_name' => 'content',
						'admin_label' => true,
						'description' => __( 'This text goes below the counter.', 'js_composer' )
					),
					array(
						'type' => 'colorpicker',
						'heading' => __( 'Description color', 'js_composer' ),
						'param_name' => 'description_color',
						'value' => '#444444',
						'description' => __( 'Select the color of the description.', 'js_composer' )
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
					),	
				),		    			
		
	);