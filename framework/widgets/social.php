<?php
/*Social ***********/

class social extends WP_Widget {
	
	function social() {
		$widget_ops = array('classname' => 'social', 'description' => 'Add a social widget' );
		$this->WP_Widget('social', 'Social - eneaa', $widget_ops);
	}

	function widget($args, $instance) {
		
			extract($args, EXTR_SKIP);
			
			echo $before_widget;
						
			$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
			$facebook = empty($instance['facebook']) ? '' : apply_filters('widget_facebook', $instance['facebook']);
			$twitter = empty($instance['twitter']) ? '' : apply_filters('widget_twitter', $instance['twitter']);
			$youtube = empty($instance['youtube']) ? '' : apply_filters('widget_youtube', $instance['youtube']);
			$linkedin = empty($instance['linkedin']) ? '' : apply_filters('widget_linkedin', $instance['linkedin']);
			$flickr = empty($instance['flickr']) ? '' : apply_filters('widget_flickr', $instance['flickr']);
			$dribbble = empty($instance['dribbble']) ? '' : apply_filters('widget_dribbble', $instance['dribbble']);
			$grooveshark = empty($instance['grooveshark']) ? '' : apply_filters('widget_grooveshark', $instance['grooveshark']);
			$vimeo = empty($instance['vimeo']) ? '' : apply_filters('widget_vimeo', $instance['vimeo']);
			$deviantart = empty($instance['deviantart']) ? '' : apply_filters('widget_deviantart', $instance['deviantart']);
			$myspace = empty($instance['myspace']) ? '' : apply_filters('widget_myspace', $instance['myspace']);
			$forrst = empty($instance['forrst']) ? '' : apply_filters('widget_forrst', $instance['forrst']);
			$lastfm = empty($instance['lastfm']) ? '' : apply_filters('widget_lastfm', $instance['lastfm']);
			$rss = empty($instance['rss']) ? '' : apply_filters('widget_rss', $instance['rss']);
			$skype = empty($instance['skype']) ? '' : apply_filters('widget_skype', $instance['skype']);
			
			if ( !empty( $title ) ) { echo "<h4>" . $title . "</h4>"; }; ?>
            
			
            <?php if ( !empty( $facebook ) ) { ?>
               
                    <a title="Facebook" href="<?php echo $facebook; ?>" >
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/facebook_32.png"  alt="Facebook" />
                    </a>
            <?php } ?>
            <?php if ( !empty( $twitter ) ) { ?>
               
                    <a title="twitter" href="<?php echo $twitter; ?>" >
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/twitter_32.png"  alt="twitter" />
                    </a>
            <?php } ?>
            <?php if ( !empty( $youtube ) ) { ?>
               
                    <a title="youtube" href="<?php echo $youtube; ?>" >
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/youtube_32.png"  alt="youtube" />
                    </a>
            <?php } ?>
            <?php if ( !empty( $linkedin ) ) { ?>
               
                    <a title="linkedin" href="<?php echo $linkedin; ?>" >
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/linkedin_32.png"  alt="linkedin" />
                    </a>
            <?php } ?>
            <?php if ( !empty( $flickr ) ) { ?>
               
                    <a title="flickr" href="<?php echo $flickr; ?>" >
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/flickr_32.png"  alt="flickr" />
                    </a>
            <?php } ?>
            <?php if ( !empty( $dribbble ) ) { ?>
               
                    <a title="dribbble" href="<?php echo $dribbble; ?>" >
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/dribbble_32.png"  alt="dribbble" />
                    </a>
            <?php } ?>
            <?php if ( !empty( $grooveshark ) ) { ?>
               
                    <a title="grooveshark" href="<?php echo $grooveshark; ?>" >
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/grooveshark_32.png"  alt="grooveshark" />
                    </a>
            <?php } ?>
            <?php if ( !empty( $vimeo ) ) { ?>
               
                    <a title="vimeo" href="<?php echo $vimeo; ?>" >
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/vimeo_32.png"  alt="vimeo" />
                    </a>
            <?php } ?>
            <?php if ( !empty( $deviantart ) ) { ?>
               
                    <a title="deviantart" href="<?php echo $deviantart; ?>" >
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/deviantart_32.png"  alt="deviantart" />
                    </a>
            <?php } ?>
            <?php if ( !empty( $myspace ) ) { ?>
               
                    <a title="myspace" href="<?php echo $myspace; ?>" >
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/myspace_32.png"  alt="myspace" />
                    </a>
            <?php } ?>
            <?php if ( !empty( $forrst ) ) { ?>
               
                    <a title="forrst" href="<?php echo $forrst; ?>" >
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/forrst_32.png"  alt="forrst" />
                    </a>
            <?php } ?>
            <?php if ( !empty( $lastfm ) ) { ?>
               
                    <a title="lastfm" href="<?php echo $lastfm; ?>" >
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/lastfm_32.png"  alt="lastfm" />
                    </a>
            <?php } ?>
            <?php if ( !empty( $rss ) ) { ?>
               
                    <a title="rss" href="<?php echo $rss; ?>" >
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/rss_32.png"  alt="rss" />
                    </a>
            <?php } ?>
            <?php if ( !empty( $skype ) ) { ?>
               
                    <a title="skype" href="<?php echo $skype; ?>" >
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/skype_32.png"  alt="skype" />
                    </a>
            <?php } ?>
			
            <div class="clear"></div>
            
            
            
			<?php 
			echo $after_widget;
		}
		
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['facebook'] = strip_tags($new_instance['facebook']);
			$instance['twitter'] = strip_tags($new_instance['twitter']);
			$instance['youtube'] = strip_tags($new_instance['youtube']);
			$instance['linkedin'] = strip_tags($new_instance['linkedin']);
			$instance['flickr'] = strip_tags($new_instance['flickr']);
			$instance['dribbble'] = strip_tags($new_instance['dribbble']);
			$instance['grooveshark'] = strip_tags($new_instance['grooveshark']);
			$instance['vimeo'] = strip_tags($new_instance['vimeo']);
			$instance['deviantart'] = strip_tags($new_instance['deviantart']);
			$instance['myspace'] = strip_tags($new_instance['myspace']);
			$instance['forrst'] = strip_tags($new_instance['forrst']);
			$instance['lastfm'] = strip_tags($new_instance['lastfm']);
			$instance['rss'] = strip_tags($new_instance['rss']);
			$instance['skype'] = strip_tags($new_instance['skype']);
			return $instance;
		}
		
		
		function form($instance) {
			$rss_default = get_bloginfo('rss2_url');
			$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'facebook' => '', 'twitter' => '', 'youtube' => '', 'linkedin' => '', 'flickr' => '', 'dribbble' => '', 'grooveshark' => '', 'vimeo' => '', 'deviantart' => '', 'myspace' => '', 'forrst' => '', 'lastfm' => '', 'rss' => $rss_default, 'skype' => '') );
			
			
			
			$title = strip_tags($instance['title']);
			$facebook = strip_tags($instance['facebook']);
			$twitter = strip_tags($instance['twitter']);
			$youtube = strip_tags($instance['youtube']);
			$linkedin = strip_tags($instance['linkedin']);
			$flickr = strip_tags($instance['flickr']);
			$dribbble = strip_tags($instance['dribbble']);
			$grooveshark = strip_tags($instance['grooveshark']);
			$vimeo = strip_tags($instance['vimeo']);
			$deviantart = strip_tags($instance['deviantart']);
			$myspace = strip_tags($instance['myspace']);
			$forrst = strip_tags($instance['forrst']);
			$lastfm = strip_tags($instance['lastfm']);
			$rss = strip_tags($instance['rss']);
			$skype = strip_tags($instance['skype']);
			
			?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
            <p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/facebook_32.png"  alt="Facebook" />
                <label for="<?php echo $this->get_field_id('facebook'); ?>" style="padding-bottom:25px;">
                	link: <input id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" />
                </label>
            </p>
            <p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/twitter_32.png"  alt="twitter" />
                <label for="<?php echo $this->get_field_id('twitter'); ?>" style="padding-bottom:25px;">
                	link: <input id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
                </label>
            </p>
            <p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/youtube_32.png"  alt="youtube" />
                <label for="<?php echo $this->get_field_id('youtube'); ?>" style="padding-bottom:25px;">
                	link: <input id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" />
                </label>
            </p>
            <p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/linkedin_32.png"  alt="linkedin" />
                <label for="<?php echo $this->get_field_id('linkedin'); ?>" style="padding-bottom:25px;">
                	link: <input id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" />
                </label>
            </p>
            <p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/flickr_32.png"  alt="flickr" />
                <label for="<?php echo $this->get_field_id('flickr'); ?>" style="padding-bottom:25px;">
                	link: <input id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php echo esc_attr($flickr); ?>" />
                </label>
            </p>
			<p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/dribbble_32.png"  alt="dribbble" />
                <label for="<?php echo $this->get_field_id('dribbble'); ?>" style="padding-bottom:25px;">
                	link: <input id="<?php echo $this->get_field_id('dribbble'); ?>" name="<?php echo $this->get_field_name('dribbble'); ?>" type="text" value="<?php echo esc_attr($dribbble); ?>" />
                </label>
            </p>
            <p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/grooveshark_32.png"  alt="grooveshark" />
                <label for="<?php echo $this->get_field_id('grooveshark'); ?>" style="padding-bottom:25px;">
                	link: <input id="<?php echo $this->get_field_id('grooveshark'); ?>" name="<?php echo $this->get_field_name('grooveshark'); ?>" type="text" value="<?php echo esc_attr($grooveshark); ?>" />
                </label>
            </p>
            <p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/vimeo_32.png"  alt="vimeo" />
                <label for="<?php echo $this->get_field_id('vimeo'); ?>" style="padding-bottom:25px;">
                	link: <input id="<?php echo $this->get_field_id('vimeo'); ?>" name="<?php echo $this->get_field_name('vimeo'); ?>" type="text" value="<?php echo esc_attr($vimeo); ?>" />
                </label>
            </p>
            <p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/deviantart_32.png"  alt="deviantart" />
                <label for="<?php echo $this->get_field_id('deviantart'); ?>" style="padding-bottom:25px;">
                	link: <input id="<?php echo $this->get_field_id('deviantart'); ?>" name="<?php echo $this->get_field_name('deviantart'); ?>" type="text" value="<?php echo esc_attr($deviantart); ?>" />
                </label>
            </p>
            <p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/myspace_32.png"  alt="myspace" />
                <label for="<?php echo $this->get_field_id('myspace'); ?>" style="padding-bottom:25px;">
                	link: <input id="<?php echo $this->get_field_id('myspace'); ?>" name="<?php echo $this->get_field_name('myspace'); ?>" type="text" value="<?php echo esc_attr($myspace); ?>" />
                </label>
            </p>
            <p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/forrst_32.png"  alt="forrst" />
                <label for="<?php echo $this->get_field_id('forrst'); ?>" style="padding-bottom:25px;">
                	link: <input id="<?php echo $this->get_field_id('forrst'); ?>" name="<?php echo $this->get_field_name('forrst'); ?>" type="text" value="<?php echo esc_attr($forrst); ?>" />
                </label>
            </p>
            <p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/lastfm_32.png"  alt="lastfm" />
                <label for="<?php echo $this->get_field_id('lastfm'); ?>" style="padding-bottom:25px;">
                	link: <input id="<?php echo $this->get_field_id('lastfm'); ?>" name="<?php echo $this->get_field_name('lastfm'); ?>" type="text" value="<?php echo esc_attr($lastfm); ?>" />
                </label>
            </p>
            <p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/skype_32.png"  alt="skype" />
                <label for="<?php echo $this->get_field_id('skype'); ?>" style="padding-bottom:25px;">
                	link: <input id="<?php echo $this->get_field_id('skype'); ?>" name="<?php echo $this->get_field_name('skype'); ?>" type="text" value="<?php echo esc_attr($skype); ?>" />
                </label>
            </p>
            <p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/rss_32.png"  alt="rss" />
                <label for="<?php echo $this->get_field_id('rss'); ?>" style="padding-bottom:25px;">
                	RSS: <input id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo esc_attr($rss); ?>" />
                </label>
            </p>
            <p>Don't forget include "http://"</p>
            <p>If any field is empty will be ignored</p>
            
			<?php
		}
}

register_widget('social');
?>