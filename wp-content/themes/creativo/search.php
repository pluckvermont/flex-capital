<?php get_header(); ?>	
    <?php
    if( $data['en_sidebar'] != 'no' ) {
        if($data['sidebar_pos'] == 'left') {
            $content_css = 'float:right;';
            $sidebar_css = 'float:left;';
        } else {
            $content_css = 'float:left;';
            $sidebar_css = 'float:right;';
        }
    }
    else {
      $content_css = 'width: 100%;';
      $sidebar_css = 'display:none;';
    }
    
    $style = ( $data['blog_images'] != 'grid' && $data['blog_images'] != 'masonry' ) ? 'style-default' : 'style-'.$data['blog_images'] ;
    if( $data['blog_images'] == 'grid' ) : $post_container_in = 'is_grid'; endif;
    if ($data['blog_images'] == 'masonry') : $post_container_in = 'grid-masonry js-masonry'; endif;
    $force_full_width = ( ( $data['blog_images'] == 'grid' ||  $data['blog_images'] == 'masonry' ) && ( $data['index_full_width'] == 'yes' ) ) ? 'force_full_width' : '';
        ?>
        <div class="row <?php echo $force_full_width; ?>">
        	<div class="post_container" style="<?php echo $content_css; ?>">            	
            	<?php 
                if (have_posts()) { ?>
                    <div class="<?php echo $post_container_in; ?> clearfix">
                        <?php if ($data['blog_images'] == 'masonry') : echo '<div class="gutter-sizer"></div>'; endif; ?>
    					<?php while(have_posts()): the_post(); ?>
    						<?php get_template_part('index',$style); ?>                	   
                    	<?php endwhile; ?>
                    </div>
                    <?php cr_pagination($blog->max_num_pages, $range = 2); ?>
                <?php        
				}	
                else {
                ?>
                    <h2 class="page404"><?php _e('No relevant search results found','Creativo'); ?></h2>
                    <div class="post-content">
                        <?php _e('Try a different search query if you didn\'t find what you were looking for.','Creativo'); ?>
                    </div>
                    <div class="new_search_form">
                        <?php echo get_search_form( false ); ?>
                    </div>
                <?php
                }
                ?>                                 
            </div>
            <div class="sidebar" style="<?php echo $sidebar_css; ?>">                
                <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar() ) ?>            
            </div>
             <div class="clr"></div>   
        </div>        
<?php get_footer(); ?>