<?php
define("EMAIL", "<a class="linkification-ext" href="mailto:youremail@yourdomain.com" title="Linkification: mailto:youremail@yourdomain.com">youremail@yourdomain.com</a>");
 
if(isset($_POST['submit'])) {
   
  include('validate.class.php');
   
  //assign post data to variables
  $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
 
  //start validating our form
  $v = new validate();
  $v->validateStr($name, "name", 3, 75);
  $v->validateEmail($email, "email");
  $v->validateStr($message, "message", 5, 1000); 
 
  if(!$v->hasErrors()) {
        $header = "From: $email\n" . "Reply-To: $email\n";
        $subject = "Contact Form Subject";
        $email_to = EMAIL;
         
        $emailMessage = "Name: " . $name . "\n";   
        $emailMessage .= "Email: " . $email . "\n\n";
        $emailMessage .= $message;
         
    //use php's mail function to send the email
        @mail($email_to, $subject ,$emailMessage ,$header ); 
         
    //grab the current url, append ?sent=yes to it and then redirect to that url
        $url = "http". ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        header('Location: '.$url."?sent=yes");
 
    } else {
    //set the number of errors message
    $message_text = $v->errorNumMessage();      
 
    //store the errors list in a variable
    $errors = $v->displayErrors();
     
    //get the individual error messages
    $nameErr = $v->getError("name");
    $emailErr = $v->getError("email");
    $messageErr = $v->getError("message");
  }//end error check
}// end isset
?>