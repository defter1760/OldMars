<?PHP
$waffleit = '1';
echo "<br>";
echo "<table>";
if ($waffleit == '1')
{
echo "<tr style='background-color:#FFFFFF'>";
echo "<td>";

}
else
if ($waffleit == '0')
{
echo "<tr style='background-color:#DADADA'>";
echo "<td>";   
#$waffleit = '1';

}
echo "Hello1";
echo "</td>";
echo "</tr>";
if ($waffleit == '1') {$waffleit=$waffleit-'1';} else{ if($waffleit == '0'){ $waffleit=$waffleit-'1'; }};
if ($waffleit == '1')
{
echo "<tr style='background-color:#FFFFFF'>";
echo "<td>";

}
else
if ($waffleit == '0')
{
echo "<tr style='background-color:#DADADA'>";
echo "<td>"; 
#$waffleit = '1';


}
echo "Hello2";
echo "</td>";
if ($waffleit == '1') {$waffleit=$waffleit-'1';} else{ if($waffleit == '0'){ $waffleit=$waffleit-'1'; }};
if ($waffleit == '1')
{
echo "<tr style='background-color:#FFFFFF'>";
echo "<td>";
#$waffleit = '0';
}
else
if ($waffleit == '0')
{
echo "<tr style='background-color:#DADADA'>";
echo "<td>"; 
#$waffleit = '1';


}
echo "Hello2";
echo "</td>";
if ($waffleit == '1') {$waffleit=$waffleit-'1';} else{ if($waffleit == '0'){ $waffleit=$waffleit-'1'; }};
echo "</table>";
?>



<?PHP

$dateNOW = date('Y').'/'.date('m').'/'.date('d');

$day = date("l", $dateNOW);
echo "<br><br>";
echo $day;

$currentdate  = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));

echo "<br><br>";
$tomorrow = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
$tcalc = date("Y-m-d", $tomorrow);
#$tomorrow= date("Y-m-d", $tomorrow);     
     echo $day_eg1 = date ('l',$tomorrow); 
echo "<br><br>";

$seed = "2012-08-17";
$date1 = "2012-08-23"; #lower
$date2 = "2012-08-25"; #higher
$date4 = "2012-08-02"; #higher


$date3 = "2012-08-22";

$diff = abs(strtotime($date4) - strtotime($seed));

echo $diff;
echo "<br><br>";
if ($diff >="86400")
{
    echo "WINNER";
}
echo $tcalc;

//
//      echo $day_eg2 = date("N", $today+1 * 24 * 3600); 
//echo "<br><br>";
//    
//    echo $day_eg3= date("N", $today+2 * 24 * 3600); 
//echo "<br><br>";    
//    
//    echo $day_eg4 = date("N", $today+3 * 24 * 3600); 
//echo "<br><br>";    
//    
//    echo $day_eg5 = date("N", $today+4 * 24 * 3600); 
//echo "<br><br>";    
//    echo $day_eg6 = date("N", $today+5 * 24 * 3600); 
//echo "<br><br>";    
//    
//    echo $day_eg7 = date("N", $today+6 * 24 * 3600); 
?>

<?php
echo "<br><br>"; 
$datetime1 = new DateTime('2012-08-17');
$datetime2 = new DateTime($tcalc);
$interval = $datetime1->diff($datetime2);
$interval2 = $interval->format('%R%a');

if ($interval2 >="1")
{
    echo "WINNER";
}
#echo $tcalc;
echo $interval2;
?>


<?PHP
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

    
    echo "<br><br>";
    echo $dow;
    #$$value = array("foo" => "bar",);
    

echo "<br><br>";
print_r($Monday);
echo "<br><br>";
print_r($Thursday);
echo "<br><br>";
print_r($printarray);

echo "<br><br>";
print_r($onearray);
?>



<?PHP
$tomorrow = "11-13-1940";
$tomorrow2 = mktime(0, 0, 0, date("m"), date("d")-29, date("Y"));
$tomorrowprint = date ('l',$tomorrow); 
$tomorrow= date("Y-m-d", $tomorrow);

echo $tomorrowprint;
echo "<br><br>";
echo $tomorrow;
echo "<br><br>";
echo $tomorrow2;
//$datetime2 = new DateTime($tomorrow);
//$interval = $datetime1->diff($datetime2);
//$interval2 = $interval->format('%R%a');
//if ($interval2 >="0")
//{
//	$tomo = mktime(0, 0, 0, date("m"), date("d")-29);
//	$tomo = date("m-d", $tomo);
//	$printarray[] = $tomorrowprint."(".$tomo.")";
//	$datearray[] = $tomorrow;
//}



?>

<?PHP
echo "<br><br>";
#$date1 = "1940-11-13";
$rest1 = substr("11-13-1940", -4);
$rest2 = substr("11-13-1940", 3, -5);
$rest3 = substr("11-13-1940", 0, -8);
$rest = $rest1."-".$rest3."-".$rest2;
?>

<?PHP



$date2 = new DateTime("2012-08-24");
#$interval = $date1->diff($date2);
#echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days ";
$date1 = new DateTime(trim($rest));
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
            echo "<br><br>";
            echo $interval->y . " years, " . $interval->m." months, ".$interval->d." days old";
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
        
echo "<br><br>";
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

$currentagent='bob';
$array[$currentagent]['money'][] = '35';
$array[$currentagent]['money'][] = '34';
$array[$currentagent]['prints'][] = '14';
print_r($array[$currentagent]);
?>
