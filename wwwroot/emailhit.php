<?php
header("Content-type: image/gif");
$image = imagecreate( 1, 1 );
imagegif($image);
?>
<?PHP
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');

$serverName = "localhost\SPICE";
$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );

if (isset($_SERVER['HTTP_REFERER'])) $ref = $_SERVER['HTTP_REFERER'];
if (empty($ref)) $ref = '';
if (isset($_SERVER['REMOTE_ADDR'])) $ip = $_SERVER['REMOTE_ADDR'];
if (empty($ip)) $ip = '';
if (isset($_SERVER['REMOTE_HOST'])) $dns = $_SERVER['REMOTE_HOST'];
if (empty($dns)) $dns = '';
if (isset($_GET['uniqueid'])) $uniqueid = $_GET['uniqueid'];
if (empty($uniqueid)) $uniqueid = '';
if (isset($_GET['isemail'])) $isemail = $_GET['isemail'];
if (empty($isemail)) $isemail = '';

 $query = "INSERT INTO hits (ref,date,time,week,month,ip,dns,uniqueid,isemail)
 VALUES ('$ref','$date','$time','$week','$month','$ip','$dns','$uniqueid','$isemail')";
$results = sqlsrv_query($conn,$query);

if (isset($uniqueid))
{
    

$query = "IF EXISTS (select uniqueid from status where uniqueid='$uniqueid') select notelog from status where uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);

    while($row = sqlsrv_fetch_array($results))
    {
        $notelog = $row['notelog'];
    }
    if ($isemail == 'retainersend')
    {
        $expand = 'Auto generated retainer email.';
    }
    if ($isemail == 'afterlongform')
    {
        $expand = 'Long form completed.';
    }
    if ($isemail == 'afterretainer')
    {
        $expand = 'Retainer signed confirmation.';
    }
//    if ($isemail == 'manuallyemailedretainer');    
//    {
//        $expand = 'manually sent retainer email.';    
//    }
    $newnote = "Email opened: ".$expand;
    if(strstr($newnote,'\''))
    {
        $newnote = str_replace('\'','\'\'',$newnote);
    }
    if(strstr($newnote,'\"'))
    {
            $newnote = str_replace('\"','\"\"',$newnote);
    }


    $notelog = str_replace('\'','\'\'',$notelog);
    
    $dateadd = date('Y').'-'.date('m').'-'.date('d');
    $timeadd = date('H').':'.date('i').':'.date('s');
    $notestring = $dateadd." @ ".$timeadd.": ".$newnote."<br>".$notelog;

    $query = "UPDATE status set notelog='$notestring' WHERE uniqueid='$uniqueid'";
    
    $results = sqlsrv_query($conn,$query);

}
?>