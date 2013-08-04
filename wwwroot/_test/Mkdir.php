<?PHP

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");


$conn = sqlsrv_connect( $serverName, $connectionInfo );

?>


<?php
mkdir("/inetpub/pickle/");
?>

<?php
$dirnow = '__DIR__';
print __DIR__;
echo '<br>';
print $dirnow;
echo '<br>';
mkdir(".//$dirnow//depth2//");
?>

<?php
$path = '\\\\FILES\\MassAction\\Pickle\\';
mkdir("$path");
mkdir("////FILES//MassAction//Pickle/");
?>


IUSR