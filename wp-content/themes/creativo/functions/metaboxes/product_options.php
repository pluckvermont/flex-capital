<div class="pyre_metabox">

<?php
//Register sidebar options for blog/portfolio/woocommerce category/archive pages
global $wp_registered_sidebars;
$sidebar_options[] = 'Default';

for($i=0;$i<1;$i++){
    $sidebars = $wp_registered_sidebars;// sidebar_generator::get_sidebars();
    //var_dump($sidebars);
    if(is_array($sidebars) && !empty($sidebars)){
        foreach($sidebars as $sidebar){
            $sidebar_options[$sidebar['id']] = $sidebar['name'];
        }
    }    
}

?>

<?php
$this->select(	'en_prod_sidebar',
				__('Enable Sidebar', 'Creativo'),
				array( 'default' => __( 'Default', 'Creativo' ), 'yes' => __('Yes', 'Creativo'), 'no' => __('No', 'Creativo')),
				__('Enable or disable the Sidebar. Leave Default to use the setting under Theme Option -> WooCommerce -> WooCommerce Sidebar on Product Page', 'Creativo')
			);
?>
<?php
$this->select(	'prod_sidebar_select',
				__('Sidebar Select', 'Creativo'),
				$sidebar_options,
				__('Select the sidebar you want to use. Leave Default to use the sidebar selected under Theme Options -> WooCommerce -> Woocommerce Sidebar Select for Product Pages', 'Creativo')
			);
?>
<?php
$this->select(	'sidebar_pos',
				__('Sidebar Position', 'Creativo'),
				array('default' => __( 'Default', 'Creativo' ), 'right' => __('Right', 'Creativo'), 'left' => __('Left', 'Creativo')),
				__('Select the position of the sidebar. Leave Default to use the sidebar position selected under Theme Options', 'Creativo')
			);


?>
</div>