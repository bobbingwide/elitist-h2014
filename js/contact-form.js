jQuery(document).ready(function($){
	
	$('#quick_contact').submit(function(){
	
		var action = $(this).attr('action');
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var error = 0;
		
		//Validations
		if($("#quick_name").val() == ''){
			$("#quick_name").next().fadeOut(100);
			$(".name-error").fadeIn('slow');
			error = 1;
		}
		if($("#quick_email").val() == ''){
			$("#quick_email").next().fadeOut(100);
			$(".email-error").fadeIn('slow');
			error = 1;
		}else if(!emailReg.test(jQuery.trim($("#email").val()))) {
			$(".email-error").fadeIn('slow');
			error = 1;
		}
		
		if($("#quick_comments").val() == ''){
			$(".comments-error").fadeIn('slow');
			error = 1;
		}
		
		
		//If no errors send email
		if(error == 0){
		
				$('.mesage')
					.after('<div class="sending">Sending...</div>')
					
				
					$.post(action, { 
						name: $('#quick_name').val(),
						email: $('#quick_email').val(),
						remail: $('#quick_remail').val(),
						phone: $('#quick_phone').val(),
						subject: $('#quick_subject').val(),
						comments: $('#quick_comments').val()
					},
						function(data){
							$(".mesage").html(data);
							
							$('.form div.sending').fadeOut('slow',function(){$(this).remove()});
							
							if(data.match('Email Sent') != null) $('#quick_contact').slideUp('slow');
							
						}
					);
		
		}
		
		
		return false; 
	
	});
	
});