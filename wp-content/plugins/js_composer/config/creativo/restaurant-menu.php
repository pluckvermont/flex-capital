<?php
/*
Box Title Element
*/


	//global $vc_add_css_animation;
	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name'                    => __( 'Restaurant Menu Items', 'Creativo' ),
		// shortcode name

		'base'                    => 'restaurant_menu',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Add a Restaurant menu item.', 'Creativo' ),
		// element description in add elements view

		//'icon' => get_template_directory_uri() . '/images/vc/box-title.png', // Simply pass url to your icon here,
		// don't show params window after adding

		'weight'                  => 30,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'=> array(
					array(
						'type' => 'textfield',
						'heading' => __( 'Menu Title', 'js_composer' ),
						'param_name' => 'menu_item_title',
						'value' => 'Cheeseburger Fries',
						'description' => __( 'Enter text used as title of bar.', 'js_composer' ),
						'admin_label' => true,								
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Ingredients', 'js_composer' ),
						'param_name' => 'ingredients',
						'value' => 'Cheese / Potatao / Ham / Gorgonzolla',
						'description' => __( 'Enter the ingredients used.', 'js_composer' ),
						'admin_label' => true,								
					),	
					array(
						'type' => 'textfield',
						'heading' => __( 'Price', 'js_composer' ),
						'param_name' => 'price',
						'value' => '$14.9',
						'description' => __( 'Enter the price for this menu item.', 'js_composer' ),	
						'admin_label' => true,							
					),		
					/*
					array(
					  "type" => "dropdown",
					  "heading" => __("Force Uppercase", "Creativo"),
					  "param_name" => "uppercase",
					  "admin_label" => true,
					  "value" => array(__('Yes', "Creativo") => "yes", __('No', "Creativo") => "no"),
					  "description" => __("Force the title to use uppercase letters.", "Creativo")
					),
					*/
					array(
					  "type" => "colorpicker",					  
					  "heading" => __("Menu Title color", 'Creativo'),
					  "param_name" => "menu_color",
					  "value" => '', //Default Red color
					  "description" => __("Choose title color", 'Creativo')
					),	
					array(
					  "type" => "colorpicker",					  
					  "heading" => __("Ingredients color", 'Creativo'),
					  "param_name" => "ingredients_color",
					  "value" => '', //Default Red color
					  "description" => __("Choose title color", 'Creativo')
					),	
					array(
					  "type" => "colorpicker",					  
					  "heading" => __("Price color", 'Creativo'),
					  "param_name" => "price_color",
					  "value" => '', //Default Red color
					  "description" => __("Choose title color", 'Creativo')
					),	
					array(
					  "type" => "colorpicker",					  
					  "heading" => __("Separator color", 'Creativo'),
					  "param_name" => "separator_color",
					  "value" => '', //Default Red color
					  "description" => __("Choose title color", 'Creativo')
					),	
					array(
					  "type" => "textfield",
					  "heading" => __("Menu Title Font Size (px)", "Creativo"),
					  "param_name" => "menu_font_size",
					  "admin_label" => true,
					  "value" => '20',
					  "description" => __("Enter the font size of the Title, in pixels.", "Creativo")
					),		
					array(
					  "type" => "textfield",
					  "heading" => __("Ingredients Font Size (px)", "Creativo"),
					  "param_name" => "ingredients_font_size",
					  "admin_label" => true,
					  "value" => '12',
					  "description" => __("Enter the font size of the Title, in pixels.", "Creativo")
					),	
					array(
					  "type" => "textfield",
					  "heading" => __("Price Font Size (px)", "Creativo"),
					  "param_name" => "price_font_size",
					  "admin_label" => true,
					  "value" => '20',
					  "description" => __("Enter the font size of the Title, in pixels.", "Creativo")
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
						'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
					)
				),
				//'js_view' => 'VcTextSeparatorView',		    			
		
	);
	

