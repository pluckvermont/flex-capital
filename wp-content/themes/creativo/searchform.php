<!--BEGIN #searchform-->
<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
	<div class="search_form_field">		
		<input type="text" name="s" id="s" class="search_widget_field" value="<?php _e('Search here...', 'Creativo') ?>" onfocus="if(this.value=='<?php _e('Search here...', 'Creativo') ?>')this.value='';" onblur="if(this.value=='')this.value='<?php _e('Search here...', 'Creativo') ?>';" />
	</div>
	<div class="search_form_button">
		<input type="submit" class="searchbut" value="&#xf002;">
	</div>
<!--END #searchform-->
</form>