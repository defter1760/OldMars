<?PHP
$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");


$conn = sqlsrv_connect( $serverName, $connectionInfo );
if (isset($_GET['q']))
{
$terms = $_GET['q'];
}
function search_split_terms($terms){

		$terms = preg_replace("/\"(.*?)\"/e", "search_transform_term('\$1')", $terms);
		$terms = preg_split("/\s+|,/", $terms);

		$out = array();

		foreach($terms as $term){

			$term = preg_replace("/\{WHITESPACE-([0-9]+)\}/e", "chr(\$1)", $term);
			$term = preg_replace("/\{COMMA\}/", ",", $term);

			$out[] = $term;
		}

		return $out;
	}

	function search_transform_term($term){
		$term = preg_replace("/(\s)/e", "'{WHITESPACE-'.ord('\$1').'}'", $term);
		$term = preg_replace("/,/", "{COMMA}", $term);
		return $term;
	}

	function search_escape_rlike($string){
		return preg_replace("/([.\[\]*^\$])/", '\\\$1', $string);
	}

	function search_db_escape_terms($terms){
		$out = array();
		foreach($terms as $term){
#			$out[] = '[[:<:]]'.AddSlashes(search_escape_rlike($term)).'[[:>:]]';
			$out[] = '%'.AddSlashes(search_escape_rlike($term)).'%';
		}
		return $out;
	}

	function search_perform($terms,$conn){

		$terms = search_split_terms($terms);
		$terms_db = search_db_escape_terms($terms);
		$terms_rx = search_rx_escape_terms($terms);

		$parts = array();
		foreach($terms_db as $term_db){
#			$parts[] = "content_body RLIKE '$term_db'";
			$parts[] = "
		LastName LIKE '$term_db'
		OR
		FirstName LIKE '$term_db'
		OR
		phone1 LIKE '$term_db'
		OR
		phone2 LIKE '$term_db'
		OR
		phone3 LIKE '$term_db'
		OR
		phone4 LIKE '$term_db'
		OR
		phone5 LIKE '$term_db'
		OR
		phone6 LIKE '$term_db'
		OR
		email LIKE '$term_db'
		OR
		Street1 LIKE '$term_db'
		OR
		Street2 LIKE '$term_db'
		OR
		City LIKE '$term_db'
		OR
		State LIKE '$term_db'
		OR
		Zipcode LIKE '$term_db'";
		}
#		$parts = implode(' AND ', $parts);
		$parts = implode(' OR ', $parts);

		$sql = "SELECT
		FirstName,LastName,brandid,uniqueid,
agentfname,agentlname,Street1,Street2,City,
State,Zipcode,phone1,phone2,phone3,phone4,phone5,phone6,email
		FROM Status WHERE $parts";

		$rows = array();

		$result = sqlsrv_query($conn,$sql);
		while($row = sqlsrv_fetch_array($result)){
                    

			$row['score'] = 0;

			foreach($terms_rx as $term_rx){
				$row['score'] += preg_match_all("/$term_rx/i", $row['FirstName'], $null);
			}

			$rows[] = $row;
		}

		uasort($rows, 'search_sort_results');

		return $rows;
	}

	function search_rx_escape_terms($terms){
		$out = array();
		foreach($terms as $term){
			$out[] = '\b'.preg_quote($term, '/').'\b';
		}
		return $out;
	}

	function search_sort_results($a, $b){

		$ax = $a['score'];
		$bx = $b['score'];

		if ($ax == $bx){ return 0; }
		return ($ax > $bx) ? -1 : 1;
	}

	function search_html_escape_terms($terms){
		$out = array();

		foreach($terms as $term){
			if (preg_match("/\s|,/", $term)){
				$out[] = '"'.HtmlSpecialChars($term).'"';
			}else{
				$out[] = HtmlSpecialChars($term);
			}
		}

		return $out;	
	}

	function search_pretty_terms($terms_html){

		if (count($terms_html) == 1){
			return array_pop($terms_html);
		}

		$last = array_pop($terms_html);

		return implode(', ', $terms_html)." and $last";
	}


	#
	# do the search here...
	#
//IF (ISSET($_GET['q']))
//{
//	$results = search_perform($_GET['q'],$conn);	
//
//
//	$term_list = search_pretty_terms(search_html_escape_terms(search_split_terms($_GET['q'])));
//}

	#
	# of course, we're using smarty ;)
	#

#	$smarty->assign('term_list', $term_list);
#
#	if (count($results)){
#
#		$smarty->assign('results', $results);
#		$smarty->display('search_results.txt');
#	}else{
#
#		$smarty->display('search_noresults.txt');
#	}
////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
##
##Instantsearch2.php start bellow
##
////////////////////////////////////////////////////////
////////////////////////////////////////////////////////

?>

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
xmlhttp.open("GET","Search2.php?q="+str,true);
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
    #echo '<input type="text" name="q" id="textbox1" onkeyup="showUser(this.value)" style="width:100%; height:25px">';
    echo '<input type="text" name="q" id="textbox1" style="width:100%; height:25px">';
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
	
IF (ISSET($_GET['q']))
{
	$results = search_perform($_GET['q'],$conn);	


	$term_list = search_pretty_terms(search_html_escape_terms(search_split_terms($_GET['q'])));
}    
////        $sql = sqlsrv_query($con,$query);
////        $params = array();
////		$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
////		$stmt = sqlsrv_query( $con, $query , $params, $options );
////		
////		$row_count = sqlsrv_num_rows( $stmt );
////        echo "Results found: ".$row_count;
////	if ($row_count == '1000')
////	{
////		echo "<br>Max rows set to 1000 try a a more specific query.";
////	}
        echo "<div id='main2'>";
//        echo "<table border='1' bordercolor='#000000' style='background-color:#FFFFFF' cellpadding='2' cellspacing='0'>";
//        echo "<tr>";
//        echo "<th><font size=1>Unique ID</font></th>";
//        echo "<th><font size=1>Campaign</font></th>";
//        echo "<th><font size=1>First Name</font></th>";
//        echo "<th><font size=1>Last Name</font></th>";
//        echo "<th><font size=1>Phone1</font></th>";
//        echo "<th><font size=1>Phone2</font></th>";
//        echo "<th><font size=1>Email</font></th>";
//        echo "<th><font size=1>Street 1</font></th>";
//        echo "<th><font size=1>Street 2</font></th>";
//        echo "<th><font size=1>City</font></th>";        
//        echo "<th><font size=1>State</font></th>";        
//        echo "<th><font size=1>Zipcode</font></th>";        
//        echo "<th><font size=1>Case Attorney</font></th>";        
//        echo "</tr>";
//
//    while($row = sqlsrv_fetch_array($sql))
//    {
//        echo "<tr>";
//        echo "<td><font size=2>";
//        echo '<a href="javascript: void(0)" onclick="popup(';
//        echo "'http://sql.initiativelegal.com:35535/mars/client2.php?uniqueid=".$row['uniqueid']."')";
//        echo '">';
//        echo $row['uniqueid']."</a></td>";
//        echo "<td><font size=2>" . $row['brand'] . "</font></td>";
//        echo "<td><font size=2>" . $row['FirstName'] . "</font></td>";
//        echo "<td><font size=2>" . $row['LastName'] . "</font></td>";
//        echo "<td><font size=2>" . $row['phone1'] . "</font></td>";
//        echo "<td><font size=2>" . $row['phone2'] . "</font></td>";
//        echo "<td><font size=2>" . $row['email'] . "</font></td>";
//        echo "<td><font size=2>" . $row['Street1'] . "</font></td>";
//        echo "<td><font size=2>" . $row['Street2'] . "</font></td>";
//        echo "<td><font size=2>" . $row['City'] . "</font></td>";
//        echo "<td><font size=2>" . $row['State'] . "</font></td>";
//        echo "<td><font size=2>" . $row['Zipcode'] . "</font></td>";
//        echo "<td><font size=2>" . $row['agentlname'] . "</font></td>";
//        echo "</tr>";
//      }
echo $results."<br>".$term_list;
    echo "</div>";
//    echo "</table>";  

   

#mysql_close($con);
?>