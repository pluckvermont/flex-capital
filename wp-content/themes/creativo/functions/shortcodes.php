<?php
//////////////////////////////////////////////////////////////////
// Youtube shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('youtube', 'shortcode_youtube');
	function shortcode_youtube($atts) {
		$atts = shortcode_atts(
			array(
				'id' => '',
				'width' => 600,
				'height' => 360
			), $atts);
		
			return '<iframe title="YouTube video player" width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.youtube.com/embed/' . $atts['id'] . '" frameborder="0" allowfullscreen></iframe>';
	}
	
//////////////////////////////////////////////////////////////////
// Vimeo shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('vimeo', 'shortcode_vimeo');
	function shortcode_vimeo($atts) {
		$atts = shortcode_atts(
			array(
				'id' => '',
				'width' => 600,
				'height' => 360
			), $atts);
		
			return '<iframe src="http://player.vimeo.com/video/' . $atts['id'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" frameborder="0"></iframe>';
	}
	
//////////////////////////////////////////////////////////////////
// SoundCloud shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('soundcloud', 'shortcode_soundcloud');
	function shortcode_soundcloud($atts) {
		$params = $atts['params'];
		$atts = shortcode_atts(
			array(
				'url' => '',
				'width' => '100%',
				'height' => 166,
				'comments' => 'true',
				'params' => 'auto_play=false&show_artwork=false&color=8bc84f'
			), $atts);
			return 
			
				'<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" scrolling="no" frameborder="no" src="http://w.soundcloud.com/player/?url='.urlencode($atts['url']). '&amp;'.$atts['params'].'"></iframe>';


				
	}
	
//////////////////////////////////////////////////////////////////
// Button shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('button', 'shortcode_button');
	function shortcode_button($atts, $content = null) {	
		if( $atts['style']){ $style='button_'. $atts['style']; } else{ $style='button_default'; }		
			return '<a class="button ' . $atts['size'] . ' ' .  $style . '" href="'.$atts['link'].'" target="' . $atts['target'] . '" style="float:'.$atts['float'].'; margin:'.$atts['margin'].'px;">' .do_shortcode($content). '</a>';
	}
	
	
//////////////////////////////////////////////////////////////////
// Divider shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('divider', 'shortcode_divider');
	function shortcode_divider($atts) {
		extract(shortcode_atts(array(			
			'padding_top' => '0',
			'padding_bottom' => '0',
			'style' => 'solid',
			'el_class' => ''
		), $atts));	
		
			$el_class = ($el_class !== '') ? 'class="'.$el_class.'"' : 'class="nu are clasa"';
		
			return '<div '.$el_class.' style="padding-top:'.$padding_top.'px; padding-bottom:'.$padding_bottom.'px;"><div class="divider_'.$style.'"></div></div>';
	}	
	
//////////////////////////////////////////////////////////////////
// Dropcap shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('dropcap', 'shortcode_dropcap');
	function shortcode_dropcap( $atts, $content = null ) {  
		$color = $atts['color'];
		if(!$color){ $color = 'default'; }
		$bg = $atts['background'];
		if($atts['size']=='small'){
			$class='dropcap_sm';
		}
		else{
			$class='dropcap';
		}
		switch ($bg){
			case 'green':
				$bg = 'background-color:#A5CB5E;';
			break;
			case 'yellow':
				$bg = 'background-color:#FEBF4D;';
			break;
			case 'black':
				$bg = 'background-color:#454545;';
			break;
			case 'grey':
				$bg = 'background-color:#E1E1E1;';
			break;
			case 'red':
				$bg = 'background-color:#F6677B;';
			break;
			case 'blue':
				$bg = 'background-color:#73D0F1;';
			break;
			case 'purple':
				$bg = 'background-color:#D798D1;';
			break;
			case 'white':
				$bg = 'background-color:#fff;';
			break;
		}
		$style = $atts['style'];		
		return '<span class="'.$class.' '.$atts['style'].' '.$color.'_dc" style="'.$bg.'">' .do_shortcode($content). '</span>';  	
}

//////////////////////////////////////////////////////////////////
// Quotebox shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('qbox', 'shortcode_qbox');
function shortcode_qbox( $atts, $content = null ) {
	extract(shortcode_atts(array(			
			'icon' => '',
			'title1' => '',
			'title2' => '',					
			'el_class' => ''
	), $atts));

	$output = '';  
	
	if($icon){		
		$img = wp_get_attachment_image_src($icon);		
		$icon = '<div class="qbox_icon"><img src="'.$img[0].'"></div>';
	}
		
		$output .= '<div class="outer_qbox '.$el_class.'"><div class="qbox">';
		if($title1){
			$output .= '<div class="qbox_title1">'.$title1.'</div>';
		}
		
		$output .= '<div class="qbox_title2">';
		if($title2){
			$output .= '<h2>'.$title2.'</h2>'; 
		}
		$output .= $icon .do_shortcode($content);
		$output .= '</div><div class="clear"></div></div></div>';  
	return $output;	
}

//////////////////////////////////////////////////////////////////
// Highlight shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('highlight', 'shortcode_highlight');
	function shortcode_highlight($atts, $content = null) {
		if($atts['style']){
			$style = $atts['style'];
		}
		else{
			$style='default';
		}
		return '<span class="high_'.$style.'">' .do_shortcode($content). '</span>';				
	}
	
//////////////////////////////////////////////////////////////////
// Check list shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('checklist', 'shortcode_checklist');
function shortcode_checklist( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'style' => '',
		'fontawesome_icon' => '',
		'icon_color' => '',
		'text_color' => ''
	), $atts));

	$icon_color = ( $icon_color != '' ) ? 'style="color:'.$icon_color.';"' : '';
	$text_color = ( $text_color != '' ) ? 'style="color:'.$text_color.';"' : '';

	if($fontawesome_icon != '') {
		$content = str_replace('<ul>', '<ul class="fontawesome_list" '.$text_color.'>', do_shortcode($content));
		$content = str_replace('<li>', '<li><i class="'.$fontawesome_icon.'" '.$icon_color.'></i>', do_shortcode($content));
	}
	else {
		$content = str_replace('<ul>', '<ul class="cool_list">', do_shortcode($content));
		$content = str_replace('<li>', '<li class="'.$style.'_style">', do_shortcode($content));
	}
	
	return $content;
	
}

//////////////////////////////////////////////////////////////////
// Tabs shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('tabs', 'shortcode_tabs');
	function shortcode_tabs( $atts, $content = null ) {
		extract(shortcode_atts(array(
		), $atts));
	
			$out .= '<div class="tab-holder shortcode-tabs">';		
			$out .= '<div class="tab-hold tabs-wrapper">';
			$out .= '<ul id="tabs" class="tabs">';
			$color = $atts['color'];
			if( !$color || ($color != 'green' && $color != 'yellow' && $color != 'blue' && $color != 'red' && $color != 'purple' && $color != 'grey' && $color != 'black')){ 
				$button = 'default'; 
				$border='border_default'; 
			}
			else{
				$button = 'button_'.$color;
				switch ($color){
					case 'yellow':
						$border = 'border_yellow';
					break;
					case 'blue':
						$border = 'border_blue';
					break;
					case 'red':
						$border = 'border_red';
					break;
					case 'purple':
						$border = 'border_purple';
					break;
					case 'green':
						$border = 'border_green';
					break;
					case 'black':
						$border = 'border_black';
					break;
					default:
						$border = 'border_grey';					
				}
			}
			foreach ($atts as $key => $tab) {
				if($key != 'color' && $key != 'hint'){
					$out .= '<li class="'.$border.'"><a href="#' . $key . '" class="'.$button.'">' . $tab . '</a></li>';		
				}
			}
	$out .= '</ul>';	
	$out .= '<div class="tab-containe '.$border.'">';
	$out .= do_shortcode($content) .'</div></div></div>';	
	return $out;
}

add_shortcode('tab', 'shortcode_tab');
	function shortcode_tab( $atts, $content = null ) {
	extract(shortcode_atts(array(
    ), $atts));
	
	$out .= '<div id="tab' . $atts['id'] . '" class="tab tab_content">' . do_shortcode($content) .'</div>';
	
	return $out;
}
	
//////////////////////////////////////////////////////////////////
// Toggle shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('toggle', 'shortcode_toggle');
	function shortcode_toggle( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'title' => '',
        'open' => 'no'
    ), $atts));
	
	$style = $atts['style'];
	if(!$style){ $style = 'default'; }

	if($open == 'yes'){
		$toggleclass = "active";
		$toggleclass2 = "default-open";
		$togglestyle = "display: block;";
	}

	$out .= '<div class="outer_toggle"><h5 class="toggle '.$toggleclass.'"><a href="#" class="'.$style.'_color"><span class="'.$style.'_style"></span>' .$title. '</a></h5>';
	$out .= '<div class="toggle-content '.$toggleclass2.'" style="'.$togglestyle.'">';
	$out .= do_shortcode($content);
	$out .= '</div></div>';
	
   return $out;
}

//////////////////////////////////////////////////////////////////
// Column wrapper shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('outter_wrapper', 'shortcode_outer_wrapper');
	function shortcode_outer_wrapper($atts, $content = null) {
		if($atts['background'] == 'white') { $class='white'; } else $class='grey';
		if($atts['title']) { $title = '<div class="content_box_title"><span class="'.$class.'">'.$atts['title'].'</span></div>'; }
		if(!$atts['title']){ $margin = 'style="margin-top:0px;"'; }
		return '<div class="outer_wrap ' . $atts['background'].'" '.$margin.'><div class="inner_wrap">'.$title .do_shortcode($content). '</div></div>';
	}	
	
//////////////////////////////////////////////////////////////////
// Column one_half shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('one_half', 'shortcode_one_half');
	function shortcode_one_half($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="s1_2 final">' .do_shortcode($content). '</div><div class="clearall"></div>';
			} else {
				return '<div class="s1_2">' .do_shortcode($content). '</div>';
			}

	}
	
//////////////////////////////////////////////////////////////////
// Column one_third shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('one_third', 'shortcode_one_third');
	function shortcode_one_third($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="s1_3 final">' .do_shortcode($content). '</div><div class="clearall"></div>';
			} else {
				return '<div class="s1_3">' .do_shortcode($content). '</div>';
			}

	}
	
//////////////////////////////////////////////////////////////////
// Column two_third shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('two_third', 'shortcode_two_third');
	function shortcode_two_third($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="s2_3 final">' .do_shortcode($content). '</div><div class="clearall"></div>';
			} else {
				return '<div class="s2_3">' .do_shortcode($content). '</div>';
			}

	}
	
//////////////////////////////////////////////////////////////////
// Column one_fourth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('one_fourth', 'shortcode_one_fourth');
	function shortcode_one_fourth($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="s1_4 final">' .do_shortcode($content). '</div><div class="clearall"></div>';
			} else {
				return '<div class="s1_4">' .do_shortcode($content). '</div>';
			}

	}
	
//////////////////////////////////////////////////////////////////
// Column three_fourth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('three_fourth', 'shortcode_three_fourth');
	function shortcode_three_fourth($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="s3_4 final">' .do_shortcode($content). '</div><div class="clearall"></div>';
			} else {
				return '<div class="s3_4">' .do_shortcode($content). '</div>';
			}

	}
	
//////////////////////////////////////////////////////////////////
// Column one_fifth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('one_fifth', 'shortcode_one_fifth');
	function shortcode_one_fifth($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="s1_5 final">' .do_shortcode($content). '</div><div class="clearall"></div>';
			} else {
				return '<div class="s1_5">' .do_shortcode($content). '</div>';
			}

	}
//////////////////////////////////////////////////////////////////
// Column two_fifth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('two_fifth', 'shortcode_two_fifth');
	function shortcode_two_fifth($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="s2_5 final">' .do_shortcode($content). '</div><div class="clearall"></div>';
			} else {
				return '<div class="s2_5">' .do_shortcode($content). '</div>';
			}

	}
//////////////////////////////////////////////////////////////////
// Column three_fifth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('three_fifth', 'shortcode_three_fifth');
	function shortcode_three_fifth($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="s3_5 final">' .do_shortcode($content). '</div><div class="clearall"></div>';
			} else {
				return '<div class="s3_5">' .do_shortcode($content). '</div>';
			}

	}

//////////////////////////////////////////////////////////////////
// Column four_fifth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('four_fifth', 'shortcode_four_fifth');
	function shortcode_four_fifth($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="s4_5 final">' .do_shortcode($content). '</div><div class="clearall"></div>';
			} else {
				return '<div class="s4_5">' .do_shortcode($content). '</div>';
			}

	}


//////////////////////////////////////////////////////////////////
// Tagline box shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('tagline_box', 'shortcode_tagline_box');
	function shortcode_tagline_box($atts, $content = null) {
		extract(shortcode_atts(array(
		'color' => 'default',
		'size' => 'small',
		'target' => '',
		'href' => '',
		'title' => 'Text on the button',
		'call_text' => 'Heading Text Here',
		'call_text_small' => 'Subheading text here',
		'action_box_style' => 'style1',
		'margin' => '0',
		'el_class' => ''
	), $atts));
		
		//$style = $atts['style'];
		//if( $atts['style']){ $style='button_'. $atts['style']; } else{ $style='default'; }
		$str = '';		
		if($margin != '0'): $margin = 'style="margin-bottom:'.$margin.'px";';
		else : $margin='';
		endif;
		if($action_box_style == 'style1') {
			$str .= '<section class="reading-box '.$color.'_border '.$el_class.'" '.$margin.'>';
				$str.= '<div class="cta_inside">';
			
					if($href):
					$str .= '<a href="'.$href.'" class="continue button button_'.$color.' ' . $size . '" target="'.$target.'">'.$title.'</a>';
					endif;
					
					if($call_text):
					$str .= '<h2>'.$call_text.'</h2>';
					endif;
					
					if($call_text_small):
					$str.= '<p>'.$call_text_small.'</p>';
					endif;
						
				$str .= '</div>';
			$str .= '</section>';
		}
		else{
			$str .= '<section class="reading-box '.$color.'_border centered '.$el_class.'" '.$margin.'>';
				$str.= '<div class="cta_inside">';	
					if($call_text):
					$str .= '<h2>'.$call_text.'</h2>';
					endif;
					
					if($call_text_small):
					$str.= '<p>'.$call_text_small.'</p>';
					endif;
					
					if($href):
					$str .= '<a href="'.$href.'" class="button button_'.$color.' ' . $size . '" target="'.$target.'">'.$title.'</a>';
					endif;
				$str .= '</div>';
			$str .= '</section>';
		}

		return $str;
	}


//////////////////////////////////////////////////////////////////
// Content box shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('content_boxes', 'shortcode_content_boxes');
	function shortcode_content_boxes($atts, $content = null) {
		$str = '';
		//$str .= '<div class="outer_wrap"><div class="front_page_in"><div class="content_box_title"><span class="grey">WE SELL QUALITY</span></div>';
		$str .= do_shortcode($content);
		$str .= '<div class="clr"></div>';
		
		$i=1;

		return $str;
	}


//////////////////////////////////////////////////////////////////
// 4 Boxes as Content box shortcode 
//////////////////////////////////////////////////////////////////

add_shortcode('content_box', 'shortcode_content_box');
	function shortcode_content_box($atts, $content = null) {
		
		$str = '';
		$str .= '<div class="front_widget '.$atts['id'].'">';
		if($atts['image'] || $atts['title']):
		//$str .=	'<div style="">';
		if($atts['image']):
		$str .= $i.'<div class="shortcode_img"><img src="'.$atts['image'].'" alt=""></div>';
		endif;
		if($atts['title']):
			if($atts['link']){
				$str .= '<h3 class="widget-title"><a href="'.$atts['link'].'">'.$atts['title'].'</a></h3>';
			}
			else { $str .='<h3 class="widget-title">'.$atts['title'].'</h3>';}
		endif;
		//$str .= '</div>';
		endif;

		$str .= '<div class="content_box_text">'.do_shortcode($content).'</div>';	
		
		$str .= '</div>';
		if($atts['id'] == 'second'): $str.='<div class="div_bar"></div>';
		endif;

		return $str;
	}

//////////////////////////////////////////////////////////////////
// Featured Services shortcode 
//////////////////////////////////////////////////////////////////
	
add_shortcode('vc_service_box', 'shortcode_service_box');
	$title = $href = $target = $white_circle = $icon_type_select = $icon = $view_more = $circle = $el_class = $styles_render = '';
	function shortcode_service_box($atts, $content = null) {
		extract(shortcode_atts(array(			
			'title' => 'Design',
			'href' => '',
			'target' => '',	
			'url_area' => 'title',
			'white_circle' => 'yes',
			'icon_type_select' => 'image_icon',	
			'icon' => '',
			'icon_type' => 'fontawesome',
			'icon_fontawesome' => 'fa fa-info-circle',
			'icon_openiconic' => '',
			'icon_typicons' => '',
			'icon_entypoicons' => '',
			'icon_linecons' => '',
			'icon_entypo' => '',
			'icon_size' => '40px',			
			'icon_color' => '#666666',		
			'view_more' =>'false',
			'style' => 'default',
			'fs_icon_color_hover' => '#ffffff',
			'fs_title_color' => '#777777',
			'fs_link_color' => '#5bc98c',
			'fs_bg_color' => '#ffffff',
			'fs_desc_color' => '#777777',
			'fs_title_color_hover' => '#ffffff',
			'fs_link_color_hover' => '#ffffff',
			'fs_bg_color_hover' => '#5bc98c',
			'fs_desc_color_hover' => '#ffffff',	
			'fs_border' => '',
			'fs_border_width' => '1px',
			'fs_border_color' => '#EEEEEE',
			'fs_border_color_hover' => '#ffffff',
			'fs_border_radius' => '',
			'css_animation' => '',
			'delay' => '',
			'el_class' => ''
		), $atts));
		
		global $fs_counter;
		$current_link = $_SERVER["REQUEST_URI"];
		
		// add an unique class to each button
		if(strpos($current_link, 'vc_editable=true')) {
			$fs_counter = rand();
		}
		else{
			if( ! isset($fs_counter) ){
			  $fs_counter = 1;
			}
			else{
			  $fs_counter ++;
			}
		}
		
		if($style == 'custom') {
			$styles_render = '<style type="text/css" scoped="scoped">';
			
				$styles_render .= '.vc_front_widget.fs_scope_' . $fs_counter . '{';
					$styles_render .= 'background-color: ' . $fs_bg_color . ';';
					$styles_render .= 'color: ' . $fs_desc_color . ';';
					$styles_render .= 'transition: all .2s linear; -webkit-transition: all .2s linear;';
					if($fs_border == 'yes') {					
						$styles_render .= 'border: ' . $fs_border_width . ' solid '.$fs_border_color.';';	
					}
					if($fs_border_radius != '') {					
						$styles_render .= 'border-radius: ' . $fs_border_radius . '; -webkit-border-radius: ' . $fs_border_radius . ';';	
					}
				$styles_render .= '}';	
				
				$styles_render .= '.vc_front_widget.fs_scope_' . $fs_counter . ':hover{';
					$styles_render .= 'background-color: ' . $fs_bg_color_hover . ';';
					$styles_render .= 'color: ' . $fs_desc_color_hover . ';';
					if($fs_border == 'yes') {					
						$styles_render .= 'border-color:'.$fs_border_color_hover.';';	
					}
				$styles_render .= '}';
				
				$styles_render .= '.vc_front_widget.fs_scope_' . $fs_counter . ' .font_icons {';	
					$styles_render .= 'color: ' . $icon_color . ';';
					$styles_render .= 'transition: all .2s linear; -webkit-transition: all .2s linear;';	
				$styles_render .= '}';				
				$styles_render .= '.vc_front_widget.fs_scope_' . $fs_counter . ':hover .font_icons {';	
					$styles_render .= 'color: ' . $fs_icon_color_hover . ';';	
				$styles_render .= '}';
				
				$styles_render .= '.vc_front_widget.fs_scope_' . $fs_counter . ' a {';	
					$styles_render .= 'color: ' . $fs_link_color . ';';
					$styles_render .= 'transition: all .2s linear; -webkit-transition: all .2s linear;';	
				$styles_render .= '}';	
				$styles_render .= '.vc_front_widget.fs_scope_' . $fs_counter . ':hover a {';	
					$styles_render .= 'color: ' . $fs_link_color_hover . ';';	
				$styles_render .= '}';
				
				$styles_render .= '.vc_front_widget.fs_scope_' . $fs_counter . ' h3.widget-title, .vc_front_widget.fs_scope_' . $fs_counter . ' h3.widget-title a {';	
					$styles_render .= 'color: ' . $fs_title_color . ';';
					$styles_render .= 'transition: all .2s linear; -webkit-transition: all .2s linear;';	
				$styles_render .= '}';					
				$styles_render .= '.vc_front_widget.fs_scope_' . $fs_counter . ':hover h3.widget-title, .vc_front_widget.fs_scope_' . $fs_counter . ':hover h3.widget-title a {';	
					$styles_render .= 'color: ' . $fs_title_color_hover . ';';	
				$styles_render .= '}';
				
				$styles_render .= '.vc_front_widget.fs_scope_' . $fs_counter . ' .content_box_text {';	
					$styles_render .= 'color: ' . $fs_desc_color . ';';	
					$styles_render .= 'transition: all .2s linear; -webkit-transition: all .2s linear;';
				$styles_render .= '}';	
				$styles_render .= '.vc_front_widget.fs_scope_' . $fs_counter . ':hover .content_box_text {';	
					$styles_render .= 'color: ' . $fs_desc_color_hover . ';';	
				$styles_render .= '}';	

			$styles_render .= '</style>';
		}
		
		$str = '';
		
		$str .= $styles_render;
		
		$circle = ( $white_circle == 'no' ) ? 'no_white_circle' : 'white_circle';
		
		$delay = (!empty($delay)) ? 'data-delay="'.$delay.'"' : '';
	
		if(function_exists('getCSSAnimation') ){
			$css_animation = getCSSAnimation($css_animation);
		}

		$str .= '<div class="vc_front_widget fs_scope_'.$fs_counter.' '.$css_animation.' '.$el_class.'" '.$delay.'>';
		
		if($href && ( $url_area == 'entire_element' ) ){
			$str .= '<a href="'.$href.'" target="'.$target.'">';
		}

		if( $icon_type_select == 'image_icon' && $icon):

			$img = wp_get_attachment_image_src($atts['icon']);

			$str .= '<span class="shortcode_img '.$circle.'"><img src="'.$img[0].'" alt=""></span>';

		endif;

		if( $icon_type_select == 'font_icon' ) :

			if( function_exists('vc_icon_element_fonts_enqueue') ){
				vc_icon_element_fonts_enqueue( $icon_type );
			}
			
			$iconClass = isset( ${"icon_" . $icon_type} ) ? ${"icon_" . $icon_type} : 'fa fa-info-circle';
			
			if( $style == 'custom') {
				$str .= '<span class="shortcode_img '.$circle.' font_icons"><i class="'.$iconClass.'" style="font-size: ' . $icon_size . '"></i></span>';	 
			}
			
			else{			
				$str .= '<span class="shortcode_img '.$circle.' font_icons"><i class="'.$iconClass.'" style="color: ' . $icon_color . '; font-size: ' . $icon_size . '"></i></span>';				
			}

		endif;

		if($title):
			
			if($href && ( $url_area != 'entire_element' ) ){
				$str .= '<h3 class="widget-title"><a href="'.$href.'" target="'.$target.'">'.$title.'</a></h3>';
			}

			else { $str .='<h3 class="widget-title">'.$title.'</h3>';}

		endif;

		$str .= '<div class="content_box_text">'.do_shortcode($content).'</div>';

		if($view_more=='true' && ( $url_area != 'entire_element' ) ) {
			$str .= '<span class="view_more"><a href="'.$href.'">'. __( 'View More', 'Creativo' ) . ' &rarr;</a></span>';
		}
		
		
		if($href && ( $url_area == 'entire_element' ) ){
			$str .= '</a>';
		}
		
		$str .= '</div>';

		return $str;
	}	

//////////////////////////////////////////////////////////////////
// Product Feature 
//////////////////////////////////////////////////////////////////
	
add_shortcode('events_cal', 'shortcode_events_cal');
	function shortcode_events_cal($atts, $content = null) {
		extract(shortcode_atts(array(			
			'count' => '',
			'columns' => '4',
			'show_title' => 'yes',
			'show_image' => 'yes',
			'show_date' => 'yes',
			'show_excerpt' => 'yes',
			'text_align' => 'left',
			'el_class' => ''
		), $atts));

		$html = '';		

		$args = array(
			'post_type' => 'tribe_events',
			'posts_per_page' => $count,
			'orderby' => 'menu_order',
			'order' => 'DESC',
		);

		$text_align = ($text_align != 'left') ? 'event_align_'.$text_align : '';

		$events = new WP_Query( $args );

		if ( $events->have_posts() ) {

			$html .= '<div class="event_calendar_wrap clearfix">';
				
				$columns = (int) $columns;

				while ( $events->have_posts() ) {
						$events->the_post();

						$thumb_id = get_post_thumbnail_id();
						$thumb_link = wp_get_attachment_image_src( $thumb_id, 'full', true );						

						$html .= '<article class="col columns-'.$columns.'">';
							if($show_image=='yes'){
								$html .= '<figure>';
									$html .='<a href="' . get_the_permalink() . '" class="url" rel="bookmark">';
										$html .= '<div class="text-overlay">';
											$html .= '<div class="info"><i class="fa fa-search"></i></div>';
										$html .= '</div>';	
										$html .= '<img src="'.$thumb_link[0].'">';
									$html .='</a>';
								$html .= '</figure>';
							}
							$html .= '<div class="description '.$text_align.'">';
								if($show_title=='yes') {
									$html .= '<h2><a href="' . get_the_permalink() . '" class="url" rel="bookmark">' . get_the_title() . '</a></h2>';
								}
								if(function_exists('tribe_events_event_schedule_details')) {
									if($show_date=='yes') {
										$html .= '<h4>' . tribe_events_event_schedule_details() . '</h4>';
									}
									if($show_excerpt=='yes') {    
								        $html .= '<div class="event_excerpt">';
								           	$html .= string_limit_words(get_the_excerpt(), 15).'...';
								        $html .= '</div>';
								    }
							        /*
							        if(function_exists(tribe_get_cost)){

								        if ( tribe_get_cost() ) : 
								            $html .= '<div class="tribe-events-event-cost">';
								                $html .= '<span>' . tribe_get_cost( null, true ) . '</span>';
								            $html .= '</div>';
								        endif;

								    }
								    */
							       
								}	
							$html .= '</div>';
						$html .= '</article>';

				}

				wp_reset_query();	

			$html .= '</div>';			

		}

		return $html;
	}


//////////////////////////////////////////////////////////////////
// Product Feature 
//////////////////////////////////////////////////////////////////
	
add_shortcode('vc_product_feature', 'shortcode_product_feature');
	function shortcode_product_feature($atts, $content = null) {
		extract(shortcode_atts(array(			
			'title' => 'Design',
			'title_color' => '#666666',
			'font_size' => '14',
			'href' => '',
			'target' => '',					
			'icon' => '',
			'pf_pos' => '',
			'icon_type' => 'fontawesome',
			'icon_fontawesome' => 'fa fa-info-circle',
			'icon_openiconic' => '',
			'icon_typicons' => '',
			'icon_entypoicons' => '',
			'icon_linecons' => '',
			'icon_entypo' => '',
			'icon_size' => 'normal',
			'icon_bg_color' => '#666666',
			'icon_bg_shape' => '',
			'icon_color' => '#666666',
			'view_more' =>'false',	
			'animation' => '',	
			'css_animation' => '',
			'delay'	=>'',
			'el_class' => ''
		), $atts));
		
		// Enqueue needed icon font.
		if( function_exists('vc_icon_element_fonts_enqueue') ){
			vc_icon_element_fonts_enqueue( $icon_type );
		}
		
		$delay = (!empty($delay)) ? 'data-delay="'.$delay.'"' : '';
		if(function_exists('getCSSAnimation') ){
			$css_animation = getCSSAnimation($css_animation);
		}
		//$css_animation = ($css_animation != '') ? 'wpb_animate_when_almost_visible wpb_'.$css_animation : '';
		//$css_animation = '';
		
		$iconClass = isset( ${"icon_" . $icon_type} ) ? ${"icon_" . $icon_type} : 'fa fa-info-circle';
		
		$icon_size = ($icon_size) ? $icon_size : '';
		$icon_bg_shape = ($icon_bg_shape) ? $icon_bg_shape : '';
		$icon_bg_color = ($icon_bg_color && ( $icon_size == 'big' || $icon_size == 'bigger' )) ? 'style="background-color: '.$icon_bg_color. ';"' : '';
		
		//$animation = ($animation!='') ? 'wpb_animate_when_almost_visible wpb_appear' : '';
		
		//echo $iconClass;
		
		$pf_pos = ( $pf_pos ) ? 'to_'.$pf_pos : '';
		
		$str = $img = '';

		if($icon):
			$img = wp_get_attachment_image_src($icon);			
		endif;
		$str .= '<div class="product_feature ' . $css_animation . ' ' . $pf_pos . ' ' . $icon_size . ' ' . $el_class .'" '.$delay.'>';		
			$str .= '<div class="pf_icon '.$icon_bg_shape.'" '.$icon_bg_color.'>';
				if( $img ) {
					$str .= '<img src="'.$img[0].'" alt="">';
				}
				else{
					$str .= '<i class="'.$iconClass.'" style="color: '.$icon_color.';"></i>';
				}
			$str .= '</div>';
			$str .= '<div class="pf_content">';
				if($title):
					if($href){
						$str .= '<h4 style="color: '.$title_color.';  font-size: '.$font_size.'px;"><a href="'.$href.'" target="'.$target.'">'.$title.'</a></h4>';
					}
					else { $str .='<h4 style="color: '.$title_color.'; font-size: '.$font_size.'px;">'.$title.'</h4>';}
				endif;				
				$str .= '<div>' . do_shortcode($content) . '</div>';
				if($view_more == 'true') {
					$str .= '<a href="'.$href.'" class="more_info">'. __( 'More info', 'Creativo' ) .' <i class="fa fa-angle-right"></i></a>';
				}
			$str .= '</div>';
		$str .= '</div>';
		return $str;
	}
	
add_shortcode ('contact-form-7-mod', 'cf7_functionality');
function cf7_functionality( $atts, $content = null) {
	extract( shortcode_atts( array(
		'id' => '',
		'style' => 'default',
		'input_font_size' => '13px',
		'label_font_size' => '13px',
		'border_width' => '1px',
		'padding' => '10px',
		'textarea_height' => '',
		'label_color' => '#666666',
		'input_bg' => '#ffffff',
		'input_bg_focus' => '#ffffff',
		'input_border' => '#CCCCCC',
		'input_border_focus' => '#CCCCCC',
		'input_text' => '#b2b2b6',
		'input_text_focus' => '#555555',
		'btn_bg' => '#5bc98c',
		'btn_bg_hover' => '#479e85',
		'btn_border' => '#5bc98c',
		'btn_border_hover' => '#479e85',
		'btn_text' => '#FFFFFF',
		'btn_text_hover' => '#FFFFFF',
		'btn_full' => 'no',
		'btn_padding_top' => '10px',
		'btn_padding_side' => '12px',
		'btn_font_size' => '12px',
		'btn_font_weight' => '600',
		'contact_form_width' => '100%',
		'display_inline' => 'no',
		'el_borders' => '',		
	), $atts ) );
	
	global $cf_counter;
	
	$current_link = $_SERVER["REQUEST_URI"];
	// add an unique class to each button
	if(strpos($current_link, 'vc_editable=true')) {
		$cf_counter = rand();
	}
	else{
		if( ! isset($cf_counter) ){
		  $cf_counter = 1;
		}
		else{
		  $cf_counter ++;
		}
	}	
	
	if($style == 'custom') {
		$styles_render = '<style type="text/css" scoped="scoped">';
			$styles_render .= '.cf_scope_' . $cf_counter . ' input,
							   .cf_scope_' . $cf_counter . ' textarea {';
				$styles_render .= 'padding:'.$padding.';';	
				
				if($el_borders)	$el_borders_array = explode(",",$el_borders);	
							
				if( !empty ( $el_borders_array ) ) {
					if( in_array( 'right', $el_borders_array )) $styles_render .= 'border-right: none;';
					if( in_array( 'left', $el_borders_array )) $styles_render .= 'border-left: none;';
					if( in_array( 'top', $el_borders_array )) $styles_render .= 'border-top: none;';
					if( in_array( 'bottom', $el_borders_array )) $styles_render .= 'border-bottom: none;';
				}	
				
			$styles_render .= '}';
			$styles_render .= '.cf_scope_' . $cf_counter . ' .wpcf7 {';			
				$styles_render .= 'color:'.$label_color.';';
				$styles_render .= 'font-size:'.$label_font_size.';';
				$styles_render .= 'width:'.$contact_form_width.';';
				$styles_render .= 'margin:0 auto;';
			$styles_render .= '}';
			$styles_render .= '.cf_scope_' . $cf_counter . ' input, .cf_scope_' . $cf_counter . ' textarea {';
				$styles_render .= 'font-size:'.$input_font_size.';';
				$styles_render .= 'background-color:'.$input_bg.';';
				$styles_render .= 'border-width:'.$border_width.';';
				$styles_render .= 'border-color:'.$input_border.';';
				$styles_render .= 'color:'.$input_text.';';
			$styles_render .= '}';
			$styles_render .= '.cf_scope_' . $cf_counter . ' input:focus, .cf_scope_' . $cf_counter . ' textarea:focus {';
				$styles_render .= 'background-color:'.$input_bg_focus.';';
				$styles_render .= 'border-color:'.$input_border_focus.';';
				$styles_render .= 'color:'.$input_text_focus.';';
			$styles_render .= '}';
			$styles_render .= '.cf_scope_' . $cf_counter . ' textarea {';
				$styles_render .= 'height:'.$textarea_height.';';
			$styles_render .= '}';
			$styles_render .= '.cf_scope_' . $cf_counter . ' .wpcf7-submit, .cf_scope_' . $cf_counter . ' .wpcf7-submit:focus {';
				$styles_render .= 'border: 1px solid #ccc;';
				$styles_render .= 'background-color:'.$btn_bg.';';
				$styles_render .= 'border-color:'.$btn_border.';';
				$styles_render .= 'color:'.$btn_text.';';
				$styles_render .= 'font-size:'.$btn_font_size.';';
				$styles_render .= 'font-weight:'.$btn_font_weight.';';
				$styles_render .= 'padding-top:'.$btn_padding_top.';';
				$styles_render .= 'padding-bottom:'.$btn_padding_top.';';
				$styles_render .= 'padding-left:'.$btn_padding_side.';';
				$styles_render .= 'padding-right:'.$btn_padding_side.';';
				if($display_inline =='yes') {
					$styles_render .= 'position: absolute; right: 0; margin:0;';
				}
				if( $btn_full == 'yes' ) {
					$styles_render .= 'width:100%; text-align:center;';
				}	
				$styles_render .= 'transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out;';			
			$styles_render .= '}';
			$styles_render .= '.cf_scope_' . $cf_counter . ' .wpcf7-submit:hover {';
				$styles_render .= 'background-color:'.$btn_bg_hover.';';
				$styles_render .= 'border-color:'.$btn_border_hover.';';
				$styles_render .= 'color:'.$btn_text_hover.';';
			$styles_render .= '}';
		$styles_render .= '</style>';
	}
	
	$output = '';
	$output .= '<div class="cf_scope_' . $cf_counter . '">';
		$output .= $styles_render;
		$output .= do_shortcode( '[contact-form-7 id="'.$id.'"]' ) ;
	$output .= '</div>';
	
	return $output;
	
}

/* Social Icons with Links */
add_shortcode( 'social_icons', 'social_icons_func' );
function social_icons_func( $atts, $content = null ) {
	extract ( shortcode_atts ( array (
		'icon_size' => '15px',
		'icon_gap' => '2px',
		'style' => 'default',
		'bg_color' => '#f9f9f9',
		'icon_color' => '#cccccc',
		'shape' => 'square',
		'position' => 'left',
		'fb' => '',
		'tw' => '',
		'goo' => '',
		'link' => '',
		'pin' => '',
		'insta' => '',
		'flk' => '',
		'tbl' => '',
		'drb' => '',
		'beh' => '',
		'vm' => '',
		'yt' => '',
		'sk' => '',
		'dg' => '',
		'rdd' => '',
		'dev' => '',
		'sc' => '',
		'xng' => '',
		'stumble' => '',
		'css_animation' => '',
		'el_class' => ''
	), $atts ) );

	global $si_counter;

	if(function_exists('getCSSAnimation') ){
		$css_animation = getCSSAnimation($css_animation);
	}
	
	$current_link = $_SERVER["REQUEST_URI"];
	// add an unique class to each button
	if(strpos($current_link, 'vc_editable=true')) {
		$si_counter = rand();
	}

	else{
		if( ! isset($si_counter) ){
		  $si_counter = 1;
		}
		else{
		  $si_counter ++;
		}
	}	

	if($style == 'custom') {		
		$styles_render = '<style type="text/css" scoped="scoped">';
			
			$styles_render .= '.si_scope_'. $si_counter.' .social_links a {';				
				$styles_render .= 'margin: ' . $icon_gap . ';';
				$styles_render .= 'background-color: ' . $bg_color . ';';
				$styles_render .= 'color: ' . $icon_color . ';';
			$styles_render .= '}';

			$styles_render .= '.si_scope_'. $si_counter.' .social_links i {';
				if($icon_size != '15px') {
					$icon_size_tr = str_replace('px', '', $icon_size);
					$line_height_width = ((int)$icon_size_tr) * 2;
					$styles_render .= 'font-size: ' . $icon_size . ';';
					$styles_render .= 'line-height: ' . $line_height_width . 'px;';
					$styles_render .= 'height: ' . $line_height_width . 'px;'; 
					$styles_render .= 'width: ' . $line_height_width . 'px;'; 
				}
			$styles_render .= '}';
				
		$styles_render .= '</style>';		
	}

	$html = '';

	$fb = $fb != '' ? '<a href="'.$fb.'" class="ntip fb" alt="Facebook" original-title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>' : '';
	$tw = $tw != '' ? '<a href="'.$tw.'" class="ntip tw"  alt="Twitter" original-title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>' : '';
	$goo = $goo != '' ? '<a href="'.$goo.'" class="ntip gp" alt="Google+" original-title="Google+" target="_blank"><i class="fa fa-google-plus"></i></a>' : '';
	$link = $link != '' ? '<a href="'.$link.'" class="ntip ln" alt="LinkedIn" original-title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>' : '';
	$stumble = $stumble != '' ? '<a href="'.$stumble.'" class="ntip stb" alt="LinkedIn" original-title="LinkedIn" target="_blank"><i class="fa fa-stumbleupon"></i></a>' : '';

	$insta = $insta != '' ? '<a href="'.$insta.'" class="ntip insta" alt="Instagram" original-title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>' : '';
	$pin = $pin != '' ? '<a href="'.$pin.'" class="ntip pin" alt="Pinterest" original-title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>' : '';

	$flk = $flk != '' ? '<a href="'.$flk.'" class="ntip flk" alt="Flickr" original-title="Flickr" target="_blank"><i class="fa fa-flickr"></i></a>' : '';
	$tbl = $tbl != '' ? '<a href="'.$tbl.'" class="ntip tbl" alt="Tumblr" original-title="Tumblr" target="_blank"><i class="fa fa-tumblr"></i></a>' : '';
	$drb = $drb != '' ? '<a href="'.$drb.'" class="ntip drb" alt="Dribbble" original-title="Dribbble" target="_blank"><i class="fa fa-dribbble"></i></a>' : '';
	$beh = $beh != '' ? '<a href="'.$beh.'" class="ntip beh" alt="Behabce" original-title="Behance" target="_blank"><i class="fa fa-behance"></i></a>' : '';
	$vm = $vm != '' ? '<a href="'.$vm.'" class="ntip vm" alt="Vimeo" original-title="Vimeo" target="_blank"><i class="fa fa-vimeo"></i></a>' : '';
	$yt = $yt != '' ? '<a href="'.$yt.'" class="ntip yt" alt="YouTube" original-title="YouTube" target="_blank"><i class="fa fa-youtube"></i></a>' : '';
	
	$sk = $sk != '' ? '<a href="'.$sk.'" class="ntip sk" alt="Skype" original-title="Skype" target="_blank"><i class="fa fa-skype"></i></a>' : '';
	$dg = $dg != '' ? '<a href="'.$dg.'" class="ntip dg" alt="Digg" original-title="Digg" target="_blank"><i class="fa fa-digg"></i></a>' : '';
	$rdd = $rdd != '' ? '<a href="'.$rdd.'" class="ntip rdd" alt="Reddit" original-title="Reddit" target="_blank"><i class="fa fa-reddit"></i></a>' : '';
	$dev = $dev != '' ? '<a href="'.$dev.'" class="ntip dev" alt="DeviantArt" original-title="DeviantArt" target="_blank"><i class="fa fa-deviantart"></i></a>' : '';
	$sc = $sc != '' ? '<a href="'.$sc.'" class="ntip sc" alt="SoundCloud" original-title="SoundCloud" target="_blank"><i class="fa fa-soundcloud"></i></a>' : '';
	$xng = $xng != '' ? '<a href="'.$xng.'" class="ntip xng" alt="Xing" original-title="Xing" target="_blank"><i class="fa fa-xing"></i></a>' : '';
	

	$html .= '<div class="social_links_out si_' . $shape . ' pos_' . $position . ' si_scope_' . $si_counter . ' ' . $css_animation . ' ' . $el_class . '">';
		$html .= $styles_render;
		$html .= '<div class="social_links">';
			$html .= $fb . $tw . $goo . $link . $flk . $tbl . $drb . $insta . $beh . $pin . $vm . $yt . $sk . $dg . $rdd . $dev . $sc . $xng . $stumble;
		$html .= '</div>';
	$html .= '</div>';	

	return $html;
}

/* Custom Counter */
add_shortcode( 'vc_counter', 'vc_counter_func' );

function vc_counter_func( $atts, $content = null) {
	extract( shortcode_atts( array(
		'position' => 'left',
		'icon_color' => '#444444',		
		'icon_fontawesome' => 'fa fa-adjust',
		'icon_size' => '30',
		'data_from' => '0',
		'data_to' => '800',
		'comma_separator' => 'no',
		'data_refresh_interval' => '50',
		'data_speed' => '2000',
		'font_size' => '30',
		'font_color' => '#444444',
		'prefix' => '',
		'suffix' => '',
		'description_color' => '#444444',
		'css_animation' => '',
		'delay' => '',
		'el_class' => ''
	), $atts ) );
	
	$html = $content_color = '';
	
	$delay = (!empty($delay)) ? 'data-delay="'.$delay.'"' : '';

	$comma_separator = ($comma_separator=='yes') ? 'true' : 'false';
	
	if(function_exists('getCSSAnimation') ){
		$css_animation = getCSSAnimation($css_animation);
	}
	
	$position = ($position != 'left') ? 'style="text-align: '.$position.';"' : '';
	
	$suffix = ($suffix != '') ? $suffix : '';
	$prefix = ($prefix != '') ? $prefix : '';
	
	$icon_size = ($icon_size !='' && $icon_size !='30') ? 'font-size: '.$icon_size.'px;' : '';
	$icon_color = ($icon_color != '') ? 'style="color: '.$icon_color.'; ' . $icon_size . '"' : '';
	$icon = ($icon_fontawesome != '') ? '<div class="icon" '.$icon_color.'><i class="' . $icon_fontawesome . '"></i></div>' : '';
	
	$font_color = ($font_color != '') ? 'color: ' . $font_color . ';' : '';
	$font_size = ($font_size != '') ? 'font-size: ' . $font_size . 'px;' : '';
	$description_color = ($description_color != '') ? 'style="color:'.$description_color.';"' : '';
	
	$content_color = ($content_color != '' && $content_color != '#444444') ? 'style="color: '.$content_color.';"' : '';
	
	$html .= '<div class="counter ' . $css_animation . ' ' . $el_class . '" '.$delay.' '.$position.'>';
		$html .= $icon;
		$html .= '<div class="count_el" style="' . $font_color . $font_size . '">'.$prefix.'<span data-from="'.$data_from.'" data-comma="'.$comma_separator.'" data-to="'.$data_to.'" data-refresh-interval="'.$data_refresh_interval.'" data-speed="'.$data_speed.'"></span>'.$suffix.'</div>';
		if($content !='') {
			$html .= '<div class="content_el" '.$description_color.'>'. do_shortcode($content) . '</div>';
		}
	$html .= '</div>';
	
	return $html;
}

/* Custom CountDown Element */
add_shortcode( 'countdown_el', 'countdown_el_func' );

function countdown_el_func( $atts) {

	$html = $el_class = '';

	extract( shortcode_atts( array(		
		'count_date' => '12/24/2016 12:00:00',
		'count_offset' => '0',
		'count_style' =>'default',
		'count_align' => 'center',
		'count_width' => '100%',
		'count_font_size' => '60px',
		'count_font_color' => '#555555',
		'count_details_font_size' => '13px',
		'count_details_font_color' => '#888888',
		'border_color' => '#cccccc',
		'border' => '1px',
		'count_bg' => '',
		'count_margin' => '10px',
		'show_days' => 'yes',
		'show_hours' => 'yes',
		'show_minutes' => 'yes',
		'show_seconds' => 'yes',
		'el_class' => ''
	), $atts ) );

	$elements = 4;

	if($show_days == 'no') $elements -= 1;
	if($show_hours == 'no') $elements -= 1;
	if($show_minutes == 'no') $elements -= 1;
	if($show_seconds == 'no') $elements -= 1;

	global $cf_counter;
	
	$current_link = $_SERVER["REQUEST_URI"];
	// add an unique class to each button
	if(strpos($current_link, 'vc_editable=true')) {
		$cd_counter = rand();
	}

	else{
		if( ! isset($cd_counter) ){
		  $cd_counter = 1;
		}
		else{
		  $cd_counter ++;
		}
	}	

	if($count_style == 'custom') {
		$styles_render = '<style type="text/css" scoped="scoped">';

			$styles_render .= '.cd_scope_'. $cd_counter.' .countdown-ul {';
				$styles_render .= 'max-width:' . $count_width . ';';
				$styles_render .= 'text-align:' . $count_align . ';';
				if( $count_align == 'right' ) {
					$styles_render .= 'margin: 0 0 0 auto;';
				}
				if( $count_align == 'center' ) {
					$styles_render .= 'margin: 0 auto;';
				}
			$styles_render .= '}';
			
			$styles_render .= '.cd_scope_'. $cd_counter.' .countdown-ul li .time_st {';
				$styles_render .= 'font-size: '.$count_font_size.';';
				$styles_render .= 'color: '.$count_font_color.';';
			$styles_render .= '}'	;
			$styles_render .= '.cd_scope_'. $cd_counter.' .countdown-ul li .time_rf {';
				$styles_render .= 'font-size: '.$count_details_font_size.';';
				$styles_render .= 'color: '.$count_details_font_color.';';
			$styles_render .= '}'	;
			$styles_render .= '.cd_scope_'. $cd_counter.' .countdown-ul li {';
				$styles_render .= 'border-color: '.$border_color.';';
				$styles_render .= 'border-width: '.$border.';';
				if($count_bg) {
					$styles_render .= 'background-color: '.$count_bg.';';
				}
				$styles_render .= 'margin: '.$count_margin.';';
				if($count_margin==0) {
					$styles_render .= 'margin-left: -1px; margin-bottom:-1px; width:25%';
				}
			$styles_render .= '}'	;
				
		$styles_render .= '</style>';
	}
	
	$html .= '<div class="cr-countdown '.$el_class . 'count' . $elements . ' cd_scope_' . $cd_counter.'" data-offset="'.$count_offset.'" data-date="'.$count_date.'">';

		$html .= $styles_render;

		$html .= '<ul class="countdown-ul">';
						
						if($show_days == 'yes') {
	                        $html .= '<li>
			                            <span class="days time_st"></span>
			                            <span class="time_rf">'.__( 'days', 'Creativo' ).'</span>
	                        		</li>';
	                    }

	                    if($show_hours == 'yes') {	
	                        $html .= '<li>
			                            <span class="hours time_st"></span>
			                            <span class="time_rf">'.__( 'hours', 'Creativo' ).'</span>
	                        		</li>';
	                    }  
	                    
	                    if($show_minutes == 'yes') {
	                        $html .= '<li>
	                            		<span class="minutes time_st"></span>
	                            		<span class="time_rf">'.__( 'minutes', 'Creativo' ).'</span>
	                        		</li>';
	                    }
	                    
	                    if($show_seconds == 'yes') {    
	                        $html .= '<li>
			                            <span class="seconds time_st"></span>
			                            <span class="time_rf">'.__( 'seconds', 'Creativo' ).'</span>
	                        		</li>';
	                    }

		$html .= '</ul>';
	$html .= '</div>';


	return $html;
}
	
// Separator 2
//////////////////////////////////////////////////////////////////

add_shortcode( 'vc_separator_2', 'vc_separator_2_func' );
function vc_separator_2_func( $atts) {
	
	$style = $color_line = $color_symbol = $padding_top = $padding_bottom = $separator_position = $bg = $color = $icon_output = '';
	
	extract( shortcode_atts( array(
		'style' => 'line',
		'color_line' => '#444444',
		'color_symbol' => '#444444',
		'padding_top' => '',
		'padding_bottom' => '',
		'separator_position' => 'center_sep',
		'icon_type' => 'fontawesome',
		'icon_fontawesome' => 'fa fa-info-circle',
		'icon_openiconic' => '',
		'icon_typicons' => '',
		'icon_entypoicons' => '',
		'sep_width' => 'small',
		'icon_linecons' => '',
		'symbol_size' => 'normal',
		'bg_symbol' => '',
		'border_symbol' => '',
		'icon_entypo' => '',		
		'el_class' => '',
		''
	  ), $atts ) );
	  
	if($style != 'line') {
		// Enqueue needed icon font.
		if( function_exists('vc_icon_element_fonts_enqueue') ){
			vc_icon_element_fonts_enqueue( $icon_type );
		}

	}	
	
	$symbol_size = ( isset($symbol_size) && $symbol_size !='normal' ) ? 'symbol_'.$symbol_size : '';
	  
	$iconClass = isset( ${"icon_" . $icon_type} ) ? ${"icon_" . $icon_type} : 'fa fa-info-circle';
	
	$color = (isset($color_symbol)) ? 'color: ' . $color_symbol . ';' : '';

	$bg_symbol = ( $style == 'line_symbol' && isset($bg_symbol) && ( $bg_symbol != '' ) ) ? 'background-color:' . $bg_symbol . ';' : '';

	$border_symbol = ( $style == 'line_symbol' && isset($border_symbol) && ( $border_symbol != '' ) ) ? 'border-color:' . $border_symbol . ';' : '';

	$icon_style = ( $color != '' || $bg_symbol != '' || $border_symbol != '' ) ? 'style="' . $color . $bg_symbol . $border_symbol . '"' : '';
	
	$line_color = ($style == 'line_symbol') ? 'style="border-color:' . $color_line . ';"' : 'style="background-color:' . $color_line . ';"';
	
	$icon_output = ( isset ( $icon_type ) && ( $style=='line_symbol' ) ) ? '<i class="'.$iconClass.'"></i>' : '';

	$sep_width = ( $style == 'line_symbol' && isset($sep_width) && ( $sep_width != 'small' ) ) ? ' sep_'.$sep_width : '';	 

	  
	$padding_top = isset($padding_top) ? 'padding-top: '. $padding_top .'px;': '';
	$padding_bottom = isset($padding_bottom) ? 'padding-bottom: '. $padding_bottom .'px;': '';
	  
	$html = '';
	  
		if( $style == 'line' ) {
			$html .= '<div class="separator_two '.$el_class.'" style="' . $padding_top . $padding_bottom . '">';
				$html .= '<div class="line ' . $separator_position . '" '.$line_color.'>'.$icon_output.'</div>';
			$html .= '</div>';	  
		}
		else {
			$html .= '<div class="separator_two line_symbol '. $separator_position . $sep_width . ' '.$el_class.'" style="' . $padding_top . $padding_bottom . '">';
				$html .= '<span class="vc_sep_holder vc_sep_holder_l" ><span class="vc_sep_line" '.$line_color.'></span></span>';
				$html .= '<div class="icon_holder '.$symbol_size.'" ' . $icon_style . '>'.$icon_output . '</div>';
				$html .= '<span class="vc_sep_holder vc_sep_holder_r" ><span class="vc_sep_line" '.$line_color.'></span></span>';
			$html .= '</div>';
		}
	 
	return $html;
	
}	

//////////////////////////////////////////////////////////////////
// Slider
//////////////////////////////////////////////////////////////////
add_shortcode('slider', 'shortcode_slider');
	function shortcode_slider($atts, $content = null) {
		$str = '';
		$str .= '<div class="flexslider add_margin">';
		$str .= '<ul class="slides">';
		$str .= do_shortcode($content);
		$str .= '</ul>';
		$str .= '</div>';

		return $str;
	}

//////////////////////////////////////////////////////////////////
// Slide
//////////////////////////////////////////////////////////////////
add_shortcode('slide', 'shortcode_slide');
	function shortcode_slide($atts, $content = null) {
		$str = '';
		if($atts['type'] == 'video') {
			$str .= '<li class="video">';
		} else {
			$str .= '<li class="image">';
		}
		if($atts['link']):
		$str .= '<a href="'.$atts['link'].'">';
		endif;
		if($atts['type'] == 'video') {
			$str .= $content;
		} else {
			$str .= '<img src="'.$content.'" alt="" />';
		}
		if($atts['link']):
		$str .= '</a>';
		endif;
		$str .= '</li>';

		return $str;
	}
//////////////////////////////////////////////////////////////////
// Testimonials
//////////////////////////////////////////////////////////////////
add_shortcode('testimonials', 'shortcode_testimonials');
	function shortcode_testimonials($atts, $content = null) {
		global $data;
		$str = '<div class="reviews">';
		$str .= '<div class="flexslider" data-interval="'.$data['pause_time'].'"><ul class="slides">';
		$str .= do_shortcode($content);
		$str .= '</ul></div>';
		$str .= '</div>';
		return $str;
	}


//////////////////////////////////////////////////////////////////
// Testimonial
//////////////////////////////////////////////////////////////////
add_shortcode('testimonial', 'shortcode_testimonial');
	function shortcode_testimonial($atts, $content = null) {
		$style = $atts['style'];
		
		$str = '<li>';
			$str .= '<div class="review">';
				$str .= '<div class="review_inside ">';
					$str .= '<div class="comment_quote">';
						$str .= do_shortcode($content);
					$str .= '</div>';
				$str .= '</div>';	
				$str .= '<div class="comment_details clearfix">';
					
					$str .= '<div class="comment_author_details">';
						$str .= '<div class="comment-author "><span class="'.$style.'">'.$atts['name'].'</span>'.' - '.$atts['company'];
						$str .= '</div>';
						
					$str .= '</div>';
				$str .= '</div>';
			$str .= '</div>';
		$str .= '</li>';		
		
		return $str;
	}

//////////////////////////////////////////////////////////////////
// Custom Custom BlockQuote
//////////////////////////////////////////////////////////////////
add_shortcode('custom_blockquote', 'shortcode_custom_blockquote');
	function shortcode_custom_blockquote($atts, $content = null) {
		$style = $atts['style'];
		switch($style){
			case 'green':
				$border ='border-color:#A5CB5E;';
			break;
			case 'yellow':
				$border ='border-color:#FEBF4D;';
			break;
			case 'blue':
				$border ='border-color:#51C4ED;';
			break;
			case 'red':
				$border ='border-color:#E4436C;';
			break;
			case 'purple':
				$border ='border-color:#D798D1;';
			break;
			case 'black':
				$border ='border-color:#444;';
			break;
			case 'grey':
				$border ='border-color: #ccc;';				
			break;	
		}
		$str = '';
		$str .= '<blockquote style="'.$border.'">';		
		$str .= do_Shortcode($content);		
		$str .= '</blockquote>';
		return $str;
	}

	
//////////////////////////////////////////////////////////////////
// Progess Bar
//////////////////////////////////////////////////////////////////
add_shortcode('bar', 'shortcode_progress');
function shortcode_progress($atts, $content = null) {
	$style = $atts['style'];
		switch($style){
			case 'green':
				$bg ='background-color:#A5CB5E;';
			break;
			case 'yellow':
				$bg ='background-color:#FEBF4D;';
			break;
			case 'blue':
				$bg ='background-color:#51C4ED;';
			break;
			case 'red':
				$bg ='background-color:#E4436C;';
			break;
			case 'purple':
				$bg ='background-color:#D798D1;';
			break;
			case 'black':
				$bg ='background-color:#444;';
			break;
			case 'grey':
				$bg ='background-color: #ccc;';				
			break;	
		}
		$width=$atts['percentage']-7;
	$html = '';
	$html = '<div class="progress-title">' . $content . ': <strong>' . $atts['percentage'] . '%</strong></div>';
	$html .= '<div class="progress-bar">';
	$html .= '<div class="progress-bar-content" data-percentage="'.$atts['percentage'].'" style="width: ' . $width . '%;'.$bg.'">';
	$html .= '</div>';
//	$html .= '<span class="progress-title">' . $content . ' ' . $atts['percentage'] . '%</span>';
	$html .= '</div>';

	return $html;
}

//////////////////////////////////////////////////////////////////
// Gallery Shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('postgallery', 'shortcode_postgallery');
function shortcode_postgallery($atts, $content = null) {
	$html = '<div class="post-gallery">';	
		$args = array(
			'post_type' => 'attachment',
			'numberposts' => -1,
			'post_status' => null,
			'post_parent' => get_the_ID(),
			'orderby' => 'menu_order',
			'order' => 'ASC'
		);	
		$attachments = get_posts($args);
		$items = count($attachments);
		if($attachments || has_post_thumbnail()):
			$i=1;				
			foreach($attachments as $attachment):
				$image = wp_get_attachment_image_src($attachment->ID, 'related-img');				
				$full_image = wp_get_attachment_image_src($attachment->ID, 'full');
				$width = 90/$items;     
				if($i == $items){ $last='last'; }                                        
				$html .='<div class="post-gallery-item '.$last.'" style="width:'.$width.'%"><a href="'.$full_image[0].'" rel="prettyPhoto[\'gallery_easy\']"><img src="'.$image[0].'" alt="'. $attachment->post_title .'" /></a></div>';
				$i++;				
			endforeach;
		endif;	
	$html .= '<div class="clear"></div></div>';
	return $html;
}

//////////////////////////////////////////////////////////////////
// Person
//////////////////////////////////////////////////////////////////
add_shortcode('person', 'shortcode_person');
function shortcode_person($atts, $content = null) {
	$html = '';
	$html .= '<div class="person">';
	$html .= '<img class="person-img" src="' . $atts['picture'] . '" alt="' . $atts['name'] . '" />';
	if($atts['name'] || $atts['title'] || $atts['facebooklink'] || $atts['twitterlink'] || $atts['linkedinlink'] || $content) {
		$html .= '<div class="person-desc">';
			$html .= '<div class="person-author clearfix">';
				$html .= '<div class="person-author-wrapper"><span class="person-name">' . $atts['name'] . '</span>';
				$html .= '<span class="person-title">' . $atts['title'] . '</span></div>';
				if($atts['facebook']) {
					$html .= '<span class="social-icon"><a href="' . $atts['facebook'] . '" class="facebook">Facebook</a><div class="popup">
						<div class="holder">
							<p>Facebook</p>
						</div>
					</div></span>';
				}
				if($atts['twitter']) {
					$html .= '<span class="social-icon"><a href="' . $atts['twitter'] . '" class="twitter">Twitter</a><div class="popup">
						<div class="holder">
							<p>Twitter</p>
						</div>
					</div></span>';
				}
				if($atts['linkedin']) {
					$html .= '<span class="social-icon"><a href="' . $atts['linkedin'] . '" class="linkedin">LinkedIn</a><div class="popup">
						<div class="holder">
							<p>LinkedIn</p>
						</div>
					</div></span>';
				}
				if($atts['dribbble']) {
					$html .= '<span class="social-icon"><a href="' . $atts['dribbble'] . '" class="dribbble">Dribbble</a><div class="popup">
						<div class="holder">
							<p>Dribbble</p>
						</div>
					</div></span>';
				}
			$html .= '<div class="clear"></div></div>';
			$html .= '<div class="person-content">' . $content . '</div>';
		$html .= '</div>';
	}
	$html .= '</div>';

	return $html;
}

//////////////////////////////////////////////////////////////////
// Recent Posts
//////////////////////////////////////////////////////////////////

add_shortcode('recent_posts', 'shortcode_recent_posts');
function shortcode_recent_posts($atts, $content = null) {
	extract(shortcode_atts(array(
		'grid_display' => 'grid',
		'posts' => '4',
		'columns' => '4',
		'thumbnail' => 'yes',
		'thumbnail_size' => 'default',
		'show_title' => 'yes',
		'show_date' => 'yes',
		'include' => '',
		'show_excerpt' => 'yes',
		'excerpt_length' => '15',
		'category' => '',
		'taxonomies' => '',
		'style' => 'default',
		'post_title_color' => '#444444',
		'post_title_font_size' => '15px',
		'font_weight' => '600',
		'post_title_uppercase' => 'no',
		'post_date_color' => '#b5b8bf',
		'post_desc_font_size' => '13px',
		'post_desc_text_color' => '#656565',
		'post_desc_bg_color' => '#ffffff',
		'offset' => '',
		'el_class' => ''
	), $atts));
	
	global $data, $post_counter;
	
	$current_link = $_SERVER["REQUEST_URI"];
	// add an unique class to each button
	if(strpos($current_link, 'vc_editable=true')) {
		$post_counter = rand();
	}
	else{
		if( ! isset($post_counter) ){
		  $post_counter = 1;
		}
		else{
		  $post_counter ++;
		}
	}

	$styles_render = '';
	
	if($style == 'custom') {
		$styles_render = '<style type="text/css" scoped="scoped">';
			$styles_render .= '.post_scope_' . $post_counter . ' .blogpost .description {';
				$styles_render .= 'background-color: '.$post_desc_bg_color.';';
				$styles_render .= 'color:'.$post_desc_text_color.';';
				$styles_render .= 'font-size:'.$post_desc_font_size.'; line-height: 1.6;';				
			$styles_render .= '}';	
			$styles_render .= '.post_scope_' . $post_counter . ' .blogpost h3 a {';				
				$styles_render .= 'color:'.$post_title_color.';';							
			$styles_render .= '}';	
			$styles_render .= '.post_scope_' . $post_counter . ' .blogpost h3 {';				
				$styles_render .= 'font-size:'.$post_title_font_size.';';
				$styles_render .= 'font-weight:'.$font_weight.';';
				if($post_title_uppercase == 'yes'){
					$styles_render .= 'text-transform:uppercase;';
				}							
			$styles_render .= '}';	
			$styles_render .= '.post_scope_' . $post_counter . ' .blogpost .date {';				
				$styles_render .= 'color:'.$post_date_color.';';							
			$styles_render .= '}';						
		$styles_render .= '</style>';
	}

	$post_extra_css_class = ($style == 'custom') ? 'post_scope_'.$post_counter : '';
	
	$attachment = '';
	$html = '';
	if(($show_excerpt != "yes") || ($thumbnail != "yes")){
		$height = 'style="height:auto"';
	}
	$thumb = 'recent-posts';
	
	if($thumbnail_size != 'full') {		
		$thumb = 'recent-posts-col-2';		
	}
	else {
		$thumb = 'full';
	}
	$html .= $styles_render;
	$html .= '<div class="recent_posts_container '.$post_extra_css_class.' clearfix">';
	if($grid_display=='masonry') {		
		$html .= '<div class="grid-masonry js-masonry clearfix">';
		$html .= '<div class="gutter-sizer"></div>';
	}
	else {
		$html .= '<div class="is_grid clearfix">';
	}

	$query = array(
		'posts_per_page' => $posts,
		'post_type'=>'post'				
	);		
	
	if($offset) {
		$query['offset'] = $offset;
	}
	if($include) {
		$query['post__in'] = explode( ',', $include );
	}

	if ( $category ) {
		$query['cat'] = $category;
	}	

	if ( $taxonomies ) {
		$query['cat'] = $taxonomies;
	}	
	
	$recent_posts = new WP_Query($query);		
	
	$count = 1;
	$i = 3;	
	

	while($recent_posts->have_posts()): $recent_posts->the_post();
		
		$html .= '<div class="blogpost grid_posts columns-'.$columns.'">';
		
		if($thumbnail == "yes"):
			$post = new StdClass();
			$post->ID = get_the_ID();
			
			if( has_post_thumbnail() || get_post_meta($post->ID, 'pyre_youtube', true) || get_post_meta($post->ID, 'pyre_vimeo', true)):
			$html .= '<div class="flexslider mini posts-grid">';
				$html .= '<ul class="slides">';
					
						if(get_post_meta($post->ID, 'pyre_youtube', true)):
							$html .= '<li>';
								$html .= '<div class="video-container" style="height:12px;"><iframe title="YouTube video player" width="218px" height="134px" src="http://www.youtube.com/embed/' . get_post_meta($post->ID, 'pyre_youtube', true) . '" frameborder="0" allowfullscreen></iframe></div>';
							$html .= '</li>';
						endif;
						if(get_post_meta($post->ID, 'pyre_vimeo', true)):
							$html .= '<li>';
								$html .= '<div class="video-container" style="height:12px;"><iframe src="http://player.vimeo.com/video/' . get_post_meta($post->ID, 'pyre_vimeo', true) . '" width="220px" height="161px" frameborder="0"></iframe></div>';
							$html .= '</li>';
						endif;
						
						$extra ='';									
						$fi = 2;
						
                        while($fi <= $data['featured_images_count']):
							$attachment = new StdClass();
							$attachment->ID = kd_mfi_get_featured_image_id('featured-image-'.$fi, 'post');						
							
							if($attachment->ID):													
								$attachment_image = wp_get_attachment_image_src($attachment->ID, $thumb); 
								$full_image = wp_get_attachment_image_src($attachment->ID, 'full'); 
								$attachment_data = wp_get_attachment_metadata($attachment->ID); 
								if($grid_display == 'masonry') {
									$extra .= '<li><a href="'.get_permalink().'"><img src="'.$full_image[0].'" ></a></li>'; 
								}	
								else {									
									$extra .= '<li><a href="'.get_permalink().'"><img src="'.$attachment_image[0].'" ></a></li>';                
								}	
							endif; 
							
							$fi++; 
						endwhile; 
						
						//if($extra ==''){ $hover = '<span class="gallery_zoom"><img src="'.get_bloginfo('template_directory').'/images/img-ovr-recent.png" /></span>';} else $hover =''; 

						if(has_post_thumbnail()){	
								   
							$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); 
							$attachment_data = wp_get_attachment_metadata(get_post_thumbnail_id());
							if($grid_display=='masonry') {
								if($extra == '') {
									$html.='<li><div class="one-fourth-recent"><figure><a href="'. get_permalink() .'"><div class="text-overlay"><div class="info"><i class="fa fa-search"></i></div></div>'.get_the_post_thumbnail($post->ID, 'full').'</a></figure></div></li>';
								}
								else {
									$html .= '<li><a href="'. get_permalink().'">'.get_the_post_thumbnail($post->ID, 'full').'</a></li>';
								}
							}
							else{
								if($extra == '') {
									$html.='<li><div class="one-fourth-recent"><figure><a href="'. get_permalink() .'"><div class="text-overlay"><div class="info"><i class="fa fa-search"></i></div></div>'.get_the_post_thumbnail($post->ID, $thumb).'</a></figure></div></li>';
								}
								else {
									$html .= '<li><a href="'. get_permalink().'">'.get_the_post_thumbnail($post->ID, $thumb).'</a></li>';
								}
							}
						}
						$html .= $extra;
					
				$html .= '</ul></div>';
			endif;
		endif;
		$html .= '<div class="description">';
			if($show_title == "yes"):	
				$html .= '<h3><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></h3>';	
			endif;		
			if($show_date == "yes"):		
				$html .= '<div class="date"><i class="fa fa-clock-o"></i>'.get_the_time('F j, Y', $post->ID).'</div>';				
			endif;
			if($show_excerpt == "yes"):
				$html .= ''.string_limit_words(get_the_excerpt(), ($excerpt_length) ? $excerpt_length : 15 ).'...';
			endif;
		$html .= '</div>';
		//$html .= '<div class="bottom"></div>';
		$html .= '</div>';
		$count++;
	endwhile;
	wp_reset_query();

	$html .= '</div></div>';

	return $html;
}

//////////////////////////////////////////////////////////////////
// Pricing Column
//////////////////////////////////////////////////////////////////

add_shortcode('vc_price_column', 'shortcode_vc_price_column');
function shortcode_vc_price_column($atts, $content = null) {
	extract(shortcode_atts(array(
		'col_border_color' => '#f1f1f1',
		'col_type' => 'normal',
		'heading_bg_color' => '#ffffff',
		'pcb_color' => '#5bc98c',
		'heading_text' => 'Business',
		'heading_text_color' => '#313131',	
		'price' => '29',
		'interval' => 'monthly',
		'currency' => '$',
		'pf_text_color' => '#969595',
		'pf_bg_color' => '#ffffff',
		'en_button' => 'yes',
		'title' => 'Text on the button',	
		'href' => '',
		'target' => '_self',
		'color' => 'default',
		'size' => 'small',
		'align' => 'center',
		'delay'	=> '',
		'css_animation' => '',
		'el_class' => ''
	), $atts));
	$pricing_column = '';
	
	$col_type = ($col_type =='promo' ) ? 'promo_column' :'';
	
	$delay = (!empty($delay)) ? 'data-delay="'.$delay.'"' : '';
	
	if(function_exists('getCSSAnimation') ){
		$css_animation = getCSSAnimation($css_animation);
	}
	
	/* custom styles */
	
	$heading_bg_color = ( !empty($heading_bg_color) && ( $heading_bg_color !='#ffffff') ) ? 'style="background-color:'.$heading_bg_color.';border-color:'.$heading_bg_color.';"' : '';
	$col_border_color = ( !empty($col_border_color) && ( $col_border_color !='#f1f1f1' ) ) ? 'style="border-color:'. $col_border_color .';"' : '';
	$heading_text_color = (!empty($heading_text_color) ) ? 'style="color:'.$heading_text_color.'";' : '';
	$pcb_color = (!empty($pcb_color) && ($pcb_color != '#5bc98c') ) ? 'style="color:'.$pcb_color.'";' : '';
	$pf_text_color = (!empty($pf_text_color) && ($pf_text_color != '#969595') ) ? 'color:'.$pf_text_color.';' : '';
	$pf_bg_color = (!empty($pf_bg_color) && ($pf_bg_color != '#ffffff') ) ? 'background-color:'.$pf_bg_color.';' : '';
	
	if(!empty($pf_text_color) || !empty($pf_bg_color)) $pricing_column='style="'.$pf_text_color.$pf_bg_color.'"';
	
	$html = '';	
	$html .= '<div class="pricing_column_wrap ' . $col_type . ' ' . $css_animation . ' ' . $el_class . '" '.$col_border_color . ' ' . $delay . '>';
		$html .= '<div class="pricing_column_head" '.$heading_bg_color.'>';
			$html .= '<h2 '.$heading_text_color.'>'.$heading_text.'</h2>';
			$html .= '<div class="price_currency_interval"'.$pcb_color.'><span class="col_currency">'.$currency.'</span> <span class="col_price">'.$price.'</span> / <span class="col_interval">'.$interval.'</span></div>';
		$html .= '</div>';
		$html .= '<div class="pricing_column" '.$pricing_column.'>';
			$html .= do_shortcode($content);
			if($en_button && ($en_button == 'yes') ) {
				$html .= do_shortcode('[vc_button title="'.$title.'" target="'.$target.'" color="'.$color.'" size="'.$size.'" align="'.$align.'" href="'.$href.'"]');
			}
		$html .= '</div>';
	$html .= '</div>';
	
	return $html;	
}	

//////////////////////////////////////////////////////////////////
// Section Separator
//////////////////////////////////////////////////////////////////

add_shortcode('section_separator', 'shortcode_section_separator');
function shortcode_section_separator($atts, $content = null) {
	extract(shortcode_atts(array(
		'size' => 'ss_small',	
		'position' => 'sp_center',
		'border_w' => '1',
		'border_color' => '',
		'sep_bg_color' => '',		
		'el_class' => ''
	), $atts));	
	
	$html = $sep_style = '';
	
	$size = ($size) ? $size : '';
	$position = ($position) ? ' '.$position : '';
	
	$margin_inside = ($border_w > 1) ? 'margin-left:-' . ($border_w*2) . 'px;' : '';
	$top_inside = ( ($border_w > 5 ) && ($size == 'ss_big') ) ? 'margin-top:-' . ($border_w - 5) . 'px' : '';
	
	$border_w = ($border_w != 1) ? 'border-width: ' . $border_w . 'px;' : '';
	$border_color = ( $border_color ) ? 'border-color:' . $border_color . ';' : '';
	//$bg_color = ( $bg_color ) ? 'background-color: ' . $bg_color . ';' :'';
	
	$sep_style = 'style="background-color:'.$sep_bg_color.';' . $border_w . $border_color . $margin_inside . $top_inside . '"';
	
	$html .= '<div class="section_separator ' . $size . $position . '">';
		$html .= '<div class="section_separator_outer">';
			$html .= '<div class="section_separator_inner" ' . $sep_style . '>';
			$html .= '</div>';
		$html .= '</div>';	
	$html .= '</div>';
	
	return $html;
}

//////////////////////////////////////////////////////////////////
// Team Member
//////////////////////////////////////////////////////////////////

add_shortcode('vc_employee', 'shortcode_vc_employee');
function shortcode_vc_employee($atts, $content = null) {
	extract(shortcode_atts(array(
		'employee_style' => 'style1',	
		'image' => '',
		'name' => '',
		'img_style'=>'square',		
		'position' => '',
		'href' =>'',
		'target' =>'_self',
		'facebook' => '',
		'twitter' => '',
		'gplus' => '',
		'linkedin' => '',
		'instagram' => '',
		'pinterest' => '',
		'colors' => 'default',
		'img_hover_color' => '#000000',
		'icon_color' => '#ffffff',
		'opacity' => '0.6',
		'description_bg' => '#ffffff',
		'name_color' => '#444444',
		'position_color' => '#CCCCCC',
		'separator_color' => '#f1f1f1',
		'description_color' => '#f1f1f1',
		'desc_border_color' => '#f1f1f1',
		'sc_bg' => '#f9f9f9',
		'sc_color' => '#CCCCCC',
		'delay' => '',
		'css_animation' => '',
		'el_class' => ''
	), $atts));	
	
	global $emp_counter;

	$styles_render = '';
	
	$delay = (!empty($delay)) ? 'data-delay="'.$delay.'"' : '';
	
	if(function_exists('getCSSAnimation') ){
		$css_animation = getCSSAnimation($css_animation);
	}
	
	$current_link = $_SERVER["REQUEST_URI"];
	// add an unique class to each button
	if(strpos($current_link, 'vc_editable=true')) {
		$emp_counter = rand();
	}
	else{
		if( ! isset($emp_counter) ){
		  $emp_counter = 1;
		}
		else{
		  $emp_counter ++;
		}
	}
	
	
	if($colors == 'custom') {
		$styles_render = '<style type="text/css" scoped="scoped">';
			$styles_render .= '.tm_scope_' . $emp_counter . '.team_member .team_image .overlay_effect{';
				$styles_render .= 'background-color:'.$img_hover_color.';';				
			$styles_render .= '}';
			$styles_render .= '.tm_scope_' . $emp_counter . '.team_member .team_image .overlay_effect i{';
				$styles_render .= 'color:'.$icon_color.';';				
			$styles_render .= '}';
			$styles_render .= '.tm_scope_' . $emp_counter . '.team_member:hover .team_image .overlay_effect{';
				$styles_render .= 'opacity:'.$opacity.';';				
			$styles_render .= '}';	
			$styles_render .= '.tm_scope_' . $emp_counter . ' .team_description {';
				$styles_render .= 'background-color:' . $description_bg . ';';
				if($img_style=='square') {
					$styles_render .= 'border-color:' . $desc_border_color . ';';
				}
			$styles_render .= '}';
			$styles_render .= '.tm_scope_' . $emp_counter . ' .team_name {';
				$styles_render .= 'color:' . $name_color . ';';	
			$styles_render .= '}';
			$styles_render .= '.tm_scope_' . $emp_counter . ' .position {';
				$styles_render .= 'color:'.$position_color . ';';	
			$styles_render .= '}';
			$styles_render .= '.tm_scope_' . $emp_counter . ' .team_content {';
				$styles_render .= 'border-top-color:'.$separator_color . ';';
				$styles_render .= 'color:'.$description_color . ';';	
			$styles_render .= '}';
			$styles_render .= '.tm_scope_' . $emp_counter . ' .team_social a {';
				$styles_render .= 'background-color:'.$sc_bg . ';';
				$styles_render .= 'color:'.$sc_color . ';';	
			$styles_render .= '}';	
		$styles_render .= '</style>';
	}
	
	$facebook = ($facebook != '') ? '<a href="'.$facebook.'" class="fb" target="_blank" title="'.__('Follow on Facebook', 'Creativo').'"><i class="fa fa-facebook"></i></a>' : '';
	$twitter = ($twitter != '') ? '<a href="'.$twitter.'" class="tw" target="_blank" title="'.__('Follow on Twitter', 'Creativo').'"><i class="fa fa-twitter"></i></a>' : '';
	$gplus = ($gplus!= '') ? '<a href="'.$gplus.'" class="gp" target="_blank" title="'.__('Follow on Google+', 'Creativo').'"><i class="fa fa-google-plus"></i></a>' : '';
	$linkedin = ($linkedin!= '') ? '<a href="'.$linkedin.'" class="ln" target="_blank" title="'.__('Follow on LinkedIn', 'Creativo').'"><i class="fa fa-linkedin"></i></a>' : '';
	$instagram = ($instagram!= '') ? '<a href="'.$instagram.'" class="insta" target="_blank" title="'.__('Follow on Instagram', 'Creativo').'"><i class="fa fa-instagram"></i></a>' : '';
	$pinterest = ($pinterest!= '') ? '<a href="'.$pinterest.'" class="pin" target="_blank" title="'.__('Follow on Pinterest', 'Creativo').'"><i class="fa fa-pinterest"></i></a>' : '';
	
	$html = $thumbnail = '';
	$post_thumbnail = array();
	
	if(function_exists('wpb_getImageBySize')){
		$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ) );
		$thumbnail = $post_thumbnail['thumbnail'];
	}	
	$clearfix = ( $employee_style == 'horizontal' ) ? 'clearfix' : '';
	$html .= $styles_render;
	$html .= '<div class="team_member ' . $employee_style . ' tm_scope_' . $emp_counter . ' ' . $img_style . ' ' . $css_animation . ' ' . $el_class . ' ' . $clearfix . '" '.$delay.'>';
		$html .= '<div class="team_image ">';
			if( !empty($href) ) {				
				$html .= '<a href="'.$href.'" target="'.$target.'">';				
					$html .= $thumbnail;
					$html .= '<span class="overlay_effect"><i class="fa fa-link"></i></span>';
				$html .= '</a>';	
			}
			else{
				$html .= $thumbnail;
			}
		$html .= '</div>';
		$html .= '<div class="team_description">';
			
			$html .= '<div class="team_name">'.$name.'</div>';
			$html .= '<div class="position">';
				$html .= $position;
			$html .= '</div>';
			if($content) {
				$html .= '<div class="team_content">';
					$html .= do_shortcode($content);
				$html .= '</div>';
			}
			$html .= '<div class="team_social">';
				$html .= $facebook . $twitter . $gplus . $linkedin . $pinterest . $instagram;
			$html .= '</div>';
		$html .= '</div>';
	$html .= '</div>';
	
	return $html;	
}

//////////////////////////////////////////////////////////////////
// Image Carousel 2
//////////////////////////////////////////////////////////////////

add_shortcode('vc_carousel2', 'shortcode_vc_carousel2');
function shortcode_vc_carousel2($atts) {
	extract(shortcode_atts(array(
		'images' => '',	
		'visible_items' => '1',
		'timeout' => '2000',
		'img_size' => 'thumbnail',
		'onclick' => 'link_image',
		'custom_links' => '',
		'custom_links_target' => '',
		'autoplay' => 'yes',
		'navigation' => 'yes',
		'el_class' => ''
	), $atts));	
	
	$gal_images = '';
	$link_start = '';
	$link_end = '';
	
	$autoplay = ($autoplay == 'yes') ? 'true' : 'false';
	
	if ( '' === $images ) {
		$images = '-1,-2,-3';
	}
	
	$images = explode( ',', $images );
	$i = - 1;
	
	if ( $onclick == 'custom_link' ) {
		$custom_links = explode( ',', $custom_links );
	}
	
	foreach ( $images as $attach_id ) {
		$i ++;
		if ( $attach_id > 0 ) {
			if(function_exists('wpb_getImageBySize')){
				$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $attach_id, 'thumb_size' => $img_size ) );
			}
		} else {
			$post_thumbnail = array();
			$post_thumbnail['thumbnail'] = '<img src="' . vc_asset_url( 'vc/no_image.png' ) . '" />';
			$post_thumbnail['p_img_large'][0] = vc_asset_url( 'vc/no_image.png' );
		}
	
		$thumbnail = $post_thumbnail['thumbnail'];
		$p_img_large = $post_thumbnail['p_img_large'];
		$link_start = $link_end = '';
	
		if ( $onclick == 'link_image' ) {
			$link_start = '<a class="prettyphoto" href="' . $p_img_large[0] . '"' . $pretty_rel_random . '>';
			$link_end = '</a>';
		} else if ( $onclick == 'custom_link' && isset( $custom_links[$i] ) && $custom_links[$i] != '' ) {
			$link_start = '<a href="' . $custom_links[$i] . '"' . ( ! empty( $custom_links_target ) ? ' target="' . $custom_links_target . '"' : '' ) . '>';
			$link_end = '</a>';
		}
		$gal_images .= '<div>' . $link_start . $thumbnail . $link_end . '</div>';
	}
	
	$html = '';
	
		$html .= '<div class="clients_carousel reviews '.$el_class.'" data-0="2" data-480="3" data-768="3" data-992="'.$visible_items.'" data-speed="400" data-visible-items="'.$visible_items.'" data-autoplay="'.$autoplay.'" data-timeout="'.$timeout.'" data-navigation="'.$navigation.'">';
	
			$html .= $gal_images;
	
		$html .= '</div>';
	
	return $html;
}

//////////////////////////////////////////////////////////////////
// Testimonials
//////////////////////////////////////////////////////////////////

add_shortcode('vc_testimonials', 'shortcode_vc_testimonials');
function shortcode_vc_testimonials($atts, $content = null) {
	extract(shortcode_atts(array(
		'items' => '5',	
		'type' => 'carousel',
		'test_images' => 'yes',
		'test_style' => 'center',
		'cols' => 'cols-1',
		'visible_items' => '1',
		'timeout' => '2000',
		'include' =>'',
		'autoplay' => 'yes',
		'navigation' => 'yes',
		'dots_color' => '#5bc98c',
		'dots_size' => 'small',
		'font_size' => '14',
		'font_style' => 'normal',
		'author_font_size' => '16',
		'font_weight' => '300',
		'author_font_weight' => '600',
		'style' => 'green',
		'custom_color' => '#333333',
		'testimonial_author' => '#5bc98c',
		'testimonial_link' => '#333333',
		'author_link_font_size' => '12',
		'el_class' => ''
	), $atts));	

	global $test_counter;

	$styles_render = '';	

	$image_pos = $dots_pos = '';
	
	$autoplay = ($autoplay == 'yes') ? 'true' : 'false';
	
	$args = array(
    	'post_type' => 'testimonials', 
    	'posts_per_page' => $items       
	);	
	if($include) {		
		$args['post__in'] = explode( ',', $include );
	}
	$show_images = ( $test_images == 'no' ) ? ' hide_images ' : '';
	
	/* customize the testimonial description */
	$force_color = ($style == 'custom') ? 'color: '.$custom_color.';' : '';	
	$font_size = ($font_size != '14') ? 'font-size: '.$font_size.'px;' : '';	
	$font_weight = ($font_weight != '300') ? 'font-weight: '.$font_weight.';' : '';
	$font_face_style = ($font_style != 'normal') ? 'font-style:'.$font_style . ';' : '';
	
	$font_style = 'style="'.$font_size.' ' . $font_weight . ' ' . $force_color . ' ' . $font_face_style .'"';	

	/* customize the testimonial author */	
	$author_font_size = ($author_font_size) ? 'font-size:' . $author_font_size . 'px; ' : '';
	$author_font_weight = ($author_font_weight != '600') ? 'font-weight:'.$author_font_weight . '; ' : '';
	$testimonial_author = ($testimonial_author && $style == 'custom' ) ? 'color:'. $testimonial_author . '; ' : '';
	$testimonial_link = ($testimonial_link && $style == 'custom') ? 'color:'.$testimonial_link. '; ' : '';
	$testimonial_link_size = ($author_link_font_size) ? 'font-size:'.$author_link_font_size .'px;' : '';

	$author_style = 'style="' . $author_font_weight . $author_font_size . $testimonial_author.'"';	
	$link_output = 'style="' . $testimonial_link . $testimonial_link_size . '"';

	if( $test_style == 'left') {
		
		$image_pos = 'left_image';
		
		if($visible_items == 1) {
			$dots_pos = 'left_dots ';		
		}
	}	
	
	$current_link = $_SERVER["REQUEST_URI"];
	// add an unique class to each button
	if(strpos($current_link, 'vc_editable=true')) {
		$test_counter = rand();
	}
	else{
		if( ! isset($test_counter) ){
		  $test_counter = 1;
		}
		else{
		  $test_counter ++;
		}
	}
	
	
	if($navigation == 'yes') {
		$styles_render = '<style type="text/css" scoped="scoped">';
			$styles_render .= '.test_scope_' . $test_counter . '.owl-theme .owl-dots .owl-dot.active span, .test_scope_' . $test_counter . '.owl-theme .owl-dots .owl-dot:hover span{';
				$styles_render .= 'background-color:'.$dots_color.';';				
			$styles_render .= '}';			
		$styles_render .= '</style>';
	}
	
	$html = '';
	$html .= $styles_render;
	if($type != 'grid') {
		$html .= '<div class="clients_carousel reviews test_scope_' . $test_counter . ' ' .$dots_size . ' ' . $dots_pos . $show_images . $el_class . '" data-0="1" data-480="1" data-768="1" data-992="1" data-speed="800" data-visible-items="'.$visible_items.'" data-autoplay="'.$autoplay.'" data-timeout="'.$timeout.'" data-navigation="'.$navigation.'">';
			//
	}
	else {
		$html .= '<div class="clients_grid ' . $cols . $show_images . ' clearfix">';	
	}
		//$html .= $include.'-----------------------------------';
			
			$works = new WP_Query($args);
			
			while($works->have_posts()): $works->the_post();
				
				$post = new StdClass();
				$post->ID = get_the_ID();
				
				$link = ( get_post_meta($post->ID, 'pyre_link', true) != '' ) ? '<a href="'.get_post_meta($post->ID, 'pyre_link', true).'" target="_blank" ' . $link_output .'>'.get_post_meta($post->ID, 'pyre_link_text', true).'</a>' : '<span ' . $link_output . '>'. get_post_meta($post->ID, 'pyre_link_text', true) . '</span>';
				
				$html .= '<div class="review '.$image_pos.'">';
					if(get_the_post_thumbnail($post->ID, 'testimonials')) {
						$html .= '<div class="review_picture">';
							$html .= get_the_post_thumbnail($post->ID, 'testimonials');
						$html .= '</div>';
					}
					$html .= '<div class="review_inside ">';
						$html .= '<div class="comment_quote" '.$font_style.'>';
							$html .= get_the_content();
						$html .= '</div>';
					$html .= '</div>';	
					$html .= '<div class="comment_details clearfix">';
						
						$html .= '<div class="comment_author_details">';
							$html .= '<div class="comment-author "><span class="'.$style.'" '.$author_style.'>'.get_the_title().'</span>'.'<br>'.$link;
							$html .= '</div>';
							
						$html .= '</div>';
					$html .= '</div>';
				$html .= '</div>';
				
			endwhile;	
			wp_reset_query();
			
		$html .= '</div>';
	//}

	return $html;
}

//////////////////////////////////////////////////////////////////
// Clients
//////////////////////////////////////////////////////////////////

add_shortcode('vc_clients', 'shortcode_vc_clients');
function shortcode_vc_clients($atts, $content = null) {
	extract(shortcode_atts(array(
		'items' => '6',	
		'include' => '',
		'visible_items' => '5',
		'timeout' => '2000',
		'autoplay' => 'yes',
		'navigation' => 'yes',		
		'el_class' => ''
	), $atts));	
	
	$autoplay = ($autoplay == 'yes') ? 'true' : 'false';
	
	$args = array(
    	'post_type' => 'clients',
        'paged' => 1,
        'posts_per_page' => $items,
	);	
	if($include ){
		$args['post__in'] = explode( ',', $include );
	}
	
	$html = '';
	//$html = '<div style="display:table; height:100%; width:100%; table-layout:fixed;">';
	$html .= '<div data-0="2" data-480="3" data-768="3" data-992="'.$visible_items.'" class="clients_carousel ' . $el_class . '" data-visible-items="'.$visible_items.'" data-autoplay="'.$autoplay.'" data-timeout="'.$timeout.'" data-navigation="'.$navigation.'">';
		
		$works = new WP_Query($args);
		
		while($works->have_posts()): $works->the_post();
			
			$post = new StdClass();
			$post->ID = get_the_ID();
			
			$html .= '<div>';
				if( get_post_meta($post->ID, 'pyre_link', true) != '' ) {
					$html .= '<a href="'.get_post_meta($post->ID, 'pyre_link', true).'" target="'.get_post_meta($post->ID, 'pyre_target', true).'">'.get_the_post_thumbnail($post->ID, 'blog-medium').'</a>';
				}
				else {					
					$html .= get_the_post_thumbnail($post->ID, 'blog-medium');
				}
			$html .= '</div>';
			
		endwhile;	
		wp_reset_query();
		
	//$html .= '</div>';
	$html .= '</div>';
	
	return $html;
}

//////////////////////////////////////////////////////////////////
// WooCommerce Product Slider
//////////////////////////////////////////////////////////////////

if(class_exists('WooCommerce')) {

	add_shortcode('woo_carousel', 'shortcode_woo_carousel');

	function shortcode_woo_carousel($atts, $content = null) {
		extract(shortcode_atts(array(
			'items' => '-1',	
			'populate' => 'all',
			'include' => '',
			'categ_select' => '',
			'orderby' => 'date',
			'order' => 'DESC',
			'visible_items' => '4',
			'timeout' => '3000',
			'autoplay' => 'yes',
			'navigation' => 'yes',		
			'el_class' => ''
		), $atts));	

		global $product, $data, $woocommerce;

		$autoplay = ($autoplay == 'yes') ? 'true' : 'false';

		$args = array(
			'post_type'      => 'product',
			'posts_per_page' => $items,
			'meta_query'     => array(
				array(
					'key'     => '_thumbnail_id',
					'compare' => '!=',
					'value'   => null
				),
				array(
					'key' => '_visibility',
					'value' => array( 'catalog', 'visible' ),
					'compare' => 'IN'
				)						
			),
			'order' => $order
		);

		if ( $categ_select ) {
			$cat_id            = explode( ',', $categ_select );
			$args['tax_query'] =
				array(
					array(
						'taxonomy' => 'product_cat',					
						'field'    => 'id',
						'terms'    => $cat_id
					)
				);
		}	

		if($include ){
			$args['post__in'] = explode( ',', $include );
		}

		switch ( $populate ) {
			case 'featured' :
				$args['meta_query'][] = array(
					'key'   => '_featured',
					'value' => 'yes'
				);
			break;

			case 'onsale' :
				$product_ids_on_sale    = wc_get_product_ids_on_sale();
				$product_ids_on_sale[]  = 0;
				$args['post__in'] = $product_ids_on_sale;
			break;

			case 'toprated': 
				$args['meta_query'][] = array(
					'key'   => '_wc_average_rating',
					'compare' => '>',
					'value' => 0
				);
			break;

			case 'bestselling':
				$args['meta_query'][] = array(
					'key' => 'total_sales',
					'compare' => '>',
					'value' => 0
				);
			break;
		}	

		switch ( $orderby ) {
				case 'price' :
					$args['meta_key'] = '_price';
					$args['orderby']  = 'meta_value_num';
				break;

				case 'random' :
					$args['orderby']  = 'rand';
				break;

				case 'sales' :
					$args['meta_key'] = 'total_sales';
					$args['orderby']  = 'meta_value_num';
				break;

				default :
					$query_args['orderby']  = 'date';
			}

		$products = new WP_Query( $args );

		$html = '';

		if ( $products->have_posts() ) {			
			$html .= '<div class="woocommerce woo_carousel products">';
				$html .= '<div data-0="2" data-480="3" data-768="3" data-992="4" class="clients_carousel ' . $el_class . '" data-visible-items="'.$visible_items.'" data-autoplay="'.$autoplay.'" data-timeout="'.$timeout.'" data-navigation="no" show-nav="yes">';				
						while ( $products->have_posts() ) {						
							$products->the_post();
							ob_start();
								wc_get_template( 'content-product.php', array( 'show_rating' => false ) );
							$html .= sprintf( '<ul class="products">%s</ul>', ob_get_clean() );				
						}
						wp_reset_query();
					$html .= '</ul>';
				$html .= '</div>';
			$html .= '</div>';
		}

		return $html;

	}
}
//////////////////////////////////////////////////////////////////
// Flat Portfolio
//////////////////////////////////////////////////////////////////


add_shortcode('vc_portfolio_el', 'shortcode_vc_portfolio_el');
function shortcode_vc_portfolio_el($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'items' => '8',
		'layout' => 'normal',
		'thumbs_vs_videos' => 'thumb',		
		'columns_normal' => '5',
		'columns_fullscreen' => '5',
		'show_filters' => 'yes',
		'show_icons' => 'yes',
		'port_details' => 'hover',
		'style' => 'default',
		'title_font_size' => '15px',
		'title_uppercase' => 'yes',
		'port_date' => 'no',
		'port_date_color' => '#777777',
		'date_font_size' => '',
		'port_title_color' => '#ffffff',
		'port_bg_color' => '#5bc98c',
		'port_icon_color' => '#ffffff',
		'port_mask_color' => 'rgba(0,0,0,0.6)',
		'category_id' => '',
		'filter_pos' => '',
		'css_animation' => '',
		'include_categ' => '',
		'include' => '',
		'el_class' => ''
	), $atts));	
	
	global $port_counter;
	
	if(function_exists('getCSSAnimation') ){
		$css_animation = getCSSAnimation($css_animation);
	}
	
	$current_link = $_SERVER["REQUEST_URI"];
	// add an unique class to each button
	if(strpos($current_link, 'vc_editable=true')) {
		$port_counter = rand();
	}
	else{
		if( ! isset($port_counter) ){
		  $port_counter = 1;
		}
		else{
		  $port_counter ++;
		}
	}
	
	$show_icons = ( $show_icons =='no' ) ? ' hide_icons' : '';
	
	$styles_render = '';
	
	if($style == 'custom') {
		$styles_render = '<style type="text/css" scoped="scoped">';
			$styles_render .= '.portfolio_scope_' . $port_counter . ' figure.effect-zoe figcaption {';
				$styles_render .= 'background-color:'.$port_bg_color.';';				
			$styles_render .= '}';			
			$styles_render .= '.portfolio_scope_' . $port_counter . ' figure.effect-zoe h3 a {';
				$styles_render .= 'color:'.$port_title_color.';';				
			$styles_render .= '}';
			$styles_render .= '.portfolio_scope_' . $port_counter . ' figure.effect-zoe h3 {';
				$styles_render .= 'font-size:'.$title_font_size.'; line-height:1;';
				if($title_uppercase == 'no') {
					$styles_render .= 'text-transform:none;';
				}				
			$styles_render .= '}';
			$styles_render .= '.portfolio_scope_' . $port_counter . ' figure .portfolio_date {';
				$styles_render .= 'color:'.$port_date_color.';';
				$styles_render .= 'font-size:'.$date_font_size.';';				
			$styles_render .= '}';
			$styles_render .= '.portfolio_scope_' . $port_counter . ' figure .effect-overlay .zoomin, .portfolio_scope_' . $port_counter . ' figure .effect-overlay .launch {';
				$styles_render .= 'border-color:'.$port_icon_color.';';				
			$styles_render .= '}';
			$styles_render .= '.portfolio_scope_' . $port_counter . ' figure .effect-overlay a {';
				$styles_render .= 'color:'.$port_icon_color.';';				
			$styles_render .= '}';
			$styles_render .= '.portfolio_scope_' . $port_counter . ' figure .effect-overlay {';
				$styles_render .= 'background-color:'.$port_mask_color.';';				
			$styles_render .= '}';
		$styles_render .= '</style>';
	}
	
	$html = '';
	
	$html .= $styles_render;
	
	$filter_pos = ($filter_pos !='left' ) ? 'style="text-align: '.$filter_pos.';"' : '';
	
	$cols = ($layout == 'normal') ? $columns_normal : $columns_fullscreen;
	
	$fullscreen = ($layout == 'fullscreen') ? ' fullscreen' : '';
	
	$port_details = ($port_details == 'below') ? ' show_meta' : ' icons_extra_margin';	
	
	if($layout == 'fullscreen') {
		switch ($columns_fullscreen){
			case 5:
				$css_out = 'portfolio-three';
			break;
			case 4:
				$css_out = 'portfolio-two';
			break;
			default:
				$css_out = 'portfolio-two';
			break;
		}
	}
	else {
		switch ($columns_normal){
			case 1:
				$css_out = 'portfolio-one';
				$nr = 1;
			break;
			case 2:
				$css_out = 'portfolio-two';
				$nr = 2;
			break;
			case 3:
				$css_out = 'portfolio-three';
				$nr = 3;
			break;
			default:
				$css_out = 'portfolio-four';
				$nr = 4;
			break;
		}
	}

	$categ_arr = array();
	$categ_arr = explode(',',$include_categ);	
	
	$html .= '<div id="content" class="'.$el_class.'">';
		if($show_filters == 'yes'):

			//if(!get_post_meta(get_the_ID(), 'pyre_portfolio_category', true)):
               
                $portfolio_category = get_terms('portfolio_category');

				if($portfolio_category && ( sizeof($categ_arr) > 1 || !$include_categ) ):
					$html.= '<div class="inner">';
						$html.='<ul class="portfolio-tabs clearfix" '.$filter_pos.'>';
							$html .= '<li class="active"><a data-filter="*" href="#">'. __( 'All', 'Creativo' ).'</a></li>';

							if($include_categ && sizeof($categ_arr) > 1) {		
								foreach($categ_arr as $categ_id){
									$portfolio_cat = get_term( $categ_id, 'portfolio_category' );
									$html .= '<li><a data-filter=".' . $portfolio_cat->slug . '" href="#">' . $portfolio_cat->name . '</a></li>';
								}
							}
							else{
								foreach($portfolio_category as $portfolio_cat):
									$html .= '<li><a data-filter=".'. $portfolio_cat->slug.'" href="#" target="_self">'.$portfolio_cat->name.'</a></li>';
								endforeach; 
							}

						$html.='</ul>';
					$html .= '</div>';	
				//endif;
			endif;
		endif;	
		$html .= '<div class="portfolio-wrapper grid' . $fullscreen . $port_details . $show_icons . ' portfolio_scope_'.$port_counter.' clearfix">';	
						
						$args = array(
                            'post_type' => 'creativo_portfolio',
                            'paged' => 1,
                            'posts_per_page' => $items,
                        );
                        if($include ){
							$args['post__in'] = explode( ',', $include );
						}						

                        if($include_categ){
                            $args['tax_query'][] = array(
                                'taxonomy' => 'portfolio_category',
                                'field' => 'ID',
                                'terms' => $categ_arr
                            );
                        }
						$works = new WP_Query($args);
						while($works->have_posts()): $works->the_post();
							$post = new StdClass();
							$post->ID = get_the_ID();
							if(has_post_thumbnail() || get_post_meta($post->ID, 'pyre_youtube', true) || get_post_meta($post->ID, 'pyre_vimeo', true)):
							
								$item_classes = '';
								$item_cats = get_the_terms($post->ID, 'portfolio_category');
								$portf_cat = wp_get_object_terms($post->ID, 'portfolio_category');
								if($item_cats):
								foreach($item_cats as $item_cat) {
									$item_classes .= $item_cat->slug . ' ';
								}
								endif;
								
								$thumb_link = wp_get_attachment_image_src(get_post_thumbnail_id(), $css_out);
								
								$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
								
								if( $thumbs_vs_videos != 'video') {
									$html .= '<figure class="effect-zoe cols-'.$cols.' '. $item_classes . '">';	
										$html .= '<div class="figure_image_holder">';
											$html .= get_the_post_thumbnail($post->ID, $css_out);
											$html .= '<div class="effect-overlay">';
												$html .= '<div class="zoomin"><a href="'. $full_image[0] .'" rel="prettyPhoto"><i class="fa fa-search"></i></a></div>';
												if (get_post_meta($post->ID, 'pyre_custom_link', true) != '') {
													$html .= '<div class="launch"><a href="'. get_post_meta($post->ID, 'pyre_custom_link', true) .'" target="'. get_post_meta($post->ID, 'pyre_custom_link_target', true) .'"><i class="fa fa-link"></i></a></div>';
												}
												else {
													$html .= '<div class="launch"><a href="'. get_permalink($post->ID) .'"><i class="fa fa-link"></i></a></div>';
												}
											$html .= '</div>';
										$html .= '</div>';	
										$html .= '<figcaption>';
											if (get_post_meta($post->ID, 'pyre_custom_link', true) != '') {
												$html .= '<h3><a href="'. get_post_meta($post->ID, 'pyre_custom_link', true) .'" target="'. get_post_meta($post->ID, 'pyre_custom_link_target', true) .'">'. get_the_title().'</a></h3>';
											}
											else {
												$html .= '<h3><a href="'. get_permalink($post->ID) .'">'. get_the_title().'</a></h3>';
											}
											if($port_date =='yes'){
												$html .= '<div class="portfolio_date">'.get_the_date('', $post->ID).'</div>';
											}
										$html .= '</figcaption>';
									$html .= '</figure>';
								}
								else {
									if( !get_post_meta($post->ID, 'pyre_youtube', true) && !get_post_meta($post->ID, 'pyre_vimeo', true) ) {
		                                $html .= '<figure class="effect-zoe cols-'.$cols.' '. $item_classes . '">';	
		                                	$html .= '<div class="figure_image_holder">';
												$html .= get_the_post_thumbnail($post->ID, $css_out);
												$html .= '<div class="effect-overlay">';
													$html .= '<div class="zoomin"><a href="'. $full_image[0] .'" rel="prettyPhoto"><i class="fa fa-search"></i></a></div>';
													if (get_post_meta($post->ID, 'pyre_custom_link', true) != '') {
														$html .= '<div class="launch"><a href="'. get_post_meta($post->ID, 'pyre_custom_link', true) .'" target="'. get_post_meta($post->ID, 'pyre_custom_link_target', true) .'"><i class="fa fa-link"></i></a></div>';
													}
													else {
														$html .= '<div class="launch"><a href="'. get_permalink($post->ID) .'"><i class="fa fa-link"></i></a></div>';
													}
												$html .= '</div>';
											$html .= '</div>';	
											$html .= '<figcaption>';
												if (get_post_meta($post->ID, 'pyre_custom_link', true) != '') {
													$html .= '<h3><a href="'. get_post_meta($post->ID, 'pyre_custom_link', true) .'" target="'. get_post_meta($post->ID, 'pyre_custom_link_target', true) .'">'. get_the_title().'</a></h3>';
												}
												else {
													$html .= '<h3><a href="'. get_permalink($post->ID) .'">'. get_the_title().'</a></h3>';
												}
												if($port_date =='yes'){
													$html .= '<div class="portfolio_date">'.get_the_date('', $post->ID).'</div>';
												}
											$html .= '</figcaption>';
										$html .= '</figure>';
									}
									else {
										$html .= '<figure class="effect-zoe cols-'.$cols.' '. $item_classes . '">';	
											if( get_post_meta($post->ID, 'pyre_youtube', true) != ''){ 
						                        $html .= '<div class="video-container">';                        	
						                        	$html .= do_shortcode('[youtube id="'.get_post_meta($post->ID, 'pyre_youtube', true).'" ]');                               
						                        $html .= '</div>';					                        
											}  
											if( get_post_meta($post->ID, 'pyre_vimeo', true) != ''){ 
						                        $html .= '<div class="video-container">';                       
						                            $html .= do_shortcode('[vimeo id="'.get_post_meta($post->ID, 'pyre_vimeo', true).'" width="600" height="350"]');
						                        $html .= '</div>';
	                        				}
											
											$html .= '<figcaption>';											
												$html .= '<h3><a href="'. get_permalink($post->ID) .'">'. get_the_title().'</a></h3>';	
												if($port_date =='yes'){
													$html .= '<div class="portfolio_date">'.get_the_date('', $post->ID).'</div>';										
												}
											$html .= '</figcaption>';
										$html .= '</figure>';
									}
								}							
										
							endif;							
						endwhile;
						wp_reset_query();
		$html .= '</div>';
	$html .= '</div>';
	
	return $html;
	
}

//////////////////////////////////////////////////////////////////
// 3D Portfolio
//////////////////////////////////////////////////////////////////

add_shortcode('recent_works', 'shortcode_recent_works');
function shortcode_recent_works($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'items' => '8',
		'columns' => '4',
		'show_filters' => 'yes',
		'include_categ' => '',
		'include' => '',
		'show_tags' => 'yes',
		'category_id' => '',
		'el_class' => ''
	), $atts));	

	$show_tags = ( $show_tags =='no' ) ? 'no_tags' : '';

	$categ_arr = array();
	$categ_arr = explode(',',$include_categ);	

	//selecting the css according to the number of columns
	switch ($columns){
		case 1:
			$css_out = 'portfolio-one';
			$nr = 1;
		break;
		case 2:
			$css_out = 'portfolio-two';
			$nr = 2;
		break;
		case 3:
			$css_out = 'portfolio-three';
			$nr = 3;
		break;
		default:
			$css_out = 'portfolio-four';
			$nr = 4;
		break;
	}

	$html .= '<div id="content" class="'.$css_out . ' ' . $el_class .'">';
		if($show_filters == 'yes'):
			//if(!get_post_meta(get_the_ID(), 'pyre_portfolio_category', true)):
                $portfolio_category = get_terms('portfolio_category');
				if($portfolio_category && ( sizeof($categ_arr) > 1 || !$include_categ) ):
					$html.='<ul class="portfolio-tabs clearfix">';

						$html .= '<li class="active"><a data-filter="*" href="#">'. __( 'All', 'Creativo' ).'</a></li>';

						if($include_categ && sizeof($categ_arr) > 1) {		
							foreach($categ_arr as $categ_id){
								$portfolio_cat = get_term( $categ_id, 'portfolio_category' );
								$html .= '<li><a data-filter=".' . $portfolio_cat->slug . '" href="#">' . $portfolio_cat->name . '</a></li>';
							}
						}
						else{
							foreach($portfolio_category as $portfolio_cat):
								$html .= '<li><a data-filter=".'. $portfolio_cat->slug.'" href="#">'.$portfolio_cat->name.'</a></li>';
							endforeach; 
						}
						
					$html.='</ul>';
				endif;
			//endif;
		endif;	
		$html .= '<div class="portfolio-wrapper">';	
						 	
						$args = array(
                            'post_type' => 'creativo_portfolio',
                            'paged' => 1,
                            'posts_per_page' => $items,
                        );						
                        if($include ){
							$args['post__in'] = explode( ',', $include );
						}
                        if($include_categ){
                            $args['tax_query'][] = array(
                                'taxonomy' => 'portfolio_category',
                                'field' => 'ID',
                                'terms' => $categ_arr
                            );
                        }
						$works = new WP_Query($args);
						while($works->have_posts()): $works->the_post();
							$post = new StdClass();
							$post->ID = get_the_ID();
							if(has_post_thumbnail() || get_post_meta($post->ID, 'pyre_youtube', true) || get_post_meta($post->ID, 'pyre_vimeo', true)):
							
								$item_classes = '';
								$item_cats = get_the_terms($post->ID, 'portfolio_category');
								$portf_cat = wp_get_object_terms($post->ID, 'portfolio_category');
								if($item_cats):
								foreach($item_cats as $item_cat) {
									$item_classes .= $item_cat->slug . ' ';
								}
								endif;
								
								$thumb_link = wp_get_attachment_image_src(get_post_thumbnail_id(), $css_out);
								
								$args_item = array(
										'post_type' => 'attachment',
										'numberposts' => '4',
										'post_status' => null,
										'post_parent' => $post->ID,
										'orderby' => 'menu_order',
										'order' => 'ASC',
										'exclude' => get_post_thumbnail_id()
									);
								$attachments_item = get_posts($args_item);
								
								$html .='<div class="portfolio-item '.$item_classes.'">';
									if($nr == 1){
										$html .='<div class="project-feed clearfix">';
											$html .= '<div class="full">';
												$html .='<div class="image_show">';
													$html .='<div class="project-feed clearfix">';											
														$html .= '<div class="ch-item portfolio-1">';			
															$html .= '<div class="ch-info portfolio-1">';
																$html .= '<div class="ch-info-front1 "><img src="'.$thumb_link[0].'"></div>';
																$html .= '<div class="ch-info-back1 portfolio-1" style="background-image:url('. $thumb_link[0].');">';
																if (get_post_meta($post->ID, 'pyre_custom_link', true) != '') {
																	$html .= '<div class="info">';
																		$html .= '<a href="'.get_post_meta($post->ID, 'pyre_custom_link', true).'" target="'. get_post_meta($post->ID, 'pyre_custom_link_target', true).'"><i class="fa fa-search"></i></a>';
																	$html .= '</div>';																	
																}
																else{
																	$html .= '<div class="info">';
																		$html .= '<a href="'.get_permalink($post->ID).'"><i class="fa fa-search"></i></a>';
																	$html .= '</div>';																	
																}																		
																$html .= '</div>';
															$html .= '</div>';
														$html .= '</div>';
													$html .='</div>';
												$html .='</div>';
												$html .= '<div class="description">';
													if (get_post_meta($post->ID, 'pyre_custom_link', true) != '') {
														$html .='<span class="title"><a href="'.get_post_meta($post->ID, 'pyre_custom_link', true).'" target="'. get_post_meta($post->ID, 'pyre_custom_link_target', true).'">'.get_the_title().'</a></span>';
													}
													else{
														$html .='<span class="title"><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></span>';
													}												
																							
													$html .='<p><span class="args ' . $show_tags . '"><i class="fa fa-tag"></i>'.get_the_term_list($post->ID, 'portfolio_category', '', ', ', '').'</span></P>';                                   											
													
													if (get_post_meta($post->ID, 'pyre_custom_link', true) != '') {
														$html .='<a href="'.get_post_meta($post->ID, 'pyre_custom_link', true).'" target="'. get_post_meta($post->ID, 'pyre_custom_link_target', true).'" class="button button_default small">'.__( 'View More', 'Creativo' ).'</a>';
													}
													else{
														$html .='<a href="'.get_permalink($post->ID).'" class="button button_default small">'.__( 'View More', 'Creativo' ).'</a><div class="clear"></div>';
													}
												$html .= '</div>';																		
											$html .= '</div>';	
										$html .= '</div>';

									}
									else{
											$html .='<div class="project-feed clearfix">';											
												$html .= '<div class="ch-item portfolio-'.$nr.'">';			
													$html .= '<div class="ch-info portfolio-'.$nr.'">';
														$html .= '<div class="ch-info-front'.$nr.' "><img src="'.$thumb_link[0].'"></div>';
														$html .= '<div class="ch-info-back'.$nr.'  portfolio-'.$nr.'" style="background-image:url('. $thumb_link[0].');">';
															if (get_post_meta($post->ID, 'pyre_custom_link', true) != '') {
																$html .= '<div class="info">';
																	$html .= '<a href="'.get_post_meta($post->ID, 'pyre_custom_link', true).'" target="'. get_post_meta($post->ID, 'pyre_custom_link_target', true).'"><i class="fa fa-search"></i></a>';
																$html .= '</div>';
															}
															else{
																$html .= '<div class="info">';
																	$html .= '<a href="'.get_permalink($post->ID).'"><i class="fa fa-search"></i></a>';
																$html .= '</div>';																
															}															
																
														$html .= '</div>';
													$html .= '</div>';
												$html .= '</div>';
											$html .='</div>';
											$html .= '<div class="portfolio_details">';
												if (get_post_meta($post->ID, 'pyre_custom_link', true) != '') {					
													$html .= '<h3><a href="'.get_post_meta($post->ID, 'pyre_custom_link', true).'" target="'. get_post_meta($post->ID, 'pyre_custom_link_target', true).'">'.get_the_title().'</h3>';
												}
												else{
													$html .= '<h3><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></h3>';
												}
													$html .= '<div class="tags ' . $show_tags . '"><i class="fa fa-tag"></i>'.get_the_term_list($post->ID, 'portfolio_category', '', ', ', '').'</div>';
											$html .= '</div>';	
																			
									}
								
							$html .='</div>';		
							endif;							
						endwhile;
						wp_reset_query();
		$html .= '</div>';
	$html .= '</div>';

	return $html;
}

//////////////////////////////////////////////////////////////////
// Google Maps Advanced
//////////////////////////////////////////////////////////////////

add_shortcode('gmap_advanced', 'shortcode_gmap_advanced');
function shortcode_gmap_advanced($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'title' => '', 
		'message' => '', 
		'address' => 'New York Ave, Brooklyn, New York',
	    'size' => '350px',
	    'map_style' => 'default',
	    'custom_map_style' => '',
	    'pop_size' => '350px',
	    'zoom' => 14,
	    'type' => 'ROADMAP',
		'email' => '',
		'phone' => '',
		'popup' => 'true',
		'scrollwheel' => 'true',
		'pan' => 'true',
		'zoom_control' => 'true',
		'type_control' => 'true',
		'streetview' => 'true',
	    'el_class' => '',
	), $atts));	

	$html = '';

	$custom_map_style = rawurldecode( base64_decode( strip_tags( $custom_map_style ) ) );

	global $map_counter;
		
	$current_link = $_SERVER["REQUEST_URI"];
	// add an unique class to each map
	if(strpos($current_link, 'vc_editable=true')) {
		$map_counter = rand();
	}
	else{
		if( ! isset($map_counter) ){
		  $map_counter = 1;
		}
		else{
		  $map_counter ++;
		}
	}	

	$map_id = 'google_map_element_'.$map_counter;

	$html .= '<div class="googlemaps gmap" data-id="'.$map_id.'" map-style="'.$map_style.'" pop-size="'.$pop_size.'" address="'.$address.'" data-map="'.$type.'" data-zoom="'.$zoom.'" data-title="'.$title.'" data-message="'.$message.'" data-email="'.$email.'" data-phone="'.$phone.'" data-popup="'.$popup.'" data-scrollwheel="'.$scrollwheel.'" data-pan="'.$pan.'" data-zoom_control="'.$zoom_control.'" data-type_control="'.$type_control.'" data-streetview="'.$streetview.'">';
		if($custom_map_style != '') {
			$html .= '<div class="custom_map_style" style="display:none; visibility: hidden;">'.$custom_map_style.'</div>';
		}
		$html .= '<div id="'.$map_id.'" class="google_map_render" style="height:'.$size.'">';
		$html .= '</div>';
	$html .= '</div>';

	return $html;

}

//////////////////////////////////////////////////////////////////
// Flip Box Element
//////////////////////////////////////////////////////////////////

add_shortcode('flip_box', 'shortcode_flip_box');
function shortcode_flip_box($atts, $content = null) {

	extract(shortcode_atts(array(
		'direction' => '',
		'front_head' => '',
		'front_text' => '',
		'front_text_size' => '',
		'front_bg_color' => '',
		'front_bg_img' => '',
		'front_bg_mask_color' => '',
		'front_inner_bg_color' => '',
		'front_inner_border_color' => '',
		'front_head_color' => '',
		'front_head_size' => '',
		'front_text_color' => '',
		'front_border' => '1px',
		'front_border_color' => '#dddddd',
		'front_border_radius' => '3px',
		'back_head' => '',
		'back_text' => '',
		'back_text_size' => '',
		'back_bg_color' => '',
		'back_bg_img' => '',
		'back_bg_mask_color' => '',
		'back_inner_bg_color' => '',
		'back_inner_border_color' => '',
		'back_head_color' => '',
		'back_head_size' => '',
		'back_text_color' => '',
		'back_border' => '1px',
		'back_border_color' => '#dddddd',	
		'back_border_radius' => '3px',	
		'icon_type' => 'none',	
		'icon_fontawesome' => '',
		'icon_openiconic' => '',
		'icon_typicons' => '',
		'icon_entypoicons' => '',
		'icon_linecons' => '',
		'icon_entypo' => '',
		'font_icon_size' => '',
		'front_icon_color' => '',
		'back_icon_color' => '',
		'back_link' => '',
		'target' => '_self',
		'icon_back' => 'yes',
		'css_animation' => '',
		'delay' => '',
		'el_class' => '',
	), $atts));

	$html = $icon_output = $icon_output_back = $html_link_open = $html_link_close = $styles_render = '';

	// Render the correct css animation
	if(function_exists('getCSSAnimation') ){
		$css_animation = getCSSAnimation($css_animation);
	}

	// Add delay to animations
	$delay = (!empty($delay)) ? 'data-delay="'.$delay.'"' : '';

	if( $icon_type != 'none' ) {
		if( function_exists('vc_icon_element_fonts_enqueue') ){
			vc_icon_element_fonts_enqueue( $icon_type );
		}		
		$iconClass = ( !empty(${"icon_" . $icon_type}) ) ? ${"icon_" . $icon_type} : 'fa fa-adjust';

		/* Icon Styling */
		$font_icon_size = ( !empty($font_icon_size) && ( $font_icon_size != '40px' ) ) ? 'font-size:' . $font_icon_size  . ';' : '';
		$front_icon_color = ( !empty($front_icon_color) && ( $front_icon_color != '' ) ) ? 'color:' . $front_icon_color . ';' : '';

		/* Icon Styling Back */
		$back_icon_color = ( !empty($back_icon_color) && ( $back_icon_color != '' ) ) ? 'color:' . $back_icon_color . ';' : '';

		/* Render Icon Front Style */
		$icon_styling = ( ( $font_icon_size !='' ) || ( $front_icon_color != '' ) ) ? 'style="' . $font_icon_size . $front_icon_color .'"' : '';
		
		/* Render Icon Back Style */
		$icon_styling_back = ( ( $font_icon_size !='' ) || ( $back_icon_color != '' ) ) ? 'style="' . $font_icon_size . $back_icon_color .'"' : '';

		/* Front Icon Output */
		$icon_output = '<i class="'.$iconClass.'" ' . $icon_styling  . '></i>';

		/* Back Icon Output */
		$icon_output_back = ( $icon_back != 'no' ) ? '<i class="'.$iconClass.'" ' . $icon_styling_back  . '></i>' : '';
	}		

	$direction = ( $direction == 'vert' ) ? 'vertical' : '';

	global $fb_counter;
	$current_link = $_SERVER["REQUEST_URI"];
	
	// add an unique class to each flip box element
	if(strpos($current_link, 'vc_editable=true')) {
		$fb_counter = rand();
	}
	else{
		if( ! isset($fb_counter) ){
		  $fb_counter = 1;
		}
		else{
		  $fb_counter ++;
		}
	}
	
	if( $front_inner_bg_color !='' || $front_inner_border_color !='' || $back_inner_bg_color != '' || $back_inner_border_color !='' ) {
		$styles_render = '<style type="text/css" scoped="scoped">';
			
			if( $front_inner_bg_color !='' || $front_inner_border_color !='') {
				$styles_render .= '.flip_box_' . $fb_counter . ' .front:before {';
					$styles_render .= 'content:""; position:absolute; top: 20px; left: 20px; width: calc(100% - 40px); height: calc(100% - 40px); z-index:2;';
					
					if( $front_inner_bg_color != '') {
						$styles_render .= 'background-color:'.$front_inner_bg_color.';';
					}
					
					if( $front_inner_border_color != '') {
						$styles_render .= 'border:1px solid ' . $front_inner_border_color . ';';
					}

				$styles_render .= '}';
			}

			if( $back_inner_bg_color !='' || $back_inner_border_color !='') {
				$styles_render .= '.flip_box_' . $fb_counter . ' .back:before {';
					$styles_render .= 'content:""; position:absolute; top: 20px; left: 20px; width: calc(100% - 40px); height: calc(100% - 40px); z-index:2;';
					
					if( $back_inner_bg_color != '') {
						$styles_render .= 'background-color:'.$back_inner_bg_color.';';
					}
					
					if( $back_inner_border_color != '') {
						$styles_render .= 'border:1px solid ' . $back_inner_border_color . ';';
					}

				$styles_render .= '}';
			}

		$styles_render .= '</style>';
	}
	

	/* Front Border Styling */
	$front_border = ( $front_border != '1px' ) ? 'border-width:' . $front_border . ';' : '';
	$front_border_radius = ( $front_border_radius != '3px' ) ? 'border-radius:' . $front_border_radius . ';-webkit-border-radius:' . $front_border_radius . ';' : '';
	$front_border_color = ( $front_border_color != '#dddddd' ) ? 'border-color:' . $front_border_color . ';' : '';

	/*Style the Front Text and Background */
	$front_bg_img_url = ( !empty( $front_bg_img ) )  ? wp_get_attachment_image_src( $front_bg_img, 'full' ) : '';

	$front_bg = ( $front_bg_color != '' && empty ($front_bg_img) ) ? 'background-color:' . $front_bg_color . ';' : ( ( !empty( $front_bg_img) ) ? 'background:url(' . $front_bg_img_url[0] . ') no-repeat; background-size: cover;' : '' );
	$front_text_color = ( $front_text_color != '' ) ? 'color:' . $front_text_color . ';' : '';
	$front_text_size = ( !empty($front_text_size) && $front_text_size !='13px') ? 'font-size:' . $front_text_size . ';' : '';

	/* Style the Front Mask */
	$front_mask_style = ( !empty($front_bg_mask_color) && !empty( $front_bg_img ) ) ? 'style="background-color:' . $front_bg_mask_color . ';"' : '';
	
	/*Style the Front Head */
	$front_head_color = ( $front_head_color != '' ) ? 'color:' . $front_head_color . ';' : '';
	$front_head_size = ( !empty($front_head_size) && $front_head_size != '24px' ) ? 'font-size: ' . $front_head_size . ';' : '';

	/* Back Border Styling */
	$back_border = ( $back_border != '1px' ) ? 'border-width:' . $back_border . ';' : '';
	$back_border_radius = ( $back_border_radius != '3px' ) ? 'border-radius:' . $back_border_radius . ';-webkit-border-radius:' . $back_border_radius . ';' : '';
	$back_border_color = ( $back_border_color != '#dddddd' ) ? 'border-color:' . $back_border_color . ';' : '';

	/*Style the Back Text and Background */
	$back_bg_img_url = ( !empty( $back_bg_img ) )  ? wp_get_attachment_image_src( $back_bg_img, 'full' ) : '';

	$back_bg = ( $back_bg_color != '' && empty( $back_bg_img ) ) ? 'background-color: ' . $back_bg_color . ';' : ( !empty( $back_bg_img ) ? 'background:url(' . $back_bg_img_url[0] . ') no-repeat; background-size: cover;' : '' );
	$back_text_color = ( $back_text_color != '' ) ? 'color:' . $back_text_color . ';' : '';
	$back_text_size = ( !empty($back_text_size) && $back_text_size !='13px') ? 'font-size:' . $back_text_size . ';' : '';

	/* Style the Front Mask */
	$back_mask_style = ( !empty($back_bg_mask_color) && !empty( $back_bg_img ) ) ? 'style="background-color:' . $back_bg_mask_color . ';"' : '';

	/*Style the Back Head */
	$back_head_color = ( $back_head_color != '' ) ? 'color:' . $back_head_color . ';' : '';
	$back_head_size = ( !empty($back_head_size) && $back_head_size != '24px' ) ? 'font-size: ' . $back_head_size . ';' : '';

	$front_style = ( ( $front_bg != '' ) || ( $front_text_color != '' || ( $front_text_size != '' || $front_border != '' || $front_border_color != '' || $front_border_radius != '' ) ) ) ? 'style="' . $front_bg . $front_text_color . $front_text_size . $front_border_color . $front_border . $front_border_radius . '"' : '';
	$front_head_style = ( $front_head_color != '' || $front_head_size != '' ) ? 'style= "' . $front_head_color . $front_head_size . '"' : '';

	$back_style = ( ( $back_bg != '' ) || ( $back_text_color != '' ) || ( $back_text_size != '' || $back_border != '' || $back_border_color != '' || $back_border_radius != '' ) ) ? 'style="' . $back_bg . $back_text_color . $back_text_size . $back_border_color . $back_border . $back_border_radius . '"' : '';
	$back_head_style = ( $back_head_color != '' || $back_head_size != '' ) ? 'style= "' . $back_head_color . $back_head_size . '"' : '';

	$html .= '<div class="flip-container flip_box_' . $fb_counter . ' ' . $direction . ' ' . $css_animation . ' ' . $el_class . '" ' . $delay . '>';
	$html .= $styles_render;
		$html .= '<div class="flipper">';
			$html .= '<div class="front" ' . $front_style . '>';
				if( $front_bg_mask_color != '' ) {
					$html .= '<div class="front_mask" ' . $front_mask_style . '></div>';
				}
				$html .= '<div class="front_inner">';					
					$html .= $icon_output;
					if($front_head != '') {
						$html .= '<h2 ' . $front_head_style . '>' . $front_head . '</h2>';
					}
					$html .= $front_text;
				$html .= '</div>';				
			$html .= '</div>';

			if( !empty($back_link) ) {
				$html_link_open = '<a href="' . $back_link . '" target="' . $target . '" class="flip_box_link">';
				$html_link_close = '</a>'; 
			}
			$html .= $html_link_open; // adds a link before entire div if link is set!
			$html .= '<div class="back" ' . $back_style . '>';
				if( $back_bg_mask_color != '' ) {
					$html .= '<div class="back_mask" ' . $back_mask_style . '></div>';
				}
				$html .= '<div class="back_inner">'; 
					$html .= $icon_output_back;
					if($back_head != '') {
						$html .= '<h3 ' . $back_head_style . '>' . $back_head . '</h3>';
					}
					$html .= $back_text; 
				$html .= '</div>';
			$html .= '</div>';
			$html .= $html_link_close; // closes the link opened above if link is set!
		$html .= '</div>';
	$html .= '</div>';

	return $html;

}


//////////////////////////////////////////////////////////////////
// Alert Message
//////////////////////////////////////////////////////////////////
add_shortcode('alert', 'shortcode_alert');
function shortcode_alert($atts, $content = null) {
	$html = '';
	$html .= '<div class="alert '.$atts['type'].'">';
		$html .= '<div class="msg">'.do_shortcode($content).'</div>';
		$html .= '<a href="#" class="toggle-alert">Toggle</a>';
	$html .= '</div>';

	return $html;
}

// Restaurant Menu item
//////////////////////////////////////////////////////////////////

add_shortcode('restaurant_menu', 'restaurant_menu_function');
function restaurant_menu_function ($atts, $content = null) {
	extract (shortcode_atts (array (
		'menu_item_title' => 'Cheeseburger Fries',
		'ingredients' => 'Cheese / Potatao / Ham / Gorgonzolla',
		'price' => '$14.9',
		'uppercase' => '',
		'menu_color' => '',
		'ingredients_color' => '',
		'price_color' => '',
		'menu_font_size' => '20',
		'price_font_size' => '20',
		'ingredients_font_size' => '12',
		'separator_color' => ''
	), $atts ) );

	$html = '';

	$separator_color = !empty($separator_color) ? 'style="border-color:'.$separator_color.';"' : '';

	$menu_color = !empty($menu_color) ? 'color: '.$menu_color.';' : '';
	$menu_font_size = !empty($menu_font_size) && ($menu_font_size != 20) ? 'font-size:'.$menu_font_size.'px;' : '';

	$price_color = !empty($price_color) ? 'color: '.$price_color.';' : '';
	$price_font_size = !empty($price_font_size) && ($price_font_size != 20) ? 'font-size:'.$price_font_size.'px;' : '';

	$ingredients_color = !empty($ingredients_color) ? 'color:'.$ingredients_color.';' : '';
	$ingredients_font_size = !empty($ingredients_font_size) && ($ingredients_font_size != 12) ? 'font-size:'.$ingredients_font_size.'px;' : '';

	$menu_style = !empty($menu_color) || !empty($menu_font_size) ? 'style="' . $menu_color . $menu_font_size .'"' : '';
	$price_style = !empty($price_color) || !empty($price_font_size) ? 'style="' . $price_color . $price_font_size .'"' : '';
	$ingredients_style = !empty($ingredients_color) || !empty($ingredients_font_size) ? 'style="' . $ingredients_color . $ingredients_font_size .'"' : '';

	$html .= '<div class="restaurant_item" '.$separator_color.'>';
		$html .= '<div class="restaurant_item_inner">';
			$html .= '<div class="resturant_title">';
				$html .= '<div class="restaurant_title_inner">';
					$html .= '<h4 '.$menu_style.'>' . $menu_item_title . '</h4>';
				$html .= '</div>';
				$html .= '<div class="resturant_title_price" '.$price_style.'>';
					$html .= $price;
				$html .= '</div>';
			$html .= '</div>';
			$html .= '<div class="restaurant_ingredients" '.$ingredients_style.'>';
				$html .= $ingredients;
			$html .= '</div>';
		$html .= '</div>';
	$html .= '</div>';

	return $html;

}

// Box Title
//////////////////////////////////////////////////////////////////

add_shortcode( 'ctitle', 'ctitle_func' );
function ctitle_func( $atts, $content = null ) {
  
  extract( shortcode_atts( array(
		'title' => 'We sell quality',
		'color' => '#666666',
		'href' => '',
		'target' => '_self',
		'background' => '#ffffff',
		'font_size' => '30',
		'font_weight' => 'normal',
		'uppercase' => 'yes',
		'position' => 'center',
		'separator_color' => '#ebebeb',
		'el_width' => '100',
		'css_animation' => '',
		'delay' => '',
		'el_class' => ''
	  ), $atts ) );
	  
	  $html = '';
	  
	  $delay = (!empty($delay)) ? 'data-delay="'.$delay.'"' : '';
	
		if(function_exists('getCSSAnimation') ){
			$css_animation = getCSSAnimation($css_animation);
		}
	  
	  $font_size = ($font_size != '') ? 'font-size: '. $font_size .'px;' : '';
	  
	  $font_weight = ($font_weight != 'normal') ? 'font-weight:' . $font_weight . ';' : '' ;
	  
	  $uppercase = ($uppercase != 'no') ? 'text-transform: uppercase;' : '' ;
	  
	  $color = ($color !='') ? 'color:'.$color.';' : '';
	  
	  $background = ($background != '') ? 'background-color:'.$background.';' : '';  

	  $title = ( $href != '' ) ? '<a href="' . $href . '" target="' . $target . '" style="' . $color . '">' . $title . '</a>' : $title;

	  /*
	  if($position == 'left') {
		  $position = 'vc_separator_align_left';
	  }
	  elseif($position == 'right') {
		  $position = 'vc_separator_align_right';
	  }
	  else {
		  $position = '';
	  }
	  */
	  $position_sep = ($position != '') ? 'vc_sep_pos_align_'.$position : '';
	  $position_text = ($position != '') ? 'vc_separator_align_'.$position : '';
	  
	  $separator_color = ($separator_color != '') ? 'style="border-color:' . $separator_color . ';"' : '';
	  
	  $el_width = ($el_width!='') ? ' vc_sep_width_'.$el_width : ' vc_sep_width_100';
	  
	  $style = 'style="'. $font_size . $font_weight . $uppercase . $color . $background . '"';  
	  
	  $html .= '<div class="vc_separator '. $position_text . ' ' . $position_sep.' ' . $el_width . ' ' . $css_animation . ' ' . $el_class . '" ' . $delay . '>';
	  	$html .= '<span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line" '.$separator_color.'></span></span>';
			$html .= '<h4 '.$style.'>'.$title.'</h4>';
		$html .= '<span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line" '.$separator_color.'></span></span>';
	  $html .= '</div>';
	  
	  return $html;
  
 // return '<div class="content_box_title" '.$style.'><span class="white" style="background-color: '.$background.'; color:'.$color.'; '.$margin.'">'.$title.'</span></div>';

}

/* Creativo Custom Widgets Render
-----------------------------------------------------------------*/
add_shortcode( 'vc_contact_us', 'vc_contact_us_func' );
function vc_contact_us_func( $atts, $content = null ) {
	
	$output = $title = $address = $phone = $fax = $email = $web = $el_class = '';
	
	extract( shortcode_atts( array(
		'title' => '',
		'address' => '',
		'phone' => '',
		'fax' => '',
		'email' => '',
		'web' => '',
		'el_class' => ''
	  ), $atts ) );
	  
	$output = '<div class="sidebar-widget vc_contact_us '.$el_class.'">';
	
		$type = 'Contact_Info_Widget_CR';
		$args = array( 'before_title'=>'<h3 class="sidebar-title">', 'after_title'=>'</h3>');
		ob_start();
		the_widget( $type, $atts, $args );
		$output .= ob_get_clean();
		
	$output .= '</div>';  
	
	return $output;
}

add_shortcode( 'vc_flickr_cr', 'vc_flickr_cr_func' );
function vc_flickr_cr_func( $atts, $content = null ) {
	
	$output = $title = $screen_name = $number = $el_class = '';
	
	extract( shortcode_atts( array(
		'title' => '',
		'screen_name' => '',
		'number' => '',		
		'el_class' => ''
	  ), $atts ) );
	  
	$output = '<div class="sidebar-widget vc_flickr_cr '.$el_class.'">';
	
		$type = 'Flickr_Widget';
		$args = array( 'before_title'=>'<h3 class="sidebar-title">', 'after_title'=>'</h3>');
		ob_start();
		the_widget( $type, $atts, $args );
		$output .= ob_get_clean();
		
	$output .= '</div>';  
	
	return $output;
}

add_shortcode( 'vc_twitter_cr', 'vc_twitter_cr_func' );
function vc_twitter_cr_func( $atts, $content = null ) {
	
	$output = $title = $address = $phone = $fax = $email = $web = $el_class = '';
	
	extract( shortcode_atts( array(
		'title' => '',
		'consumer_key' => '',
		'consumer_secret' => '',
		'access_token_secret' => '',
		'access_token' => '',
		'twitter_id' => '',
		'count' => '',
		'el_class' => ''
	  ), $atts ) );
	  
	$output = '<div class="sidebar-widget vc_twitter_cr '.$el_class.'">';
	
		$type = 'Tweets_Widget';
		$args = array( 'before_title'=>'<h3 class="sidebar-title">', 'after_title'=>'</h3>');
		ob_start();
		the_widget( $type, $atts, $args );
		$output .= ob_get_clean();
		
	$output .= '</div>';  
	
	return $output;
}

add_shortcode( 'vc_recent_portfolio_widget', 'vc_recent_portfolio_widget_func' );
function vc_recent_portfolio_widget_func( $atts, $content = null ) {
	
	$output = $title = $desc = $number = $el_class = '';
	
	extract( shortcode_atts( array(
		'title' => '',
		'desc' => '',
		'number' => '',
		'el_class' => ''
	  ), $atts ) );
	  
	$output = '<div class="sidebar-widget vc_recent_portfolio_widget '.$el_class.'">';
	
		$type = 'TZ_Recent_Portfolios_Widget';
		$args = array( 'before_title'=>'<h3 class="sidebar-title">', 'after_title'=>'</h3>');
		ob_start();
		the_widget( $type, $atts, $args );
		$output .= ob_get_clean();
		
	$output .= '</div>';  
	
	return $output;
}

add_shortcode( 'vc_recent_posts_widget', 'vc_recent_posts_widget_func' );
function vc_recent_posts_widget_func( $atts, $content = null ) {
	
	$output = $title = $desc = $number = $el_class = '';
	
	extract( shortcode_atts( array(
		'title' => '',
		'number' => '',
		'el_class' => ''
	  ), $atts ) );
	  
	$output = '<div class="sidebar-widget vc_recent_portfolio_widget '.$el_class.'">';
	
		$type = 'TZ_Blog_Widget';
		$args = array( 'before_title'=>'<h3 class="sidebar-title">', 'after_title'=>'</h3>');
		ob_start();
		the_widget( $type, $atts, $args );
		$output .= ob_get_clean();
		
	$output .= '</div>';  
	
	return $output;
}

add_shortcode( 'vc_pop_rec_tabs', 'vc_pop_rec_tabs_func' );
function vc_pop_rec_tabs_func( $atts, $content = null ) {
	
	$output = $posts = $recent = $show_comments = $show_recent_posts = $show_popular_posts = $comments = $el_class = '';
	
	extract( shortcode_atts( array(
		'posts' => '',
		'recent' => '',
		'comments' => '',
		'show_comments' => 'true',
		'show_recent_posts' => 'true',
		'show_popular_posts' => 'true',
		'el_class' => ''
	  ), $atts ) );
	  
	$output = '<div class="sidebar-widget vc_pop_rec_tabs_widget '.$el_class.'">';
	
		$type = 'Pyre_Tabs_Widget';
		$args = array( 'before_title'=>'<h3 class="sidebar-title">', 'after_title'=>'</h3>');
		ob_start();
		the_widget( $type, $atts, $args );
		$output .= ob_get_clean();
		
	$output .= '</div>';  
	
	return $output;
}



//////////////////////////////////////////////////////////////////
// Add buttons to tinyMCE
////////////////////////////////////////////////////////////////// 

add_action('init', 'add_button');

function add_button() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
     add_filter('mce_external_plugins', 'add_plugin');  
     add_filter('mce_buttons_3', 'register_button');  
   }  
}  

function register_button($buttons) {  
   array_push($buttons, "button", "divider", "dropcap", "highlight", "checklist", "testimonial", "custom_blockquote");  
   return $buttons;  
} 

function add_plugin($plugin_array) {  

   
   $plugin_array['button'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['dropcap'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['divider'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['highlight'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['checklist'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['testimonial'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['custom_blockquote'] = get_template_directory_uri().'/tinymce/customcodes.js';

   return $plugin_array;  
}  
