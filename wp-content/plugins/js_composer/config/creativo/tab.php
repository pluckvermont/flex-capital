<?php
/*
Tab Element
*/

return array(
		'name'                    => __( 'Tab', 'Creativo' ),
		// shortcode name

		'allowed_container_element' => 'vc_row',

		'base'                    => 'vc_tab',
		// shortcode base [test_element]

		'is_container' => true,
		'content_element' => false,		

		'params'=> array(
					array(
						'type' => 'textfield',
						'heading' => __( 'Title', 'js_composer' ),
						'param_name' => 'title',
						'description' => __( 'Enter title of tab.', 'js_composer' ),
					),
					array(
						'type' => 'tab_id',
						'heading' => __( 'Tab ID', 'js_composer' ),
						'param_name' => 'tab_id',
					),
				),				
		'js_view' => 'VcTabView' ,		    			
		
	);