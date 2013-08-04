<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/forms.css" rel="stylesheet" type="text/css" />
</head>
<!--<style>

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

#main {

  width: 100%;
  margin:0 auto;
  text-align:center;

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
	text-decoration: none;
}

#message h4{
	font-size:18px;
	line-height:32px;
	text-decoration:underline;
	color:#424242;
	text-align:center;
	font-weight:normal;
	padding-bottom:25px;
	text-transform:uppercase;
}

#message p{
	font-size:18px;
	line-height:28px;
	padding-bottom:20px;
	width:100%;
	margin:0 auto;
}

#message ul{
	width:100%;
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
		line-height:19px;
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
img, img a, a img, a {
   outline: none !important;
}
/*div#main {

  width: 700px;

  margin-left: auto;

  margin-right: auto;

  text-align: left;

}*/
</style>-->


<?PHP

if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];

//echo '<body>';
//echo '<div id="main">';
//echo '<div id="message">';
//echo '<h4>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h4>';
//echo '<h3>Online Interview Regarding Your Potential Wage And Hour Claims Against Macy\'s</h3>';
//#echo '<h3>ONLINE INTERVIEW REGARDING YOUR POTENTIAL WAGE AND HOUR CLAIMS AGAINST MACY\'S</h3>';
//echo '<ul>';
//echo '<li>The following questions are designed to provide us with more detailed information about your potential wage and hour claims against Macy\'s.  Please complete all required questions accurately and truthfully, to the best of your recollection.  This interview should take between 15-20 minutes to complete. </li>';
//echo '</ul>';
//echo '<p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>';
//echo '</div>';
//echo '</div>';
//echo '</body>';
require('macysdetailedquestionnaire.php');


?>