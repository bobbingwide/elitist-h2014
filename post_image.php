<?php
	$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
	if($thumbnail){
	
	$width = 800;
	$height = 415;	
?>
<div class="img_post">
	<div class="full_pattern"></div>
	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="post_img">
	<img src="<?php echo get_template_directory_uri(); ?>/framework/timthumb.php?src=<?php echo $thumbnail[0]; ?>&amp;h=<?php echo $height; ?>&amp;w=<?php echo $width; ?>" alt="<?php the_title(); ?>" />
	<div class="clearfix"></div>
	</a>
</div><!-- /img_post -->

<?php
	}
?>  