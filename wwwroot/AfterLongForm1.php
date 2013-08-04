<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<style>
#main{
	font-family: 'Open Sans', sans-serif;
	color:#424242;
}

a {
	color:#9f111b;
	font-weight:bold;
	text-decoration:none;
}
/*div#main {

  width: 800px;

  margin-left: auto;

  margin-right: auto;

  text-align: left;

}*/
<style>


</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>THANK YOU!</title>
</head>
<?PHP 

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




?>
<body>
</body>
</html>
<?PHP 
$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
$query = "SELECT authformreceived,retainerRecieved,feewaiverreceived,completedlongformonline,FirstName,LastName,brand,email,brandid,brand FROM Status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid'";
$results = sqlsrv_query($conn,$query);

	while($row = sqlsrv_fetch_array($results)){


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
?>
<?PHP
////////////////////////////////////////////////////////////////////////////////
/////email/////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
?>
<?PHP
echo '<script type="text/javascript">';
echo 'function reloadPage()';
echo '{';
echo 'window.top.location.replace("https://macyslawsuit.com/afterfeewaiver/?uniqueid='.$uniqueid.'");';	
#echo 'window.top.location.replace("http://yourlawsuit.com/macys/afterfeewaiver/?uniqueid='.$uniqueid.'");';
echo '}';
echo '</script>';
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
	

#$link = 'http://sql.initiativelegal.com:35535/getauth.php?uniqueid='.$uniqueid;
#$link = 'http://www.yourlawsuit.com/macys/authorization/?uniqueid='.$uniqueid;
$link = 'https://macyslawsuit.com/authorization/?uniqueid='.$uniqueid;
$message = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<table style="font-family:arial, helvetica, sans-serif; color:#424242;" bgcolor="#888888" width="100%" border="0" cellspacing="0" cellpadding="5">
	<tr>
    	<td>
        <table align="center" bgcolor="#ffffff" width="600" border="0" cellspacing="0" cellpadding="5">
        	<tr>
            	<td>
                <table align="center" bgcolor="#ffffff" width="600" border="0" cellspacing="0" cellpadding="5">
                	<tr>
                    	<td></td>
                    </tr>
                </table>
                </td>
            </tr>
        	<tr>
            	<td>
                <table style="font-family:arial, helvetica, sans-serif; color:#424242;" align="center" bgcolor="#f1f1f1" width="550" border="0" cellspacing="0" cellpadding="5">
                		<tr>
                        <td width="2%">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td width="2%">&nbsp;</td>
                        </tr>
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
  		<td><table style="font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif;" bgcolor="#ffffff" align="center" width="550" border="0" cellspacing="0" cellpadding="5">
   				<tr>
   					<td width="2%">&nbsp;</td>
    				<td><p>Dear '.$FirstName.' '.$LastName.':</p><p style="line-height:3px;">&nbsp;</p><p>Thank you for providing us with additional information regarding your potential wage and hour claims against Macy\'s!</p><p style="line-height:3px;">&nbsp;</p><p>We will review your information and we will contact you directly.</p><p style="line-height:3px;">&nbsp;</p><p>If you have any questions, please contact us at <strong>888.792.2293</strong>.</p><p style="line-height:3px;">&nbsp;</p><p style="padding-bottom:3px;">Sincerely,</p><p style="line-height:3px;">&nbsp;</p><p style="padding-bottom:3px;">'.$assignedattorneyfname.' '.$assignedattorneylname.'<br />Case Attorney</p></td>
    				<td width="2%">&nbsp;</td>
			</table>
		</td>
  	</tr>
      <tr>
  		<td><table style="font-size:10px; font-style:italic; line-height:13px;font-family:Times New Roman, times, serif;" bgcolor="#ffffff" align="center" width="550" border="0" cellspacing="0" cellpadding="5">

   	<tr>
   		<td width="2%">&nbsp;</td>
    	<td><p style="padding-bottom:5px;">This message is for the intended recipient only.  The information contained in this e-mail message is legally privileged and confidential information intended only for the use of the individual or entity named above.  If the receiver of this message is not the intended recipient, you are hereby notified that any dissemination, distribution or copying of this email message is strictly prohibited and may violate the legal rights of others.  If you have received this message in error, please immediately notify the sender by reply email or telephone and return the message to Initiative Legal Group APC, 1800 Century Park East, Second Floor, Los Angeles, California 90067, (888.792.2293), and delete it from your system.</p><p style="line-height:3px;">&nbsp;</p><p style="font-size:14px; font-weight:bold; padding-bottom:5px;">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p></td>
    	<td width="2%">&nbsp;</td>
  	</tr>
	</table>
	</td>
  </tr>
          
        </table>
        </td>
    </tr>
    
    
</table><img width="1px" height="1px" src="https://DFWMS01.initiativelegal.com/emailhit.php?uniqueid='.$uniqueid.'&isemail=finalemail">
</body>
</html>
';

//$message = '
//<html>
//<head>
//</head>
//<body>
//<table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
//	<tbody>
//		<tr>
//			<td width="20">&nbsp;</td>
//			<td>
//		  <table border="0" cellspacing="0" cellpadding="14" width="100%">
//				<tbody>
//					
//                    <tr>
//						<td bgcolor="#ffffff" style="text-align:center;"><img src="http://sql.initiativelegal.com:35535/whitelogo.png"><img width="1px" height="1px" src="http://sql.initiativelegal.com:35535/emailhit.php?uniqueid='.$uniqueid.'&isemail=afterlongform">
//					  </td>
//					</tr>
//					                   
//					<tr>
//						<td style="font-family: Arial,Helvetica,sans-serif;  color:#333333; line-height:24px; text-align:center;" bgcolor="#ffffff"><h2><u>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</u></h2></td>
//					</tr>
//                    <tr>
//						<td style="font-family: Arial,Helvetica,sans-serif;  color:#333333; font-size:10px; font-style:italic;" bgcolor="#ffffff"><p>This message is for the intended recipient only. The information contained in this e-mail message is legally privileged and confidential information intended only for the use of the individual or entity named above. If the receiver of this message is not the intended recipient, you are hereby notified that any dissemination, distribution or copying of this email message is strictly prohibited and may violate the legal rights of others. If you have received this message in error, please immediately notify the sender by reply email or telephone and return the message to Initiative Legal Group APC, 1800 Century Park East, Second Floor, Los Angeles, California 90067, and delete it from your system.</p></td>
//					</tr>
//				</tbody>
//			</table>
//            </td>
//		</tr>
//        <tr>
//		  <td width="20" bgcolor="#ffffff" >&nbsp;</td>
//			<td bgcolor="#ffffff"><table width="100%" border="0"  cellpadding="14">
//			  <tr>
//			    <td style="font-family: Arial,Helvetica,sans-serif; font-size: 14px; line-height:20px; color:#333333" bgcolor="#ffffff" width="100%"><p>Dear '.$FirstName.':</p><p>Thank you for providing us with additional information regarding your employment with Macy\'s. We will review your information and we will contact you directly, if (and when) required.</p><p>For the latest updates on the status of this case, we encourage you to visit our website at <a href="http://www.MacysLawsuit.com" target="_blank">www.MacysLawsuit.com</a> and click on the "Status of the Case" tab. This website will be updated periodically when there are new developments in the case.</p><p>If you have any questions, please contact us toll-free at 1.888.792.2293, Monday through Friday.</p><p><br /><br />Sincerely, <br /><br />'.$assignedattorneyfname.' '.$assignedattorneylname.'<br />Case Attorney </p></td>
//		      </tr>
//		    </table></td>
//		</tr>
//		
//		<tr>
//			
//</table>
//
//
//
//
//
//
//
//</body>
//</html>
//
//';
require_once('class.phpmailer.php');


$mail = new PHPMailer(true);

$mail->IsSMTP();


try {
  $mail->Host       = "mail1.domain.initiativelegal.com";
  $mail->SMTPDebug  = 0;
  $mail->SMTPAuth   = true;
  $mail->Port       = 25;
  $mail->Username   = $attorneyusername;
  $mail->Password   = $attorneypassword;
  $mail->AddReplyTo($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
  $mail->AddAddress("$email", "$FirstName"." $LastName");
  $mail->SetFrom($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
  $mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
  $mail->AddBCC("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt - 'Macy\'s Lawsuit");
  $mail->AddCC($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
  $mail->AddReplyTo($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
  $mail->Subject = 'Macy\'s Lawsuit - Thank you';
#$mail->Subject = 'Investigation of potential labor violations by Macy\'s-Confirmed receipt of additional information';
#$mail->Subject = "$FirstName "."$LastName, ".'Thank you for signing the Attorney-Client agreement!';
  $mail->MsgHTML($message);
  $mail->Send();
  echo "</p>\n";
	} 

catch (Exception $e) 

{
  echo $e->getMessage(); //Boring error messages from anything else!
}
?>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/confirmations.css" rel="stylesheet" type="text/css" />
<!--<style>

body {
	font-family: 'Open Sans', sans-serif;
	color:#424242;
	margin:0;
	text-align:center;
	height:100%;
}

body, div, h1, h2, h3, h4, h5, h6, p, ul, img {
	margin:0px;
	padding:0px;
}

h1{
	font-size:22px;
	line-height:28px;
}

h2{
	font-size:20px;
	line-height:26px;
	text-decoration:underline;
	padding-top:20px;
	padding-bottom:30px;
}

h3{
	font-size:18px;
	line-height:24px;
}


p{
	font-size:16px;
	text-align:left;
	padding-bottom:10px;
}

a {
	color:#9f111b;
	font-weight:bold;
	text-decoration:none;
}

.bigText{
	font-size:20px;
	text-transform:uppercase;
}

.red{
	font-weight:bold;
	color:#9f111b;
}

#main{
	width:100%;
	margin:0 auto;
	padding:20px;
}

.container{
	width:90%;
	margin:0 auto;
}

#logo{
	width:370px;
	height:36px;
	background-image:url(https://DFWMS01.initiativelegal.com/whitelogo.png);
	background-repeat:none;
	text-indent:-9999px;
	margin:0 auto;
}





</style>-->
<?PHP 
if ($statuslevel == 'Signed')
{

	if (isset($uniqueid))
	{	
			$query = "IF EXISTS (SELECT uniqueid FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid') select notelog from status  WHERE uniqueid='$uniqueid' AND tenantid='$tenantid'";
			$currentlog = sqlsrv_query($conn,$query);
			while($row = sqlsrv_fetch_array($currentlog))
			{
			$newlog =   $date . ' @ ' . $time . ': <strong>Fee waiver Docusigned</strong><br>' . $row['notelog'];
			}		
			$currentstatus = 'Completed long form and fee waiver';		
			$query = "IF EXISTS (SELECT uniqueid FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid' ) UPDATE status set notelog='$newlog',currentstatus='$currentstatus',currentstatusdate='$date' WHERE uniqueid='$uniqueid' AND tenantid='$tenantid'";
			
			$query = "IF EXISTS (SELECT uniqueid FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid' ) UPDATE status set feewaiversent='Yes',feewaiverreceived='Docusigned',feewaiveraccept='Yes',feewaiveracceptdate='$date',feewaiverreceiveddate='$date',feewaiverreceivedmonth='$month',feewaiverreceivedweek='$week' WHERE uniqueid='$uniqueid' AND tenantid='$tenantid'";
			$results = sqlsrv_query($conn,$query);
			
			//$query = "update Status set feewaiverreceived='Yes' where uniqueid='".$uniqueid."'";
			//$results = sqlsrv_query($conn,$query);
//
//echo "<input style='border:0' type='text' id='textbox1' size='1'>";
//echo "<script>document.getElementById('textbox1').focus()<\/script>";
//echo "<div id='main'>";
//echo "<div class='container'>";
//echo "<div id='logo'>";
//echo "<h1>INITIATIVE LEGAL GROUP, APC</h1>";
//echo "</div>";
//echo "<h2>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h2>";
//echo "<p>Thank you for providing us with additional information regarding your employment with Macy's. We will review your information and will contact you directly if (and when) required.</p>";
//echo "<p>For the latest updates on the status of this case, we encourage you to visit our website at <a href='http://www.yourlawsuit.com/macys/' target='_parent'>www.macyslawsuit.com</a> and click on the &quot;Status of the Case&quot; tab. This information will be updated periodically when there are new developments in the case.</p>";
//echo "<p>If you have any questions, please contact us toll-free at 1.888.792. 2293, Monday through Friday.</p>";
//echo "</div>";
//echo "</div>";
		echo '<body onload="reloadPage()">';



	}

}

if ($statuslevel == 'Faxpending'){

	if (isset($uniqueid))
		{	
			$query = "IF EXISTS (SELECT uniqueid FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid') select notelog from status  WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid'";
			$currentlog = sqlsrv_query($conn,$query);
while($row = sqlsrv_fetch_array($currentlog)){
	$newlog =   $date . ' @ ' . $time . ': <strong>Opted to fax or upload the authorization</strong><br>' . $row['notelog'];
}
	$currentstatus = 'Waiting for authorization via Docusign Fax or upload';		
		
			$query = "IF EXISTS (SELECT uniqueid FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid' ) UPDATE status set notelog='$newlog',currentstatus='$currentstatus',currentstatusdate='$date' WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
echo "We'll look for the signed authorization in the fax machine...thanks";
	
		}

}
?>

