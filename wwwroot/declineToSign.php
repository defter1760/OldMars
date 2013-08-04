<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/confirmations.css" rel="stylesheet" type="text/css" />


<?php

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");

$conn = sqlsrv_connect( $serverName, $connectionInfo );
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');



if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
if (isset($_REQUEST['statuslevel'])) $statuslevel = $_REQUEST['statuslevel'];
if (isset($_REQUEST['document'])) $document = $_REQUEST['document'];


if (!empty($uniqueid))
{//this requires that the uniqueid not be empty -- open

	if ($statuslevel == 'Decline')
	{//this requires that the status level equals decline -- open
		$query = "select FirstName, LastName, uniqueid, agentlname from status where uniqueid='$uniqueid'";
	
		$results = sqlsrv_query($conn,$query);
	
		while ($row = sqlsrv_fetch_array($results))
		{
			$firstname = $row['FirstName'];
			$lastname = $row['LastName'];
			$agentlname = $row['agentlname'];
		}
		
	
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
		
		
		$var1 = 'DeclinedToSign'.$document;
		$var2 = 'DeclinedToSign'.$document.'Date';
		$var3 = 'DeclinedToSign'.$document.'Week';
		$var4 = 'DeclinedToSign'.$document.'Month';
		
		
		$query = "IF EXISTS (select uniqueid from status where uniqueid = '$uniqueid') UPDATE status set [$var1] = 'Yes', [$var2] = '$date', [$var3] = '$week', [$var4] = '$month' where uniqueid = '$uniqueid'";
	
		$results = sqlsrv_query($conn,$query);
		
		
		
		
		$message = '
			<body>
				<table>
					<tr>
						<td>
							<h2>'.$firstname.' '.$lastname.'</h2>
							<p>Declined to sign '.$document.'.</p>
							<p>Unique Id = '.$uniqueid.'</p>
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
				$mail->AddReplyTo('macyslawsuit@initiativelegal.com','Macy\'s Lawsuit');
				$mail->AddAddress($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
				#$mail->AddAddress("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt");
				$mail->SetFrom($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
				$mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
			    $mail->AddBCC("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt - 'Macy\'s Lawsuit");
				//$mail->AddCC($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
				//$mail->AddReplyTo($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
				$mail->Subject = 'Macy\'s Lawsuit-Declined to sign '.$document;
				#$mail->Subject = "$FirstName "."$LastName, ".'Thank you for signing the Attorney-Client agreement!';
				$mail->MsgHTML($message);
				$mail->Send();
				//echo "</p>\n";
			} 
			
			//catch (phpmailerException $e) 
			//{
			//  echo $e->errorMessage(); //Pretty error messages from PHPMailer
			//} 
			
			catch (Exception $e) 
			
			{
			  echo $e->getMessage(); //Boring error messages from anything else!
			}
	
	
		$query = "select uniqueid from status where DeclinedToSignRetainer = 'Yes'";
	
		$results = sqlsrv_query($conn,$query);
	
		while($row = sqlsrv_fetch_array($results))
		{
			$resultUniqueId = $row['uniqueid'];
		}
		
		
		$query = "select uniqueid from status where DeclinedToSignAuthorization = 'Yes'";
	
		$results = sqlsrv_query($conn,$query);
	
		while($row = sqlsrv_fetch_array($results))
		{
			$resultUniqueId = $row['uniqueid'];
		}
		
		
		$query = "select uniqueid from status where DeclinedToSignFeeWaiver = 'Yes'";
	
		$results = sqlsrv_query($conn,$query);
	
		while($row = sqlsrv_fetch_array($results))
		{
			$resultUniqueId = $row['uniqueid'];
		}
		
		
		$query = "IF EXISTS (SELECT uniqueid FROM status WHERE uniqueid='$uniqueid') select notelog from status  WHERE uniqueid='$uniqueid'";
		
		$currentlog = sqlsrv_query($conn,$query);
		
		while($row = sqlsrv_fetch_array($currentlog)){
			$newlog =   $date . ' @ ' . $time . ': <strong>Declined to sign '.$document.'</strong><br>' . $row['notelog'];
		}
				
		$query = "IF EXISTS (SELECT uniqueid FROM status WHERE uniqueid='$uniqueid') UPDATE status set notelog='$newlog' WHERE uniqueid='$uniqueid'";
		
		$results = sqlsrv_query($conn,$query);
			
			
		if ($document == 'Retainer')
		{//retainer message -- open
			echo '<script type="text/javascript">';
				echo 'function reloadPage()';
				echo '{';
					echo 'window.top.location.replace("https://macyslawsuit.com/declinetosignretainer/?uniqueid='.$uniqueid.'&document='.$document.'");';
				echo '}';
			echo '</script>';
		
			echo '<body onload="reloadPage()">';
		}//retainer message -- close
		
		
		if ($document == 'Authorization')
		{//authorization message -- open
			echo '<script type="text/javascript">';
				echo 'function reloadPage()';
				echo '{';
					echo 'window.top.location.replace("https://macyslawsuit.com/declinetosignauthorization/?uniqueid='.$uniqueid.'&document='.$document.'");';
				echo '}';
			echo '</script>';
		
			echo '<body onload="reloadPage()">';
		}//authorization message -- close
		
		
		if ($document == 'FeeWaiver')
		{//fee waiver message -- open
			echo '<script type="text/javascript">';
				echo 'function reloadPage()';
				echo '{';
					echo 'window.top.location.replace("https://macyslawsuit.com/declinetosignfeewaiver/?uniqueid='.$uniqueid.'&document='.$document.'");';
				echo '}';
			echo '</script>';
		
			echo '<body onload="reloadPage()">';
		}//fee waiver message -- close
		
		
	}//this requires that the status level equals decline  -- close
	
	else 
	{
		echo 'Ooopps! How did you wind up here?';
	}

}//this requires that the uniqueid not be empty -- close


else 
{
	echo 'Ooopps! How did you wind up here?';
}

?>