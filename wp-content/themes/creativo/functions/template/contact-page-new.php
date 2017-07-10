<?php
global $data;
if(get_post_meta($post->ID, 'pyre_en_sidebar', true) == 'no') {	
	$container = 'width:100%;';
	$sidebar_show = false;
}
else {
	$sidebar_show = true;
	if(get_post_meta($post->ID, 'pyre_sidebar_pos', true) == 'left') { 
		$container= 'float: right;';
		$sidebar = 'float: left;';	
	}
	else{ 
		$container= 'float: left;';
		$sidebar = 'float: right;';	
	}
}
?>		<div class="contact_map_holder">
			<?php
			$map_style = str_replace("map_","",$data['gmap_style']);
			$pop_size = '300px';
			$address = $data['gmap_address'];
			$type = $data['gmap_type'];
			$zoom = $data['map_zoom_level'];
			$title = $data['gmap_title'];
			$message = $data['gmap_desc'];
			$mail = $data['gmap_email'];
			$phone = $data['gmap_phone'];
			$scrollwheel = $data['map_scrollwheel'] ? 'true' : 'false';
			$pan = $data['map_zoomcontrol'] ? 'true' : 'false';
			$zoom_control = $data['map_zoomcontrol'] ? 'true' : 'false';
			$type_control = $data['map_type_control'] ? 'true' : 'false';
			$streetview = $data['map_street'] ? 'true' : 'false';

			$html .= '<div class="googlemaps gmap" data-id="contact_google_map_adv" map-style="'.$map_style.'" pop-size="'.$pop_size.'" address="'.$address.'" data-map="'.$type.'" data-zoom="'.$zoom.'" data-title="'.$title.'" data-message="'.$message.'" data-email="'.$mail.'" data-phone="'.$phone.'" data-popup="true" data-scrollwheel="'.$scrollwheel.'" data-pan="'.$pan.'" data-zoom_control="'.$zoom_control.'" data-type_control="'.$type_control.'" data-streetview="'.$streetview.'">';
				if($map_style =='custom' && $data['custom_code'] != '') {
					$html .= '<div class="custom_map_style" style="display:none; visibility: hidden;">'.$data['custom_code'].'</div>';
				}
				$html .= '<div id="contact_google_map_adv" class="google_map_render" style="height:'.$data['gmap_height'].'">';
				$html .= '</div>';
			$html .= '</div>';
			echo $html;
		?>
		</div>
		<div class="row clearfix">

        	<div class="post_container" style="<?php echo $container; ?>">
        		<?php
				while(have_posts()): the_post(); 	
				?>	
					<div class="blogpost">
							<?php the_content(); ?>
					</div>
				<?php					
				endwhile;	
				?> 
        	</div>
        	<?php 
        	if(get_post_meta($post->ID, 'pyre_en_sidebar', true) != 'no') {
        	?>
        		<!--BEGIN #sidebar .aside-->
        	    <div class="sidebar" style="<?php echo $sidebar; ?>">                
        	    	<?php //generated_dynamic_sidebar(); 
        	        if ( !function_exists( 'generated_dynamic_sidebar' ) || !generated_dynamic_sidebar() ): 
        	        endif;
        	        ?>            
        	    </div>    
        	    <!--END #sidebar .aside-->					                
        	<?php
        	}
        	?>
        </div>   	