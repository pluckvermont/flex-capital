<?php
/*
Creativo Twitter Element
*/

	return array(
		'name'                    => __( 'Creativo Twitter', 'Creativo' ),
		// shortcode name

		'base'                    => 'vc_twitter_cr',
		// shortcode base [test_element]

		'category'                => __( 'WordPress Widgets', 'Creativo' ),
		// param category tab in add elements view

		'description'             => __( 'Creativo Twitter Feed widget.', 'Creativo' ),
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
						'heading' => __( 'Consumer Key', 'js_composer' ),
						'param_name' => 'consumer_key',
						'value' => '',
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Consumer Secret', 'js_composer' ),
						'param_name' => 'consumer_secret',
						'value' => '',
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Access Token', 'js_composer' ),
						'param_name' => 'access_token',
						'value' => '',
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Access Token Secret', 'js_composer' ),
						'param_name' => 'access_token_secret',
						'value' => '',
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Twitter profile name', 'js_composer' ),
						'param_name' => 'twitter_id',
						'value' => '',
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Number of Tweets', 'js_composer' ),
						'param_name' => 'count',
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