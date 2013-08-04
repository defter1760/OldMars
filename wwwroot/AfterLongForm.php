<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/style.css" rel="stylesheet" type="text/css" />
</head>

<?PHP 
$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");

$conn = sqlsrv_connect( $serverName, $connectionInfo );
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');

if (empty($tenantid)) $tenantid = '4';

if (isset($_POST['uniqueid'])) $uniqueid = $_POST['uniqueid'];
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];

if (isset($_POST['statuslevel'])) $statuslevel = $_POST['statuslevel'];
if (isset($_REQUEST['statuslevel'])) $statuslevel = $_REQUEST['statuslevel'];
?>

<?php
$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
?>

<?php
////////////////////////////////////////////////////////////////////////////////
/////email/////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
?>

<?php
$link = 'https://macyslawsuit.com/authorization/?uniqueid='.$uniqueid;
?>

<?php
echo '<body>';
	echo '<div id="main">';
		echo '<div id="message">';
			echo '<h3>Thank you for providing us with additional information regarding your potential wage and hour claims against Macy\'s!</h3>';
			echo '<p><br />We will review your information and contact you directly.<br /></p>';
			echo '<h3><br />Questions?</h3>';
			echo '<p>Contact us directly by calling <strong>888.792.2293</strong> or emailing your questions to <a href="mailto:macyslawsuit@initiativelegal.com">MacysLawsuit@InitiativeLegal.com</a>.</p>';
		echo '</div>';
		echo '<p class="privilege"><br />CONFIDENTIAL/WORK PRODUCT PRIVILEGE</p>';
	echo '</div>';
echo '</body>';
echo '</html>';	
?>

