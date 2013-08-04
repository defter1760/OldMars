<?PHP
require("style.php");
require("db.php");
require("functions.php");
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
$year = date('Y');
?>

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
if (isset($_POST['CB']))
{
    if (isset($_POST['dispo']))
    {
	switch ($_POST['dispo'])
        {
            case ($_POST['dispo'] == 'LeftVoicemail'):
                break;
            case ($_POST['dispo'] == 'LeftMessage'):
                break;
            case ($_POST['dispo'] == 'NoResponse'):
                break;
	    default:
                $query = "INSERT INTO Tbl_CallBack
                (uniqueid,agentlname,campaign,datepromised,monthpromised,promisedate,timepromised,weekpromised)
                VALUES
                ('".$_POST['CBuniqueid']."','".$_POST['CBcaseattorney']."','".$_POST['CBcampaign']."','$date','$month','".$_POST['dispo']."','$time','$week');";
                $results = sqlsrv_query($conn,$query);
                break;
        }
    }
}


if ($row3['notqualified'] == 'Yes')
{
    $tdClass = 'notqualified';  
}
else if ($row3['donotcontact'] == 'Yes')
{
    $tdClass = 'dnc';  
}
else
{
	$tdClass = '';
}
        
if (isset($_POST['query']))
{
    $qry = $_POST['query'];
    if (isset($caseattorney))
    {
        $caseattorney = $_POST['caseattorney'];
    }
    
    echo "<br>";
    $today = mktime(0, 0, 0, date("m"), date("d"), date("y"));
    $today= date("m-d-y", $today);
    
    $tomorrow = mktime(0, 0, 0, date("m"), date("d")+1, date("y"));
    $tomorrow= date("m-d-y", $tomorrow);
    
    $tomorrow1 = mktime(0, 0, 0, date("m"), date("d")+2, date("y"));
    $tomorrow1 = date("m-d-y", $tomorrow1);
    
    $tomorrow2 = mktime(0, 0, 0, date("m"), date("d")+3, date("y"));
    $tomorrow2 = date("m-d-y", $tomorrow2);
    
    $tomorrow3 = mktime(0, 0, 0, date("m"), date("d")+4, date("y"));
    $tomorrow3 = date("m-d-y", $tomorrow3);
    
    $tomorrow4 = mktime(0, 0, 0, date("m"), date("d")+5, date("y"));
    $tomorrow4 = date("m-d-y", $tomorrow4);
    
    $tomorrow5 = mktime(0, 0, 0, date("m"), date("d")+6, date("y"));
    $tomorrow5 = date("m-d-y", $tomorrow5);
    
    $tomorrow6 = mktime(0, 0, 0, date("m"), date("d")+7, date("y"));
    $tomorrow6 = date("m-d-y", $tomorrow6);
    
    if (isset($_POST['calllog']))
    {
        echo "<table id='reportTable' class='tableWrapper' cellpadding='2' cellspacing='2' width='100%'>";
            echo "<tr>";
                echo "<td>";
                    echo "<table class='table' width='100%' cellpadding='2' cellspacing='2'>";
                        echo "<tr >";
                            echo "<th width='4em'>";
                                echo "Num";
                            echo "</th>";
                            echo "<th width='250em'>";
                                echo "Promise date";
                            echo "</th>";    
                            echo "<th width='50em'>";
                                echo "Promise Kept";
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
                            echo "<th width='150em'>";
                                echo "Attorney";
                            echo "</th>";        
                        echo "</tr>";
                        $query3 = "SELECT uniqueid,campaign,agentlname,promisedate,promisekept,
                        ROW_NUMBER() OVER (ORDER BY promisedate) as COUNT 
                        FROM Tbl_CallBack $qry;";
                        $results3 = sqlsrv_query($conn,$query3);
                        while($row3 = sqlsrv_fetch_array($results3))
                        {
                            $query4 = "SELECT uniqueid,brand,phone1,phone2,email,FirstName,LastName
                            FROM status where uniqueid='".$row3['uniqueid']."';";
                            $results4 = sqlsrv_query($conn,$query4);
                            while($row4 = sqlsrv_fetch_array($results4))
                            {
                                echo "<tr >";
                                    echo "<td>";
                                        echo $row3['COUNT'];
                                    echo "</td>";
                                    echo "<td>";
                                        echo $row3['promisedate'];
                                    echo "</td>";
                                    echo "<td width='50em'>";
                                        echo '<form class="reportInput" action="report.php" method="post" target="search">';
                                            echo '<input type="hidden" name="query" value="where '.$query.'" />';
                                            echo '<select name="dispo">';
                                            echo '<option name="dispo" selected></option>';
                                            echo '<option name="dispo" value="LeftVoicemail">Left a voicemail</option>';
                                            echo '<option name="dispo" value="LeftMessage">Left a message with someone</option>';
                                            echo '<option name="dispo" value="NoResponse ">No Response </option>';
                                            echo '<option name="dispo" value="'.$today.'">Call back today '.$today.'</option>';
                                            echo '<option name="dispo" value="'.$tomorrow.'">Call back '.$tomorrow.' </option>';
                                            echo '<option name="dispo" value="'.$tomorrow1.'">Call back '.$tomorrow1.'</option>';
                                            echo '<option name="dispo" value="'.$tomorrow2.'">Call back '.$tomorrow2.'</option>';
                                            echo '<option name="dispo" value="'.$tomorrow3.'">Call back '.$tomorrow3.'</option>';
                                            echo '<option name="dispo" value="'.$tomorrow4.'">Call back '.$tomorrow4.'</option>';
                                            echo '<option name="dispo" value="'.$tomorrow5.'">Call back '.$tomorrow5.'</option>';
                                            echo '<option name="dispo" value="'.$tomorrow6.'">Call back '.$tomorrow6.'</option>';
                                            echo '<input type="hidden" name="CBuniqueid" value="'.$row3['uniqueid'].'"/>';
                                            echo '<input type="hidden" name="CBcaseattorney" value="'.$row3['agentlname'].'"/>';
                                            echo '<input type="hidden" name="CBcampaign" value="'.$row3['brand'].'"/>';
                                            echo '<input type="hidden" name="query" value="'.$_POST['query'].'"/>';
                                            echo '<input type="hidden" name="caseattorney" value="'.$_POST['caseattorney'].'"/>';
                                            echo '<input name="CB" type="Submit" ';
                                            echo '  value="update"/>';
                                        echo '</form>';
                                    echo "</td>";
                                    echo "<td>";
                                        echo '<a href=';
                                        echo "'http://sqlsrv.domain.initiativelegal.com/mars/client3.php?uniqueid=".$row3['uniqueid']."'";
                                        echo '" target="_new">';
                                        echo $row3['uniqueid']."</a></td>";
                                    echo "<td>" . $row4['brand'] . "</td>";
                                    echo "<td>" . $row4['FirstName'] . "</td>";
                                    echo "<td>" . $row4['LastName'] . "</td>";
                                    echo "<td>" . $row4['phone1'] .  "</td>";
                                    echo "<td>" . $row4['phone2'] . "</td>";
                                    echo "<td>";
                                        if (isset($row4['email']))
                                        {
                                        echo   "<a href='mailto:" . $row4['email'] . "'>" . $row4['email']."</font>" ; 
                                        }
                                    echo "</td>";
                                    echo "<td>" . $row4['agentfname'] . " " . $row3['agentlname'] . "</td>";
                                echo "</tr>";
                                
                            }
                        }
    }
    else
    {
        echo "<table id='reportTable' class='tableWrapper' cellpadding='2' cellspacing='2' width='100%'>";
            echo "<tr>";
                echo "<td>";
                    echo "<table class='table' width='100%' cellpadding='2' cellspacing='2'>";
                        echo "<tr >";
                            echo "<th width='4em'>";
                                echo "Num";
                            echo "</th>";				
                            echo "<th width='50em'>";
                                echo "Disposition";
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
                                echo "<td width='50em'>";
                                    echo '<form class="reportInput" action="report.php" method="post" target="search">';
                                        if (isset($query))
                                        {
                                            echo '<input type="hidden" name="query" value="where '.$query.'" />';
                                        }
                                        echo '<select name="dispo">';
                                        echo '<option name="dispo" selected></option>';
                                        echo '<option name="dispo" value="LeftVoicemail">Left a voicemail</option>';
                                        echo '<option name="dispo" value="LeftMessage">Left a message with someone</option>';
                                        echo '<option name="dispo" value="NoResponse ">No Response </option>';
                                        echo '<option name="dispo" value="'.$today.'">Call back today '.$today.'</option>';
                                        echo '<option name="dispo" value="'.$tomorrow.'">Call back '.$tomorrow.' </option>';
                                        echo '<option name="dispo" value="'.$tomorrow1.'">Call back '.$tomorrow1.'</option>';
                                        echo '<option name="dispo" value="'.$tomorrow2.'">Call back '.$tomorrow2.'</option>';
                                        echo '<option name="dispo" value="'.$tomorrow3.'">Call back '.$tomorrow3.'</option>';
                                        echo '<option name="dispo" value="'.$tomorrow4.'">Call back '.$tomorrow4.'</option>';
                                        echo '<option name="dispo" value="'.$tomorrow5.'">Call back '.$tomorrow5.'</option>';
                                        echo '<option name="dispo" value="'.$tomorrow6.'">Call back '.$tomorrow6.'</option>';
                                        echo '<input type="hidden" name="CBuniqueid" value="'.$row3['uniqueid'].'"/>';
                                        echo '<input type="hidden" name="CBcaseattorney" value="'.$row3['agentlname'].'"/>';
                                        echo '<input type="hidden" name="CBcampaign" value="'.$row3['brand'].'"/>';
                                        echo '<input type="hidden" name="query" value="'.$_POST['query'].'"/>';
                                        if (isset($caseattorney))
                                        {
                                                echo '<input type="hidden" name="caseattorney" value="'.$_POST['caseattorney'].'"/>';
                                        }
                                        echo '<input name="CB" type="Submit" ';
                                        echo '  value="update"/>';
                                    echo '</form>';
                                echo "</td>";
                                echo "<td class='".$tdClass."'>";
                                    echo '<a href=';
                                    echo "'http://sqlsrv.domain.initiativelegal.com/mars/client3.php?uniqueid=".$row3['uniqueid']."'";
                                    echo '" target="_new">';
                                    echo $row3['uniqueid']."</a></td>";
								echo "<td class='".$tdClass."'>" . $row3['brand'] . "</td>";
								echo "<td class='".$tdClass."'>" . $row3['FirstName'] . "</td>";
								echo "<td class='".$tdClass."'>" . $row3['LastName'] . "</td>";
								echo "<td class='".$tdClass."'>" . $row3['phone1'] .  "</td>";
								echo "<td class='".$tdClass."'>" . $row3['phone2'] . "</td>";
								echo "<td class='".$tdClass."'>";
								if (isset($row3['email']))
								{
									echo   "<a href='mailto:" . $row3['email'] . "'>" . $row3['email']."</font>" ; 
								}
								echo "</td>";
								echo "<td class='".$tdClass."'>" . $row3['Street1'] . "</td>";
								echo "<td class='".$tdClass."'>" . $row3['Street2'] . "</td>";
								echo "<td class='".$tdClass."'>" . $row3['City'] . "</td>";
								echo "<td class='".$tdClass."'>" . $row3['State'] . "</td>";
								echo "<td class='".$tdClass."'>" . $row3['Zipcode'] . "</td>";
								echo "<td class='".$tdClass."'>" . $row3['agentfname'] . " " . $row3['agentlname'] . "</td>";
							echo "</tr>";
                        }	
                echo "</td>";
            echo "</tr>";
        echo "</table>";
    }
}

?>