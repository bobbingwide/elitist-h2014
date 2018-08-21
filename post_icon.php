<div class="post_icon">
  <?php
  if (has_post_format("gallery")) { ?>
  <i class="icon-picture"></i>
  <?php } elseif (has_post_format("link")) { ?>
  <i class="icon-link"></i>
  <?php } elseif (has_post_format("quote")) { ?>
  <i class="quote-icon">“</i>
  <?php } elseif (has_post_format("audio")) { ?>
  <i class="icon-headphones"></i>
  <?php } elseif (has_post_format("video")) { ?>
  <i class="icon-facetime-video"></i>
  <?php } else { ?>
  <i class="icon-pencil"></i>
  <?php } ?>
</div><!-- /title_icon -->