<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" charset="utf-8">
$(function() {
$(".ajax-fc-container").captcha({formId: "myForm"});
});
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">

.progress{
	width: 1px;
	height: 14px;
	color: white;
	font-size: 12px;
  overflow: hidden;
	background-color: navy;
	padding-left: 5px;
}

</style>

<script type="text/JavaScript">


/***********************************************
* Form Field Progress Bar- By Ron Jonk- http://www.euronet.nl/~jonkr/
* Modified by Dynamic Drive for minor changes
* Script featured/ available at Dynamic Drive- http://www.dynamicdrive.com
* Please keep this notice intact
***********************************************/

function textCounter(field,counter,maxlimit,linecounter) {
	// text width//
	var fieldWidth =  parseInt(field.offsetWidth);
	var charcnt = field.value.length;        

	// trim the extra text
	if (charcnt > maxlimit) { 
		field.value = field.value.substring(0, maxlimit);
	}

	else { 
	// progress bar percentage
	var percentage = parseInt(100 - (( maxlimit - charcnt) * 100)/maxlimit) ;
	document.getElementById(counter).style.width =  parseInt((fieldWidth*percentage)/100)+"px";
	document.getElementById(counter).innerHTML="Limit: "+percentage+"%"
	// color correction on style from CCFFF -> CC0000
	setcolor(document.getElementById(counter),percentage,"background-color");
	}
}

function setcolor(obj,percentage,prop){
	obj.style[prop] = "rgb(80%,"+(100-percentage)+"%,"+(100-percentage)+"%)";
}

</script>
</head>

<body>
<form>

<textarea rows="5" cols="40" name="maxcharfield" id="maxcharfield" 
onKeyDown="textCounter(this,'progressbar1',20)" 
onKeyUp="textCounter(this,'progressbar1',20)" 
onFocus="textCounter(this,'progressbar1',20)" ></textarea><br />

<div id="progressbar1" class="progress"></div>

<script>textCounter(document.getElementById("maxcharfield"),"progressbar1",20)</script>

</form>
<!-- Begin of captcha -->
<div class="ajax-fc-container"></div>
<!-- End of captcha -->

</body>
</html>