<?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
$serverName = "localhost\SPICE";
$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$con = sqlsrv_connect( $serverName, $connectionInfo );


?>

<?PHP

if (isset($_POST['mediatype'])) $mediatype = $_POST['mediatype'];
if (empty($mediatype)) unset($mediatype);

if (isset($_POST['Scannerinitiatls'])) $scannerinitiatls = $_POST['Scannerinitiatls'];
if (empty($scannerinitiatls)) unset($scannerinitiatls);

if (isset($_POST['Othertype'])) $othertype = $_POST['Othertype'];
if (empty($othertype)) unset($othertype);

if (isset($_POST['Barcode']))
{
    $barcodeprevious = $_POST['Barcode'];
    if (empty($barcodeprevious)) unset($barcodeprevious);
    if (isset($barcodeprevious))
    {
        $query = "IF EXISTS (SELECT FirstName,LastName,barcode,uniqueid,agentlname FROM Status WHERE
        barcode='$barcodeprevious' AND TIME IS NOT NULL) UPDATE status set addressisundeliverable='Yes',addressisundeliverabledate='$date',addressisundeliverableweek='$week',addressisundeliverablemonth='$month' where barcode='$barcodeprevious' AND TIME IS NOT NULL";
        $sql = sqlsrv_query($con,$query);
        
        $query = "SELECT notelog FROM Status WHERE barcode='$barcodeprevious'";
        $results = sqlsrv_query($conn,$query);

	while($row = sqlsrv_fetch_array($results)){

        $notelog = $row['notelog']; if (empty($notelog)) unset($notelog);
        }
        if ($mediatype == 'Other')
        {
            $newnote = $othertype.' returned Address is undeliverable -'.$scannerinitiatls.'-';    
        }
        else
        {
            $newnote = $mediatype.' returned Address is undeliverable -'.$scannerinitiatls.'-';    
        }
        
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
        $query = "UPDATE status set notelog='$notestring' WHERE barcode='$barcodeprevious'";
        $results = sqlsrv_query($conn,$query);
    }
}



	echo "<div align='center'>";
	echo "<img src='/mars/test/img/MARS_Search_50_percent.png'>";
	echo "</div>";
echo "<FORM NAME ='form2' METHOD ='POST' ACTION='undeliverable.php'>";
echo "<table border='0' width='100%'>";
echo "<tr>";
echo "<td align='center'>";
#Media type radio
echo "Media type:<br>";
if (isset($mediatype))
{
    
    if ( $mediatype == 'Postcard' )

    {
        echo "<INPUT TYPE = 'Radio' Name ='mediatype'  value='Postcard' checked> Postcard <br>";
    }
    else
    {
        echo "<INPUT TYPE = 'Radio' Name ='mediatype'  value='Postcard' > Postcard <br>";
    }
    
    if ($mediatype == "Retainer")
    {
        echo "<INPUT TYPE = 'Radio' Name='mediatype'  value='Retainer' checked> Retainer <br>";
    }
    else
    {
        echo "<INPUT TYPE = 'Radio' Name='mediatype'  value='Retainer' > Retainer <br>";
    }
    
    if ($mediatype == "Other")
    {
        echo "<INPUT TYPE = 'Radio' Name='mediatype'  value='Other' checked> Other <br>";
        if (isset($othertype))
        {
                echo "Other type:<br><INPUT TYPE = 'text' Name='Othertype' value='".$othertype."' style='width:200px; height:25px'>";
        }
        else
        {
                echo "Other type:<br><INPUT TYPE = 'text' Name='Othertype' value='' style='width:200px; height:25px'>";
        }
    }
    else
    {
        echo "<INPUT TYPE = 'Radio' Name ='mediatype'  value='Other' > Other <br>";
        echo "Other type:<br><INPUT TYPE = 'text' Name='Othertype' value='' style='width:200px; height:25px'>";
    }
    
}
else
{
    #echo "Hello";
    echo "<INPUT TYPE = 'Radio' Name='mediatype' value='Postcard' checked> Postcard <br>";
    echo "<INPUT TYPE = 'Radio' Name='mediatype' value='Retainer' > Retainer <br>";
    echo "<INPUT TYPE = 'Radio' Name='mediatype' value='Other' > Other <br>";
    echo "Other type:<br><INPUT TYPE = 'text' Name='Othertype' value='' style='width:200px; height:25px'>";
    
}
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align='center'>";
#Initials text field
echo "Scanning Initials:<br> ";

if (isset($scannerinitiatls))
{
        echo "<INPUT TYPE = 'text' Name='Scannerinitiatls' value='".$scannerinitiatls."' style='width:200px; height:25px'>";
}
else
{
        echo "<INPUT TYPE = 'text' Name='Scannerinitiatls' value='' style='width:200px; height:25px'>";
}
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align='center'>";
#Barcode field
echo "Scan barcode:<br> ";

#if (isset($scannerinitiatls))
#{
#        echo "<INPUT TYPE = 'text' Name='Scannerinitiatls' value='".$scannerinitiatls."' style='width:200px; height:25px'>";
#}
#else
#{
        echo "<INPUT TYPE = 'text' Name='Barcode' id='barcode' value='' style='width:200px; height:25px'>";
        echo "<script>document.getElementById('barcode').focus()</script>";
        echo "<br>";
        echo "<INPUT TYPE = 'Submit' Name = 'Submit1' style='width:200px; height:25px; font-size:16px' VALUE = 'Scan' />";
#}
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align='center'>";
echo "Previously scanned:";
echo "<br>";
if (isset($barcodeprevious))
{
    echo "Last scanned: ";
    echo $barcodeprevious;
    echo "<br>";
}
?>
<?php
        $query = "SELECT FirstName,LastName,barcode,uniqueid,agentlname FROM Status WHERE
        addressisundeliverabledate='$date' AND TIME IS NOT NULL";
    
        $sql = sqlsrv_query($con,$query);
        $params = array();
		$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
		$stmt = sqlsrv_query( $con, $query , $params, $options );
		$row_count = sqlsrv_num_rows( $stmt );
        echo "<br>";
        echo "<div align='left'>";
        
        echo "</div>";
        echo "<div id='main2'>";
        echo "<table border='1' bordercolor='#000000' style='background-color:#FFFFFF' cellpadding='2' cellspacing='0'>";
        echo "<tr>";
        echo "Total scanned today: ".$row_count;
        echo "<th><font size=1>First Name</font></th>";
        echo "<th><font size=1>Last Name</font></th>";
        echo "<th><font size=1>Barcode</font></th>";
        echo "<th><font size=1>Unique ID</font></th>";
        //echo "<th><font size=1>Phone1</font></th>";
        //echo "<th><font size=1>Phone2</font></th>";
        //echo "<th><font size=1>Email</font></th>";
        //echo "<th><font size=1>Street 1</font></th>";
        //echo "<th><font size=1>Street 2</font></th>";
        //echo "<th><font size=1>City</font></th>";        
        //echo "<th><font size=1>State</font></th>";        
        //echo "<th><font size=1>Zipcode</font></th>";        
        echo "<th><font size=1>Case Attorney</font></th>";        
        echo "</tr>";

    while($row = sqlsrv_fetch_array($sql))
    {
        echo "<tr>";
        
        echo "<td><font size=2>" . $row['FirstName'] . "</font></td>";
        echo "<td><font size=2>" . $row['LastName'] . "</font></td>";
         echo "<td><font size=2>" . $row['barcode'] . "</font></td>";
        echo "<td><font size=2>";
        echo '<a href="javascript: void(0)" onclick="popup(';
        echo "'http://sqlsrv.domain.initiativelegal.com/mars/client2.php?uniqueid=".$row['uniqueid']."')";
        echo '">';
        echo $row['uniqueid']."</a></td>";
        //echo "<td><font size=2>" . $row['phone1'] . "</font></td>";
        //echo "<td><font size=2>" . $row['phone2'] . "</font></td>";
        //echo "<td><font size=2>" . $row['email'] . "</font></td>";
        //echo "<td><font size=2>" . $row['Street1'] . "</font></td>";
        //echo "<td><font size=2>" . $row['Street2'] . "</font></td>";
        //echo "<td><font size=2>" . $row['City'] . "</font></td>";
        //echo "<td><font size=2>" . $row['State'] . "</font></td>";
        //echo "<td><font size=2>" . $row['Zipcode'] . "</font></td>";
        echo "<td><font size=2>" . $row['agentlname'] . "</font></td>";
        echo "</tr>";
      }
    echo "</div>";
    echo "</table>";  

?>
