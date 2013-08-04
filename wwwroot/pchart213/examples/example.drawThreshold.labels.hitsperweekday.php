<?php   
 /* CAT:Misc */

 /* pChart library inclusions */
 include("../class/pData.class.php");
 include("../class/pDraw.class.php");
 include("../class/pImage.class.php");

$serverName = "localhost\SPICE";
$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );


	$query = "select count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and day='Monday' and ref like '%macyslawsuit.com/';";	
	
        $results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$monday = $row['COUNT'];
	}


	$query = "select count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and day='Tuesday' and ref like '%macyslawsuit.com/';";	
	
        $results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$tuesday = $row['COUNT'];
	}



	$query = "select count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and day='Wednesday' and ref like '%macyslawsuit.com/';";	
	
        $results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$wednesday = $row['COUNT'];
	}


	$query = "select count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and day='Thursday' and ref like '%macyslawsuit.com/';";	
	
        $results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$thursday = $row['COUNT'];
	}


	$query = "select count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and day='Friday' and ref like '%macyslawsuit.com/';";	
	
        $results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$friday = $row['COUNT'];
	}


	$query = "select count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and day='Saturday' and ref like '%macyslawsuit.com/';";	
	
        $results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$saturday = $row['COUNT'];
	}	

	$query = "select count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and day='Sunday' and ref like '%macyslawsuit.com/';";
	
        $results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$sunday = $row['COUNT'];
	}

 /* Create and populate the pData object */
 $MyData = new pData();  
 $MyData->addPoints(array($monday,$tuesday,$wednesday,$thursday,$friday,$saturday,$sunday),"Acpt");
# $MyData->addPoints(array($jan12,$feb12,$mar12,$apr12,$may12,$jun12,$jul12,$aug12,$sep12,$oct12,$nov12,$dec12),"Rcvd");
 $MyData->setAxisName(0,"Hit count");
 $MyData->addPoints(array("Monday(".$monday.")","Tuesday(".$tuesday.")","Wednesday(".$wednesday.")","Thursday(".$thursday.")","Friday(".$friday.")","Saturday(".$saturday.")","Sunday(".$sunday.")"),"Labels");
 $MyData->setSerieDescription("Labels","Months");
 $MyData->setAbscissa("Labels");

 /* Create the pChart object */
 $myPicture = new pImage(700,230,$MyData);
 $myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL,array("StartR"=>100,"StartG"=>100,"StartB"=>100,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
 $myPicture->drawGradientArea(0,0,700,230,DIRECTION_HORIZONTAL,array("StartR"=>100,"StartG"=>100,"StartB"=>100,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>20));
 $myPicture->drawGradientArea(0,0,60,230,DIRECTION_HORIZONTAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));

 /* Do some cosmetics */
 $myPicture->drawLine(60,0,60,230,array("R"=>70,"G"=>70,"B"=>70));
 $myPicture->drawRectangle(0,0,699,229,array("R"=>0,"G"=>0,"B"=>0));
 $myPicture->setFontProperties(array("FontName"=>"../fonts/Forgotte.ttf","FontSize"=>11));
 $myPicture->drawText(35,115,"Hits by day",array("R"=>255,"G"=>255,"B"=>255,"FontSize"=>20,"Angle"=>90,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));

 /* Prepare the chart area */
 $myPicture->setGraphArea(100,30,680,190);
 $myPicture->drawFilledRectangle(100,30,680,190,array("R"=>255,"G"=>255,"B"=>255,"Alpha"=>20));
 $myPicture->setFontProperties(array("R"=>255,"G"=>255,"B"=>255,"FontName"=>"../fonts/pf_arma_five.ttf","FontSize"=>6));
 $myPicture->drawScale(array("AxisR"=>255,"AxisG"=>255,"AxisB"=>255,"DrawSubTicks"=>TRUE,"CycleBackground"=>TRUE));

 /* Write two thresholds over the chart */
# $myPicture->drawThreshold(10,array("WriteCaption"=>TRUE,"Caption"=>"Agreed SLA","NoMargin"=>TRUE));
# $myPicture->drawThreshold(15,array("WriteCaption"=>TRUE,"Caption"=>"Best effort","NoMargin"=>TRUE));

 /* Draw one static X threshold area */
 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>30));
 #$myPicture->drawXThresholdArea(0,7,array("AreaName"=>"Testing","R"=>255,"G"=>100,"B"=>154,"Alpha"=>40));
 #$myPicture->drawXThresholdArea(7,7,array("AreaName"=>"Macy's Go Live","R"=>226,"G"=>194,"B"=>54,"Alpha"=>40));
 $myPicture->setShadow(FALSE);

 /* Draw the chart */
 $myPicture->drawSplineChart();
 $myPicture->drawPlotChart(array("PlotSize"=>3,"PlotBorder"=>TRUE));

 /* Write the data bounds */
 $myPicture->writeBounds();

 /* Write the chart legend */ 
 #$myPicture->drawLegend(630,215,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

 /* Render the picture (choose the best way) */
 $myPicture->autoOutput("pictures/example.drawThreshold.labels.png");
?>