<?PHP

$serverName = "localhost\SPICE";
$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );

$dateNOW = date('Y').'-'.date('m').'-'.date('d');
$dateNOWjason = date('m').'/'.date('d').'/'.date('Y');
$timeNOW = date('H').':'.date('i').':'.date('s');
$monthNOW = date('Y').'-'.date('m');
$weekNOW = date('Y').'-'.date('W');

$hourNOW = date('G');




$noneofus = "ip!='4.59.60.154' and ip!='216.55.20.70'";

    $today = mktime(0, 0, 0,date('m'), date('d'), date('Y'));
    $today= date("Y-m-d", $today);
    
    
    $yesterday = mktime(0, 0, 0,  date('m'), date('d')-1, date('Y'));
    $yesterday= date("Y-m-d", $yesterday);
    
    $daybeforeyesterday = mktime(0, 0, 0,  date('m'), date('d')-2, date('Y'));
    $daybeforeyesterday = date("Y-m-d", $daybeforeyesterday);
    
    $daybeforeyesterday2 = mktime(0, 0, 0,  date('m'), date('d')-3, date('Y'));
    $daybeforeyesterday2 = date("Y-m-d", $daybeforeyesterday2);
    
    $daybeforeyesterday3 = mktime(0, 0, 0,  date('m'), date('d')-4, date('Y'));
    $daybeforeyesterday3 = date("Y-m-d", $daybeforeyesterday3);
    
    $daybeforeyesterday4 = mktime(0, 0, 0,  date('m'), date('d')-5, date('Y'));
    $daybeforeyesterday4 = date("Y-m-d", $daybeforeyesterday4);
    
    $daybeforeyesterday5 = mktime(0, 0, 0,  date('m'), date('d')-6, date('Y'));
    $daybeforeyesterday5 = date("Y-m-d", $daybeforeyesterday5);
    
    $daybeforeyesterday6 = mktime(0, 0, 0,  date('m'), date('d')-7, date('Y'));
    $daybeforeyesterday6 = date("Y-m-d", $daybeforeyesterday6);
    
#   $value= 'https://macyslawsuit.com/afterretainer/%';
$value= "https://macyslawsuit.com/after-online-survey/%' and ".$noneofus;

//Short form online row

        $lastseven = "onlinecompleteday='".$yesterday."' or onlinecompleteday='".$daybeforeyesterday."' or onlinecompleteday='".$daybeforeyesterday2."' or onlinecompleteday='".$daybeforeyesterday3."' or onlinecompleteday='".$daybeforeyesterday4."' or onlinecompleteday='".$daybeforeyesterday5."' or onlinecompleteday='".$daybeforeyesterday6."' or onlinecompleteday='".$today."'";
        
        $lastyesterday = "onlinecompleteday='".$yesterday."'";	
        $lasttotal = "onlinecompleteday is not null";	
        $lasttoday = "onlinecompleteday='".$today."'";
        
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lastseven;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformweek = $row['COUNT'];
                }
        
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lastyesterday;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformyesterday = $row['COUNT'];
                }
        
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lasttoday;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformtoday = $row['COUNT'];
                }
                
                
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lasttotal;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $lasttotal = $row['COUNT'];
                }
                
             
//Short form online row -- END        

//Short form online row

        $lastsevenP1 = "shortFormCompletePhoneDate='".$yesterday."' or shortFormCompletePhoneDate='".$daybeforeyesterday."' or shortFormCompletePhoneDate='".$daybeforeyesterday2."' or shortFormCompletePhoneDate='".$daybeforeyesterday3."' or shortFormCompletePhoneDate='".$daybeforeyesterday4."' or shortFormCompletePhoneDate='".$daybeforeyesterday5."' or shortFormCompletePhoneDate='".$daybeforeyesterday6."' or shortFormCompletePhoneDate='".$today."'";
        
        $lastyesterdayP1 = "shortFormCompletePhoneDate='".$yesterday."'";	
        $lasttotalP1 = "shortFormCompletePhoneDate is not null";	
        $lasttodayP1 = "shortFormCompletePhoneDate='".$today."'";
        
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lastsevenP1;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformweekP1 = $row['COUNT'];
                }
        
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lastyesterdayP1;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformyesterdayP1 = $row['COUNT'];
                }
        
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lasttodayP1;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformtodayP1 = $row['COUNT'];
                }
                
                
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lasttotalP1;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $lasttotalP1 = $row['COUNT'];
                }
                
             
//Short form online row -- END           
        
//Retainers online row

        $lastseven2 = "retaineracceptdate='".$yesterday."' or retaineracceptdate='".$daybeforeyesterday."' or retaineracceptdate='".$daybeforeyesterday2."'  or retaineracceptdate='".$daybeforeyesterday3."' or retaineracceptdate='".$daybeforeyesterday4."' or retaineracceptdate='".$daybeforeyesterday5."' or retaineracceptdate='".$daybeforeyesterday6."' or retaineracceptdate='".$today."' ";
        
        $lastyesterday2 = "retaineracceptdate='".$yesterday."' ";	
        $lasttotal2 = "retaineracceptdate is not null";	
        $lasttoday2 = "retaineracceptdate='".$today."'";
        
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lastseven2;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformweek2 = $row['COUNT'];
                }
        
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lastyesterday2;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformyesterday2 = $row['COUNT'];
                }
        
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lasttoday2;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformtoday2 = $row['COUNT'];
                }
                
                
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lasttotal2;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $lasttotal2 = $row['COUNT'];
                }



//Retainers online row -- END

//Retainers online sent

        $lastsevenR2 = "retainerSentDate='".$yesterday."' and retainerSent='Docusign' or retainerSentDate='".$daybeforeyesterday."' and retainerSent='Docusign' or retainerSentDate='".$daybeforeyesterday2."' and retainerSent='Docusign' or retainerSentDate='".$daybeforeyesterday3."' and retainerSent='Docusign' or retainerSentDate='".$daybeforeyesterday4."' and retainerSent='Docusign' or retainerSentDate='".$daybeforeyesterday5."' and retainerSent='Docusign' or retainerSentDate='".$daybeforeyesterday6."' and retainerSent='Docusign' or retainerSentDate='".$today."' and retainerSent='Docusign' ";
        
        $lastyesterdayR2 = "retainerSentDate='".$yesterday."' and retainerSent='Docusign' ";	
        $lasttotalR2 = "retainerSent='Docusign'";	
        $lasttodayR2 = "retainerSentDate='".$today."' and retainerSent='Docusign'";
        
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lastsevenR2;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformweekR2 = $row['COUNT'];
                }
        
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lastyesterdayR2;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformyesterdayR2 = $row['COUNT'];
                }
        
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lasttodayR2;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformtodayR2 = $row['COUNT'];
                }
                
                
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lasttotalR2;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $lasttotalR2 = $row['COUNT'];
                }



//Retainers online sent -- END

//Retainers online sent

        $lastsevenR3 = "SentDate='".$yesterday."' and DocumentType='Retainer' or SentDate='".$daybeforeyesterday."' and DocumentType='Retainer' or SentDate='".$daybeforeyesterday2."' and DocumentType='Retainer' or SentDate='".$daybeforeyesterday3."' and DocumentType='Retainer' or SentDate='".$daybeforeyesterday4."' and DocumentType='Retainer' or SentDate='".$daybeforeyesterday5."' and DocumentType='Retainer' or SentDate='".$daybeforeyesterday6."' and DocumentType='Retainer' or SentDate='".$today."' and DocumentType='Retainer' ";
        
        $lastyesterdayR3 = "SentDate='".$yesterday."' and DocumentType='Retainer' ";	
        $lasttotalR3 = "DocumentType='Retainer'";	
        $lasttodayR3 = "SentDate='".$today."' and DocumentType='Retainer'";
        
                $query = "SELECT COUNT(*) as COUNT FROM Tbl_MailRoomOut where $lastsevenR3;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformweekR3 = $row['COUNT'];
                }
        
                $query = "SELECT COUNT(*) as COUNT FROM Tbl_MailRoomOut where $lastyesterdayR3;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformyesterdayR3 = $row['COUNT'];
                }
        
                $query = "SELECT COUNT(*) as COUNT FROM Tbl_MailRoomOut where $lasttodayR3;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformtodayR3 = $row['COUNT'];
                }
                
                
                $query = "SELECT COUNT(*) as COUNT FROM Tbl_MailRoomOut where $lasttotalR3;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $lasttotalR3 = $row['COUNT'];
                }



//Retainers online sent -- END
        
//longform online row

        $lastseven3 = "longformcompleteonlinedate='".$yesterday."' or longformcompleteonlinedate='".$daybeforeyesterday."' or longformcompleteonlinedate='".$daybeforeyesterday2."' or longformcompleteonlinedate='".$daybeforeyesterday3."' or longformcompleteonlinedate='".$daybeforeyesterday4."' or longformcompleteonlinedate='".$daybeforeyesterday5."' or longformcompleteonlinedate='".$daybeforeyesterday6."' or longformcompleteonlinedate='".$today."'";
        
        $lastyesterday3 = "longformcompleteonlinedate='".$yesterday."'";	
        $lasttotal3 = "longformcompleteonlinedate is not null";	
        $lasttoday3 = "longformcompleteonlinedate='".$today."'";
        
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lastseven3;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformweek3 = $row['COUNT'];
                }
        
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lastyesterday3;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformyesterday3 = $row['COUNT'];
                }
        
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lasttoday3;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformtoday3 = $row['COUNT'];
                }
                
                
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lasttotal3;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $lasttotal3 = $row['COUNT'];
                }



//longform online row -- END  


//longform phone row

        $lastseven4 = "longformcompleteonphonedate='".$yesterday."' or longformcompleteonphonedate='".$daybeforeyesterday."' or longformcompleteonphonedate='".$daybeforeyesterday2."' or longformcompleteonphonedate='".$daybeforeyesterday3."' or longformcompleteonphonedate='".$daybeforeyesterday4."' or longformcompleteonphonedate='".$daybeforeyesterday5."' or longformcompleteonphonedate='".$daybeforeyesterday6."' or longformcompleteonphonedate='".$today."'";
        
        $lastyesterday4 = "longformcompleteonphonedate='".$yesterday."'";	
        $lasttotal4 = "longformcompleteonphonedate is not null";	
        $lasttoday4 = "longformcompleteonphonedate='".$today."'";
        
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lastseven4;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformweek4 = $row['COUNT'];
                }
        
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lastyesterday4;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformyesterday4 = $row['COUNT'];
                }
        
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lasttoday4;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $aftershortformtoday4 = $row['COUNT'];
                }
                
                
                $query = "SELECT COUNT(*) as COUNT FROM Status where $lasttotal4;";		
        
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                        $lasttotal4 = $row['COUNT'];
                }



//Authorizations online row -- END  



$message = "
Today is ".$dateNOWjason."        
<br>        
<table border='2' bgcolor=white bordercolor=black cellpadding='2' cellspacing='2'>\n
    <tr>
        <th>

        </th>
        <th width='100'>
            Today
        </th>
        <th width='100'>
            Yesterday
        </th>
        <th width='100'>
            Last 7 days
        </th>
        <th width='100'>
            Total
        </th>
    </tr>
    <tr>
        <td>
        Short form completed - Website
        </td>
        <td>
            $aftershortformtoday
        </td>
        <td>
            $aftershortformyesterday
        </td>
        <td>
            $aftershortformweek
        </td>             
        <td>
            $lasttotal
        </td>
    </tr>
    <tr>
        <td>
        Short form completed - Phone
        </td>
        <td>
            $aftershortformtodayP1
        </td>
        <td>
            $aftershortformyesterdayP1
        </td>
        <td>
            $aftershortformweekP1
        </td>             
        <td>
            $lasttotalP1
        </td>
    </tr>    
    <tr>
        <td>
        Retainers sent Docusign
        </td>
        <td>
            $aftershortformtodayR2
        </td>
        <td>
            $aftershortformyesterdayR2
        </td>
        <td>
            $aftershortformweekR2
        </td>        
        <td>
            $lasttotalR2
        </td>
    </tr>
    
    <tr>
        <td>
        Retainers sent Mailroom
        </td>
        <td>
            $aftershortformtodayR3
        </td>
        <td>
            $aftershortformyesterdayR3
        </td>
        <td>
            $aftershortformweekR3
        </td>        
        <td>
            $lasttotalR3
        </td>
    </tr>
    <tr>
        <td>
        Retainers Accepted
        </td>
        <td>
            $aftershortformtoday2
        </td>
        <td>
            $aftershortformyesterday2
        </td>
        <td>
            $aftershortformweek2
        </td>        
        <td>
            $lasttotal2
        </td>
    </tr>    
    <tr>
        <td>
        Long form completed - Website
        </td>
        <td>
            $aftershortformtoday3
        </td>
        <td>
            $aftershortformyesterday3
        </td>
        <td>
            $aftershortformweek3
        </td>        
        <td>
            $lasttotal3
        </td>
    <tr>
        <td>
        Long form completed - Phone
        </td>
        <td>
            $aftershortformtoday4
        </td>
        <td>
            $aftershortformyesterday4
        </td>
        <td>
            $aftershortformweek4
        </td>        
        <td>
            $lasttotal4
        </td>
    </tr>        
</table>
<br><br>
<br><br>

<img src='http://dfwms01.initiativelegal.com/pchart213/examples/example.drawThreshold.labels.hitsbyhourofdaybyWeekday.php'>
<img src='http://dfwms01.initiativelegal.com/pchart213/examples/example.draw2DRingValues.AgeDemographics.php'>
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
        #$mail->AddAddress('jcheek@initiativelegal.com','Jason Cheek');
        //$mail->AddAddress('vchetty@initiativelegal.com','VJ Chetty');
        //$mail->AddAddress('mprimo@initiativelegal.com','Marc Primo');
        //$mail->AddAddress('DBolton@initiativelegal.com','Dan Bolton');
        //$mail->AddAddress('DGlucksman@initiativelegal.com','Dina Glucksman');        
        //$mail->AddAddress('MBalderrama@initiativelegal.com','Monica Balderrama');
        //$mail->AddAddress('HCox@initiativelegal.com','Heather Cox');
        //$mail->AddAddress('MChang@initiativelegal.com','Mercy Chang');
        //$mail->AddAddress('NGrether@initiativelegal.com','Nicholas Grether');
        //$mail->AddAddress('MLee@initiativelegal.com','Michelle Lee ');
        //$mail->AddAddress('HZak@initiativelegal.com','Heather Zak');
        //$mail->AddAddress('FZakaria@initiativelegal.com','Farid Zakaria');
        //$mail->AddAddress('JTrejo@initiativelegal.com','Jose JT. Trejo');
	$mail->SetFrom('Mars_Reports@initiativelegal.com','MARS REPORTS');
	$mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
	#$mail->AddBCC("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt - 'Macy\'s Lawsuit");
	#$mail->AddCC($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
	#$mail->AddReplyTo($assignedattorneyemail, $assignedattorneyfname.' '.$assignedattorneylname);
	#$mail->AddReplyTo('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
	$mail->Subject = 'Graph from Ian';
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