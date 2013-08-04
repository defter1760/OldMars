<head></head>
<body>
	<script type="text/javascript">
<!--
function popup(url) 
{
 var width  = 1000;
 var height = 1000;
 var left   = (screen.width  - width)/2;
 var top    = (screen.height - height)/2;
 var params = 'width='+width+', height='+height;
 params += ', top='+top+', left='+left;
 params += ', directories=no';
 params += ', location=no';
 params += ', menubar=no';
 params += ', resizable=no';
 params += ', scrollbars=yes';
 params += ', status=no';
 params += ', toolbar=no';
 newwin=window.open(url,'windowname6', params);
 if (window.focus) {newwin.focus()}
 return false;
}
// -->
</script>

<?PHP
require("style.php");
require("db.php");
require("functions.php");
#echo $_POST['query'];
#echo $_GET['query'];
if (isset($_POST['query']))
    {
        $qry = $_POST['query'];
        #echo $qry;
        echo "<a href='http://sqlsrv.domain.initiativelegal.com/mars/reports.php'>Back to reports</a>";
        $query = "SELECT COUNT(*) as COUNT FROM status $qry ;";
	$results = sqlsrv_query($conn,$query);
        while($row = sqlsrv_fetch_array($results))
	{
		$qrycount = $row['COUNT'];
	}
        
        #echo "Results: ".$qrycount."";     
        echo "<br>";
        echo "<table border='1' bordercolor='#000000' style='background-color:#FFFFFF' width='1654em' cellpadding='2' cellspacing='0'>";
	echo "<tr>";
	echo "<td align ='center'>";
	echo "(<strong>";
        echo $qry." : ".$qrycount."</strong>)<br>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	echo "<table border='1' bordercolor='#000000' style='background-color:#FFFFFF'  width='1654em' cellpadding='2' cellspacing='0'>";
	echo "<tr >";
	echo "<th width='4em'>";
	echo "Num";
	echo "</th>";				
	echo "<th width='50em'>";
	echo "UNIQUEID";
	echo "</th>";
	echo "<th width='100em'>";
	echo "Campaign";
	echo "</th>";
	echo "<th width='150em'>";
	echo "First Name";
	echo "</th>";
	echo "<th width='150em'>";
	echo "Last Name";
        echo "</th>";
	echo "<th width='100em'>";
	echo "Phone1";
	echo "</th>";        
	echo "<th width='100em'>";
	echo "Phone2";
	echo "</th>";
	echo "<th width='250em'>";
	echo "Email";
	echo "</th>";
	echo "<th width='250em'>";
	echo "Street1";
	echo "</th>";        
	echo "<th width='50em'>";
	echo "Street2";
	echo "</th>";
	echo "<th width='150em'>";
	echo "City";
	echo "</th>";
	echo "<th width='50em'>";
	echo "State";
	echo "</th>";
	echo "<th width='100em'>";
	echo "Zipcode";
	echo "</th>";
	echo "<th width='150em'>";
	echo "Attorney";
	echo "</th>";        
echo "</tr>";
			
        $query3 = "SELECT uniqueid,brand,phone1,phone2,email,Street1,Street2,City,State,Zipcode,agentfname,agentlname,FirstName,LastName,
	ROW_NUMBER() OVER (ORDER BY LastName) as COUNT 
        FROM status $qry;";
	$results3 = sqlsrv_query($conn,$query3);
	while($row3 = sqlsrv_fetch_array($results3))
	{
            echo "<tr >";
            echo "<td>";
            echo $row3['COUNT'];
            echo "</td>";       
            echo "<td><font size=1>";
            echo '<a href=';
            echo "'http://sqlsrv.domain.initiativelegal.com/mars/client2.php?uniqueid=".$row3['uniqueid']."'";
            echo '" target="_new">';
            echo $row3['uniqueid']."</a></td>";
            echo "<td><font size=2>" . $row3['brand'] . "</td>";
            echo "<td><font size=2>" . $row3['FirstName'] . "</td>";
            echo "<td><font size=2>" . $row3['LastName'] . "</td>";
            echo "<td><font size=2>" . $row3['phone1'] .  "</td>";
            echo "<td><font size=2>" . $row3['phone2'] . "</td>";
            echo "<td><font size=2>";
            if (isset($row3['email']))
            {
                    echo   "<a href='mailto:" . $row3['email'] . "'><font size='2'>" . $row3['email']."</font>" ; 
            }
            echo "</td>";
            echo "<td><font size=2>" . $row3['Street1'] . "</td>";
            echo "<td><font size=2>" . $row3['Street2'] . "</td>";
            echo "<td><font size=2>" . $row3['City'] . "</td>";
            echo "<td><font size=2>" . $row3['State'] . "</td>";
            echo "<td><font size=2>" . $row3['Zipcode'] . "</td>";
            echo "<td><font size=2>" . $row3['agentfname'] . " " . $row3['agentlname'] . "</td>";
            echo "</tr>";

        }	
				
}

    
?>

</body>