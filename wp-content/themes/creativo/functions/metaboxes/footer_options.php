<div class="pyre_metabox">
<?php
$this->select(	'en_footer',
				__('Enable Footer', 'Creativo'),
				array('yes' => __('Yes', 'Creativo'), 'no' => __('No', 'Creativo')),
				''
			);

$this->select(	'en_widgets',
				__('Enable Footer Widgets', 'Creativo'),
				array('yes' => __('Yes', 'Creativo'), 'no' => __('No', 'Creativo')),
				''
			);
$this->select(	'footer_width',
				__('Footer Width', 'Creativo'),
				array('default' => __('Default', 'Creativo'), 'normal' => __('Normal', 'Creativo'), 'expanded' => __('Expanded', 'Creativo')),
				''
			);
?>
</div>