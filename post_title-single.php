<?php
if (has_post_format("link")) { 
    $link = get_post_meta( get_the_ID(), 'mb_post_format_link', true );
  ?>
  <h3><a href="<?php echo $link; ?>" target="_blank" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">[Link] <?php the_title(); ?></a></h3>

<?php } else { ?>

  <h3><?php the_title(); ?></h3>

<?php } ?>