<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/style.css" rel="stylesheet" type="text/css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>THANK YOU!</title>
</head>

<?php 

if (empty($tenantid)) $tenantid = '4';

if (isset($_POST['uniqueid'])) $uniqueid = $_POST['uniqueid'];
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];

if (isset($_POST['statuslevel'])) $statuslevel = $_POST['statuslevel'];
if (isset($_REQUEST['statuslevel'])) $statuslevel = $_REQUEST['statuslevel'];

?>

<?php

$link = 'https://macyslawsuit.com/3step/?uniqueid='.$uniqueid;

?>

</head>

<body>

<?php 
echo '';
echo '<body>';

echo '<div id="main">';
	echo '<div id="message">';
		echo '<h3 style="text-align:center;">We have received your signed Attorney-Client Agreement.  Thank you!</h3>';
		
//		echo '<ul>';
//			echo '<li>We are continuing our investigation into the various wage and hour claims against Macy\'s, Inc. and would like additional information from you.  You can provide us with more information about your potential wage and hour claims by clicking <a target="_parent" class="link" href="'.$link.'">HERE</a>.  You will also receive an email containing the link. </li>';
//			echo '<li>We may choose to pursue your possible wage and hour claims through a pending proposed class action against Macy\'s or by filing your individual case in arbitration.  Although we make no promises or guarantees as to any specific outcome of your case under any option, this choice would allow us to potentially resolve any claims you and other similar employees may have against Macy\'s either by individual settlement or through a multi-party/group settlement or in a class action settlement. </li>';
//		echo '</ul>';
//
//		echo '<p>If you have any questions or do not receive an email, please contact us at <strong>888.792.2293</strong>.</p>';
		
		echo '<h4 style="text-align:left;">By clicking the button below, you will be able to complete each of the following forms:</h4>';
		echo '<ul>';
			echo '<li><h5>Sign Two Authorization Forms.</h5><p>There are two forms you will be asked to sign. The first is an Authorization for Settlement form. By signing this Authorization form, you will allow our law firm to settle and release your potential wage and hour claims against Macy\'s on your behalf for at least $200 total, after the deduction of legal fees and costs.</p><p>The second is an Authorization for Release of Personnel File and Wage Records form. By signing this Authorization form, you will help us request from Macy\'s the release of your employment records to our law firm, which may be helpful to support your claims.</p></li>';
			echo '<li><h5>Fill out an online interview to provide us with specific details about your potential wage and hour claims against Macy\'s.</h5><p>This interview should take approximately 15-20 minutes to complete.  At the end of the questions, you will be given an opportunity to submit any documents you feel may support your case.</p></li>';
			echo '<li><h5>Sign an Affidavit for Waiver of Fees Notice.  </h5><p>Our law firm will advance all costs so there are no out-of-pocket costs you will have to pay. If you meet a certain gross income level, you will be asked to complete Step 3, which is to sign an Affidavit so that our firm can ask the American Arbitration Association on your behalf to waive any filing fees that our law firm would have to pay if and when your case were to be filed.</p></li>';
		echo '</ul>';

		echo '<p>If you have any questions or you would like to complete these steps over the phone, please contact us at <strong>888.792.2293</strong>.</p>';
		
	echo '</div>';
echo '</div>';

echo "<h1 style='text-align: center;'><a class='continue' target='_parent' href='".$link."'>START</a></h1>";

echo '<p class="privilege">CONFIDENTIAL/WORK PRODUCT PRIVILEGE</p>';

echo '</body>';
echo '</html>';
?>

</body>
</html>