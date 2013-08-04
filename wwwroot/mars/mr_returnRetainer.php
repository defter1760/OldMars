<?PHP
require("headerMailroom.php");
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
$year = date('Y');
?>

<link rel="stylesheet" href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/marsParent.css" type="text/css" />

<div align='left'>

<?PHP
//echo "<div align=left>"; 
//echo "<a href='mr_outlist.php' > Outstanding requests </a> &nbsp&nbsp&nbsp&nbsp&nbsp<a href='mr_outgoing.php' > Send a document </a> &nbsp&nbsp&nbsp&nbsp&nbsp<a href='undeliverable.php' > Receive undeliverables </a> &nbsp&nbsp&nbsp&nbsp&nbsp<a href='undeliverable.php' > Refresh </a>";
//echo "<br>";
//echo "</div>";
//echo "<img src='/mars/test/img/MARS_Search_50_percent.png'><Br><h1>Mailroom</h1>";

if (isset($_POST['mediatype'])) $mediatype = $_POST['mediatype'];
if (empty($mediatype)) unset($mediatype);

if (isset($_POST['Scannerinitiatls'])) $scannerinitiatls = $_POST['Scannerinitiatls'];
if (empty($scannerinitiatls)) unset($scannerinitiatls);

if (isset($_POST['Othertype'])) $othertype = $_POST['Othertype'];
if (empty($othertype)) unset($othertype);

//if (isset($_POST['Barcode']))
//{
//    $barcodeprevious = $_POST['Barcode'];
//    if (empty($barcodeprevious)) unset($barcodeprevious);
//    if (isset($barcodeprevious))
//    {
//        $query = "IF EXISTS (SELECT FirstName,LastName,barcode,uniqueid,agentlname FROM Status WHERE
//        barcode='$barcodeprevious' AND TIME IS NOT NULL) UPDATE status set addressisundeliverable='Yes',addressisundeliverabledate='$date',addressisundeliverableweek='$week',addressisundeliverablemonth='$month' where barcode='$barcodeprevious' AND TIME IS NOT NULL";
//        $sql = sqlsrv_query($conn,$query);
//        
//        $query = "SELECT notelog FROM Status WHERE barcode='$barcodeprevious'";
//        $results = sqlsrv_query($conn,$query);
//
//	while($row = sqlsrv_fetch_array($results)){
//
//        $notelog = $row['notelog']; if (empty($notelog)) unset($notelog);
//        }
//        if ($mediatype == 'Other')
//        {
//            $newnote = $othertype.' returned Address is undeliverable -'.$scannerinitiatls.'-';    
//        }
//        else
//        {
//            $newnote = $mediatype.' returned Address is undeliverable -'.$scannerinitiatls.'-';    
//        }
//        
//        if(strstr($newnote,'\''))
//        {
//            $newnote = str_replace('\'','\'\'',$newnote);
//        }
//        if(strstr($newnote,'\"'))
//        {
//            $newnote = str_replace('\"','\"\"',$newnote);
//        }
//        $notelog = str_replace('\'','\'\'',$notelog);
//        $dateadd = date('Y').'-'.date('m').'-'.date('d');
//        $timeadd = date('H').':'.date('i').':'.date('s');
//        $notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;
//        $query = "UPDATE status set notelog='$notestring' WHERE barcode='$barcodeprevious'";
//        $results = sqlsrv_query($conn,$query);
//    }
//}

		//if (isset($barcodeprevious))
		//{
		//	$query = "SELECT agentlname from status where barcode='$barcodeprevious'";
		//	$results = sqlsrv_query($conn,$query);
		//		while ($row = sqlsrv_fetch_array($results)){
		//			$assignedAgent = $row['agentlname'];
		//			if (empty($assignedAgent)) unset($assignedAgent);
		//		}
		//		if (isset($assignedAgent))
		//		{
		//		    if ($assignedAgent != 'NULL')
		//		    {
		//			    $query = "select attorneyfname,attorneylname,attorneyemail,username,password from tbl_attorneyassign where attorneylname='$assignedAgent';";
		//			    $results = sqlsrv_query($conn,$query);
		//				    while($row = sqlsrv_fetch_array($results))
		//				    {
		//					    $assignedattorneylname = $row['attorneylname']; if (empty($assignedattorneylname)) unset($assignedattorneylname);
		//					    $assignedattorneyfname = $row['attorneyfname']; if (empty($assignedattorneyfname)) unset($assignedattorneyfname);
		//					    $assignedattorneyemail = $row['attorneyemail']; if (empty($assignedattorneyemail)) unset($assignedattorneyemail);
		//					    $attorneyusername = $row['username']; if (empty($attorneyusername)) $attorneyusername = 'macyslawsuit';
		//					    $attorneypassword = $row['password']; if (empty($attorneypassword)) $attorneypassword = 'PLS1234!';
		//					    
		//				    }	
		//			    $message = '
		//				    <table align="center" width="600">
		//					    <tr>
		//						    <td>
		//							    <p>UNDELIVERABLE!!!!!</p>
		//						    </td>
		//					    </tr>
		//				    </table>				
		//			    ';
					    
    //	uncomment for testing purposed only				
    //					$email = "mrauen@initiativelegal.com";
    //					$FirstName = "Melaina";
    //					$LastName = "Rauen";
					    
		//			    require_once('class.phpmailer.php');
		//			    $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
		//			    
		//			    $mail->IsSMTP(); // telling the class to use SMTP
		//			    
		//			    try 
		//			    {
		//				    $mail->Host       = "mail1.domain.initiativelegal.com"; // SMTP server
		//				    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
		//				    $mail->SMTPAuth   = true;                  // enable SMTP authentication
		//				    $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
		//				    $mail->Username   = "macyslawsuit"; // SMTP account username
		//				    $mail->Password   = "PLS1234!";        // SMTP account password
		//				    $mail->AddReplyTo('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
		//				    $mail->AddAddress($email,$FirstName." ".$LastName);
		//				    $mail->SetFrom('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
		//				    $mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
		//				    $mail->AddBCC("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt - 'Macy\'s Lawsuit");
		//				    $mail->AddCC('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
		//				    $mail->AddReplyTo('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
		//				    $mail->Subject = 'Macy\'s Lawsuit - Fee Waiver enclosed';
		//				    $mail->MsgHTML($message);
		//				    $mail->Send();
		//				    echo "</p>\n";
		//			    } 
		//			    catch (Exception $e) 
		//			    
		//			    {
		//			    echo $e->getMessage(); //Boring error messages from anything else!
		//			    }
		//		    }
		//}
		//	}
			


	//echo "<div align='center'>";
	//echo "<img src='/mars/test/img/MARS_Search_50_percent.png'>";
	//echo "</div>";
	
	echo "<div id='main'>";
echo "<FORM NAME ='form2' METHOD ='POST' ACTION='mr_drawReturnRetainer.php' target='mr_drawReturnRetainer'>";
echo "<table cellspacing='2' cellpadding='10' width='100%' height='100px' align='left' >";
echo "<tr>";
echo "<td align='left'>";
#radiobuttonmake($var,$val,$description)
radiobuttonmake('Type','Accepted','Accepted');
radiobuttonmake('Type','Rejected','Rejected');

#Media type radio
#echo "Media type: &nbsp;";
//if (isset($mediatype))
//{
//    
//    if ( $mediatype == 'Postcard' )
//
//    {
//        echo "<INPUT TYPE = 'Radio' Name ='mediatype'  value='Postcard' checked> Postcard &nbsp;";
//    }
//    else
//    {
//        echo "<INPUT TYPE = 'Radio' Name ='mediatype'  value='Postcard' > Postcard &nbsp;";
//    }
//    
//    if ($mediatype == "Retainer")
//    {
//        echo "<INPUT TYPE = 'Radio' Name='mediatype'  value='Retainer' checked> Attorney-Client Agreement &nbsp;";
//    }
//    else
//    {
//        echo "<INPUT TYPE = 'Radio' Name='mediatype'  value='Retainer' > Attorney-Client Agreement &nbsp;";
//    }
//    
//    if ($mediatype == "Other")
//    {
//        echo "<INPUT TYPE = 'Radio' Name='mediatype'  value='Other' checked> Other &nbsp;";
//        if (isset($othertype))
//        {
//                echo "Other type:<INPUT TYPE = 'text' Name='Othertype' value='".$othertype."' style='width:200px; height:25px'>";
//        }
//        else
//        {
//                echo "Other type:<INPUT TYPE = 'text' Name='Othertype' value='' style='width:200px; height:25px'>";
//        }
//    }
//    else
//    {
//        echo "<INPUT TYPE = 'Radio' Name ='mediatype'  value='Other' > Other &nbsp;";
//        echo "Other type:&nbsp; <INPUT TYPE = 'text' Name='Othertype' value='' style='width:200px; height:25px'>";
//    }
//    
//}
//else
//{
//    #echo "Hello";
//    echo "<INPUT TYPE = 'Radio' Name='mediatype' value='Postcard' checked> Postcard ";
//    echo "<INPUT TYPE = 'Radio' Name='mediatype' value='Retainer' > Attorney-Client Agreement ";
//    echo "<INPUT TYPE = 'Radio' Name='mediatype' value='Other' > Other ";
//    echo "Other type: &nbsp;<INPUT TYPE = 'text' Name='Othertype' value='' style='width:200px; height:25px'>";
//    
//}
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align='left'>";
#Initials text field
#echo "Scanning Initials: ";

//if (isset($scannerinitiatls))
//{
//        echo "<INPUT TYPE = 'text' Name='Scannerinitiatls' value='".$scannerinitiatls."' style='width:200px; height:25px'>";
//}
//else
//{
//        echo "<INPUT TYPE = 'text' Name='Scannerinitiatls' value='' style='width:200px; height:25px'>";
//}
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td valign='top'>";
#Barcode field
echo "Scan barcode: ";

#if (isset($scannerinitiatls))
#{
#        echo "<INPUT TYPE = 'text' Name='Scannerinitiatls' value='".$scannerinitiatls."' style='width:200px; height:25px'>";
#}
#else
#{
        echo "<INPUT TYPE = 'text' Name='uniqueid' id='barcode' value='' style='width:200px; height:25px'>";
        echo "<script>document.getElementById('barcode').focus()</script>";
        //echo "<br>";
        echo "&nbsp;&nbsp;<INPUT TYPE = 'Submit' Name = 'Submit1' style='height:25px; font-size:16px' VALUE = 'Scan' />";
#}
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align='left'>";
//echo "Previously scanned:";
//echo "<br>";
//if (isset($barcodeprevious))
//{
//    echo "Last scanned: ";
//    echo $barcodeprevious;
//   // echo "<br>";
//    echo "</div>";
//}
?>
<?php
        #$query = "SELECT FirstName,LastName,barcode,uniqueid,agentlname FROM Status WHERE
        #addressisundeliverabledate='$date' AND TIME IS NOT NULL";
    
        #$sql = sqlsrv_query($conn,$query);
        #$params = array();
		#$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
		#$stmt = sqlsrv_query( $conn, $query , $params, $options );
		#$row_count = sqlsrv_num_rows( $stmt );
        echo "<br>";
//        echo "<div align='left'>";
//        
//        echo "</div>";
        echo "<div id='main2'>";
        echo "<table border='1' bordercolor='#000000' style='background-color:#FFFFFF' cellpadding='2' cellspacing='0'>";
        echo "<tr>";
        echo "<iframe name='mr_drawReturnRetainer' scrolling='auto' width='100%' height='600' frameborder='1' style='margin:auto; min-width: 920px;'></iframe>";
        echo "</tr>";


    echo "</div>";
    echo "</table>";  
	
	
	
	
	
	

	


?>
