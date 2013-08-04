<?PHP
//Blue = Green + Red + Yellow       ->[All]
//Green = Blue - Red - Yellow       ->[(0-6 days since event)]
//Red = Blue - Yellow - Green       ->[(7-10 days since event)]
//Yellow = Blue - Green - Red       ->[(11- infinite days since event)]
Function agingReportRow($description,$query,$attorney,$event)
{
    $date = date('Y').'-'.date('m').'-'.date('d');
    $today = date_create($date);
    $serverName = "localhost\SPICE";
    $connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
    $conn = sqlsrv_connect( $serverName, $connectionInfo );
    $qry = "SELECT uniqueid,".$event." FROM status ";
    $qry .= "where ".$query;
    $results = sqlsrv_query($conn,$qry);
    $green = '0';
    $yellow = '0';
    $red = '0';
    $one = '1';
    $greenid = array();
    $yellowid = array();
    $redid = array();
    $blueid = array();
    
    while($row = sqlsrv_fetch_array($results))
    {
        //echo $row['uniqueid'].'<br>';
        //echo $row[$event].'<br>';
        $evntd = $row[$event];
        $eventdate = date_create($evntd); 
        $interval = date_diff($eventdate, $today);
        $waff =  $interval->format('%R%a');
        $blueid[] = $row['uniqueid'];
        switch ($waff)
        {
            case ($waff <= 6):
                $color = 'green';
                $green = $green++;
                $greenid[] = $row['uniqueid'];
                break;
            case ($waff >=7 && $waff <= 10):
                $color = 'yellow';
                $yellow = $yellow++;
                $yellowid[] = $row['uniqueid'];
                break;
            case ($waff >= 11):
                $color = 'red';
                $red = $red+1;
                $redid[] = $row['uniqueid'];
                break;
        }
    }
    $blue = $green+$red+$yellow;
        foreach (array_values($blueid) as $vals)
            {
                if (empty($listblue))
                {
                    $listblue = "uniqueid='".$vals."'";
                }
                else
                {
                    $listblue = $listblue." or uniqueid='".$vals."'";
                }
            }
    $query = $listblue;
    echo '<tr style="background-color:white">';
    echo "<td>";
    echo '<form action="report.php" method="post">';
    echo '<input type="hidden" name="query" value="where '.$query.'" />';
    echo '<input type="hidden" name="caseattorney" value="'.$caseattorney.'"/>';
    echo $description.' Total';
    echo '</td>';
    echo '<td>';
    echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:black; border:none; ';
    echo ' background-color: white" value="'.$blue.'"/>';
    echo '</form>';
    echo '</td>';
    echo '</tr>';    
    echo "<br>";
    echo "<br>";
    foreach (array_values($greenid) as $vals)
    {
        if (empty($listgreen))
        {
            $listgreen = "uniqueid='".$vals."'";
        }
        else
        {
            $listgreen = $listgreen." or uniqueid='".$vals."'";
        }
    }
    
    $query = $listgreen;
    echo '<tr style="background-color:green">';
    echo "<td>";
    echo '<form action="report.php" method="post">';    
    echo '<input type="hidden" name="query" value="where '.$query.'" />';
    echo '<input type="hidden" name="caseattorney" value="'.$caseattorney.'"/>';
    echo $description.' Green';
    echo '</td>';
    echo '<td>';
    echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:red; border:none; ';
    echo ' background-color: white " value="'.$green.'"/>';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
    foreach (array_values($yellowid) as $vals)
    {
        if (empty($listyellow))
        {
            $listyellow = "uniqueid='".$vals."'";
        }
        else
        {
            $listyellow = $listyellow." or uniqueid='".$vals."'";
        }
    }
    
    $query = $listyellow;
    echo '<tr style="background-color:yellow">';
    echo "<td>";
    echo '<form action="report.php" method="post">';
    echo '<input type="hidden" name="query" value="where '.$query.'" />';
    echo '<input type="hidden" name="caseattorney" value="'.$caseattorney.'"/>';
    echo $description.' Yellow';
    echo '</td>';
    echo '<td>';
    echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:red; border:none; ';
    echo ' background-color: white " value="'.$yellow.'"/>';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
    foreach (array_values($redid) as $vals)
    {
        if (empty($listred))
        {
            $listred = "uniqueid='".$vals."'";
        }
        else
        {
            $listred = $listred." or uniqueid='".$vals."'";
        }
    }
    $query = $listred;
    echo '<tr style="background-color:red">';
    echo "<td>";
    echo '<form action="report.php" method="post">';
    echo '<input type="hidden" name="query" value="where '.$query.'" />';
    echo '<input type="hidden" name="caseattorney" value="'.$caseattorney.'"/>';
    echo $description.' Red';
    echo '</td>';
    echo '<td>';
    echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:red; border:none; ';
    echo ' background-color: white " value="'.$red.'"/>';
    echo '</form>';
    echo '</td>';
    echo '</tr>';

}

$caseattorney = 'Hutchings';
echo "<table border=0 width=75% align=left>";
agingReportRow('Testing desc',"retainerSent='Yes' and retainerRecieved!='Yes' and retainerSentDate is not null and retainerSentDate!=''",$caseattorney,'retainerSentDate');

#print_r(array_values($redid));

?>

<?php

?>