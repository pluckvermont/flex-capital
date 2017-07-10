<div class="pyre_metabox">
<?php
$this->select(	'portfolio_style',
				__('Portfolio Style', 'Creativo'),
				array('3d' => __('3D', 'Creativo'), 'flat' => __('Flat', 'Creativo')),
				__('Select the style of the Portfolio page', 'Creativo')
			);
?>

<?php
$types = get_terms('portfolio_category', 'hide_empty=0');
$types_array[0] = __('All categories', 'Creativo');
if($types) {
	foreach($types as $type) {
		$types_array[$type->term_id] = $type->name;
	}
	$this->select(	'portfolio_category',
		__('Portfolio Category', 'Creativo'),
		$types_array,
		__('Choose what portfolio category you want to display on this page.', 'Creativo')
	);
}
?>

</div>