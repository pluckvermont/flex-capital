<?php 

class cr_custom_menu {

    /*--------------------------------------------*
     * Constructor
     *--------------------------------------------*/

    /**
     * Initializes the plugin by setting localization, filters, and administration functions.
     */
    function __construct() {

        
        // add custom menu fields to menu
        add_filter( 'wp_setup_nav_menu_item', array( $this, 'cr_add_custom_nav_fields' ) );

        // save menu custom fields
        add_action( 'wp_update_nav_menu_item', array( $this, 'cr_update_custom_nav_fields'), 10, 3 );
        
        // edit menu walker
        add_filter( 'wp_edit_nav_menu_walker', array( $this, 'cr_edit_walker'), 10, 2 );

    } // end constructor
    

    /**
     * Add custom fields to $item nav object
     * in order to be used in custom Walker
     *
     * @access      public
     * @since       1.0 
     * @return      void
    */
    function cr_add_custom_nav_fields( $menu_item ) {
    
        $menu_item->menu_icon = get_post_meta( $menu_item->ID, '_menu_item_menu_icon', true );
		$menu_item->menu_btn_classes = get_post_meta( $menu_item->ID, '_menu_item_menu_btn_classes', true );
        $menu_item->megamenu = get_post_meta( $menu_item->ID, '_menu_item_megamenu', true );
        $menu_item->megamenu_background = get_post_meta( $menu_item->ID, '_menu_item_megamenu_background', true );
        $menu_item->megamenu_widgetarea = get_post_meta( $menu_item->ID, '_menu_item_megamenu_widgetarea', true );
        $menu_item->megamenu_styles = get_post_meta( $menu_item->ID, '_menu_item_megamenu_styles', true );
        return $menu_item;
        
    }
    
    /**
     * Save menu custom fields
     *
     * @access      public
     * @since       1.0 
     * @return      void
    */
    function cr_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
    
        // Check if element is properly sent

        if (!empty($_REQUEST['menu-item-menu_icon']) && is_array( $_REQUEST['menu-item-menu_icon']) ) {
            $menu_icon_value = $_REQUEST['menu-item-menu_icon'][$menu_item_db_id];
            update_post_meta( $menu_item_db_id, '_menu_item_menu_icon', $menu_icon_value );
        }
		if (!empty($_REQUEST['menu-item-menu_btn_classes']) && is_array( $_REQUEST['menu-item-menu_btn_classes']) ) {
            $menu_btn_classes_value = $_REQUEST['menu-item-menu_btn_classes'][$menu_item_db_id];
            update_post_meta( $menu_item_db_id, '_menu_item_menu_btn_classes', $menu_btn_classes_value );
        }

        if (!isset($_REQUEST['edit-menu-item-megamenu'][$menu_item_db_id])) {
            $_REQUEST['edit-menu-item-megamenu'][$menu_item_db_id] = '';
            
        }
        $menu_mega_enabled_value = $_REQUEST['edit-menu-item-megamenu'][$menu_item_db_id];        
        update_post_meta( $menu_item_db_id, '_menu_item_megamenu', $menu_mega_enabled_value );


        if (!isset($_REQUEST['menu-item-megamenu-background'][$menu_item_db_id])) {
        $_REQUEST['menu-item-megamenu-background'][$menu_item_db_id] = '';
            
        }
        $mega_menu_background_value = $_REQUEST['menu-item-megamenu-background'][$menu_item_db_id];        
        update_post_meta( $menu_item_db_id, '_menu_item_megamenu_background', $mega_menu_background_value );


        if (!isset($_REQUEST['menu-item-megamenu-widgetarea'][$menu_item_db_id])) {
        $_REQUEST['menu-item-megamenu-widgetarea'][$menu_item_db_id] = '';
            
        }
        $mega_menu_widgetarea_value = $_REQUEST['menu-item-megamenu-widgetarea'][$menu_item_db_id];        
        update_post_meta( $menu_item_db_id, '_menu_item_megamenu_widgetarea', $mega_menu_widgetarea_value );


        if (!isset($_REQUEST['menu-item-megamenu-styles'][$menu_item_db_id])) {
        $_REQUEST['menu-item-megamenu-styles'][$menu_item_db_id] = '';
            
        }
        $mega_menu_styles_value = $_REQUEST['menu-item-megamenu-styles'][$menu_item_db_id];        
        update_post_meta( $menu_item_db_id, '_menu_item_megamenu_styles', $mega_menu_styles_value );




    }
    
    /**
     * Define new Walker edit
     *
     * @access      public
     * @since       1.0 
     * @return      void
    */
    function cr_edit_walker($walker,$menu_id) {
    
        return 'Walker_Nav_Menu_Edit_Custom'; 
    }
}

// instantiate plugin's class
$GLOBALS['cr_custom_menu'] = new cr_custom_menu();








/**
 *  /!\ This is a copy of Walker_Nav_Menu_Edit class in core
 * 
 * Create HTML list of nav menu input items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */
class Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {
        /**
         * @see Walker::$tree_type
         * @var string
         */
        var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
    
        /**
         * @see Walker::$db_fields
         * @todo Decouple this.
         * @var array
         */
        var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
    

        /**
         * @see Walker_Nav_Menu::start_lvl()
         * @since 3.0.0
         *
         * @param string $output Passed by reference.
         */
        function start_lvl(&$output, $depth = 0, $args = array()) {  
        }
        
        /**
         * @see Walker_Nav_Menu::end_lvl()
         * @since 3.0.0
         *
         * @param string $output Passed by reference.
         */
        function end_lvl(&$output, $depth = 0, $args = array()) {
        }
    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param object $args
     */
    function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
        global $_wp_nav_menu_max_depth,
                $wp_registered_sidebars;
       
        $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;
    
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    
        ob_start();
        $item_id = esc_attr( $item->ID );
        $removed_args = array(
            'action',
            'customlink-tab',
            'edit-menu-item',
            'menu-item',
            'page-tab',
            '_wpnonce',
        );


    
        $original_title = '';
        if ( 'taxonomy' == $item->type ) {
            $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
            if ( is_wp_error( $original_title ) )
                $original_title = false;
        } elseif ( 'post_type' == $item->type ) {
            $original_object = get_post( $item->object_id );
            $original_title = $original_object->post_title;
        }
    
        $classes = array(
            'menu-item menu-item-depth-' . $depth,
            'menu-item-' . esc_attr( $item->object ),
            'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
        );
    
        $title = $item->title;
    
        if ( ! empty( $item->_invalid ) ) {
            $classes[] = 'menu-item-invalid';
            /* translators: %s: title of menu item which is invalid */
            $title = sprintf( __( '%s (Invalid)', "Creativo"), $item->title );
        } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
            $classes[] = 'pending';
            /* translators: %s: title of menu item in draft status */
            $title = sprintf( __('%s (Pending)', "Creativo"), $item->title );
        }
    
        $title = empty( $item->label ) ? $title : $item->label;
       
        ?>
        <li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>">
            <dl class="menu-item-bar">
                <dt class="menu-item-handle">
                    <span class="item-title"><?php echo esc_html( $title ); ?></span>
                    <span class="item-controls">
                        <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
                        <span class="item-order hide-if-js">
                            <a href="<?php
                                echo wp_nonce_url(
                                    add_query_arg(
                                        array(
                                            'action' => 'move-up-menu-item',
                                            'menu-item' => $item_id,
                                        ),
                                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                    ),
                                    'move-menu_item'
                                );
                            ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', "Creativo"); ?>">&#8593;</abbr></a>
                            |
                            <a href="<?php
                                echo wp_nonce_url(
                                    add_query_arg(
                                        array(
                                            'action' => 'move-down-menu-item',
                                            'menu-item' => $item_id,
                                        ),
                                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                    ),
                                    'move-menu_item'
                                );
                            ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down',"Creativo"); ?>">&#8595;</abbr></a>
                        </span>
                        <a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php esc_attr_e('Edit Menu Item', "Creativo"); ?>" href="<?php
                            echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
                        ?>"><?php _e( 'Edit Menu Item', "Creativo"); ?></a>
                    </span>
                </dt>
            </dl>
    
            <div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
                <?php if( 'custom' == $item->type ) : ?>
                    <p class="field-url description description-wide">
                        <label for="edit-menu-item-url-<?php echo $item_id; ?>">
                            <?php _e( 'URL', "Creativo" ); ?><br />
                            <input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
                        </label>
                    </p>
                <?php endif; ?>
                <p class="description description-thin">
                    <label for="edit-menu-item-title-<?php echo $item_id; ?>">
                        <?php _e( 'Navigation Label', "Creativo" ); ?><br />
                        <input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
                    </label>
                </p>
                <p class="description description-thin">
                    <label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
                        <?php _e( 'Title Attribute', "Creativo" ); ?><br />
                        <input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
                    </label>
                </p>
                <p class="field-link-target description">
                    <label for="edit-menu-item-target-<?php echo $item_id; ?>">
                        <input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked( $item->target, '_blank' ); ?> />
                        <?php _e( 'Open link in a new window/tab', "Creativo" ); ?>
                    </label>
                </p>
                <p class="field-css-classes description description-thin">
                    <label for="edit-menu-item-classes-<?php echo $item_id; ?>">
                        <?php _e( 'CSS Classes (optional)', "Creativo" ); ?><br />
                        <input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
                    </label>
                </p>                
                <p class="field-xfn description description-thin">
                    <label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
                        <?php _e( 'Link Relationship (XFN)', "Creativo"  ); ?><br />
                        <input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
                    </label>
                </p>
                <p class="field-description description description-wide">
                    <label for="edit-menu-item-description-<?php echo $item_id; ?>">
                        <?php _e( 'Description', "Creativo" ); ?><br />
                        <textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
                        <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.', "Creativo"); ?></span>
                    </label>
                </p>


                <p class="description description-wide">
                <label for="edit-menu-item-target-<?php echo $item_id; ?>">
                        <strong><?php _e( 'Menu Item Icon', "Creativo" ); ?></strong><br />
                        <input class="widefat" type="text" id="edit-menu-item-menu-icon-<?php echo $item_id; ?>" name="menu-item-menu_icon[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_icon ); ?>" />  
                        <!-- 
                        <span class="description"><?php _e("<a target='_blank' href='".admin_url( 'tools.php?page=icon-library')."'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "Creativo"); ?></span> -->
                </label>
                </p>
                
                <p class="description description-wide">
                <label for="edit-menu-item-target-<?php echo $item_id; ?>">
                        <strong><?php _e( 'CSS Button Classes ', "Creativo" ); ?></strong><br />
                        <input class="widefat" type="text" id="edit-menu-item-menu-btn_classes-<?php echo $item_id; ?>" name="menu-item-menu_btn_classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_btn_classes ); ?>" />                        
                </label>
                </p>

                <p class="field-megamenu-checkbox">
                    <?php 

                        $value = get_post_meta( $item->ID, '_menu_item_megamenu', true);
                        if($value != "") $value = "checked='checked'";

                    ?>
                    <label for="edit-menu-item-megamenu-<?php echo $item_id; ?>">
                        <input type="checkbox" value="enabled" class="edit-menu-item-cr-megamenu-check" id="edit-menu-item-megamenu-<?php echo $item_id; ?>" name="edit-menu-item-megamenu[<?php echo $item_id; ?>]" <?php echo $value; ?> />
                        <strong><em><?php _e( 'Make this Item Mega Menu?', "Creativo" ); ?></em></strong>
                    </label>
                </p>

                 <p class="field-megamenu-widgets description description-wide">
                    <label for="edit-menu-item-megamenu-widgetarea-<?php echo $item_id; ?>">
                        <?php _e( 'Mega Menu Widget Area', 'Creativo' ); ?>
                        <select id="edit-menu-item-megamenu-widgetarea-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-widgetarea" name="menu-item-megamenu-widgetarea[<?php echo $item_id; ?>]">
                            <option value="0"><?php _e( 'Select Widget Area', 'Creativo' ); ?></option>
                            <?php
                            if( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ):
                            foreach( $wp_registered_sidebars as $sidebar ):
                            ?>
                            <option value="<?php echo $sidebar['id']; ?>" <?php selected( $item->megamenu_widgetarea, $sidebar['id'] ); ?>><?php echo $sidebar['name']; ?></option>
                            <?php endforeach; endif; ?>
                        </select>
                    </label>
                </p>

                <a href="#" id="cr-media-upload-<?php echo $item_id; ?>" class="cr-open-media button button-primary cr-megamenu-upload-background"><?php _e( 'Set Background Image', 'Creativo' ); ?></a>
                <p class="field-megamenu-background description description-wide">
                    <label for="edit-menu-item-megamenu-background-<?php echo $item_id; ?>">
                        <input type="hidden" id="edit-menu-item-megamenu-background-<?php echo $item_id; ?>" class="cr-new-media-image widefat code edit-menu-item-megamenu-background" name="menu-item-megamenu-background[<?php echo $item_id; ?>]" value="<?php echo $item->megamenu_background; ?>" />
                        <img src="<?php echo $item->megamenu_background; ?>" id="cr-media-img-<?php echo $item_id; ?>" class="cr-megamenu-background-image" style="<?php echo ( trim( $item->megamenu_background ) ) ? 'display: inline;' : '';?>" />
                        <a href="#" id="cr-media-remove-<?php echo $item_id; ?>" class="remove-cr-megamenu-background" style="<?php echo ( trim( $item->megamenu_background ) ) ? 'display: inline;' : '';?>">Remove Image</a>
                    </label>
                </p>

                <p class="field-megamenu-styles description description-wide">
                    <label for="edit-menu-item-megamenu-styles-<?php echo $item_id; ?>">
                        <?php _e( 'Mega Menu Container Styles', "Creativo" ); ?><br />
                        <textarea id="edit-menu-item-megamenu-styles-<?php echo $item_id; ?>" class="widefat edit-menu-item-megamenu-styles" rows="3" cols="20" name="menu-item-megamenu-styles[<?php echo $item_id; ?>]"><?php echo esc_html( $item->megamenu_styles ); // textarea_escaped ?></textarea>
                        <span class="description"><?php _e('This option will allow you add custom styles (background position, background repeat,..) to your mega menu main container.', "Creativo"); ?></span>
                    </label>
                </p>

           		<p class="field-move hide-if-no-js description description-wide">
						<label>
							<span><?php _e( 'Move' ); ?></span>
							<a href="#" class="menus-move-up"><?php _e( 'Up one' ); ?></a>
							<a href="#" class="menus-move-down"><?php _e( 'Down one' ); ?></a>
							<a href="#" class="menus-move-left"></a>
							<a href="#" class="menus-move-right"></a>
							<a href="#" class="menus-move-top"><?php _e( 'To the top' ); ?></a>
						</label>
					</p>

                <div class="menu-item-actions description-wide submitbox">
                    <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
                        <p class="link-to-original">
                            <?php printf( __('Original: %s', "Creativo"), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
                        </p>
                    <?php endif; ?>
                    <a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
                    echo wp_nonce_url(
                        add_query_arg(
                            array(
                                'action' => 'delete-menu-item',
                                'menu-item' => $item_id,
                            ),
                            remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                        ),
                        'delete-menu_item_' . $item_id
                    ); ?>"><?php _e('Remove', "Creativo" ); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) ) );
                        ?>#menu-item-settings-<?php echo $item_id; ?>"><?php _e('Cancel', "Creativo"); ?></a>
                </div>
    
                <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
                <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
                <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
                <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
                <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
                <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
            </div><!-- .menu-item-settings-->
            <ul class="menu-item-transport"></ul>
        <?php
        
        $output .= ob_get_clean();

        }
}




/**
 * Custom Walker
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
class cr_walker extends Walker_Nav_Menu {
    /**
         * @var int $columns 
         */
        var $columns = 0;
        var $max_columns = 0;
        var $rows = 1;
        var $rowsCounter = array();
        var $mega_active = 0;
		
		function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output) {
			global $data;
			$id_field = $this->db_fields['id'];
			if (!empty($children_elements[$element->$id_field]) && $element->menu_item_parent == 0) {
				if($element->title != '-') {
					if($data['header_position']=='left') {
						$element->title =  $element->title . '<span class="sf-sub-indicator"><i class="fa fa-angle-right"></i></span>'; 
					}
					elseif($data['header_position']=='right') {
						$element->title =  $element->title . '<span class="sf-sub-indicator"><i class="fa fa-angle-left"></i></span>';
					}
					else{
						$element->title =  $element->title . '<span class="sf-sub-indicator"><i class="fa fa-angle-down"></i></span>'; 
					}
				}
			}
			
			if (!empty($children_elements[$element->$id_field]) && $element->menu_item_parent != 0) { 
				if($data['header_position']=='right') {
					$element->title =  $element->title . '<span class="sf-sub-indicator"><i class="fa fa-angle-left"></i></span>'; 
				}
				else {
					$element->title =  $element->title . '<span class="sf-sub-indicator"><i class="fa fa-angle-right"></i></span>'; 
				}
			}
	
			parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
		}
    
    	    
        /**
         * @see Walker::start_lvl()
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param int $depth Depth of page. Used for padding.
         */
        function start_lvl(&$output, $depth = 0, $args = array()) {
            $indent = str_repeat("\t", $depth);

            $style = '';
            
            if($depth === 0 && $this->active_megamenu) 
            {
                
                $style .= !empty($this->megamenu_background) ? ('Background-image:url('.$this->megamenu_background.');') : '';
                $style .= !empty($this->megamenu_styles) ? $this->megamenu_styles : '';
            }

            $output .= "\n$indent<ul style=\"$style\" class=\"sub-menu {locate_class}\">\n";

            

        }
    
        /**
         * @see Walker::end_lvl()
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param int $depth Depth of page. Used for padding.
         */
        function end_lvl(&$output, $depth = 0, $args = array()) {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul>\n";
            
            if($depth === 0) 
            {
                if($this->active_megamenu)
                {

                    $output = str_replace("{locate_class}", "mega_col_".$this->max_columns."", $output);
                    
                    foreach($this->rowsCounter as $row => $columns)
                    {
                        $output = str_replace("{current_row_".$row."}", "mega_col_".$columns, $output);
                    }
                    
                    $this->columns = 0;
                    $this->max_columns = 0;
                    $this->rowsCounter = array();
                    
                }
                else
                {
                    $output = str_replace("{locate_class}", "", $output);
                }
            }
        }    

        function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
            global $wp_query;
			           
            $item_output = $li_text_block_class = $column_class = "";

            $this->megamenu_widgetarea = get_post_meta( $item->ID, '_menu_item_megamenu_widgetarea', true);
            $this->megamenu_background = get_post_meta( $item->ID, '_menu_item_megamenu_background', true );
            $this->megamenu_styles = get_post_meta( $item->ID, '_menu_item_megamenu_styles', true );
            

            if($depth === 0)
            {   
                $this->active_megamenu = get_post_meta( $item->ID, '_menu_item_megamenu', true);

                if($this->active_megamenu) {
                    $column_class .= " has-mega-menu";
                } else {
                    $column_class .= " no-mega-menu";
                }

            }


            
            
            if($depth === 1 && $this->active_megamenu)
            {
                $this->columns ++;
                

                $this->rowsCounter[$this->rows] = $this->columns;
                
                if($this->max_columns < $this->columns) $this->max_columns = $this->columns; 

                $column_class  = ' {current_row_'.$this->rows.'}';
                
                if($this->columns == 1)
                {
                    $column_class  .= " mk_mega_first";
                }

                if($this->megamenu_widgetarea == false) {
                
					$title = apply_filters( 'the_title', $item->title, $item->ID );
	
					if($title != "-" && $title != '"-"')
					{
						$menu_icon_tag  = ! empty( $item->menu_icon ) ? '<i class="'.esc_attr( $item->menu_icon ).'"></i>' : '';
						$attributes = ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : ''; 
						$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
						$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';   
						$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';  
					
						$item_output .= $args->before;
						$item_output .= '<div class="megamenu-title"'. $attributes .'>';
						$item_output .= '<a class="menu-item-link animsition-link" '. $attributes .'>';
						$item_output .= $menu_icon_tag;
						$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
						$item_output .= '</a>';
						$item_output .= '</div>';
						$item_output .= $args->after;
					}				

                } else {
                     if( is_active_sidebar( $this->megamenu_widgetarea )) {
                        $item_output .= '<div class="megamenu-widgets-container">';
                        ob_start();
                            dynamic_sidebar( $this->megamenu_widgetarea );

                        $item_output .= ob_get_clean() . '</div>';
                    }
					
                }
               

               
            } else {

                if($depth === 2 && $this->megamenu_widgetarea && $this->active_megamenu) {

					if( is_active_sidebar( $this->megamenu_widgetarea ) ) {
						$item_output .= '<div class="megamenu-widgets-container">';
						ob_start();
							dynamic_sidebar( $this->megamenu_widgetarea );
	
						$item_output .= ob_get_clean() . '</div>';
					}
            	} else {

					$menu_icon_tag  = ! empty( $item->menu_icon ) ? '<i class="'.esc_attr( $item->menu_icon ).'"></i>' : '';
					$menu_btn_classes  = ! empty( $item->menu_btn_classes ) ? esc_attr( $item->menu_btn_classes ) : '';
					$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
					$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
					$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
					$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : ''; 
					$attributes .= ! empty( $item->btn_classes )        ? ' href="'   . esc_attr( $item->btn_classes        ) .'"' : '';           
				
					$item_output .= $args->before;
					$item_output .= '<a class="menu-item-link '.$menu_btn_classes.'" '. $attributes .'>';
					$item_output .= $menu_icon_tag;
					$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
					$item_output .= '</a>';
					$item_output .= $args->after;
                }
            }
            
            
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
            $class_names = $value = '';
    
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
            $class_names = ' class="'.$li_text_block_class. esc_attr( $class_names ) . $column_class.'"';
    
            $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
            
            
            
            
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
}

