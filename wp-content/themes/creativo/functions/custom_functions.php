<?php
function hex2rgba($hex) {

	$hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

#-----------------------------------------------------------------#
# Hex to darker RGBA function
#-----------------------------------------------------------------#

function hexDarker( $hex, $factor = 30 ) {
    $new_hex = '';
    if ( $hex == '' || $factor == '' ) {
        return false;
    }

    $hex = str_replace( '#', '', $hex );

    $base['R'] = hexdec( $hex{0}.$hex{1} );
    $base['G'] = hexdec( $hex{2}.$hex{3} );
    $base['B'] = hexdec( $hex{4}.$hex{5} );


    foreach ( $base as $k => $v ) {
        $amount = $v / 100;
        $amount = round( $amount * $factor );
        $new_decimal = $v - $amount;

        $new_hex_component = dechex( $new_decimal );
        if ( strlen( $new_hex_component ) < 2 ) { $new_hex_component = "0".$new_hex_component; }
        $new_hex .= $new_hex_component;
    }

    return '#'.$new_hex;
}

function get_related_posts($post_id,$items) {
	
	$query = new WP_Query();    
    $args = '';
	$args = wp_parse_args($args, array(
		'showposts' => $items,
		'post__not_in' => array($post_id),
		'ignore_sticky_posts' => 0,
        'category__in' => wp_get_post_categories($post_id)
	));
	
	$query = new WP_Query($args);
	
  	return $query;
}

function cr_checkIfMenuIsSetByLocation($menu_location = '') {
    if(has_nav_menu($menu_location)) {
        return true;
    }

    return false;
}

function get_related_projects($post_id,$items) {
    $query = new WP_Query();
    
    $args = $item_array = '';

    $item_cats = get_the_terms($post_id, 'portfolio_category');
    if($item_cats):
    foreach($item_cats as $item_cat) {
        $item_array[] = $item_cat->term_id;
    }
    endif;

    $args = wp_parse_args($args, array(
        'showposts' => $items,
        'post__not_in' => array($post_id),
        'ignore_sticky_posts' => 0,
        'post_type' => 'creativo_portfolio',
        'tax_query' => array(
            array(
                'taxonomy' => 'portfolio_category',
                'field' => 'id',
                'terms' => $item_array
            )
        )
    ));
    
    $query = new WP_Query($args);
    
    return $query;
}

function nv_is_out_of_stock() {
	    global $post;
	    $post_id = $post->ID;
	    $stock_status = get_post_meta($post_id, '_stock_status',true);
	    
	    if ($stock_status == 'outofstock') {
	    return true;
	    } else {
	    return false;
	    }
	}

function cr_pagination($pages = '', $range = 2)
{  

	global $data;

     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination clearfix'>";
         //if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'><span class='arrows'>&laquo;</span> First</a>";
         if($paged > 1) echo "<a class='pagination-prev' href='".get_pagenum_link($paged - 1)."'><span class='page-prev'></span></a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

        // if ($paged < $pages) echo "<a class='pagination-next' href='".get_pagenum_link($paged + 1)."'><span class='page-next'></span></a>";  
         //if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last <span class='arrows'>&raquo;</span></a>";
         echo "</div>\n";
     }
}

function string_limit_words($string, $word_limit)
{
	$words = explode(' ', $string, ($word_limit + 1));
	
	if(count($words) > $word_limit) {
		array_pop($words);
	}
	
	return implode(' ', $words);
}

if(!function_exists('cr_breadcrumb')):
function cr_breadcrumb() {
        global $data,$post;
        echo '<ul class="breadcrumbs">';

         if ( !is_front_page() ) {
        echo '<li><a href="';
        echo home_url();
        echo '">';
        echo "</a></li>";
        }

        $params['link_none'] = '';
        $separator = '';

        if (is_category() && !is_singular('creativo_portfolio')) {
            $category = get_the_category();
            $ID = $category[0]->cat_ID;
            echo is_wp_error( $cat_parents = get_category_parents($ID, TRUE, '', FALSE ) ) ? '' : '<li>'.$cat_parents.'</li>';
        }

        if(is_singular('creativo_portfolio')) {
            echo get_the_term_list($post->ID, 'portfolio_category', '<li>', '&nbsp;/&nbsp;&nbsp;', '</li>');
            echo '<li>'.get_the_title().'</li>';
        }

        if (is_tax()) {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            echo '<li>'.$term->name.'</li>';
        }

        if(is_home() || is_front_page()) { echo '<li><i class="fa fa-home"></i></li>'; }
        if(is_page() && !is_front_page()) {
            $parents = array();
            $parent_id = $post->post_parent;
            while ( $parent_id ) :
                $page = get_page( $parent_id );
                if ( $params["link_none"] )
                    $parents[]  = get_the_title( $page->ID );
                else
                    $parents[]  = '<li><a href="' . get_permalink( $page->ID ) . '" title="' . get_the_title( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a></li>' . $separator;
                $parent_id  = $page->post_parent;
            endwhile;
            $parents = array_reverse( $parents );
            echo join( '', $parents );
            echo '<li>'.get_the_title().'</li>';
        }
        if(is_single() && !is_singular('creativo_portfolio')  && !is_singular('event')) {
            $categories_1 = get_the_category($post->ID);
            if($categories_1):
                foreach($categories_1 as $cat_1):
                    $cat_1_ids[] = $cat_1->term_id;
                endforeach;
                $cat_1_line = implode(',', $cat_1_ids);
            endif;
            if( $cat_1_line ) {
                $categories = get_categories(array(
                    'include' => $cat_1_line,
                    'orderby' => 'id'
                ));
                if ( $categories ) :
                    foreach ( $categories as $cat ) :
                        $cats[] = '<li><a href="' . get_category_link( $cat->term_id ) . '" title="' . $cat->name . '">' . $cat->name . '</a></li>';
                    endforeach;
                    echo join( '', $cats );
                endif;
            }
            echo '<li>'.get_the_title().'</li>';
        }
        if(is_tag()){ echo '<li>'."Tag: ".single_tag_title('',FALSE).'</li>'; }
        if(is_404()){ echo '<li>'.__("404 - Page not Found", 'Creativo').'</li>'; }
        if(is_search()){ echo '<li>'.__("Search", 'Creativo').'</li>'; }
        if(is_year()){ echo '<li>'.get_the_time('Y').'</li>'; }

        echo "</ul>";
}
endif;

if( ! function_exists( 'less_css' ) ) {
	function less_css( $minify ) {
		/* remove comments */
		$minify = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $minify );

		/* remove tabs, spaces, newlines, etc. */
		$minify = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $minify );
			
		return $minify;
	}
}

/* Get Attachment id from image url */
function pn_get_attachment_id_from_url( $attachment_url = '' ) {
 
    global $wpdb;
    $attachment_id = false;
 
    // If there is no url, return.
    if ( '' == $attachment_url )
        return;
 
    // Get the upload directory paths
    $upload_dir_paths = wp_upload_dir();
 
    // Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
    if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
 
        // If this is the URL of an auto-generated thumbnail, get the URL of the original image
        $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
 
        // Remove the upload path base directory from the attachment URL
        $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
 
        // Finally, run a custom database query to get the attachment ID from the modified attachment URL
        $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
 
    }
 
    return $attachment_id;
}

function cr_share_post() {
  global $data, $post;
  $template_page = !is_single() ? 'share_archives' : ( is_singular('creativo_portfolio') ? 'no-float social_ic_margin' : '' );
  $content = '<ul class="get_social '.$template_page.'">';

  if($data['share_facebook'] !='no') { 
    $content .= '<li><a class="fb  ntip" href="http://www.facebook.com/sharer.php?m2w&s=100&p&#91;url&#93;=' . get_the_permalink() . '&p&#91;images&#93;&#91;0&#93;=' . wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) . '&p&#91;title&#93;=' . rawurlencode( get_the_title() ) .'" target="_blank" title="'. __("Share on Facebook", "Creativo").'"><i class="fa fa-facebook"></i></a></li>';    
  }

  if($data['share_twitter'] !='no') {
    $content .= '<li><a class="tw ntip" title="' . __("Share on Twitter", "Creativo") . '" href="https://twitter.com/share?text=' . rawurlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) ) . '&url=' . rawurlencode( get_the_permalink() ) . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
  } 

  if($data['share_linkedin'] !='no') {
    $content .= '<li><a class="lnk ntip" title="' . __("Share on LinkedIn", "Creativo") .'" href="https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink() . '&amp;title=' . rawurlencode( get_the_title() ) . '&amp;summary=' . rawurlencode( get_the_excerpt() ) .'" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
  }

  if($data['share_pinterest'] !='no') {
    $content .= '<li><a class="pinterest ntip" title="'. __("Share on Pinterest", "Creativo").'" href="http://pinterest.com/pin/create/button/?url=' . urlencode( get_the_permalink() ) . '&amp;description=' . rawurlencode( get_the_excerpt() ) . '&amp;media=' . rawurlencode( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) ) .'" target="_blank"><i class="fa fa-pinterest"></i></a></li>';
  }

  if($data['share_reddit'] !='no') {
    $content .= '<li><a class="rd ntip" title="' . __("Share on Reddit", "Creativo") .'" href="http://reddit.com/submit?url=' . get_the_permalink() . '&amp;title=' . rawurlencode( get_the_title() ) .'" target="_blank"><i class="fa fa-reddit"></i></a></li>';
  }

  if($data['share_tumblr'] !='no') {
    $content .= '<li><a class="tu ntip" title="'. __("Share on Tumblr", "Creativo").'" href="http://www.tumblr.com/share/link?url=' . rawurlencode( get_the_permalink() ) . '&amp;name=' . rawurlencode( get_the_title() ) .'&amp;description=' . rawurlencode( get_the_excerpt() ) .'" target="_blank"><i class="fa fa-tumblr"></i></a></li>';
  }

  if($data['share_gplus'] !='no') {
    $content .= '<li><a class="gp ntip" title="'. __("Share on Google+", "Creativo").'" href="https://plus.google.com/share?url=' . get_the_permalink() .'" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
  }  

  $content .= '</ul>';

  echo $content;
}

/* Create the Post Meta Function - used for Single and Archive Pages */
function cr_post_meta() {
    global $data, $post;
    $content = '';

    if( $data['show_categories'] ) {
      $categories = get_the_category();
      if ( ! empty( $categories ) ) {
        foreach( $categories as $category ) {
        $cat_output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( 'View all posts in %s', 'Creativo' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . ', ';
        }   
      }
    }

    if( $data['show_categories'] && ($data['post_meta_category_pos']=='above')){
      $content .= '<ul class="post_meta above_title">';
          $content .= '<li><i class="fa fa-bookmark"></i>' . trim( $cat_output, ', ' ) . '</li>';
      $content .= '</ul>';
    }
    
    /* Generate the Post Title tag - for Single Post or Archive page */
    $post_title_tag = is_single() ? ( $data['post_title_tag'] ? $data['post_title_tag'] : 'h1' ) : ($data['archives_post_title_tag'] ? $data['archives_post_title_tag'] : 'h2' );

    /* Generate extra class for title, depending on location: single or archive pages */
    $post_title_class = is_single() ? 'singlepost_title' : 'archives_title';

    /* Check the position of the Post Title and Meta */
    $post_meta_position = (get_post_meta(get_the_ID(), 'pyre_post_title_meta_pos', true) != NULL) ? get_post_meta(get_the_ID(), 'pyre_post_title_meta_pos', true) : $data['post_meta_style'];
    if( $post_meta_position == 'default' ) {
      $post_meta_position = $data['post_meta_style'];
    }
    

    /* Generate the actual title - no link for Single Post, with link for Archive Pages */
    $title = is_single() ? get_the_title() : '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
    
    /* Render the Title tag and Title Content */
    $content .= '<' . $post_title_tag .' class="' . $post_title_class . '">' . $title .'</' . $post_title_tag . '>';
    
    if( $data['show_date'] || $data['show_author'] || $data['show_categories'] || $data['show_comments'] ) {
      $content .= '<ul class="post_meta ' . ( $post_meta_position != 'above' ? 'default' : 'style2' ) . '">';      

      if($data['show_author']) {
        $content .= '<li><i class="fa fa-user"></i>' . __('by ','Creativo') . get_the_author_posts_link() . '</li>';
      }

      if( $data['show_date'] ) {
        $content .= '<li><i class="fa fa-clock-o"></i>' . get_the_time( get_option('date_format') ) . '</li>';
      }

      if( $data['show_categories'] && ($data['post_meta_category_pos'] != 'above' ) ) { 
        $content .= '<li><i class="fa fa-bookmark"></i>' . trim( $cat_output, ', ' ) . '</li>';
      }

      if($data['show_comments']) {
        $content .= '<li><i class="fa fa-comment"></i>' . __('Comments: ','Creativo') . '<a href="' . get_comments_link() .'">'. get_comments_number() . '</a></li>';
      }

      $content .= '</ul>';
    }

    echo $content;
}

function cr_featured_images( $thumbnail, $thumbnail_to_search) {
  global $data;
  $content = '';

  if(has_post_thumbnail() || get_post_meta(get_the_ID(), 'pyre_youtube', true) || get_post_meta(get_the_ID(), 'pyre_vimeo', true)) {
    $content .= '<div class="flexslider" data-interval="0" data-flex_fx="fade">';
      $content .= '<ul class="slides">';
        
        if( get_post_meta( get_the_ID(), 'pyre_youtube', true ) != '' ) {
          $content .= '<li class="video-container">';
            $content .= do_shortcode('[youtube id="'.get_post_meta(get_the_ID(), 'pyre_youtube', true).'"]');
          $content .= '</li>';
        }

        if( get_post_meta( get_the_ID(), 'pyre_vimeo', true ) != '' ) {
          $content .= '<li class="video-container">';
            $content .= do_shortcode('[vimeo id="'.get_post_meta(get_the_ID(), 'pyre_vimeo', true).'"]');
          $content .= '</li>';
        }

        /* Extra Featured Images */

        $extra ='';                                 
        $i = 2;
        while($i <= $data['featured_images_count']):
            $attachment = new StdClass();
            $attachment_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
            if($attachment_id):                                     
                $attachment_image = wp_get_attachment_image_src($attachment_id, $thumbnail); 
                $full_image = wp_get_attachment_image_src($attachment_id, 'full'); 
                $attachment_data = wp_get_attachment_metadata($attachment_id);  
                if($attachment_image && strpos($attachment_image[0], $thumbnail_to_search)) {                                    
                    $extra .= '<li><a href="'.get_permalink().'"><img src="'.$attachment_image[0].'" alt="'.$attachment_data['image_meta']['title'].'" ></a></li>';  
                }                                          
                else {
                    $extra .= '<li><a href="'.get_permalink().'"><img src="'.$full_image[0].'" alt="'.$attachment_data['image_meta']['title'].'" ></a></li>'; 
                }
            endif; 
            $i++; 
        endwhile;

        /* Featured Images output */

        if(has_post_thumbnail()){  

          $custom_thumb = wp_get_attachment_image_src ( get_post_thumbnail_id( get_the_ID() ), $thumbnail );
          $full_thumb = wp_get_attachment_image_src( get_the_ID(),'full' );   
          
          if($extra == '') {
            $content .= '<li>';
              $content .= '<figure>';
                $content .= '<a href="' . get_permalink() . '">';
                  $content .= '<div class="text-overlay">';
                    $content .= '<div class="info">';
                        $content .= '<i class="fa fa-search"></i>';
                    $content .= '</div>';
                  $content .= '</div>';
                                                                                     
                  if($custom_thumb && $thumbnail_to_search && strpos($custom_thumb[0], $thumbnail_to_search)) {
                    $content .= '<img src="'.$custom_thumb[0].'">';
                  }
                  else {
                    $content .= get_the_post_thumbnail(get_the_ID(), 'full');
                  }   
                  
                $content .= '</a>';
              $content .= '</figure>';
            $content .= '</li>';
          }

          else {
            $content .= '<li>';
              $content .= '<a href="'.get_permalink().'">';
                if($custom_thumb && strpos($custom_thumb[0], $thumbnail_to_search)) {
                  $content .= '<img src="'.$custom_thumb[0].'">';
                }
                else {
                  $content .= get_the_post_thumbnail(get_the_ID(), 'full');
                }                            
              $content .= '</a>';
            $content .= '</li>';                                   
            $content .= $extra;             
          }

        }

      $content .= '</ul>';
    $content .= '</div>';
  }

  echo $content;

}

/* bbPress custom breadcrumb alteration */

function custom_forum_breadcrumb( $args ) {

  $args['sep'] = '/';
  $args['home_text'] = '<i class="fa fa-home"></i>';
  return $args;

}

add_filter( 'bbp_before_get_breadcrumb_parse_args', 'custom_forum_breadcrumb' );

if( class_exists( 'WooCommerce' ) ) {

  function cr_header_products( $items ) {
    $items = '';
    
    global $woocommerce;
    
    if ( $woocommerce->cart->get_cart_contents_count() ) {
      $items .= '<div class="shopping_cart_items">';
      
        foreach($woocommerce->cart->cart_contents as $cart_item):
          $items .= '<div class="cart_item">';
            $items .= '<a class="" href="' . get_permalink( $cart_item['product_id'] ) . '">';
              $items .= get_the_post_thumbnail($cart_item['product_id'], 'shop_thumbnail');
              $items .= '<div class="cart_item_details">';
                $items .= '<span class="cart_item_title">' . $cart_item['data']->post->post_title . '</span>';
                $items .= '<span class="cart_item_price_quantity">' . $cart_item['quantity'] . ' x ' . $woocommerce->cart->get_product_subtotal( $cart_item['data'], 1 ) . '</span>';
              $items .= '</div>';
            $items .= '</a>'; 
          $items .= '</div>';
        endforeach;

        $items .= '<div class="shopping_cart_total">';
          $items .= '<span class="total_text">'. esc_html__( 'Total', 'Creativo' ).'</span>';
          $items .= '<span class="total_value">'. $woocommerce->cart->get_cart_total().'</span>';
        $items .= '</div>';

        $items .= '<div class="cart_checkout">';
          $items .= '<a href="' . get_permalink( get_option( 'woocommerce_cart_page_id' ) ) . '" class="button_header_cart">'. esc_html__( 'View Cart', 'Creativo' ).'</a>';
          $items .= '<a href="' . get_permalink( get_option('woocommerce_checkout_page_id') ) . '" class="button_header_cart inverse">'. esc_html__( 'Checkout', 'Creativo' ).'</a>';
        $items .= '</div>';

      $items .= '</div>';  

    }
    
    return $items;
  }

  // Support email login on my account dropdown
  if ( isset( $_POST['cr_log_box'] ) && 'true' == $_POST['cr_log_box'] ) {
    add_filter( 'authenticate', 'cr_email_login_auth', 10, 3 );
  }
  function cr_email_login_auth( $user, $username, $password ) {
    if ( is_a( $user, 'WP_User' ) ) {
      return $user;
    }

    if ( ! empty( $username ) ) {
      $username = str_replace( '&', '&amp;', stripslashes( $username ) );
      $user = get_user_by( 'email', $username );
      if ( isset( $user, $user->user_login, $user->user_status ) && 0 == (int) $user->user_status ) {
        $username = $user->user_login;
      }
    }

    return wp_authenticate_username_password( null, $username, $password );
  }

  // No redirect on woo my account dropdown login when it fails
  if ( isset( $_POST['cr_log_box'] ) && 'true' == $_POST['cr_log_box'] ) {
    add_action( 'init', 'cr_login_redirect_support' );
  }

  function cr_login_redirect_support() {
    if ( class_exists( 'WooCommerce' ) ) {

      // When on the my account page, do nothing
      if ( ! empty( $_POST['login'] ) && ! empty( $_POST['_wpnonce'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'woocommerce-login' ) ) {
        return;
      }

      add_action( 'login_redirect', 'cr_login_fail', 10, 3 );
    }
  }

  // Creativo Login Fail Test
  function cr_login_fail( $url = '', $raw_url = '', $user = '' ) {
    if ( ! is_account_page() ) {

      if ( isset( $_SERVER ) && isset( $_SERVER['HTTP_REFERER'] ) && $_SERVER['HTTP_REFERER'] ) {
        $referer_array = parse_url( $_SERVER['HTTP_REFERER'] );
        $referer = '//' . $referer_array['host'] . $referer_array['path'];

        // If there's a valid referrer, and it's not the default log-in screen
        if ( ! empty( $referer ) && ! strstr( $referer, 'wp-login' ) && ! strstr( $referer, 'wp-admin' ) ) {
          if ( is_wp_error( $user ) ) {
            // Let's append some information (login=failed) to the URL for the theme to use
            wp_redirect( add_query_arg( array( 'login' => 'failed' ), $referer ) );
          } else {
            wp_redirect( $referer );
          }
          exit;
        } else {
          return $url;
        }
      } else {
        return $url;
      }
    }
  }

  /* Show Product Stock and Availability */
  add_action( 'woocommerce_single_product_summary', 'cr_stock', 10 );

  function cr_stock() {
    global $product, $data;
    
    if( $data['woo_single_prod_stock'] ) {
      $availability      = $product->get_availability();
         
      ?>
      <div class="stock-options clearfix">
      <?php 

      $stock_output = ( $availability['class'] == 'in-stock' ) ? esc_html__( 'In Stock', 'Creativo' ) : esc_html__( 'Out of Stock', 'Creativo' );
      $stock_qty = (int)$product->stock;
      
      echo '<div class="stock-available"><span class="stock-available-text">' . esc_html__('Available', 'Creativo'). ':</span><span class="stock-text ' . $availability['class'] . '"> ' . $stock_output . '</span></div>';
      if( $data['woo_single_prod_stock_qty'] && ( $availability['class'] == 'in-stock' ) && !$product->is_type( 'grouped' ) ) {
        echo '<div class="stock-quantity"><span class="stock-quantity-text">' . esc_html__('Quantity', 'Creativo') . ':</span><span class="qty-text"> '. $stock_qty.'</span></div>';
      } 
      
      ?>
      
      </div>
    <?php
    }
  }

  /* Add Share Product above Product Meta */
  add_action( 'woocommerce_product_meta_end', 'cr_share_product', 10);

  function cr_share_product () {
    global $data;

    if( $data['woo_product_share'] ) {
      ?>
      <div class="cr_product_share clearfix"><span><?php echo esc_html('Share: ','Creativo' );?></span><?php cr_share_post(); ?></div>
      <?php
    }
  }

  /* Change WooCommerce Single Product Title */
  remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
  add_action('woocommerce_single_product_summary', 'cr_single_title',5);

  if ( ! function_exists( 'cr_single_title' ) ) {
     function cr_single_title() {
      global $data;

      $html_tag = $data['woo_prod_title_tag'] ? $data['woo_prod_title_tag'] : 'h2';
  ?>
              <?php echo '<' . $html_tag; ?> itemprop="name" class="product_title entry-title woo_single_prod_title"><?php the_title(); ?><?php echo '</'.$html_tag.'>'; ?>
  <?php
      }
  }


}
