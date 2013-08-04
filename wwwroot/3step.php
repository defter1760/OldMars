<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/confirmations.css" rel="stylesheet" type="text/css" />
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

.underline{
	text-decoration:underline;
	padding-right:3px;
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

#message ul li p{
	width:100%;
	padding:0;
}

#message ol{
	width:70%;
	margin:0 auto;
}

#message ol li{
	font-size:18px;
	line-height:24px;
	padding-bottom:;
	color:#a31c30;
	font-weight:bold;
	padding-left:5px;
	padding-bottom:20px;

}

#message ol li p{
	width:100%;
	padding:0;
	margin:0;
	color:#424242;
	font-weight:normal;
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
.start{
	display:block;
	width:192px;
	height:66px;
	background:url(https://macyslawsuit.com/wp-content/uploads/2012/04/start_button.png) no-repeat 0 0;
	margin:0 auto;
	text-align:center;
	text-indent:-99999px;
	margin-bottom:30px;
}

.start:hover{
	background-position:bottom;
}
</style>-->
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

#main{
	width:100%;
	height:100%;
	text-align:left;
}
#message{
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
	padding-bottom:35px;
	list-style:none;
	background:url(https://macyslawsuit.com/wp-content/uploads/2012/04/check.png) no-repeat 0 7px;
	padding-left:35px;
	
}

#message ul li h3{
	font-size:20px;
	line-height:24px;
	text-align:left;
	color:#424242;
	padding-bottom:15px;
}

.red{
	color:#a31c30;
	text-decoration:underline;
	padding-right:5px;
}


#message ul li p{
	width:100%;
	padding:0;
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
	
}

.link{
	display:inline-block;
	background: url(https://macyslawsuit.com/wp-content/uploads/2012/04/link1.png) no-repeat 53px 0;
	width:92px;
	height:31px;
	padding-left:3px;
}

.start{
	display:block;
	width:192px;
	height:66px;
	background:url(https://macyslawsuit.com/wp-content/uploads/2012/04/start_button.png) no-repeat 0 0;
	margin:0 auto;
	text-align:center;
	text-indent:-99999px;
	margin-bottom:30px;
}

.start:hover{
	background-position:bottom;
}
img, img a, a img, a {
   outline: none !important;
}
</style>-->
<?PHP 

if (isset($_REQUEST['tenantid'])) $tenantid = $_REQUEST['tenantid'];
if (empty($tenantid)) $tenantid = '4';

if (isset($_REQUEST['brandid'])) $brandid = $_REQUEST['brandid'];
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
if (isset($_REQUEST['brand'])) $brand = $_REQUEST['brand'];


?>

<?PHP 
$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
$query = "SELECT authformreceived,retainerRecieved,feewaiverreceived,completedlongformonline FROM Status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid'";
$results = sqlsrv_query($conn,$query);

	while($row = sqlsrv_fetch_array($results)){


		$authformreceived = $row['authformreceived']; 
		$retainerRecieved = $row['retainerRecieved'];
		$feewaiverreceived = $row['feewaiverreceived']; 
		$completedlongformonline = $row['completedlongformonline']; 

  }
?>

</head>


<body>
<div id="main">
<?PHP
#$link = "getauth.php?uniqueid=".$uniqueid;

$link = 'https://macyslawsuit.com/authorization/?uniqueid='.$uniqueid;

if ($authformreceived == 'Yes')
{
	$link = "macysdetailedquestionnaire.php?uniqueid=".$uniqueid;
	echo "It looks like you've already signed the authorization form, give us a call if you have any questions.";
}
if ($completedlongformonline == 'Yes')
{
	$link = "feewaiverprequal.php?uniqueid=".$uniqueid;
	echo "It looks like you've already completed our detailed questionnaire, give us a call if you have any questions.";
}
if ($feewaiverreceived == 'Yes')
{
	$link = "";
	echo "It looks like you've already signed the authorization form, give us a call if you have any questions.";
}
if ($feewaiverreceived == 'Not Qualified')
{
	$link = "";
	echo "It looks like you've already completed the fee waiver, give us a call if you have any questions.";
}
?> 
<?PHP
echo '<body>';
echo '<div id="main">';
echo '<div id="message">';
echo '<h4>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h4>';
echo '<h3>Please complete the following <strong>three easy steps</strong> by clicking the "START" button below:</h3>';
echo '<ul>';
echo '<li><h3><span class="red">STEP ONE:</span>  Sign Two Authorization Forms.</h3><p>There are two forms you will be asked to sign. The first is an Authorization for Settlement form. By signing this Authorization form, you will allow our law firm to settle and release your potential wage and hour claims against Macy\'s on your behalf for at least $200 total, after the deduction of legal fees and costs.</p><br /><p>The second is an Authorization for Release of Personnel File and Wage Records form. By signing this Authorization form, you will help us request from Macy\'s the release of your employment records to our law firm, which may be helpful to support your claims.</p></li>';
echo '<li><h3><span class="red">STEP TWO:</span>  Fill out an online interview to provide us with specific details about your potential wage and hour claims against Macy\'s.  </h3><p>This interview should take approximately 15-20 minutes to complete.  At the end of the questions, you will be given an opportunity to submit any documents you feel may support your case.</p></li>';
echo '<li><h3><span class="red">STEP THREE:</span>  Sign an Affidavit for Waiver of Fees Notice.  </h3><p>Our law firm will advance all costs so there are no out-of-pocket costs you will have to pay. If you meet a certain gross income level, you will be asked to complete Step 3, which is to sign an Affidavit so that our firm can ask the American Arbitration Association on your behalf to waive any filing fees that our law firm would have to pay if and when your case were to be filed.</p></li>';
echo '</ul>';

echo '<p>If you have any questions or you would like to complete these steps over the phone, please contact us at <strong>888.792.2293</strong>.</p>';

#echo '<a class="start" href="'.$link.'" target="_parent">Start</a>';


////echo "<body>";
////echo "<div id=\"main\">";
////echo "<div id=\"message\">";
////echo "<h4>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h4>";
////echo "<h3>";
////echo "<span class=\"underline\">STEP ONE:</span> Authorization for Release of Personnel File and Wage Records</h3>";
////echo "<ul>";
////echo "<li><p>";
////echo "By signing the Authorization form, you will help us request from Macy's the release of your employment records to our law firm.";
////echo "These documents may be useful in supporting the potential wage and hour claims you may have against Macy's.";
////echo "</p>";
////echo "</li>";
////echo "<li>";
////echo "<p>Please fill out the Authorization form by completing these <strong>three</strong> items:";
////echo "</p>";
////echo "</li>";
////echo "</ul>";
////
////echo "<ol>";
////echo "<li>";
////echo "<p>";
////echo "Carefully review the Authorization form and verify the spelling of your full name at the top of the document.</p></li>";
////echo "<li>";
////echo "<p>";
////echo "When prompted, use your computer mouse to draw your electronic signature.  Don't worry if your electronic signature does not look exactly like your real signature.  All that is required is that you make an original mark on this document.";
////echo "</p>";
////echo "</li>";
////echo "<li>";
////echo "<p>";
////echo "Please click on the \"confirmed signature\" button after you have verified the spelling of your name and electronically signed the form and you will proceed to the next step of the process.";
////echo "</p>";
////echo "</li>";
////
////echo "</ol>";
////echo "<p class=\"disclaimer\">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to the outcome of any case.</p>";
////echo "</div>";
////echo "</div>";
////echo "</body>";
////echo "</html>";
//
//echo "<div id='main'>";
//echo "<div class='container'>";
//echo "<div id='logo'>";
////echo "<h1>INITIATIVE LEGAL GROUP, APC</h1>";
//echo "</div>";
//echo "<h2>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h2>";
//echo "<p>You will be asked to complete the following three easy steps by clicking the &quot;<span class='red'>START</span>&quot; button below:</p>";
//echo "<ol>";
//echo "<li><p><strong>Sign an Authorization for Release of Personnel File and Wage Records form.</strong>  Once you have completed and signed this form, it will allow us to instruct Macy's to release your employee records to our law firm, which may be helpful to support your claims.</p></li>";
//echo "<li><p><strong>Fill out an online interview to provide us with details about your work experience at Macy's.</strong>  At the end of the questions, you will be given an opportunity to submit any documents you feel may support your case by uploading them, by requesting a self-addressed stamped envelope, or faxing them.</p></li>";
//echo "<li><p><strong>Sign an Affidavit for Waiver of Fees Notice.</strong> If you meet a certain gross income level, you'll be asked to complete Step 3, which is to sign this Affidavit so that we can ask the American Arbitration Association to waive any filing fees if and when your case were to be filed with AAA.</p></li>";
//echo "</ol>";
//echo "<p>If you have any questions or you would like to complete these steps over the phone, please contact us toll-free at <strong>1.888.792.2293</strong>.</p>";



			if ($feewaiverreceived == 'Not Qualified')
				{
					echo "It looks like you've already completed this form, give us a call if you have any questions.";
				}
			else
				{
				if ($feewaiverreceived == 'Yes')
					{
					echo "It looks like you've already completed this form, give us a call if you have any questions.";
					}
				else
					{
					echo "<div id='button'><a class='start' target='_parent' href='".$link."'><h1>START</h1></a></div>";
					echo '<p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>';

					}
				}

//echo "</div>";
//echo "</div>";
echo '</div>';
echo '</div>';
echo '</body>';           
?>
</div>
</html>