<?php
$date = date('Y').'-'.date('m').'-'.date('d');
$date2 = '2012-05-01';
$datetime1 = date_create($date);
#$datetime1 = date_create('2009-10-11');
$datetime2 = date_create($date2);
$interval = date_diff($datetime2, $datetime1);
#$interval = date_diff($datetime1, $datetime2);
echo "Calculating the difference between ".$date." and ".$date2;
echo "<br><br>";
echo $interval->format('%R%a days');
$waff =  $interval->format('%R%a');
//if ($waff == 6)
//echo '6';

switch ($waff)
{
    case ($waff <= 6):
        echo "<br>Green";
        break;
    case ($waff >=7 && $waff <= 10):
        echo "<br>Yellow";
        break;
    case ($waff >= 11):
        echo "<br>Red";
        break;
}

