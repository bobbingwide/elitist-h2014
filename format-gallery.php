<?php
$images = get_post_meta( get_the_ID(), 'mb_post_format_images', false );
?>
<div class="flex-container">
            	
    	<div class="flexslider">
            <div class="full_pattern"></div>
		  <ul class="slides">
<?php
foreach ( $images as $att )
{
    // Get image's source based on size, can be 'thumbnail', 'medium', 'large', 'full' or registed post thumbnails sizes
    $src = wp_get_attachment_image_src( $att, 'full' );
    $src = $src[0];

    //To show a title in the lightbox you need to edit the image and add an ALT text
    $alt_text = get_post_meta($att, '_wp_attachment_image_alt', true);

    // Show image
    $width = 800;
    $height = 415;  
    ?>
                 	<li>
                 		<a href="<?php echo $src; ?>" rel="prettyPhoto[1]" title="<?php echo $alt_text; ?>">
                 		<img src="<?php echo get_template_directory_uri(); ?>/framework/timthumb.php?src=<?php echo $src; ?>&amp;h=<?php echo $height; ?>&amp;w=<?php echo $width; ?>" alt="<?php the_title(); ?>" class="slider_img"  />
                 		</a>
                 	</li>
    <?php
}
?>
		</ul>
	</div><!-- /flexslider -->
</div><!-- /flex-container -->