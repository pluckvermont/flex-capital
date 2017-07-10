<?php
/*
Clients Element
*/
global $clients;
	return array(
		'name'                    => __( 'Clients', 'Creativo' ),
		// shortcode name

		'base'                    => 'vc_clients',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Add clients to your site.', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/clients.png', // Simply pass url to your icon here,
		// don't show params window after adding

		//'front_enqueue_js' => get_template_directory_uri().'/js/vc/clients.js',

		'weight'                  => 15,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
				      "type" => "textfield",
				      "heading" => __("Clients count", "Creativo"),
				      "param_name" => "items",
					  "value" => '6',
					  "admin_label" => true,
				      "description" => __("Enter how many clients to use.", "Creativo")
				    ),	
					array(
				        "type" => "dropdown",
				        "heading" => __("Enable Carousel Autoplay?", "Creativo"),
				        "param_name" => "autoplay",
						"admin_label" => true,
				        "value" => array( __("Yes", "Creativo") => 'yes', __("No", "Creativo") => 'no' )
				    ),
					array(
				      "type" => "textfield",
				      "heading" => __("Visible Items", "Creativo"),
				      "param_name" => "visible_items",
					  "admin_label" => true,
					  "value" => '5',
				      "description" => __("Enter how many clients will be visible for carousel.", "Creativo")
				    ),
					array(
				      "type" => "textfield",
				      "heading" => __("Carousel Timeout", "Creativo"),
				      "param_name" => "timeout",
					  "value" => '2000',
					  "admin_label" => true,
				      "description" => __("Enter the timeout of the carousel in miliseconds. E.g: 2000 = 2 seconds.", "Creativo")
				    ),
					
					array(
				        "type" => "dropdown",
				        "heading" => __("Enable Carousel Dots Navigation?", "Creativo"),
				        "param_name" => "navigation",
						"admin_label" => true,
				        "value" => array( __("Yes", "Creativo") => 'yes', __("No", "Creativo") => 'no' )
				    ),

				    array(
							'type' => 'multiselect',
							'heading' => __( 'Include specific clients only', 'js_composer' ),
							'param_name' => 'include',
							'value' => $clients,
							//'options' => ,
							'description' => __( 'Select only specific clients to be displayed', 'js_composer' ),
							
						),

					array(
				      "type" => "textfield",
				      "heading" => __("Extra class name", "Creativo"),
				      "param_name" => "el_class",
				      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "Creativo")
				    )					
				  		
				),		    			
		
	);
	

