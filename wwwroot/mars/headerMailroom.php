<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MARS 2.0 - Mailroom</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/mars.css" type="text/css" />

<script type="text/javascript">

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
 newwin=window.open(url,'windowname5', params);
 if (window.focus) {newwin.focus()}
 return false;
}

</script>


<style type="text/css">
#topLinks {
	width: 850px !important;
}

#topLinks a {
	font-size: 16px !important;
}

</style>
</head>

<body>

<div id="headerWrapper">
    <div id="header">
        <div id="logo">
        	<a href="">M.A.R.S.</a>
        </div>

        <div id="topLinks">
            <?PHP
                echo "<a href='http://sqlsrv.domain.initiativelegal.com/mars/mr_outlist.php'>Outstanding requests</a>";
                echo "<a href='http://sqlsrv.domain.initiativelegal.com/mars/mr_outgoing.php'>Send a document </a>";
                echo "<a href='http://sqlsrv.domain.initiativelegal.com/mars/undeliverable.php'>Receive undeliverables </a>";
                echo "<a href='http://sqlsrv.domain.initiativelegal.com/mars/mr_incoming.php'>Receive a document</a>";
		echo "<a href='http://sqlsrv.domain.initiativelegal.com/mars/mr_returnretainer.php'>Return a Retainer</a>";
		
                echo "<a href='http://sqlsrv.domain.initiativelegal.com/mars/mr_outlist.php'>Refresh </a>";

				
                require("functions.php");//functions
            ?>
        </div>
    </div><!-- end header -->
</div><!-- end headerWrapper -->
