<?php
	$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
	if($thumbnail){
	
	$width = 800;
	$height = 415;
?>
<div class="img_post">
	<div class="full_pattern"></div>
	<img src="<?php echo get_template_directory_uri(); ?>/framework/timthumb.php?src=<?php echo $thumbnail[0]; ?>&amp;h=<?php echo $height; ?>&amp;w=<?php echo $width; ?>" alt="Read More"  />
	<div class="clearfix"></div>
</div><!-- /img_post -->

<?php
	}
?>   