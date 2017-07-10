<?php global $data; ?>
<div class="top_contact clearfix">            	                   
	<?php
	if($data['contact_email']) {
	?>
		<div class="contact_email"><a href="mailto:<?php echo $data['contact_email']; ?>"><i class="fa fa-envelope"></i><?php echo $data['contact_email']; ?></a></div>
	<?php
	}
	if($data['contact_phone']) {
	?>
    	<div class="contact_phone"><div><i class="fa fa-phone"></i><span><?php echo $data['contact_phone']; ?></span></div></div>
    <?php
	}
	if($data['contact_address']) {
	?>
    	<div class="contact_address"><div><i class="fa fa-map-marker"></i><span><?php echo $data['contact_address']; ?></span></div></div>
    <?php
	}
	?>                    
</div>
<?php
if($data['en_tap_call']) {
?>
	<div class="tap_to_call">
    	<a href="tel:<?php echo $data['contact_phone']; ?>" class="button button_default large" target="_self"><?php echo $data['tap_call_text'] ?></a>
	</div>
<?php 
}
?>