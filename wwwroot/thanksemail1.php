<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>THANK YOU!</title>
</head>

<?php 
$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");

$conn = sqlsrv_connect( $serverName, $connectionInfo );
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');

if (empty($tenantid)) $tenantid = '4';

if (isset($_POST['uniqueid'])) $uniqueid = $_POST['uniqueid'];
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];

if (isset($_POST['statuslevel'])) $statuslevel = $_POST['statuslevel'];
if (isset($_REQUEST['statuslevel'])) $statuslevel = $_REQUEST['statuslevel'];


$query = "SELECT authformreceived,retainerRecieved,feewaiverreceived,completedlongformonline,FirstName,LastName,email,brandid,brand FROM Status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid'";
$results = sqlsrv_query($conn,$query);

	while($row = sqlsrv_fetch_array($results))
	{
		$authformreceived = $row['authformreceived']; if (empty($authformreceived)) unset($authformreceived);
		$retainerRecieved = $row['retainerRecieved']; if (empty($retainerRecieved)) unset($retainerRecieved);
		$feewaiverreceived = $row['feewaiverreceived']; if (empty($feewaiverreceived)) unset($feewaiverreceived);
		$completedlongformonline = $row['completedlongformonline']; if (empty($completedlongformonline)) unset($completedlongformonline);
		$FirstName = $row['FirstName']; if (empty($FirstName)) unset($FirstName);
		$LastName = $row['LastName']; if (empty($LastName)) unset($LastName);
		$brandname = $row['brand']; if (empty($brandname)) unset($brandname);
		$email = $row['email']; if (empty($email)) unset($email);
		$brandid = $row['brandid']; if (empty($brandid)) unset($brandid);
		$brand = $row['brand']; if (empty($brand)) unset($brand);
	}

echo '<script type="text/javascript">';
	echo 'function reloadPage()';
	echo '{';
		echo 'window.top.location.replace("https://macyslawsuit.com/afterretainer/?uniqueid='.$uniqueid.'");';
	echo '}';
echo '</script>';
?>

</html>

<?php
////////////////////////////////////////////////////////////////////////////////
/////email/////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
?>

<?php
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
	
$link = 'https://macyslawsuit.com/authorization/?uniqueid='.$uniqueid;

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
									<p>Dear '.$FirstName.' '.$LastName.':</p><p>My name is '.$assignedattorneyfname.' '.$assignedattorneylname.'. I am an attorney with Initiative Legal Group and I have been assigned to your case. Thank you for retaining our law firm for your potential wage and hour claims against Macy\'s.</p>
									<p>In order to continue our investigation into your potential wage and hour claims against Macy\'s, we would like you to provide us with additional information.</p>
									<p>By clicking the button below, you will be provided with an explanation of each of the following forms and how to complete them:</p>
									<p></p>
									<ul style="margin:0 0 0 22px; color: #a23;">
										<li>
											<h3 style="color:#444; font-size:16px; line-height:20px;padding:8px 0;">Two Authorization Forms.<br /><br /></h3>
										</li>
										<li>
											<h3 style="color:#444; font-size:16px; line-height:20px;padding:8px 0;">An online Interview to provide us with specific details about your potential wage and hour claims against Macy\'s.<br /><br /></h3>
										</li>
										<li>
											<h3 style="color:#444; font-size:16px; line-height:20px;padding:8px 0;">An Affidavit for Waiver of Fees Notice.</h3>
										</li>
									</ul>
									<p style="text-align:center; padding: 10px 0px;">
										<a style="color:#a31c30; text-decoration:none; font-weight:bold; font-size:18px;"href="'.$link.'" target="_blank">
										<img src="https://macyslawsuit.com/wp-content/themes/MacysV3/images/continueProcessBtn.png" width="320px" height="60px" alt="Continue Online Process" />
										</a>.
									</p>
									<p>If you would like to provide me with these details over the phone or you have any questions, please call me at <strong>888.792.2293</strong>.</p>
									<p style="padding-bottom:3px;">Sincerely,</p>
									<p style="padding-bottom:3px;">'.$assignedattorneyfname.' '.$assignedattorneylname.'<br />Case Attorney</p>
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


$mail = new phpMailer(true);

$mail->IsSMTP();

try 
{
	$mail->Host = "mail1.domain.initiativelegal.com";
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$mail->Port = 25;
	$mail->Username = $attorneyusername;
	$mail->Password = $attorneypassword;
	$mail->AddReplyTo($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
	$mail->AddAddress("$email", "$FirstName"." $LastName");
	$mail->SetFrom($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
	$mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
	$mail->AddBCC("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt - 'Macy\'s Lawsuit");
	$mail->AddCC($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
	$mail->AddReplyTo($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
	$mail->Subject = 'Macy\'s Lawsuit-Confirmed receipt of Attorney-Client Agreement';
	$mail->MsgHTML($message);
	$mail->Send();
	echo "</p>\n";
} 

//catch (phpmailerException $e) 
//{
//  echo $e->errorMessage(); //Pretty error messages from phpMailer
//} 

catch (Exception $e) 

{
  echo $e->getMessage(); //Boring error messages from anything else!
}
?>

<?php 
if ($statuslevel == 'Signed')
{
	if (isset($uniqueid))
	{	
		$query = "IF EXISTS (SELECT uniqueid FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid') select notelog from status  WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid'";
		$currentlog = sqlsrv_query($conn,$query);
		while($row = sqlsrv_fetch_array($currentlog))
		{
		$newlog =   $date . ' @ ' . $time . ': <strong>Retainer Docusigned</strong><br>' . $row['notelog'];
		}		
		$currentstatus = 'Ready to Counter-sign via Docusign';		
		$query = "IF EXISTS (SELECT uniqueid FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid' ) UPDATE status set notelog='$newlog',currentstatus='$currentstatus',currentstatusdate='$date',retainerRecieved='Docusigned',retainerRecievedDate='$date',retainerRecievedMonth='$month',retainerRecievedWeek='$week', DeclinedToSignRetainer = '' WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid'";
		
		$results = sqlsrv_query($conn,$query);

		echo '<body onload="reloadPage()">';
	}
}

if ($statuslevel == 'Faxpending')
{
	if (isset($uniqueid))
	{	
		$query = "IF EXISTS (SELECT uniqueid FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid') select notelog from status  WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid'";
		$currentlog = sqlsrv_query($conn,$query);
		while($row = sqlsrv_fetch_array($currentlog)){
		$newlog =   $date . ' @ ' . $time . ': <strong>Opted to fax or upload the retainer</strong><br>' . $row['notelog'];
	}
	
	$currentstatus = 'Waiting for retainer via Docusign Fax or upload';		
	$query = "IF EXISTS (SELECT uniqueid FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid' ) UPDATE status set notelog='$newlog',currentstatus='$currentstatus',currentstatusdate='$date' WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid'";
	$results = sqlsrv_query($conn,$query);
	
	echo "We'll look for the signed retainer in the fax machine...thanks";
	}
}
?>
