<style>
.MyFont { /*  */
	font-size: 11px;
	
}
.SmallFont { /*  */
	font-size: 9px;

	
}
select {
font-family: Verdana, Arial, sans-serif;
font-size: 9px;
}
        </style>

<?PHP
$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");


$conn = sqlsrv_connect( $serverName, $connectionInfo );
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');


if (isset($_REQUEST['brandname'])) $brand = $_REQUEST['brandname'];
if (isset($_POST['brandname'])) $brand = $_POST['brandname'];
if (isset($_REQUEST['brand'])) $brand = $_REQUEST['brand'];
if (isset($_POST['brand'])) $brand = $_POST['brand'];
if (empty($brand)) unset($brand);

if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
if (isset($_POST['uniqueid'])) $uniqueid = $_POST['uniqueid'];
if (empty($uniqueid)) unset($uniqueid);

if (isset($_REQUEST['FirstName'])) $FirstName = $_REQUEST['FirstName'];
if (isset($_POST['FirstName'])) $FirstName = $_POST['FirstName'];
if (empty($FirstName)) unset($FirstName);

if (isset($_REQUEST['LastName'])) $LastName = $_REQUEST['LastName'];
if (isset($_POST['LastName'])) $LastName = $_POST['LastName'];
if (empty($LastName)) unset($LastName);

if (isset($_REQUEST['completedonline'])) $completedonline = $_REQUEST['completedonline'];
if (isset($_POST['completedonline'])) $completedonline = $_POST['completedonline'];
if (empty($completedonline)) unset($completedonline);

if (isset($_REQUEST['retainercountersignsent'])) $retainercountersignsent = $_REQUEST['retainercountersignsent'];
if (isset($_POST['retainercountersignsent'])) $retainercountersignsent = $_POST['retainercountersignsent'];
if (empty($retainercountersignsent)) unset($retainercountersignsent);

if (isset($_REQUEST['authstatus'])) $authstatus = $_REQUEST['authstatus'];
if (isset($_POST['authstatus'])) $authstatus = $_POST['authstatus'];
if (empty($authstatus)) unset($authstatus);

if (isset($_REQUEST['retainerstatus'])) $retainerstatus = $_REQUEST['retainerstatus'];
if (isset($_POST['retainerstatus'])) $retainerstatus = $_POST['retainerstatus'];
if (empty($retainerstatus)) unset($retainerstatus);

if (isset($_REQUEST['authnote'])) $authnote = $_REQUEST['authnote'];
if (isset($_POST['authnote'])) $authnote = $_POST['authnote'];
if (empty($authnote)) unset($authnote);

if (isset($_REQUEST['retainernote'])) $retainernote = $_REQUEST['retainernote'];
if (isset($_POST['retainernote'])) $retainernote = $_POST['retainernote'];
if (empty($retainernote)) unset($retainernote);


if (isset($_REQUEST['demandcreated'])) $demandcreated = $_REQUEST['demandcreated'];
if (isset($_POST['demandcreated'])) $demandcreated = $_POST['demandcreated'];
if (empty($demandcreated)) unset($demandcreated);

if (isset($_REQUEST['authformreceived'])) $authformreceived = $_REQUEST['authformreceived'];
if (isset($_POST['authformreceived'])) $authformreceived = $_POST['authformreceived'];
if (empty($authformreceived)) unset($authformreceived);

if (isset($_REQUEST['reachedretainerdiscussion'])) $reachedretainerdiscussion = $_REQUEST['reachedretainerdiscussion'];
if (isset($_POST['reachedretainerdiscussion'])) $reachedretainerdiscussion = $_POST['reachedretainerdiscussion'];
if (empty($reachedretainerdiscussion)) unset($reachedretainerdiscussion);

if (isset($_REQUEST['interviewstarted'])) $interviewstarted = $_REQUEST['interviewstarted'];
if (isset($_POST['interviewstarted'])) $interviewstarted = $_POST['interviewstarted'];
if (empty($interviewstarted)) unset($interviewstarted);

if (isset($_REQUEST['retainerRecieved'])) $retainerRecieved = $_REQUEST['retainerRecieved'];
if (isset($_POST['retainerRecieved'])) $retainerRecieved = $_POST['retainerRecieved'];
if (empty($retainerRecieved)) unset($retainerRecieved);

if (isset($_REQUEST['retainerSent'])) $retainerSent = $_REQUEST['retainerSent'];
if (isset($_POST['retainerSent'])) $retainerSent = $_POST['retainerSent'];
if (empty($retainerSent)) unset($retainerSent);

if (isset($_REQUEST['Zipcode'])) $Zipcode = $_REQUEST['Zipcode'];
if (isset($_POST['Zipcode'])) $Zipcode = $_POST['Zipcode'];
if (empty($Zipcode)) unset($Zipcode);

if (isset($_REQUEST['State'])) $State = $_REQUEST['State'];
if (isset($_POST['State'])) $State = $_POST['State'];
if (empty($State)) unset($State);

if (isset($_REQUEST['City'])) $City = $_REQUEST['City'];
if (isset($_POST['City'])) $City = $_POST['City'];
if (empty($City)) unset($City);
if ($City == '') unset($City);

if (isset($_REQUEST['Street2'])) $Street2 = $_REQUEST['Street2'];
if (isset($_POST['Street2'])) $Street2 = $_POST['Street2'];
if (empty($Street2)) unset($Street2);

if (isset($_REQUEST['Street1'])) $Street1 = $_REQUEST['Street1'];
if (isset($_POST['Street1'])) $Street1 = $_POST['Street1'];
if (empty($Street1)) unset($Street1);

if (isset($_REQUEST['agentlname'])) $agentlname = $_REQUEST['agentlname'];
if (isset($_POST['agentlname'])) $agentlname = $_POST['agentlname'];
if (empty($agentlname)) unset($agentlname);

if (isset($_REQUEST['agentfname'])) $agentfname = $_REQUEST['agentfname'];
if (isset($_POST['agentfname'])) $agentfname = $_POST['agentfname'];
if (empty($agentfname)) unset($agentfname);

if (isset($_REQUEST['caseid'])) $caseid = $_REQUEST['caseid'];
if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (empty($caseid)) unset($caseid);

if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
if (isset($_POST['uniqueid'])) $uniqueid = $_POST['uniqueid'];
if (empty($uniqueid)) unset($uniqueid);

if (isset($_REQUEST['brandid'])) $brandid = $_REQUEST['brandid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (empty($brandid)) unset($brandid);

if (isset($_REQUEST['retainerstatus'])) $retainerstatus = $_REQUEST['retainerstatus'];
if (isset($_POST['retainerstatus'])) $retainerstatus = $_POST['retainerstatus'];
if (empty($retainerstatus)) unset($retainerstatus);

if (isset($_REQUEST['authstatus'])) $authstatus = $_REQUEST['authstatus'];
if (isset($_POST['authstatus'])) $authstatus = $_POST['authstatus'];
if (empty($authstatus)) unset($authstatus);

if (isset($_REQUEST['retainercountersignsent'])) $retainercountersignsent = $_REQUEST['retainercountersignsent'];
if (isset($_POST['retainercountersignsent'])) $retainercountersignsent = $_POST['retainercountersignsent'];
if (empty($retainercountersignsent)) unset($retainercountersignsent);

if (isset($_REQUEST['completedonline'])) $completedonline = $_REQUEST['completedonline'];
if (isset($_POST['completedonline'])) $completedonline = $_POST['completedonline'];
if (empty($completedonline)) unset($completedonline);

if (isset($_REQUEST['noteadd'])) $noteadd = $_REQUEST['noteadd'];
if (isset($_POST['noteadd'])) $noteadd = $_POST['noteadd'];
if (empty($noteadd)) unset($noteadd);
//Caseidsort start
if (isset($_REQUEST['Caseidsort'])) $Caseidsort = $_REQUEST['Caseidsort'];
if (isset($_POST['Caseidsort'])) $Caseidsort = $_POST['Caseidsort'];
if (empty($Caseidsort)) unset($Caseidsort);
//Caseidsort done

//Uniquesort start
if (isset($_REQUEST['Uniqueidsort'])) $Uniqueidsort = $_REQUEST['Uniqueidsort'];
if (isset($_POST['Uniqueidsort'])) $Uniqueidsort = $_POST['Uniqueidsort'];
if (empty($Uniqueidsort)) unset($Uniqueidsort);
//Uniqueidsort done

//Campaignsort start
if (isset($_REQUEST['Campaignsort'])) $Campaignsort = $_REQUEST['Campaignsort'];
if (isset($_POST['Campaignsort'])) $Campaignsort = $_POST['Campaignsort'];
if (empty($Campaignsort)) unset($Campaignsort);
//Campaignsort done

//Firstnamesort start
if (isset($_REQUEST['Firstnamesort'])) $Firstnamesort = $_REQUEST['Firstnamesort'];
if (isset($_POST['Firstnamesort'])) $Firstnamesort = $_POST['Firstnamesort'];
if (empty($Firstnamesort)) unset($Firstnamesort);
//Firstnamesort done

//Lastnamesort start
if (isset($_REQUEST['Lastnamesort'])) $Lastnamesort = $_REQUEST['Lastnamesort'];
if (isset($_POST['Lastnamesort'])) $Lastnamesort = $_POST['Lastnamesort'];
if (empty($Lastnamesort)) unset($Lastnamesort);
//Lastnamesort done

//Phone1sort start
if (isset($_REQUEST['Phone1sort'])) $Phone1sort = $_REQUEST['Phone1sort'];
if (isset($_POST['Phone1sort'])) $Phone1sort = $_POST['Phone1sort'];
if (empty($Phone1sort)) unset($Phone1sort);
//Phone1sort done

//Phone2sort start
if (isset($_REQUEST['Phone2sort'])) $Phone2sort = $_REQUEST['Phone2sort'];
if (isset($_POST['Phone2sort'])) $Phone2sort = $_POST['Phone2sort'];
if (empty($Phone2sort)) unset($Phone2sort);
//Phone2sort done

//Emailsort start
if (isset($_REQUEST['Emailsort'])) $Emailsort = $_REQUEST['Emailsort'];
if (isset($_POST['Emailsort'])) $Emailsort = $_POST['Emailsort'];
if (empty($Emailsort)) unset($Emailsort);
//Emailsort done

//Street1sort start
if (isset($_REQUEST['Street1sort'])) $Street1sort = $_REQUEST['Street1sort'];
if (isset($_POST['Street1sort'])) $Street1sort = $_POST['Street1sort'];
if (empty($Street1sort)) unset($Street1sort);
//Street1sort done

//Street2sort start
if (isset($_REQUEST['Street2sort'])) $Street2sort = $_REQUEST['Street2sort'];
if (isset($_POST['Street2sort'])) $Street2sort = $_POST['Street2sort'];
if (empty($Street2sort)) unset($Street2sort);
//Street2sort done

//Citysort start
if (isset($_REQUEST['Citysort'])) $Citysort = $_REQUEST['Citysort'];
if (isset($_POST['Citysort'])) $Citysort = $_POST['Citysort'];
if (empty($Citysort)) unset($Citysort);
//Citysort done

//Statesort start
if (isset($_REQUEST['Statesort'])) $Statesort = $_REQUEST['Statesort'];
if (isset($_POST['Statesort'])) $Statesort = $_POST['Statesort'];
if (empty($Statesort)) unset($Statesort);
//Statesort done

//Zipcodesort start
if (isset($_REQUEST['Zipcodesort'])) $Zipcodesort = $_REQUEST['Zipcodesort'];
if (isset($_POST['Zipcodesort'])) $Zipcodesort = $_POST['Zipcodesort'];
if (empty($Zipcodesort)) unset($Zipcodesort);
//Zipcodesort done

//Agentlnamesort start
if (isset($_REQUEST['Agentlnamesort'])) $Agentlnamesort = $_REQUEST['Agentlnamesort'];
if (isset($_POST['Agentlnamesort'])) $Agentlnamesort = $_POST['Agentlnamesort'];
if (empty($Agentlnamesort)) unset($Agentlnamesort);
//Agentlnamesort done

//Statussort start
if (isset($_REQUEST['Statussort'])) $Statussort = $_REQUEST['Statussort'];
if (isset($_POST['Statussort'])) $Statussort = $_POST['Statussort'];
if (empty($Statussort)) unset($Statussort);
//Statussort done

//Statusdatesort start
if (isset($_REQUEST['Statusdatesort'])) $Statusdatesort = $_REQUEST['Statusdatesort'];
if (isset($_POST['Statusdatesort'])) $Statusdatesort = $_POST['Statusdatesort'];
if (empty($Statusdatesort)) unset($Statusdatesort);
//Statusdatesort done


if (isset($_REQUEST['showcalllog'])) $showcalllog = $_REQUEST['showcalllog'];
if (isset($_POST['showcalllog'])) $showcalllog = $_POST['showcalllog'];
if (empty($showcalllog)) $showcalllog = 'No';

if (isset($_REQUEST['showadvanced'])) $showadvanced = $_REQUEST['showadvanced'];
if (isset($_POST['showadvanced'])) $showadvanced = $_POST['showadvanced'];
if (empty($showadvanced)) $showadvanced = 'No';


if (isset($_REQUEST['searchnote'])) $searchnote = $_REQUEST['searchnote'];
if (isset($_POST['searchnote'])) $searchnote = $_POST['searchnote'];
if (empty($searchnote)) unset($searchnote);

if (isset($_REQUEST['phone1'])) $phone1 = $_REQUEST['phone1'];
if (isset($_POST['phone1'])) $phone1 = $_POST['phone1'];
if (empty($phone1)) unset($phone1);

if (isset($_REQUEST['phone2'])) $phone2 = $_REQUEST['phone2'];
if (isset($_POST['phone2'])) $phone2 = $_POST['phone2'];
if (empty($phone2)) unset($phone2);

if (isset($_REQUEST['email'])) $email = $_REQUEST['email'];
if (isset($_POST['email'])) $email = $_POST['email'];
if (empty($email)) unset($email);


if (isset($noteadd)) 
{
	if (isset($_REQUEST['noteadddate'])) $noteadddate = $_REQUEST['noteadddate'];
	if (isset($_POST['noteadddate'])) $noteadddate = $_POST['noteadddate'];
	if (empty($noteadddate)) unset($noteadddate);
	
	if (isset($_REQUEST['noteuniqueid'])) $noteuniqueid = $_REQUEST['noteuniqueid'];
	if (isset($_POST['noteuniqueid'])) $noteuniqueid = $_POST['noteuniqueid'];
	if (empty($noteuniqueid)) unset($noteuniqueid);
	
	if (isset($_REQUEST['notebrandid'])) $notebrandid = $_REQUEST['notebrandid'];
	if (isset($_POST['notebrandid'])) $notebrandid = $_POST['notebrandid'];
	if (empty($notebrandid)) unset($notebrandid);

	if (isset($_REQUEST['notelogadd'])) $notelogadd = $_REQUEST['notelogadd'];
	if (isset($_POST['notelogadd'])) $notelogadd = $_POST['notelogadd'];
	if (empty($notelogadd)) unset($notelogadd);


$notestring = "$noteadddate" . ' @ ' ."$time" . ': ' . "$noteadd" . "<br>" . "$notelogadd";

	$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$noteuniqueid' AND status.brandid='$notebrandid' AND status.tenantid='4') UPDATE status set notelog='$notestring',noteadddate='$date' WHERE status.uniqueid='$noteuniqueid' AND status.brandid='$notebrandid' AND status.tenantid='4'";

    $results = sqlsrv_query($conn,$query);


}




?>
Retainers received:<br />

<?PHP 
    echo "<FORM NAME ='form2' METHOD ='POST' ACTION='ReceivedRetainersCM.php'>";
	echo "<div align='left' class='MyFont'>";
if ( $showadvanced == "Yes" ) 
{
	echo "<br>";
	echo "<br>";
	echo "Unique ID:		";
	echo "<INPUT TYPE = 'text' Name='uniqueid' value='$uniqueid' style='width:100px; height:21px'>";
	echo "   Brand ID:		";
	echo "<INPUT TYPE = 'text' Name='brandid' value='$brandid' style='width:100px; height:21px'>";
	echo " Case ID:		";
	echo "<INPUT TYPE = 'text' Name='caseid' value='$caseid' style='width:100px; height:21px'>";	
	echo " Brand:		";
	echo "<INPUT TYPE = 'text' Name='brand' value='$brand' style='width:100px; height:21px'>";
	echo "<br>";
	echo "<br>";
	echo "<div align='left' class='MyFont'>";
	echo " Agent First name:		";
	echo "<INPUT TYPE = 'text' Name='agentfname' value='$agentfname' style='width:100px; height:21px'>";
	echo " Agent Last name:		";
	echo "<INPUT TYPE = 'text' Name='agentlname' value='$agentlname' style='width:100px; height:21px'>";
	echo "<br>";


	echo "<br>";
	echo "<br>";
	echo "<div align='left' class='MyFont'>";
	echo " Client First Name:		";
	echo "<INPUT TYPE = 'text' Name='FirstName' value='$FirstName' style='width:100px; height:21px'>";
	echo " Client Last Name:		";
	echo "<INPUT TYPE = 'text' Name='LastName' value='$LastName' style='width:100px; height:21px'>";
	echo "<br>";
	echo " Phone 1:";	
	echo "<INPUT TYPE = 'text' Name='phone1' value='$phone1' style='width:100px; height:21px'>";
	echo " Phone 2:		";
	echo "<INPUT TYPE = 'text' Name='phone2' value='$phone2' style='width:100px; height:21px'>";
	echo " Email:		";
	echo "<INPUT TYPE = 'text' Name='email' value='$email' style='width:100px; height:21px'>";
	echo "<br>";
	echo "<br>";
	echo " Street1: ";
	echo "<INPUT TYPE = 'text' Name='Street 1' value='$Street1' style='width:50px; height:21px'>";
	echo " Street2:		";
	echo "<INPUT TYPE = 'text' Name='Street 2' value='$Street2' style='width:50px; height:21px'>";
	echo " City:		";
	echo "<INPUT TYPE = 'text' Name='City' value='$City' style='width:100px; height:21px'>";
	echo " State:		";
	echo "<INPUT TYPE = 'text' Name='State' value='$State' style='width:62px; height:21px'>";
	echo " Zipcode:		";
	echo "<INPUT TYPE = 'text' Name='Zipcode' value='$Zipcode' style='width:45px; height:21px'>";
	echo "<br>";
	
	echo "<br>";
}

	echo "<INPUT TYPE = 'Submit' Name = 'Submit1'  VALUE = 'Search'>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Show log:";
			if (isset($showcalllog)) 
	{
		if ( $showcalllog == "Yes" ) 
		{
			echo "<INPUT TYPE = 'Radio' Name ='showcalllog'  value= 'Yes' checked> Yes ";
		}
		else
		{
			echo "<INPUT TYPE = 'Radio' Name ='showcalllog'  value= 'Yes' > Yes ";
		}
		if ( $showcalllog == "No" ) 
		{
			echo "<INPUT TYPE = 'Radio' Name ='showcalllog'  value= 'No' checked> No ";
		}
		else
		{
			echo "<INPUT TYPE = 'Radio' Name ='showcalllog'  value= 'No' > No ";
		}
	}
	else
	{
		echo "<INPUT TYPE = 'Radio' Name ='showcalllog'  value= 'Yes' > Yes ";
		echo "<INPUT TYPE = 'Radio' Name ='showcalllog'  value= 'No' > No ";
	}
	
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Show advanced:";
			if (isset($showadvanced)) 
	{
		if ( $showadvanced == "Yes" ) 
		{
			echo "<INPUT TYPE = 'Radio' Name ='showadvanced'  value= 'Yes' checked> Yes ";
		}
		else
		{
			echo "<INPUT TYPE = 'Radio' Name ='showadvanced'  value= 'Yes' > Yes ";
		}
		if ( $showadvanced == "No" ) 
		{
			echo "<INPUT TYPE = 'Radio' Name ='showadvanced'  value= 'No' checked> No ";
		}
		else
		{
			echo "<INPUT TYPE = 'Radio' Name ='showadvanced'  value= 'No' > No ";
		}
	}
	else
	{
		echo "<INPUT TYPE = 'Radio' Name ='showadvanced'  value= 'Yes' > Yes ";
		echo "<INPUT TYPE = 'Radio' Name ='showadvanced'  value= 'No' > No ";
	}
	
	

//-----------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------
//---------------------------User input Search header End----------------------------------
//---------------------------User input Search header End----------------------------------
//---------------------------User input Search header End----------------------------------
//-----------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------
?>

<?PHP

//-----------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------
//-----------------------Build SQL Query for table draw start------------------------------
//-----------------------Build SQL Query for table draw start------------------------------
//-----------------------Build SQL Query for table draw start------------------------------
//-----------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------


if (empty($sortstring))
 	$sort = 'ORDER BY tenantid';
//Caseidsort - START - Sort by caseid
	if (isset($Caseidsort))	
		{
		if ($Caseidsort == 'No')
			{
			$sort = "$sort";
			}
		if ($Caseidsort == 'YesDesc')
			{
			$sort = "$sort" . ', caseid desc';	
			}
		if ($Caseidsort == 'YesAsc')
			{
			$sort = "$sort" . ', caseid asc';		
			}
		}
//Caseidsort - END
//Uniqueidsort - START - Sort by uniqueid
	if (isset($Uniqueidsort))	
		{
		if ($Uniqueidsort == 'No')
			{
			$sort = "$sort";
			}
		if ($Uniqueidsort == 'YesDesc')
			{
			$sort = "$sort" . ', Uniqueid desc';	
			}
		if ($Uniqueidsort == 'YesAsc')
			{
			$sort = "$sort" . ', Uniqueid asc';		
			}
		}
//Uniqueidsort - END
//Campaignsort - START - sort by Brand name
	if (isset($Campaignsort))	
		{
		if ($Campaignsort == 'No')
			{
			$sort = "$sort";
			}
		if ($Campaignsort == 'YesDesc')
			{
			$sort = "$sort" . ', brand desc';	
			}
		if ($Campaignsort == 'YesAsc')
			{
			$sort = "$sort" . ', brand asc';		
			}
		}
//Campaignsort - END
//Firstnamesort - START - sort by Firstname
	if (isset($Firstnamesort))	
		{
		if ($Firstnamesort == 'No')
			{
			$sort = "$sort";
			}
		if ($Firstnamesort == 'YesDesc')
			{
			$sort = "$sort" . ', firstname desc';	
			}
		if ($Firstnamesort == 'YesAsc')
			{
			$sort = "$sort" . ', firstname asc';		
			}
		}
//Firstnamesort - END
//Lastnamesort - START - sort by Lastname
	if (isset($Lastnamesort))	
		{
		if ($Lastnamesort == 'No')
			{
			$sort = "$sort";
			}
		if ($Lastnamesort == 'YesDesc')
			{
			$sort = "$sort" . ', lastname desc';	
			}
		if ($Lastnamesort == 'YesAsc')
			{
			$sort = "$sort" . ', lastname asc';		
			}
		}
//Lastnamesort - END
//Phone1sort - START - sort by Phone1
	if (isset($Phone1sort))	
		{
		if ($Phone1sort == 'No')
			{
			$sort = "$sort";
			}
		if ($Phone1sort == 'YesDesc')
			{
			$sort = "$sort" . ', phone1 desc';	
			}
		if ($Phone1sort == 'YesAsc')
			{
			$sort = "$sort" . ', phone1 asc';		
			}
		}
//Phone1sort - END
//Phone2sort - START - sort by Phone2
	if (isset($Phone2sort))	
		{
		if ($Phone2sort == 'No')
			{
			$sort = "$sort";
			}
		if ($Phone2sort == 'YesDesc')
			{
			$sort = "$sort" . ', phone2 desc';	
			}
		if ($Phone2sort == 'YesAsc')
			{
			$sort = "$sort" . ', phone2 asc';		
			}
		}
//Phone2sort - END
//Emailsort - START - sort by Phone2
	if (isset($Emailsort))	
		{
		if ($Emailsort == 'No')
			{
			$sort = "$sort";
			}
		if ($Emailsort == 'YesDesc')
			{
			$sort = "$sort" . ', email desc';	
			}
		if ($Emailsort == 'YesAsc')
			{
			$sort = "$sort" . ', email asc';		
			}
		}
//Emailsort - END
//Street1sort - START - sort by Street1
	if (isset($Street1sort))	
		{
		if ($Street1sort == 'No')
			{
			$sort = "$sort";
			}
		if ($Street1sort == 'YesDesc')
			{
			$sort = "$sort" . ', street1 desc';	
			}
		if ($Street1sort == 'YesAsc')
			{
			$sort = "$sort" . ', street1 asc';		
			}
		}
//Street1sort - END
//Street2sort - START - sort by Street2
	if (isset($Street2sort))	
		{
		if ($Street2sort == 'No')
			{
			$sort = "$sort";
			}
		if ($Street2sort == 'YesDesc')
			{
			$sort = "$sort" . ', street2 desc';	
			}
		if ($Street2sort == 'YesAsc')
			{
			$sort = "$sort" . ', street2 asc';		
			}
		}
//Street2sort - END
//Citysort - START - sort by City
	if (isset($Citysort))	
		{
		if ($Citysort == 'No')
			{
			$sort = "$sort";
			}
		if ($Citysort == 'YesDesc')
			{
			$sort = "$sort" . ', city desc';	
			}
		if ($Citysort == 'YesAsc')
			{
			$sort = "$sort" . ', city asc';		
			}
		}
//Citysort - END
//Statesort - START - sort by State
	if (isset($Statesort))	
		{
		if ($Statesort == 'No')
			{
			$sort = "$sort";
			}
		if ($Statesort == 'YesDesc')
			{
			$sort = "$sort" . ', state desc';	
			}
		if ($Statesort == 'YesAsc')
			{
			$sort = "$sort" . ', state asc';		
			}
		}
//Statesort - END
//Zipcodesort - START - sort by State
	if (isset($Zipcodesort))	
		{
		if ($Zipcodesort == 'No')
			{
			$sort = "$sort";
			}
		if ($Zipcodesort == 'YesDesc')
			{
			$sort = "$sort" . ', zipcode desc';	
			}
		if ($Zipcodesort == 'YesAsc')
			{
			$sort = "$sort" . ', zipcode asc';		
			}
		}
//Zipcodesort - END
//Agentlnamesort - START - sort by State
	if (isset($Agentlnamesort))	
		{
		if ($Agentlnamesort == 'No')
			{
			$sort = "$sort";
			}
		if ($Agentlnamesort == 'YesDesc')
			{
			$sort = "$sort" . ', agentlname desc';	
			}
		if ($Agentlnamesort == 'YesAsc')
			{
			$sort = "$sort" . ', agentlname asc';		
			}
		}
//Agentlnamesort - END
//Statussort - START 
	if (isset($Statussort))	
		{
		if ($Statussort == 'No')
			{
			$sort = "$sort";
			}
		if ($Statussort == 'YesDesc')
			{
			$sort = "$sort" . ', currentstatus desc';	
			}
		if ($Statussort == 'YesAsc')
			{
			$sort = "$sort" . ', currentstatus asc';		
			}
		}
//Statussort - END
//Statusdatesort
	if (isset($Statusdatesort))	
		{
		if ($Statusdatesort == 'No')
			{
			$sort = "$sort";
			}
		if ($Statusdatesort == 'YesDesc')
			{
			$sort = "$sort" . ', currentstatusdate desc';	
			}
		if ($Statusdatesort == 'YesAsc')
			{
			$sort = "$sort" . ', currentstatusdate asc';		
			}
		}

{
	if (empty($searchnote))
	{

		$new_array = array(
		'tenantid' => '4',
			);
		$tennantid = '4';
		$search = 'tenantid=\'' . "$tennantid" . '\' AND ';
		if (isset($brand)) $search = "$search" . 'brand=\'' . "$brand" . '\' AND ';
		if (isset($FirstName)) $search = "$search" . 'FirstName=\'' . "$FirstName" . '\' AND ';
		if (isset($LastName)) $search = "$search" . 'LastName=\'' . "$LastName" . '\' AND ';
		if (isset($brandid)) $search = "$search" . 'brandid=\'' . "$brandid" . '\' AND ';
	  	if (isset($uniqueid)) $search = "$search" . 'uniqueid=\'' . "$uniqueid" . '\' AND ';
	  	if (isset($caseid)) $search = "$search" . 'caseid=\'' . "$caseid" . '\' AND ';
	  	if (isset($agentfname)) $search = "$search" . 'agentfname=\'' . "$agentfname" . '\' AND ';
	  	if (isset($agentlname)) $search = "$search" . 'agentlname=\'' . "$agentlname" . '\' AND ';
	  	if (isset($Street1)) $search = "$search" . 'Street1=\'' . "$Street2" . '\' AND ';
	  	if (isset($Street2)) $search = "$search" . 'Street2=\'' . "$Street2" . '\' AND ';
	  	if (isset($City)) $search = "$search" . 'City=\'' . "$City" . '\' AND ';
	  	if (isset($State)) $search = "$search" . 'State=\'' . "$State" . '\' AND ';
	  	if (isset($Zipcode)) $search = "$search" . 'Zipcode=\'' . "$Zipcode" . '\' AND ';
	  	if (isset($retainerSent)) $search = "$search" . 'retainerSent=\'' . "$retainerSent" . '\' AND ';
	  	if (isset($retainerRecieved)) $search = "$search" . 'retainerRecieved=\'' . "$retainerRecieved" . '\' AND ';
	  	if (isset($interviewstarted)) $search = "$search" . 'interviewstarted=\'' . "$interviewstarted" . '\' AND ';
	  	if (isset($reachedretainerdiscussion)) $search = "$search" . 'reachedretainerdiscussion=\'' . "$reachedretainerdiscussion" . '\' AND ';
	  	if (isset($authformreceived)) $search = "$search" . 'authformreceived=\'' . "$authformreceived" . '\' AND ';
	  	if (isset($demandcreated)) $search = "$search" . 'demandcreated=\'' . "$demandcreated" . '\' AND ';
	  	if (isset($retainernote)) $search = "$search" . 'retainernote=\'' . "$retainernote" . '\' AND ';
	  	if (isset($authnote)) $search = "$search" . 'authnote=\'' . "$authnote" . '\' AND ';
	  	if (isset($retainerstatus)) $search = "$search" . 'retainerstatus=\'' . "$retainerstatus" . '\' AND ';
	  	if (isset($authstatus)) $search = "$search" . 'authstatus=\'' . "$authstatus" . '\' AND ';
	  	if (isset($retainercountersignsent)) $search = "$search" . 'retainercountersignsent=\'' . "$retainercountersignsent" . '\' AND ';
	  	if (isset($completedonline)) $search = "$search" . 'completedonline=\'' . "$completedonline" . '\' AND ';
	  	if (isset($phone1)) $search = "$search" . 'phone1=\'' . "$phone1" . '\' AND ';
	  	if (isset($phone2)) $search = "$search" . 'phone2=\'' . "$phone2" . '\' AND ';
	  	if (isset($email)) $search = "$search" . 'email=\'' . "$email" . '\' AND ';




		$search = "$search" . 'Time IS NOT NULL';

		$query = "SELECT * FROM status where retainerSent='Yes' AND retainerRecieved='Yes' AND $search $sort";
    	$results = sqlsrv_query($conn,$query);
	}


	if (isset($searchnote))
	{
	$query = "SELECT * FROM status where retainerSent='Yes' AND retainerRecieved='Yes'  AND $searchnote $sort";
    $results = sqlsrv_query($conn,$query);
	}
}

if (isset($sortstring))
{
	if (empty($searchnote))
	{

		$new_array = array(
		'tenantid' => '4',
			);
		$tennantid = '4';
		$search = 'tenantid=\'' . "$tennantid" . '\' AND ';
		if (isset($brand)) $search = "$search" . 'brand=\'' . "$brand" . '\' AND ';
		if (isset($FirstName)) $search = "$search" . 'FirstName=\'' . "$FirstName" . '\' AND ';
		if (isset($LastName)) $search = "$search" . 'LastName=\'' . "$LastName" . '\' AND ';
		if (isset($brandid)) $search = "$search" . 'brandid=\'' . "$brandid" . '\' AND ';
	  	if (isset($uniqueid)) $search = "$search" . 'uniqueid=\'' . "$uniqueid" . '\' AND ';
	  	if (isset($caseid)) $search = "$search" . 'caseid=\'' . "$caseid" . '\' AND ';
	  	if (isset($agentfname)) $search = "$search" . 'agentfname=\'' . "$agentfname" . '\' AND ';
	  	if (isset($agentlname)) $search = "$search" . 'agentlname=\'' . "$agentlname" . '\' AND ';
	  	if (isset($Street1)) $search = "$search" . 'Street1=\'' . "$Street2" . '\' AND ';
	  	if (isset($Street2)) $search = "$search" . 'Street2=\'' . "$Street2" . '\' AND ';
	  	if (isset($City)) $search = "$search" . 'City=\'' . "$City" . '\' AND ';
	  	if (isset($State)) $search = "$search" . 'State=\'' . "$State" . '\' AND ';
	  	if (isset($Zipcode)) $search = "$search" . 'Zipcode=\'' . "$Zipcode" . '\' AND ';
	  	if (isset($retainerSent)) $search = "$search" . 'retainerSent=\'' . "$retainerSent" . '\' AND ';
	  	if (isset($retainerRecieved)) $search = "$search" . 'retainerRecieved=\'' . "$retainerRecieved" . '\' AND ';
	  	if (isset($interviewstarted)) $search = "$search" . 'interviewstarted=\'' . "$interviewstarted" . '\' AND ';
	  	if (isset($reachedretainerdiscussion)) $search = "$search" . 'reachedretainerdiscussion=\'' . "$reachedretainerdiscussion" . '\' AND ';
	  	if (isset($authformreceived)) $search = "$search" . 'authformreceived=\'' . "$authformreceived" . '\' AND ';
	  	if (isset($demandcreated)) $search = "$search" . 'demandcreated=\'' . "$demandcreated" . '\' AND ';
	  	if (isset($retainernote)) $search = "$search" . 'retainernote=\'' . "$retainernote" . '\' AND ';
	  	if (isset($authnote)) $search = "$search" . 'authnote=\'' . "$authnote" . '\' AND ';
	  	if (isset($retainerstatus)) $search = "$search" . 'retainerstatus=\'' . "$retainerstatus" . '\' AND ';
	  	if (isset($authstatus)) $search = "$search" . 'authstatus=\'' . "$authstatus" . '\' AND ';
	  	if (isset($retainercountersignsent)) $search = "$search" . 'retainercountersignsent=\'' . "$retainercountersignsent" . '\' AND ';
	  	if (isset($completedonline)) $search = "$search" . 'completedonline=\'' . "$completedonline" . '\' AND ';
	  	if (isset($phone1)) $search = "$search" . 'phone1=\'' . "$phone1" . '\' AND ';
	  	if (isset($phone2)) $search = "$search" . 'phone2=\'' . "$phone2" . '\' AND ';
	  	if (isset($email)) $search = "$search" . 'email=\'' . "$email" . '\' AND ';




		$search = "$search" . 'Time IS NOT NULL';

		$query = "SELECT * FROM status where retainerSent='Yes' AND $search $sorstring";
    	$results = sqlsrv_query($conn,$query);
	}


	if (isset($searchnote))
	{
	$query = "SELECT * FROM status where retainerSent='Yes' AND $searchnote $sorstring";
    $results = sqlsrv_query($conn,$query);
	}
}



//-----------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------
//----------------------------------Table draw start---------------------------------------
//----------------------------------Table draw start---------------------------------------
//----------------------------------Table draw start---------------------------------------
//-----------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------

if ($showcalllog == 'No')
{
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='100%' cellpadding='2' cellspacing='0'>";
	echo "<form action='NeedToReceiveRetainer.php?brandname=$brandname&agentlname=$agentlname' method='post'>";

	echo "<tr>";
	echo "<th width='30'><font size=2>";
//caseidsort drop down -- start
	echo "<select name='Caseidsort'>";
	if (isset($Caseidsort)) 
	{
		if ( $Caseidsort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Caseid &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Caseid &uarr;</option>";
		}
		if ( $Caseidsort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Caseid &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Caseid &darr;</option>";
		}
		
		if ( $Caseidsort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Case ID</option>";
		}
		else
		{
			echo "<option value='No'>Case ID</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Case ID</option>";
		echo "<option value='YesAsc'>Case ID &uarr;</option>";
		echo "<option value='YesDesc'>Case ID &darr;</option>";
		
	}
	echo "</select>";
//caseidsort drop down -- end
	echo "</th>";
	echo "<th width='70'>";
//Uniqueidsort drop down -- start
	echo "<select name='Uniqueidsort'>";
	if (isset($Uniqueidsort)) 
	{
		if ( $Uniqueidsort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Unique ID &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Unique ID &uarr;</option>";
		}
		if ( $Uniqueidsort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Unique ID &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Unique ID &darr;</option>";
		}
		
		if ( $Uniqueidsort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Unique ID</option>";
		}
		else
		{
			echo "<option value='No'>Unique ID</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Unique ID</option>";
		echo "<option value='YesAsc'>Unique ID &uarr;</option>";
		echo "<option value='YesDesc'>Unique ID &darr;</option>";
		
	}
	
	echo "</select>"; 
//Uniqueidsort drop down -- end
	echo "</th>";

	echo "<th width='30'>";
//Campaignsort drop down -- start
	echo "<select name='Campaignsort'>";
	if (isset($Campaignsort)) 
	{
		if ( $Campaignsort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Campaign &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Campaign &uarr;</option>";
		}
		if ( $Campaignsort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Campaign &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Campaign &darr;</option>";
		}
		
		if ( $Campaignsort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Campaign</option>";
		}
		else
		{
			echo "<option value='No'>Campaign</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Campaign</option>";
		echo "<option value='YesAsc'>Campaign &uarr;</option>";
		echo "<option value='YesDesc'>Campaign &darr;</option>";
		
	}
	echo "</select>";
//caseidsort drop down -- end
	echo "</th>";
	echo "<th width='100'>";
//Firstnamesort drop down -- start
	echo "<select name='Firstnamesort'>";
	if (isset($Firstnamesort)) 
	{
		if ( $Firstnamesort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>First Name &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>First Name &uarr;</option>";
		}
		if ( $Firstnamesort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>First Name &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>First Name &darr;</option>";
		}
		
		if ( $Firstnamesort == "No" ) 
		{
			echo "<option value='No' selected='selected'>First Name</option>";
		}
		else
		{
			echo "<option value='No'>First Name</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>First Name</option>";
		echo "<option value='YesAsc'>First Name &uarr;</option>";
		echo "<option value='YesDesc'>First Name &darr;</option>";
		
	}
	echo "</select>";
//Firstnamesort drop down -- end
	echo "</th>";
	echo "<th width='100'>";
//Lastnamesort drop down -- START
	echo "<select name='Lastnamesort'>";
	if (isset($Lastnamesort)) 
	{
		if ( $Lastnamesort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Last Name &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Last Name &uarr;</option>";
		}
		if ( $Lastnamesort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Last Name &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Last Name &darr;</option>";
		}
		
		if ( $Lastnamesort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Last Name</option>";
		}
		else
		{
			echo "<option value='No'>Last Name</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Last Name</option>";
		echo "<option value='YesAsc'>Last Name &uarr;</option>";
		echo "<option value='YesDesc'>Last Name &darr;</option>";
		
	}
	echo "</select>";
//Lastnamesort drop down -- end
	echo "</th>";
	echo "<th width='50'>";
//Phone1sort drop down -- START
	echo "<select name='Phone1sort'>";
	if (isset($Phone1sort)) 
	{
		if ( $Phone1sort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Phone1 &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Phone1 &uarr;</option>";
		}
		if ( $Phone1sort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Phone1 &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Phone1 &darr;</option>";
		}
		
		if ( $Phone1sort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Phone1</option>";
		}
		else
		{
			echo "<option value='No'>Phone1</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Phone1</option>";
		echo "<option value='YesAsc'>Phone1 &uarr;</option>";
		echo "<option value='YesDesc'>Phone1 &darr;</option>";
		
	}
	echo "</select>";
//Phone1sort drop down -- end
	echo "</th>";
	echo "<th width='50'>";
//Phone2sort drop down -- START
	echo "<select name='Phone1sort'>";
	if (isset($Phone2sort)) 
	{
		if ( $Phone2sort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Phone2 &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Phone2 &uarr;</option>";
		}
		if ( $Phone2sort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Phone2 &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Phone2 &darr;</option>";
		}
		
		if ( $Phone2sort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Phone2</option>";
		}
		else
		{
			echo "<option value='No'>Phone2</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Phone2</option>";
		echo "<option value='YesAsc'>Phone2 &uarr;</option>";
		echo "<option value='YesDesc'>Phone2 &darr;</option>";
		
	}
	echo "</select>";
//Phone2sort drop down -- end
	echo "</th>";
	echo "<th width='100'>";
//Emailsort drop down -- START
	echo "<select name='Emailsort'>";
	if (isset($Emailsort)) 
	{
		if ( $Emailsort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Email &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Email &uarr;</option>";
		}
		if ( $Emailsort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Email &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Email &darr;</option>";
		}
		
		if ( $Emailsort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Email</option>";
		}
		else
		{
			echo "<option value='No'>Email</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Email</option>";
		echo "<option value='YesAsc'>Email &uarr;</option>";
		echo "<option value='YesDesc'>Email &darr;</option>";
		
	}
	echo "</select>";
//Emailsort drop down -- end
	echo "</th>";
	echo "<th width='30'>";
//Statussort drop down -- START
	echo "<select name='Statussort'>";
	if (isset($Statussort)) 
	{
		if ( $Statussort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Status &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Status &uarr;</option>";
		}
		if ( $Statussort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Status &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Status &darr;</option>";
		}
		
		if ( $Statussort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Status</option>";
		}
		else
		{
			echo "<option value='No'>Status</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Status</option>";
		echo "<option value='YesAsc'>Status &uarr;</option>";
		echo "<option value='YesDesc'>Status &darr;</option>";
		
	}
	echo "</select>";
//Statussort drop down -- end
	echo "</th>";
	echo "<th width='30'>";
//Statusdatesort drop down -- START
	echo "<select name='Statusdatesort'>";
	if (isset($Statusdatesort)) 
	{
		if ( $Statusdatesort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Status Date &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Status Date &uarr;</option>";
		}
		if ( $Statusdatesort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Status Date &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Status Date &darr;</option>";
		}
		
		if ( $Statusdatesort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Status Date</option>";
		}
		else
		{
			echo "<option value='No'>Status Date</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Status Date</option>";
		echo "<option value='YesAsc'>Status Date &uarr;</option>";
		echo "<option value='YesDesc'>Status Date &darr;</option>";
		
	}
	echo "</select>";
//Statusdatesort drop down -- end
	echo "</th>";
  	echo "<th width='50'>";
//Street1sort drop down -- START
	echo "<select name='Street1sort'>";
	if (isset($Street1sort)) 
	{
		if ( $Street1sort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Street1 &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Street1 &uarr;</option>";
		}
		if ( $Street1sort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Street1 &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Street1 &darr;</option>";
		}
		
		if ( $Street1sort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Street1</option>";
		}
		else
		{
			echo "<option value='No'>Street1</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Street1</option>";
		echo "<option value='YesAsc'>Street1 &uarr;</option>";
		echo "<option value='YesDesc'>Street1 &darr;</option>";
		
	}
	echo "</select>";
//Street1sort drop down -- end
	echo "</th>";
	echo "<th width='30'>";
//Street2sort drop down -- START
	echo "<select name='Street2sort'>";
	if (isset($Street2sort)) 
	{
		if ( $Street2sort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Street2 &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Street2s&uarr;</option>";
		}
		if ( $Street2sort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Street2 &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Street2 &darr;</option>";
		}
		
		if ( $Street2sort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Street2</option>";
		}
		else
		{
			echo "<option value='No'>Street2</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Street2</option>";
		echo "<option value='YesAsc'>Street2 &uarr;</option>";
		echo "<option value='YesDesc'>Street2 &darr;</option>";
		
	}
	echo "</select>";
//Street2sort drop down -- end
	echo "</th>";
	echo "<th width='30'>";
//Citysort drop down -- START
	echo "<select name='Citysort'>";
	if (isset($Citysort)) 
	{
		if ( $Citysort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>City &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>City &uarr;</option>";
		}
		if ( $Citysort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>City &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>City &darr;</option>";
		}
		
		if ( $Citysort == "No" ) 
		{
			echo "<option value='No' selected='selected'>City</option>";
		}
		else
		{
			echo "<option value='No'>City</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>City</option>";
		echo "<option value='YesAsc'>City &uarr;</option>";
		echo "<option value='YesDesc'>City &darr;</option>";
		
	}
	echo "</select>";
//Citysort drop down -- end
	echo "</th>";
	echo "<th width='30'>";
//Statesort drop down -- START
	echo "<select name='Statesort'>";
	if (isset($Statesort)) 
	{
		if ( $Statesort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>State &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>State &uarr;</option>";
		}
		if ( $Statesort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>State &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>State &darr;</option>";
		}
		
		if ( $Statesort == "No" ) 
		{
			echo "<option value='No' selected='selected'>State</option>";
		}
		else
		{
			echo "<option value='No'>State</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>State</option>";
		echo "<option value='YesAsc'>State &uarr;</option>";
		echo "<option value='YesDesc'>State &darr;</option>";
		
	}
	echo "</select>";
//Statesort drop down -- end
	echo "</th>";
	echo "<th width='30'>";
//Zipcodesort drop down -- START
	echo "<select name='Zipcodesort'>";
	if (isset($Zipcodesort)) 
	{
		if ( $Zipcodesort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Zipcode &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Zipcode &uarr;</option>";
		}
		if ( $Zipcodesort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Zipcode &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>State &darr;</option>";
		}
		
		if ( $Zipcodesort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Zipcode</option>";
		}
		else
		{
			echo "<option value='No'>Zipcode</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Zipcode</option>";
		echo "<option value='YesAsc'>Zipcode &uarr;</option>";
		echo "<option value='YesDesc'>Zipcode &darr;</option>";
		
	}
	echo "</select>";
//Zipcodesort drop down -- end
	echo "</th>";
	echo "<th width='30'>";
//Agentlastnamesort drop down -- START
	echo "<select name='Agentlastnamesort'>";
	if (isset($Agentlastnamesort)) 
	{
		if ( $Agentlastnamesort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>CM &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>CM &uarr;</option>";
		}
		if ( $Agentlastnamesort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>CM &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>CM &darr;</option>";
		}
		
		if ( $Agentlastnamesort == "No" ) 
		{
			echo "<option value='No' selected='selected'>CM</option>";
		}
		else
		{
			echo "<option value='No'>CM</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>CM</option>";
		echo "<option value='YesAsc'>CM &uarr;</option>";
		echo "<option value='YesDesc'>CM &darr;</option>";
		
	}
	echo "</select>";
//Agentlastnamesort drop down -- end
	echo "</th>";
	echo "<th> Interview";
	echo "</th>";
	echo "</tr>";
	
	echo "</form>";
}


while($row = sqlsrv_fetch_array($results)){
if ($showcalllog == 'Yes')
{
	echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='100%' cellpadding='2' cellspacing='0'>";
		echo "<tr>";
	echo "<th width='30'><font size=2>";
//caseidsort drop down -- start
	echo "<select name='Caseidsort'>";
	if (isset($Caseidsort)) 
	{
		if ( $Caseidsort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Caseid &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Caseid &uarr;</option>";
		}
		if ( $Caseidsort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Caseid &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Caseid &darr;</option>";
		}
		
		if ( $Caseidsort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Case ID</option>";
		}
		else
		{
			echo "<option value='No'>Case ID</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Case ID</option>";
		echo "<option value='YesAsc'>Case ID &uarr;</option>";
		echo "<option value='YesDesc'>Case ID &darr;</option>";
		
	}
	echo "</select>";
//caseidsort drop down -- end
	echo "</th>";
	echo "<th width='70'>";
//Uniqueidsort drop down -- start
	echo "<select name='Uniqueidsort'>";
	if (isset($Uniqueidsort)) 
	{
		if ( $Uniqueidsort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Unique ID &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Unique ID &uarr;</option>";
		}
		if ( $Uniqueidsort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Unique ID &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Unique ID &darr;</option>";
		}
		
		if ( $Uniqueidsort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Unique ID</option>";
		}
		else
		{
			echo "<option value='No'>Unique ID</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Unique ID</option>";
		echo "<option value='YesAsc'>Unique ID &uarr;</option>";
		echo "<option value='YesDesc'>Unique ID &darr;</option>";
		
	}
	
	echo "</select>"; 
//Uniqueidsort drop down -- end
	echo "</th>";

	echo "<th width='30'>";
//Campaignsort drop down -- start
	echo "<select name='Campaignsort'>";
	if (isset($Campaignsort)) 
	{
		if ( $Campaignsort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Campaign &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Campaign &uarr;</option>";
		}
		if ( $Campaignsort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Campaign &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Campaign &darr;</option>";
		}
		
		if ( $Campaignsort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Campaign</option>";
		}
		else
		{
			echo "<option value='No'>Campaign</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Campaign</option>";
		echo "<option value='YesAsc'>Campaign &uarr;</option>";
		echo "<option value='YesDesc'>Campaign &darr;</option>";
		
	}
	echo "</select>";
//caseidsort drop down -- end
	echo "</th>";
	echo "<th width='100'>";
//Firstnamesort drop down -- start
	echo "<select name='Firstnamesort'>";
	if (isset($Firstnamesort)) 
	{
		if ( $Firstnamesort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>First Name &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>First Name &uarr;</option>";
		}
		if ( $Firstnamesort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>First Name &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>First Name &darr;</option>";
		}
		
		if ( $Firstnamesort == "No" ) 
		{
			echo "<option value='No' selected='selected'>First Name</option>";
		}
		else
		{
			echo "<option value='No'>First Name</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>First Name</option>";
		echo "<option value='YesAsc'>First Name &uarr;</option>";
		echo "<option value='YesDesc'>First Name &darr;</option>";
		
	}
	echo "</select>";
//Firstnamesort drop down -- end
	echo "</th>";
	echo "<th width='100'>";
//Lastnamesort drop down -- START
	echo "<select name='Lastnamesort'>";
	if (isset($Lastnamesort)) 
	{
		if ( $Lastnamesort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Last Name &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Last Name &uarr;</option>";
		}
		if ( $Lastnamesort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Last Name &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Last Name &darr;</option>";
		}
		
		if ( $Lastnamesort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Last Name</option>";
		}
		else
		{
			echo "<option value='No'>Last Name</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Last Name</option>";
		echo "<option value='YesAsc'>Last Name &uarr;</option>";
		echo "<option value='YesDesc'>Last Name &darr;</option>";
		
	}
	echo "</select>";
//Lastnamesort drop down -- end
	echo "</th>";
	echo "<th width='50'>";
//Phone1sort drop down -- START
	echo "<select name='Phone1sort'>";
	if (isset($Phone1sort)) 
	{
		if ( $Phone1sort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Phone1 &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Phone1 &uarr;</option>";
		}
		if ( $Phone1sort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Phone1 &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Phone1 &darr;</option>";
		}
		
		if ( $Phone1sort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Phone1</option>";
		}
		else
		{
			echo "<option value='No'>Phone1</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Phone1</option>";
		echo "<option value='YesAsc'>Phone1 &uarr;</option>";
		echo "<option value='YesDesc'>Phone1 &darr;</option>";
		
	}
	echo "</select>";
//Phone1sort drop down -- end
	echo "</th>";
	echo "<th width='50'>";
//Phone2sort drop down -- START
	echo "<select name='Phone1sort'>";
	if (isset($Phone2sort)) 
	{
		if ( $Phone2sort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Phone2 &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Phone2 &uarr;</option>";
		}
		if ( $Phone2sort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Phone2 &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Phone2 &darr;</option>";
		}
		
		if ( $Phone2sort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Phone2</option>";
		}
		else
		{
			echo "<option value='No'>Phone2</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Phone2</option>";
		echo "<option value='YesAsc'>Phone2 &uarr;</option>";
		echo "<option value='YesDesc'>Phone2 &darr;</option>";
		
	}
	echo "</select>";
//Phone2sort drop down -- end
	echo "</th>";
	echo "<th width='100'>";
//Emailsort drop down -- START
	echo "<select name='Emailsort'>";
	if (isset($Emailsort)) 
	{
		if ( $Emailsort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Email &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Email &uarr;</option>";
		}
		if ( $Emailsort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Email &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Email &darr;</option>";
		}
		
		if ( $Emailsort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Email</option>";
		}
		else
		{
			echo "<option value='No'>Email</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Email</option>";
		echo "<option value='YesAsc'>Email &uarr;</option>";
		echo "<option value='YesDesc'>Email &darr;</option>";
		
	}
	echo "</select>";
//Emailsort drop down -- end
	echo "</th>";
	echo "<th width='30'>";
//Statussort drop down -- START
	echo "<select name='Statussort'>";
	if (isset($Statussort)) 
	{
		if ( $Statussort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Status &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Status &uarr;</option>";
		}
		if ( $Statussort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Status &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Status &darr;</option>";
		}
		
		if ( $Statussort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Status</option>";
		}
		else
		{
			echo "<option value='No'>Status</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Status</option>";
		echo "<option value='YesAsc'>Status &uarr;</option>";
		echo "<option value='YesDesc'>Status &darr;</option>";
		
	}
	echo "</select>";
//Statussort drop down -- end
	echo "</th>";
	echo "<th width='30'>";
//Statusdatesort drop down -- START
	echo "<select name='Statusdatesort'>";
	if (isset($Statusdatesort)) 
	{
		if ( $Statusdatesort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Status Date &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Status Date &uarr;</option>";
		}
		if ( $Statusdatesort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Status Date &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Status Date &darr;</option>";
		}
		
		if ( $Statusdatesort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Status Date</option>";
		}
		else
		{
			echo "<option value='No'>Status Date</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Status Date</option>";
		echo "<option value='YesAsc'>Status Date &uarr;</option>";
		echo "<option value='YesDesc'>Status Date &darr;</option>";
		
	}
	echo "</select>";
//Statusdatesort drop down -- end
	echo "</th>";
  	echo "<th width='50'>";
//Street1sort drop down -- START
	echo "<select name='Street1sort'>";
	if (isset($Street1sort)) 
	{
		if ( $Street1sort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Street1 &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Street1 &uarr;</option>";
		}
		if ( $Street1sort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Street1 &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Street1 &darr;</option>";
		}
		
		if ( $Street1sort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Street1</option>";
		}
		else
		{
			echo "<option value='No'>Street1</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Street1</option>";
		echo "<option value='YesAsc'>Street1 &uarr;</option>";
		echo "<option value='YesDesc'>Street1 &darr;</option>";
		
	}
	echo "</select>";
//Street1sort drop down -- end
	echo "</th>";
	echo "<th width='30'>";
//Street2sort drop down -- START
	echo "<select name='Street2sort'>";
	if (isset($Street2sort)) 
	{
		if ( $Street2sort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Street2 &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Street2s&uarr;</option>";
		}
		if ( $Street2sort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Street2 &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>Street2 &darr;</option>";
		}
		
		if ( $Street2sort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Street2</option>";
		}
		else
		{
			echo "<option value='No'>Street2</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Street2</option>";
		echo "<option value='YesAsc'>Street2 &uarr;</option>";
		echo "<option value='YesDesc'>Street2 &darr;</option>";
		
	}
	echo "</select>";
//Street2sort drop down -- end
	echo "</th>";
	echo "<th width='30'>";
//Citysort drop down -- START
	echo "<select name='Citysort'>";
	if (isset($Citysort)) 
	{
		if ( $Citysort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>City &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>City &uarr;</option>";
		}
		if ( $Citysort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>City &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>City &darr;</option>";
		}
		
		if ( $Citysort == "No" ) 
		{
			echo "<option value='No' selected='selected'>City</option>";
		}
		else
		{
			echo "<option value='No'>City</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>City</option>";
		echo "<option value='YesAsc'>City &uarr;</option>";
		echo "<option value='YesDesc'>City &darr;</option>";
		
	}
	echo "</select>";
//Citysort drop down -- end
	echo "</th>";
	echo "<th width='30'>";
//Statesort drop down -- START
	echo "<select name='Statesort'>";
	if (isset($Statesort)) 
	{
		if ( $Statesort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>State &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>State &uarr;</option>";
		}
		if ( $Statesort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>State &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>State &darr;</option>";
		}
		
		if ( $Statesort == "No" ) 
		{
			echo "<option value='No' selected='selected'>State</option>";
		}
		else
		{
			echo "<option value='No'>State</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>State</option>";
		echo "<option value='YesAsc'>State &uarr;</option>";
		echo "<option value='YesDesc'>State &darr;</option>";
		
	}
	echo "</select>";
//Statesort drop down -- end
	echo "</th>";
	echo "<th width='30'>";
//Zipcodesort drop down -- START
	echo "<select name='Zipcodesort'>";
	if (isset($Zipcodesort)) 
	{
		if ( $Zipcodesort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>Zipcode &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>Zipcode &uarr;</option>";
		}
		if ( $Zipcodesort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>Zipcode &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>State &darr;</option>";
		}
		
		if ( $Zipcodesort == "No" ) 
		{
			echo "<option value='No' selected='selected'>Zipcode</option>";
		}
		else
		{
			echo "<option value='No'>Zipcode</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>Zipcode</option>";
		echo "<option value='YesAsc'>Zipcode &uarr;</option>";
		echo "<option value='YesDesc'>Zipcode &darr;</option>";
		
	}
	echo "</select>";
//Zipcodesort drop down -- end
	echo "</th>";
	echo "<th width='30'>";
//Agentlastnamesort drop down -- START
	echo "<select name='Agentlastnamesort'>";
	if (isset($Agentlastnamesort)) 
	{
		if ( $Agentlastnamesort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>CM &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>CM &uarr;</option>";
		}
		if ( $Agentlastnamesort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>CM &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>CM &darr;</option>";
		}
		
		if ( $Agentlastnamesort == "No" ) 
		{
			echo "<option value='No' selected='selected'>CM</option>";
		}
		else
		{
			echo "<option value='No'>CM</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>CM</option>";
		echo "<option value='YesAsc'>CM &uarr;</option>";
		echo "<option value='YesDesc'>CM &darr;</option>";
		
	}
	echo "</select>";
//Agentlastnamesort drop down -- end
	echo "</th>";
	echo "<th>Interview";
	echo "</th>";
	echo "</tr>";
	
	echo "</form>";
}
  echo "<tr>";
  echo "<td><font size=2>" . $row['caseid'] . "</td>";
  echo "<td><font size=2>" . $row['uniqueid'] . "</td>";
  echo "<td><font size=1>" . $row['brand'] . "</td>";
  echo "<td><font size=2>" . $row['FirstName'] . "</td>";
  echo "<td><font size=2>" . $row['LastName'] . "</td>";
  echo "<td><font size=2>" . $row['phone1'] .  "</td>";
  echo "<td><font size=2>" . $row['phone2'] . "</td>";
  echo "<td><font size=2>";
  if (isset($row['email']))
  {
  	echo   "<a href='mailto:" . $row['email'] . "'>" . $row['email'] ; 
  }
  echo "</td>";
  echo "<td><font size=2>" . $row['currentstatus'] . "</td>";
  echo "<td><font size=2>" . $row['currentstatusdate'] . "</td>";  
  echo "<td><font size=2>" . $row['Street1'] . "</td>";
  echo "<td><font size=2>" . $row['Street2'] . "</td>";
  echo "<td><font size=2>" . $row['City'] . "</td>";
  echo "<td><font size=2>" . $row['State'] . "</td>";
  echo "<td><font size=2>" . $row['Zipcode'] . "</td>";
  echo "<td><font size=1>" . $row['agentfname'] . " " . $row['agentlname'] . "</td>";
  echo "<td><a href='https://my.spicecsm.com/srv_calls/print.php?caseid=" . $row['caseid'] . "&comp=MassAction&brand=" . $row['brandid'] . "' target='_blank'>Interview</a></td>";
echo "</tr>";
if ($showcalllog == 'Yes')
{
echo "</table>";
}

if ($showcalllog == 'Yes')
{
 echo "<table border='1' bordercolor='#000000' style='background-color:#FFFF99' width='100%' cellpadding='2' cellspacing='0'>"; 
  echo "<tr>";
  	echo "<th width='100'><font size=2>Interaction</th>";
	echo "<th width='80%'><font size=2>Log</th>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>";
    echo "Add interaction: <form action='ReceivedRetainersCM.php?brandname=$brandname&agentlname=$agentlname' method='post'>";
	
	echo "<INPUT TYPE = 'text' Name='noteadd' value='' style='width:100px; height:21px'>";
	echo "<input type='hidden' name='noteadddate' value='" . $date . "'>";
	echo "<input type='hidden' name='noteuniqueid' value='" . $row['uniqueid'] . "'>";
	echo "<input type='hidden' name='notebrandid' value='" . $row['brandid'] . "'>";
	echo "<input type='hidden' name='notelogadd' value='" . $row['notelog'] . "'>";
	echo "<input type='hidden' name='showcalllog' value='" . $showcalllog . "'>";
if (isset($brand)) echo "<input type='hidden' name='brand' value='" . $brand . "'>";
if (isset($FirstName)) echo "<input type='hidden' name='FirstName' value='" . $FirstName . "'>";
if (isset($LastName)) echo "<input type='hidden' name='LastName' value='" . $LastName . "'>";
if (isset($brandid)) echo "<input type='hidden' name='brandid' value='" . $brandid . "'>";
if (isset($uniqueid)) echo "<input type='hidden' name='uniqueid' value='" . $uniqueid . "'>";
if (isset($caseid)) echo "<input type='hidden' name='caseid' value='" . $caseid . "'>";
if (isset($agentfname)) echo "<input type='hidden' name='agentfname' value='" . $agentfname . "'>";
if (isset($agentlname)) echo "<input type='hidden' name='agentlname' value='" . $agentlname . "'>";
if (isset($Street1)) echo "<input type='hidden' name='Street1' value='" . $Street1 . "'>";
if (isset($Street2)) echo "<input type='hidden' name='Street2' value='" . $Street2 . "'>";
if (isset($City)) echo "<input type='hidden' name='City' value='" . $City . "'>";
if (isset($State)) echo "<input type='hidden' name='State' value='" . $State . "'>";
if (isset($Zipcode)) echo "<input type='hidden' name='Zipcode' value='" . $Zipcode . "'>";
if (isset($retainerSent)) echo "<input type='hidden' name='retainerSent' value='" . $retainerSent . "'>";
if (isset($retainerRecieved)) echo "<input type='hidden' name='retainerRecieved' value='" . $retainerRecieved . "'>";
if (isset($interviewstarted)) echo "<input type='hidden' name='interviewstarted' value='" . $interviewstarted . "'>";
if (isset($reachedretainerdiscussion)) echo "<input type='hidden' name='reachedretainerdiscussion' value='" . $reachedretainerdiscussion . "'>";
if (isset($authformreceived)) echo "<input type='hidden' name='authformreceived' value='" . $authformreceived . "'>";
if (isset($demandcreated)) echo "<input type='hidden' name='demandcreated' value='" . $demandcreated . "'>";
if (isset($retainernote))  echo "<input type='hidden' name='retainernote' value='" . $retainernote . "'>";
if (isset($authnote)) echo "<input type='hidden' name='authnote' value='" . $authnote . "'>";
if (isset($retainerstatus)) echo "<input type='hidden' name='retainerstatus' value='" . $retainerstatus . "'>";
if (isset($authstatus)) echo "<input type='hidden' name='authstatus' value='" . $authstatus . "'>";
if (isset($retainercountersignsent)) echo "<input type='hidden' name='retainercountersignsent' value='" . $retainercountersignsent . "'>";
if (isset($completedonline)) echo "<input type='hidden' name='completedonline' value='" . $completedonline . "'>";
	echo "<br>";
	echo "<input type='submit' value='Go'></form></td>";
  echo "</td>";
  
  echo "<td>";
  	if (isset($row['notelog']))
	{
	if ($row['notelog'] == '') 
		{
		unset($row['notelog']);
		}
		else
			{
				if (isset($row['notelog']))
				{	
				echo "<font size=2>" . $row['notelog'];
				}
				else
				{
				}
			}
	}
  echo "</td>";
  
  echo "</tr>";
  echo "</table>";
  echo "<br>";  
  }
}
#echo "</table>";
  ?>