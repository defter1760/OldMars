<?PHP
#require("style.php");//docutype, css
require("header.php");
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
#require("functions.php");//functions
require("uniqueid_row.php");
if (isset($_POST['uniqueid'])) $uniqueid = $_POST['uniqueid'];
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
if (empty($uniqueid)) unset($uniqueid);


//$shouldberef = "http://sqlsrv.domain.initiativelegal.com/mars/index.php?uniqueid=".$uniqueid;
//$secondberef = "http://sqlsrv.domain.initiativelegal.com/mars/client2.php?uniqueid=".$uniqueid;
//$thirdberef = "http://sqlsrv.domain.initiativelegal.com/mars/search.php";//?uniqueid=".$uniqueid;
//if ($_SERVER['HTTP_REFERER'] !== $shouldberef)
//{
//	if ($_SERVER['HTTP_REFERER'] !== $secondberef)
//	{
//		if ($_SERVER['HTTP_REFERER'] !== $thirdberef)
//		{
//			echo $_SERVER['HTTP_REFERER']."<br>You're not supposed to be here...";
//		}
//		else
//		{
//		require("style.php");//docutype, css
//		require("db.php");//database connection information
//		require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
//		require("functions.php");//functions
//		require("uniqueid_row.php");
//		if (isset($_REQUEST['mycolor'])) $mycolor = $_REQUEST['mycolor'];
//		if (empty($mycolor)) $mycolor = 'DADADA';
//		}
//	}
//}
//else
//{
echo "<div align=center>";
echo "<h1><br>Client Profile<br>";
echo $FirstName." ".$LastName."<h1><br></div>";
if (isset($_REQUEST['mycolor'])) $mycolor = $_REQUEST['mycolor'];
if (empty($mycolor)) $mycolor = 'FFFFFF';
//}
?>

<link rel="stylesheet" href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/marsParent.css" type="text/css" />


<!--<div align='center'><img src='/mars/test/img/MARS_Search_65_percent.png'></div>-->
<form action="client2.php">
<!--<input type="text" name="mycolor" min="6" size="6" max="6" -->

<!--pattern="[A-Za-z0-9]{6}" title="Siz character color code"/>-->
<?PHP
echo "<input type='hidden' name='uniqueid' value='".$uniqueid."'/>";

?>
<div id='main' class="client2">
<?PHP
	//echo "<br><br>";
$query = "select COUNT(*) as COUNT from Status  where uniqueid='$uniqueid';";
#$query = "if exists (select uniqueid from Status where uniqueid='$uniqueid') print 'Yes' ELSE print 'No' ;";
$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$existence = $row['COUNT'];
	}  
if ($existence > '0')
{
#bgcolor($mycolor);
echo "";
if (isset($addressisundeliverable))
{
if ($addressisundeliverable == 'Yes')
{
	echo "<br><br>";
	echo "<br><br>";
	echo "ADDRESS IS UNDELIVERABLE";
	echo "<br><br>";
	echo "<br><br>";
}
}
echo "<table cellspacing='0' width='100%' cellpadding='0' style='border: 1px solid #999;'>";

//wrap entire page with conditional: only show if Uniqueid specified
if (isset($uniqueid))
{
//paint contact.php	
#echo "Contact.php:<br>";
echo "<tr>";
echo "<td>";
echo '<input class="refreshBtn" type="Submit" value="REFRESH"/>';
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
	iframemake('contact.php',$uniqueid,'330px','contact','0');
//paint retainer_send.php
#echo "retainer_send.php:<br>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
#echo '<input type="Submit" style="height: 2em; width: 100%; font-size:11px; border:thick; background-color:#EBEBEB" value="REFRESH"/>';
echo '<input class="refreshBtn" type="Submit" value="REFRESH"/>';
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
if (!isset($donotcontact))
{
if (isset($retaineraccept))
{
	iframemake('send_retainer.php',$uniqueid,'65px','retainersend','0');
}
else
{
	iframemake('send_retainer.php',$uniqueid,'65px','retainersend','0');
}
	//paint retainer_get.php
echo "</td>";
echo "</tr>";
}

if (!isset($donotcontact))
{
if (isset($retainertomailroom))
{
		if ($retainertomailroom == 'Yes')
	{
	echo "<tr>";
	echo "<td>";
	iframemake('mailroom_confirm_retainer.php',$uniqueid,'65px','retainerconfirm','0');
	echo "</td>";
	echo "</tr>";
	}
}
}
if (!isset($donotcontact))
{
if (isset($retainerSent))
{

#echo "retainer_get.php:<br>";

if (isset($retainerRecieved))
{
echo "<tr>";
echo "<td>";
	iframemake('receive_retainer.php',$uniqueid,'85px','retainerget','0');
echo "</td>";
echo "</tr>";
}
else
{
echo "<tr>";
echo "<td>";	
	iframemake('receive_retainer.php',$uniqueid,'365px','retainerget','0');
echo "</td>";
echo "</tr>";
}


}
}
if (!isset($donotcontact))
{
if (isset($retainerSent))
{

#echo "retainer_review.php:<br>";

if (isset($retaineraccept))
{
echo "<tr>";
echo "<td>";	
	iframemake('review_retainer.php',$uniqueid,'65px','retainerreview','0');
echo "</td>";
echo "</tr>";
}
else
{
echo "<tr>";
echo "<td>";	
	iframemake('review_retainer.php',$uniqueid,'65px','retainerreview','0');
echo "</td>";
echo "</tr>";
}


}
}
if (!isset($donotcontact))
{
if (isset($retainerSent))
{
if (isset($retaineraccept))
{	
echo "<tr>";
echo "<td>";
	iframemake('long_form_open.php',$uniqueid,'55px','longformopen','0');
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
#echo '<input type="Submit" style="height: 2em; width: 100%; font-size:11px; border:thick; background-color:#EBEBEB" value="REFRESH"/>';
echo '<input class="refreshBtn" type="Submit" value="REFRESH"/>';
echo "</td>";
echo "</tr>";
}
}
}
if (!isset($donotcontact))
{
if (isset($retaineraccept))
{

if (isset($authaccept))
{
echo "<tr>";
echo "<td>";
	iframemake('send_auth.php',$uniqueid,'85px','authsend','0');
echo "</td>";
echo "</tr>";
}
else
{
echo "<tr>";
echo "<td>";
	iframemake('send_auth.php',$uniqueid,'85px','authsend','0');
echo "</td>";
echo "</tr>";
}

}
}

if (!isset($donotcontact))
{
if (isset($authtomailroom))
{
	if ($authtomailroom == 'Yes')
	{
	echo "<tr>";
	echo "<td>";
	iframemake('mailroom_confirm_auth.php',$uniqueid,'65px','authconfirm','0');
	echo "</td>";
	echo "</tr>";
	}
}
}
if (!isset($donotcontact))
{

if (isset($authformreceived))
{
echo "<tr>";
echo "<td>";
	iframemake('receive_auth.php',$uniqueid,'65px','authget','0');
echo "</td>";
echo "</tr>";
}
else
{
echo "<tr>";
echo "<td>";	
	iframemake('receive_auth.php',$uniqueid,'65px','authget','0');
echo "</td>";
echo "</tr>";
}
}


#echo "auth_review.php:<br>";
if (!isset($donotcontact))
{
if (isset($authaccept))
{
echo "<tr>";
echo "<td>";	
	iframemake('review_auth.php',$uniqueid,'65px','authreview','0');
echo "</td>";
echo "</tr>";
}
else
{
echo "<tr>";
echo "<td>";	
	iframemake('review_auth.php',$uniqueid,'65px','authreview','0');
echo "</td>";
echo "</tr>";
}

echo "<tr>";
echo "<td>";
#echo '<input type="Submit" style="height: 2em; width: 100%; font-size:11px; border:thick; background-color:#EBEBEB" value="REFRESH"/>';
echo '<input class="refreshBtn" type="Submit" value="REFRESH"/>';
echo "</td>";
echo "</tr>";
}
}
if (!isset($donotcontact))
{
if (isset($retaineraccept))
{

#echo "fee_waiver_send.php:<br>";
if (isset($feewaiveraccept))
{
echo "<tr>";
echo "<td>";
	iframemake('send_fee_waiver.php',$uniqueid,'65px','feewaiversend','0');	
echo "</td>";
echo "</tr>";
}
else
{
echo "<tr>";
echo "<td>";
	iframemake('send_fee_waiver.php',$uniqueid,'65px','feewaiversend','0');	
echo "</td>";
echo "</tr>";
}
}
}

if (!isset($donotcontact))
{
if (isset($feewaivertomailroom))
{
	if ($feewaivertomailroom == 'Yes')
	{
	echo "<tr>";
	echo "<td>";
	iframemake('mailroom_confirm_feewaiver.php',$uniqueid,'65px','feewaiverconfirm','0');
	echo "</td>";
	echo "</tr>";
	}
}
}

#echo "fee_waiver_get.php:<br>";
if (!isset($donotcontact))
{
if (isset($feewaiveraccept))
{
echo "<tr>";
echo "<td>";	
	iframemake('receive_fee_waiver.php',$uniqueid,'65px','feewaiverget','0');				
echo "</td>";
echo "</tr>";
}
else
{
echo "<tr>";
echo "<td>";	
	iframemake('receive_fee_waiver.php',$uniqueid,'65px','feewaiverget','0');
echo "</td>";
echo "</tr>";
}
}


#echo "fee_waiver_review.php:<br>";
if (!isset($donotcontact))
{
if (isset($feewaiveraccept))
{
echo "<tr>";
echo "<td>";
	iframemake('review_fee_waiver.php',$uniqueid,'65px','feewaiverreview','0');				
echo "</td>";
echo "</tr>";
}
else
{
echo "<tr>";
echo "<td>";	
	iframemake('review_fee_waiver.php',$uniqueid,'65px','feewaiverreview','0');	
echo "</td>";
echo "</tr>";
}
}


echo "<tr>";
echo "<td>";
	iframemake('additional_docs.php',$uniqueid,'700px','additionaldocs','0');				
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
	iframemake('note_journal.php',$uniqueid,'200px','notejournal','0');				
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
	iframemake('note_add.php',$uniqueid,'130px','notejournal','0');				
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
#echo '<input type="Submit" style="height: 2em; width: 100%; font-size:18px; border:thick; background-color:#EBEBEB" value="REFRESH"/>';
echo '<input class="refreshBtn" type="Submit" value="REFRESH"/>';
echo "</td>";
echo "</tr>";

//else//what to do if the uniqueid is not set
//{
//echo "<tr>";
//echo "<td>";
//	echo "There is no Uniqueid set -- did you do something wrong?";
//echo "</tr>";
//echo "</td>";
//
//}
echo "</table>";
echo "</div>";
}
else
{
echo "The uniqueid specified does not exist.";	
}
?>

