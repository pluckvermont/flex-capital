<?php
global $data;
/* grab columns data */
$grid_columns = ( $data['grid_cols'] ) ? $data['grid_cols'] : 4;    

?>
<div class="blogpost <?php echo 'grid_posts columns-'.$grid_columns; ?> ss">
    <?php
    if($data['post_meta_style'] == 'above') { 
        cr_post_meta();
        cr_featured_images( 'full', '' );                         
    }
    else {                          
        cr_featured_images( 'full', '' );
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