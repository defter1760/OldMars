<?PHP
require("db.php");
  if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
$query = "SELECT * FROM Status WHERE uniqueid='$uniqueid'";
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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Macy's Online Interview</title>
</head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<!--<link href="https://static-interlogyllc.netdna-ssl.com/min/g=formCss?3.0.3370" rel="stylesheet" type="text/css" />-->
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/forms.css" rel="stylesheet" type="text/css" />
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/gform.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="speechbubbles.css" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="speechbubbles.js">

/***********************************************
* Speech Bubbles Tooltip- (c) Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/

</script>

<script type="text/javascript">

jQuery(function($){ //on document.ready
 	//Apply tooltip to links with class="addspeech", plus look inside 'speechdata.txt' for the tooltip markups
	$('a.addspeech').speechbubble({url:'speechdata.txt'})
})

</script>
<!--DYNAMIC DRIVE END--><!--DYNAMIC DRIVE END--><!--DYNAMIC DRIVE END-->

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>



<script type="text/javascript" src="js/ddimgtooltip.js">

/***********************************************
* Image w/ description tooltip v2.0- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>

<!--<script src="https://static-interlogyllc.netdna-ssl.com/min/g=jotform?3.0.3370" type="text/javascript"></script>
<script language="JavaScript">
  var needToConfirm = true;
  
  window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    if (needToConfirm)
      return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";
  }
</script>
<script type="text/javascript">
   JotForm.setConditions([{"action":{"field":"13","visibility":"Show"},"link":"Any","terms":[{"field":"12","operator":"equals","value":"*Other"}],"type":"field"},{"type":"page","link":"All","terms":[{"field":"15","operator":"equals","value":"No"},{"field":"92","operator":"equals","value":"No"}],"action":{"skipTo":"page-12"}},{"action":{"field":"21","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"18","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"22","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"20","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"19","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"21","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"63","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"64","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"65","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"68","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"67","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"68","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"28","visibility":"Hide"},"link":"Any","terms":[{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"30","visibility":"Hide"},"link":"Any","terms":[{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"31","visibility":"Hide"},"link":"Any","terms":[{"field":"27","operator":"equals","value":"Less than 4 hours"},{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"33","visibility":"Hide"},"link":"Any","terms":[{"field":"32","operator":"equals","value":"No"},{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"33","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"29","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"},{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"30","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"31","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"32","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"},{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"33","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"34","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"},{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"35","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"},{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"30","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"30","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"33","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"34","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"35","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"34","visibility":"Hide"},"link":"Any","terms":[{"field":"32","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"35","visibility":"Hide"},"link":"Any","terms":[{"field":"32","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"34","visibility":"Hide"},"link":"Any","terms":[{"field":"33","operator":"equals","value":"Yes, always"}],"type":"field"},{"action":{"field":"35","visibility":"Hide"},"link":"Any","terms":[{"field":"33","operator":"equals","value":"Yes, always"}],"type":"field"},{"action":{"field":"40","visibility":"Hide"},"link":"Any","terms":[{"field":"39","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"41","visibility":"Hide"},"link":"Any","terms":[{"field":"39","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"42","visibility":"Hide"},"link":"Any","terms":[{"field":"39","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"45","visibility":"Hide"},"link":"Any","terms":[{"field":"44","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"46","visibility":"Hide"},"link":"Any","terms":[{"field":"44","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"47","visibility":"Hide"},"link":"Any","terms":[{"field":"44","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"52","visibility":"Hide"},"link":"Any","terms":[{"field":"51","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"53","visibility":"Hide"},"link":"Any","terms":[{"field":"51","operator":"equals","value":"No"},{"field":"52","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"57","visibility":"Hide"},"link":"Any","terms":[{"field":"56","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"58","visibility":"Hide"},"link":"Any","terms":[{"field":"56","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"64","visibility":"Hide"},"link":"Any","terms":[{"field":"63","operator":"equals","value":"Laid Off or Fired"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"65","visibility":"Hide"},"link":"Any","terms":[{"field":"64","operator":"equals","value":"No"},{"field":"22","operator":"equals","value":"Yes"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"66","visibility":"Hide"},"link":"Any","terms":[{"field":"64","operator":"equals","value":"No"},{"field":"65","operator":"equals","value":"Yes"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"67","visibility":"Hide"},"link":"Any","terms":[{"field":"65","operator":"equals","value":"Yes"},{"field":"64","operator":"equals","value":"Yes"},{"field":"65","operator":"equals","value":"No"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"68","visibility":"Hide"},"link":"Any","terms":[{"field":"65","operator":"equals","value":"Yes"},{"field":"64","operator":"equals","value":"Yes"},{"field":"65","operator":"equals","value":"No"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"63","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"89","visibility":"Show"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"74","visibility":"Hide"},"link":"Any","terms":[{"field":"72","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"75","visibility":"Hide"},"link":"Any","terms":[{"field":"72","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"76","visibility":"Hide"},"link":"Any","terms":[{"field":"72","operator":"equals","value":"Yes"}],"type":"field"},{"type":"field","link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"action":{"field":"91","visibility":"Hide"}},{"type":"field","link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"action":{"field":"18","visibility":"Hide"}},{"type":"field","link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"action":{"field":"90","visibility":"Hide"}},{"type":"field","link":"Any","terms":[{"field":"92","operator":"notEquals","value":"Yes"}],"action":{"field":"93","visibility":"Hide"}},{"type":"field","link":"Any","terms":[{"field":"92","operator":"notEquals","value":"Yes"}],"action":{"field":"94","visibility":"Hide"}},{"type":"field","link":"Any","terms":[{"field":"92","operator":"notEquals","value":"Yes"},{"field":"22","operator":"equals","value":"Yes"}],"action":{"field":"95","visibility":"Hide"}},{"type":"field","link":"Any","terms":[{"field":"92","operator":"notEquals","value":"Yes"},{"field":"22","operator":"equals","value":"Yes"}],"action":{"field":"96","visibility":"Hide"}}]);
   JotForm.init(function(){
      $('input_5_confirm').hint('Confirm Email');
      $('input_5').hint('ex: myname@example.com');
      JotForm.setCalendar("19");
      JotForm.setCalendar("21");
      $('input_53').spinner({ imgPath:'https://jotform.us/images/', width: '60', maxValue:'', minValue:'', allowNegative: false, addAmount: 5, value:'10' });
      $('input_74').spinner({ imgPath:'https://jotform.us/images/', width: '60', maxValue:'', minValue:'', allowNegative: false, addAmount: 1, value:'0' });
   });
</script>
<script language="JavaScript" src="js/validate2.js">
</script>-->
<!--<script type="text/javascript">
   JotForm.setConditions([{"action":{"field":"13","visibility":"Show"},"link":"Any","terms":[{"field":"12","operator":"equals","value":"*Other"}],"type":"field"},{"type":"page","link":"All","terms":[{"field":"15","operator":"equals","value":"No"},{"field":"92","operator":"equals","value":"No"}],"action":{"skipTo":"page-12"}},{"action":{"field":"21","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"18","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"22","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"20","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"19","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"21","visibility":"Hide"},"link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"63","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"64","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"65","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"68","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"67","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"68","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"28","visibility":"Hide"},"link":"Any","terms":[{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"30","visibility":"Hide"},"link":"Any","terms":[{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"31","visibility":"Hide"},"link":"Any","terms":[{"field":"27","operator":"equals","value":"Less than 4 hours"},{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"33","visibility":"Hide"},"link":"Any","terms":[{"field":"32","operator":"equals","value":"No"},{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"33","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"29","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"},{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"30","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"31","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"32","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"},{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"33","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"34","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"},{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"35","visibility":"Hide"},"link":"Any","terms":[{"field":"28","operator":"equals","value":"Yes"},{"field":"27","operator":"equals","value":"Less than 4 hours"}],"type":"field"},{"action":{"field":"30","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"30","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"33","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"34","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"35","visibility":"Hide"},"link":"Any","terms":[{"field":"29","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"34","visibility":"Hide"},"link":"Any","terms":[{"field":"32","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"35","visibility":"Hide"},"link":"Any","terms":[{"field":"32","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"34","visibility":"Hide"},"link":"Any","terms":[{"field":"33","operator":"equals","value":"Yes, always"}],"type":"field"},{"action":{"field":"35","visibility":"Hide"},"link":"Any","terms":[{"field":"33","operator":"equals","value":"Yes, always"}],"type":"field"},{"action":{"field":"40","visibility":"Hide"},"link":"Any","terms":[{"field":"39","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"41","visibility":"Hide"},"link":"Any","terms":[{"field":"39","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"42","visibility":"Hide"},"link":"Any","terms":[{"field":"39","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"45","visibility":"Hide"},"link":"Any","terms":[{"field":"44","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"46","visibility":"Hide"},"link":"Any","terms":[{"field":"44","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"47","visibility":"Hide"},"link":"Any","terms":[{"field":"44","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"52","visibility":"Hide"},"link":"Any","terms":[{"field":"51","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"53","visibility":"Hide"},"link":"Any","terms":[{"field":"51","operator":"equals","value":"No"},{"field":"52","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"57","visibility":"Hide"},"link":"Any","terms":[{"field":"56","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"58","visibility":"Hide"},"link":"Any","terms":[{"field":"56","operator":"equals","value":"No"}],"type":"field"},{"action":{"field":"64","visibility":"Hide"},"link":"Any","terms":[{"field":"63","operator":"equals","value":"Laid Off or Fired"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"65","visibility":"Hide"},"link":"Any","terms":[{"field":"64","operator":"equals","value":"No"},{"field":"22","operator":"equals","value":"Yes"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"66","visibility":"Hide"},"link":"Any","terms":[{"field":"64","operator":"equals","value":"No"},{"field":"65","operator":"equals","value":"Yes"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"67","visibility":"Hide"},"link":"Any","terms":[{"field":"65","operator":"equals","value":"Yes"},{"field":"64","operator":"equals","value":"Yes"},{"field":"65","operator":"equals","value":"No"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"68","visibility":"Hide"},"link":"Any","terms":[{"field":"65","operator":"equals","value":"Yes"},{"field":"64","operator":"equals","value":"Yes"},{"field":"65","operator":"equals","value":"No"},{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"63","visibility":"Hide"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"89","visibility":"Show"},"link":"Any","terms":[{"field":"22","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"74","visibility":"Hide"},"link":"Any","terms":[{"field":"72","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"75","visibility":"Hide"},"link":"Any","terms":[{"field":"72","operator":"equals","value":"Yes"}],"type":"field"},{"action":{"field":"76","visibility":"Hide"},"link":"Any","terms":[{"field":"72","operator":"equals","value":"Yes"}],"type":"field"},{"type":"field","link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"action":{"field":"91","visibility":"Hide"}},{"type":"field","link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"action":{"field":"18","visibility":"Hide"}},{"type":"field","link":"Any","terms":[{"field":"15","operator":"equals","value":"No"}],"action":{"field":"90","visibility":"Hide"}},{"type":"field","link":"Any","terms":[{"field":"92","operator":"notEquals","value":"Yes"}],"action":{"field":"93","visibility":"Hide"}},{"type":"field","link":"Any","terms":[{"field":"92","operator":"notEquals","value":"Yes"}],"action":{"field":"94","visibility":"Hide"}}]);
   JotForm.init(function(){
      $('input_5_confirm').hint('Confirm Email');
      $('input_5').hint('ex: myname@example.com');
      JotForm.setCalendar("19");
      JotForm.setCalendar("21");
      $('input_53').spinner({ imgPath:'https://jotform.us/images/', width: '60', maxValue:'', minValue:'', allowNegative: false, addAmount: 5, value:'10' });
      $('input_74').spinner({ imgPath:'https://jotform.us/images/', width: '60', maxValue:'', minValue:'', allowNegative: false, addAmount: 1, value:'0' });
   });
</script>
-->
<!--<style type="text/css">

body {
	font-family: 'Open Sans', sans-serif;
	color:#424242;
	background:#ffffff;
	margin:0;
	text-align:center;
	height:100%;
}

#main {

  width: 100%;
  margin:0 auto;
  text-align:left;

}

h1{
	font-size:22px;
	line-height:30px;
}

h2{
	font-size:20px;
	line-height:28px;
}



h3{
	font-size:18px;
	line-height:26px;
	text-decoration:underline;
	text-align:center;
}

h4{
	font-size:16px;
	line-height:24px;
}



p{
	font-size:14px;
	line-height:20px;
	pading-bottom:5px;
}

p.disclaimer{
	text-align:center;
	font-style:italic;
}

p.doc{
	background:url(https://macyslawsuit.com/wp-content/uploads/2012/04/check.png) no-repeat 0 7px;
	padding-left:30px;
}




a{
	color:#9f111b;
	text-decoration:none;
	font-weight:bold;
}

.form-required{
	font-weight:bold;
	color:#9f111b !important;
}

#main .form-all{
        width:850px;
        color:#424242;
        font-family: 'Open Sans', sans-serif;
        font-size:14px;
	  margin-left: auto;

  margin-right: auto;

}

.form-all .form-header-group{
	background-color:#fff;
	border:none;
	padding:0;
}

.HeaderRed {
	color: #9f111b;
	text-align:center;
}

.form-subHeader{
	background-color:#afb0b0;
	font-style:normal !important;
	padding:5px 5px 5px 10px;
	border:none !important;
}
.form-label{
        width:150px !important;
		
}

form-sub-label{
	font-family: 'Open Sans', sans-serif;
}
.form-label-left{
        width:120px !important;
		font-size:14px;
 }
 
 .form-label-top{
	 font-size:14px;
 }
    
.form-line{
        padding:10px;
		margin-left:10px;
    }
	
#id_21, #id_20, #id_15, #id_16, #id_17{
	margin-left:10px;
}
.form-label-right{
        width:150px !important;
		font-size:14px;
    }
	
.form-single-column{
	font-size:14px;
}

.form-checkbox-item{
	padding-bottom:10px;
}

	

.requiredRed {
	font-style: italic;
	font-weight:bold;
	color: #9f111b;
	padding:2px;
	font-size:14px;
	margin-left:10px;
}


.whatsthis {
	color: #666666;
	background-color:rgba(241,241,241,.5);
	border-radius:10px;
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
	box-shadow:0 0 1px #888;
	-webkit_box-shadow:0 0 2px #888;
	-moz-box-shadow:0 0 2px #888;
	padding:5px;
	margin-left:12px;
	font-size:10px;
}


.form-buttons-wrapper{
	width:100%;
}

.form-submit-button{
	float:left;	
	text-indent:0;	
	padding:10px 0;
	margin:0;
}

.form-button-wrapper {
	padding: 14px 10px 10px;
}

.form-button-error{
	float:left;
	padding-left:30px;
}

.clear{
	clear:both;
}

.form-pagebreak{
	float:left;
	border:none;
	background:#ffffff;
	padding-left: 15px;
}

#text_91 .form-htm{
	border:red 1px solid;
}

ol{
	color:#9f111b;
	font-weight:bold;
	
}

ol li{
	padding-bottom:10px;
	margin-left:40px;
}

ol li p{
	color:#424242;
	font-weight:normal;

}

ol li ul#address{
	list-style:none;
}

ol li ul#address li{
	padding:0;
	margin:0;
}

ol li ul#docs{
	color:#424242;
	font-weight:normal;
}

ol li ul#mail{
	color:#424242;
	font-weight:normal;
}

.form-submit-button{
	color:#fff;
}
img, img a, a img, a {
   outline: none !important;
}
/*div#main2 {

  width: 650px;

  margin-left: auto;

  margin-right: auto;

  text-align: left;

}*/
</style>
-->
<script type="text/javascript" src="js/jquery.js"></script>
<script language="JavaScript" src="js/validateMacyLongForm.js">
</script>
<script type="text/javascript">
$(document).ready(ClearForm);
</script>
<body>
<div align="center"><div id="main">
<link type="text/css" rel="stylesheet" href="https://jotform.us/css/styles/buttons/form-submit-button-push_red.css?3.0.3370"/>
<form class="jotform-form" action="https://dfwms01.initiativelegal.com/database_write_MacysFull.php" method="post" enctype="multipart/form-data" name="form_20599278470161" id="20599278470161" accept-charset="utf-8"> <?PHP #database_write_MacysFull.php ?>
  <input type="hidden" name="formID" value="20599278470161" />
  <div class="form-all">
    <ul class="form-section" id="session1" style="display:block;"><a name="TOP1">&nbsp;</a>
      <li class="form-line" id="id_17">
        <div id="cid_17" class="form-input-wide">
          <div id="text_17" class="form-html">
            <!--<p>If you worked at a Macy&rsquo;s department store in California, please fill out this brief online questionnaire. This questionnaire should take between 15-20 minutes to complete.  It is important you answer all questions accurately and truthfully, to the best of your recollection. If you have any questions, please call us at 1.888.792.2293 to speak with one of our representatives.</p>-->
<?PHP 
#echo '<body>';
echo '<div id="main">';
echo '<div id="message">';
echo '<h4>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h4>';
echo '<h3>Online Interview Regarding Your Potential Wage And Hour Claims Against Macy\'s</h3>';
#echo '<h3>ONLINE INTERVIEW REGARDING YOUR POTENTIAL WAGE AND HOUR CLAIMS AGAINST MACY\'S</h3>';
echo '<ul>';
echo '<li>The following questions are designed to provide us with more detailed information about your potential wage and hour claims against Macy\'s.  Please complete all required questions accurately and truthfully, to the best of your recollection.  This interview should take between 15-20 minutes to complete. </li>';
echo '</ul>';
#echo '<p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>';
echo '</div>';
echo '</div>';
#echo '</body>';
?>
          </div>
        </div>
      </li>
      <li id="cid_1" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_1" class="form-subHeader">
            Contact Information (Interview Section 1 of 9)
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_3">
        <label class="form-label-left" id="label_3" for="input_3">
          Full Name<span class="form-required">*</span>
        </label>
        <div id="cid_3" class="form-input"><span class="form-sub-label-container">
	
	<?PHP
echo "<input type='text' size='10' name='WhoFirstName' id='first_3' value='".$FirstName."'/>";
?>
            <label class="form-sub-label" for="first_3" id="sublabel_first"> First Name </label></span>
	    <span class="form-sub-label-container">
	    
            <?PHP echo "<input type='text' size='15' name='WhoLastName' id='last_3' value='".$LastName."'/>";
?>
	    <label class="form-sub-label" for="last_3" id="sublabel_last"> Last Name </label></span>
        </div>
      </li>
      <li class="form-line" id="id_4">
        <label class="form-label-left" id="label_4" for="input_4">
          Phone Number<span class="form-required">*</span>
        </label>
        <div id="cid_4" class="form-input"><span class="form-sub-label-container">
	    <?PHP
echo "<input class='form-textbox validate[required]' type='tel' name='CallbackNum' id='input_4_phone' size='8' value='".$phone1."'>";
?>
	   
            <label class="form-sub-label" for="input_4_phone" id="sublabel_phone"> Phone Number </label></span>
        </div>
      </li>
      <li class="form-line" id="id_6">
        <label class="form-label-left" id="label_6" for="input_6"> Alternate Phone Number </label>
        <div id="cid_6" class="form-input">
	<span class="form-sub-label-container">
	    <?PHP echo "<input class='form-textbox' type='tel' name='SecondaryNum' id='input_6_phone' size='8' value='".$phone2."'>";
?>
	    
            <label class="form-sub-label" for="input_6_phone" id="sublabel_phone"> Phone Number </label></span>
        </div>
      </li>
      <li class="form-line" id="id_5">
        <label class="form-label-left" id="label_5" for="input_5">
          E-mail<span class="form-required">*</span>
        </label>
        <div id="cid_5" class="form-input">
	<?PHP echo "<input type='email' class='form-textbox validate[required, Email]' id='input_5' name='Email' size='30' value='".$Email."'/>";
?>
          
          <br>
          <?PHP echo "<input type='email' name='Email2' class='form-textbox validate[Email_Confirm]' id='input_5_confirm' style='margin-top:8px;' size='30' value='".$Email."'/>";
?> 
        </div>
      </li>
      <li class="form-line" id="id_7">
        <label class="form-label-left" id="label_7" for="input_7">
          Address<span class="form-required">*</span>
        </label>
        <div id="cid_7" class="form-input">
          <table summary="" class="form-address-table" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="2"><span class="form-sub-label-container">
	      
	      <?PHP echo "<input class='form-textbox validate[required] form-address-line' type='text' name='StreetLine1' id='input_7_addr_line1' value='".$StreetLine1."'/>";
?>
                  <label class="form-sub-label" for="input_7_addr_line1" id="sublabel_addr_line1"> Street Address </label></span>
              </td>
            </tr>
            <tr>
              <td colspan="2"><span class="form-sub-label-container">
	      <?PHP echo "<input class='form-textbox form-address-line' type='text' name='StreetLine2' id='input_7_addr_line2' size='46' value='".$StreetLine2."'/>";
?>
                  <label class="form-sub-label" for="input_7_addr_line2" id="sublabel_addr_line2"> Street Address Line 2 </label></span>
              </td>
            </tr>
            <tr>
              <td width="50%"><span class="form-sub-label-container">
<?PHP echo "<input class='form-textbox validate[required] form-address-city' type='text' name='HomeCity' id='input_7_city' size='21' value='".$HomeCity."'/>";
?>	      
	      
                  <label class="form-sub-label" for="input_7_city" id="sublabel_city"> City </label></span>
              </td>
             <td><span class="form-sub-label-container">
             <select name="HomeState" id="input_4_state">         	
            <option value="AL" <?PHP if ($HomeState == "AL") echo "selected"?>>Alabama</option>	
            <option value="AK" <?PHP if ($HomeState == "AK") echo "selected"?>>Alaska</option>	
            <option value="AZ" <?PHP if ($HomeState == "AZ") echo "selected"?>>Arizona</option>	
            <option value="AR" <?PHP if ($HomeState == "AR") echo "selected"?>>Arkansas</option>	
            <option value="CA" <?PHP if ($HomeState == "CA") echo "selected"?>>California</option>	
            <option value="CO" <?PHP if ($HomeState == "CO") echo "selected"?>>Colorado</option>	
            <option value="CT" <?PHP if ($HomeState == "CT") echo "selected"?>>Connecticut</option>	
            <option value="DE" <?PHP if ($HomeState == "DE") echo "selected"?>>Delaware</option>	
            <option value="DC" <?PHP if ($HomeState == "DC") echo "selected"?>>District of Columbia</option>	
            <option value="FL" <?PHP if ($HomeState == "FL") echo "selected"?>>Florida</option>	
            <option value="GA" <?PHP if ($HomeState == "GA") echo "selected"?>>Georgia</option>	
            <option value="HI" <?PHP if ($HomeState == "HI") echo "selected"?>>Hawaii</option>	
            <option value="ID" <?PHP if ($HomeState == "ID") echo "selected"?>>Idaho</option>	
            <option value="IL" <?PHP if ($HomeState == "IL") echo "selected"?>>Illinois</option>	
            <option value="IN" <?PHP if ($HomeState == "IN") echo "selected"?>>Indiana</option>	
            <option value="IA" <?PHP if ($HomeState == "IA") echo "selected"?>>Iowa</option>	
            <option value="KS" <?PHP if ($HomeState == "KS") echo "selected"?>>Kansas</option>	
            <option value="KY" <?PHP if ($HomeState == "KY") echo "selected"?>>Kentucky</option>	
            <option value="LA" <?PHP if ($HomeState == "LA") echo "selected"?>>Louisiana</option>	
            <option value="ME" <?PHP if ($HomeState == "ME") echo "selected"?>>Maine</option>	
            <option value="MD" <?PHP if ($HomeState == "MD") echo "selected"?>>Maryland</option>	
            <option value="MA" <?PHP if ($HomeState == "MA") echo "selected"?>>Massachusetts</option>	
            <option value="MI" <?PHP if ($HomeState == "MI") echo "selected"?>>Michigan</option>	
            <option value="MN" <?PHP if ($HomeState == "MN") echo "selected"?>>Minnesota</option>	
            <option value="MS" <?PHP if ($HomeState == "MS") echo "selected"?>>Mississippi</option>	
            <option value="MO" <?PHP if ($HomeState == "MO") echo "selected"?>>Missouri</option>	
            <option value="MT" <?PHP if ($HomeState == "MT") echo "selected"?>>Montana</option>	
            <option value="NE" <?PHP if ($HomeState == "NE") echo "selected"?>>Nebraska</option>	
            <option value="NV" <?PHP if ($HomeState == "NV") echo "selected"?>>Nevada</option>	
            <option value="NH" <?PHP if ($HomeState == "NH") echo "selected"?>>New Hampshire</option>	
            <option value="NJ" <?PHP if ($HomeState == "NJ") echo "selected"?>>New Jersey</option>	
            <option value="NM" <?PHP if ($HomeState == "NM") echo "selected"?>>New Mexico</option>	
            <option value="NY" <?PHP if ($HomeState == "NY") echo "selected"?>>New York</option>	
            <option value="NC" <?PHP if ($HomeState == "NC") echo "selected"?>>North Carolina</option>	
            <option value="ND" <?PHP if ($HomeState == "ND") echo "selected"?>>North Dakota</option>	
            <option value="OH" <?PHP if ($HomeState == "OH") echo "selected"?>>Ohio</option>	
            <option value="OK" <?PHP if ($HomeState == "OK") echo "selected"?>>Oklahoma</option>	
            <option value="OR" <?PHP if ($HomeState == "OR") echo "selected"?>>Oregon</option>	
            <option value="PA" <?PHP if ($HomeState == "PA") echo "selected"?>>Pennsylvania</option>	
            <option value="RI" <?PHP if ($HomeState == "RI") echo "selected"?> >Rhode Island</option>	
            <option value="SC" <?PHP if ($HomeState == "SC") echo "selected"?>>South Carolina</option>	
            <option value="SD" <?PHP if ($HomeState == "SD") echo "selected"?>>South Dakota</option>	
            <option value="TN" <?PHP if ($HomeState == "TN") echo "selected"?>>Tennessee</option>	
            <option value="TX" <?PHP if ($HomeState == "TX") echo "selected"?>>Texas</option>	
            <option value="UT" <?PHP if ($HomeState == "UT") echo "selected"?>>Utah</option>	
            <option value="VT" <?PHP if ($HomeState == "VT") echo "selected"?>>Vermont</option>	
            <option value="VA" <?PHP if ($HomeState == "VA") echo "selected"?>>Virginia</option>	
            <option value="WA" <?PHP if ($HomeState == "WA") echo "selected"?>>Washington</option>	
            <option value="WV" <?PHP if ($HomeState == "WV") echo "selected"?>>West Virginia</option>	
            <option value="WI" <?PHP if ($HomeState == "WI") echo "selected"?>>Wisconsin</option>	
            <option value="WY" <?PHP if ($HomeState == "WY") echo "selected"?>>Wyoming</option>	
        	</select>
                  <label class="form-sub-label" for="input_4_state" id="sublabel_state"> State</label>	
<?PHP //echo "<input class='form-textbox validate[required] form-address-state' type='text' name='HomeState' id='input_7_state' size='22' value='".$HomeState."'/>";
?>      	      
	      
               <!--   <label class="form-sub-label" for="input_7_state" id="sublabel_state"> State</label>--></span>
              </td>
            </tr>
            <tr>
              <td width="50%"><span class="form-sub-label-container">
	      <?PHP echo "<input class='form-textbox validate[required] form-address-postal' type='text' name='Zipcode' id='input_7_postal' size='10' value='".$Zipcode."'/>";
?>
                  <label class="form-sub-label" for="input_7_postal" id="sublabel_postal">Zip Code </label></span>
              </td>
            </tr>
          </table>
        </div>
      </li>
       <li id="cid_11" class="form-input-wide">
        <div class="form-pagebreak">
<!--          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_11">
              Back
            </button>
          </div>-->
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_11" onClick="validateLongFormDiv1();">
           Next
            </button>
          </div>
        </div>
        <div class="clear"></div>
        <p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>
      </li>
    </ul>
    <ul class="form-section" id="session2" style="display:none;"><a name="TOP2">&nbsp;</a>
      <li id="cid_16" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_16" class="form-subHeader">
            What is your employment background at Macy's?  (Interview Section 2 of 9)
          </h2>
        </div>
      </li>
     <li class="form-line" id="id_97">
        <label class="form-label-top" id="label_97" for="input_97">
         What was your most recent position during your employment at Macy's? (Select the choice that best describes your last position)<span class="form-required">*</span>
        </label>
        <div id="cid_97" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="hidden" name="recentPosition1"/>
          		<input type="radio" class="form-radio validate[required]" id="input_97_0" name="recentPosition" value="Holiday Associate" 
                onclick="showPositionExplain();"/>
              <label for="input_97_0"> Holiday Associate</label></span><span class="clearfix"></span>
              <span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_97_1" name="recentPosition" value="Sales Associate- Commissioned"
              onclick="showPositionExplain();" />
              <label for="input_97_1"> Sales Associate- Commissioned </label></span><span class="clearfix"></span>
              <span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_97_2" name="recentPosition" value="Sales Associate-Retail" 
              onclick="showPositionExplain();"/>
              <label for="input_97_1"> Sales Associate-Retail</label></span><span class="clearfix"></span>
              <span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_97_3" name="recentPosition" value="Sales Manager" 
              onclick="showPositionExplain();"/>
              <label for="input_97_1">Sales Manager </label></span><span class="clearfix"></span>
             <span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_97_4" name="recentPosition" value="Sales Supervisor" 
              onclick="showPositionExplain();"/>
              <label for="input_97_1">Sales Supervisor</label></span><span class="clearfix"></span>
              <span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_97_5" name="recentPosition" value="Retail Support Associate" 
              onclick="showPositionExplain();"();/>
              <label for="input_97_1">Retail Support Associate</label></span><span class="clearfix"></span>
              <span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_97_6" name="recentPosition" value="Cosmetics" onclick="showPositionExplain();" />
              <label for="input_97_6">Cosmetics</label></span><span class="clearfix"></span>
              <span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_97_7" name="recentPosition" value="Merchandise Team Manager" 
              onclick="showPositionExplain();"/>
              <label for="input_97_7">Merchandise Team Manager</label></span><span class="clearfix"></span>
              <span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_97_8" name="recentPosition" value="Macy's By Appointment Executive" 
              onclick="showPositionExplain();"/>
              <label for="input_97_8">Macy's By Appointment Executive</label></span><span class="clearfix"></span>
              <span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_97_9" name="recentPosition" value="Receiving/Processing Team Lead" 
             onclick="showPositionExplain();"/>
              <label for="input_97_9">Receiving/Processing Team Lead</label></span><span class="clearfix"></span>
              <span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_97_10" name="recentPosition" value="Assistant Store Manager"
              onclick="showPositionExplain();" />
              <label for="input_97_10">Assistant Store Manager</label></span><span class="clearfix"></span>
              <span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_97_11" name="recentPosition" 
              value="I worked more than one position during my employment at Macys" onclick="showPositionExplain();"/>
              <label for="input_97_11">I worked more than one position during my employment at Macy's</label></span><span class="clearfix"></span>
              <span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_97_12" name="recentPosition" value="Other" onclick="showPositionExplain();"/>
              <label for="input_97_12">Other</label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
        <li class="form-line" id="id_98" style="display:none;">
        <label class="form-label-top" id="label_98" for="input_99">Cosmetics: Please explain  </label>
<!--        <div id="cid_98" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_98" class="form-textarea" name="recentPositioncosmeticsExplain" cols="70" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_98-limit">0/1000</span>
              </div></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_106" style="display:none;">
        <label class="form-label-top" id="label_106" for="input_99">Please explain : </label>
<!--        <div id="cid_106" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_106" class="form-textarea" name="oneMorePositionExplain" cols="70" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_106-limit">0/1000</span>
              </div></span>
          </div>
        </div>-->
      </li>
       <li class="form-line" id="id_99" style="display:none;">
        <label class="form-label-top" id="label_99" for="input_99"> Other:  Please explain  </label>
<!--        <div id="cid_99" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_99" class="form-textarea" name="recentPositionOtherExplain " cols="70" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_99-limit">0/1000</span>
              </div></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_300" style="display:none;">
        <div id="cid_300" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_99" class="form-textarea" name="recentPositionExplain" cols="70" rows="6" value=""></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_300-limit">0/1000</span>
              </div></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_12">
        <label class="form-label-top" id="label_12" for="input_12">
          What city was the last Macy's you worked in?<span class="form-required">*</span>
        </label>
        <div id="cid_12" class="form-input-wide">
          <select class="form-dropdown validate[required]" style="width:150px" id="input_12" name="1LocCity" onchange="whatCity();">
            <option>  </option>
            <option selected="selected" value="*Other"> *Other </option>
            <option value="Anitoch - County East Mall"> Anitoch - County East Mall </option>
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
            <option value="Freson - Furniture"> Freson - Furniture </option>
            <option value="Fresno - Salano"> Fresno - Salano </option>
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
            <option value="Sacramento - Roseville Furniture"> Sacramento - Roseville Furniture </option>
            <option value="Salinas - Del Monte Center"> Salinas - Del Monte Center </option>
            <option value="Salinas - Monterey Furniture"> Salinas - Monterey Furniture </option>
            <option value="Salinas - Northridge Furniture"> Salinas - Northridge Furniture </option>
            <option value="San Bernardino - Inland Center"> San Bernardino - Inland Center </option>
            <option value="San Diego - Fashion Valley"> San Diego - Fashion Valley </option>
            <option value="San Diego - Horton Plaza"> San Diego - Horton Plaza </option>
            <option value="San Diego - Misson Valley"> San Diego - Misson Valley </option>
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
            <option value="Union City - Union City Furniture Clearance"> Union City - Union City Furniture Clearance </option>
            <option value="Ventura -Pacific View"> Ventura -Pacific View </option>
            <option value="Visalia - Visalia Mall"> Visalia - Visalia Mall </option>
            <option value="Walnut Creek - Broadway Plaza"> Walnut Creek - Broadway Plaza </option>
            <option value="West Covina - West Covina"> West Covina - West Covina </option>
            <option value="Westminster - Westminster Mall"> Westminster - Westminster Mall </option>
            <option value="Woodland Hills - Promenade"> Woodland Hills - Promenade </option>
          </select>
        </div>
      </li>
      <li class="form-line" id="id_13">
        <label class="form-label-top" id="label_13" for="input_13">
          If Other, enter city here:<span class="form-required">*</span>
        </label>
        <div id="cid_13" class="form-input-wide">
          <input type="text" class="form-textbox validate[required]" id="input_13" name="1LocCity2" size="20" />
        </div>
      </li>
      <li class="form-line" id="id_15">
        <label class="form-label-top" id="label_15" for="input_15">
          When you worked for Macy's, how were you paid? <span class="form-required">*</span>
        </label>
        <div id="cid_15" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" 
          id="input_15_0" name="EmployeeHourly" value="Hourly" onclick="showHowPayExplain();" />
              <label for="input_15_0">Hourly</label></span>
              <span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" 
              id="input_15_1" name="EmployeeHourly" value="Hourly plus commissions" onclick="showHowPayExplain();"/>
              <label for="input_15_1">Hourly plus commissions</label></span>
              <span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" 
              id="input_15_2" name="EmployeeHourly" value=" Salaried" onclick="showHowPayExplain();"/>
              <label for="input_15_2"> Salaried </label></span><span class="clearfix"></span>
              <span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" 
              id="input_15_3" name="EmployeeHourly" value="Salaried plus commissions" onclick="showHowPayExplain();"/>
              <label for="input_15_2"> Salaried plus commissions</label></span><span class="clearfix"></span>
              <span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" 
              id="input_15_4" name="EmployeeHourly" value="Other" onclick="showHowPayExplain();"/>
              <label for="input_15_2">Other</label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_110" style="display:none;">
        <label class="form-label-top" id="label_110" for="input_110"> If Hourly: What was your most recent hourly rate of pay? Please explain  </label>
<!--       <div id="cid_110" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_110" class="form-textarea" name="PaidHourly" cols="70" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_100-limit">0/1000</span>
              </div></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_111" style="display:none;">
        <label class="form-label-top" id="label_111" for="input_111"> If Hourly plus commissions: Please explain </label>
<!--       <div id="cid_111" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_111" class="form-textarea" name="PaidHourlyComms" cols="70" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_100-limit">0/1000</span>
              </div></span>
          </div>
        </div>-->
      </li>
       <li class="form-line" id="id_112" style="display:none;">
        <label class="form-label-top" id="label_112" for="input_112"> If Salaried: Please explain</label>
<!--       <div id="cid_112" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_112" class="form-textarea" name="PaidSalaried" cols="70" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_100-limit">0/1000</span>
              </div></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_113" style="display:none;">
        <label class="form-label-top" id="label_113" for="input_113"> If Salaried plus commissions: Please explain</label>
<!--       <div id="cid_113" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_113" class="form-textarea" name="PaidSalariedComms" cols="70" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_100-limit">0/1000</span>
              </div></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_114" style="display:none;">
        <label class="form-label-top" id="label_114" for="input_114"> If Other: Please explain</label>
<!--       <div id="cid_114" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_114" class="form-textarea" name="PaidOther" cols="70" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_100-limit">0/1000</span>
              </div></span>
          </div>
        </div>-->
      </li>
       <li class="form-line" id="id_301" style="display:none;">
         <div id="cid_301" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_301" class="form-textarea" name="PaidExplain" cols="70" rows="6" value=""></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_301-limit">0/1000</span>
              </div></span>
          </div>
        </div>
      </li>
        <li class="form-line" id="id_22">
        <label class="form-label-top" id="label_22" for="input_22">
          Are you currently employed at Macy's?<span class="form-required">*</span>
        </label>
        <div id="cid_22" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_22_0" name="4CurrentlyEmployed" value="Yes" onclick="employed();"/>
              <label for="input_22_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_22_1" name="4CurrentlyEmployed" value="No" onclick="employed();"/>
              <label for="input_22_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_20">
        <div id="cid_20" class="form-input-wide">
          <div id="text_20" class="form-html">
         <label class="form-label-top">What are your dates of employment at Macy's?</label>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_19">
        <label class="form-label-top" id="label_19" for="input_19">
          Start date<span class="form-required">*</span>
        </label>
        <div id="cid_19" class="form-input-wide">
	<span class="form-sub-label-container">
	<select class="form-textbox" id="month_15" name="startdaymonth">
    	<option name="startdaymonth" value=""> </option>
        <option name="startdaymonth" value="01"> 01 </option>
        <option name="startdaymonth" value="02"> 02 </option>
        <option name="startdaymonth" value="03"> 03 </option>
        <option name="startdaymonth" value="04"> 04 </option>
        <option name="startdaymonth" value="05"> 05 </option>
        <option name="startdaymonth" value="06"> 06 </option>
        <option name="startdaymonth" value="07"> 07 </option>
        <option name="startdaymonth" value="08"> 08 </option>
        <option name="startdaymonth" value="09"> 09 </option>
        <option name="startdaymonth" value="10"> 10 </option>
        <option name="startdaymonth" value="11"> 11 </option>
        <option name="startdaymonth" value="12"> 12 </option>
        </select>
	<!--<input class="form-textbox validate[required]" id="month_19" name="startdaymonth" type="text" size="2" maxlength="2" value="" />-->
	<span class="date-separate">&nbsp;/</span>
            <label class="form-sub-label" for="month_15" id="sublabel_month"> Month </label>
	</span>
	<!--<span class="form-sub-label-container">
	    <input class="noDefault form-textbox validate[required]" id="day_19" name="startdayday" type="text" size="2" maxlength="2" value="" />
	    <span class="date-separate">&nbsp;</span>
            <label class="form-sub-label" for="day_19" id="sublabel_day"> Day
	    </label>
	    </span>-->
	    <span class="form-sub-label-container">
	    <select class="form-textbox" id="year_15" name="startdayyear">
         <option name="startdayyear" value=""> </option>
        <option name="startdayyear" value="1980"> 1980 </option>
        <option name="startdayyear" value="1981"> 1981 </option>
        <option name="startdayyear" value="1982"> 1982 </option>
        <option name="startdayyear" value="1983"> 1983 </option>
        <option name="startdayyear" value="1984"> 1984 </option>
        <option name="startdayyear" value="1985"> 1985 </option>
        <option name="startdayyear" value="1986"> 1986 </option>
        <option name="startdayyear" value="1987"> 1987 </option>
        <option name="startdayyear" value="1988"> 1988 </option>
        <option name="startdayyear" value="1989"> 1989 </option>
        <option name="startdayyear" value="1990"> 1990 </option>
        <option name="startdayyear" value="1991"> 1991 </option>
        <option name="startdayyear" value="1992"> 1992 </option>
        <option name="startdayyear" value="1993"> 1993 </option>
        <option name="startdayyear" value="1994"> 1994 </option>
        <option name="startdayyear" value="1995"> 1995 </option>
        <option name="startdayyear" value="1996"> 1996 </option>
        <option name="startdayyear" value="1997"> 1997 </option>
        <option name="startdayyear" value="1998"> 1998 </option>
        <option name="startdayyear" value="1999"> 1999 </option>
        <option name="startdayyear" value="2000"> 2000 </option>
        <option name="startdayyear" value="2001"> 2001 </option>
        <option name="startdayyear" value="2002"> 2002 </option>
        <option name="startdayyear" value="2003"> 2003 </option>
        <option name="startdayyear" value="2004"> 2004 </option>
        <option name="startdayyear" value="2005"> 2005 </option>
        <option name="startdayyear" value="2006"> 2006 </option>
        <option name="startdayyear" value="2007"> 2007 </option>
        <option name="startdayyear" value="2008"> 2008 </option>
        <option name="startdayyear" value="2009"> 2009 </option>
        <option name="startdayyear" value="2010"> 2010 </option>
        <option name="startdayyear" value="2011"> 2011 </option>
        <option name="startdayyear" value="2012"> 2012 </option>
        </select>
	    <!--<input class="form-textbox validate[required]" id="year_19" name="startdayyear" type="text" size="4" maxlength="4" value="" />-->
            <label class="form-sub-label" for="year_15" id="sublabel_year"> Year
	    </label>
	    </span>
	    <span class="form-sub-label-container">
	    <!--<img alt="Pick a Date" id="input_19_pick" src="https://jotform.us/images/calendar.png" align="absmiddle" />-->
            <label class="form-sub-label" for="input_19_pick"> &nbsp;&nbsp;&nbsp; </label></span>
        </div>
      </li>
      <li class="form-line" id="id_21">
        <label class="form-label-top" id="label_21" for="input_21">
          End Date<span class="form-required">*</span>
        </label>
        <div id="cid_21" class="form-input-wide"><span class="form-sub-label-container">
	<!--<input class="form-textbox validate[required]" id="month_21" name="formerlastdaymonth" type="text" size="2" maxlength="2" value="" />-->
	<select class="form-textbox" id="month_19" name="formerlastdaymonth">
    	<option name="formerlastdaymonth" value=""> </option>
        <option name="formerlastdaymonth" value="01"> 01 </option>
        <option name="formerlastdaymonth" value="02"> 02 </option>
        <option name="formerlastdaymonth" value="03"> 03 </option>
        <option name="formerlastdaymonth" value="04"> 04 </option>
        <option name="formerlastdaymonth" value="05"> 05 </option>
        <option name="formerlastdaymonth" value="06"> 06 </option>
        <option name="formerlastdaymonth" value="07"> 07 </option>
        <option name="formerlastdaymonth" value="08"> 08 </option>
        <option name="formerlastdaymonth" value="09"> 09 </option>
        <option name="formerlastdaymonth" value="10"> 10 </option>
        <option name="formerlastdaymonth" value="11"> 11 </option>
        <option name="formerlastdaymonth" value="12"> 12 </option>
        </select>
	<span class="date-separate">&nbsp;/</span>
            <label class="form-sub-label" for="month_19" id="sublabel_month"> Month
	    </label>
	</span>
	    <!--<span class="form-sub-label-container">
	    <input class="noDefault form-textbox validate[required]" id="day_21" name="formerlastdayday" type="text" size="2" maxlength="2" value="" />
	    <span class="date-separate">&nbsp;</span>
            <label class="form-sub-label" for="day_21" id="sublabel_day"> Day </label>
	    </span>-->
	    <span class="form-sub-label-container">
	    <!--<input class="form-textbox validate[required]" id="year_21" name="formerlastdayyear" type="text" size="4" maxlength="4" value="" />--><select class="form-textbox" id="year_19" name="formerlastdayyear">
        <option name="formerlastdayyear" value=""> </option>
        <option name="formerlastdayyear" value="1980"> 1980 </option>
        <option name="formerlastdayyear" value="1981"> 1981 </option>
        <option name="formerlastdayyear" value="1982"> 1982 </option>
        <option name="formerlastdayyear" value="1983"> 1983 </option>
        <option name="formerlastdayyear" value="1984"> 1984 </option>
        <option name="formerlastdayyear" value="1985"> 1985 </option>
        <option name="formerlastdayyear" value="1986"> 1986 </option>
        <option name="formerlastdayyear" value="1987"> 1987 </option>
        <option name="formerlastdayyear" value="1988"> 1988 </option>
        <option name="formerlastdayyear" value="1989"> 1989 </option>
        <option name="formerlastdayyear" value="1990"> 1990 </option>
        <option name="formerlastdayyear" value="1991"> 1991 </option>
        <option name="formerlastdayyear" value="1992"> 1992 </option>
        <option name="formerlastdayyear" value="1993"> 1993 </option>
        <option name="formerlastdayyear" value="1994"> 1994 </option>
        <option name="formerlastdayyear" value="1995"> 1995 </option>
        <option name="formerlastdayyear" value="1996"> 1996 </option>
        <option name="formerlastdayyear" value="1997"> 1997 </option>
        <option name="formerlastdayyear" value="1998"> 1998 </option>
        <option name="formerlastdayyear" value="1999"> 1999 </option>
        <option name="formerlastdayyear" value="2000"> 2000 </option>
        <option name="formerlastdayyear" value="2001"> 2001 </option>
        <option name="formerlastdayyear" value="2002"> 2002 </option>
        <option name="formerlastdayyear" value="2003"> 2003 </option>
        <option name="formerlastdayyear" value="2004"> 2004 </option>
        <option name="formerlastdayyear" value="2005"> 2005 </option>
        <option name="formerlastdayyear" value="2006"> 2006 </option>
        <option name="formerlastdayyear" value="2007"> 2007 </option>
        <option name="formerlastdayyear" value="2008"> 2008 </option>
        <option name="formerlastdayyear" value="2009"> 2009 </option>
        <option name="formerlastdayyear" value="2010"> 2010 </option>
        <option name="formerlastdayyear" value="2011"> 2011 </option>
        <option name="formerlastdayyear" value="2012"> 2012 </option>
        </select>
            <label class="form-sub-label" for="year_19" id="sublabel_year"> Year </label></span><span class="form-sub-label-container"><!--<img alt="Pick a Date" id="input_21_pick" src="https://jotform.us/images/calendar.png" align="absmiddle" />-->
            <label class="form-sub-label" for="input_21_pick"> &nbsp;&nbsp;&nbsp; </label></span>
        </div>
      </li>
      <li class="form-line" id="id_104">
        <label class="form-label-top" id="label_104" for="input_104"> Please identify the names and contact information for any of your friends or coworkers who also worked at Macy's. </label>
        <div id="cid_104" class="form-input-wide">
          <textarea id="input_104" class="form-textarea" name="identifypeople" cols="40" rows="6" value=""></textarea>
        </div>
      </li>
      <li id="cid_25" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_25" onclick="showDiv1();">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_25" 
            onClick="validateLongFormDiv2();">
              Next
            </button>
          </div>
        </div>
          <div class="clear"></div>
        <p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>
      </li>
    </ul>
    <ul class="form-section" id="session3" style="display:none;"><a name="TOP3">&nbsp;</a>
      <li id="cid_23" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_23" class="form-subHeader">
            Were you not able to take meal breaks? (Interview Section 3 of 9)
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_24">
        <div id="cid_24" class="form-input-wide">
          <div id="text_24" class="form-html">            
              <p>With certain exceptions, California law requires that: (1) employers provide hourly employees with at least a 30-minute <u>uninterrupted</u> meal break every day in which the employee works more than 5 hours; and (2) employers provide employees who work more than 10 hours in one day with two 30-minute <u>uninterrupted</u> meal breaks.<br/><br/></p>
               <p>
For each workday that an employer fails to provide an employee with a required 30-minute <u>uninterrupted</u> meal break, the employee is entitled to recover an additional hour of pay at the employee’s regular rate.
            </p>
            
          </div>
        </div>
      </li>

      <li class="form-line" id="id_27">
        <label class="form-label-top" id="label_27" for="input_27">
         In your most recent position working at Macy's, on average, how many hours was your typical shift? <span class="form-required">*</span>
        </label>
        <div id="cid_27" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="hidden" name="Category1"/>
          	  <input type="radio" class="form-radio validate[required]" id="input_27_0" name="4Category" value="Less than 4 hours" />
              <label for="input_27_0"> Less than 4 hours </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_27_1" name="4Category" value="Between 4 hours to 8 hours"  />
              <label for="input_27_1"> Between 4 hours to 8 hours </label></span><span class="clearfix">
              </span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_27_2" name="4Category" value="More than 8 hours" />
              <label for="input_27_2"> More than 8 hours </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_27_3" name="4Category" value="10 hours or more" />
              <label for="input_27_3"> 10 hours or more </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_28">
        <label class="form-label-top" id="label_28" for="input_28">
          Did you ever agree to waive your meal breaks in your most recent position at Macy's? In other words, did you ever agree to not take your meal breaks? <span class="form-required">*</span>
        </label>
        <div id="cid_28" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          	  <input type="radio" class="form-radio validate[required]" id="input_28_0" name="7Cat1MealBreakWaived" value="YesAlways" />
              <label for="input_28_0"> Yes, always</label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
               <input type="radio" class="form-radio validate[required]" id="input_28_1" name="7Cat1MealBreakWaived" value="YesSometimes" />
              <label for="input_28_1"> Yes, sometimes</label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_28_2" name="7Cat1MealBreakWaived" value="No"  />
              <label for="input_28_2"> No, never </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_28_3" name="7Cat1MealBreakWaived" value="I dont remember"/>
              <label for="input_28_3"> I don't remember </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_29">
        <label class="form-label-top" id="label_29" for="input_29">
         In your most recent position at Macy's, were you ever NOT able to take at least a 30-minute <u>uninterrupted</u> meal break when you worked shifts of more than 5 hours? <span class="form-required">*</span>
        </label>
        <div id="cid_29" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_29_0" name="7MealWhenWorkingBetween5and6hours" value="Yes"/>
          <label for="input_29_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_29_1" name="7MealWhenWorkingBetween5and6hours" value="No"/>
          <label for="input_29_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_30">
        <label class="form-label-top" id="label_30" for="input_30">
          How often were you NOT able to take an <u>uninterrupted</u> 30-minute meal break in your most recent position at Macy's? (Check the one that best describes your situation.) <span class="form-required">*</span>
        </label>
        <div id="cid_30" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_30_0" name="7MealBreakMissedCat1Freq" value="Everyday" />
              <label for="input_30_0"> Everyday </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_30_1" name="7MealBreakMissedCat1Freq" value="Several times a week" />
              <label for="input_30_1"> Several times a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_30_2" name="7MealBreakMissedCat1Freq" value="Once a week" />
              <label for="input_30_2"> Once a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_30_3" name="7MealBreakMissedCat1Freq" value="Once a month" />
              <label for="input_30_3"> Once a month </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_30_4" name="7MealBreakMissedCat1Freq" 
              value="Not applicable, I never missed a meal break" />
              <label for="input_30_4">Not applicable, I never missed a meal break</label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_31">
        <label class="form-label-top" id="label_31" for="input_31">
          In general, why did you NOT take meal breaks in your most recent position working at Macy's?<span class="form-required">*</span>
        </label>
        <div id="cid_31" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_31_0" name="7MealBreakMissedCat1Why" value="Employer demands (e.g., understaffed, not allowed by supervisor, too busy)"  onclick="whyMealBreakExplain();"/>
              <label for="input_31_0"> Employer demands (e.g., understaffed, not allowed by supervisor, too busy) </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_31_1" name="7MealBreakMissedCat1Why" value="I did not want to take a meal break" 
              onclick="whyMealBreakExplain();" />
              <label for="input_31_1"> I did not want to take a meal break </label></span><span class="clearfix"></span>
              <span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_31_2" name="7MealBreakMissedCat1Why" value="Other" 
              onclick="whyMealBreakExplain();" />
              <label for="input_31_2"> Other </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
               <input type="radio" class="form-radio validate[required]" id="input_31_3" name="7MealBreakMissedCat1Why" 
               value="Not applicable, I never missed a meal break" onclick="whyMealBreakExplain();" />
              <label for="input_31_3">Not applicable, I never missed a meal break</label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_115" style="display:none;">
        <label class="form-label-top" id="label_115" for="input_115">If Employer Demands: Please explain </label>
<!--        <div id="cid_115" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_115" class="form-textarea" name="notMealBreakDemandExplain" cols="70" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_115-limit">0/1000</span>
              </div></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_116" style="display:none;">
        <label class="form-label-top" id="label_116" for="input_116"> If I did not want to take a meal break: Please explain </label>
<!--        <div id="cid_116" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_116" class="form-textarea" name="notMealBreakDontExplain" cols="70" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_116-limit">0/1000</span>
              </div></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_117" style="display:none;">
        <label class="form-label-top" id="label_117" for="input_117"> If other: Please explain </label>
<!--        <div id="cid_117" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_117" class="form-textarea" name="notMealBreakOtherExplain" cols="70" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_117-limit">0/1000</span>
              </div></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_302" style="display:none;">
          <div id="cid_302" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_302" class="form-textarea" name="missMealBreakrExplain" cols="70" rows="6" value=""></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_302-limit">0/1000</span>
              </div></span>
          </div>
        </div>
      </li>        
      <li class="form-line" id="id_32">
        <label class="form-label-top" id="label_32" for="input_32">
          Did you ever work shifts of more than 10 hours in your most recent position at Macy's?<span class="form-required">*</span>
        </label>
        <div id="cid_32" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_32_0" name="7EverMoreThan10" value="Yes" />
              <label for="input_32_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_32_1" name="7EverMoreThan10" value="No"/>
              <label for="input_32_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_33">
        <label class="form-label-top" id="label_33" for="input_33">
          Were you ever NOT able to take 2 <u>uninterrupted</u> 30-minute meal breaks when you worked shifts of more than 10 hours in your most recent position at Macy's? <span class="form-required">*</span>
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
         How often were you NOT able to take both of your 30-minute meal breaks when you worked more than 10 hours in a day? <span class="form-required">*</span>
        </label>
        <div id="cid_34" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_34_0" name="7Cat3Missed2ndMealBreakOften" value="Everyday" />
              <label for="input_34_0"> Everyday </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_34_1" name="7Cat3Missed2ndMealBreakOften" value="Several times a week" />
              <label for="input_34_1"> Several times a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_34_2" name="7Cat3Missed2ndMealBreakOften" value="Once a week" />
              <label for="input_34_2"> Once a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_34_3" name="7Cat3Missed2ndMealBreakOften" value="Once a month" />
              <label for="input_34_3"> Once a month </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
               <input type="radio" class="form-radio validate[required]" id="input_34_4" name="7Cat3Missed2ndMealBreakOften" 
               value="Not applicable, I never missed a meal break" />
              <label for="input_34_4">Not applicable, I never missed a meal break</label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_35">
        <label class="form-label-top" id="label_35" for="input_35">
         Did you receive an additional hour of pay on those occasions you were unable to take an <u>uninterrupted</u> 30-minute meal break? <span class="form-required">*</span>
        </label>
        <div id="cid_35" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_35_0" name="7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay" 
          value="Always" />
           <label for="input_35_0"> Always </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_35_1" name="7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay" 
          value="Usually" />
         <label for="input_35_1"> Usually </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">             
         <input type="radio" class="form-radio validate[required]" id="input_35_2" name="7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay" 
          value="Never" />
          <label for="input_35_2">  Never </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_35_3" name="7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay" 
          value="I dont remember" />
          <label for="input_35_3"> I don't remember </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_35_4" name="7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay" 
          value="Not applicable, I never missed a meal break" />
          <label for="input_35_4">Not applicable, I never missed a meal break</label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_36">
        <label class="form-label-top" id="label_36" for="input_36">Please explain any of your answers:</label>
        <div id="cid_36" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_36" class="form-textarea" name="session3Explain" cols="70" rows="6" value=""></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_36-limit">0/1000</span>
              </div></span>
          </div>
        </div>
      </li> 
      <li id="cid_37" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_37" onClick="showDiv2();">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_37" onClick="validateLongFormDiv3();">
              Next
            </button>
          </div>
        </div>
          <div class="clear"></div>
        <p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>
      </li>
    </ul>
    <ul class="form-section" id="session4" style="display:none;"><a name="TOP4">&nbsp;</a>
      <li id="cid_36" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_36" class="form-subHeader">
           Were you not able to take rest breaks? (Interview Section 4 of 9)
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_38">
        <div id="cid_38" class="form-input-wide">
          <div id="text_38" class="form-html">
            <p>
With certain exceptions, California law also requires that employers allow employees to take at least a 10-minute <u>uninterrupted</u> rest break for every 4 hours worked. For each day an employer prevents, stops, or interrupts a required 10-minute rest break, the employee is entitled to recover an additional hour of pay at the employee's regular rate of pay.
            </p>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_39">
        <label class="form-label-top" id="label_39" for="input_39">
          Were you ever NOT able to take at least a 10-minute <u>uninterrupted</u> rest break for every 4 hours worked in a day in your most recent position working at Macy's? <span class="form-required">*</span>
        </label>
        <div id="cid_39" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="hidden" name="RestEverMissed1"/>
          <input type="radio" class="form-radio validate[required]" id="input_39_0" name="8RestEverMissed" value="Yes"/>
              <label for="input_39_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_39_1" name="8RestEverMissed" value="No"/>
              <label for="input_39_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_40">
        <label class="form-label-top" id="label_40" for="input_40">
         How often were you NOT able to take at least a 10-minute <u>uninterrupted</u> rest break after working 4 hours in your most recent position working at Macy's?<span class="form-required">*</span>
        </label>
        <div id="cid_40" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_40_0" name="8HowOftenMissRest" value="Every day" />
              <label for="input_40_0"> Every day </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_40_1" name="8HowOftenMissRest" value="Several times a week" />
              <label for="input_40_1"> Several times a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_40_2" name="8HowOftenMissRest" value="Once a week" />
              <label for="input_40_2"> Once a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_40_3" name="8HowOftenMissRest" value="Once a month" />
              <label for="input_40_3"> Once a month </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
             <input type="radio" class="form-radio validate[required]" id="input_40_4" name="8HowOftenMissRest" 
          value="Not applicable, I never missed a rest break" />
              <label for="input_40_4">Not applicable, I never missed a rest break</label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_41">
        <label class="form-label-top" id="label_41" for="input_41">
         Why would you miss your rest breaks in your most recent position working at Macy's?<span class="form-required">*</span>
        </label>
        <div id="cid_41" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_41_0" name="8WhyMiss10MinRest" 
          value="Employer demands (e.g., understaffed, not allowed by supervisor, too busy, too much work)" 
          onclick="whyRestBreakExplain();" />
          <label for="input_41_0"> Employer demands (e.g., understaffed, not allowed by supervisor, too busy, too much work) </label>
          </span><span class="clearfix"></span>
          <span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_41_1" name="8WhyMiss10MinRest" value="I did not want to take a rest break" 
          onclick="whyRestBreakExplain();" />
           <label for="input_41_1"> I did not want to take a rest break </label></span><span class="clearfix"></span>
          <span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_41_2" name="8WhyMiss10MinRest" value="Other"  onclick="whyRestBreakExplain();"/>
          <label for="input_41_2"> Other </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
         <input type="radio" class="form-radio validate[required]" id="input_41_3" name="8WhyMiss10MinRest" 
          value="Not applicable, I never missed a rest break" onclick="whyRestBreakExplain();" />
         <label for="input_41_3">Not applicable, I never missed a rest break</label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
        <li class="form-line" id="id_118" style="display:none;">
        <label class="form-label-top" id="label_118" for="input_118">If Employer Demands: Please explain </label>
<!--        <div id="cid_118" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_118" class="form-textarea" name="notMealRestDemandExplain" cols="70" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_118-limit">0/1000</span>
              </div></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_119" style="display:none;">
        <label class="form-label-top" id="label_119" for="input_119"> If I did not want to take a meal break: Please explain </label>
<!--        <div id="cid_119" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_119" class="form-textarea" name="notRestBreakDontExplain" cols="70" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_119-limit">0/1000</span>
              </div></span>
          </div>
        </div>-->
      </li>
      <li class="form-line" id="id_120" style="display:none;">
        <label class="form-label-top" id="label_120" for="input_120"> If other: Please explain </label>
<!--        <div id="cid_120" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_120" class="form-textarea" name="notRestBreakOtherExplain" cols="70" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_120-limit">0/1000</span>
              </div></span>
          </div>
        </div>-->
      </li>
       <li class="form-line" id="id_303" style="display:none;">
         <div id="cid_303" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_303" class="form-textarea" name="missRestBreakExplain" cols="70" rows="6" value=""></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_303-limit">0/1000</span>
              </div></span>
          </div>
        </div>
      </li>        
      <li class="form-line" id="id_42">
        <label class="form-label-top" id="label_42" for="input_42">
         If you were ever NOT able to take a 10-minute <u>uninterrupted</u> rest break, were you paid an additional hour of pay on each occasion that this occurred?<span class="form-required">*</span>
        </label>
        <div id="cid_42" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_42_0" name="8ExtraHourPay" value="Yes, always" />
              <label for="input_42_0"> Yes, always </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_42_1" name="8ExtraHourPay" value="Sometimes" />
              <label for="input_42_1"> Sometimes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_42_2" name="8ExtraHourPay" value="No" />
              <label for="input_42_2"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_42_3" name="8ExtraHourPay" value="I dont remember" />
              <label for="input_42_3"> I don't remember </label></span><span class="clearfix"></span> <span class="form-radio-item" style="clear:left;">
             <input type="radio" class="form-radio validate[required]" id="input_42_4" name="8ExtraHourPay" 
          value="Not applicable, I never missed a rest break" />
              <label for="input_42_4">Not applicable, I never missed a rest break</label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
       <li class="form-line" id="id_203">
        <label class="form-label-top" id="label_203" for="input_203">Please explain any of your answers:</label>
        <div id="cid_203" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_203" class="form-textarea" name="session4Explain" cols="70" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_203-limit">0/1000</span>
              </div></span>
          </div>
        </div>
      </li> 
      <li id="cid_49" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_49" onClick="showDiv3();">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_49" onClick="validateLongFormDiv4();">
              Next
            </button>
          </div>
        </div>
          <div class="clear"></div>
        <p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>
      </li>
    </ul>
    <ul class="form-section" id="session5" style="display:none;"><a name="TOP5">&nbsp;</a>
      <li id="cid_43" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_43" class="form-subHeader">
            Were you compensated for off the clock work and overtime? (Interview Section 5 of 9)
          </h2>
        </div>
      </li>
       <li class="form-line" id="id_43">
        <div id="cid_43_0" class="form-input-wide">
          <div id="text_43" class="form-html">
            <p>
Under California law, employers are required to pay employees at least the current minimum wage for all hours worked. If employees are required to perform work-related tasks either before clocking-in or after clocking-out, the employee is entitled to compensation for such off-the-clock work. In addition, if an employee works more than 8 hours in a single day or more than 40 hours in a week, the employee is entitled to 1&frac12;times their regular hourly rate for those hours worked after 8 hours in a single day and/or 40 hours in a week. If an employee works more than 12 hours in a single day, the employee is entitled to double-time pay for those hours worked after 12 hours.
            </p>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_44">
        <label class="form-label-top" id="label_44" for="input_44">
      In your most recent position working at Macy's, when you were leaving the store for a meal break or at the end of your shift, were you required to have your personal bag checked before you could leave? <span class="form-required">*</span>
        </label>
        <div id="cid_44" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="hidden" name="BagsChecksYesNo1"/>
          <input type="radio" class="form-radio validate[required]" id="input_44_0" name="9BagsChecksYesNo" 
          value="Yes, and I was off the clock (not paid) during the bag check" />
              <label for="input_44_0"> Yes, and I was off the clock (not paid) during the bag check</label></span><span class="clearfix"></span>
              <span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_44_1" name="9BagsChecksYesNo" 
              value="Yes, and I was on the clock (paid) during the bag check" />
              <label for="input_44_1"> Yes, and I was on the clock (paid) during the bag check </label></span><span class="clearfix"></span>
              <span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_44_2" name="9BagsChecksYesNo" value="No" />
              <label for="input_44_2"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_45">
        <label class="form-label-top" id="label_45" for="input_45">
          How often were your bags checked?<span class="form-required">*</span>
        </label>
        <div id="cid_45" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_45_0" name="9BagsCheckedEverytimeLeaving" value="Every shift" />
              <label for="input_45_0"> Every shift </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_45_1" name="9BagsCheckedEverytimeLeaving" value="Several times a week" />
              <label for="input_45_1"> Several times a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_45_2" name="9BagsCheckedEverytimeLeaving" value="Once a week" />
              <label for="input_45_2"> Once a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_45_3" name="9BagsCheckedEverytimeLeaving" value="Once a month" />
              <label for="input_45_3"> Once a month </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
             <input type="radio" class="form-radio validate[required]" id="input_45_4" name="9BagsCheckedEverytimeLeaving" 
          value="Not applicable, I never had my bags checked" />
              <label for="input_45_4">Not applicable, I never had my bags checked</label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_46">
        <label class="form-label-top" id="label_46" for="input_46">
          Did you have to wait for your co-workers to have their belongings checked before you could leave?<span class="form-required">*</span>
        </label>
        <div id="cid_46" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_46_0" name="9BagsCheckedWait" value="Yes" onclick="waitCoWorkers()"/>
          <label for="input_46_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_46_1" name="9BagsCheckedWait" value="No" onclick="waitCoWorkers()" />
          <label for="input_46_1"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
         <input type="radio" class="form-radio validate[required]" id="input_46_2" name="9BagsCheckedWait" 
          value="Not applicable, I never had my bags checked" onclick="waitCoWorkers()" />
         <label for="input_46_2">Not applicable, I never had my bags checked</label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
       <li class="form-line" id="id_47">
        <label class="form-label-top" id="label_47" for="input_47">
          In general, approximately how long would you have to wait to complete the entire bag check process before you could leave the store? <span class="form-required">*</span>
        </label>
       <div id="cid_47" class="form-input-wide">
 	<span class="form-sub-label-container">
    <select class="form-textbox" id="hour_109" name="bagCheckWaitHour"> 
        <option  value="00">00</option>
        <option  value="01">01</option>
        <option  value="02">02</option>
        <option  value="03">03</option>
        <option  value="04">04</option>
        <option  value="05">05</option>
        <option  value="06">06</option>
        <option  value="07">07</option>
        <option  value="08">08</option>
        <option  value="09">09</option>
        <option  value="10">10</option>
        <option  value="11">11</option>
        <option  value="12">12</option>
        <option  value="13">13</option>
        <option  value="14">14</option>
        <option  value="15">15</option>
        <option  value="16">16</option>
        <option  value="17">17</option>
        <option  value="18">18</option>
        <option  value="19">19</option>
        <option  value="20">20</option>
        <option  value="21">21</option>
        <option  value="22">22</option>
        <option  value="23">23</option>
        </select><label class="form-sub-label" for="hour_109" id="sublabel_bagCheckWaitHour">Hour</label>       
        </span>
		<span class="date-separate">&nbsp;</span>
 
        <span class="form-sub-label-container">
       <select class="form-textbox" id="minute_109" name="bagCheckWaitMinute"> 
        <option  value="00">00</option>	
        <option  value="00">00</option>      
        <option  value="05">05</option>
        <option  value="10">10</option> 
        <option  value="15">15</option>
        <option  value="20">20</option> 
        <option  value="25">25</option>
        <option  value="30">30</option>
        <option  value="35">35</option>
        <option  value="40">40</option>
        <option  value="45">45</option>
        <option  value="50">50</option> 
        <option  value="55">55</option>    
       </select><label class="form-sub-label" for="minute_109" id="sublabel_bagCheckWaitMinute">Minute</label>
      </span>
        </div>
      </li>
      <li class="form-line" id="id_51">
        <label class="form-label-top" id="label_51" for="input_51">
          Did you ever work the closing shift in your most recent position working at Macy's?<span class="form-required">*</span>
        </label>
        <div id="cid_51" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_51_0" name="10EverWorkClosingShift" value="Yes"/>
          <label for="input_51_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
         <input type="radio" class="form-radio validate[required]" id="input_51_1" name="10EverWorkClosingShift" value="No" />
         <label for="input_51_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
       <li class="form-line" id="id_52">
        <label class="form-label-top" id="label_52" for="input_52">
         After you had clocked out, did you have to wait to leave the store at the end of your shift?<span class="form-required">*</span>
        </label>
        <div id="cid_52" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_52_0" name="9BagsCheckedEverytimeWaitToLeaving" 
          value="Yes, I had to wait for my fellow employees before I could leave" onclick="waitToLeave();"/>
          <label for="input_52_0">Yes, I had to wait for my fellow employees before I could leave</label></span>
          <span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_52_1" name="9BagsCheckedEverytimeWaitToLeaving" 
          value="Yes, I had to wait for a manager or supervisor to let me out of the store" onclick="waitToLeave();"/>
          <label for="input_52_1"> Yes, I had to wait for a manager or supervisor to let me out of the store</label></span>
          <span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
           <input type="radio" class="form-radio validate[required]" id="input_52_2" name="9BagsCheckedEverytimeWaitToLeaving" value="Both" onclick="waitToLeave();" />
           <label for="input_52_2">Both </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
           <input type="radio" class="form-radio validate[required]" id="input_52_3" name="9BagsCheckedEverytimeWaitToLeaving" value="No" onclick="waitToLeave();"/>
           <label for="input_52_3">No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li> 
      <li class="form-line" id="id_109">
        <label class="form-label-top" id="label_109" for="input_109">
      In general, approximately how long would you have to wait? <span class="form-required">*</span>
        </label>
       <div id="cid_109" class="form-input-wide">
   	<span class="form-sub-label-container">        
        <select class="form-textbox" id="hour_110" name="generalWaitHour">  
        <option  value="00">00</option>
        <option  value="01">01</option>
        <option  value="02">02</option>
        <option  value="03">03</option>
        <option  value="04">04</option>
        <option  value="05">05</option>
        <option  value="06">06</option>
        <option  value="07">07</option>
        <option  value="08">08</option>
        <option  value="09">09</option>
        <option  value="10">10</option>
        <option  value="11">11</option>
        <option  value="12">12</option>
        <option  value="13">13</option>
        <option  value="14">14</option>
        <option  value="15">15</option>
        <option  value="16">16</option>
        <option  value="17">17</option>
        <option  value="18">18</option>
        <option  value="19">19</option>
        <option  value="20">20</option>
        <option  value="21">21</option>
        <option  value="22">22</option>
        <option  value="23">23</option>
        </select><label class="form-sub-label" for="hour_110" id="sublabel_generalWaitHour">Hour</label>
        </span>
		<span class="date-separate">&nbsp;</span>
 
        <span class="form-sub-label-container">
       <select class="form-textbox" id="minute_110" name="generalWaitMinute">
        <option  value="00">00</option>	
        <option  value="00">00</option>      
        <option  value="05">05</option>
        <option  value="10">10</option> 
        <option  value="15">15</option>
        <option  value="20">20</option> 
        <option  value="25">25</option>
        <option  value="30">30</option>
        <option  value="35">35</option>
        <option  value="40">40</option>
        <option  value="45">45</option>
        <option  value="50">50</option> 
        <option  value="55">55</option>    
        </select>
      <label class="form-sub-label" for="minute_110" id="sublabel_generalWaitMinute">Minute</label>       
</span>
        </div>
      </li>
        <li class="form-line" id="id_93">
        <label class="form-label-top" id="label_93" for="input_93">
        Did you ever perform work-related tasks before clocking-in or after clocking-out for which you believe you were not paid in your most recent position at Macy’s?<span class="form-required">*</span>
        </label>
        <div id="cid_93" class="form-input-wide">
        <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
        <input type="radio" class="form-radio validate[required]" id="input_93_0" name="workOutClock" value="Yes" onclick="outClockExplain();" />
        <label for="input_93_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
        <input type="radio" class="form-radio validate[required]" id="input_93_1" name="workOutClock" value="No" onclick="outClockExplain();"/>
        <label for="input_93_1"> No </label></span><span class="clearfix"></span>
        </div>
        </div>
      </li>
      <li class="form-line" id="id_121" style="display:none;">
        <label class="form-label-top" id="label_121" for="input_121">If Yes: Please explain</label>
        <div id="cid_121" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_121" class="form-textarea" name="afterBeforeClockExplain" cols="70" rows="6" value =""></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_121-limit">0/1000</span>
              </div></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_57">
        <label class="form-label-top" id="label_57" for="input_57">
         On average, how many minutes a week would you perform work-related tasks while you were off the clock? <span class="form-required">*</span>
        </label>
       <div id="cid_57" class="form-input-wide">
  	<span class="form-sub-label-container">        
      <select class="form-textbox" id="hour_57" name="offClockHour">   
        <option  value="00">00</option>
        <option  value="01">01</option>
        <option  value="02">02</option>
        <option  value="03">03</option>
        <option  value="04">04</option>
        <option  value="05">05</option>
        <option  value="06">06</option>
        <option  value="07">07</option>
        <option  value="08">08</option>
        <option  value="09">09</option>
        <option  value="10">10</option>
        <option  value="11">11</option>
        <option  value="12">12</option>
        <option  value="13">13</option>
        <option  value="14">14</option>
        <option  value="15">15</option>
        <option  value="16">16</option>
        <option  value="17">17</option>
        <option  value="18">18</option>
        <option  value="19">19</option>
        <option  value="20">20</option>
        <option  value="21">21</option>
        <option  value="22">22</option>
        <option  value="23">23</option>
        </select>  <label class="form-sub-label" for="hour_57" id="sublabel_offClockHour">Hour</label>
        </span>
		<span class="date-separate">&nbsp;</span>
 
        <span class="form-sub-label-container">
        <select class="form-textbox" id="minute_57" name="offClockMinute">
        <option  value="00">00</option>	
        <option  value="00">00</option>      
        <option  value="05">05</option>
        <option  value="10">10</option> 
        <option  value="15">15</option>
        <option  value="20">20</option> 
        <option  value="25">25</option>
        <option  value="30">30</option>
        <option  value="35">35</option>
        <option  value="40">40</option>
        <option  value="45">45</option>
        <option  value="50">50</option> 
        <option  value="55">55</option>    
        </select> 
<label class="form-sub-label" for="minute_57" id="sublabel_offClockMinute">Minute</label>
</span>
        </div>
      </li>
      <li class="form-line" id="id_200">
        <label class="form-label-top" id="label_200" for="input_200">Please explain any of your answers:</label>
        <div id="cid_200" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_200" class="form-textarea" name="session5Explain" cols="70" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_200-limit">0/1000</span>
              </div></span>
          </div>
        </div>
      </li> 
      <li id="cid_50" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_50" onClick="showDiv4();">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_50" onClick="validateLongFormDiv5();">
              Next
            </button>
          </div>
        </div>
          <div class="clear"></div>
        <p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>
      </li>
    </ul>
    <ul class="form-section" id="session6" style="display:none;"><a name="TOP6">&nbsp;</a>
      <li id="cid_59" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_59" class="form-subHeader">
         Were you paid all of your final wages? (Interview Section 6 of 9)
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_62">
        <div id="cid_62" class="form-input-wide">
          <div id="text_62" class="form-html">
            <p>
Under California law, all wages due must be paid at the time of termination of employment, unless the employee quits without giving at least 72 hours' notice, in which case the employer must pay the employee's final wages within 72 hours of quitting.
            </p>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_63">
        <label class="form-label-top" id="label_63" for="input_63">
        In your most recent position working at Macy's, were you terminated (laid-off or fired) or did you quit your employment? <span class="form-required">*</span>
        </label>
        <div id="cid_63" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="hidden" name="TermType1"/>
          <input type="radio" class="form-radio validate[required]" id="input_63_0" name="12TermType" value="Terminated" onclick="layOffOrQuit();" />
          <label for="input_63_0"> Terminated </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_63_1" name="12TermType" value="Quit" onclick="layOffOrQuit();"/>
          <label for="input_63_1"> Quit </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_64">
        <label class="form-label-top" id="label_64" for="input_64">
          If you quit, did you provide at least 72 hours' notice before quitting?<span class="form-required">*</span>
        </label>
        <div id="cid_64" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_64_0" name="12SeventyTwoHoursOrLess" value="Yes" />
          <label for="input_64_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_64_1" name="12SeventyTwoHoursOrLess" value="No" />
          <label for="input_64_1"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_64_2" name="12SeventyTwoHoursOrLess" value="Not applicable, I did not quit" />
          <label for="input_64_2"> Not applicable, I did not quit </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_65">
        <label class="form-label-top" id="label_65" for="input_65">
          If you were terminated or you quit after giving at least 72 hours' notice, did you receive all your final paycheck on your last day of work?<span class="form-required">*</span>
        </label>
        <div id="cid_65" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_65_0" name="12DidYouGetFinalCheckOnLastDay" value="Yes" />
          <label for="input_65_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_65_1" name="12DidYouGetFinalCheckOnLastDay" value="No" />
           <label for="input_65_1"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
           <input type="radio" class="form-radio validate[required]" id="input_65_2" name="12DidYouGetFinalCheckOnLastDay" 
           value="Not applicable, I did not quit after giving at least 72 hours notice or I was not terminated" />
           <label for="input_65_2">Not applicable, I did not quit after giving at least 72 hours' notice or I was not terminated</label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_67">
        <label class="form-label-top" id="label_67" for="input_67">
          If you quit without providing at least 72 hours' notice, did you receive your final paycheck within 72 hours of quitting?<span class="form-required">*</span>
        </label>
        <div id="cid_67" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_67_0" name="12withoutSeventyTwoHoursOrLess" value="Yes" />
              <label for="input_67_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_67_1" name="12withoutSeventyTwoHoursOrLess" value="No" />
              <label for="input_67_1"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_67_2" name="12withoutSeventyTwoHoursOrLess" 
              value="Not applicable, I gave at least 72 hours' notice before quitting or I was terminated" />
              <label for="input_67_2"> Not applicable, I gave at least 72 hours' notice before quitting or I was terminated</label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_68">
        <label class="form-label-top" id="label_68" for="input_68">
          How long after you stopped working for Macy's did you receive your final paycheck?<span class="form-required">*</span>
        </label>
        <div id="cid_68" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_68_5" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="Less than 4 days" />
              <label for="input_68_5">Less than 4 days </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_68_0" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="Between 1 and 2 weeks" />
              <label for="input_68_0"> Between 4 and 7 days </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_68_1" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="Between 1 and 2 weeks" />
              <label for="input_68_1"> Between 1 and 2 weeks </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_68_2" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="Between 2 and 4 weeks" />
              <label for="input_68_2"> Between 2 and 4 weeks </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_68_3" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="More than a month" />
              <label for="input_68_3"> More than a month </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_68_4" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="I never received my final paycheck" />
              <label for="input_68_4"> I never received my final paycheck </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_95">
        <label class="form-label-top" id="label_95" for="input_95">In your most recent position working at Macy's, did your final paycheck include all commissions owed to you? </label>
        <div id="cid_95" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio" id="input_95_0" name="finalcheckincludeallcommissions" value="Yes" onclick="commisionOwn();"/>
           <label for="input_95_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
           <input type="radio" class="form-radio" id="input_95_1" name="finalcheckincludeallcommissions" value="No" onclick="commisionOwn();"/>
           <label for="input_95_1"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
           <input type="radio" class="form-radio" id="input_95_2" name="finalcheckincludeallcommissions" value="Not applicable, I was not commissioned" onclick="commisionOwn();"/>
           <label for="input_95_2"> Not applicable, I was not commissioned </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_96">
        <label class="form-label-top" id="label_96" for="input_96"> How long did it take for Macy's to pay you all commissions owed to you? </label>
        <div id="cid_96" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_96_0" name="howlongdidittakeformacystopayallcommissions" value="Less than 4 days" />
              <label for="input_96_0"> Less than 4 days </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">          	 
              <input type="radio" class="form-radio" id="input_96_1" name="howlongdidittakeformacystopayallcommissions" value="Between 4 and 7 days" />
              <label for="input_96_1"> Between 4 and 7 days </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_96_2" name="howlongdidittakeformacystopayallcommissions" value="Between 1 and 2 weeks" />
              <label for="input_96_2"> Between 1 and 2 weeks </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_96_3" name="howlongdidittakeformacystopayallcommissions" value="Between 2 and 4 weeks" />
              <label for="input_96_3"> Between 2 and 4 weeks </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_96_4" name="howlongdidittakeformacystopayallcommissions" value="More than a month" />
              <label for="input_96_4"> More than a month </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_96_5" name="howlongdidittakeformacystopayallcommissions" 
              value="I never received all of the commissions owed to me" />
              <label for="input_96_5"> I never received all of the commissions owed to me </label></span><span class="clearfix">
              </span><span class="form-radio-item" style="clear:left;">
               <input type="radio" class="form-radio" id="input_96_6" name="howlongdidittakeformacystopayallcommissions" 
               value="Not applicable, I was not commissioned"/>
              <label for="input_96_6"> Not applicable, I was not commissioned </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
       <li class="form-line" id="id_201">
        <label class="form-label-top" id="label_201" for="input_201">Please explain any of your answers:</label>
        <div id="cid_201" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_201" class="form-textarea" name="session6Explain" cols="70" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_201-limit">0/1000</span>
              </div></span>
          </div>
        </div>
      </li
      ><li id="cid_69" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_69" onClick="showDiv5();">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_69" onClick="validateLongFormDiv6();">
              Next
            </button>
          </div>
        </div>
          <div class="clear"></div>
        <p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>
      </li>
    </ul>
    <ul class="form-section" id="session7" style="display:none;"><a name="TOP7">&nbsp;</a>
      <li id="cid_70" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_70" class="form-subHeader">
            Were you provided with a seat during your work shift? (Interview Section 7 of 9)
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_71">
        <label class="form-label-top" id="label_71" for="input_71">
          In your most recent position working at Macy’s, did the nature of your job require you to stand?<span class="form-required">*</span>
        </label>
        <div id="cid_71" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="hidden" name="DidYourJobRequireStanding1"/>
          <input type="radio" class="form-radio validate[required]" id="input_71_0" name="14DidYourJobRequireStanding" 
          value="Yes and I was provided with a seat near my work station, other than a seat in the break room" />
           <label for="input_71_0">Yes and I was provided with a seat near my work station, other than a seat in the break room </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
           <input type="radio" class="form-radio validate[required]" id="input_71_1" name="14DidYourJobRequireStanding" 
           value="Yes and I was not provided with a seat near my work station, other than a seat in the break room" />
           <label for="input_71_1"> Yes and I was not provided with a seat near my work station, other than a seat in the break room </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
           <input type="radio" class="form-radio validate[required]" id="input_71_2" name="14DidYourJobRequireStanding" value="No" />
           <label for="input_71_2"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
           <input type="radio" class="form-radio validate[required]" id="input_71_3" name="14DidYourJobRequireStanding" value="I dont remember" />
          <label for="input_71_3"> I don't remember </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_72">
        <label class="form-label-top" id="label_72" for="input_72">
          Did Macy's ever let you sit in a seat during your work shift, when you weren't actively engaged in your work duties?<span class="form-required">*</span>
        </label>
        <div id="cid_72" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_72_0" name="14PermittedToSit" value="Yes" onclick="letYouSit();" />
          <label for="input_72_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_72_1" name="14PermittedToSit" value="No" />
          <label for="input_72_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_74">
        <label class="form-label-top" id="label_74" for="input_74">
          On average, how long were you required to work during a normal shift until you were permitted to sit down?<span class="form-required">*</span>
        </label>
        <div id="cid_74" class="form-input-wide">
         <span class="form-sub-label-container"> 
          <select class="form-textbox" id="hour_74" name="timeBeforeSitHour">  
        <option  value="00">00</option>
        <option  value="01">01</option>
        <option  value="02">02</option>
        <option  value="03">03</option>
        <option  value="04">04</option>
        <option  value="05">05</option>
        <option  value="06">06</option>
        <option  value="07">07</option>
        <option  value="08">08</option>
        <option  value="09">09</option>
        <option  value="10">10</option>
        <option  value="11">11</option>
        <option  value="12">12</option>
        <option  value="13">13</option>
        <option  value="14">14</option>
        <option  value="15">15</option>
        <option  value="16">16</option>
        <option  value="17">17</option>
        <option  value="18">18</option>
        <option  value="19">19</option>
        <option  value="20">20</option>
        <option  value="21">21</option>
        <option  value="22">22</option>
        <option  value="23">23</option>
        </select>
        <label class="form-sub-label" for="hour_74" id="sublabel_timeBeforeSitHour">Hour</label>
        </span> 
        
		<span class="date-separate">&nbsp;</span>
 
        <span class="form-sub-label-container">
 <select class="form-textbox" id="minute_74" name="timeBeforeSitMinute">
        <option  value="00">00</option>      
        <option  value="05">05</option>
        <option  value="10">10</option> 
        <option  value="15">15</option>
        <option  value="20">20</option> 
        <option  value="25">25</option>
        <option  value="30">30</option>
        <option  value="35">35</option>
        <option  value="40">40</option>
        <option  value="45">45</option>
        <option  value="50">50</option> 
        <option  value="55">55</option>    
        </select>       
        <label class="form-sub-label" for="minute_74" id="sublabel_timeBeforeSitMinute">Minute</label>
        </span>
        </div>
      </li>
      <li class="form-line" id="id_75">
        <label class="form-label-top" id="label_75" for="input_75">
          Were there any disciplinary consequences if you were to have a seat during your work shift?<span class="form-required">*</span>
        </label>
        <div id="cid_75" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_75_0" name="14Consequences" value="Yes" onclick="seatConseq();"/>
              <label for="input_75_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_75_1" name="14Consequences" value="No" onclick="seatConseq();"/>
              <label for="input_75_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
       <li class="form-line" id="id_107" style="display:none;">
        <label class="form-label-top" id="label_107" for="input_107">If yes: Please Explain</label>
        <div id="cid_107" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_107" class="form-textarea" name="jobListSeated" cols="70" rows="6" value=""></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_107-limit">0/1000</span>
              </div></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_76">
        <label class="form-label-top" id="label_76" for="input_76">
          Do you think you could have performed your job duties while you were seated?<span class="form-required">*</span>
        </label>
        <div id="cid_76" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_76_0" name="14SittingWouldInterfere" value="Yes" onclick="dutySeatedExplain();" />
          <label for="input_76_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_76_1" name="14SittingWouldInterfere" value="No" onclick="dutySeatedExplain();"/>
          <label for="input_76_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
        <li class="form-line" id="id_122" style="display:none;">
        <label class="form-label-top" id="label_122" for="input_122">If yes: Please list the job duties you could have performed while you were seated </label>
        <div id="cid_122" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_122" class="form-textarea" name="jobSeatedExplain" cols="70" rows="6" value=""></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_122-limit">0/1000</span>
              </div></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_202">
        <label class="form-label-top" id="label_202" for="input_202">Please explain any of your answers:</label>
        <div id="cid_202" class="form-input-wide">
          <div class="form-textarea-limit"><span><textarea id="input_202" class="form-textarea" name="session7Explain" cols="70" rows="6"></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_202-limit">0/1000</span>
              </div></span>
          </div>
        </div>
      </li> 
      <li id="cid_77" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_77" onClick="showDiv6();">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_77" onClick="validateLongFormDiv7();">
              Next
            </button>
           
          </div>
        </div>
          <div class="clear"></div>
        <p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>
      </li>
    </ul>
    <ul class="form-section" id="session8" style="display:none;"><a name="TOP8">&nbsp;</a>
      <li id="cid_87" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_87" class="form-subHeader">
            Do you have any documents from your most recent position at Macy's? (Interview Section 8 of 9)
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_78">
        <div id="cid_78" class="form-input-wide">
          <div id="text_78" class="form-html">
          <!--<h3>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h3>-->
            <p class="doc">To further assist us in pursuing your potential wage and hour claims against Macy's, you may provide us with documents from your employment.  You can send us your documents in one of five ways:
            </p>
            <ol start="1">
                            <li><p>You can upload your documents directly from your computer:</p>
                <ul id="docs">
                  <li class="form-line" id="id_80">
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
				
				iframemake('https://DFWMS01.initiativelegal.com/mars/pubdocs.php',$uniqueid,'140px','pubdocs','0')
            ?>
      			</li>
                </ul>       
                
                </li>
                <li><p>You can scan and e-mail your documents to: <a href="mailto:macyslawsuit.com">MacysLawsuit@InitiativeLegal.com</a></p></li>
                <li><p>You can fax your documents to: (310) 734-1665</p></li>
            	<li><p>You can mail your documents to: </p>
                	<ul id="address">
                    	<li><p>Initiative Legal Group APC <br />
                        c/o: Macy's Lawsuit<br />
                        9663 Santa Monica Blvd, #149<br />
                        Beverly Hills, CA 90210</p></li>
                	</ul>
                </li>
                <li><p>You have documents but you need assistance sending them to our law firm.</p>
                <ul id="mail">
                 <li class="form-line" id="id_100">
        <div id="cid_100" class="form-input-wide">
          <div class="form-single-column"><span class="form-checkbox-item" style="clear:left;"><input type="checkbox" class="form-checkbox" id="input_100_0" name="needssase" value="Yes" />
              <label for="input_100_0">Click here</label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>                </ul>
                
                </li>
            </ol>
            <p class="disclaimer">Documents received by Initiative Legal Group APC by any of the above methods will be stored confidentially and securely, either electronically or in physical form.</p>
          </div>
        </div>
      </li>
      <li id="cid_86" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_86" onClick="showDiv7();">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_86" onClick="showDiv9();">
              Next
            </button>
            
          </div>
        </div>
          <div class="clear"></div>
        <p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>
      </li>
    </ul>
    <ul class="form-section" id="session9" style="display:none;"><a name="TOP9">&nbsp;</a>
      <li id="cid_98" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_98" class="form-subHeader">
           Do you qualify for a fee waiver? (Interview Section 9 of 9)
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_101">
        <div id="cid_101" class="form-input-wide">
          <div id="text_101" class="form-html">
            <p>
If our law firm elects to pursue your claims on an individual basis through arbitration, we may be entitled to a waiver of the associated cost with filing your case in an arbitration based upon your household size and current gross monthly income.
                  </p>
                  <p>
                    To determine if you are eligible, please complete the following two (optional) questions.
                  </p>
                  <div>
                  </div>
             
        
          </div>
        </div>
      </li>
      <li class="form-line" id="id_102">
        <label class="form-label-top" id="label_102" for="input_102"> How many people live in your household, including yourself? </label>
        <div id="cid_102" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="hidden" name="HouseHoldCount1"/>
         	  <input type="radio" class="form-radio" id="input_102_0" name="HouseHoldCount" value="1" />
              <label for="input_102_0"> 1 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_102_1" name="HouseHoldCount" value="2" />
              <label for="input_102_1"> 2 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_102_2" name="HouseHoldCount" value="3" />
              <label for="input_102_2"> 3 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_102_3" name="HouseHoldCount" value="4" />
              <label for="input_102_3"> 4 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_102_4" name="HouseHoldCount" value="5" />
              <label for="input_102_4"> 5 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_102_5" name="HouseHoldCount" value="6" />
              <label for="input_102_5"> 6 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_102_6" name="HouseHoldCount" value="7" />
              <label for="input_102_6"> 7 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_102_7" name="HouseHoldCount" value="8" />
              <label for="input_102_7"> 8 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_102_8" name="HouseHoldCount" value="Decline to answer" />
              <label for="input_102_8"> Decline to answer </label></span><span class="clearfix"></span>

          </div>
        </div>
      </li>
      <li class="form-line" id="id_103">
        <label class="form-label-top" id="label_103" for="input_103"> What is your current gross monthly income? </label>
        <div id="cid_103" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_103_0" name="GrossIncome" value="Less than 2793" />
              <label for="input_103_0"> Less than $2,793 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_103_1" name="GrossIncome" value="2793to3782" />
              <label for="input_103_1"> Between $2,793-$3,782 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_103_2" name="GrossIncome" value="3783to4772" />
              <label for="input_103_2"> Between $3,783-$4,772 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_103_3" name="GrossIncome" value="4773to5762" />
              <label for="input_103_3"> Between $4,773- $5,762 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_103_4" name="GrossIncome" value="5763to6752" />
              <label for="input_103_4"> Between $5,763- $6,752 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_103_5" name="GrossIncome" value="6753to7742" />
              <label for="input_103_5"> Between $6,753- $7,742 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_103_6" name="GrossIncome" value="7743to8732" />
              <label for="input_103_6"> Between $7,743- $8,732 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio" id="input_103_7" name="GrossIncome" value="8733to9723" />
              <label for="input_103_7"> Between $8,733- $9,723 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;">              <input type="radio" class="form-radio" id="input_103_8" name="GrossIncome" value="Decline" />
              <label for="input_103_8"> Decline to answer </label></span><span class="clearfix"></span>

          </div>
        </div>
      </li>
      
      <li id="cid_105" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_105" onClick="showDiv8();">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_105" onClick="validateLongFormDiv9();">
              Next
            </button>
            
          </div>
        </div>
         <div class="clear"></div>
        <p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>  
      </li>
    </ul>
    <ul class="form-section" id="session10" style="display:none;"><a name="TOP10">&nbsp;</a>
      <li class="form-line" id="id_88">
        <div id="cid_88" class="form-input-wide">
          <div id="text_88" class="form-html">
              <p>Thank you for your cooperation and participation. Your case attorney will review the answers you have provided and will contact you if further information is needed.
              </p>
             
         <p class ="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_2" style="width: 184px !important; float: right; padding: 0px !important;">
       <div id="cid_2" class="form-input-wide">
          
          <div class="form-button-wrapper">
<?PHP
			if ($completedlongformonline == 'Yes')
				{
					echo "It looks like you've already completed this form, give us a call if you have any questions.";
				}
			else
				{
					#echo "<button id='input_2' type='submit' class='form-submit-button' >";
					echo '<button id="input_2" type="submit"  onclick="needToConfirm = false;" class="form-submit-button form-submit-button-push_red">Submit Form</button>';
				}
			
?>     
           <!-- <button id="input_2" type="submit"  class="form-submit-button form-submit-button-push_red" value="Submit Form">
              Submit Form
            </button>-->
          </div>
        </div>
         
      </li>
        
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="" />
      </li>
    </ul>
  </div>
  <input type="hidden" id="simple_spc" name="simple_spc" value="20599278470161" />
  <script type="text/javascript">
  document.getElementById("si" + "mple" + "_spc").value = "20599278470161-20599278470161";
  </script>
    <?PHP
  echo "<input type='hidden' id='simple_spc' name='uniqueid' value='".$uniqueid."' />";
  ?>
</form>
</div></div>
</body>