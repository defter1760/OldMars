<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>testmail</title>
</head>

<body>
<?php
 $to      = 'ihutchings@initiativelegal.com';
 $subject = 'test subject';
$message = '
<html>
<head>
  <title>Birthday Reminders for August</title>
</head>
<body>
  <p>Here are the birthdays upcoming in August!</p>
  <table>
    <tr>
      <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
    </tr>
    <tr>
      <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';

 $headers = 'From: Ian Hutchings <ihutchings@preferredlegalsupport.com>' . "\r\n" .
     'Reply-To: ihutchings@preferredlegalsupport.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();
$headers .= 'MIME-Version: 1.0' . "\n"; 
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

ini_set ( 'SMTP', 'remote.preferredlegalsupport.com' ); 
ini_set('auth', true);
ini_set('username','ihutchings@preferredlegalsupport.com');
ini_set('password','siec9oanoapoeqiA');
date_default_timezone_set('America/Los_Angeles');
 
mail($to, $subject, $message, $headers);
 ?> 

</body>
</html>