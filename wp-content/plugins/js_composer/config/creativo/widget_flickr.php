<?php
/*
Widget Flickr Element
*/

	return array(
		'name'                    => __( 'Creativo Flickr', 'Creativo' ),
		// shortcode name

		'base'                    => 'vc_flickr_cr',
		// shortcode base [test_element]

		'category'                => __( 'WordPress Widgets', 'Creativo' ),
		// param category tab in add elements view

		'description'             => __( 'Show recent photos from flickr.', 'Creativo' ),
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
						'value' => '',
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Screen Name', 'js_composer' ),
						'param_name' => 'screen_name',
						'value' => '',
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Number of photos to show', 'js_composer' ),
						'param_name' => 'number',
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