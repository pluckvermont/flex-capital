<?php // Template Name: Blog Style Big Image ?>
<?php get_header(); ?>

<?php
global $data;
$sidebar = get_post_meta( $post->ID, 'pyre_en_sidebar', true );

if( $sidebar == 'no' ) {
	$thumbnail = 'full';
	$thumb_to_search = '';
} 
else {
	$thumbnail = 'blog-xxl';
	$thumb_to_search = '800x533';
}

?>

<div class="row_full">
    	<?php while(have_posts()): the_post(); ?>                	          	
	    	<?php the_content(); ?>                                   
        <?php endwhile; ?> 
</div>

<div class="row clearfix">
	<div class="post_container">
    <?php
    	$post_count = ( get_post_meta($post->ID, 'pyre_posts_count', true) != '' ) ? get_post_meta($post->ID, 'pyre_posts_count', true) : $data['posts_count'];
		
		if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
		elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
		else { $paged = 1; }
		
		$category = ( get_post_meta($post->ID, 'pyre_posts_category', true) != 0 ) ? $category = '&cat='.get_post_meta($post->ID, 'pyre_posts_category', true) : '';
		$blog = new WP_Query('showposts='. $post_count .$category.'&paged='.$paged);

		/* Check the position of the Post Title and Meta */
		$post_meta_position = (get_post_meta($post->ID, 'pyre_post_title_meta_pos', true) != NULL) ? get_post_meta($post->ID, 'pyre_post_title_meta_pos', true) : $data['post_meta_style'];
		if( $post_meta_position == 'default' ) {
			$post_meta_position = $data['post_meta_style'];
		}
		
		while($blog->have_posts()): $blog->the_post(); 	
		?>
        	<?php $posttags = get_the_tags(); ?>
        	<?php $more = 0; ?>		
			<div class="blogpost archive_pages">
				<?php					
				if( $post_meta_position == 'above') { 
		            cr_post_meta();
		            cr_featured_images( $thumbnail, $thumb_to_search );		            
		        }
		        else {		            
		            cr_featured_images( $thumbnail, $thumb_to_search );
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
					if ( $data['show_view_more'] || $data['social_icons_archives']){
					?>
					    <div class="post-atts archive clearfix"> 
					        <?php if( $data['social_icons_archives'] ) {                                            
					            cr_share_post();
					        }
					        if($data['show_view_more'] ){ ?>
					            <a href="<?php the_permalink(); ?>" class="button small button_default view_more_button"><?php _e('Continue Reading ', 'Creativo'); ?>&rarr;</a>
					        <?php } ?>   
					    </div>
					<?php }
					?>
                </div>                      
            </div>                    
            <?php
		endwhile;
		wp_reset_query();	
		?>
        <?php cr_pagination($blog->max_num_pages, $range = 2); ?> 
     </div>
    <?php
     if( get_post_meta($post->ID, 'pyre_en_sidebar', true) != 'no' ) { 
     ?>              	
        <div class="sidebar" style="<?php echo $sidebar; ?>">                
        	<?php //generated_dynamic_sidebar(); 
            if ( !function_exists( 'generated_dynamic_sidebar' ) || !generated_dynamic_sidebar() ): 
            endif;
            ?>          
        
        </div>
    <?php 
    }
    ?>              
</div>        		
<?php get_footer(); ?>