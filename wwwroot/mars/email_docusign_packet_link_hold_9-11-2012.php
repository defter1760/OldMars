<?php
$dateNOW = date('Y').'-'.date('m').'-'.date('d');
$timeNOW = date('H').':'.date('i').':'.date('s');
$monthNOW = date('Y').'-'.date('m');
$weekNOW = date('Y').'-'.date('W');
//$uniqueid = '7ZRVA65382G4PE9MU';    // uncomment for testing purposes only
//require("db.php");   // uncomment for testing purposes only
$link = 'https://macyslawsuit.com/signpacket/?uniqueid='.$uniqueid;
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
								<p>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION </p>
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
									<p>Thank you for taking the time to speak with me regarding your potential wage and hour claims against Macy\'s, Inc. After further investigation and analysis, we may choose to pursue your potential claims against Macy\'s either on an individual basis in arbitration or through the existing proposed class action lawsuit.  Although we make no promises or guarantees as to any specific outcome of your case under either option, this choice would allow us to potentially resolve any claims you and other similar employees may have against Macy\'s either in a class action settlement, in an individual settlement, or as part of a multi-party group settlement.</p>
									<p>Please <a style="color:#a31c30; text-decoration:none; font-weight:bold; font-size:18px;" href="'.$link.'" target="_blank">CLICK HERE</a> to access and complete the following documents in order to assist us in pursuing your potential claims against Macy\'s:</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>';
if ($auth1 == 'Auth1Set')
{
	$message = $message.'	<tr>
					<td>
						<table style="padding: 20px; border-left: 50px solid #a31c30; color:#424242; font-size:16px; line-height:25px; font-family: Arial; color:#424242; background: #f1f1f1;" width="600" cellspacing="0" cellpadding="10">
							<tr>
								<td>
									<h3 style="color:#a31c30;">Authorization for Settlement form:</h3>
									<p>Although Initiative Legal Group does not guarantee or promise any specific outcome for your case, by signing this Authorization form, if and when the time comes, you will allow our law firm to settle and release your potential wage and hour claims against Macy\'s on your behalf for at least $200 total, after the deduction of legal fees or costs.</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
';
}
if ($auth2 == 'Auth2Set')
{
	$message = $message.'		<tr>
					   <td>
							<table style="padding: 20px; border-left: 50px solid #a31c30; color:#424242; font-size:16px; line-height:25px; font-family: Arial; color:#424242; background: #f1f1f1;" width="600" cellspacing="0" cellpadding="10">
							   <tr>
									<td>
										<h3 style="color:#a31c30;">Authorization for Release of Personnel File and Wage Records form:</h3>
										<p>By signing this Authorization form, you will direct Macy\'s to release your employment records to our law firm, which may be helpful to support your claims.</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
	';
}
if ($feewaiver == 'FeewaiverSet')
{
	$message = $message.'	<tr>
					<td>
						<table style="padding: 20px; border-left: 50px solid #a31c30; color:#424242; font-size:16px; line-height:25px; font-family: Arial; color:#424242; background: #f1f1f1;" width="600" cellspacing="0" cellpadding="10">
							<tr>
								<td>
									<h3 style="color:#a31c30;">Sign an Affidavit for Waiver of Fees Notice:</h3>
									<p>Our law firm will advance all costs so there are no out-of-pocket costs you will have to pay. If you meet a certain gross income level, you will be asked to sign an Affidavit so that we can ask the American Arbitration Association to waive any filing fees that our law firm would have to pay if and when your case were to be filed with AAA.</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
';
}
$message = $message.'		<tr>
					<td>
						<table style="font-size:16px; line-height:25px; font-family: Arial; color:#424242; background: #fff;" width="600" cellspacing="0" cellpadding="10">
							<tr>
								<td>
									<p>If you have already completed this process, please disregard this email.</p>
									<p>If you would like to receive these documents by mail or if you have any questions, please do not hesitate to call me at <strong>888.792.2293</strong>, Monday through Friday.</p>
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
	$mail->Subject = 'Macy\'s Lawsuit - Documents enclosed';
	$mail->MsgHTML($message);
	$mail->Send();
  echo "</p>\n";
} 
catch (Exception $e) 

{
  echo $e->getMessage(); //Boring error messages from anything else!
}
## 06/06/12)-> Ian commented this out so we can make this file only for the email of the docusign link
##
##
##		$query = "IF EXISTS (SELECT uniqueid from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE status set feewaiversent='Yes',feewaiversentdate='$dateNOW',feewaiversentmonth='$monthNOW',feewaiversentweek='$weekNOW' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
##		$results = sqlsrv_query($conn,$query);
##
##
## 06/06/12)-> Ian commented this out so we can make this file only for the email of the docusign link
?>