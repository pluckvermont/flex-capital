<div class="pyre_metabox">
<?php
$this->select(	'show_featured',
				__('Show All Featured Images', 'Creativo'),
				array('yes' => __('Yes', 'Creativo'), 'no' => __('No', 'Creativo')),
				__('Display featured images at the beggining of the page.', 'Creativo')
			);
?>

<?php
$this->select(	'en_sidebar',
				__('Enable Sidebar', 'Creativo'),
				array('yes' => __('Yes', 'Creativo'), 'no' => __('No', 'Creativo')),
				__('Enable or disable the Sidebar.', 'Creativo')
			);
?>
<?php
$this->select(	'sidebar_pos',
				__('Sidebar Position', 'Creativo'),
				array('right' => __('Right', 'Creativo'), 'left' => __('Left', 'Creativo')),
				''
			);
?>
</div>