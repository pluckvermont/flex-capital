<?php
global $data;
                  
if(get_post_meta(get_the_ID(), 'pyre_show_featured', true)=='yes') {
    if(has_post_thumbnail() || get_post_meta(get_the_ID(), 'pyre_youtube', true) || get_post_meta(get_the_ID(), 'pyre_vimeo', true)):
    ?>
        <div class="flexslider single_post_featured" data-interval="0" data-flex_fx="fade">
            <ul class="slides">
                <?php if( get_post_meta($post->ID, 'pyre_youtube', true) != ''){ ?>
                <li class="video-container">                            
                    <?php echo  do_shortcode('[youtube id="'.get_post_meta($post->ID, 'pyre_youtube', true).'" ]'); ?>                               
                </li>
                <?php } ?>
                <?php if( get_post_meta($post->ID, 'pyre_vimeo', true) != ''){ ?>
                <li class="video-container">                        
                    <?php echo  do_shortcode('[vimeo id="'.get_post_meta($post->ID, 'pyre_vimeo', true).'" width="600" height="350"]'); ?>
                </li>
                <?php } ?>
                
                <?php
                if(has_post_thumbnail() && ( get_post_meta(get_the_ID(), 'pyre_skip_first', true) !='yes' )){   
                ?>                         
                    <?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
                    <?php $attachment_data = wp_get_attachment_metadata(get_post_thumbnail_id()); ?>
                    <?php
                    $thumb_size = ( get_post_meta($post->ID, 'pyre_featured_image_size', true) == 'crop' ) ? 'blog-xxl' : 'full';
                    ?>
                    <li>
                        <a href="<?php echo $full_image[0]; ?>" rel="prettyPhoto['gallery']"><?php the_post_thumbnail( $thumb_size );?></a>                                    
                    </li>
                <?php } 
                
                $i = 2;
                while($i <= $data['featured_images_count']):
                    $attachment = new StdClass();
                    $attachment->ID = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
                    if($attachment->ID):                                        
                    ?>                                       
                    <?php $full_image = wp_get_attachment_image_src($attachment->ID, 'full'); ?>
                    <?php $attachment_data = wp_get_attachment_metadata($attachment->ID); ?>
                        <li>    
                            <a href="<?php echo $full_image[0] ?>" rel="prettyPhoto['gallery']"><img src="<?php echo $full_image[0]; ?>" alt="<?php echo $attachment->post_title; ?>" /></a>    
                        </li>                                                        
                    <?php 
                    $has_slides = true;
                    endif; 
                    $i++; 
                endwhile; 
                if(!$has_slides  && ( get_post_meta(get_the_ID(), 'pyre_skip_first', true) =='yes') && !get_post_meta(get_the_ID(), 'pyre_youtube', true) && !get_post_meta(get_the_ID(), 'pyre_vimeo', true) ) {
                    echo '<li style="margin-top:-30px;"></li>';
                }
                ?>      
            </ul>
            <div class="clear"></div>
        </div>
    <?php
    endif;
}
?>
