<?php get_header(); ?>

<?php
global $data;
$has_slides = false;
$items = $data['related_items'];
$sidebar_show = true;
$extra = 'extra-width';
$show_featured = $data['show_featured'] == 'no' ? false : true;

/* Sidebar logic - if enabled in Admin area do the rest. */

if( $data['en_sidebar'] == 'no' ) {
	$sidebar_show = false;
	$extra ='';
	$items = $items+1; 
}
else {	
	if(get_post_meta($post->ID, 'pyre_en_sidebar', true) == 'no'){		
		$sidebar_show = false;
		$extra ='';
		$items = $items+1; 
	}
}

?>  
<div class="row clearfix">
	<div class="post_container">            
    <?php				
		while(have_posts()): the_post(); 	
		?>
			<div class="blogpost">
				<?php 
				/* if featured images and videos are set to be displayed */
				if($show_featured) {

					/* Check the position of the Post Title and Meta */
					$post_meta_position = (get_post_meta($post->ID, 'pyre_post_title_meta_pos', true) != NULL) ? get_post_meta($post->ID, 'pyre_post_title_meta_pos', true) : $data['post_meta_style'];
					if( $post_meta_position == 'default' ) {
						$post_meta_position = $data['post_meta_style'];
					}

					if($post_meta_position != 'above') { 
	                    get_template_part('content/featured-images');
	                    cr_post_meta();	                    
	            	} 
	                else {
	                	cr_post_meta(); 
	                	get_template_part('content/featured-images');	                    	
	                }
	            }
	            else {
	            	cr_post_meta();
	            }
                ?>                                             
                            
                <div class="post-content">
                    <?php the_content(''); ?>
                </div>                        
                <?php 
				if($data['show_tags']){
				?>
                    <div class="post-atts">                                                               	   
                        <span><?php _e('Tags: ','Creativo');?></span> <span class="single_post_tags"><?php  the_tags('',' '); ?></span>                                                                       
                    </div>
                <?php } 

                if($data['show_post_navi']){?>                   	
                
                	<div class="portfolio-navigation">								
                        <?php previous_post_link('%link', '<div class="portfolio-navi-previous"><i class="fa fa-angle-left"></i> '.__('Previous ','Creativo').'</div>'); ?>
                        <?php next_post_link('%link', '<div class="portfolio-navi-next">'.__('Next','Creativo').' <i class="fa fa-angle-right"></i></div>'); ?>
                        <div class="clear"></div>
                    </div>
                   
				<?php
				}
				?>
            </div>
            
            <?php 
			wp_link_pages( array(
				'before'      => '<div class="single_blogpost_split"></div><div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'Creativo' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span class="navigation_arrow">',
				'link_after'  => '</span>',
				) );
			?>
            <div class="single_blogpost_split"></div> 
            <?php
				if($data['social_icons']){
			?>
            	
                    <div class="social_icons">
                        <div class="share_text"><?php _e('Share this post: ','Creativo'); ?></div>    
                        	<?php cr_share_post(); ?>
                        <div class="clr"></div>
                    </div>
            <?php
				}
			?>
             <?php
				if($data['show_author']){
			?>
                <div class="posts-boxes">
                    <!--<div class="content_box_title"><span class="white smaller"><?php _e('About the Author', 'Creativo'); ?></span></div> -->
                    <div class="author_box">
                        <div class="author_pic">
                            <?php 
                                echo get_avatar( get_the_author_meta('id'), $size = '80'); 
                            ?>
                        </div>
                        <h3><?php the_author_posts_link(); ?></h3>
                        <?php the_author_meta( 'description'); ?>
                        <div class="clear"></div>
                    </div>
                </div>
             <?php } ?>   
             <?php
		    if($data['related_posts']) { 
			?>
			 <?php $relate = get_related_posts($post->ID,$items); ?>
					<?php if($relate->have_posts()): ?>
					<div class="posts-boxes">
						<div class="content_box_title">
                        	<span class="white smaller"><?php _e('Related Posts', 'Creativo'); ?></span>
                        </div>
                        <div class="recent_posts_container">
                        	<?php
							$count = 1;
							$i = 3;
							
							while($relate->have_posts()): $relate->the_post();						
								
								?>
                                <article class="col <?php echo $extra; ?>">                               
                                
                                <?php

								if(has_post_thumbnail() || get_post_meta($post->ID, 'pyre_youtube', true) || get_post_meta($post->ID, 'pyre_vimeo', true)):
								?>
                                	<div class="flexslider mini related_posts">
                                    	<ul class="slides">
                                        <?php
											if(get_post_meta($post->ID, 'pyre_youtube', true)):
												echo '<li><div class="video-container" style="height:12px;"><iframe title="YouTube video player" width="218px" height="134px" src="http://www.youtube.com/embed/' . get_post_meta($post->ID, 'pyre_youtube', true) . '" frameborder="0" allowfullscreen></iframe></div></li>';
											endif;
											if(get_post_meta($post->ID, 'pyre_vimeo', true)):
												echo '<li><div class="video-container" style="height:12px;"><iframe src="http://player.vimeo.com/video/' . get_post_meta($post->ID, 'pyre_vimeo', true) . '" width="220px" height="161px" frameborder="0"></iframe></div></li>';
											endif;													
											
											if(has_post_thumbnail()):
											
												$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'recent-posts');
												$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
												$attachment_data = wp_get_attachment_metadata(get_post_thumbnail_id());														
													echo '<li><div class="one-fourth-recent"><figure><a href="'.get_permalink($post->ID).'"><div class="text-overlay"><div class="info">
                                                        <i class="fa fa-search"></i>                                                              
                                                    </div></div></figure>'.get_the_post_thumbnail($post->ID, 'recent-posts').'</a></div></li>';
														
											endif;													
											
										?>
                                        </ul>
                                    </div>
                                <?php
								endif;	
									echo '<div class="description">';
										echo '<center><h4><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></h4></center>';												
									echo '</div>';
								echo'</article>';
								$count++;								
							endwhile;
							
							?>
                        <div class="clear"></div>
                     </div>   
                 </div>                                
                       
				<?php endif; wp_reset_query(); ?>
             <?php } ?>
                    
            <?php
				if($data['show_comments']){
			?>                    
            	<?php comments_template('', true); ?>  
            <?php
				}
		endwhile;	
		?>
     </div>
     <?php
     if( $sidebar_show ) {
     ?>
      	<!--BEGIN #sidebar .aside-->
        <div class="sidebar">                
        	<?php //generated_dynamic_sidebar(); 
            if ( !function_exists( 'generated_dynamic_sidebar' ) || !generated_dynamic_sidebar() ):
            endif;
            ?>          
        <!--END #sidebar .aside-->
        </div>
    <?php 
    }
    ?>   
        
</div>          	
	
<?php get_footer(); ?>