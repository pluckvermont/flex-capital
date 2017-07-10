<?php
/*
Clients Element
*/
global $clients;
	return array(
		'name'                    => __( 'Events', 'Creativo' ),
		// shortcode name

		'base'                    => 'events_cal',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Add a Events Calendar element - first install the WP Events Calendar plugin ', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/events.png', // Simply pass url to your icon here,
		// don't show params window after adding

		//'front_enqueue_js' => get_template_directory_uri().'/js/vc/clients.js',

		'weight'                  => 15,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
				      "type" => "textfield",      
				      "heading" => __("Events Count", 'Creativo'),
				      "param_name" => "count",
				      "admin_label" => true,
				      "value" => "",
				      "description" => __("Enter how many events to disaply.", 'Creativo')
				    ),
					array(
				      "type" => "dropdown",
				      "heading" => __("Events Columns", "Creativo"),
				      "param_name" => "columns",
				      "admin_label" => true,
				      "value" => array( 4, 3, 2),
				      "description" => __("Select the number of columns used to display the events.", "Creativo")
				      //"dependency" => Array('element' => "href", 'not_empty' => true)
				    ),
				    array(
				      "type" => "dropdown",
				      "heading" => __("Text Align", "Creativo"),
				      "param_name" => "text_align",
				      "admin_label" => true,
				      "value" => array( __("Left", "Creativo") => 'left', __("Center", "Creativo") => 'center', __("Right", "Creativo") => 'right'),
				      "description" => __("Select the text alignment inside the event element.", "Creativo")
				      //"dependency" => Array('element' => "href", 'not_empty' => true)
				    ),
				    array(
				      "type" => "dropdown",
				      "heading" => __("Show Image", "Creativo"),
				      "param_name" => "show_image",
				      "admin_label" => true,
				      "value" => array( __("Yes", "Creativo") => 'yes', __("No", "Creativo") => 'no'),
				      "description" => __("Show image for event.", "Creativo")      
				    ),	
				    array(
				      "type" => "dropdown",
				      "heading" => __("Show Title", "Creativo"),
				      "param_name" => "show_title",
				      "admin_label" => true,
				      "value" => array( __("Yes", "Creativo") => 'yes', __("No", "Creativo") => 'no'),
				      "description" => __("Show title for event.", "Creativo")      
				    ),	  
				    array(
				      "type" => "dropdown",
				      "heading" => __("Show Date", "Creativo"),
				      "param_name" => "show_date",
				      "admin_label" => true,
				      "value" => array( __("Yes", "Creativo") => 'yes', __("No", "Creativo") => 'no'),
				      "description" => __("Show date for event.", "Creativo")      
				    ),	  
				    array(
				      "type" => "dropdown",
				      "heading" => __("Show Excerpt", "Creativo"),
				      "param_name" => "show_excerpt",
				      "admin_label" => true,
				      "value" => array( __("Yes", "Creativo") => 'yes', __("No", "Creativo") => 'no'),
				      "description" => __("Show excerpt for event.", "Creativo")      
				    ),
					array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'js_composer' ),
						'param_name' => 'el_class',
						'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
					)					
				  		
				),		    			
		
	);
	

