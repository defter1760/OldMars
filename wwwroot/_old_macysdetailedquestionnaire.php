<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
   body {
	font-family: 'Open Sans', sans-serif;
	color:#424242;
	background:#ffffff;
	margin:0;
	text-align:center;
	height:100%;
}
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
        width:650px;
        color:#000000 !important;
        font-family:Verdana;
        font-size:12px;
    }
	.HeaderRed {
	color: #900;
}
body {
	font-family: 'Open Sans', sans-serif;
	color:#424242;
	background:#fff;
	margin:0;
	text-align:center;
	height:100%;
}



body, div, h1, h2, h3, h4, h5, h6, p, ul, img {
	margin:0px;
	padding:0px;
}

#main{
	width:100%;
	height:100%;
	text-align:left;
}
#message{
	width:100%;
	margin:0 auto;
	padding-top:20px;
}

#message h3{
	font-weight:24px;
	line-height:28px;
	text-align:center;
	padding-bottom:30px;
	color:#a31c30;
}

#message h4{
	font-size:18px;
	line-height:22px;
	text-decoration:underline;
	color:#424242;
	text-align:center;
	font-weight:normal;
	padding-bottom:25px;
}

#message p{
	font-size:18px;
	line-height:28px;
	padding-bottom:20px;
	width:75%;
	margin:0 auto;
}

#message ul{
	width:80%;
	margin:0 auto;
	list-style-position:outside;

}

#message ul li{
	font-size:18px;
	line-height:24px;
	padding-bottom:30px;
	list-style:none;
	background:url(https://macyslawsuit.com/wp-content/uploads/2012/04/check.png) no-repeat 0 7px;
	padding-left:40px;
	
}


#message a{
	color:#a31c30;
	font-size:20px;
	text-decoration:none;
	font-weight:bold;
}

#message p.disclaimer{
	font-size:15px;
	font-style:italic;
	font-family:Times New Roman, Times, serif;
	font-weight:bold;
	text-align:center;
	padding-top:25px;
	
}

.link{
	display:inline-block;
	background: url(https://macyslawsuit.com/wp-content/uploads/2012/04/link1.png) no-repeat 53px 0;
	width:92px;
	height:31px;
	padding-left:3px;
}
/*this centers the whole document :)*/
div#main {

  width: 650px;

  margin-left: auto;

  margin-right: auto;

  text-align: left;

}
</style>
<head>

<?PHP 

if (isset($_REQUEST['tenantid'])) $tenantid = $_REQUEST['tenantid'];
if (empty($tenantid)) $tenantid = '4';

if (isset($_REQUEST['brandid'])) $brandid = $_REQUEST['brandid'];
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
if (isset($_REQUEST['brand'])) $brand = $_REQUEST['brand'];

if (isset($_REQUEST['1WhoFirstName'])) $FirstName = $_REQUEST['1WhoFirstName'];

if (isset($_REQUEST['1WhoLastName'])) $LastName = $_REQUEST['1WhoLastName'];

if (isset($_REQUEST['3Email'])) $Email = $_REQUEST['3Email'];


if (isset($_REQUEST['3StreetLine1'])) $StreetLine1 = $_REQUEST['3StreetLine1'];


if (isset($_REQUEST['3StreetLine2'])) $StreetLine2 = $_REQUEST['3StreetLine2'];


if (isset($_REQUEST['3HomeCity'])) $HomeCity = $_REQUEST['3HomeCity'];


if (isset($_REQUEST['3HomeState'])) $HomeState = $_REQUEST['3HomeState'];


if (isset($_REQUEST['3Zipcode'])) $Zipcode = $_REQUEST['3Zipcode'];


if (isset($_REQUEST['3Country'])) $Country = $_REQUEST['3Country'];

if (isset($_REQUEST['1CallbackNum'])) 
{	
	$phone1 = $_REQUEST['1CallbackNum'];
	#$phonearea1 = substr("$phone1", 0, 3);
	#$phonerest1 = substr("$phone1", 3, 7);
}
if (isset($_REQUEST['3SecondaryNum'])) 
{	
	$phone2 = $_REQUEST['3SecondaryNum'];
	#$phonearea2 = substr("$phone2", 0, 3);
	#$phonerest2 = substr("$phone2", 3, 7);
}


?>

<?PHP 
$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
$query = "SELECT * FROM Status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid'";
$results = sqlsrv_query($conn,$query);

	while($row = sqlsrv_fetch_array($results)){

		$FirstName = $row['FirstName'];
		$LastName = $row['LastName'];
		$StreetLine1 = $row['Street1'];
		$StreetLine2 = $row['Street2'];
		$HomeCity = $row['City'];
		$HomeState = $row['State'];
		$Zipcode = $row['Zipcode'];
		$Email = $row['email'];
		$phone1 = $row['phone1'];
		$phone2 = $row['phone2'];
		$completedlongformonline = $row['completedlongformonline']; 

  }
if (isset($phone1)) 
{	
	#$phonearea1 = substr("$phone1", 1, 3);
	#$phonerest1 = substr("$phone1", 6, 7);
}
if (isset($phone2)) 
{	
	if ($phone2 == "()-")
	{
		#$phonearea2 = "";
		#$phonerest2 = "";
	}
	else
	{
	#$phonearea2 = substr("$phone2", 1, 3);
	#$phonerest2 = substr("$phone2", 6, 7);
	}
}

#}

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>macysdetailedquestionnaire.php</title>
</head>

<body>
<script language="JavaScript">
  var needToConfirm = true;
  
  window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    if (needToConfirm)
      return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";
  }
</script>
<div id="main">
<?PHP
if ($completedlongformonline == 'Yes')
{
	echo "It looks like you've already completed this form, give us a call if you have any questions.";
}
?> 
<script src="https://static-interlogyllc.netdna-ssl.com/min/g=jotform?3.0.3279http://max.jotfor.ms/min/g=jotform?3.0.2741" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.setConditions([{"action":{"field":"13","visibility":"Show"},"link":"Any","terms":[{"field":"12","operator":"equals","value":"*Other"}],"type":"field"},{"action":{"skipTo":"page-11"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"page"},{"action":{"field":"21","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"18","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"22","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"20","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"19","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"21","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"63","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"64","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"65","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"68","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"67","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"68","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"28","visibility":"Hide"},"link":"Any","terms":[{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"30","visibility":"Hide"},"link":"Any","terms":[{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"31","visibility":"Hide"},"link":"Any","terms":[{"field":"27","operator":"equals","value":"Less than 4 hours"},{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"33","visibility":"Hide"},"link":"Any","terms":[{"field":"32","operator":"equals","value":"No"},{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"33","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"29","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"},{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"30","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"31","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"32","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"},{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"33","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"34","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"},{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"35","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"},{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"30","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"30","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"33","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"34","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"35","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"34","visibility":"Hide"},"link":"Any","terms":[{"field":"32","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"35","visibility":"Hide"},"link":"Any","terms":[{"field":"32","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"34","visibility":"Hide"},"link":"Any","terms":[{"field":"33","operator":"equals","value":"Yes, always"}],"type":"field"},{"action":{"field":"35","visibility":"Hide"},"link":"Any","terms":[{"field":"33","operator":"equals","value":"Yes, always"}],"type":"field"},{"action":{"field":"40","visibility":"Hide"},"link":"Any","terms":[{"field":"39","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"41","visibility":"Hide"},"link":"Any","terms":[{"field":"39","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"42","visibility":"Hide"},"link":"Any","terms":[{"field":"39","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"45","visibility":"Hide"},"link":"Any","terms":[{"field":"44","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"46","visibility":"Hide"},"link":"Any","terms":[{"field":"44","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"47","visibility":"Hide"},"link":"Any","terms":[{"field":"44","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"52","visibility":"Hide"},"link":"Any","terms":[{"field":"51","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"53","visibility":"Hide"},"link":"Any","terms":[{"field":"51","operator":"equals","value":"No"},{"field":"52","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"57","visibility":"Hide"},"link":"Any","terms":[{"field":"56","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"58","visibility":"Hide"},"link":"Any","terms":[{"field":"56","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"64","visibility":"Hide"},"link":"Any","terms":[{"field":"63","operator":"equals","value":"Laid Off or Fired"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"65","visibility":"Hide"},"link":"Any","terms":[{"field":"64","operator":"equals","value":"No"},{"field":"22","operator":"equals","value":"Yes"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"66","visibility":"Hide"},"link":"Any","terms":[{"field":"64","operator":"equals","value":"No"},{"field":"65","operator":"equals","value":"Yes"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"67","visibility":"Hide"},"link":"Any","terms":[{"field":"65","operator":"equals","value":"Yes"},{"field":"64","operator":"equals","value":"Yes"},{"field":"65","operator":"equals","value":"No"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"68","visibility":"Hide"},"link":"Any","terms":[{"field":"65","operator":"equals","value":"Yes"},{"field":"64","operator":"equals","value":"Yes"},{"field":"65","operator":"equals","value":"No"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"63","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"89","visibility":"Show"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"74","visibility":"Hide"},"link":"Any","terms":[{"field":"72","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"75","visibility":"Hide"},"link":"Any","terms":[{"field":"72","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"76","visibility":"Hide"},"link":"Any","terms":[{"field":"72","operator":"equals","value":"Yes"}],"type":"field"}]);
   JotForm.init(function(){
      $('input_18').hint(' $8.00/hour');
      JotForm.setCalendar("19");
      JotForm.setCalendar("21");
      $('input_53').spinner({ imgPath:'https://jotform.us/images/', width: '60', maxValue:'', minValue:'', allowNegative: false, addAmount: 5, value:'10' });
      $('input_74').spinner({ imgPath:'https://jotform.us/images/', width: '60', maxValue:'', minValue:'', allowNegative: false, addAmount: 1, value:'0' });
   });
</script>
<link href="https://static-interlogyllc.netdna-ssl.com/min/g=formCss?3.0.2741" rel="stylesheet" type="text/css" />
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
        width:690px;
        color:Black !important;
        font-family:Verdana;
        font-size:12px;
    }
</style>

<form class="jotform-form" action="database_write_MacysFull.php" method="post" enctype="multipart/form-data" name="form_20599278470161" id="20599278470161" accept-charset="utf-8">
  <input type="hidden" name="formID" value="20599278470161" />
  <div class="form-all">
    <ul class="form-section">
      <li class="form-line" id="id_17">
        <div id="cid_17" class="form-input-wide">
          <div id="text_17" class="form-html">
<!--<table width='650px' align='center'>
<tr>
<td align='center'>
<img src='http://sql.initiativelegal.com:35535/whitelogo.png'>
<br><br>
<h2><u>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</u></h2>
</td>
</tr>
</table>-->

<div id="main">
<div id="message">
<h4>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h4>
<h3>ONLINE INTERVIEW REGARDING YOUR POTENTIAL WAGE AND HOUR CLAIMS AGAINST MACY'S</h3>
<ul>
<li>The following questions are designed to provide us with more detailed information about your potential wage and hour claims against Macy's.  Please complete all required questions accurately and truthfully, to the best of your recollection.  This interview should take between 15-20 minutes to complete. </li>
</ul>
<p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to the outcome of any case.</p>
</div>
</div>
            <p class="MsoNormal"><span style="font-size: 12.0pt; line-height: 115%;"><br /></span>
            </p>
          </div>
        </div>
      </li>
      <li id="cid_1" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_1" class="form-header">
            Contact Information		-	Interview Section 1 of 10
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_3">
        <label class="form-label-left" id="label_3" for="input_3">
          Full Name<span class="form-required">*</span>
        </label>
        <div id="cid_3" class="form-input"><span class="form-sub-label-container">
<?PHP
echo "<input class='form-textbox validate[required]' type='text' size='10' name='1WhoFirstName' id='first_3' value='".$FirstName."'/>";
?>
            <label class="form-sub-label" for="first_3" id="sublabel_first"> First Name </label></span><span class="form-sub-label-container">
<?PHP echo "<input class='form-textbox validate[required]' type='text' size='15' name='1WhoLastName' id='last_3' value='".$LastName."'/>";
?>            <label class="form-sub-label" for="last_3" id="sublabel_last"> Last Name </label></span>
        </div>
      </li>
      <li class="form-line" id="id_4">
        <label class="form-label-left" id="label_4" for="input_4">
          Phone Number<span class="form-required">*</span>
        </label>
        <div id="cid_4" class="form-input"><!--<span class="form-sub-label-container">-->
<?PHP
//echo "<input class='form-textbox validate[required]' type='tel' name='1CallbackNumArea' id='input_4_area' size='3' value='".$phonearea1."'>";
?>
            <!----->
            <!--<label class="form-sub-label" for="input_4_area" id="sublabel_area"> Area Code </label></span>--><span class="form-sub-label-container">
<?PHP
echo "<input class='form-textbox validate[required]' type='tel' name='1CallbackNum' id='input_4_phone' size='8' value='".$phone1."'>";
?>
            <label class="form-sub-label" for="input_4_phone" id="sublabel_phone"> Phone Number </label></span>
        </div>
      </li>
      <li class="form-line" id="id_6">
        <label class="form-label-left" id="label_6" for="input_6"> Alternate Phone Number </label>
        <div id="cid_6" class="form-input"><span class="form-sub-label-container">
<?PHP #echo "<input class='form-textbox' type='tel' name='3SecondaryNumArea' id='input_6_area' size='3' value='".$phonearea2."'>";
?>
            <!-----><!--<label class="form-sub-label" for="input_6_area" id="sublabel_area"> Area Code </label>--></span><span class="form-sub-label-container">
<?PHP echo "<input class='form-textbox' type='tel' name='3SecondaryNum' id='input_6_phone' size='8' value='".$phone2."'>";
?>
            <label class="form-sub-label" for="input_6_phone" id="sublabel_phone"> Phone Number </label></span>
        </div>
      </li>
      <li class="form-line" id="id_5">
        <label class="form-label-left" id="label_5" for="input_5">
          E-mail<span class="form-required">*</span>
        </label>
        <div id="cid_5" class="form-input">
<?PHP echo "<input type='email' class='form-textbox validate[required, Email]' id='input_5' name='3Email' size='30' value='".$Email."'/>";
?>
          <br>
<?PHP echo "<input type='email' class='form-textbox validate[Email_Confirm]' id='input_5_confirm' style='margin-top:8px;' size='30' value='".$Email."'/>";
?>        </div>
      </li>
      <li class="form-line" id="id_7">
        <label class="form-label-left" id="label_7" for="input_7">
          Address<span class="form-required">*</span>
        </label>
        <div id="cid_7" class="form-input">
          <table summary="" class="form-address-table" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="2"><span class="form-sub-label-container">
<?PHP echo "<input class='form-textbox validate[required] form-address-line' type='text' name='3StreetLine1' id='input_7_addr_line1' value='".$StreetLine1."'/>";
?>
                  <label class="form-sub-label" for="input_7_addr_line1" id="sublabel_addr_line1"> Street Address </label></span>
              </td>
            </tr>
            <tr>
              <td colspan="2"><span class="form-sub-label-container">
<?PHP echo "<input class='form-textbox form-address-line' type='text' name='3StreetLine2' id='input_7_addr_line2' size='46' value='".$StreetLine2."'/>";
?>
                  <label class="form-sub-label" for="input_7_addr_line2" id="sublabel_addr_line2"> Street Address Line 2 </label></span>
              </td>
            </tr>
            <tr>
              <td width="50%"><span class="form-sub-label-container">
<?PHP echo "<input class='form-textbox validate[required] form-address-city' type='text' name='3HomeCity' id='input_7_city' size='21' value='".$HomeCity."'/>";
?>
                  <label class="form-sub-label" for="input_7_city" id="sublabel_city"> City </label></span>
              </td>
              <td><span class="form-sub-label-container">
<?PHP echo "<input class='form-textbox validate[required] form-address-state' type='text' name='3HomeState' id='input_7_state' size='22' value='".$HomeState."'/>";
?>                  <label class="form-sub-label" for="input_7_state" id="sublabel_state"> State </label></span>
              </td>
            </tr>
            <tr>
              <td width="50%"><span class="form-sub-label-container">
<?PHP echo "<input class='form-textbox validate[required] form-address-postal' type='text' name='3Zipcode' id='input_7_postal' size='10' value='".$Zipcode."'/>";
?>
                  <label class="form-sub-label" for="input_7_postal" id="sublabel_postal"> Zip Code </label></span>
              </td>
              
            </tr>
          </table>
        </div>
      </li>
      <li id="cid_11" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back" id="form-pagebreak-back_11">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
<?PHP
			if ($completedlongformonline == 'Yes')
				{
					echo "It looks like you've already completed this form, give us a call if you have any questions.";
				}
			else
				{
					echo "<button type='button' class='form-pagebreak-next' id='form-pagebreak-next_11'>";
					echo "Next";
				}
			
?>
                      
            
              
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li id="cid_16" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_16" class="form-header">
            Employment Background		-	Interview Section 2 of 10
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_12">
        <label class="form-label-top" id="label_12" for="input_12">
          What city was the last Macy's you worked in?<span class="form-required">*</span>
        </label>
        <div id="cid_12" class="form-input-wide">
          <select class="form-dropdown validate[required]" style="width:350px" id="input_12" name="1LocCity">
            <option selected="selected" >  </option>
            <option value="*Other"> *Other </option>
	    <option value="Antioch - County East Mall"> Antioch - County East Mall </option>
            <option value="Arcadia - Santa Anita"> Arcadia - Santa Anita </option>
            <option value="Bakersfield - Valley Plaza"> Bakersfield - Valley Plaza </option>
            <option value="Brea - Brea Mall"> Brea - Brea Mall </option>
            <option value="Burbank - Burbank Town Center"> Burbank - Burbank Town Center </option>
            <option value="Canoga Park - Topanga"> Canoga Park - Topanga </option>
            <option value="Capitola - Capitola Mall"> Capitola - Capitola Mall </option>
            <option value="Carlsbad - Plaza Camino Real"> Carlsbad - Plaza Camino Real </option>
            <option value="Cerritos - Los Cerritos Center"> Cerritos - Los Cerritos Center </option>
            <option value="Chula Vista - Chula Vista Center"> Chula Vista - Chula Vista Center </option>
            <option value="Chula Vista - Otay Ranch Town Center"> Chula Vista - Otay Ranch Town Center </option>
            <option value="Citrus Heights - Sunrise Mall"> Citrus Heights - Sunrise Mall </option>
            <option value="City of Industry - Puente Hills Mall"> City of Industry - Puente Hills Mall </option>
            <option value="Concord - Sunvalley Shopping Center"> Concord - Sunvalley Shopping Center </option>
            <option value="Corte Madera - Village at Corte Madera"> Corte Madera - Village at Corte Madera </option>
            <option value="Costa Mesa - South Coast Plaza"> Costa Mesa - South Coast Plaza </option>
            <option value="Culver City - Fox Hills"> Culver City - Fox Hills </option>
            <option value="Cupertino - Cupertino Square Mall"> Cupertino - Cupertino Square Mall </option>
            <option value="Daly City - Serramonte"> Daly City - Serramonte </option>
            <option value="Downey - Stonewood Center"> Downey - Stonewood Center </option>
            <option value="El Cajon - Parkway"> El Cajon - Parkway </option>
            <option value="El Centro - Imperial Valley Mall"> El Centro - Imperial Valley Mall </option>
            <option value="Escondido - North County Fair"> Escondido - North County Fair </option>
            <option value="Fairfield - Solano"> Fairfield - Solano </option>
            <option value="Fresno - Fashion Fair"> Fresno - Fashion Fair </option>
            <option value="Fresno - Furniture"> Fresno - Furniture </option>
            <option value="Fresno - Shops at River Park"> Fresno - Shops at River Park </option>
            <option value="Glendale - Glendale Galleria"> Glendale - Glendale Galleria </option>
            <option value="Hayward - Southland Mall"> Hayward - Southland Mall </option>
            <option value="Irvine - Irvine Spectrum"> Irvine - Irvine Spectrum </option>
            <option value="La Mesa - Grossmont Shopping Center"> La Mesa - Grossmont Shopping Center </option>
            <option value="Laguna Hills - Laguna Hills"> Laguna Hills - Laguna Hills </option>
            <option value="Lakewood - Lakewood Center"> Lakewood - Lakewood Center </option>
            <option value="Los Angeles - Baldwin Hills Crenshaw Plaza"> Los Angeles - Baldwin Hills Crenshaw Plaza </option>
            <option value="Los Angeles - Beverly Center"> Los Angeles - Beverly Center </option>
            <option value="Los Angeles - Broadway Plaza"> Los Angeles - Broadway Plaza </option>
            <option value="Los Angeles - Century City"> Los Angeles - Century City </option>
            <option value="Los Angeles - Eagle Rock Plaza"> Los Angeles - Eagle Rock Plaza </option>
            <option value="Los Angeles - Westside Pavilion"> Los Angeles - Westside Pavilion </option>
            <option value="Manhattan Beach - Manhattan Beach"> Manhattan Beach - Manhattan Beach </option>
            <option value="Mission Viejo - Mission Viejo Mall"> Mission Viejo - Mission Viejo Mall </option>
            <option value="Modesto - Vintage Faire"> Modesto - Vintage Faire </option>
            <option value="Montclair - Montclair Plaza"> Montclair - Montclair Plaza </option>
            <option value="Montebello - Montebello Town Center"> Montebello - Montebello Town Center </option>
            <option value="Monterey - Monterey Furniture"> Monterey - Monterey Furniture </option>
	    <option value="Monterey - Del Monte Center"> Monterey - Del Monte Center </option>
            <option value="Moreno Valley - Moreno Valley Mall"> Moreno Valley - Moreno Valley Mall </option>
            <option value="Newark - NewPark Mall"> Newark - NewPark Mall </option>
            <option value="Newport Beach - Fashion Island"> Newport Beach - Fashion Island </option>
            <option value="North Hollywood - Laurel Plaza"> North Hollywood - Laurel Plaza </option>
            <option value="Northridge - Northridge Fashion Center"> Northridge - Northridge Fashion Center </option>
            <option value="Novato - Navato Furniture"> Novato - Navato Furniture </option>
            <option value="Palm Desert - Palm Desert"> Palm Desert - Palm Desert </option>
            <option value="Palmdale - Antelope Valley Mall"> Palmdale - Antelope Valley Mall </option>
            <option value="Palo Alto - Stanford Shopping Center"> Palo Alto - Stanford Shopping Center </option>
            <option value="Pasadena - Pasadena"> Pasadena - Pasadena </option>
            <option value="Pasadena - Paseo Colorado"> Pasadena - Paseo Colorado </option>
            <option value="Pleasanton - Pleasanton Furniture"> Pleasanton - Pleasanton Furniture </option>
            <option value="Pleasanton - Stoneridge Shopping Center"> Pleasanton - Stoneridge Shopping Center </option>
            <option value="Rancho Cucamonga - Victoria Gardens"> Rancho Cucamonga - Victoria Gardens </option>
            <option value="Redding - Mt. Shasta Mall"> Redding - Mt. Shasta Mall </option>
            <option value="Redondo Beach - South Bay Galleria"> Redondo Beach - South Bay Galleria </option>
            <option value="Richmond - Hilltop"> Richmond - Hilltop </option>
            <option value="Riverside - Galleria at Tyler"> Riverside - Galleria at Tyler </option>
            <option value="Roseville - Galleria at Roseville"> Roseville - Galleria at Roseville </option>
            <option value="Roseville - Roseville Furniture"> Roseville - Roseville Furniture </option>
            <option value="Sacramento -Arden Fair"> Sacramento -Arden Fair </option>
            <option value="Sacramento - Country Club Plaza"> Sacramento - Country Club Plaza </option>
            <option value="Sacramento - Downtown Plaza"> Sacramento - Downtown Plaza </option>
            <option value="Sacramento - Galleria at Roseville"> Sacramento - Galleria at Roseville </option>
            <option value="Salinas – Northridge Mall"> Salinas - Northridge Mall </option>
            <option value="San Bernardino - Inland Center"> San Bernardino - Inland Center </option>
            <option value="San Diego - Fashion Valley"> San Diego - Fashion Valley </option>
            <option value="San Diego - Horton Plaza"> San Diego - Horton Plaza </option>
            <option value="San Diego - Mission Valley"> San Diego - Mission Valley </option>
	    <option value="San Diego – Mission Valley Home"> San Diego - Mission Valley Home </option>
	    <option value="San Diego – Plaza Bonita"> San Diego – Plaza Bonita </option>
            <option value="San Diego - University Town Center"> San Diego - University Town Center </option>
            <option value="San Francisco - Stonestown Galleria"> San Francisco - Stonestown Galleria </option>
            <option value="San Francisco - Union Square"> San Francisco - Union Square </option>
            <option value="San Leandro - Bay Fair"> San Leandro - Bay Fair </option>
            <option value="San Jose - Eastridge"> San Jose - Eastridge </option>
            <option value="San Jose - Oakridge"> San Jose - Oakridge </option>
            <option value="San Mateo - Hillsdale Furniture"> San Mateo - Hillsdale Furniture </option>
            <option value="San Mateo - Hillsdale Shopping Center"> San Mateo - Hillsdale Shopping Center </option>
            <option value="San Rafael - Mall at Northgate"> San Rafael - Mall at Northgate </option>
            <option value="Santa Ana - MainPlace"> Santa Ana - MainPlace </option>
            <option value="Santa Barbara - La Cumbre Plaza"> Santa Barbara - La Cumbre Plaza </option>
            <option value="Santa Barbara - Paseo Nuevo"> Santa Barbara - Paseo Nuevo </option>
            <option value="Santa Clara - Valley Fair"> Santa Clara - Valley Fair </option>
            <option value="Santa Clarita - Valencia Town Center"> Santa Clarita - Valencia Town Center </option>
            <option value="Santa Maria - Santa Maria Town Center"> Santa Maria - Santa Maria Town Center </option>
            <option value="Santa Rosa - Coddingtown Mall"> Santa Rosa - Coddingtown Mall </option>
            <option value="Santa Rosa - Santa Rosa Mall"> Santa Rosa - Santa Rosa Mall </option>
            <option value="Sherman Oaks - Fashion Square"> Sherman Oaks - Fashion Square </option>
            <option value="Simi Valley - Simi Valley Town Center"> Simi Valley - Simi Valley Town Center </option>
            <option value="Stockton - Sherwood Mall"> Stockton - Sherwood Mall </option>
            <option value="Sunnyvale - Sunnyvale Town Center"> Sunnyvale - Sunnyvale Town Center </option>
            <option value="Temecula - Promenade in Temecula"> Temecula - Promenade in Temecula </option>
            <option value="Thousand Oaks - The Oaks"> Thousand Oaks - The Oaks </option>
            <option value="Tracy - West Valley Mall"> Tracy - West Valley Mall </option>
            <option value="Torrance - Del Amo Fashion Center"> Torrance - Del Amo Fashion Center </option>
	    <option value="Torrance – Del Amo Fashion Center Home"> Torrance – Del Amo Fashion Center Home </option>
            <option value="Union City - Union City Furniture Clearance"> Union City - Union City Furniture Clearance </option>
            <option value="Ventura -Pacific View"> Ventura -Pacific View </option>
            <option value="Visalia - Visalia Mall"> Visalia - Visalia Mall </option>
            <option value="Walnut Creek - Broadway Plaza"> Walnut Creek - Broadway Plaza </option>
            <option value="West Covina - West Covina"> West Covina - West Covina </option>
            <option value="Westminster - Westminster Mall"> Westminster - Westminster Mall </option>
            <option value="Woodland Hills - Promenade"> Woodland Hills - Promenade </option>
	    <option value="Woodland Hills – Promenade Furniture"> Woodland Hills – Promenade Furniture </option>
          </select>
        </div>
      </li>
      <li class="form-line" id="id_13">
        <label class="form-label-top" id="label_13" for="input_13">
          * If Other, enter city here:<span class="form-required">*</span>
        </label>
        <div id="cid_13" class="form-input-wide">
          <input type="text" class="form-textbox validate[required]" id="input_13" name="1LocCity2" size="20" />
        </div>
      </li>
      <li class="form-line" id="id_15">
        <label class="form-label-top" id="label_15" for="input_15">
          When you worked for Macy's, were you paid by the hour?<span class="form-required">*</span>
        </label>
        <div id="cid_15" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_15_0" name="4EmployeeHourly" value="Yes" />
              <label for="input_15_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_15_1" name="4EmployeeHourly" value="No" />
              <label for="input_15_1"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_15_2" name="4EmployeeHourly" value="Both hourly and Salaried" />
              <label for="input_15_2"> Both hourly and salaried </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_18">
        <label class="form-label-top" id="label_18" for="input_18">
          What was your most recent hourly rate of pay at Macy's?
        </label>
        <div id="cid_18" class="form-input-wide">
          <input type="text" class="form-textbox" id="input_18" name="4HourlyRate" size="20" />
        </div>
      </li>
      <li class="form-line" id="id_22">
        <label class="form-label-top" id="label_22" for="input_22">
          Are you currently employed at Macy's?<span class="form-required">*</span>
        </label>
        <div id="cid_22" class="form-input-wide">
          <div class="form-multiple-column"><span class="form-radio-item"><input type="radio" class="form-radio validate[required]" id="input_22_0" name="4CurrentlyEmployed" value="Yes" />
              <label for="input_22_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item"><input type="radio" class="form-radio validate[required]" id="input_22_1" name="4CurrentlyEmployed" value="No" />
              <label for="input_22_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_20">
        <div id="cid_20" class="form-input-wide">
          <div id="text_20" class="form-html">
            <p><span style="font-size: small;">What are your dates of employment at Macy&rsquo;s?</span>
            </p>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_19">
        <label class="form-label-left" id="label_19" for="input_19">
          Start date<span class="form-required">*</span>
        </label>
        <div id="cid_19" class="form-input"><span class="form-sub-label-container"><input class="form-textbox validate[required]" id="month_19" name="startdaymonth" type="text" size="2" maxlength="2" value="" /><span class="date-separate">&nbsp;-</span>
            <label class="form-sub-label" for="month_19" id="sublabel_month"> Month </label></span><span class="form-sub-label-container"><input class="noDefault form-textbox validate[required]" id="day_19" name="startdayday" type="text" size="2" maxlength="2" value="" /><span class="date-separate">&nbsp;-</span>
            <label class="form-sub-label" for="day_19" id="sublabel_day"> Day </label></span><span class="form-sub-label-container"><input class="form-textbox validate[required]" id="year_19" name="startdayyear" type="text" size="4" maxlength="4" value="" />
            <label class="form-sub-label" for="year_19" id="sublabel_year"> Year </label></span><span class="form-sub-label-container"><img alt="Pick a Date" id="input_19_pick" src="https://jotform.us/images/calendar.png" align="absmiddle" />
            <label class="form-sub-label" for="input_19_pick"> &nbsp;&nbsp;&nbsp; </label></span>
        </div>
      </li>
      <li class="form-line" id="id_21">
        <label class="form-label-left" id="label_21" for="input_21">
          End Date<span class="form-required">*</span>
        </label>
        <div id="cid_21" class="form-input"><span class="form-sub-label-container"><input class="form-textbox validate[required]" id="month_21" name="formerlastdaymonth" type="text" size="2" maxlength="2" value="" /><span class="date-separate">&nbsp;-</span>
            <label class="form-sub-label" for="month_21" id="sublabel_month"> Month </label></span><span class="form-sub-label-container"><input class="noDefault form-textbox validate[required]" id="day_21" name="formerlastdayday" type="text" size="2" maxlength="2" value="" /><span class="date-separate">&nbsp;-</span>
            <label class="form-sub-label" for="day_21" id="sublabel_day"> Day </label></span><span class="form-sub-label-container"><input class="form-textbox validate[required]" id="year_21" name="formerlastdayyear" type="text" size="4" maxlength="4" value="" />
            <label class="form-sub-label" for="year_21" id="sublabel_year"> Year </label></span><span class="form-sub-label-container"><img alt="Pick a Date" id="input_21_pick" src="https://jotform.us/images/calendar.png" align="absmiddle" />
            <label class="form-sub-label" for="input_21_pick"> &nbsp;&nbsp;&nbsp; </label></span>
        </div>
      </li>
      <li id="cid_25" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back" id="form-pagebreak-back_25">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next" id="form-pagebreak-next_25">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li id="cid_23" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_23" class="form-header">
            Meal breaks		-	Interview Section 3 of 10
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_24">
        <div id="cid_24" class="form-input-wide">
          <div id="text_24" class="form-html">
            <p>
              <p class="MsoListParagraph"><span style="font-size: 12.0pt; line-height: 115%; font-family: " Times New Roman ","serif ";">With certain exceptions, California law requires that: (1) employers provide hourly employees with at least a 30-minute <u>uninterrupted</u> meal break every day in which the employee works more than 6 hours; and (2) employers provide employees who work more than 10 hours in one day with two 30-minute <u>uninterrupted</u> meal breaks.<br><br>For each workday that an employer fails to provide an employee with a required 30-minute uninterrupted meal break, the employee is entitled to recover an additional hour of pay at the employee&rsquo;s regular rate.</span>
              </p>
            </p>
          </div>
        </div>
      </li>
      
      <li class="form-line" id="id_27">
        <label class="form-label-top" id="label_27" for="input_27">
          On average, how many hours was your typical shift?<span class="form-required">*</span>
        </label>
        <div id="cid_27" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_27_0" name="4Category" value="Less than 4 hours" />
              <label for="input_27_0"> Less than 4 hours </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_27_1" name="4Category" value="Between 4 hours to 8 hours" />
              <label for="input_27_1"> Between 4 hours to 8 hours </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_27_2" name="4Category" value="More than 8 hours" />
              <label for="input_27_2"> More than 8 hours </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_27_3" name="4Category" value="10 hours or more" />
              <label for="input_27_3"> 10 hours or more </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_28">
        <label class="form-label-top" id="label_28" for="input_28">
          Did you ever agree to waive your meal breaks? In other words, did you ever agree to not take your meal breaks?<span class="form-required">*</span>
        </label>
        <div id="cid_28" class="form-input-wide">
          <div class="form-single-column">
	  <span class="form-radio-item" style="clear:left;">
	    <input type="radio" class="form-radio validate[required]" id="input_28_0" name="7Cat1MealBreakWaived" value="Always" />
              <label for="input_28_0">
	      Yes, always
	      </label>
	  </span>
	  <span class="clearfix">
	  </span>
	  <span class="form-radio-item" style="clear:left;">
	    <input type="radio" class="form-radio validate[required]" id="input_28_0" name="7Cat1MealBreakWaived" value="Sometimes" />
              <label for="input_28_0">
	      Yes, sometimes
	      </label>
	  </span>
	  <span class="clearfix">
	  </span>
	  <span class="form-radio-item" style="clear:left;">
	  <input type="radio" class="form-radio validate[required]" id="input_28_1" name="7Cat1MealBreakWaived" value="Never" />
              <label for="input_28_1"> No, never </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_28_2" name="7Cat1MealBreakWaived" value="I dont remember" />
              <label for="input_28_2"> I don't remember </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_29">
        <label class="form-label-top" id="label_29" for="input_29">
          Were you ever unable to take at least a 30-minute <u>uninterrupted</u> meal break when you worked shifts of more than 5 hours?<span class="form-required">*</span>
        </label>
        <div id="cid_29" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_29_0" name="7MealWhenWorkingBetween5and6hours" value="Yes" />
              <label for="input_29_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_29_1" name="7MealWhenWorkingBetween5and6hours" value="No" />
              <label for="input_29_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_30">
        <label class="form-label-top" id="label_30" for="input_30">
          How often were you unable to take an uninterrupted 30-minute meal break? (Check the one that best describes your situation.)<span class="form-required">*</span>
        </label>
        <div id="cid_30" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_30_0" name="7MealBreakMissedCat1Freq" value="Everyday" />
              <label for="input_30_0"> Everyday </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_30_1" name="7MealBreakMissedCat1Freq" value="Several times a week" />
              <label for="input_30_1"> Several times a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_30_2" name="7MealBreakMissedCat1Freq" value="Once a week" />
              <label for="input_30_2"> Once a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_30_3" name="7MealBreakMissedCat1Freq" value="Once a month" />
              <label for="input_30_3"> Once a month </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_31">
        <label class="form-label-top" id="label_31" for="input_31">
          Why did you miss meal breaks?<span class="form-required">*</span>
        </label>
        <div id="cid_31" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_31_0" name="7MealBreakMissedCat1Why" value="Employer demands (e.g., understaffed, not allowed by supervisor, too busy)" />
              <label for="input_31_0"> Employer demands (e.g., understaffed, not allowed by supervisor, too busy) </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_31_1" name="7MealBreakMissedCat1Why" value="I did not want to take a meal break" />
              <label for="input_31_1"> I did not want to take a meal break </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_32">
        <label class="form-label-top" id="label_32" for="input_32">
          Did you ever work shifts of more than 10 hours while working for Macy's?<span class="form-required">*</span>
        </label>
        <div id="cid_32" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_32_0" name="7EverMoreThan10" value="Yes" />
              <label for="input_32_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_32_1" name="7EverMoreThan10" value="No" />
              <label for="input_32_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_33">
        <label class="form-label-top" id="label_33" for="input_33">
          Were you able to take 2 uninterrupted 30-minute meal breaks when you worked shifts of more than 10 hours?<span class="form-required">*</span>
        </label>
        <div id="cid_33" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_33_0" name="7Cat3DidGetSecondMealBreak" value="Yes, always" />
              <label for="input_33_0"> Yes, always </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_33_1" name="7Cat3DidGetSecondMealBreak" value="Sometimes" />
              <label for="input_33_1"> Sometimes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_33_2" name="7Cat3DidGetSecondMealBreak" value="No" />
              <label for="input_33_2"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_33_3" name="7Cat3DidGetSecondMealBreak" value="I dont remember" />
              <label for="input_33_3"> I don't remember </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_34">
        <label class="form-label-top" id="label_34" for="input_34">
          How often were you unable to take both of your 30-minute meal breaks when you worked more than 10 hours in a day?<span class="form-required">*</span>
        </label>
        <div id="cid_34" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_34_0" name="7Cat3Missed2ndMealBreakOften" value="Everyday" />
              <label for="input_34_0"> Everyday </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_34_1" name="7Cat3Missed2ndMealBreakOften" value="Several times a week" />
              <label for="input_34_1"> Several times a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_34_2" name="7Cat3Missed2ndMealBreakOften" value="Once a week" />
              <label for="input_34_2"> Once a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_34_3" name="7Cat3Missed2ndMealBreakOften" value="Once a month" />
              <label for="input_34_3"> Once a month </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_35">
        <label class="form-label-top" id="label_35" for="input_35">
          Did you receive an additional hour of pay on those occasions you were unable to take an uninterrupted 30-minute meal break?<span class="form-required">*</span>
        </label>
        <div id="cid_35" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_35_0" name="7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay" value="Yes" />
              <label for="input_35_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_35_1" name="7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay" value="No" />
              <label for="input_35_1"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_35_2" name="7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay" value="I dont know" />
              <label for="input_35_2"> I don't know </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li id="cid_37" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back" id="form-pagebreak-back_37">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next" id="form-pagebreak-next_37">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li id="cid_36" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_36" class="form-header">
            Rest breaks		-	Interview Section 4 of 10
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_38">
        <div id="cid_38" class="form-input-wide">
          <div id="text_38" class="form-html">
            <p>
              <p class="MsoListParagraph" style="margin-left: 0in; mso-add-space: auto;"><span style="font-size: 12.0pt; line-height: 115%; font-family: " Times New Roman ","serif ";">With certain exceptions, California law also requires that employers allow employees to take <u>at least</u> a 10-minute
                  <em>
                    uninterrupted
                  </em>
                  rest break for every 4 hours worked.&nbsp; For each day an employer prevents, stops, or interrupts a required 10-minute rest break, the employee is entitled to recover an additional hour of pay at the employee&rsquo;s regular rate of pay.</span>
              </p>
            </p>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_39">
        <label class="form-label-top" id="label_39" for="input_39">
          Were you ever unable to take at least a 10-minute uninterrupted rest break for every 4 hours worked in a day?<span class="form-required">*</span>
        </label>
        <div id="cid_39" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_39_0" name="8RestEverMissed" value="Yes" />
              <label for="input_39_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_39_1" name="8RestEverMissed" value="No" />
              <label for="input_39_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_40">
        <label class="form-label-top" id="label_40" for="input_40">
          How often were you unable to take at least a 10-minute uninterrupted rest break after working 4 hours?<span class="form-required">*</span>
        </label>
        <div id="cid_40" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_40_0" name="8HowOftenMissRest" value="Once a month" />
              <label for="input_40_0"> Once a month </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_40_1" name="8HowOftenMissRest" value="Once a week" />
              <label for="input_40_1"> Once a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_40_2" name="8HowOftenMissRest" value="Several times a week" />
              <label for="input_40_2"> Several times a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_40_3" name="8HowOftenMissRest" value="Every day" />
              <label for="input_40_3"> Every day </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_41">
        <label class="form-label-top" id="label_41" for="input_41">
          Why would you miss your rest breaks?<span class="form-required">*</span>
        </label>
        <div id="cid_41" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_41_0" name="8WhyMiss10MinRest" value="Employer demands (e.g., understaffed, not allowed by supervisor, too busy)" />
              <label for="input_41_0"> Employer demands (e.g., understaffed, not allowed by supervisor, too busy) </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_41_1" name="8WhyMiss10MinRest" value="I did not want to take a rest break" />
              <label for="input_41_1"> I did not want to take a rest break </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_42">
        <label class="form-label-top" id="label_42" for="input_42">
          If you ever missed a 10-minute uninterrupted rest break, were you paid an additional hour of pay on each occasion that this occurred?<span class="form-required">*</span>
        </label>
        <div id="cid_42" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_42_0" name="8ExtraHourPay" value="Yes, always" />
              <label for="input_42_0"> Yes, always </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_42_1" name="8ExtraHourPay" value="Sometimes" />
              <label for="input_42_1"> Sometimes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_42_2" name="8ExtraHourPay" value="No" />
              <label for="input_42_2"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_42_3" name="8ExtraHourPay" value="I don't remember" />
              <label for="input_42_3"> I don't remember </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li id="cid_49" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back" id="form-pagebreak-back_49">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next" id="form-pagebreak-next_49">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li id="cid_43" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_43" class="form-header">
            Bag Check		-	Interview Section 5 of 10
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_44">
        <label class="form-label-top" id="label_44" for="input_44">
          When you were leaving the store for a meal break or at the end of your shift, were you required to have your personal bag checked before you could leave?<span class="form-required">*</span>
        </label>
        <div id="cid_44" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_44_0" name="9BagsChecksYesNo" value="Yes, and I was off the clock during the bag check" />
              <label for="input_44_0"> Yes, and I was off the clock during the bag check </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_44_1" name="9BagsChecksYesNo" value="Yes, and I was on the clock during the bag check" />
              <label for="input_44_1"> Yes, and I was on the clock during the bag check </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_44_2" name="9BagsChecksYesNo" value="No" />
              <label for="input_44_2"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_45">
        <label class="form-label-top" id="label_45" for="input_45">
          How often were your bags checked?<span class="form-required">*</span>
        </label>
        <div id="cid_45" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_45_0" name="9BagsCheckedEverytimeLeaving" value="Once a month" />
              <label for="input_45_0"> Once a month </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_45_1" name="9BagsCheckedEverytimeLeaving" value="Once a week" />
              <label for="input_45_1"> Once a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_45_2" name="9BagsCheckedEverytimeLeaving" value="Several times a week" />
              <label for="input_45_2"> Several times a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_45_3" name="9BagsCheckedEverytimeLeaving" value="Every shift" />
              <label for="input_45_3"> Every shift </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_46">
        <label class="form-label-top" id="label_46" for="input_46">
          Did you have to wait for your co-workers to have their belongings checked before you could leave?<span class="form-required">*</span>
        </label>
        <div id="cid_46" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_46_0" name="9BagsCheckedWait" value="Yes" />
              <label for="input_46_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_46_1" name="9BagsCheckedWait" value="No" />
              <label for="input_46_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_47">
        <label class="form-label-top" id="label_47" for="input_47">
          Approximately, how long would you have to wait to complete the entire bag check process before you could leave the store?<span class="form-required">*</span>
        </label>
        <div id="cid_47" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_47_0" name="9BagsCheckedDuration" value="1 or 2 minutes" />
              <label for="input_47_0"> 1 or 2 minutes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_47_1" name="9BagsCheckedDuration" value="About 5 minutes" />
              <label for="input_47_1"> About 5 minutes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_47_2" name="9BagsCheckedDuration" value="About 10 minutes" />
              <label for="input_47_2"> About 10 minutes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_47_3" name="9BagsCheckedDuration" value="More than 10 minutes" />
              <label for="input_47_3"> More than 10 minutes </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li id="cid_50" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back" id="form-pagebreak-back_50">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next" id="form-pagebreak-next_50">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li id="cid_48" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_48" class="form-header">
            Closing Shift		-	Interview Section 6 of 10
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_51">
        <label class="form-label-top" id="label_51" for="input_51">
          Did you ever work the closing shift at Macy's?<span class="form-required">*</span>
        </label>
        <div id="cid_51" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_51_0" name="10EverWorkClosingShift" value="Yes" />
              <label for="input_51_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_51_1" name="10EverWorkClosingShift" value="No" />
              <label for="input_51_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_52">
        <label class="form-label-top" id="label_52" for="input_52">
          After you had clocked out, did you have to wait to leave the store at the end of your shift?<span class="form-required">*</span>
        </label>
        <div id="cid_52" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_52_0" name="10WaitForMgrToPhysicallyAfterClockedOut" value="Yes, I had to wait for my fellow employees before I could leave" />
              <label for="input_52_0"> Yes, I had to wait for my fellow employees before I could leave </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_52_1" name="10WaitForMgrToPhysicallyAfterClockedOut" value="Yes, I had to wait for a manager or supervisor to let me out of the store" />
              <label for="input_52_1"> Yes, I had to wait for a manager or supervisor to let me out of the store </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_52_2" name="10WaitForMgrToPhysicallyAfterClockedOut" value="Both" />
              <label for="input_52_2"> Both </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_52_3" name="10WaitForMgrToPhysicallyAfterClockedOut" value="No" />
              <label for="input_52_3"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_53">
        <label class="form-label-top" id="label_53" for="input_53">
          Approximately, how long would you have to wait? In minutes:<span class="form-required">*</span>
        </label>
        <div id="cid_53" class="form-input-wide">
          <input type="number" id="input_53" name="10HowLongWaitToLeave" />
        </div>
      </li>
      <li id="cid_60" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back" id="form-pagebreak-back_60">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next" id="form-pagebreak-next_60">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li id="cid_54" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_54" class="form-header">
            Overtime		-	Interview Section 7 of 10
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_55">
        <div id="cid_55" class="form-input-wide">
          <div id="text_55" class="form-html">
            <p>
              <p class="MsoListParagraph" style="margin-left: 0in; mso-add-space: auto;"><span style="font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 115%; font-family: " Times New Roman ","serif "; mso-bidi-font-family: "Times New Roman "; mso-bidi-theme-font: minor-bidi;">Under California law, employers are required to pay employees at least the current minimum wage for all hours worked.&nbsp; If employees are required to perform work-related tasks either before clocking-in or after clocking-out, the employee is entitled to compensation for such off-the-clock work.&nbsp; In addition, if an employee works more than 8 hours in a single day or more than 40 hours in a week, the employee is entitled to 1&frac12; times their regular hourly rate for those hours worked after
                  8 hours in a single day and/or 40 hours in a week.&nbsp; If an employee works more than 12 hours in a single day, the employee is entitled to double-time pay for those hours worked after 12 hours.</span>
              </p>
            </p>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_56">
        <label class="form-label-top" id="label_56" for="input_56">
          Did you ever perform work-related tasks before clocking-in or after clocking-out for which you believe you were not paid?<span class="form-required">*</span>
        </label>
        <div id="cid_56" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_56_0" name="11EverWorkOffClock" value="Yes" />
              <label for="input_56_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_56_1" name="11EverWorkOffClock" value="No" />
              <label for="input_56_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_57">
        <label class="form-label-top" id="label_57" for="input_57">
          On average, how many minutes a week would you perform work-related tasks while you were off the clock?<span class="form-required">*</span>
        </label>
        <div id="cid_57" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_57_0" name="11OffClockMinutesPerWeek" value="10 minutes or less a week" />
              <label for="input_57_0"> 10 minutes or less a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_57_1" name="11OffClockMinutesPerWeek" value="Between 15 and 30 minutes a week" />
              <label for="input_57_1"> Between 15 and 30 minutes a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_57_2" name="11OffClockMinutesPerWeek" value="Between 30 minutes and 1 hour a week" />
              <label for="input_57_2"> Between 30 minutes and 1 hour a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_57_3" name="11OffClockMinutesPerWeek" value="More than an hour a week" />
              <label for="input_57_3"> More than an hour a week </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_58">
        <label class="form-label-top" id="label_58" for="input_58">
          If you ever worked overtime (worked more than 8 hours in a single day and/or more than 40 hours in a workweek), were you paid 1½ times your hourly rate of pay for those overtime hours?<span class="form-required">*</span>
        </label>
        <div id="cid_58" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_58_0" name="11EverNotPaidOT" value="Yes" />
              <label for="input_58_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_58_1" name="11EverNotPaidOT" value="No" />
              <label for="input_58_1"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_58_2" name="11EverNotPaidOT" value="Not applicable (I never worked more than 8 hours in a day or more than 40 hours in a week, even on holidays" />
              <label for="input_58_2"> Not applicable (I never worked more than 8 hours in a day or more than 40 hours in a week, even on holidays) </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li id="cid_61" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back" id="form-pagebreak-back_61">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next" id="form-pagebreak-next_61">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li id="cid_59" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_59" class="form-header">
            Final Wages		-	Interview Section 8 of 10
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_62">
        <div id="cid_62" class="form-input-wide">
          <div id="text_62" class="form-html">
            <p>
              <p class="MsoListParagraph" style="margin-left: 0in; mso-add-space: auto;"><span style="font-size: 12.0pt; line-height: 115%; font-family: " Times New Roman ","serif ";">Under California law, all wages due must be paid at the time of termination of employment, unless the employee quits without giving at least 72 hours&rsquo; notice, in which case the employer must pay the employee&rsquo;s final wages within 72 hours of quitting.</span>
              </p>
            </p>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_89">
        <div id="cid_89" class="form-input-wide">
          <div id="text_89" class="form-html">
            <p>
              You previously indicated you are still employed by Macy's please click next to continue to the next section.
            </p>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_63">
        <label class="form-label-top" id="label_63" for="input_63">
          Were you terminated (laid-off or fired) or did you quit your employment with Macy's?<span class="form-required">*</span>
        </label>
        <div id="cid_63" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_63_0" name="12TermType" value="Laid Off or Fired" />
              <label for="input_63_0"> Laid Off or Fired </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_63_1" name="12TermType" value="Quit" />
              <label for="input_63_1"> Quit </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_64">
        <label class="form-label-top" id="label_64" for="input_64">
          If you quit, did you provide at least 72 hours' notice before quitting?<span class="form-required">*</span>
        </label>
        <div id="cid_64" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_64_0" name="12SeventyTwoHoursOrLess" value="Yes" />
              <label for="input_64_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_64_1" name="12SeventyTwoHoursOrLess" value="No" />
              <label for="input_64_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_65">
        <label class="form-label-top" id="label_65" for="input_65">
          If you were laid-off or you quit after giving at least 72 hours' notice, did you receive all your final paycheck on your last day of work?<span class="form-required">*</span>
        </label>
        <div id="cid_65" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_65_0" name="12DidYouGetFinalCheckOnLastDay" value="Yes" />
              <label for="input_65_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_65_1" name="12DidYouGetFinalCheckOnLastDay" value="No" />
              <label for="input_65_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_66">
        <label class="form-label-top" id="label_66" for="input_66">
          How long after you ended your employment for Macy's did you receive your final paycheck?<span class="form-required">*</span>
        </label>
        <div id="cid_66" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_66_0" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="Between 2-4 days" />
              <label for="input_66_0"> Between 2-4 days </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_66_1" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="Between 5-7 days" />
              <label for="input_66_1"> Between 5-7 days </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_66_2" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="Between 1 and 2 weeks" />
              <label for="input_66_2"> Between 1 and 2 weeks </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_66_3" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="Between 2 and 4 weeks" />
              <label for="input_66_3"> Between 2 and 4 weeks </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_66_4" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="More than a month" />
              <label for="input_66_4"> More than a month </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_67">
        <label class="form-label-top" id="label_67" for="input_67">
          If you quit without providing at least 72 hours' notice, did you receive your final paycheck within 72 hours of quitting?<span class="form-required">*</span>
        </label>
        <div id="cid_67" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_67_0" name="12SeventyTwoHoursOrLess" value="Yes" />
              <label for="input_67_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_67_1" name="12SeventyTwoHoursOrLess" value="No" />
              <label for="input_67_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_68">
        <label class="form-label-top" id="label_68" for="input_68">
          How long after you stopped working for Macy's did you receive your final paycheck?<span class="form-required">*</span>
        </label>
        <div id="cid_68" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_68_0" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="4-7 days" />
              <label for="input_68_0"> 4-7 days </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_68_1" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="Between 1 and 2 weeks" />
              <label for="input_68_1"> Between 1 and 2 weeks </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_68_2" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="Between 2 and 4 weeks" />
              <label for="input_68_2"> Between 2 and 4 weeks </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_68_3" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="More than a month" />
              <label for="input_68_3"> More than a month </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li id="cid_69" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back" id="form-pagebreak-back_69">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next" id="form-pagebreak-next_69">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li id="cid_70" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_70" class="form-header">
            Seating		-	Interview Section 9 of 10
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_71">
        <label class="form-label-top" id="label_71" for="input_71">
          When you worked for Macy's, did the nature of your job require you to stand?<span class="form-required">*</span>
        </label>
        <div id="cid_71" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_71_0" name="14DidYourJobRequireStanding" value="Yes and I was provided with a seat near my work station" />
              <label for="input_71_0"> Yes and I was provided with a seat near my work station </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_71_1" name="14DidYourJobRequireStanding" value="Yes and I was not provided with a seat near my work station" />
              <label for="input_71_1"> Yes and I was not provided with a seat near my work station </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_71_2" name="14DidYourJobRequireStanding" value="No" />
              <label for="input_71_2"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_71_3" name="14DidYourJobRequireStanding" value="Dont Remember" />
              <label for="input_71_3"> I don't remember </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_72">
        <label class="form-label-top" id="label_72" for="input_72">
          Did Macy's ever let you sit in a seat during your work shift? (Example: When you weren't actively engaged in your work duties.)<span class="form-required">*</span>
        </label>
        <div id="cid_72" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_72_0" name="14PermittedToSit" value="Yes" />
              <label for="input_72_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_72_1" name="14PermittedToSit" value="No" />
              <label for="input_72_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_74">
        <label class="form-label-top" id="label_74" for="input_74">
          On average, how many hours were you required to work during a normal shift until you were permitted to sit down?<span class="form-required">*</span>
        </label>
        <div id="cid_74" class="form-input-wide">
          <input type="number" id="input_74" name="14PermittedToSitYesHoursUntilSit" />
        </div>
      </li>
      <li class="form-line" id="id_75">
        <label class="form-label-top" id="label_75" for="input_75">
          Were there any disciplinary consequences if you were to have a seat during your work shift?<span class="form-required">*</span>
        </label>
        <div id="cid_75" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_75_0" name="14Consequences" value="Yes" />
              <label for="input_75_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_75_1" name="14Consequences" value="No" />
              <label for="input_75_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_76">
        <label class="form-label-top" id="label_76" for="input_76">
          Do you think you could have performed your job duties while you were seated?<span class="form-required">*</span>
        </label>
        <div id="cid_76" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_76_0" name="14SittingWouldInterfere" value="Yes" />
              <label for="input_76_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_76_1" name="14SittingWouldInterfere" value="No" />
              <label for="input_76_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li id="cid_77" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back" id="form-pagebreak-back_77">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next" id="form-pagebreak-next_77">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li id="cid_87" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_87" class="form-header">
            Do you have any related documents from your employment at Macy's?
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_78">
        <div id="cid_78" class="form-input-wide">
          <div id="text_78" class="form-html">
            <p class="MsoCommentText"><span style="font-size: 12.0pt;">To further assist us in pursuing your potential wage and hour claims against Macy's, you may provide us with documents from your employment at Macy's. There are five methods you can use to send your documents to our law firm:</span>
            </p>
<p class="MsoCommentText"><br />

<ol style="font-size: 12.0pt;">
<li><span style="font-size: 12.0pt;">You can mail your documents to:</span></li>
<br />
<span style="font-size: 12.0pt;">Initiative Legal Group APC<br />
ATTN: Macy's Lawsuit<br />
1800 Century Park East, 2nd Floor<br />
Los Angeles, CA 90067</span>
<br />
<br />
<li>
<span style="font-size: 12.0pt;">You can scan and e-mail your documents to: <a href="mailto:macyslawsuit@initiativelegal.com">macyslawsuit@initiativelegal.com</a></span>
</li><br />
<li>
<span style="font-size: 12.0pt;">You can fax your documents to: (310) 734-1665</span>
</li><br />
<li>
<span style="font-size: 12.0pt;">You can upload your documents directly from your computer:</span>
<br /><br />

<?PHP
function iframemake($page,$uniqueid,$height,$name,$border)
{
echo "<iframe name='";
echo $name;
echo "' scrolling='auto' width='100%' height='";
echo $height;
echo "' frameborder='".$border."' style='margin:auto;' src='";
echo $page;
echo "?uniqueid=";
echo $uniqueid;
echo "'></iframe>";
}

iframemake('https://DFWMS01.initiativelegal.com/mars/pubdocs.php',$uniqueid,'135px','pubdocs','0')
?>

<!--http://sql.initiativelegal.com:35535/mars/pubdocs.php?uniqueid=B975P34WMQ86LGEX2-->
<!--<label class="form-label-left" id="label_80" for="input_80"> Document 1 </label>

<input class="form-upload" type="file" id="input_80" name="q80_document1" file-accept="pdf, doc, docx, xls, csv, txt, rtf, html, zip, mp3, wma, mpg, flv, avi, jpg, jpeg, png, gif" file-maxsize="10240" />
<br />
<br />
<label class="form-label-left" id="label_79" for="input_79"> Document 2 </label>

<input class="form-upload" type="file" id="input_79" name="q79_document2" file-accept="pdf, doc, docx, xls, csv, txt, rtf, html, zip, mp3, wma, mpg, flv, avi, jpg, jpeg, png, gif" file-maxsize="10240" />
<br />
<br />
<label class="form-label-left" id="label_81" for="input_81"> Document 3 </label>

<input class="form-upload" type="file" id="input_81" name="q81_document3" file-accept="pdf, doc, docx, xls, csv, txt, rtf, html, zip, mp3, wma, mpg, flv, avi, jpg, jpeg, png, gif" file-maxsize="10240" />
<br />
<br />
<label class="form-label-left" id="label_82" for="input_82"> Document 4 </label>

<input class="form-upload" type="file" id="input_82" name="q82_document4" file-accept="pdf, doc, docx, xls, csv, txt, rtf, html, zip, mp3, wma, mpg, flv, avi, jpg, jpeg, png, gif" file-maxsize="10240" />
<br />
<br />
<label class="form-label-left" id="label_83" for="input_83"> Document 5 </label>

<input class="form-upload" type="file" id="input_83" name="q83_document5" file-accept="pdf, doc, docx, xls, csv, txt, rtf, html, zip, mp3, wma, mpg, flv, avi, jpg, jpeg, png, gif" file-maxsize="10240" />
<br />
<br />-->
</li>
<!--<li><p class="MsoCommentText"><span style="font-size: 12.0pt;">You can request a self-addressed stamped envelope by [clicking here]. When we receive your request, we will send you an envelope with instructions on how to mail your documents back to us.</span>
            </p></li>-->
</ol>            
            
           <p class="MsoCommentText"><span style="font-size: 12.0pt;"><i>[Documents received by Initiative Legal Group APC by any of the above methods will be stored confidentially and securely, either electronically or in physical form].</i></span>
            </p> 
</div>
</div>
</li>

      <li class="form-line" id="id_84">
        <div id="cid_84" class="form-input-wide">
          <div id="text_84" class="form-html">

      <li id="cid_86" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back" id="form-pagebreak-back_86">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next" id="form-pagebreak-next_86">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li class="form-line" id="id_88">
        <div id="cid_88" class="form-input-wide">
          <div id="text_88" class="form-html">
            <p>
              <p class="MsoNormal"><span style="font-size: 12.0pt; font-family: " Times New Roman ","serif ";">In the event that the Court declines to allow the pending case against Macy's to proceed as a class action with Initiative Legal Group APC as class counsel, Initiative may elect to pursue your claims on an individual basis through arbitration.  Arbitration agencies may charge a fee to file a case. You may be entitled to a waiver of the associated cost with filing an arbitration in the event that Initiative elects to file your individual case in arbitration.&nbsp;</span>
              </p>
            </p>
          </div>
                    <div id="text_88" class="form-html">
            <p>
              <p class="MsoNormal"><span style="font-size: 12.0pt; font-family: " Times New Roman ","serif ";">To determine if you are eligible, please complete the following two (optional) questions.&nbsp;</span>
              </p>
            </p>
          </div>
                    <div id="text_88" class="form-html">
            <p>
                      <div id="cid_15" class="form-input-wide">
<div class="form-single-column">
<label class="form-label-top" id="label_76" for="input_76">
<span style="font-size: 12.0pt; font-family: " Times New Roman ","serif ";">How many people live in your household, including yourself?</span><span class="form-required">*</span>
</label><br />
<br />
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="HouseHoldCount" value="1" />
<label for="input_15_0"> 1 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="HouseHoldCount" value="2" />
<label for="input_15_0"> 2 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="HouseHoldCount" value="3" />
<label for="input_15_0"> 3 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="HouseHoldCount" value="4" />
<label for="input_15_0"> 4 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="HouseHoldCount" value="5" />
<label for="input_15_0"> 5 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="HouseHoldCount" value="6" />
<label for="input_15_0"> 6 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="HouseHoldCount" value="7" />
<label for="input_15_0"> 7 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="HouseHoldCount" value="8" />
<label for="input_15_0"> 8 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="HouseHoldCount" value="9" />
<label for="input_15_0"> 9 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="HouseHoldCount" value="10" />
<label for="input_15_0"> 10 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="HouseHoldCount" value="Decline" />
<label for="input_15_0"> Decline to answer </label>
</span>
<span class="clearfix"></span>
</div>
</div>
</p>
</p>
</div>
<div id="text_88" class="form-html">
            <label class="form-label-top" id="label_76" for="input_76">
<span style="font-size: 12.0pt; font-family: " Times New Roman ","serif ";">What is your current gross monthly income? </span><span class="form-required">*</span>
</label><br />
<br />
            <p>
              <p class="MsoNormal">
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="GrossIncome" value="2793" />
<label for="input_15_0"> Less than $2,793  </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="GrossIncome" value="2793to3783" />
<label for="input_15_0"> Between $2,793-$3,783  </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="GrossIncome" value="3783to4773" />
<label for="input_15_0"> Between $3,783-$4,773  </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="GrossIncome" value="4773to5763" />
<label for="input_15_0"> Between $4,773- $5,763  </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="GrossIncome" value="5763to6753" />
<label for="input_15_0"> Between $5,763-$6,753  </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="GrossIncome" value="6753to7743" />
<label for="input_15_0"> Between $6,753-$7,743  </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="GrossIncome" value="7743to8733" />
<label for="input_15_0"> Between $7,743-$8,733  </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="GrossIncome" value="8733to9723" />
<label for="input_15_0"> Between $8,733-$9,723  </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio validate[required]" name="GrossIncome" value="Decline" />
<label for="input_15_0">Decline to answer   </label>
</span>
<span class="clearfix"></span> 
              </p>
            </p>
            <p>
<br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br />
<!--<p class="MsoNormal"><span style="font-size: 12.0pt; font-family: " Times New Roman ","serif ";">Thank you for your cooperation and participation. Your case attorney will review the answers you have provided and will contact you if further information is needed.&nbsp;</span>-->
              </p>
            </p>
          </div>
        </div>
      </li>

      <li class="form-line" id="id_2">
        <div id="cid_2" class="form-input-wide">
          <div style="margin-left:156px" class="form-buttons-wrapper">
<?PHP
			if ($completedlongformonline == 'Yes')
				{
					echo "It looks like you've already completed this form, give us a call if you have any questions.";
				}
			else
				{
					#echo "<button id='input_2' type='submit' class='form-submit-button' >";
					echo '<button id="input_2" type="submit"  onclick="needToConfirm = false;" class="form-submit-button">';
				}
			
?>
            
              Submit Form
            </button>
          </div>
        </div>
      </li>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="" />
      </li>
    </ul>
  </div>
  <?PHP
  echo "<input type='hidden' id='simple_spc' name='uniqueid' value='".$uniqueid."' />";
  ?>

</form>
</div>
</html>