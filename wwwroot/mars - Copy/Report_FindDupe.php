<?PHP
require("db.php");
$query = "SELECT
barcode as BARCODE
from status where barcode!='' and barcode is not null order by BARCODE
";
$results = sqlsrv_query($conn,$query);
while($row = sqlsrv_fetch_array($results))
    {
        if (isset($row['BARCODE'])) $thisbarcode = $row['BARCODE'];;
        if (empty($thisbarcode))
        {}
        else
        {

            $query2 = "Select
            count(*) as COUNT
            from status
            where barcode LIKE '%$thisbarcode%';";
            $results2 = sqlsrv_query($conn,$query2);
            while($row = sqlsrv_fetch_array($results2))
            {
                if ($row['COUNT'] > 1)
                {
                    $query3 = "SELECT
                    barcode,uniqueid,FirstName,LastName
                    from status
                    where barcode LIKE '%$thisbarcode%';";
                    $results3 = sqlsrv_query($conn,$query3);
                    while($row = sqlsrv_fetch_array($results3))
                    {
                        echo "Barcode:".$row['barcode']." ";
                        echo "Uniqueid:".$row['uniqueid']." ";
                        echo $row['FirstName']." ";
                        echo $row['LastName']." ";
                        echo "<br>";
                    }
                }
            }
        }
    }
            echo 'Hello';
            
            

?>