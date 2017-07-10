<?php
/*
Testimonials Element
*/


	global $testimonials;
	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name'                    => __( 'Testimonials', 'Creativo' ),
		// shortcode name

		'base'                    => 'vc_testimonials',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Add testimonials to your site.', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/testimonials.png', // Simply pass url to your icon here,
		// don't show params window after adding

		//'front_enqueue_js' => get_template_directory_uri().'/js/vc/testimonials.js',

		'weight'                  => 14,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
				      "type" => "textfield",
				      "heading" => __("Testimonials count", "Creativo"),
				      "param_name" => "items",
					  "value" => '5',
					  "admin_label" => true,
				      "description" => __("Enter how many testimonials to use.", "Creativo")
				    ),
				    array(
				        "type" => "dropdown",
				        "heading" => __("Testimonial Style", "Creativo"),
				        "param_name" => "test_style",
						"admin_label" => true,
				        "value" => array( __("Centered", "Creativo") => 'center', __("Image on Left", "Creativo") => 'left' )
				    ),	
				    array(
				        "type" => "dropdown",
				        "heading" => __("Show Testimonial Images", "Creativo"),
				        "param_name" => "test_images",
						"admin_label" => true,
				        "value" => array( __("Yes", "Creativo") => 'yes', __("No", "Creativo") => 'no' )
				    ),
				    array(
				        "type" => "dropdown",
				        "heading" => __("Testimonial Type", "Creativo"),
				        "param_name" => "type",
						"admin_label" => true,
				        "value" => array( __("Carousel", "Creativo") => 'carousel', __("Grid", "Creativo") => 'grid' )
				    ),
				    array(
				        "type" => "dropdown",
				        "heading" => __("Grid columns", "Creativo"),
				        "param_name" => "cols",
						"admin_label" => true,
				        "value" => array( __("1 Column", "Creativo") => 'cols-1', __("2 Columns", "Creativo") => 'cols-2', __("3 Columns", "Creativo") => 'cols-3', __("4 Columns", "Creativo") => 'cols-4' ),
				        'dependency' => array(
								'element' => 'type',
								'value' => 'grid',
							),
				    ),
					array(
				        "type" => "dropdown",
				        "heading" => __("Enable Carousel Autoplay?", "Creativo"),
				        "param_name" => "autoplay",
						"admin_label" => true,
				        "value" => array( __("Yes", "Creativo") => 'yes', __("No", "Creativo") => 'no' ),
				        'dependency' => array(
								'element' => 'type',
								'value' => 'carousel',
							),
				    ),
					array(
				      "type" => "textfield",
				      "heading" => __("Visible Items", "Creativo"),
				      "param_name" => "visible_items",
					  "admin_label" => true,
					  "value" => '1',
				      "description" => __("Enter how many testimonials will be visible for carousel.", "Creativo"),
				      'dependency' => array(
								'element' => 'type',
								'value' => 'carousel',
							),
				    ),
					array(
				      "type" => "textfield",
				      "heading" => __("Carousel Timeout", "Creativo"),
				      "param_name" => "timeout",
					  "value" => '2000',
					  "admin_label" => true,
				      "description" => __("Enter the timeout of the carousel in miliseconds. E.g: 2000 = 2 seconds.", "Creativo"),
				      'dependency' => array(
								'element' => 'type',
								'value' => 'carousel',
							),
				    ),
					
					array(
				        "type" => "dropdown",
				        "heading" => __("Enable Carousel Dots Navigation?", "Creativo"),
				        "param_name" => "navigation",
						"admin_label" => true,
				        "value" => array( __("Yes", "Creativo") => 'yes', __("No", "Creativo") => 'no' ),
				        'dependency' => array(
								'element' => 'type',
								'value' => 'carousel',
							),
				    ),
					
					array(
				        "type" => "dropdown",
				        "heading" => __("Testimonial Colors", "Creativo"),
				        "param_name" => "style",
						"admin_label" => true,
				        "value" => array( __("Green", "Creativo") => "green", __("Blue", "Creativo") => "blue", __("Red", "Creativo") => "red", __("Yellow", "Creativo") => "yellow", __("Purple", "Creativo") => "purple", __("Grey", "Creativo") => "grey", __("Black", "Creativo") => "black", __("Custom", "Creativo") => "custom" ),

				    ),
					
					array(
						  "type" => "colorpicker",		  
						  "heading" => __("Testimonial Description Color", 'Creativo'),
						  "param_name" => "custom_color",
						  "value" => '#333333', //Default Red color
						  "description" => __("Choose a custom color for the entire testimonial element", 'Creativo'),
						  'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
						),
					
					array(
						  "type" => "colorpicker",
						  "holder" => "div",
						  "class" => "",
						  "heading" => __("Testimonial Author Color", 'Creativo'),
						  "param_name" => "testimonial_author",
						  "value" => '#5bc98c', //Default Red color
						  "description" => __("Choose a custom color for the author link", 'Creativo'),
						  'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
						),
					array(
						  "type" => "colorpicker",
						  "holder" => "div",
						  "class" => "",
						  "heading" => __("Testimonial Link Color", 'Creativo'),
						  "param_name" => "testimonial_link",
						  "value" => '#333333', //Default Red color
						  "description" => __("Choose a custom color for the author link", 'Creativo'),
						  'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
						),
					
					array(
				      "type" => "textfield",
				      "heading" => __("Testimonial Description Font Size", "Creativo"),
				      "param_name" => "font_size",
					  "admin_label" => true,
					  "value" => '14',
				      "description" => __("Enter the testimonials font size in pixels.", "Creativo")
				    ),
				    array(
						  "type" => "dropdown",		  
						  "heading" => __("Testimonial Description Font Style", 'Creativo'),
						  "param_name" => "font_style",
						  "value" => array( __("Normal", "Creativo") => "normal", __("Italic", "Creativo") => "italic" ),
						  "description" => __("Choose the font style for the testimonial description", 'Creativo'),		  
						),
				    array(
				      "type" => "textfield",
				      "heading" => __("Testimonial Author Font Size", "Creativo"),
				      "param_name" => "author_font_size",	  
					  "value" => '16',
				      "description" => __("Enter the testimonial author font size in pixels.", "Creativo")
				    ),
				    array(
				      "type" => "textfield",
				      "heading" => __("Testimonial Author Link Font Size", "Creativo"),
				      "param_name" => "author_link_font_size",	  
					  "value" => '12',
				      "description" => __("Enter the testimonial author link font size in pixels.", "Creativo")
				    ),
					array(
						  "type" => "dropdown",
						  "heading" => __("Testimonials Description Font Weight", "Creativo"),
						  "param_name" => "font_weight",
						  "admin_label" => true,
						  "value" => array(300 ,400, 500, 600, 700),
						  "description" => __("Select the font weight of the Testimonial.", "Creativo")
						),
					array(
						  "type" => "dropdown",
						  "heading" => __("Testimonials Author Font Weight", "Creativo"),
						  "param_name" => "author_font_weight",
						  "admin_label" => true,
						  "value" => array(600 ,300, 400, 500, 700),
						  "description" => __("Select the font weight of the Testimonial.", "Creativo")
						),

					array(
						'type' => 'multiselect',
						'heading' => __( 'Include specific testimonials only', 'js_composer' ),
						'param_name' => 'include',
						'value' => $testimonials,
						//'options' => ,
						'description' => __( 'Select only specific testimonials to be displayed', 'js_composer' ),
							
						),

					array(
				      "type" => "textfield",
				      "heading" => __("Extra class name", "Creativo"),
				      "param_name" => "el_class",
				      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "Creativo")
				    )					
				  		
				),		    			
		
	);