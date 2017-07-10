<?php global $data; ?>
<div class="side_logo">		
    <?php
	if($data['logo'] || $data['retina_logo']) {        
    	?>
    	<a href="<?php if($data['en_custom_logo_url'] && !empty($data['custom_logo_url']) ) { echo $data['custom_logo_url']; } else { echo home_url(); } ?>" rel="home" title="<?php bloginfo('name'); ?>">
            <?php
            if($data['logo']) {
            ?>
                <img src="<?php echo $data['logo']; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="original_logo normal_logo <?php echo ($data['mobile_logo'] ? 'desktop_logo' : ''); ?>">                    
            <?php
            } 
            if($data['retina_logo']) {
                ?>
                <img src="<?php echo $data['retina_logo']; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="original_logo retina_logo <?php echo ($data['mobile_logo'] ? 'desktop_logo' : ''); ?>">
                <?php
            }               
            if($data['mobile_logo']) { ?>
                <img src="<?php echo $data['mobile_logo']; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="mobile_logo" >         
            <?php 
            }
            ?> 
    	</a>
    <?php     
    		               
    }
	else {
		?>
        <div class="text_logo">
            <h1 class="text"><a href="<?php if($data['en_custom_logo_url'] && !empty($data['custom_logo_url']) ) { echo $data['custom_logo_url']; } else { echo home_url(); } ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php
            if($data['en_tagline']) {
                ?>
                <div class="tagline"><?php echo get_bloginfo('description') ?></div>
                <?php
            }
            ?>
        </div>
        <?php
	}
	?>            
</div>