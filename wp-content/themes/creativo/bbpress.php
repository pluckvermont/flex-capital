<?php get_header(); ?>

<?php 
global $data;
$sidebar_show = true;

if( $data['bbpress_sidebar'] == 'no' ) {
    $sidebar_show = false;    
}	
?>
<div class="row clearfix">
	<div class="post_container">
        <?php
		while(have_posts()): the_post(); 	
		?>
			<div class="blogpost">                   
                <div class="post-content">
                    <?php the_content('');?>                    
                </div>
            </div>					
		<?php
		endwhile;	
		?>               
     </div>
     <?php 
     if( $sidebar_show ) {
     ?>
        <!--BEGIN #sidebar .aside-->
        <div class="sidebar" style="<?php echo $sidebar; ?>">                
            <?php              
            if ( !function_exists( 'generated_dynamic_sidebar' ) || !dynamic_sidebar( $data['bbpress_sidebar_select'] ? $data['bbpress_sidebar_select'] : ('sidebar-5') )  ): 
            endif;
            ?>          
        <!--END #sidebar .aside-->
        </div>
    <?php 
    }
    ?>          	   
     
</div>        
       		
<?php get_footer(); ?>