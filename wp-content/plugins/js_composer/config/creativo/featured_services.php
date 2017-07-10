<?php
/*
Featured Services Element
*/
	global $target_arr;
	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name'                    => __( 'Feaured Services', 'Creativo' ),
		// shortcode name

		'base'                    => 'vc_service_box',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Add featured services box element.', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/featured-services.png', // Simply pass url to your icon here,
		// don't show params window after adding

		'weight'                  => 12,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
				      "type" => "textfield",
				      "heading" => __("Heading Title", "Creativo"),
				      "param_name" => "title",
					  "holder" => "h2",
				      "value" => __("Design", "Creativo"),
				      "description" => __("Text on the button.", "Creativo")
				    ),
				    array(
				      "type" => "textfield",
				      "heading" => __("URL (Link)", "Creativo"),
				      "param_name" => "href",
				      "description" => __("Button link.", "Creativo")
				    ),
				    array(
				      "type" => "dropdown",
				      "heading" => __("Target", "Creativo"),
				      "param_name" => "target",
				      "value" => $target_arr,
				      "dependency" => Array('element' => "href", 'not_empty' => true)
				    ),
					
					array(
				      "type" => "dropdown",
				      "heading" => __("URL Area", "Creativo"),
				      "param_name" => "url_area",
				      "value" => array( __("Title only", "Creativo") => 'title', __("Entire Element", "Creativo") => 'entire_element'),
				      "dependency" => Array('element' => "href", 'not_empty' => true)
				    ),
					
					array(
				        "type" => "dropdown",
				        "heading" => __("Enable White Circle", "Creativo"),
				        "param_name" => "white_circle",
				        "value" => array( __("Yes", "Creativo") => 'yes', __("No", "Creativo") => 'no'),
				        "description" => __("Enable the white circle on user hover. Disable the white circle if you want to use a bigger version of the Image Icon.", "Creativo"),		
				      ),
					
					array(
				        "type" => "dropdown",
				        "heading" => __("Icon Type", "Creativo"),
				        "param_name" => "icon_type_select",
				        "value" => array( __("Image Icon", "Creativo") => 'image_icon', __("Font Icon", "Creativo") => 'font_icon'),
				        "description" => __("Select the type of Icon you want to use: Image icon or Font Icon.", "Creativo"),		
				      ),
					
					array(
				      "type" => "attach_image",
				      "heading" => __("Icon", "Creativo"),
				      "param_name" => "icon",
				      "value" => "",
				      "description" => __("Select/upload image from media library.", "Creativo"),
					  'dependency' => array(
								'element' => 'icon_type_select',
								'value' => 'image_icon',
							),
				    ),
					
					array(
						'type' => 'dropdown',
						'heading' => __( 'Font Icon', 'js_composer' ),
						'value' => array(
							__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
							__( 'Open Iconic', 'js_composer' ) => 'openiconic',
							__( 'Typicons', 'js_composer' ) => 'typicons',
							__( 'Entypo', 'js_composer' ) => 'entypo',
							__( 'Linecons', 'js_composer' ) => 'linecons'
						),
						'param_name' => 'icon_type',
						'dependency' => array(
								'element' => 'icon_type_select',
								'value' => 'font_icon',
							),
						'description' => __( 'Select icon library. If no image icon is used, the Font Icon will be used.', 'js_composer' ),
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
						  "description" => __("Choose the color of the text Icon", 'Creativo'),
						  'dependency' => array(
								'element' => 'icon_type_select',
								'value' => 'font_icon',
							),
						),	
					/*	
					array(
				        "type" => "dropdown",
				        "heading" => __("Product Feature Icon Size", "Creativo"),
				        "param_name" => "icon_size",
				        "value" => array( __("Normal", "Creativo") => 'normal', __("Big", "Creativo") => 'big'),
				        "description" => __("Select the size of the icon used for the Product Feature", "Creativo"),
						'dependency' => array(
								'element' => 'icon_type_select',
								'value' => 'font_icon',
						),
						
				      ),
					*/
					array(
				      "type" => "textfield",
				      "heading" => __("Icon Size (px)", "Creativo"),
				      "param_name" => "icon_size",
					  'value' => '40px',
				      "description" => __("Enter the size of the Font Icon in pixels. E.g: 40px", "Creativo"),
					  'dependency' => array(
							'element' => 'icon_type_select',
							'value' => 'font_icon',
						),
				    ),
					
					array(
				      "type" => "dropdown",
				      "heading" => __("Featured Services Styling", "Creativo"),
				      "param_name" => "style",
				      "value" => array( __("Default", "Creativo") => 'default', __("Custom", "Creativo") => 'custom')
				    ),
					
					array(
						  "type" => "colorpicker",
						  "heading" => __("Icon Color on Hover", 'Creativo'),
						  "param_name" => "fs_icon_color_hover",
						  "value" => '#ffffff', //Default Red color
						  "description" => __("Choose the color of the Icon on Hover", 'Creativo'),
						  'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
						),
					
					array(
						  "type" => "colorpicker",
						  "heading" => __("Title Color", 'Creativo'),
						  "param_name" => "fs_title_color",
						  "value" => '#777777', //Default Red color
						  "description" => __("Choose the color of the Title", 'Creativo'),
						  'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
						),
					
					array(
						  "type" => "colorpicker",
						  "heading" => __("Description Color", 'Creativo'),
						  "param_name" => "fs_desc_color",
						  "value" => '#777777', //Default Red color
						  "description" => __("Choose the color of the Description", 'Creativo'),
						  'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
						),
						
					array(
						  "type" => "colorpicker",
						  "heading" => __("Link Color", 'Creativo'),
						  "param_name" => "fs_link_color",
						  "value" => '#5bc98c', //Default Red color
						  "description" => __("Choose the color of the link", 'Creativo'),
						  'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
						),
						
					array(
						  "type" => "colorpicker",
						  "heading" => __("Background Color", 'Creativo'),
						  "param_name" => "fs_bg_color",
						  "value" => '#ffffff', //Default Red color
						  "description" => __("Choose the color of the background", 'Creativo'),
						  'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
						),	
						
					array(
						  "type" => "colorpicker",
						  "heading" => __("Title Color on Hover", 'Creativo'),
						  "param_name" => "fs_title_color_hover",
						  "value" => '#FFFFFF', //Default Red color
						  "description" => __("Choose the color of the Title on Hover", 'Creativo'),
						  'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
						),
					
					array(
						  "type" => "colorpicker",
						  "heading" => __("Description Color on Hover", 'Creativo'),
						  "param_name" => "fs_desc_color_hover",
						  "value" => '#FFFFFF', //Default Red color
						  "description" => __("Choose the color of the Description on Hover", 'Creativo'),
						  'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
						),
						
					array(
						  "type" => "colorpicker",
						  "heading" => __("Link Color", 'Creativo'),
						  "param_name" => "fs_link_color_hover",
						  "value" => '#FFFFFF', //Default Red color
						  "description" => __("Choose the color of the Link on Hover", 'Creativo'),
						  'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
						),
						
					array(
						  "type" => "colorpicker",
						  "heading" => __("Background Color on Hover", 'Creativo'),
						  "param_name" => "fs_bg_color_hover",
						  "value" => '#5bc98c', //Default Red color
						  "description" => __("Choose the color of the Background on Hover", 'Creativo'),
						  'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
						),
						
					array(
						'type' => 'checkbox',
						'heading' => __( 'Enable Border to the Featured Services box?', 'js_composer' ),
						'param_name' => 'fs_border',
						'value' => array( __( 'Yes, please', 'js_composer' ) => 'yes' ),
						'description' => __( 'If checked the Featured Services box will use a border.', 'js_composer' ),
						'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
					),		
						
					array(
						  "type" => "textfield",
						  "heading" => __("Border Width (px)", "Creativo"),
						  "param_name" => "fs_border_width",
						  "value" => '1px',
						  "description" => __("Enter the width of the border in pixels. Default: 1px", "Creativo"),
						  'dependency' => array(
								'element' => 'fs_border',
								'value' => 'yes',
							),
						),	
						
					array(
						  "type" => "colorpicker",
						  "heading" => __("Border Color", 'Creativo'),
						  "param_name" => "fs_border_color",
						  "value" => '#EEEEEE', //Default Red color
						  "description" => __("Choose the color of the Border", 'Creativo'),
						  'dependency' => array(
								'element' => 'fs_border',
								'value' => 'yes',
							),
						),	
						
					array(
						  "type" => "colorpicker",
						  "heading" => __("Border Color on Hover", 'Creativo'),
						  "param_name" => "fs_border_color_hover",
						  "value" => '#ffffff', //Default Red color
						  "description" => __("Choose the color of the Border on hover", 'Creativo'),
						  'dependency' => array(
								'element' => 'fs_border',
								'value' => 'yes',
							),
						),
						
					array(
						  "type" => "textfield",
						  "heading" => __("Border Radius (px)", "Creativo"),
						  "param_name" => "fs_border_radius",
						  "value" => '',
						  "description" => __("Enter a value for the Border Radius. This value will make rounder corners for the Featured Services box. E.g: 10px ", "Creativo"),
						  'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
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
				      "heading" => __("Text", "Creativo"),
				      "param_name" => "content",
				      "value" => __("Add your text for the featured services here", "Creativo")
				    ),
					
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
		
	);