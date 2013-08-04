<?PHP
require("db.php");
$incomingcost = "0";
$outgoingcost = "0";

$qry2 = "select * from Tbl_MailRoomOut;";
$results2 = sqlsrv_query($conn,$qry2);

    while($row2 = sqlsrv_fetch_array($results2))
    {

        $incomingcost += $row2['IncomingCost'];
        $outgoingcost += $row2['OutgoingCost'];
        
    }

echo "Total postage Incoming/Returns: $".$incomingcost;
echo "<br><br>";
echo "Total postage Outgoing: $".$outgoingcost;
?>