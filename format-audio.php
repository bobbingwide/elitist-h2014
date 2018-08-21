<?php
$audio_mp3 = get_post_meta( get_the_ID(), 'mb_post_format_audio_mp3', true );
$audio_ogg = get_post_meta( get_the_ID(), 'mb_post_format_audio_ogg', true );
?>
<div class="default_format audio_wrap inner_shadow_format">
	<div class="clearfix"></div>
<audio class="AudioPlayerV1" preload="none"  data-fallback= "<?php echo get_template_directory_uri(); ?>/js/AudioPlayerV1.swf"> 
    <?php if($audio_mp3){ ?>
    <source type="audio/mpeg" src="<?php echo $audio_mp3; ?>"></source>
    <?php }
    if($audio_ogg){
    ?>
    <source type="audio/ogg" src="<?php echo $audio_ogg; ?>"></source>
    <?php } ?>
</audio>
</div><!-- /audio_wrap -->