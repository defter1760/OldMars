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
div#main {

  width: 800px;

  margin-left: auto;

  margin-right: auto;

  text-align: left;

}
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
#echo 'window.top.location.replace("http://www.yourlawsuit.com/macys/afterretainer/?uniqueid='.$uniqueid.'");';
echo 'window.top.location.replace("https://macyslawsuit.com/afterretainer/?uniqueid='.$uniqueid.'");';
echo '}';
echo '</script>';
?>
</html>

<?PHP
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
	
#$link = 'http://sql.initiativelegal.com:35535/3step.php?uniqueid='.$uniqueid;
#$link = 'http://www.yourlawsuit.com/macys/3step/?uniqueid='.$uniqueid;
#$link = 'https://macyslawsuit.com/3step/?uniqueid='.$uniqueid;
$link = 'https://macyslawsuit.com/authorization/?uniqueid='.$uniqueid;
////$message='
////<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
////<html xmlns="http://www.w3.org/1999/xhtml">
////<head>
////<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
////<title>Untitled Document</title>
////</head>
////
////<body>
////
////<table style="font-family:arial, helvetica, sans-serif; color:#424242;" bgcolor="#888888" width="100%" border="0" cellspacing="0" cellpadding="5">
////	<tr>
////    	<td>
////        <table align="center" bgcolor="#ffffff" width="600" border="0" cellspacing="0" cellpadding="5">
////        	<tr>
////            	<td><table style="font-family:arial, helvetica, sans-serif; color:#424242;" align="center" bgcolor="#ffffff" width="550" border="0" cellspacing="0" cellpadding="5">
////                	<tr>
////                    	 <td style="text-align:center;"><img src="http://www.yourlawsuit.com/macys/wp-content/uploads/2012/04/ilg_logo.png" width="307px" height="25px" alt="Initiative Legal Group APC" /></td>
////                    </tr>
////                    <tr>
////                    	<td>&nbsp;</td>
////                    </tr>
////                    <tr>
////  	<td><p style="text-align:center; text-decoration:underline; color:#888888;font-weight:bold; font-size:12px; font-family:arial, helvetica, sans-serif;">CONFIDENTIAL/WORK PRODUCT PRIVILEGE</p></td>
////  </tr>
////                	</table>
////                </td>
////            </tr>
////            <tr>
////               <td>&nbsp;</td>
////            </tr>
////            <tr>
////            	<td>
////                	<table style="font-family:arial, helvetica, sans-serif; color:#424242;" align="center" bgcolor="#f1f1f1" width="550" border="0" cellspacing="0" cellpadding="5">
////                    		<tr>
////                            	<td>&nbsp;</td>
////                                <td>&nbsp;</td>
////                                <td>&nbsp;</td>
////                                <td>&nbsp;</td>
////                            </tr>
////                          <tr>
////  							<td width="2%">&nbsp;</td>
////    						<td><img src="http://www.yourlawsuit.com/macys/wp-content/uploads/2012/04/logo_macys.png" width="253px" height="52px" alt="MacysLawsuit.com" /></td>
////   							 <td valign="top"><p style="font-size:14px; text-align:right; font-weight:bold;">TOLL FREE: 1.888.792.2293</p></td>
////    						<td width="2%">&nbsp;</td>
////  						</tr>
////                        <tr>
////                            	<td>&nbsp;</td>
////                                <td>&nbsp;</td>
////                                <td>&nbsp;</td>
////                                <td>&nbsp;</td>
////                            </tr>
////                       
////                    </table>
////                </td>
////            </tr>
////            <tr>
////    			<td><table style="font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif; color:#424242;" align="center" bgcolor="#ffffff" width="550" border="0" cellspacing="0" cellpadding="5">
////  						<tr>
////   							<td width="2%">&nbsp;</td>
////    						<td><p>Dear '.$FirstName.' '.$LastName.':</p><p style="line-height:3px;">&nbsp;</p><p>My name is '.$assignedattorneyfname.' '.$assignedattorneylname.'.  I am an attorney with Initiative Legal Group and I have been assigned to your case.  We have received your signed Attorney-Client Agreement.  After further investigation and analysis, we may choose to pursue your potential claims against Macy\'s either on an individual basis in arbitration or through the existing proposed class action lawsuit.  Although we make no promises or guarantees as to any specific outcome of your case under either option, this choice would allow us to potentially resolve any claims you and other similar employees may have against Macy\'s either in a class action settlement, in an individual settlement, or as part of a multi-party group settlement.</p><p style="line-height:3px;">&nbsp;</p><p>We are continuing our investigation into the various wage and hour violation allegations against Macy\'s and would like additional information from you.  You can provide us with more information about your potential wage and hour claims against Macy\'s by clicking <a style="color:#a31c30; text-decoration:none; font-weight:bold; font-size:18px;"href="'.$link.'" target="_blank">HERE</a>.</p> <p style="line-height:3px;">&nbsp;</p> <p>On this website, you will be asked to complete <strong>three</strong> easy steps: </p></td>
////     						<td width="2%">&nbsp;</td>
////  						</tr>
////					</table>
////				</td>
////  			</tr>
////            <tr>
////   <td><table style="color:#424242; font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif; color:#424242;" align="center" bgcolor="#f1f1f1" width="530" border="0" cellspacing="0" cellpadding="5">
////    <tr>
////                        	<td bgcolor="#a31c30" width="3%">&nbsp;</td>
////                            <td>&nbsp;</td>
////                            <td>&nbsp;</td>
////                            <td>&nbsp;</td>
////                            <td>&nbsp;</td>
////                        </tr>
////   <tr>
////   <td bgcolor="#a31c30" width="3%">&nbsp;</td>
////   <td width="3%">&nbsp;</td>
////    <td><h3 style="color:#a31c30;">STEP ONE:<br /><span style="color:#424242; font-size:16px; line-height:20px;">Sign Two Authorization Forms.</span></h3><p style="font-weight:normal;padding-bottom:3px;"><u>Authorization for Release of Personnel File and Wage Records form</u>.  By signing this Authorization form, you will direct Macy\'s to release your employment records to our law firm, which may be helpful to support your claims.</p><p style="line-height:3px;">&nbsp;</p><p style="font-weight:normal;padding-bottom:3px;"><u>Authorization of Settlement form</u>.  Although Initiative does not guarantee or promise any specific outcome for your case, by signing this Authorization form, if and when the time comes, you will allow our law firm to settle and release your potential wage and hour claims against Macy\'s on your behalf for a pre-determined sum.</p></td>
////    <td width="3%">&nbsp;</td>
////    <td width="3%">&nbsp;</td>
////  </tr>
////   <tr>
////                        	<td bgcolor="#a31c30" width="3%">&nbsp;</td>
////                            <td>&nbsp;</td>
////                            <td>&nbsp;</td>
////                            <td>&nbsp;</td>
////                            <td>&nbsp;</td>
////                        </tr>
////  
////</table>
////</td>
////  </tr>
////  <tr>
////  <td>&nbsp;</td>
////  </tr>
////  <tr>
////    <td><table style="color:#424242; font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif; color:#424242;" align="center" bgcolor="#f1f1f1" width="530" border="0" cellspacing="0" cellpadding="5">
////     <tr>
////                        	<td bgcolor="#a31c30" width="3%">&nbsp;</td>
////                            <td>&nbsp;</td>
////                            <td>&nbsp;</td>
////                            <td>&nbsp;</td>
////                            <td>&nbsp;</td>
////                        </tr>
////   <tr>
////   <td bgcolor="#a31c30" width="3%">&nbsp;</td>
////   <td width="3%">&nbsp;</td>
////    <td><h3 style="color:#a31c30;">STEP TWO:<br /> <span style="color:#424242; font-size:16px; line-height:20px;">Fill out an online interview to provide us with details about your potential wage and hour claims against Macy\'s.</span></h3><p style="font-weight:normal;padding-bottom:3px;">This interview will take approximately 15-20 minutes to complete.  At the end of the questions, you will be given an opportunity to submit any documents you feel may support your case by uploading them, faxing them, or by requesting that we send you a self-addressed stamped envelope.</p></td>
////    <td width="3%">&nbsp;</td>
////    <td width="3%">&nbsp;</td>
////  </tr>
////   <tr>
////                        	<td bgcolor="#a31c30" width="3%">&nbsp;</td>
////                            <td>&nbsp;</td>
////                            <td>&nbsp;</td>
////                            <td>&nbsp;</td>
////                            <td>&nbsp;</td>
////                        </tr>
////  
////</table>
////</td>
////  </tr>
////   <tr>
////  <td>&nbsp;</td>
////  </tr>
////  <tr>
////   <td><table style="color:#424242; font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif; color:#424242;" align="center" bgcolor="#f1f1f1" width="530" border="0" cellspacing="0" cellpadding="5">
////    <tr>
////                        	<td bgcolor="#a31c30" width="3%">&nbsp;</td>
////                            <td>&nbsp;</td>
////                            <td>&nbsp;</td>
////                            <td>&nbsp;</td>
////                            <td>&nbsp;</td>
////                        </tr>
////   <tr>
////   <td bgcolor="#a31c30" width="3%">&nbsp;</td>
////   <td width="3%">&nbsp;</td>
////    <td><h3 style="color:#a31c30;">STEP THREE:<br /><span style="color:#424242; font-size:16px; line-height:20px;">Sign an Affidavit for Waiver of Fees Notice.</span></h3><p style="font-weight:normal;padding-bottom:3px;">If you meet a certain gross income level, you will be asked to complete Step 3, which is to sign an Affidavit so that we can ask the American Arbitration Association to waive any filing fees if and when your case were to be filed with AAA.</p></td>
////    <td width="3%">&nbsp;</td>
////    <td width="3%">&nbsp;</td>
////  </tr>
////   <tr>
////                        	<td bgcolor="#a31c30" width="3%">&nbsp;</td>
////                            <td>&nbsp;</td>
////                            <td>&nbsp;</td>
////                            <td>&nbsp;</td>
////                            <td>&nbsp;</td>
////                        </tr>
////  
////</table>
////</td>
////  </tr>
////  <tr>
////  		<td><table style="font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif; color:#424242;" bgcolor="#ffffff" align="center" width="550" border="0" cellspacing="0" cellpadding="5">
////   				<tr>
////   					<td width="2%">&nbsp;</td>
////    				<td><p style="padding-bottom:3px;">If you have already completed this process, please disregard this email.</p><p style="line-height:3px;">&nbsp;</p><p style="padding-bottom:3px;">Again, please provide us with more information about your work experience at Macy\'s by clicking <a style="color:#a31c30; text-decoration:none; font-weight:bold; font-size:18px;"href="#" target="_blank">HERE</a>.  If you would like to provide me with these details over the phone or you have any questions, please do not hesitate to call me at <strong>1.888.792.2293</strong>, Monday through Friday.</p><p style="line-height:3px;">&nbsp;</p><p style="padding-bottom:3px;">Sincerely,</p><p style="line-height:3px;">&nbsp;</p><p style="padding-bottom:3px;">'.$assignedattorneyfname.' '.$assignedattorneylname.'<br />Case Attorney</p></td>
////    				<td width="2%">&nbsp;</td>
////			</table>
////		</td>
////  	</tr>
////     <tr>
////  		<td><table style="font-size:10px; font-style:italic; line-height:13px;font-family:Times New Roman, times, serif;" bgcolor="#ffffff" align="center" width="550" border="0" cellspacing="0" cellpadding="5">
////
////   	<tr>
////   		<td width="2%">&nbsp;</td>
////    	<td><p style="padding-bottom:5px;">This message is for the intended recipient only.  The information contained in this e-mail message is legally privileged and confidential information intended only for the use of the individual or entity named above. If the receiver of this message is not the intended recipient, you are hereby notified that any dissemination, distribution or copying of this email message is strictly prohibited and may violate the legal rights of others. If you have received this message in error, please immediately notify the sender by reply email or telephone and return the message to Initiative Legal Group APC, 1800 Century Park East, Second Floor, Los Angeles, California 90067, and delete it from your system.</p><p style="line-height:3px;">&nbsp;</p><p style="font-size:14px; font-weight:bold; padding-bottom:5px;">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p></td>
////    	<td width="2%">&nbsp;</td>
////  	</tr>
////	</table>
////	</td>
////  </tr>
////            
////        </table>
////    	</td>
////	</tr>
////</table>
////</body>
////</html>
////
////';

 $message = '

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
                        <tr>
                        <td width="2%">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td width="2%">&nbsp;</td>
                        </tr>
                </table>
                </td>
            </tr>


          <tr>
          	<td>
             <table style="font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif;" align="center" bgcolor="#ffffff" width="600" border="0" cellspacing="0" cellpadding="5">
             	<tr>
   							<td width="2%">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
    						<td><p>Dear '.$FirstName.' '.$LastName.':</p><p>My name is '.$assignedattorneyfname.' '.$assignedattorneylname.'. I am an attorney with Initiative Legal Group and I have been assigned to your case. Thank you for retaining our law firm for your potential wage and hour claims against Macy\'s.<p></p>In order to continue our investigation into your potential wage and hour claims against Macy\'s, we would like you to provide us with additional information.</p>
						
						<p>By clicking the button below, you will be provided with an explanation of each of the following forms and how to complete them:</p>
						<p></p>
						<ul style="margin:0 0 0 22px;">
                                                <li>
                                                <h3 style="color:#424242; font-size:16px; line-height:20px;padding:8px 0;">
						Two Authorization Forms.
                                                <br /><br />
						</h3>
                                                </li>
                                                <li>
                                                <h3 style="color:#424242; font-size:16px; line-height:20px;padding:8px 0;">
						An online Interview to provide us with specific details about your potential wage and hour claims against Macy\'s.
                                                <br /><br />
						</h3>
						</li>
                                                <li>
                                                <h3 style="color:#424242; font-size:16px; line-height:20px;padding:8px 0;">
						An Affidavit for Waiver of Fees Notice.
						</h3>
                                                </li>
                                                </ul>
                                                <p style="text-align:center;">
                                                <a style="color:#a31c30; text-decoration:none; font-weight:bold; font-size:18px;"href="'.$link.'" target="_blank">
                                                <img src="https://macyslawsuit.com/wp-content/themes/MacysV3/images/continueProcessBtn.png" width="320px" height="60px" alt="Continue Online Process" />
                                                </a>.
                                                </p>
                                                <p>
                                                If you would like to provide me with these details over the phone or you have any questions, please call me at <strong>888.792.2293</strong>.
                                                </p>
                                                <p style="padding-bottom:3px;">
                                                Sincerely,
                                                </p>
                                                <p style="padding-bottom:3px;">
                                                '.$assignedattorneyfname.' '.$assignedattorneylname.'
                                                <br />Case Attorney
                                                </p>
                                                <p style="text-align:center; text-decoration:underline; color:#888888;font-weight:bold; font-size:12px; font-family:arial, helvetica, sans-serif;">
                                                CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION
                                                </p>
						</td>
     						<td width="2%">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
  						</tr>
             </table>
            </td>
          </tr>


      <tr>
  		<td><table style="font-size:10px; font-style:italic; line-height:13px;font-family:Times New Roman, times, serif;" bgcolor="#ffffff" align="center" width="550" border="0" cellspacing="0" cellpadding="5">

   	<tr>
   		<td width="2%">&nbsp;</td>
    	<td><p style="padding-bottom:5px; font-family:Times New Roman, times, serif;">This message is for the intended recipient only.  The information contained in this e-mail message is legally privileged and confidential information intended only for the use of the individual or entity named above.  If the receiver of this message is not the intended recipient, you are hereby notified that any dissemination, distribution or copying of this email message is strictly prohibited and may violate the legal rights of others.  If you have received this message in error, please immediately notify the sender by reply email or telephone and return the message to Initiative Legal Group APC, 1800 Century Park East, Second Floor, Los Angeles, California 90067, (888.792.2293), and delete it from your system.</p><p style="line-height:3px;">&nbsp;</p><p style="font-size:14px; font-weight:bold; padding-bottom:5px; font-family:Times New Roman, times, serif;">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p></td>
    	<td width="2%">&nbsp;</td>
  	</tr>
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
  $mail->Subject = 'Macy\'s Lawsuit-Confirmed receipt of Attorney-Client Agreement';
#$mail->Subject = "$FirstName "."$LastName, ".'Thank you for signing the Attorney-Client agreement!';
  $mail->MsgHTML($message);
  $mail->Send();
  echo "</p>\n";
	} 

//catch (phpmailerException $e) 
//{
//  echo $e->errorMessage(); //Pretty error messages from PHPMailer
//} 

catch (Exception $e) 

{
  echo $e->getMessage(); //Boring error messages from anything else!
}
?>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>

<style>

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

</style>

<?PHP 
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
			
##Modified query to no longer mark as accepted
#$query = "IF EXISTS (SELECT uniqueid FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid' ) UPDATE status set notelog='$newlog',currentstatus='$currentstatus',currentstatusdate='$date',retainerRecieved='Docusigned',retaineraccept='Yes',retaineracceptdate='$date',retainerRecievedDate='$date',retainerRecievedMonth='$month',retainerRecievedWeek='$week',retaineraccepted='Docusigned' , DeclinedToSignRetainer = '' WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid'";
			
			
			$results = sqlsrv_query($conn,$query);
  			##$mail->MsgHTML($message);
  			##$mail->Send();

//echo "<input style='border:0' type='text' id='textbox1' size='1'>";
//echo "<script>document.getElementById('textbox1').focus()<\/script>";
//echo "<div id='main'>";
//echo "<div class='container'>";
//echo "<div id='logo'>";
//echo "<h1>INITIATIVE LEGAL GROUP, APC</h1>";
//echo "</div>";
//echo "<h2>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h2>";
//echo "<p>Our law firm has received your signed Attorney-Client Agreement for purposes of representing you (and others similarly situated) in a class action. Based on Initiative Legal Group APC's discretion and sound judgment, Initiative will pursue your claims on an individual basis in arbitration should the Court decline to allow the pending case against Macy's to proceed as a class action with Initiative as class counsel.</p>";
//echo "<p>We are continuing our investigation into the various wage and hour claims against Macy's and would like additional information from you. Please provide us with more information about your work experience by [<a target='top' href='".$link."' ><span class='bigText'>clicking here</span></a>]. You will also receive an email containing the above link.</p>";
//echo "<p>If you have any questions or do not receive an email, please contact us toll-free at <strong>1-888-792-
//2293</strong>.</p>";
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
	$newlog =   $date . ' @ ' . $time . ': <strong>Opted to fax or upload the retainer</strong><br>' . $row['notelog'];
}
	$currentstatus = 'Waiting for retainer via Docusign Fax or upload';		
		
			$query = "IF EXISTS (SELECT uniqueid FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid' ) UPDATE status set notelog='$newlog',currentstatus='$currentstatus',currentstatusdate='$date' WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
echo "We'll look for the signed retainer in the fax machine...thanks";
	
		}

}
?>
<?PHP 
//echo "((__START__Ian's wording for interim use__))<br><br><br><br><br>";
//echo 'Thank you '.$FirstName.'!<br><br>'; 
//echo "You'll be recieving an email from us shortly.<br><br>";
//echo "Inside, you'll find a link to a detailed set of follow up questions about your case.<br><br>";
//echo "For your convenience, that link is also available here: ";
//echo '<a href="'.$link.'" target="_blank">Click here to begin the follow up questionnaire.</a>';
//echo "<br><br>";
//echo "Completing this provides us with vital information which we will use during investigation and litigation of your case against ";
//echo $brand.".";
//echo "<br><br><br><br>((__END__Ian's wording for interim use__))<br>";
?>
