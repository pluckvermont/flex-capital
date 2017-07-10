<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php global $data; ?>
<?php
if($data['favicon']){
?>
    <link rel="shortcut icon" href="<?php echo $data['favicon']; ?>" type="image/x-icon" />
<?php
}
?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />   

 <?php wp_head(); ?> 
 <style type="text/css">
	<?php
	ob_start();
	include_once get_template_directory() . '/functions/dynamic_css.php';
	$dynamic_css = ob_get_contents();
	ob_get_clean();
	echo less_css( $dynamic_css );
	?>
	</style>
 
<?php 
if($data['footer_code']) { echo $data['footer_code']; } 
if($data['header_code']) { echo $data['header_code']; } 
?>
<style type="text/css" id="ss">
</style>	
<link rel="stylesheet" type="text/css" id="skins">
</head>
<?php
$body_layout_width = '';
if($data['page_load_effect']) {		
	$body = 'page-with-animation';
}
if( $data['site_width'] == 'Boxed' ) {
	$body_layout = ' data-layout="boxed"';
	$body_layout_width = ' data-layout-width="'.$data['boxed_width'].'"';	
	if( $data['en_parallax'] == '1' ) {
		$body.=' parallax_class';	
		$container_style = 'style="background-size: cover; background-attachment:fixed;"  data-stellar-background-ratio="0.1"';
	}
}
if ( ( $data['site_width'] == 'Extra Wide' ) || ( $data['site_width'] == 'Wide' )  ) {
	$body_layout = ' data-layout="extra_wide"';	
	if ( $data['en_parallax'] == '1' ) {
		$container_parallax = ' parallax_class';	
		$container_style = 'style="background-size: cover; background-attachment:fixed;"  data-stellar-background-ratio="0.1"';
	}
}

$sticky_footer = $data['en_sticky_footer'] ? ' sticky-footer="true"' : ' sticky-footer="false"';

$mobile_menu_landscape = ($data['mobile_menu_landscape']) ? ' data-show-landscape="yes"' : ' data-show-landscape="no"';

if( ($data['header_position'] == 'left' ) || ($data['header_position'] == 'right' ) ) {
	$body .= ' side-header';		
}
?>
<body <?php body_class($body); echo $container_style . $body_layout . $mobile_menu_landscape . $body_layout_width . $sticky_footer; ?>>

<!-- side panel usage -->
<?php
if ($data['off_canvas_sidebar']) {
?>
	<div class="body-overlay"></div>
	<div id="side-panel" class="dark">
	    <div id="side-panel-trigger-close" class="side-panel-trigger_side">
	    	<a href="#" class="close_navbar"><i class="fa fa-close"></i></a>
	    	<?php dynamic_sidebar( 'sidebar-3' ); ?>
		</div>
	</div>
<?php
}
?>
<!-- side panel usage end -->
  
<?php
do_action('logo_navigation');
do_action('page_title');