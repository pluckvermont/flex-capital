<?php
/*
Google Maps Element
*/

	global $vc_add_css_animation, $testimonials;
	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name'                    => __( 'Advanced Google Maps', 'Creativo' ),
		// shortcode name

		'base'                    => 'gmap_advanced',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Add a Google Map element to your page.', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/google-maps.png', // Simply pass url to your icon here,
		// don't show params window after adding

		//'front_enqueue_js' => get_template_directory_uri().'/js/vc/google_maps.js',

		'weight'                  => 13,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
				      "type" => "textfield",
				      "heading" => __("Google Map Popup Title", "Creativo"),
				      "param_name" => "title",
				      "admin_label" => true,	        
				      "description" => __("Example: We Are RockyThemes.", "Creativo")
				    ), 	
				    array(
				      "type" => "textarea",
				      "heading" => __("Google Map Popup Short Message", "Creativo"),
				      "param_name" => "message",	
				      "admin_label" => true,        
				      "description" => __("Enter a short message to show in the Popup Marker. Leave blank if you don't have any.", "Creativo")
				    ), 

				    array(
						"type" => "textfield",
						"heading" => __( "Popup Box Width", "Creativo" ),
						"param_name" => "pop_size",
						"description" => __('Enter the width of the pop-up box in pixelse. E.g: 350px', 'Creativo'),
						"value" => "350px"					
						),

				    array(
						'type' => 'textfield',
						'heading' => __( 'Address', 'Creativo' ),
						'param_name' => 'address',
						'admin_label' => true,
						'value' => 'New York Ave, Brooklyn, New York',
						'description' => __( 'Enter here your map address. Example: New York Ave, Brooklyn, New York', 'Creativo' ),
					),		

					array(
				      "type" => "dropdown",
				      "heading" => __("Map Style", "Creativo"),
				      "param_name" => "map_style",
				      "admin_label" => true,
				      "value" => array(
				      		__("Default", "Creativo") => "default", 
				      		__("Light Dream", "Creativo") => "1", 
				      		__("Pale Dawn", "Creativo") => "2",
				      		__("Apple Maps-esque", "Creativo") => "3",
				      		__("Blue Essence", "Creativo") => "4",
				      		__("Paper", "Creativo") => "5",
				      		__("Light Monochrome", "Creativo") => "5",
				      		__("Neutral Blue", "Creativo") => "7",
				      		__("MapBox", "Creativo") => "8",      		
				      		__("Custom", "Creativo") => "custom"),
				      "description" => __("Select map type.", "Creativo")
				    ),

				    array(
				      "type" => "textarea_raw_html",
				      "heading" => __("Custom Map Style", "Creativo"),
				      "param_name" => "custom_map_style",	        
				      'description' => __('Grab your custom map style code on: <a href="http://snazzymaps.com" target="_blank">snazzymaps.com</a> and paste it here.', 'Creativo'),
				      'dependency' => array(
								'element' => 'map_style',
								'value' => 'custom',
							),
				    ), 

					array(
						"type" => "textfield",
						"heading" => __( "Map Height", "Creativo" ),
						"param_name" => "size",
						"admin_label" => true,
						"description" => __('Enter map height in pixels. E.g: 250px', 'Creativo'),
						"value" => "350px"					
						),
					
				    array(
				      "type" => "dropdown",
				      "heading" => __("Map type", "Creativo"),
				      "param_name" => "type",
				      "admin_label" => true,
				      "value" => array(__("Roadmap", "Creativo") => "ROADMAP", __("Satellite", "Creativo") => "SATELLITE", __("Hybrid", "Creativo") => "HYBRID", __("Terrain", "Creativo") => "TERRAIN"),
				      "description" => __("Select map type.", "Creativo")
				    ),
					
				    array(
				      "type" => "dropdown",
				      "heading" => __("Map Zoom", "Creativo"),
				      "param_name" => "zoom",
				      "value" => array(__("14 - Default", "Creativo") => 14, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 15, 16, 17, 18, 19, 20)
				    ),
					
					array(
				      "type" => "textfield",
				      "heading" => __("Google Map Email Address", "Creativo"),
				      "param_name" => "email",
				      "description" => __("Enter your email address if you want to display it on the google map.", "Creativo")
				    ),
					
					array(
				      "type" => "textfield",
				      "heading" => __("Google Map Phone Number", "Creativo"),
				      "param_name" => "phone",
				      "description" => __("Enter your phone number if you want to display it on the google map.", "Creativo")
				    ),
					
					array(
						"type" => "dropdown",
						"heading" => __("Show Popup Box on page load", "Creativo"),
						"param_name" => "popup",
						"value" => array( __("Yes", "Creativo") => "yes", __("No", "Creativo") => "no"  )
					),

					array(
						"type" => "dropdown",
						"heading" => __("Map Scrollwheel", "Creativo"),
						"param_name" => "scrollwheel",
						"value" => array( __("Yes", "Creativo") => "yes", __("No", "Creativo") => "no"  )
					),
					
					array(
						"type" => "dropdown",
						"heading" => __("Map Pan Controls", "Creativo"),
						"param_name" => "pan",
						"value" => array( __("Yes", "Creativo") => "yes", __("No", "Creativo") => "no"  )
					),
					
					array(
						"type" => "dropdown",
						"heading" => __("Map Zoom Controls", "Creativo"),
						"param_name" => "zoom_control",
						"value" => array( __("Yes", "Creativo") => "yes", __("No", "Creativo") => "no"  )
					),

					array(
						"type" => "dropdown",
						"heading" => __("Map Type Controls", "Creativo"),
						"param_name" => "type_control",
						"value" => array( __("Yes", "Creativo") => "yes", __("No", "Creativo") => "no"  )
					),

					array(
						"type" => "dropdown",
						"heading" => __("Map Street View Controls", "Creativo"),
						"param_name" => "streetview",
						"value" => array( __("Yes", "Creativo") => "yes", __("No", "Creativo") => "no"  )
					),	
					
					//$vc_add_css_animation,
					
				    array(
				      "type" => "textfield",
				      "heading" => __("Extra class name", "Creativo"),
				      "param_name" => "el_class",
				      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "Creativo")
				    )					
				  		
				),		    			
		
	);