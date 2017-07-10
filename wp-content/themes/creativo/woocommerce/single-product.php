<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $data;
get_header( 'shop' ); ?>
<?php 

$show_sidebar = ( get_post_meta( get_the_ID(), 'pyre_en_prod_sidebar', true) != NULL && get_post_meta( get_the_ID(), 'pyre_en_prod_sidebar', true) != 'default' ) ? get_post_meta( get_the_ID(), 'pyre_en_prod_sidebar', true) : $data['woocommerce_sidebar_product_en']; 

$sidebar_pos = ( get_post_meta( get_the_ID(), 'pyre_sidebar_pos', true) != NULL && get_post_meta( get_the_ID(), 'pyre_sidebar_pos', true) != 'default' ) ? get_post_meta( get_the_ID(), 'pyre_sidebar_pos', true) : $data['woocommerce_sidebar_pos']; ;

$sidebar_select = ( get_post_meta( get_the_ID(), 'pyre_prod_sidebar_select', true) != NULL && get_post_meta( get_the_ID(), 'pyre_prod_sidebar_select', true) != '0' ) ? get_post_meta( get_the_ID(), 'pyre_prod_sidebar_select', true) : $data['woocommerce_product_sidebar']; ;

if( $show_sidebar == 'yes' || $show_sidebar == 1 ) {
    $products_class='with_sidebar'; 
	if($sidebar_pos == 'left') { 
		$container= 'float: right;';
		$sidebar = 'float: left;';	
	}
	else{ 
		$container= 'float: left;';
		$sidebar = 'float: right;';	
	}	
}
else{
	$container = 'float: none; width: 100%;';
    $products_class='no_sidebar';
}
?>
<div class="row <?php echo get_post_meta( get_the_ID(), 'pyre_prod_sidebar_select', true); ?>">
	<div class="post_container <?php echo $products_class; ?>" style="<?php echo $container; ?>">
		<?php
            /**
             * woocommerce_before_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
             * @hooked woocommerce_breadcrumb - 20
             */
            do_action( 'woocommerce_before_main_content' );
        ?>
    
            <?php while ( have_posts() ) : the_post(); ?>
    
                <?php wc_get_template_part( 'content', 'single-product' ); ?>
    
            <?php endwhile; // end of the loop. ?>
    
        <?php
            /**
             * woocommerce_after_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            do_action( 'woocommerce_after_main_content' );
        ?>
	</div>
	<?php if( $show_sidebar == 'yes' || $show_sidebar == 1 ) { ?>
        <div class="sidebar <?php echo $sidebar_select; ?>" style="<?php echo $sidebar; ?>"> 
            <?php
                /**
                 * woocommerce_sidebar hook
                 *
                 * @hooked woocommerce_get_sidebar - 10
                 */
                
                 if (!function_exists('dynamic_sidebar') || !dynamic_sidebar( $sidebar_select )): 
                 endif;
                  
            ?>
        </div>
        <div class="clr"></div>
    <?php 
	}
	?>
</div>
<?php get_footer( 'shop' ); ?>