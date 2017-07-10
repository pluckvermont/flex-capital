<?php 
// Template Name: Contact Us
get_header();

if($data['gmap_template'] == 'new')	{
    get_template_part('functions/template/contact-page-new');
}
else{
    get_template_part('functions/template/contact-page-old');
}

get_footer(); ?>