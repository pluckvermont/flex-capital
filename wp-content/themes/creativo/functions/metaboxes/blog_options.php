<div class="pyre_metabox">

<?php
$this->text(	'posts_count',
				__('Posts Count', 'Creativo'),
				'Enter an integer number for how many posts to display per page. Leave blank to use the default setting set under Theme Options -> Blog -> Posts Count'
			);
?>
<?php
$this->select(	'force_full_width',
				__('Force 100% Width', 'Creativo'),
				array('no' => __('No', 'Creativo'), 'yes' => __('Yes', 'Creativo')),
				__('Select Yes to force the page width to be 100%. Only works when the Blog Style Grid and Blog Style Masonry template is being used.', 'Creativo')
			);
?>
<?php
$this->select(	'grid_cols',
				__('Grid Columns', 'Creativo'),
				array('2' => __('2 Columns', 'Creativo'), '3' => __('3 Columns', 'Creativo'), '4' => __('4 Columns', 'Creativo'), '5' => __('5 Columns', 'Creativo')),
				__('Select the number of Grid Columns to use. Only works when the Blog Style Grid and Blog Style Masonry template is being used.', 'Creativo')
			);
?>

<?php
$terms = get_categories( 'hide_empty=1');
$terms_array[0] = __('All categories', 'Creativo');
if($terms) {
	foreach ($terms as $term) {
		$terms_array[$term->term_id] = $term -> name;
	}
	$this->select(	'posts_category',
		__('Posts Category', 'Creativo'),
		$terms_array,
		__('Choose the category you want to display posts from.', 'Creativo')
	);
}
?>

<?php
$this->text(	'pt_font_size',
				__('Post Title Font Size', 'Creativo'),
				'Set the Posts Titles font size. E.g: 26 <br>Leave blank to use the option set under Theme Options -> Blog -> Archives Post Title font size (px)'
			);
?>
<?php
$this->text(	'pt_line_height',
				__('Post Title Line Height', 'Creativo'),
				'Set the Posts Titles line height. <br>Leave blank to use the option set under Theme Options -> Blog -> Archives Post Title line height'
			);
?>
<?php
$this->text(	'pt_font_weight',
				__('Post Title Font Weight', 'Creativo'),
				'Set the Posts Titles font weight. <br>Leave blank to use the option set under Theme Options -> Blog -> Archives Post Title font weight'
			);
?>

<?php
$this->select(	'post_elements_align',
				__('Post Title and Meta Align', 'Creativo'),
				array('default' => __('Default', 'Creativo'), 'left' => __('Left', 'Creativo'), 'center' => __('Center', 'Creativo') ),
				__('Select the alignment of the Post elements. Leave Default to inherit the option set under Theme Options -> Blog -> Post Title and Meta Align', 'Creativo')
			);
?>

<?php
$this->select(	'post_title_meta_pos',
				__('Post Title and Meta Positioning', 'Creativo'),
				array('default' => __('Default', 'Creativo'), 'above' => __('Above Featured Images', 'Creativo'), 'below' => __('Below Featured Images', 'Creativo') ),
				__('Select the Post Title and Meta positioning. Leave Default to inherit the setting set under Appearance -> Theme Options -> Blog -> Post Title and Meta Positioning', 'Creativo')
			);
?>

<?php
$this->select(	'small_image_position',
				__('Small Images Position', 'Creativo'),
				array('default' => __('Default', 'Creativo'), 'left' => __('Left', 'Creativo'), 'right' => __('Right', 'Creativo') ),
				__('Select the position of the Small Images. This option will only work if the Blog Style Small Images page template is selected', 'Creativo')
			);
?>

<?php
$this->select(	'show_first_post_big_layout',
				__('Make 1st Post Full Width', 'Creativo'),
				array('no' => __('No', 'Creativo'), 'yes' => __('Yes', 'Creativo') ),
				__('Enable this option to force only the First Post to be displayed in Full Width layout. This option will work for: Small Images and Grid Images page templates.', 'Creativo')
			);
?>

<?php
$this->text(	'featured_pt_font_size',
				__('1st Post Title Font Size', 'Creativo'),
				'Set the 1st Post Title font size. E.g: 26 <br>Leave blank to use the option set under Theme Options -> Blog -> Archives Post Title font size (px)'
			);
?>
<?php
$this->text(	'featured_pt_line_height',
				__('1st Post Title Line Height', 'Creativo'),
				'Set the 1st Post Title line height. <br>Leave blank to use the option set under Theme Options -> Blog -> Archives Post Title line height'
			);
?>
<?php
$this->text(	'featured_pt_font_weight',
				__('1st Post Title Font Weight', 'Creativo'),
				'Set the 1st Post Titl font weight. <br>Leave blank to use the option set under Theme Options -> Blog -> Archives Post Title font weight'
			);
?>

<?php
$this->select(	'featured_post_elements',
				__('1st Post Elements Align', 'Creativo'),
				array('left' => __('Left', 'Creativo'), 'center' => __('Center', 'Creativo') ),
				__('Select the alignment of the 1st Post elements', 'Creativo')
			);
?>

<?php
$this->select(	'featured_post_title_meta_pos',
				__('1st Post Title and Meta Positioning', 'Creativo'),
				array('default' => __('Default', 'Creativo'), 'above' => __('Above Featured Images', 'Creativo'), 'below' => __('Below Featured Images', 'Creativo') ),
				__('Select the 1st Post Title and Meta positioning. Leave Default to inherit the setting set under Appearance -> Theme Options -> Blog -> Post Title and Meta Style', 'Creativo')
			);
?>

</div>