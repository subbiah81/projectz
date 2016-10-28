<?php
// Check for empty fields
if(empty($_POST['fname'])  		||
   empty($_POST['email']) 		||
   empty($_POST['lname']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$firstname = $_POST['fname'];
$email_address = $_POST['email'];
$lastname = $_POST['lname'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'contactus@cexalert.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Message From: $firstname $lastname";
$email_body = "First Name: $firstname\n\nLast Name: $lastname\n\nEmail: $email_address\n\n$message";
$headers = "From: contactus@cexalert.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>