<?PHP
require("mgmtheader.php");
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
//Attorney-Client Agreement sent but not received        
	$query = "SELECT COUNT(*) as COUNT FROM status where retainerSent is not null and retaineraccepted is null and retainerRecieved is null;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$retainersentbutnotrecieved = $row['COUNT'];
	}
//Attorney-Client Agreement sent         
	$query = "SELECT COUNT(*) as COUNT FROM status where retainerSent is not null ;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$prospectiveretainersent = $row['COUNT'];
	}
//feewaiver outstanding         
	$query = "SELECT COUNT(*) as COUNT FROM status where (feewaiversent='Yes' or feewaiversent='Docusign');";
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
//$virginprospects        
	$query = "SELECT COUNT(*) as COUNT FROM status where agentlname is null and notelog is null;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$virginprospects  = $row['COUNT'];
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
	$query = "SELECT COUNT(*) as COUNT FROM status where shortFormCompleteOnline='Yes' or shortFormCompletePhone='Yes';";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$shortFormComplete  = $row['COUNT'];
	}
//$shortFormComplete    Web     
	$query = "SELECT COUNT(*) as COUNT FROM status where shortFormCompleteOnline='Yes';";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$shortFormCompleteWeb  = $row['COUNT'];
	}
//$shortFormComplete    Phone	
	$query = "SELECT COUNT(*) as COUNT FROM status where shortFormCompletePhone='Yes';";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$shortFormCompletePhone  = $row['COUNT'];
	}    		
//$longFormComplete         
	$query = "SELECT COUNT(*) as COUNT FROM status where longformcompleteonline='Yes' and longformcompleteonlinedate!='' or longformcompleteonphone='Yes' and longformcompleteonphonedate!='';";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$longFormComplete = $row['COUNT'];
	}    
//$Alreadyrepresented         
	$query = "SELECT COUNT(*) as COUNT FROM status where 
		retaineraccept = 'Yes' and
		longformcompleteonline = 'Yes' and
		authaccept = 'Yes' and 
		authaccept2 = 'Yes' and 
		feewaiverqualified = 'Yes' and feewaiveraccept = 'Yes'
		or
		retaineraccept = 'Yes' and
		longformcompleteonline = 'Yes' and
		authaccept = 'Yes' and 
		authaccept2 = 'Yes' and 
		feewaiverqualified != 'Yes' and feewaiversent != 'Yes' and feewaiversent != 'Docusign' 
		or
		retaineraccept = 'Yes' and
		longformcompleteonphone = 'Yes' and
		authaccept = 'Yes' and 
		authaccept2 = 'Yes' and 
		feewaiverqualified = 'Yes' and feewaiveraccept = 'Yes'
		or
		retaineraccept = 'Yes' and
		longformcompleteonphone = 'Yes' and
		authaccept = 'Yes' and 
		authaccept2 = 'Yes' and 
		feewaiverqualified != 'Yes' and feewaiversent != 'Yes' and feewaiversent != 'Docusign' 
		";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$outreachComplete = $row['COUNT'];
	}
//$Alreadyrepresented        
	$query = "SELECT COUNT(*) as COUNT FROM status where notqualifiedreason = 'Already represented' 
		";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$Alreadyrepresented = $row['COUNT'];
	}
##where notqualifiedreason = 'Already represented	

//$Notimported
	$query = "SELECT COUNT(*) as COUNT FROM status where imported!='8172012' or imported is null 
		";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$Notimported = $row['COUNT'];
	}
##where imported!='Yes'	

//$NotImportedandInStatutePeriod
	$query = "SELECT COUNT(*) as COUNT FROM status join Data 
on dbo.Status.uniqueid = dbo.Data.uniqueid 
where [4CurrentlyEmployed] is not null AND (dbo.Status.imported !='yes' OR dbo.Status.imported is null) and
(dbo.Data.formerlastdayyear is null or dbo.Data.formerlastdayyear='2010' or dbo.Data.formerlastdayyear='2011' or dbo.Data.formerlastdayyear='2012' or dbo.Data.formerlastdayyear='2013') 
		";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$NotImportedandInStatutePeriod = $row['COUNT'];
	}
##where imported!='Yes'	and within class period, see query lol
//$InStatutePeriod
	$query = "SELECT COUNT(*) as COUNT FROM status join Data 
on dbo.Status.uniqueid = dbo.Data.uniqueid 
where [4CurrentlyEmployed] is not null  and
(dbo.Data.formerlastdayyear is null or dbo.Data.formerlastdayyear='2010' or dbo.Data.formerlastdayyear='2011' or dbo.Data.formerlastdayyear='2012' or dbo.Data.formerlastdayyear='2013')
		";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$InStatutePeriod = $row['COUNT'];
	}
##where imported!='Yes'	and within class period, see query lol

//$qry ="s 
//join Data d 
//on s.uniqueid = d.uniqueid 
//where [4CurrentlyEmployed] is not null AND (s.imported !='yes' OR s.imported is null) and
//d.formerlastdayyear is null or d.formerlastdayyear='2010' or d.formerlastdayyear='2011' or d.formerlastdayyear='2012' or d.formerlastdayyear='2013'

						
						//";
/////  
######
####
###
##
#

echo "<br><br>";

#
##
###
####
#####
//////

echo "<table class='clear' width='650px' style='border: 1px solid #999;'>";
	echo "<tr>";
		echo "<td>";
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2' style='padding-bottom: 8px;'>";
				echo "<tr style='background-color: #ffc;'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where retainerSent is not null and  retaineraccept is not null";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "All Clients (Attorney-Client Agreements accepted)";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$prospectiveretaineraccepted.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
			
			/////   -start-   Do not contact reports
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2' style='padding-bottom: 8px;'>";
				$qry = "where donotcontact='yes'";
				echo "<tr style='background-color:#fff'>";
					echo "<td width='600px'>";
						  echo '<form action="report.php" method="post">';
						  echo '<input type="hidden" name="query" value="';
						  echo $qry;
						  echo '"/>';
						  echo "Do Not Contact list ";
					echo "</td>";
					echo "<td>";
						  echo '<input class="reportsLinks" type="Submit" value="'.$dnccount.'"/>';
					echo "</td>";
				echo "</tr>";
				if (isset($caseattorney))
				{	  
					echo '<input type="hidden" name="caseattorney" value="'.$_POST['caseattorney'].'"/>';
				}
				echo "</form>";
					echo "</td>";
				echo "</tr>";
				
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where donotcontact='yes' and notqualifiedreason='Already represented'";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Do Not Contact - Already represented by counsel";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$dncAlreadyRepresented.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
			/////   -end-   Do not contact reports
			
			/////   -start-   Declination letter / No Claims reports
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2' style='padding-bottom: 8px;'>";
				echo "<tr style='background-color:#fff'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where notqualifiedreason='No claims' and notqualified='Yes' ";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Clients with \"No Claims\"";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$noClaims.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
				
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where notqualifiedreason='No claims' and notqualified='Yes' and declinationlettersent is null";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Clients with \"No Claims\" that have NOT been sent a Declination letter";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$noClaimsNoDeclinationLetterSent.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
				
				
				echo "<tr style='background-color:#fff'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where declinationlettersent='Yes'";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Clients with \"No Claims\" that have been sent a Declination letter";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$declinationLetterSent.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
			/////   -end-   Declination letter / No Claims  reports
			
			
			/////   -start-   Not work at Macy's reports
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2' style='padding-bottom: 8px;'>";
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where didnotworkatmacys='Yes' and  wantstoshare!='Yes';";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Did not work at Macy's, does not want to share other work experience ";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$noWorkNoShare.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
						
				echo "<tr style='background-color:#fff'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where didnotworkatmacys='Yes' and wantstoshare='Yes' and notqualified='Yes' and agreetocontactaboutexperience='Yes';";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Did not work at Macy's, would like to share other work experience ";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$noWorkYesShare.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
			/////   -end-   Not work at Macy's reports
			
			/////   -start-   Undeliverable reports
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2'>";
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where addressisundeliverable='Yes' and notelog like '%postcard returned address is undeliverable%'";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Undeliverable addresses - Postcards";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$prospectiveundeliverableaddressespostcard.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
						
				echo "<tr style='background-color:#fff'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where addressisundeliverable='Yes' and notelog like '%retainer returned address is undeliverable%'";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Undeliverable addresses - Attorney-Client Agreements";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$prospectiveundeliverableaddressesretainer.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
						
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where addressisundeliverable='Yes'";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "All undeliverable addresses";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$prospectiveundeliverableaddressesall.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
			
			

		
		echo "</td>";
	echo "</tr>";
echo "</table>";


/////  
######
####
###
##
#

echo "<br><br>";

#
##
###
####
#####
//////

echo "<table class='clear' width='650px' style='border: 1px solid #999;'>";
	echo "<tr>";
		echo "<td>";
		
			/////   -start-   Completed short forms reports
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2' style='padding-bottom: 8px;'>";
				echo "<tr style='background-color:#fff'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where shortFormCompleteOnline='Yes' or shortFormCompletePhone='Yes';";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Short forms completed";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$shortFormComplete.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where shortFormCompleteOnline='Yes';";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Short forms completed - Website";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$shortFormCompleteWeb.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
				echo "<tr style='background-color:#fff'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where shortFormCompleteOnline='Yes';";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Short forms completed - Phone";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$shortFormCompletePhone.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";				
			echo "</table>";
			/////   -end-   Completed short forms reports
			
			/////   -start-   Attorney-Client Agreement reports
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2' style='padding-bottom: 8px;'>";
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where retainerSent is not null";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Attorney-Client Agreements sent ";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$prospectiveretainersent.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
						
				echo "<tr style='background-color:#fff'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where retainerSent is not null and retainerRecieved is null";
						$query = "SELECT COUNT(*) as COUNT FROM status $qry;";
						$results = sqlsrv_query($conn,$query);
						while($row = sqlsrv_fetch_array($results))
						{
							$countthis = $row['COUNT'];
						}
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Attorney-Client Agreements sent but not received ";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$countthis.'"/>';
						echo "";
						echo "</form>";
					echo "</td>";
				echo "</tr>";
						
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'>";
						$qry = "where (retainerSent is not null or retainerSent!='') and (retaineraccept is null or retaineraccept='') and (retainerRecieved='Docusigned' or retainerRecieved='Yes')";
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
						echo "Attorney-Client Agreements received but not accepted ";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$prospectivereceivedretainernotaccepted.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
						
				//echo "<tr style='background-color:#fff'>";
				//	echo "<td width='600px'>";
				//		echo '<form action="report.php" method="post">';    
				//		echo "How many clients returned a Attorney-Client Agreement on a given day";
				//	echo "</td>";
				//	echo "<td>";
				//		echo "TBD";
				//	echo "</td>";
				//echo "</tr>";
			echo "</table>";
			/////   -end-   Attorney-Client Agreement reports
			
			/////   -start-   Long form reports
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2' style='padding-bottom: 8px;'>";
				//echo "<tr style='background-color:#dadada'>";
				//	echo "<td width='600px'>";
				//		echo "How many long form interviews have been completed on a given day";
				//	echo "</td>";
				//	echo "<td>";
				//		echo "TBD";
				//	echo "</td>";
				//echo "</tr>";
						
				echo "<tr style='background-color:#fff'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where longformcompleteonline='Yes' and longformcompleteonlinedate!='' or longformcompleteonphone='Yes' and longformcompleteonphonedate!='';";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Long forms completed ";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$longFormComplete.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
			/////   -end-   Long form reports
			
			/////   -start-   Authorizations reports
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2' style='padding-bottom: 8px;'>";
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where authformsent is not null and  authaccept is null";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Authorizations sent ";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$prospectiveauthnotaccepted.'"/>';
						echo "</form>";	
					echo "</td>";
				echo "</tr>";
						
				echo "<tr style='background-color:#fff'>";
					echo "<td width='600px'>";
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
						echo "Authorizations sent but not received ";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$countthis.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
						
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'>";
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
						echo "Authorizations received but not accepted";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$prospectivereceivedauthnotaccepted.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
						
				echo "<tr style='background-color:#fff'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where authformsent is not null and  authaccept is not null";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Authorizations accepted";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$prospectiveauthaccepted.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
			/////   -end-   Authorizations reports
			
			/////   -start-   Fee Waiver reports
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2' style='padding-bottom: 8px;'>";
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where (feewaiversent='Yes' or feewaiversent='Docusign')";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Fee Waivers sent";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$prospectivefeewaivernotaccepted.'"/>';
						echo "";
						echo "</form>";
					echo "</td>";
				echo "</tr>";
						
				echo "<tr style='background-color:#fff'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where feewaiverqualified='Yes' and (feewaiversent='Yes' or feewaiversent='Docusign') and (feewaiverreceived is null or feewaiverreceived='')";
						$query = "SELECT COUNT(*) as COUNT FROM status $qry;";
						$results = sqlsrv_query($conn,$query);
						while($row = sqlsrv_fetch_array($results))
						{
							$countthis = $row['COUNT'];
						}
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Fee Waivers sent but not received";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$countthis.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
						
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'>";
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
						echo "Fee Waivers received but not accepted";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$prospectivereceivedfeewaivernotaccepted.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
						
				echo "<tr style='background-color:#fff'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where feewaiversent is not null and feewaiveraccept is not null";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Fee Waivers accepted";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$prospectivefeewaiveraccepted.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
			/////   -end-   Fee Wavier reports
			
			/////   -start-   Outreach completed reports
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2'>";
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where 
								retaineraccept = 'Yes' and
								longformcompleteonline = 'Yes' and
								authaccept = 'Yes' and 
								authaccept2 = 'Yes' and 
								feewaiverqualified = 'Yes' and feewaiveraccept = 'Yes'
								or
								retaineraccept = 'Yes' and
								longformcompleteonline = 'Yes' and
								authaccept = 'Yes' and 
								authaccept2 = 'Yes' and 
								feewaiverqualified != 'Yes' and feewaiversent != 'Yes' and feewaiversent != 'Docusign' 
								or
								retaineraccept = 'Yes' and
								longformcompleteonphone = 'Yes' and
								authaccept = 'Yes' and 
								authaccept2 = 'Yes' and 
								feewaiverqualified = 'Yes' and feewaiveraccept = 'Yes'
								or
								retaineraccept = 'Yes' and
								longformcompleteonphone = 'Yes' and
								authaccept = 'Yes' and 
								authaccept2 = 'Yes' and 
								feewaiverqualified != 'Yes' and feewaiversent != 'Yes' and feewaiversent != 'Docusign' 
								";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "All outreach completed";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$outreachComplete.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
			/////   -end-   Outreach completed reports
			
			/////   -start-      already represented
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2'>";
				echo "<tr style='background-color:#fff'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where notqualifiedreason = 'Already represented'";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "All who have outside representation";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$Alreadyrepresented.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
			/////   -end-   already represented
			
			      /////   -start-      new prospects
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2'>";
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						$qry = "where imported!='8172012' or imported is null";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "New prospects";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$Notimported.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
			/////   -end-   new prospects
			
		    /////   -start-      new Still employed or in statute
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2'>";
				echo "<tr style='background-color:#fff'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						#$qry = "where formerlastdayyear is null or formerlastdayyear='2010' or formerlastdayyear='2011' or formerlastdayyear='2012' or formerlastdayyear='2013'";
						$qry =" 
join Data 
on dbo.Status.uniqueid = dbo.Data.uniqueid 
where [4CurrentlyEmployed] is not null AND (dbo.Status.imported !='yes' OR dbo.Status.imported is null) and
(dbo.Data.formerlastdayyear is null or dbo.Data.formerlastdayyear='2010' or dbo.Data.formerlastdayyear='2011' or dbo.Data.formerlastdayyear='2012' or dbo.Data.formerlastdayyear='2013')
						";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Currently employed, ended employment after 2010, and new prospects 
";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$NotImportedandInStatutePeriod.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
			/////   -end-   new Still employed or in statute and newprospect
			
		    /////   -start-      new Still employed or in statute
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2'>";
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'>";
						echo '<form action="report.php" method="post">';
						#$qry = "where formerlastdayyear is null or formerlastdayyear='2010' or formerlastdayyear='2011' or formerlastdayyear='2012' or formerlastdayyear='2013'";
						$qry =" 
join Data 
on dbo.Status.uniqueid = dbo.Data.uniqueid 
where [4CurrentlyEmployed] is not null  and
(dbo.Data.formerlastdayyear is null or dbo.Data.formerlastdayyear='2010' or dbo.Data.formerlastdayyear='2011' or dbo.Data.formerlastdayyear='2012' or dbo.Data.formerlastdayyear='2013')
						";
						echo '<input type="hidden" name="query" value="';
						echo $qry;
						echo '"/>';
						echo "Currently employed and ended employment after 2010";
					echo "</td>";
					echo "<td>";
						echo '<input class="reportsLinks" type="Submit" value="'.$InStatutePeriod.'"/>';
						echo "</form>";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
			/////   -end-   new Still employed or in statute			
		echo "</td>";
	echo "</tr>";
echo "</table>";


#echo "<br><br>";

            $querycosts = "SELECT uniqueid,FirstName,LastName,IncomingCost,OutgoingCost,ScanningPages,FaxingPages,PrintingPages,SentDate,SentTime,DocumentType,SendingInitials FROM Tbl_MailRoomOut order by uniqueid, num desc;";
        $resultscosts = sqlsrv_query($conn,$querycosts);
    while($rowcosts = sqlsrv_fetch_array($resultscosts))
    {
        if ($rowcosts['IncomingCost'] !='')
        {
            $totalpostagearray[] = $rowcosts['IncomingCost'];
        }
        if ($rowcosts['IncomingCost'] !='')
        {
            $postagearray[] = $rowcosts['OutgoingCost'];
        }
        if ($rowcosts['PrintingPages'] !='')
        {
            $totalprintingarray[] = $rowcosts['PrintingPages'];
        }
        if ($rowcosts['FaxingPages'] !='')
        {
            $totalfaxingarray[] = $rowcosts['FaxingPages'];
        }
        if ($rowcosts['ScanningPages'] !='')
        {
            $totalscanningarray[] = $rowcosts['ScanningPages'];
        }
    }
	foreach ($totalpostagearray as $key => $value)
	{
		$totalpostagetotal += $value;
	}
	foreach ($totalscanningarray as $key => $value)
	{
		$totalscanningtotal += $value;
	}
	foreach ($totalfaxingarray as $key => $value)
	{
		$totalfaxingtotal += $value;
	}
	foreach ($totalprintingarray as $key => $value)
	{
		$totalprintingtotal += $value;
	}                            

echo "<div class='caseAttorney'>Costs</div>";
echo "<table class='clear' width='650px' style='border: 1px solid #999;'>";
	echo "<tr>";
		echo "<td>";
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2'>";
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'><a href='costsreport.php'>";
						echo "Total postage cost:";
					echo "</a></td>";
					echo "<td><a href='costsreport.php'>$";
					echo $totalpostagetotal;
					echo "</a></td>";
				echo "</tr>";
			echo "</table>";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>";
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2'>";
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'><a href='costsreport.php'>";
						echo "Total pages scanned:";
					echo "</a></td>";
					echo "<td><a href='costsreport.php'>";
					echo $totalscanningtotal;
					echo "</a></td>";
				echo "</tr>";
			echo "</table>";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>";
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2'>";
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'><a href='costsreport.php'>";
						echo "Total pages printed:";
					echo "</a></td>";
					echo "<td><a href='costsreport.php'>";
					echo $totalprintingtotal;
					echo "</a></td>";
				echo "</tr>";
			echo "</table>";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>";
			echo "<table class='reportsTable' cellpadding='2' cellspacing='2'>";
				echo "<tr style='background-color:#dadada'>";
					echo "<td width='600px'><a href='costsreport.php'>";
						echo "Total pages faxed:";
					echo "</a></td>";
					echo "<td><a href='costsreport.php'>";
					echo $totalfaxingtotal;
					echo "</a></td>";
				echo "</tr>";
			echo "</table>";
		echo "</td>";
	echo "</tr>";	
echo "</table>";			


/////  
######
####
###
##
#

#echo "<br><br>";

#
##
###
####
#####
//////



$radio = array(
    'agentlname' => array(
		'Chang',
		'Grether',
		'Lee',
		'Trejo',
		'Zak',
		'Savoy',
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
		$query = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value' and retaineraccept='Yes';";
		$results = sqlsrv_query($conn,$query);
		while($row = sqlsrv_fetch_array($results))
		{
			$agentcountclient = $row['COUNT'];
		}
		$query = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value' and retaineraccept!='Yes' or agentlname='$value' and retaineraccept is null;";
		$results = sqlsrv_query($conn,$query);
		while($row = sqlsrv_fetch_array($results))
		{
			$agentcountnotclient = $row['COUNT'];
		}			
	echo "<table class='reportsTable clear' width='650px' style='border: 1px solid #999;' cellspacing='4'>";
		echo '<form action="report.php" method="post">';
		$qry = "where agentlname='$value'";
		echo '<input type="hidden" name="query" value="';
		echo $qry;
		echo '"/>';
		echo "<div class='caseAttorney'>".$value."</div>";
		echo "<tr style='background-color:#dadada'>";
			echo "<td width='600px'>";
				echo "Assigned Clients";
			echo "</td>";
			echo "<td>";
				echo '<input class="reportsLinks" type="Submit" value="'.$agentcountclient.'"/>';
				echo "</form>";
			echo "</td>";
		echo "</tr>";
		echo "<tr style='background-color:#fff'>";
			echo "<td width='600px'>";
				echo "Assigned Prospects";
			echo "</td>";
			echo "<td>";
				echo '<input class="reportsLinks" type="Submit" value="'.$agentcountnotclient.'"/>';
				echo "</form>";
			echo "</td>";
		echo "</tr>";		
		echo "<tr style='background-color:#dadada'>";
			echo "<td width='600px'>";
				echo "Assigned Total";
			echo "</td>";
			echo "<td>";
				echo '<input class="reportsLinks" type="Submit" value="'.$agentcount.'"/>';
				echo "</form>";
			echo "</td>";
		echo "</tr>";
		echo "<tr style='background-color:#fff'>";
			echo "<td width='600px'>";
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
				echo "Do not contact";
			echo "</td>";
			echo "<td>";
				echo '<input class="reportsLinks" type="Submit" value="'.$agentcount10.'"/>';
				echo "</form>";
			echo "</td>";
		echo "</tr>";

		echo "<tr style='background-color:#dadada'>";
			echo "<td width='600px'>";			
				$query = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value' and shortFormCompleteOnline is not null and shortFormCompletePhone is null;";
				$results = sqlsrv_query($conn,$query);
				while($row = sqlsrv_fetch_array($results))
				{
					$agentcount2 = $row['COUNT'];
				}
				echo '<form action="report.php" method="post">';
				$qry = "where agentlname='$value' and shortFormCompleteOnline is not null and shortFormCompletePhone is null";
				echo '<input type="hidden" name="query" value="';
				echo $qry;
				echo '"/>';
				echo "Shortform complete online";
			echo "</td>";
			echo "<td>";
				echo '<input class="reportsLinks" type="Submit" value="'.$agentcount2.'"/>';
				echo "</form>";
			echo "</td>";
		echo "</tr>";

		echo "<tr style='background-color:#fff'>";
			echo "<td width='600px'>";		
				$query = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value' and shortFormCompletePhone is not null;";
				$results = sqlsrv_query($conn,$query);
				while($row = sqlsrv_fetch_array($results))
				{
					$agentcount3 = $row['COUNT'];
				}  
				echo '<form action="report.php" method="post">';
				$qry = "where agentlname='$value' and shortFormCompletePhone is not null";
				echo '<input type="hidden" name="query" value="';
				echo $qry;
				echo '"/>';        
				echo "Shortform complete on phone";
			echo "</td>";
			echo "<td>";
				echo '<input class="reportsLinks" type="Submit" value="'.$agentcount3.'"/>';
				echo "</form>";
			echo "</td>";
		echo "</tr>";

		echo "<tr style='background-color:#dadada'>";
			echo "<td width='600px'>";	
				$query = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value' and longformcompleteonline is not null;";
				$results = sqlsrv_query($conn,$query);
				while($row = sqlsrv_fetch_array($results))
				{
					$agentcount4 = $row['COUNT'];
				}  
					echo '<form action="report.php" method="post">';
					$qry = "where agentlname='$value' and longformcompleteonline is not null";
					echo '<input type="hidden" name="query" value="';
					echo $qry;
					echo '"/>'; 
					echo "Long form complete online";
			echo "</td>";
			echo "<td>";
					echo '<input class="reportsLinks" type="Submit" value="'.$agentcount4.'"/>';
					echo "</form>";
			echo "</td>";
		echo "</tr>";

		echo "<tr style='background-color:#fff'>";
			echo "<td width='600px'>";	
				$query = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value' and longformcompleteonphone is not null;";
				$results = sqlsrv_query($conn,$query);
				while($row = sqlsrv_fetch_array($results))
				{
					$agentcount5 = $row['COUNT'];
				}  
				echo '<form action="report.php" method="post">';
				$qry = "where agentlname='$value' and longformcompleteonphone is not null";
				echo '<input type="hidden" name="query" value="';
				echo $qry;
				echo '"/>'; 
				echo "Long form complete on phone";
			echo "</td>";
			echo "<td>";
				echo '<input class="reportsLinks" type="Submit" value="'.$agentcount5.'"/>';
				echo "</form>";
			echo "</td>";
		echo "</tr>";

		echo "<tr style='background-color:#dadada'>";
			echo "<td width='600px'>";	
				$query = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value' and feewaiversent is not null and feewaiveraccept is null;";
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
				echo "Outstanding Fee Waiver";
			echo "</td>";
			echo "<td>";
				echo '<input class="reportsLinks" type="Submit" value="'.$agentcount6.'"/>';
				echo "</form>";
			echo "</td>";
		echo "</tr>";

		echo "<tr style='background-color:#fff'>";
			echo "<td width='600px'>";	
				$query = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value' and authformsent is not null and  authaccept is null;";
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
				echo "Outstanding Authorization";
			echo "</td>";
			echo "<td>";
				echo '<input class="reportsLinks" type="Submit" value="'.$agentcount7.'"/>';
				echo "</form>";
			echo "</td>";
		echo "</tr>";

		echo "<tr style='background-color:#dadada'>";
			echo "<td width='600px'>";	
				$query = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value' and feewaiversent is not null and feewaiveraccept is not null;";
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
				echo "Accepted Fee Waiver";
			echo "</td>";
			echo "<td>";
				echo '<input class="reportsLinks" type="Submit" value="'.$agentcount8.'"/>';
				echo "</form>";
			echo "</td>";
		echo "</tr>";

		echo "<tr style='background-color:#fff'>";
			echo "<td width='600px'>";	
				$query = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value' and authformsent is not null and  authaccept is not null;";
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
				echo "Accepted Authorization";
			echo "</td>";
			echo "<td>";
				echo '<input class="reportsLinks" type="Submit" value="'.$agentcount9.'"/>';
				echo "</form>";
			echo "</td>";
		echo "</tr>";

		echo "<tr style='background-color:#dadada'>";
			echo "<td width='600px'>";	
				$query10 = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value' and DeclinedToSignRetainerDate is not null and DeclinedToSignRetainerDate!='';";
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
				echo "Declined Attorney-Client Agreement";
			echo "</td>";
			echo "<td>";
				echo '<input class="reportsLinks" type="Submit" value="'.$agentcount10.'"/>';
				echo "</form>";
			echo "</td>";
		echo "</tr>";

		echo "<tr style='background-color:#fff'>";
			echo "<td width='600px'>";	
				$query = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value' and DeclinedToSignAuthorizationDate is not null and DeclinedToSignAuthorizationDate!='';";
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
				echo "Declined Authorization";
			echo "</td>";
			echo "<td>";
				echo '<input class="reportsLinks" type="Submit" value="'.$agentcount11.'"/>';
				echo "</form>";
			echo "</td>";
		echo "</tr>";

		echo "<tr style='background-color:#dadada'>";
			echo "<td width='600px'>";	
				$query = "SELECT COUNT(*) as COUNT FROM status where agentlname='$value' and DeclinedToSignFeeWaiverDate is not null and DeclinedToSignFeeWaiverDate!='';";
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
				echo "Declined Fee Waiver";
			echo "</td>";
			echo "<td>";
				echo '<input class="reportsLinks" type="Submit" value="'.$agentcount12.'"/>';
				echo "</form>";
			echo "</td>";
		echo "</tr>";
    }
}
echo "</table>";
echo "<br><br>";

?>

