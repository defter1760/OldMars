

<?PHP
require("style.php");
require("db.php");
require("functions.php");
?>

<?php
require('calendar/tc_calendar.php');

if (isset($_POST['weekchoice'])) $weekchoice = $_POST['weekchoice'];
if (empty($weekchoice)) $weekchoice = $weeknow;
?>
<?PHP

echo "<form name='calendar' method='post' action=reports.php>";
echo "<a href='reportslongform.php' >Go to longform questions</a>";  
?>
<!--<table>
	<tr>
		<td>-->
<?php
	  $myCalendar = new tc_calendar("date1", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  //$myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2000, 2015);
	  $myCalendar->dateAllow('2008-05-13', '2015-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('left', 'bottom');
	  $myCalendar->writeScript();
	  ?>
<!--<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Select Day">-->
<?PHP 
echo "$dateSelected";
?>
<?PHP    
  //echo "<tr>"; 
  	 
    echo "<FORM NAME ='form2' METHOD ='POST' action=reports.php>";
	echo "<div align='left' class='MyFont'>";
	echo "<br>";
        echo "Choose Week";
	echo "</div>";
	echo "<div align='left' class='MyFont'>";
	echo "<INPUT TYPE = 'text' Name ='weekchoice'  value= '$weekchoice' width='100' height='12px'>";
	echo "</div>";
	echo "</div>";
	echo "</FORM>";

?>


<?PHP    
  //echo "<tr>"; 
  	 
    echo "<FORM NAME ='form2' METHOD ='POST' action=reports.php>";
	echo "<div align='left' class='MyFont'>";
	echo "Choose Month";
	echo "</div>";
	echo "<div align='left' class='MyFont'>";
	echo "<INPUT TYPE = 'text' Name ='monthchoice'  value= '$monthchoice' width='100' height='12px'>";
	echo "<INPUT TYPE = 'Submit' Name = 'Submit1'  VALUE = 'Go'>";
	echo "</div>";
	echo "</div>";

	//echo "<INPUT TYPE = 'Reset' Name = 'Submit2'  VALUE = 'Reset'>";
	echo "</FORM>";

?>

<?PHP
//start of clients per attorney graph
echo "<br><br>";
echo "<table align='left' width='1020px' border='0' cellpadding='0' cellspacing='0' style='float: none;'>";
	  echo "<tr>";
		    echo "<td  height='515px'   align='center'>";
echo "<iframe  align='middle' marginheight='5%' width='100%' height='100%' src='";
echo "http://sqlsrv.domain.initiativelegal.com/pchart213/examples/example.drawBarChart.palette.mine.php' name='focusstealer' frameborder='0' ";
echo '"';
echo "></iframe>";
echo "</td>";
echo "<td  height='515px'   align='center'>";
echo "<iframe align='middle' marginheight='5%' width='100%' height='100%' src='";
echo "http://sqlsrv.domain.initiativelegal.com/pchart213/examples/example.drawBarChart.palette.webhits.php' name='focusstealer' frameborder='0' ";
echo '"';
echo "></iframe>";
echo "</td>";		
echo "</tr>";		
echo "</table>";

echo "<table align='left' width='1020px' border='0' cellpadding='0' cellspacing='0' style='float: none;'>";
echo "<tr>";
echo "<td  height='250px'   align='center'>";
echo "<iframe  align='middle' marginheight='5%' width='100%' height='100%' src='";
echo "http://sqlsrv.domain.initiativelegal.com/pchart213/examples/example.drawThreshold.labels.retainersacceptedpermonth.php' name='focusstealer' frameborder='0' ";
echo '"';
echo "></iframe>";
echo "</td>";		
echo "</tr>";		
echo "</table>";
		
echo "<table align='left' width='1220px' border='0' cellpadding='0' cellspacing='0' style='float: none;'>";
echo "<tr>";
echo "<td  height='702px'   align='center'>";
echo "<iframe  align='middle' marginheight='5%' width='100%' height='100%' src='";
echo "http://sql.initiativelegal.com:35535/pchart213/examples/example.drawThreshold.labels.retainersreceivedperday.php' name='focusstealer' frameborder='0' ";
echo '"';
echo "></iframe>";
echo "</td>";		
echo "</tr>";		
echo "</table>";		
?>
		
<?PHP
//dnc count
	$query = "SELECT COUNT(*) as COUNT FROM status where donotcontact='yes';";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$dnccount = $row['COUNT'];
	}
//retainer sent but not received        
	$query = "SELECT COUNT(*) as COUNT FROM status where retainerSent is not null and retaineraccepted is null and retainerRecieved is null;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$retainersentbutnotrecieved = $row['COUNT'];
	}
//retainer sent         
	$query = "SELECT COUNT(*) as COUNT FROM status where retainerSent is not null ;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$prospectiveretainersent = $row['COUNT'];
	}
//feewaiver outstanding         
	$query = "SELECT COUNT(*) as COUNT FROM status where feewaiversent is not null and feewaiverreceived is null;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$prospectivefeewaivernotaccepted = $row['COUNT'];
	}

//auth outstanding         
	$query = "SELECT COUNT(*) as COUNT FROM status where authformsent is not null and  authaccept is null;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$prospectiveauthnotaccepted = $row['COUNT'];
	}
	$query = "SELECT COUNT(*) as COUNT FROM status where retainerSent is not null and  retainerRecieved is null and retaineraccepted is null;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$prospectiveretainernotaccepted = $row['COUNT'];
	}        
//auth accepted       
	$query = "SELECT COUNT(*) as COUNT FROM status where authformsent is not null and  authaccept is not null;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$prospectiveauthaccepted = $row['COUNT'];
	}
//retainers accepted       
	$query = "SELECT COUNT(*) as COUNT FROM status where retainerSent is not null and  retaineraccept is not null;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$prospectiveretaineraccepted = $row['COUNT'];
	}        
//feewaiver outstanding         
	$query = "SELECT COUNT(*) as COUNT FROM status where feewaiversent is not null and feewaiveraccept is not null;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$prospectivefeewaiveraccepted = $row['COUNT'];
	}        
//$prospectiveundeliverableaddressesall         
	$query = "SELECT COUNT(*) as COUNT FROM status where addressisundeliverable='Yes' ;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$prospectiveundeliverableaddressesall  = $row['COUNT'];
	}           
//$prospectiveundeliverableaddressespostcard         
	$query = "SELECT COUNT(*) as COUNT FROM status where addressisundeliverable='Yes' and notelog like '%postcard returned address is undeliverable%' ;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$prospectiveundeliverableaddressespostcard  = $row['COUNT'];
	}        
//$prospectiveundeliverableaddressesretainer         
	$query = "SELECT COUNT(*) as COUNT FROM status where addressisundeliverable='Yes' and notelog like '%retainer returned address is undeliverable%' ;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$prospectiveundeliverableaddressesretainer = $row['COUNT'];
	}

echo "<table border='1' bordercolor='#000000' style='background-color:#FFFFFF' width='650px' cellpadding='2' cellspacing='0'>";
    echo "<tr style='background-color:#DADADA'>";
    echo "<td>";
    echo '<form action="report.php" method="post">';    



$qry = "where donotcontact='yes'";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';

echo "Do not call list ";
echo "</td><td>";
echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#DADADA" value="'.$dnccount.'"/>';
echo "</td></tr>";
echo "</form>";

    echo "<tr style='background-color:#FFFFFF'>";
    echo '<form action="report.php" method="post">';    
echo "<td>";
echo "How many clients returned a retainer on a given day";
echo "</td><td>";
echo "TBD";

echo "</td>";
echo "</tr>";
    echo "<tr style='background-color:#DADADA'>";
    echo "<td>";
echo "How many long form interviews have been completed on a given day";
echo "</td><td>";
echo "TBD";
echo "</td>";
echo "</tr>";

#echo "<br><br>";

#
##
###
####
#####
//////
/////   -start-   Outstanding reports
echo "<tr style='background-color:#FFFFFF'>";
echo "<td>";
echo '<form action="report.php" method="post">';
$qry = "where retainerSent is not null";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All Retainers sent ";

echo "</td><td>";
echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$prospectiveretainersent.'"/>';
echo "</form>";
echo "</td>";
echo "</tr>";
echo "<tr style='background-color:#DADADA'>";
echo "<td>";
echo '<form action="report.php" method="post">';
$qry = "where authformsent is not null and  authaccept is null";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All authorizations sent ";
echo "</td>";
echo "<td>";
#echo $prospectiveauthnotaccepted;
echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#DADADA" value="'.$prospectiveauthnotaccepted.'"/>';
echo "";
echo "</form>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo '<form action="report.php" method="post">';
$qry = "where feewaiversent is not null and feewaiveraccept is null";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All feewaivers sent (";
#echo $prospectivefeewaivernotaccepted;
echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$prospectivefeewaivernotaccepted.'"/>';
echo ")";
echo "</form>";
//////
/////   -end-   Sent reports
######
####
###
##
#
echo "<br>";
#
##
###
####
#####
//////
/////   -start-   Outstanding reports
echo '<form action="report.php" method="post">';
$qry = "where retainerSent is not null";
	$query = "SELECT COUNT(*) as COUNT FROM status $qry;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$countthis = $row['COUNT'];
	}
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All retainers sent but not received (";
#echo $prospectiveauthnotaccepted;
echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$countthis.'"/>';
echo ")";
echo "</form>";
echo '<form action="report.php" method="post">';
$qry = "where authformsent is not null ";
	$query = "SELECT COUNT(*) as COUNT FROM status $qry;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$countthis = $row['COUNT'];
	}
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All authorizations sent but not received (";
#echo $prospectiveauthnotaccepted;
echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$countthis.'"/>';
echo ")";
echo "</form>";
echo '<form action="report.php" method="post">';
$qry = "where feewaiversent is not null";
	$query = "SELECT COUNT(*) as COUNT FROM status $qry;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$countthis = $row['COUNT'];
	}
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All feewaivers sent but not received (";
#echo $prospectivefeewaivernotaccepted;
echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$countthis.'"/>';
echo ")";
echo "</form>";

//////
/////   -end-   Outstanding reports
######
####
###
##
#
echo "<br>";
#
##
###
####
#####
//////
/////   -start-   Received reports
//retainer received not accepted         
$qry = "where retainerSent is not null and retaineraccept is null and retainerRecieved is not null";
	$query = "SELECT COUNT(*) as COUNT FROM status $qry;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$prospectivereceivedretainernotaccepted = $row['COUNT'];
	}
echo '<form action="report.php" method="post">';

echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All retainers received but not accepted (";
#echo $prospectiveauthnotaccepted;
echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$prospectivereceivedretainernotaccepted.'"/>';
echo ")";
echo "</form>";
//auth received not accepted         
$qry = "where authformsent is not null and authaccept is null and authformreceived is not null";
	$query = "SELECT COUNT(*) as COUNT FROM status $qry;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$prospectivereceivedauthnotaccepted = $row['COUNT'];
	}
echo '<form action="report.php" method="post">';

echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All authorizations received but not accepted (";
#echo $prospectiveauthnotaccepted;
echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$prospectivereceivedauthnotaccepted.'"/>';
echo ")";
echo "</form>";
//feewaiver received not accepted         
$qry = "where feewaiversent is not null and feewaiveraccept is null and feewaiverreceived is not null";

	$query = "SELECT COUNT(*) as COUNT FROM status $qry;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$prospectivereceivedfeewaivernotaccepted = $row['COUNT'];
	}   
echo '<form action="report.php" method="post">';
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All feewaivers received but not accepted (";
#echo $prospectivefeewaivernotaccepted;
echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$prospectivereceivedfeewaivernotaccepted.'"/>';
echo ")";
echo "</form>";

//////
/////   -end-   Received reports
######
####
###
##
#
echo "<br>";
#
##
###
####
#####
//////
/////   -start-   Accepted reports
echo '<form action="report.php" method="post">';
$qry = "where retainerSent is not null and  retaineraccept is not null";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All retainers accepted (";
#echo "TBD";
#echo $prospectiveauthaccepted;
echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$prospectiveretaineraccepted.'"/>';
echo ")";
echo "</form>";

echo '<form action="report.php" method="post">';
$qry = "where authformsent is not null and  authaccept is not null";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All authorizations accepted (";
#echo "TBD";
#echo $prospectiveauthaccepted;
echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$prospectiveauthaccepted.'"/>';
echo ")";
echo "</form>";

echo '<form action="report.php" method="post">';
$qry = "where feewaiversent is not null and feewaiveraccept is not null";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All feewaivers accepted (";
#echo "TBD";
#echo $prospectivefeewaiveraccepted;
echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$prospectivefeewaiveraccepted.'"/>';
echo ")";
echo "</form>";

//////
/////   -end-  Accepted reports
######
####
###
##
#
echo "<br>";
#
##
###
####
#####
//////
/////   -start-   Undeliverable reports
echo '<form action="report.php" method="post">';
$qry = "where addressisundeliverable='Yes' and notelog like '%postcard returned address is undeliverable%'";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All undeliverable addresses postcards (";
#echo $prospectiveundeliverableaddressespostcard ;
echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$prospectiveundeliverableaddressespostcard.'"/>';
echo ")";
echo "</form>";

echo '<form action="report.php" method="post">';
$qry = "where addressisundeliverable='Yes' and notelog like '%retainer returned address is undeliverable%'";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All undeliverable addresses retainers (";
#echo $prospectiveundeliverableaddressesretainer ;
echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$prospectiveundeliverableaddressesretainer.'"/>';
echo ")";
echo "</form>";


echo '<form action="report.php" method="post">';
$qry = "where addressisundeliverable='Yes'";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All undeliverable addresses all (";
echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$prospectiveundeliverableaddressesall.'"/>';
echo ")";
echo "</form>";
//////
/////   -end-   Undeliverable reports
#####
####
###
##
#
echo "<br>";
echo "<br>";
#echo "<br>";



$radio = array(
    'agentlname' => array(
'Alvarado',
'Cox',
'Eshghieh',
'Hutchings',
'Larsen',
'Moore',
'Pinney',
'Valero',
'Yonan',
'Milford',
    )
);

foreach($radio as $name => &$values)
{

    foreach($values as &$value)
    {
        $query = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value';";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$agentcount = $row['COUNT'];
	}  
        echo '<form action="report.php" method="post">';
        $qry = "where agentlname='$value'";
        echo '<input type="hidden" name="query" value="';
        echo $qry;
        echo '"/>';
        echo "<br><strong>".$value."</strong><br>&nbsp&nbsp&nbsp&nbsp&nbsp Assigned Clients (";
        #echo $agentcount ;
        echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$agentcount.'"/>';
        echo ")";
        echo "</form>";
        $query = "SELECT COUNT(*) as COUNT FROM status where
        agentlname='$value' and donotcontact='yes';";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$agentcount10 = $row['COUNT'];
	}  
        echo '<form action="report.php" method="post">';
        $qry = "where agentlname='$value' and donotcontact='yes'";
        echo '<input type="hidden" name="query" value="';
        echo $qry;
        echo '"/>';        
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp Do not contact (";
        echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$agentcount10.'"/>';
        echo ")";
        echo "</form>";
                $query = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value' and interviewstarted is not null;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$agentcount2 = $row['COUNT'];
	}
        echo '<form action="report.php" method="post">';
        $qry = "where agentlname='$value' and interviewstarted is not null";
        echo '<input type="hidden" name="query" value="';
        echo $qry;
        echo '"/>';
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp Shortform complete online (";
        echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$agentcount2.'"/>';
        echo ")";
        echo "</form>";

                        $query = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value' and interviewstarted is not null;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$agentcount3 = $row['COUNT'];
	}  
        echo '<form action="report.php" method="post">';
        $qry = "where agentlname='$value' and interviewstarted is not null";
        echo '<input type="hidden" name="query" value="';
        echo $qry;
        echo '"/>';        
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp Shortform complete on phone (";
        #echo $agentcount3 ;
        echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$agentcount3.'"/>';
        echo ")";
        echo "</form>";
                $query = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value' and interviewstarted is not null;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$agentcount4 = $row['COUNT'];
	}  
        echo '<form action="report.php" method="post">';
        $qry = "where agentlname='$value' and interviewstarted is not null";
        echo '<input type="hidden" name="query" value="';
        echo $qry;
        echo '"/>'; 
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp Longform complete online (";
        #echo $agentcount4 ;
        echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$agentcount4.'"/>';
        echo ")";
        echo "</form>";
                        $query = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value' and interviewstarted is not null;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$agentcount5 = $row['COUNT'];
	}  
                echo '<form action="report.php" method="post">';
        $qry = "where agentlname='$value' and interviewstarted is not null";
        echo '<input type="hidden" name="query" value="';
        echo $qry;
        echo '"/>'; 
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp Longform complete on phone (";
        #echo $agentcount5 ;
        echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$agentcount5.'"/>';
        echo ")";
        echo "</form>";
                $query = "SELECT COUNT(*) as COUNT FROM status where
                        agentlname='$value' and feewaiversent is not null and feewaiveraccept is null;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$agentcount6 = $row['COUNT'];
	}  
        echo '<form action="report.php" method="post">';
        $qry = "where agentlname='$value' and feewaiversent is not null and feewaiveraccept is null";
        echo '<input type="hidden" name="query" value="';
        echo $qry;
        echo '"/>';         
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp Outstanding feewaiver (";
        #echo $agentcount6 ;
        echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$agentcount6.'"/>';
        echo ")";
        echo "</form>";
                        $query = "SELECT COUNT(*) as COUNT FROM status where
                        agentlname='$value' and authformsent is not null and  authaccept is null;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$agentcount7 = $row['COUNT'];
	}  
        echo '<form action="report.php" method="post">';
        $qry = "where agentlname='$value' and authformsent is not null and  authaccept is null";
        echo '<input type="hidden" name="query" value="';
        echo $qry;
        echo '"/>';         
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp Outstanding authorization (";
        #echo $agentcount7 ;
        echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$agentcount7.'"/>';
        echo ")";
        echo "</form>";
                $query = "SELECT COUNT(*) as COUNT FROM status where
                        agentlname='$value' and feewaiversent is not null and feewaiveraccept is not null;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$agentcount8 = $row['COUNT'];
	}  
        echo '<form action="report.php" method="post">';
        $qry = "where agentlname='$value' and feewaiversent is not null and feewaiveraccept is not null";
        echo '<input type="hidden" name="query" value="';
        echo $qry;
        echo '"/>';         
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp Accepted feewaiver (";
        #echo $agentcount8 ;
        echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$agentcount8.'"/>';
        echo ")";
        echo "</form>";
                        $query = "SELECT COUNT(*) as COUNT FROM status where
                        agentlname='$value' and authformsent is not null and  authaccept is not null;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$agentcount9 = $row['COUNT'];
	}  
        echo '<form action="report.php" method="post">';
        $qry = "where agentlname='$value' and authformsent is not null and  authaccept is not null";
        echo '<input type="hidden" name="query" value="';
        echo $qry;
        echo '"/>';                
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp Accepted authorization (";
        #echo $agentcount9 ;
        echo '<input type="Submit" style="height: 1.3em; width: 3em; font-size:12px; color:blue; border:none; background-color:#FFF" value="'.$agentcount9.'"/>';
        echo ")";
        echo "</form>";


    }
}
?>

