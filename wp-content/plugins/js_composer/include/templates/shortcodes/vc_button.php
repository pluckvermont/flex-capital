<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $color
 * @var $inline_button 
 * @var $custom_color
 * $var custom_border_color
 * $var custom_text_color 
 * @var $custom_color_hover
 * @var $custom_text_color_hover 
 * @var $custom_border_color_hover
 * @var $size
 * @var $icon
 * @var $target
 * @var $href
 * @var $el_class
 * @var $title
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Button
 */
$output = $icon_render = $iconClass = $i_align = $icon = $position = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

global $button_counter;

$current_link = $_SERVER["REQUEST_URI"];
//echo $current_link;
// add an unique class to each button
if(strpos($current_link, 'vc_editable=true')) {
	$button_counter = rand();
}
else{
	if( ! isset($button_counter) ){
	  $button_counter = 1;
	}
	else{
	  $button_counter ++;
	}
}

$a_class = '';

if ( '' !== $el_class ) {
	$tmp_class = explode( ' ', strtolower( $el_class ) );
	$tmp_class = str_replace( '.', '', $tmp_class );
	if ( in_array( 'prettyphoto', $tmp_class ) ) {
		wp_enqueue_script( 'prettyphoto' );
		wp_enqueue_style( 'prettyphoto' );
		$a_class .= ' prettyphoto';
		$el_class = str_ireplace( 'prettyphoto', '', $el_class );
	}
	if ( in_array( 'pull-right', $tmp_class ) && '' !== $href ) {
		$a_class .= ' pull-right';
		$el_class = str_ireplace( 'pull-right', '', $el_class );
	}
	if ( in_array( 'pull-left', $tmp_class ) && '' !== $href ) {
		$a_class .= ' pull-left';
		$el_class = str_ireplace( 'pull-left', '', $el_class );
	}
}

$delay = (!empty($delay)) ? 'data-delay="'.$delay.'"' : '';

$css_animation = getCSSAnimation($css_animation);

$inline_button = (!empty ($inline_button) && ($inline_button == 'yes') ) ? ' inline_button' : '';

if ( 'same' === $target || '_self' === $target ) {
	$target = '';
}
$target = ( '' !== $target ) ? ' target="' . esc_attr( $target ) . '"' : '';

$style = ($style == '3d') ? ' style_3d' : '' ;

$shape = ($shape == 'round' || $shape == 'rounded') ? ' shape_'.$shape : '' ;

$full_width = ($full_width === 'true') ? ' full_width' : '';

if ($add_icon === 'true') {
	
	vc_icon_element_fonts_enqueue( $icon_type );
	
	$iconClass = isset( ${"icon_" . $icon_type} ) ? ${"icon_" . $icon_type} : 'fa fa-info-circle';
	
	$icon_render = '<i class="'.$iconClass . '"></i>';
	
}
else {
	$i_align = '';
}

if($color == 'custom') {
	$styles_render = '<style type="text/css" scoped="scoped">';
	
		$styles_render .= '.button_scope_' . $button_counter . ',.button_scope_' . $button_counter . '.style_3d:hover{';
			$styles_render .= 'background-color:'.$custom_color.';';
			$styles_render .= 'color:'.$custom_text_color.';';
			$styles_render .= 'border-color:'.$custom_border_color.';';
		$styles_render .= '}';
			
		$styles_render .= '.button_scope_' . $button_counter . ':hover{';
			$styles_render .= 'background-color:'.$custom_color_hover.';';
			$styles_render .= 'color:'.$custom_text_color_hover.';';
			$styles_render .= 'border-color:'.$custom_border_color_hover.';';
		$styles_render .= '}';
		
		$styles_render .= '.button_scope_' . $button_counter . '.style_3d {';
			$styles_render .= 'box-shadow: 0 5px 0' . hexDarker( $custom_color, 20 ).';';
			$styles_render .= '-webkit-box-shadow: 0 5px 0' . hexDarker( $custom_color, 20 ).';';
		$styles_render .= '}';
		
	$styles_render .= '</style>';
}
$color = ( $color != '' ) ? $color = 'button_'.$color : '';

$align = ($align != '') ? 'button_'.$align : '';

$el_class = $this->getExtraClass( $el_class );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_button ' . $color . $size . $icon . $el_class . $position, $this->settings['base'], $atts );

$output = '<div class="'. $align . $inline_button . ' ' . $css_animation . ' ' . $el_class . '" '.$delay.'>' . $styles_render . '<a class="button ' . $size . ' ' .  $color . ' button_scope_' . $button_counter . $style . $shape . $full_width . '" href="'.$href.'" target="' . $target . '"><div class="button_content ' . $i_align . '">' . $icon_render . $title. '</div></a></div>';

echo $output . $this->endBlockComment( $this->getShortcode() ) . "\n";