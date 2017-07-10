<?php
class PyreThemeFrameworkMetaboxes {
	
	public function __construct()
	{
		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('save_post', array($this, 'save_meta_boxes'));
		add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
	}

	// Load backend scripts
	function admin_script_loader() {
		global $pagenow;
		if (is_admin() && ($pagenow=='post-new.php' || $pagenow=='post.php')) {
	    	wp_register_script('creativo_upload', get_bloginfo('template_directory').'/js/upload.js');
			wp_register_script('creativo_colorpicker', get_bloginfo('template_directory').'/js/colorpicker.js');
	    	wp_enqueue_script('creativo_upload');
			wp_enqueue_script('creativo_colorpicker');
	    	wp_enqueue_script('media-upload');
	    	wp_enqueue_script('thickbox');
	   		wp_enqueue_style('thickbox');
			wp_enqueue_style('creativo_colorpicker', get_bloginfo('template_directory').'/js/colorpicker.css');
		}
	}
	
	public function add_meta_boxes()
	{
		$this->add_meta_box('header', __('Header Options','Creativo'), 'post');		
		$this->add_meta_box('page_title', __('Page Title Section','Creativo'), 'post');	
		$this->add_meta_box('post_options', __('General Options','Creativo'), 'post');		
		$this->add_meta_box('video', __('Video Options','Creativo'), 'post');
		$this->add_meta_box('custom_style', __('Custom Styling','Creativo'), 'post');
		$this->add_meta_box('footer', __('Footer Options','Creativo'), 'post');
		
		$this->add_meta_box('header', __('Header Options','Creativo'), 'page');
		$this->add_meta_box('page_title', __('Page Title Section','Creativo'), 'page');		
		$this->add_meta_box('page_options', __('Page Options','Creativo'), 'page');
		$this->add_meta_box('blog_options', __('Blog Options - these options will affect the Blog Page Templates','Creativo'), 'page');
		$this->add_meta_box('portfolio_options', __('Portfolio Options','Creativo'), 'page');
		$this->add_meta_box('custom_style', __('Custom Styling','Creativo'), 'page');
		$this->add_meta_box('contact_info', __('Contact Us - DEPRECATED, use Theme Options -> Contact Us instead','Creativo'), 'page');	
		$this->add_meta_box('footer', __('Footer Options','Creativo'), 'page');	
		
		$this->add_meta_box('header', __('Header Options','Creativo'), 'creativo_portfolio');
		$this->add_meta_box('page_title', __('Page Title Section','Creativo'), 'creativo_portfolio');
		$this->add_meta_box('general', __('General Options','Creativo'), 'creativo_portfolio');		
		$this->add_meta_box('video', __('Video Options','Creativo'), 'creativo_portfolio');		
		$this->add_meta_box('portfolio_details', __('Portfolio Details','Creativo'), 'creativo_portfolio');
		$this->add_meta_box('custom_style', __('Custom Styling','Creativo'), 'creativo_portfolio');	
		$this->add_meta_box('footer', __('Footer Options','Creativo'), 'creativo_portfolio');		
			
		$this->add_meta_box('clients', __('Client Options','Creativo'), 'clients');
		$this->add_meta_box('testimonials', __('Testimonials Options','Creativo'), 'testimonials');

		if( class_exists( 'WooCommerce' )) {
			$this->add_meta_box('header', __('Header Options','Creativo'), 'product');
			$this->add_meta_box('product_options', __('Product Options','Creativo'), 'product');
			$this->add_meta_box('page_title', __('Page Title Section','Creativo'), 'product');
			$this->add_meta_box('custom_style', __('Custom Styling','Creativo'), 'product');
			$this->add_meta_box('footer', __('Footer Options','Creativo'), 'product');
		}

	}
	
	public function add_meta_box($id, $label, $post_type)
	{
	    add_meta_box( 
	        'pyre_' . $id,
	        $label,
	        array($this, $id),
	        $post_type
	    );
	}
	
	public function save_meta_boxes($post_id)
	{
		if(defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}
		
		foreach($_POST as $key => $value) {
			if(strstr($key, 'pyre_')) {
				update_post_meta($post_id, $key, $value);
			}
		}
	}

	public function post_options()
	{	
		include 'metaboxes/style.php';
		include 'metaboxes/post_options.php';
	}

	public function page_slider()
	{	
		include 'metaboxes/style.php';
		include 'metaboxes/page_slider.php';
	}

	public function page_options()
	{	
		include 'metaboxes/style.php';
		include 'metaboxes/page_options.php';
	}

	public function product_options()
	{	
		include 'metaboxes/style.php';
		include 'metaboxes/product_options.php';
	}
	public function blog_options()
	{	
		include 'metaboxes/style.php';
		include 'metaboxes/blog_options.php';
	}
	public function portfolio_options()
	{	
		include 'metaboxes/style.php';
		include 'metaboxes/portfolio_options.php';
	}
	public function page_title()
	{	
		include 'metaboxes/style.php';
		include 'metaboxes/page_title.php';
	}
	public function header()
	{	
		include 'metaboxes/style.php';
		include 'metaboxes/header.php';
	}
	
	public function header_options()
	{	
		include 'metaboxes/style.php';
		include 'metaboxes/header_options.php';
	}
	
	public function header_options_post()
	{	
		include 'metaboxes/style.php';
		include 'metaboxes/header_options_post.php';
	}
	
	public function footer()
	{	
		include 'metaboxes/style.php';
		include 'metaboxes/footer_options.php';
	}

	public function general()
	{	
		include 'metaboxes/style.php';
		include 'metaboxes/portfolio_general.php';

	}
	public function video()
	{	
		include 'metaboxes/style.php';
		include 'metaboxes/video.php';
	}
	public function portfolio_details()
	{	
		include 'metaboxes/style.php';
		include 'metaboxes/portfolio_details.php';
	}
	public function clients()
	{	
		include 'metaboxes/style.php';
		include 'metaboxes/clients.php';
	}
	public function testimonials()
	{	
		include 'metaboxes/style.php';
		include 'metaboxes/testimonials.php';
	}
	public function custom_style()
	{	
		include 'metaboxes/style.php';
		include 'metaboxes/custom_style.php';
	}	
	
	public function contact_info()
	{	
		include 'metaboxes/style.php';
		include 'metaboxes/contact_info.php';
	}
	
	public function text($id, $label, $desc = '')
	{
		global $post;
		
		$html = '';
		$html .= '<div class="pyre_metabox_field">';
			$html .= '<label for="pyre_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			$html .= '<div class="field">';
				$html .= '<input type="text" id="pyre_' . $id . '" name="pyre_' . $id . '" value="' . get_post_meta($post->ID, 'pyre_' . $id, true) . '" />';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
		$html .= '</div>';
		
		echo $html;
	}
	
	public function select($id, $label, $options, $desc = '')
	{
		global $post;
		
		$html = '';
		$html .= '<div class="pyre_metabox_field">';
			$html .= '<label for="pyre_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			$html .= '<div class="field">';
				$html .= '<select id="pyre_' . $id . '" name="pyre_' . $id . '">';
				foreach($options as $key => $option) {
					if(get_post_meta($post->ID, 'pyre_' . $id, true) == $key) {
						$selected = 'selected="selected"';
					} else {
						$selected = '';
					}
					
					$html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
				}
				$html .= '</select>';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
		$html .= '</div>';
		
		echo $html;
	}

	public function textarea($id, $label, $desc = '')
	{
		global $post;

		$html = '';
		$html = '';
		$html .= '<div class="pyre_metabox_field">';
			$html .= '<label for="pyre_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			$html .= '<div class="field">';
				$html .= '<textarea cols="120" rows="10" id="pyre_' . $id . '" name="pyre_' . $id . '">' . get_post_meta($post->ID, 'pyre_' . $id, true) . '</textarea>';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
		$html .= '</div>';
		
		echo $html;
	}

	public function upload($id, $label, $desc = '')
	{
		global $post;

		$html = '';
		$html = '';
		$html .= '<div class="pyre_metabox_field">';
			$html .= '<label for="pyre_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			$html .= '<div class="field">';
			    $html .= '<input name="pyre_' . $id . '" class="upload_field" id="pyre_' . $id . '" type="text" value="' . get_post_meta($post->ID, 'pyre_' . $id, true) . '" style="width:60%;" />';
			    $html .= '<input class="upload_button" type="button" value="'.__('Browse','Creativo').'" />';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
		$html .= '</div>';
		
		echo $html;
	}
	
	public function colorpicker($id, $label, $desc = '')
	{
		global $post;

		$html = '';
		$html = '';
		$html .= '<div class="pyre_metabox_field">';
			$html .= '<label for="pyre_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			$html .= '<div class="field">';
			    $html .= '<div id="pyre_' . $id . '_picker" class="colorSelector" ><div></div></div>';
			    $html .= '<input type="text" id="pyre_' . $id . '" name="pyre_' . $id . '" value="' . get_post_meta($post->ID, 'pyre_' . $id, true) . '" style="width:80px; margin-left:5px;" />';
				
				//$html .= '<input name="'. $field['id'] .'" id="'. $field['id'] .'" type="text" value="'. $meta .'" />';
				
				?>
                <script type="text/javascript" language="javascript">
            		jQuery(document).ready(function(){
            			//Color Picker
    				    jQuery('#pyre_<?php echo $id; ?>_picker').children('div').css('backgroundColor', '<?php echo get_post_meta($post->ID, 'pyre_' . $id, true); ?>');    
            			jQuery('#pyre_<?php echo $id; ?>_picker').ColorPicker({
            				color: '<?php echo $meta; ?>',
            				onShow: function (colpkr) {
            					jQuery(colpkr).fadeIn(500);
            					return false;
            				},
            				onHide: function (colpkr) {
            					jQuery(colpkr).fadeOut(500);
            					return false;
            				},
            				onChange: function (hsb, hex, rgb) {
            					//jQuery(this).css('border','1px solid red');
            					jQuery('#pyre_<?php echo $id; ?>_picker').children('div').css('backgroundColor', '#' + hex);
            					jQuery('#pyre_<?php echo $id; ?>_picker').next('input').attr('value','#' + hex);
        					}
    				    });
                    });
        		</script>
                <?php
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
		$html .= '</div>';
		
		echo $html;
	}
	
}

$metaboxes = new PyreThemeFrameworkMetaboxes;