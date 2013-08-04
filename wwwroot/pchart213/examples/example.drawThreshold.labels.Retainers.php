<?php   
 /* CAT:Misc */

 /* pChart library inclusions */
 include("../class/pData.class.php");
 include("../class/pDraw.class.php");
 include("../class/pImage.class.php");
$date = date('Y').'-'.date('m').'-'.date('d');
$datetime1 = new DateTime('2012-08-17');

$tomorrow = mktime(0, 0, 0, date("m"), date("d")-30, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);

$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-30);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}

$tomorrow = mktime(0, 0, 0, date("m"), date("d")-29, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-29);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}

$tomorrow = mktime(0, 0, 0, date("m"), date("d")-27, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-27);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}

$tomorrow = mktime(0, 0, 0, date("m"), date("d")-26, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-26);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-25, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-25);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-24, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-24);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-23, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-23);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-22, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-22);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-21, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-21);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-20, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-20);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-19, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-19);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-18, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-18);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-17, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-17);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-17, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-17);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-16, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-15);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-14, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-13);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-12, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-12);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-11, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-11);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-10, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-10);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-9, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-9);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-8, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-8);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}


$tomorrow = mktime(0, 0, 0, date("m"), date("d")-7, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-7);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-6, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-6);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-5, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-5);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-4, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-4);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-3, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-3);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-2, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-2);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-1, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);
$datetime2 = new DateTime($tomorrow);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');
if ($interval2 >="0")
{
	$tomo = mktime(0, 0, 0, date("m"), date("d")-1);
	$tomo = date("m-d", $tomo);
	$printarray[] = $tomorrowprint."(".$tomo.")";
	$datearray[] = $tomorrow;
}
$today = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
$tomorrowprint = date ('l',$today); 
$today= date("Y-m-d", $today);
$tod = mktime(0, 0, 0, date("m"), date("d"));
$tod = date("m-d", $tod);
$printarray[] = $tomorrowprint."(".$tod.")";
$datearray[] = $today;
//$tomorrow = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
//$tomorrowprint = date ('l',$tomorrow); 
//$tomorrow= date("Y-m-d", $tomorrow);
//$tomo = mktime(0, 0, 0, date("m"), date("d")+1);
//$tomo = date("m-d", $tomo);
//$printarray[] = $tomorrowprint."(".$tomo.")";
//$datearray[] = $tomorrow;
$serverName = "localhost\SPICE";
$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );

//$query = "SELECT DISTINCT
//		retainerSentDate
//		FROM (SELECT TOP 50000000 retainerSentDate FROM status
//		where retainerSentDate!='' ORDER BY retainerSentDate) DERIVEDTBL;";
//                $results = sqlsrv_query($conn,$query);

foreach($datearray as $key => $value)
{
	
	
	$currentdate = $value;
	#echo $currentdate."<Br>";
	$query2 = "SELECT count(*) as COUNT
	FROM status 
	where retainerSentDate='$currentdate';";            
	$results2 = sqlsrv_query($conn,$query2);
	while($row2 = sqlsrv_fetch_array($results2))
	{
		$countarray[] = $row2['COUNT'];
		#echo $row2['COUNT']."<br>";
	}
	$query3 = "SELECT count(*) as COUNT
	FROM status 
	where retainerSentDate='$currentdate' and retainerSent='Docusign';";            
	
	$results3 = sqlsrv_query($conn,$query3);
	while($row3 = sqlsrv_fetch_array($results3))
	{
		$docusignarray[] = $row3['COUNT'];
		#echo $row3['COUNT']."<br>";
	}
	
	$query4 = "SELECT count(*) as COUNT
	FROM status 
	where retainerSentDate='$currentdate' and retainerSent!='Docusign';";            
	
	$results4 = sqlsrv_query($conn,$query4);
	while($row4 = sqlsrv_fetch_array($results4))
	{
		$notdocusigntarray[] = $row4['COUNT'];
		#echo $row4['COUNT']."<br>";
	}
}
foreach($datearray as $key => $value)
{
	
	
	$currentdate = $value;
		
		$query2 = "SELECT count(*) as COUNT
		FROM status 
		where retainerRecievedDate='$currentdate';";            

            $results2 = sqlsrv_query($conn,$query2);
            while($row2 = sqlsrv_fetch_array($results2))
            {
		$countarray2[] = $row2['COUNT'];
            }
	    	$query3 = "SELECT count(*) as COUNT
		FROM status 
		where retainerRecievedDate='$currentdate' and retainerRecieved='Docusigned';";            

            $results3 = sqlsrv_query($conn,$query3);
            while($row3 = sqlsrv_fetch_array($results3))
            {
		$docusignarray2[] = $row3['COUNT'];
            }
	    
	       	$query4 = "SELECT count(*) as COUNT
		FROM status 
		where retainerRecievedDate='$currentdate' and retainerRecieved!='Docusigned';";            

            $results4 = sqlsrv_query($conn,$query4);
            while($row4 = sqlsrv_fetch_array($results4))
            {
		$notdocusigntarray2[] = $row4['COUNT'];
            }
}

foreach($datearray as $key => $value)
{
	
	
	$currentdate = $value;
		
		$query2 = "SELECT count(*) as COUNT
		FROM status 
		where authformreceiveddate='$currentdate';";            

            $results2 = sqlsrv_query($conn,$query2);
            while($row2 = sqlsrv_fetch_array($results2))
            {
		$countarray3[] = $row2['COUNT'];
            }
	    	$query3 = "SELECT count(*) as COUNT
		FROM status 
		where onlinecompleteday='$currentdate';";            

            $results3 = sqlsrv_query($conn,$query3);
            while($row3 = sqlsrv_fetch_array($results3))
            {
		$docusignarray3[] = $row3['COUNT'];
            }
	    
	    	$queryhit = "SELECT count(*) as COUNT
		from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and date='$currentdate' and ref like '%macyslawsuit.com/';";          

            $resultshit = sqlsrv_query($conn,$queryhit);
            while($rowhit = sqlsrv_fetch_array($resultshit))
            {
		$hitsarray[] = $rowhit['COUNT'];
            }
}

foreach($datearray as $key => $value)
{
	
	
	$currentdate = $value;
		
		$query2 = "SELECT count(*) as COUNT
		FROM status 
		where authformsentdate='$currentdate';";            

            $results2 = sqlsrv_query($conn,$query2);
            while($row2 = sqlsrv_fetch_array($results2))
            {
		$countarray4[] = $row2['COUNT'];
            }
	    	$query3 = "SELECT count(*) as COUNT
		FROM status 
		where authformsentdate='$currentdate' and authformsent='Docusign';";            

            $results3 = sqlsrv_query($conn,$query3);
            while($row3 = sqlsrv_fetch_array($results3))
            {
		$docusignarray4[] = $row3['COUNT'];
            }
	    
	       	$query4 = "SELECT count(*) as COUNT
		FROM status 
		where shortFormCompletePhoneDate='$currentdate';";            

            $results4 = sqlsrv_query($conn,$query4);
            while($row4 = sqlsrv_fetch_array($results4))
            {
		$notdocusigntarray4[] = $row4['COUNT'];
            }
}
foreach($datearray as $key => $value)
{
	
	
	$currentdate = $value;
		
		$query2 = "SELECT count(*) as COUNT
		FROM status 
		where feewaiversentdate='$currentdate';";            

            $results2 = sqlsrv_query($conn,$query2);
            while($row2 = sqlsrv_fetch_array($results2))
            {
		$countarray5[] = $row2['COUNT'];
            }
	    	$query3 = "SELECT count(*) as COUNT
		FROM status 
		where feewaiversentdate='$currentdate' and feewaiversent='Docusign';";            

            $results3 = sqlsrv_query($conn,$query3);
            while($row3 = sqlsrv_fetch_array($results3))
            {
		$docusignarray5[] = $row3['COUNT'];
            }
	    
	       	$query4 = "SELECT count(*) as COUNT
		FROM status 
		where feewaiversentdate='$currentdate' and feewaiversent!='Docusign';";            

            $results4 = sqlsrv_query($conn,$query4);
            while($row4 = sqlsrv_fetch_array($results4))
            {
		$notdocusigntarray5[] = $row4['COUNT'];
            }
}
foreach($datearray as $key => $value)
{
	
	
	$currentdate = $value;
		
		$query2 = "SELECT count(*) as COUNT
		FROM status 
		where feewaiverreceiveddate='$currentdate';";            

            $results2 = sqlsrv_query($conn,$query2);
            while($row2 = sqlsrv_fetch_array($results2))
            {
		$countarray6[] = $row2['COUNT'];
            }
	    	$query3 = "SELECT count(*) as COUNT
		FROM status 
		where feewaiverreceiveddate='$currentdate' and feewaiverreceived='Docusigned';";            

            $results3 = sqlsrv_query($conn,$query3);
            while($row3 = sqlsrv_fetch_array($results3))
            {
		$docusignarray6[] = $row3['COUNT'];
            }
	    
	       	$query4 = "SELECT count(*) as COUNT
		FROM status 
		where feewaiverreceiveddate='$currentdate' and feewaiverreceived!='Docusigned';";            

            $results4 = sqlsrv_query($conn,$query4);
            while($row4 = sqlsrv_fetch_array($results4))
            {
		$notdocusigntarray6[] = $row4['COUNT'];
            }
}
//print('<pre>');
//print_r($datearray);
//print_r($countarray);
//print_r($docusigntarray);
//print_r($notdocusigntarray);
//print('</pre>');
//print_r(array_keys($datearray));
//echo "<br><br>";
//print_r(array_values($datearray)); 





	
 /* Create and populate the pData object */
$MyData = new pData();  
#$MyData->addPoints($countarray,"Sent");
#$MyData->addPoints($countarray,"RTNR-Sent");
$MyData->addPoints($docusignarray,"Retainer Sent - Docusign");
$MyData->addPoints($notdocusigntarray,"Retainer Sent - Mailroom");

#$MyData->addPoints($countarray2,"RTNR-Received");
$MyData->addPoints($docusignarray2,"Retainer Received - Docusign");
$MyData->addPoints($notdocusigntarray2,"Retainer Received - Mailroom");

#$MyData->addPoints($hitsarray,"Web hits");
#$MyData->addPoints($docusignarray3,"Short form completed - Web");
#$MyData->addPoints($notdocusigntarray3,"AUTH-Received Mailroom");

#$MyData->addPoints($countarray4,"AUTH-Sent");
#$MyData->addPoints($docusignarray4,"Short form completed - Phone");
#$MyData->addPoints($notdocusigntarray4,"Short form completed - Phone");


#$MyData->addPoints($countarray5,"FEWA-Sent");
#$MyData->addPoints($docusignarray5,"FEWA-Sent Docusign");
#$MyData->addPoints($notdocusigntarray5,"FEWA-Sent Mailroom");

#$MyData->addPoints($countarray6,"FEWA-Received");
#$MyData->addPoints($docusignarray6,"FEWA-Received Docusign");
#$MyData->addPoints($notdocusigntarray6,"FEWA-Received Mailroom");


# $MyData->addPoints(array($jan12,$feb12,$mar12,$apr12,$may12,$jun12,$jul12,$aug12,$sep12,$oct12,$nov12,$dec12),"Rcvd");
 #$MyData->setAxisName(0,"Productivity");
 $MyData->addPoints($printarray,"Labels");
 $MyData->setSerieDescription("Labels","Months");

 $MyData->setAbscissa("Labels");
$MyData->setPalette('Web hits',array("R"=>55,"G"=>91,"B"=>255));
 
 /* Create the pChart object */
 $myPicture = new pImage(1300,710,$MyData);
 
//  $Settings = array("Pos"=>SCALE_POS_LEFTRIGHT
//, "Mode"=>SCALE_MODE_FLOATING
//, "LabelingMethod"=>LABELING_ALL
//, "GridR"=>255, "GridG"=>255, "GridB"=>255, "GridAlpha"=>50, "TickR"=>0, "TickG"=>0, "TickB"=>0, "TickAlpha"=>50, "LabelRotation"=>90, "CycleBackground"=>1, "DrawXLines"=>1, "DrawSubTicks"=>1, "SubTickR"=>255, "SubTickG"=>0, "SubTickB"=>0, "SubTickAlpha"=>50, "DrawYLines"=>ALL);
//$myPicture->drawScale($Settings);
 
 $myPicture->drawGradientArea(0,0,1300,710,DIRECTION_VERTICAL,array("StartR"=>100,"StartG"=>100,"StartB"=>100,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
 $myPicture->drawGradientArea(0,0,1300,710,DIRECTION_HORIZONTAL,array("StartR"=>100,"StartG"=>100,"StartB"=>100,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>20));
 $myPicture->drawGradientArea(0,0,60,710,DIRECTION_HORIZONTAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));

 /* Do some cosmetics */
  
 #$myPicture->drawLine(60,0,60,630,array("R"=>70,"G"=>70,"B"=>70));
 #$myPicture->drawLine(60,0,60,630,array("R"=>70,"G"=>70,"B"=>255));
 #$myPicture->drawRectangle(0,0,1299,629,array("R"=>0,"G"=>0,"B"=>0));
 #$myPicture->setFontProperties(array("FontName"=>"../fonts/Forgotte.ttf","FontSize"=>9));
 #$myPicture->drawText(35,115,"Productivity",array("R"=>255,"G"=>255,"B"=>255,"FontSize"=>20,"Angle"=>90,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));

 /* Prepare the chart area */
 $myPicture->setGraphArea(100,30,1280,590);
 $myPicture->drawFilledRectangle(100,30,1280,590,array("R"=>255,"G"=>255,"B"=>255,"Alpha"=>20));
 $myPicture->setFontProperties(array("R"=>255,"G"=>255,"B"=>255,"FontName"=>"../fonts/pf_arma_five.ttf","FontSize"=>9));
 $myPicture->drawScale(array("AxisR"=>255,"AxisG"=>255,"AxisB"=>255,"DrawSubTicks"=>TRUE,"CycleBackground"=>TRUE,"LabelRotation"=>70,));

 /* Write two thresholds over the chart */
# $myPicture->drawThreshold(10,array("WriteCaption"=>TRUE,"Caption"=>"Agreed SLA","NoMargin"=>TRUE));
# $myPicture->drawThreshold(15,array("WriteCaption"=>TRUE,"Caption"=>"Best effort","NoMargin"=>TRUE));

 /* Draw one static X threshold area */
 #$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>30));
# $myPicture->drawXThresholdArea("Saturday(08-18)","Saturday(08-18)",array("AreaName"=>"5000 Post cards","R"=>255,"G"=>100,"B"=>154,"Alpha"=>40));
#$myPicture->drawXThreshold($datearray[2],array("Alpha"=>70,"Ticks"=>2,"R"=>0,"G"=>0,"B"=>255));
$myPicture->drawXThreshold("Friday(08-17)",array("ValueIsLabel"=>TRUE,"WriteCaption"=>TRUE,"Caption"=>"5000 Post cards","Alpha"=>70,"Ticks"=>5));
$myPicture->drawXThreshold("Wednesday(08-22)",array("ValueIsLabel"=>TRUE,"WriteCaption"=>TRUE,"Caption"=>"5000 Post cards","Alpha"=>70,"Ticks"=>5));
$myPicture->drawXThreshold("Friday(08-24)",array("ValueIsLabel"=>TRUE,"WriteCaption"=>TRUE,"Caption"=>"10000 Post cards","Alpha"=>70,"Ticks"=>5));
$myPicture->drawXThreshold("Monday(08-27)",array("ValueIsLabel"=>TRUE,"WriteCaption"=>TRUE,"Caption"=>"10000 Post cards","Alpha"=>70,"Ticks"=>5));
$myPicture->drawXThreshold("Tuesday(08-29)",array("ValueIsLabel"=>TRUE,"WriteCaption"=>TRUE,"Caption"=>"10000 Post cards","Alpha"=>70,"Ticks"=>5));
 #$myPicture->drawXThresholdArea(4.5,5,array("AreaName"=>"Macy's Go Live","R"=>226,"G"=>194,"B"=>54,"Alpha"=>40));
 $myPicture->setShadow(FALSE);

 /* Draw the chart */
 $myPicture->drawSplineChart();
 $myPicture->drawPlotChart(array("PlotSize"=>5,"PlotBorder"=>TRUE));

 /* Write the data bounds */
 $myPicture->writeBounds();

 

 
 
 /* Write the chart legend */ 
 ##$myPicture->drawLegend(100,615,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
 $myPicture->setFontProperties(array("R"=>255,"G"=>255,"B"=>255,"FontName"=>"../fonts/pf_arma_five.ttf","FontSize"=>12));
$myPicture->drawLegend(110,45,array("BoxWidth"=>30,"BoxHeight"=>30,"BoxSize"=>4,"R"=>01,"G"=>01,"B"=>01,"Surrounding"=>20,"Alpha"=>30,"Family"=>LEGEND_FAMILY_CIRCLE));
#$myPicture->drawLegend(100,615,array("Alpha"=>30,"R"=>01,"G"=>01,"B"=>01,"Style"=>LEGEND_BOX,"Mode"=>LEGEND_HORIZONTAL,"BoxWidth"=>30,"Family"=>LEGEND_FAMILY_LINE));
 /* Render the picture (choose the best way) */
 $myPicture->autoOutput("pictures/example.drawThreshold.labels.png");
?>