<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MARS 2.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/mars.css" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
    
<script type="text/javascript">
<!--
	function popup(url) 
	{
		var width  = 1000;
		var height = 1000;
		var left   = (screen.width  - width)/2;
		var top    = (screen.height - height)/2;
		var params = 'width='+width+', height='+height;
		params += ', top='+top+', left='+left;
		params += ', directories=no';
		params += ', location=no';
		params += ', menubar=no';
		params += ', resizable=no';
		params += ', scrollbars=yes';
		params += ', status=no';
		params += ', toolbar=no';
		newwin=window.open(url,'windowname15', params);
		if (window.focus) {newwin.focus()}
		return false;
	}
-->
</script>

</head>

<body>

<div id="headerWrapper">
    <div id="header">
        <div id="logo">
        	<a href="/mars/">M.A.R.S.</a>
            <!--<a href="/mars/"><img src='images/logo7.png'></a>-->
        </div>
        <div id="topLinks">
            <?PHP
				echo "<a href='reports.php'>Reports</a>";
				echo "<a href='graphs.php'>Graphs</a>";
				
				
				if (isset($_POST['caseattorney']))
				{
					$caseattorney = $_POST['caseattorney'];
					if (empty($caseattorney)) $caseattorney = '';
					echo "<a href='caseattorneyview.php?caseattorney=$caseattorney' target='_parent'>Case Attorney View</a>";
				}
				if (!isset($_POST['caseattorney']))
				{
					echo "<a href='caseattorneyview.php' target='_parent'>Case Attorney View</a>";
				}
				echo "<a href='mgmt.php'>Search</a>";
				#echo '<a href="javascript: void(0)" onclick="popup(';
					#echo "'newProspect.php')";
					#echo '">';
					#echo "Add New Prospect</a>";
					echo "<a href='retainerAcceptRejectMgmt.php'>Review AC Agreements</a>";
				require("functions.php");//functions
				?>
        </div>
    </div><!-- end header -->
</div><!-- end headerWrapper -->
