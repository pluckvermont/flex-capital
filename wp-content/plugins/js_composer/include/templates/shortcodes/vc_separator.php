<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * @var string $el_width;
 * @var string $style;
 * @var string $color;
 * @var string $border_width;
 * @var string $accent_color;
 * @var string $el_class;
 * @var string $align;
 */
extract( shortcode_atts( array(
	//'el_width' => '',
	'style' => 'dotted',
	'color' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	//'border_width' => '',
	//'accent_color' => '',
	'el_class' => ''
	//'align' => '',
), $atts ) );

$class = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts );
$color = $color != '' ? 'style="border-color:'. $color .';"' : '';

$output .= '<div class="' . $css_class . '" style="padding-top:'.$padding_top.'px; padding-bottom:'.$padding_bottom.'px;"><div class="divider_' . $style . ' " '.$color.'></div></div>' . $this->endBlockComment('separator')."\n";

echo $output;