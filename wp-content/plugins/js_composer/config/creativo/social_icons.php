<?php
/*
Separator Element
*/

return array(
		'name'                    => __( 'Social Icons', 'Creativo' ),
		// shortcode name

		'base'                    => 'social_icons',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Add social icons with links.', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/social_icons.png', // Simply pass url to your icon here,
		// don't show params window after adding

		'weight'                  => 25,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
					  "type" => "dropdown",
					  "heading" => __("Styling", "Creativo"),
					  "param_name" => "style",
					  "value" => array(__('Default', "Creativo") => "default", __('Custom', "Creativo") => "custom"),
					  "description" => __("Select the styling of the Social Icons element.", "Creativo")
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Social Icons Size (px)', 'js_composer' ),
						'param_name' => 'icon_size',
						'value' => '15px',
						'description' => __( 'Enter the size of the Social Icons in pixels. Default: 15px', 'js_composer' ),
						'dependency' => array(
							'element' => 'style',
							'value' =>  'custom'
						),
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Social Icons Gap (px)', 'js_composer' ),
						'param_name' => 'icon_gap',
						'value' => '2px',
						'description' => __( 'Use this option to increase/decrease the spacing between Social Icons. Default: 2px', 'js_composer' ),
						'dependency' => array(
							'element' => 'style',
							'value' =>  'custom'
						),
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Social Icons Background Color", 'Creativo'),
					  "param_name" => "bg_color",		  
					  "description" => __("Select the background color of the Social Icons", 'Creativo'),
					  'value' => '#f9f9f9',
					  'dependency' => array(
							'element' => 'style',
							'value' =>  'custom'
						),
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Social Icons Font Color", 'Creativo'),
					  "param_name" => "icon_color",	
					  'value' => '#cccccc',
					  "description" => __("Select the font color for the Social Icons", 'Creativo'),
					  'dependency' => array(
							'element' => 'style',
							'value' =>  'custom'
						),
					),
					array(
					  "type" => "dropdown",
					  "heading" => __("Shape", "Creativo"),
					  "param_name" => "shape",
					  "value" => array(__('Square', "Creativo") => "square", __('Rounded', "Creativo") => "rounded", __('Round', "Creativo") => "round"),
					  "description" => __("Select the styling of the Social Icons element.", "Creativo")
					),

					array(
					  "type" => "dropdown",
					  "heading" => __("Positioning", "Creativo"),
					  "param_name" => "position",
					  "value" => array(__('Left', "Creativo") => "left", __('Center', "Creativo") => "center", __('Right', "Creativo") => "right"),
					  "description" => __("Select the positioning of the Social Icons.", "Creativo")
					),
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Facebook Profile Link', 'js_composer' ),
						'param_name' => 'fb',
						'description' => __( 'Add a link to your Facebook profile/page', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Twitter Profile Link', 'js_composer' ),
						'param_name' => 'tw',
						'description' => __( 'Add a link to your Twitter profile/page', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Google+ Profile Link', 'js_composer' ),
						'param_name' => 'goo',
						'description' => __( 'Add a link to your Google+ profile/page', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'LinkedIn Profile Link', 'js_composer' ),
						'param_name' => 'link',
						'description' => __( 'Add a link to your LinkedIn profile/page', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Flickr Profile Link', 'js_composer' ),
						'param_name' => 'flk',
						'description' => __( 'Add a link to your Flickr profile/page', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Pinterest Profile Link', 'js_composer' ),
						'param_name' => 'pin',
						'description' => __( 'Add a link to your Pinterest profile/page', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'StumbleUpon Profile Link', 'js_composer' ),
						'param_name' => 'stumble',
						'description' => __( 'Add a link to your StumbleUpon profile/page', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Instagram Profile Link', 'js_composer' ),
						'param_name' => 'insta',
						'description' => __( 'Add a link to your Instagram profile/page', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Tumblr Profile Link', 'js_composer' ),
						'param_name' => 'tbl',
						'description' => __( 'Add a link to your Tumblr profile/page', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Dribbble Profile Link', 'js_composer' ),
						'param_name' => 'drb',
						'description' => __( 'Add a link to your Dribbble profile/page', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Behance Profile Link', 'js_composer' ),
						'param_name' => 'beh',
						'description' => __( 'Add a link to your Behance profile/page', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Vimeo Profile Link', 'js_composer' ),
						'param_name' => 'vm',
						'description' => __( 'Add a link to your Vimeo profile/page', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Youtube Profile Link', 'js_composer' ),
						'param_name' => 'yt',
						'description' => __( 'Add a link to your Youtube profile/page', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Skype Profile Link', 'js_composer' ),
						'param_name' => 'sk',
						'description' => __( 'Add a link to your Skype profile/page', 'js_composer' )
					),

					array(
						'type' => 'textfield',
						'heading' => __( 'Digg Profile Link', 'js_composer' ),
						'param_name' => 'dg',
						'description' => __( 'Add a link to your Digg profile/page', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Reddit Profile Link', 'js_composer' ),
						'param_name' => 'rdd',
						'description' => __( 'Add a link to your Reddit profile/page', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'DeviantArt Profile Link', 'js_composer' ),
						'param_name' => 'dev',
						'description' => __( 'Add a link to your Digg profile/page', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Soundcloud Profile Link', 'js_composer' ),
						'param_name' => 'sc',
						'description' => __( 'Add a link to your SoundCloud profile/page', 'js_composer' )
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Xing Profile Link', 'js_composer' ),
						'param_name' => 'xng',
						'description' => __( 'Add a link to your Xing profile/page', 'js_composer' )
					),
					/*
					array(
						'type' => 'textfield',
						'heading' => __( 'Forrst Profile Link', 'js_composer' ),
						'param_name' => 'frr',
						'description' => __( 'Add a link to your Forrst profile/page', 'js_composer' )
					),*/
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Yahoo Profile Link', 'js_composer' ),
						'param_name' => 'yah',
						'description' => __( 'Add a link to your Yahoo profile/page', 'js_composer' )
					),

					vc_map_add_css_animation(),
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'js_composer' ),
						'param_name' => 'el_class',
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' )
					)	
				),		    			
		
	);