<?php
 $quote_p = get_post_meta( get_the_ID(), 'mb_post_format_quote', true );
  $quote_p_cite = get_post_meta( get_the_ID(), 'mb_post_format_quote_cite', true );
?>
<div class="quote_wrap inner_shadow_format">
	  
  	<div class="quote_content">
    <blockquote>
      <p><?php echo htmlentities($quote_p); ?></p>
      <small><cite><?php echo htmlentities($quote_p_cite); ?></cite></small>
    </blockquote>
	</div><!-- /quote_content -->
</div><!-- /audio_wrap -->