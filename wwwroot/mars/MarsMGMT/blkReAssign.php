<?PHP
require("C:/inetpub/wwwroot/mars/header.php");
//require("C:/inetpub/wwwroot/mars/style.php");
//require("C:/inetpub/wwwroot/mars/functions.php");
require("C:/inetpub/wwwroot/mars/db.php");
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
?>

<link rel="stylesheet" href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/marsParent.css" type="text/css" />

<?PHP
if(isset($_POST['updater']))
{
    $updater = $_POST['updater'];
    
    if($updater == 'VJChetty')
    {
        $allowedIN = 'Yes';
    }
    if($updater == 'PNg')
    {
        $allowedIN = 'Yes';
    }    
    if($updater == 'IHutchings123')
    {
        $allowedIN = 'Yes';
    }
}

if(isset($_POST['Confirm']))
{
    $confirm = $_POST['Confirm'];
    if ($confirm == 'Confirmed')
    {
        $verified = 'Confirmed';
    }
}
if (isset($verified))
{
    if (isset($allowedIN))
    {
        if($allowedIN == 'Yes')
        {
            if(isset($_POST['bulkFromAgent']))
            {
                if($_POST['bulkFromAgent'] != '')
                {
                    $bulkFromAgent = $_POST['bulkFromAgent'];
                }
            }
            
            if(isset($_POST['bulkToAgent']))
            {
                if($_POST['bulkToAgent'] != '')
                {
                    $bulkToAgent = $_POST['bulkToAgent'];
                }
            }

            if(isset($_POST['singleuniqueid']))
            {
                if($_POST['singleuniqueid'] != '')
                {
                    $singleuniqueid = $_POST['singleuniqueid'];
                }
            }

            if(isset($_POST['singleToAgentfname']))
            {
                if($_POST['singleToAgentfname'] != '')
                {
                    $singleToAgentfname = $_POST['singleToAgentfname'];
                }
            }

            if(isset($_POST['singleToAgentlname']))
            {
                if($_POST['singleToAgentlname'] != '')
                {
                    $singleToAgentlname = $_POST['singleToAgentlname'];
                }
            }

            if (isset($singleuniqueid))
            {
                if(isset($singleToAgentfname))
                {
                    if(isset($singleToAgentlname))
                    {
                        $query  = "select agentlname,agentfname from Status where uniqueid='$singleuniqueid';";
                        $results = sqlsrv_query($conn,$query);
                        while($row = sqlsrv_fetch_array($results))
                        {
                            $oldAgentFname = $row['agentfname'];
                            $oldAgentLname = $row['agentlname'];
                        }
                        $query = "update status set agentlname='$singleToAgentlname',agentfname='$singleToAgentfname' WHERE uniqueid='$singleuniqueid'";
                        $results = sqlsrv_query($conn,$query);
                        
                        $query = "INSERT INTO Table_reassignTrack (reassigndate,reassigntime,reassignweek,reassignmonth,uniqueid,agentfrom,agentto,whoyou)
 VALUES ('$date','$time','$week','$month','$singleuniqueid','$oldAgentFname $oldAgentLname','$singleToAgentfname $singleToAgentlname','$updater')";
                        
                        $results = sqlsrv_query($conn,$query);
                        
                        
                    }
                }
            }            
        }
    }
}
#echo $allowedIN."".$updater;
echo "<table width='650px' style='margin: 0px 0px 20px;' cellpadding='5'>";
	echo "<tr>";
		echo "<td colspan='4'>";
			formstart('blkReAssign.php');
			#print_r($_POST);
		//	echo "<br>\n<br>\n<br>";
			checkboxmake('Confirm','Confirmed','Confirm update action','');
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>";
		//	echo "<br>\n<br>\n<br>";
			
			echo "\n";
			#textfieldmake('From','','30','bulkFromAgent');
			echo "\n";
		//	echo "<br>";
			#textfieldmake('To','','30','bulkToAgent');
			echo "\n";
		//	echo "<br>";
			textfieldmake('uniqueid','','30','singleuniqueid');
		echo "</td>";
		echo "<td>";
		//	echo "<br>";
			textfieldmake('Single To First Name','','30','singleToAgentfname');
		echo "</td>";
		echo "<td>";
			echo "\n";
		//	echo "<br>";
			textfieldmake('Single To Last Name','','30','singleToAgentlname');
		echo "</td>";
		echo "<td>";
			echo "\n";
		//	echo "<br>\n<br>\n<br>";
			textfieldmake('Who are you','','30','updater');
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan='4'>";
			echo "\n";
			formend('Make Waffle');
			echo "\n";
		echo "</td>";
	echo "</tr>";
echo "</tsble>";
?>

<?PHP

##Bulk


##Single

?>

<?PHP
$query2  = "select * from Table_reassignTrack order by id desc;";
$results2 = sqlsrv_query($conn,$query2);

echo "<br><br><br><br>";
echo "<table border='1'>";
echo "\n<tr class='MyBody'>";
echo "\n\t<th>uniqueid</th>";
echo "\n\t<th>reassigndate</th>";
echo "\n\t<th>reassigntime</th>";
echo "\n\t<th>reassignmonth</th>";
echo "\n\t<th>reassignweek</th>";
echo "\n\t<th>agentfrom</th>";
echo "\n\t<th>agentto</th>";
#echo "\n\t<th>whoyou</th>";
echo "\n</tr>";
while($row2 = sqlsrv_fetch_array($results2))
{
echo "\n<tr class='MyBody'>";
echo "\n\t<td>";
    echo '<a href="javascript: void(0)" onclick="popup(';
    echo "'http://sqlsrv.domain.initiativelegal.com/mars/client3.php?uniqueid=".$row2['uniqueid']."')";
    echo '">';
echo $row2['uniqueid']."</a></td>";
echo "\n\t<td>" . $row2['reassigndate'] . "</td>";
echo "\n\t<td>" . $row2['reassigntime'] . "</td>";
echo "\n\t<td>" . $row2['reassignmonth'] . "</td>";
echo "\n\t<td>" . $row2['reassignweek'] .  "</td>";
echo "\n\t<td>" . $row2['agentfrom'] . "</td>";
echo "\n\t<td>" . $row2['agentto'] . "</td>";
#echo "\n\t<td>" . $row2['whoyou'] . "</td>";
#echo "\n\t<td>" . $row['City'] . "</td>";
#echo "\n\t<td>" . $row['State'] . "</td>";
#echo "\n\t<td>" . $row['Zipcode'] . "</td>";
#echo "\n\t<td>" . $row['agentfname'] . " " . $row['agentlname'] . "</td>";
echo "\n</tr>";
}
?>