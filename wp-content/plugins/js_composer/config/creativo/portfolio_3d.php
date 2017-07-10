<?php
/*
3D Portfolio Element
*/

	global $taxon, $portfolio_posts;
	
	//global $target_arr, $style_arr, $button_colors, $size_arr2;
	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name'                    => __( '3D Portfolio', 'Creativo' ),
		// shortcode name

		'base'                    => 'recent_works',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Portfolio items with 3D Effect.', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/portfolio.png', // Simply pass url to your icon here,
		// don't show params window after adding

		//'front_enqueue_js' => get_template_directory_uri().'/js/vc/isotope.js',

		'weight'                  => 19,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
				      "type" => "textfield",
				      "heading" => __("Items Count", "Creativo"),
				      "param_name" => "items",
					  "admin_label" => true,
				      "description" => __("Enter how many portfolio items to show.", "Creativo")
				    ),

					array(
				      "type" => "dropdown",
				      "heading" => __("Show Filters", "Creativo"),
				      "param_name" => "show_filters",
					  "admin_label" => true,
				      "value" => array(__("Yes", "Creativo") => "yes", __("No", "Creativo") => "no"),
				      "description" => __("Show/hide portfolio filters.", "Creativo")
				    ),
				    array(
				      "type" => "dropdown",
				      "heading" => __("Show Tags", "Creativo"),
				      "param_name" => "show_tags",
					  "admin_label" => true,
				      "value" => array(__("Yes", "Creativo") => "yes", __("No", "Creativo") => "no"),
				      "description" => __("Show/hide portfolio tags.", "Creativo")
				    ),
					array(
				      "type" => "dropdown",
				      "heading" => __("Columns", "Creativo"),
				      "param_name" => "columns",
					  "admin_label" => true,
				      "value" => array(4,3,2,1),
				      "description" => __("Select the number of columns to use.", "Creativo")
				    ),
				    array(
						'type' => 'multiselect',
						'heading' => __( 'Include specific portfolio categories only', 'js_composer' ),
						'param_name' => 'include_categ',
						'value' => $taxon,
						//'options' => ,
						'description' => __( 'Select only specific portfolio categories to display posts', 'js_composer' ),
							
						),
				    array(
						'type' => 'multiselect',
						'heading' => __( 'Include specific portfolio items only', 'js_composer' ),
						'param_name' => 'include',
						'value' => $portfolio_posts,
						//'options' => ,
						'description' => __( 'Select only specific portfolio posts to be displayed', 'js_composer' ),							
						),
					array(
				      "type" => "textfield",
				      "heading" => __("Category ID - DEPRECATED use Filter by Category instead", "Creativo"),
				      "param_name" => "category_id",  
					  "admin_label" => true,    
				      "description" => __("Enter the category id to show posts from.", "Creativo")
				    ),
					array(
							'type' => 'textfield',
							'heading' => __( 'Extra class name', 'js_composer' ),
							'param_name' => 'el_class',
							'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
					),
				  		
				),		    			
		
	);