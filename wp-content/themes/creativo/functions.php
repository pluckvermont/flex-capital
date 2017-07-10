<?php
// Translation
load_theme_textdomain('Creativo', get_template_directory() . '/languages');

// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );

require_once (get_template_directory().'/admin/index.php');
/*
if ($_GET['activated']){
    wp_redirect(admin_url("themes.php?page=optionsframework"));
}
*/
require_once(get_template_directory() . "/functions/megamenu/wp-nav-custom-walker.php");

if (is_admin()) {
	include_once (get_template_directory().'/functions/megamenu/mega-menu.php');
	include_once (get_template_directory().'/radium-demo-install/init.php');
}

function cr_theme_is_menus()
{
     if ('nav-menus.php' == basename($_SERVER['PHP_SELF'])) {
          return true;
     }
     // to be add some check code for validate only in theme options pages
     return false;
}

/* Load here the required actions */
require_once locate_template('functions/actions/header.php');


/*disable woocommerce js & style on pages where woocommerce is not used */
if($data['disable_woocommerce']) {
/**
 * Optimize WooCommerce Scripts
 * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
 */
	add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );

	function child_manage_woocommerce_styles() {	

		//first check that woo exists to prevent fatal errors
		if ( function_exists( 'is_woocommerce' ) ) {

			global $woocommerce;
			//remove generator meta tag
			remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
			
			//dequeue scripts and styles
			if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
				wp_dequeue_style( 'woocommerce_frontend_styles' );
				wp_dequeue_style( 'woocommerce-general');
				wp_dequeue_style( 'woocommerce-layout' );
				wp_dequeue_style( 'woocommerce-smallscreen' );
				wp_dequeue_style( 'woocommerce_fancybox_styles' );
				wp_dequeue_style( 'woocommerce_chosen_styles' );
				wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
				wp_dequeue_style( 'select2' );
				wp_dequeue_script( 'wc-add-payment-method' );
				wp_dequeue_script( 'wc-lost-password' );
				wp_dequeue_script( 'wc_price_slider' );
				wp_dequeue_script( 'wc-single-product' );
				wp_dequeue_script( 'wc-add-to-cart' );
				wp_dequeue_script( 'wc-cart-fragments' );
				wp_dequeue_script( 'wc-credit-card-form' );
				wp_dequeue_script( 'wc-checkout' );
				wp_dequeue_script( 'wc-add-to-cart-variation' );
				wp_deregister_script('wc-add-to-cart');
				wp_dequeue_script( 'wc-single-product' );
				wp_dequeue_script( 'wc-cart' );
				wp_dequeue_script( 'wc-chosen' );
				wp_dequeue_script( 'woocommerce' );
				wp_dequeue_script( 'prettyPhoto' );
				wp_dequeue_script( 'prettyPhoto-init' );
				wp_dequeue_script( 'jquery-blockui' );
				wp_dequeue_script( 'jquery-placeholder' );
				wp_dequeue_script( 'jquery-payment' );
				wp_dequeue_script( 'fancybox' );
				wp_dequeue_script( 'jqueryui' );

			}
		}

	}

}

/*-----------------------------------------------------------------------------------*/
/*	Register WP3.0+ Menus
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'cr_register_menu' ) ) {
    function cr_register_menu() {
	    register_nav_menu('primary-menu', __('Primary Menu'));
		register_nav_menu('side-menu', __('Side Navigation Menu'));
		register_nav_menu('top-menu', __('Top Menu'));
		register_nav_menu('one-page-menu', __('One Page Menu'));
		register_nav_menu('footer-menu', __('Footer Menu'));
    }

    add_action('init', 'cr_register_menu');
}

/* Add WooCommerce Login/Register - My Account link to Top Menu / Primary Menu */

function navigation_login( $items, $args) {
	global $data;

	if ( in_array( $args->theme_location, array( 'primary-menu', 'top-menu' ) ) ) {

		$en_location = ( $args->theme_location == 'top-menu' ) ? $data['woocommerce_login_top_menu'] : $data['woocommerce_login_primary_menu'];
		
		if ( class_exists( 'WooCommerce' ) && $en_location ) {
			$woo_account_link = wc_get_endpoint_url('edit-account','',wc_get_page_permalink( 'myaccount' ));
			$woo_cart_link = get_permalink( get_option( 'woocommerce_cart_page_id' ) );
			$woo_checkout_link = get_permalink( get_option( 'woocommerce_checkout_page_id' ) );
			$woo_orders_link = wc_get_endpoint_url('orders','',wc_get_page_permalink( 'myaccount' ));
			$woo_address_link = wc_get_endpoint_url('edit-address','',wc_get_page_permalink( 'myaccount' ));

			//$woo_account_page_link = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
			$logout_link = wp_logout_url( get_permalink( get_option( 'myaccount' ) ) );

			if ( $woo_account_link ) {

				$items .= '<li class="menu-item custom-login-box">';

				$caret = '';

				if($data['submenu_indicator']) {
					$caret .= '<span class="sf-sub-indicator"><i class="fa fa-angle-down"></i></span>';
				}
					$icon_render = $data['woocommerce_login_icon'] ? '<i class="'.$data['woocommerce_login_icon_render'].'"></i>' : 's';

					$main_link_title = ( !is_user_logged_in() ) ? $icon_render . esc_html__( 'Login/Register', 'Creativo' ) : $icon_render . esc_html__( 'My Account', 'Creativo' );
					$items .= '<a href="#">' . $main_link_title . $caret . '</a>';

					if ( ! is_user_logged_in() ) {
						$items .= '<div class="woo_login_form">';
							if ( isset( $_GET['login'] ) && 'failed' == $_GET['login'] ) {
								$items .= '<p class="cannot-login">' . esc_html__( 'Login failed, please try again.', 'Creativo' ) . '</p>';
							}
							$items .= '<form action="' . wp_login_url() . '" name="loginform" method="post" class="woo_submit_form">';
								$items .= '<input type="text" class="input-text" name="log" id="username" value="" placeholder="' . esc_html__( 'Username', 'Creativo' ) . '" />';
								$items .= '<input type="password" class="input-text" name="pwd" id="password" value="" placeholder="' . esc_html__( 'Password', 'Creativo' ) . '" />';
								$items .= '<label for="log_box_remember"><input name="rememberme" type="checkbox" id="fusion-menu-login-box-rememberme" value="forever"> ' . esc_html__( 'Remember Me', 'Creativo' ) . '</label>';
								$items .= '<input type="hidden" name="cr_log_box" value="true" />';
								
								$items .= '<input type="submit" name="wp-submit" id="wp-submit" class="button small default login_top" value="' . esc_html__( 'Log In', 'Creativo' ) . '">';
								$items .= '<input type="hidden" name="redirect" value="' . esc_url( ( isset( $_SERVER['HTTP_REFERER'] ) ) ? $_SERVER['HTTP_REFERER'] : $_SERVER['REQUEST_URI'] ) . '">';
								
							$items .= '</form>';
							$items .= '<a class="button small default register_top" href="' . get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) . '" title="' . __( 'Register', 'Creativo' ) . '">' . __( 'Register', 'Creativo' ) . '</a>';
						$items .= '</div>';
					}
					else {
						$items .= '<ul class="sub-menu">';
							$items .= '<li><a href="' . $woo_account_link . '">' . esc_html__( 'Account Details', 'Creativo' ) . '</a></li>';							
							$items .= '<li><a href="' . $woo_address_link . '">' . esc_html__( 'My Addresses', 'Creativo' ) . '</a></li>';
							$items .= '<li><a href="' . $woo_orders_link . '">' . esc_html__( 'My Orders', 'Creativo' ) . '</a></li>';
							$items .= '<li><a href="' . $woo_cart_link . '">' . esc_html__( 'Cart', 'Creativo' ) . '</a></li>';
							$items .= '<li><a href="' . $woo_checkout_link . '">' . esc_html__( 'Checkout', 'Creativo' ) . '</a></li>';
							$items .= '<li><a href="' . $logout_link . '">' . esc_html__( 'Logout', 'Creativo' ) . '</a></li>';
						$items .= '</ul>';
					}

				$items .= '</li>';

			}
		}

	}

	return $items;
}

add_filter( 'wp_nav_menu_items', 'navigation_login', 10, 3 );

function add_last_nav_item($items, $args) {
	global $data, $woocommerce;
	if( $args->theme_location == 'primary-menu' || $args->theme_location == 'one-page-menu' ) {
  		$items .= '<li class="header_search_li">';
			$items .= '<div id="header_search_wrap">';
				$items .= '<a href="#" id="header-search"><i class="fa fa-search"></i><i class="fa fa-remove"></i></a>';                                
			$items .= '</div>';
		$items .='</li>';

		if($data['woo_cart'] && class_exists('woocommerce')) {
			$items .= '<li class="shopping_cart_icon">';
				$items .= '<a class="shopping-cart" href="'.wc_get_cart_url().'" ><i class="fa fa-shopping-basket"></i><span>'. WC()->cart->get_cart_contents_count().'</span></a>';		
				$items .= '<div class="shopping_cart_wrap"></div>';						
			$items .='</li>';
		}

		if( isset( $data['off_canvas_sidebar'] ) && $data['off_canvas_sidebar'] == true ) {
			$items .= '<li class="side_panel_li">';
				$items .= '<div id="side-panel-trigger" class="side-panel-trigger">';
					$items .= '<a href="#" ><i class="'.$data['off_cnv_icon'].'"></i></a>';                                
				$items .= '</div>';
			$items .='</li>';		
		}
			$items .= '<li class="menu-item-resp responsive-item">';
				$items .= '<div class="responsive-search">';
					$items .= '<form action="'. get_home_url() .'" method="get" class="header_search">';
						$items .='<input type="text" name="s" class="form-control" value="" placeholder="">';
						$items .='<input type="submit" value="'.__('GO','Creativo').'" class="responsive_search_submit">';
	                $items .= '</form>';
				$items .= '</div>';
			$items .= '</li>';
						  
						  
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'add_last_nav_item', 10, 2 );

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	//ob_start();
	
	$shop_item_count = '<a class="shopping-cart" href="'.wc_get_cart_url().'" ><i class="fa fa-shopping-basket"></i><span class="item_counter">'.WC()->cart->get_cart_contents_count().'</span></a>';
	
	$fragments['a.shopping-cart'] = $shop_item_count;
	$fragments['.shopping_cart_wrap'] = '<div class="shopping_cart_wrap">'.cr_header_products().'</di>';
	
	return $fragments;
}

/*
$dir = get_stylesheet_directory() . '/vc_templates'; // First, set new directory for templates

if( function_exists ('vc_set_shortcodes_templates_dir') ) vc_set_shortcodes_templates_dir( $dir );
*/
/**
 * Register our sidebars and widgetized areas. Also register the default Epherma widget.
 *
 * @since Twenty Eleven 1.0
 */
function creativo_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Blog Sidebar', 'Creativo' ),
		'id' => 'sidebar-1',
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="title-holder"><h3 class="sidebar-title">',
		'after_title' => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Off-Canvas Sidebar', 'Creativo' ),
		'id' => 'sidebar-3',
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="sidebar-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'WooCommerce Sidebar', 'Creativo' ),
		'id' => 'woocommerce-sidebar',
		'before_widget' => '<div class="sidebar-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="sidebar-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar', 'Creativo' ),
		'id' => 'sidebar-2',
		'before_widget' => '<div class="footer_widget_content">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'bbPress Sidebar', 'Creativo' ),
		'id' => 'sidebar-5',
		'before_widget' => '<div class="sidebar-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="sidebar-title">',
		'after_title' => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'creativo_widgets_init' );

//fixing filtering for shortcodes
function shortcode_empty_paragraph_fix($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $array);
    return $content;
}

//allow custom font upload
add_filter('the_content', 'shortcode_empty_paragraph_fix');

add_filter('upload_mimes', 'cr_filter_mime_types');
function cr_filter_mime_types($mimes)
{
	$mimes['ttf'] = 'font/ttf';
	$mimes['woff'] = 'font/woff';
	$mimes['svg'] = 'font/svg';
	$mimes['eot'] = 'font/eot';

	return $mimes;
}

//dropdown arrows
class Arrow_Walker_Nav_Menu extends Walker_Nav_Menu {
    function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output) {
        $id_field = $this->db_fields['id'];
        if (!empty($children_elements[$element->$id_field]) && $element->menu_item_parent == 0) { 
            $element->title =  $element->title . '<span class="sf-sub-indicator"><i class="fa fa-angle-down"></i></span>'; 
			$element->classes[] = 'sf-with-ul';
        }
		
		if (!empty($children_elements[$element->$id_field]) && $element->menu_item_parent != 0) { 
            $element->title =  $element->title . '<span class="sf-sub-indicator"><i class="fa fa-angle-right"></i></span>'; 
        }

        Walker_Nav_Menu::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}

/* Add Next Page Button in First Row */
add_filter( 'mce_buttons', 'my_add_next_page_button', 1, 2 ); // 1st row
 
/**
 * Add Next Page/Page Break Button
 * in WordPress Visual Editor
 */
function my_add_next_page_button( $buttons, $id ){
 
    /* only add this for content editor */
    if ( 'content' != $id )
        return $buttons;
 
    /* add next page after more tag button */
    array_splice( $buttons, 13, 0, 'wp_page' );
 
    return $buttons;
}


/*-----------------------------------------------------------------------------------*/
/*	Configure WP2.9+ Thumbnails 
/*-----------------------------------------------------------------------------------*/

if( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
// Add post thumbnail functionality
add_image_size('blog-xxl', 800, 533, true);
add_image_size('blog-large', 600, 400, true);
add_image_size('blog-small', 345, 230, true);
//add_image_size('blog-medium', 320, 202, true);
//add_image_size('tabs-img', 52, 50, true); // aic scos
add_image_size('related-img', 180, 138, true);
add_image_size('portfolio-one', 540, 272, true);
add_image_size('portfolio-two', 550, 353, true);
add_image_size('portfolio-three', 381, 285, true);
add_image_size('portfolio-four', 271, 198, true);
add_image_size('testimonial', 90, 90, true);
//add_image_size('portfolio-full', 940, 400, true); // aici scos
add_image_size('recent-posts', 220, 135, true);
add_image_size('recent-posts-col-2', 600, 370, true);
add_image_size('recent-posts-col-3', 400, 245, true);
//add_image_size('recent-post-thumbnail',  66, 66, true);	// aici scos
//add_image_size('gallery-thumb',  90, 70, true);	// aici scos
}


/*-----------------------------------------------------------------------------------*/
/*	Custom Gravatar Support
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'cr_custom_gravatar' ) ) {
    function cr_custom_gravatar( $avatar_defaults ) {
        $cr_avatar = get_template_directory_uri() . '/images/gravatar.png';
        $avatar_defaults[$cr_avatar] = 'Custom Gravatar (/images/gravatar.png)';
        return $avatar_defaults;
    }
    
    add_filter( 'avatar_defaults', 'cr_custom_gravatar' );
}

/*-----------------------------------------------------------------------------------*/
/*	Comment Styling
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'comment_style' ) ) {
    function comment_style($comment, $args, $depth) {

        $GLOBALS['comment'] = $comment; ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     
            <div id="comment-<?php comment_ID(); ?>" class="comment_quote">            	
                <div>               
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em class="moderation"><?php _e('Your comment is awaiting moderation.', 'Creativo') ?></em>
                        <br />
                    <?php endif; ?>          
                    <div class="comment-body">
                        <?php comment_text() ?>
                    </div>
                </div>    
            </div>
            <div class="comment_details clearfix">
                <div class="comment_image">
                        <?php echo get_avatar($comment,$size='55'); ?>
                </div>
                <div class="comment_author_details">
                    <div class="comment-author vcard">
                            <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
                    </div>
        
                    <div class="comment-meta commentmetadata">
                        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'Creativo'), get_comment_date(),  get_comment_time()) ?></a>
                        <?php edit_comment_link(__('(Edit)', 'Creativo'),'  ','') ?> &middot; <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </div>
                </div>    
			</div>
    <?php
    }
}


/*-----------------------------------------------------------------------------------*/
/*	Seperated Pings Styling
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'cr_list_pings' ) ) {
    function cr_list_pings($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment; ?>
    	<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
    	<?php 
    }
}


/*-----------------------------------------------------------------------------------*/
/*	Change Default Excerpt Length
/*-----------------------------------------------------------------------------------*/
/*
if( !function_exists( 'cr_excerpt_length' ) ) {
    function cr_excerpt_length($length) {
    	return 40; 
    }
    
    add_filter('excerpt_length', 'cr_excerpt_length');
}

*/
/*-----------------------------------------------------------------------------------*/
/*	Configure Excerpt String
/*-----------------------------------------------------------------------------------*/
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');



if ( is_admin() ) {
    $of_page= 'appearance_page_options-framework';
    add_action( "admin_print_scripts-$of_page", 'optionsframework_custom_js', 0 );
}

function creativo_js_scripts() {
	
	global $data;
	
	wp_enqueue_script( 'jquery', false, array(), '5.5.8', true );

	wp_enqueue_style( 'creativo-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'fontawesome' , get_template_directory_uri() . '/css/fontawesome/css/font-awesome.css' );
	
	if ($data['page_load_effect']) {
		wp_enqueue_style( 'animsition' , get_template_directory_uri() . '/css/animsition.min.css' );
	}
	if ($data['responsiveness']) {	
    	wp_enqueue_style( 'responsive' , get_template_directory_uri() . '/css/responsive.css' );
 	} 
	else {
		wp_enqueue_style( 'fixed' , get_template_directory_uri() . '/css/fixed.css' );
	}
	wp_enqueue_script( 'plugins' , get_template_directory_uri() . '/js/plugins.js', array(), '5.7.5', TRUE );
    wp_enqueue_script( 'creativo.main', get_template_directory_uri().'/js/main.js', array(), '5.7.5', TRUE );

    $gmap_key = !empty( $data['gmap_api'] ) ? '?key='.$data['gmap_api'] : '';
    
    wp_enqueue_script( 'google-maps', '//maps.google.com/maps/api/js'.$gmap_key, array(), '5.7.5', TRUE );
    
    if( $data['google_maps_add'] == 0 ) {
    	wp_deregister_script( 'google-maps');
    }

    if ( function_exists( 'is_woocommerce' ) ) {
		//dequeue scripts and styles
		if ( is_woocommerce() || is_cart() || is_checkout() ) {
			wp_enqueue_script( 'woo', get_template_directory_uri().'/js/woo.js', array(), '5.7.5', TRUE );
		}
	}

	if($data['page_smooth_scroll']) {
		wp_enqueue_script( 'smoothscroll', get_template_directory_uri().'/js/smoothscroll.js', array(), '5.7.5', TRUE );
	}
	
	if($data['body_font'] && $data['body_font'] != 'Select Font') {
		$ggl_font[ urlencode( $data['body_font'] ) ] = '' . urlencode( $data['body_font'] );
	}
	if($data['heading_font'] && $data['heading_font'] != 'Select Font') {
		$ggl_font[ urlencode( $data['heading_font'] ) ] = '' . urlencode( $data['heading_font'] );
	}
	if($data['side_heading_font'] && $data['side_heading_font'] != 'Select Font') {
		$ggl_font[ urlencode( $data['side_heading_font'] ) ] = '' . urlencode( $data['side_heading_font'] );
	}
	if($data['menu_font_family'] && $data['menu_font_family'] != 'Select Font') {
		$ggl_font[ urlencode( $data['menu_font_family'] ) ] = '' . urlencode( $data['menu_font_family'] );
	}
	
	if($data['tm_font_family'] && $data['tm_font_family'] != 'Select Font') {
		$ggl_font[ urlencode( $data['tm_font_family'] ) ] = '' . urlencode( $data['tm_font_family'] );
	}
	
	if($data['logo_tagline_font'] && $data['logo_tagline_font'] != 'Select Font') {
		$ggl_font[ urlencode( $data['logo_tagline_font'] ) ] = '' . urlencode( $data['logo_tagline_font'] );
	}
	
	if($data['hlr_font_family'] && $data['hlr_font_family'] != 'Select Font') {
		$ggl_font[ urlencode( $data['hlr_font_family'] ) ] = '' . urlencode( $data['hlr_font_family'] );
	}
	
	if ( isset( $ggl_font ) && $ggl_font ) {
		$font_families = '';
						
		$font_styles = $font_subsets = '';
			
		$font_subsets = $data['ggl_character_sets'];
		$font_styles = $data['ggl_font_weight'];

		foreach ( $ggl_font as $g_font ) {
			$font_families .= sprintf( '%s:%s|', $g_font, urlencode( $font_styles ) );
		}
			
		if ( $font_subsets ) {
			$font_families = sprintf( '%s&%s', rtrim( $font_families, '|' ), $font_subsets );
		} else {
			$font_families = rtrim( $font_families, '|' );
		}

		wp_enqueue_style( 'google-fonts', 'http' . ( ( is_ssl() ) ? 's' : '' ) . '://fonts.googleapis.com/css?family=' . $font_families, array(), '5.7.5' );
	}		

}
add_action('wp_enqueue_scripts', 'creativo_js_scripts');

function extra_vc_style() {
	wp_enqueue_style( 'vc_style' , get_template_directory_uri() . '/css/vc_style.css' );
}

add_action( 'wp_enqueue_scripts', 'extra_vc_style', 15 );

function creativo_admin_script(){	
	wp_enqueue_script('chosen', get_template_directory_uri() . '/js/chosen.jquery.min.js', array('jquery'), '5.7.5', true);
	wp_enqueue_style('chosen_style', get_template_directory_uri() . '/css/chosen-select.css');	
}

add_action('admin_enqueue_scripts', 'creativo_admin_script');

if(is_admin()) {		

	/*
	Add MultiSelect Option to Visual Composer Params
	*/
	if (function_exists('add_shortcode_param')) {
	    add_shortcode_param('multiselect', 'multiselect_param_field');
	}
	function multiselect_param_field($settings, $value)
	{
	    $dependency = vc_generate_dependencies_attributes($settings);
	    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
	    $type       = isset($settings['type']) ? $settings['type'] : '';
	   // $options    = isset($settings['options']) ? $settings['options'] : '';
	    $output     = '';
	    //$uniqeID    = uniqid();

	    $output .= '<select multiple="multiple" name="' . $param_name . '" id="multiselect-' . $param_name . '" style="width:100%" ' . $dependency . ' class="wpb-multiselect ' . $dependency . ' wpb_vc_param_value ' . $param_name . ' ' . $type . '">';
	    if ($settings['value'] != null && !empty($settings['value'])) {
	        foreach ($settings['value'] as $key => $option) {
	            $selected = '';
	            if(is_array($value) ) {
	            	if (in_array($key, $value)) {
		                $selected = ' selected="selected"';
		            }
	            }
	            else{
		            if (in_array($key, explode(',', $value))) {
		                $selected = ' selected="selected"';
		            }
		        }
	            $output .= '<option value="' . $key . '"' . $selected . '>' . $option . '</option>';
	        }
	    }
	    $output .= '</select>';

	    $output .= '<script type="text/javascript">

	        jQuery("#multiselect-' . $param_name . '").chosen();

	    </script>';

	    return $output;
	}

}

function cr_searchform() {
	echo '<form method="get" id="searchform" action="'. get_home_url().'"><fieldset style="border:none;"><input type="text" name="s" id="s" value="'. __('Search keywords here', 'Creativo') .'" onfocus="if(this.value==\''. __('Search keywords here', 'Creativo'). '\') this.value=\'\';" onblur="if(this.value==\'\')this.value=\''. __('Search keywords here', 'Creativo').'\';" /></fieldset><!--END #searchform--></form>';	
}

/* WOOCOMMERCE FILTER HOOKS
	================================================== */
		
	/************************************************
	*	WooCommerce Functions		       	     	* 
	/************************************************/
	
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
	
	function my_theme_wrapper_start() {
	  echo '<div class="page-content clearfix">';
	}
	 
	function my_theme_wrapper_end() {
	  echo '</div>';
	}
	
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// Auto plugin activation
require_once('functions/plugin/class-tgm-plugin-activation.php');
add_action('tgmpa_register', 'cr_register_required_plugins');
function cr_register_required_plugins() {
	global $data;
	$plugins = array(
		array(
            'name'          => '1. WPBakery Visual Composer', // The plugin name
            'slug'          => 'js_composer', // The plugin slug (typically the folder name)
            'source'            => get_template_directory() . '/functions/plugin/js_composer.zip', // The plugin source
            'required'          => true, // If false, the plugin is only 'recommended' instead of required
            'version'           => '5.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'      => '', // If set, overrides default API URL and points to an external URL
        ),
		array(
			'name'     				=> '2. Layer Slider', // The plugin name
			'slug'     				=> 'LayerSlider', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/functions/plugin/LayerSlider.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '6.0.6', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> '3. Revolution Slider ', // The plugin name
			'slug'     				=> 'revslider', // Theplugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/functions/plugin/revslider.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '5.3.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'      => 'WooCommerce',
 			'slug'      => 'woocommerce',
 			'required'  => false,
		), 
		array(
			'name'      => 'The Events Calendar',
 			'slug'      => 'the-events-calendar',
 			'required'  => false,
		), 		
		array(
 			'name'      => 'Contact Form 7',
 			'slug'      => 'contact-form-7',
 			'required'  => false,
 		),
 		array(
 			'name'		=> 'MailChimp for WordPress',
 			'slug'		=> 'mailchimp-for-wp',
 			'required'	=> false,
 		),
	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'Creativo';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'	   		=> 'Creativo',		 	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',						 	// Default absolute path to pre-packaged plugins
		'parent_slug' 	=> 'themes.php', 				// Default parent menu slug		
		'menu'		 		=> 'install-required-plugins', 	// Menu slug
		'has_notices'	  	=> true,					   	// Show admin notices or not
		'is_automatic'		=> true,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'	  		=> array(
			'page_title'					   			=> __( 'Install Required Plugins', 'Creativo' ),
			'menu_title'					   			=> __( 'Install Plugins', 'Creativo' ),
			'installing'					   			=> __( 'Installing Plugin: %s', 'Creativo' ), // %1$s = plugin name
			'oops'							 			=> __( 'Something went wrong with the plugin API.', 'Creativo' ),
			'notice_can_install_required'	 			=> _n_noop( 'This theme requires the following plugin installed or update: %1$s.', 'This theme requires the following plugins installed or updated: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin installed or updated: %1$s.', 'This theme recommends the following plugins installed or updated: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'				=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'						   			=> __( 'Return to Required Plugins Installer', 'Creativo' ),
			'plugin_activated'				 			=> __( 'Plugin activated successfully.', 'Creativo' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'Creativo' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa($plugins, $config);
}
/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
add_action( 'vc_before_init', 'cr_vcSetAsTheme' );
function cr_vcSetAsTheme() {
    vc_set_as_theme($disable_updater = true);
}


require_once('functions/plugin/multiple-featured-images/multiple-featured-images.php');

if( class_exists( 'kdMultipleFeaturedImages' )) {
		$i = 2;

		while($i <= $data['featured_images_count']) {
	        $args = array(
	                'id' => 'featured-image-'.$i,
	                'post_type' => 'post',      // Set this to post or page
	                'labels' => array(
	                    'name'      => __( 'Featured image ', 'Creativo' ).$i,
	                    'set'       => __( 'Set featured image ', 'Creativo' ).$i,
	                    'remove'    => __( 'Remove featured image ', 'Creativo' ).$i,
	                    'use'       => __( 'Use as featured image ', 'Creativo' ).$i,
	                )
	        );

	        new kdMultipleFeaturedImages( $args );

	        $args = array(
	                'id' => 'featured-image-'.$i,
	                'post_type' => 'page',      // Set this to post or page
	                'labels' => array(
	                    'name'      => __( 'Featured image ', 'Creativo' ).$i,
	                    'set'       => __( 'Set featured image ', 'Creativo' ).$i,
	                    'remove'    => __( 'Remove featured image ', 'Creativo' ).$i,
	                    'use'       => __( 'Use as featured image ', 'Creativo' ).$i,
	                )
	        );

	        new kdMultipleFeaturedImages( $args );

	        $args = array(
	                'id' => 'featured-image-'.$i,
	                'post_type' => 'creativo_portfolio',      // Set this to post or page
	                'labels' => array(
	                    'name'      => __( 'Featured image ', 'Creativo' ).$i,
	                    'set'       => __( 'Set featured image ', 'Creativo' ).$i,
	                    'remove'    => __( 'Remove featured image ', 'Creativo' ).$i,
	                    'use'       => __( 'Use as featured image ', 'Creativo' ).$i,
	                )
	        );

	        new kdMultipleFeaturedImages( $args );

	        $i++;
    	}

}

/*
function vc_theme_vc_row($atts, $content = null) {
   return '<div class=""><div>'.wpb_js_remove_wpautop($content).'</div></div>';
}
*/



/*-----------------------------------------------------------------------------------*/
/*	Load Widgets & Shortcodes
/*-----------------------------------------------------------------------------------*/

// More custom functions
include_once('functions/custom_functions.php');

// VC custom classes
include_once('functions/vc_class.php');

// Add the Theme Shortcodes
include("functions/shortcodes.php");
 
// Add meta boxes
include('functions/metaboxes.php');

// Add the post types
include("functions/theme-posttypes.php");

// Add about me widget
include("functions/widget-about.php");

// Add flickr widget
include("functions/widget-flickr.php");

// Add Instagram widget
include("functions/widget-instagram.php");

// Add contact info widget
include("functions/widget-contact.php");

// Add latest tweets widget
include("functions/widget-tweets.php");

// Add the Custom Youtube Widget
include("functions/widget-youtube.php");

// Add the Custom Vimeo Widget
include("functions/widget-vimeo.php");

// Add the Popular/Recent Tabs Widget
include("functions/widget-tabs.php");

// Add Custom Blog Posts Widget
include('functions/widget-blogposts.php'); 

// Add socila links widget
include("functions/widget-social.php");

// Add Custom Recent Portfolios Widget
include('functions/widget-recentportfolios.php');

// Add the post types
include_once('functions/plugin/multiple_sidebars.php');

/*-----------------------------------------------------------------------------------*/
/*	Filters that allow shortcodes in Text Widgets
/*-----------------------------------------------------------------------------------*/

add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');


function SearchFilter($query) {
	global $data;
	$search_array = array();
	$search_array[] = 'nav_menu_item';
	
	if($data['en_search_post']) $search_array[] = 'post';
	if($data['en_search_page']) $search_array[] = 'page';
	if($data['en_search_portfolio']) $search_array[] = 'creativo_portfolio';
	if($data['en_search_product']) $search_array[] = 'product';
	if( empty( $search_array ) ) $search_array[] = ' ';
	
	$spb = false;		
	if(class_exists('Woocommerce') && ( is_product() || is_woocommerce() ) ) $spb = true;

	if (is_search() && !$spb && !is_admin()) {
		$query->set('post_type', $search_array);
	}
	return $query;
	wp_reset_query();
}

add_filter('pre_get_posts','SearchFilter');

function custom_sanitize_textarea($input) {
    global $allowedposttags;
    $custom_allowedtags["embed"] = array(
      "src" => array(),
      "type" => array(),
      "allowfullscreen" => array(),
      "allowscriptaccess" => array(),
      "height" => array(),
          "width" => array()
      );
      $custom_allowedtags["script"] = array();
      $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
      $output = wp_kses( $input, $custom_allowedtags);
    return $output;
}

remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

// How many woocommerce products to display per page
if(class_exists('Woocommerce')) {

	// Change number or products per row to 3
	add_filter('loop_shop_columns', 'loop_columns');
	if (!function_exists('loop_columns')) {
		function loop_columns() {
			global $data;
			if($data['woocommerce_sidebar_en']) { 
				return 3; // 3 products per row
			}
			else {
				return 4;
			}
		}
	}

	/* Change the columns number for related products */
	add_filter( 'woocommerce_output_related_products_args', 'cr_related_products_args' );
	function cr_related_products_args( $args ) {	
		global $data, $post;

		$has_sidebar = ( get_post_meta( get_the_ID(), 'pyre_en_prod_sidebar', true) != NULL && get_post_meta( get_the_ID(), 'pyre_en_prod_sidebar', true) != 'default' ) ? get_post_meta( get_the_ID(), 'pyre_en_prod_sidebar', true) : $data['woocommerce_sidebar_product_en'];

		if( $has_sidebar == 'yes' || $has_sidebar == 1) { 
			$args['columns'] = 3; // arranged in 3 columns
			$args['posts_per_page'] = 3; // 4 related products
		}
		else{
			$args['columns'] = 4; // arranged in 4 columns
			$args['posts_per_page'] = 4; // 4 related products	
		}
		return $args;
	}
		
	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return ' . ( isset($data['products_per_page']) ? $data['products_per_page'] : 10 ) . ';' ), 20 );

}
/*
function wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

*/

require_once('wp-updates-theme.php');
new WPUpdatesThemeUpdater_398( 'http://wp-updates.com/api/2/theme', basename( get_stylesheet_directory() ) );

include_once( get_template_directory() . "/themeupgrader.php" );
new EWA_Theme_Upgrader( "http://rockythemes.com/api", 1 );