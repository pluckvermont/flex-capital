<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = $title = $interval = $style = $el_class = '';
extract( shortcode_atts( array(
	'color' => 'grey',
	'style' => 'style1',
	'custom_colored_border' => '#5bc98c',
	'tc_font_size' => '13px',
	'tc_line_heigt' => '22px',
    'el_class' => ''
), $atts ) );

$icon = $left_padding = '';

$current_link = $_SERVER["REQUEST_URI"];
	// add an unique class to each button
	if(strpos($current_link, 'vc_editable=true')) {
		$tabs_counter = rand();
	}
	else{
		if( ! isset($tabs_counter) ){
		  $tabs_counter = 1;
		}
		else{
		  $tabs_counter ++;
		}
	}

	$styles_render = '';
	
	if($color == 'custom') {
		$styles_render = '<style type="text/css" scoped="scoped">';
			$styles_render .= '.wpb_content_element.tabs_' . $tabs_counter . ' .wpb_tabs_nav li.ui-tabs-active a:after {';
				$styles_render .= 'background-color:'.$custom_colored_border.';';				
			$styles_render .= '}';	
			$styles_render .= '.wpb_content_element.tabs_' . $tabs_counter . ' .wpb_tour_tabs_wrapper .wpb_tab {';
				$styles_render .= 'font-size:'.$tc_font_size.'; line-height:'.$tc_line_heigt.';';				
			$styles_render .= '}';							
		$styles_render .= '</style>';
	}

wp_enqueue_script( 'jquery-ui-tabs' );

$el_class = $this->getExtraClass( $el_class );

$element = 'wpb_tabs';
if ( 'vc_tour' === $this->shortcode ) {
	$element = 'wpb_tour';
}

$style = ($style != 'style1') ? 'tabs_'.$style : '';

// Extract tab titles
preg_match_all( '/vc_tab([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
$tab_titles = array();
/**
 * vc_tabs
 *
 */
if ( isset( $matches[1] ) ) {
	$tab_titles = $matches[1];
}
$tabs_nav = '';
$tabs_nav .= '<ul class="wpb_tabs_nav ui-tabs-nav vc_clearfix">';
foreach ( $tab_titles as $tab ) {
	$tab_atts = shortcode_parse_atts( $tab[0] );
	if ( isset( $tab_atts['title'] ) ) {
		/*if(isset($tab_atts['enable_icon']) && $tab_atts['enable_icon'] == 'yes') {
			$icon = '<div class="tabs_icon"><i class="'.$tab_atts['icon_fontawesome'].'"></i></div>';
			$left_padding = 'left_padding';
		}*/
		$tabs_nav .= '<li class="'.$color.'"><a href="#tab-' . ( isset( $tab_atts['tab_id'] ) ? $tab_atts['tab_id'] : sanitize_title( $tab_atts['title'] ) ) . '" data-icon="'.$tab_atts['title'].'">' . $tab_atts['title'] . '</a></li>';
	}
	$icon = $left_padding = '';
}
$tabs_nav .= '</ul>' . "\n";

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, trim( $element . ' wpb_content_element ' . $el_class ), $this->settings['base'], $atts );

$output .= $styles_render;
$output .= "\n\t" . '<div class="' . $css_class . ' ' . $color . ' tabs_'.$tabs_counter.'" data-interval="">';
$output .= "\n\t\t" . '<div class="wpb_wrapper wpb_tour_tabs_wrapper ui-tabs '.$style.' vc_clearfix">';
$output .= wpb_widget_title( array( 'title' => $title, 'extraclass' => $element . '_heading' ) );
$output .= "\n\t\t\t" . $tabs_nav;
$output .= "\n\t\t\t" . wpb_js_remove_wpautop( $content );

$output .= "\n\t\t" . '</div> ' . $this->endBlockComment( '.wpb_wrapper' );
$output .= "\n\t" . '</div> ' . $this->endBlockComment( $this->getShortcode() );



echo $output;