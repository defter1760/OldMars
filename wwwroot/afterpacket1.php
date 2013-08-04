<?PHP
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');


$serverName = "localhost\SPICE";
$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );

#print_r($_GET);



if (isset($_GET['uniqueid']))
{
    if($_GET['uniqueid'] != '')
    {
        $uniqueid = $_GET['uniqueid'];
    }
    
}
if (isset($_GET['Auth1']))
{
    if($_GET['Auth1'] != '')
    {
        $auth1 = $_GET['Auth1'];
    }
}
if (isset($_GET['Auth2']))
{
    if($_GET['Auth2'] != '')
    {
        $auth2 = $_GET['Auth2'];
    }
}
if (isset($_GET['Feewaiver']))
{
    if($_GET['Feewaiver'] != '')
    {
        $feewaiver = $_GET['Feewaiver'];
    }
}
$query  = "IF EXISTS (select uniqueid from status where uniqueid='$uniqueid') select uniqueid as UNI from Status where uniqueid='$uniqueid';";
$results = sqlsrv_query($conn,$query);
while($row = sqlsrv_fetch_array($currentlog))
{
        if($row['UNI'] == $uniqueid)
        {
            $uniqueid = $row['UNI'];
        }
        else
        {
            empty($uniqueid);
            unset($uniqueid);
        }
}	
?>

<?PHP
echo '<script type="text/javascript">';
echo 'function reloadPage()';
echo '{';
echo 'window.top.location.replace("https://macyslawsuit.com/aftersignpacket/?uniqueid='.$uniqueid.'");';
echo '}';
echo '</script>';

if (isset($uniqueid))
{	
    $query1 = "select notelog from status WHERE uniqueid='$uniqueid'";
    $currentlog = sqlsrv_query($conn,$query1);
    
    if($auth1 == 'Auth1Set')
    {
        $query1 = "select notelog from status WHERE uniqueid='$uniqueid'";
        $currentlog = sqlsrv_query($conn,$query1);
        while($row = sqlsrv_fetch_array($currentlog))
        {
            $newlog =   $date . ' @ ' . $time . ': <strong>Authorization to Settlement Docusigned</strong><br>' . $row['notelog'];
        }    
            $query = "UPDATE status set
            notelog='$newlog',authformreceived='Docusigned',authaccept='Yes',authacceptdate='$date',authacceptweek='$week',authacceptmonth='$month',authformreceiveddate='$date',authformreceivedmonth='$month',authformreceivedweek='$week' WHERE uniqueid='$uniqueid'";
            $results = sqlsrv_query($conn,$query);
    }
    
    
    if($auth2 == 'Auth2Set')
    {
        $query1 = "select notelog from status WHERE uniqueid='$uniqueid'";
        $currentlog = sqlsrv_query($conn,$query1);        
        while($row = sqlsrv_fetch_array($currentlog))
        {
            $newlog =   $date . ' @ ' . $time . ': <strong>Authorization for Release Docusigned</strong><br>' . $row['notelog'];
        }   
        $query = "UPDATE status set
        notelog='$newlog',authformreceived2='Docusigned',authaccept2='Yes',authacceptdate2='$date',authacceptweek2='$week',authacceptmonth2='$month',authformreceiveddate2='$date',authformreceivedmonth2='$month',authformreceivedweek2='$week' WHERE uniqueid='$uniqueid'";
        $results = sqlsrv_query($conn,$query);
    }
    
    if($feewaiver == 'FeewaiverSet')
    {
        $query1 = "select notelog from status WHERE uniqueid='$uniqueid'";
        $currentlog = sqlsrv_query($conn,$query1);        
        while($row = sqlsrv_fetch_array($currentlog))
        {
            $newlog =   $date . ' @ ' . $time . ': <strong>Fee Waiver Docusigned</strong><br>' . $row['notelog'];
        }

        $query = "UPDATE status set
        notelog='$newlog',feewaiverreceived='Docusigned',feewaiveraccept='Yes',feewaiveracceptdate='$date',feewaiveracceptweek='$week',feewaiveracceptmonth='$month',feewaiverreceiveddate='$date',feewaiverreceivedmonth='$month',feewaiverreceivedweek='$week' WHERE uniqueid='$uniqueid'";
        $results = sqlsrv_query($conn,$query);
    }
echo '<body onload="reloadPage()">';
}


?>