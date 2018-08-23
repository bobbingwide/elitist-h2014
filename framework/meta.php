<div class="metadata">
	<ul>
        <li class="date"><time datetime="<?php the_time('c'); ?>" pubdate><?php the_time('F jS, Y'); ?></time></li>
        <li class="author"><?php the_author() ?></li>
        <li class="category"><?php the_category(', ') ?></li>
        <li class="comments"><?php comments_popup_link(__('No Comments', 'eneaa'), __('1 Comment', 'eneaa'), __('% Comments', 'eneaa')); ?></li>
    </ul>
    <div class="clear"></div>
</div><!-- /metadata -->