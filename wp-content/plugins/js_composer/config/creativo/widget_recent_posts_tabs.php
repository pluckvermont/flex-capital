<?php
/*
Widget Recent Posts Tabs Element
*/

	return array(
		'name'                    => __( 'Popular Recent Posts Tabs', 'Creativo' ),
		// shortcode name

		'base'                    => 'vc_pop_rec_tabs',
		// shortcode base [test_element]

		'category'                => __( 'WordPress Widgets', 'Creativo' ),
		// param category tab in add elements view

		'description'             => __( 'A widget that displays your recent posts.', 'Creativo' ),
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
						'heading' => __( 'Number of Popular Posts', 'js_composer' ),
						'param_name' => 'posts',
						'value' => '',
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Number of Recent Posts', 'js_composer' ),
						'param_name' => 'recent',
						'value' => '',
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Number of Comments', 'js_composer' ),
						'param_name' => 'comments',
						'value' => '',
					),
					array(
						'type' => 'checkbox',
						'heading' => __( 'Show Popular Posts', 'js_composer' ),
						'param_name' => 'show_popular_posts',
						'value' => array( __( 'Yes', 'js_composer' ) => true )
					),
					array(
						'type' => 'checkbox',
						'heading' => __( 'Show Recent Posts', 'js_composer' ),
						'param_name' => 'show_recent_posts',
						'value' => array( __( 'Yes', 'js_composer' ) => true )
					),		
					array(
						'type' => 'checkbox',
						'heading' => __( 'Show Comments', 'js_composer' ),
						'param_name' => 'show_comments',
						'value' => array( __( 'Yes', 'js_composer' ) => true )
					),
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'js_composer' ),
						'param_name' => 'el_class',
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' )
					)				
				  		
				),		    			
		
	);