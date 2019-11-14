<?php
if(!isset($_POST['send']))
{
    //This page should not be accessed directly. Need to submit the form.
    echo  "<script>alert('Sorry, you need to fill in the form!');</script>";
    echo "<script type='text/javascript'> document.location = 'contact-support.php'; </script>";
  exit();
}
$email = strip_tags(htmlspecialchars($_POST['email']));
$name = strip_tags(htmlspecialchars($_POST['name']));
$subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

//Validate first
if(empty($email) ||empty($subject) ||empty($name) ||empty($message)) 
{
    echo "<script>alert('Sorry, all fields are required!');</script>";
    exit();
}

if(IsInjected($email))
{
    echo "Bad email value!";
    exit;
}

$email_from = 'support@copyramp.com';//<== update the email address
$email_subject = "$subject";
$email_body = "$subject\n".
    "\n$message \nSent to: " .
    
$to = "support@copyramp.com";//<== update the email address
$headers = "From: $name \r\n";
$headers .= "Reply-To: $email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);       
//done. redirect to thank-you page.
 echo  "<script>alert('Thank you for contacting our support team! We'll get back to you shortly);</script>";
 echo "<script type='text/javascript'> document.location = 'success.php'; </script>";



// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 