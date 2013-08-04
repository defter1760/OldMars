<?php   
 /* CAT:Misc */

 /* pChart library inclusions */
 include("../class/pData.class.php");
 include("../class/pDraw.class.php");
 include("../class/pImage.class.php");
$date = date('Y').'-'.date('m').'-'.date('d');

$tomorrow = mktime(0, 0, 0, date("m"), date("d")-14, date("Y"));
$tomorrow= date("Y-m-d", $tomorrow);
$datearray[] = $tomorrow;
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-13, date("Y"));
$tomorrow= date("Y-m-d", $tomorrow);
$datearray[] = $tomorrow;
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-12, date("Y"));
$tomorrow= date("Y-m-d", $tomorrow);
$datearray[] = $tomorrow;
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-11, date("Y"));
$tomorrow= date("Y-m-d", $tomorrow);
$datearray[] = $tomorrow;
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-10, date("Y"));
$tomorrow= date("Y-m-d", $tomorrow);
$datearray[] = $tomorrow;
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-9, date("Y"));
$tomorrow= date("Y-m-d", $tomorrow);
$datearray[] = $tomorrow;
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-8, date("Y"));
$tomorrow= date("Y-m-d", $tomorrow);
$datearray[] = $tomorrow;
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-7, date("Y"));
$tomorrow= date("Y-m-d", $tomorrow);
$datearray[] = $tomorrow;
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-6, date("Y"));
$tomorrow= date("Y-m-d", $tomorrow);
$datearray[] = $tomorrow;
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-5, date("Y"));
$tomorrow= date("Y-m-d", $tomorrow);
$datearray[] = $tomorrow;
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-4, date("Y"));
$tomorrow= date("Y-m-d", $tomorrow);
$datearray[] = $tomorrow;
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-3, date("Y"));
$tomorrow= date("Y-m-d", $tomorrow);
$datearray[] = $tomorrow;
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-2, date("Y"));
$tomorrow= date("Y-m-d", $tomorrow);
$datearray[] = $tomorrow;
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-1, date("Y"));
$tomorrow= date("Y-m-d", $tomorrow);
$datearray[] = $tomorrow;
$today = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
$today= date("Y-m-d", $today);
$datearray[] = $today;
$tomorrow = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
$tomorrow= date("Y-m-d", $tomorrow);
$datearray[] = $tomorrow;
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
		where authformreceiveddate='$currentdate' and authformreceived='Docusigned';";            

            $results3 = sqlsrv_query($conn,$query3);
            while($row3 = sqlsrv_fetch_array($results3))
            {
		$docusignarray3[] = $row3['COUNT'];
            }
	    
	       	$query4 = "SELECT count(*) as COUNT
		FROM status 
		where authformreceiveddate='$currentdate' and authformreceived!='Docusigned';";            

            $results4 = sqlsrv_query($conn,$query4);
            while($row4 = sqlsrv_fetch_array($results4))
            {
		$notdocusigntarray3[] = $row4['COUNT'];
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
		where authformsentdate='$currentdate' and authformsent!='Docusign';";            

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
#$MyData->addPoints($docusignarray,"RTNR-Sent Docusigned");
$MyData->addPoints($notdocusigntarray,"RTNR-Sent Mailroom");

#$MyData->addPoints($countarray2,"RTNR-Received");
#$MyData->addPoints($docusignarray2,"RTNR-Received Docusign");
$MyData->addPoints($notdocusigntarray2,"RTNR-Received Mailroom");

#$MyData->addPoints($countarray3,"AUTH-Received");
#$MyData->addPoints($docusignarray3,"AUTH-Received Docusign");
$MyData->addPoints($notdocusigntarray3,"AUTH-Received Mailroom");

#$MyData->addPoints($countarray4,"AUTH-Sent");
#$MyData->addPoints($docusignarray4,"AUTH-Sent Docusign");
$MyData->addPoints($notdocusigntarray4,"AUTH-Sent Mailroom");

#$MyData->addPoints($countarray5,"FEWA-Sent");
#$MyData->addPoints($docusignarray5,"FEWA-Sent Docusign");
$MyData->addPoints($notdocusigntarray5,"FEWA-Sent Mailroom");

#$MyData->addPoints($countarray6,"FEWA-Received");
#$MyData->addPoints($docusignarray6,"FEWA-Received Docusign");
$MyData->addPoints($notdocusigntarray6,"FEWA-Received Mailroom");


# $MyData->addPoints(array($jan12,$feb12,$mar12,$apr12,$may12,$jun12,$jul12,$aug12,$sep12,$oct12,$nov12,$dec12),"Rcvd");
 $MyData->setAxisName(0,"Mailroom Productivity");
 $MyData->addPoints($datearray,"Labels");
 $MyData->setSerieDescription("Labels","Months");
 $MyData->setAbscissa("Labels");

 /* Create the pChart object */
 $myPicture = new pImage(1200,630,$MyData);
 $myPicture->drawGradientArea(0,0,1200,630,DIRECTION_VERTICAL,array("StartR"=>100,"StartG"=>100,"StartB"=>100,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
 $myPicture->drawGradientArea(0,0,1200,630,DIRECTION_HORIZONTAL,array("StartR"=>100,"StartG"=>100,"StartB"=>100,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>20));
 $myPicture->drawGradientArea(0,0,60,630,DIRECTION_HORIZONTAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));

 /* Do some cosmetics */
 $myPicture->drawLine(60,0,60,630,array("R"=>70,"G"=>70,"B"=>70));
 $myPicture->drawRectangle(0,0,1199,629,array("R"=>0,"G"=>0,"B"=>0));
 $myPicture->setFontProperties(array("FontName"=>"../fonts/Forgotte.ttf","FontSize"=>11));
 $myPicture->drawText(35,115,"Mailroom Productivity",array("R"=>255,"G"=>255,"B"=>255,"FontSize"=>20,"Angle"=>90,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));

 /* Prepare the chart area */
 $myPicture->setGraphArea(100,30,1180,590);
 $myPicture->drawFilledRectangle(100,30,1180,590,array("R"=>255,"G"=>255,"B"=>255,"Alpha"=>20));
 $myPicture->setFontProperties(array("R"=>255,"G"=>255,"B"=>255,"FontName"=>"../fonts/pf_arma_five.ttf","FontSize"=>6));
 $myPicture->drawScale(array("AxisR"=>255,"AxisG"=>255,"AxisB"=>255,"DrawSubTicks"=>TRUE,"CycleBackground"=>TRUE));

 /* Write two thresholds over the chart */
# $myPicture->drawThreshold(10,array("WriteCaption"=>TRUE,"Caption"=>"Agreed SLA","NoMargin"=>TRUE));
# $myPicture->drawThreshold(15,array("WriteCaption"=>TRUE,"Caption"=>"Best effort","NoMargin"=>TRUE));

 /* Draw one static X threshold area */
 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>30));
# $myPicture->drawXThresholdArea(0,4.5,array("AreaName"=>"Testing","R"=>255,"G"=>100,"B"=>154,"Alpha"=>40));
# $myPicture->drawXThresholdArea(4.5,5,array("AreaName"=>"Macy's Go Live","R"=>226,"G"=>194,"B"=>54,"Alpha"=>40));
 $myPicture->setShadow(FALSE);

 /* Draw the chart */
 $myPicture->drawSplineChart();
 $myPicture->drawPlotChart(array("PlotSize"=>5,"PlotBorder"=>TRUE));

 /* Write the data bounds */
 $myPicture->writeBounds();

 /* Write the chart legend */ 
 $myPicture->drawLegend(100,615,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

 /* Render the picture (choose the best way) */
 $myPicture->autoOutput("pictures/example.drawThreshold.labels.png");
?>