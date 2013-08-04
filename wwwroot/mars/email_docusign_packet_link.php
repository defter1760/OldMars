<?php
$dateNOW = date('Y').'-'.date('m').'-'.date('d');
$timeNOW = date('H').':'.date('i').':'.date('s');
$monthNOW = date('Y').'-'.date('m');
$weekNOW = date('Y').'-'.date('W');
//$uniqueid = '7ZRVA65382G4PE9MU';    // uncomment for testing purposes only
//require("db.php");   // uncomment for testing purposes only
$link = 'https://macyslawsuit.com/sign-packet/?uniqueid='.$uniqueid;
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
<body style="background: #777;">

<table style="font-family:arial; color:#444;" width="100%">
	<tr>
    	<td>
			<table align="center" style="background:#fff;padding: 10px;" width="600" cellspacing="10">
				<tr>
					<td>
						<table style="font-family:arial; color:#444; background:#eee;" align="center" width="600">
							<tr><td colspan="5">&nbsp;</td></tr>
							<tr>
								<td width="2%">&nbsp;</td>
								<td><img src="https://macyslawsuit.com/wp-content/uploads/2012/04/email_macys_logo.gif" width="200px" height="42px" alt="MacysLawsuit.com" /></td>
								<td>&nbsp;</td>
								<td><img src="https://macyslawsuit.com/wp-content/uploads/2012/04/email_ilg_logo.gif" width="250px" height="31px" alt="Initiative Legal Group, APC" />
								<td width="2%">&nbsp;</td>
							</tr>
							<tr>
								<td width="2%">&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><p style="font-weight:bold; text-align:center;">888.792.2293</p></td>
								<td width="2%">&nbsp;</td>
							</tr>
							<tr><td colspan="5">&nbsp;</td></tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table style="font-size:16px; line-height:25px; font-family:arial;" align="center" bgcolor="#fff" width="600">
							<tr>
								<td width="2%">&nbsp;</td><td width="2%">&nbsp;</td>
								<td>
									<p>Dear '.$FirstName.' '.$LastName.':</p>
									<p>Thank you for taking the time to speak with me regarding your potential wage and hour claims against Macy\'s, Inc. In order to continue our investigation into your potential wage and hour claims against Macy\'s, we would like you to provide us with additional information.</p>
									<p>By clicking the button below, you will be able to access and complete the following documents in order to assist us in pursuing your potential claims against Macy\'s:</p>
									<p></p>
									<ul style="margin:0 0 0 22px; color: #a23;">';
										if ($auth1 == 'Auth1Set')
										{
											$message = $message.'
												<li>
													<h3 style="color:#444; font-size:16px; line-height:20px;padding:8px 0;">Authorization for Settlement Form.<br /><br /></h3>
												</li>
											';
										}
										
										if ($auth2 == 'Auth2Set')
										{
											$message = $message.'
												<li>
													<h3 style="color:#444; font-size:16px; line-height:20px;padding:8px 0;">Authorization for Release of Personnel File and Wage Records Form.<br /><br /></h3>
												</li>
											';
										}
										
										if ($feewaiver == 'FeewaiverSet')
										{
											$message = $message.'
												<li>
													<h3 style="color:#444; font-size:16px; line-height:20px;padding:8px 0;">An Affidavit for Waiver of Fees Notice.</h3>
												</li>
											';
										}
										$message = $message.'
									</ul>
									
									<p style="text-align:center; padding: 10px 0px;">
										<a style="color:#a31c30; text-decoration:none; font-weight:bold; font-size:18px;"href="'.$link.'" target="_blank">
										<img src="https://macyslawsuit.com/wp-content/themes/MacysV3/images/continueProcessBtn.png" width="320px" height="60px" alt="Continue Online Process" />
										</a>.
									</p>
									
									<p>If you have already completed this process, please disregard this email.</p>
									<p>If you would like to receive these documents by mail or if you have any questions, please do not hesitate to call me at <strong>888.792.2293</strong>, Monday through Friday.</p>
									<p>Sincerely,</p>
									<p>'.$assignedattorneyfname.' '.$assignedattorneylname.'<br />Case Attorney</p>
									<p style="text-align:center; text-decoration:underline; color:#888888;font-weight:bold; font-size:12px; font-family:arial, helvetica, sans-serif;">
										<br />CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION<br />
									</p>
								</td>
								<td width="2%">&nbsp;</td><td width="2%">&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table style="font-size:10px; font-style:italic; line-height:13px; font-family: Times New Roman; background:#eee;" align="center" width="600">
							<tr><td colspan="3">&nbsp;</td></tr>
							<tr>
								<td width="2%">&nbsp;</td>
								<td>
									<p>This message is for the intended recipient only.  The information contained in this e-mail message is legally privileged and confidential information intended only for the use of the individual or entity named above.  If the receiver of this message is not the intended recipient, you are hereby notified that any dissemination, distribution or copying of this email message is strictly prohibited and may violate the legal rights of others.  If you have received this message in error, please immediately notify the sender by reply email or telephone and return the message to Initiative Legal Group APC, 1800 Century Park East, Second Floor, Los Angeles, California 90067, (888.792.2293), and delete it from your system.</p><p style="font-size:14px; font-weight:bold;">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>
								</td>
								<td width="2%">&nbsp;</td>
							</tr>
							<tr><td colspan="3">&nbsp;</td></tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

</body>
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