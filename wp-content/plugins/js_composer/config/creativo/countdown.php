<?php
/*
Countdown Element
*/

return array(
		'name'                    => __( 'Countdown', 'Creativo' ),
		// shortcode name

		'base'                    => 'countdown_el',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Add a countdown element.', 'Creativo' ),
		// element description in add elements view

		//'front_enqueue_js' => get_template_directory_uri().'/js/vc/countdown.js',

		'icon' => get_template_directory_uri() . '/images/vc/countdown.png', // Simply pass url to your icon here,
		// don't show params window after adding

		'weight'                  => 23,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
						'type' => 'textfield',
						'heading' => __( 'Upcoming Date', 'js_composer' ),
						'param_name' => 'count_date',
						'value' => '12/24/2016 12:00:00',
						'admin_label' => true,
						'description' => __( 'Enter the due date. eg : 12/24/2016 12:00:00 => month/day/year hour:minute:second', 'js_composer' )
					),
					array(
			            "heading" => __("UTC Timezone", "js_composer") ,
			            "param_name" => "count_offset",
			            'admin_label' => true,
			            "value" => array(
			                "-12" => "-12",
			                "-11" => "-11",
			                "-10" => "-10",
			                "-9" => "-9",
			                "-8" => "-8",
			                "-7" => "-7",
			                "-6" => "-6",
			                "-5" => "-5",
			                "-4" => "-4",
			                "-3" => "-3",
			                "-2" => "-2",
			                "-1" => "-1",
			                "0" => "0",
			                "+1" => "+1",
			                "+2" => "+2",
			                "+3" => "+3",
			                "+4" => "+4",
			                "+5" => "+5",
			                "+6" => "+6",
			                "+7" => "+7",
			                "+8" => "+8",
			                "+9" => "+9",
			                "+10" => "+10",
			                "+12" => "+12"
			            ) ,
			            "type" => "dropdown"
			        ) ,
			        
					
					array(
						'type' => 'dropdown',
						'heading' => __( 'Style', 'js_composer' ),
						'param_name' => 'count_style',
						'value' => array(
							__( 'Default', 'js_composer' ) => 'default',
							__( 'Custom', 'js_composer' ) => 'custom'
						),
						'description' => __( 'Customize the style of the counter element.', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Countdown Units Font Size', 'js_composer' ),
						'param_name' => 'count_font_size',
						'value' => '60px',
						'description' => __( 'Select the font size of the coundown units. Default: 60px', 'js_composer' ),
						'dependency' => array(
							'element' => 'count_style',
							'value' => 'custom',
						),
					),
					array(
						'type' => 'colorpicker',
						'heading' => __( 'Countdown Units Color', 'js_composer' ),
						'param_name' => 'count_font_color',
						'value' => '#555555',
						'description' => __( 'Select the color of the countdown units.', 'js_composer' ),
						'dependency' => array(
							'element' => 'count_style',
							'value' => 'custom',
						),
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Countdown Details Font Size', 'js_composer' ),
						'param_name' => 'count_details_font_size',
						'value' => '13px',
						'description' => __( 'Select the font size for the days, hours, minutes and seconds text. Default: 13px', 'js_composer' ),
						'dependency' => array(
							'element' => 'count_style',
							'value' => 'custom',
						),
					),
					array(
						'type' => 'colorpicker',
						'heading' => __( 'Countdown Details Color', 'js_composer' ),
						'param_name' => 'count_details_font_color',
						'value' => '#888888',
						'description' => __( 'Select the color for the days, hours, minutes and seconds text.', 'js_composer' ),
						'dependency' => array(
							'element' => 'count_style',
							'value' => 'custom',
						),
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Border Width', 'js_composer' ),
						'param_name' => 'border',
						'value' => '1px',
						'description' => __( 'Enter the border width in pixels for the Countdown element. Default: 1px', 'js_composer' ),
						'dependency' => array(
							'element' => 'count_style',
							'value' => 'custom',
						),
					),
					array(
						'type' => 'colorpicker',
						'heading' => __( 'Border color', 'js_composer' ),
						'param_name' => 'border_color',
						'value' => '#cccccc',
						'description' => __( 'Select the border color of the counter.', 'js_composer' ),
						'dependency' => array(
							'element' => 'count_style',
							'value' => 'custom',
						),
					),
					array(
						'type' => 'colorpicker',
						'heading' => __( 'Background Color', 'js_composer' ),
						'param_name' => 'count_bg',
						'value' => '',
						'description' => __( 'Select the background color of the countdown element. Leave blank to have a transparent background', 'js_composer' ),
						'dependency' => array(
							'element' => 'count_style',
							'value' => 'custom',
						),
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Countdown Units Margin', 'js_composer' ),
						'param_name' => 'count_margin',
						'value' => '10px',
						'description' => __( 'Enter the margin of the countdown units in pixels or percents. Default: 10px', 'js_composer' ),
						'dependency' => array(
							'element' => 'count_style',
							'value' => 'custom',
						),
					),
					array(
						'type' => 'dropdown',
						'heading' => __( 'Show Days', 'js_composer' ),
						'param_name' => 'show_days',
						'value' => array(
							__( 'Yes', 'js_composer' ) => 'yes',
							__( 'No', 'js_composer' ) => 'no'
						),
						'description' => __( 'Show/hide the days units of the countdown element.', 'js_composer' ),
						'dependency' => array(
							'element' => 'count_style',
							'value' => 'custom',
						),
					),
					array(
						'type' => 'dropdown',
						'heading' => __( 'Show Hours', 'js_composer' ),
						'param_name' => 'show_hours',
						'value' => array(
							__( 'Yes', 'js_composer' ) => 'yes',
							__( 'No', 'js_composer' ) => 'no'
						),
						'description' => __( 'Show/hide the hours units of the countdown element.', 'js_composer' ),
						'dependency' => array(
							'element' => 'count_style',
							'value' => 'custom',
						),
					),
					array(
						'type' => 'dropdown',
						'heading' => __( 'Show Minutes', 'js_composer' ),
						'param_name' => 'show_minutes',
						'value' => array(
							__( 'Yes', 'js_composer' ) => 'yes',
							__( 'No', 'js_composer' ) => 'no'
						),
						'description' => __( 'Show/hide the minutes units of the countdown element.', 'js_composer' ),
						'dependency' => array(
							'element' => 'count_style',
							'value' => 'custom',
						),
					),
					array(
						'type' => 'dropdown',
						'heading' => __( 'Show Seconds', 'js_composer' ),
						'param_name' => 'show_seconds',
						'value' => array(
							__( 'Yes', 'js_composer' ) => 'yes',
							__( 'No', 'js_composer' ) => 'no'
						),
						'description' => __( 'Show/hide the seconds units of the countdown element.', 'js_composer' ),
						'dependency' => array(
							'element' => 'count_style',
							'value' => 'custom',
						),
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'js_composer' ),
						'param_name' => 'el_class',
						'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
					)	
				),		    			
		
	);

