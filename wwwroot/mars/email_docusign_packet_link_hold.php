<?php
$dateNOW = date('Y').'-'.date('m').'-'.date('d');
$timeNOW = date('H').':'.date('i').':'.date('s');
$monthNOW = date('Y').'-'.date('m');
$weekNOW = date('Y').'-'.date('W');
$uniqueid = '7ZRVA65382G4PE9MU';
require("db.php");
$link = 'https://macyslawsuit.com/longform/?uniqueid='.$uniqueid;
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
	
	
	
$email = "mrauen@initiativelegal.com";
$FirstName = "Melaina";
$LastName = "Rauen";


$message = '
<html>
<head>
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
            	<td>&nbsp;</td>
            </tr>
            <tr>
            <td>
            <table style ="font-family:arial, helvetica, sand-serif;" align="center" bgcolor="#ffffff" width="600" border="0" cellspacing="0" cellpadding="5">
                <tr>
                	<td><p style="text-align:center; text-decoration:underline; color:#888888;font-weight:bold; font-size:20px;">CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGE </p></td>
                </tr>
                <tr>
                	<td>&nbsp;</td>
               </tr>
            </table>
            </td>
          </tr>
          <tr>
          	<td>
             <table style="font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif;" align="center" bgcolor="#ffffff" width="600" border="0" cellspacing="0" cellpadding="5">
             	<tr>
   							<td width="2%">&nbsp;</td>
    						<td>
								<p>Dear '.$FirstName.' '.$LastName.':</p><p style="line-height:3px;">&nbsp;</p><p>Thank you for taking the time to speak with me regarding your potential wage and hour claims against Macy\'s. After further investigation and analysis, we may choose to pursue your potential claims against Macy\'s either on an individual basis in arbitration or through the existing proposed class action lawsuit.  Although we make no promises or guarantees as to any specific outcome of your case under either option, this choice would allow us to potentially resolve any claims you and other similar employees may have against Macy\'s either in a class action settlement, in an individual settlement, or as part of a multi-party group settlement.</p>
								<p style="line-height:3px;">&nbsp;</p>
								<p>Please click on the link below to access and complete the following documents in order to assist us in pursuing your potential claims against Macy\'s:</p>
							</td>
     						<td width="2%">&nbsp;</td>
  						</tr>
					</table>
				</td>
  			</tr>
            <tr>
   <td><table style="color:#424242; font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif; color:#424242;" align="center" bgcolor="#f1f1f1" width="530" border="0" cellspacing="0" cellpadding="5">
    <tr>
                        	<td bgcolor="#a31c30" width="3%">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
   <tr>
   <td bgcolor="#a31c30" width="3%">&nbsp;</td>
   <td width="3%">&nbsp;</td>
    <td><h3 style="color:#a31c30;">Authorization for Release of Personnel File and Wage Records form:</h3><p style="font-weight:normal;padding-bottom:3px;">By signing this Authorization form, you will direct Macy\'s to release your employment records to our law firm, which may be helpful to support your claims.</p></td>
    <td width="3%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
  </tr>
   <tr>
                        	<td bgcolor="#a31c30" width="3%">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
  
</table>
</td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table style="color:#424242; font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif; color:#424242;" align="center" bgcolor="#f1f1f1" width="530" border="0" cellspacing="0" cellpadding="5">
     <tr>
                        	<td bgcolor="#a31c30" width="3%">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
   <tr>
   <td bgcolor="#a31c30" width="3%">&nbsp;</td>
   <td width="3%">&nbsp;</td>
    <td><h3 style="color:#a31c30;">Authorization of Settlement form:</h3><p style="font-weight:normal;padding-bottom:3px;">Although Initiative does not guarantee or promise any specific outcome for your case, by signing this Authorization form, if and when the time comes, you will allow our law firm to settle and release your potential wage and hour claims against Macy\'s on your behalf for a pre-determined sum.</p></td>
    <td width="3%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
  </tr>
   <tr>
                        	<td bgcolor="#a31c30" width="3%">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
  
</table>
</td>
  </tr>
   <tr>
  <td>&nbsp;</td>
  </tr>
  <tr>
   <td><table style="color:#424242; font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif; color:#424242;" align="center" bgcolor="#f1f1f1" width="530" border="0" cellspacing="0" cellpadding="5">
    <tr>
                        	<td bgcolor="#a31c30" width="3%">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
   <tr>
   <td bgcolor="#a31c30" width="3%">&nbsp;</td>
   <td width="3%">&nbsp;</td>
    <td><h3 style="color:#a31c30;">Sign an Affidavit for Waiver of Fees Notice:</h3><p style="font-weight:normal;padding-bottom:3px;">If you meet a certain gross income level, you will be asked to complete Step 3, which is to sign an Affidavit so that we can ask the American Arbitration Association to waive any filing fees if and when your case were to be filed with AAA.</p></td>
    <td width="3%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
  </tr>
   <tr>
                        	<td bgcolor="#a31c30" width="3%">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
  
</table>
</td>
  </tr>
  <tr>
  		<td><table style="font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif; color:#424242;" bgcolor="#ffffff" align="center" width="550" border="0" cellspacing="0" cellpadding="5">
   				<tr>
   					<td width="2%">&nbsp;</td>
    				<td>
						<p style="padding-bottom:3px;">If you have already completed this process, please disregard this email.</p>
						<p style="line-height:3px;">&nbsp;</p><p style="padding-bottom:3px;">If you would like to receive these documents through the mail or if you have any questions, please do not hesitate to call me at <strong>888.792.2293</strong>, Monday through Friday.</p>
						<p style="line-height:3px;">&nbsp;</p><p style="padding-bottom:3px;">Sincerely,</p><p style="line-height:3px;">&nbsp;</p><p style="padding-bottom:3px;">'.$assignedattorneyfname.' '.$assignedattorneylname.'<br />Case Attorney</p>
					</td>
    				<td width="2%">&nbsp;</td>
			</table>
		</td>
  	</tr>
     <tr>
  		<td><table style="font-size:10px; font-style:italic; line-height:13px;font-family:Times New Roman, times, serif;" bgcolor="#ffffff" align="center" width="550" border="0" cellspacing="0" cellpadding="5">

   	<tr>
   		<td width="2%">&nbsp;</td>
    	<td><p style="padding-bottom:5px;">This message is for the intended recipient only.  The information contained in this e-mail message is legally privileged and confidential information intended only for the use of the individual or entity named above. If the receiver of this message is not the intended recipient, you are hereby notified that any dissemination, distribution or copying of this email message is strictly prohibited and may violate the legal rights of others. If you have received this message in error, please immediately notify the sender by reply email or telephone and return the message to Initiative Legal Group APC, 1800 Century Park East, Second Floor, Los Angeles, California 90067, and delete it from your system.</p><p style="line-height:3px;">&nbsp;</p><p style="font-size:14px; font-weight:bold; padding-bottom:5px;">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p></td>
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
  $mail->AddCC($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
  $mail->AddReplyTo($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
  $mail->Subject = 'Macy\'s Lawsuit - Fee waiver enclosed';
  $mail->MsgHTML($message);
  $mail->Send();
  echo "</p>\n";
} 
catch (Exception $e) 

{
  echo $e->getMessage(); //Boring error messages from anything else!
}
$query = "IF EXISTS (SELECT uniqueid from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE status set feewaiversent='Yes',feewaiversentdate='$dateNOW',feewaiversentmonth='$monthNOW',feewaiversentweek='$weekNOW' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
		$results = sqlsrv_query($conn,$query);
?>