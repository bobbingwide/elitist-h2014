jQuery(document).ready(function($){
								
								
								
								
		$('#contact-form #name-short').focus(function() {
		  $("#contact-form .i_name").removeClass('error');
		});			
		$('#contact-form #email-short').focus(function() {
		  $("#contact-form .i_mail").removeClass('error');
		});		
		$('#contact-form #comments-short').focus(function() {
		  $("#contact-form .i_comment").removeClass('error');
		});		
								
								
								
			
								
								
	
	$('#contact-form').submit(function(){
	
		var action = $(this).attr('action');
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var error = 0;
		

		//Validations
		if($("#name-short").val() == ''){
			$("#name-short").next().fadeOut(100);
			$("#contact-form .i_name").addClass('error');
			error = 1;
		}
		if($("#email-short").val() == ''){
			$("#email-short").next().fadeOut(100);
			$("#contact-form .i_mail").addClass('error');
			error = 1;
		}else if(!emailReg.test(jQuery.trim($("#email-short").val()))) {
			$("#contact-form .i_mail").addClass('error');
			error = 1;
		}
		
		if($("#comments-short").val() == ''){
			$("#contact-form .i_comment").addClass('error');
			error = 1;
		}
		
		
		//If no errors send email
		if(error == 0){
		
				$('.mesage')
					.after('<div class="sending">Sending...</div>')
					
				
					$.post(action, { 
						name: $('#name-short').val(),
						email: $('#email-short').val(),
						remail: $('#remail-short').val(),
						comments: $('#comments-short').val()
					},
						function(data){
							$(".mesage").html(data);
							
							$('.sending').fadeOut('slow',function(){$(this).remove()});
							if(data.match('Email Sent') != null){
							 	$('#contact-form').slideUp('slow');
							 	$(".mesage").html('<span class="label label-success">Email Sent</span>');
							}
							
						}
					);
		
		}
		
		
		return false; 
	
	});
	
});