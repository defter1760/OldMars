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
        


$message = "
Today is ".$dateNOWjason."        
";        
        
        

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
	#$mail->AddAddress($email, $FirstName. " ".$LastName);
	$mail->AddAddress('ihutchings@initiativelegal.com','Ian Hutchings');
	$mail->SetFrom('Mars_Reports@initiativelegal.com','MARS REPORTS');
	$mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
	#$mail->AddBCC("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt - 'Macy\'s Lawsuit");
	#$mail->AddCC($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
	#$mail->AddReplyTo($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
	#$mail->AddReplyTo('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
	$mail->Subject = 'MARS Macy\'s campaign: '.$dateNOWjason;
	#$mail->Subject = "$FirstName "."$LastName, ".'Thank you for signing the Attorney-Client agreement!';
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