<?PHP
//require("style.php");//docutype, css
//require("functions.php");//functions
require("headerMailroom.php");
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
?><head>
<link rel="stylesheet" href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/marsParent.css" type="text/css" />
<!--<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/confirmations.css" rel="stylesheet" type="text/css" />-->
<style>
/*
#button {
	display: block;
	width: 175px;
	height: 45px;
	margin: 0px auto;
}

#button input:hover{
	background-image:url('images/bigbutton.png');
	background-position:left top;
	background-repeat:no-repeat;
}
*/

#button {   
	float: right;
    text-align: center;
    width: 300px;
}

.littleButton {
    background:url(/mars/images/littlebutton.png) no-repeat left top;
    cursor:pointer;
    width: 200px;
    height: 108px;
    border: none;
}

.littleButton:active, .littleButton:visited {
    background:url(/mars/images/littlebuttonPush.jpg) no-repeat left top;
    cursor:pointer;
    width: 200px;
    height: 108px;
    border: none;
}
</style>



</head>


<div "align=center">


<?PHP
//        echo "<table width='100%' height='140px' align='right' >";
//            echo "<tr>";
//                echo "<td >";
//                    echo '<div id="button">';
//                    echo '<form action="http://sqlsrv.domain.initiativelegal.com/thousandretainers.php" method="post">';    
//                    echo 'Push button to feed mailroom';
//					echo "<div align=center>";
//                    echo "<input type='hidden' name='GIVE1000' value=Yes />";
//                    echo '<input type="Submit" class="littleButton" onClick="clickFunction" style="height: 108px; width: 153px;" value=""/>';
//
//                    echo "</form>";
//                    echo "</div>";
//                    echo "</div>";
//                    echo "</td>";
//                    echo "</tr>";
//                    echo "</table>";
					
//					
//echo "<div align=left>";                    
//echo "<a href='mr_outlist.php' > Outstanding requests </a> &nbsp&nbsp&nbsp&nbsp&nbsp<a href='mr_outgoing.php' > Send a document </a> &nbsp&nbsp&nbsp&nbsp&nbsp<a href='undeliverable.php' > Receive undeliverables </a> &nbsp&nbsp&nbsp&nbsp&nbsp<a href='mr_outlist.php' > Refresh </a>";
//echo "</div>";


//echo "<img src='/mars/test/img/MARS_Search_50_percent.png'><Br><h1>Mailroom</h1>";




?>

<?PHP
$query = "select FirstName,LastName,uniqueid,agentlname,retainertomailroom,authtomailroom,retainertomailroomdate,feewaivertomailroom from status where retainertomailroom='Yes' and retaineraccept!='Yes' or  retainertomailroom='Yes' and retaineraccept is null order by retainertomailroomdate;";
$results = sqlsrv_query($conn,$query);

$qry2 = "select COUNT(*) as COUNT from status where retainertomailroom='Yes' and retaineraccept!='Yes' or  retainertomailroom='Yes' and retaineraccept is null;";
$results2 = sqlsrv_query($conn,$qry2);
    while($row2 = sqlsrv_fetch_array($results2))
    {
        $rowcount = $row2['COUNT']; 
    }
	
		echo "<div id='totalRequests'>";
        echo "Total requests for Attorney-Client Agreements: ".$rowcount;
		echo "</div>"; // end totalRequests 
	
        echo "<table border='1' bordercolor='#000000' width=100% style='background-color:#FFFFFF' cellpadding='2' cellspacing='0'>";
        echo "<tr>";
        echo "<th width='200px'Document Type</th>";
        echo "<th width='200px'>Request Date</th>";
        echo "<th width='150px'>First Name</th>";
        echo "<th width='150px'>Last Name</th>";
        #echo "<th><font size=1>Barcode</font></th>";
        echo "<th width='150px'>Unique ID</th>";
        //echo "<th><font size=1>Phone1</font></th>";
        //echo "<th><font size=1>Phone2</font></th>";
        //echo "<th><font size=1>Email</font></th>";
        //echo "<th><font size=1>Street 1</font></th>";
        //echo "<th><font size=1>Street 2</font></th>";
        //echo "<th><font size=1>City</font></th>";        
        //echo "<th><font size=1>State</font></th>";        
        //echo "<th><font size=1>Zipcode</font></th>";        
        echo "<th>Case Attorney</th>";
        echo "</tr>";

    while($row = sqlsrv_fetch_array($results))
    {
        if ($row['retainertomailroom'] == 'Yes') $docutype = 'Retainer';
        if (isset($docutype))
        {
            if ($row['authtomailroom'] == 'Yes') $docutype = $docutype.' and Authorizations';
        }
        else
        {
            if ($row['authtomailroom'] == 'Yes') $docutype = 'Authorizations';
        }
        if (isset($docutype))
        {
            if ($row['feewaivertomailroom'] == 'Yes')$docutype = $docutype.' and Feewaiver';
        }
        else
        {
        if ($row['feewaivertomailroom'] == 'Yes')$docutype = 'Feewaiver';    
        }
        
        echo "<tr>";
        echo "<td><font size=2>" . $docutype . "</font></td>";
        echo "<td><font size=2>" . $row['retainertomailroomdate'] . "</font></td>";
        echo "<td><font size=2>" . $row['FirstName'] . "</font></td>";
        echo "<td><font size=2>" . $row['LastName'] . "</font></td>";
        #echo "<td><font size=2>" . $row['barcode'] . "</font></td>";
        echo "<td><font size=2>";
        echo '<a href="javascript: void(0)" onclick="popup(';
        echo "'http://sqlsrv.domain.initiativelegal.com/mars/mr_outgoing.php?docutype=".$docutype."&uniqueid=".$row['uniqueid']."')";
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
        unset($docutype);
      }
    echo "</div>";
    echo "</table>";
	
    
?>
<?PHP
$query = "select FirstName,LastName,uniqueid,agentlname,authtomailroom,authtomailroomdate,feewaivertomailroom,feewaivertomailroomdate from status where authtomailroom='Yes' and retaineraccept='Yes' or feewaivertomailroom='Yes' and retaineraccept='Yes' order by authtomailroomdate,feewaivertomailroomdate;";
$results = sqlsrv_query($conn,$query);

$qry2 = "select COUNT(*) as COUNT from status where authtomailroom='Yes' and retaineraccept='Yes' or feewaivertomailroom='Yes' and retaineraccept='Yes' ;";
$results2 = sqlsrv_query($conn,$qry2);
    while($row2 = sqlsrv_fetch_array($results2))
    {
        $rowcount = $row2['COUNT']; 
    }
        echo "<table border='1' bordercolor='#000000' width=100% style='background-color:#FFFFFF' cellpadding='2' cellspacing='0'>";
        echo "<tr>";
        echo "<br>";
        echo "Total requests for Authorizations and Feewaivers: ".$rowcount;
        echo "<th width='200px'><font size=1>Document Type</font></th>";
        echo "<th width='100px'><font size=1>Request Date</font></th>";
        echo "<th width='100px'><font size=1>Request Date</font></th>";
        echo "<th width='150px'><font size=1>First Name</font></th>";
        echo "<th width='150px'><font size=1>Last Name</font></th>";
        #echo "<th><font size=1>Barcode</font></th>";
        echo "<th width='150px'><font size=1>Unique ID</font></th>";
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

    while($row = sqlsrv_fetch_array($results))
    {

            if ($row['authtomailroom'] == 'Yes') $docutype = 'Authorizations';
            
        if (isset($docutype))
        {
            if ($row['feewaivertomailroom'] == 'Yes')$docutype = $docutype.' and Feewaiver';
        }
        else
        {
        if ($row['feewaivertomailroom'] == 'Yes')$docutype = 'Feewaiver';    
        }
        
        echo "<tr>";
        echo "<td><font size=2>" . $docutype . "</font></td>";
        echo "<td><font size=2>";
        if ($row['authtomailroom'] == 'Yes')
        {
            echo $row['authtomailroomdate'] . "</font></td>";
        }
        else
        {
            echo "</font></td>";
        }
        echo "<td><font size=2>";
        
        if ($row['feewaivertomailroom'] == 'Yes')
        { 
            echo $row['feewaivertomailroomdate'] . "</font></td>";
        }
        else
        {
            echo "</font></td>";
        }
        echo "<td><font size=2>" . $row['FirstName'] . "</font></td>";
        echo "<td><font size=2>" . $row['LastName'] . "</font></td>";
        #echo "<td><font size=2>" . $row['barcode'] . "</font></td>";
        echo "<td><font size=2>";
        echo '<a href="javascript: void(0)" onclick="popup(';
        echo "'http://sqlsrv.domain.initiativelegal.com/mars/mr_outgoing.php?docutype=".$docutype."&uniqueid=".$row['uniqueid']."')";
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
        unset($docutype);
      }
    echo "</div>";
    echo "</table>";
    
?>