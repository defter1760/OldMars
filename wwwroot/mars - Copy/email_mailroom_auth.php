<?php
$dateNOW = date('Y').'-'.date('m').'-'.date('d');
$timeNOW = date('H').':'.date('i').':'.date('s');
$monthNOW = date('Y').'-'.date('m');
$weekNOW = date('Y').'-'.date('W');
$message = '
<html>
<head>
</head>
<body>
<table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
	<tbody>
        <tr>
		  <td width="20" bgcolor="#ffffff" >&nbsp;</td>
			<td bgcolor="#ffffff"><table width="100%" border="0"  cellpadding="14">
			  <tr>
			    <td style="font-family: Arial,Helvetica,sans-serif; font-size: 14px; line-height:20px; color:#333333" bgcolor="#ffffff" width="100%"><p>Dear '.$mailroomname.':</p>
				<p>Please mail out the attached authorization packet today. <br /><br />
				Mailing address:<br />
				'.$FirstName.' '.$LastName.'
				<br />
				'.$Street1.', '.$Street2.'<br />
				'.$City.', '.$State.' '.$Zipcode.'<br />
				<br />
				Uniqueid: '.$uniqueid.'
				<br />
<br />


Reply-All once this is complete.</p></td>
		      </tr>
		    </table></td>
		</tr>
		
		<tr>
			
</table>
</body>
</html>


';
require_once('class.phpmailer.php');
$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try {
  $mail->Host       = "mail1.domain.initiativelegal.com"; // SMTP server
  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "macyslawsuit"; // SMTP account username
  $mail->Password   = "PLS1234!";        // SMTP account password
  $mail->AddReplyTo('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
  $mail->AddAddress($mailroom,$mailroomname);
  $mail->SetFrom('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
  $mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
  $mail->AddBCC("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt - 'Macy\'s Lawsuit");
  $mail->AddCC($RecipientEmail2,$RecipientName2);
  $mail->AddReplyTo('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
  $mail->Subject = 'Need to mail authorization packet! - '.$LastName.', '.$FirstName.' - '.$uniqueid;
  $mail->AddAttachment($attachment);      // attachment
  #$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
  $mail->MsgHTML($message);
  $mail->Send();
  
  #echo "</p>\n";
} 
catch (Exception $e) 

{
  echo $e->getMessage(); //Boring error messages from anything else!
}
$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$uniqueid') UPDATE status set authtomailroom='Yes',authtomailroomdate='$date' WHERE status.uniqueid='$uniqueid'";

		$results = sqlsrv_query($conn,$query);
?>

