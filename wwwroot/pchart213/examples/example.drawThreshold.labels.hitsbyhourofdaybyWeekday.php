<?php   
 /* CAT:Misc */

 /* pChart library inclusions */
 include("../class/pData.class.php");
 include("../class/pDraw.class.php");
 include("../class/pImage.class.php");
$date = date('Y').'-'.date('m').'-'.date('d');
$datetime1 = new DateTime('2012-08-17');


$tomorrow = mktime(0, 0, 0, date("m"), date("d")-6, date("Y"));
$preprintday[] = $tomorrow;
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
        $printday[] = $tomorrowprint;
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-5, date("Y"));
$preprintday[] = $tomorrow;
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
        $printday[] = $tomorrowprint;
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-4, date("Y"));
$preprintday[] = $tomorrow;
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
        $printday[] = $tomorrowprint;
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-3, date("Y"));
$preprintday[] = $tomorrow;
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
        $printday[] = $tomorrowprint;
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-2, date("Y"));
$preprintday[] = $tomorrow;
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
        $printday[] = $tomorrowprint;
	$datearray[] = $tomorrow;
}
$tomorrow = mktime(0, 0, 0, date("m"), date("d")-1, date("Y"));
$preprintday[] = $tomorrow;
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
        $printday[] = $tomorrowprint;
	$datearray[] = $tomorrow;
}
$today = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
$preprintday[] = $today;
$tomorrowprint = date ('l',$today); 
$today= date("Y-m-d", $today);
$tod = mktime(0, 0, 0, date("m"), date("d"));
$tod = date("m-d", $tod);
$printarray[] = $tomorrowprint."(".$tod.")";
$printday[] = $tomorrowprint;
$datearray[] = $today;

 $serverName = "localhost\SPICE";
$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );

$hourarray[] = 1;
$hourarray[] = 2;
$hourarray[] = 3;
$hourarray[] = 4;
$hourarray[] = 5;
$hourarray[] = 6;
$hourarray[] = 7;
$hourarray[] = 8;
$hourarray[] = 9;
$hourarray[] = 10;
$hourarray[] = 11;
$hourarray[] = 12;
$hourarray[] = 13;
$hourarray[] = 14;
$hourarray[] = 15;
$hourarray[] = 16;
$hourarray[] = 17;
$hourarray[] = 18;
$hourarray[] = 19;
$hourarray[] = 20;
$hourarray[] = 21;
$hourarray[] = 22;
$hourarray[] = 23;
$hourarray[] = 0;


foreach($preprintday as $key => $value)
{
	
    $currentdate = date("Y-m-d", $value);
    $dow = date ('l',$value);

    foreach($hourarray as $key => $value)
    {
        $query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='$value' and ref like '%macyslawsuit.com/' and date='$currentdate';";	
                    
        $results = sqlsrv_query($conn,$query);
        while($row = sqlsrv_fetch_array($results))
        {
            switch ($dow)
            {
                case ($dow == 'Monday'):
                    $Monday[] = $row['COUNT'];
                break;
                case ($dow == 'Tuesday'):
                    $Tuesday[] = $row['COUNT'];
                break;
                case ($dow == 'Wednesday'):
                    $Wednesday[] = $row['COUNT'];
                break;
                case ($dow == 'Thursday'):
                    $Thursday[] = $row['COUNT'];
                break;
                case ($dow == 'Friday'):
                    $Friday[] = $row['COUNT'];
                break;
                case ($dow == 'Saturday'):
                    $Saturday[] = $row['COUNT'];
                break;
                case ($dow == 'Sunday'):
                    $Sunday[] = $row['COUNT'];
                break;
            }
        }
    }
}
 



//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='1' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$one = $row['COUNT'];
//	}

//
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='2' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$two = $row['COUNT'];
//	}
//
//
//
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='3' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$three = $row['COUNT'];
//	}
//
//
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='4' and ref like '%macyslawsuit.com/';";		
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$four = $row['COUNT'];
//	}
//
//
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='5' and ref like '%macyslawsuit.com/';";		
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$five = $row['COUNT'];
//	}
//
//
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='6' and ref like '%macyslawsuit.com/';";		
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$six = $row['COUNT'];
//	}	
//
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='7' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$seven = $row['COUNT'];
//	}
//
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='8' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$eight = $row['COUNT'];
//	}
//	
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='9' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$nine = $row['COUNT'];
//	}
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='10' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$ten = $row['COUNT'];
//	}
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='11' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$eleven = $row['COUNT'];
//	}
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='12' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$twelve = $row['COUNT'];
//	}	
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='13' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$thirteen = $row['COUNT'];
//	}
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='14' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$fourteen = $row['COUNT'];
//	}
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='15' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$fifteen = $row['COUNT'];
//	}
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='16' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$sixteen = $row['COUNT'];
//	}
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='17' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$seventeen = $row['COUNT'];
//	}
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='18' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$eighteen = $row['COUNT'];
//	}
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='19' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$nineteen = $row['COUNT'];
//	}
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='20' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$twenty = $row['COUNT'];
//	}
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='21' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$twentyone = $row['COUNT'];
//	}
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='22' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$twentytwo = $row['COUNT'];
//	}
//	$query = "select  count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='23' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$twentythree = $row['COUNT'];
//	}
//	
//	$query = "select count(*) as COUNT from hits where ip!='4.59.60.154' and ip!='216.55.20.70' and hour='0' and ref like '%macyslawsuit.com/';";	
//	
//        $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//		$zero = $row['COUNT'];
//	}	

 /* Create and populate the pData object */
 $MyData = new pData();

	
	$currentdate = $value;
$MyData->addPoints($Monday,"Monday");
$MyData->addPoints($Tuesday,"Tuesday");
$MyData->addPoints($Wednesday,"Wednesday");
$MyData->addPoints($Thursday,"Thursday");
$MyData->addPoints($Friday,"Friday");
$MyData->addPoints($Saturday,"Saturday");
$MyData->addPoints($Sunday,"Sunday"); #$MyData->addPoints(array($one,$two,$three,$four,$five,$six,$seven,$eight,$nine,$ten,$eleven,$twelve,$thirteen,$fourteen,$fifteen,$sixteen,$seventeen,$eighteen,$nineteen,$twenty,$twentyone,$twentytwo,$twentythree,$zero),$value);


 
# $MyData->addPoints(array($jan12,$feb12,$mar12,$apr12,$may12,$jun12,$jul12,$aug12,$sep12,$oct12,$nov12,$dec12),"Rcvd");
 $MyData->setAxisName(0,"Hit count");
 
 #$MyData->addPoints(array("1AM","2AM","3AM","4AM","5AM","6AM","7AM","8AM","9AM","10AM","11AM","Noon","1PM","2PM","3PM(".$fifteen.")","4PM(".$sixteen.")","5PM(".$seventeen.")","6PM(".$eighteen.")","7PM(".$nineteen.")","8PM(".$twenty.")","9PM(".$twentyone.")","10PM(".$twentytwo.")","11PM(".$twentythree.")","Midnight(".$zero.")",),"Labels");
 $MyData->setSerieDescription("Labels","Months");
 $MyData->setAbscissa("Labels");

 /* Create the pChart object */
 $myPicture = new pImage(1900,530,$MyData);
 $myPicture->drawGradientArea(0,0,1900,530,DIRECTION_VERTICAL,array("StartR"=>100,"StartG"=>100,"StartB"=>100,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
 $myPicture->drawGradientArea(0,0,1900,530,DIRECTION_HORIZONTAL,array("StartR"=>100,"StartG"=>100,"StartB"=>100,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>20));
 $myPicture->drawGradientArea(0,0,60,530,DIRECTION_HORIZONTAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));

 /* Do some cosmetics */
 $myPicture->drawLine(60,0,60,530,array("R"=>70,"G"=>70,"B"=>70));
 #$myPicture->drawRectangle(0,0,1899,529,array("R"=>0,"G"=>0,"B"=>0));
 $myPicture->setFontProperties(array("FontName"=>"../fonts/Forgotte.ttf","FontSize"=>11));
 $myPicture->drawText(35,265,"Visits to home page per hour of day, split by date of week",array("R"=>255,"G"=>255,"B"=>255,"FontSize"=>20,"Angle"=>90,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));

 /* Prepare the chart area */
 $myPicture->setGraphArea(100,30,1880,490);
 $myPicture->drawFilledRectangle(100,30,1880,490,array("R"=>255,"G"=>255,"B"=>255,"Alpha"=>20));
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
 $myPicture->setFontProperties(array("R"=>255,"G"=>255,"B"=>255,"FontName"=>"../fonts/pf_arma_five.ttf","FontSize"=>12));
$myPicture->drawLegend(110,45,array("BoxWidth"=>30,"BoxHeight"=>30,"BoxSize"=>4,"R"=>01,"G"=>01,"B"=>01,"Surrounding"=>20,"Alpha"=>30,"Family"=>LEGEND_FAMILY_CIRCLE));
 /* Render the picture (choose the best way) */
 $myPicture->autoOutput("pictures/example.drawThreshold.labels.png");
?>