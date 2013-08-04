<?php
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$query = "select attorneyfname,attorneylname,attorneyemail,username,password from tbl_attorneyassign where attorneylname=(select agentlname from status where uniqueid='$uniqueid');";
$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$assignedattorneylname = $row['attorneylname']; if (empty($assignedattorneylname)) unset($assignedattorneylname);
		$assignedattorneyfname = $row['attorneyfname']; if (empty($assignedattorneyfname)) unset($assignedattorneyfname);
		$assignedattorneyemail = $row['attorneyemail']; if (empty($assignedattorneyemail)) unset($assignedattorneyemail);
		$attorneyusername = $row['username']; if (empty($attorneyusername)) $attorneyusername = 'macyslawsuit';
		$attorneypassword = $row['password']; if (empty($attorneypassword)) $attorneypassword = 'PLS1234!';
		
	}
	

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
						<td bgcolor="#ffffff" style="text-align:center;"><img src="https://DFWMS01.initiativelegal.com/whitelogo.png"><img width="1px" height="1px" src="https://DFWMS01.initiativelegal.com/emailhit.php?uniqueid='.$uniqueid.'&isemail=manuallyemailedretainer">
					  </td>
					</tr>
					                   
					<tr>
						<td style="font-family: Arial,Helvetica,sans-serif;  color:#333333; line-height:24px; text-align:center;" bgcolor="#ffffff"><h2><u>CONFIDENTIAL/WORK PRODUCT PRIVILEGE</u></h2></td>
					</tr>
				</tbody>
			</table>
            </td>
		</tr>
        <tr>
		  <td width="20" bgcolor="#ffffff" >&nbsp;</td>
			<td bgcolor="#ffffff"><table width="100%" border="0"  cellpadding="14">
			  <tr>
			    <td style="font-family: Arial,Helvetica,sans-serif; font-size: 14px; line-height:20px; color:#333333" bgcolor="#ffffff" width="100%"><p>Dear '.$FirstName.':</p><p>Thank you for completing the online questionnaire. We have reviewed your responses and we believe that you may have wage and hour claims against Macy\'s, Inc. To pursue those claims and protect your rights, you may choose to retain an attorney. Although you may hire any attorney you deem fit, you may choose to retain Initiative Legal Group APC to represent you in your potential claims against Macy\'s.</p><p>To formally retain our law firm, please <a style="color:#9f111b; font-weight:bold; text-decoration:none;" href="'.$link.'" target="_blank"><font size="4">click here</font></a> to view our Attorney-Client Agreement. Please take your time when reviewing this document. After you have completed your review, you will be prompted to electronically initial and sign the Agreement by clicking on the "sign here" tabs. You may choose to use your computer\'s mouse to draw your electronic signature on the Agreement. When drawing your electronic signature, don\'t worry if the electronic version does not look exactly like your real signature. All that is required is that you input an original mark that you created on the Agreement.</p><p>Once you have inputted your initials and signature, you will be asked to confirm your signing of the Agreement. By clicking on "confirm", you will submit the Attorney-Client Agreement to our law firm.</p><p>If you have any questions, please call us at 888.792.2293.</p><br><br>Sincerely,<br><br><p>'.$assignedattorneyfname.' '.$assignedattorneylname.'<br />Case Attorney</p><br><p style="font-style:italic; font-size:12px; line-height:18px;">This message is for the intended recipient only. The information contained in this e-mail message is legally privileged and confidential information intended only for the use of the individual or entity named above. If the receiver of this message is not the intended recipient, you are hereby notified that any dissemination, distribution or copying of this email message is strictly prohibited and may violate the legal rights of others. If you have received this message in error, please immediately notify the sender by reply email or telephone and return the message to Initiative Legal Group APC, 1800 Century Park East, Second Floor, Los Angeles, California 90067, (888.792.2293), and delete it from your system.</p></td>
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
  $mail->Host       = "mail1.domain.initiativelegal.com";
  $mail->SMTPDebug  = 0;
  $mail->SMTPAuth   = true;
  $mail->Port       = 25;
  $mail->Username   = $attorneyusername;
  $mail->Password   = $attorneypassword;
  $mail->AddReplyTo($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
  $mail->AddAddress($email, $FirstName. " ".$LastName);
  $mail->SetFrom($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
  $mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
  $mail->AddBCC("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt - 'Macy\'s Lawsuit");
  $mail->AddCC($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
  $mail->AddReplyTo($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
   $mail->Subject = 'Macy\'s Lawsuit - Attorney/Client Agreement enclosed';
#$mail->Subject = "$FirstName "."$LastName, ".'Thank you for signing the Attorney-Client agreement!';
  $mail->MsgHTML($message);
  $mail->Send();
  echo "</p>\n";
	} 


catch (Exception $e) 

{
  echo $e->getMessage(); //Boring error messages from anything else!
}
$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE status set retainerSent='Docusign',retainerSentDate='$date',retainerSentMonth='$month',retainerSentWeek='$week' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
$results = sqlsrv_query($conn,$query);

//$query = "select notelog from status WHERE uniqueid='$uniqueid'";
//  $currentlog = sqlsrv_query($conn,$query);
//  while($row = sqlsrv_fetch_array($currentlog))
//  {
//    $newlog =   $date . ' @ ' . $time . ': <strong>Emailed docusign retainer link</strong><br>' . $row['notelog'];
//  }		
//  $query = "UPDATE status set notelog='$newlog' WHERE uniqueid='$uniqueid'";
//  $results = sqlsrv_query($conn,$query);
?>