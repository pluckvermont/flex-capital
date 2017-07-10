<?php
/*
Posts Grid Element
*/

	global $posts, $categories;	

	//global $target_arr, $style_arr, $button_colors, $size_arr2;
	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name'                    => __( 'Posts Grid', 'Creativo' ),
		// shortcode name

		'base'                    => 'recent_posts',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Posts in grid view.', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/posts_grid.png', // Simply pass url to your icon here,
		// don't show params window after adding

		//'front_enqueue_js' => get_template_directory_uri().'/js/vc/flexslider.js',

		'weight'                  => 20,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
				      "type" => "dropdown",
				      "heading" => __("Posts Grid Display", "Creativo"),
				      "param_name" => "grid_display",
					  "admin_label" => true,
				      "value" => array(__("Normal Grid", "Creativo") => "grid", __("Masonry Grid", "Creativo") => "masonry"),
				      "description" => __("Select how the posts grid element will be displayed.", "Creativo")
				    ),
				  	array(
				      "type" => "textfield",
				      "heading" => __("Posts Count", "Creativo"),
					  "admin_label" => true,
				      "param_name" => "posts",
				      "description" => __("Enter how many posts to show on the grid.", "Creativo")
				    ),
					
					array(
				      "type" => "dropdown",
				      "heading" => __("Display Columns", "Creativo"),
				      "param_name" => "columns",
					  "admin_label" => true,
				      "value" => array(5,4,3,2),
				      "description" => __("How many columns to use for the Posts Grid.", "Creativo")
				    ),
					array(
				      "type" => "dropdown",
				      "heading" => __("Thumbnail Size", "Creativo"),
				      "param_name" => "thumbnail_size",
					  "admin_label" => true,
				      "value" => array(__("Theme Generated", "Creativo") => "default", __("Full Size", "Creativo") => "full"),
				      "description" => __("Select the size of the thumbnails used.", "Creativo"),
				      "dependency" => array(
							"element" => "grid_display",
							"value" => "grid",
						),
				    ),
					array(
				      "type" => "dropdown",
				      "heading" => __("Show Thumbnail", "Creativo"),
				      "param_name" => "thumbnail",
					  "admin_label" => true,
				      "value" => array(__("Yes", "Creativo") => "yes", __("No", "Creativo") => "no"),
				      "description" => __("Show/hide post thumbnail.", "Creativo")
				    ),
					array(
				      "type" => "dropdown",
				      "heading" => __("Show Title", "Creativo"),
				      "param_name" => "show_title",
					  "admin_label" => true,
				      "value" => array(__("Yes", "Creativo") => "yes", __("No", "Creativo") => "no"),
				      "description" => __("Show/hide post title.", "Creativo")
				    ),
					array(
				      "type" => "dropdown",
				      "heading" => __("Show Date", "Creativo"),
				      "param_name" => "show_date",
					  "admin_label" => true,
				      "value" => array(__("Yes", "Creativo") => "yes", __("No", "Creativo") => "no"),
				      "description" => __("Show/hide post date.", "Creativo")
				    ),

					array(
				      "type" => "dropdown",
				      "heading" => __("Show Excerpt", "Creativo"),
				      "param_name" => "show_excerpt",
					  "admin_label" => true,
				      "value" => array(__("Yes", "Creativo") => "yes", __("No", "Creativo") => "no"),
				      "description" => __("Show/hide post excerpt.", "Creativo")
				    ),

					array (
						"type" => "textfield",
				      	"heading" => __("Excerpt length", "Creativo"),
					  	"admin_label" => true,
					  	"value" => "15",
				      	"param_name" => "excerpt_length",
				      	"description" => __("Enter the number of words to show in the excerpt. E.g: 15", "Creativo"),
						"dependency" => array(
							"element" => "show_excerpt",
							"value" => "yes",
						),
					),

					
				    array(
							'type' => 'multiselect',
							'heading' => __( 'Filter by Category', 'js_composer' ),
							'param_name' => 'taxonomies',
							'value' => $categories,
							'description' => __( 'Enter categories name to filter posts.', 'js_composer' ),
					),

					array(
							'type' => 'multiselect',
							'heading' => __( 'Include specific posts only', 'js_composer' ),
							'param_name' => 'include',
							'value' => $posts,
							'description' => __( 'Select only specific posts to be displayed', 'js_composer' ),
									
						),
					
				    array(
							'type' => 'textfield',
							'heading' => __( 'Posts Offset', 'js_composer' ),
							'param_name' => 'offset',
							'description' => __( 'Number of posts to displace or pass over.', 'js_composer' ),
						),

				    array(
				      "type" => "dropdown",
				      "heading" => __("Style", "Creativo"),
				      "param_name" => "style",
					  "admin_label" => true,
				      "value" => array(__("Default", "Creativo") => "default", __("Custom", "Creativo") => "custom"),
				      "description" => __("Select the styling of the Posts Grid", "Creativo")
				    ),
					
					array(
						  "type" => "colorpicker",
						  "heading" => __("Title Color", 'Creativo'),
						  "param_name" => "post_title_color",
						  "value" => '#444444', //Default Red color
						  "description" => __("Choose the color of the title", 'Creativo'),
						  'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
						),
					array(
				      "type" => "textfield",
				      "heading" => __("Title Font Size", "Creativo"),
				      "param_name" => "post_title_font_size",
					  "admin_label" => true,
					  "value" => "14px",
				      "description" => __("Enter the font size for the title. Default: 14px", "Creativo"),
				      'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
				    ),
				    array(
				      "type" => "textfield",
				      "heading" => __("Title Font Weight", "Creativo"),
					  "admin_label" => true,
					  "value" => "600",
				      "param_name" => "font_weight",
				      "description" => __("Enter the font weight for the title.", "Creativo"),
				      'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
				    ),	
				    array(
				      "type" => "dropdown",
				      "heading" => __("Uppercase Title", "Creativo"),
				      "param_name" => "post_title_uppercase",
					  "admin_label" => true,
				      "value" => array(__("No", "Creativo") => "no", __("Yes", "Creativo") => "yes"),
				      "description" => __("Enable/Disable Title Uppercase.", "Creativo"),
				      'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
				    ),

				    array(
						  "type" => "colorpicker",
						  "heading" => __("Date Color", 'Creativo'),
						  "param_name" => "post_date_color",
						  "value" => '#b5b8bf', //Default Red color
						  "description" => __("Choose the color of the date", 'Creativo'),
						  'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
						),

					array(
				      "type" => "textfield",
				      "heading" => __("Post Description Font Size", "Creativo"),
				      "param_name" => "post_desc_font_size",
					  "admin_label" => true,
					  "value" => "13px",
				      "description" => __("Enter the font size for the description. Default: 13px", "Creativo"),
				      'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
				    ),	

				    array(
						  "type" => "colorpicker",
						  "heading" => __("Post Description Text Color", 'Creativo'),
						  "param_name" => "post_desc_text_color",
						  "value" => '#656565', //Default Red color
						  "description" => __("Choose the text color for the Post Description", 'Creativo'),
						  'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
						),	

				    array(
						  "type" => "colorpicker",
						  "heading" => __("Post Description Background Color", 'Creativo'),
						  "param_name" => "post_desc_bg_color",
						  "value" => '#ffffff', //Default Red color
						  "description" => __("Choose the background color of the Post Description", 'Creativo'),
						  'dependency' => array(
								'element' => 'style',
								'value' => 'custom',
							),
						),
					
				    
					array(
							'type' => 'textfield',
							'heading' => __( 'Extra class name', 'js_composer' ),
							'param_name' => 'el_class',
							'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
						),
					array(
				      "type" => "textfield",
				      "heading" => __("Category ID - DEPRECATED use Filter by Category instead", "Creativo"),
				      "param_name" => "category", 
					  "admin_label" => true,     
				      "description" => __("Enter the categories id (numeric value) to show posts from. For multiple categories, separate them by comma. E.g: 4,5,20", "Creativo")
				    )	
				),		    			
		
	);