<?php
/*
Qbox Element
*/

return array(
		'name'                    => __( 'Quote Box', 'Creativo' ),
		// shortcode name

		'base'                    => 'qbox',
		// shortcode base [test_element]

		'category'                => 'Creativo',
		// param category tab in add elements view

		'description'             => __( 'Add a Quote Box element', 'Creativo' ),
		// element description in add elements view

		'icon' => get_template_directory_uri() . '/images/vc/qbox.png', // Simply pass url to your icon here,
		// don't show params window after adding

		'weight'                  => 31,
		// Depends on ordering in list, Higher weight first		

		//'js_view'                 => 'ViewTestElement',
		// JS View name for backend. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).

		'params'                  => array(
			    array(
			      "type" => "textfield",
			      "holder" => "h2",
			      "class" => "",
			      "heading" => __("Title Big", 'Creativo'),
			      "param_name" => "title1",
			      "value" => "",
			      "description" => __("Enter text for Big Title on the left of the box.", 'Creativo')
			    ),
				array(
			      "type" => "textfield",
			      "holder" => "h4",
			      "class" => "",
			      "heading" => __("Title Small", 'Creativo'),
			      "param_name" => "title2",
			      "value" => "",
			      "description" => __("Enter text for Small Title on the right of the box.", 'Creativo')
			    ),
				array(
			      "type" => "attach_image",
			      "heading" => __("Icon", "Creativo"),
			      "param_name" => "icon",
			      "value" => "",
			      "description" => __("Select image from media library.", "Creativo")
			    ),
				array(
			      "type" => "textarea_html",
			      "holder" => "div",
			      "class" => "messagebox_text",
			      "heading" => __("Message text", "Creativo"),
			      "param_name" => "content",
			      "value" => __("<p>Quisque justo lorem, condimentum condimentum ornare vel, consectetur id justo? Phasellus leo lacus, rhoncus dictum auctor.</p>", "Creativo")
			    ),
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra class name', 'js_composer' ),
					'param_name' => 'el_class',
					'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
				)			
		)
	);


