<?php
global $data; 

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