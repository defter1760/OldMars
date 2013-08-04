<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/confirmations.css" rel="stylesheet" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
</head>
<!--
<style>

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

$link =  'https://macyslawsuit.com/retainer/?uniqueid='.$uniqueid;
    echo '<body>';
    echo '<div id="main">';
    echo '<div id="message">';
    echo "<input style='border:0' type='hidden' id='textbox1' size='1'>";
    echo "<script>document.getElementById('textbox1').focus()</script>";
    echo '<h4>';
    echo 'CONFIDENTIAL/WORK PRODUCT PRIVILEGE</h4>';
    echo '<h3>Thank you for completing the Macy\'s Employee Experience Online Survey!</h3>';
    echo '<ul>';
    echo '<li>We have received your responses and we believe that you may have wage and hour claims against Macy\'s, Inc. To pursue those claims and protect your rights, you may choose to hire an attorney. Although you may hire any attorney you deem fit, you may choose to retain Initiative Legal Group to represent you in your potential claims against Macy\'s. </li>';
	echo '<li>You will receive an email shortly with more information and an Attorney-Client Agreement for your review. If you do not wish to hire our law firm, please ignore the email and do not proceed to the next webpage. If you are already represented by an attorney regarding any claims against Macy\'s, please do not continue.</li>';
    echo '<li>Or, if you choose, you may review the Attorney-Client Agreement now by clicking <a class="link" href="'.$link.'" target="_parent">HERE</a></li>';
    echo '<li>Please take your time and carefully review this Agreement. Please note that, by signing this Agreement, you will allow our law firm to settle and release your potential wage and hour claims with Macy\'s for no less than $200 total, after the deduction of legal fees and costs.<br /><br />   If you have any questions or do not receive an email, please contact us at <strong>888.792.2293</strong>.</li>';
    echo '</ul>';
    echo '<p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>';
    echo '</div>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
?>
