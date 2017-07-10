<?php global $data;
if($data['en_social_icons']) { 
	$tooltip_footer = $data['social_icons_tooltip'] ? 'ntip' : '';						
?>
	<div class="top_social clearfix">
		<?php if($data['twitter']) { ?><a href="<?php echo $data['twitter']; ?>" class="twitter <?php echo $tooltip_footer; ?>" original-title="Twitter"  title="<?php _e('Follow on Twitter', 'Creativo');?>" target="_blank" rel="nofollow"><i class="fa fa-twitter"></i></a> <?php } ?>
		<?php if($data['facebook']) { ?><a href="<?php echo $data['facebook']; ?>" class="facebook <?php echo $tooltip_footer; ?>" original-title="Facebook"  title="<?php _e("Follow on Facebook", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i></a><?php } ?>
		<?php if($data['instagram']) { ?><a href="<?php echo $data['instagram']; ?>" class="instagram <?php echo $tooltip_footer; ?>" original-title="Instagram" title="<?php _e("Follow on Instagram", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-instagram"></i></a><?php } ?>
		<?php if($data['google']) { ?><a href="<?php echo $data['google']; ?>" class="google <?php echo $tooltip_footer; ?>" original-title="Google+" title="<?php _e("Follow on Google+", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-google-plus"></i></a><?php } ?>
		<?php if($data['linkedin']) { ?><a href="<?php echo $data['linkedin']; ?>" class="linkedin <?php echo $tooltip_footer; ?>" original-title="LinkedIn" title="<?php _e("Follow on LinkedIn", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-linkedin"></i></a><?php } ?>
		<?php if($data['pinterest']) { ?><a href="<?php echo $data['pinterest']; ?>" class="pinterest <?php echo $tooltip_footer; ?>" original-title="Pinterest" title="<?php _e("Follow on Pinterest", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-pinterest"></i></a><?php } ?>
		<?php if($data['flickr']) { ?><a href="<?php echo $data['flickr']; ?>" class="flickr <?php echo $tooltip_footer; ?>" original-title="Flickr" title="<?php _e("Follow on Flickr", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-flickr"></i></a><?php } ?>
		<?php if($data['tumblr']) { ?><a href="<?php echo $data['tumblr']; ?>" class="tumblr <?php echo $tooltip_footer; ?>" original-title="Tumblr" title="<?php _e("Follow on Tumblr", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-tumblr"></i></a><?php } ?>
		<?php if($data['youtube']) { ?><a href="<?php echo $data['youtube']; ?>" class="youtube <?php echo $tooltip_footer; ?>" original-title="Youtube" title="<?php _e("Follow on YouTube", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-youtube-play"></i></a><?php } ?>
		<?php if($data['behance']) { ?><a href="<?php echo $data['behance']; ?>" class="behance <?php echo $tooltip_footer; ?>" original-title="Behance" title="<?php _e("Follow on Behance", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-behance"></i></a><?php } ?>
		<?php if($data['dribbble']) { ?><a href="<?php echo $data['dribbble']; ?>" class="dribbble <?php echo $tooltip_footer; ?>" original-title="Dribbble" title="<?php _e("Follow on Dribbble", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-dribbble"></i></a><?php } ?>
		<?php if($data['vimeo']) { ?><a href="<?php echo $data['vimeo']; ?>" class="vimeo <?php echo $tooltip_footer; ?>" original-title="Vimeo" title="<?php _e("Follow on Vimeo", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-vimeo-square"></i></a><?php } ?>
		<?php if($data['stumbleupon']) { ?><a href="<?php echo $data['stumbleupon']; ?>" class="stumbleupon <?php echo $tooltip_footer; ?>" original-title="Stumbleupon" title="<?php _e("Follow on Vimeo", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-stumbleupon"></i></a><?php } ?>
		<?php if($data['xing']) { ?><a href="<?php echo $data['xing']; ?>" class="xing <?php echo $tooltip_footer; ?>" original-title="Xing" title="<?php _e("Follow on Xing", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-xing"></i></a><?php } ?>
		<?php if($data['soundcloud']) { ?><a href="<?php echo $data['soundcloud']; ?>" class="soundcloud <?php echo $tooltip_footer; ?>" original-title="Soundcloud" title="<?php _e("Follow on SoundCloud", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-soundcloud"></i></a><?php } ?>
		<?php if($data['yelp']) { ?><a href="<?php echo $data['yelp']; ?>" class="yelp <?php echo $tooltip_footer; ?>" original-title="Yelp" title="<?php _e("Follow on Yelp", "Creativo"); ?>" target="_blank" rel="nofollow"><i class="fa fa-yelp"></i></a><?php } ?>
 		<?php if($data['rss']) { ?><a href="<?php echo $data['rss']; ?>" class="rss <?php echo $tooltip_footer; ?>" original-title="Facebook" title="<?php _e("Rss", "Creativo"); ?>" target="_blank"><i class="fa fa-rss"></i></a><?php } ?>
	</div>
<?php 
}
?>
