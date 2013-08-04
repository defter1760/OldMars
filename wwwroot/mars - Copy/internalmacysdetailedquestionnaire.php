<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
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
require("db.php");
require("ifset.php");
require("uniqueiddata_row.php");
require("functions.php");
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
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
	$phonearea1 = substr("$phone1", 0, 3);
	$phonerest1 = substr("$phone1", 3, 7);
}
if (isset($_REQUEST['3SecondaryNum'])) 
{	
	$phone2 = $_REQUEST['3SecondaryNum'];
	$phonearea2 = substr("$phone2", 0, 3);
	$phonerest2 = substr("$phone2", 3, 7);
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
		$brandid = $row['brandid'];
		$tenantid = $row['tenantid'];
		$brand = $row['brand'];
		$completedlongformonline = $row['completedlongformonline']; 

  }
 
$query = "IF EXISTS(SELECT * FROM data WHERE uniqueid=$uniqueid AND tenantid=4) UPDATE data SET [3Zipcode]='$Zipcode',[3HomeState]='$HomeState',[3HomeCity]='$HomeCity',[3StreetLine2]='$StreetLine2',[3StreetLine1]='$StreetLine1',[3Email]='$Email',[3SecondaryNumber]='$phone2',[1CallBackNum]='$phone1',[1WhoLastName]='$LastName',[1WhoFirstName]='$FirstName' WHERE uniqueid=$uniqueid AND tenantid=4 ELSE INSERT INTO data (uniqueid,[3Zipcode],[3HomeState],[3HomeCity],[3StreetLine2],[3StreetLine1],[3Email],[3SecondaryNumber],[1CallBackNum],[1WhoLastName],[1WhoFirstName],brandid,tenantid,date,time,brand) VALUES ($uniqueid,'$Zipcode','$HomeState','$HomeCity',$StreetLine2,$StreetLine1,$Email,$phone2,$phone1,$LastName,$FirstName,'$brandid','$tenantid','$date','$time','$brand')";

 

    $results = sqlsrv_query($conn,$query);
//if (isset($phone1)) 
//{	
//	$phonearea1 = substr("$phone1", 1, 3);
//	$phonerest1 = substr("$phone1", 6, 7);
//}
//if (isset($phone2)) 
//{	
//	if ($phone2 == "()-")
//	{
//		$phonearea2 = "";
//		$phonerest2 = "";
//	}
//	else
//	{
//	$phonearea2 = substr("$phone2", 1, 3);
//	$phonerest2 = substr("$phone2", 6, 7);
//	}
//}

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
<script src="http://max.jotfor.ms/min/g=jotform?3.0.2741" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.setConditions([{"action":{"field":"13","visibility":"Show"},"link":"Any","terms":[{"field":"12","operator":"equals","value":"*Other"}],"type":"field"},{"action":{"skipTo":"page-11"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"page"},{"action":{"field":"21","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"18","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"22","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"20","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"19","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"21","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"63","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"64","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"65","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"68","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"67","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"68","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"28","visibility":"Hide"},"link":"Any","terms":[{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"30","visibility":"Hide"},"link":"Any","terms":[{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"31","visibility":"Hide"},"link":"Any","terms":[{"field":"27","operator":"equals","value":"Less than 4 hours"},{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"33","visibility":"Hide"},"link":"Any","terms":[{"field":"32","operator":"equals","value":"No"},{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"33","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"29","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"},{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"30","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"31","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"32","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"},{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"33","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"34","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"},{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"35","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"},{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"30","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"30","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"33","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"34","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"35","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"34","visibility":"Hide"},"link":"Any","terms":[{"field":"32","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"35","visibility":"Hide"},"link":"Any","terms":[{"field":"32","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"34","visibility":"Hide"},"link":"Any","terms":[{"field":"33","operator":"equals","value":"Yes, always"}],"type":"field"},{"action":{"field":"35","visibility":"Hide"},"link":"Any","terms":[{"field":"33","operator":"equals","value":"Yes, always"}],"type":"field"},{"action":{"field":"40","visibility":"Hide"},"link":"Any","terms":[{"field":"39","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"41","visibility":"Hide"},"link":"Any","terms":[{"field":"39","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"42","visibility":"Hide"},"link":"Any","terms":[{"field":"39","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"45","visibility":"Hide"},"link":"Any","terms":[{"field":"44","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"46","visibility":"Hide"},"link":"Any","terms":[{"field":"44","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"47","visibility":"Hide"},"link":"Any","terms":[{"field":"44","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"52","visibility":"Hide"},"link":"Any","terms":[{"field":"51","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"53","visibility":"Hide"},"link":"Any","terms":[{"field":"51","operator":"equals","value":"No"},{"field":"52","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"57","visibility":"Hide"},"link":"Any","terms":[{"field":"56","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"58","visibility":"Hide"},"link":"Any","terms":[{"field":"56","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"64","visibility":"Hide"},"link":"Any","terms":[{"field":"63","operator":"equals","value":"Laid Off or Fired"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"65","visibility":"Hide"},"link":"Any","terms":[{"field":"64","operator":"equals","value":"No"},{"field":"22","operator":"equals","value":"Yes"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"66","visibility":"Hide"},"link":"Any","terms":[{"field":"64","operator":"equals","value":"No"},{"field":"65","operator":"equals","value":"Yes"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"67","visibility":"Hide"},"link":"Any","terms":[{"field":"65","operator":"equals","value":"Yes"},{"field":"64","operator":"equals","value":"Yes"},{"field":"65","operator":"equals","value":"No"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"68","visibility":"Hide"},"link":"Any","terms":[{"field":"65","operator":"equals","value":"Yes"},{"field":"64","operator":"equals","value":"Yes"},{"field":"65","operator":"equals","value":"No"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"63","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"89","visibility":"Show"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"74","visibility":"Hide"},"link":"Any","terms":[{"field":"72","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"75","visibility":"Hide"},"link":"Any","terms":[{"field":"72","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"76","visibility":"Hide"},"link":"Any","terms":[{"field":"72","operator":"equals","value":"Yes"}],"type":"field"}]);
   JotForm.init(function(){
      $('input_18').hint(' $8.00/hour');
      JotForm.setCalendar("19");
      JotForm.setCalendar("21");
      $('input_53').spinner({ imgPath:'http://jotform.us/images/', width: '60', maxValue:'', minValue:'', allowNegative: false, addAmount: 5, value:'10' });
      $('input_74').spinner({ imgPath:'http://jotform.us/images/', width: '60', maxValue:'', minValue:'', allowNegative: false, addAmount: 1, value:'0' });
   });
</script>
<link href="http://max.jotfor.ms/min/g=formCss?3.0.2741" rel="stylesheet" type="text/css" />
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

<form class="jotform-form" action="internaldatabase_write_MacysFull.php" method="post" enctype="multipart/form-data" name="form_20599278470161" id="20599278470161" accept-charset="utf-8">
  <input type="hidden" name="formID" value="20599278470161" />
  <div class="form-all">
    <ul class="form-section">
      <li class="form-line" id="id_17">
        <div id="cid_17" class="form-input-wide">
          <div id="text_17" class="form-html">
<table width='650px' align='center'>
<tr>
<td align='center'>
<img src='https://DFWMS01.initiativelegal.com/whitelogo.png'>
<br><br>
<h2><u>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</u></h2>
</td>
</tr>
</table>

            <p class="MsoNormal"><span style="font-size: 12.0pt; line-height: 115%;">The following 45 questions are designed to provide us with more detailed information regarding your work experience at Macy's. The questions will address potential labor violations that may have occurred to you during your employment at Macy's. <strong><u>Please complete all required questions accurately and truthfully, to the best of your recollection.</u></strong> This interview should take between 15-20 minutes to complete.</span>
            </p>
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
        <div id="cid_4" class="form-input"><span class="form-sub-label-container">
<?PHP
echo "<input class='form-textbox validate[required]' type='tel' name='1CallbackNum' id='input_4_phone' size='8' value='".$phone1."'>";
?>
            <label class="form-sub-label" for="input_4_phone" id="sublabel_phone"> Phone Number </label></span>
        </div>
      </li>
      <li class="form-line" id="id_6">
        <label class="form-label-left" id="label_6" for="input_6"> Alternate Phone Number </label>
        <div id="cid_6" class="form-input"><span class="form-sub-label-container">
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
      <!--<li id="cid_11" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back" id="form-pagebreak-back_11">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">-->

                      
            
              
            <!--</button>
          </div>
        </div>
      </li>-->
    <!--</ul>-->
    <!--<ul class="form-section" style="display:none;">-->
      <li id="cid_16" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_16" class="form-header">
            Employment Background		-	Interview Section 2 of 10
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_12">
        <label class="form-label-top" id="label_12" for="input_12">
          What city was the last Macy's you worked in?
        </label>
        <div id="cid_12" class="form-input-wide">
<?PHP
	$query = "SELECT * FROM Data WHERE uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$LocCity = $row['1LocCity']; if (empty($LocCity)) unset($LocCity);
#echo $row['1LocCity']."".$LocCity;	
openselect('350px','input_12','1LocCity','form-dropdown');
//if (!isset($row['1LocCity']))
//{
   echo '<option >  </option>';
option('*Other',$row['1LocCity']);
option('Antioch - County East Mall',$row['1LocCity']);
option('Arcadia - Santa Anita',$row['1LocCity']);
option('Bakersfield - Valley Plaza',$row['1LocCity']);
option('Brea - Brea Mall',$row['1LocCity']);
option('Burbank - Burbank Town Center',$row['1LocCity']);
option('Canoga Park - Topanga',$row['1LocCity']);
option('Capitola - Capitola Mall',$row['1LocCity']);
option('Carlsbad - Plaza Camino Real',$row['1LocCity']);
option('Cerritos - Los Cerritos Center',$row['1LocCity']);
option('Chula Vista - Chula Vista Center',$row['1LocCity']);
option('Chula Vista - Otay Ranch Town Center',$row['1LocCity']);
option('Citrus Heights - Sunrise Mall',$row['1LocCity']);
option('City of Industry - Puente Hills Mall',$row['1LocCity']);
option('Concord - Sunvalley Shopping Center',$row['1LocCity']);
option('Corte Madera - Village at Corte Madera',$row['1LocCity']);
option('Costa Mesa - South Coast Plaza',$row['1LocCity']);
option('Culver City - Fox Hills',$row['1LocCity']);
option('Cupertino - Cupertino Square Mall',$row['1LocCity']);
option('Daly City - Serramonte',$row['1LocCity']);
option('Downey - Stonewood Center',$row['1LocCity']);
option('El Cajon - Parkway',$row['1LocCity']);
option('El Centro - Imperial Valley Mall',$row['1LocCity']);
option('Escondido - North County Fair',$row['1LocCity']);
option('Fairfield - Solano',$row['1LocCity']);
option('Fresno - Fashion Fair',$row['1LocCity']);
option('Fresno - Furniture',$row['1LocCity']);
option('Fresno - Shops at River Park',$row['1LocCity']);
option('Glendale - Glendale Galleria',$row['1LocCity']);
option('Hayward - Southland Mall',$row['1LocCity']);
option('Irvine - Irvine Spectrum',$row['1LocCity']);
option('La Mesa - Grossmont Shopping Center',$row['1LocCity']);
option('Laguna Hills - Laguna Hills',$row['1LocCity']);
option('Lakewood - Lakewood Center',$row['1LocCity']);
option('Los Angeles - Baldwin Hills Crenshaw Plaza',$row['1LocCity']);
option('Los Angeles - Beverly Center',$row['1LocCity']);
option('Los Angeles - Broadway Plaza',$row['1LocCity']);
option('Los Angeles - Century City',$row['1LocCity']);
option('Los Angeles - Eagle Rock Plaza',$row['1LocCity']);
option('Los Angeles - Westside Pavilion',$row['1LocCity']);
option('Manhattan Beach - Manhattan Beach',$row['1LocCity']);
option('Mission Viejo - Mission Viejo Mall',$row['1LocCity']);
option('Modesto - Vintage Faire',$row['1LocCity']);
option('Montclair - Montclair Plaza',$row['1LocCity']);
option('Montebello - Montebello Town Center',$row['1LocCity']);
option('Monterey - Monterey Furniture',$row['1LocCity']);
option('Monterey - Del Monte Center',$row['1LocCity']);
option('Moreno Valley - Moreno Valley Mall',$row['1LocCity']);
option('Newark - NewPark Mall',$row['1LocCity']);
option('Newport Beach - Fashion Island',$row['1LocCity']);
option('North Hollywood - Laurel Plaza',$row['1LocCity']);
option('Northridge - Northridge Fashion Center',$row['1LocCity']);
option('Novato - Navato Furniture',$row['1LocCity']);
option('Palm Desert - Palm Desert',$row['1LocCity']);
option('Palmdale - Antelope Valley Mall',$row['1LocCity']);
option('Palo Alto - Stanford Shopping Center',$row['1LocCity']);
option('Pasadena - Pasadena',$row['1LocCity']);
option('Pasadena - Paseo Colorado',$row['1LocCity']);
option('Pleasanton - Pleasanton Furniture',$row['1LocCity']);
option('Pleasanton - Stoneridge Shopping Center',$row['1LocCity']);
option('Rancho Cucamonga - Victoria Gardens',$row['1LocCity']);
option('Redding - Mt. Shasta Mall',$row['1LocCity']);
option('Redondo Beach - South Bay Galleria',$row['1LocCity']);
option('Richmond - Hilltop',$row['1LocCity']);
option('Riverside - Galleria at Tyler',$row['1LocCity']);
option('Roseville - Galleria at Roseville',$row['1LocCity']);
option('Roseville - Roseville Furniture',$row['1LocCity']);
option('Sacramento - Arden Fair',$row['1LocCity']);
option('Sacramento - Country Club Plaza',$row['1LocCity']);
option('Sacramento - Downtown Plaza',$row['1LocCity']);
option('Sacramento - Galleria at Roseville',$row['1LocCity']);
option('Salinas – Northridge Mall',$row['1LocCity']);
option('San Bernardino - Inland Center',$row['1LocCity']);
option('San Diego - Fashion Valley',$row['1LocCity']);
option('San Diego - Horton Plaza',$row['1LocCity']);
option('San Diego - Mission Valley',$row['1LocCity']);
option('San Diego – Mission Valley Home',$row['1LocCity']);
option('San Diego – Plaza Bonita',$row['1LocCity']);
option('San Diego - University Town Center',$row['1LocCity']);
option('San Francisco - Stonestown Galleria',$row['1LocCity']);
option('San Francisco - Union Square',$row['1LocCity']);
option('San Leandro - Bay Fair',$row['1LocCity']);
option('San Jose - Eastridge',$row['1LocCity']);
option('San Jose - Oakridge',$row['1LocCity']);
option('San Mateo - Hillsdale Furniture',$row['1LocCity']);
option('San Mateo - Hillsdale Shopping Center',$row['1LocCity']);
option('San Rafael - Mall at Northgate',$row['1LocCity']);
option('Santa Ana - MainPlace',$row['1LocCity']);
option('Santa Barbara - La Cumbre Plaza',$row['1LocCity']);
option('Santa Barbara - Paseo Nuevo',$row['1LocCity']);
option('Santa Clara - Valley Fair',$row['1LocCity']);
option('Santa Clarita - Valencia Town Center',$row['1LocCity']);
option('Santa Maria - Santa Maria Town Center',$row['1LocCity']);
option('Sherman Oaks - Fashion Square',$row['1LocCity']);
option('Simi Valley - Simi Valley Town Center',$row['1LocCity']);
option('Stockton - Sherwood Mall',$row['1LocCity']);
option('Sunnyvale - Sunnyvale Town Center',$row['1LocCity']);
option('Temecula - Promenade in Temecula',$row['1LocCity']);
option('Thousand Oaks - The Oaks',$row['1LocCity']);
option('Tracy - West Valley Mall',$row['1LocCity']);
option('Torrance - Del Amo Fashion Center',$row['1LocCity']);
option('Torrance – Del Amo Fashion Center Home',$row['1LocCity']);
option('Union City - Union City Furniture Clearance',$row['1LocCity']);
option('Ventura -Pacific View',$row['1LocCity']);
option('Visalia - Visalia Mall',$row['1LocCity']);
option('Walnut Creek - Broadway Plaza',$row['1LocCity']);
option('West Covina - West Covina',$row['1LocCity']);
option('Westminster - Westminster Mall',$row['1LocCity']);
option('Woodland Hills - Promenade',$row['1LocCity']);
option('Woodland Hills – Promenade Furniture',$row['1LocCity']);
closeselect();
}
?>
        </div>
      </li>
      <li class="form-line" id="id_13">
        <label class="form-label-top" id="label_13" for="input_13">
          * If Other, enter city here:<span class="form-required">*</span>
        </label>
        <div id="cid_13" class="form-input-wide">
          <input type="text" class="form-textbox" id="input_13" name="1LocCity2" size="20" />
        </div>
      </li>
      <li class="form-line" id="id_15">
      
<?PHP

$query = "SELECT [4EmployeeHourly] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "When you worked for Macy's, were you paid by the hour?";

while($row = sqlsrv_fetch_array($results))
   {
   $EmployeeHourly = $row['4EmployeeHourly'];
   }
$radio = array(
    '4EmployeeHourly' => array(
'Yes',
'No',
'Both hourly and salaried'
    )
);
//'Yes',
// 'Several times a week',
// 'Once a week',
// 'Once a month',
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($EmployeeHourly) && $EmployeeHourly == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>      

      </li>
      <li class="form-line" id="id_18">
        <div id="cid_18" class="form-input-wide">

<?PHP


	echo "<font size='2'>";
	if (isset($HourlyRate))
	{
		echo "What was your most recent hourly rate of pay at Macy's?:<br></font><input type='text' style='font-size:14px' size='20' value='".$HourlyRate."' name='4HourlyRate'>";	
	}
	else
	{
		echo "What was your most recent hourly rate of pay at Macy's?:<br></font><input type='text' style='font-size:14px' size='20' name='4HourlyRate'>";
	}
?>
        </div>
      </li>
      <li class="form-line" id="id_15">
      
<?PHP

$query = "SELECT [EntitledToCommissions] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "Were you entitled to or were paid commissions when you worked for Macy’s?";

while($row = sqlsrv_fetch_array($results))
   {
   $EntitledToCommissions = $row['EntitledToCommissions'];
   }
$radio = array(
    'EntitledToCommissions' => array(
'Yes',
'No'
    )
);
//'Yes',
// 'Several times a week',
// 'Once a week',
// 'Once a month',
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($EntitledToCommissions) && $EntitledToCommissions == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>      

      </li>
      <li class="form-line" id="id_15">
      
<?PHP

$query = "SELECT [CommissionStructure] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "What was your commission structure?";

while($row = sqlsrv_fetch_array($results))
   {
   $CommissionStructure = $row['CommissionStructure'];
   }
$radio = array(
    'CommissionStructure' => array(
'Pure Commission',
'Draw Plus Commission',
'Base Plus Commission',
'I don’t remember'


    )
);
//'Yes',
// 'Several times a week',
// 'Once a week',
// 'Once a month',
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($CommissionStructure) && $CommissionStructure == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>      

      </li>       
<li class="form-line" id="id_22">
<?PHP

$query = "SELECT [CommisionRate] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);

while($row = sqlsrv_fetch_array($results))
   {
   $CommisionRate = $row['CommisionRate'];
   }
	echo "<font size='2'>";
	if (isset($CommisionRate))
	{
		echo "What was your rate of commission? <br></font><input type='text' style='font-size:14px' size='20' value='".$HourlyRate."' name='CommisionRate'>";	
	}
	else
	{
		echo "What was your rate of commission? <br></font><input type='text' style='font-size:14px' size='20' name='CommisionRate'>";
	}
?>       
   </li> 
      <li class="form-line" id="id_22">
        <label class="form-label-top" id="label_22" for="input_22">
          Are you currently employed at Macy's?<span class="form-required">*</span>
        </label>
        <div id="cid_22" class="form-input-wide">
<?PHP
	if (isset($CurrentlyEmployed)) 
	{
		if ( $CurrentlyEmployed == 'Yes' ) 
		{
			echo "<INPUT TYPE = 'Radio' Name ='areyoucurrentmacysemployee'  value= 'Yes' checked> Yes ";
		}
		else
		{
			echo "<INPUT TYPE = 'Radio' Name ='areyoucurrentmacysemployee'  value= 'Yes' > Yes ";
		}
		if ( $CurrentlyEmployed == 'No' ) 
		{
			echo "<INPUT TYPE = 'Radio' Name ='areyoucurrentmacysemployee'  value= 'No' checked> No ";
		}
		else
		{
			echo "<INPUT TYPE = 'Radio' Name ='areyoucurrentmacysemployee'  value= 'No' > No ";
		}
	}
	else
	{
		echo "<INPUT TYPE = 'Radio' Name ='areyoucurrentmacysemployee'  value= 'Yes' > Yes ";
		echo "<INPUT TYPE = 'Radio' Name ='areyoucurrentmacysemployee'  value= 'No' > No ";
	}

?>
        </div>
      </li>
      <li class="form-line" id="id_20">
        <div id="cid_20" class="form-input-wide">
          <div id="text_20" class="form-html">
            <p><span style="font-size: small;">What are/were your dates of employment at Macy&rsquo;s?</span>
            </p>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_19">
      <label class="form-label-left" id="label_19" for="input_19">
      Start date<span class="form-required">*</span>
      </label>
      <div id="cid_19" class="form-input">
      <span class="form-sub-label-container">
<?PHP


	echo "<font size='2'>";
	if (isset($startdaymonth))
	{
		echo "</font><input type='text' style='font-size:14px' size='2' value='".$startdaymonth."' name='startdaymonth'>";	
	}
	else
	{
		echo "</font><input type='text' style='font-size:14px' size='2'  name='startdaymonth'>";
	}
?>
<!--      <input class="form-textbox" id="month_19" name="startdaymonth" type="text" size="2" maxlength="2" value="" />-->
      <span class="date-separate">&nbsp;-</span>
      <label class="form-sub-label" for="month_19" id="sublabel_month"> Month </label>
      </span>
      <span class="form-sub-label-container">
<?PHP


	echo "<font size='2'>";
	if (isset($startdayday))
	{
		echo "</font><input type='text' style='font-size:14px' size='2' value='".$startdayday."' name='startdayday'>";	
	}
	else
	{
		echo "</font><input type='text' style='font-size:14px' size='2' name='startdayday'>";
	}
?>      
      <!--<input class="noDefault form-textbox" id="day_19" name="startdayday" type="text" size="2" maxlength="2" value="" />-->
      <span class="date-separate">&nbsp;-</span>
      <label class="form-sub-label" for="day_19" id="sublabel_day"> Day </label>
      </span>
      <span class="form-sub-label-container">
<?PHP


	echo "<font size='2'>";
	if (isset($startdayyear))
	{
		echo "</font><input type='text' style='font-size:14px' size='2' value='".$startdayyear."' name='startdayyear'>";	
	}
	else
	{
		echo "</font><input type='text' style='font-size:14px' size='2' name='startdayyear'>";
	}
?>            
      <label class="form-sub-label" for="year_19" id="sublabel_year"> Year </label>
      </span>
      <span class="form-sub-label-container">
      <label class="form-sub-label" for="input_19_pick"> &nbsp;&nbsp;&nbsp; </label></span>
      </div>
      </li>
      <li class="form-line" id="id_21">
      <label class="form-label-left" id="label_21" for="input_21">
          End Date<span class="form-required">*</span>
      </label>
      <div id="cid_21" class="form-input">
      <span class="form-sub-label-container">
      <?PHP


	echo "<font size='2'>";
	if (isset($formerlastdaymonth))
	{
		echo "</font><input type='text' style='font-size:14px' size='2' value='".$formerlastdaymonth."' name='formerlastdaymonth'>";	
	}
	else
	{
		echo "</font><input type='text' style='font-size:14px' size='2' name='formerlastdaymonth'>";
	}
?>            
<!--<input class="form-textbox" id="month_21" name="formerlastdaymonth" type="text" size="2" maxlength="2" value="" />-->
      <span class="date-separate">&nbsp;-</span>
      <label class="form-sub-label" for="month_21" id="sublabel_month"> Month </label>
      </span>
      <span class="form-sub-label-container">
<?PHP


	echo "<font size='2'>";
	if (isset($formerlastdayday))
	{
		echo "</font><input type='text' style='font-size:14px' size='2' value='".$formerlastdayday."' name='formerlastdayday'>";	
	}
	else
	{
		echo "</font><input type='text' style='font-size:14px' size='2' name='formerlastdayday'>";
	}
?>        
<!--<input class="noDefault form-textbox " id="day_21" name="formerlastdayday" type="text" size="2" maxlength="2" value="" />-->
      <span class="date-separate">&nbsp;-</span>
      <label class="form-sub-label" for="day_21" id="sublabel_day"> Day </label>
      </span>
      <span class="form-sub-label-container">
<?PHP


	echo "<font size='2'>";
	if (isset($formerlastdayyear))
	{
		echo "</font><input type='text' style='font-size:14px' size='2' value='".$formerlastdayyear."' name='formerlastdayyear'>";	
	}
	else
	{
		echo "</font><input type='text' style='font-size:14px' size='2' name='formerlastdayyear'>";
	}
?>            
<!--<input class="form-textbox" id="year_21" name="formerlastdayyear" type="text" size="4" maxlength="4" value="" />
-->      <label class="form-sub-label" for="year_21" id="sublabel_year"> Year </label>
      </span>
      <span class="form-sub-label-container">
      <!--<img alt="Pick a Date" id="input_21_pick" src="http://jotform.us/images/calendar.png" align="absmiddle" />-->
            <label class="form-sub-label" for="input_21_pick"> &nbsp;&nbsp;&nbsp; </label></span>
        </div>
      </li>
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
        </label><br>
<?PHP
if (isset($Category)) 
	{
		if ( $Category == "Less than 4 hours" ) 
		{
			echo "<INPUT TYPE = 'Radio' Name ='4Category'  value= 'Less than 4 hours' checked> Less than 4 hours <br>";
		}
		else
		{
			echo "<INPUT TYPE = 'Radio' Name ='4Category'  value= 'Less than 4 hours' > Less than 4 hours <br>";
		}
		if ( $Category == "Between 4 hours to 8 hours" ) 
		{
			echo "<INPUT TYPE = 'Radio' Name ='4Category'  value= 'Between 4 hours to 8 hours' checked> Between 4 hours to 8 hours <br>";
		}
		else
		{
			echo "<INPUT TYPE = 'Radio' Name ='4Category'  value= 'Between 4 hours to 8 hours' > Between 4 hours to 8 hours <br>";
		}
		if ( $Category == "More than 8 hours" ) 
		{
			echo "<INPUT TYPE = 'Radio' Name ='4Category'  value= 'More than 8 hours' checked> More than 8 hours <br>";
		}
		else
		{
			echo "<INPUT TYPE = 'Radio' Name ='4Category'  value= 'More than 8 hours' > More than 8 hours <br>";
		}
		if ( $Category == "10 hours or more" ) 
		{
			echo "<INPUT TYPE = 'Radio' Name ='4Category'  value= '10 hours or more' checked> 10 hours or more <br>";
		}
		else
		{
			echo "<INPUT TYPE = 'Radio' Name ='4Category'  value= '10 hours or more' > 10 hours or more <br>";
		}
	}
	else
	{
		echo "<INPUT TYPE = 'Radio' Name ='4Category'  value= 'Less than 4 hours' > Less than 4 hours <br>";
		echo "<INPUT TYPE = 'Radio' Name ='4Category'  value= 'Between 4 hours to 8 hours' > Between 4 hours to 8 hours <br>";
		echo "<INPUT TYPE = 'Radio' Name ='4Category'  value= 'More than 8 hours' > More than 8 hours <br>";
		echo "<INPUT TYPE = 'Radio' Name ='4Category'  value= '10 hours or more' > 10 hours or more <br>";
	}

?>
<!--        <div id="cid_27" class="form-input-wide">
          <div class="form-single-column">
	  <span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" id="input_27_0" name="4Category" value="Less than 4 hours" />
         <label for="input_27_0"> Less than 4 hours </label>
	 </span>
	 <span class="clearfix">
	 </span>
	 <span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio " id="input_27_1" name="4Category" value="Between 4 hours to 8 hours" />
	 <label for="input_27_1"> Between 4 hours to 8 hours </label>
	 </span>
	 <span class="clearfix">
	 </span>
	 <span class="form-radio-item" style="clear:left;">
	 <input type="radio" class="form-radio " id="input_27_2" name="4Category" value="More than 8 hours" />
<label for="input_27_2"> More than 8 hours </label>
	 </span>
	 <span class="clearfix">
	 </span>
	 <span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio " id="input_27_3" name="4Category" value="10 hours or more" />
	 <label for="input_27_3"> 10 hours or more </label></span><span class="clearfix"></span>
         </div>
        </div>-->
      </li>
      <li class="form-line" id="id_28">
        <!--<label class="form-label-top" id="label_28" for="input_28">
          Did you ever agree to waive your meal breaks? In other words, did you ever agree to not take your meal breaks?<span class="form-required">*</span>
        </label>-->
        <div id="cid_28" class="form-input-wide">
	<?PHP
//if (isset($Cat1MealBreakWaived)) 
//	{
//		if ( $Cat1MealBreakWaived == 'Always' ) 
//		{
//			echo "<INPUT TYPE = 'Radio' Name ='7Cat1MealBreakWaived'  value= 'Always> Always <br>";
//		}
//		else
//		{
//			echo "<INPUT TYPE = 'Radio' Name ='7Cat1MealBreakWaived'  value= 'Always' > Always <br>";
//		}
//		if ( $Cat1MealBreakWaived == 'Sometimes' ) 
//		{
//			echo "<INPUT TYPE = 'Radio' Name ='7Cat1MealBreakWaived'  value= 'Sometimes' checked> Sometimes <br>";
//		}
//		else
//		{
//			echo "<INPUT TYPE = 'Radio' Name ='7Cat1MealBreakWaived'  value= 'Sometimes' > Sometimes <br>";
//		}
//		if ( $Cat1MealBreakWaived == 'Never' ) 
//		{
//			echo "<INPUT TYPE = 'Radio' Name ='7Cat1MealBreakWaived'  value= 'Never' checked> Never <br>";
//		}
//		else
//		{
//			echo "<INPUT TYPE = 'Radio' Name ='7Cat1MealBreakWaived'  value= 'Never' > Never <br>";
//		}
//		if ( $Cat1MealBreakWaived == 'I dont remember' ) 
//		{
//			echo "<INPUT TYPE = 'Radio' Name ='7Cat1MealBreakWaived'  value= 'I dont remember' checked> I don't remember<br>";
//		}
//		else
//		{
//			echo "<INPUT TYPE = 'Radio' Name ='7Cat1MealBreakWaived'  value= '10 hours or more' > 10 hours or more <br>";
//		}
//	}
//	else
//	{
//		echo "<INPUT TYPE = 'Radio' Name ='7Cat1MealBreakWaived'  value= 'Always' > Always <br>";
//		echo "<INPUT TYPE = 'Radio' Name ='7Cat1MealBreakWaived'  value= 'Sometimes' > Sometimes <br>";
//		echo "<INPUT TYPE = 'Radio' Name ='7Cat1MealBreakWaived'  value= 'Never' > Never <br>";
//		echo "<INPUT TYPE = 'Radio' Name ='7Cat1MealBreakWaived'  value= 'I dont remember' > I dont remember <br>";
//		echo $Cat1MealBreakWaived."<<-";
//	}

$query = "SELECT [7Cat1MealBreakWaived] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
while($row = sqlsrv_fetch_array($results))
   {
   $Cat1MealBreakWaived = $row['7Cat1MealBreakWaived'];
   }
$radio = array(
    '7Cat1MealBreakWaived' => array(
        'Always',
        'Sometimes',
        'Never',
	'I do not remember'
    )
);
$question = "Did you ever agree to waive your meal breaks? <br>In other words, did you ever agree to not take your meal breaks?";
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($Cat1MealBreakWaived) && $Cat1MealBreakWaived == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>
<!--          <div class="form-single-column">
	  <span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio " id="input_28_0" name="7Cat1MealBreakWaived" value="Always" />
              <label for="input_28_0">
	      Yes, always
	      </label>
	  </span>
	  <span class="clearfix">
	  </span>
	  <span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio " id="input_28_0" name="7Cat1MealBreakWaived" value="Sometimes" />
              <label for="input_28_0">
	      Yes, sometimes
	      </label>
	  </span>
	  <span class="clearfix">
	  </span>
	  <span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio " id="input_28_1" name="7Cat1MealBreakWaived" value="Never" />
              <label for="input_28_1"> No, never </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio " id="input_28_2" name="7Cat1MealBreakWaived" value="I dont remember" />
              <label for="input_28_2"> I don't remember </label></span><span class="clearfix"></span>
          </div>-->
        </div>
      </li>
      <li class="form-line" id="id_29">

<?PHP

$query = "SELECT [7MealWhenWorkingBetween5and6hours] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "Were you ever unable to take at least a 30-minute <u>uninterrupted</u> meal break when you worked shifts of more than 5 hours?";

while($row = sqlsrv_fetch_array($results))
   {
   $MealWhenWorkingBetween5and6hours = $row['7MealWhenWorkingBetween5and6hours'];
   }
$radio = array(
    '7MealWhenWorkingBetween5and6hours' => array(
        'Yes',
	'No'
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($MealWhenWorkingBetween5and6hours) && $MealWhenWorkingBetween5and6hours == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>

<!--        <label class="form-label-top" id="label_29" for="input_29">
          Were you ever unable to take at least a 30-minute <u>uninterrupted</u> meal break when you worked shifts of more than 5 hours?<span class="form-required">*</span>
        </label>
        <div id="cid_29" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio " id="input_29_0" name="7MealWhenWorkingBetween5and6hours" value="Yes" />
              <label for="input_29_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio " id="input_29_1" name="7MealWhenWorkingBetween5and6hours" value="No" />
              <label for="input_29_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_30">
<?PHP

$query = "SELECT [7MealBreakMissedCat1Freq] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "How often were you unable to take an uninterrupted 30-minute meal break? (Check the one that best describes your situation.)";

while($row = sqlsrv_fetch_array($results))
   {
   $MealBreakMissedCat1Freq = $row['7MealBreakMissedCat1Freq'];
   }
$radio = array(
    '7MealBreakMissedCat1Freq' => array(
    'Everyday',
    'Several times a week',
    'Once a week',
    'Once a month'
    )
);
//'Yes',
// 'Several times a week',
// 'Once a week',
// 'Once a month',
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($MealBreakMissedCat1Freq) && $MealBreakMissedCat1Freq == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>
<!--        <label class="form-label-top" id="label_30" for="input_30">
          How often were you unable to take an uninterrupted 30-minute meal break? (Check the one that best describes your situation.)<span class="form-required">*</span>
        </label>
        <div id="cid_30" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_30_0" name="7MealBreakMissedCat1Freq" value="Everyday" />
              <label for="input_30_0"> Everyday </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio " id="input_30_1" name="7MealBreakMissedCat1Freq" value="Several times a week" />
              <label for="input_30_1"> Several times a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_30_2" name="7MealBreakMissedCat1Freq" value="Once a week" />
              <label for="input_30_2"> Once a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio " id="input_30_3" name="7MealBreakMissedCat1Freq" value="Once a month" />
              <label for="input_30_3"> Once a month </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_31">
<?PHP

$query = "SELECT [7MealBreakMissedCat1Why] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "Why did you miss meal breaks?";

while($row = sqlsrv_fetch_array($results))
   {
   $MealBreakMissedCat1Why = $row['7MealBreakMissedCat1Why'];
   }
$radio = array(
    '7MealBreakMissedCat1Why' => array(
'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
'I did not want to take a meal break'
    )
);
//'Yes',
// 'Several times a week',
// 'Once a week',
// 'Once a month',
// 'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
// 'I did not want to take a meal break',
//
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($MealBreakMissedCat1Why) && $MealBreakMissedCat1Why == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>      
<!--        <label class="form-label-top" id="label_31" for="input_31">
          Why did you miss meal breaks?<span class="form-required">*</span>
        </label>
        <div id="cid_31" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_31_0" name="7MealBreakMissedCat1Why" value="Employer demands (e.g., understaffed, not allowed by supervisor, too busy)" />
              <label for="input_31_0"> Employer demands (e.g., understaffed, not allowed by supervisor, too busy) </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio " id="input_31_1" name="7MealBreakMissedCat1Why" value="I did not want to take a meal break" />
              <label for="input_31_1"> I did not want to take a meal break </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_32">
<?PHP

$query = "SELECT [7EverMoreThan10] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "Did you ever work shifts of more than 10 hours while working for Macy's?";

while($row = sqlsrv_fetch_array($results))
   {
   $EverMoreThan10 = $row['7EverMoreThan10'];
   }
$radio = array(
    '7EverMoreThan10' => array(
'Yes',
'No'
    )
);
//'Yes',
//'No'
// 'Several times a week',
// 'Once a week',
// 'Once a month',
// 'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
// 'I did not want to take a meal break',
//
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($EverMoreThan10) && $EverMoreThan10 == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>         
<!--        <label class="form-label-top" id="label_32" for="input_32">
          Did you ever work shifts of more than 10 hours while working for Macy's?<span class="form-required">*</span>
        </label>
        <div id="cid_32" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio " id="input_32_0" name="7EverMoreThan10" value="Yes" />
              <label for="input_32_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio " id="input_32_1" name="7EverMoreThan10" value="No" />
              <label for="input_32_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_33">
      
<?PHP

$query = "SELECT [7Cat3DidGetSecondMealBreak] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "Were you able to take 2 uninterrupted 30-minute meal breaks when you worked shifts of more than 10 hours?";

while($row = sqlsrv_fetch_array($results))
   {
   $Cat3DidGetSecondMealBreak = $row['7Cat3DidGetSecondMealBreak'];
   }
$radio = array(
    '7Cat3DidGetSecondMealBreak' => array(
//'Yes',
//'No'
// 'Several times a week',
// 'Once a week',
// 'Once a month',
// 'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
// 'I did not want to take a meal break',
//
'Yes always',
'Sometimes',
'No',
'I do not remember'
    )
);
//'Yes',
//'No'
// 'Several times a week',
// 'Once a week',
// 'Once a month',
// 'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
// 'I did not want to take a meal break',
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($Cat3DidGetSecondMealBreak) && $Cat3DidGetSecondMealBreak == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>         
      
<!--        <label class="form-label-top" id="label_33" for="input_33">
          Were you able to take 2 uninterrupted 30-minute meal breaks when you worked shifts of more than 10 hours?<span class="form-required">*</span>
        </label>
        <div id="cid_33" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio " id="input_33_0" name="7Cat3DidGetSecondMealBreak" value="Yes, always" />
              <label for="input_33_0"> Yes, always </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_33_1" name="7Cat3DidGetSecondMealBreak" value="Sometimes" />
              <label for="input_33_1"> Sometimes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_33_2" name="7Cat3DidGetSecondMealBreak" value="No" />
              <label for="input_33_2"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_33_3" name="7Cat3DidGetSecondMealBreak" value="I dont remember" />
              <label for="input_33_3"> I don't remember </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_34">
      
<?PHP

$query = "SELECT [7Cat3Missed2ndMealBreakOften] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "How often were you unable to take both of your 30-minute meal breaks when you worked more than 10 hours in a day?";

while($row = sqlsrv_fetch_array($results))
   {
   $Cat3Missed2ndMealBreakOften = $row['7Cat3Missed2ndMealBreakOften'];
   }
$radio = array(
    '7Cat3Missed2ndMealBreakOften' => array(
//'Yes',
//'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
// 'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
// 'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
'Everyday',
'Several times a week',
'Once a week',
'Once a month'
    )
);
//'Yes',
//'No'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
// 'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
// 'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($Cat3Missed2ndMealBreakOften) && $Cat3Missed2ndMealBreakOften == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>               
      
<!--        <label class="form-label-top" id="label_34" for="input_34">
          How often were you unable to take both of your 30-minute meal breaks when you worked more than 10 hours in a day?<span class="form-required">*</span>
        </label>
        <div id="cid_34" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_34_0" name="7Cat3Missed2ndMealBreakOften" value="Everyday" />
              <label for="input_34_0"> Everyday </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio " id="input_34_1" name="7Cat3Missed2ndMealBreakOften" value="Several times a week" />
              <label for="input_34_1"> Several times a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio " id="input_34_2" name="7Cat3Missed2ndMealBreakOften" value="Once a week" />
              <label for="input_34_2"> Once a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_34_3" name="7Cat3Missed2ndMealBreakOften" value="Once a month" />
              <label for="input_34_3"> Once a month </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_35">
      
<?PHP

$query = "SELECT [7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "Did you receive an additional hour of pay on those occasions you were unable to take an uninterrupted 30-minute meal break?";

while($row = sqlsrv_fetch_array($results))
   {
   $Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay = $row['7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay'];
   }
$radio = array(
    '7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay' => array(
'Yes',
'No',
'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
// 'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
// 'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
    )
);
//'Yes',
//'No'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
// 'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
// 'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay) && $Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>                     
<!--        <label class="form-label-top" id="label_35" for="input_35">
          Did you receive an additional hour of pay on those occasions you were unable to take an uninterrupted 30-minute meal break?<span class="form-required">*</span>
        </label>
        <div id="cid_35" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_35_0" name="7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay" value="Yes" />
              <label for="input_35_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio " id="input_35_1" name="7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay" value="No" />
              <label for="input_35_1"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio " id="input_35_2" name="7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay" value="I dont know" />
              <label for="input_35_2"> I don't know </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
<!--      <li id="cid_37" class="form-input-wide">
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
      </li>-->
    <!--</ul>-->
    <!--<ul class="form-section" style="display:none;">-->
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
<?PHP

$query = "SELECT [8RestEverMissed] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "Were you ever unable to take at least a 10-minute uninterrupted rest break for every 4 hours worked in a day?";

while($row = sqlsrv_fetch_array($results))
   {
   $RestEverMissed = $row['8RestEverMissed'];
   }
$radio = array(
    '8RestEverMissed' => array(
'Yes',
'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
// 'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
// 'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
    )
);
//'Yes',
//'No'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
// 'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
// 'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($RestEverMissed) && $RestEverMissed == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>         
<!--        <label class="form-label-top" id="label_39" for="input_39">
          Were you ever unable to take at least a 10-minute uninterrupted rest break for every 4 hours worked in a day?<span class="form-required">*</span>
        </label>
        <div id="cid_39" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio " id="input_39_0" name="8RestEverMissed" value="Yes" />
              <label for="input_39_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_39_1" name="8RestEverMissed" value="No" />
              <label for="input_39_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_40">
      
<?PHP

$query = "SELECT [8HowOftenMissRest] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "How often were you unable to take at least a 10-minute uninterrupted rest break after working 4 hours?";

while($row = sqlsrv_fetch_array($results))
   {
   $HowOftenMissRest = $row['8HowOftenMissRest'];
   }
$radio = array(
    '8HowOftenMissRest' => array(
//'Yes',
//'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
// 'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
// 'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
'Everyday',
'Several times a week',
'Once a week',
'Once a month'
    )
);
//'Yes',
//'No'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
// 'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
// 'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($HowOftenMissRest) && $HowOftenMissRest == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>        
      
<!--        <label class="form-label-top" id="label_40" for="input_40">
          How often were you unable to take at least a 10-minute uninterrupted rest break after working 4 hours?<span class="form-required">*</span>
        </label>
        <div id="cid_40" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_40_0" name="8HowOftenMissRest" value="Once a month" />
              <label for="input_40_0"> Once a month </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_40_1" name="8HowOftenMissRest" value="Once a week" />
              <label for="input_40_1"> Once a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_40_2" name="8HowOftenMissRest" value="Several times a week" />
              <label for="input_40_2"> Several times a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_40_3" name="8HowOftenMissRest" value="Every day" />
              <label for="input_40_3"> Every day </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_41">
      
<?PHP

$query = "SELECT [8WhyMiss10MinRest] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "Why would you miss your rest breaks?";

while($row = sqlsrv_fetch_array($results))
   {
   $WhyMiss10MinRest = $row['8WhyMiss10MinRest'];
   }
$radio = array(
    '8WhyMiss10MinRest' => array(
//'Yes',
//'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
 'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
 'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
    )
);
//'Yes',
//'No'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
// 'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
// 'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($WhyMiss10MinRest) && $WhyMiss10MinRest == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>        
      
<!--        <label class="form-label-top" id="label_41" for="input_41">
          Why would you miss your rest breaks?<span class="form-required">*</span>
        </label>
        <div id="cid_41" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_41_0" name="8WhyMiss10MinRest" value="Employer demands (e.g., understaffed, not allowed by supervisor, too busy)" />
              <label for="input_41_0"> Employer demands (e.g., understaffed, not allowed by supervisor, too busy) </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_41_1" name="8WhyMiss10MinRest" value="I did not want to take a rest break" />
              <label for="input_41_1"> I did not want to take a rest break </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_42">
      
<?PHP

$query = "SELECT [8ExtraHourPay] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "If you ever missed a 10-minute uninterrupted rest break, were you paid an additional hour of pay on each occasion that this occurred?";

while($row = sqlsrv_fetch_array($results))
   {
   $ExtraHourPay = $row['8ExtraHourPay'];
   }
$radio = array(
    '8ExtraHourPay' => array(
//'Yes',
//'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
'Yes always',
'Sometimes',
'No',
'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
    )
);
//'Yes',
//'No'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
// 'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
// 'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($ExtraHourPay) && $ExtraHourPay == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>         
<!--        <label class="form-label-top" id="label_42" for="input_42">
          If you ever missed a 10-minute uninterrupted rest break, were you paid an additional hour of pay on each occasion that this occurred?<span class="form-required">*</span>
        </label>
        <div id="cid_42" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_42_0" name="8ExtraHourPay" value="Yes, always" />
              <label for="input_42_0"> Yes, always </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_42_1" name="8ExtraHourPay" value="Sometimes" />
              <label for="input_42_1"> Sometimes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_42_2" name="8ExtraHourPay" value="No" />
              <label for="input_42_2"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_42_3" name="8ExtraHourPay" value="I don't remember" />
              <label for="input_42_3"> I don't remember </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
<!--      <li id="cid_49" class="form-input-wide">
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
      </li>-->
<!--    </ul>-->
<!--    <ul class="form-section" style="display:none;">-->
      <li id="cid_43" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_43" class="form-header">
            Bag Check		-	Interview Section 5 of 10
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_44">
      <?PHP

$query = "SELECT [9BagsChecksYesNo] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "When you were leaving the store for a meal break or at the end of your shift, were you required to have your personal bag checked before you could leave?";

while($row = sqlsrv_fetch_array($results))
   {
   $BagsChecksYesNo = $row['9BagsChecksYesNo'];
   }
$radio = array(
    '9BagsChecksYesNo' => array(
'Yes and I was off the clock during the bag check',
'Yes and I was on the clock during the bag check',
'No'
//'Yes',
//'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
    )
);
//'Yes',
//'No'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
// 'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
// 'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($BagsChecksYesNo) && $BagsChecksYesNo == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>  
        <!--<label class="form-label-top" id="label_44" for="input_44">
          When you were leaving the store for a meal break or at the end of your shift, were you required to have your personal bag checked before you could leave?<span class="form-required">*</span>
        </label>
        <div id="cid_44" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_44_0" name="9BagsChecksYesNo" value="Yes, and I was off the clock during the bag check" />
              <label for="input_44_0"> Yes, and I was off the clock during the bag check </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_44_1" name="9BagsChecksYesNo" value="Yes, and I was on the clock during the bag check" />
              <label for="input_44_1"> Yes, and I was on the clock during the bag check </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_44_2" name="9BagsChecksYesNo" value="No" />
              <label for="input_44_2"> No </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_45">
<?PHP

$query = "SELECT [9BagsCheckedEverytimeLeaving] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "How often were your bags checked?";

while($row = sqlsrv_fetch_array($results))
   {
   $BagsCheckedEverytimeLeaving = $row['9BagsCheckedEverytimeLeaving'];
   }
$radio = array(
    '9BagsCheckedEverytimeLeaving' => array(
//'Yes',
//'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
'Everyday',
'Several times a week',
'Once a week',
'Once a month'
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($BagsCheckedEverytimeLeaving) && $BagsCheckedEverytimeLeaving == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>        
<!--        <label class="form-label-top" id="label_45" for="input_45">
          How often were your bags checked?<span class="form-required">*</span>
        </label>
        <div id="cid_45" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio " id="input_45_0" name="9BagsCheckedEverytimeLeaving" value="Once a month" />
              <label for="input_45_0"> Once a month </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_45_1" name="9BagsCheckedEverytimeLeaving" value="Once a week" />
              <label for="input_45_1"> Once a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_45_2" name="9BagsCheckedEverytimeLeaving" value="Several times a week" />
              <label for="input_45_2"> Several times a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_45_3" name="9BagsCheckedEverytimeLeaving" value="Every shift" />
              <label for="input_45_3"> Every shift </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_46">
      
      <?PHP

$query = "SELECT [9BagsCheckedWait] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "Did you have to wait for your co-workers to have their belongings checked before you could leave?";

while($row = sqlsrv_fetch_array($results))
   {
   $BagsCheckedWait = $row['9BagsCheckedWait'];
   }
$radio = array(
    '9BagsCheckedWait' => array(
'Yes',
'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($BagsCheckedWait) && $BagsCheckedWait == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>     
      
<!--        <label class="form-label-top" id="label_46" for="input_46">
          Did you have to wait for your co-workers to have their belongings checked before you could leave?<span class="form-required">*</span>
        </label>
        <div id="cid_46" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_46_0" name="9BagsCheckedWait" value="Yes" />
              <label for="input_46_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_46_1" name="9BagsCheckedWait" value="No" />
              <label for="input_46_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_47">
      
<?PHP

$query = "SELECT [9BagsCheckedDuration] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "Approximately, how long would you have to wait to complete the entire bag check process before you could leave the store?";

while($row = sqlsrv_fetch_array($results))
   {
   $BagsCheckedDuration = $row['9BagsCheckedDuration'];
   }
$radio = array(
    '9BagsCheckedDuration' => array(
'1 or 2 minutes',
'About 5 minutes',
'About 10 minutes',
'More than 10 minutes',
//'Yes',
//'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($BagsCheckedDuration) && $BagsCheckedDuration == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>  
      
<!--        <label class="form-label-top" id="label_47" for="input_47">
          Approximately, how long would you have to wait to complete the entire bag check process before you could leave the store?<span class="form-required">*</span>
        </label>
        <div id="cid_47" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_47_0" name="9BagsCheckedDuration" value="1 or 2 minutes" />
              <label for="input_47_0"> 1 or 2 minutes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_47_1" name="9BagsCheckedDuration" value="About 5 minutes" />
              <label for="input_47_1"> About 5 minutes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_47_2" name="9BagsCheckedDuration" value="About 10 minutes" />
              <label for="input_47_2"> About 10 minutes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_47_3" name="9BagsCheckedDuration" value="More than 10 minutes" />
              <label for="input_47_3"> More than 10 minutes </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
<!--      <li id="cid_50" class="form-input-wide">
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
      </li>-->
<!--    </ul>-->
<!--    <ul class="form-section" style="display:none;">-->
      <li id="cid_48" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_48" class="form-header">
            Closing Shift		-	Interview Section 6 of 10
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_51">
<?PHP

$query = "SELECT [10EverWorkClosingShift] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "Did you ever work the closing shift at Macy's?";

while($row = sqlsrv_fetch_array($results))
   {
   $EverWorkClosingShift = $row['10EverWorkClosingShift'];
   }
$radio = array(
    '10EverWorkClosingShift' => array(

'Yes',
'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($EverWorkClosingShift) && $EverWorkClosingShift == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>        
      
<!--        <label class="form-label-top" id="label_51" for="input_51">
          Did you ever work the closing shift at Macy's?<span class="form-required">*</span>
        </label>
        <div id="cid_51" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_51_0" name="10EverWorkClosingShift" value="Yes" />
              <label for="input_51_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_51_1" name="10EverWorkClosingShift" value="No" />
              <label for="input_51_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_52">
<?PHP

$query = "SELECT [10WaitForMgrToPhysicallyAfterClockedOut] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "After you had clocked out, did you have to wait to leave the store at the end of your shift?";

while($row = sqlsrv_fetch_array($results))
   {
   $WaitForMgrToPhysicallyAfterClockedOut = $row['10WaitForMgrToPhysicallyAfterClockedOut'];
   }
$radio = array(
    '10WaitForMgrToPhysicallyAfterClockedOut' => array(

//'Yes',
//'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'

'Yes I had to wait for my fellow employees before I could leave',
'Yes I had to wait for a manager or supervisor to let me out of the store',
'Both',
'No'

    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($WaitForMgrToPhysicallyAfterClockedOut) && $WaitForMgrToPhysicallyAfterClockedOut == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>         
<!--        <label class="form-label-top" id="label_52" for="input_52">
          After you had clocked out, did you have to wait to leave the store at the end of your shift?<span class="form-required">*</span>
        </label>
        <div id="cid_52" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_52_0" name="10WaitForMgrToPhysicallyAfterClockedOut" value="Yes, I had to wait for my fellow employees before I could leave" />
              <label for="input_52_0"> Yes, I had to wait for my fellow employees before I could leave </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_52_1" name="10WaitForMgrToPhysicallyAfterClockedOut" value="Yes, I had to wait for a manager or supervisor to let me out of the store" />
              <label for="input_52_1"> Yes, I had to wait for a manager or supervisor to let me out of the store </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_52_2" name="10WaitForMgrToPhysicallyAfterClockedOut" value="Both" />
              <label for="input_52_2"> Both </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_52_3" name="10WaitForMgrToPhysicallyAfterClockedOut" value="No" />
              <label for="input_52_3"> No </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_53">
<?PHP

$query = "SELECT [10HowLongWaitToLeave] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);

while($row = sqlsrv_fetch_array($results))
   {
   $HowLongWaitToLeave = $row['10HowLongWaitToLeave'];
   }
	echo "<font size='2'>";
	if (isset($HowLongWaitToLeave))
	{
		echo "Approximately, how long would you have to wait?:<br></font><input type='text' style='font-size:14px' size='20' value='".$HourlyRate."' name='10HowLongWaitToLeave'>";	
	}
	else
	{
		echo "Approximately, how long would you have to wait?:<br></font><input type='text' style='font-size:14px' size='20' name='10HowLongWaitToLeave'>";
	}
?>      
<!--        <label class="form-label-top" id="label_53" for="input_53">
          Approximately, how long would you have to wait? In minutes:<span class="form-required">*</span>
        </label>
        <div id="cid_53" class="form-input-wide">
          <input type="number" id="input_53" name="10HowLongWaitToLeave" />
        </div>-->
      </li>
<!--      <li id="cid_60" class="form-input-wide">
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
      </li>-->
<!--    </ul>-->
<!--    <ul class="form-section" style="display:none;">-->
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
      
<?PHP

$query = "SELECT [11EverWorkOffClock] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "Did you ever perform work-related tasks before clocking-in or after clocking-out for which you believe you were not paid?";

while($row = sqlsrv_fetch_array($results))
   {
   $EverWorkOffClock = $row['11EverWorkOffClock'];
   }
$radio = array(
    '11EverWorkOffClock' => array(

'Yes',
'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'

    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($EverWorkOffClock) && $EverWorkOffClock == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>         
<!--        <label class="form-label-top" id="label_56" for="input_56">
          Did you ever perform work-related tasks before clocking-in or after clocking-out for which you believe you were not paid?<span class="form-required">*</span>
        </label>
        <div id="cid_56" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_56_0" name="11EverWorkOffClock" value="Yes" />
              <label for="input_56_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio " id="input_56_1" name="11EverWorkOffClock" value="No" />
              <label for="input_56_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_57">
      
<?PHP

$query = "SELECT [11OffClockMinutesPerWeek] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "On average, how many minutes a week would you perform work-related tasks while you were off the clock?";

while($row = sqlsrv_fetch_array($results))
   {
   $OffClockMinutesPerWeek = $row['11OffClockMinutesPerWeek'];
   }
$radio = array(
    '11OffClockMinutesPerWeek' => array(

//'Yes',
//'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
'10 minutes or less a week',
'Between 15 and 30 minutes a week',
'Between 30 minutes and 1 hour a week',
'More than an hour a week',
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($OffClockMinutesPerWeek) && $OffClockMinutesPerWeek == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>    
      
<!--        <label class="form-label-top" id="label_57" for="input_57">
          On average, how many minutes a week would you perform work-related tasks while you were off the clock?<span class="form-required">*</span>
        </label>
        <div id="cid_57" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_57_0" name="11OffClockMinutesPerWeek" value="10 minutes or less a week" />
              <label for="input_57_0"> 10 minutes or less a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_57_1" name="11OffClockMinutesPerWeek" value="Between 15 and 30 minutes a week" />
              <label for="input_57_1"> Between 15 and 30 minutes a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_57_2" name="11OffClockMinutesPerWeek" value="Between 30 minutes and 1 hour a week" />
              <label for="input_57_2"> Between 30 minutes and 1 hour a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_57_3" name="11OffClockMinutesPerWeek" value="More than an hour a week" />
              <label for="input_57_3"> More than an hour a week </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
<li class="form-line" id="id_58">      
<?PHP

$query = "SELECT [11EverNotPaidOT] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "If you ever worked overtime (worked more than 8 hours in a single day and/or more than 40 hours in a workweek), were you paid 1½ times your hourly rate of pay for those overtime hours?";

while($row = sqlsrv_fetch_array($results))
   {
   $EverNotPaidOT = $row['11EverNotPaidOT'];
   }
$radio = array(
    '11EverNotPaidOT' => array(

//'Yes',
//'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
'Yes',
'No',
'Not applicable'
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($EverNotPaidOT) && $EverNotPaidOT == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>   
      
<!--      
        <label class="form-label-top" id="label_58" for="input_58">
          If you ever worked overtime (worked more than 8 hours in a single day and/or more than 40 hours in a workweek), were you paid 1½ times your hourly rate of pay for those overtime hours?<span class="form-required">*</span>
        </label>
        <div id="cid_58" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_58_0" name="11EverNotPaidOT" value="Yes" />
              <label for="input_58_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_58_1" name="11EverNotPaidOT" value="No" />
              <label for="input_58_1"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_58_2" name="11EverNotPaidOT" value="Not applicable (I never worked more than 8 hours in a day or more than 40 hours in a week, even on holidays" />
              <label for="input_58_2"> Not applicable (I never worked more than 8 hours in a day or more than 40 hours in a week, even on holidays) </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
<!--      <li id="cid_61" class="form-input-wide">
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
      </li>-->
<!--    </ul>-->
<!--    <ul class="form-section" style="display:none;">-->
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
<!--            <p>
              You previously indicated you are still employed by Macy's please click next to continue to the next section.
            </p>-->
          </div>
        </div>
      </li>
      <li class="form-line" id="id_63">
<?PHP

$query = "SELECT [12TermType] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "Were you terminated (laid-off or fired) or did you quit your employment with Macy's?";

while($row = sqlsrv_fetch_array($results))
   {
   $TermType = $row['12TermType'];
   }
$radio = array(
    '12TermType' => array(

//'Yes',
//'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
//'Yes',
//'No',
//'Not applicable'
'Quit',
'Fired or Laid off'
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($TermType) && $TermType == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>        
<!--        <label class="form-label-top" id="label_63" for="input_63">
          Were you terminated (laid-off or fired) or did you quit your employment with Macy's?<span class="form-required">*</span>
        </label>
        <div id="cid_63" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_63_0" name="12TermType" value="Laid Off or Fired" />
              <label for="input_63_0"> Laid Off or Fired </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_63_1" name="12TermType" value="Quit" />
              <label for="input_63_1"> Quit </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_64">
      
<?PHP

$query = "SELECT [12SeventyTwoHoursOrLess] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "If you quit, did you provide at least 72 hours' notice before quitting?";

while($row = sqlsrv_fetch_array($results))
   {
   $SeventyTwoHoursOrLess = $row['12SeventyTwoHoursOrLess'];
   }
$radio = array(
    '12SeventyTwoHoursOrLess' => array(

'Yes',
'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
//'Yes',
//'No',
//'Not applicable'
//
//'Quit',
//'Fired or Laid off'
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($SeventyTwoHoursOrLess) && $SeventyTwoHoursOrLess == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>         
      
<!--        <label class="form-label-top" id="label_64" for="input_64">
          If you quit, did you provide at least 72 hours' notice before quitting?<span class="form-required">*</span>
        </label>
        <div id="cid_64" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_64_0" name="12SeventyTwoHoursOrLess" value="Yes" />
              <label for="input_64_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_64_1" name="12SeventyTwoHoursOrLess" value="No" />
              <label for="input_64_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_65">
      
<?PHP

$query = "SELECT [12DidYouGetFinalCheckOnLastDay] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "If you were laid-off or you quit after giving at least 72 hours' notice, did you receive all your final paycheck on your last day of work?";

while($row = sqlsrv_fetch_array($results))
   {
   $DidYouGetFinalCheckOnLastDay = $row['12DidYouGetFinalCheckOnLastDay'];
   }
$radio = array(
    '12DidYouGetFinalCheckOnLastDay' => array(

'Yes',
'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
//'Yes',
//'No',
//'Not applicable'
//
//'Quit',
//'Fired or Laid off'
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($DidYouGetFinalCheckOnLastDay) && $DidYouGetFinalCheckOnLastDay == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>           
      
<!--        <label class="form-label-top" id="label_65" for="input_65">
          If you were laid-off or you quit after giving at least 72 hours' notice, did you receive all your final paycheck on your last day of work?<span class="form-required">*</span>
        </label>
        <div id="cid_65" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_65_0" name="12DidYouGetFinalCheckOnLastDay" value="Yes" />
              <label for="input_65_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_65_1" name="12DidYouGetFinalCheckOnLastDay" value="No" />
              <label for="input_65_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_66">
      
<?PHP

$query = "SELECT [12HowLongAfterTermRecieveCheckGreaterThan72] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "How long after you ended your employment for Macy's did you receive your final paycheck?";

while($row = sqlsrv_fetch_array($results))
   {
   $HowLongAfterTermRecieveCheckGreaterThan72 = $row['12HowLongAfterTermRecieveCheckGreaterThan72'];
   }
$radio = array(
    '12HowLongAfterTermRecieveCheckGreaterThan72' => array(

//'Yes',
//'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
//'Yes',
//'No',
//'Not applicable'
//
//'Quit',
//'Fired or Laid off'
'Between 2-4 days',
'Between 5-7 days',
'Between 1 and 2 weeks',
'Between 2 and 4 weeks',
'More than a month',
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($HowLongAfterTermRecieveCheckGreaterThan72) && $HowLongAfterTermRecieveCheckGreaterThan72 == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>        
      
<!--        <label class="form-label-top" id="label_66" for="input_66">
          How long after you ended your employment for Macy's did you receive your final paycheck?<span class="form-required">*</span>
        </label>
        <div id="cid_66" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_66_0" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="Between 2-4 days" />
              <label for="input_66_0"> Between 2-4 days </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio " id="input_66_1" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="Between 5-7 days" />
              <label for="input_66_1"> Between 5-7 days </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_66_2" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="Between 1 and 2 weeks" />
              <label for="input_66_2"> Between 1 and 2 weeks </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_66_3" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="Between 2 and 4 weeks" />
              <label for="input_66_3"> Between 2 and 4 weeks </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio " id="input_66_4" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="More than a month" />
              <label for="input_66_4"> More than a month </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_67">
      
<?PHP

$query = "SELECT [12SeventyTwoHoursOrLess2] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "If you quit without providing at least 72 hours' notice, did you receive your final paycheck within 72 hours of quitting?";

while($row = sqlsrv_fetch_array($results))
   {
   $SeventyTwoHoursOrLess2 = $row['12SeventyTwoHoursOrLess2'];
   }
$radio = array(
    '12SeventyTwoHoursOrLess2' => array(

'Yes',
'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
//'Yes',
//'No',
//'Not applicable'
//
//'Quit',
//'Fired or Laid off'
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($SeventyTwoHoursOrLess2) && $SeventyTwoHoursOrLess2 == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>  
      
<!--        <label class="form-label-top" id="label_67" for="input_67">
          If you quit without providing at least 72 hours' notice, did you receive your final paycheck within 72 hours of quitting?<span class="form-required">*</span>
        </label>
        <div id="cid_67" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_67_0" name="12SeventyTwoHoursOrLess" value="Yes" />
              <label for="input_67_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_67_1" name="12SeventyTwoHoursOrLess" value="No" />
              <label for="input_67_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_68">
      
<?PHP

$query = "SELECT [12HowLongAfterTermRecieveCheckGreaterThan72] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "How long after you stopped working for Macy's did you receive your final paycheck?";

while($row = sqlsrv_fetch_array($results))
   {
   $HowLongAfterTermRecieveCheckGreaterThan72 = $row['12HowLongAfterTermRecieveCheckGreaterThan72'];
   }
$radio = array(
    '12HowLongAfterTermRecieveCheckGreaterThan72' => array(

//'Yes',
//'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
//'Yes',
//'No',
//'Not applicable'
//
//'Quit',
//'Fired or Laid off'
'Between 2-4 days',
'Between 5-7 days',
'Between 1 and 2 weeks',
'Between 2 and 4 weeks',
'More than a month',
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($HowLongAfterTermRecieveCheckGreaterThan72) && $HowLongAfterTermRecieveCheckGreaterThan72 == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>       
      

      </li>
      
<li class="form-line" id="id_15">
      
<?PHP

$query = "SELECT [FinalPayCheckIncludedCommisionsOwed] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "Did your final pay check include all commissions owed to you?";

while($row = sqlsrv_fetch_array($results))
   {
   $FinalPayCheckIncludedCommisionsOwed = $row['FinalPayCheckIncludedCommisionsOwed'];
   }
$radio = array(
    'FinalPayCheckIncludedCommisionsOwed' => array(
'Yes',
'No'
    )
);
//'Yes',
// 'Several times a week',
// 'Once a week',
// 'Once a month',
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($FinalPayCheckIncludedCommisionsOwed) && $FinalPayCheckIncludedCommisionsOwed == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>      

      </li>
      
<li class="form-line" id="id_15">
      
<?PHP

$query = "SELECT [HowLongToGetFinalCommissions] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "How long did it take for Macy’s to pay you all commissions owed to you?";

while($row = sqlsrv_fetch_array($results))
   {
   $HowLongToGetFinalCommissions = $row['HowLongToGetFinalCommissions'];
   }
$radio = array(
    'HowLongToGetFinalCommissions' => array(
//'Yes',
//'No'
'Between 2– 4 days',
'Between 5 – 7 days',
'Between 1 and 2 weeks',
'Between 2 and 4 weeks',
'More than a month',

    )
);
//'Yes',
// 'Several times a week',
// 'Once a week',
// 'Once a month',
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($HowLongToGetFinalCommissions) && $HowLongToGetFinalCommissions == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>      

      </li>       
      
      <li id="cid_70" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_70" class="form-header">
            Seating		-	Interview Section 9 of 10
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_71">
      
<?PHP

$query = "SELECT [14DidYourJobRequireStanding] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "When you worked for Macy's, did the nature of your job require you to stand?";

while($row = sqlsrv_fetch_array($results))
   {
   $DidYourJobRequireStanding = $row['14DidYourJobRequireStanding'];
   }
$radio = array(
    '14DidYourJobRequireStanding' => array(

//'Yes',
//'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
//'Yes',
//'No',
//'Not applicable'
//
//'Quit',
//'Fired or Laid off'
'Yes and I was provided with a seat near my work station',
'Yes and I was not provided with a seat near my work station',
'No',
'I do not remember',
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($DidYourJobRequireStanding) && $DidYourJobRequireStanding == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>          
      
<!--        <label class="form-label-top" id="label_71" for="input_71">
          When you worked for Macy's, did the nature of your job require you to stand?<span class="form-required">*</span>
        </label>
        <div id="cid_71" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_71_0" name="14DidYourJobRequireStanding" value="Yes and I was provided with a seat near my work station" />
              <label for="input_71_0"> Yes and I was provided with a seat near my work station </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_71_1" name="14DidYourJobRequireStanding" value="Yes and I was not provided with a seat near my work station" />
              <label for="input_71_1"> Yes and I was not provided with a seat near my work station </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_71_2" name="14DidYourJobRequireStanding" value="No" />
              <label for="input_71_2"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_71_3" name="14DidYourJobRequireStanding" value="Dont Remember" />
              <label for="input_71_3"> I don't remember </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_72">
      
<?PHP

$query = "SELECT [14PermittedToSit] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "Did Macy's ever let you sit in a seat during your work shift? (Example: When you weren't actively engaged in your work duties.)";

while($row = sqlsrv_fetch_array($results))
   {
   $PermittedToSit = $row['14PermittedToSit'];
   }
$radio = array(
    '14PermittedToSit' => array(

'Yes',
'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
//'Yes',
//'No',
//'Not applicable'
//
//'Quit',
//'Fired or Laid off'
//'Yes and I was provided with a seat near my work station',
//'Yes and I was not provided with a seat near my work station',
//'No',
//'I do not remember',
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($PermittedToSit) && $PermittedToSit == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>         
      
<!--        <label class="form-label-top" id="label_72" for="input_72">
          Did Macy's ever let you sit in a seat during your work shift? (Example: When you weren't actively engaged in your work duties.)<span class="form-required">*</span>
        </label>
        <div id="cid_72" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_72_0" name="14PermittedToSit" value="Yes" />
              <label for="input_72_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_72_1" name="14PermittedToSit" value="No" />
              <label for="input_72_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
-->      </li>
      <li class="form-line" id="id_74">
      
<?PHP

$query = "SELECT [14PermittedToSitYesHoursUntilSit] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);

while($row = sqlsrv_fetch_array($results))
   {
   $PermittedToSitYesHoursUntilSit = $row['14PermittedToSitYesHoursUntilSit'];
   }
	echo "<font size='2'>";
	if (isset($PermittedToSitYesHoursUntilSit))
	{
		echo "On average, how many hours were you required to work during a normal shift until you were permitted to sit down?:<br></font><input type='text' style='font-size:14px' size='20' value='".$HourlyRate."' name='14PermittedToSitYesHoursUntilSit'>";	
	}
	else
	{
		echo "On average, how many hours were you required to work during a normal shift until you were permitted to sit down?:<br></font><input type='text' style='font-size:14px' size='20' name='14PermittedToSitYesHoursUntilSit'>";
	}
?>         
      
<!--        <label class="form-label-top" id="label_74" for="input_74">
          On average, how many hours were you required to work during a normal shift until you were permitted to sit down?<span class="form-required">*</span>
        </label>
        <div id="cid_74" class="form-input-wide">
          <input type="number" id="input_74" name="14PermittedToSitYesHoursUntilSit" />
        </div>-->
      </li>
      <li class="form-line" id="id_75">
      
<?PHP

$query = "SELECT [14Consequences] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "Were there any disciplinary consequences if you were to have a seat during your work shift?";

while($row = sqlsrv_fetch_array($results))
   {
   $Consequences = $row['14Consequences'];
   }
$radio = array(
    '14Consequences' => array(

'Yes',
'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
//'Yes',
//'No',
//'Not applicable'
//
//'Quit',
//'Fired or Laid off'
//'Yes and I was provided with a seat near my work station',
//'Yes and I was not provided with a seat near my work station',
//'No',
//'I do not remember',
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($Consequences) && $Consequences == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>            
      
<!--        <label class="form-label-top" id="label_75" for="input_75">
          Were there any disciplinary consequences if you were to have a seat during your work shift?<span class="form-required">*</span>
        </label>
        <div id="cid_75" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_75_0" name="14Consequences" value="Yes" />
              <label for="input_75_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_75_1" name="14Consequences" value="No" />
              <label for="input_75_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_76">
      
<?PHP

$query = "SELECT [14SittingWouldInterfere] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "Do you think you could have performed your job duties while you were seated?";

while($row = sqlsrv_fetch_array($results))
   {
   $SittingWouldInterfere = $row['14SittingWouldInterfere'];
   }
$radio = array(
    '14SittingWouldInterfere' => array(

'Yes',
'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
//'Yes',
//'No',
//'Not applicable'
//
//'Quit',
//'Fired or Laid off'
//'Yes and I was provided with a seat near my work station',
//'Yes and I was not provided with a seat near my work station',
//'No',
//'I do not remember',
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($SittingWouldInterfere) && $SittingWouldInterfere == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>        
      
<!--        <label class="form-label-top" id="label_76" for="input_76">
          Do you think you could have performed your job duties while you were seated?<span class="form-required">*</span>
        </label>
        <div id="cid_76" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_76_0" name="14SittingWouldInterfere" value="Yes" />
              <label for="input_76_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_76_1" name="14SittingWouldInterfere" value="No" />
              <label for="input_76_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>-->
      </li>
<!--      <li id="cid_77" class="form-input-wide">
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
      </li>-->
<!--    </ul>-->
<!--    <ul class="form-section" style="display:none;">-->
      <li id="cid_87" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_87" class="form-header">
            Fee waiver qualification	 -	Interview Section 10 of 10
          </h2>
        </div>
      </li>
      <!--<li class="form-line" id="id_78">
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
<label class="form-label-left" id="label_80" for="input_80"> Document 1 </label>

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
<br />
</li>
<li><p class="MsoCommentText"><span style="font-size: 12.0pt;">You can request a self-addressed stamped envelope by [clicking here]. When we receive your request, we will send you an envelope with instructions on how to mail your documents back to us.</span>
            </p></li>
</ol>            
            
           <p class="MsoCommentText"><span style="font-size: 12.0pt;"><i>[Documents received by Initiative Legal Group APC by any of the above methods will be stored confidentially and securely, either electronically or in physical form].</i></span>
            </p> 
</div>
</div>
</li>-->

      <li class="form-line" id="id_84">
        <div id="cid_84" class="form-input-wide">
          <div id="text_84" class="form-html">

<!--      <li id="cid_86" class="form-input-wide">
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
      </li>-->
<!--    </ul>-->
<!--    <ul class="form-section" style="display:none;">-->
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

<?PHP

$query = "SELECT [HouseHoldCount] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "How many people live in your household, including yourself?";

while($row = sqlsrv_fetch_array($results))
   {
   $HouseHoldCount = $row['HouseHoldCount'];
   }
$radio = array(
    'HouseHoldCount' => array(

'1',
'2',
'3',
'4',
'5',
'6',
'7',
'8',
'9',
'10',
'Decline to answer',
//'Yes',
//'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
//'Yes',
//'No',
//'Not applicable'
//
//'Quit',
//'Fired or Laid off'
//'Yes and I was provided with a seat near my work station',
//'Yes and I was not provided with a seat near my work station',
//'No',
//'I do not remember',
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($HouseHoldCount) && $HouseHoldCount == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?>      

<!--<label class="form-label-top" id="label_76" for="input_76">
<span style="font-size: 12.0pt; font-family: " Times New Roman ","serif ";">How many people live in your household, including yourself?</span><span class="form-required">*</span>
</label><br />
<br />
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="HouseHoldCount" value="1" />
<label for="input_15_0"> 1 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="HouseHoldCount" value="2" />
<label for="input_15_0"> 2 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="HouseHoldCount" value="3" />
<label for="input_15_0"> 3 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="HouseHoldCount" value="4" />
<label for="input_15_0"> 4 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="HouseHoldCount" value="5" />
<label for="input_15_0"> 5 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="HouseHoldCount" value="6" />
<label for="input_15_0"> 6 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="HouseHoldCount" value="7" />
<label for="input_15_0"> 7 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="HouseHoldCount" value="8" />
<label for="input_15_0"> 8 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="HouseHoldCount" value="9" />
<label for="input_15_0"> 9 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="HouseHoldCount" value="10" />
<label for="input_15_0"> 10 </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="HouseHoldCount" value="Decline" />
<label for="input_15_0"> Decline to answer </label>
</span>
<span class="clearfix"></span>-->
</div>
</div>
</p>
</p>
</div>
<div id="text_88" class="form-html">

<?PHP

$query = "SELECT [GrossIncome] FROM Data WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);
$question = "What is your current gross monthly income?";

while($row = sqlsrv_fetch_array($results))
   {
   $GrossIncome = $row['GrossIncome'];
   }
$radio = array(
    'GrossIncome' => array(

'2793',
'2793to3783',
'3783to4773',
'4773to5763',
'5763to6753',
'6753to7743',
'7743to8733',
'8733to9723',
'Decline',
//'Yes',
//'No',
//'I do not know'
//
// 'Several times a week',
// 'Once a week',
// 'Once a month'
//
//'Employer demands (e.g., understaffed, not allowed by supervisor, too busy)',
//'I did not want to take a meal break'
//
//'Yes always',
//'Sometimes',
//'No',
//'I do not remember'
//
//'Everyday',
//'Several times a week',
//'Once a week',
//'Once a month'
//'Yes',
//'No',
//'Not applicable'
//
//'Quit',
//'Fired or Laid off'
//'Yes and I was provided with a seat near my work station',
//'Yes and I was not provided with a seat near my work station',
//'No',
//'I do not remember',
    )
);

foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($GrossIncome) && $GrossIncome == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
	echo "<br>";
    }
}

?> 

<!--            <label class="form-label-top" id="label_76" for="input_76">
<span style="font-size: 12.0pt; font-family: " Times New Roman ","serif ";">What is your current gross monthly income? </span><span class="form-required">*</span>
</label><br />
<br />
            <p>
              <p class="MsoNormal">
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="GrossIncome" value="2793" />
<label for="input_15_0"> Less than $2,793  </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="GrossIncome" value="2793to3783" />
<label for="input_15_0"> Between $2,793-$3,783  </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="GrossIncome" value="3783to4773" />
<label for="input_15_0"> Between $3,783-$4,773  </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="GrossIncome" value="4773to5763" />
<label for="input_15_0"> Between $4,773- $5,763  </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="GrossIncome" value="5763to6753" />
<label for="input_15_0"> Between $5,763-$6,753  </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="GrossIncome" value="6753to7743" />
<label for="input_15_0"> Between $6,753-$7,743  </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="GrossIncome" value="7743to8733" />
<label for="input_15_0"> Between $7,743-$8,733  </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="GrossIncome" value="8733to9723" />
<label for="input_15_0"> Between $8,733-$9,723  </label>
</span>
<span class="clearfix"></span>
<span class="form-radio-item" style="clear:left;">
<input type="radio" class="form-radio" name="GrossIncome" value="Decline" />
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