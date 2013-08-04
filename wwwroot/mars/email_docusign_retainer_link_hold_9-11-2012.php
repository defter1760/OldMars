<?php
$dateNOW = date('Y').'-'.date('m').'-'.date('d');
$timeNOW = date('H').':'.date('i').':'.date('s');
$monthNOW = date('Y').'-'.date('m');
$weekNOW = date('Y').'-'.date('W');
//$uniqueid = '7ZRVA65382G4PE9MU';    // uncomment for testing purposes only
//require("db.php");   // uncomment for testing purposes only
## 6/7/12)->ian changed this link incorrectly said /3step/
$link = 'https://macyslawsuit.com/retainer/?uniqueid='.$uniqueid;
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
	
	
	
//$email = "mrauen@initiativelegal.com";   // uncomment for testing purposes only
//$FirstName = "Melaina";   // uncomment for testing purposes only
//$LastName = "Rauen";   // uncomment for testing purposes only



$message = '
<html>
<head>
</head>
<body>
<table style="padding: 20px 0px; font-family: Arial; color:#424242; background: #888;" align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table style="padding: 10px; font-family: Arial; color:#424242; background: #fff;" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<table style="padding: 20px; font-family: Arial; color:#424242; background: #f1f1f1;" width="600" cellspacing="0" cellpadding="10">
							<tr>
								<td><img src="https://macyslawsuit.com/wp-content/uploads/2012/04/email_macys_logo.gif" width="200px" height="42px" alt="MacysLawsuit.com" /></td>
								<td><img src="https://macyslawsuit.com/wp-content/uploads/2012/04/email_ilg_logo.gif" width="250px" height="31px" alt="Initiative Legal Group, APC" />
							</tr>
							<tr>
								<td>
									<p style="font-weight:bold; text-align:right;">888.792.2293</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table style="font-family: Arial; font-size: 11px;text-align:right; text-decoration:underline; color:#333; background: #fff;" width="600" cellspacing="0" cellpadding="10">
							<tr>
								<td>
								<p>CONFIDENTIAL/WORK PRODUCT PRIVILEGE </p>
								</td>
							</tr>
						</table>

					</td>
				</tr>
				<tr>
					<td>
						<table style="font-size:16px; line-height:25px; font-family: Arial; color:#424242; background: #fff;" width="600" cellspacing="0" cellpadding="10">
							<tr>
								<td>
									<p>Dear '.$FirstName.' '.$LastName.':</p>
									<p>Thank you for taking the time to speak with me regarding your employment at Macy\'s!</p>
									<p>We have received your information and we believe that you may have wage and hour claims against Macy\'s, Inc.</p>
									<p>As you requested, you can retain our law firm by following <strong>three</strong> simple steps:</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
				   <td>
						<table style="padding: 20px 20px 25px; border-left: 50px solid #a31c30; color:#424242; font-size:16px; line-height:25px; font-family: Arial; color:#424242; background: #f1f1f1;" width="600" cellspacing="0" cellpadding="10">
						   <tr>
								<td>
									<h3 style="color:#a31c30;">STEP ONE:</h3>
									<p>To formally retain our law firm, please <a style="color:#a31c30; text-decoration:none; font-weight:bold; font-size:18px;" href="'.$link.'" target="_blank">CLICK HERE</a> to view our Attorney-Client Agreement. Please take your time and carefully review this Agreement. Please note that, by signing this Agreement, you will allow our law firm to settle and release your potential wage and hour claims with Macy\'s for no less than $200 total, after the deduction of legal fees and costs.</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table style="padding: 20px 20px 25px; border-left: 50px solid #a31c30; color:#424242; font-size:16px; line-height:25px; font-family: Arial; color:#424242; background: #f1f1f1;" width="600" cellspacing="0" cellpadding="10">
							<tr>
								<td>
									<h3 style="color:#a31c30;">STEP TWO:</h3>
									<p>After you have completed your review, you will be prompted to electronically initial and sign the Agreement by clicking on the "sign here" tabs.  Detailed instructions will be provided on the document page.</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table style="padding: 20px 20px 25px; border-left: 50px solid #a31c30; color:#424242; font-size:16px; line-height:25px; font-family: Arial; color:#424242; background: #f1f1f1;" width="600" cellspacing="0" cellpadding="10">
							<tr>
								<td>
									<h3 style="color:#a31c30;">STEP THREE:</h3>
									<p>Once you have inserted your initials and signature, you will have the opportunity to review and confirm your signature.  By clicking on &quot;confirm signing&quot; you will submit the Attorney-Client Agreement to our law firm.</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table style="font-size:16px; line-height:25px; font-family: Arial; color:#424242; background: #fff;" width="600" cellspacing="0" cellpadding="10">
							<tr>
								<td>
									<p>If you have any questions, please call me at <strong>888.792.2293</strong>.</p>
									<p>Sincerely,</p>
									<p>'.$assignedattorneyfname.' '.$assignedattorneylname.'<br />Case Attorney</p>
								</td>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table style="font-size:10px; line-height: 13px; font-family: Times New Roman; font-style:italic; color:#424242; background: #fff;" width="600" cellspacing="0" cellpadding="10">
							<tr>
								<td>
									<p>This message is for the intended recipient only.  The information contained in this e-mail message is legally privileged and confidential information intended only for the use of the individual or entity named above. If the receiver of this message is not the intended recipient, you are hereby notified that any dissemination, distribution or copying of this email message is strictly prohibited and may violate the legal rights of others. If you have received this message in error, please immediately notify the sender by reply email or telephone and return the message to Initiative Legal Group APC, 1800 Century Park East, Second Floor, Los Angeles, California 90067, (888.792.2293), and delete it from your system.</p>
									<p style="font-size:14px; font-weight:bold;">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>


</body>
</html>


';


require_once('class.phpmailer.php');
$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try 
{
	$mail->Host       = "mail1.domain.initiativelegal.com";
	$mail->SMTPDebug  = 0;
	$mail->SMTPAuth   = true;
	$mail->Port       = 25;
	$mail->Username   = $attorneyusername;
	$mail->Password   = $attorneypassword;
	$mail->AddAddress($email, $FirstName. " ".$LastName);
	$mail->SetFrom($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
	$mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
	$mail->AddBCC("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt - 'Macy\'s Lawsuit");
	$mail->AddCC($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
	$mail->AddReplyTo($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
	$mail->AddReplyTo('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
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

$query = "IF EXISTS (SELECT uniqueid from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE status set retainerSent='Docusign',retainerSentDate='$date',retainerSentMonth='$month',retainerSentWeek='$week' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
$results = sqlsrv_query($conn,$query);

//$query = "select notelog from status WHERE uniqueid='$uniqueid'";
//  $currentlog = sqlsrv_query($conn,$query);
//  while($row = sqlsrv_fetch_array($currentlog))
//  {
//    $newlog =   $date . ' @ ' . $time . ': <strong>Emailed docusign Attorney-Client Agreement link</strong><br>' . $row['notelog'];
//  }		
//  $query = "UPDATE status set notelog='$newlog' WHERE uniqueid='$uniqueid'";
//  $results = sqlsrv_query($conn,$query);
?>