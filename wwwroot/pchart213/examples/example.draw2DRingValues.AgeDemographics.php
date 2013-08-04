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

$date2 = new DateTime("2012-08-24");
$queryage = "select dateofbirth from Status where dateofbirth is not null and dateofbirth!='';";	
                    
        $resultsage = sqlsrv_query($conn,$queryage);
        while($rowage = sqlsrv_fetch_array($resultsage))
        {
            $rawage = $rowage['dateofbirth'];
            if(strlen($rawage) == '10')
            {
            $rest1 = substr($rawage, -4);
            $rest2 = substr($rawage, 3, -5);
            $rest3 = substr($rawage, 0, -8);
            $rest = $rest1."-".$rest3."-".$rest2;
            $date1 = new DateTime(trim($rest));
            $interval = $date1->diff($date2);
            #echo "<br><br>";
            #echo $interval->y . " years, " . $interval->m." months, ".$interval->d." days old";
            $thisyear = $interval->format('%Y');
            $yeararray[] = $thisyear;
            }
        }
    $lessthan18 = 0;        
    $between18and24 = 0;        
    $between25and35 = 0;        
    $between36and49 = 0;        
    $between50and59 = 0;        
    $between60and69 = 0;        
    $between70and80 = 0;        
    $morethan80 = 0;
    foreach($yeararray as $key => $value)
    {
    
        switch ($value)
            {
                case ($value < 18):
                    $lessthan18 += 1;
                break;
                case ($value >=18 && $value <= 24):
                    $between18and24 += 1;
                break;
                case ($value >=25 && $value <= 35):
                    $between25and35 += 1;
                break;
                case ($value >=36 && $value <= 49):
                    $between36and49 += 1;
                break;
                case ($value >=50 && $value <= 59):
                    $between50and59 += 1;
                break;
                case ($value >=60 && $value <= 69):
                    $between60and69 += 1;
                break;
                case ($value >=70 && $value <= 80):
                    $between70and80 += 1;
                break;
                case ($value > 80):
                    $morethan80 += 1;
                break;
            }
    
    }
        
//echo "<br><br>";
#print_r($yeararray);

//echo "<br><br>";echo "<br><br>";
//echo "<br>Less than 18:<br>";
//echo $lessthan18;
//echo "<br>Between 18 and 24:<br>";
//echo $between18and24;
//echo "<br>Between 25 and 35:<br>";
//echo $between25and35;
//echo "<br>Between 36 and 49:<br>";
//echo $between36and49;
//echo "<br>Between 50 and 59:<br>";
//echo $between50and59;
//echo "<br>Between 60 and 69:<br>";
//echo $between60and69;
//echo "<br>Between 70 and 80:<br>";
//echo $between70and80;
//echo "<br>More than 80:<br>";
//echo $morethan80;

 
 
 /* Create and populate the pData object */
 $MyData = new pData();   
 $MyData->addPoints(array($lessthan18,$between18and24,$between25and35,$between36and49,$between50and59,$between60and69,$between70and80,$morethan80),"ScoreA");  
 $MyData->setSerieDescription("ScoreA","Application A");

 /* Define the absissa serie */
 $MyData->addPoints(array("Less than 18","Between 18 and 24","Between 25 and 35","Between 36 and 49","Between 50 and 59","Between 60 and 69","Between 70 and 80","More than 80"),"Labels");
 $MyData->setAbscissa("Labels");

 /* Create the pChart object */
 $myPicture = new pImage(550,560,$MyData);

 /* Draw a solid background */
 $Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
 $myPicture->drawFilledRectangle(0,0,700,700,$Settings);

 /* Overlay with a gradient */
 $Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
 $myPicture->drawGradientArea(0,0,700,660,DIRECTION_VERTICAL,$Settings);
 $myPicture->drawGradientArea(0,0,700,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));

 /* Add a border to the picture */
 $myPicture->drawRectangle(0,0,699,659,array("R"=>0,"G"=>0,"B"=>0));

 /* Write the picture title */ 
 $myPicture->setFontProperties(array("FontName"=>"../fonts/Silkscreen.ttf","FontSize"=>12));
 $myPicture->drawText(10,13,"Age groups",array("R"=>255,"G"=>255,"B"=>255));

 /* Set the default font properties */ 
 $myPicture->setFontProperties(array("FontName"=>"../fonts/Forgotte.ttf","FontSize"=>12,"R"=>80,"G"=>80,"B"=>80));

 /* Enable shadow computing */ 
 $myPicture->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>50));

 /* Create the pPie object */ 
 $PieChart = new pPie($myPicture,$MyData);

 /* Draw an AA pie chart */ 
 $PieChart->draw2DRing(320,340,array("InnerRadius"=>5,"OuterRadius"=>190,"DataGapAngle"=>10,"DataGapRadius"=>6,"WriteValues"=>TRUE,"ValueR"=>255,"ValueG"=>255,"ValueB"=>255,"Border"=>TRUE));

 /* Write the legend box */ 
 $myPicture->setShadow(FALSE);
 $PieChart->drawPieLegend(15,40,array("Alpha"=>20));

 /* Render the picture (choose the best way) */
 $myPicture->autoOutput("pictures/example.draw2DRingValue.png");
?>