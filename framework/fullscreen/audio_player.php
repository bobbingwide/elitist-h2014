<script type="text/javascript">
/* <![CDATA[ */

var $jquery_jplayer_1; //global

jQuery(document).ready(function($) { 
    
    $jquery_jplayer_1 = $("#jquery_jplayer_1");

	$jquery_jplayer_1.show();
	$("#jp_interface_1").show();

 $jquery_jplayer_1.jPlayer({
        ready: function () {
            $(this).jPlayer("setMedia", {
                <?php echo $background_audio_format; ?>: "<?php echo $background_audio; ?>"
            }).jPlayer("play");
        },
        ended: function (event) {
            $(this).jPlayer("play");
        },
        //solution: "flash, html", // Flash with an HTML5 fallback.
        swfPath: "<?php echo get_template_directory_uri(); ?>/js/",
        supplied: "<?php echo $background_audio_format; ?>"
    });
   
});
/* ]]> */
</script>