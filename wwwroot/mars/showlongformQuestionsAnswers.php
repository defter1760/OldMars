<?PHP
$serverName = "localhost\SPICE";
$connectionInfo = array( "Database"=>"Mars2", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
$uniqueid = $_GET['uniqueid'];
$query3 = "SELECT brand from Status WHERE uniqueid='".$uniqueid."'";
$results3 = sqlsrv_query($conn,$query3);
$row3 = sqlsrv_fetch_array($results3);
if ($row3['brand'] !='' && $row3['brand'] !=null)
{
    $query = "SELECT * from Data WHERE uniqueid='".$uniqueid."'";
    $results = sqlsrv_query($conn,$query);
    $row = sqlsrv_fetch_array($results);
    $query2 = "SELECT * from Forms WHERE brand='".$row3['brand']."' order by section asc, questionnumber asc";
    $results2 = sqlsrv_query($conn,$query2);
    while($row2 = sqlsrv_fetch_array($results2))
    {
        switch ($row2['type'])
        {
            case ($row2['type'] == 'header'):
                    echo '<strong>';
                    echo $row2['Description'].'</strong><br><br><br>';
                break;
            case ($row2['type'] == 'textonly'):
                    echo '';
                    echo $row2['Description'].'<br>';
                break;
            case ($row2['type'] == 'intro'):
                    echo '';
                    echo $row2['Description'].'<br><br>';                    
                break;
            default:
            foreach($row as $key => $value)
            {
                if($row2['qname'] == $key)
                {
                    if ($value !='' && $value !=null && $value !=$uniqueid)
                    {
                        echo '<strong>';
                        echo $row2['Description'].'</strong><br>';
                        echo $value;
                        echo "<br>";
                        echo "<br>";
                    }
                }
            }
            break;
        }
    }
}
?>