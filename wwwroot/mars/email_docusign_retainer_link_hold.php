<?php

$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$link = 'https://macyslawsuit.com/3step/?uniqueid='.$uniqueid;
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
                	<td><p style="text-align:center; text-decoration:underline; color:#888888;font-weight:bold; font-size:20px;">ATTORNEY ADVERTISEMENT <br /><br />CONFIDENTIAL/WORK PRODUCT PRIVILEGE </p></td>
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
                            <td width="2%">&nbsp;</td>
    						<td><p>Dear '.$FirstName.' '.$LastName.':</p><br/ ><p>Thank you for completing the online survey!</p><br /><p>We have received your responses and we believe that you may have wage and hour claims against Macy\'s, Inc.  To pursue those claims and protect your rights, you may choose to retain an attorney.  Although you may hire any attorney you deem fit, you may choose to retain Initiative Legal Group to represent you in your potential claims against Macy\'s.</p><br /><p>You can retain our law firm by following <strong>three</strong> simple steps:</p><br /></td>
     						<td width="2%">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
  						</tr>
             </table>
            </td>
          </tr>
          <tr>
          	<td>
             <table style="font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif;" align="center" bgcolor="#ffffff" width="600" border="0" cellspacing="0" cellpadding="5">
             	<tr>
                	<td><table style="color:#424242; font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif;" align="center" bgcolor="#f1f1f1" width="530" border="0" cellspacing="0" cellpadding="5">
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
    						<td><h3 style="color:#a31c30;"><span style="color:#a31c30;font-weight:bold;">STEP ONE:</span></h3><p style="font-weight:normal;padding-bottom:0;">To formally retain our law firm, please <a style="color:#a31c30; text-decoration:none; font-weight:bold; font-size:18px;" href="'.$link.'" target="_blank">CLICK HERE</a> to view our Attorney-Client Agreement. Please take your time and carefully review this Agreement. Please note that, by signing this Agreement, you will allow our law firm to settle and release your potential wage and hour claims with Macy\'s for no less than $200 total, after the deduction of legal fees and costs. 
</p></td>
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
  
					</table></td>
                </tr>
                 <tr>
  					<td>&nbsp;</td>
  				</tr>
                <tr>
                	<td><table style="color:#424242; font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif;" align="center" bgcolor="#f1f1f1" width="530" border="0" cellspacing="0" cellpadding="5">
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
    			<td><h3 style="color:#a31c30;"><span style="color:#a31c30;font-weight:bold;">STEP TWO:</span></h3><p style="font-weight:normal;padding-bottom:0;">After you have completed your review, you will be prompted to electronically initial and sign the Agreement by clicking on the "sign here" tabs.  Detailed instructions will be provided on the document page.</p></td>
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
  
		</table></td>
                </tr>
                 <tr>
  					<td>&nbsp;</td>
  				</tr>
                <tr>
   <td><table style="color:#424242; font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif;" align="center" bgcolor="#f1f1f1" width="530" border="0" cellspacing="0" cellpadding="5">
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
    			<td><h3 style="color:#a31c30;"><span style="color:#a31c30;font-weight:bold;">STEP THREE:</span></h3><p style="font-weight:normal;padding-bottom:0;">Once you have inserted your initials and signature, you will have the opportunity to review and confirm your signature.  By clicking on &quot;confirm signing&quot; you will submit the Attorney-Client Agreement to our law firm.</p></td>
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
             </table>
          
          	</td>
          </tr>
          <tr>
  		<td><table style="font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif;" bgcolor="#ffffff" align="center" width="550" border="0" cellspacing="0" cellpadding="5">
   				<tr>
   					<td width="2%">&nbsp;</td>
    				<td><p style="padding-bottom:3px;">If you have any questions, please call me at <strong>888.792.2293</strong>.</p><p style="line-height:5px;">&nbsp;</p><p style="padding-bottom:3px;">Sincerely,</p><p style="line-height:5px;">&nbsp;</p><p style="padding-bottom:3px;">'.$assignedattorneyfname.' '.$assignedattorneylname.'<br />Case Attorney</p></td>
    				<td width="2%">&nbsp;</td>
			</table>
		</td>
  	</tr>
      <tr>
  		<td><table style="font-size:10px; font-style:italic; line-height:13px;font-family:Times New Roman, times, serif;" bgcolor="#ffffff" align="center" width="550" border="0" cellspacing="0" cellpadding="5">

   	<tr>
   		<td width="2%">&nbsp;</td>
    	<td><p style="padding-bottom:5px; font-family:times new roman, times, serif;">This message is for the intended recipient only.  The information contained in this e-mail message is legally privileged and confidential information intended only for the use of the individual or entity named above.  If the receiver of this message is not the intended recipient, you are hereby notified that any dissemination, distribution or copying of this email message is strictly prohibited and may violate the legal rights of others.  If you have received this message in error, please immediately notify the sender by reply email or telephone and return the message to Initiative Legal Group APC, 1800 Century Park East, Second Floor, Los Angeles, California 90067, and delete it from your system.</p><p style="line-height:3px;">&nbsp;</p><p style="font-size:14px; font-weight:bold; padding-bottom:5px; font-family:times new roman, times, serif;">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p></td>
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
$query = "IF EXISTS (SELECT uniqueid from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE status set retainerSent='Docusign',retainerSentDate='$date',retainerSentMonth='$month',retainerSentWeek='$week' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
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