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
function pause($seconds){

  sleep($seconds);

}
$ThisDate = $_GET['thisdate'];
//$uniqueid='3J2HE4Y7BNU96R85Q';
//$WhoLastName='Duenas';
//$FirstName='Cindy';
//$email='ihutchings@preferredlegalsupport.com';
                $query = "select uniqueid,email,FirstName,LastName,interviewcompleteday,shortnoneoftheabove,interviewcompletetime,retainerrecieved,donotcontact,notqualified,notqualifiedreason from Status where notelog like '%Shortform Complete Online%' and retainerrecieved is null  and (interviewcompleteday='".$ThisDate."') and (donotcontact is null or donotcontact='' or donotcontact!='Yes') and (notqualified is null or donotcontact='' or donotcontact!='Yes') order by interviewcompleteday desc, interviewcompletetime;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        echo $row['uniqueid'];
                        echo "<br>";
                        echo $row['email'];
                        echo "<br>";
                        $FName = ucwords(strtolower(ucwords($row['FirstName'])));
                        echo $FName;
                        echo "<br>";
                        $LName = ucwords(strtolower(ucwords($row['LastName'])));
                        echo $LName;
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        
                
$link =  'https://macyslawsuit.com/retainer/?uniqueid='.$row['uniqueid'];

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
			    </table>
			    </td>
			</tr>

		      <tr>
			    <td>
			 <table style="font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif;" align="center" bgcolor="#ffffff" width="600" border="0" cellspacing="0" cellpadding="5">
			    <tr>
								    <td width="2%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
							    <td><p>Dear '.$FName.' '.$LName.':</p><p>Thank you for completing the online survey! We believe that you may have wage and hour claims against Macy\'s, Inc.  If you choose, you may retain our law firm to pursue your potential wage and hour claims. </br>If you are already represented by an attorney regarding any claims against Macy\'s, please do not continue.</p>
							    <p style="font-weight:normal;padding-bottom:0;text-align:center;"><a style="color:#a31c30; text-decoration:none; font-weight:bold; font-size:18px;" href="'.$link.'" target="_blank">
	<img src="https://macyslawsuit.com/wp-content/themes/MacysV3/images/viewRetainerBtn.png" width="406px" height="60px" alt="View Attorney-Client Agreement" />
</a> </p><p>Please take your time and carefully review this Agreement.</p><p style="font-weight:normal;padding-bottom:0;">After you have completed your review, you will be prompted to electronically initial and sign the Agreement by clicking on the "sign here" tabs. Please click on "confirm signing" to submit the Attorney-Client Agreement to our law firm, and retain us as your attorneys for your potential wage and hours claims against Macy\'s.</p><p style="padding-bottom:3px;">If you have any questions, please call us at <strong>888.792.2293</strong>.</p><p style="line-height:5px;">&nbsp;</p><p style="text-align:center; text-decoration:underline; color:#888888;font-weight:bold; font-size:20px;"><span style="font-size:12px;">CONFIDENTIAL/WORK PRODUCT PRIVILEGE</span></p></td>
							    <td width="2%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
							    </tr>
			 </table>
			</td>
		      </tr>
		      <tr>
			    <td>

		      
			    </td>
		      </tr>
		      <tr>
			    <td>
			    </td>
		    </tr>
		  <tr>
			    <td><table style="font-size:10px; font-style:italic; line-height:13px;font-family:Times New Roman, times, serif;" bgcolor="#ffffff" align="center" width="550" border="0" cellspacing="0" cellpadding="5">
	    
		    <tr>
			    <td width="2%">&nbsp;</td>
		    <td><p style="padding-bottom:5px; font-family:times new roman, times, serif;">This message is for the intended recipient only.  The information contained in this e-mail message is legally privileged and confidential information intended only for the use of the individual or entity named above.  If the receiver of this message is not the intended recipient, you are hereby notified that any dissemination, distribution or copying of this email message is strictly prohibited and may violate the legal rights of others.  If you have received this message in error, please immediately notify the sender by reply email or telephone and return the message to Initiative Legal Group APC, 1800 Century Park East, Second Floor, Los Angeles, California 90067, (888.792.2293), and delete it from your system.</p><p style="line-height:3px;">&nbsp;</p><p style="font-size:14px; font-weight:bold; padding-bottom:5px; font-family:times new roman, times, serif;">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p><p>To the extent that the State Bar rules require that we designate a responsible member for the contents of this email, Initiative Legal Group APC designates Mónica Balderrama as the attorney responsible for this site.</p></td>
		    <td width="2%">&nbsp;</td>
		    </tr>
		    </table>
		    </td>
	      </tr>
		      
		    </table>
		    </td>
		</tr>
		
		
	    </table><img width="1px" height="1px" src="https://DFWMS01.initiativelegal.com/emailhit.php?uniqueid='.$row['uniqueid'].'&isemail=retainersend">
	    </body>
	    ';
        

require_once('class.phpmailer.php');
$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

	    require_once('class.phpmailer.php');
	    //include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
	    
	    $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
	    
	    $mail->IsSMTP(); // telling the class to use SMTP
	    
	    try {
	      $mail->Host       = "mail1.domain.initiativelegal.com"; // SMTP server
	      $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	      $mail->SMTPAuth   = true;                  // enable SMTP authentication
	    #  $mail->SMTPAuth   = true;                  // enable SMTP authentication
	    #  $mail->Host       = "exchange.initiativelegal.com"; // sets the SMTP server
	      $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
	      $mail->Username   = "macyslawsuit"; // SMTP account username
	      $mail->Password   = "PLS1234!";        // SMTP account password
	      $mail->AddReplyTo('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
	      $mail->AddAddress($row['email'],$FName." ".$LName);
	      $mail->SetFrom('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
	      $mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
	      #$mail->AddBCC("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt - 'Macy\'s Lawsuit");
	      #$mail->AddCC('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
	    #  $mail->AddCC($attorneyemail, $attorneyfname.' '.$attorneylname);
	      $mail->AddReplyTo('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
	      $mail->Subject = 'Macy\'s Lawsuit - Attorney-Client Agreement enclosed';
	    #$mail->Subject = "$FirstName "."$LastName, ".'Thank you for completing our survey!';
	      #$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
	     # $mail->MsgHTML(file_get_contents('contents.html'));
	      $mail->MsgHTML($message);
	    
	    
	      #$mail->AddAttachment('images/phpmailer.gif');      // attachment
	      #$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
	      $mail->Send();
	      echo "</p>\n";
	    } 


catch (Exception $e) 
{
  echo $e->getMessage(); //Boring error messages from anything else!
}
        
#echo $hourNOW."";
sleep(1);
}
?>