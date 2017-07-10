<?php get_header(); ?>    
	<div class="row">
       	<div class="post_container_full" >       
			<h2 class="page404"><span>404</span><?php _e('Page Not Found','Creativo'); ?></h2>
			<div class="post-content">
				<?php _e('Sorry, but the page you are looking for has not been found. Try Checking the URL for Errors, then hit the refresh button on your browser, or use the search form below.','Creativo'); ?>
			</div>
			<div class="new_search_form">
                <?php echo get_search_form( false ); ?>
            </div>			      
		</div>		
	</div>       
<?php get_footer(); ?>