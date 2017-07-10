		<?php
		$boxed = false;
		$body = $transparent_logo = $container_parallax = $container_style = '';	
		if(	$data['custom_woff'] && $data['custom_ttf'] && $data['custom_svg'] && $data['custom_eot'] ){
		?>
			@font-face {
				font-family: 'CustomFont';
				src: url('<?php echo $data['custom_eot']; ?>'); /* IE9 Compat Modes */
				src: url('<?php echo $data['custom_eot']; ?>?#iefix') format('embedded-opentype'), /* IE6-IE8 */
					 url('<?php echo $data['custom_woff']; ?>') format('woff'), /* Modern Browsers */
					 url('<?php echo $data['custom_ttf']; ?>') format('truetype'), /* Safari, Android, iOS */
					 url('<?php echo $data['custom_svg']; ?>#CustomFont') format('svg'); /* Legacy iOS */	
				
			}
		<?php
		// where to use the custom font		
		$custom_body = ($data['custom_body']) ? true : false; // use on Body
		$custom_menu = ($data['custom_menu']) ? true : false; // use on Menu
		$custom_heading = ($data['custom_heading']) ? true : false; // use on Headings
		$custom_sidebar = ($data['custom_sidebar']) ? true : false; // use on Sidebar Headings
		$custom_logo = ($data['custom_logo_tagline']) ? true : false; // use on Text Logo and Tagline			
		}
		
		// logo and tagline font family
		if(!$custom_logo) {	
			if($data['logo_tagline_font'] != 'Select Font') {
				$logo_font = '"'.$data['logo_tagline_font'].'", Arial, Helvetica, sans-serif';
			}
		}
		else {
			$logo_font = "'CustomFont', Arial, Helvetica, sans-serif";
		}
		
		// body font family
		if(!$custom_body){
			if($data['google_body'] != 'Select Font') {
				$body_font = '"'.$data['body_font'].'", Arial, Helvetica, sans-serif';
			}
		}
		else{
			$body_font = "'CustomFont', Arial, Helvetica, sans-serif";
		}
		
		// headings font family
		if(!$custom_heading){
			if($data['heading_font'] != 'Select Font') {
				$heading_font = '"'.$data['heading_font'].'", Arial, Helvetica, sans-serif';
			}
		}
		else{
			$heading_font = "'CustomFont', Arial, Helvetica, sans-serif";
		}
		
		// sidebar font family
		if(!$custom_sidebar){
			if($data['side_heading_font'] != 'Select Font') {
				$sidebar_heading_font = '"'.$data['side_heading_font'].'", Arial, Helvetica, sans-serif';
			}
		}
		else {
			$sidebar_heading_font = "'CustomFont', Arial, Helvetica, sans-serif";
		}
		
		// navigation font family
		if(!$custom_menu) {
			if($data['menu_font_family'] != 'Select Font') {
				$navigation_font = '"'.$data['menu_font_family'].'", Arial, Helvetica, sans-serif';
			}
		}
		else {
			$navigation_font = "'CustomFont', Arial, Helvetica, sans-serif";
		}
		// navigation font family
		if(!$custom_top_menu) {
			if($data['tm_font_family'] != 'Select Font') {
				$tm_font = '"'.$data['tm_font_family'].'", Arial, Helvetica, sans-serif';
			}
		}
		else {
			$tm_font = "'CustomFont', Arial, Helvetica, sans-serif";
		}
		?>
        
        body,
		.more,
		.meta .date,
		.review blockquote q,
		.review blockquote div strong,
		.footer-area  h3,
		.image .image-extras .image-extras-content h4,
		.project-content .project-info h4,
		.post-content blockquote,
        input, textarea, keygen, select, button		
		{
			font-family:<?php echo $body_font; ?>;
			font-size:<?php echo $data['font_size']; ?>px;
            line-height: <?php echo $data['body_line_height']; ?>;
            font-weight: <?php echo $data['body_font_weight']; ?>;
		}
        
        #branding .text, #branding .tagline, .side_logo .text, .side_logo .tagline {
        	font-family: <?php echo $logo_font; ?>;
        }
        
        #branding .text, .side_logo .text {
        	font-size: <?php echo $data['textlogo_font_size']; ?>px;
        }
		
		body {
			color: <?php echo $data['font_color']; ?>;
			background-color: <?php echo $data['body_bg_color'] ?>
		}
		.content_box_title span.white {
			color: <?php echo $data['font_color']; ?>;
		}
		
		#navigation .has-mega-menu ul.twitter li i {
			color: <?php echo $data['font_color']; ?>;
		}
		
		h1, h2, h3, h4, h5, h6,  .content_box_title span.grey, .bellow_header_title,.qbox_title1,.content_box_title span.white,.full .title,.tab-holder .tabs li, .page-title .breadcrumb{
			font-family: <?php echo $heading_font; ?>;
		}
        h1, h2, h3, h4, h5, h6, .blogpost .post-content h1, .blogpost .post-content h2, .blogpost .post-content h3, .blogpost .post-content h4, .blogpost .post-content h5, .blogpost .post-content h6 {
        	font-weight: <?php echo $data['headings_font_weight']; ?>;
            margin-bottom: <?php echo $data['headings_margin_bottom']; ?>px;
        }
        h1, .post-content h1, h1, .blogpost .post-content h1 {
        	font-size: <?php echo $data['h1_font_size']; ?>px;
        }
        h2, .post-content h2, .blogpost .post-content h2 {
        	font-size: <?php echo $data['h2_font_size']; ?>px;
        }
        h3, .post-content h3, .blogpost .post-content h3 {
        	font-size: <?php echo $data['h3_font_size']; ?>px;
        }
        h4, .post-content h4, .blogpost .post-content h4 {
        	font-size: <?php echo $data['h4_font_size']; ?>px;
        }
        h5, .post-content h5, .blogpost .post-content h5 {
        	font-size: <?php echo $data['h5_font_size']; ?>px;
        }
        h6, .post-content h6, .blogpost .post-content h6 {
        	font-size: <?php echo $data['h6_font_size']; ?>px;
        }
        p, .post-content p {
        	margin-bottom: <?php echo $data['paragraph_margin_bottom']; ?>px;
        }
		h3.sidebar-title {
			font-family: <?php echo $sidebar_heading_font; ?>;
			font-size: <?php echo $data['side_font_size']; ?>px;
		}
		.woocommerce h1,.woocommerce h2,.woocommerce h3,.woocommerce h4,.woocommerce h5 {
			font-family: <?php echo $body_font; ?>;
		}
		h3.footer-widget-title {
			font-family: <?php echo $sidebar_heading_font; ?>;
		}
		#top-menu {
        	font-family: <?php echo $tm_font; ?>;
            font-size: <?php echo $data['tm_font_size'] ?>px;
        }
        .top_contact {
        	font-size: <?php echo $data['tb_contact_font_size']; ?>px;
        }
        #top-menu li a {
        	color: <?php echo $data['tm_link_color'] ?>;
        }
        #top-menu li a:hover {
        	color: <?php echo $data['tm_link_color_hover'] ?>;
        }
        <?php
		if ( isset($data['footer_right_area']) && ($data['footer_right_area']!='empty') && ($data['footer_right_area'] =='footer_menu')) {
			?>
            #footer-menu li a{
				color: <?php echo $data['fm_link']; ?>;
            }
            #footer-menu li a:hover{
				color: <?php echo $data['fm_link_hover']; ?>;
            }
		<?php
		}
		?>
        .page-title h1, .page-title h2, .page-title h3, .page-title h4, .page-title h5, .page-title h6, .page-title div:not(.breadcrumb), .page-title p {
        	<?php if(get_post_meta($post->ID, 'pyre_page_title_font_size', true)=='') { ?>
        		font-size: <?php echo $data['page_title_font_size']; ?>px;
            <?php } else { ?>
            	font-size: <?php echo get_post_meta($post->ID, 'pyre_page_title_font_size', true); ?>;
            <?php } ?>
        }
        .page-title h3.subhead {
        	<?php if(get_post_meta($post->ID, 'pyre_page_title_subhead_font_size', true)=='') { ?>
        		font-size: <?php echo $data['page_title_subheading_font_size']; ?>px;
            <?php } else { ?>
            	font-size: <?php echo get_post_meta($post->ID, 'pyre_page_title_subhead_font_size', true); ?>;
            <?php } ?>    
        }
        #top-menu > li {            
            border-color: <?php echo $data['tm_separator_color']; ?>;
        }
        <?php
        /*
		if($data['tm_separator']) {
		?>
            #top-menu li:after {
                content: "<?php echo $data['tm_separator_symbol'] ?>";
                color: <?php echo $data['tm_separator_color']; ?>;
            }
        <?php
		}
		else{
		?>
        	#top-menu li:after {
            	content: "";
            }
        <?php
		}*/
		?>
		#navigation {
			font-family: <?php echo $navigation_font; ?>;
		}
		.tp-bannertimer {
			background-image:none !important;			
			height:7px;
		}
		.latest-posts h2, .page-title, .action_bar_inner h2{
			font-family:<?php echo $body_font; ?>;
		}
		.container {
			background-color: <?php echo $data['body_bg_color_inside']; ?>;
		}

	<?php
	//Page Title single page/post design
	
	if( get_post_meta($post->ID, 'pyre_show_title', true) == 'no' || ( $data['global_title_bread'] == 1 )) {
		?>
        .bellow_header {
        	display: none;
            height: 0px;
        }
        <?php
	}
	if( get_post_meta($post->ID, 'pyre_show_breadcrumb', true) == 'no' || ($data['breadcrum_show'] == 'no') ) {
		?>
        .page-title .breadcrumb {
        	display: none;
        }
        <?php
	}
	if( $data['page_title_show'] == 'no') {
		?>
		.page-title h1, .page-title h2, .page-title h3, .page-title h4, .page-title h5, .page-title h6, .page-title div:not(.breadcrumb), .page-title p {
			display: none;
		}
		.bellow_header_title {
			margin: 5px auto;
		}
		.search.search-no-results .bellow_header{
			display: none;
		}
		.search.search-results .page-title h1,
		.search.search-results .page-title h2,
		.search.search-results .page-title h3,
		.search.search-results .page-title h4,
		.search.search-results .page-title h5,
		.search.search-results .page-title h6,
		.search.search-results .page-title p{
			display: initial;
		}
		<?php
	}

	if($data['page_title_posts'] == 'no') {
		?>
		.single-post .bellow_header {
        	display: none;
            height: 0px;
        }
		<?php
	}
	if($data['page_title_pages'] == 'no') {
		?>
		.page .bellow_header {
        	display: none;
            height: 0px;
        }
		<?php
	}
	if($data['page_title_portfolio'] == 'no') {
		?>
		.single-creativo_portfolio .bellow_header {
        	display: none;
            height: 0px;
        }
		<?php
	}
	if($data['page_title_woocommerce'] == 'no') {
		?>
		.woocommerce-page .bellow_header {
        	display: none;
            height: 0px;
        }
		<?php
	}
	if($data['page_title_bbpress'] == 'no') {
		?>
		.bbpress .bellow_header {
        	display: none;
            height: 0px;
        }
		<?php
	}
	if( get_post_meta($post->ID, 'pyre_show_page_title', true) == 'no') {
		?>
        .page-title h1, .page-title h2, .page-title h3, .page-title h4, .page-title h5, .page-title h6, .page-title div:not(.breadcrumb), .page-title p {
        	display: none;
        }
        <?php
	}
	/*
	if($data['page_title_align'] == 'right') {
		?>
		.page-title {
			text-align: right;
		}
		.breadcrumb_search_form {
        	right: auto;
            left:0;
        }
		<?php
	}
	if($data['page_title_align'] == 'center') {
		?>
		.page-title {
        	text-align:center;
        }
        .breadcrumb_search_form {
        	position:relative;
            left: 50%;
            width: 600px;
            margin-left: -300px;
            margin-top: 15px;
        }
        .breadcrumb_search_form input[type=text] {
        	width: 100%;
            text-align: center;
        }
		<?php
	}
	*/

	$page_title_align = (get_post_meta( get_the_ID(), 'pyre_page_title_align', true) != NULL) ? get_post_meta($post->ID, 'pyre_page_title_align', true) : $data['page_title_align'];
	if( $page_title_align == 'default' ) {
		$page_title_align = $data['page_title_align'];
	}
	if( $page_title_align == 'right') {
		?>
        .page-title {
        	text-align:right;
        }
        .breadcrumb_search_form {
        	right: auto;
            left:0;
        }
        <?php
	}
	if( $page_title_align == 'center') {
		?>
        .page-title {
        	text-align:center;
        }
        .breadcrumb_search_form {
        	position:relative;
            left: 50%;
            width: 600px;
            margin-left: -300px;
            margin-top: 15px;
        }
        .breadcrumb_search_form input[type=text] {
        	width: 100%;
            text-align: center;
        }
        <?php
	}
	if( get_post_meta($post->ID, 'pyre_show_searchbox', true) == 'no') {
		?>
        .breadcrumb_search_form {
        	display: none;
        }
        <?php
	}
	
	if( get_post_meta($post->ID, 'pyre_page_title_height', true) != '') {
		?>
        .bellow_header {
        	height: <?php echo get_post_meta($post->ID, 'pyre_page_title_height', true); ?>;
            padding:0;   
            box-sizing:border-box;         
        }
        .bellow_header_title {
        	display: table;
            height: 100%;
            width: 100%;
            margin:0 auto;
        }
        .page-title {
        	display:table-cell;
            vertical-align: middle;
        }
        @media screen and (min-width: 830px) {
        	<?php
			if( get_post_meta($post->ID, 'pyre_page_title_top_padding', true) != '' ){
				?>
                .bellow_header {
                	padding-top: <?php echo get_post_meta($post->ID, 'pyre_page_title_top_padding', true);?>;
                }    
                <?php
			}
			?>
        }
        <?php
	}
	if(get_post_meta($post->ID, 'pyre_page_title_bg_color', true) != '') {
		?>
        .bellow_header {
        	background-color: <?php echo get_post_meta($post->ID, 'pyre_page_title_bg_color', true); ?> !important;
        }
        <?php
	}
	if(get_post_meta($post->ID, 'pyre_page_title_font_color', true) != '') {
		?>
        .page-title h1, .page-title h2, .page-title h3, .page-title h4, .page-title h5, .page-title h6, .page-title div:not(.breadcrumb), .page-title p {
        	color: <?php echo get_post_meta($post->ID, 'pyre_page_title_font_color', true); ?>;
        }
        <?php
	}
	if( (get_post_meta($post->ID, 'pyre_breadcrumb_font_color', true) != '' ) || ( get_post_meta($post->ID, 'pyre_breadcrumb_font_size', true) != '' ) ){
		?>
        .page-title .breadcrumb a, .page-title ul li {
        	color: <?php echo get_post_meta($post->ID, 'pyre_breadcrumb_font_color', true); ?>!important;
            font-size: <?php echo get_post_meta($post->ID, 'pyre_breadcrumb_font_size', true); ?>;
            line-height:2;
        }
        <?php
	}
	
	if(get_post_meta($post->ID, 'pyre_page_title_bg_img', true) != '') {
		?>
        .bellow_header {
        	background:url("<?php echo get_post_meta($post->ID, 'pyre_page_title_bg_img', true); ?>");
            <?php 
			if(get_post_meta($post->ID, 'pyre_page_title_bg_img_full', true) == 'yes') {
				?>
            	background-size:cover;                  	
                <?php
			}
			if(get_post_meta($post->ID, 'pyre_page_title_parallax', true) == 'yes') {
			?>
            	background-size:cover;
                background-attachment:fixed;
            <?php
			}
			?>
        }
        <?php
		if(get_post_meta($post->ID, 'pyre_page_title_mask', true) !='' ) {
			if( get_post_meta($post->ID, 'pyre_page_title_mask_transparency', true) != '' ) {
				$mask_transp = explode("%", get_post_meta($post->ID, 'pyre_page_title_mask_transparency', true));
				$mask_transp = 1 - ($mask_transp[0] / 100);
			}
			else {
				$mask_transp = 0.5;
			}
			$pt_rgba = hex2rgba( get_post_meta($post->ID, 'pyre_page_title_mask', true) );
			?>
            .pt_mask {
            	height: 100%;
                background-color: rgba(<?php echo $pt_rgba[0] . ',' . $pt_rgba[1] . ',' . $pt_rgba[2]; ?>, <?php echo $mask_transp; ?>);	
            }
            <?php
		}
	}

	if(!$data['use_custom']){ 
		$primary_color = $data['primary_color'];
		$second_link_color = $data['second_link_color'];
		$pb_hover_color = $data['pb_hover_color'];
		$shortcode_color = $data['shortcode_color'];
		$button_text_color = $data['button_text_color'];
		$button_text_shadow_color = $data['button_text_shadow_color'];
		$button_gradient_top_color = $data['button_gradient_top_color'];
		$button_gradient_bottom_color = $data['button_gradient_bottom_color'];
		$button_border_color = $data['button_border_color'];
		$footer_link_color = $data['footer_widget_link_color'];
	}
	else{
		$primary_color = $data['custom_primary_color'];
		$second_link_color = $data['custom_second_link_color'];
		$pb_hover_color = $data['custom_pb_hover_color'];
		$shortcode_color = $data['custom_shortcode_color'];
		$button_text_color = $data['custom_button_text_color'];
		$button_text_shadow_color = $data['custom_button_text_shadow_color'];
		$button_gradient_top_color = $data['custom_button_gradient_top_color'];
		$button_gradient_bottom_color = $data['custom_button_gradient_bottom_color'];
		$button_border_color = $data['custom_button_border_color'];
		$footer_link_color = $data['custom_footer_widget_link_color'];		
	}
	?>
		a,.front_widget a, .vc_front_widget a, h5.toggle a.default_color,.portfolio-navigation a:hover,h2.page404,.project-feed .title a,.post_meta li a:hover, .portfolio-item .portfolio_details a, .product_feature .pf_content a.more_info:hover, a.woocommerce_orders:hover, .portfolio-navigation a  {
			color:<?php echo $primary_color ; ?>;
		}
		#navigation .has-mega-menu ul.twitter li a, #navigation .has-mega-menu .contact ul li a, #navigation .has-mega-menu .latest-posts a {
			color:<?php echo $primary_color ; ?> !important;
			
		}
		a:hover, .col h3 a:hover,.col h4 a:hover, h5.toggle a.default_color:hover, .portfolio-item .portfolio_details a:hover, .product_feature .pf_content a.more_info, a.woocommerce_orders, .cart-collaterals .cart_totals table tr.order-total td, .woocommerce table.shop_table tfoot tr.order-total td, .portfolio-navigation a:hover, .woocommerce-MyAccount-navigation ul li.is-active a:before {
			color: <?php echo $data['primary_color_hover']; ?>;
		}
		.woocommerce-MyAccount-navigation ul li.is-active a:before {
			background-color: <?php echo $data['primary_color_hover']; ?>;
		}
		#navigation .has-mega-menu ul.twitter li a:hover, #navigation .has-mega-menu .contact ul li a:hover, #navigation .has-mega-menu .latest-posts a:hover {
			color: <?php echo $data['primary_color_hover']; ?> !important;
			background-color:transparent;
		}
		
		.post-gallery-item a:hover img, .recent-portfolio a:hover img, .recent-flickr a:hover img{
			border-color:<?php $primary_color ; ?>; 
		}
		.default_dc{
			color:<?php echo $primary_color ; ?>;
		}
		
		
		/* bbPress color style */
		
		#bbpress-forums li.bbp-header, .bbpress.single #bbpress-forums div.bbp-reply-header,
		#bbpress-forums #bbp-single-user-details #bbp-user-navigation li.current a,
		#bbpress-forums #bbp-single-user-details #bbp-user-navigation a:hover,
		#bbpress-forums #bbp-search-results .bbp-topic-header {
			background-color: <?php echo $data['bbpress_main_color']; ?>;
		}
		.bbp-pagination-links a:hover, .bbp-pagination-links span.current, .bbp-topic-pagination a {
			background-color: <?php echo $data['bbpress_main_color']; ?>;
			border-color: <?php echo $data['bbpress_main_color']; ?>;
		} 
		.bbp-topic-pagination a:hover {
			border-color: <?php echo $data['bbpress_main_color']; ?>;
		}
		#bbpress-forums li.bbp-header, .bbpress.single #bbpress-forums div.bbp-reply-header, span.bbp-admin-links a, .bbp-reply-header a.bbp-reply-permalink, span.bbp-admin-links, #bbpress-forums #bbp-single-user-details #bbp-user-navigation li.current a,
		#bbpress-forums #bbp-single-user-details #bbp-user-navigation a:hover,
		#bbpress-forums #bbp-user-body .bbp-header .bbp-topic-permalink,
		#bbpress-forums #bbp-search-results .bbp-topic-header,
		#bbpress-forums #bbp-search-results .bbp-topic-header a,
		#bbpress-forums #bbp-search-results .bbp-forum-header,
		#bbpress-forums #bbp-search-results .bbp-forum-header a{
			color: <?php echo $data['bbpress_heading_text_color']; ?>;
		}
		
		/* Call to Action styling */
		/*
		.default_border{
			border-color:<?php echo $data['action_border']; ?>;
		}
		.default_border:hover{
			border-color: <?php echo $data['action_border_hover']; ?>;
		}
		*/	
		
		.reading-box.default_border {
			background-color: <?php echo $data['action_bg']; ?>;
			color: <?php echo $data['action_text_color']; ?>;
		}
		.reading-box.default_border:hover {
			background-color: <?php echo $data['action_bg_hover']; ?>;
			color: <?php echo $data['action_text_color_hover']; ?>;
		}
		.reading-box.default_border .button {
			border-color: <?php echo $data['action_text_color']; ?>;
			color: <?php echo $data['action_text_color']; ?>;
		}
		.reading-box.default_border:hover .button {
			border-color: <?php echo $data['action_text_color_hover']; ?>;
			color: <?php echo $data['action_text_color_hover']; ?>;
		}
		
	<?php
	if($pb_hover_color): ?>
		.gallery_zoom{
			background-color: <?php echo $pb_hover_color; ?>;
		}
	<?php
	endif;
	?>
	
		.vc_front_widget {
			background-color: <?php echo $data['featured_serv_bg']; ?>;
		}
		.vc_front_widget a{
			color: <?php echo $data['featured_serv_link']; ?>;
		}
		.vc_front_widget:hover {
			background-color: <?php echo $data['featured_serv_bg_hover']; ?>;
			color:#fff;
		}
		.vc_front_widget:hover a{
			color:#fff;
		}
		
		/* Events Calendar Styling */

		#tribe-bar-form .tribe-bar-submit input[type=submit],
		.single-tribe_events .tribe-events-schedule .tribe-events-cost,
		#tribe-events .tribe-events-button, .tribe-events-button,
		#tribe-events-content .tribe-events-tooltip h4 {
			background-color: <?php echo $data['events_main_color']; ?>;
		}
		.tribe-events-calendar thead th {
			background-color: <?php echo $data['events_main_color']; ?>;
			border-color: <?php echo $data['events_main_color']; ?>;
		}
		.event-right a {
			color: <?php echo $data['events_main_color']; ?>;
		}
		#tribe-events .tribe-events-button, #tribe_events_filters_wrapper input[type=submit], 
		.tribe-events-button, .tribe-events-button.tribe-inactive, .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-], 
		.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]>a {
			background-color: <?php echo $data['events_main_color']; ?>;
		}
		@media screen and (max-width: 768px) {
			#tribe-events-content .tribe-events-calendar td.tribe-events-has-events.mobile-trigger, 
			.tribe-events-calendar td.tribe-events-has-events.mobile-trigger div[id*=tribe-events-daynum-], 
			.tribe-events-calendar td.tribe-events-has-events.mobile-trigger div[id*=tribe-events-daynum-] a {
				background-color: <?php echo $data['events_main_color']; ?>;;
			}
			.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-] {
				background-color:#666;
			}
		}

	<?php
	
	if($shortcode_color): ?>
		.progress-bar-content,.ch-info-back4,.ch-info-back3,.ch-info-back2,.ch-info-back1,.col:hover .bottom,.tp-bannertimer,.review_inside:after, .flex-direction-nav a:hover, figure.effect-zoe figcaption {
			background-color:<?php echo $shortcode_color; ?>;
		}
		.front_widget:hover, .front_widget:hover a, .portfolio-tabs a:hover, .portfolio-tabs li.active a{
			color:#fff; background-color:<?php echo $shortcode_color; ?>;
		}
		._border:hover, .review blockquote q, .pagination a.inactive, .recent-flickr a:hover img{
			border-color:<?php echo $shortcode_color; ?>;
		}
		.review blockquote div {
			color:<?php echo $shortcode_color; ?>;
		}
		.pagination .current, .pagination a.inactive:hover {
			background-color:<?php echo $shortcode_color; ?>; 
			border-color:<?php echo $shortcode_color; ?>;
		}

		.project-feed .info, figure a .text-overlay, figure.event_image_list .text-overlay {
			<?php
			$bg = hex2rgba($shortcode_color)
			?>
			background: rgba(0,0,0,0.70);
		}
		.recent_posts_container figure a .text-overlay .info i, .project-feed a i, .blogpost figure a .text-overlay i,
		.event_calendar_wrap figure a .text-overlay .info i {
			background-color: <?php echo $shortcode_color; ?>;
			color: #fff;
		}
	<?php
	endif;

	if($button_gradient_top_color && $button_gradient_bottom_color && $button_border_color): ?>
		.border_default{
			border: 1px solid <?php echo $button_border_color; ?>;
		}		
		
	<?php
	endif;
	?>
	.button_default, .button, .tp-caption a.button, .button_default.style_3d:hover {					
		background-color: <?php echo $data['button_background_color']; ?>;
		border-color: <?php echo $data['button_border_color']; ?>;
		color: <?php echo $data['button_text_color']; ?>;		
	}	
	
	.button_default:hover, .button:hover, .tp-caption a.button:hover{
		background-color: <?php echo $data['button_background_color_hover']; ?>;
		border-color: <?php echo $data['button_border_color_hover']; ?>;
		color: <?php echo $data['button_text_color_hover']; ?>;	
	}
    .button_default.style_3d {
    	box-shadow: 0 5px 0 <?php echo hexDarker( $data['button_background_color'], 20 ); ?>;
        -webkit-box-shadow: 0 5px 0 <?php echo hexDarker( $data['button_background_color'], 20 ); ?>;
    }
	<?php
	if($footer_link_color): ?>
		.footer_widget_content a, .footer_widget_content ul.twitter li span a, ul.twitter li i{
			color:<?php echo $footer_link_color; ?> ;			
		}

	<?php
	endif;
	
	if($data['site_width']=='Boxed'){
		$bg = $data['boxed_bg'];
		$boxed='true';
		?>
			body{
				background-image: url(<?php echo $data['boxed_bg'];?>);
				background-repeat: <?php echo $data['bg_repeat'];?> ;
				background-position: top center;
				background-attachment: <?php echo $data['bg_attachment'];?>;				
				
				<?php if($data['bg_fullscreen']): ?>
					-webkit-background-size: cover;
					-moz-background-size: cover;
					-o-background-size: cover;
					background-size: cover;
				<?php endif; ?>
				
				<?php
				if($data['enable_pattern']){					
				?>
					background-image: url("<?php echo $data['pattern']; ?>");
					background-repeat: repeat;
					background-attachment: fixed;
				<?php
				}
					
				?>
			
			<?php 
			if(get_post_meta($post->ID, 'pyre_background', true) || get_post_meta($post->ID,'pyre_bg_color', true)): ?>
				background:url(<?php echo get_post_meta($post->ID, 'pyre_background', true); ?>);
				background-color: <?php echo get_post_meta($post->ID, 'pyre_bg_color', true); ?>;
				background-repeat: <?php echo get_post_meta($post->ID, 'pyre_bg_repeat', true); ?>;
				background-position: <?php echo get_post_meta($post->ID, 'pyre_bg_position', true); ?>;
				background-attachment: <?php echo get_post_meta($post->ID, 'pyre_bg_attach', true); ?>;				
			<?php 
			endif; 
			?>
			}
			.row_full {
				max-width:960px;
			}			

			.container{				
				width:990px;	
				margin:<?php echo $data['margin_all']; ?>px auto;
				padding:<?php echo $data['padding_out']; ?>px;
				border:<?php echo $data['outer_border']; ?>px <?php echo $data['outer_border_type']; ?> <?php echo $data['outer_border_color']; ?>;
				<?php
				if($data['outer_shadow']){
				?>
				box-shadow: 0 0 10px rgba(0,0,0,0.3);
				-moz-box-shadow: 0 0 10px rgba(0,0,0,0.3);
				-webkit-box-shadow: 0 0 10px rgba(0,0,0,0.3);	
				<?php
				}
				?>
			}
			.pi-header-row-fixed .sticky_h, .pi-header-row-fixed .sticky_h_menu {
				max-width:990px;
				margin:0 auto;
			}
			.pi-header-row-fixed .sticky_h_menu {
				width: 100%;
			}
            <?php
			if($data['header_bottom_shadow'] == '0'){	
				?>
                .full_header {
                    box-shadow: none;
                    -webkit-box-shadow: none;
                }
				<?php
			}
			?>
			#side-panel-trigger, #navigation ul li a i {
				margin-right:0;
			}
			#navigation ul li #side-panel-trigger a {
				margin-right:0; padding-right: 0;
			}
			.vc_row[data-vc-stretch-content] .vc_column_container>.vc_column-inner {
	           	padding-left:0;
	          	padding-right: 0;
	        }
		@media screen and (min-width: 1100px) {	
			<?php
			if($data['boxed_width'] == '1160px') {
				?>
	            .container {
	            	width: 1170px;                  
	            }
	             
	            .second_navi_inner {
	            	width: 100%;
	                max-width:1180px;
	            }
	            .content-layer {
	            	padding:0px;
	             }
	            .inside_content {
	            	width:100%;
	            } 

	            .blogpost_small_pic { 
	            	width:50%
	            } 
	            .blogpost_small_desc {
	            	width:47%;
	            } 
	            .inner, .row, .front_page_in,.footer_widget_inside,.footer .inner, .top_nav, .bellow_header_title, .inner_wrap,.qbox, .action_bar_inner, .reviews .flexslider, #footer_widget_inside { 
	            	max-width:1140px;
	            } 
	            .pi-header-row-fixed .sticky_h, .pi-header-row-fixed .sticky_h_menu { 
	            	max-width:1170px; margin:0 auto; width: 100%;
	            } 
	            .row_full { 
	            	max-width:1140px; 
	            } 
	            
	            .fullscreen { 
	            	width:1170px; 
	            } 
	            .flexslider {
	            	max-width: 1170px;
	            }
	            .vc_row[data-vc-full-width] {
					max-width: 1170px;
	            }                                 

	            .row {
	            	padding: 20px;
	            }
	            .grid.fullscreen figure.cols-5{ 
	            	width:234px;
	            }
	            <?php
			}
			?>
		}
		<?php
			
	}
	if( ( $data['site_width']=='Extra Wide') ||  ($data['site_width']=='Wide') ){
	?>
    	.container {
    		<?php if($data['boxed_bg']) { ?>
    			background-image: url(<?php echo $data['boxed_bg'];?>);
				background-repeat: <?php echo $data['bg_repeat'];?> ;
				background-position: top center;
				background-attachment: <?php echo $data['bg_attachment'];?>;				
				
				<?php if($data['bg_fullscreen']): ?>
					-webkit-background-size: cover;
					-moz-background-size: cover;
					-o-background-size: cover;
					background-size: cover;
				<?php endif; ?>
			<?php	
    		}
    		?>				
			<?php
			if($data['enable_pattern']){					
			?>
				background-image: url("<?php echo $data['pattern']; ?>");
				background-repeat: repeat;
				background-attachment: fixed;
			<?php
			}					
			?>
			
			<?php 
			if(get_post_meta($post->ID, 'pyre_background', true) || get_post_meta($post->ID,'pyre_bg_color', true)): ?>
				background:url(<?php echo get_post_meta($post->ID, 'pyre_background', true); ?>);
				background-color: <?php echo get_post_meta($post->ID, 'pyre_bg_color', true); ?>;
				background-repeat: <?php echo get_post_meta($post->ID, 'pyre_bg_repeat', true); ?>;
				background-position: <?php echo get_post_meta($post->ID, 'pyre_bg_position', true); ?>;
				background-attachment: <?php echo get_post_meta($post->ID, 'pyre_bg_attach', true); ?>;				
			<?php 
			endif; 
			?>
        }
    <?php	
	}
	if($data['site_width']=='Extra Wide'){		

	?>
    	.row_full {
    		max-width: 1140px;
    	}
		.inner, .row, .front_page_in,.footer_widget_inside,.footer .inner, .top_nav, .bellow_header_title, .inner_wrap,.qbox, .action_bar_inner, .reviews .flexslider, #footer_widget_inside, .flexslider, .reading-box .cta_inside {
			max-width:1140px;
		}
		.second_navi_inner {
			width: 1140px;
		}

		.qbox_title1{
			width:34%;
		}
		.portfolio-four .portfolio-item{
			margin:4px;
		}
		
		.col{
			/*width:19%;*/
			max-width:none;
		}
		/*
		.blogpost_small_pic{ width:39.5%}.blogpost_small_desc{width:57%;}
		*/
		/*.grid figure.cols-4 {
			width: 271px;
		}
		.grid figure.cols-3 {
			width: 360px;
		}
		.grid figure.cols-2 {
			width: 550px;
		}
		*/
		.portfolio-three .portfolio-item {
			width:358px;
		}
		.portfolio-3 {
			width: 358px;
			height: 255px;
		}
		
		.portfolio-two .portfolio-item {
			width: 550px;
		}
		.portfolio-2 {
			width: 550px;
			height: 353px;
		}
		
		.ch-info .ch-info-back3 {
			-webkit-transform: translate3d(0,0,-358px) rotate3d(1,0,0,90deg);
			-moz-transform: translate3d(0,0,-358px) rotate3d(1,0,0,90deg);
			-o-transform: translate3d(0,0,-358px) rotate3d(1,0,0,90deg);
			-ms-transform: translate3d(0,0,-358px) rotate3d(1,0,0,90deg);
			transform: translate3d(0,0,-358px) rotate3d(1,0,0,90deg);
			opacity: 0;
		}
		.ch-item:hover .ch-info-front3 {
			-webkit-transform: translate3d(0,358px,0) rotate3d(1,0,0,-90deg);
			-moz-transform: translate3d(0,358px,0) rotate3d(1,0,0,-90deg);
			-o-transform: translate3d(0,358px,0) rotate3d(1,0,0,-90deg);
			-ms-transform: translate3d(0,358px,0) rotate3d(1,0,0,-90deg);
			transform: translate3d(0,358px,0) rotate3d(1,0,0,-90deg);
			opacity: 0;
		}
		.ch-info .ch-info-back2 {
			-webkit-transform: translate3d(0,0,-550px) rotate3d(1,0,0,90deg);
			-moz-transform: translate3d(0,0,-550px) rotate3d(1,0,0,90deg);
			-o-transform: translate3d(0,0,-550px) rotate3d(1,0,0,90deg);
			-ms-transform: translate3d(0,0,-550px) rotate3d(1,0,0,90deg);
			transform: translate3d(0,0,-550px) rotate3d(1,0,0,90deg);
			opacity: 0;
		}
		.ch-item:hover .ch-info-front2 {
			-webkit-transform: translate3d(0,550px,0) rotate3d(1,0,0,-90deg);
			-moz-transform: translate3d(0,550px,0) rotate3d(1,0,0,-90deg);
			-o-transform: translate3d(0,550px,0) rotate3d(1,0,0,-90deg);
			-ms-transform: translate3d(0,550px,0) rotate3d(1,0,0,-90deg);
			transform: translate3d(0,550px,0) rotate3d(1,0,0,-90deg);
			opacity: 0;
		}
	<?php
	}
	?>
	.header{
		margin-bottom: <?php echo $data['header_bottom_margin']; ?>px;
		margin-top: <?php echo $data['header_top_margin']; ?>px;
		padding-bottom: <?php echo $data['header_bottom_padding']; ?>px;
		padding-top: <?php echo $data['header_top_padding']; ?>px;
		
	
		<?php
		if($data['en_header_pattern']){
			$head_pattern = $data['header_patterns'];
		?>		
			background-image:url("<?php echo $head_pattern; ?>");		
		<?php
		}
		else{
		?>		
			background-color:<?php echo $data['header_bg_color']; ?>;	
            <?php 
			if(get_post_meta($post->ID, 'pyre_header_transparency', true) !='') { 
				$transparency = explode("%", get_post_meta($post->ID, 'pyre_header_transparency', true));
				$transparency = 1 - ($transparency[0] / 100);
				$hc_rgba = hex2rgba($data['header_bg_color']);
			?>
            	background-color: rgba(<?php echo $hc_rgba[0] . ',' . $hc_rgba[1] . ',' . $hc_rgba[2]; ?>, <?php echo $transparency; ?>);	
            <?php 
			} 
			?>
		<?php
		}
		if($data['header_bg_image']){			
		?>		
			background:url("<?php echo $data['header_bg_image']; ?>") <?php echo $data['header_bg_repeat']; ?>;		
		<?php
		}
		if($data['header_bottom_shadow'] == '0'){	
			?>
			box-shadow: none;
			-webkit-box-shadow: none;
			<?php
		}
		if($data['header_bottom_border'] > '0'){
			?>
			border-bottom: <?php echo $data['header_bottom_border']; ?>px solid <?php echo $data['header_bottom_border_color']; ?>;
			<?php	
		}

		?>
	}

	<?php
	$header_width = (get_post_meta($post->ID, 'pyre_header_width', true) != NULL) ? get_post_meta($post->ID, 'pyre_header_width', true) : $data['header_width'];
	if( $header_width == 'default' ) {
		$header_width = $data['header_width'];
	}
	if($header_width=='expanded') {
		?>
        .header .inner {
        	max-width:100%;
            padding-left:20px;
            
        }
        .top_nav {
        	max-width: 100%;
        	padding: 0 20px;
        }
        .bellow_header_title {
        	max-width: 100%;
        }
        #navigation ul li:nth-last-of-type(3) ul {
        	right:0;
        }
        #navigation li.has-mega-menu > ul.sub-menu {
        	width:98%;
        	left:1%;
        }
        #top-menu li:last-child a.button {
            margin-right: 15px;
        }
        <?php
	}
	if($data['post_content_full_width']=='yes') {
		?>
		.single-post .row, .page-template-default .row {
			max-width: 100%;
		}	
		.flexslider {
		max-width: 100%;
		}	
		<?php
	}
	if($data['post_content_padding'] && ( $data['post_content_padding'] != 0)) {
		?>
		.single-post .post_container, .page-template-default .post_container {
			padding: <?php echo $data['post_content_padding']; ?>px;
			box-sizing:border-box;
			
			<?php 
			if($data['post_content_bg']){
				?>
				background-color: <?php echo $data['post_content_bg']; ?>;
				<?php
			}
			?>

		}
		<?php
	}

	if($data['post_content_width'] && $data['sidebar_width']) {
		?>
		.post_container {
			width: <?php echo $data['post_content_width']; ?>%;
		}
		.sidebar {
			width: <?php echo $data['sidebar_width'] ?>%;
		}
		<?php
	}

	/* Small Images Design Options
	==========================================
	*/

	if($data['small_image_width']) {
		?>
		.blogpost_small_pic {
			width: <?php echo $data['small_image_width']; ?>%;
		}
	<?php
	}

	if($data['small_image_desc_width']) {
		?>
		.blogpost_small_desc {
			width: <?php echo $data['small_image_desc_width']?>%;
		}
	<?php
	}

	$small_image_pos = ( get_post_meta($post->ID, 'pyre_small_image_position', true) != NULL ) ? get_post_meta($post->ID, 'pyre_small_image_position', true) : $data['small_image_pos']; 
		
	if( $small_image_pos == 'default' ) {
    	$small_image_pos = $data['small_image_pos'];
    }

	if($small_image_pos == 'right') {
		?>
		.blogpost_small_pic {
			float:right;
		}
		.blogpost_small_desc {
			float: left;
		}
		<?php
	}

	if($small_image_pos == 'left') {
		?>
		.blogpost_small_pic {
			float:left;
		}
		.blogpost_small_desc {
			float: right;
		}
		<?php
	}

	if( get_post_meta( $post->ID, 'pyre_show_first_post_big_layout', true ) == 'yes') {

		if( get_post_meta( $post->ID, 'pyre_featured_pt_font_size', true ) != '' || get_post_meta( $post->ID, 'pyre_featured_pt_line_height', true ) != '' || get_post_meta( $post->ID, 'pyre_featured_pt_font_weight', true ) != '' ) {
			?>
			.blogpost.featured_post .archives_title {
				font-size: <?php echo get_post_meta( $post->ID, 'pyre_featured_pt_font_size', true ); ?>px;
				line-height: <?php echo get_post_meta( $post->ID, 'pyre_featured_pt_line_height', true ); ?>;
				font-weight: <?php echo get_post_meta( $post->ID, 'pyre_featured_pt_font_weight', true ); ?>;
			}
			<?php
		}
		
	}


	if($data['en_post_uppercase']) {
		?>
		.blogpost .singlepost_title, .blogpost .archives_title {
			text-transform: uppercase;
		}
		<?php
	}


	/* Archive pages Post Title customization */
	$arh_pt_font_size = ( is_page_template() && get_post_meta($post->ID, 'pyre_pt_font_size', true) != '' ) ? get_post_meta($post->ID, 'pyre_pt_font_size', true) : $data['archives_post_title_font_size'];

	$arh_pt_line_height = ( is_page_template() && get_post_meta($post->ID, 'pyre_pt_line_height', true) != '' ) ? get_post_meta($post->ID, 'pyre_pt_line_height', true) : $data['archives_post_title_line_height'];

	$arh_pt_font_weight = ( is_page_template() && get_post_meta($post->ID, 'pyre_pt_font_weight', true) != '' ) ? get_post_meta($post->ID, 'pyre_pt_font_weight', true) : $data['archives_post_title_font_weight'];

	/* Single Post Title customization */
	$single_pt_font_size = ( is_single() && get_post_meta($post->ID, 'pyre_pt_font_size', true) != '' ) ? get_post_meta($post->ID, 'pyre_pt_font_size', true) : $data['post_title_font_size'];

	$single_pt_line_height = ( is_single() && get_post_meta($post->ID, 'pyre_pt_line_height', true) != '' ) ? get_post_meta($post->ID, 'pyre_pt_line_height', true) : $data['post_title_line_height'];

	$single_pt_font_weight = ( is_single() && get_post_meta($post->ID, 'pyre_pt_font_weight', true) != '' ) ? get_post_meta($post->ID, 'pyre_pt_font_weight', true) : $data['post_title_font_weight'];

	?>
	.blogpost .singlepost_title {
		font-size: <?php echo $single_pt_font_size; ?>px;
		font-weight: <?php echo $single_pt_font_weight; ?>;
		line-height: <?php echo $single_pt_line_height; ?>;
		color: <?php echo $data['post_title_color']; ?>;
	}
	.blogpost .archives_title{
		font-size: <?php echo $arh_pt_font_size; ?>px;
		font-weight: <?php echo $arh_pt_font_weight; ?>;
		line-height: <?php echo $arh_pt_line_height; ?>;		
	}

	<?php

	/* styling the Continue Reading/View More button 
	================================================= */

	if($data['show_view_more']) {
		?>
		.small_read_more a{ 
			color: <?php echo $data['view_more_color']; ?>;
		}
		.small_read_more a:hover{ 
			color: <?php echo $data['view_more_color_hover']; ?>;
		}
		<?php
		if($data['view_more_style']!='text') {
		?>
			.button.button_default.view_more_button {
				background-color: <?php echo $data['view_more_bg_color']; ?>;
				border-color: <?php echo $data['view_more_border_color']; ?>;
				color: <?php echo $data['view_more_color']; ?>;
			}
			.button.button_default.view_more_button:hover {
				background-color: <?php echo $data['view_more_bg_color_hover']; ?>;
				border-color: <?php echo $data['view_more_border_color_hover']; ?>;
				color: <?php echo $data['view_more_color_hover']; ?>;
			}
		<?php
		}
		else {
			?>
			.button.button_default.view_more_button {
				background-color:transparent;
				border: none;
				color: <?php echo $data['view_more_color']; ?>;
				padding-left: 0;
				padding-right: 0;
				margin-right: 0;
			}
			.button.button_default.view_more_button:hover {
				background-color:transparent;
				color: <?php echo $data['view_more_color_hover']; ?>;
			}
			<?php
		}
		if($data['view_more_position']=='right') {
			?>
			.button.button_default.view_more_button {
				float:right;
			}
			.get_social.share_archives {
				float: left;
			}
			<?php
		}
		if( $data['view_more_position']=='center' ) {
			?>
			.get_social.share_archives, .page .post-content .get_social.share_archives {
				float: none;
				display: inline-block;
				top: initial;
				margin-right:20px;
				padding-right: 20px;
				border-right: 1px solid #ddd;
			}
			.blogpost.archive_pages {
				padding-bottom:20px;
			}
			.post-atts.archive {
				text-align: center;
			}
			<?php
		}
	}


	if($data['post_content_separator']) {
		?>
		.post_meta, .blogpost .portfolio-navigation, .single_blogpost_split, .author_box {
			border-color: <?php echo $data['post_content_separator']; ?>;
		}
		.content_box_title:after {
			background-color: <?php echo $data['post_content_separator']; ?>;
		}
		<?php
	}

	if( $data['post_meta_uppercase']=='0' ){
		?>
		.post_meta li {
			text-transform: none;
		}
		<?php
	}
	?>
	.post_meta li {
		font-size: <?php echo $data['post_meta_font_size']; ?>px;
		color: <?php echo $data['post_meta_color']; ?>;
	}
	.post_meta li a {
		color: <?php echo $data['post_meta_link_color']; ?>;
	}
	.post_meta li a:hover {
		color: <?php echo $data['post_meta_link_color_hover']; ?>;
	}
	<?php
	if($data['en_post_icons']=='0') {
		?>
		.post_meta li i {
			display: none;
		}
		<?php
	}
	/*
	if($data['post_meta_style']=='st2') {
		?>
		.post_meta {
			border-bottom: none;			
		}
		<?php
	}*/

	$single_post_elements_align = (get_post_meta($post->ID, 'pyre_post_elements_align', true) != NULL) ? get_post_meta($post->ID, 'pyre_post_elements_align', true) : $data['single_post_meta_align'];
	if( $single_post_elements_align == 'default' ) {
		$single_post_elements_align = $data['single_post_meta_align'];
	}

	if( $single_post_elements_align == 'center') {
		?>
		.blogpost .singlepost_title, .single .blogpost .post_meta {
			text-align: center;					
		}
		<?php
	}

	/* Adding Post Content Columns is selected to yes */
	if( get_post_meta( $post->ID, 'pyre_post_content_columns', true ) != 'default' ) {
		?>
		.single .post-content {
			column-count: <?php echo get_post_meta( $post->ID, 'pyre_post_content_columns', true ); ?>;
			-webkit-column-count: <?php echo get_post_meta( $post->ID, 'pyre_post_content_columns', true ); ?>;
			-moz-column-count: <?php echo get_post_meta( $post->ID, 'pyre_post_content_columns', true ); ?>;
			column-gap: 40px;
			margin-bottom:30px;
		}
		<?php
	}
	
	$post_elements_align = ( ( is_single() || is_page_template() ) && get_post_meta($post->ID, 'pyre_post_elements_align', true) != NULL) ? get_post_meta($post->ID, 'pyre_post_elements_align', true) : $data['post_meta_align'];
	if( $post_elements_align == 'default' ) {
		$post_elements_align = $data['post_meta_align'];
	}
	?>
	.post_meta, .blogpost .archives_title {
		text-align: <?php echo $post_elements_align; ?>;
	}
	
	<?php
	if ($post_elements_align=='center') {
	?>
		.get_social.share_archives, .page .post-content .get_social.share_archives {
			float: none;
			display: inline-block;
			top: initial;
			margin-right:20px;
			padding-right: 20px;
			border-right: 1px solid #ddd;
		}
		.blogpost.archive_pages {
			padding-bottom:20px;
		}
		.post-atts.archive {
			text-align: center;
		}	
	<?php
	}

	if( get_post_meta($post->ID, 'pyre_featured_post_elements', true) =='center' ) {
		?>
		.blogpost.featured_post .archives_title, .featured_post.archive_pages .post_meta {
			text-align: center;			
		}
		.featured_post .get_social.share_archives, .page .featured_post .post-content .get_social.share_archives {
			float: none;
			display: inline-block;
			top: initial;
			margin-right:20px;
			padding-right: 20px;
			border-right: 1px solid #ddd;
		}
		.blogpost.archive_pages.featured_post {
			padding-bottom:20px;
		}
		.featured_post .post-atts.archive {
			text-align: center;
		}
		<?php
	}

	if( ( $data['post_meta_align'] == 'center_full') && ( get_post_meta($post->ID, 'pyre_en_sidebar', true) == 'no' ) ) {
		?>
		.single-post .post_meta, .single-post .singlepost_title {
			text-align: center;			
		}
		<?php
	}
	if( $data['post_social_icons_pos'] == 'right' )  {
		?>
		.get_social {
			float: right;
		}
		<?php
	}
	?>
	.post_container .get_social li a, .post_container_full .get_social li a{
		color: <?php echo $data['post_social_icons']; ?>;
	}
	<?php if($data['en_hover_effect']=='0') { ?>
		.project-feed .info, figure a .text-overlay, figure.event_image_list .text-overlay {
			display: none;
		}
	<?php } ?>
	.single_post_tags a {
		font-size: <?php echo $data['post_tags_font_size']; ?>px;
	}
	.sidebar .get_social li a {
		color: <?php echo $data['side_social_links_color'] ?>;
		background-color: <?php echo $data['side_social_links_bg']; ?>;
		<?php
		if($data['side_social_links_shape'] == 'round') {
			?>
			border-radius: 5px;
			-webkit-border-radius: 5px;
			<?php
		}
		elseif($data['side_social_links_shape'] == 'circle') {
			?>
			border-radius: 50%;
			-webkit-border-radius: 50%;
			<?php
		}				
		?>
	}

	<?php
	/* Sidebar Social Links Widget Sizing */
	if( $data['side_social_links_size'] == 'small' ) {
		?>
		.sidebar .get_social li a {
			width: 28px !important;
			height: 28px;
			line-height: 28px;
			margin: 3px;
			min-width: auto;
		}
		.sidebar .get_social li a i {
			width: 28px;
			height: 28px;
			line-height: 28px;
			font-size: 14px;
		}
	<?php
	}
	if( $data['side_social_links_size'] == 'large' ) {
		?>
		.sidebar .get_social li a {
			width: 36px !important;
			height: 36px;
			line-height: 36px;	
			margin: 7px;		
		}
		.sidebar .get_social li a i {
			width: 36px;
			height: 36px;
			line-height: 36px;
			font-size: 22px;
		}
	<?php
	}		
	?>

	.col h4 {
		font-size: <?php echo $data['related_posts_font_size']; ?>px;
		<?php if($data['related_posts_up']) {
		?>
			text-transform: uppercase;
		<?php	
			} ?>
	}
	.sidebar-widget {
		margin-bottom: <?php echo $data['widgets_bottom_margin'] ?>;
		
		<?php 
		if( $data['widget_content_align'] == 'center' || $data['widget_content_align'] == 'right' ) {
			?>
			text-align: <?php echo $data['widget_content_align']; ?>;

			<?php
		}
		?>

	}

	<?php 
	if( $data['widget_content_align'] == 'center' ) {
		?>
		.sidebar-widget .star-rating {
			width: auto;
		}
		.sidebar-widget .star-rating:before {
			position: relative;
			float: none;
		}
		.sidebar-widget .star-rating span:before {
			left: auto;
			margin-left: -6px;
		}
		<?php
	}

	?>

	.about_me_heading {
		font-size: <?php echo $data['about_heading_font_size']; ?>px;
		<?php echo ( $data['about_heading_font_weight'] != '' ? 'font-weight:'.$data['about_heading_font_weight'] .';' : '' ); ?>
		<?php echo ( $data['about_heading_color'] != '' ? 'color:' . $data['about_heading_color'] . ';' : '' ) ?>
	}
	.about_me_description {
		font-size: <?php echo $data['about_description_font_size']; ?>px;
		<?php echo ( $data['about_description_color'] != '' ? 'color:' . $data['about_description_color'] . ';' : '' ) ?>
	}

	.sidebar-widget ul.twitter li i {
		color: <?php echo $data['side_twitter_color'] ?>;
	}
	.sidebar-widget .contact ul li i {
		color: <?php echo $data['side_contact_color'] ?>;
	}

	<?php
	if( $data['recent_posts_widget_thumb'] == 'large') {
		?>
		.latest-posts-thumb a img {
			width: 120px;
		}
		<?php
	}
	if( $data['recent_portfolio_widget_thumb'] == 'large') {
		?>
		.recent-portfolio a img {
			width: 135px;
		}
		<?php
	}
	?>

	.latest-posts h2 {
		font-size: <?php echo $data['recent_posts_widget_font_size']; ?>px;
	}
	.latest-posts span {
		font-size: <?php echo $data['recent_posts_widget_date_size']; ?>px;
	}
	
	input[type=text], 
	input[type=email], 
	input[type=password], 
	input[type=search],
	input[type=tel], 
	textarea,
	input:focus, 
	textarea:focus {
		border-color: <?php echo $data['post_comment_border']; ?>;
		background-color: <?php echo $data['post_comment_bg'] ?>;
		color: <?php echo $data['post_comment_color']; ?>;
	}
	h3.sidebar-title {
		color: <?php echo $data['widget_title_color']; ?>;
		font-weight: <?php echo $data['side_font_weight']; ?>;
		margin-bottom: <?php echo $data['widget_title_bar_bottom_margin'] ?>px;
		<?php if( isset($data['en_widget_uppercase']) && $data['en_widget_uppercase'] == false) echo 'text-transform:none;';?>
		<?php if($data['widget_title_bar_width'] == 'title') echo 'display: inline-block;'; ?>
	}
	h3.sidebar-title:after {
		border-color: <?php echo $data['widget_title_bar_color']; ?>;
		border-width: <?php echo $data['widget_title_bar_thick']; ?>px;
		<?php		
		if ( isset($data['widget_title_bar_thick']) && $data['widget_title_bar_thick'] == '') { echo 'border:none;'; }
		?>
	}
	<?php	
	if($data['widget_title_bar_pos'] == 'below' && $data['widget_title_bar_thick'] != 0) {
		?>
		h3.sidebar-title:after {
			content: initial;
		}
		h3.sidebar-title {
			border-bottom: <?php echo $data['widget_title_bar_thick']; ?>px solid <?php echo $data['widget_title_bar_color']; ?>;
			padding-bottom:<?php echo $data['widget_title_bar_bottom_padding'] ?>px;
		}
		<?php
	}

	if($data['widget_title_align'] =='center' || $data['widget_title_align'] =='right')	{
		?>
		.title-holder {
			text-align: <?php echo $data['widget_title_align']; ?>;
		}

		<?php
		if( $data['widget_title_bar_pos'] == 'right' ) {
			?>
			h3.sidebar-title:before {
				position: relative;
			    right: 10px;
			    content: "";
			    display: inline-block;
			    width: 100%;
			    margin: 0 0 0 -100%;
			    border-top: <?php echo $data['widget_title_bar_thick']; ?>px solid <?php echo $data['widget_title_bar_color']; ?>;
			    top: -4px;
			}
			<?php
		}
	}

	/* Styling the Mailchimp for WordPress Widget */
	?>
	.mc4wp-form {
		background-color: <?php echo $data['mc_bg_color']; ?>;
		padding: <?php echo $data['mc_padding_tb'] ?>px <?php echo $data['mc_padding_lr'] ?>px;
	}
	.mc4wp-form label {
		font-size: <?php echo $data['mc_label_font_size']; ?>px;
		color: <?php echo $data['mc_label_color']; ?>;
		font-style: <?php echo $data['mc_label_font_style']; ?>;
		margin-bottom: <?php echo $data['mc_label_margin']; ?>px;
	}
	.mc4wp-form input[type=text], .mc4wp-form input[type=email], .mc4wp-form input[type=password], .mc4wp-form textarea {
		font-size: <?php echo $data['mc_input_font_size']; ?>px;
		color: <?php echo $data['mc_input_font_color']; ?>;
		background-color: <?php echo $data['mc_input_bg_color']; ?>;
		border: 1px solid <?php echo $data['mc_input_border_color'] ?>;
	}
	.mc4wp-form input[type=text]::-webkit-input-placeholder, 
	.mc4wp-form input[type=email]::-webkit-input-placeholder, 
	.mc4wp-form textarea::-webkit-input-placeholder {
		color: <?php echo $data['mc_input_font_color']; ?>;
	}

	.mc4wp-form input[type=submit] {
		background-color: <?php echo $data['mc_submit_bg'] ?>;
		border: none;
		color: <?php echo $data['mc_submit_color'] ?>;
		<?php 
		if ( $data['mc_submit_size'] == 'full') {
			echo 'width: 100%; text-align: center';
		}
		?>
	}
	.mc4wp-form input[type=submit]:hover {
		background-color: <?php echo $data['mc_submit_bg_hover'] ?>;
		color: <?php echo $data['mc_submit_color'] ?>
	}
	<?php

	if( $data['show_caret_links']=='no' ){
		?>
		.sidebar-widget ul li {
			padding-left:0;
		}
		.sidebar-widget ul li:before {
			content: initial;
		}
		<?php
	}

	$spb = false;		
	if( class_exists('Woocommerce') && ( is_product() || is_woocommerce() ) ) $spb = true;

	if(!$spb) {
		if( $data['en_sidebar'] != 'no') {
			if( (is_single() || is_page() || is_page_template() ) && get_post_meta( $post->ID, 'pyre_en_sidebar', true ) == 'no' ) {
				?>
				.post_container {
					width: 100%;
					float: none;
				}
				.sidebar {
					display: none;
				}
				<?php
			}
			else {
				if( (is_single() || is_page() || is_page_template()) && get_post_meta( $post->ID, 'pyre_sidebar_pos', true ) == 'left' ) {
					?>
					.post_container {
						float: right;
					}
					.sidebar {
						float: left;
					}
				<?php
				}
			}
		}
		else {
			?>
			.post_container {
				width: 100%;
				float: none;
			}
			.sidebar {
				display: none;
			}
		<?php
		}
	}

	/* bbpress enable sidebar*/
	if( $data['bbpress_sidebar'] != 0 ) {
		?>
			.bbpress .post_container {
				width: <?php echo $data['post_content_width']; ?>%;
				float: left;
			}
			.bbpress .sidebar {
				display: initial;
			}
		<?php
	}
	else {
		?>
			.bbpress .post_container {
				width: 100%;
				float: none;
			}
			.bbpress .sidebar {
				display: none;
			}
		<?php
	}

	/* Footer Width */
	$footer_width = (get_post_meta($post->ID, 'pyre_footer_width', true) != NULL) ? get_post_meta($post->ID, 'pyre_footer_width', true) : $data['footer_width'] ;
	if( $footer_width == 'default' ) {
		$footer_width = $data['footer_width'];
	}
	if($footer_width == 'expanded') {
		?>
		#footer_widget_inside {
			max-width:100%;
			padding: 0 20px;
		}
		.footer .inner {
			max-width: 100%;
		}

		<?php
	}


	if($data['enable_sticky']) {
		//if sticky header, let's determine the opacity and bg color		
		$opacity = ($data['sticky_header_opacity']) ? $data['sticky_header_opacity'] : '100';
		
		$sticky_header_bg = hex2rgba($data['header_bg_color']);
		$sticky_header_opacity = $opacity/100;
		?>
		.pi-header-row-fixed .header {
			background-color: rgba(<?php echo $sticky_header_bg[0] . ',' . $sticky_header_bg[1] . ',' . $sticky_header_bg[2]; ?>, <?php echo $sticky_header_opacity; ?>);
		}
		@media screen and (max-width: 830px) {
			.pi-header-row-fixed .header {
				background-color: <?php echo $data['header_bg_color']; ?>;
			}
			
		}
		<?php
	}		
	
	/* Side Navigation custom Css from Theme Options */
	
	if($data['header_position'] == 'left' && get_post_meta($post->ID, 'pyre_en_header', true) != 'no') {
		?>
        .container {
        	margin-left: <?php echo $data['hlr_width']; ?>;
        }
        .fullscreenbanner {
        	margin-left: <?php echo $data['hlr_width']; ?> !important;
        }
        .side_navigation #navigation ul ul {
        	left: <?php echo $data['hlr_width']; ?>; 
        }
       .side_navigation #navigation ul li a:hover, 
       .side_navigation #navigation > ul li:hover > a, 
       .side_navigation #navigation ul li.current_page_item a, 
       .side_navigation #navigation ul li.current-menu-ancestor a {
        	border-left-color: <?php echo $data['hlr_menu_border_color'] ?>;
            border-left-width: <?php echo $data['hlr_menu_border_width'] ?>px; 
       }
       .side_navigation #navigation ul li a {
       		border-left-width: <?php echo $data['hlr_menu_border_width'] ?>px; 
       }
       .side_navigation #navigation ul ul:before {
       		 width: <?php echo $data['hlr_child_menu_border_width'] ?>px;
             background-color: <?php echo $data['hlr_child_menu_border_color'] ?>;
        }
        <?php
	}
	if($data['header_position'] == 'right' && get_post_meta($post->ID, 'pyre_en_header', true) != 'no' ) {
		?>
        .container {
        	margin-right: <?php echo $data['hlr_width']; ?>;
        }
        .fullscreenbanner {
        	margin-right: <?php echo $data['hlr_width']; ?>;
        }
        .header_inside_right .side_navigation #navigation ul ul {
        	right: <?php echo $data['hlr_width']; ?>; 
        }
       .header_inside_right .side_navigation #navigation ul li a:hover, 
       .header_inside_right .side_navigation #navigation > ul li:hover > a, 
       .header_inside_right .side_navigation #navigation ul li.current_page_item a, 
       .header_inside_right .side_navigation #navigation ul li.current-menu-ancestor a {
        	border-right-color: <?php echo $data['hlr_menu_border_color'] ?>;
            border-right-width: <?php echo $data['hlr_menu_border_width'] ?>px; 
       }       
       .header_inside_right .side_navigation #navigation ul li a {
       		border-right-width: <?php echo $data['hlr_menu_border_width'] ?>px; 
       }
       .header_inside_right .side_navigation #navigation ul ul:before {
       		 width: <?php echo $data['hlr_child_menu_border_width'] ?>px;
             background-color: <?php echo $data['hlr_child_menu_border_color'] ?>;
        }
        <?php
	}
	
	if( ($data['header_position'] == 'left' ) || ($data['header_position']=='right' )) {
		if( get_post_meta($post->ID, 'pyre_en_header', true) == 'no' ) {
			?>
			.header_inside_left {
				display: none;
			}
			.fullscreenbanner {
				margin-left: 0;
			}
			.container {
				margin-left: 0;
			}
			<?php
		}
		if($data['hlr_centered']) {
			?>
			.side_inside {
				text-align:center;
			}
			.side_logo a img.retina_logo, .side_logo a img.normal_logo {
				margin-left: auto;
				margin-right: auto;
			}
			.side_navigation #navigation ul li a {
				text-align: center !important;
			}
			.side_social .top_social a {
				float: none;
				display: inline-block;
			}
			<?php
		}
		?>
		.side_inside form{
			width: auto !important;
		}
		.side_navigation #navigation > ul {
			line-height: normal;
			height: auto;
		}
        .side-header .header_inside_left,.side-header .header_inside_right {
        	background-color: <?php echo $data['hlr_bg_color']; ?>;
            
            <?php if($data['hlr_bg_img']) { ?>
            background: url("<?php echo $data['hlr_bg_img']; ?>") <?php echo $data['hlr_bg_img_repeat']; ?>;
            <?php } 
			if($data['hlr_bg_fullscreen']) { ?>
            background-size: cover;
			<?php } 
			if($data['hlr_bg_img_x'] || $data['hlr_bg_img_y']) { ?>
            background-position: <?php echo $data['hlr_bg_img_x']; ?> <?php echo $data['hlr_bg_img_y']; ?>;
            <?php } 
			if(!$data['hlr_shadow_en']) {
			?>
            box-shadow: none;
            -webkit-box-shadow: none;
			<?php
            }			
			?>            
        }
        <?php
		if( $data['hlr_border_width'] && ($data['hlr_border_width'] > 0) ) {
			if($data['header_position']=='left') { ?>  
				.side-header .header_inside_left {
               		border-right: <?php echo $data['hlr_border_width']; ?>px solid <?php echo $data['hlr_border_color']; ?>;
                }
			<?php }
			if($data['header_position']=='right') { ?> 
                .side-header .header_inside_right {
                	border-left: <?php echo $data['hlr_border_width']; ?>px solid <?php echo $data['hlr_border_color']; ?>;
                }
			<?php }
		}
		?>
		.side-header .header_inside_left, .side-header .header_inside_right {
        	width: <?php echo $data['hlr_width']; ?>;
        }
        .header_inside_left .side_navigation #navigation ul ul, .header_inside_right .side_navigation #navigation ul ul {
        	width: <?php echo $data['hlr_sub_width']; ?>;
        }
        .header_inside_left .side_navigation #navigation ul ul ul{
        	left: <?php echo $data['hlr_sub_width']; ?>;
        }
        .header_inside_right .side_navigation #navigation ul ul ul {
       		right: <?php echo $data['hlr_sub_width']; ?>;
        }
        .side_navigation #navigation {
        	font-family: <?php echo $data['hlr_font_family']; ?>;
        }
        .side_navigation #navigation ul li a {
        	font-size: <?php echo $data['hlr_mm_font_size']; ?>;
        }
        .side_navigation #navigation ul ul li a {
        	font-size: <?php echo $data['hlr_cm_font_size']; ?>;
        }
        <?php
		if($data['hlr_child_menu_shadow']=='0') {
			?>
            .side_navigation #navigation ul.sub-menu {
            -webkit-box-shadow: none;
            box-shadow: none;
            }
            <?php
		}
		if($data['hlr_child_menu_outer_border'] > 0) {
			?>
            .side_navigation #navigation ul.sub-menu {
            	border:<?php echo $data['hlr_child_menu_outer_border']; ?>px solid <?php echo $data['hlr_child_menu_outer_border_color'] ?>;
            }
            .side_navigation #navigation ul ul ul {
            	top: -<?php echo $data['hlr_child_menu_outer_border']; ?>px;
            }
            <?php
		}
		if($data['hlr_child_menu_indicator']=='0') {
			?>
            .side_navigation .sf-sub-indicator {
            	display: none;
            }
            <?php
		}
		if($data['hlr_si_bg'] || $data['hlr_si_color']) {
			?>
            .side_social .top_social a {
            	background-color: <?php echo $data['hlr_si_bg']; ?>;
                color: <?php echo $data['hlr_si_color']; ?>;
            }
            <?php
		}
		if($data['hlr_si_bg_hover']) {
			?>
			.side_social .top_social a:hover {
				background-color: <?php echo $data['hlr_si_bg_hover']; ?>;
			}
			<?php
		}
		?>
        
        .side_navigation #navigation ul li a {
        	border-bottom-width: <?php echo $data['hlr_menu_separator_thickness']; ?>px;
			border-bottom-color: <?php echo $data['hlr_menu_separator_color']; ?>;
            color: <?php echo $data['hlr_menu_text_color']; ?>;
            text-align: <?php echo $data['hlr_mm_text_align'] ?>;
            <?php
			if($data['hlr_menu_bg_color']) {
			?>
            	background-color: <?php echo $data['hlr_menu_bg_color']; ?>;
            <?php
			}
            ?>
        }
        .side_navigation #navigation ul li a:hover, .side_navigation #navigation ul li.current-menu-ancestor a, .side_navigation #navigation ul li.current_page_item a {
        	color: <?php echo $data['hlr_menu_text_color_hover']; ?>;
            <?php
			if($data['hlr_menu_bg_color_hover']) {
			?>
            	background-color: <?php echo $data['hlr_menu_bg_color_hover']; ?>;
            <?php
			}
            ?>
        }
        .side_navigation #navigation ul ul li a,  .side_navigation #navigation ul li.current-menu-ancestor ul li a {
        	color: <?php echo $data['hlr_child_menu_text_color']; ?>;
            <?php
			if($data['hlr_child_menu_bg_color']) {
			?>
            	background-color: <?php echo $data['hlr_child_menu_bg_color']; ?>;
            <?php
			}
            ?>
        }
        .side_navigation #navigation ul ul li a {
        	text-align: <?php echo $data['hlr_cm_text_align']; ?>
        }
        .side_navigation #navigation ul ul li a:hover, .side_navigation #navigation ul li.current-menu-parent ul li.current-menu-item a {
        	color: <?php echo $data['hlr_child_menu_text_color_hover']; ?> !important;
            <?php
			if($data['hlr_child_menu_bg_color_hover']) {
			?>
            	background-color: <?php echo $data['hlr_child_menu_bg_color_hover']; ?> !important;
            <?php
			}
            ?>
        }
    <?php		
	}
	
	/* =================== END ==================== */
	
	if($data['sidebar_pos'] == 'left') { ?>
			.post_container{
				float:right;
			}
			.sidebar{
				float:left;
			}
	<?php 
	}

	if($data['posts_pagination'] == 'center' || $data['posts_pagination'] == 'right') {
	?>
		.pagination {
			text-align: <?php echo $data['posts_pagination']; ?>;
		}
	<?php
	}
	if($data['sub_menu_width'] != '') {
		?>
		#navigation ul.sub-menu li > a {
			min-width: <?php echo $data['sub_menu_width']; ?>;
		}
		<?php
	}
	if($data['vertical_nav'] != '') {
		?>
		#navigation{
			margin-top: <?php echo $data['vertical_nav'] ?>;
		}
		<?php
	}	
	if( ($data['header_position'] != 'left' ) && ($data['header_position']!='right' )) {		
		if( get_post_meta($post->ID, 'pyre_en_header', true) == 'no' ) {
			?>
			.full_header {
				display:none;
			}
			#responsive_navigation {
				display: none;
			}
			<?php
		}
			
		?>
		.main-navigation {
			float:right;
		}
	
		#navigation {
			font-size: <?php echo $data['menu_font_size']; ?>px;
		}
		<?php
		if($data['submenu_font_size']) {
		?>
			#navigation ul.sub-menu li > a {
				font-size: <?php echo $data['submenu_font_size']; ?>px;
				<?php if($data['submenu_line_height']) { ?>
					line-height: <?php echo $data['submenu_line_height']; ?>px;
					height: <?php echo $data['submenu_line_height']; ?>px;
				<?php } ?>
			}
		<?php
		}
		if(!$data['submenu_indicator']) {
		?>
			.sf-sub-indicator {
				display: none;
			}
		<?php
		}
		
		if($data['force_uppercase']) {
		?>
			#navigation ul {
				text-transform: uppercase;
			}
		<?php
		}
		if($data['menu_color']){
		?>
			#navigation ul li a, body #navigation input[type=text] {
				color:<?php echo $data['menu_color']; ?>;
			}
			#navigation input[type=text]:-webkit-input-placeholder {
				color:<?php echo $data['menu_color']; ?>;
			}
		<?php
		}
		?>
		
		#navigation > ul {
			line-height: <?php echo $data['main_menu_line_height']; ?>px;
			height: <?php echo $data['main_menu_line_height']; ?>px;
		}
		
		<?php
		if($data['menu_color_hover']){
		?>
			#navigation > ul > li > a:hover, #navigation > ul li:hover > a, #navigation ul li li:hover > a, #navigation > ul > li.current-menu-item > a, #navigation > ul > li.current-menu-parent > ul > li.current-menu-item > a, #one_page_navigation a.active_menu_item {
				color:<?php echo $data['menu_color_hover']; ?> ;
			}
		<?php
		}
		if($data['submenu_border_color']) {
			?>
			#navigation li.has-mega-menu > ul.sub-menu, #navigation ul ul, .shopping_cart_items {
				border-color: <?php echo $data['submenu_border_color']; ?>;
			}
			.shopping_cart_items:before {
				background-color: <?php echo $data['submenu_border_color']; ?>;
			}
			<?php
		}
		else{
			?>
			#navigation li.has-mega-menu > ul.sub-menu, #navigation ul ul, .shopping_cart_items {
				border-top: none;
			}
			.shopping_cart_items:before {
				content:initial;
			}
			<?php
		}
		$menu_bg_color_hover = ($data['menu_color_bg_hover']) ? $data['menu_color_bg_hover'] : 'transparent';
		?>
		#navigation > ul > li > a {
			font-weight: <?php echo $data['menu_font_weight']; ?>;
            <?php
			if( $data['menu_letter_spacing'] != '0' && $data['menu_letter_spacing'] ) {
				?>
                letter-spacing: <?php echo $data['menu_letter_spacing']; ?>px;
                <?php
			}
			?>
		}
		#navigation > ul > li > a:hover, #navigation > ul li:hover > a, #navigation ul li.current-menu-parent a, #navigation ul li.current-menu-ancestor a,#navigation > ul > li.current-menu-item > a {
			background-color: <?php echo $menu_bg_color_hover; ?>;
		}
		
		#navigation ul.sub-menu li > a, #navigation.custom_menu_color ul.sub-menu li > a {
			color: <?php echo $data['submenu_color']; ?> ;
			background-color:<?php echo $data['submenu_bg_color']; ?>; 
		}
		
		#navigation ul.sub-menu li > a:hover, #navigation ul.sub-menu > li:hover > a {
			color: <?php echo $data['submenu_color_hover']; ?> ;
			background-color:<?php echo $data['submenu_bg_color_hover']; ?>;
		}
		#navigation > ul > li.current-menu-parent > ul > li.current-menu-item > a {
			color: <?php echo $data['submenu_color_hover']; ?> ;
		}
		#navigation > ul > li.current-menu-parent > ul > li.current-menu-item > a {
			background-color: <?php echo $data['submenu_bg_color_hover']; ?>;
		}
	
		#navigation ul ul, #navigation ul ul li {
			background-color:<?php echo $data['submenu_bg_color']; ?>;
		}
		
		#navigation ul.sub-menu li {
			border-bottom-color: <?php echo $data['submenu_separator']; ?>;
		}
		
		<?php
		$individual_header_css = ( get_post_meta($post->ID, 'pyre_header_style', true) != NULL ) ? get_post_meta($post->ID, 'pyre_header_style', true) : $data['header_style']; 
		
		if($individual_header_css == 'default') {
	    	$individual_header_css = $data['header_style'];
	    }
		
		if($individual_header_css == "style2"){
		?>		
			#navigation{
				float: none;
				margin-top:0;
				position:relative;
			}
			#navigation ul, #navigation ul li {
				float: none;
			}
			#navigation ul li {
				display: inline-block;				
			}
			#navigation > ul {
				line-height:50px;
				height: 50px;
			}
			.second_navi {
				background-color: <?php echo $data['menu_bg_color_full']; ?>;
				<?php if($data['menu_border_color']) { ?>
					border-color: <?php echo $data['menu_border_color']; ?>;
				<?php }
				else {
					?>
					border: none;
					<?php
					} ?>
			}
			.header {
				box-shadow:none;
				-webkit-box-shadow:none;			
			}
            <?php
			if($data['header_bottom_shadow'] == '0'){	
				?>
                .full_header {
                    box-shadow: none;
                    -webkit-box-shadow: none;
                }
				<?php
			}
			else{
			?>
                .full_header{
                    box-shadow: 0 1px 15px rgba(0, 0, 0, 0.1);
                    -webkit-box-shadow: 0 1px 15px rgba(0, 0, 0, 0.1);
                }	
		<?php
			}
		}/*
		else {
			?>
			body:not(.hs-open) #branding {
				opacity: 1;
				-webkit-transition: opacity .3s ease-in-out;
				-o-transition: opacity .3s ease-in-out;
				transition: opacity .3s ease-in-out;
			}
			body.hs-open #branding {
				opacity: 0;
			}
			<?php
		}*/
		?>

		<?php
		$header_el_pos = ( get_post_meta($post->ID, 'pyre_header_el_pos', true) != NULL ) ? get_post_meta($post->ID, 'pyre_header_el_pos', true) : $data['header_el_pos']; 
		
		if($header_el_pos == 'default') {
	    	$header_el_pos = $data['header_el_pos'];
	    }
	    /*
	    if($header_el_pos !='center' && $individual_header_css == 'style2') {
	    	?>
	    	#navigation > ul > li:first-child > a {
	    		padding-left:0;
	    	}
	    	<?php
	    }*/

		if($header_el_pos == 'center') {
			?>
			body.hs-open #branding {
				opacity: 1;
			}
			#branding, #navigation, #navigation ul, #navigation ul li {
				float: none;
			}
			#branding .logo a img {
				margin:0 auto;
			}		
			#navigation {
				margin-top:0;
				position:relative;
			}
			#navigation ul {
				text-align:center;
				height: auto;
				line-height: normal;
			}
			#navigation ul li ul {
				text-align:left;
			}		
			#navigation ul li {
				display:inline-block;
				line-height:50px;
				height:50px;
			}
			#navigation ul li ul li {
				display: inherit;
			}
			
			#branding, #navigation ul {
				text-align:center;
			}
			.banner{
				float: none;
				padding-bottom:20px;
				text-align:center;
			}
			.responsive-menu-link {
				position:relative;
				padding-bottom:20px;
			}
			
			<?php
		}
		if($data['header_search_icon']) {
			?>
			#navigation ul li.header_search_li {
				
			}
			@media screen and (min-width: 831px){
				#navigation ul li.responsive-item {
					display:none;
				}
			}
			<?php
		}
		else {
			?>
			#navigation ul li.header_search_li, #navigation ul li.responsive-item {
				display: none;
			}
			@media screen and (max-width: 830px) {
				.responsive-item {
					display: none !important;
				}
			}
			<?php
		}
		?>
		
		
		#navigation .has-mega-menu .megamenu-title, #navigation .has-mega-menu .megamenu-title a {
			color: <?php echo $data['mm_column_title'] ?>;
			font-size: <?php echo $data['mm_column_title_font_size']; ?>px;
			font-weight: <?php echo $data['mm_column_title_font_weight']; ?>;
		}
		#navigation .has-mega-menu .megamenu-title a:hover {
			color: <?php echo $data['mm_column_title_hover'] ?>;
		}
		#navigation .has-mega-menu ul.sub-menu li > a{
			color: <?php echo $data['mm_links_color'] ?>;
			background-color: transparent;
		}
		#navigation .has-mega-menu ul.sub-menu li > a:hover{
			color: <?php echo $data['mm_links_color_hover'] ?>;
		}
	<?php
	}
	?>
	.footer {	
		<?php 
		if($data['en_footer_copy_pattern'] && !$data['footer_copyright_bg'] ) { ?>
			background: url("<?php echo $data['footer_copy_patterns']; ?>") repeat;
		<?php 
		} 
		if($data['footer_copyright_bg']) {
		?>
			background: url("<?php echo $data['footer_copyright_bg'] ?>") <?php echo $data['footer_copyright_bg_repeat']; ?>;	
		<?php
		}
		?>
			background-color: <?php echo $data['footer_copy_bg_color']; ?>;	
            
        <?php 
		if( get_post_meta($post->ID, 'pyre_en_footer', true) == 'no' ) {
			?>
            display: none;
            <?php
		}
		?>			
	}

	.footer .instagram_footer_title {
		padding-top: <?php echo $data['instagram_footer_title_padding_top'] ?>px;
		padding-bottom: <?php echo $data['instagram_footer_title_padding_bottom'] ?>px;
		color: <?php echo $data['instagram_footer_title_color'] ?>;
		background-color: <?php echo $data['instagram_footer_title_bg_color'] ?>;
		display: block;
		font-size: <?php echo $data['instagram_footer_title_font_size'] ?>px;
	}

	.footer .instagram_footer_title a, .footer .instagram_footer_title a:hover {
		color: <?php echo $data['instagram_footer_title_color'] ?>;
	}

	.footer_widget {
		<?php if($data['en_footer_pattern']) {  ?>
			background: url("<?php echo $data['footer_patterns'];?>") repeat;
		<?php } ?>
			background-color: <?php echo $data['footer_bg_color']; ?>;
			border-top-color: <?php echo $data['footer_widgets_tb_color']; ?>;
			border-bottom-color: <?php echo $data['footer_widgets_bb_color']; ?>;
        <?php 
		if( get_post_meta($post->ID, 'pyre_en_widgets', true) == 'no' ) {
			?>
            display: none;
            <?php
		}
		?>	    
	}
	<?php
	if($data['footer_widgets_font_size']) {
		?>
		.footer_widget_content {
			font-size: <?php echo $data['footer_widgets_font_size']; ?>px;
		}
		<?php
	}
	if($data['footer_copyright_font_size']) {
		?>
		.copyright {
			font-size: <?php echo $data['footer_copyright_font_size']; ?>px;
		}
		<?php
	}
	?>
	h3.footer-widget-title {
		color: <?php echo $data['footer_heading_color']; ?>;
        font-size: <?php echo $data['footer_side_font_size']; ?>px;
        font-weight: <?php echo $data['footer_heading_font_weight']; ?>;
        letter-spacing: <?php echo $data['footer_heading_let_sp']; ?>px;
	}
	.recent-flickr a img {
		border-color: <?php echo $data['footer_flickr_bcolor']; ?>;
	}
	.footer_widget_content {
		color: <?php echo $data['footer_widget_text_color']; ?>;
	}
	.copyright {
		color: <?php echo $data['footer_text_color']; ?>;	
	}
	.footer .copyright a {
		color: <?php echo $data['footer_link_color']; ?>;
	}
	.footer .copyright a:hover {
		color: <?php echo $data['footer_link_color_hover']; ?>;
	}
	
	<?php
	if($data['en_footer_center']){
	?>
		.copyright, .footer_branding, .connect {
			float: none;
			text-align: center;
		}
		.connect {
			width:auto;
		}
		.connect li {
			float:none;
			display:inline-block;
		}
		.footer .top_social{
			width: 100%;
			text-align:center;
			margin-bottom:10px;
		}
		.footer .top_social a {
			float: none;
			display: inline-block;
			margin-bottom:10px;
		}
        .footer_navigation{
        	float: none;
        }
        #footer-menu {
        	text-align:center;
        }
	<?php
	}
	?>
	
	<?php if($data['en_back_top']){ ?>
		#gotoTop {
			background-color: <?php echo $data['back_top_bg']; ?>;
		}
		#gotoTop:hover {
			background-color: <?php echo $data['back_top_bg_hover']; ?>;
		}
	<?php } ?>
	
	.bellow_header{
		background-color:<?php echo $data['tb_bg_color']; ?>;
	}
	.bellow_header_title, .page-title .breadcrumb, .page-title .breadcrumb a {
		color: <?php echo $data['tb_title_color']; ?>;
	}
	
	<?php
	
	if($data['logo_resize']){
		?>
		#branding img {
			max-width: <?php echo $data['logo_resize_value'] ?>; ?>;
			height: auto;
		}
		<?php
	}
	?>
	#branding .logo, .side_logo img, #branding .text_logo {
		padding-top:<?php echo $data['logo_padding_top']; ?>px;
		padding-bottom:<?php echo $data['logo_padding_bottom']; ?>px;
        padding-left:<?php echo $data['logo_padding_left']; ?>px;
        padding-right:<?php echo $data['logo_padding_right']; ?>px;
	}
	<?php
	
	if(!$data['logo']) {
		?>

		#branding .text a, .side_logo .text a {
			color: <?php echo $data['text_logo_color']; ?>;
		}
		#branding .text a:hover, .side_logo .text a:hover {
			color: <?php echo $data['text_logo_color_hover']; ?>;
		}
		#branding .tagline, .side_logo .tagline {
			color: <?php echo $data['tagline_color']; ?>;
			font-size: <?php echo $data['tagline_font_size']; ?>px;  
		}
		<?php
	}
	
	if(!$data['white_circle']) {
		?>
		.shortcode_img {
			background-color: transparent;
			border-radius:0;
			width:100%;
			height:auto;
			margin-top:30px;
		}
		<?php
	}
	else{
		?>
		.shortcode_img img{
			max-width: 32px;
			height:auto;
			position: relative;
			top: 50%;
			margin-top: -16px;
		}
		<?php
	}
	
	if($data['en_top_bar']) {
		?>
		.top_nav_out {
			background-color: <?php echo $data['top_bar_bg']; ?>;
			border-color: <?php echo $data['top_bar_border']; ?>;
		}
		.top_nav_out .top_contact {
			border-color: <?php echo $data['top_bar_border']; ?>
		}
		<?php 
		if( $data['tb_right_content']=='empty' || $data['tb_left_content']=='empty' ) {
			?>
			.top_nav_out .top_contact {
				border: none;
			}
			<?php
		}
		if( $data['tb_left_content']=='nav') {
			?>
			@media screen and (max-width: 1024px) {
				.woo_login_form {
					right: auto;
					left: 0;
				}
			}
			<?php
		}
		?>
		.top_social a{
			opacity: <?php echo ($data['social_icons_opacity']/100); ?>;
			filter: alpha(opacity=<?php echo ($data['social_icons_opacity']/100); ?>);	
			color: <?php echo $data['top_bar_social_color']; ?>;		
		}
		.top_contact .contact_email span.email, .top_contact .contact_phone span.phone {
			opacity: <?php echo ($data['social_icons_opacity']/100); ?>;
			filter: alpha(opacity=<?php echo ($data['social_icons_opacity']/100); ?>);
		}
		#top-menu ul li a {
			color: <?php echo $data['tm_sub_menu_link']; ?>;
			background-color: <?php echo $data['tm_sub_menu_bg']; ?>;
		}
		#top-menu ul li a:hover {
			color: <?php echo $data['tm_sub_menu_link_hover']; ?>;
			background-color: <?php echo $data['tm_sub_menu_bg_hover']; ?>;
		}
		#top-menu ul li {
			border-bottom-color: <?php echo $data['tm_sm_separator_color'] ?>;
		}
		
		<?php
	}
	?>
	
	.top_contact .contact_phone, .top_contact .contact_address{			
		border-color: <?php echo $data['top_bar_separator']; ?>;
		border-width:1px;
		border-left-style: <?php echo $data['top_bar_separator_style'] ?>
	}
	.top_contact a {
		color:  <?php echo $data['contact_link']; ?>;
	}
	.top_contact a:hover {
		color:  <?php echo $data['contact_link_hover']; ?>;
	}
	.top_contact {
		color: <?php echo $data['contact_text']; ?>;
	}
	
	.single_post_tags a, .single_post_tags a:hover, .woocommerce-pagination ul li span.current, .woocommerce .quantity .minus:hover, .woocommerce .quantity .plus:hover {
		background-color: <?php echo $shortcode_color ?>;
		border-color: <?php echo $shortcode_color ?>;
	}
	.woocommerce-pagination ul li {
		border-color: <?php echo $shortcode_color ?>;
	}
	.author_box:after, .woocommerce-pagination ul li a:hover, .product .shortcode-tabs .tab-hold .tabs li.active a:after {
		background-color: <?php echo $shortcode_color ?>;
	}
	
	.footer .top_social a {
		color: <?php echo $data['footer_social_icons']; ?>;
	}
	
	<?php
	if($data['en_cta']) {
	?>
		.action_bar {
			background-color: <?php echo $data['cta_bg']; ?>;
			color: <?php echo $data['cta_text']; ?>;
		}
		.action_bar:hover {
			background-color: <?php echo $data['cta_bg_hover']; ?>;
			color: <?php echo $data['cta_text_hover']; ?>;
		}	
		
		
		.action_bar_inner .button_default{					
			background-color: <?php echo $data['cta_button_background_color']; ?>;
			border-color: <?php echo $data['cta_button_border_color']; ?>;
			color: <?php echo $data['cta_button_text_color']; ?>;		
		}
		
		.action_bar_inner .button_default:hover{
			background-color: <?php echo $data['cta_button_background_color_hover']; ?>;
			border-color: <?php echo $data['cta_button_border_color_hover']; ?>;
			color: <?php echo $data['cta_button_text_color_hover']; ?>;	
		}
		<?php		
		
	}
	?>	
	
	.image_prod .badge, .product .badge {
		background-color: <?php echo $data['shortcode_color']; ?>;
	}
	.product_price, .product .summary .price {
		color: <?php echo $data['primary_color_hover']; ?>;
	}
	
	<?php 
	if( get_post_meta($post->ID, 'pyre_transparent_header', true) == 'yes' ) {
		$transparent_class = 'header_transparent';

		?>
		.header_transparent {
        	<?php if( !get_post_meta($post->ID, 'pyre_header_transparency', true) || ( get_post_meta($post->ID, 'pyre_header_transparency', true) == '' ) ) { ?>
				background-color: transparent;
            <?php } ?>
			position: absolute;
			width: 100%;
			box-shadow: none;
			border-bottom: none;
			-webkit-box-shadow: none;
		}
		.pi-header-row-fixed .full_header {
			padding-bottom:0;
		}
		@media screen and (min-width: 830px) {
			.header_transparent #branding .text a {
				color: <?php echo get_post_meta($post->ID, 'pyre_transparent_logo_color', true) ?>;
			}
			.header_transparent #branding .tagline {
				color: <?php echo get_post_meta($post->ID, 'pyre_transparent_tagline_color', true) ?>;
			}
		}
		@media screen and (max-width: 830px) {
			.header_transparent {
				background-color:<?php echo $data['header_bg_color']; ?>;
			}
		}
		<?php

	}
	if( ( get_post_meta($post->ID, 'pyre_transparent_header', true) == 'yes' ) && ( get_post_meta($post->ID, 'pyre_transparent_header_color', true) != '' ) ) {
		$menu_extra_class = ' custom_menu_color';
		?>
		#navigation.custom_menu_color ul li a {
			color: <?php echo get_post_meta($post->ID, 'pyre_transparent_header_color', true); ?>;
		}
		<?php
	}
	?>
    
    .post-content blockquote {
    	border-color: <?php echo $shortcode_color;?>;
    }
    <?php
    if(is_page_template('contact.php')) {
    	?>
    	.contact_map_holder {
    		height: <?php echo $data['gmap_height']; ?>;
    	}
    	<?php
    }
    ?>

    .responsive-menu-bar {
    	background-color: <?php echo $data['mobile_menu_bar_bg']; ?>;
    	color: <?php echo $data['mobile_menu_bar_text']; ?>;
    	<?php
    	if($data['mobile_menu_bar_border_top']) {
    		?>
    		border-top: 1px solid <?php echo $data['mobile_menu_bar_border_top']; ?>;
    	<?php
    	}
    	if($data['mobile_menu_bar_border_bottom']) {
    	?>	
    		border-bottom: 1px solid <?php echo $data['mobile_menu_bar_border_bottom']; ?>;
    		<?php
    	}
    	?>
    }
    #responsive_menu li a{
    	background-color: <?php echo $data['mobile_menu_link_bg']; ?>;
    	color: <?php echo $data['mobile_menu_link_color']; ?>;
    	border-top-color: <?php echo $data['mobile_menu_item_separator']; ?>;
    }
    <?php if ( $data['off_canvas_sidebar'] ) { ?>
	    #side-panel {
	    	background-color: <?php echo $data['off_cnv_bg']; ?>;
	    	color: <?php echo $data['off_cnv_text']; ?>;
	    	width: <?php echo $data['off_cnv_width']; ?>;
	    	right: -<?php echo $data['off_cnv_width']; ?>;
	    }
	    #side-panel h3.sidebar-title {
	    	color: <?php echo $data['off_cnv_text']; ?>;
	    }
	    #side-panel h3.sidebar-title:after {
	    	border-color: <?php echo $data['off_cnv_text']; ?>;
	    }

	    #side-panel .sidebar-widget a {
	    	color: <?php echo $data['off_cnv_link']; ?>;
	    }
	    #side-panel .sidebar-widget a:hover {
	    	color: <?php echo $data['off_cnv_link_hover']; ?>;
	    }
	    #side-panel .sidebar-widget h3.sidebar-title {
	    	font-size: <?php echo $data['off_cnv_heading']; ?>;
	    }
	    #side-panel .sidebar-widget h3.sidebar-title:after {
	    	border-color: <?php echo $data['off_cnv_heading_split_color']; ?>;
	    	<?php if(!$data['off_cnv_heading_split']) { ?>
	    		content: initial;
	    	<?php } ?>
	    }
    <?php } ?>

    /* Retina Logo logic */
	<?php
	if($data['retina_logo'] || get_post_meta($post->ID, 'pyre_transparent_logo_retina', true)) {
		$logo = (! get_post_meta($post->ID, 'pyre_transparent_logo_retina', true)) ? $data['retina_logo'] : get_post_meta($post->ID, 'pyre_transparent_logo_retina', true);
    	$retina_logo_id = pn_get_attachment_id_from_url ($logo);
    	$retina_logo_attr = wp_get_attachment_image_src($retina_logo_id, 'full');
    	$retina_logo_height = $retina_logo_attr[2]/2;
    	$retina_logo_width = $retina_logo_attr[1]/2;
    	if($retina_logo_height==0) {
    		$retina_logo_height = 100;
    		$retina_logo_width = 200;
    	}
    	?>
		.retina_logo {
			max-width: <?php echo $retina_logo_width; ?>px;
			height: <?php echo $retina_logo_height; ?>px;			
		}
	<?php
	}
	if($data['logo'] || get_post_meta($post->ID, 'pyre_transparent_logo', true)) {
		$logo2 = (! get_post_meta($post->ID, 'pyre_transparent_logo', true)) ? $data['logo'] : get_post_meta($post->ID, 'pyre_transparent_logo', true);
    	$normal_logo_id = pn_get_attachment_id_from_url ($logo2);
    	$normal_logo_attr = wp_get_attachment_image_src($normal_logo_id, 'full');
    	
    	?>
    	/*
		.normal_logo {
			width: <?php echo $normal_logo_attr[1]; ?>px;
			height: <?php echo $normal_logo_attr[2]; ?>px;			
		}
		*/
		#branding .logo a {
			
			<?php 
			if($data['logo_resize']) { 
				//calculate the logo resize factor, by spliting the width of the original logo with the width of the resize logo value
				$logo_resize = str_replace('px', '', $data['logo_resize_value']);
				$logo_resize_factor = $normal_logo_attr[1] / $logo_resize;
				$logo_to_show = $normal_logo_attr[2]/$logo_resize_factor;
			?>					
				height: <?php echo number_format($logo_to_show,2); ?>px;
			<?php 
			} /*
			else {
				if($normal_logo_attr[1]>1140) {
				?>
					height: auto;
				<?php
				}
				else {
			?>
				height: <?php echo $normal_logo_attr[2]; ?>px;
			<?php 
				}
			} */
			?>	
		}
	<?php
	}

	/* When Sticky Footer on, hide it first and then show it */

	if($data['en_sticky_footer']) {
		?>
		.footer {
			display: none;
		}
		<?php
	}

	/* WooCommerce Advanced Styling */
	if(class_exists('woocommerce')) {
		if($data['woo_archive_border'] =='no') {
			?>
			.inside_prod { border: none;}
			.product_details { border-top: none}
			<?php
		}
		else {
			?>
			.inside_prod { border-color: <?php echo $data['woo_archive_product_border_color']; ?>}
			<?php
		}
		?>
		.product_details {
			background-color: <?php echo $data['woo_archive_product_bg']; ?>;
			padding: <?php echo $data['woo_archive_padding_tb']; ?>px <?php echo $data['woo_archive_padding_lr']; ?>px;
			text-align: <?php echo $data['woo_archive_text_align']; ?>;
		}
		<?php 
		if( $data['woo_archive_text_align'] == 'center' ) {
		?>
			.products .product .star-rating {
				width: auto;
			}	
			.products .product .star-rating:before {
				float: none;
				position: relative;
				left: auto;
			}
			.products .product .star-rating span:before {
				left: 50%;
				transform: translateX(-50%);
				-webkit-transform: translateX(-50%);				
			}
			.sidebar-widget .product-categories li span {
				position: relative
			}
		<?php
		}
		?>
		.product_details .product_price {
			color: <?php echo $data['woo_archive_price_color']; ?>;
			font-size: <?php echo $data['woo_archive_price']; ?>px;
		}
		.products .product .product_details h3 {
			font-size: <?php echo $data['woo_archive_title']; ?>px;
		}
		.products .product .product_details h3 a {
			color: <?php echo $data['woo_archive_title_color']; ?>;		
		}
		.products .product .product_details h3 a:hover {
			color: <?php echo $data['woo_archive_title_color_hover']; ?>;		
		}

		.product_details .product_price .price ins{
			color: <?php echo $data['woo_archive_product_sale_color'] ?>;
		}
		.product_details .product_price .price del{
			color: <?php echo $data['woo_archive_product_sale_regular_color'] ?>;
		}

		.image_prod .badge, .product .badge {
			color: <?php echo $data['woo_archive_product_sale_badge_text'] ?>;
			background-color: <?php echo $data['woo_archive_product_sale_badge_bg'] ?>;
		}

		.product .star-rating {
			color: <?php echo $data['woo_archive_product_star']; ?>;
		}

		<?php /* Set the default button on WooCommerce pages */ ?>

		.woocommerce-page .button,
		.product .tab-container #reviews input#submit {
			color: <?php echo $data['woo_default_text']; ?>;
			background-color: <?php echo $data['woo_default_bg']; ?>;
			border-color: <?php echo $data['woo_default_border']; ?>;
		}

		.woocommerce-page .button:hover,
		.product .tab-container #reviews input#submit:hover {
			color: <?php echo $data['woo_default_text_hover']; ?>;
			background-color: <?php echo $data['woo_default_bg_hover']; ?>;
			border-color: <?php echo $data['woo_default_border_hover']; ?>;
		}

		<?php 
		/* WooCommerce Footer Widgets Styling */
		?>
		.footer_widget_content ul.product_list_widget li a {
			font-size: <?php echo $data['footer_woo_prod_title']; ?>px;
			font-weight: <?php echo $data['footer_woo_prod_title_weight']; ?>;
			color: <?php echo $data['footer_woo_prod_title_color']; ?>;
		}
		.footer_widget_content ul.product_list_widget li ins, .footer_widget_content ul.product_list_widget li .amount {
			font-size: <?php echo $data['footer_woo_prod_price']; ?>px;
			font-weight: <?php echo $data['footer_woo_prod_price_weight']; ?>;
			color: <?php echo $data['footer_woo_prod_price_color']; ?>
		}
		.footer_widget_content ul.product_list_widget li del, .footer_widget_content ul.product_list_widget li del .amount {
			font-size: <?php echo $data['footer_woo_prod_old_price']; ?>px;		
			color: <?php echo $data['footer_woo_prod_old_price_color']; ?>
		}

		.footer_widget_content ul.cart_list li, .footer_widget_content ul.product_list_widget li {
			border-color: <?php echo $data['footer_woo_prod_separator']; ?>;
		}
		.footer_widget_content .star-rating span {
			color: <?php echo $data['footer_woo_prod_stars']; ?>;
		}

		<?php
		/* WooCommerce Product in Cart Counter */

		if($data['woo_cart']) {
		?>
			#navigation ul li.shopping_cart_icon a span.item_counter {
				color: <?php echo $data['woo_cart_prod_count_color']; ?>;
				background-color: <?php echo $data['woo_cart_prod_count_bg']; ?>;
			}
			span.cart_item_title {
				color: <?php echo $data['woo_header_product_title_color'] ?>;
				font-size: <?php echo $data['woo_header_product_title_font_size']; ?>px;
			}
			span.cart_item_title:hover {
				color: <?php echo $data['woo_header_product_title_color_hover'] ?>;
			}
			span.cart_item_price_quantity {
				color: <?php echo $data['woo_header_product_quantity_price_color'] ?>;
				font-size: <?php echo $data['woo_header_product_quantity_price_font_size'] ?>px;
			}
			.shopping_cart_items .cart_item {
				border-color: <?php echo $data['woo_header_shopping_cart_separator'] ?>;
				background-color: <?php echo $data['woo_header_shopping_cart_bg']; ?>;
			}
			.shopping_cart_items {
				background-color: <?php echo $data['woo_header_shopping_cart_bg']; ?>;
				width: <?php echo $data['woo_header_width']; ?>px;
			}
			.shopping_cart_total {
				border-color: <?php echo $data['woo_header_shopping_cart_separator'] ?>;
			}
			.shopping_cart_total .total_text {
				color: <?php echo $data['woo_header_total_text_color'] ?>;
			}
			.shopping_cart_total .total_value {
				color: <?php echo $data['woo_header_total_price_color'] ?>;
			}

			#navigation ul li.shopping_cart_icon .cart_checkout .button_header_cart {
				background-color: <?php echo $data['woo_header_view_cart_bg'] ?>;
				border-color: <?php echo $data['woo_header_view_cart_border'] ?>;
				color: <?php echo $data['woo_header_view_cart_text'] ?>;
			}
			#navigation ul li.shopping_cart_icon .cart_checkout .button_header_cart:hover {
				background-color: <?php echo $data['woo_header_view_cart_bg_hover'] ?>;
				border-color: <?php echo $data['woo_header_view_cart_border_hover'] ?>;
				color: <?php echo $data['woo_header_view_cart_text_hover'] ?>;
			}

			#navigation ul li.shopping_cart_icon .cart_checkout .button_header_cart.inverse {
				background-color: <?php echo $data['woo_header_checkout_bg'] ?>;
				border-color: <?php echo $data['woo_header_checkout_border'] ?>;
				color: <?php echo $data['woo_header_checkout_text'] ?>;
			}
			#navigation ul li.shopping_cart_icon .cart_checkout .button_header_cart.inverse:hover {
				background-color: <?php echo $data['woo_header_checkout_bg_hover'] ?>;
				border-color: <?php echo $data['woo_header_checkout_border_hover'] ?>;
				color: <?php echo $data['woo_header_checkout_text_hover'] ?>;
			}
		<?php
		}
		if($data['woocommerce_login_top_menu'] || $data['woocommerce_login_primary_menu']) {
			?>
			.woo_login_form {
				background-color: <?php echo $data['woo_head_login_bg']; ?>;
				color: <?php echo $data['woo_head_login_text']; ?>;
			}
			.woo_login_form input[type="text"], .woo_login_form input[type="password"] {
				border-color: <?php echo $data['woo_head_login_input_border']; ?>;
				color: <?php echo $data['woo_head_login_input_text'] ?>;
				background-color: <?php echo $data['woo_head_login_input_background'] ?>;
			}

			.woo_login_form .button.login_top, #navigation ul li .woo_login_form .button.login_top {
				color: <?php echo $data['woo_head_login_button_color']; ?>;
				background-color: <?php echo $data['woo_head_login_button_bg']; ?>;
				border-color: <?php echo $data['woo_head_login_button_border']; ?>;
			}
			.woo_login_form .button.login_top:hover, #navigation ul li .woo_login_form .button.login_top:hover {
				color: <?php echo $data['woo_head_login_button_color_hover']; ?>;
				background-color: <?php echo $data['woo_head_login_button_bg_hover']; ?>;
				border-color: <?php echo $data['woo_head_login_button_border_hover']; ?>;
			}
			
			#top-menu li .woo_login_form .button.register_top, #navigation ul li .woo_login_form .button.register_top {
				color: <?php echo $data['woo_head_register_button_color']; ?>;
				background-color: <?php echo $data['woo_head_register_button_bg']; ?>;
				border-color: <?php echo $data['woo_head_register_button_border']; ?>;
			}
			#top-menu li .woo_login_form .button.register_top:hover, #navigation ul li .woo_login_form .button.register_top:hover {
				color: <?php echo $data['woo_head_register_button_color_hover']; ?>;
				background-color: <?php echo $data['woo_head_register_button_bg_hover']; ?>;
				border-color: <?php echo $data['woo_head_register_button_border_hover']; ?>;
			}
			<?php
		}

		/* WooCommerce Categories Mod */
		if($data['woo_categs_animation']) {
			?>
			.products .product-category {
				transition: all .2s ease-in-out;
				-webkit-transition: all .2s ease-in-out;
			}
			.products .product-category:hover {
				transform: scale(1.04);
				-webkit-transform: scale(1.04);
			}
			<?php
		}
		?>
			.products .product-category h3 {
				color: <?php echo $data['woo_categs_title']; ?>;
				background-color: <?php echo $data['woo_categs_title_bg']; ?>;
				font-size: <?php echo $data['woo_categs_title_font_size']; ?>px;
			}
		<?php
		if($data['woo_categs_pr_count'] == 0) {
			?>
			.products .product-category h3 mark {
				display: none;
			}
			<?php
		}

		/* WooCommerce Price Filter Widget */
		?>
		.woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
			background-color: <?php echo $data['woo_price_filter_handle']; ?>;
		}

		.woocommerce .widget_price_filter .ui-slider .ui-slider-range {
			background-color: <?php echo $data['woo_price_filter_range_color']; ?>;
		}

		.woocommerce .widget_price_filter .price_slider_amount .price_label {
			color: <?php echo $data['woo_price_filter_color']; ?>;
		}

		.price_slider_amount .button {
			color: <?php echo $data['woo_price_filter_button_text']; ?>;
			border-color: <?php echo $data['woo_price_filter_button_bg']; ?>;
			background-color: <?php echo $data['woo_price_filter_button_bg']; ?>;
		}
		.price_slider_amount .button:hover {
			color: <?php echo $data['woo_price_filter_button_text_hover']; ?>;
			border-color: <?php echo $data['woo_price_filter_button_bg_hover']; ?>;
			background-color: <?php echo $data['woo_price_filter_button_bg_hover']; ?>;
		}

		.woocommerce table.shop_table thead tr, 
		.woocommerce-order-received .woocommerce p:first-of-type,
		.woocommerce-order-received .woocommerce header h2, 
		.woocommerce-order-received .woocommerce header.title h3, 
		.woocommerce-view-order .woocommerce header.title h3,
		.woocommerce header.woocommerce-Address-title h3 {
			background-color: <?php echo $data['woo_table_head_bg']; ?>;
			color: <?php echo $data['woo_table_head_text']; ?>;
		}

		<?php
		/* WooCommerce Cart Widget */

		if( $data['woo_cw_remove'] == '0' ) {
			?>
			.woocommerce ul.product_list_widget li a.remove {
				display: none;
			}
			ul.product_list_widget li.mini_cart_item a:not(.remove) {
				padding-left: 0;
			}
			<?php
		}	
		if( $data['woo_cw_image'] == '0' ) {
			?>
			ul.cart_list li.mini_cart_item img, ul.product_list_widget li.mini_cart_item img {
				display: none;
			}
			<?php
		}
		?>
			ul.product_list_widget li.mini_cart_item a:not(.remove) {
				color: <?php echo $data['woo_cw_title']; ?>;
			}
			ul.product_list_widget li.mini_cart_item a:not(.remove):hover {
				color: <?php echo $data['woo_cw_title_hover']; ?>;
			}
			ul.cart_list li, ul.product_list_widget li, .woocommerce .widget_shopping_cart_content .total {
				border-color: <?php echo $data['woo_cw_separator']; ?>;
			}
			.woocommerce .widget_shopping_cart_content .quantity {
				color: <?php echo $data['woo_cw_quantity']; ?>;
			}
			.woocommerce .widget_shopping_cart_content .quantity .amount {
				color: <?php echo $data['woo_cw_products_price']; ?>;
			}
			.woocommerce .widget_shopping_cart_content .total {
				color: <?php echo $data['woo_cw_subtotal_text']; ?>;
			}
			.woocommerce .widget_shopping_cart_content .total .amount {
				color: <?php echo $data['woo_cw_subtotal_price']; ?>;
			}

			.widget_shopping_cart .button {
				color: <?php echo $data['woo_cw_vc_text']; ?>;
				border-color: <?php echo $data['woo_cw_vc_border']; ?>;
				background-color: <?php echo $data['woo_cw_vc_bg']; ?>;
			}

			.widget_shopping_cart .button:hover {
				color: <?php echo $data['woo_cw_vc_text_hover']; ?>;
				border-color: <?php echo $data['woo_cw_vc_border_hover']; ?>;
				background-color: <?php echo $data['woo_cw_vc_bg_hover']; ?>;
			}

			.widget_shopping_cart .button.checkout {
				color: <?php echo $data['woo_cw_ck_text']; ?>;
				border-color: <?php echo $data['woo_cw_ck_border']; ?>;
				background-color: <?php echo $data['woo_cw_ck_bg']; ?>;
			}

			.widget_shopping_cart .button.checkout:hover {
				color: <?php echo $data['woo_cw_ck_text_hover']; ?>;
				border-color: <?php echo $data['woo_cw_ck_border_hover']; ?>;
				background-color: <?php echo $data['woo_cw_ck_bg_hover']; ?>;
			}

		<?php
		
		/* WooCommerce Single Product Styling */
		?>
		.single-product .product .summary .woo_single_prod_title {
			font-size: <?php echo $data['woo_single_prod_title_font_size']; ?>px;
			margin:0;
			text-transform: none;
			line-height: normal;
			color: <?php echo $data['woo_single_prod_title_color']; ?>;
		}
		.single-product .product .star-rating {
			color: <?php echo $data['woo_single_prod_stars_color'] ?>;
		}
		.single-product .product .summary .price {
			color: <?php echo $data['woo_single_prod_price_color']; ?>;
			font-size: <?php echo $data['woo_single_prod_price_font_size']; ?>px;
			line-height: normal;
		}
		.single-product .product del {
			color: <?php echo $data['woo_single_prod_sale_regular_price_color'] ?>;
		}
		.single-product .cart .button {
			color: <?php echo $data['woo_single_prod_add_cart_color']; ?>;
			background-color: <?php echo $data['woo_single_prod_add_cart_bg'] ?>;
			border-color: <?php echo $data['woo_single_prod_add_cart_border'] ?>;
			margin: 0;
		}
		.single-product .cart .button:hover {
			color: <?php echo $data['woo_single_prod_add_cart_color_hover']; ?>;
			background-color: <?php echo $data['woo_single_prod_add_cart_bg_hover'] ?>;
			border-color: <?php echo $data['woo_single_prod_add_cart_border_hover'] ?>;			
		}
		.woocommerce .quantity .minus:hover, .woocommerce .quantity .plus:hover {
			background-color: <?php echo $data['woo_qty_button_bg_hover']; ?>;
			border-color: <?php echo $data['woo_qty_button_bg_hover']; ?>;
		}
		.product .shortcode-tabs .tab-hold .tabs li.active a:after {
			background-color: <?php echo $data['woocommerce_tabs_active'] ?>;
		}
		<?php
	}
	



	if($data['mobile_menu_landscape']) {
		?>
		@media screen and (max-width: 1024px) {
			.header_transparent {
				background-color:<?php echo $data['header_bg_color']; ?>;
				position: relative;
			}
			#navigation, #responsive_menu li:not(.menu-item) { display: none;}
			#branding { float: none; }
			#branding .logo a img { margin: 0 auto; }
			#responsive_navigation, .mobile_menu_holder .sf-sub-indicator { display: block;}
			
			<?php 
			if($data['header_search_icon']) { 
				?>
				#responsive_menu li.menu-item-resp { display: block;}
				<?php
			} 
			?>
			
			.responsive-menu-link {
				display: block;
				position:relative;
				top: auto;
				margin:0;
				padding:0;
				right: auto;
			}

		}
		<?php
	}

	if($data['mobile_menu_landscape']){
		?>
		@media screen and (max-width: 1024px) {
			#responsive_navigation.sticky_mobile {
				position:fixed;
				top:0;
				width:100%;
				z-index:9999;
			}
		}
		<?php
	}

	if($data['creativo_custom_css']) {
	?>    	
			<?php	
			echo $data['creativo_custom_css'];
			?>
        <?php
	}
?>
