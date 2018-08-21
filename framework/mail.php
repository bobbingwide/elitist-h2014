<?php

if(!$_POST) exit;
 
		$name     = $_POST['name'];
        $email    = $_POST['email'];
		$remit_email    = $_POST['remail'];
        $phone   = $_POST['phone'];
        $subject  = $_POST['subject'];
        $comments = $_POST['comments'];
        $verify   = $_POST['verify'];

        
        
			if(get_magic_quotes_gpc()) {
            	$comments = stripslashes($comments);
            }

         $address = $remit_email;
         $e_subject = 'You\'ve been contacted by ' . $name . '.';
					
		 $e_body = "You have been contacted by $name , their message is:\r\n\n";
		 $e_content = "\"$comments\"\r\n\n";
		 $e_reply = "You can contact $name via email, $email";
					
         $msg = $e_body . $e_content . $e_reply;

         if(mail($address, $e_subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n")) {
		

		 	echo "Email Sent";

		 		 
		 } else {
		 
		 	echo $remit_email;
		 
		 }
	
?>