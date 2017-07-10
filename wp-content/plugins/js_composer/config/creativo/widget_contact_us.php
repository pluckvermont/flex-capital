<?php
/*
Widget Contact Us Element
*/

		
	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name'                    => __( 'Contact Us', 'Creativo' ),
		// shortcode name

		'base'                    => 'vc_contact_us',
		// shortcode base [test_element]

		'category'                => __( 'WordPress Widgets', 'Creativo' ),
		// param category tab in add elements view

		'description'             => __( 'Easily add your contact info.', 'Creativo' ),
		// element description in add elements view

		'icon' => 'icon-wpb-wp', // Simply pass url to your icon here,
		// don't show params window after adding

		'weight'                  => -40,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
						'type' => 'textfield',
						'heading' => __( 'Title', 'js_composer' ),
						'param_name' => 'title',
						//'description' => __( 'Enter a heading title for your widget.', 'js_composer' ),
						'value' => '',
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Address', 'js_composer' ),
						'param_name' => 'address',
						//'description' => __( 'Enter a heading title for your widget.', 'js_composer' ),
						'value' => '',
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Phone', 'js_composer' ),
						'param_name' => 'phone',
						//'description' => __( 'Enter a heading title for your widget.', 'js_composer' ),
						'value' => '',
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Fax', 'js_composer' ),
						'param_name' => 'fax',
						//'description' => __( 'Enter a heading title for your widget.', 'js_composer' ),
						'value' => '',
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Email', 'js_composer' ),
						'param_name' => 'email',
						//'description' => __( 'Enter a heading title for your widget.', 'js_composer' ),
						'value' => '',
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Website URL', 'js_composer' ),
						'param_name' => 'web',
						//'description' => __( 'Enter a heading title for your widget.', 'js_composer' ),
						'value' => '',
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'js_composer' ),
						'param_name' => 'el_class',
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' )
					)					
				  		
				),		    			
		
	);