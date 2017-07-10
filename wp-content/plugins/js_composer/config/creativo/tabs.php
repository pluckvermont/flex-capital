<?php
/*
Tabs Element
*/

	global $button_colors2;
	//$tab_id_1 = ''; // 'def' . time() . '-1-' . rand( 0, 100 );
	//$tab_id_2 = ''; // 'def' . time() . '-2-' . rand( 0, 100 );
	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name' => __( 'Tabs Creativo', 'js_composer' ),
		'base' => 'vc_tabs',
		'show_settings_on_create' => false,
		'is_container' => true,
		'icon' => 'icon-wpb-ui-tab-content',
		'weight' => 10,
		'category' => 'Creativo',
		//'deprecated' => '4.6',
		'description' => __( 'Tabbed content', 'js_composer' ),
		'params' => array(
					array(
					  "type" => "dropdown",
					  "heading" => __("Style", "Creativo"),
					  "param_name" => "color",
					  "value" => $button_colors2,
					  "description" => __("Tabs styling.", "Creativo")
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Tab Content Font Size', 'js_composer' ),
						'param_name' => 'tc_font_size',
						'value' => '13px',
						'description' => __( 'Font size for the content inside each tab.', 'js_composer' ),
						'dependency' => array(
							'element' => 'color',
							'value' => 'custom',
						),
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Tab Content Line Height', 'js_composer' ),
						'param_name' => 'tc_line_heigt',
						'value' => '22px',
						'description' => __( 'Enter the line height for the content inside each tab.', 'js_composer' ),
						'dependency' => array(
							'element' => 'color',
							'value' => 'custom',
						),
					),
					array(
					  "type" => "colorpicker",
					  "heading" => __("Tab Colored Border", 'Creativo'),
					  "param_name" => "custom_colored_border",
					  "value" => '#5bc98c', //Default Red color
					  "description" => __("Choose a custom color for the colored tab", 'Creativo'),
					  'dependency' => array(
							'element' => 'color',
							'value' => 'custom',
						),
					),
					array(
						'type' => 'dropdown',
						'heading' => __( 'Tab Design', 'js_composer' ),
						'param_name' => 'style',
						'value' => array(
							__( 'Design 1', 'js_composer' ) => 'default',
							__( 'Design 2', 'js_composer' ) => 'style_2',
							__( 'Design 3', 'js_composer' ) => 'style_3',
							__( 'Design 4', 'js_composer' ) => 'style_4',
						),
						'description' => __( 'Select the tabs design.', 'js_composer' ),
					), 
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'js_composer' ),
						'param_name' => 'el_class',
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
					),
				),
				'custom_markup' => '
					<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
					<ul class="tabs_controls">
					</ul>
					%content%
					</div>',
				'default_content' => '					
					[vc_tab title="' . __( 'Tab 1', 'js_composer' ) . '" tab_id=""][/vc_tab]
					[vc_tab title="' . __( 'Tab 2', 'js_composer' ) . '" tab_id=""][/vc_tab]
					',
				'js_view' => 'VcTabsView' ,		    			
		
	);