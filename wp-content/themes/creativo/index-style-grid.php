<?php
global $data;
/* grab columns data */
$grid_columns = ( $data['grid_cols'] ) ? $data['grid_cols'] : 4; 

$thumbnail = 'blog-large';
$thumb_to_search = '600x400';   

/* first post as full featured */
$overwrite_first_post = false; 
if( $wp_query->current_post == 0 && !is_paged() && $data['show_first_post_big_layout']) { 
    $overwrite_first_post = true;
    
    if( $data['en_sidebar'] !='no' ) {
        $thumbnail = 'blog-xxl';
        $thumb_to_search = '800x533';
    }
    else {
        $thumbnail = 'full';
        $thumb_to_search = '';   
    }
} 
$blogpost_extra_class = $overwrite_first_post ? 'archive_pages' : 'grid_posts columns-'.$grid_columns;     

?>
  
<div class="blogpost <?php echo $blogpost_extra_class; ?>">
    
    <?php
    if($data['post_meta_style'] == 'above') { 
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
    </div>
    
    <?php 
    if ( $data['show_view_more'] ){
    ?>
        <div class="post-atts archive">                                
            <?php if($data['show_view_more']){ ?>
                <a href="<?php the_permalink(); ?>" class="button small button_default view_more_button"><?php _e('Continue Reading &rarr;', 'Creativo'); ?></a>
            <?php } ?>   
        </div>
    <?php } ?>               
    
</div> 
<?php
if($overwrite_first_post) {
?>
</div>
<div class="is_grid clearfix"> 
<?php
}
?>                     