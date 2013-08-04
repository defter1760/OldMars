<?PHP
require("style.php");
require("db.php");
require("functions.php");

$query = "SELECT DISTINCT
		retainerRecievedDate
		FROM (SELECT TOP 50000000 retainerRecievedDate FROM status
		where retainerRecievedDate!='' ORDER BY retainerRecievedDate) DERIVEDTBL;";
                $results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
            if (isset($datearray))
            {
             $datearray = $datearray.','.$row['retainerRecievedDate'];
            }
            else
            {
                $datearray = $row['retainerRecievedDate'];
            }
            
            $currentdate = $row['retainerRecievedDate'];
$query2 = "SELECT count(*) as COUNT
		FROM status 
		where retainerRecievedDate='$currentdate';";            

            $results2 = sqlsrv_query($conn,$query2);
            while($row2 = sqlsrv_fetch_array($results2))
            {
                
            if (isset($countarray))
            {
                $countarray = $countarray.','.$row2['COUNT'];
            }
            else
            {
                $countarray = $row2['COUNT'];
            }
                
            }

            
        }
echo $datearray;
echo "<br><br>";
echo $countarray;

$query = "SELECT DISTINCT
		retainerRecievedDate
		FROM (SELECT TOP 50000000 retainerRecievedDate FROM status
		where retainerRecievedDate!='' ORDER BY retainerRecievedDate) DERIVEDTBL;";
                $results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{

                $datearray[] = $row['retainerRecievedDate'];

            
            $currentdate = $row['retainerRecievedDate'];
$query2 = "SELECT count(*) as COUNT
		FROM status 
		where retainerRecievedDate='$currentdate';";            

            $results2 = sqlsrv_query($conn,$query2);
            while($row2 = sqlsrv_fetch_array($results2))
            {
		$countarray[] = $row2['COUNT'];
            }

            
        }
print_r($datearray);
echo "<br><br>";
print_r($countarray);  
?>