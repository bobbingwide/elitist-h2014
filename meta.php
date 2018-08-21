<div class="metadata">
	<ul>
		<li class="meta_date"><strong><?php _e('Date:', 'eneaa') ?></strong> <time datetime="<?php the_time('c'); ?>" pubdate><?php the_time('F jS, Y'); ?></time></li>
        <li class="meta_author"><strong><?php _e('By:', 'eneaa') ?></strong> <?php the_author() ?></li>
        <li class="meta_category"><strong><?php _e('In:', 'eneaa') ?></strong> <?php the_category(', ') ?></li>
        <li class="meta_comments"><strong><?php _e('With:', 'eneaa') ?></strong> <?php comments_popup_link(__('No Comments', 'eneaa'), __('1 Comment', 'eneaa'), __('% Comments', 'eneaa')); ?></li>
    </ul>
    <div class="clearfix"></div>
</div><!-- /metadata -->
			            	
			            		