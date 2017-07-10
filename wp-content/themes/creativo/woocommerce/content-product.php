<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $data, $woocommerce;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

	
if ( ! $product->is_in_stock() ) {

	$cr_add_to_cart = '<a href="'. apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->id ) ).'" class="add_to_cart_button">'. apply_filters( 'out_of_stock_add_to_cart_text', __( '<i class="icon-block"></i>Out of Stock', 'Creativo' ) ).'</a>';
	
}
else { ?>

	<?php

	switch ( $product->product_type ) {
	case "variable" :
		$link  = apply_filters( 'variable_add_to_cart_url', get_permalink( $product->id ) );
		$label  = apply_filters( 'variable_add_to_cart_text', __( 'Select options', 'woocommerce' ) );
		$icon_class = 'fa fa-cog';
		break;
	case "grouped" :
		$link  = apply_filters( 'grouped_add_to_cart_url', get_permalink( $product->id ) );
		$label  = apply_filters( 'grouped_add_to_cart_text', __( 'View options', 'woocommerce' ) );
		$icon_class = 'fa fa-plus-circled';
		break;
	case "external" :
		$link  = apply_filters( 'external_add_to_cart_url', get_permalink( $product->id ) );
		$label  = apply_filters( 'external_add_to_cart_text', __( 'Read More', 'woocommerce' ) );
		$icon_class = 'fa fa-icon-login';
		break;
	default :
		$link  = apply_filters( 'add_to_cart_url', esc_url( $product->add_to_cart_url() ) );
		$label  = apply_filters( 'add_to_cart_text', __( 'Add to cart', 'woocommerce' ) );
		$icon_class = 'fa fa-shopping-cart';
		break;
	}

	if ( $product->product_type != 'external' && $product->product_type != 'variable' ) {
		$cr_add_to_cart = '<a href="'. $link .'" rel="nofollow" data-quantity="1" data-product_id="'.$product->id.'" class="add_to_cart_button product_type_'.$product->product_type.' ajax_add_to_cart"><i class="'.$icon_class.'"></i>'. $label.'</a>';
	}
	elseif($product->product_type == 'variable') {
		$cr_add_to_cart = '<a href="'. $link .'" rel="nofollow" data-quantity="0" data-product_id="'.$product->id.'" class=" product_type_'.$product->product_type.' ajax_add_to_cart"><i class="'.$icon_class.'"></i>'. $label.'</a>';
	}

	else {
		$cr_add_to_cart = '';
	}

	$items_in_cart = array();

	if($woocommerce->cart->get_cart() && is_array($woocommerce->cart->get_cart())) {
		foreach($woocommerce->cart->get_cart() as $cart) {
			$items_in_cart[] = $cart['product_id'];
		}
	}

	$id = get_the_ID();
	$in_cart = in_array($id, $items_in_cart);
}
	
?>
<li <?php post_class( $classes ); ?>>
	
    <div class="inside_prod">       
    
            <div class="image_prod">
            	<?php
				if (nv_is_out_of_stock()) {
				
					echo '<div class="badge out-of-stock-badge"><span>' . __( 'Out of Stock', 'Creativo' ) . '</span></div>';
			
				} else if ($product->is_on_sale()) {
					
					echo apply_filters('woocommerce_sale_flash', '<div class="badge onsale"><span>'.__( 'Sale!', 'Creativo' ).'</span></div>', $post, $product);				
				} else if (!$product->get_price()) {
					
					echo '<div class="badge free-badge"><span>' . __( 'Free', 'Creativo' ) . '</span></div>';
					
				} 
				?>
				<div class="image_prod_wrap">
					<a href="<?php the_permalink(); ?>">
						<?php
						if( $data['woo_image_size'] != 'catalog') {
							$img_url = wp_get_attachment_url( get_post_thumbnail_id(),'full' );                 	
	            		?>
	                		<img src="<?php echo $img_url; ?>" />
	                	<?php 
	                	}
	                	else {
	                		echo woocommerce_get_product_thumbnail('shop_catalog');
	                	}
	                	if($data['woo_second_image'] == 'yes') {
	                		$product_gallery = get_post_meta( get_the_ID(), '_product_image_gallery', true );
	                		if ( !empty( $product_gallery ) ) {
			                    $gallery = explode( ',', $product_gallery );
			                    $image_id  = $gallery[0];
			            		$image_size = $data['woo_image_size'] == 'catalog' ? 'shop_catalog': 'full';
			                    $image_src_hover_array = wp_get_attachment_image_src( $image_id, $image_size, true );			                   
			            
			                    echo '<img src="'.$image_src_hover_array[0].'" alt="'.get_the_title().'" class="woo_secondary_image" title="'.get_the_title().'">';
			                }
	                	}
	                	if($in_cart) {
							echo '<span class="cart-loading"><i class="fa fa-check"></i></span>';
						} else {
							echo '<span class="cart-loading"><i class="fa fa-refresh"></i></span>';
						}
	                	?>

	                 </a>
                 </div>
                 <div class="product_buttons_wrap clearfix">
    
                    <?php echo $cr_add_to_cart; ?>               
        
                </div>
            </div>

    
       
        
        <div class="product_details">
            
                <h3><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></h3>               
                
                <div class="product_price">
    
                    <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
    
                </div>                
                       
		</div>

	</div>        

</li>