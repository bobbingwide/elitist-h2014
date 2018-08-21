<?php

function form_f($atts, $content = null) {
		extract(shortcode_atts(array(
		"email" => ''
	), $atts));
	
	require_once(ABSPATH . 'wp-load.php'); 
	
	$template_path = get_template_directory_uri();
		
	
	$output = '
	[RAW]
	<script type="text/javascript" src="'.$template_path.'/js/shortcode-form.js"></script>
	<form action="'.$template_path.'/framework/mail.php" method="post" id="contact-form" class="form-horizontal">
		<fieldset>
			<div class="control-group input i_name">
			      <label class="control-label" for="name">'.__("Name", "eneaa").'</label>
			      <div class="controls">
				      	<div class="input-prepend">
					    <span class="add-on"><i class="icon-user"></i></span><input class="input-xlarge" type="text" name="name" id="name-short" value="" size="22" tabindex="1" />
						</div>
			      </div>
			</div>

			<div class="control-group input i_mail">
			      <label class="control-label" for="email">'.__("Mail", "eneaa").'</label>
			      <div class="controls">
				      	<div class="input-prepend">
					    <span class="add-on"><i class="icon-envelope"></i></span><input class="input-xlarge" type="text" name="email" id="email-short" value="" size="22" tabindex="2"  />
						</div>
			      </div>
			</div>


			<div class="control-group input i_comment">
			      <label class="control-label" for="comment">'.__("Comment", "eneaa").'</label>
			      <div class="controls">
			      		<textarea class="input-xlarge" name="comment" id="comments-short" cols="58" rows="10" tabindex="4"></textarea>
			      </div>
			</div>

			<div class="form-actions">
            	<input class="" name="submit" type="submit" id="submit-form" tabindex="5" value="'.__("Submit Comment", "eneaa").'" />
				<input name="remail" type="hidden" id="remail-short" value="'.$email.'" />
        	</div>

		</fieldset>	
    </form>
		<div class="mesage"></div>
	[/RAW]
	';
		
	return $output;
}
add_shortcode("form", "form_f");



?>