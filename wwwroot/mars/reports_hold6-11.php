<?PHP
require("header.php");
require("db.php");
$dateNOW = date('Y').'-'.date('m').'-'.date('d');
$timeNOW = date('H').':'.date('i').':'.date('s');
$monthNOW = date('Y').'-'.date('m');
$weekNOW = date('Y').'-'.date('W');
?>

<link rel="stylesheet" href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/marsParent.css" type="text/css" />

<?php

require('calendar/tc_calendar.php');

if (isset($_POST['weekchoice'])) $weekchoice = $_POST['weekchoice'];
if (empty($weekchoice)) $weekchoice = $weekNOW;
?>
<?PHP

//echo "<table cellspacing='2' cellpadding='2' width='100%' height='100px' align='left' >";
//echo "<tr>";
//echo "<td align='left' colspan='4'>";
//
//echo "<form name='calendar' method='post' action=reports.php>";
////echo "<br><br>";
//echo "<a href='reportslongform.php' >Go to longform questions</a>";  
//
//echo "</td>";
//echo "</tr>";
?>
<!--<table>
	<tr>
		<td>-->
<?php

//echo "<tr>";
//echo "<td width='170px' valign='top'";
//
//	  $myCalendar = new tc_calendar("date1", true, false);
//	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
//	  //$myCalendar->setDate(date('d'), date('m'), date('Y'));
//	  $myCalendar->setPath("calendar/");
//	  $myCalendar->setYearInterval(2000, 2015);
//	  $myCalendar->dateAllow('2008-05-13', '2015-03-01');
//	  $myCalendar->setDateFormat('j F Y');
//	  $myCalendar->setAlignment('left', 'bottom');
//	  $myCalendar->writeScript();
	  ?>
<!--<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Select Day">-->
<?PHP 
#echo "$dateSelected";
?>
<?PHP    
  //echo "<tr>"; 

//echo "</td>";
//echo "<td width='300px' valign='top'";
//
//    echo "<FORM NAME ='form2' METHOD ='POST' action=reports.php>";
//	echo "<div align='left' class='MyFont'>";
//        echo "Choose Week &nbsp;&nbsp;";
//	echo "<INPUT TYPE = 'text' Name ='weekchoice'  value= '$weekchoice' width='100' height='12px'>";
//	echo "</div>";
//	echo "</div>";
//	echo "</FORM>";

?>


<?PHP    
  //echo "<tr>"; 
  	 
//echo "</td>";
//echo "<td width='400px' valign='top'";
//	 
//    echo "<FORM NAME ='form2' METHOD ='POST' action=reports.php>";
//	echo "<div align='left' class='MyFont'>";
//	echo "Choose Month &nbsp;&nbsp;";
//	//echo "</div>";
//	//echo "<div align='left' class='MyFont'>";
//	echo "<INPUT TYPE = 'text' Name ='monthchoice'  value= '$monthchoice' width='100' height='12px'>";
//	echo "<INPUT TYPE = 'Submit' Name = 'Submit1'  VALUE = 'Go'>";
//	echo "</div>";
//	echo "</div>";
//
//	//echo "<INPUT TYPE = 'Reset' Name = 'Submit2'  VALUE = 'Reset'>";
//	echo "</FORM>";
//
//echo "</td>";
//echo "<td>";
//echo "</td>";
//echo "</tr>";
//echo "</table>";

?>

<?PHP

?>
		
<?PHP
//dnc count
	$query = "SELECT COUNT(*) as COUNT FROM status where donotcontact='yes';";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$dnccount = $row['COUNT'];
	}   
//dnc - represented by counsel count
	$query = "SELECT COUNT(*) as COUNT FROM status where donotcontact='yes' and notqualifiedreason='Already represented';";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$dncAlreadyRepresented = $row['COUNT'];
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
//$noClaims         
	$query = "SELECT COUNT(*) as COUNT FROM status where notqualified='Yes' and notqualifiedreason='No Claims';";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$noClaims  = $row['COUNT'];
	}           
//$noClaimsNoDeclinationLetterSent         
	$query = "SELECT COUNT(*) as COUNT FROM status where notqualified='Yes' and notqualifiedreason='No Claims' and declinationlettersent is null;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$noClaimsNoDeclinationLetterSent  = $row['COUNT'];
	}        
//$declinationLetterSent         
	$query = "SELECT COUNT(*) as COUNT FROM status where declinationlettersent='Yes';";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$declinationLetterSent = $row['COUNT'];
	}   
//$noWorkNoShare         
	$query = "SELECT COUNT(*) as COUNT FROM status where didnotworkatmacys='Yes' and wantstoshare!='Yes';";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$noWorkNoShare  = $row['COUNT'];
	}        
//$noWorkYesShare         
	$query = "SELECT COUNT(*) as COUNT FROM status where didnotworkatmacys='Yes' and wantstoshare='Yes' and notqualified='Yes' and agreetocontactaboutexperience='Yes';";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$noWorkYesShare = $row['COUNT'];
	}
//$shortFormComplete         
	$query = "SELECT COUNT(*) as COUNT FROM status where shortFormComplete='Yes' or shortFormCompleteOnline='Yes' and shortFormCompleteOnlineDate!='' or shortFormCompletePhone='Yes' and shortFormCompletePhoneDate!='';";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$shortFormComplete  = $row['COUNT'];
	}        
//$longFormComplete         
	$query = "SELECT COUNT(*) as COUNT FROM status where longformcompleteonline='Yes' and longformcompleteonlinedate!='' or longformcompleteonphone='Yes' and longformcompleteonphonedate!='';";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$longFormComplete = $row['COUNT'];
	}

echo "<table class='tableWrapper clear' width='650px' cellpadding='2' cellspacing='2'>";
    $qry = "where donotcontact='yes'";
	  echo "<tr style='background-color:#DADADA'>";
		    echo "<td>";
			      echo '<form action="report.php" method="post">';
			      echo '<input type="hidden" name="query" value="';
			      echo $qry;
			      echo '"/>';
			      echo "Do not call list ";
		    echo "</td>";
		    echo "<td>";
			      echo '<input class="reportsLinks" type="Submit" style="background-color:#DADADA" value="'.$dnccount.'"/>';
		    echo "</td>";
	  echo "</tr>";
if (isset($caseattorney))
{	  
	echo '<input type="hidden" name="caseattorney" value="'.$_POST['caseattorney'].'"/>';
}
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

	  echo "</td>";
	  echo "<td>";
		    echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$prospectiveretainersent.'"/>';
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
		    echo '<input class="reportsLinks" type="Submit" style="background-color:#DADADA" value="'.$prospectiveauthnotaccepted.'"/>';
		    echo "</form>";
	  echo "</td>";
echo "</tr>";

echo "<tr style='background-color:#FFF'>";
	  echo "<td>";
		    echo '<form action="report.php" method="post">';
		    $qry = "where feewaiversent is not null and feewaiveraccept is null";
		    echo '<input type="hidden" name="query" value="';
		    echo $qry;
		    echo '"/>';
#		    echo "<br>";
		    echo "All feewaivers sent";
#echo $prospectivefeewaivernotaccepted;
	  echo "</td>";
	  echo "<td>";
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$prospectivefeewaivernotaccepted.'"/>';
echo "";
		    echo "</form>";
	  echo "</td>";
echo "</tr>";
echo "<tr style='background-color:#DADADA'>";
echo '<form action="report.php" method="post">';
$qry = "where retainerSent is not null";
	$query = "SELECT COUNT(*) as COUNT FROM status $qry;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$countthis = $row['COUNT'];
	}
	echo "<td>";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All retainers sent but not received ";
#echo $prospectiveauthnotaccepted;

echo "</td>";
echo "<td>";
echo '<input class="reportsLinks" type="Submit" style="background-color:#DADADA" value="'.$countthis.'"/>';
echo "";
echo "</td>";
echo "</form>";
echo "</tr>";

echo '<form action="report.php" method="post">';
$qry = "where authformsent is not null ";
	$query = "SELECT COUNT(*) as COUNT FROM status $qry;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$countthis = $row['COUNT'];
	}
echo "<tr style='background-color:#DADADA'>";
	  echo "<td>";
	  echo "</td>";

	  echo "<td>";
	  echo "</td>";
echo "</tr>";

echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All authorizations sent but not received (";
#echo $prospectiveauthnotaccepted;
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$countthis.'"/>';
echo ")";
echo "</form>";



echo "</table>";
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
/////   -start-   dnc - represented by counsel count
echo '<form action="report.php" method="post">';
$qry = "where donotcontact='yes' and notqualifiedreason='Already represented'";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "Do Not Contact - Already represented by counsel (";
#echo "TBD";
#echo $prospectiveauthaccepted;
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$dncAlreadyRepresented.'"/>';
echo ")";
echo "</form>";
//////
/////   -end-  dnc - represented by counsel count
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
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$countthis.'"/>';
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
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$prospectivereceivedretainernotaccepted.'"/>';
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
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$prospectivereceivedauthnotaccepted.'"/>';
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
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$prospectivereceivedfeewaivernotaccepted.'"/>';
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
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$prospectiveretaineraccepted.'"/>';
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
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$prospectiveauthaccepted.'"/>';
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
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$prospectivefeewaiveraccepted.'"/>';
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
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$prospectiveundeliverableaddressespostcard.'"/>';
echo ")";
echo "</form>";

echo '<form action="report.php" method="post">';
$qry = "where addressisundeliverable='Yes' and notelog like '%retainer returned address is undeliverable%'";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All undeliverable addresses retainers (";
#echo $prospectiveundeliverableaddressesretainer ;
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$prospectiveundeliverableaddressesretainer.'"/>';
echo ")";
echo "</form>";


echo '<form action="report.php" method="post">';
$qry = "where addressisundeliverable='Yes'";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All undeliverable addresses all (";
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$prospectiveundeliverableaddressesall.'"/>';
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
#echo "<br>";



/////   -start-   Declination letter / No Claims reports
echo '<form action="report.php" method="post">';
$qry = "where notqualifiedreason='No claims' and notqualified='Yes' ";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All clients with \"No Claims\" (";
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$noClaims.'"/>';
echo ")";
echo "</form>";

echo '<form action="report.php" method="post">';
$qry = "where notqualifiedreason='No claims' and notqualified='Yes' and declinationlettersent is null";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "All clients with \"No Claims\" that have NOT received a Declination letter (";
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$noClaimsNoDeclinationLetterSent.'"/>';
echo ")";
echo "</form>";


echo '<form action="report.php" method="post">';
$qry = "where declinationlettersent='Yes'";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "Clients who have been sent a Declination letter (";
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$declinationLetterSent.'"/>';
echo ")";
echo "</form>";
//////
/////   -end-   Declination letter / No Claims  reports
#####
####
###
##
#
echo "<br>";
#echo "<br>";



/////   -start-   Not work at Macy's reports
echo '<form action="report.php" method="post">';
$qry = "where didnotworkatmacys='Yes' and  wantstoshare!='Yes';";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "Did not work at Macy's, no other work experience (";
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$noWorkNoShare.'"/>';
echo ")";
echo "</form>";

echo '<form action="report.php" method="post">';
$qry = "where didnotworkatmacys='Yes' and wantstoshare='Yes' and notqualified='Yes' and agreetocontactaboutexperience='Yes';";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "Did not work at Macy's, would like to share other work experience (";
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$noWorkYesShare.'"/>';
echo ")";
echo "</form>";
//////
/////   -end-   Not work at Macy's reports
#####
####
###
##
#
echo "<br>";
#echo "<br>";



/////   -start-   Completed forms reports
echo '<form action="report.php" method="post">';
$qry = "where shortFormComplete='Yes' or shortFormCompleteOnline='Yes' and shortFormCompleteOnlineDate!='' or shortFormCompletePhone='Yes' and shortFormCompletePhoneDate!='';";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "Short forms completed (";
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$shortFormComplete.'"/>';
echo ")";
echo "</form>";

echo '<form action="report.php" method="post">';
$qry = "where longformcompleteonline='Yes' and longformcompleteonlinedate!='' or longformcompleteonphone='Yes' and longformcompleteonphonedate!='';";
echo '<input type="hidden" name="query" value="';
echo $qry;
echo '"/>';
echo "Long forms completed (";
echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$longFormComplete.'"/>';
echo ")";
echo "</form>";
//////
/////   -end-   Completed forms reports
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
'Moore',
'Pinney',
'Valero',
'Yonan',
'Nullfication',
'Larsen',
'Hutchings',
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
        echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$agentcount.'"/>';
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
        echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$agentcount10.'"/>';
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
        echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$agentcount2.'"/>';
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
        echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$agentcount3.'"/>';
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
        echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$agentcount4.'"/>';
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
        echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$agentcount5.'"/>';
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
        echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$agentcount6.'"/>';
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
        echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$agentcount7.'"/>';
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
        echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$agentcount8.'"/>';
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
        echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$agentcount9.'"/>';
        echo ")";
        echo "</form>";


		$query10 = "SELECT COUNT(*) as COUNT FROM 
			status where
			agentlname='$value' and DeclinedToSignRetainerDate is not null and DeclinedToSignRetainerDate!='';";
		$results10 = sqlsrv_query($conn,$query10);
		while($row10 = sqlsrv_fetch_array($results10))
		{
			$agentcount10 = $row10['COUNT'];
		}  
			echo '<form action="report.php" method="post">';
			$qry10 = "where agentlname='".$value."'  and DeclinedToSignRetainerDate is not null";
			echo '<input type="hidden" name="query" value="';
			echo $qry10;
			echo '"/>';                
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp Declined Retainer (";
			echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$agentcount10.'"/>';
			echo ")";
			echo "</form>";


		$query = "SELECT COUNT(*) as COUNT FROM 
			status where
			agentlname='$value' and DeclinedToSignAuthorizationDate is not null and DeclinedToSignAuthorizationDate!='';";
		$results = sqlsrv_query($conn,$query);
		while($row = sqlsrv_fetch_array($results))
		{
			$agentcount11 = $row['COUNT'];
		}  
			echo '<form action="report.php" method="post">';
			$qry = "where agentlname='".$value."'  and DeclinedToSignAuthorizationDate is not null";
			echo '<input type="hidden" name="query" value="';
			echo $qry;
			echo '"/>';                
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp Declined Authorization (";
			echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$agentcount11.'"/>';
			echo ")";
			echo "</form>";


		$query = "SELECT COUNT(*) as COUNT FROM 
			status where
			agentlname='$value' and DeclinedToSignFeeWaiverDate is not null and DeclinedToSignFeeWaiverDate!='';";
		$results = sqlsrv_query($conn,$query);
		while($row = sqlsrv_fetch_array($results))
		{
			$agentcount12 = $row['COUNT'];
		}  
			echo '<form action="report.php" method="post">';
			$qry = "where agentlname='".$value."'  and DeclinedToSignFeeWaiverDate is not null";
			echo '<input type="hidden" name="query" value="';
			echo $qry;
			echo '"/>';                
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp Declined Fee Waiver (";
			echo '<input class="reportsLinks" type="Submit" style="background-color:#FFF" value="'.$agentcount12.'"/>';
			echo ")";
			echo "</form>";
	

    }
}
?>

