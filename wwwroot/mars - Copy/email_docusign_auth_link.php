<?php
$dateNOW = date('Y').'-'.date('m').'-'.date('d');
$timeNOW = date('H').':'.date('i').':'.date('s');
$monthNOW = date('Y').'-'.date('m');
$weekNOW = date('Y').'-'.date('W');
#$link = 'http://sql.initiativelegal.com:35535/3step.php?uniqueid='.$uniqueid;
#$link = 'http://www.yourlawsuit.com/macys/3step/?uniqueid='.$uniqueid;
$link = 'https://macyslawsuit.com/3step/?uniqueid='.$uniqueid;
$message = '
<html>
<head>
</head>
<body>
<table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
	<tbody>
		<tr>
			<td width="20">&nbsp;</td>
			<td>
		  <table border="0" cellspacing="0" cellpadding="14" width="100%">
				<tbody>
					
                    <tr>
						<td bgcolor="#ffffff" style="text-align:center;"><img src="https://DFWMS01.initiativelegal.com/whitelogo.png">
					  </td>
					</tr>
					                   
					<tr>
						<td style="font-family: Arial,Helvetica,sans-serif;  color:#333333; line-height:24px; text-align:center;" bgcolor="#ffffff"><h2><u>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</u></h2></td>
					</tr>
                    <tr>
						<td style="font-family: Arial,Helvetica,sans-serif;  color:#333333; font-size:10px; font-style:italic;" bgcolor="#ffffff"><p>This message is for the intended recipient only. The information contained in this e-mail message is legally privileged and confidential information intended only for the use of the individual or entity named above. If the receiver of this message is not the intended recipient, you are hereby notified that any dissemination, distribution or copying of this email message is strictly prohibited and may violate the legal rights of others. If you have received this message in error, please immediately notify the sender by reply email or telephone and return the message to Initiative Legal Group APC, 1800 Century Park East, Second Floor, Los Angeles, California 90067, (888.792.2293), and delete it from your system.</p></td>
					</tr>
				</tbody>
			</table>
            </td>
		</tr>
        <tr>
		  <td width="20" bgcolor="#ffffff" >&nbsp;</td>
			<td bgcolor="#ffffff"><table width="100%" border="0"  cellpadding="14">
			  <tr>
			    <td style="font-family: Arial,Helvetica,sans-serif; font-size: 14px; line-height:20px; color:#333333" bgcolor="#ffffff" width="100%"><p>Dear '.$FirstName.':</p><p>My name is VJ Chetty. I am an attorney with Initiative Legal Group APC and I have been assigned to your case. Our law firm has received your signed Attorney-Client Agreement for purposes of representing you (and others similarly situated) in a class action. Based on Attorney\'s discretion and sound judgment, Initiative will pursue your claims on an individual basis in arbitration, at Initiative\'s option, should the Court decline to allow the pending case against Macy\'s to proceed as a class action with Initiative as class counsel.</p><p>We are continuing our investigation into the various wage and hour claims against Macy\'s and would like additional information from you. Please provide us with more information about your work experience by <a style="color:#9f111b; font-weight:bold; text-decoration:none;" href="'.$link.'" target="_blank"><font size="4">clicking here</font></a>. You can also visit our website by copying and pasting the web address into your browser: '.$link.'.</p><p>On this website, you will be asked to complete three easy steps: </p><ol><li><p ><strong>Sign an Authorization for Release of Personnel File and Wage Records form.</strong><br />Once you have completed and signed this form, it will allow us to instruct Macy\'s to release your employee records to our law firm, which may be helpful to support the claims against Macy\'s.</p></li><li><p><strong>Fill out an online interview to provide us with details about your work experience at Macy\'s.</strong><br />At the end of the questions, you will be given an opportunity to submit any documents you feel may support your case by uploading them, by requesting a self-addressed stamped envelope, or faxing them.</p></li><li><p><strong>Sign an Affidavit for Waiver of Fees Notice.</strong><br />If you meet a certain gross income level, you\'ll be asked to complete Step 3, which is to sign this Affidavit so that we can ask the American Arbitration Association to waive any filing fees if and when your case were to be filed with AAA. </p></li></ol><p>Again, please provide us with more information about your work experience at Macy\'s by <a style="color:#9f111b; font-weight:bold; text-decoration:none;"href="'.$link.'" target="_blank"><strong><font size="4">clicking here</font></strong></a>. If you would like to provide me with these details over the phone or you have any questions, please don\'t hesitate to call me at 888.792.2293, Monday through Friday.</p><p><br /><br />Sincerely, <br /><br />VJ Chetty<br />Case Attorney </p></td>
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
  $mail->AddAddress($email,$FirstName." ".$LastName);
  $mail->SetFrom('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
  $mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
  $mail->AddBCC("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt - 'Macy\'s Lawsuit");
  $mail->AddCC('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
  $mail->AddReplyTo('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
  $mail->Subject = 'Macy\'s Lawsuit - Attorney/Client Agreement enclosed';
  $mail->MsgHTML($message);
  $mail->Send();
  #echo "</p>\n";
} 
catch (Exception $e) 

{
  echo $e->getMessage(); //Boring error messages from anything else!
}
$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE status set authformsent='Yes',authformsentdate='$dateNOW',authformsentmonth='$monthNOW',authformsentweek='$weekNOW' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
$results = sqlsrv_query($conn,$query);
?>