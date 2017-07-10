<?php
add_action('widgets_init', 'about_me_widget');

function about_me_widget()
{
	register_widget('about_me_widget_cr');
}

class about_me_widget_cr extends WP_Widget {
	
	function __construct()
	{
		$widget_ops = array('classname' => 'about_me_widget', 'description' => __('Create a simple About Me widget', 'Creativo'));

		$control_ops = array('id_base' => 'about_me-widget');
		
		parent::__construct( 'about_me-widget', __('About Me', 'Creativo'), $widget_ops, $control_ops );
		//$this->WP_Widget('contact_info-widget', __('Contact us widget', 'Creativo'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		}
		?>
        <div class="about_me_widget">
        	
        	<?php
        	if( $instance['img_path'] !='' ) {

        		$img_shape = $instance['img_shape'];
        		$img_render = '<img src="'. esc_url( $instance['img_path'] ) . '" class="about_' . $img_shape . '">';
        		$link = $instance['img_link'];
        		$target = $instance['target'];

        		$output = $link != '' ? '<a href="' . esc_url( $link ) . '" target="' . $target . '">' . $img_render . '</a>' : $img_render;
        	?>
        		<div class="about_me_img">
        			<?php echo $output; ?>
        		</div>
        	<?php } 

        	if( $instance['heading_text'] !='' ) {
        	?>        	
	        	<div class="about_me_heading">
	        		<?php echo $instance['heading_text'] ?>
	        	</div>
        	<?php } 

        	if( $instance['description'] !='' ) {
        	?>
	        	<div class="about_me_description">
	        		<?php echo $instance['description']; ?>
	        	</div>        	
            <?php } 
            ?>
        	
        </div>
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
		$instance['img_path'] = $new_instance['img_path'];
		$instance['img_shape'] = $new_instance['img_shape'];
		$instance['img_link'] = $new_instance['img_link'];
		$instance['target'] = $new_instance['target'];
		$instance['heading_text'] = $new_instance['heading_text'];
		$instance['description'] = $new_instance['description'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'About me');
		$instance = wp_parse_args((array) $instance, $defaults); 
		$target = $instance['target'];
		$img_shape = $instance['img_shape'];
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'Creativo');?></label>
			<input class="widefat" type="text"  id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('img_path'); ?>"><?php _e('Image path URL:', 'Creativo');?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('img_path'); ?>" name="<?php echo $this->get_field_name('img_path'); ?>" value="<?php echo $instance['img_path']; ?>" />
			<span><?php _e('You can find the Image path URL by going to Media Library and clicking on the image you want to use. In the new window, grab the image path from the URL field.', 'Creativo') ?></span>
		</p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'img_shape' ) ); ?>"><?php esc_html_e( 'Image Shape', 'Creativo' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'img_shape' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'img_shape' ) ); ?>" class="widefat">
				<option value="square" <?php selected( 'square', $img_shape ) ?>><?php esc_html_e( 'Square' ); ?></option>
				<option value="rounded" <?php selected( 'rounded', $img_shape ) ?>><?php esc_html_e( 'Rounded', 'Creativo' ); ?></option>	
				<option value="circle" <?php selected( 'circle', $img_shape ) ?>><?php esc_html_e( 'Circle', 'Creativo' ); ?></option>			
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('img_link'); ?>"><?php _e('Image Link', 'Creativo');?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('img_link'); ?>" name="<?php echo $this->get_field_name('img_link'); ?>" value="<?php echo $instance['img_link']; ?>" />
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>"><?php esc_html_e( 'Open link in', 'Creativo' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'target' ) ); ?>" class="widefat">
				<option value="_self" <?php selected( '_self', $target ) ?>><?php esc_html_e( 'Current window (_self)', 'Creativo' ); ?></option>
				<option value="_blank" <?php selected( '_blank', $target ) ?>><?php esc_html_e( 'New window (_blank)', 'Creativo' ); ?></option>				
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('heading_text'); ?>"><?php _e('Heading Text:', 'Creativo');?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('heading_text'); ?>" name="<?php echo $this->get_field_name('heading_text'); ?>" value="<?php echo $instance['heading_text']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description:', 'Creativo');?></label>
			<textarea class="widefat" rows="6" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" ><?php echo $instance['description']; ?></textarea>			
		</p>		
		
	<?php
	}
}
?>