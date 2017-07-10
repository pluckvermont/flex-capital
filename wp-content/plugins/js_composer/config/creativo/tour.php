<?php
/*
Tour Element
*/

	global $button_colors;
	//$tab_id_1 = ''; // 'def' . time() . '-1-' . rand( 0, 100 );
	//$tab_id_2 = ''; // 'def' . time() . '-2-' . rand( 0, 100 );
	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name' => __( 'Tour Creativo', 'js_composer' ),
		'base' => 'vc_tour',
		'show_settings_on_create' => false,
		'is_container' => true,
		'container_not_allowed' => true,
		'weight' => 9,
		//'deprecated' => '4.6',
		'icon' => 'icon-wpb-ui-tab-content-vertical',
		'category' => 'Creativo',
		'wrapper_class' => 'vc_clearfix',
		'description' => __( 'Vertical tabbed content', 'js_composer' ),
		'params' => array(
					array(
					  "type" => "dropdown",
					  "heading" => __("Color", "Creativo"),
					  "param_name" => "color",
					  "value" => $button_colors,
					  "description" => __("Tabs color.", "Creativo")
					),

					array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'js_composer' ),
						'param_name' => 'el_class',
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
					),
				),				
				'custom_markup' => '
					<div class="wpb_tabs_holder wpb_holder vc_clearfix vc_container_for_children">
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