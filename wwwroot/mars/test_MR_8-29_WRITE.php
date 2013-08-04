<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>

<?PHP
require("style.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
$year = date('Y');
?>




<?php
$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");

$conn = sqlsrv_connect( $serverName, $connectionInfo );
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');

if (isset($_POST['notqualified_retained'])) 
{
	$notqualified_retainedUPDATE = $_POST['notqualified_retained'];
	if (empty($notqualified_retainedUPDATE)) unset($notqualified_retainedUPDATE);
}
if (isset($_POST['attorneyInfo'])) 
{
	$attorneyInfoUPDATE = $_POST['attorneyInfo'];
	if (empty($attorneyInfoUPDATE)) unset($attorneyInfoUPDATE);
}

if (isset($_POST['brand'])) $brand = $_POST['brand'];
if (isset($_POST['tenantid'])) $tenantid = $_POST['tenantid'];
if (isset($_REQUEST['tenantid'])) $tenantid = $_REQUEST['tenantid'];
if (empty($tenantid)) $tenantid = '4';
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_REQUEST['brandid'])) $brandid = $_REQUEST['brandid'];

if (isset($_GET['uniqueid'])) $uniqueid = $_GET['uniqueid'];
if (empty($uniqueid)) unset($uniqueid);
if (isset($_REQUEST['brand'])) $brand = $_REQUEST['brand'];

$brandname = 'Macys';

if (isset($_REQUEST['1WhoFirstName'])) $whofirstname = $_REQUEST['1WhoFirstName'];
if (isset($_REQUEST['1WhoFirstName'])) $FirstName = $_REQUEST['1WhoFirstName'];
if (isset($_POST['1WhoFirstName'])) $FirstName = $_POST['1WhoFirstName'];
if (isset($_POST['1WhoFirstName'])) $whofirstname = $_POST['1WhoFirstName'];


if (isset($_REQUEST['1WhoLastName'])) $wholastname = $_REQUEST['1WhoLastName'];
if (isset($_REQUEST['1WhoLastName'])) $LastName = $_REQUEST['1WhoLastName'];
if (isset($_POST['1WhoLastName'])) $LastName = $_POST['1WhoLastName'];
if (isset($_POST['1WhoLastName'])) $wholastname = $_POST['1WhoLastName'];

$clientname = "$FirstName" . " $LastName";

if (isset($_REQUEST['clientname'])) $clientname = $_REQUEST['clientname'];
if (isset($_POST['clientname'])) $clientname = $_POST['clientname'];

if (isset($_REQUEST['1WhoFirstName']))
{
	$whofirstname = $_REQUEST['1WhoFirstName'];
	$var = "FirstName";
	$vardata = $whofirstname;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
}
if (isset($attorneylname))
{
	$var = "agentlname";
	$vardata = $attorneylname;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
}

if (isset($_POST['1WhoLastName'])) 
{
	$wholastname = $_POST['1WhoLastName'];
	$var = "LastName";
	$vardata = $wholastname;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
}
if (isset($_POST['barcode'])) $barcode = $_POST['barcode'];
if (isset($_REQUEST['barcode'])) $barcode = $_REQUEST['barcode'];
if (empty($barcode))
{
unset($barcode);	
}
else
{

	//strip single quote
	if(strstr($barcode,'\''))
	{
	
	    $barcode = str_replace('\'','',$barcode);
	}
	
	//strip double quote
	if(strstr($barcode,'\"'))
	{
	
	    $barcode = str_replace('\"','',$barcode);
	}	
	//strip percentage
	if(strstr($barcode,'%'))
	{
	
	    $barcode = str_replace('%','',$barcode);
	}
	//strip asterisk
	if(strstr($barcode,'*'))
	{
	
	    $barcode = str_replace('*','',$barcode);
	}
	//strip underscore
	if(strstr($barcode,'_'))
	{
	
	    $barcode = str_replace('_','',$barcode);
	}
	//strip ampersand
	if(strstr($barcode,'&'))
	{
	
	    $barcode = str_replace('\'','',$barcode);
	}	
	//strip dash
	if(strstr($barcode,'-'))
	{
	
	    $barcode = str_replace('-','',$barcode);
	}
	
	//strip space
	if(strstr($barcode,' '))
	{
	
	    $barcode = str_replace(' ','',$barcode);
	}
	//strip comma
	if(strstr($barcode,','))
	{
	
	    $barcode = str_replace(',','',$barcode);
	}

	//strip period
	if(strstr($barcode,'.'))
	{
	
	    $barcode = str_replace('.','',$barcode);
	}

	//strip parenthasis open
	if(strstr($barcode,'('))
	{
	
		$barcode = preg_replace('/\(|\)/','',$barcode);
	}
	
	//strip parenthasis close
	if(strstr($barcode,')'))
	{
		$barcode = preg_replace('/\(|\)/','',$barcode); 
	}

	$var = "barcode";
	$vardata = $barcode;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['additionalInfo'])) $additionalInfo = $_POST['additionalInfo'];
#if (isset($_REQUEST['barcode'])) $barcode = $_REQUEST['barcode'];
if (empty($additionalInfo))
{
unset($additionalInfo);	
}
else
{

	//strip single quote
	if(strstr($additionalInfo,'\''))
	{
	
	    $additionalInfo = str_replace('\'','',$additionalInfo);
	}
	
	//strip double quote
	if(strstr($additionalInfo,'\"'))
	{
	
	    $additionalInfo = str_replace('\"','',$additionalInfo);
	}	
	//strip percentage
	if(strstr($additionalInfo,'%'))
	{
	
	    $additionalInfo = str_replace('%','',$additionalInfo);
	}
	//strip asterisk
	if(strstr($additionalInfo,'*'))
	{
	
	    $additionalInfo = str_replace('*','',$additionalInfo);
	}
	//strip underscore
	if(strstr($additionalInfo,'_'))
	{
	
	    $additionalInfo = str_replace('_','',$additionalInfo);
	}
	//strip ampersand
	if(strstr($additionalInfo,'&'))
	{
	
	    $additionalInfo = str_replace('\'','',$additionalInfo);
	}	
	//strip dash
	if(strstr($additionalInfo,'-'))
	{
	
	    $additionalInfo = str_replace('-','',$additionalInfo);
	}
	
	////strip space
	//if(strstr($additionalInfo,' '))
	//{
	//
	//    $additionalInfo = str_replace(' ','',$additionalInfo);
	//}
	//strip comma
	if(strstr($additionalInfo,','))
	{
	
	    $additionalInfo = str_replace(',','',$additionalInfo);
	}

	//strip period
	if(strstr($additionalInfo,'.'))
	{
	
	    $additionalInfo = str_replace('.','',$additionalInfo);
	}

	//strip parenthasis open
	if(strstr($additionalInfo,'('))
	{
	
		$additionalInfo = preg_replace('/\(|\)/','',$additionalInfo);
	}
	
	//strip parenthasis close
	if(strstr($additionalInfo,')'))
	{
		$additionalInfo = preg_replace('/\(|\)/','',$additionalInfo); 
	}

	$var = "additionalInfo";
	$vardata = $additionalInfo;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['1CallbackNum']))   $phone1 = $_POST['1CallbackNum'];
if (empty($phone1))
{
	unset($phone1);
}
else
{
	
	//strip single quote
	if(strstr($phone1,'\''))
	{
	
	    $phone1 = str_replace('\'','',$phone1);
	}
	
	//strip tab
	if(strstr($phone1,'	'))
	{
	
	    $phone1 = str_replace('	','',$phone1);
	}
		
	//strip double quote
	if(strstr($phone1,'\"'))
	{
	
	    $phone1 = str_replace('\"','',$phone1);
	}	
	//strip percentage
	if(strstr($phone1,'%'))
	{
	
	    $phone1 = str_replace('%','',$phone1);
	}
	//strip asterisk
	if(strstr($phone1,'*'))
	{
	
	    $phone1 = str_replace('*','',$phone1);
	}
	//strip underscore
	if(strstr($phone1,'_'))
	{
	
	    $phone1 = str_replace('_','',$phone1);
	}
	//strip ampersand
	if(strstr($phone1,'&'))
	{
	
	    $phone1 = str_replace('\'','',$phone1);
	}	
	//strip dash
	if(strstr($phone1,'-'))
	{
	
	    $phone1 = str_replace('-','',$phone1);
	}
	
	//strip space
	if(strstr($phone1,' '))
	{
	
	    $phone1 = str_replace(' ','',$phone1);
	}
	//strip comma
	if(strstr($phone1,','))
	{
	
	    $phone1 = str_replace(',','',$phone1);
	}

	//strip period
	if(strstr($phone1,'.'))
	{
	
	    $phone1 = str_replace('.','',$phone1);
	}
	
	
	//strip parenthasis open
	if(strstr($phone1,'('))
	{
	
		$phone1 = preg_replace('/\(|\)/','',$phone1);
	}
	
	//strip parenthasis close
	if(strstr($phone1,')'))
	{
		$phone1 = preg_replace('/\(|\)/','',$phone1); 
	}

$callbacknum = $phone1;
	$var = "phone1";
	$vardata = $callbacknum;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3SecondaryNumber'])) $phone2 = $_POST['3SecondaryNumber'];
if (empty($phone2))
{
unset($phone2);	
}
else
{
	//strip single quote
	if(strstr($phone2,'\''))
	{
	
	    $phone2 = str_replace('\'','',$phone2);
	}
	
	//strip double quote
	if(strstr($phone2,'\"'))
	{
	
	    $phone2 = str_replace('\"','',$phone2);
	}	
	//strip percentage
	if(strstr($phone2,'%'))
	{
	
	    $phone2 = str_replace('%','',$phone2);
	}
	//strip asterisk
	if(strstr($phone2,'*'))
	{
	
	    $phone2 = str_replace('*','',$phone2);
	}
	//strip underscore
	if(strstr($phone2,'_'))
	{
	
	    $phone2 = str_replace('_','',$phone2);
	}
	//strip ampersand
	if(strstr($phone2,'&'))
	{
	
	    $phone2 = str_replace('\'','',$phone2);
	}	
	//strip dash
	if(strstr($phone2,'-'))
	{
	
	    $phone2 = str_replace('-','',$phone2);
	}
	
	//strip space
	if(strstr($phone2,' '))
	{
	
	    $phone2 = str_replace(' ','',$phone2);
	}
	//strip comma
	if(strstr($phone2,','))
	{
	
	    $phone2 = str_replace(',','',$phone2);
	}

	//strip period
	if(strstr($phone2,'.'))
	{
	
	    $phone2 = str_replace('.','',$phone2);
	}

	//strip parenthasis open
	if(strstr($phone2,'('))
	{
	
		$phone2 = preg_replace('/\(|\)/','',$phone2);
	}
	
	//strip parenthasis close
	if(strstr($phone2,')'))
	{
		$phone2 = preg_replace('/\(|\)/','',$phone2); 
	}
	$secondarynumber =  $phone2;
	$var = "phone2";
	$vardata = $secondarynumber;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
	

}
if (isset($_POST['ip'])) 
{	$ip = $_POST['ip'];
	$var = "ip";
	$vardata = $ip;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3Email'])) $email = $_POST['3Email'];
if (empty($email))
{
unset($email);	
}
else
{
	//strip single quote
	if(strstr($email,'\''))
	{
	
	    $email = str_replace('\'','',$email);
	}
	
	//strip double quote
	if(strstr($email,'\"'))
	{
	
	    $email = str_replace('\"','',$email);
	}	
	//strip percentage
	if(strstr($email,'%'))
	{
	
	    $email = str_replace('%','',$email);
	}
	//strip asterisk
	if(strstr($email,'*'))
	{
	
	    $email = str_replace('*','',$email);
	}
	////strip underscore
	//if(strstr($email,'_'))
	//{
	//
	//    $email = str_replace('_','',$email);
	//}
	//strip ampersand
	if(strstr($email,'&'))
	{
	
	    $email = str_replace('\'','',$email);
	}	
	//strip dash
	if(strstr($email,'-'))
	{
	
	    $email = str_replace('-','',$email);
	}
	
	//strip space
	if(strstr($email,' '))
	{
	
	    $email = str_replace(' ','',$email);
	}
	//strip comma
	if(strstr($email,','))
	{
	
	    $email = str_replace(',','',$email);
	}

	//strip period
	//if(strstr($email,'.'))
	//{
	//
	//    $email = str_replace('.','',$email);
	//}

	//strip parenthasis open
	if(strstr($email,'('))
	{
	
		$email = preg_replace('/\(|\)/','',$email);
	}
	
	//strip parenthasis close
	if(strstr($email,')'))
	{
		$email = preg_replace('/\(|\)/','',$email); 
	}

	$var = "email";
	$vardata = $email;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3StreetLine1']))   $Street1 = $_POST['3StreetLine1'];
if (empty($Street1))
{
unset($Street1);	
}
else
{
	
	$usethis = $Street1;
	//strip single quote
	if(strstr($Street1,'\''))
	{
	
	    $Street1 = str_replace('\'','',$Street1);
	}
	
	//strip double quote
	if(strstr($Street1,'\"'))
	{
	
	    $Street1 = str_replace('\"','',$Street1);
	}	
	//strip percentage
	if(strstr($Street1,'%'))
	{
	
	    $Street1 = str_replace('%','',$Street1);
	}
	//strip asterisk
	if(strstr($Street1,'*'))
	{
	
	    $Street1 = str_replace('*','',$Street1);
	}
	//strip underscore
	if(strstr($Street1,'_'))
	{
	
	    $Street1 = str_replace('_','',$Street1);
	}
	//strip ampersand
	if(strstr($Street1,'&'))
	{
	
	    $Street1 = str_replace('\'','',$Street1);
	}	
	//strip dash
	if(strstr($Street1,'-'))
	{
	
	    $Street1 = str_replace('-','',$Street1);
	}
	
	//strip space
	//if(strstr($Street1,' '))
	//{
	//
	//    $Street1 = str_replace(' ','',$Street1);
	//}
	////strip comma
	//if(strstr($Street1,','))
	//{
	//
	//    $Street1 = str_replace(',','',$Street1);
	//}

	//strip period
	if(strstr($Street1,'.'))
	{
	
	    $Street1 = str_replace('.','',$Street1);
	}

	//strip parenthasis open
	if(strstr($Street1,'('))
	{
	
		$Street1 = preg_replace('/\(|\)/','',$Street1);
	}
	
	//strip parenthasis close
	if(strstr($Street1,')'))
	{
		$Street1 = preg_replace('/\(|\)/','',$Street1); 
	}

    
	$streetline1 = $Street1;
	$var = "Street1";
	$vardata = $streetline1;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3StreetLine2']))  $Street2 = $_POST['3StreetLine2'];
if (empty($Street2))
{
unset($Street2);	
}
else
{
	

	//strip single quote
	if(strstr($Street2,'\''))
	{
	
	    $Street2 = str_replace('\'','',$Street2);
	}
	
	//strip double quote
	if(strstr($Street2,'\"'))
	{
	
	    $Street2 = str_replace('\"','',$Street2);
	}	
	//strip percentage
	if(strstr($Street2,'%'))
	{
	
	    $Street2 = str_replace('%','',$Street2);
	}
	//strip asterisk
	if(strstr($Street2,'*'))
	{
	
	    $Street2 = str_replace('*','',$Street2);
	}
	//strip underscore
	if(strstr($Street2,'_'))
	{
	
	    $Street2 = str_replace('_','',$Street2);
	}
	//strip ampersand
	if(strstr($Street2,'&'))
	{
	
	    $Street2 = str_replace('\'','',$Street2);
	}	
	//strip dash
	if(strstr($Street2,'-'))
	{
	
	    $Street2 = str_replace('-','',$Street2);
	}
	
	//strip space
	if(strstr($Street2,' '))
	{
	
	    $Street2 = str_replace(' ','',$Street2);
	}
	//strip comma
	if(strstr($Street2,','))
	{
	
	    $Street2 = str_replace(',','',$Street2);
	}

	//strip period
	if(strstr($Street2,'.'))
	{
	
	    $Street2 = str_replace('.','',$Street2);
	}

	//strip parenthasis open
	if(strstr($Street2,'('))
	{
	
		$Street2 = preg_replace('/\(|\)/','',$Street2);
	}
	
	//strip parenthasis close
	if(strstr($Street2,')'))
	{
		$Street2 = preg_replace('/\(|\)/','',$Street2); 
	}

	$streetline2 = $Street2;
	$var = "Street2";
	$vardata = $streetline2;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3HomeCity'])) $City = $_POST['3HomeCity'];
if (empty($City))
{
unset($City);	
}
else
{
	//strip single quote
	if(strstr($City,'\''))
	{
	
	    $City = str_replace('\'','',$City);
	}
	
	//strip double quote
	if(strstr($City,'\"'))
	{
	
	    $City = str_replace('\"','',$City);
	}	
	//strip percentage
	if(strstr($City,'%'))
	{
	
	    $City = str_replace('%','',$City);
	}
	//strip asterisk
	if(strstr($City,'*'))
	{
	
	    $City = str_replace('*','',$City);
	}
	//strip underscore
	if(strstr($City,'_'))
	{
	
	    $City = str_replace('_','',$City);
	}
	//strip ampersand
	if(strstr($City,'&'))
	{
	
	    $City = str_replace('\'','',$City);
	}	
	//strip dash
	if(strstr($City,'-'))
	{
	
	    $City = str_replace('-','',$City);
	}
	
	//strip space
	//if(strstr($City,' '))
	//{
	//
	//    $City = str_replace(' ','',$City);
	//}
	//strip comma
	if(strstr($City,','))
	{
	
	    $City = str_replace(',','',$City);
	}

	//strip period
	if(strstr($City,'.'))
	{
	
	    $City = str_replace('.','',$City);
	}

	//strip parenthasis open
	if(strstr($City,'('))
	{
	
		$City = preg_replace('/\(|\)/','',$City);
	}
	
	//strip parenthasis close
	if(strstr($City,')'))
	{
		$City = preg_replace('/\(|\)/','',$City); 
	}
 
	$homecity = $City;
	$var = "City";
	$vardata = $homecity;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3HomeState']))  $State = $_POST['3HomeState'];
if (empty($State))
{
unset($State);	
}
else
{
	//strip single quote
	if(strstr($State,'\''))
	{
	
	    $State = str_replace('\'','',$State);
	}
	
	//strip double quote
	if(strstr($State,'\"'))
	{
	
	    $State = str_replace('\"','',$State);
	}	
	//strip percentage
	if(strstr($State,'%'))
	{
	
	    $State = str_replace('%','',$State);
	}
	//strip asterisk
	if(strstr($State,'*'))
	{
	
	    $State = str_replace('*','',$State);
	}
	//strip underscore
	if(strstr($State,'_'))
	{
	
	    $State = str_replace('_','',$State);
	}
	//strip ampersand
	if(strstr($State,'&'))
	{
	
	    $State = str_replace('\'','',$State);
	}	
	//strip dash
	if(strstr($State,'-'))
	{
	
	    $State = str_replace('-','',$State);
	}
	
	//strip space
	if(strstr($State,' '))
	{
	
	    $State = str_replace(' ','',$State);
	}
	//strip comma
	if(strstr($State,','))
	{
	
	    $State = str_replace(',','',$State);
	}

	//strip period
	if(strstr($State,'.'))
	{
	
	    $State = str_replace('.','',$State);
	}

	//strip parenthasis open
	if(strstr($State,'('))
	{
	
		$State = preg_replace('/\(|\)/','',$State);
	}
	
	//strip parenthasis close
	if(strstr($State,')'))
	{
		$State = preg_replace('/\(|\)/','',$State); 
	}

	$homestate = $State;
	$var = "State";
	$vardata = $homestate;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['3Zipcode'])) $Zipcode = $_POST['3Zipcode'];
if (empty($Zipcode))
{
	unset($Zipcode);
}
else
{
	//strip single quote
	if(strstr($Zipcode,'\''))
	{
	
	    $Zipcode = str_replace('\'','',$Zipcode);
	}
	
	//strip double quote
	if(strstr($Zipcode,'\"'))
	{
	
	    $Zipcode = str_replace('\"','',$Zipcode);
	}	
	//strip percentage
	if(strstr($Zipcode,'%'))
	{
	
	    $Zipcode = str_replace('%','',$Zipcode);
	}
	//strip asterisk
	if(strstr($Zipcode,'*'))
	{
	
	    $Zipcode = str_replace('*','',$Zipcode);
	}
	//strip underscore
	if(strstr($Zipcode,'_'))
	{
	
	    $Zipcode = str_replace('_','',$Zipcode);
	}
	//strip ampersand
	if(strstr($Zipcode,'&'))
	{
	
	    $Zipcode = str_replace('\'','',$Zipcode);
	}	
	////strip dash
	//if(strstr($Zipcode,'-'))
	//{
	//
	//    $Zipcode = str_replace('-','',$Zipcode);
	//}
	
	//strip space
	if(strstr($Zipcode,' '))
	{
	
	    $Zipcode = str_replace(' ','',$Zipcode);
	}
	//strip comma
	if(strstr($Zipcode,','))
	{
	
	    $Zipcode = str_replace(',','',$Zipcode);
	}

	//strip period
	if(strstr($Zipcode,'.'))
	{
	
	    $Zipcode = str_replace('.','',$Zipcode);
	}

	//strip parenthasis open
	if(strstr($Zipcode,'('))
	{
	
		$Zipcode = preg_replace('/\(|\)/','',$Zipcode);
	}
	
	//strip parenthasis close
	if(strstr($Zipcode,')'))
	{
		$Zipcode = preg_replace('/\(|\)/','',$Zipcode); 
	}
 
	$zipcode = $Zipcode;
	$var = "Zipcode";
	$vardata = $zipcode;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}

if (isset($_POST['dateofbirth']))
{
	$Birthday = $_POST['dateofbirth'];
	$var = "dateofbirth";
	$vardata = $Birthday;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);
			

}

if (isset($_POST['didyouworkatmacysretail'])) 
{	$didyouworkatmacysretail = $_POST['didyouworkatmacysretail'];
	$var = "didyouworkatmacysretail";
	$vardata = $didyouworkatmacysretail;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['areyoucurrentmacysemployee'])) 
{	$areyoucurrentmacysemployee = $_POST['areyoucurrentmacysemployee'];
	$var = "areyoucurrentmacysemployee";
	$vardata = $areyoucurrentmacysemployee;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);
			

}


if (isset($_POST['formerlastdaymonth']))
{	
	$var = "formerlastdaymonth";
	$vardata = $_POST['formerlastdaymonth'];
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
}

if (isset($_POST['formerlastdayyear']))
{	
	$var = "formerlastdayyear";
	$vardata = $_POST['formerlastdayyear'];
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
}

if (isset($_POST['shortcheck1'])) 
{	$shortcheck1 = $_POST['shortcheck1'];
	$var = "shortcheck1";
	$vardata = $shortcheck1;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);
			

}
else
{
	$var = "shortcheck1";
	$vardata = '';
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);	
}

if (isset($_POST['shortcheck2'])) 
{	$shortcheck2 = $_POST['shortcheck2'];
	$var = "shortcheck2";
	$vardata = $shortcheck2;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}
else
{
	$var = "shortcheck2";
	$vardata = '';
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);	
}

if (isset($_POST['shortcheck3'])) 
{	$shortcheck3 = $_POST['shortcheck3'];
	$var = "shortcheck3";
	$vardata = $shortcheck3;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}
else
{
	$var = "shortcheck3";
	$vardata = '';
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);	
}

if (isset($_POST['shortcheck4'])) 
{	$shortcheck4 = $_POST['shortcheck4'];
	$var = "shortcheck4";
	$vardata = $shortcheck4;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}
else
{
	$var = "shortcheck4";
	$vardata = '';
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);	
}

if (isset($_POST['shortcheck5'])) 
{	$shortcheck5 = $_POST['shortcheck5'];
	$var = "shortcheck5";
	$vardata = $shortcheck5;
$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}
else
{
	$var = "shortcheck5";
	$vardata = '';
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);	
}

if (isset($_POST['shortcheck6'])) 
{	$shortcheck6 = $_POST['shortcheck6'];
	$var = "shortcheck6";
	$vardata = $shortcheck6;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}
else
{
	$var = "shortcheck6";
	$vardata = '';
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);	
}

if (isset($_POST['shortcheck7'])) 
{	$shortcheck7 = $_POST['shortcheck7'];
	$var = "shortcheck7";
	$vardata = $shortcheck7;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}
else
{
	$var = "shortcheck7";
	$vardata = '';
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);	
}

if (isset($_POST['shortcheck8'])) 
{	$shortcheck8 = $_POST['shortcheck8'];
	$var = "shortcheck8";
	$vardata = $shortcheck8;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}
else
{
	$var = "shortcheck8";
	$vardata = '';
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);	
}

if (isset($_POST['shortcheck9'])) 
{	$shortcheck9 = $_POST['shortcheck9'];
	$var = "shortcheck9";
	$vardata = $shortcheck9;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}
else
{
	$var = "shortcheck9";
	$vardata = '';
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);	
}

if (isset($_POST['shortcheck10'])) 
{	$shortcheck10 = $_POST['shortcheck10'];
	$var = "shortcheck10";
	$vardata = $shortcheck10;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}
else
{
	$var = "shortcheck10";
	$vardata = '';
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);	
}

if (isset($_POST['shortanythingelse'])) $shortanythingelse = $_POST['shortanythingelse'];
if (empty($shortanythingelse))
{
	unset($shortanythingelse);
}
else
{
	//strip single quote
	if(strstr($shortanythingelse,'\''))
	{
	
	    $shortanythingelse = str_replace('\'','',$shortanythingelse);
	}
	
	//strip double quote
	if(strstr($shortanythingelse,'\"'))
	{
	
	    $shortanythingelse = str_replace('\"','',$shortanythingelse);
	}	
	//strip percentage
	if(strstr($shortanythingelse,'%'))
	{
	
	    $shortanythingelse = str_replace('%','',$shortanythingelse);
	}
	//strip asterisk
	if(strstr($shortanythingelse,'*'))
	{
	
	    $shortanythingelse = str_replace('*','',$shortanythingelse);
	}


	if(strstr($shortanythingelse,'&'))
	{
	
	    $shortanythingelse = str_replace('\'','',$shortanythingelse);
	}	
	//strip dash
	if(strstr($shortanythingelse,'-'))
	{
	
	    $shortanythingelse = str_replace('-','',$shortanythingelse);
	}

	if(strstr($shortanythingelse,','))
	{
	
	    $shortanythingelse = str_replace(',','',$shortanythingelse);
	}

	//strip period
	if(strstr($shortanythingelse,'.'))
	{
	
	    $shortanythingelse = str_replace('.','',$shortanythingelse);
	}

	//strip parenthasis open
	if(strstr($shortanythingelse,'('))
	{
	
		$shortanythingelse = preg_replace('/\(|\)/','',$shortanythingelse);
	}
	
	//strip parenthasis close
	if(strstr($shortanythingelse,')'))
	{
		$shortanythingelse = preg_replace('/\(|\)/','',$shortanythingelse); 
	}
 
	$shortanythingelse = $_POST['shortanythingelse'];
	$var = "shortanythingelse";
	$vardata = $shortanythingelse;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			

}



if (isset($_POST['15DocumentList'])) $documentlist = $_POST['15DocumentList'];




 

if(strstr($brand,'\'')){

    $brand = str_replace('\'','\'\'',$brand);

} 
?>
<?PHP 
if (isset($uniqueid))
	{	
	
		$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$uniqueid') UPDATE status set completedonline='Yes',onlinecompleteday='$date',onlinecompleteweek='$week',onlinecompletemonth='$month',onlinecompletetime='$time',FirstName='$whofirstname',LastName='$wholastname',Street1='$streetline1',Street2='$streetline2',City='$homecity',State='$homestate',Zipcode='$zipcode',interviewstarted='Yes',reachedretainerdiscussion='Yes',interviewstartmonthyear='$month',interviewstartday='$date', shortFormCompletePhone='Yes',shortFormCompletePhoneDate='$date',shortFormCompletePhoneWeek='$week',shortFormCompletePhoneMonth='$month',additionalInfo='$additionalInfo' WHERE status.uniqueid='$uniqueid' ;";
		$results = sqlsrv_query($conn,$query);
			
if (isset($_POST['Fax']))
{	
	$var = "fax";
	$vardata = $_POST['Fax'];
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
}


if (isset($_POST['firmCity']))
{	
	$var = "firmCity ";
	$vardata = $_POST['firmCity'];
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
}

if (isset($_POST['firmName']))
{	
	$var = "firmName";
	$vardata = $_POST['firmName'];
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
}

if (isset($_POST['firmPhone']))
{	
	$var = "firmPhone";
	$vardata = $_POST['firmPhone'];
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
}

if (isset($_POST['attName']))
{	
	$var = "attName";
	$vardata = $_POST['attName'];
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
}
		
	
#}

if (isset($notqualified_retainedUPDATE))
{
	if ($notqualified_retainedUPDATE == 'No')
	{
		$query = "SELECT notqualifiedreason FROM Status WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
		while($row = sqlsrv_fetch_array($results))
		{
			$notqualifiedreason = $row['notqualifiedreason'];
		}
		if ($notqualifiedreason == 'Already represented')
		{
			updaterow('notqualifiedreason','',$uniqueid,$conn);
			updaterow('donotcontact','',$uniqueid,$conn);
			updaterow('notqualified','',$uniqueid,$conn);
##don't log the event without this require :o			
			require("uniqueid_row.php");
			logthisevent('Represented by another Attorney information Set to No.',$conn,$notelog,$uniqueid);
		}
		updaterow('attorneyInfo','',$uniqueid,$conn);
		updaterow('notqualified_retained','No',$uniqueid,$conn);
		
	}
	else
	{
		if ($notqualified_retainedUPDATE == 'Yes')
		{
			updaterow('notqualifiedreason','Already represented',$uniqueid,$conn);
			updaterow('donotcontact','Yes',$uniqueid,$conn);
			updaterow('notqualified',$notqualified_retained,$uniqueid,$conn);
			updaterow('notqualified_retained','Yes',$uniqueid,$conn);
			require("uniqueid_row.php");
			logthisevent('Retained by another Attorney information Set to Yes:'.$attorneyInfoUPDATE,$conn,$notelog,$uniqueid);
		}
		if ($notqualified_retainedUPDATE == 'Clear')
		{
			updaterow('notqualified_retained','',$uniqueid,$conn);
			updaterow('attorneyInfo','',$uniqueid,$conn);
			require("uniqueid_row.php");
			logthisevent('Represented by another Attorney information Cleared',$conn,$notelog,$uniqueid);
		}
	}
}
}
?>

<?php

if(isset($_POST['wantstoshare1']))
{
    $wantstoshare = $_POST['wantstoshare1'];
}
if (isset($_POST['wantstoshare1']))
{
	echo '<body>';
		echo "<iframe scrolling='auto' width='100%' height='";
		echo "3000px";
		echo "' frameborder='0' style='margin:auto;' src='";
		echo "client3.php";
		echo "?uniqueid=";
		echo $uniqueid;
		echo "'></iframe>";
    echo '</body>';
    echo '</html>';
    
	if ($wantstoshare == 'No')
	{
		$query = "UPDATE status set notqualifiedreason='Never worked at Macys',donotcontact='Yes',didnotworkatmacys='Yes',wantstoshare='No',notqualified='Yes',agreetocontactaboutexperience='No' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
		$query = "select notelog from status where uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
			while($row = sqlsrv_fetch_array($results))
			{
				$notelog = $row['notelog'];
			}
		$notelognew = $date.' @ '.$time.' : <strong>Did not work at Macys and does not want to discuss other companies.</strong><br>'.$notelog;
		$query = "update Status set notelog='$notelognew' where uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
	}
}

if (isset($_POST['wantstoshare']))
{
	if ($_POST['wantstoshare'] == 'Yes')
	{
		$query = "UPDATE status set notqualifiedreason='Never worked at Macys',didnotworkatmacys='Yes',wantstoshare='Yes',notqualified='Yes',agreetocontactaboutexperience='Yes' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
		$query = "select notelog from status where uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
			while($row = sqlsrv_fetch_array($results))
			{
				$notelog = $row['notelog'];
			}
		$notelognew = $date.' @ '.$time.' : <strong>Did not work at Macys but has potential claims and wants to discuss them.</strong><br>'.$notelog;
		$query = "update Status set notelog='$notelognew' where uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);      
	}
}
#else
#{
	    $query = "select notelog from status where uniqueid='$uniqueid'";
	    $results = sqlsrv_query($conn,$query);
	    while($row = sqlsrv_fetch_array($results))
	    {
		    $notelog = $row['notelog'];
	    }
	    $notelognew = $date.' @ '.$time.' : <strong>Short form complete on phone.</strong><br>'.$notelog;
	

	$query = "update Status set notelog='$notelognew' where uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);  
#echo $uniqueid."";
echo "<iframe scrolling='auto' width='100%' height='";
echo "3000px";
echo "' frameborder='0' style='margin:auto;' src='";
echo "test_MR_8-29-2012.php";
echo "?uniqueid=";
echo $uniqueid;
echo "'></iframe>";
#echo "<br>Hello";
#}
require("writePdfShortForm.php");
?>
</div>
<script type="text/javascript">
window.close();
</script>
    </body>
</html>


