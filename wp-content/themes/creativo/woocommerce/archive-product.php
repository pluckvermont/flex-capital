<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>
<?php 
global $data;
if($data['woocommerce_sidebar_en']) {
	$products_class='with_sidebar';	
	if($data['woocommerce_sidebar_pos'] == 'left') { 
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
<div class="row">
	<div class="post_container <?php echo $products_class; ?>" style="<?php echo $container; ?>">

		<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>
	
	</div>

    <?php if($data['woocommerce_sidebar_en']) { ?>
        <div class="sidebar" style="<?php echo $sidebar; ?>"> 
            <?php
                /**
                 * woocommerce_sidebar hook
                 *
                 * @hooked woocommerce_get_sidebar - 10
                 */
                if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($data['woocommerce_archive_sidebar'])): 
                 endif;
            ?>
        </div>
        <div class="clr"></div>
    <?php 
	}
	?>
    
</div>
<?php get_footer( 'shop' ); ?>