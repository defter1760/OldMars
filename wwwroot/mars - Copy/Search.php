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
.MyFont { /*  */
	font-size: 14px;
	
}
.MyBody { /*  */
	font-family: 'Open Sans', sans-serif;
	/*color:#424242;*/
	color:#000000;
	margin:0;
	/*text-align:center;*/
	height:100%;
	font-size:16px;
	background-repeat: no-repeat;

	
}
.SmallFont { /*  */
	font-size: 9px;

	
}
div#main {

  width:1000px;
  /*width:700px;*/
  margin-left: auto;

  margin-right: auto;

  text-align: center;

}
select {
font-family: Verdana, Arial, sans-serif;
font-size: 9px;
}
input {
font-family: Verdana, Arial, sans-serif;
font-size: 14px;
alignment-baseline: central;
border: solid;
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
 newwin=window.open(url,'windowname6', params);
 if (window.focus) {newwin.focus()}
 return false;
}
// -->
</script>

<?PHP
require("functions.php");//functions



	
$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");


$conn = sqlsrv_connect( $serverName, $connectionInfo );
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');


if (isset($_REQUEST['brandname'])) $brand = $_REQUEST['brandname'];
if (isset($_POST['brandname'])) $brand = $_POST['brandname'];

if (isset($_REQUEST['ani'])) $phone1 = $_REQUEST['ani'];
if (empty($phone1)) unset($phone1);

if (isset($_REQUEST['brand'])) $brand = $_REQUEST['brand'];
if (isset($_POST['brand'])) $brand = $_POST['brand'];
if (empty($brand))
{
	unset($brand);
}
else
{
if(strstr($brand,'\''))
{

    $brand = str_replace('\'','\'\'',$brand);

if($brand == 'macy\'\'s')
{
	$brand = "macys";
}
	

}
	//strip single quote
	if(strstr($brand,'\''))
	{
	
	    $brand = str_replace('\'','',$brand);
	}
	
	//strip double quote
	if(strstr($brand,'\"'))
	{
	
	    $brand = str_replace('\"','',$brand);
	}	
	//strip percentage
	if(strstr($brand,'%'))
	{
	
	    $brand = str_replace('%','',$brand);
	}
	//strip asterisk
	if(strstr($brand,'*'))
	{
	
	    $brand = str_replace('*','',$brand);
	}
	//strip underscore
	if(strstr($brand,'_'))
	{
	
	    $brand = str_replace('_','',$brand);
	}
	//strip ampersand
	if(strstr($brand,'&'))
	{
	
	    $brand = str_replace('\'','',$brand);
	}	
	//strip dash
	if(strstr($brand,'-'))
	{
	
	    $brand = str_replace('-','',$brand);
	}
	
	//strip space
	if(strstr($brand,' '))
	{
	
	    $brand = str_replace(' ','',$brand);
	}
	//strip comma
	if(strstr($brand,','))
	{
	
	    $brand = str_replace(',','',$brand);
	}

	//strip period
	if(strstr($brand,'.'))
	{
	
	    $brand = str_replace('.','',$brand);
	}

	//strip parenthasis open
	if(strstr($brand,'('))
	{
	
		$brand = preg_replace('/\(|\)/','',$brand);
	}
	
	//strip parenthasis close
	if(strstr($brand,')'))
	{
		$brand = preg_replace('/\(|\)/','',$brand); 
	}
}
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
if (isset($_POST['uniqueid'])) $uniqueid = $_POST['uniqueid'];
if (empty($uniqueid))
{
	unset($uniqueid);
}
else
{
	

	//strip single quote
	if(strstr($uniqueid,'\''))
	{
	
	    $uniqueid = str_replace('\'','',$uniqueid);
	}
	
	//strip double quote
	if(strstr($uniqueid,'\"'))
	{
	
	    $uniqueid = str_replace('\"','',$uniqueid);
	}	
	//strip percentage
	if(strstr($uniqueid,'%'))
	{
	
	    $uniqueid = str_replace('%','',$uniqueid);
	}
	//strip asterisk
	if(strstr($uniqueid,'*'))
	{
	
	    $uniqueid = str_replace('*','',$uniqueid);
	}
	//strip underscore
	if(strstr($uniqueid,'_'))
	{
	
	    $uniqueid = str_replace('_','',$uniqueid);
	}
	//strip ampersand
	if(strstr($uniqueid,'&'))
	{
	
	    $uniqueid = str_replace('\'','',$uniqueid);
	}	
	//strip dash
	if(strstr($uniqueid,'-'))
	{
	
	    $uniqueid = str_replace('-','',$uniqueid);
	}
	
	//strip space
	if(strstr($uniqueid,' '))
	{
	
	    $uniqueid = str_replace(' ','',$uniqueid);
	}
	//strip comma
	if(strstr($uniqueid,','))
	{
	
	    $uniqueid = str_replace(',','',$uniqueid);
	}

	//strip period
	if(strstr($uniqueid,'.'))
	{
	
	    $uniqueid = str_replace('.','',$uniqueid);
	}

	//strip parenthasis open
	if(strstr($uniqueid,'('))
	{
	
		$uniqueid = preg_replace('/\(|\)/','',$uniqueid);
	}
	
	//strip parenthasis close
	if(strstr($uniqueid,')'))
	{
		$uniqueid = preg_replace('/\(|\)/','',$uniqueid); 
	}
}
if (isset($_REQUEST['FirstName'])) $FirstName = $_REQUEST['FirstName'];
if (isset($_POST['FirstName'])) $FirstName = $_POST['FirstName'];
if (empty($FirstName))
{
	unset($FirstName);
}
else
{
	//strip single quote
	if(strstr($FirstName,'\''))
	{
	
	    $FirstName = str_replace('\'','',$FirstName);
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
}
if (isset($_REQUEST['LastName'])) $LastName = $_REQUEST['LastName'];
if (isset($_POST['LastName'])) $LastName = $_POST['LastName'];
if (empty($LastName))
{
unset($LastName);	
}
else
{
	//strip single quote
	if(strstr($LastName,'\''))
	{
	
	    $LastName = str_replace('\'','',$LastName);
	}
	
	//strip double quote
	if(strstr($LastName,'\"'))
	{
	
	    $LastName = str_replace('\"','',$LastName);
	}	
	//strip percentage
	if(strstr($LastName,'%'))
	{
	
	    $LastName = str_replace('%','',$LastName);
	}
	//strip asterisk
	if(strstr($LastName,'*'))
	{
	
	    $LastName = str_replace('*','',$LastName);
	}
	//strip underscore
	if(strstr($LastName,'_'))
	{
	
	    $LastName = str_replace('_','',$LastName);
	}
	//strip ampersand
	if(strstr($LastName,'&'))
	{
	
	    $LastName = str_replace('\'','',$LastName);
	}	
	//strip dash
	if(strstr($LastName,'-'))
	{
	
	    $LastName = str_replace('-','',$LastName);
	}
	
	//strip space
	if(strstr($LastName,' '))
	{
	
	    $LastName = str_replace(' ','',$LastName);
	}
	//strip comma
	if(strstr($LastName,','))
	{
	
	    $LastName = str_replace(',','',$LastName);
	}

	//strip period
	if(strstr($LastName,'.'))
	{
	
	    $LastName = str_replace('.','',$LastName);
	}

	//strip parenthasis open
	if(strstr($LastName,'('))
	{
	
		$LastName = preg_replace('/\(|\)/','',$LastName);
	}
	
	//strip parenthasis close
	if(strstr($LastName,')'))
	{
		$LastName = preg_replace('/\(|\)/','',$LastName); 
	}
}
if (isset($_REQUEST['Zipcode'])) $Zipcode = $_REQUEST['Zipcode'];
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
if (isset($_REQUEST['State'])) $State = $_REQUEST['State'];
if (isset($_POST['State'])) $State = $_POST['State'];
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
}
if (isset($_REQUEST['City'])) $City = $_REQUEST['City'];
if (isset($_POST['City'])) $City = $_POST['City'];
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
	if(strstr($City,' '))
	{
	
	    $City = str_replace(' ','',$City);
	}
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
}
if (isset($_REQUEST['Street2'])) $Street2 = $_REQUEST['Street2'];
if (isset($_POST['Street2'])) $Street2 = $_POST['Street2'];
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
}
if (isset($_REQUEST['Street1'])) $Street1 = $_REQUEST['Street1'];
if (isset($_POST['Street1'])) $Street1 = $_POST['Street1'];
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
	if(strstr($Street1,' '))
	{
	
	    $Street1 = str_replace(' ','',$Street1);
	}
	//strip comma
	if(strstr($Street1,','))
	{
	
	    $Street1 = str_replace(',','',$Street1);
	}

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
}
if (isset($_REQUEST['agentlname'])) $agentlname = $_REQUEST['agentlname'];
if (isset($_POST['agentlname'])) $agentlname = $_POST['agentlname'];
if (empty($agentlname))
{
unset($agentlname);	
}
else
{
	
	//strip single quote
	if(strstr($agentlname,'\''))
	{
	
	    $agentlname = str_replace('\'','',$agentlname);
	}
	
	//strip double quote
	if(strstr($agentlname,'\"'))
	{
	
	    $agentlname = str_replace('\"','',$agentlname);
	}	
	//strip percentage
	if(strstr($agentlname,'%'))
	{
	
	    $agentlname = str_replace('%','',$agentlname);
	}
	//strip asterisk
	if(strstr($agentlname,'*'))
	{
	
	    $agentlname = str_replace('*','',$agentlname);
	}
	//strip underscore
	if(strstr($agentlname,'_'))
	{
	
	    $agentlname = str_replace('_','',$agentlname);
	}
	//strip ampersand
	if(strstr($agentlname,'&'))
	{
	
	    $agentlname = str_replace('\'','',$agentlname);
	}	
	//strip dash
	if(strstr($agentlname,'-'))
	{
	
	    $agentlname = str_replace('-','',$agentlname);
	}
	
	//strip space
	if(strstr($agentlname,' '))
	{
	
	    $agentlname = str_replace(' ','',$agentlname);
	}
	//strip comma
	if(strstr($agentlname,','))
	{
	
	    $agentlname = str_replace(',','',$agentlname);
	}

	//strip period
	if(strstr($agentlname,'.'))
	{
	
	    $agentlname = str_replace('.','',$agentlname);
	}

	//strip parenthasis open
	if(strstr($agentlname,'('))
	{
	
		$agentlname = preg_replace('/\(|\)/','',$agentlname);
	}
	
	//strip parenthasis close
	if(strstr($agentlname,')'))
	{
		$agentlname = preg_replace('/\(|\)/','',$agentlname); 
	}
}
if (isset($_REQUEST['agentfname'])) $agentfname = $_REQUEST['agentfname'];
if (isset($_POST['agentfname'])) $agentfname = $_POST['agentfname'];
if (empty($agentfname))
{
unset($agentfname);	
}
else
{
	
	//strip single quote
	if(strstr($agentfname,'\''))
	{
	
	    $agentfname = str_replace('\'','',$agentfname);
	}
	
	//strip double quote
	if(strstr($agentfname,'\"'))
	{
	
	    $agentfname = str_replace('\"','',$agentfname);
	}	
	//strip percentage
	if(strstr($agentfname,'%'))
	{
	
	    $agentfname = str_replace('%','',$agentfname);
	}
	//strip asterisk
	if(strstr($agentfname,'*'))
	{
	
	    $agentfname = str_replace('*','',$agentfname);
	}
	//strip underscore
	if(strstr($agentfname,'_'))
	{
	
	    $agentfname = str_replace('_','',$agentfname);
	}
	//strip ampersand
	if(strstr($agentfname,'&'))
	{
	
	    $agentfname = str_replace('\'','',$agentfname);
	}	
	//strip dash
	if(strstr($agentfname,'-'))
	{
	
	    $agentfname = str_replace('-','',$agentfname);
	}
	
	//strip space
	if(strstr($agentfname,' '))
	{
	
	    $agentfname = str_replace(' ','',$agentfname);
	}
	//strip comma
	if(strstr($agentfname,','))
	{
	
	    $agentfname = str_replace(',','',$agentfname);
	}

	//strip period
	if(strstr($agentfname,'.'))
	{
	
	    $agentfname = str_replace('.','',$agentfname);
	}

	//strip parenthasis open
	if(strstr($agentfname,'('))
	{
	
		$agentfname = preg_replace('/\(|\)/','',$agentfname);
	}
	
	//strip parenthasis close
	if(strstr($agentfname,')'))
	{
		$agentfname = preg_replace('/\(|\)/','',$agentfname); 
	}
}
if (isset($_REQUEST['barcode'])) $barcode = $_REQUEST['barcode'];
if (isset($_POST['barcode'])) $barcode = $_POST['barcode'];
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
}
if (isset($_REQUEST['brandid'])) $brandid = $_REQUEST['brandid'];
if (isset($_POST['brandid'])) $brandid = $_POST['brandid'];
if (empty($brandid))
{
unset($brandid);	
}
else
{
	$usethis = $brandid;
	//strip single quote
	if(strstr($brandid,'\''))
	{
	
	    $brandid = str_replace('\'','',$brandid);
	}
	
	//strip double quote
	if(strstr($brandid,'\"'))
	{
	
	    $brandid = str_replace('\"','',$brandid);
	}	
	//strip percentage
	if(strstr($brandid,'%'))
	{
	
	    $brandid = str_replace('%','',$brandid);
	}
	//strip asterisk
	if(strstr($brandid,'*'))
	{
	
	    $brandid = str_replace('*','',$brandid);
	}
	//strip underscore
	if(strstr($brandid,'_'))
	{
	
	    $brandid = str_replace('_','',$brandid);
	}
	//strip ampersand
	if(strstr($brandid,'&'))
	{
	
	    $brandid = str_replace('\'','',$brandid);
	}	
	//strip dash
	if(strstr($brandid,'-'))
	{
	
	    $brandid = str_replace('-','',$brandid);
	}
	
	//strip space
	if(strstr($brandid,' '))
	{
	
	    $brandid = str_replace(' ','',$brandid);
	}
	//strip comma
	if(strstr($brandid,','))
	{
	
	    $brandid = str_replace(',','',$brandid);
	}

	//strip period
	if(strstr($brandid,'.'))
	{
	
	    $brandid = str_replace('.','',$brandid);
	}

	//strip parenthasis open
	if(strstr($brandid,'('))
	{
	
		$brandid = preg_replace('/\(|\)/','',$brandid);
	}
	
	//strip parenthasis close
	if(strstr($brandid,')'))
	{
		$brandid = preg_replace('/\(|\)/','',$brandid); 
	}
}
if (isset($_REQUEST['noteadd'])) $noteadd = $_REQUEST['noteadd'];
if (isset($_POST['noteadd'])) $noteadd = $_POST['noteadd'];
if (empty($noteadd))
{
unset($noteadd);	
}
else
{
	//strip single quote
	if(strstr($noteadd,'\''))
	{
	
	    $noteadd = str_replace('\'','',$noteadd);
	}
	
	//strip double quote
	if(strstr($noteadd,'\"'))
	{
	
	    $noteadd = str_replace('\"','',$noteadd);
	}	
	//strip percentage
	if(strstr($noteadd,'%'))
	{
	
	    $noteadd = str_replace('%','',$noteadd);
	}
	//strip asterisk
	if(strstr($noteadd,'*'))
	{
	
	    $noteadd = str_replace('*','',$noteadd);
	}
	//strip underscore
	if(strstr($noteadd,'_'))
	{
	
	    $noteadd = str_replace('_','',$noteadd);
	}
	//strip ampersand
	if(strstr($noteadd,'&'))
	{
	
	    $noteadd = str_replace('\'','',$noteadd);
	}	
	//strip dash
	if(strstr($noteadd,'-'))
	{
	
	    $noteadd = str_replace('-','',$noteadd);
	}
	
	////strip space
	//if(strstr($noteadd,' '))
	//{
	//
	//    $noteadd = str_replace(' ','',$noteadd);
	//}
	//strip comma
	if(strstr($noteadd,','))
	{
	
	    $noteadd = str_replace(',','',$noteadd);
	}

	//strip period
	if(strstr($noteadd,'.'))
	{
	
	    $noteadd = str_replace('.','',$noteadd);
	}

	//strip parenthasis open
	if(strstr($noteadd,'('))
	{
	
		$noteadd = preg_replace('/\(|\)/','',$noteadd);
	}
	
	//strip parenthasis close
	if(strstr($noteadd,')'))
	{
		$noteadd = preg_replace('/\(|\)/','',$noteadd); 
	}
}
if (isset($_REQUEST['phone1'])) $phone1 = $_REQUEST['phone1'];
if (isset($_POST['phone1'])) $phone1 = $_POST['phone1'];
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
if (isset($_REQUEST['phone2'])) $phone2 = $_REQUEST['phone2'];
if (isset($_POST['phone2'])) $phone2 = $_POST['phone2'];
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
if (isset($_REQUEST['email'])) $email = $_REQUEST['email'];
if (isset($_POST['email'])) $email = $_POST['email'];
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
	//strip underscore
	if(strstr($email,'_'))
	{
	
	    $email = str_replace('_','',$email);
	}
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
	if(strstr($email,'.'))
	{
	
	    $email = str_replace('.','',$email);
	}

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
}
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
<div id='main'>
<?PHP

    echo "<FORM NAME ='form2' METHOD ='POST' ACTION='search.php'>";

	#echo "<div align='left' class='MyFont'>";
	#echo "<div align='center'>";
	echo "<table border=0 width='1000px' cellpadding=1>";
		echo "<tr>";
		echo "<td align='center'  class='Mybody' valign='top'>";
	echo "<img src='/mars/test/img/MARS_Search_50_percent.png'>";	
		echo "</td>";
		echo "</tr>";
echo "</table>";
	#echo "</div>";
	echo "<table border=0 width='600px' cellpadding=1>";
		echo "<tr>";
			echo "<td align='right' width='200px' class='Mybody' valign='top'>";
				echo "Client Name:";
			echo "</td>";
			echo "<td align='left' width='200px'>";
			if (isset($FirstName))
			{
				echo "<INPUT TYPE = 'text' Name='FirstName' value='".$FirstName."' style='width:200px; height:25px'>";				
			}
			else
			{
				echo "<INPUT TYPE = 'text' Name='FirstName' value='' style='width:200px; height:25px'>";	
			}

				echo "<br>";
				echo "<label>First name</label>";
				#echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
				
			echo "</td>";
			echo "<td align='left' width='200px' class='Mybody' valign='top'>";
			if (isset($LastName))
			{
				echo "<INPUT TYPE = 'text' Name='LastName' value='".$LastName."' style='width:200px; height:25px'>";				
			}
			else
			{
				echo "<INPUT TYPE = 'text' Name='LastName' value='' style='width:200px; height:25px'>";				
			}

				echo "<br>";
				echo "<label>Last name</label>";				
			echo "</td>";
		echo "</tr>";
	#	echo "</table>";
	#echo "<table border=1 width='800px' cellpadding=4>";		
		echo "<tr>";
			echo "<td align='right' width='200px' class='Mybody' valign='top'>";
				echo " Phone:";
			echo "</td>";
			echo "<td align='left' width='200px'>";
			if (isset($phone1))
			{
				echo "<INPUT TYPE = 'text' Name='phone1' value='".$phone1."' style='width:200px; height:25px'>";				
			}
			else
			{
				echo "<INPUT TYPE = 'text' Name='phone1' value='' style='width:200px; height:25px'>";				
			}

				echo "<br>";
				echo "<label>Phone number</label>";
			echo "</td>";
			echo "<td align='left' width='200px'>";
				#echo "<INPUT TYPE = 'text' Name='phone1' value='$phone1' style='width:100%; height:25px'>";
				#echo "<label>Phone number</label>";
			echo "</td>";
		echo "</tr>";
	#	echo "</table>";
	#echo "<table border=1 width='800px' cellpadding=4>";	
		echo "<tr>";
			echo "<td align='right' width='200px' class='Mybody' valign='top'>";		
				echo " Email:		";
			echo "</td>";
			echo "<td align='left' width='200px'>";
			if (isset($email))
			{
				echo "<INPUT TYPE = 'text' Name='email' value='".$email."' style='width:200px; height:25px'>";				
			}
			else
			{
				echo "<INPUT TYPE = 'text' Name='email' value='' style='width:200px; height:25px'>";	
			}

				echo "<br>";
				echo "<label>Email</label>";	
			echo "</td>";
			echo "<td align='left' width='200px'>";
				#echo "<INPUT TYPE = 'text' Name='email' value='$email' style='width:100%; height:25px'>";
				#echo "<label>Email</label>";	
			echo "</td>";
		echo "</tr>";
	#	echo "</table>";
	#echo "<table border=1 width='800px' cellpadding=4>";
		echo "<tr>";
			echo "<td align='right' width='200px' class='Mybody' valign='top'>";
				echo " Address: ";
			echo "</td>";	
			echo "<td align='left' width='200px'>";
			if (isset($Street1))
			{
				echo "<INPUT TYPE = 'text' Name='Street1' value='".$Street1."' style='width:200px; height:25px'>";				
			}
			else
			{
				echo "<INPUT TYPE = 'text' Name='Street1' value='' style='width:200px; height:25px'>";		
			}

				echo "<br>";
				echo "<label>Street</label>";
			echo "</td>";
			echo "<td align='left' width='200px'>";	
				#echo "<INPUT TYPE = 'text' Name='Street 1' value='$Street1' style='width:100%; height:25px'>";
				#echo "<label>Street</label>";
			echo "</td>";		
		echo "</tr>";
		#echo "</table>";
	#echo "<table border=1 width='800px' cellpadding=4>";
		echo "<tr>";
			echo "<td align='right' width='200px' class='Mybody' valign='top'>";
				#echo " Address: ";
			echo "</td>";	
			echo "<td align='left' width='200px'>";
			if (isset($City))
			{
				echo "<INPUT TYPE = 'text' Name='City' value='".$City."' style='width:200px; height:25px'>";				
			}
			else
			{
				echo "<INPUT TYPE = 'text' Name='City' value='' style='width:200px; height:25px'>";				
			}

				echo "<br>";
				echo "<label>City</label>";
			echo "</td>";
			echo "<td align='left' width='200px'>";
			if (isset($State))
			{
				echo "<INPUT TYPE = 'text' Name='State' value='".$State."' style='width:200px; height:25px'>";	
			}
			else
			{
				echo "<INPUT TYPE = 'text' Name='State' value='' style='width:200px; height:25px'>";	
			}
			
				echo "<br>";
				echo "<label>State</label>";
			echo "</td>";
		#echo "</tr>";
		#echo "<tr>";
		echo "</tr>";
	#	echo "</table>";
	#echo "<table border=1 width='700' cellpadding=4>";
		echo "<tr>";
			echo "<td align='right' width='200px' class='Mybody'>";
				#echo " Zipcode:		";
			echo "</td>";	
			echo "<td align='left' width='200px' class='Mybody'>";
			if(isset($Zipcode))
			{
				echo "<INPUT TYPE = 'text' Name='Zipcode' value='".$Zipcode."' style='width:100px; height:25px'>";	
			}
			else
			{
				echo "<INPUT TYPE = 'text' Name='Zipcode' value='' style='width:100px; height:25px'>";
			}
				
				echo "<br>";	
				echo "<label>Zipcode</label>";
			echo "</td>";
			echo "<td align='left' width='200px'>";	
				#echo "<INPUT TYPE = 'text' Name='Street 1' value='$Street1' style='width:100%; height:25px'>";
				#echo "<label>Street</label>";
			echo "</td>";	
		echo "</tr>";
	#	echo "</table>";
	#echo "<table border=1 width='700' cellpadding=4>";
		echo "<tr>";
			echo "<td align='right' width='200px' class='Mybody' valign='top'>";		
				#echo "Unique ID:";
			echo "</td>";
			echo "<td align='left' width='200px' class='Mybody'>";
			if (isset($uniqueid))
			{
				echo "<INPUT TYPE = 'text' Name='uniqueid' value='".$uniqueid."' style='width:200px; height:25px'>";
			}
			else
			{
				echo "<INPUT TYPE = 'text' Name='uniqueid' value='' style='width:200px; height:25px'>";	
			}
				echo "<br>";
				echo "<label>Unique ID</label>";
				echo "</td>";
			echo "<td align='left' width='200px' class='Mybody'>";
			if (isset($barcode))
			{
				echo "<INPUT TYPE = 'text' Name='barcode' value='".$barcode."' style='width:200px; height:25px'>";
			}
			else
			{
				echo "<INPUT TYPE = 'text' Name='barcode' value='' style='width:200px; height:25px'>";				
			}
				echo "<br>";
				echo "<label>Barcode #</label>";
			echo "</td>";	
			
		echo "</tr>";
		echo "<tr>";
			echo "<td align='right' width='200px' class='Mybody' valign='top'>";
				#echo " Case attorney:		";
			echo "</td>";	
			echo "<td align='left' width='200px' class='Mybody'>";
			if (isset($agentlname))
			{
				echo "<INPUT TYPE = 'text' Name='agentlname' value='".$agentlname."' style='width:200px; height:25px'>";
			}
			else
			{
				echo "<INPUT TYPE = 'text' Name='agentlname' value='' style='width:200px; height:25px'>";	
			}
				echo "<br>";
				echo "<label>Case attorney</label>";
			echo "<td align='left' width='200px' class='Mybody'>";
			if (isset($brand))
			{
				echo "<INPUT TYPE = 'text' Name='brand' value='".$brand."' style='width:200px; height:25px'>";
			}
			else
			{
				echo "<INPUT TYPE = 'text' Name='brand' value='' style='width:200px; height:25px'>";
			}
				echo "<br>";
				echo "<label>Campaign</label>";
			echo "</td>";		
		echo "</tr>";
	echo "</table>";
	echo "<table border=0 width='800px' cellpadding=4>";
		echo "<tr>";
			#echo "<td align='right' width='400px' class='Mybody' valign='top'>";
			#echo "</td>";
			echo "<td align='center' width='800px' class='Mybody' valign='top'>";
			

	




#}
	
	#<INPUT TYPE = 'Submit' Name = 'Submit1'  style:width='100px'; VALUE = 'Search'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "Show log:";
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

	echo "</td>";
	#		echo "<td align='left' width='200px' class='Mybody' valign='top'>";
	#echo "</td>";
		echo "</tr>";
	#echo "</table>";
	#echo "<table border=1 width='800px' cellpadding=4>";
		echo "<tr>";
		#echo "<td align='left' width='400px' class='Mybody' valign='top'>";
		#echo "</td>";
			
			echo "<td align='center' width='800px'  class='Mybody' valign='top'>";
			#echo "<br>";
			echo "<INPUT TYPE = 'Submit' Name = 'Submit1' style='width:200px; height:50px; font-size:16px' VALUE = 'Search' />";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
		echo "<td align='center' width='800px'  class='Mybody' valign='top'>";
			echo "<br>";
			echo '<a href="javascript: void(0)" onclick="popup(';
			echo "'http://sqlsrv.domain.initiativelegal.com/mars/newprospect.php')";
			echo '">';

			echo "Add new prospect</a>";
			echo "<br>";
			echo "<br>";
			//echo '<a href="javascript: void(0)" onclick="popup(';
			//echo "'http://sql.initiativelegal.com:35535/mars/test/instantsearch2.php')";
			//echo '">';
			//
			//echo "Try the new MARS instant search</a>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
	
	
	echo "<br>";
	
  	#echo '<a href="javascript: void(0)" onclick="popup(';
	#echo "'http://sql.initiativelegal.com:35535/mars/newprospect.php')";
	#echo '">';
	#echo "<div align='center' class='MyBody'>";
	#echo "Add new prospect</a>";
	#echo "</div>";
	
	

//-----------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------
//---------------------------User input Search header End----------------------------------
//---------------------------User input Search header End----------------------------------
//---------------------------User input Search header End----------------------------------
//-----------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------
?>
</div>
<?PHP



if (empty($sortstring))
 	$sort = 'ORDER BY tenantid';
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

//-----------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------
//-----------------------Build SQL Query for table draw start------------------------------
//-----------------------Build SQL Query for table draw start------------------------------
//-----------------------Build SQL Query for table draw start------------------------------
//-----------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------
if ( 'POST' == $_SERVER['REQUEST_METHOD'] )
{
	if (empty($searchnote))
	{

		$new_array = array(
		'tenantid' => '4',
			);
		$tennantid = '4';
		$search = 'tenantid=\'' . $tennantid. '\' AND ';
		if (isset($brand)) $search = $search. 'brand like \'%'.$brand.'%\' AND ';
		if (isset($FirstName)) $search = $search. 'FirstName like \'%'.$FirstName.'%\' AND ';
		if (isset($LastName)) $search = $search. 'LastName like \'%'.$LastName.'%\' AND ';
		if (isset($brandid)) $search = $search. 'brandid like \'%'.$brandid.'%\' AND ';
	  	if (isset($uniqueid)) $search = $search. 'uniqueid like \'%'.$uniqueid.'%\' AND ';
	  	if (isset($barcode)) $search = "$search" . 'barcode like \'%' .$barcode. '%\' AND ';
	  	if (isset($agentfname)) $search = $search. 'agentfname like \'%'.$agentfname.'%\' AND ';
	  	if (isset($agentlname)) $search = $search. 'agentlname like \'%'.$agentlname.'%\' AND ';
	  	if (isset($Street1)) $search = $search. 'Street1 like \'%'.$Street1.'%\' or Street2 like \'%' . "$Street1" . '%\' AND ';
	  	if (isset($Street2)) $search = $search. 'Street2 like \'%'.$Street2.'%\' AND ';
	  	if (isset($City)) $search = $search. 'City like \'%'.$City.'%\' AND ';
	  	if (isset($State)) $search = $search. 'State like \'%'.$State. '%\' AND ';
	  	if (isset($Zipcode)) $search = $search. 'Zipcode like \'%'.$Zipcode.'%\' AND ';
	  	#if (isset($phone1)) $search = $search. 'phone1 like \'%' . "$phone1" . '%\' or phone2 like \'%' . "$phone1" . '%\'AND ';
	  	if (isset($phone1)) $search = $search. 'phone1 like \'%'.$phone1.'%\' or phone2 like \'%'.$phone1.'%\' or phone3 like \'%'.$phone1.'%\' or phone4 like \'%'.$phone1.'%\' or phone5 like \'%'.$phone1.'%\' or phone6 like \'%'.$phone1.'%\' AND ';
	  	#if (isset($phone2)) $search = $search. 'phone2 like \'%' . "$phone2" . '%\' AND ';
	  	if (isset($email)) $search = $search. 'email like \'%'.$email.'%\' AND ';


//$query = "SELECT * FROM 
//( SELECT FirstName,LastName,brandid,uniqueid,
//agentfname,agentlname,Street1,Street2,City,
//State,Zipcode,phone1,phone2,phone3,phone4,email, 
//ROW_NUMBER() OVER (ORDER BY FirstName) 
//as row 
//FROM Status 
//WHERE tenantid='4' AND
//        uniqueid LIKE '%{$q}%'
//        OR
//        brand LIKE '%{$q}%'
//        OR
//        LastName LIKE '%{$q}%'
//        OR
//        FirstName LIKE '%{$q}%'
//        OR
//        phone1 LIKE '%{$q}%'
//        OR
//        phone2 LIKE '%{$q}%'
//        OR
//        email LIKE '%{$q}%'
//        OR
//        Street1 LIKE '%{$q}%'
//        OR
//        Street2 LIKE '%{$q}%'
//        OR
//        City LIKE '%{$q}%'
//        OR
//        State LIKE '%{$q}%'
//        OR
//        Zipcode LIKE '%{$q}%'
//        OR
//        agentlname LIKE '%{$q}%'
//        OR
//        agentfname LIKE '%{$q}%'
//        AND
//        TIME IS NOT NULL ) a 
//WHERE row > 0 and row <= 1000";

		$search = "$search" . 'Time IS NOT NULL';

		$query = "SELECT * FROM
		(SELECT FirstName,LastName,donotcontact,notelog,tenantid,brandid,brand,uniqueid,barcode,agentfname,agentlname,Street1,Street2,City,State,Zipcode,phone1,phone2,email,ROW_NUMBER() OVER (ORDER BY LastName)
		as row FROM status where $search
		) a 
		WHERE row > 0 and row <= 1000 $sort";
		$results = sqlsrv_query($conn,$query);
		$numrowsresults = sqlsrv_num_rows($results);
		$hasrows = sqlsrv_has_rows($results);
		
		$params = array();
		$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
		$stmt = sqlsrv_query( $conn, $query , $params, $options );
		
		$row_count = sqlsrv_num_rows( $stmt );
	}


	if (isset($searchnote))
	{
		#$query = "SELECT FirstName,LastName,brandid,brand,uniqueid,caseid,agentfname,agentlname,Street1,Street2,City,State,Zipcode,phone1,phone2,email FROM status where $searchnote $sort";
		$query = "SELECT * FROM
		(SELECT FirstName,LastName,donotcontact,notelog,tenantid,brandid,brand,uniqueid,barcode,agentfname,agentlname,Street1,Street2,City,State,Zipcode,phone1,phone2,email,ROW_NUMBER() OVER (ORDER BY LastName)
		as row FROM status where $searchnote
		) a 
		WHERE row > 0 and row <= 1000 $sort";
		$results = sqlsrv_query($conn,$query);
		$numrowsresults = sqlsrv_num_rows($results);
		$hasrows = sqlsrv_has_rows($results);
		
		$params = array();
		$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
		$stmt = sqlsrv_query( $conn, $query , $params, $options );
		
		$row_count = sqlsrv_num_rows( $stmt );
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
		if (isset($brand)) $search = "$search" . 'brand like \'%' . "$brand" . '%\' AND ';
		if (isset($FirstName)) $search = "$search" . 'FirstNamelike \'%' . "$FirstName" . '%\' AND ';
		if (isset($LastName)) $search = "$search" . 'LastName like \'%' . "$LastName" . '%\' AND ';
		if (isset($brandid)) $search = "$search" . 'brandid like \'%' . "$brandid" . '%\' AND ';
	  	if (isset($uniqueid)) $search = "$search" . 'uniqueid like \'%' . "$uniqueid" . '%\' AND ';
	  	if (isset($barcode)) $search = "$search" . 'barcode like \'%' . "$barcode" . '%\' AND ';
	  	if (isset($agentfname)) $search = "$search" . 'agentfname like \'%' . "$agentfname" . '%\' AND ';
	  	if (isset($agentlname)) $search = "$search" . 'agentlname like \'%' . "$agentlname" . '%\' AND ';
	  	if (isset($Street1)) $search = "$search" . 'Street1 like \'%' . "$Street1" . '%\' or Street2 like \'%' . "$Street1" . '%\' AND ';
	  	if (isset($Street2)) $search = "$search" . 'Street2 like \'%' . "$Street2" . '%\' AND ';
	  	if (isset($City)) $search = "$search" . 'City like \'%' . "$City" . '%\' AND ';
	  	if (isset($State)) $search = "$search" . 'State like \'%' . "$State" . '%\' AND ';
	  	if (isset($Zipcode)) $search = "$search" . 'Zipcode like \'%' . "$Zipcode" . '%\' AND ';
	  	if (isset($retainerSent)) $search = "$search" . 'retainerSent like \'%' . "$retainerSent" . '%\' AND ';
	  	if (isset($retainerRecieved)) $search = "$search" . 'retainerRecieved like \'%' . "$retainerRecieved" . '%\' AND ';
	  	if (isset($interviewstarted)) $search = "$search" . 'interviewstarted like \'%' . "$interviewstarted" . '%\' AND ';
	  	if (isset($reachedretainerdiscussion)) $search = "$search" . 'reachedretainerdiscussion like \'%' . "$reachedretainerdiscussion" . '%\' AND ';
	  	if (isset($authformreceived)) $search = "$search" . 'authformreceived like \'%' . "$authformreceived" . '%\' AND ';
	  	if (isset($demandcreated)) $search = "$search" . 'demandcreated like \'%' . "$demandcreated" . '%\' AND ';
	  	if (isset($retainernote)) $search = "$search" . 'retainernote like \'%' . "$retainernote" . '%\' AND ';
	  	if (isset($authnote)) $search = "$search" . 'authnote like \'%' . "$authnote" . '%\' AND ';
	  	if (isset($retainerstatus)) $search = "$search" . 'retainerstatus like \'%' . "$retainerstatus" . '%\' AND ';
	  	if (isset($authstatus)) $search = "$search" . 'authstatus like \'%' . "$authstatus" . '%\' AND ';
	  	if (isset($retainercountersignsent)) $search = "$search" . 'retainercountersignsent like \'%' . "$retainercountersignsent" . '%\' AND ';
	  	if (isset($completedonline)) $search = "$search" . 'completedonline like \'%' . "$completedonline" . '%\' AND ';
	  	if (isset($phone1)) $search = "$search" . 'phone1 like \'%' . "$phone1" . '%\' or phone2 like \'%' . "$phone1" . '%\'AND ';
	  	if (isset($phone2)) $search = "$search" . 'phone2 like \'%' . "$phone2" . '%\' AND ';
	  	if (isset($email)) $search = "$search" . 'email like \'%' . "$email" . '%\' AND ';




		$search = "$search" . 'Time IS NOT NULL';

		#$query = "SELECT FirstName,LastName,brandid,brand,uniqueid,caseid,agentfname,agentlname,Street1,Street2,City,State,Zipcode,phone1,phone2,email FROM status where $search $sorstring";
		$query = "SELECT * FROM
		(SELECT FirstName,LastName,donotcontact,notelog,tenantid,brandid,brand,uniqueid,barcode,agentfname,agentlname,Street1,Street2,City,State,Zipcode,phone1,phone2,email,ROW_NUMBER() OVER (ORDER BY LastName)
		as row FROM status where $search 
		) a 
		WHERE row > 0 and row <= 1000 $sort";
		$results = sqlsrv_query($conn,$query);
		$numrowsresults = sqlsrv_num_rows($results);
		$hasrows = sqlsrv_has_rows($results);
		
		$params = array();
		$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
		$stmt = sqlsrv_query( $conn, $query , $params, $options );
		
		$row_count = sqlsrv_num_rows( $stmt );
	}


	if (isset($searchnote))
	{
	#$query = "SELECT FirstName,LastName,brandid,brand,uniqueid,caseid,agentfname,agentlname,Street1,Street2,City,State,Zipcode,phone1,phone2,email FROM status where $searchnote $sorstring";
	$query = "SELECT * FROM
		(SELECT FirstName,LastName,donotcontact,notelog,tenantid,brandid,brand,uniqueid,caseid,agentfname,agentlname,Street1,Street2,City,State,Zipcode,phone1,phone2,email,ROW_NUMBER() OVER (ORDER BY LastName)
		as row FROM status where $searchnote
		) a 
		WHERE row > 0 and row <= 1000 $sort";
    $results = sqlsrv_query($conn,$query);
    $numrowsresults = sqlsrv_num_rows($results);
    $hasrows = sqlsrv_has_rows($results);
    
		$params = array();
		$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
		$stmt = sqlsrv_query( $conn, $query , $params, $options );
		
		$row_count = sqlsrv_num_rows( $stmt );
	}
}
}
if ( $_GET['ani'] !== '' )
{
	if (empty($searchnote))
	{

		$new_array = array(
		'tenantid' => '4',
			);
		$tennantid = '4';
		$search = 'tenantid=\'' . $tennantid. '\' AND ';
		if (isset($brand)) $search = $search. 'brand like \'%'.$brand.'%\' AND ';
		if (isset($FirstName)) $search = $search. 'FirstName like \'%'.$FirstName.'%\' AND ';
		if (isset($LastName)) $search = $search. 'LastName like \'%'.$LastName.'%\' AND ';
		if (isset($brandid)) $search = $search. 'brandid like \'%'.$brandid.'%\' AND ';
	  	if (isset($uniqueid)) $search = $search. 'uniqueid like \'%'.$uniqueid.'%\' AND ';
	  	if (isset($barcode)) $search = "$search" . 'barcode like \'%' .$barcode. '%\' AND ';
	  	if (isset($agentfname)) $search = $search. 'agentfname like \'%'.$agentfname.'%\' AND ';
	  	if (isset($agentlname)) $search = $search. 'agentlname like \'%'.$agentlname.'%\' AND ';
	  	if (isset($Street1)) $search = $search. 'Street1 like \'%'.$Street1.'%\' or Street2 like \'%' . "$Street1" . '%\' AND ';
	  	if (isset($Street2)) $search = $search. 'Street2 like \'%'.$Street2.'%\' AND ';
	  	if (isset($City)) $search = $search. 'City like \'%'.$City.'%\' AND ';
	  	if (isset($State)) $search = $search. 'State like \'%'.$State. '%\' AND ';
	  	if (isset($Zipcode)) $search = $search. 'Zipcode like \'%'.$Zipcode.'%\' AND ';
	  	#if (isset($phone1)) $search = $search. 'phone1 like \'%' . "$phone1" . '%\' or phone2 like \'%' . "$phone1" . '%\'AND ';
	  	if (isset($phone1)) $search = $search. 'phone1 like \'%'.$phone1.'%\' or phone2 like \'%'.$phone1.'%\' or phone3 like \'%'.$phone1.'%\' or phone4 like \'%'.$phone1.'%\' or phone5 like \'%'.$phone1.'%\' or phone6 like \'%'.$phone1.'%\' AND ';
	  	#if (isset($phone2)) $search = $search. 'phone2 like \'%' . "$phone2" . '%\' AND ';
	  	if (isset($email)) $search = $search. 'email like \'%'.$email.'%\' AND ';


//$query = "SELECT * FROM 
//( SELECT FirstName,LastName,brandid,uniqueid,
//agentfname,agentlname,Street1,Street2,City,
//State,Zipcode,phone1,phone2,phone3,phone4,email, 
//ROW_NUMBER() OVER (ORDER BY FirstName) 
//as row 
//FROM Status 
//WHERE tenantid='4' AND
//        uniqueid LIKE '%{$q}%'
//        OR
//        brand LIKE '%{$q}%'
//        OR
//        LastName LIKE '%{$q}%'
//        OR
//        FirstName LIKE '%{$q}%'
//        OR
//        phone1 LIKE '%{$q}%'
//        OR
//        phone2 LIKE '%{$q}%'
//        OR
//        email LIKE '%{$q}%'
//        OR
//        Street1 LIKE '%{$q}%'
//        OR
//        Street2 LIKE '%{$q}%'
//        OR
//        City LIKE '%{$q}%'
//        OR
//        State LIKE '%{$q}%'
//        OR
//        Zipcode LIKE '%{$q}%'
//        OR
//        agentlname LIKE '%{$q}%'
//        OR
//        agentfname LIKE '%{$q}%'
//        AND
//        TIME IS NOT NULL ) a 
//WHERE row > 0 and row <= 1000";

		$search = "$search" . 'Time IS NOT NULL';

		$query = "SELECT * FROM
		(SELECT FirstName,LastName,donotcontact,notelog,tenantid,brandid,brand,uniqueid,barcode,agentfname,agentlname,Street1,Street2,City,State,Zipcode,phone1,phone2,email,ROW_NUMBER() OVER (ORDER BY LastName)
		as row FROM status where $search
		) a 
		WHERE row > 0 and row <= 1000 $sort";
		$results = sqlsrv_query($conn,$query);
		$numrowsresults = sqlsrv_num_rows($results);
		$hasrows = sqlsrv_has_rows($results);
		
		$params = array();
		$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
		$stmt = sqlsrv_query( $conn, $query , $params, $options );
		
		$row_count = sqlsrv_num_rows( $stmt );
	}


	if (isset($searchnote))
	{
		#$query = "SELECT FirstName,LastName,brandid,brand,uniqueid,caseid,agentfname,agentlname,Street1,Street2,City,State,Zipcode,phone1,phone2,email FROM status where $searchnote $sort";
		$query = "SELECT * FROM
		(SELECT FirstName,LastName,donotcontact,notelog,tenantid,brandid,brand,uniqueid,barcode,agentfname,agentlname,Street1,Street2,City,State,Zipcode,phone1,phone2,email,ROW_NUMBER() OVER (ORDER BY LastName)
		as row FROM status where $searchnote
		) a 
		WHERE row > 0 and row <= 1000 $sort";
		$results = sqlsrv_query($conn,$query);
		$numrowsresults = sqlsrv_num_rows($results);
		$hasrows = sqlsrv_has_rows($results);
		
		$params = array();
		$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
		$stmt = sqlsrv_query( $conn, $query , $params, $options );
		
		$row_count = sqlsrv_num_rows( $stmt );
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
		if (isset($brand)) $search = "$search" . 'brand like \'%' . "$brand" . '%\' AND ';
		if (isset($FirstName)) $search = "$search" . 'FirstNamelike \'%' . "$FirstName" . '%\' AND ';
		if (isset($LastName)) $search = "$search" . 'LastName like \'%' . "$LastName" . '%\' AND ';
		if (isset($brandid)) $search = "$search" . 'brandid like \'%' . "$brandid" . '%\' AND ';
	  	if (isset($uniqueid)) $search = "$search" . 'uniqueid like \'%' . "$uniqueid" . '%\' AND ';
	  	if (isset($barcode)) $search = "$search" . 'barcode like \'%' . "$barcode" . '%\' AND ';
	  	if (isset($agentfname)) $search = "$search" . 'agentfname like \'%' . "$agentfname" . '%\' AND ';
	  	if (isset($agentlname)) $search = "$search" . 'agentlname like \'%' . "$agentlname" . '%\' AND ';
	  	if (isset($Street1)) $search = "$search" . 'Street1 like \'%' . "$Street1" . '%\' or Street2 like \'%' . "$Street1" . '%\' AND ';
	  	if (isset($Street2)) $search = "$search" . 'Street2 like \'%' . "$Street2" . '%\' AND ';
	  	if (isset($City)) $search = "$search" . 'City like \'%' . "$City" . '%\' AND ';
	  	if (isset($State)) $search = "$search" . 'State like \'%' . "$State" . '%\' AND ';
	  	if (isset($Zipcode)) $search = "$search" . 'Zipcode like \'%' . "$Zipcode" . '%\' AND ';
	  	if (isset($retainerSent)) $search = "$search" . 'retainerSent like \'%' . "$retainerSent" . '%\' AND ';
	  	if (isset($retainerRecieved)) $search = "$search" . 'retainerRecieved like \'%' . "$retainerRecieved" . '%\' AND ';
	  	if (isset($interviewstarted)) $search = "$search" . 'interviewstarted like \'%' . "$interviewstarted" . '%\' AND ';
	  	if (isset($reachedretainerdiscussion)) $search = "$search" . 'reachedretainerdiscussion like \'%' . "$reachedretainerdiscussion" . '%\' AND ';
	  	if (isset($authformreceived)) $search = "$search" . 'authformreceived like \'%' . "$authformreceived" . '%\' AND ';
	  	if (isset($demandcreated)) $search = "$search" . 'demandcreated like \'%' . "$demandcreated" . '%\' AND ';
	  	if (isset($retainernote)) $search = "$search" . 'retainernote like \'%' . "$retainernote" . '%\' AND ';
	  	if (isset($authnote)) $search = "$search" . 'authnote like \'%' . "$authnote" . '%\' AND ';
	  	if (isset($retainerstatus)) $search = "$search" . 'retainerstatus like \'%' . "$retainerstatus" . '%\' AND ';
	  	if (isset($authstatus)) $search = "$search" . 'authstatus like \'%' . "$authstatus" . '%\' AND ';
	  	if (isset($retainercountersignsent)) $search = "$search" . 'retainercountersignsent like \'%' . "$retainercountersignsent" . '%\' AND ';
	  	if (isset($completedonline)) $search = "$search" . 'completedonline like \'%' . "$completedonline" . '%\' AND ';
	  	if (isset($phone1)) $search = "$search" . 'phone1 like \'%' . "$phone1" . '%\' or phone2 like \'%' . "$phone1" . '%\'AND ';
	  	if (isset($phone2)) $search = "$search" . 'phone2 like \'%' . "$phone2" . '%\' AND ';
	  	if (isset($email)) $search = "$search" . 'email like \'%' . "$email" . '%\' AND ';




		$search = "$search" . 'Time IS NOT NULL';

		#$query = "SELECT FirstName,LastName,brandid,brand,uniqueid,caseid,agentfname,agentlname,Street1,Street2,City,State,Zipcode,phone1,phone2,email FROM status where $search $sorstring";
		$query = "SELECT * FROM
		(SELECT FirstName,LastName,donotcontact,notelog,tenantid,brandid,brand,uniqueid,barcode,agentfname,agentlname,Street1,Street2,City,State,Zipcode,phone1,phone2,email,ROW_NUMBER() OVER (ORDER BY LastName)
		as row FROM status where $search 
		) a 
		WHERE row > 0 and row <= 1000 $sort";
		$results = sqlsrv_query($conn,$query);
		$numrowsresults = sqlsrv_num_rows($results);
		$hasrows = sqlsrv_has_rows($results);
		
		$params = array();
		$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
		$stmt = sqlsrv_query( $conn, $query , $params, $options );
		
		$row_count = sqlsrv_num_rows( $stmt );
	}


	if (isset($searchnote))
	{
	#$query = "SELECT FirstName,LastName,brandid,brand,uniqueid,caseid,agentfname,agentlname,Street1,Street2,City,State,Zipcode,phone1,phone2,email FROM status where $searchnote $sorstring";
	$query = "SELECT * FROM
		(SELECT FirstName,LastName,donotcontact,notelog,tenantid,brandid,brand,uniqueid,caseid,agentfname,agentlname,Street1,Street2,City,State,Zipcode,phone1,phone2,email,ROW_NUMBER() OVER (ORDER BY LastName)
		as row FROM status where $searchnote
		) a 
		WHERE row > 0 and row <= 1000 $sort";
    $results = sqlsrv_query($conn,$query);
    $numrowsresults = sqlsrv_num_rows($results);
    $hasrows = sqlsrv_has_rows($results);
    
		$params = array();
		$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
		$stmt = sqlsrv_query( $conn, $query , $params, $options );
		
		$row_count = sqlsrv_num_rows( $stmt );
	}
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
	echo "Results found: ".$row_count;
	if ($row_count == '1000')
	{
		echo "<br>Max rows set to 1000 try a a more specific query.";
	}
	echo "<br>";
	#echo "Has rows:".$hasrows;
echo "<table border='1' bordercolor='#000000' style='background-color:#FFFFFF' width='650px' cellpadding='2' cellspacing='0'>";
	echo "<form action='Search.php' method='post'>";

	echo "<tr height='15px'>";
#	echo "<th width='30'><font size=2>";
#//caseidsort drop down -- start
#	echo "<select name='Caseidsort'>";
#	if (isset($Caseidsort)) 
#	{
#		if ( $Caseidsort == "YesAsc" ) 
#		{
#			echo "<option value='YesAsc' selected='selected'>Caseid &uarr;</option>";
#		}
#		else
#		{
#			echo "<option value='YesAsc'>Caseid &uarr;</option>";
#		}
#		if ( $Caseidsort == "YesDesc" ) 
#		{
#			echo "<option value='YesDesc' selected='selected'>Caseid &darr;</option>";
#		}
#		else
#		{
#			echo "<option value='YesDesc'>Caseid &darr;</option>";
#		}
#		
#		if ( $Caseidsort == "No" ) 
#		{
#			echo "<option value='No' selected='selected'>Case ID</option>";
#		}
#		else
#		{
#			echo "<option value='No'>Case ID</option>";
#		}
#	}
#	else
#	{
#		echo "<option value='No' selected='selected'>Case ID</option>";
#		echo "<option value='YesAsc'>Case ID &uarr;</option>";
#		echo "<option value='YesDesc'>Case ID &darr;</option>";
#		
#	}
#	echo "</select>";
#//caseidsort drop down -- end
#	echo "</th>";
	echo "<th width='70px'>";
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

	echo "<th width='30px'>";
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
	echo "<th width='100px'>";
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
	echo "<th width='100px'>";
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
	echo "<th width='50px'>";
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
	echo "<th width='50px'>";
//Phone2sort drop down -- START
	echo "<select name='Phone2sort'>";
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
	echo "<th width='50px'>";
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
#	echo "<th width='30'>";
#//Statussort drop down -- START
#	echo "<select name='Statussort'>";
#	if (isset($Statussort)) 
#	{
#		if ( $Statussort == "YesAsc" ) 
#		{
#			echo "<option value='YesAsc' selected='selected'>Status &uarr;</option>";
#		}
#		else
#		{
#			echo "<option value='YesAsc'>Status &uarr;</option>";
#		}
#		if ( $Statussort == "YesDesc" ) 
#		{
#			echo "<option value='YesDesc' selected='selected'>Status &darr;</option>";
#		}
#		else
#		{
#			echo "<option value='YesDesc'>Status &darr;</option>";
#		}
#		
#		if ( $Statussort == "No" ) 
#		{
#			echo "<option value='No' selected='selected'>Status</option>";
#		}
#		else
#		{
#			echo "<option value='No'>Status</option>";
#		}
#	}
#	else
#	{
#		echo "<option value='No' selected='selected'>Status</option>";
#		echo "<option value='YesAsc'>Status &uarr;</option>";
#		echo "<option value='YesDesc'>Status &darr;</option>";
#		
#	}
#	echo "</select>";
#//Statussort drop down -- end
#	echo "</th>";
#	echo "<th width='30'>";
#//Statusdatesort drop down -- START
#	echo "<select name='Statusdatesort'>";
#	if (isset($Statusdatesort)) 
#	{
#		if ( $Statusdatesort == "YesAsc" ) 
#		{
#			echo "<option value='YesAsc' selected='selected'>Status Date &uarr;</option>";
#		}
#		else
#		{
#			echo "<option value='YesAsc'>Status Date &uarr;</option>";
#		}
#		if ( $Statusdatesort == "YesDesc" ) 
#		{
#			echo "<option value='YesDesc' selected='selected'>Status Date &darr;</option>";
#		}
#		else
#		{
#			echo "<option value='YesDesc'>Status Date &darr;</option>";
#		}
#		
#		if ( $Statusdatesort == "No" ) 
#		{
#			echo "<option value='No' selected='selected'>Status Date</option>";
#		}
#		else
#		{
#			echo "<option value='No'>Status Date</option>";
#		}
#	}
#	else
#	{
#		echo "<option value='No' selected='selected'>Status Date</option>";
#		echo "<option value='YesAsc'>Status Date &uarr;</option>";
#		echo "<option value='YesDesc'>Status Date &darr;</option>";
#		
#	}
#	echo "</select>";
#//Statusdatesort drop down -- end
#	echo "</th>";
  	echo "<th width='50px'>";
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
	echo "<th width='30px'>";
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
	echo "<th width='30px'>";
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
	echo "<th width='30px'>";
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
	echo "<th width='30px'>";
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
	echo "<th width='30px'>";
//Agentlastnamesort drop down -- START
	echo "<select name='Agentlastnamesort'>";
	if (isset($Agentlastnamesort)) 
	{
		if ( $Agentlastnamesort == "YesAsc" ) 
		{
			echo "<option value='YesAsc' selected='selected'>CA &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>CA &uarr;</option>";
		}
		if ( $Agentlastnamesort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>CA &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>CA &darr;</option>";
		}
		
		if ( $Agentlastnamesort == "No" ) 
		{
			echo "<option value='No' selected='selected'>CA</option>";
		}
		else
		{
			echo "<option value='No'>CA</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>CA</option>";
		echo "<option value='YesAsc'>CA &uarr;</option>";
		echo "<option value='YesDesc'>CA &darr;</option>";
		
	}
	echo "</select>";
//Agentlastnamesort drop down -- end
	echo "</th>";
	echo "</tr>";
	
	echo "</form>";
}


while($row = sqlsrv_fetch_array($results)){
if ($showcalllog == 'Yes')
{
	echo "<table border='1' bordercolor='#000000' style='background-color:#FFFFFF' width='1200px' cellpadding='2' cellspacing='0'>";
		echo "<tr height='15'>";
#	echo "<th width='30'><font size=2>";
#//caseidsort drop down -- start
#	echo "<select name='Caseidsort'>";
#	if (isset($Caseidsort)) 
#	{
#		if ( $Caseidsort == "YesAsc" ) 
#		{
#			echo "<option value='YesAsc' selected='selected'>Caseid &uarr;</option>";
#		}
#		else
#		{
#			echo "<option value='YesAsc'>Caseid &uarr;</option>";
#		}
#		if ( $Caseidsort == "YesDesc" ) 
#		{
#			echo "<option value='YesDesc' selected='selected'>Caseid &darr;</option>";
#		}
#		else
#		{
#			echo "<option value='YesDesc'>Caseid &darr;</option>";
#		}
#		
#		if ( $Caseidsort == "No" ) 
#		{
#			echo "<option value='No' selected='selected'>Case ID</option>";
#		}
#		else
#		{
#			echo "<option value='No'>Case ID</option>";
#		}
#	}
#	else
#	{
#		echo "<option value='No' selected='selected'>Case ID</option>";
#		echo "<option value='YesAsc'>Case ID &uarr;</option>";
#		echo "<option value='YesDesc'>Case ID &darr;</option>";
#		
#	}
#	echo "</select>";
#//caseidsort drop down -- end
#	echo "</th>";
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
#	echo "<th width='30'>";
#//Statussort drop down -- START
#	echo "<select name='Statussort'>";
#	if (isset($Statussort)) 
#	{
#		if ( $Statussort == "YesAsc" ) 
#		{
#			echo "<option value='YesAsc' selected='selected'>Status &uarr;</option>";
#		}
#		else
#		{
#			echo "<option value='YesAsc'>Status &uarr;</option>";
#		}
#		if ( $Statussort == "YesDesc" ) 
#		{
#			echo "<option value='YesDesc' selected='selected'>Status &darr;</option>";
#		}
#		else
#		{
#			echo "<option value='YesDesc'>Status &darr;</option>";
#		}
#		
#		if ( $Statussort == "No" ) 
#		{
#			echo "<option value='No' selected='selected'>Status</option>";
#		}
#		else
#		{
#			echo "<option value='No'>Status</option>";
#		}
#	}
#	else
#	{
#		echo "<option value='No' selected='selected'>Status</option>";
#		echo "<option value='YesAsc'>Status &uarr;</option>";
#		echo "<option value='YesDesc'>Status &darr;</option>";
#		
#	}
#	echo "</select>";
#//Statussort drop down -- end
#	echo "</th>";
#	echo "<th width='30'>";
#//Statusdatesort drop down -- START
#	echo "<select name='Statusdatesort'>";
#	if (isset($Statusdatesort)) 
#	{
#		if ( $Statusdatesort == "YesAsc" ) 
#		{
#			echo "<option value='YesAsc' selected='selected'>Status Date &uarr;</option>";
#		}
#		else
#		{
#			echo "<option value='YesAsc'>Status Date &uarr;</option>";
#		}
#		if ( $Statusdatesort == "YesDesc" ) 
#		{
#			echo "<option value='YesDesc' selected='selected'>Status Date &darr;</option>";
#		}
#		else
#		{
#			echo "<option value='YesDesc'>Status Date &darr;</option>";
#		}
#		
#		if ( $Statusdatesort == "No" ) 
#		{
#			echo "<option value='No' selected='selected'>Status Date</option>";
#		}
#		else
#		{
#			echo "<option value='No'>Status Date</option>";
#		}
#	}
#	else
#	{
#		echo "<option value='No' selected='selected'>Status Date</option>";
#		echo "<option value='YesAsc'>Status Date &uarr;</option>";
#		echo "<option value='YesDesc'>Status Date &darr;</option>";
#		
#	}
#	echo "</select>";
#//Statusdatesort drop down -- end
#	echo "</th>";
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
			echo "<option value='YesAsc' selected='selected'>CA &uarr;</option>";
		}
		else
		{
			echo "<option value='YesAsc'>CA &uarr;</option>";
		}
		if ( $Agentlastnamesort == "YesDesc" ) 
		{
			echo "<option value='YesDesc' selected='selected'>CA &darr;</option>";
		}
		else
		{
			echo "<option value='YesDesc'>CA &darr;</option>";
		}
		
		if ( $Agentlastnamesort == "No" ) 
		{
			echo "<option value='No' selected='selected'>CA</option>";
		}
		else
		{
			echo "<option value='No'>CA</option>";
		}
	}
	else
	{
		echo "<option value='No' selected='selected'>CA</option>";
		echo "<option value='YesAsc'>CA &uarr;</option>";
		echo "<option value='YesDesc'>CA &darr;</option>";
		
	}
	echo "</select>";
//Agentlastnamesort drop down -- end
	echo "</th>";
	echo "</tr>";
	
	echo "</form>";
}
  echo "<tr height='15' class='MyBody'>";
if ($row['donotcontact'] == 'Yes')
{
	echo "<td><font size='1' color=red>";
	echo '<a href="javascript: void(0)" onclick="popup(';
	echo "'http://sqlsrv.domain.initiativelegal.com/mars/client2.php?uniqueid=".$row['uniqueid']."')";
	echo '">';
	echo $row['uniqueid']."</a></td>";
	echo "<td><font size='1' color=red>" . $row['brand'] . "</td>";
	echo "<td><font size='1' color=red>" . $row['FirstName'] . "</td>";
	echo "<td><font size='1' color=red>" . $row['LastName'] . "</td>";
	echo "<td><font size='1' color=red>" . $row['phone1'] .  "</td>";
	echo "<td><font size='1' color=red>" . $row['phone2'] . "</td>";
	echo "<td><font size='1' color=red>";
	if (isset($row['email']))
	{
		echo   "<a href='mailto:" . $row['email'] . "'><font size='2'>" . $row['email']."</font>" ; 
	}
	echo "</td>";
	echo "<td><font size='1' color=red>" . $row['Street1'] . "</td>";
	echo "<td><font size='1' color=red>" . $row['Street2'] . "</td>";
	echo "<td><font size='1' color=red>" . $row['City'] . "</td>";
	echo "<td><font size='1' color=red>" . $row['State'] . "</td>";
	echo "<td><font size='1' color=red>" . $row['Zipcode'] . "</td>";
	echo "<td><font size='1' color=red>" . $row['agentfname'] . " " . $row['agentlname'] . "</td>";
	echo "</tr>";
}
else
{
	echo "<td><font size=1>";
	echo '<a href="javascript: void(0)" onclick="popup(';
	echo "'http://sqlsrv.domain.initiativelegal.com/mars/client2.php?uniqueid=".$row['uniqueid']."')";
	echo '">';
	echo $row['uniqueid']."</a></td>";
	echo "<td><font size=2>" . $row['brand'] . "</td>";
	echo "<td><font size=2>" . $row['FirstName'] . "</td>";
	echo "<td><font size=2>" . $row['LastName'] . "</td>";
	echo "<td><font size=2>" . $row['phone1'] .  "</td>";
	echo "<td><font size=2>" . $row['phone2'] . "</td>";
	echo "<td><font size=2>";
	if (isset($row['email']))
	{
		echo   "<a href='mailto:" . $row['email'] . "'><font size='2'>" . $row['email']."</font>" ; 
	}
	echo "</td>";
	echo "<td><font size=2>" . $row['Street1'] . "</td>";
	echo "<td><font size=2>" . $row['Street2'] . "</td>";
	echo "<td><font size=2>" . $row['City'] . "</td>";
	echo "<td><font size=2>" . $row['State'] . "</td>";
	echo "<td><font size=2>" . $row['Zipcode'] . "</td>";
	echo "<td><font size=2>" . $row['agentfname'] . " " . $row['agentlname'] . "</td>";
	echo "</tr>";

}
if ($showcalllog == 'Yes')
{
echo "</table>";
}

if ($showcalllog == 'Yes')
{
 echo "<table border='1' bordercolor='#000000' style='background-color:#FFFFFF' width='100%' cellpadding='2' cellspacing='0'>"; 
  echo "<tr>";
  	echo "<th width='100'><font size=2>Interaction</th>";
	echo "<th width='80%'><font size=2>Log</th>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>";
    echo "Add interaction: <form action='Search.php?brandname=$brandname&agentlname=$agentlname' method='post'>";
	
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