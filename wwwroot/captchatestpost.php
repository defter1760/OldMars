<?php session_start(); ?>
<!--<head>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/confirmations.css" rel="stylesheet" type="text/css" />
</head>-->

 <?php
print('<pre>');
print_r($_POST);
print('</pre>');


include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
$securimage = new Securimage();

if ($securimage->check($_POST['captcha_code']) == false) {
  // the code was incorrect
  // you should handle the error so that the form processor doesn't continue
  // or you can use the following code if there is no validation or you do not know how
  echo "The security code entered was incorrect.<br /><br />";
  echo "Please go <a href='javascript:history.go(-1)'>back</a> and try again.";
  exit;
}
else
{
 echo "WINNER!";
}


/*  require_once('recaptchalib.php');
  $privatekey = "6LeVHs4SAAAAAByblbL0zRz0b70JPwooyi-G-fxx";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("<FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'></FORM><BR>The reCAPTCHA wasn't entered correctly. Go back and try it again." ."<br>" .
         "(reCAPTCHA said: " . $resp->error . ")");
		 
  } else {
    // Your code here to handle a successful verification
  }*/
  ?>