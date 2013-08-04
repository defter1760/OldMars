<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
    .form-label{
        width:150px !important;
    }
    .form-label-left{
        width:150px !important;
    }
    .form-line{
        padding:10px;
    }
    .form-label-right{
        width:150px !important;
    }
    .form-all{
        width:800px;
        color:#000000 !important;
        font-family:Verdana;
        font-size:12px;
    }
	.HeaderRed {
	color: #900;
}

/*this centers the whole document :)*/
div#main {

  width: 800px;

  margin-left: auto;

  margin-right: auto;

  text-align: left;

}
.requiredRed {
	color: #900;
}
.whatsthis {
	color: #00F;
	size:1px;
}
</style>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>

<style>

#main{
	font-family: 'Open Sans', sans-serif;
	color:#424242;
}

a {
	color:#9f111b;
	font-weight:bold;
	text-decoration:none;
}
</style>
<?php

##require_once("/securimage/securimage.php");
##$securimage = new Securimage();

##if ($securimage->check($_POST['captcha_code']) == false) {
  // the code was incorrect
  // you should handle the error so that the form processor doesn't continue
  // or you can use the following code if there is no validation or you do not know how
##echo "The security code ".$_POST['captcha_code']." entered was incorrect.<br /><br />";
  #echo "Please go <a href='javascript:history.go(-1)'>back</a> and try again.";
##echo "Please go <FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'></FORM> and try again.";
  
##exit;

##}


/*  require_once('recaptchalib.php');
  $privatekey = "6LeVHs4SAAAAAByblbL0zRz0b70JPwooyi-G-fxx";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("<FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'></FORM><BR>The reCAPTCHA wasn't entered correctly. Go back and try it again." ."<br>" .
         "(reCAPTCHA said: " . $resp->error . ")");
		 
  } else {
    // Your code here to handle a successful verification
  }*/
  ?>
<?PHP

 

$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");

$conn = sqlsrv_connect( $serverName, $connectionInfo );
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');

#$brand = $_REQUEST['brand'];
#$tenantid = $_REQUEST['tenantid'];
#$brandid = $_REQUEST['brandid'];
#$caseid = $_REQUEST['caseid'];
#$data = $_REQUEST['var'];

//set something to bob to test
//REQUIRED START
if (isset($_POST['brand'])) $brand = $_POST['brand'];
if (isset($_POST['tenantid'])) $tenantid = $_POST['tenantid'];
if (isset($_REQUEST['tenantid'])) $tenantid = $_REQUEST['tenantid'];
if (empty($tenantid)) $tenantid = '4';
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (isset($_REQUEST['brandid'])) $brandid = $_REQUEST['brandid'];

//if (isset($_POST['barcode'])) $uniqueid = $_POST['uniqueid'];
//if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
//if (empty($uniqueid)) unset($uniqueid);
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

//if (isset($_REQUEST['1WhoFirstName']))
//{
////    if (isset($uniqueid))
////    {
////	$query = "IF NOT EXISTS(SELECT * FROM data WHERE  uniqueid='$uniqueid' AND tenantid='$tenantid' ) INSERT INTO data (uniqueid,brandid,tenantid,date,time,brand) VALUES ('$uniqueid','$brandid','$tenantid','$date','$time','$brand')";
////	$results = sqlsrv_query($conn,$query);
////    }
//}
if (isset($_REQUEST['1WhoFirstName']))
{
    if (!isset($uniqueid)) 
    {
	
	/*
	|-----------------
	| Chip Download Class
	|------------------
	*/
 
	require_once("class.chip_password_generator.php");
 
	/*
	|-----------------
	| Class Instance
	|------------------
	*/
 
	$args = array(
	    'length'                =>   18,
	    'alpha_upper_include'   =>   TRUE,
	    'alpha_lower_include'   =>   FALSE,
	    'number_include'        =>   TRUE,
	    'symbol_include'        =>   FALSE,
	    );
	$object = new chip_password_generator( $args );
	 
	/*
	|-----------------
	| Generate Password
	|------------------
	*/
	 
	$password = $object->get_password();
 
	#echo $password;
	
	$uniqueid = $password;
	if (isset($uniqueid))
	{	
		$query = "IF NOT EXISTS(SELECT * FROM data WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' ) INSERT INTO data (uniqueid,brandid,tenantid,date,time,brand) VALUES ('$uniqueid','$brandid','$tenantid','$date','$time','$brand')";
		$results = sqlsrv_query($conn,$query);
	}
    }
}
//REQUIRED DONE
//allow first name via request to test
		#	$query = "IF EXISTS (SELECT * from status WHERE data.uniqueid='$uniqueid' AND data.tenantid='4') UPDATE status set retainernote='$retainernote',retainerRecievedDate='$date',retainerRecievedWeek='$week',retainerRecieved='$retainerRecieved',retainerRecievedMonth='$month' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4'";
		#	$results = sqlsrv_query($conn,$query);

#if (isset($_POST['1WhoFirstName'])) 
if (isset($_REQUEST['1WhoFirstName']))
{
	#$whofirstname = $_POST['1WhoFirstName'];
	$whofirstname = $_REQUEST['1WhoFirstName'];
	$var = "1WhoFirstName";
	$vardata = $whofirstname;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			
}
if (isset($attorneylname))
{
	#$whofirstname = $_POST['1WhoFirstName'];
	#$attorneylname = $_REQUEST['1WhoFirstName'];
	$var = "agentlname";
	$vardata = $attorneylname;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			
}

if (isset($_POST['1WhoLastName'])) 
{
	$wholastname = $_POST['1WhoLastName'];
	$var = "1WhoLastName";
	$vardata = $wholastname;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
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
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
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
	$var = "1CallbackNum";
	$vardata = $callbacknum;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
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
	$var = "3SecondaryNumber";
	$vardata = $secondarynumber;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
	

}
if (isset($_POST['ip'])) 
{	$ip = $_POST['ip'];
	$var = "ip";
	$vardata = $ip;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
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

	$var = "3Email";
	$vardata = $email;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
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
	$var = "3StreetLine1";
	$vardata = $streetline1;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
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
	$var = "3StreetLine2";
	$vardata = $streetline2;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
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
	$var = "3HomeCity";
	$vardata = $homecity;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
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
	$var = "3HomeState";
	$vardata = $homestate;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
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
	//strip dash
	if(strstr($Zipcode,'-'))
	{
	
	    $Zipcode = str_replace('-','',$Zipcode);
	}
	
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
	$var = "3Zipcode";
	$vardata = $zipcode;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['didyouworkatmacysretail'])) 
{	$didyouworkatmacysretail = $_POST['didyouworkatmacysretail'];
	$var = "didyouworkatmacysretail";
	$vardata = $didyouworkatmacysretail;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}



if (isset($_POST['formerlastdayyear'])) $formerlastdayyear = $_POST['formerlastdayyear'];
if (isset($_POST['formerlastdayday'])) $formerlastdayday = $_POST['formerlastdayday'];
if (isset($_POST['formerlastdaymonth'])) $formerlastdaymonth = $_POST['formerlastdaymonth'];
if (isset($_POST['formerlastdayyear']))
{	$formerlastday = "$formerlastdayyear".'-'."$formerlastdaymonth" .'-'. "$formerlastdayday";
	$var = "formerlastday";
	$vardata = $formerlastday;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}

if (isset($_POST['shortcheck1'])) 
{	$shortcheck1 = $_POST['shortcheck1'];
	$var = "shortcheck1";
	$vardata = $shortcheck1;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortcheck2'])) 
{	$shortcheck2 = $_POST['shortcheck2'];
	$var = "shortcheck2";
	$vardata = $shortcheck2;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortcheck3'])) 
{	$shortcheck3 = $_POST['shortcheck3'];
	$var = "shortcheck3";
	$vardata = $shortcheck3;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortcheck4'])) 
{	$shortcheck4 = $_POST['shortcheck4'];
	$var = "shortcheck4";
	$vardata = $shortcheck4;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortcheck5'])) 
{	$shortcheck5 = $_POST['shortcheck5'];
	$var = "shortcheck5";
	$vardata = $shortcheck5;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortcheck6'])) 
{	$shortcheck6 = $_POST['shortcheck6'];
	$var = "shortcheck6";
	$vardata = $shortcheck6;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortcheck7'])) 
{	$shortcheck7 = $_POST['shortcheck7'];
	$var = "shortcheck7";
	$vardata = $shortcheck7;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortcheck8'])) 
{	$shortcheck8 = $_POST['shortcheck8'];
	$var = "shortcheck8";
	$vardata = $shortcheck8;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortcheck9'])) 
{	$shortcheck9 = $_POST['shortcheck9'];
	$var = "shortcheck9";
	$vardata = $shortcheck9;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}
if (isset($_POST['shortcheck10'])) 
{	$shortcheck10 = $_POST['shortcheck10'];
	$var = "shortcheck10";
	$vardata = $shortcheck10;
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
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
	
	    $shortanythingelse = str_replace('\'','',$Zipcode);
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
	////strip underscore
	//if(strstr($shortanythingelse,'_'))
	//{
	//
	//    $shortanythingelse = str_replace('_','',$shortanythingelse);
	//}
	//strip ampersand
	if(strstr($shortanythingelse,'&'))
	{
	
	    $shortanythingelse = str_replace('\'','',$shortanythingelse);
	}	
	//strip dash
	if(strstr($shortanythingelse,'-'))
	{
	
	    $shortanythingelse = str_replace('-','',$shortanythingelse);
	}
	
	////strip space
	//if(strstr($shortanythingelse,' '))
	//{
	//
	//    $shortanythingelse = str_replace(' ','',$shortanythingelse);
	//}
	//strip comma
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
	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE data set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			

}



if (isset($_POST['15DocumentList'])) $documentlist = $_POST['15DocumentList'];

// Contact questions


if ($tenantid < 4)
{
echo "\\\\var dump start<br />";
	//print contact questions in plain text for testing post
	if (isset($whofirstname)) echo "OMG HI<br />$tenantid$whofirstname";
	#echo "<br />$wholastname";
	if (isset($wholastname)) echo "<br />$wholastname";
	#echo "<br />$wholastname";
	if (isset($callbacknum)) echo "<br />$callbacknum";
	#echo "<br />$callbacknum";
	if (isset($secondarynumber)) echo "<br />$secondarynumber";
	#echo "<br />$secondarynumber";
	if (isset($email)) echo "<br />$email";
	#echo "<br />$email";
	if (isset($streetline1)) echo "<br />$streetline1";
	#echo "<br />$streetline1";
	if (isset($streetline2)) echo "<br />$streetline2";
	#echo "<br />$streetline2";
	if (isset($homecity)) echo "<br />$homecity";
	#echo "<br />$homecity";
	if (isset($homestate)) echo "<br />$homestate";
	#echo "<br />$homestate";
	if (isset($zipcode)) echo "<br />$zipcode";
	#echo "<br />$zipcode";
	#1WhoFirstName
	#1WhoLastName
	#1CallbackNum
	#3SecondaryNumber
	#3Email
	#3StreetLine1
	#3StreetLine2
	#3HomeCity
	#3HomeState
	#3Zipcode
	//contact questions done
	//Employment background questions start
	if (isset($locstate)) echo "<br />$locstate";
	#echo "<br />$locstate";
	if (isset($loccity)) echo "<br />$loccity";
	#echo "<br />$loccity";
	if (isset($employeestatus)) echo "<br />$employeestatus";
	#echo "<br />$employeestatus";
	if (isset($workatmacys2004)) echo "<br />$workatmacys2004";
	#echo "<br />$employeehourly";
	if (isset($startmonth)) echo "<br />$startmonth";
	#echo "<br />$startmonth";
	if (isset($startyear)) echo "<br />$startyear";
	#echo "<br />$startyear";
	if (isset($endmonthseason)) echo "<br />$endmonthseason";
	#echo "<br />$endmonthseason";
	if (isset($endyear)) echo "<br />$endyear";
	#echo "<br />$endyear";
	if (isset($employeehourly)) echo "<br />$employeehourly";
	#echo "<br />$employeehourly";
	if (isset($workschedule)) echo "<br />$workschedule";
	#echo "<br />$workschedule";
	if (isset($category)) echo "<br />$category";
	#echo "<br />$category";
	if (isset($positions)) echo "<br />$positions";
	#echo "<br />$positions";
	#1LocState
	#1LocCity
	#4EmployeeStatus
	#4EmployeeHourly
	#4StartMonth
	#4StartYear
	#4EndMonthSeason
	#4EndYear
	#4EmployeeHourly
	#4WorkSchedule
	#4Category
	#4Positions
	//Employment background questions end
	//Documentation questions start
	if (isset($signedarbitration)) echo "<br />$signedarbitration";
	#echo "<br />$signedarbitration";
	if (isset($optedoutofarb)) echo "<br />$optedoutofarb";
	#echo "<br />$optedoutofarb";
	if (isset($familiararb)) echo "<br />$familiararb";
	#echo "<br />$familiararb";
	#5SignedArbitration
	#5OptedOutofArb
	#5FamiliarArb
	//meal breaks start
	if (isset($clockedformeal)) echo "<br />$clockedformeal";
	#echo "<br />$clockedformeal";
	if (isset($mealbreakscheduled)) echo "<br />$mealbreakscheduled";
	#echo "<br />$mealbreakscheduled";
	if (isset($mealwhenworkingbetween5and6hours)) echo "<br />$mealwhenworkingbetween5and6hours";
	#echo "<br />$mealwhenworkingbetween5and6hours";
	if (isset($mealbreakmissedcat1freq)) echo "<br />$mealbreakmissedcat1freq";
	#echo "<br />$mealbreakmissedcat1freq";
	if (isset($mealbreakmissedcat1why)) echo "<br />$mealbreakmissedcat1why";
	#echo "<br />$mealbreakmissedcat1why";
	if (isset($cat1mealbreaklate)) echo "<br />$cat1mealbreaklate";
	#echo "<br />$cat1mealbreaklate";
	if (isset($cat1mealbreaklatewhy)) echo "<br />$cat1mealbreaklatewhy";
	#echo "<br />$cat1mealbreaklatewhy";
	if (isset($cat1mealbreaklatefreq)) echo "<br />$cat1mealbreaklatefreq";
	#echo "<br />$cat1mealbreaklatefreq";
	if (isset($cat1mealbreakinterupt)) echo "<br />$cat1mealbreakinterupt";
	#echo "<br />$cat1mealbreakinterupt";
	if (isset($cat1mealbreakinteruptwhy)) echo "<br />$cat1mealbreakinteruptwhy";
	#echo "<br />$cat1mealbreakinteruptwhy";
	if (isset($cat1mealbreakinteruptfreq)) echo "<br />$cat1mealbreakinteruptfreq";
	#echo "<br />$cat1mealbreakinteruptfreq";
	if (isset($cat1extrahourpay)) echo "<br />$cat1extrahourpay";
	#echo "<br />$cat1extrahourpay";
	if (isset($cat1extrahourpaydetail)) echo "<br />$cat1extrahourpaydetail";
	#echo "<br />$cat1extrahourpaydetail";
	if (isset($evermorethan10)) echo "<br />$evermorethan10";
	#echo "<br />$evermorethan10";
	if (isset($cat3didgetsecondmealbreak)) echo "<br />$cat3didgetsecondmealbreak";
	#echo "<br />$cat3didgetsecondmealbreak";
	if (isset($cat3secondmealbreakdur)) echo "<br />$cat3secondmealbreakdur";
	#echo "<br />$cat3secondmealbreakdur";
	if (isset($cat3missed2ndmealbreakoften)) echo "<br />$cat3missed2ndmealbreakoften";
	#echo "<br />$cat3missed2ndmealbreakoften";
	if (isset($cat3missed2ndmealwaivemealperiod)) echo "<br />$cat3missed2ndmealwaivemealperiod";
	#echo "<br />$cat3missed2ndmealwaivemealperiod";
	if (isset($cat3missed2ndmealdidntwaivmealworkedmorethan10recievedextrahourpay)) echo "<br />$cat3missed2ndmealdidntwaivmealworkedmorethan10recievedextrahourpay";
	#echo "<br />$cat3missed2ndmealdidntwaivmealworkedmorethan10recievedextrahourpay";
	#7ClockedForMeal
	#7MealBreakScheduled
	#7MealWhenWorkingBetween5and6hours
	#7MealBreakMissedCat1Freq
	#7MealBreakMissedCat1Why
	#7Cat1MealBreakLate
	#7Cat1MealBreakLateWhy
	#7Cat1MealBreakLateFreq
	#7Cat1MealBreakInterupt
	#7Cat1MealBreakInteruptWhy
	#7Cat1MealBreakInteruptFreq
	#7Cat1ExtraHourPay
	#7Cat1ExtraHourPayDetail
	#7EverMoreThan10
	#7Cat3DidGetSecondMealBreak
	#7Cat3SecondMealBreakDur
	#7Cat3Missed2ndMealBreakOften
	#7Cat3Missed2ndMealWaiveMealPeriod
	#7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay
	//meal end
	//rest start
	if (isset($restevermissed)) echo "<br />$restevermissed";
	#echo "<br />$restevermissed";
	if (isset($howoftenmissrest)) echo "<br />$howoftenmissrest";
	#echo "<br />$howoftenmissrest";
	if (isset($whymiss10minrest)) echo "<br />$whymiss10minrest";
	#echo "<br />$whymiss10minrest";
	if (isset($resteverinterupt)) echo "<br />$resteverinterupt";
	#echo "<br />$resteverinterupt";
	if (isset($howoftenrestinterupt)) echo "<br />$howoftenrestinterupt";
	#echo "<br />$howoftenrestinterupt";
	if (isset($extrahourpay)) echo "<br />$extrahourpay";
	#echo "<br />$extrahourpay";
	if (isset($extrahourpaydetail)) echo "<br />$extrahourpaydetail";
	#echo "<br />$extrahourpaydetail";
	if (isset($restlatefreq)) echo "<br />$restlatefreq";
	#echo "<br />$restlatefreq";
	#8RestEverMissed
	#8HowOftenMissRest
	#8WhyMiss10MinRest
	#8RestEverInterupt
	#8HowOftenRestInterupt
	#8ExtraHourPay
	#8ExtraHourPayDetail
	#8RestLateFreq
	//rest end
	//bag start
	if (isset($bagschecksyesno)) echo "<br />$bagschecksyesno";
	#echo "<br />$bagschecksyesno";
	if (isset($bagscheckedafterclocking)) echo "<br />$bagscheckedafterclocking";
	#echo "<br />$bagscheckedafterclocking";
	if (isset($bagscheckedeverytimeleaving)) echo "<br />$bagscheckedeverytimeleaving";
	#echo "<br />$bagscheckedeverytimeleaving";
	if (isset($bagscheckedduration)) echo "<br />$bagscheckedduration";
	#echo "<br />$bagscheckedduration";
	if (isset($bagscheckedwait)) echo "<br />$bagscheckedwait";
	#echo "<br />$bagscheckedwait";
	if (isset($waitforotherbagchecks)) echo "<br />$waitforotherbagchecks";
	#echo "<br />$waitforotherbagchecks";
	#9BagsChecksYesNo
	#9BagsCheckedAfterClocking
	#9BagsCheckedEverytimeLeaving
	#9BagsCheckedDuration
	#9BagsCheckedWait
	#9WaitForOtherBagChecks
	//bag end
	//closing shift start
	if (isset($everworkclosingshift)) echo "<br />$everworkclosingshift";
	#echo "<br />$everworkclosingshift";
	if (isset($havetowaittoleave)) echo "<br />$havetowaittoleave";
	#echo "<br />$havetowaittoleave";
	if (isset($onoroffclockwaiting)) echo "<br />$onoroffclockwaiting";
	#echo "<br />$onoroffclockwaiting";
	if (isset($howlongwaittoleave)) echo "<br />$howlongwaittoleave";
	#echo "<br />$howlongwaittoleave";
	if (isset($waitformgrtophysicallyafterclockedout)) echo "<br />$waitformgrtophysicallyafterclockedout";
	#echo "<br />$waitformgrtophysicallyafterclockedout";
	if (isset($lengthwaitformgr)) echo "<br />$lengthwaitformgr";
	#echo "<br />$lengthwaitformgr";
	#10EverWorkClosingShift
	#10HaveToWaitToLeave
	#10OnOrOffClockWaiting
	#10HowLongWaitToLeave
	#10WaitForMgrToPhysicallyAfterClockedOut
	#10LengthWaitForMgr
	//closing shift end
	//overtimestart
	if (isset($over8)) echo "<br />$over8";
	if (isset($howmuchot)) echo "<br />$howmuchot";
	#echo "<br />$over8";
	if (isset($evernotpaidot)) echo "<br />$evernotpaidot";
	#echo "<br />$evernotpaidot";
	if (isset($everwork40week)) echo "<br />$everwork40week";
	#echo "<br />$everwork40week";
	if (isset($everworkover40weekhowmany)) echo "<br />$everworkover40weekhowmany";
	#echo "<br />$everworkover40weekhowmany";
	if (isset($over40andnotpaid)) echo "<br />$over40andnotpaid";
	#echo "<br />$over40andnotpaid";
	#11Over8
	#11EverNotPaidOT
	#11EverWork40Week
	#11EverWorkOver40WeekHowMany
	#11Over40AndNotPaid
	//overtimeend
	//finalwage start
	if (isset($termtype)) echo "<br />$termtype";
	#echo "<br />$termtype";
	if (isset($didyougetfinalcheckonlastday)) echo "<br />$didyougetfinalcheckonlastday";
	#echo "<br />$didyougetfinalcheckonlastday";
	if (isset($howlongaftertermrecievecheckgreaterthan72)) echo "<br />$howlongaftertermrecievecheckgreaterthan72";
	#echo "<br />$howlongaftertermrecievecheckgreaterthan72";
	if (isset($seventytwohoursorless)) echo "<br />$seventytwohoursorless";
	#echo "<br />$seventytwohoursorless";
	if (isset($didyougetfinalcheckonlastday)) echo "<br />$didyougetfinalcheckonlastday";
	#echo "<br />$didyougetfinalcheckonlastday";
	#12TermType
	#12DidYouGetFinalCheckOnLastDay
	#12HowLongAfterTermRecieveCheckGreaterThan72
	#12SeventyTwoHoursOrLess
	#12DidYouGetFinalCheckOnLastDay
	//finalwage end
	//wage statements start
	if (isset($getpaystubwithcheck)) echo "<br />$getpaystubwithcheck";
	#echo "<br />$getpaystubwithcheck";
	if (isset($waspaystubelectronic)) echo "<br />$waspaystubelectronic";
	#echo "<br />$waspaystubelectronic";
	if (isset($didyouunderstandwagestatement)) echo "<br />$didyouunderstandwagestatement";
	#echo "<br />$didyouunderstandwagestatement";
	if (isset($waswagestatementincodes)) echo "<br />$waswagestatementincodes";
	#echo "<br />$waswagestatementincodes";
	if (isset($paycalcmethod)) echo "<br />$paycalcmethod";
	#echo "<br />$paycalcmethod";
	if (isset($anyproblemswithpay)) echo "<br />$anyproblemswithpay";
	#echo "<br />$anyproblemswithpay";
	#13GetPayStubWithCheck
	#13WasPaystubElectronic
	#13DidYouUnderstandWageStatement
	#13WasWageStatementInCodes
	#13PayCalcMethod
	#13AnyProblemsWithPay
	//wage statements end
	//seating start
	if (isset($didyourjobrequirestanding)) echo "<br />$didyourjobrequirestanding";
	#echo "<br />$didyourjobrequirestanding";
	if (isset($weretherechairs)) echo "<br />$weretherechairs";
	#echo "<br />$weretherechairs";
	if (isset($permittedtosit)) echo "<br />$permittedtosit";
	#echo "<br />$permittedtosit";
	if (isset($describeseating)) echo "<br />$describeseating";
	#echo "<br />$describeseating";
	if (isset($permittedtosityeshoursuntilsit)) echo "<br />$permittedtosityeshoursuntilsit";
	#echo "<br />$permittedtosityeshoursuntilsit";
	if (isset($whynotallowedtosit)) echo "<br />$whynotallowedtosit";
	#echo "<br />$whynotallowedtosit";
	if (isset($consequences)) echo "<br />$consequences";
	#echo "<br />$consequences";
	if (isset($whatconsequences)) echo "<br />$whatconsequences";
	#echo "<br />$whatconsequences";
	if (isset($sittingwouldinterfere)) echo "<br />$sittingwouldinterfere";
	#echo "<br />$sittingwouldinterfere";
	#14DidYourJobRequireStanding
	#14WereThereChairs
	#14DescribeSeating
	#14PermittedToSit
	#14PermittedToSitYesHoursUntilSit
	#14WhyNotAllowedToSit
	#14Consequences
	#14WhatConsequences
	#14SittingWouldInterfere
	//seating end
	//documents start
	if (isset($anydocumentstoshare)) echo "<br />$anydocumentstoshare";
	#echo "<br />$anydocumentstoshare";
	if (isset($documentlist)) echo "<br />$documentlist";
	#echo "<br />$documentlist";
	#15AnyDocumentsToShare
	#15DocumentList
}
#if( $conn === false ) {
#
#    die('{"data":'.json_encode(sqlsrv_errors()).'}');
#
#}


 

if(strstr($brand,'\'')){

    $brand = str_replace('\'','\'\'',$brand);

} 

?>

<?PHP
if (isset($_POST['completedonline']))
{
$ftp_server = '10.129.3.21';
$ftp_user_name = 'sqlsrv';
$ftp_user_pass = 'password';
$dir0 = '/' . "$brandname" . '/';
$filename3= "$LastName, " .  "$FirstName" . " - ".$uniqueid; 
$dir1 = "$dir0" . "$filename3";
$dir2 = "$dir1" . '/';
$dir3 = "$dir1" . '/';
$file = "$filename" . "$ext";
$file2 = "$filename2" . "$ext";
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

ftp_mkdir($conn_id, $dir2);
ftp_chdir($conn_id, $dir2);
ftp_put($conn_id, $file, $file, FTP_BINARY);
ftp_close($conn_id);
unlink($file); //delete temp copy pdf stored on server

$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
ftp_mkdir($conn_id, $dir3);
ftp_chdir($conn_id, $dir3);
ftp_put($conn_id, $file2, $file2, FTP_BINARY);
ftp_close($conn_id);
unlink($file2); //delete temp copy pdf stored on server
}
?>
<?PHP 
if (isset($uniqueid))
	{	
		$query = "IF NOT EXISTS(SELECT * FROM status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid' ) INSERT INTO status (uniqueid,notelog,email,phone1,phone2,currentstatus,currentstatusdate,brandid,tenantid,date,time,brand,completedonline,onlinecompleteday,onlinecompleteweek,onlinecompletemonth,onlinecompletetime,FirstName,LastName,Street1,Street2,City,State,Zipcode,interviewstarted,reachedretainerdiscussion,interviewstartmonthyear,interviewstartday,interviewcompletemonthyear,interviewcompleteday,interviewstarttime,interviewcompletetime,interviewstartweek,interviewcompleteweek) VALUES ('$uniqueid','$date @ $time : <strong>Shortform Complete over phone</strong><br>','$email','$callbacknum','$secondarynumber','Shortform Complete','$date','$brandid','$tenantid','$date','$time','$brand','Yes','$date','$week','$month','$time','$whofirstname','$wholastname','$streetline1','$streetline2','$homecity','$homestate','$zipcode','Yes','Yes','$month','$date','$month','$date','$time','$time','$week','$week')";
		$results = sqlsrv_query($conn,$query);
	
		$query = "IF EXISTS (SELECT * from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE status set completedonline='Yes',onlinecompleteday='$date',onlinecompleteweek='$week',onlinecompletemonth='$month',onlinecompletetime='$time',FirstName='$whofirstname',LastName='$wholastname',Street1='$streetline1',Street2='$streetline2',City='$homecity',State='$homestate',Zipcode='$zipcode',interviewstarted='Yes',reachedretainerdiscussion='Yes',interviewstartmonthyear='$month',interviewstartday='$date',interviewcompletemonthyear='$date',interviewcompleteday=$date,interviewstarttime='$time',interviewcompletetime='$time',interviewstartweek='$week',interviewcompleteweek='$week' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
		$results = sqlsrv_query($conn,$query);
			
}
?>

<?php
#echo $uniqueid."";
echo "<iframe scrolling='auto' width='100%' height='";
echo "3500px";
echo "' frameborder='0' style='margin:auto;' src='";
echo "client2.php";
echo "?uniqueid=";
echo $uniqueid;
echo "'></iframe>";
#echo "<br>Hello";


?>
</div>
    </body>
</html>


