<?php
/**
 * Add_action hooks for header.
 *
 * @author  Stef Ungureanu
 * @copyright Copyright (c) Stef Ungureanu
 * @link  http://rockythemes.com
 * @since  Version 5.6.8.4
 * @package  Creativo Framework
 */

add_action('logo_navigation', 'cr_logo_navigation');
add_action('page_title', 'cr_page_title');

/* Logo and Navigation Logic */
if(!function_exists('cr_logo_navigation')) {
	function cr_logo_navigation() {

		$current_post_id = get_queried_object_id();

		global $data;

		if($data['page_load_effect']) {
			$page_class =  'animsition';			
		}

		if( get_post_meta($current_post_id, 'pyre_main_menu', true) != 'default' ) {
			$main_menu = get_post_meta($current_post_id, 'pyre_main_menu', true);
		}
		else {
			$main_menu = '';
		}
		if( get_post_meta($current_post_id, 'pyre_one_menu', true) != 'default' ) {
			$one_menu = get_post_meta($current_post_id, 'pyre_one_menu', true);
		}
		else {
			$one_menu = '';
		}
		if( get_post_meta($current_post_id, 'pyre_side_menu', true) != 'default' ) {
			$side_menu = get_post_meta($current_post_id, 'pyre_side_menu', true);
		}
		else {
			$side_menu = '';
		}
			
		$header_class = ($data['enable_sticky']) ? 'sticky_h' : '';	
		$header_menu_modern = ($data['enable_sticky_menu_modern']) ? 'sticky_h_menu' : '';

		if( $data['en_parallax'] == '1' ) {			
			$container_style = 'style="background-size: cover; background-attachment:fixed;"  data-stellar-background-ratio="0.1"';
			$container_parallax = ' parallax_class';
		}

		if($boxed && get_post_meta($current_post_id, 'pyre_background', true) && get_post_meta($current_post_id, 'pyre_en_full_screen', 'no')=='yes'): 
	    ?>
			<img id="background" src="<?php echo get_post_meta($current_post_id, 'pyre_background', true); ?>" class="bgwidth">    
	    <?php
	    endif;
	    /* add custom width if header left/right */    
	    $container_margin = ( ( $data['header_position'] == 'left' && get_post_meta($post->ID, 'pyre_en_header', true) != 'no' ) || ($data['header_position'] == 'right' && get_post_meta($post->ID, 'pyre_en_header', true) != 'no' ) )  ? 'data-container-width=' . str_replace('px', '', $data['hlr_width']) . '' : 'data-container-width=0';	    
		?>
		<div <?php if( is_page_template ( 'page-one-full.php' ) ) { echo 'id=home'; } else { echo 'id="container"'; } ?> class="container <?php echo $page_class . $container_parallax; ?>" <?php echo $container_style; ?> <?php echo $container_margin . ' data-container-pos='.$data['header_position']; ?>>
		<?php if($data['en_top_bar'] && ( get_post_meta($current_post_id, 'pyre_en_topbar', true) != 'no' ) ) { ?>
	    	<div class="top_nav_out">
	            <div class="top_nav clearfix">
	            	<?php
					if($data['tb_left_content'] !='Leave Empty'){
					?>
	                    <div class="tb_left">
	                        <?php
							if($data['tb_left_content'] ) {	 
								if($data['tb_left_content'] =='contactinfo') { 
									get_template_part('functions/template/contact-info');
								} 
								elseif ($data['tb_left_content'] =='socialinks') {
									get_template_part('functions/template/social-links');
								}
								elseif ($data['tb_left_content'] =='nav') {
									get_template_part('functions/template/top-menu');
								}
							}
							else{
								get_template_part('functions/template/contact-info');
							}
	                        ?>
	                    </div>    
	                <?php    
					}
					?> 
	                
	                <?php
					if($data['tb_right_content'] !='Leave Empty'){
					?>
	                    <div class="tb_right">
	                        <?php
							if($data['tb_right_content'] ) {	 
								if($data['tb_right_content'] =='contactinfo') { 
									get_template_part('functions/template/contact-info');
								} 
								elseif ($data['tb_right_content'] =='socialinks') {
									get_template_part('functions/template/social-links');
								}
								elseif ($data['tb_right_content'] =='nav') {
									get_template_part('functions/template/top-menu');
								}
							}
							else{
								get_template_part('functions/template/social-links');
							}
	                        ?>
	                    </div>    
	                <?php    
					}
					?>                       
	            </div>
	        </div>   
	    <?php } ?>
	<?php 
	if( ($data['header_position'] =='left') || ($data['header_position'] =='right')) { ?>
		<?php 

		$elem_pos = $data['side_blocks']['enabled']; 
		$elem_pos = str_replace(" ", "-", array_map('strtolower',array_slice($elem_pos,1,(sizeof($elem_pos)-1))));

		?>
		<header class="header_inside_<?php echo $data['header_position']; ?> <?php echo $header_class; ?>">
	    	<div class="side_inside desktop_view">
	        	<?php 
				foreach ($elem_pos as $elem_pos_key ) {
					if($elem_pos_key == 'social-links') { ?>
						<div class="side_social">
							<?php get_template_part('functions/template/'.$elem_pos_key); ?>
	                    </div>
	                <?php        
					}
					elseif($elem_pos_key == 'contact-info') {?>
						<div class="side_contact">
							<?php get_template_part('functions/template/'.$elem_pos_key); ?>
	                    </div>
	                <?php        
					}
					else{
						get_template_part('functions/template/'.$elem_pos_key);
					}
				}
				?>
	        </div>
	        <div class="side_inside mobile_view">
	        	<div class="side_contact">
					<?php get_template_part('functions/template/contact-info'); ?>
	            </div>
	        	
	        	<div class="side_social">
					<?php get_template_part('functions/template/social-links'); ?>
	            </div>
	            <div class="side_logo">
	            	<?php get_template_part('functions/template/logo'); ?>
	            </div>
	        </div>
	    </header>   
	<?php 
	}else {   
			$transparent_class = '';
			$transparency_js = 'no';

			$resize_js = ($data['header_resize']) ? 'yes' : 'no';
			$centered_js = ($data['header_el_pos']=='center') ? 'yes' : 'no';
			$resize_factor = ($data['resize_factor']) ? $data['resize_factor']/100 : 0.3;			
			
			if (get_post_meta($current_post_id, 'pyre_transparent_header', true)=='yes') {
				$transparent_class = 'header_transparent';
				$transparency_js = 'yes';
			}
			$logo_resize = ( $data['logo_resize'] ) ? 'yes' : 'no';	
		?> 
	    
	    <div class="full_header <?php echo $header_style; ?>">    
	        <div class="header_area <?php echo $header_class; ?>">
	            <header class="header_wrap">        	
	                <div class="header <?php echo $transparent_class; ?>" header-version="<?php echo $data['header_style']; ?>" data-centered="<?php echo $centered_js;?>" data-resize="<?php echo $resize_js; ?>" resize-factor="<?php echo $resize_factor; ?>" data-transparent="<?php echo $transparency_js; ?>" logo-resize="<?php echo $logo_resize; ?>">             
	                    <div class="header_reduced">
	                        <div class="inner clr">
	                            <div id="branding">
	                                <?php  

	                                $transparent_logo = 'data-custom-logo="false"';
	                                if(get_post_meta($current_post_id, 'pyre_transparent_logo', true)!='' && ( get_post_meta($current_post_id, 'pyre_transparent_header', true)=='yes' )) {
	                                    $logo_class = 'hide_logo';  
	                                    $transparent_logo = 'data-custom-logo="true"';
	                                }
	                                else{
	                                    $logo_class = 'show_logo';                                      
	                                }
	                                $extra_logo_class = ($data['retina_logo']) ? 'normal_logo' : '';

	                                if($data['logo'] || $data['retina_logo'] ) {

	                                	/* calculate the width and height of the logo if the Header resize is turned on */
	                                	if($data['header_resize']) {
	                                		//$logo_var = (! get_post_meta($current_post_id, 'pyre_transparent_logo', true)) ? $data['logo'] : get_post_meta($current_post_id, 'pyre_transparent_logo', true);
	    									$default_logo_id = pn_get_attachment_id_from_url ($data['logo']);
	    									$default_logo_attr = wp_get_attachment_image_src($default_logo_id, 'full');

	    									if(get_post_meta($current_post_id, 'pyre_transparent_logo', true) != '') {
	    										$custom_logo_id = pn_get_attachment_id_from_url (get_post_meta($current_post_id, 'pyre_transparent_logo', true));
	    										$custom_logo_attr = wp_get_attachment_image_src($custom_logo_id, 'full');
	    									}

	    									//$img_width_height = 'logo-height="' . $default_logo_attr[2] . '"';
	    									if($data['logo_resize'] && !empty($data['logo_resize_value'])){
	    									    $resize_value = str_replace('px','',$data['logo_resize_value']);
	    									    $logo_height = round(( $default_logo_attr[2] * (int)$resize_value )/$default_logo_attr[1]);	    									    
	    									}
	    									else {
	    									    $logo_height = $default_logo_attr[2];
	    									}
	    									
	    									$img_width_height = 'logo-height="' . $logo_height . '"';
	    									$img_width_height_custom = 'logo-height="' . $custom_logo_attr[2] . '"';
	                                	} 
	                                	else {
	                                		$img_width_height = '';
	                                	}
	                                ?>          	
	                                    <div class="logo" <?php echo $transparent_logo; ?>>
	                                        <a href="<?php if($data['en_custom_logo_url'] && !empty($data['custom_logo_url']) ) { echo $data['custom_logo_url']; } else { echo home_url(); } ?>" rel="home" title="<?php bloginfo('name'); ?>">                                            
	                                        	<?php 
	                                            if($data['logo'] ) { 
	                                                ?>
	                                                <img src="<?php echo $data['logo']; ?>" <?php echo $img_width_height; ?> alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="original_logo <?php echo $extra_logo_class; ?> <?php echo $logo_class; ?> <?php echo ($data['mobile_logo'] ? 'desktop_logo' : ''); ?>">
	                                                <?php
	                                                if( (get_post_meta($current_post_id, 'pyre_transparent_logo', true) !='') && (get_post_meta($current_post_id, 'pyre_transparent_header', true)=='yes') ) { 
	                                                    $extra_transparent_logo_class = (get_post_meta($current_post_id, 'pyre_transparent_logo_retina', true)) ? 'normal_logo' : '';    
	                                                    ?>
	                                                    <img src="<?php echo get_post_meta($current_post_id, 'pyre_transparent_logo', true); ?>" <?php echo $img_width_height_custom; ?>  alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="custom_logo <?php echo $extra_transparent_logo_class; ?> show_logo">
	                                                <?php
	                                                }                                                                                          
	                                            }
	                                            if($data['retina_logo']) { 
	                                                ?>
	                                                <img src="<?php echo $data['retina_logo']; ?>" <?php echo $img_width_height; ?>  alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="original_logo retina_logo <?php echo $logo_class; ?> <?php echo ($data['mobile_logo'] ? 'desktop_logo' : ''); ?>">
	                                                <?php
	                                                if( (get_post_meta($current_post_id, 'pyre_transparent_logo_retina', true)!='') && (get_post_meta($current_post_id, 'pyre_transparent_header', true)=='yes') ) {
	                                                ?>
	                                                    <img src="<?php echo get_post_meta($current_post_id, 'pyre_transparent_logo_retina', true); ?>" <?php echo $img_width_height; ?>  alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="custom_logo retina_logo show_logo">
	                                                <?php
	                                                }                                                                                          
	                                            }
	                                            if($data['mobile_logo']) { 
	                                            ?>
	                                            	<img src="<?php echo $data['mobile_logo']; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="mobile_logo">   
	                                            <?php 
												}                                            
												?>                                                                                    
	                                        </a>
	                                    </div>                   
	                                <?php    
	                                }
	                                else{
	                                	$text_logo_tag = $data['text_logo_tag'] ? $data['text_logo_tag'] : 'h1';
	                                ?>
	                                	<div class="text_logo">
	                                        <<?php echo $text_logo_tag; ?> class="text"><a href="<?php if($data['en_custom_logo_url'] && !empty($data['custom_logo_url']) ) { echo $data['custom_logo_url']; } else { echo home_url(); } ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></<?php echo $text_logo_tag; ?>>                                        
	                                        <?php 
	                                        if($data['en_tagline']) {
	                                        ?>                                        
	                                            <div class="tagline"><?php echo get_bloginfo('description') ?></div>                                        
	                                        <?php
	                                        }
	                                        ?>
	                                	</div>
	                                <?php
	                                }
	                                ?>    
	                            </div>
	                            
	                            <?php
	                            	$individual_header = ( get_post_meta($current_post_id, 'pyre_header_style', true) != NULL ) ? get_post_meta($current_post_id, 'pyre_header_style', true) : $data['header_style']; 
	                            	if($individual_header == 'default') {
	                            		$individual_header = $data['header_style'];
	                            	}
	                            	
	                            	if($individual_header == 'style1') { ?>  
	                                    
	                                    <nav id="navigation" class="main_menu <?php echo $menu_extra_class ?> clearfix">                     
	                                    <?php
	                                    if ( is_page_template ( 'page-one-full.php' ) ) {
	                                        wp_nav_menu(array('theme_location' => 'one-page-menu', 'menu' => $one_menu, 'container' => false, 'items_wrap' => '<ul id="one_page_navigation" class="%2$s clearfix">%3$s</ul>', 'fallback_cb' => 'default_menu_fallback', 'walker' => new cr_walker));
	                                        
	                                    }
	                                    else{
	                                        
	                                        wp_nav_menu(array('theme_location' => 'primary-menu', 'menu' => $main_menu, 'container' => false, 'items_wrap' => '<ul id="%1$s" class="%2$s clearfix">%3$s</ul>', 'fallback_cb' => 'default_menu_fallback', 'walker' => new cr_walker));
	                                        ?>
	                                        
	                                    <?php
	                                    }
	                                    ?> 
	                                        <form action="<?php echo home_url(); ?>" method="get" class="header_search">
	                                            <input type="text" name="s" class="form-control" value="" placeholder="<?php _e('Type &amp; Hit Enter..','Creativo'); ?>">
	                                            <?php if( ( class_exists( 'Woocommerce' ) && is_woocommerce() ) || ( is_tax( 'product_cat' ) ||  is_tax( 'product_tag' ) ) ) { ?>
	                                            	<input type="hidden" name="post_type" value="product">
	                                            <?php } ?>	
	                                        </form>                                        
	                                    </nav>
	                                      
	                                                           
	                            <?php } ?>
	                            
	                            <?php if( $individual_header == 'style2' && $data['header_banner']!='' ) { ?>                	
	                                <div class="banner">
	                                    <?php echo $data['header_banner']; ?>
	                                </div>
	                            <?php 
	                            }
	                            ?>                        
	                             
	                        </div>    
	                    </div>
	                </div>   
	            </header>
	            <?php if( $individual_header == 'style2') { ?>
	            <div class="second_navi <?php echo $header_menu_modern; ?>">
	                <div class="second_navi_inner">
	                     <nav id="navigation" class="main_menu clearfix">
	                        <?php
	                        if ( is_page_template ( 'page-one-full.php' ) ) {
	                            wp_nav_menu(array('theme_location' => 'one-page-menu', 'menu' => $one_menu, 'container' => false, 'items_wrap' => '<ul id="one_page_navigation" class="%2$s">%3$s</ul>', 'fallback_cb' => 'default_menu_fallback', 'walker' => new cr_walker));
	                        }
	                        else{
	                            wp_nav_menu(array('theme_location' => 'primary-menu', 'menu' => $main_menu, 'container' => false, 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'fallback_cb' => 'default_menu_fallback', 'walker' => new cr_walker));
	                        }
	                        ?>
	                        <form action="<?php echo home_url(); ?>" method="get" class="header_search">
	                            <input type="text" name="s" class="form-control" value="" placeholder="<?php _e('Type &amp; Hit Enter..','Creativo'); ?>">
	                        </form>
	                     </nav>   
	                </div>
	            </div>                    
	            <?php
	            }
	            
	            ?>
	            
	        </div>
	    </div> 
	    	       
	<?php
	}
	?>
		<div id="responsive_navigation" sticky-mobile-menu="<?php if($data['sticky_mobile_menu']) { echo 'yes'; } else { echo 'no'; } ?>">
	        <div class="responsive-menu-link" >
	            <div class="responsive-menu-bar mob_menu">
	            	<?php
	            		if ( isset( $data['mobile_menu_text'] ) && $data['mobile_menu_text'] != '') { echo $data['mobile_menu_text']; } else { _e('Menu','Creativo'); }
	            	?>
	            	<i class="fa fa-bars"></i>
	            </div>
	        </div>
	        <div class="mobile_menu_holder">    
	            <?php
	            if ( is_page_template ( 'page-one-full.php' ) ) {
	                wp_nav_menu(array('walker' => new Arrow_Walker_Nav_Menu, 'theme_location' => 'one-page-menu', 'menu' => $one_menu, 'container' => false, 'items_wrap' => '<ul id="responsive_menu" class="one_page_navigation_mobile">%3$s</ul>'));
	            }
	            else {
					if( ( $data['header_position'] == 'left' ) || ( $data['header_position']=='right' ) ) {
						wp_nav_menu(array('walker' => new Arrow_Walker_Nav_Menu, 'theme_location' => 'side-menu', 'menu' => $side_menu, 'container' => false, 'items_wrap' => '<ul id="responsive_menu">%3$s</ul>'));
					}
					else{
	                	wp_nav_menu(array('walker' => new Arrow_Walker_Nav_Menu, 'theme_location' => 'primary-menu', 'menu' => $main_menu, 'container' => false, 'items_wrap' => '<ul id="responsive_menu">%3$s</ul>'));
					}
	            }
	            ?>                        
	    	</div>           	
		</div>
<?php
	}
}


/* Page Title Logic */
if (!function_exists('cr_page_title')) {
	function cr_page_title() {
		
		global $data;

		$spb = false;		
		if(class_exists('Woocommerce') && ( is_product() || is_woocommerce() ) ) $spb = true;

		$current_post_id = get_queried_object_id();

		$page_title_tag = ( $data['page_title_tag'] ) ? $data['page_title_tag'] : 'h2';
		if(is_search() && !$spb){ 
		?>
        	<div class="bellow_header">
                <div class="bellow_header_title">
                	<div class="page-title">

						<?php echo '<'.$page_title_tag.'>'; ?><?php printf( __( 'Search Results for: %s', 'Creativo' ), '<span>' . get_search_query() . '</span>' ); ?><?php echo '</'.$page_title_tag.'>'; ?>                                             
                        
                    </div>
                </div>
            </div>        
        <?php 
		} 
		if(is_category() ){
		?>
        <div class="bellow_header">
        	<div class="bellow_header_title">
            	<div class="page-title">

            		<?php echo '<'.$page_title_tag.'>'; ?><?php _e('Posts filed under: ','Creativo'); single_cat_title(); ?><?php echo '</'.$page_title_tag.'>'; ?>

               		<?php if(function_exists('cr_breadcrumb')):?>                                                   
                        <div class="breadcrumb">
                            <?php cr_breadcrumb();  ?>
                        </div>   
					<?php endif; ?>   
                                               
                    <?php if($data['header_search_form']) { ?>
                    	<div class="breadcrumb_search_form">
                        	<?php cr_searchform(); ?>
                        </div>
                    <?php } ?> 
            	</div>
            </div>
        </div>
        <?php	
		}
		/*if(is_404()){
		?>
        <div class="bellow_header">
        	<div class="bellow_header_title">
            	<div class="page-title">

					<?php echo '<'.$page_title_tag.'>'; ?><?php _e('404 Error ','Creativo'); ?><?php echo '</'.$page_title_tag.'>'; ?>

					<?php if(function_exists('cr_breadcrumb')):?>                                                   
                        <div class="breadcrumb">
                            <?php cr_breadcrumb();  ?>
                        </div>   
                    <?php endif; ?>
                                                                       
                    <?php if($data['header_search_form']) { ?>
                    	<div class="breadcrumb_search_form">
                        	<?php cr_searchform(); ?>
                        </div>
                    <?php } ?> 
                </div>
            </div>
        </div>
        <?php	
		}*/
		if(is_tag() ){
		?>
        <div class="bellow_header">
        	<div class="bellow_header_title">
            	<div class="page-title">

					<?php echo '<'.$page_title_tag.'>'; ?><?php _e('Posts tagged with: ','Creativo'); single_cat_title(); ?><?php echo '</'.$page_title_tag.'>'; ?>

                    <?php if(function_exists('cr_breadcrumb')):?>                                                   
                        <div class="breadcrumb">
                            <?php cr_breadcrumb();  ?>
                        </div>   
                    <?php endif; ?>     
                                               
                    <?php if($data['header_search_form']) { ?>
                    	<div class="breadcrumb_search_form">
                        	<?php cr_searchform(); ?>
                        </div>
                    <?php } ?> 
            	</div>        
            </div>
        </div>
        <?php	
		}
		
		if(get_query_var('portfolio_category')){
		?>
        <div class="bellow_header">
        	<div class="bellow_header_title">
            	<div class="page-title">

                    <?php echo '<'.$page_title_tag.'>'; ?><?php _e('Projects filed under: ','Creativo'); single_cat_title(); ?><?php echo '</'.$page_title_tag.'>'; ?>

                    <?php if(function_exists('cr_breadcrumb')):?>                                                   
                        <div class="breadcrumb">
                            <?php cr_breadcrumb();  ?>
                        </div>   
                    <?php endif; ?>     
                                               
                    <?php if($data['header_search_form']) { ?>
                    	<div class="breadcrumb_search_form">
                        	<?php cr_searchform(); ?>
                        </div>
                    <?php } ?> 
            	</div>        
            </div>
        </div>    
        <?php
		}
		if(is_author()) {
			if(have_posts() ) {									
					the_post();
					?>                
                    <div class="bellow_header">
                        <div class="bellow_header_title">
                        	<div class="page-title">

                                <?php echo '<'.$page_title_tag.'>'; ?><?php _e('All posts by: ','Creativo') ; echo get_the_author(); ?><?php echo '</'.$page_title_tag.'>'; ?>                               
                                                            
                                <?php if($data['header_search_form']) { ?>
                                    <div class="breadcrumb_search_form">
                                        <?php cr_searchform(); ?>
                                    </div>
                                <?php } ?>
                        	</div>        
                        </div>
                    </div>
					<?php
					rewind_posts();
			}
			wp_reset_query();
		}		
		
		if(is_month()) {
			if(have_posts() ) {									
					the_post();
					?>                
                    <div class="bellow_header">
                        <div class="bellow_header_title">
                        	<div class="page-title">
                                <?php echo '<'.$page_title_tag.'>'; ?><?php printf( __( 'Monthly Archives: %s', 'Creativo' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'Creativo' ) ) ); ?><?php echo '</'.$page_title_tag.'>'; ?>    
                         
                                <?php if($data['header_search_form']) { ?>
                                    <div class="breadcrumb_search_form">
                                        <?php cr_searchform(); ?>
                                    </div>
                                <?php } ?>
                                
                        	</div>        
                        </div>
                    </div>
					<?php
					rewind_posts();
			}
			wp_reset_query();
		}
				
		if(((is_page() || ( class_exists( 'bbPress' ) && is_bbpress() ) || is_single() || is_singular('creativo_portfolio'))) && !$spb ){
		?>
         <div class="bellow_header <?php if( get_post_meta($current_post_id, 'pyre_page_title_parallax', true) == 'yes' ) { echo 'parallax_class"'. 'data-stellar-background-ratio="0.5'; } else echo ''; ?>" data-ptb="<?php echo ( (get_post_meta($current_post_id, 'pyre_show_title', true) == 'no') || ( $data['global_title_bread'] == 1) ? 'off' : 'on' ); ?>">
         	<div class="pt_mask">
                <div class="bellow_header_title">
                    <div class="page-title">
                        <?php if(get_post_meta($current_post_id, 'pyre_page_title_custom', true) != '') { 
                        ?>
                            <?php echo '<'.$page_title_tag.'>'; ?><?php echo get_post_meta($current_post_id, 'pyre_page_title_custom', true); ?><?php echo '</'.$page_title_tag.'>'; ?>
                        <?php
                        }
                        else{
                        ?>          
                            <?php echo '<'.$page_title_tag.'>'; ?><?php the_title(); ?><?php echo '</'.$page_title_tag.'>'; ?> 
                        <?php 
                        }
                        if(get_post_meta($current_post_id, 'pyre_page_title_subheading', true)) {
                            echo '<h3 class="subhead">'.get_post_meta($current_post_id, 'pyre_page_title_subheading', true).'</h3>';	
                        }
                        if( class_exists( 'bbPress' ) && is_bbpress() ) {
                        ?>
                        	<div class="breadcrumb">
	                    		<?php bbp_breadcrumb(); ?>
	                    	</div>
	                         
	                    <?php 
	                    }
	                    else {
	                    	?>
	                    	<?php if(function_exists('cr_breadcrumb')):?>                                                   
	                                <div class="breadcrumb">
	                                    <?php cr_breadcrumb();  ?>
	                                </div>   
	                        <?php endif; ?>  
	                                                   
	                        <?php if($data['header_search_form']) { ?>
	                            <div class="breadcrumb_search_form">
	                                <?php cr_searchform(); ?>
	                            </div>
	                        <?php } ?>
	                    	<?php
	                    }
	                    ?>
                                                 
                    </div>        
                </div>
        	</div>        
        </div>
        <?php
		}
		if( ( class_exists( 'Woocommerce' ) && is_woocommerce() ) || ( is_tax( 'product_cat' ) ||  is_tax( 'product_tag' ) ) ) {
			?>
            <div class="bellow_header">
				<div class="bellow_header_title">
                	<div class="page-title">
                    
						<?php echo '<'.$page_title_tag.'>'; ?><?php if(!is_product()) woocommerce_page_title(true); else the_title();?><?php echo '</'.$page_title_tag.'>'; ?>   
                        <div class="breadcrumb">                      
                    	<?php
                        woocommerce_breadcrumb(array(
                        	'wrap_before' => '<ul class="breadcrumbs">',
                            'wrap_after' => '</ul>',
                            'before' => '<li>',
                            'after' => '</li>',
                            'delimiter' => '',
                            'home'        => _x( '<i class="fa fa-home"></i>', 'breadcrumb', 'woocommerce' ),
						));
						?> 
                        </div>                                                   
                        <?php if($data['header_search_form']) { ?>
                            <div class="breadcrumb_search_form">
                                <?php get_product_search_form(); ?>
                            </div>
                        <?php } ?>    
                                       
                    </div>
                </div>                
            </div>            
            <?php
		}
	}
}