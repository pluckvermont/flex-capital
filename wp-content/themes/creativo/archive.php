<?php get_header(); ?>

<?php
global $data;
$sidebar_show = $data['en_sidebar'] == 'no' ? false : true;

$style = ( $data['blog_images'] != 'grid' && $data['blog_images'] != 'masonry' ) ? 'style-default' : 'style-'.$data['blog_images'] ;
if( $data['blog_images'] == 'grid' ) : $post_container_in = 'is_grid'; endif;
if ($data['blog_images'] == 'masonry') : $post_container_in = 'grid-masonry js-masonry'; endif;
$force_full_width = ( ( $data['blog_images'] == 'grid' ||  $data['blog_images'] == 'masonry' ) && ( $data['index_full_width'] == 'yes' ) ) ? 'force_full_width' : '';

?>

<div class="row <?php echo $force_full_width; ?> clearfix">
	<div class="post_container" >
    	<?php if(is_author()){ ?>
    		<div class="posts-related">                    	
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
    	<?php if (have_posts()) { ?>
            <div class="<?php echo $post_container_in; ?> clearfix">
                <?php if ($data['blog_images'] == 'masonry') : echo '<div class="gutter-sizer"></div>'; endif; ?>
				<?php while(have_posts()): the_post(); ?>
					<?php get_template_part('index',$style); ?>                	   
            	<?php endwhile; ?>
            </div>
            <?php cr_pagination($blog->max_num_pages, $range = 2); ?>
        <?php        
		}	
        ?>                                 
    </div>

    <?php
     if( $sidebar_show ) {
     ?>
        <!--BEGIN #sidebar .aside-->
        <div class="sidebar">                
            <?php //generated_dynamic_sidebar(); 
            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()): 
            endif;
            ?>          
        <!--END #sidebar .aside-->
        </div>
    <?php 
    }
    ?>
 
</div>        
<?php get_footer(); ?>