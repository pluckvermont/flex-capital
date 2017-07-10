<?php

if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* disable updater */
	vc_manager()->disableUpdater(true);

	$style_arr = $button_colors = $button_colors2 = $posts = $testimonials = $portfolio_posts = $portfolio_categories = $clients = $categories = array();

	$style_arr = array( __("Style1", "Creativo") => "style1", __("Style2", "Creativo") => "style2");

	$button_colors = array(__("Default", "Creativo") => "default",__("Green", "Creativo") => "green", __("Blue", "Creativo") => "blue", __("Red", "Creativo") => "red", __("Yellow", "Creativo") => "yellow", __("Purple", "Creativo") => "purple", __("Grey", "Creativo") => "grey", __("Black", "Creativo") => "black");

	$button_colors2 = array(__("Default", "Creativo") => "default",__("Green", "Creativo") => "green", __("Blue", "Creativo") => "blue", __("Red", "Creativo") => "red", __("Yellow", "Creativo") => "yellow", __("Purple", "Creativo") => "purple", __("Grey", "Creativo") => "grey", __("Black", "Creativo") => "black", __("Custom") => "custom");

	$size_arr2 = array( __('Small', 'Creativo') => 'small', __('Large', 'Creativo') => 'large');

	$alignment = array(__('Center', "Creativo") => 'center', __('Left', 'Creativo') => 'left', __('Right', 'Creativo') => 'right' );

	$target_arr = array(
		__( 'Same window', 'js_composer' ) => '_self',
		__( 'New window', 'js_composer' ) => '_blank',
	);
	
	/* Custom Queries to populate Specific Categs and Posts Type */
	$posts_entries = get_posts('post_type=post&orderby=title&numberposts=30&order=ASC&suppress_filters=0');
	    foreach ($posts_entries as $key => $entry) {
	        $posts[$entry->ID] = $entry->post_title;
	    }

	$cats_entries = get_categories('orderby=name&hide_empty=0');
	foreach ($cats_entries as $key => $entry) {
		$categories[$entry->term_id] = $entry->name;
	}

	global $wpdb;
	  $tax = $wpdb->get_results( 
	  	"
	  	SELECT $wpdb->terms.term_id, $wpdb->terms.name, $wpdb->term_taxonomy.taxonomy 
	  	FROM $wpdb->terms, $wpdb->term_taxonomy
	  	WHERE $wpdb->term_taxonomy.taxonomy = 'portfolio_category' && $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id 
	  	"
	  );
	  
	  $taxon = array();
	  if ($tax) {
	    foreach ( $tax as $taxonomy ) {
	      $taxon[$taxonomy->term_id] = $taxonomy->name;
	    }
	  } else {
	    $taxon["No portfolio category found"] = 0;
	  }
	

	$portfolio_categories_entries = get_terms('creativo_portfolio', 'orderby=name&hide_empty=0');
	foreach ($portfolio_categories_entries as $key => $entry) {
		$portfolio_categories[$entry->term_id] = $entry->name;
	}

	$portfolio_entries = get_posts('post_type=creativo_portfolio&orderby=title&numberposts=30&order=ASC&suppress_filters=0');
	foreach ($portfolio_entries as $key => $entry) {
		$portfolio_posts[$entry->ID] = $entry->post_title;
	}

	$clients_entries = get_posts('post_type=clients&orderby=title&numberposts=30&order=ASC&suppress_filters=0');
	if ($clients_entries != null && !empty($clients_entries)) {
	    foreach ($clients_entries as $key => $entry) {
	        $clients[$entry->ID] = $entry->post_title;
	    }
	}
	$testimonials_entries = get_posts('post_type=testimonials&orderby=title&numberposts=30&order=ASC&suppress_filters=0');
	if ($testimonials_entries != null && !empty($testimonials_entries)) {
	    foreach ($testimonials_entries as $key => $entry) {
	        $testimonials[$entry->ID] = $entry->post_title;
	    }
	}
	/* ==================================================================== */

	$settings_row = array ( 'weight' => 50 );
	$settings_text = array ( 'weight' => 49 );
	$settings_icon = array ( 'weight' => 48 );
	$settings_custom_head = array ( 'weight' => 47 );
	$settings_acc = array ( 'weight' => 8, 'name' => 'Accordion - Creativo', 'category' => 'Creativo' );

	vc_map_update( 'vc_row', $settings_row );
	vc_map_update( 'vc_column_text', $settings_text );
	vc_map_update( 'vc_icon', $settings_icon );
	vc_map_update( 'vc_custom_heading', $settings_custom_head );
	vc_map_update( 'vc_accordion', $settings_acc );


	function getCSSAnimation( $css_animation ) {
		$output = '';
		if ( $css_animation != '' ) {
			wp_enqueue_script( 'waypoints' );
				$output = ' wpb_animate_when_almost_visible wpb_' . $css_animation . ' ' . $css_animation;
			}

		return $output;
	}

/* ==================================================== 
   ==================== END =========================== */

			
    class WPBakeryShortCode_VC_product_feature extends WPBakeryShortCode {
		public function singleParamHtmlHolder($param, $value) {
			$param_name = isset( $param['param_name'] ) ? $param['param_name'] : '';
			$type = isset( $param['type'] ) ? $param['type'] : '';
			$class = isset( $param['class'] ) ? $param['class'] : '';
	
			if ( isset( $param['holder'] ) == false || $param['holder'] == 'hidden' ) {
				$output .= '<input type="hidden" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="' . $value . '" />';
				if ( ( $param['type'] ) == 'attach_image' ) {
					$element_icon = $this->settings('icon');
					$img = wpb_getImageBySize( array( 'attach_id' => (int)preg_replace( '/[^\d]/', '', $value ), 'thumb_size' => 'thumbnail' ) );
					$this->setSettings('logo', ( $img ? $img['thumbnail'] : '<img width="150" height="150" src="' . vc_asset_url( 'vc/blank.gif' ) . '" class="attachment-thumbnail small"  data-name="' . $param_name . '" alt="" title="" style="display: none;" />' ) );
					$output .= $this->settings('logo');
					
				}
			}
			else {
				$output .= '<' . $param['holder'] . ' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">' . $value . '</' . $param['holder'] . '>';
			}
			return $output;
		}
    }
	
	class WPBakeryShortCode_vc_service_box extends WPBakeryShortCode {
		public function singleParamHtmlHolder($param, $value) {
			$param_name = isset( $param['param_name'] ) ? $param['param_name'] : '';
			$type = isset( $param['type'] ) ? $param['type'] : '';
			$class = isset( $param['class'] ) ? $param['class'] : '';
	
			if ( isset( $param['holder'] ) == false || $param['holder'] == 'hidden' ) {
				$output .= '<input type="hidden" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="' . $value . '" />';
				if ( ( $param['type'] ) == 'attach_image' ) {
					$element_icon = $this->settings('icon');
					$img = wpb_getImageBySize( array( 'attach_id' => (int)preg_replace( '/[^\d]/', '', $value ), 'thumb_size' => 'thumbnail' ) );
					$this->setSettings('logo', ( $img ? $img['thumbnail'] : '<img width="150" height="150" src="' . vc_asset_url( 'vc/blank.gif' ) . '" class="attachment-thumbnail small"  data-name="' . $param_name . '" alt="" title="" style="display: none;" />' ) );
					$output .= $this->settings('logo');
					
				}
			}
			else {
				$output .= '<' . $param['holder'] . ' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">' . $value . '</' . $param['holder'] . '>';
			}
			return $output;
		}
    }
	
}
