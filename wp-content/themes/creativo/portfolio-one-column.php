<?php // Template Name: Portfolio One Column ?>
<?php get_header(); ?>
	<?php 
	if(get_post_meta($post->ID, 'pyre_slider_select', true) == 'layer_slider') {  
	?>
    	<div class="content-layer">
            <div class="inside_content2"> 
        		<?php echo do_shortcode('[layerslider id="'.get_post_meta($post->ID, 'pyre_slider_id',true).'"]'); ?> 
            </div>
        </div>
    <?php
	}
	if(get_post_meta($post->ID, 'pyre_slider_select', true) == 'rev_slider') {  
	?>
    	<div class="content-layer">
            <div class="inside_content"> 
        		<?php putRevSlider(get_post_meta($post->ID, 'pyre_slider_id',true)); ?>
            </div>
        </div>
    <?php
	}	
	?> 
			<div class="row">
            	<?php while(have_posts()): the_post(); ?>
                	<div class="page_description"><?php the_content(); ?></div>
                <?php endwhile; ?> 
                <div id="content" class="portfolio-one">
                    <?php
                    if(!get_post_meta(get_the_ID(), 'pyre_portfolio_category', true)):
                    $portfolio_category = get_terms('portfolio_category');
                    if($portfolio_category):
                    ?>                    
                    <ul class="portfolio-tabs portfolio-templates clearfix">
                        <li class="active"><a data-filter="*" href="#"><?php _e('All', 'Creativo'); ?></a></li>
                        <?php foreach($portfolio_category as $portfolio_cat): ?>
                        <li><a data-filter=".<?php echo $portfolio_cat->slug; ?>" href="#"><?php echo $portfolio_cat->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                    <?php endif; ?>
                    <div class="portfolio-wrapper">
                        <?php
                        if(is_front_page()) {
							$paged = (get_query_var('page')) ? get_query_var('page') : 1;
						} else {
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						}
                        $args = array(
                            'post_type' => 'creativo_portfolio',
                            'paged' => $paged,
                            'posts_per_page' => $data['portfolio_items']						
                        );
                        if(get_post_meta(get_the_ID(), 'pyre_portfolio_category', true)){
                            $args['tax_query'][] = array(
                                'taxonomy' => 'portfolio_category',
                                'field' => 'ID',
                                'terms' => get_post_meta(get_the_ID(), 'pyre_portfolio_category', true)
                            );
                        }
                        $gallery = new WP_Query($args);						
                        while($gallery->have_posts()): $gallery->the_post();
                             if(has_post_thumbnail() || get_post_meta($post->ID, 'pyre_youtube', true) || get_post_meta($post->ID, 'pyre_vimeo', true)):
								?>
								<?php
								$item_classes = '';
								$item_cats = get_the_terms($post->ID, 'portfolio_category');
								$portf_cat = wp_get_object_terms($post->ID, 'portfolio_category');
								if($item_cats):
								foreach($item_cats as $item_cat) {
									$item_classes .= $item_cat->slug . ' ';
								}
								endif;
								$thumb_link = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio-one');															
								?>

								<div class="portfolio-item <?php echo $item_classes; ?>">                        
								<!-- Project Feed -->
									<div class="project-feed clearfix">
										<div class="full clearfix">
											<div class="image_show">                                              	                                            
                                                <div class="ch-item portfolio-1">	
                                                    <div class="ch-info portfolio-1">
                                                        <div class="ch-info-front1 "><img src="<?php echo $thumb_link[0]; ?>" /></div>
                                                        <div class="ch-info-back1 portfolio-1" style="background-image:url(<?php echo $thumb_link[0]; ?>);">
                                                            <?php 													
															if (get_post_meta($post->ID, 'pyre_custom_link', true) != '') {													
															?>
																<div class="info"><a href="<?php echo get_post_meta($post->ID, 'pyre_custom_link', true); ?>" target="<?php echo get_post_meta($post->ID, 'pyre_custom_link_target', true); ?>"><i class="fa fa-search"></i></a>
																</div>                                                    	
															<?php
															}
															else{
															?>														
																<div class="info"><a href="<?php echo get_permalink($post->ID)?>"><i class="fa fa-search"></i></a>
																</div>
															<?php 
															} 
															?>
                                                        </div>
                                                    </div>
                                                </div>
											</div>
                                            <div class="description"> 
                                            	                                        
                                                    <span class="title">
                                                        <?php 
                                                        if (get_post_meta($post->ID, 'pyre_custom_link', true) != '') {													
                                                        ?>
                                                            <a href="<?php echo get_post_meta($post->ID, 'pyre_custom_link', true); ?>" target="<?php echo get_post_meta($post->ID, 'pyre_custom_link_target', true); ?>"><?php echo get_the_title(); ?></a>
                                                        <?php
                                                        }
                                                        else{
                                                        ?>
                                                            <a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_title(); ?></a>
                                                        <?php 
                                                        } 
                                                        ?>
                                                    
                                                    </span>
                                                    <p><span class="args"><i class="fa fa-tag"></i><?php echo get_the_term_list($post->ID, 'portfolio_category', '', ', ', ''); ?></span></p>
                                                 
                                                        <?php 
                                                        if (get_post_meta($post->ID, 'pyre_custom_link', true) != '') {													
                                                        ?>
                                                            <a href="<?php echo get_post_meta($post->ID, 'pyre_custom_link', true); ?>" target="<?php echo get_post_meta($post->ID, 'pyre_custom_link_target', true); ?>" class="button button_default small"><?php echo __('View More', 'Creativo'); ?></a>
                                                        <?php
                                                        }
                                                        else{
                                                        ?>
                                                            <a href="<?php echo get_permalink($post->ID)?>" class="button button_default small"><?php echo __('View More', 'Creativo'); ?></a>
                                                        <?php 
                                                        } 
                                                        ?>											  	
                                        	</div>        
										</div>                                
									</div>
								   <!-- /Project Feed -->
								</div>
                        	<?php 
							endif; 
						endwhile; 
						?>
                    </div>                    
                </div>
                <?php cr_pagination($gallery->max_num_pages, $range = 2); ?>
 			</div>
<?php get_footer(); ?>