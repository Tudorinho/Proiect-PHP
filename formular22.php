<?php

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $subject = $_POST['subject'];
  $mailFrom = $_POST['mail'];
  $message = $_POST['message'];

  $mailTo = "dantudor_02@yahoo.com";
  $headers = "From: " . $mailFrom;
  $txt = "You have received an e-mail from " . $name . " . \n\n" . $message;

  mail($mailTo, $subject, $txt, $headers);
  header("Location: formular.php?mailsend"); 
  // if the e-mail is sent, add "?phpmailsend" to the end of the URL 

}