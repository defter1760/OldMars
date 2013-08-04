<?PHP
date_default_timezone_set('America/Los_Angeles');
$serverName = "localhost\SPICE";
$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );

$dateNOW = date('Y').'-'.date('m').'-'.date('d');
$dateNOWjason = date('m').'/'.date('d').'/'.date('Y');
$timeNOW = date('H').':'.date('i').':'.date('s');
$monthNOW = date('Y').'-'.date('m');
$weekNOW = date('Y').'-'.date('W');

$hourNOW = date('G');


                $query = "SELECT COUNT(*) as COUNT FROM Status where $lastseven;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformweek = $row['COUNT'];
                }
        



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
								<td>
									<p>Dear '.$FirstName.' '.$LastName.':</p>
									<p>Thank you for taking the time to speak with me regarding your employment at Macy\'s!</p>
									<p>We have received your information and we believe that you may have wage and hour claims against Macy\'s, Inc.</p>
									<p style="font-weight:normal;padding-bottom:0;text-align:center;"><a style="color:#a31c30; text-decoration:none; font-weight:bold; font-size:18px;" href="'.$link.'" target="_blank">
										<img src="https://macyslawsuit.com/wp-content/themes/MacysV3/images/viewRetainerBtn.png" width="406px" height="60px" alt="View Attorney-Client Agreement" />
										</a> 
									</p>
									<p>Please take your time and carefully review this Agreement.</p>
									<p style="font-weight:normal;padding-bottom:0;">After you have completed your review, you will be prompted to electronically initial and sign the Agreement by clicking on the "sign here" tabs. Please click on "confirm signing" to submit the Attorney-Client Agreement to our law firm, and retain us as your attorneys for your potential wage and hours claims against Macy\'s.</p>
									<p style="padding-bottom:3px;">If you have any questions, please call us at <strong>888.792.2293</strong>.</p><p style="line-height:5px;">&nbsp;</p>
									<p style="padding-bottom:3px;">Sincerely,</p>
									<p style="padding-bottom:3px;">'.$assignedattorneyfname.' '.$assignedattorneylname.'<br />Case Attorney</p>
									<p style="text-align:center; text-decoration:underline; color:#888888;font-weight:bold; font-size:20px;"><span style="font-size:12px;">CONFIDENTIAL/WORK PRODUCT PRIVILEGE</span></p></td>
											<td width="2%">&nbsp;</td>
											<td width="2%">&nbsp;</td>
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
	$mail->Username   = "Mars_Reports";
	$mail->Password   = "5khd9J04z22yCYo0";
	$mail->AddAddress('ihutchings@initiativelegal.com','Ian Hutchings');
	$mail->AddAddress('mrauen@initiativelegal.com','Melaina Rauen');
	$mail->SetFrom('Mars_Reports@initiativelegal.com','MARS REPORTS');
	$mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
	$mail->Subject = 'MARS Macy\'s campaign: '.$dateNOWjason;
	$mail->MsgHTML($message);
	$mail->Send();
	echo "</p>\n";
} 


catch (Exception $e) 
{
  echo $e->getMessage(); //Boring error messages from anything else!
}
        
echo $hourNOW."";
?>