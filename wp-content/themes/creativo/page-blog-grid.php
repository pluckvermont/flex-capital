<?php // Template Name: Blog Style Grid ?>
<?php get_header(); ?>

<?php
global $data;
$sidebar = get_post_meta( $post->ID, 'pyre_en_sidebar', true );
$post_count = ( get_post_meta($post->ID, 'pyre_posts_count', true) != '' ) ? get_post_meta($post->ID, 'pyre_posts_count', true) : $data['posts_count'];
$grid_columns = ( get_post_meta($post->ID, 'pyre_grid_cols', true) ) ? get_post_meta($post->ID, 'pyre_grid_cols', true) : 4;
$force_full_width = ( get_post_meta($post->ID, 'pyre_force_full_width', true) == 'yes' )	? 'force_full_width' : '';	

/* Check the position of the Post Title and Meta */
$post_meta_position = (get_post_meta($post->ID, 'pyre_post_title_meta_pos', true) != NULL) ? get_post_meta($post->ID, 'pyre_post_title_meta_pos', true) : $data['post_meta_style'];
if( $post_meta_position == 'default' ) {
	$post_meta_position = $data['post_meta_style'];
}	
?>

<div class="row_full">
	<?php while(have_posts()): the_post(); ?>                	          	
    	<?php the_content(); ?>                           
    <?php endwhile; ?> 
</div>

<div class="row clearfix <?php echo $force_full_width; ?>">
	<div class="post_container">
    	<div class="is_grid clearfix">
        	<?php

			if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
			elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
			else { $paged = 1; }

			$show_featured_post = get_post_meta( $post->ID, 'pyre_show_first_post_big_layout', true ) == 'yes' ? true : false;

			$category = ( get_post_meta($post->ID, 'pyre_posts_category', true) != 0 ) ? $category = '&cat='.get_post_meta($post->ID, 'pyre_posts_category', true) : '';

			$blog = new WP_Query('showposts='.$post_count.$category.'&paged='.$paged);

			/* Check the position of the Post Title and Meta */
			$featured_post_position = (get_post_meta($post->ID, 'pyre_featured_post_title_meta_pos', true) != NULL) ? get_post_meta($post->ID, 'pyre_featured_post_title_meta_pos', true) : $data['post_meta_style'];
			if( $featured_post_position == 'default' ) {
				$featured_post_position = $data['post_meta_style'];
			}
			
			while($blog->have_posts()): $blog->the_post(); 	
			 
            	$more = 0; 

            	if( $blog->current_post == 0 && !is_paged() && $show_featured_post ) { 					
				?>
					<div class="blogpost archive_pages featured_post">
						<?php
						if( $sidebar == 'no' ) {
							$thumbnail = 'full';
							$thumb_to_search = '';
						} 
						else {
							$thumbnail = 'blog-xxl';
							$thumb_to_search = '800x533';
						}

						if($featured_post_position == 'above') { 
							cr_post_meta();
				            cr_featured_images( $thumbnail, $thumb_to_search );				            
				        }
				        else {				            
				            cr_featured_images( $thumbnail, $thumb_to_search );
				            cr_post_meta();
				        }
				        ?>
				        <div class="post-content">
				            <?php 
				            if($data['post_content']!='Full Content') { 
				                 echo string_limit_words(get_the_excerpt(), ($data['post_excerpt_length']) ? $data['post_excerpt_length'] : 30  ).'...';  
				            }
				            else{
				                the_content();
				            }
				            ?>
							<div class="post-atts archive clearfix"> 
							    <?php if( $data['social_icons_archives'] ) {                                            
							        cr_share_post();
							    }
							    if($data['show_view_more'] ){ ?>
							        <a href="<?php the_permalink(); ?>" class="button small button_default view_more_button"><?php _e('Continue Reading ', 'Creativo'); ?>&rarr;</a>
							    <?php } ?>   
							</div>

				        </div>
				    </div>
				    </div> <!-- This will close the opened <div class="is_grid clearfix"> Now we have to reopen that -->
				    <div class="is_grid clearfix">
				<?php
				}
            	else {
            	?>	
					<div class="blogpost grid_posts columns-<?php echo $grid_columns; ?>">
						
						<?php
						if($post_meta_position == 'above') { 
							cr_post_meta();					
							cr_featured_images('blog-large','600x400');							
						}
						else {							
							cr_featured_images('blog-large','600x400');
							cr_post_meta();	
						}
						?>
                        
                        <div class="post-content archive">
                        	<?php 
							if($data['post_content']!='Full Content') { 
                            	 echo string_limit_words(get_the_excerpt(), ($data['post_excerpt_length']) ? $data['post_excerpt_length'] : 30  ).'...'; 
							}
							else{
								the_content();
							}
							?>
                        </div>
                      	<?php 
						if ( $data['show_view_more']){
						?>
                            <div class="post-atts archive">                                
                                <?php if($data['show_view_more']){ ?>
                                    <a href="<?php the_permalink(); ?>" class="button small button_default view_more_button"><?php _e('Read More &rarr;', 'Creativo'); ?></a>
                                <?php } ?>   
                            </div>
                        <?php } ?>
                    </div>                      
                <?php
            	}
			endwhile;	
			wp_reset_query();
			?>
		</div>	
        <?php cr_pagination($blog->max_num_pages, $range = 2); ?> 
     </div>
     <?php
     if( get_post_meta($post->ID, 'pyre_en_sidebar', true) != 'no' ) {
     ?>
      	<!--BEGIN #sidebar .aside-->
        <div class="sidebar" style="<?php echo $sidebar; ?>">                
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