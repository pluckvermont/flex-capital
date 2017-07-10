<?php
global $data;

$hide_class = $full_width_description = '';
?>

<div class="blogpost archive_pages">
<?php
$overwrite_first_post = false; 
if( $wp_query->current_post == 0 && !is_paged() && $data['show_first_post_big_layout']) { 
    $overwrite_first_post = true;
} 

if( !has_post_thumbnail() && !get_post_meta(get_the_ID(), 'pyre_youtube', true) && !get_post_meta(get_the_ID(), 'pyre_vimeo', true)) {
    $hide_class = 'hide_small_images';
    $full_width_description = 'full_width_description';
}

?> 
    <?php
    if($data['blog_images'] != 'small' || $overwrite_first_post) {

        if($data['en_sidebar'] =='no') {
            $thumbnail = 'full';
            $thumb_to_search = '';
        }
        else {
            $thumbnail = 'blog-xxl';
            $thumb_to_search = '800x533';
        }

        if($data['post_meta_style'] != 'st2') { 
            cr_featured_images( $thumbnail, $thumb_to_search );
            cr_post_meta();
        }
        else {
            cr_post_meta();
            cr_featured_images( $thumbnail, $thumb_to_search );
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
        <?php
    }
    elseif($data['blog_images'] == 'small' && !$overwrite_first_post){
        if( has_post_thumbnail() || get_post_meta(get_the_ID(), 'pyre_youtube', true) || get_post_meta(get_the_ID(), 'pyre_vimeo', true)) {
        ?>
            <div class="blogpost_small_pic <?php echo $hide_class; ?>">
                <?php cr_featured_images('blog-small','345x230'); ?>
            </div>
        <?php
        }
        ?>
        <div class="blogpost_small_desc <?php echo $full_width_description; ?>">    
            <?php cr_post_meta(); ?>

            <div class="post-content">
                <?php 
                if($data['post_content']!='Full Content') { 
                     echo string_limit_words(get_the_excerpt(), ($data['post_excerpt_length']) ? $data['post_excerpt_length'] : 30  ).'...';  
                }
                else {
                    the_content();
                }
                
                if( $data['show_view_more'] ) { ?>
                    <div class="small_read_more"><a href="<?php the_permalink(); ?>"><?php _e('Continue Reading ', 'Creativo'); ?>&rarr;</a></div>
                <?php
                } 
                 
                ?>
            </div>            
        </div>
    <?php
    }
    ?>
</div>