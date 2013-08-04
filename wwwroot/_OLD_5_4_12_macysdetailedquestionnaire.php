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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/forms.css" rel="stylesheet" type="text/css" />
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

<script src="https://static-interlogyllc.netdna-ssl.com/min/g=jotform?3.0.3370" type="text/javascript"></script>
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
--><link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css' />
<link href="https://static-interlogyllc.netdna-ssl.com/min/g=formCss?3.0.3370" rel="stylesheet" type="text/css" />
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/forms.css" rel="stylesheet" type="text/css" />
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
<div align="center"><div id="main">
<link type="text/css" rel="stylesheet" href="https://jotform.us/css/styles/buttons/form-submit-button-push_red.css?3.0.3370"/>
<form class="jotform-form" action="database_write_MacysFull.php" method="post" enctype="multipart/form-data" name="form_20599278470161" id="20599278470161" accept-charset="utf-8">
  <input type="hidden" name="formID" value="20599278470161" />
  <div class="form-all">
    <ul class="form-section">
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
            Contact Information - Interview Section 1 of 10
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
            <label class="form-sub-label" for="first_3" id="sublabel_first"> First Name </label></span>
	    <span class="form-sub-label-container">
	    
            <?PHP echo "<input class='form-textbox validate[required]' type='text' size='15' name='1WhoLastName' id='last_3' value='".$LastName."'/>";
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
echo "<input class='form-textbox validate[required]' type='tel' name='1CallbackNum' id='input_4_phone' size='8' value='".$phone1."'>";
?>
	   
            <label class="form-sub-label" for="input_4_phone" id="sublabel_phone"> Phone Number </label></span>
        </div>
      </li>
      <li class="form-line" id="id_6">
        <label class="form-label-left" id="label_6" for="input_6"> Alternate Phone Number </label>
        <div id="cid_6" class="form-input">
	<span class="form-sub-label-container">
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
?>      	      
	      
                  <label class="form-sub-label" for="input_7_state" id="sublabel_state"> State</label></span>
              </td>
            </tr>
            <tr>
              <td width="50%"><span class="form-sub-label-container">
	      <?PHP echo "<input class='form-textbox validate[required] form-address-postal' type='text' name='3Zipcode' id='input_7_postal' size='10' value='".$Zipcode."'/>";
?>
                  <label class="form-sub-label" for="input_7_postal" id="sublabel_postal">Zip Code </label></span>
              </td>
            </tr>
          </table>
        </div>
      </li>
      <li id="cid_11" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_11">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_11">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <!--<div class="clear"></div>
    <p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>-->
    <ul class="form-section" style="display:none;">
      <li id="cid_16" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_16" class="form-subHeader">
            Employment Background - Interview Section 2 of 10
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_12">
        <label class="form-label-top" id="label_12" for="input_12">
          What city was the last Macy's you worked in?<span class="form-required">*</span>
        </label>
        <div id="cid_12" class="form-input-wide">
          <select class="form-dropdown validate[required]" style="width:150px" id="input_12" name="1LocCity">
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
          When you worked for Macy's, were you paid by the hour?<span class="form-required">*</span>
        </label>
        <div id="cid_15" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_15_0" name="4EmployeeHourly" value="Yes" />
              <label for="input_15_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_15_1" name="4EmployeeHourly" value="No" />
              <label for="input_15_1"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_15_2" name="4EmployeeHourly" value="Both hourly and salaried" />
              <label for="input_15_2"> Both hourly and salaried </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_91">
        <div id="cid_91" class="form-input-wide">
          <div id="text_91" class="form-html">
           <label class="form-label-top">
              What was your most recent hourly rate of pay at Macy's? <a class="addspeech" title="We use this information in our determination of whether certain labor violations occurred."><span class="whatsthis">Why Do We Need This</span></a>
           </label>
          </div>
        </div>
      </li>
      <li class="form-line form-line-column" id="id_18">
        <label class="form-label-top" id="label_18" for="input_18"> Dollars: </label>
        <div id="cid_18" class="form-input-wide">
	<select class="form-textbox" id="month_15" name="hourlydollars">
	<option name=hourlydollars" value="00">00</option>
<option name=hourlydollars" value="01">01</option>
<option name=hourlydollars" value="02">02</option>
<option name=hourlydollars" value="03">03</option>
<option name=hourlydollars" value="04">04</option>
<option name=hourlydollars" value="05">05</option>
<option name=hourlydollars" value="06">06</option>
<option name=hourlydollars" value="07">07</option>
<option name=hourlydollars" value="08">08</option>
<option name=hourlydollars" value="09">09</option>
<option name=hourlydollars" value="10">10</option>
<option name=hourlydollars" value="11">11</option>
<option name=hourlydollars" value="12">12</option>
<option name=hourlydollars" value="13">13</option>
<option name=hourlydollars" value="14">14</option>
<option name=hourlydollars" value="15">15</option>
<option name=hourlydollars" value="16">16</option>
<option name=hourlydollars" value="17">17</option>
<option name=hourlydollars" value="18">18</option>
<option name=hourlydollars" value="19">19</option>
<option name=hourlydollars" value="20">20</option>
<option name=hourlydollars" value="21">21</option>
<option name=hourlydollars" value="22">22</option>
<option name=hourlydollars" value="23">23</option>
<option name=hourlydollars" value="24">24</option>
<option name=hourlydollars" value="25">25</option>
<option name=hourlydollars" value="26">26</option>
<option name=hourlydollars" value="27">27</option>
<option name=hourlydollars" value="28">28</option>
<option name=hourlydollars" value="29">29</option>
<option name=hourlydollars" value="30">30</option>
<option name=hourlydollars" value="31">31</option>
<option name=hourlydollars" value="32">32</option>
<option name=hourlydollars" value="33">33</option>
<option name=hourlydollars" value="34">34</option>
<option name=hourlydollars" value="35">35</option>
<option name=hourlydollars" value="36">36</option>
<option name=hourlydollars" value="37">37</option>
<option name=hourlydollars" value="38">38</option>
<option name=hourlydollars" value="39">39</option>
<option name=hourlydollars" value="40">40</option>
<option name=hourlydollars" value="41">41</option>
<option name=hourlydollars" value="42">42</option>
<option name=hourlydollars" value="43">43</option>
<option name=hourlydollars" value="44">44</option>
<option name=hourlydollars" value="45">45</option>
<option name=hourlydollars" value="46">46</option>
<option name=hourlydollars" value="47">47</option>
<option name=hourlydollars" value="48">48</option>
<option name=hourlydollars" value="49">49</option>
<option name=hourlydollars" value="50">50</option>
<option name=hourlydollars" value="51">51</option>
<option name=hourlydollars" value="52">52</option>
<option name=hourlydollars" value="53">53</option>
<option name=hourlydollars" value="54">54</option>
<option name=hourlydollars" value="55">55</option>
<option name=hourlydollars" value="56">56</option>
<option name=hourlydollars" value="57">57</option>
<option name=hourlydollars" value="58">58</option>
<option name=hourlydollars" value="59">59</option>
<option name=hourlydollars" value="60">60</option>
<option name=hourlydollars" value="61">61</option>
<option name=hourlydollars" value="62">62</option>
<option name=hourlydollars" value="63">63</option>
<option name=hourlydollars" value="64">64</option>
<option name=hourlydollars" value="65">65</option>
<option name=hourlydollars" value="66">66</option>
<option name=hourlydollars" value="67">67</option>
<option name=hourlydollars" value="68">68</option>
<option name=hourlydollars" value="69">69</option>
<option name=hourlydollars" value="70">70</option>
<option name=hourlydollars" value="71">71</option>
<option name=hourlydollars" value="72">72</option>
<option name=hourlydollars" value="73">73</option>
<option name=hourlydollars" value="74">74</option>
<option name=hourlydollars" value="75">75</option>
<option name=hourlydollars" value="76">76</option>
<option name=hourlydollars" value="77">77</option>
<option name=hourlydollars" value="78">78</option>
<option name=hourlydollars" value="79">79</option>
<option name=hourlydollars" value="80">80</option>
<option name=hourlydollars" value="81">81</option>
<option name=hourlydollars" value="82">82</option>
<option name=hourlydollars" value="83">83</option>
<option name=hourlydollars" value="84">84</option>
<option name=hourlydollars" value="85">85</option>
<option name=hourlydollars" value="86">86</option>
<option name=hourlydollars" value="87">87</option>
<option name=hourlydollars" value="88">88</option>
<option name=hourlydollars" value="89">89</option>
<option name=hourlydollars" value="90">90</option>
<option name=hourlydollars" value="91">91</option>
<option name=hourlydollars" value="92">92</option>
<option name=hourlydollars" value="93">93</option>
<option name=hourlydollars" value="94">94</option>
<option name=hourlydollars" value="95">95</option>
<option name=hourlydollars" value="96">96</option>
<option name=hourlydollars" value="97">97</option>
<option name=hourlydollars" value="98">98</option>
<option name=hourlydollars" value="99">99</option>
<option name=hourlydollars" value="100">100</option>
</select>
          
        </div>
      </li>
      <li class="form-line form-line-column" id="id_90">
        <label class="form-label-top" id="label_90" for="input_90"> Cents: </label>
        <div id="cid_90" class="form-input-wide">
<select class="form-textbox" id="month_15" name="hourlycents">	
<option name=hourlycents" value="00">00</option>
<option name=hourlycents" value="01">01</option>
<option name=hourlycents" value="02">02</option>
<option name=hourlycents" value="03">03</option>
<option name=hourlycents" value="04">04</option>
<option name=hourlycents" value="05">05</option>
<option name=hourlycents" value="06">06</option>
<option name=hourlycents" value="07">07</option>
<option name=hourlycents" value="08">08</option>
<option name=hourlycents" value="09">09</option>
<option name=hourlycents" value="10">10</option>
<option name=hourlycents" value="11">11</option>
<option name=hourlycents" value="12">12</option>
<option name=hourlycents" value="13">13</option>
<option name=hourlycents" value="14">14</option>
<option name=hourlycents" value="15">15</option>
<option name=hourlycents" value="16">16</option>
<option name=hourlycents" value="17">17</option>
<option name=hourlycents" value="18">18</option>
<option name=hourlycents" value="19">19</option>
<option name=hourlycents" value="20">20</option>
<option name=hourlycents" value="21">21</option>
<option name=hourlycents" value="22">22</option>
<option name=hourlycents" value="23">23</option>
<option name=hourlycents" value="24">24</option>
<option name=hourlycents" value="25">25</option>
<option name=hourlycents" value="26">26</option>
<option name=hourlycents" value="27">27</option>
<option name=hourlycents" value="28">28</option>
<option name=hourlycents" value="29">29</option>
<option name=hourlycents" value="30">30</option>
<option name=hourlycents" value="31">31</option>
<option name=hourlycents" value="32">32</option>
<option name=hourlycents" value="33">33</option>
<option name=hourlycents" value="34">34</option>
<option name=hourlycents" value="35">35</option>
<option name=hourlycents" value="36">36</option>
<option name=hourlycents" value="37">37</option>
<option name=hourlycents" value="38">38</option>
<option name=hourlycents" value="39">39</option>
<option name=hourlycents" value="40">40</option>
<option name=hourlycents" value="41">41</option>
<option name=hourlycents" value="42">42</option>
<option name=hourlycents" value="43">43</option>
<option name=hourlycents" value="44">44</option>
<option name=hourlycents" value="45">45</option>
<option name=hourlycents" value="46">46</option>
<option name=hourlycents" value="47">47</option>
<option name=hourlycents" value="48">48</option>
<option name=hourlycents" value="49">49</option>
<option name=hourlycents" value="50">50</option>
<option name=hourlycents" value="51">51</option>
<option name=hourlycents" value="52">52</option>
<option name=hourlycents" value="53">53</option>
<option name=hourlycents" value="54">54</option>
<option name=hourlycents" value="55">55</option>
<option name=hourlycents" value="56">56</option>
<option name=hourlycents" value="57">57</option>
<option name=hourlycents" value="58">58</option>
<option name=hourlycents" value="59">59</option>
<option name=hourlycents" value="60">60</option>
<option name=hourlycents" value="61">61</option>
<option name=hourlycents" value="62">62</option>
<option name=hourlycents" value="63">63</option>
<option name=hourlycents" value="64">64</option>
<option name=hourlycents" value="65">65</option>
<option name=hourlycents" value="66">66</option>
<option name=hourlycents" value="67">67</option>
<option name=hourlycents" value="68">68</option>
<option name=hourlycents" value="69">69</option>
<option name=hourlycents" value="70">70</option>
<option name=hourlycents" value="71">71</option>
<option name=hourlycents" value="72">72</option>
<option name=hourlycents" value="73">73</option>
<option name=hourlycents" value="74">74</option>
<option name=hourlycents" value="75">75</option>
<option name=hourlycents" value="76">76</option>
<option name=hourlycents" value="77">77</option>
<option name=hourlycents" value="78">78</option>
<option name=hourlycents" value="79">79</option>
<option name=hourlycents" value="80">80</option>
<option name=hourlycents" value="81">81</option>
<option name=hourlycents" value="82">82</option>
<option name=hourlycents" value="83">83</option>
<option name=hourlycents" value="84">84</option>
<option name=hourlycents" value="85">85</option>
<option name=hourlycents" value="86">86</option>
<option name=hourlycents" value="87">87</option>
<option name=hourlycents" value="88">88</option>
<option name=hourlycents" value="89">89</option>
<option name=hourlycents" value="90">90</option>
<option name=hourlycents" value="91">91</option>
<option name=hourlycents" value="92">92</option>
<option name=hourlycents" value="93">93</option>
<option name=hourlycents" value="94">94</option>
<option name=hourlycents" value="95">95</option>
<option name=hourlycents" value="96">96</option>
<option name=hourlycents" value="97">97</option>
<option name=hourlycents" value="98">98</option>
<option name=hourlycents" value="99">99</option>
</select>	
          
        </div>
      </li>
      <li class="form-line" id="id_92">
        <label class="form-label-top" id="label_92" for="input_92">
          Were you entitled to or were you paid commissions when you worked for Macy's?<span class="form-required">*</span>
        </label>
        <div id="cid_92" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_92_0" name="entitledtocommissions" value="Yes" />
              <label for="input_92_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_92_1" name="entitledtocommissions" value="No" />
              <label for="input_92_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_93">
        <label class="form-label-top" id="label_93" for="input_93">
          What was your commission structure?<span class="form-required">*</span>
        </label>
        <div id="cid_93" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_93_0" name="commissionstructure" value="Pure Commission" />
              <label for="input_93_0"> Pure Commission </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_93_1" name="commissionstructure" value="Draw Plus Commission" />
              <label for="input_93_1"> Draw Plus Commission </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_93_2" name="commissionstructure" value="Base Plus Commission" />
              <label for="input_93_2"> Base Plus Commission </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_93_3" name="commissionstructure" value="I dont remember" />
              <label for="input_93_3"> I don't remember </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left"><input type="radio" class="form-radio-other form-radio validate[required]" name="commissionstructure" id="other_93" />
              <input type="text" class="form-radio-other-input" name="commissionstructure" size="15" id="input_93" disabled="disabled" />
              <br /></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_94">
        <label class="form-label-top" id="label_94" for="input_94"> What was your rate of commission? </label>
        <div id="cid_94" class="form-input-wide">
          <input type="text" class="form-textbox" id="input_94" name="rateofcommission" size="20" />
        </div>
      </li>
      <li class="form-line" id="id_22">
        <label class="form-label-top" id="label_22" for="input_22">
          Are you currently employed at Macy's?<span class="form-required">*</span>
        </label>
        <div id="cid_22" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_22_0" name="4CurrentlyEmployed" value="Yes" />
              <label for="input_22_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_22_1" name="4CurrentlyEmployed" value="No" />
              <label for="input_22_1"> No </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_20">
        <div id="cid_20" class="form-input-wide">
          <div id="text_20" class="form-html">
         <label class="form-label-top">What are your dates of employment at Macy's:</label>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_19">
        <label class="form-label-left" id="label_19" for="input_19">
          Start date<span class="form-required">*</span>
        </label>
        <div id="cid_19" class="form-input">
	<span class="form-sub-label-container">
	<select class="form-textbox" id="month_15" name="startdaymonth">
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
            <label class="form-sub-label" for="month_19" id="sublabel_month"> Month </label>
	</span>
	<!--<span class="form-sub-label-container">
	    <input class="noDefault form-textbox validate[required]" id="day_19" name="startdayday" type="text" size="2" maxlength="2" value="" />
	    <span class="date-separate">&nbsp;</span>
            <label class="form-sub-label" for="day_19" id="sublabel_day"> Day
	    </label>
	    </span>-->
	    <span class="form-sub-label-container">
	    <select class="form-textbox" id="month_15" name="startdayyear">
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
            <label class="form-sub-label" for="year_19" id="sublabel_year"> Year
	    </label>
	    </span>
	    <span class="form-sub-label-container">
	    <!--<img alt="Pick a Date" id="input_19_pick" src="https://jotform.us/images/calendar.png" align="absmiddle" />-->
            <label class="form-sub-label" for="input_19_pick"> &nbsp;&nbsp;&nbsp; </label></span>
        </div>
      </li>
      <li class="form-line" id="id_21">
        <label class="form-label-left" id="label_21" for="input_21">
          End Date<span class="form-required">*</span>
        </label>
        <div id="cid_21" class="form-input"><span class="form-sub-label-container">
	<!--<input class="form-textbox validate[required]" id="month_21" name="formerlastdaymonth" type="text" size="2" maxlength="2" value="" />-->
	<select class="form-textbox" id="month_15" name="formerlastdaymonth">
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
            <label class="form-sub-label" for="month_21" id="sublabel_month"> Month
	    </label>
	</span>
	    <!--<span class="form-sub-label-container">
	    <input class="noDefault form-textbox validate[required]" id="day_21" name="formerlastdayday" type="text" size="2" maxlength="2" value="" />
	    <span class="date-separate">&nbsp;</span>
            <label class="form-sub-label" for="day_21" id="sublabel_day"> Day </label>
	    </span>-->
	    <span class="form-sub-label-container">
	    <!--<input class="form-textbox validate[required]" id="year_21" name="formerlastdayyear" type="text" size="4" maxlength="4" value="" />--><select class="form-textbox" id="month_15" name="formerlastdayyear">
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
            <label class="form-sub-label" for="year_21" id="sublabel_year"> Year </label></span><span class="form-sub-label-container"><!--<img alt="Pick a Date" id="input_21_pick" src="https://jotform.us/images/calendar.png" align="absmiddle" />-->
            <label class="form-sub-label" for="input_21_pick"> &nbsp;&nbsp;&nbsp; </label></span>
        </div>
      </li>
      <li class="form-line" id="id_104">
        <label class="form-label-top" id="label_104" for="input_104"> Please identify the names and contact information for any of your friends or coworkers who also worked at Macy's. </label>
        <div id="cid_104" class="form-input-wide">
          <textarea id="input_104" class="form-textarea" name="identifypeople" cols="40" rows="6"></textarea>
        </div>
      </li>
      <li id="cid_25" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_25">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_25">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li id="cid_23" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_23" class="form-subHeader">
            Meal Breaks - Interview Section 3 of 10
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_24">
        <div id="cid_24" class="form-input-wide">
          <div id="text_24" class="form-html">
            
              <p>With certain exceptions, California law requires that: (1) employers provide hourly employees with at least a 30-minute <u>uninterrupted</u> meal break every day in which the employee works more than 5 hours; and (2) employers provide employees who work more than 10 hours in one day with two 30-minute <u>uninterrupted</u> meal breaks.<br/><br/></p>
               <p>
              For each workday that an employer fails to provide an employee with a required 30-minute uninterrupted meal break, the employee is entitled to recover an additional hour of pay at the employee&rsquo;s regular rate.
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
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_28_0" name="7Cat1MealBreakWaived" value="Yes" />
              <label for="input_28_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_28_1" name="7Cat1MealBreakWaived" value="No" />
              <label for="input_28_1"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_28_2" name="7Cat1MealBreakWaived" value="I dont remember" />
              <label for="input_28_2"> I don't remember </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_29">
        <label class="form-label-top" id="label_29" for="input_29">
          Were you ever unable to take at least a 30-minute uninterrupted meal break when you worked shifts of more than 5 hours?<span class="form-required">*</span>
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
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_37">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_37">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li id="cid_36" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_36" class="form-subHeader">
            Rest Breaks - Interview Section 4 of 10
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_38">
        <div id="cid_38" class="form-input-wide">
          <div id="text_38" class="form-html">
            <p>
              With certain exceptions, California law also requires that employers allow employees to take <u>at least</u> a 10-minute <em>uninterrupted</em> rest break for every 4 hours worked. For each day an employer prevents, stops, or interrupts a required 10-minute rest break, the employee is entitled to recover an additional hour of pay at the employee's regular rate of pay. 
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
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_40_0" name="8HowOftenMissRest" value="Every day" />
              <label for="input_40_0"> Every day </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_40_1" name="8HowOftenMissRest" value="Several times a week" />
              <label for="input_40_1"> Several times a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_40_2" name="8HowOftenMissRest" value="Once a week" />
              <label for="input_40_2"> Once a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_40_3" name="8HowOftenMissRest" value="Once a month" />
              <label for="input_40_3"> Once a month </label></span><span class="clearfix"></span>
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
              <label for="input_42_2"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_42_3" name="8ExtraHourPay" value="I dont remember" />
              <label for="input_42_3"> I don't remember </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li id="cid_49" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_49">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_49">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li id="cid_43" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_43" class="form-subHeader">
            Bag Check - Interview Section 5 of 10
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
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_45_0" name="9BagsCheckedEverytimeLeaving" value="Every shift" />
              <label for="input_45_0"> Every shift </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_45_1" name="9BagsCheckedEverytimeLeaving" value="Several times a week" />
              <label for="input_45_1"> Several times a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_45_2" name="9BagsCheckedEverytimeLeaving" value="Once a week" />
              <label for="input_45_2"> Once a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_45_3" name="9BagsCheckedEverytimeLeaving" value="Once a month" />
              <label for="input_45_3"> Once a month </label></span><span class="clearfix"></span>
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
          Approximately how long would you have to wait to complete the entire bag check process before you could leave the store?<span class="form-required">*</span>
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
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_50">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_50">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li id="cid_48" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_48" class="form-subHeader">
            Closing Shift - Interview Section 6 of 10
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
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_60">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_60">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li id="cid_54" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_54" class="form-subHeader">
            Overtime - Interview Section 7 of 10
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_55">
        <div id="cid_55" class="form-input-wide">
          <div id="text_55" class="form-html">
            <p>
             Under California law, employers are required to pay employees at least the current minimum wage for all hours worked. If employees are required to perform work-related tasks either before clocking-in or after clocking-out, the employee is entitled to compensation for such off-the-clock work. In addition, if an employee works more than 8 hours in a single day or more than 40 hours in a week, the employee is entitled to one and a half times their regular hourly rate for those hours worked after 8 hours in a single day and/or 40 hours in a week. If an employee works more than 12 hours in a single day, the employee is entitled to double-time pay for those hours worked after 12 hours. 
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
              <label for="input_57_2"> Between 30 minutes and 1 hour a week </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_57_3" name="11OffClockMinutesPerWeek" value="More than 1 hour a week" />
              <label for="input_57_3"> More than 1 hour a week </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_58">
        <label class="form-label-top" id="label_58" for="input_58">
          If you ever worked overtime (worked more than 8 hours in a single day and/or more than 40 hours in a work week), were you paid one and a half times your hourly rate of pay for those overtime hours?<span class="form-required">*</span>
        </label>
        <div id="cid_58" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_58_0" name="11EverNotPaidOT" value="Yes" />
              <label for="input_58_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_58_1" name="11EverNotPaidOT" value="No" />
              <label for="input_58_1"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_58_2" name="11EverNotPaidOT" value="Not applicable (I never worked more than 8 hours in a day or more than 40 hours in a week, even during the holidays)" />
              <label for="input_58_2"> Not applicable (I never worked more than 8 hours in a day or more than 40 hours in a week, even during the holidays) </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li id="cid_61" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_61">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_61">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li id="cid_59" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_59" class="form-subHeader">
            Final Wages - Interview Section 8 of 10
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
              <label for="input_66_4"> More than a month </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_66_5" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="I never received my final paycheck" />
              <label for="input_66_5"> I never received my final paycheck </label></span><span class="clearfix"></span>
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
              <label for="input_68_3"> More than a month </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_68_4" name="12HowLongAfterTermRecieveCheckGreaterThan72" value="I never received my final paycheck" />
              <label for="input_68_4"> I never received my final paycheck </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_95">
        <label class="form-label-top" id="label_95" for="input_95"> Did your final paycheck include all commissions owed to you? </label>
        <div id="cid_95" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_95_0" name="finalcheckincludeallcommissions" value="Yes" />
              <label for="input_95_0"> Yes </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_95_1" name="finalcheckincludeallcommissions" value="No" />
              <label for="input_95_1"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_95_2" name="finalcheckincludeallcommissions" value="Not applicable, I was not commissioned" />
              <label for="input_95_2"> Not applicable, I was not commissioned </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_96">
        <label class="form-label-top" id="label_96" for="input_96"> How long did it take for Macy's to pay you all commissions owed to you? </label>
        <div id="cid_96" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_96_0" name="howlongdidittakeformacystopayallcommissions" value="Between 2- 4 days" />
              <label for="input_96_0"> Between 2- 4 days </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_96_1" name="howlongdidittakeformacystopayallcommissions" value="Between 5 - 7 days" />
              <label for="input_96_1"> Between 5 - 7 days </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_96_2" name="howlongdidittakeformacystopayallcommissions" value="Between 1 and 2 weeks" />
              <label for="input_96_2"> Between 1 and 2 weeks </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_96_3" name="howlongdidittakeformacystopayallcommissions" value="Between 2 and 4 weeks" />
              <label for="input_96_3"> Between 2 and 4 weeks </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_96_4" name="howlongdidittakeformacystopayallcommissions" value="More than a month" />
              <label for="input_96_4"> More than a month </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_96_5" name="howlongdidittakeformacystopayallcommissions" value="I never received all of the commissions owed to me" />
              <label for="input_96_5"> I never received all of the commissions owed to me </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li id="cid_69" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_69">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_69">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li id="cid_70" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_70" class="form-subHeader">
            Seating - Interview Section 9 of 10
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
              <label for="input_71_2"> No </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_71_3" name="14DidYourJobRequireStanding" value="I dont remember" />
              <label for="input_71_3"> I don't remember </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_72">
        <label class="form-label-top" id="label_72" for="input_72">
          Did Macy's ever let you sit in a seat during your work shift, when you weren't actively engaged in your work duties?<span class="form-required">*</span>
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
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_77">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_77">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li id="cid_87" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_87" class="form-subHeader">
            Do you have any documents from your employment at Macy's?
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_78">
        <div id="cid_78" class="form-input-wide">
          <div id="text_78" class="form-html">
          <!--<h3>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h3>-->
            <p class="doc">To further assist us in pursuing your potential wage and hour claims against Macy's, you may provide us with documents from your employment.  You can send us your documents in one of five ways:
            </p>
            <ol>
            	<li><p>You can mail your documents to: </p>
                	<ul id="address">
                    	<li><p>Initiative Legal Group APC <br />
                        c/o: Macy's Lawsuit<br />
                        9663 Santa Monica Blvd, #149<br />
                        Beverly Hills, CA 90210</p></li>
                	</ul>
                </li>
                <li><p>You can scan and e-mail your documents to: <a href="mailto:macyslawsuit.com">MacysLawsuit@InitiativeLegal.com</a></p></li>
                <li><p>You can fax your documents to: (310) 734-1665</p></li>
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
                <li><p>You can request a self-addressed stamped envelope. When we receive your request, we will send you an envelope with instructions on how to mail your documents back to us. </p>
                <ul id="mail">
                 <li class="form-line" id="id_100">
        <div id="cid_100" class="form-input-wide">
          <div class="form-single-column"><span class="form-checkbox-item" style="clear:left;"><input type="checkbox" class="form-checkbox" id="input_100_0" name="needssase" value="Yes" />
              <label for="input_100_0"> Yes, send me an envelope </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
                </ul>
                
                </li>
            </ol>
            <p class="disclaimer">Documents received by Initiative Legal Group APC by any of the above methods will be stored confidentially and securely, either electronically or in physical form.<br /> <strong>Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case</strong>.</p>
          </div>
        </div>
      </li>
      <li id="cid_86" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_86">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_86">
              Next
            </button>
          </div>
        </div>
      </li>
    </ul>
    <ul class="form-section" style="display:none;">
      <li id="cid_98" class="form-input-wide">
        <div class="form-header-group">
          <h2 id="header_98" class="form-subHeader">
            Fee waiver - Interview Section 10 of 10
          </h2>
        </div>
      </li>
      <li class="form-line" id="id_101">
        <div id="cid_101" class="form-input-wide">
          <div id="text_101" class="form-html">
            <p>
                    If Initiative elects to pursue your claims on an individual basis through arbitration, you may be entitled to a waiver of the associated cost with filing an arbitration.
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
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_102_0" name="HouseHoldCount" value="1" />
              <label for="input_102_0"> 1 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_102_1" name="HouseHoldCount" value="2" />
              <label for="input_102_1"> 2 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_102_2" name="HouseHoldCount" value="3" />
              <label for="input_102_2"> 3 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_102_3" name="HouseHoldCount" value="4" />
              <label for="input_102_3"> 4 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_102_4" name="HouseHoldCount" value="5" />
              <label for="input_102_4"> 5 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_102_5" name="HouseHoldCount" value="6" />
              <label for="input_102_5"> 6 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_102_6" name="HouseHoldCount" value="7" />
              <label for="input_102_6"> 7 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_102_7" name="HouseHoldCount" value="8" />
              <label for="input_102_7"> 8 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_102_8" name="HouseHoldCount" value="9" />
              <label for="input_102_8"> 9 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_102_9" name="HouseHoldCount" value="10" />
              <label for="input_102_9"> 10 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_102_10" name="HouseHoldCount" value="Decline to answer" />
              <label for="input_102_10"> Decline to answer </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_103">
        <label class="form-label-top" id="label_103" for="input_103"> What is your current gross monthly income? </label>
        <div id="cid_103" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_103_0" name="GrossIncome" value="2793" />
              <label for="input_103_0"> Less than $2,793 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_103_1" name="GrossIncome" value="2793to3783" />
              <label for="input_103_1"> Between $2,793-$3,783 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_103_2" name="GrossIncome" value="3783to4773" />
              <label for="input_103_2"> Between $3,783-$4,773 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_103_3" name="GrossIncome" value="4773to5763" />
              <label for="input_103_3"> Between $4,773- $5,763 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_103_4" name="GrossIncome" value="5763to6753" />
              <label for="input_103_4"> Between $5,763- $6,753 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_103_5" name="GrossIncome" value="6753to7743" />
              <label for="input_103_5"> Between $6,753- $7,743 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_103_6" name="GrossIncome" value="7743to8733" />
              <label for="input_103_6"> Between $7,743- $8,733 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_103_7" name="GrossIncome" value="8733to9723" />
              <label for="input_103_7"> Between $8,733- $9,723 </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_103_8" name="GrossIncome" value="Decline" />
              <label for="input_103_8"> Decline to answer </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      
      <li id="cid_105" class="form-input-wide">
        <div class="form-pagebreak">
          <div class="form-pagebreak-back-container form-label-left">
            <button type="button" class="form-pagebreak-back  form-submit-button-push_red" id="form-pagebreak-back_105">
              Back
            </button>
          </div>
          <div class="form-pagebreak-next-container">
            <button type="button" class="form-pagebreak-next  form-submit-button-push_red" id="form-pagebreak-next_105">
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
              <p class="MsoNormal">Thank you for your cooperation and participation. Your case attorney will review the answers you have provided and will contact you if further information is needed.&nbsp;
              </p>
            </p>
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
					echo '<button id="input_2" type="submit"  onclick="needToConfirm = false;" class="form-submit-button form-submit-button-push_red">';
				}
			
?>     
            <!--<button id="input_2" type="submit"  class="form-submit-button form-submit-button-push_red" value="Submit Form">-->
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
  <input type="hidden" id="simple_spc" name="simple_spc" value="20599278470161" />
  <script type="text/javascript">
  document.getElementById("si" + "mple" + "_spc").value = "20599278470161-20599278470161";
  </script>
    <?PHP
  echo "<input type='hidden' id='simple_spc' name='uniqueid' value='".$uniqueid."' />";
  ?>
</form>
</div></div>