<?php


// get the data from the form and save it as variable in PHP
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$mailheader = "From:".$name."<".$email.">\r\n";

$recipient = "tdm2002dmt@gmail.com";

mail($recipient, $subject, $message, $mailheader) or die("Error!");

echo 'E-MAIL SENT!!!' ;


?>
