<?php global $data; 
	if( get_post_meta($post->ID, 'pyre_side_menu', true) != 'default' ) {
		$side_menu = get_post_meta($post->ID, 'pyre_side_menu', true);
	}
	else {
		$side_menu = '';
	}?>
<div class="side_navigation">
            	<nav id="navigation" class="main_menu ">                     
                	<?php
                	if ( is_page_template ( 'page-one-full.php' ) ) {
                    	wp_nav_menu(array('theme_location' => 'one-page-menu', 'menu' => $one_menu, 'container' => false, 'items_wrap' => '<ul id="one_page_navigation" class="%2$s">%3$s</ul>', 'fallback_cb' => 'default_menu_fallback', 'walker' => new cr_walker));                
					}
                    else{	
						wp_nav_menu(array('theme_location' => 'side-menu', 'menu' => $side_menu, 'container' => false, 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'fallback_cb' => 'default_menu_fallback', 'walker' => new cr_walker));                      
					}
					?>
            	</nav>        
            </div>