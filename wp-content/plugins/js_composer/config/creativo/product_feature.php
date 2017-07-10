<?php
/*
Product Feature Element
*/
	global $target_arr;
	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name'                    => __( 'Product Feature', 'Creativo' ),
		// shortcode name

		'base'                    => 'vc_product_feature',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Add a product feature element.', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/product-feature.png', // Simply pass url to your icon here,
		// don't show params window after adding

		'weight'                  => 11,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
				      "type" => "textfield",
				      "heading" => __("Title", "Creativo"),
				      "param_name" => "title",
					  "holder" => "h2",
				      'value' => __('Design', 'Creativo'),
				      "description" => __("Text on the button.", "Creativo")
				    ),
					array(
					  "type" => "textfield",
					  "heading" => __("Title Font Size (px)", "Creativo"),
					  "param_name" => "font_size",
					  "admin_label" => true,
					  "value" => '14',
					  "description" => __("Enter the font size of the Title, in pixels.", "Creativo"),	
					  'weight' => 1,		
					),
					array (
						"type" => "colorpicker",
					    "holder" => "div",
					    "class" => "",
					    "heading" => __("Title color", 'Creativo'),
					    "param_name" => "title_color",
					    "value" => '#444', //Default Red color
					    "description" => __("Choose the color of the title", 'Creativo'),
						'weight' => 1,
					),
				    array(
				      "type" => "textfield",
				      "heading" => __("URL (Link)", "Creativo"),
				      "param_name" => "href",
				      "description" => __("Title link - adding a link will ignore the color you specify above and will use the default link color specified under Theme Options.", "Creativo")
				    ),
				    array(
				      "type" => "dropdown",
				      "heading" => __("Target", "Creativo"),
				      "param_name" => "target",
				      "value" => $target_arr,
				      "dependency" => Array('element' => "href", 'not_empty' => true)
				    ),
					array(
				      "type" => "attach_image",
				      "heading" => __("Image Icon", "Creativo"),
				      "param_name" => "icon",
				      "value" => "",
				      "description" => __("Select/upload image from media library.", "Creativo")
				    ),
					
					array(
							'type' => 'dropdown',
							'heading' => __( 'Icon library', 'js_composer' ),
							'value' => array(
								__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
								__( 'Open Iconic', 'js_composer' ) => 'openiconic',
								__( 'Typicons', 'js_composer' ) => 'typicons',
								__( 'Entypo', 'js_composer' ) => 'entypo',
								__( 'Linecons', 'js_composer' ) => 'linecons'
							),
							'param_name' => 'icon_type',
							'description' => __( 'Select icon library.', 'js_composer' ),
						),
						array(
							'type' => 'iconpicker',
							'heading' => __( 'Icon', 'js_composer' ),
							'param_name' => 'icon_fontawesome',
				            'value' => 'fa fa-info-circle',
							'settings' => array(
								'emptyIcon' => false, // default true, display an "EMPTY" icon?
								'iconsPerPage' => 2000, // default 100, how many icons per/page to display
							),
							'dependency' => array(
								'element' => 'icon_type',
								'value' => 'fontawesome',
							),
							'description' => __( 'Select icon from library.', 'js_composer' ),
						),
						array(
							'type' => 'iconpicker',
							'heading' => __( 'Icon', 'js_composer' ),
							'param_name' => 'icon_openiconic',
							'settings' => array(
								'emptyIcon' => false, // default true, display an "EMPTY" icon?
								'type' => 'openiconic',
								'iconsPerPage' => 2000, // default 100, how many icons per/page to display
							),
							'dependency' => array(
								'element' => 'icon_type',
								'value' => 'openiconic',
							),
							'description' => __( 'Select icon from library.', 'js_composer' ),
						),
						array(
							'type' => 'iconpicker',
							'heading' => __( 'Icon', 'js_composer' ),
							'param_name' => 'icon_typicons',
							'settings' => array(
								'emptyIcon' => false, // default true, display an "EMPTY" icon?
								'type' => 'typicons',
								'iconsPerPage' => 2000, // default 100, how many icons per/page to display
							),
							'dependency' => array(
							'element' => 'icon_type',
							'value' => 'typicons',
						),
							'description' => __( 'Select icon from library.', 'js_composer' ),
						),
						array(
							'type' => 'iconpicker',
							'heading' => __( 'Icon', 'js_composer' ),
							'param_name' => 'icon_entypo',
							'settings' => array(
								'emptyIcon' => false, // default true, display an "EMPTY" icon?
								'type' => 'entypo',
								'iconsPerPage' => 2000, // default 100, how many icons per/page to display
							),
							'dependency' => array(
								'element' => 'icon_type',
								'value' => 'entypo',
							),
						),
						array(
							'type' => 'iconpicker',
							'heading' => __( 'Icon', 'js_composer' ),
							'param_name' => 'icon_linecons',
							'settings' => array(
								'emptyIcon' => false, // default true, display an "EMPTY" icon?
								'type' => 'linecons',
								'iconsPerPage' => 2000, // default 100, how many icons per/page to display
							),
							'dependency' => array(
								'element' => 'icon_type',
								'value' => 'linecons',
							),
							'description' => __( 'Select icon from library.', 'js_composer' ),
						),
					array(
						  "type" => "colorpicker",
						  "holder" => "div",
						  "class" => "",
						  "heading" => __("Icon Color", 'Creativo'),
						  "param_name" => "icon_color",
						  "value" => '#666666', //Default Red color
						  "description" => __("Choose the color of the text Icon", 'Creativo')
						),	
						
					array(
				        "type" => "dropdown",
				        "heading" => __("Product Feature Icon Size", "Creativo"),
				        "param_name" => "icon_size",
				        "value" => array( __("Normal", "Creativo") => 'normal', __("Large", "Creativo") => 'big', __("Extra Large", "Creativo") => 'bigger'),
				        "description" => __("Select the size of the icon used for the Product Feature", "Creativo"),
						
				      ),
					  
					 array(
						  "type" => "colorpicker",
						  "holder" => "div",
						  "class" => "",
						  "heading" => __("Icon Background Color", 'Creativo'),
						  "param_name" => "icon_bg_color",
						  "value" => '#666666', //Default Red color
						  "description" => __("Choose the background color of the text Icon", 'Creativo'),
						  'dependency' => array(
								'element' => 'icon_size',
								'value' => array('big','bigger')
							),
						), 
						
						array(
				        "type" => "dropdown",
				        "heading" => __("Icon Background Shape", "Creativo"),
				        "param_name" => "icon_bg_shape",
				        "value" => array( __("Square", "Creativo") => 'square', __("Rounded", "Creativo") => 'rounded', __("Circle", "Creativo") => 'circle'),
				        "description" => __("Select the background shape ", "Creativo"),
						'dependency' => array(
								'element' => 'icon_size',
								'value' => array('big','bigger')
							),
				      ),	
					
					array(
				        "type" => "dropdown",
				        "heading" => __("Product Feature Position", "Creativo"),
				        "param_name" => "pf_pos",
				        "value" => array( __("Left", "Creativo") => 'left', __("Center", "Creativo") => 'center', __("Right", "Creativo") => 'right' ),
				        "description" => __("Select how to align the content of the Product Feature", "Creativo"),
				      ),
					
					array(
				        "type" => "dropdown",
				        "heading" => __("Enable View More link", "Creativo"),
				        "param_name" => "view_more",
				        "value" => array( __("No", "Creativo") => 'false', __("Yes", "Creativo") => 'true' ),
				        "description" => __("Would you like to display the forms description?", "Creativo"),
				      ),

				array(
				      "type" => "textarea_html",
				      "holder" => "div",
				      "heading" => __("Description", "Creativo"),
					  "holder" => "div",
				      "param_name" => "content",
				      "value" => __("Add some content for the product feature here", "Creativo")
				    ),
					/*
					array(
				         'type' => 'animation_style',
				         'heading' => __( 'Animation', 'js_composer' ),
				         'param_name' => 'animation',
				  	),
					*/
					vc_map_add_css_animation(),
					array(
				      "type" => "textfield",
				      "heading" => __("Animation Delay (miliseconds)", "Creativo"),
				      "param_name" => "delay",
				      "description" => __("Add animation delay in miliseconds. E.g: 1000 = 1 second.", "Creativo")
				    ),
				    array(
				      "type" => "textfield",
				      "heading" => __("Extra class name", "Creativo"),
				      "param_name" => "el_class",
				      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "Creativo")
				    )					
				  		
				),	
				'js_view' => 'VcProductFeatureView'	    			
		
	);