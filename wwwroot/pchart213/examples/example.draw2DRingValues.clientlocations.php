<?php   
 /* CAT:Pie charts */

 /* pChart library inclusions */
 include("../class/pData.class.php");
 include("../class/pDraw.class.php");
 include("../class/pPie.class.php");
 include("../class/pImage.class.php");

 $serverName = "localhost\SPICE";
$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );

 $query = "SELECT DISTINCT
		agentlname
		FROM (SELECT TOP 50000000 agentlname FROM status
		where agentlname!='' ORDER BY agentlname) DERIVEDTBL;";
                $results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{

                $cityarray[] = $row['agentlname'];

            
            $currentcity = $row['agentlname'];
		
		$query2 = "SELECT count(*) as COUNT
		FROM status 
		where agentlname='$currentcity';";            

            $results2 = sqlsrv_query($conn,$query2);
            while($row2 = sqlsrv_fetch_array($results2))
            {
		$countarray[] = $row2['COUNT'];
            }


            
        }

// $query = "SELECT DISTINCT
//		City
//		FROM (SELECT TOP 50000000 City FROM status
//		where City!='' ORDER BY City) DERIVEDTBL;";
//                $results = sqlsrv_query($conn,$query);
//	while($row = sqlsrv_fetch_array($results))
//	{
//
//                $cityarray[] = $row['City'];
//
//            
//            $currentcity = $row['City'];
//		
//		$query2 = "SELECT count(*) as COUNT
//		FROM status 
//		where City='$currentcity';";            
//
//            $results2 = sqlsrv_query($conn,$query2);
//            while($row2 = sqlsrv_fetch_array($results2))
//            {
//		$countarray[] = $row2['COUNT'];
//            }
//
//
//            
//        } 
 
 
 
 
 /* Create and populate the pData object */
 $MyData = new pData();   
 $MyData->addPoints($countarray,"ScoreA");  
 $MyData->setSerieDescription("ScoreA","Application A");

 /* Define the absissa serie */
 $MyData->addPoints($cityarray,"Labels");
 $MyData->setAbscissa("Labels");

 /* Create the pChart object */
 $myPicture = new pImage(1300,1260,$MyData);
# $myPicture = new pImage(300,260,$MyData);

 /* Draw a solid background */
 $Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
 $myPicture->drawFilledRectangle(0,0,1300,1300,$Settings);

 /* Overlay with a gradient */
 $Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
 $myPicture->drawGradientArea(0,0,1300,1260,DIRECTION_VERTICAL,$Settings);
 $myPicture->drawGradientArea(0,0,1300,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));

 /* Add a border to the picture */
 $myPicture->drawRectangle(0,0,1299,1259,array("R"=>0,"G"=>0,"B"=>0));

 /* Write the picture title */ 
 $myPicture->setFontProperties(array("FontName"=>"../fonts/Silkscreen.ttf","FontSize"=>6));
 $myPicture->drawText(10,13,"pPie - Draw 2D ring charts",array("R"=>255,"G"=>255,"B"=>255));

 /* Set the default font properties */ 
 $myPicture->setFontProperties(array("FontName"=>"../fonts/Forgotte.ttf","FontSize"=>10,"R"=>80,"G"=>80,"B"=>80));

 /* Enable shadow computing */ 
 $myPicture->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>50));

 /* Create the pPie object */ 
 $PieChart = new pPie($myPicture,$MyData);

 /* Draw an AA pie chart */ 
 $PieChart->draw2DRing(1160,1140,array("WriteValues"=>TRUE,"ValueR"=>255,"ValueG"=>255,"ValueB"=>255,"Border"=>TRUE));

 /* Write the legend box */ 
 $myPicture->setShadow(FALSE);
 $PieChart->drawPieLegend(15,40,array("Alpha"=>20));

 /* Render the picture (choose the best way) */
 $myPicture->autoOutput("pictures/example.draw2DRingValue.png");
?>