<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<style type="text/css">

body {
	font-family: 'Open Sans', sans-serif;
	/*color:#424242;*/
	color:#000000;
	margin:0;
	/*text-align:center;*/
	height:100%;
	font-size:16px;
	background-repeat: no-repeat;

}
label {
	font-family: 'Open Sans', sans-serif;
	/*color:#424242;*/
	color:#666666;
	font-size:14px;
}
div#main {

  width:800px;
  /*width:700px;*/
  margin-left: auto;

  margin-right: auto;

  text-align: left;

}
div#main2 {

  width:100%;
  /*width:700px;*/
  margin-left: auto;

  margin-right: auto;

  text-align: left;

}
input {
font-family: Verdana, Arial, sans-serif;
font-size: 14px;
alignment-baseline: central;
border: groove;
border-width: 1px;
border-color: black;
}
</style>

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
 newwin=window.open(url,'windowname4', params);
 if (window.focus) {newwin.focus()}
 return false;
}
// -->
        </script>
<script type="text/javascript">
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","instantsearch2.php?q="+str,true);
xmlhttp.send();
}

function showPhone(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","instantsearch2.php?q="$_GET["q"]&p="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>

<form>
<!--<select name="users" onchange="showUser(this.value)">
<option value="">Select a person:</option>
<option value="1">Peter Griffin</option>
<option value="2">Lois Griffin</option>
<option value="3">Glenn Quagmire</option>
<option value="4">Joseph Swanson</option>
</select>
-->
<?PHP
    if (!isset($_GET["q"]))
    {
    echo "<div id='main2'>";
    echo "<br><br>";
    echo "<table border='0' width='100%'>";
    
    echo "<tr style='height='150'>";
    echo "<td width=1px>";
    echo "</td>";
    echo "<td align='center' style='background: url(./img/MARS_Search.png) no-repeat center; height=79px;width=654px'>";
    #echo "<label>Instant search all fields:</label>";
    echo "<br><br><br><br><br><br>";
    echo "</td>";
    echo "<td width=1px>";
    echo "</td>";
    echo "</tr>";


    
    echo "<tr>";
    echo "<td width=1px>";
    echo "</td>";
    echo "<td align='center' width='100%' height='79px'>";
    echo '<input type="text" name="users" id="textbox1" onkeyup="showUser(this.value)" style="width:100%; height:25px">';
    echo "<script>document.getElementById('textbox1').focus()</script>";
    echo "</td>";
    echo "<td width=1px>";
    echo "</td>";
    echo "</tr>";
    

    
    
    echo "</table>";
    echo "</div>";
    
    
    }
?>

</form>
<br />
<div id="txtHint"><b>Begin search by typing...</b></div>

</body>
</html>
<?php
    $serverName = "localhost\SPICE";
    $connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
    $con = sqlsrv_connect( $serverName, $connectionInfo );


#$con = mysql_connect('localhost', 'peter', 'abc123');
#if (!$con)
#  {
#  die('Could not connect: ' . mysql_error());
# }

#mysql_select_db("ajax_demo", $con);

#$sql="SELECT * FROM user WHERE id = '".$q."'";

#$result = mysql_query($sql);

    #$q=$_GET["users"];
    if (isset($_GET["q"]))
    {
        $q=$_GET["q"];
        //$query = "SELECT FirstName,LastName,brandid,brand,uniqueid,caseid,agentfname,agentlname,Street1,Street2,City,State,Zipcode,phone1,phone2,email FROM Status WHERE
        //uniqueid LIKE '%{$q}%'
        //OR
        //brand LIKE '%{$q}%'
        //OR
        //LastName LIKE '%{$q}%'
        //OR
        //FirstName LIKE '%{$q}%'
        //OR
        //phone1 LIKE '%{$q}%'
        //OR
        //phone2 LIKE '%{$q}%'
        //OR
        //email LIKE '%{$q}%'
        //OR
        //Street1 LIKE '%{$q}%'
        //OR
        //Street2 LIKE '%{$q}%'
        //OR
        //City LIKE '%{$q}%'
        //OR
        //State LIKE '%{$q}%'
        //OR
        //Zipcode LIKE '%{$q}%'
        //OR
        //agentlname LIKE '%{$q}%'
        //OR
        //agentfname LIKE '%{$q}%'
        //AND
        //TIME IS NOT NULL
        //";
	$query = "SELECT * FROM 
( SELECT FirstName,LastName,brandid,uniqueid,
agentfname,agentlname,Street1,Street2,City,
State,Zipcode,phone1,phone2,phone3,phone4,email, 
ROW_NUMBER() OVER (ORDER BY FirstName) 
as row 
FROM Status 
WHERE tenantid='4' AND
        uniqueid LIKE '%{$q}%'
        OR
        brand LIKE '%{$q}%'
        OR
        LastName LIKE '%{$q}%'
        OR
        FirstName LIKE '%{$q}%'
        OR
        phone1 LIKE '%{$q}%'
        OR
        phone2 LIKE '%{$q}%'
        OR
        email LIKE '%{$q}%'
        OR
        Street1 LIKE '%{$q}%'
        OR
        Street2 LIKE '%{$q}%'
        OR
        City LIKE '%{$q}%'
        OR
        State LIKE '%{$q}%'
        OR
        Zipcode LIKE '%{$q}%'
        OR
        agentlname LIKE '%{$q}%'
        OR
        agentfname LIKE '%{$q}%'
        AND
        TIME IS NOT NULL ) a 
WHERE row > 0 and row <= 1000";
	
    
        $sql = sqlsrv_query($con,$query);
        $params = array();
		$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
		$stmt = sqlsrv_query( $con, $query , $params, $options );
		
		$row_count = sqlsrv_num_rows( $stmt );
        echo "Results found: ".$row_count;
	if ($row_count == '1000')
	{
		echo "<br>Max rows set to 1000 try a a more specific query.";
	}
        echo "<div id='main2'>";
        echo "<table border='1' bordercolor='#000000' style='background-color:#FFFFFF' cellpadding='2' cellspacing='0'>";
        echo "<tr>";
        echo "<th><font size=1>Unique ID</font></th>";
        echo "<th><font size=1>Campaign</font></th>";
        echo "<th><font size=1>First Name</font></th>";
        echo "<th><font size=1>Last Name</font></th>";
        echo "<th><font size=1>Phone1</font></th>";
        echo "<th><font size=1>Phone2</font></th>";
        echo "<th><font size=1>Email</font></th>";
        echo "<th><font size=1>Street 1</font></th>";
        echo "<th><font size=1>Street 2</font></th>";
        echo "<th><font size=1>City</font></th>";        
        echo "<th><font size=1>State</font></th>";        
        echo "<th><font size=1>Zipcode</font></th>";        
        echo "<th><font size=1>Case Attorney</font></th>";        
        echo "</tr>";

    while($row = sqlsrv_fetch_array($sql))
    {
        echo "<tr>";
        echo "<td><font size=2>";
        echo '<a href="javascript: void(0)" onclick="popup(';
        echo "'http://sqlsrv.domain.initiativelegal.com/mars/client2.php?uniqueid=".$row['uniqueid']."')";
        echo '">';
        echo $row['uniqueid']."</a></td>";
        echo "<td><font size=2>" . $row['brand'] . "</font></td>";
        echo "<td><font size=2>" . $row['FirstName'] . "</font></td>";
        echo "<td><font size=2>" . $row['LastName'] . "</font></td>";
        echo "<td><font size=2>" . $row['phone1'] . "</font></td>";
        echo "<td><font size=2>" . $row['phone2'] . "</font></td>";
        echo "<td><font size=2>" . $row['email'] . "</font></td>";
        echo "<td><font size=2>" . $row['Street1'] . "</font></td>";
        echo "<td><font size=2>" . $row['Street2'] . "</font></td>";
        echo "<td><font size=2>" . $row['City'] . "</font></td>";
        echo "<td><font size=2>" . $row['State'] . "</font></td>";
        echo "<td><font size=2>" . $row['Zipcode'] . "</font></td>";
        echo "<td><font size=2>" . $row['agentlname'] . "</font></td>";
        echo "</tr>";
      }
    echo "</div>";
    echo "</table>";  
}
   

#mysql_close($con);
?>