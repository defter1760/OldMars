<html>
<head>
<title>PHPMailer - SMTP advanced test with authentication</title>
</head>
<body>

<?php

require_once('../class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try {
  $mail->Host       = "mail1.domain.initiativelegal.com"; // SMTP server
  $mail->SMTPDebug  = 3;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
#  $mail->SMTPAuth   = true;                  // enable SMTP authentication
#  $mail->Host       = "exchange.initiativelegal.com"; // sets the SMTP server
  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "macyslawsuit"; // SMTP account username
  $mail->Password   = "PLS1234!";        // SMTP account password
  $mail->AddReplyTo('macyslawsuit@initiativelegal.com', 'Test Lastname');
  $mail->AddAddress('ihutchings@preferredlegalsupport.com', 'Ian Hutchings');
  $mail->SetFrom('macyslawsuit@initiativelegal.com', 'Test Lastname');
  $mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
  $mail->AddReplyTo('macyslawsuit@initiativelegal.com', 'Test Lastname');
  $mail->Subject = 'PHPMailer Test Subject via mail(), advanced';
  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
  $mail->MsgHTML(file_get_contents('contents.html'));
  $mail->AddAttachment('images/phpmailer.gif');      // attachment
  $mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
  $mail->Send();
  echo "Message Sent OK</p>\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
?>

</body>
</html>
