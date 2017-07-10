<?php
/*
Owl Carousel Element
*/

	global $target_arr;
	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name'                    => __( 'OWL Carousel', 'Creativo' ),
		// shortcode name

		'base'                    => 'vc_carousel2',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Animated OWL carousel with images.', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/owl-carousel.png', // Simply pass url to your icon here,
		// don't show params window after adding

		//'front_enqueue_js' => get_template_directory_uri().'/js/vc/owl_carousel.js',

		'weight'                  => 22,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
						'type' => 'attach_images',
						'heading' => __( 'Images', 'js_composer' ),
						'param_name' => 'images',
						'value' => '',
						'description' => __( 'Select images from media library.', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Image size', 'js_composer' ),
						'param_name' => 'img_size',
						'value' => 'thumbnail',
						'description' => __( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'js_composer' )
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
					  "value" => '1',
					  "description" => __("Enter how many images will be visible for carousel.", "Creativo")
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
						'type' => 'dropdown',
						'heading' => __( 'On click', 'js_composer' ),
						'param_name' => 'onclick',
						'value' => array(
							__( 'Open prettyPhoto', 'js_composer' ) => 'link_image',
							__( 'Do nothing', 'js_composer' ) => 'link_no',
							__( 'Open custom link', 'js_composer' ) => 'custom_link'
						),
						'description' => __( 'Define action for onclick event if needed.', 'js_composer' )
					),
					array(
						'type' => 'exploded_textarea',
						'heading' => __( 'Custom links', 'js_composer' ),
						'param_name' => 'custom_links',
						'description' => __( 'Enter links for each slide here. Divide links with linebreaks (Enter) . ', 'js_composer' ),
						'dependency' => array(
							'element' => 'onclick',
							'value' => array( 'custom_link' )
						),
					),
					array(
						'type' => 'dropdown',
						'heading' => __( 'Custom link target', 'js_composer' ),
						'param_name' => 'custom_links_target',
						'description' => __( 'Select where to open  custom links.', 'js_composer' ),
						'dependency' => array(
							'element' => 'onclick',
							'value' => array( 'custom_link' )
						),
						'value' => $target_arr
					),
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'js_composer' ),
						'param_name' => 'el_class',
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' )
					)	
				),		    			
		
	);