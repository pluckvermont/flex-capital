<div class='pyre_metabox'>
<?php
$this->select(	'skip_first',
				__('Skip first Featured Image', 'Creativo'),
				array('no' => __('No', 'Creativo'), 'yes' => __('Yes', 'Creativo')),
				''
			);
?>

<?php
$this->select(	'featured_image_size',
				__('Featured Image Size', 'Creativo'),
				array('full' => __('Full', 'Creativo'), 'crop' => __('Cropped version', 'Creativo')),
				'Select the size of the Featured Images shown on page. Cropped version option will show images in a: 800x533 px format'
			);
?>

<?php
$this->select(	'show_featured',
				__('Show Featured Images and Videos', 'Creativo'),
				array('yes' => __('Yes', 'Creativo'), 'no' => __('No', 'Creativo')),
				__('Display featured images and videos at the beggining of the post.', 'Creativo')
			);
?>
<?php
$this->select(	'en_sidebar',
				__('Enable Sidebar', 'Creativo'),
				array('yes' => __('Yes', 'Creativo'), 'no' => __('No', 'Creativo')),
				''
			);
?>
<?php
$this->select(	'sidebar_pos',
				__('Sidebar Position', 'Creativo'),
				array('right' => __('Right', 'Creativo'), 'left' => __('Left', 'Creativo')),
				''
			);
?>

<?php
$this->text(	'pt_font_size',
				__('Post Title Font Size', 'Creativo'),
				'Set the Posts Titles font size. E.g: 26 <br>Leave blank to use the option set under Theme Options -> Blog -> Single Post Title font size (px)'
			);
?>
<?php
$this->text(	'pt_line_height',
				__('Post Title Line Height', 'Creativo'),
				'Set the Posts Titles line height. <br>Leave blank to use the option set under Theme Options -> Blog -> Single Post Title line height'
			);
?>
<?php
$this->text(	'pt_font_weight',
				__('Post Title Font Weight', 'Creativo'),
				'Set the Posts Titles font weight. <br>Leave blank to use the option set under Theme Options -> Blog -> Single Post Title font weight'
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
$this->select(	'post_content_columns',
				__('Post Content Columns', 'Creativo'),
				array('default' => __('Default', 'Creativo'), '2' => __('2 Columns', 'Creativo'), '3' => __('3 Columns', 'Creativo') ),
				__('Optionally you can force the Post Content to use a Column Layout - your content will be split into equal columns depending on the selection above.', 'Creativo')
			);
?>

</div>