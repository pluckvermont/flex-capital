<?php
/*
Flip Box Element
*/

	global $target_arr;
	return array(
		'name'                    => __( 'Flip Box', 'Creativo' ),
		// shortcode name

		'base'                    => 'flip_box',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Add a nice Flip Box element.', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/flip_box.png', // Simply pass url to your icon here,
		// don't show params window after adding

		//'front_enqueue_js' => get_template_directory_uri().'/js/vc/flip_box.js',

		'weight'                  => 26,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
					  "type" => "dropdown",
					  "heading" => __("Flip direction", "Creativo"),
					  "param_name" => "direction",
					  "value" => array(__('Horizontally', "Creativo") => "hor", __('Verically', "Creativo") => "vert"),
					  "description" => __("Select the direction of the flip effect.", "Creativo")
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Front Heading', 'js_composer' ),
						'param_name' => 'front_head',
						'admin_label' => true,
						'description' => __( 'This text is used for the Front Heading of the flip box.', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Front Heading Font Size', 'js_composer' ),
						'value' => '24px',
						'param_name' => 'front_head_size',
						'description' => __( 'Enter the Front Heading Font Size. Default: 24px', 'js_composer' )
					),
					array(
						'type' => 'textarea',
						'heading' => __( 'Front Text', 'js_composer' ),
						'value' => '',
						'param_name' => 'front_text',
						'admin_label' => true,
						'description' => __( 'This text is used for the Front of the flip box.', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Front Text Font Size', 'js_composer' ),
						'value' => '13px',
						'param_name' => 'front_text_size',
						'description' => __( 'Enter the Front Text Font Size. Default: 13px', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Back Heading', 'js_composer' ),
						'param_name' => 'back_head',
						'admin_label' => true,
						'description' => __( 'This text is used for the Front Heading of the flip box.', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Back Heading Font Size', 'js_composer' ),
						'param_name' => 'back_head_size',
						'value' => '22px',
						'description' => __( 'Enter the Back Heading Font Size. Default: 22px', 'js_composer' )
					),
					array(
						'type' => 'textarea',
						'heading' => __( 'Back Text', 'js_composer' ),
						'value' => '',
						'param_name' => 'back_text',
						'admin_label' => true,
						'description' => __( 'This text is used for the Back of the flip box.', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Back Text Font Size', 'js_composer' ),
						'value' => '13px',
						'param_name' => 'back_text_size',
						'description' => __( 'Enter the Back Text Font Size. Default: 13px', 'js_composer' )
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Front Background Color", 'Creativo'),
					  "param_name" => "front_bg_color",		  
					  "description" => __("Select the background color for the Front of the flip box.", 'Creativo')
					),
					array(
					  "type" => "attach_image",
					  "value" => "",
					  "heading" => __("Front Background Image", 'Creativo'),
					  "param_name" => "front_bg_img",					  		  
					  "description" => __("Select a background image for the Front of the flip box - if a backgrund image is set, the Front Background Color will be ignored.", 'Creativo')
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Front Mask Color", 'Creativo'),
					  "param_name" => "front_bg_mask_color",		  
					  "description" => __("Optionally you can add a colored mask over the background image set for the Front side of Flip Box element.", 'Creativo')
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Front Inner Background Color", 'Creativo'),
					  "param_name" => "front_inner_bg_color",		  
					  "description" => __("Optionally you can set a background color for the inner area of the front flip box area", 'Creativo')
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Front Inner Border Color", 'Creativo'),
					  "param_name" => "front_inner_border_color",		  
					  "description" => __("Optionally you can set a border color for the inner area of the front flip box area", 'Creativo')
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Front Heading Color", 'Creativo'),
					  "param_name" => "front_head_color",		  
					  "description" => __("Select the text color for the Front Heading of the flip box.", 'Creativo')
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Front Text Color", 'Creativo'),
					  "param_name" => "front_text_color",		  
					  "description" => __("Select the color for the Front Text of the flip box.", 'Creativo')
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Front Border in pixels', 'js_composer' ),
						'param_name' => 'front_border',
						'value' => '1px',
						'description' => __( 'Enter the Front Border width in pixelse. Enter 0px for no border', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Front Border radius - in pixels or percent', 'js_composer' ),
						'param_name' => 'front_border_radius',
						'value' => '3px',
						'description' => __( 'Enter the Front Border Radius in pixels or percent. Enter 0px for no border radius', 'js_composer' )
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Front Border Color", 'Creativo'),
					  "param_name" => "front_border_color",	
					  'value' => '#dddddd',
					  "description" => __("Select the color for the Front Border of the flip box.", 'Creativo')
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Link - only for the Back of Flip Box', 'js_composer' ),
						'param_name' => 'back_link',
						'value' => '',
						'description' => __( 'Enter a link that will be used for the Back section of the Flip Box.', 'js_composer' )
					),
					array(
					  "type" => "dropdown",
					  "heading" => __("Target", "Creativo"),
					  "param_name" => "target",
					  "value" => $target_arr,
					  "dependency" => Array('element' => "back_link", 'not_empty' => true)
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Back Background Color", 'Creativo'),
					  "param_name" => "back_bg_color",		  
					  "description" => __("Select the background color for the Back of the flip box.", 'Creativo')
					),
					array(
					  "type" => "attach_image",
					  "value" => "",
					  "heading" => __("Back Background Image", 'Creativo'),
					  "param_name" => "back_bg_img",		  
					  "description" => __("Select a background image for the Front of the flip box - if a backgrund image is set, the Back Background Color will be ignored.", 'Creativo')
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Back Mask Color", 'Creativo'),
					  "param_name" => "back_bg_mask_color",		  
					  "description" => __("Optionally you can add a colored mask over the background image set for the Back side of Flip Box element.", 'Creativo')
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Back Inner Background Color", 'Creativo'),
					  "param_name" => "back_inner_bg_color",		  
					  "description" => __("Optionally you can set a background color for the inner area of the back flip box area", 'Creativo')
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Back Inner Border Color", 'Creativo'),
					  "param_name" => "back_inner_border_color",		  
					  "description" => __("Optionally you can set a border color for the inner area of the back flip box area", 'Creativo')
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Back Heading Color", 'Creativo'),
					  "param_name" => "back_head_color",		  
					  "description" => __("Select the text color for the Back Heading of the flip box.", 'Creativo')
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Back Text Color", 'Creativo'),
					  "param_name" => "back_text_color",		  
					  "description" => __("Select the color for the Back Text of the flip box.", 'Creativo')
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Back Border in pixels', 'js_composer' ),
						'param_name' => 'back_border',
						'value' => '1px',
						'description' => __( 'Enter the Back Border width in pixels. Enter 0px for no border', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Back Border radius - in pixels or percent', 'js_composer' ),
						'param_name' => 'back_border_radius',
						'value' => '3px',
						'description' => __( 'Enter the Back Border Radius in pixels or percent. Enter 0px for no border radius', 'js_composer' )
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Back Border Color", 'Creativo'),
					  "param_name" => "back_border_color",		  
					  "description" => __("Select the color for the Back Border of the flip box.", 'Creativo')
					),

					array(
						'type' => 'dropdown',
						'heading' => __( 'Use Icon', 'js_composer' ),
						'value' => array(
							__( 'None', 'js_composer' ) => 'none',
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
			            'value' => 'fa fa-adjust',
						'settings' => array(
							'emptyIcon' => false, // default true, display an "EMPTY" icon?
							'type' => 'fontawesome',
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
						'type' => 'textfield',
						'heading' => __( 'Font Icon Size', 'js_composer' ),
						'value' => '40px',
						'param_name' => 'font_icon_size',
						'description' => __( 'Enter the Font Icon Size in pixels. Default: 40px', 'js_composer' ),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => array( 'fontawesome', 'openiconic', 'typicons', 'entypo', 'linecons' )
						),
					),
					array(
					  "type" => "dropdown",
					  "heading" => __("Show Icon on Back?", "Creativo"),
					  "param_name" => "icon_back",
					  "value" => array(__('Yes', "Creativo") => "yes", __('No', "Creativo") => "no"),
					  "description" => __("Show icon on the back of the flip box.", "Creativo"),
					  'dependency' => array(
							'element' => 'icon_type',
							'value' => array( 'fontawesome', 'openiconic', 'typicons', 'entypo', 'linecons' )
						),
					),
					array(
					  	"type" => "colorpicker",
					  	"heading" => __("Front Icon Color", 'Creativo'),
					  	"param_name" => "front_icon_color",		  
					  	'dependency' => array(
							'element' => 'icon_type',
							'value' => array( 'fontawesome', 'openiconic', 'typicons', 'entypo', 'linecons' )
						),
					  "description" => __("Select the color for the Front Icon of the flip box.", 'Creativo')
					),
					array(
					  	"type" => "colorpicker",
					  	"heading" => __("Back Icon Color", 'Creativo'),
					  	"param_name" => "back_icon_color",		  
					  	'dependency' => array(
							'element' => 'icon_type',
							'value' => array( 'fontawesome', 'openiconic', 'typicons', 'entypo', 'linecons' )
						),
					  "description" => __("Select the color for the Back Icon of the flip box.", 'Creativo')
					),					

					vc_map_add_css_animation(),
					array(
					  "type" => "textfield",
					  "heading" => __("Animation Delay (miliseconds)", "Creativo"),
					  "param_name" => "delay",
					  "description" => __("Add animation delay in miliseconds. E.g: 1000 = 1 second.", "Creativo")
					),
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'js_composer' ),
						'param_name' => 'el_class',
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' )
					)
				),		    			
		
	);