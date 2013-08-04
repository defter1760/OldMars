<?php
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');

//////$message = '
//////<html>
//////<head>
//////</head>
//////<body>
//////<table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
//////	<tbody>
//////        <tr>
//////		  <td width="20" bgcolor="#ffffff" >&nbsp;</td>
//////			<td bgcolor="#ffffff"><table width="100%" border="0"  cellpadding="14">
//////			  <tr>
//////			    <td style="font-family: Arial,Helvetica,sans-serif; font-size: 14px; line-height:20px; color:#333333" bgcolor="#ffffff" width="100%"><p>Dear '.$mailroomname.':</p>
//////				<p>Please mail out the attached Attorney-Client Agreement packet today. <br /><br />
//////				Mailing address:<br />
//////				'.$FirstName.' '.$LastName.'
//////				<br />
//////				'.$Street1.', '.$Street2.'<br />
//////				'.$City.', '.$State.' '.$Zipcode.'<br />
//////				<br />
//////				Uniqueid: '.$uniqueid.'
//////				<br />
//////<br />
//////
//////MARS: <a href="http://sqlsrv.domain.initiativelegal.com/mars/index.php?uniqueid='.$uniqueid.'">CLICK HERE</a>
//////
//////<br>
//////
//////Reply-All and mark this as sent in MARS once complete.</p><br><br>CC:<br> Case attorney: '.$RecipientName2.' Case manager: '.$RecipientName3.'</td>
//////		      </tr>
//////		    </table></td>
//////		</tr>
//////		
//////		<tr>
//////			
//////</table>
//////</body>
//////</html>
//////
//////
//////';
//////require_once('class.phpmailer.php');
//////$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
//////
//////$mail->IsSMTP(); // telling the class to use SMTP
//////
//////try {
//////  $mail->Host       = "mail1.domain.initiativelegal.com"; // SMTP server
//////  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
//////  $mail->SMTPAuth   = true;                  // enable SMTP authentication
//////  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
//////  $mail->Username   = "macyslawsuit"; // SMTP account username
//////  $mail->Password   = "PLS1234!";        // SMTP account password
//////#  $mail->AddReplyTo('Lawsuittest@initiativelegal.com', 'Macy\'s Lawsuit');
//////  $mail->AddAddress($mailroom,$mailroomname);
//////  $mail->SetFrom('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
//////  $mail->AddReplyTo($RecipientEmail2, $RecipientName2);
//////  $mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
//////  $mail->AddBCC("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt - 'Macy\'s Lawsuit");
//////  $mail->AddCC($RecipientEmail2,$RecipientName2);
//////  if (isset($RecipientEmail3))
//////  {
//////	$mail->AddCC($RecipientEmail3,$RecipientName3);
//////  }
//////  $mail->AddReplyTo('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
//////  $mail->Subject = 'ACTION REQUIRED: Need to mail Attorney-Client Agreement packet! - '.$LastName.', '.$FirstName.' - '.$uniqueid;
//////  $mail->AddAttachment($attachment);      // attachment
//////  if (isset($attachment2))
//////  {
//////	$mail->AddAttachment($attachment2);      // attachment
//////  }
//////  $mail->MsgHTML($message);
//////  $mail->Send();
//////  
//////  #echo "</p>\n";
//////} 
//////catch (Exception $e) 
//////
//////{
//////  echo $e->getMessage(); //Boring error messages from anything else!
//////}
$query = "IF EXISTS (SELECT uniqueid from status WHERE status.uniqueid='$uniqueid') UPDATE status set retainertomailroom='Yes',retainertomailroomdate='$date' WHERE status.uniqueid='$uniqueid'";


$results = sqlsrv_query($conn,$query);
?>