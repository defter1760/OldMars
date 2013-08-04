<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?PHP
$serverName = "localhost\SPICE";
$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
$thetimeisnow = date('H').':'.date('i').':'.date('s');
$thedateis =  date('l').' '.date('F').' '.date('j').''.date('S').', '.date('Y');
$thetimezone =  date('T');
$weeknow = date('Y').'-'.date('W');
$month = date('Y').'-'.date('m');
$date = date('Y').'-'.date('m').'-'.date('d');
//l F d Y
//H:i:s:u [T - GMT P]
//Monday February 6 2012 
//14:29:00 [PST - GMT -8:00]


?>
<title>MassAction Metrics</title>
<style type="text/css">
<!--
body {
	font: 100%/1 Verdana, Arial, Helvetica, sans-serif;
	/* background: #42413C; */
	background: #FFFFFF;
	margin: 0;
	padding: 0;
	color: #000;
}

/* ~~ Element/tag selectors ~~ */
ul, ol, dl { /* Due to variations between browsers, it's best practices to zero padding and margin on lists. For consistency, you can either specify the amounts you want here, or on the list items (LI, DT, DD) they contain. Remember that what you do here will cascade to the .nav list unless you write a more specific selector. */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 /* removing the top margin gets around an issue where margins can escape from their containing div. The remaining bottom margin will hold it away from any elements that follow. */
	padding-right: 15px;
	padding-left: 15px; /* adding the padding to the sides of the elements within the divs, instead of the divs themselves, gets rid of any box model math. A nested div with side padding can also be used as an alternate method. */
}
a img { /* this selector removes the default blue border displayed in some browsers around an image when it is surrounded by a link */
	border: none;
}

/* ~~ Styling for your site's links must remain in this order - including the group of selectors that create the hover effect. ~~ */
a:link {
	color: #42413C;
	text-decoration: underline; /* unless you style your links to look extremely unique, it's best to provide underlines for quick visual identification */
}
a:visited {
	color: #6E6C64;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* this group of selectors will give a keyboard navigator the same hover experience as the person using a mouse. */
	text-decoration: none;
}

/* ~~ This fixed width container surrounds all other divs ~~ */
.container {
	width: 100%;
	height: auto; /* i added this(ian)*/
	background: #FFFFFF;
	margin: 0 auto; /* the auto value on the sides, coupled with the width, centers the layout */
}

/* ~~ The header is not given a width. It will extend the full width of your layout. It contains an image placeholder that should be replaced with your own linked logo. ~~ */
.header {
	background: #ADB96E;
}

/* ~~ These are the columns for the layout. ~~ 

1) Padding is only placed on the top and/or bottom of the divs. The elements within these divs have padding on their sides. This saves you from any "box model math". Keep in mind, if you add any side padding or border to the div itself, it will be added to the width you define to create the *total* width. You may also choose to remove the padding on the element in the div and place a second div within it with no width and the padding necessary for your design.

2) No margin has been given to the columns since they are all floated. If you must add margin, avoid placing it on the side you're floating toward (for example: a right margin on a div set to float right). Many times, padding can be used instead. For divs where this rule must be broken, you should add a "display:inline" declaration to the div's rule to tame a bug where some versions of Internet Explorer double the margin.

3) Since classes can be used multiple times in a document (and an element can also have multiple classes applied), the columns have been assigned class names instead of IDs. For example, two sidebar divs could be stacked if necessary. These can very easily be changed to IDs if that's your preference, as long as you'll only be using them once per document.

4) If you prefer your nav on the right instead of the left, simply float these columns the opposite direction (all right instead of all left) and they'll render in reverse order. There's no need to move the divs around in the HTML source.

*/
.sidebar1 {
	float: left;
	width: 12%;
	height:auto;
	background: #EADCAE;
	padding-bottom: 15px;
}
.content {

	padding: 1px 0;
	width: 88%;
/*	height: 1900px;*/
	height: 1200px;
	float: left;
}
/*.sidebar2 {
	float: right;
	width: 9%;
	background: #EADCAE;
	padding: 10px 0;
}*/

/* ~~ This grouped selector gives the lists in the .content area space ~~ */
.content ul, .content ol { 
	padding: 0 15px 15px 40px; /* this padding mirrors the right padding in the headings and paragraph rule above. Padding was placed on the bottom for space between other elements on the lists and on the left to create the indention. These may be adjusted as you wish. */
}

/* ~~ The navigation list styles (can be removed if you choose to use a premade flyout menu like Spry) ~~ */
ul.nav {
	list-style: none; /* this removes the list marker */
	border-top: 1px solid #666; /* this creates the top border for the links - all others are placed using a bottom border on the LI */
	margin-bottom: 15px; /* this creates the space between the navigation on the content below */
}
ul.nav li {
	border-bottom: 1px solid #666; /* this creates the button separation */
}
ul.nav a, ul.nav a:visited { /* grouping these selectors makes sure that your links retain their button look even after being visited */
	padding: 5px 5px 5px 15px;
	display: block; /* this gives the anchor block properties so it fills out the whole LI that contains it so that the entire area reacts to a mouse click. */
	/*width: 160px; */  /*this width makes the entire button clickable for IE6. If you don't need to support IE6, it can be removed. Calculate the proper width by subtracting the padding on this link from the width of your sidebar container. */
	text-decoration: none;
	background: #C6D580;
}
ul.nav a:hover, ul.nav a:active, ul.nav a:focus { /* this changes the background and text color for both mouse and keyboard navigators */
	background: #ADB96E;
	color: #FFF;
}

/* ~~ The footer styles ~~ */
.footer {
	padding: 10px 0;
	background: #CCC49F;
	position: relative;
	/* this gives IE6 hasLayout to properly clear */
	clear: both; /* this clear property forces the .container to understand where the columns end and contain them */
}

/* ~~ Miscellaneous float/clear classes ~~ */
.fltrt {  /* this class can be used to float an element right in your page. The floated element must precede the element it should be next to on the page. */
	float: right;
	margin-left: 8px;
}
.fltlft { /* this class can be used to float an element left in your page. The floated element must precede the element it should be next to on the page. */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* this class can be placed on a <br /> or empty div as the final element following the last floated div (within the .container) if the .footer is removed or taken out of the .container */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
.MyFont { /*  */
	font-size: 11px;
	
}
.SmallFont { /*  */
	font-size: 9px;

	
}
-->
</style>
<?PHP 
if (isset($_POST['brandname'])) $brandname = $_POST['brandname'];
if (empty($brandname)) unset ($brandname);
if (isset($brandname)) $brandnameurl = $_POST['brandname'];
if (isset($_POST['agentlname'])) $agentlname = $_POST['agentlname'];
if (empty($agentlname)) unset ($agentlname);

#if(strstr($brandname,'\'')){
#
#    $brandname = str_replace('\'','\'',$brandname);
#
#}

?>
</head>

<body>

<div class="container">
<div class="header" align="right"><div class="SmallFont"><?PHP 
echo "Data updated $thedateis $thetimeisnow $thetimezone";

?><br /><br /></div> 
  <!-- end .header --></div>
  <div class="header" align="center"><strong>Mass Action data Retention System [MARS]</strong> -working title<!-- end .header --><br /><br /></div>
  <div class="sidebar1">
  
  <!-- Retainers start-->
  
    <ul class="nav"><div class="MyFont">
<?PHP    
  //echo "<tr>"; 
  	 
    echo "<FORM NAME ='form2' METHOD ='POST' ACTION ='MassActionMetrics.php'>";
	echo "<div align='left' class='MyFont'>";
	echo " <pre><strong> Agent Last name: </strong></pre>";
	echo "</div>";
	echo "<div align='left' class='MyFont'>";
	echo "<INPUT align='left' TYPE = 'text' Name ='agentlname'  value= '$agentlname' style='width:96%; height:16px'>";
	echo "</div><br>";
	echo "<div align='left' class='MyFont'>";
	echo " <pre> <strong>Brand:</strong></pre>";
	echo "</div>";
	echo "<div align='left' class='MyFont'>";
	echo "<INPUT align='left' TYPE = 'text' Name='brandname' value='$brandname' style='width:96%; height:16px'>";
	echo "</div>";
	echo "<INPUT TYPE = 'Submit' Name = 'Submit1'  VALUE = 'Update'>";
	//echo "<INPUT TYPE = 'Reset' Name = 'Submit2'  VALUE = 'Reset'>";
	echo "</FORM>";

if(strstr($brandname,'\'')){

    $brandname = str_replace('\'','\'\'',$brandname);
}

?>

</strong><u></u></div></ul>
     <ul class="nav"><div class="MyFont">
     <u><strong><br />
	 <?PHP
	echo '<a href=Search.php?brandname=';  
	echo "$brandname" . '&agentlname=' . "$agentlname";
	echo ' target=\'iframe_content\'>';
    echo "Search</a>";
?></strong></u></div>
    </ul>
     <ul class="nav"> <div class="MyFont"><u><strong><br />Retainers<br /><br /></strong></u></div>
           <li class="MyFont">
	  <?PHP //Generate retainer

	echo '<a href=GenRetainer.php?brandname=';  
	echo "$brandname";
	echo ' target=\'iframe_content\'>';
    echo "Generate retainer</a>";
?>
	</li>
               <li class="MyFont">
	  <?PHP //Generate retainer

	echo '<a href=retainerIntake.php?brandname=';  
	echo "$brandname";
	echo ' target=\'iframe_content\'>';
    echo "Intake retainer</a>";
//total end //
?>
	</li>
    <li class="MyFont"></li>
      <li class="MyFont">
<?PHP
//Retainers waiting to send //

if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='No' and brand='$brandname' and agentlname='$agentlname' and retainerRecieved='No' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerSent='No' and agentlname='$agentlname' and retainerRecieved='No' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='No' and brand='$brandname' and retainerRecieved='No' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='No' and retainerRecieved='No' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status where retainerSent='No' and retainerRecieved='No'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=NeedToSendRetainer.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
	echo "" . $data . " to send";
	echo "</a>";
?>
	</li>
      <li class="MyFont">
<?PHP //Total Retainers Sent //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status where retainerSent='Yes'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=AllSentRetainers.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
	echo "" . $data . " sent";
	echo "</a>";
// end //
?>
	</li>
      <li class="MyFont">
	  <?PHP //Retainers waiting to come back //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' AND status.tenantid='4' and retainerRecieved='No' and brand='$brandname' and agentlname='$agentlname'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' AND status.tenantid='4' and retainerRecieved='No' and agentlname='$agentlname'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' AND status.tenantid='4' and retainerRecieved='No' and brand='$brandname'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' AND status.tenantid='4' and  retainerRecieved='No'";	  
#$querynum = "SELECT count(*) from status where retainerSent='Yes' and retainerRecieved='No' ";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=NeedToReceiveRetainer.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';

echo "" . $data . " not received";
echo "</a>";
//total end //
?>
	</li>
      <li class="MyFont">
<?PHP //Retainers returned //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' and retainerRecieved='Yes'  AND status.tenantid='4' and brand='$brandname' and agentlname='$agentlname'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' and retainerRecieved='Yes' AND status.tenantid='4' and agentlname='$agentlname'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' and retainerRecieved='Yes' AND status.tenantid='4' and brand='$brandname'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' AND status.tenantid='4' and retainerRecieved='Yes' ";
#$querynum = "SELECT count(*) from status where retainerSent='Yes' and retainerRecieved='Yes' ";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=ReceivedRetainers.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';

echo "" . $data . " received";
echo "</a>";//total end //
?></li>

      <li class="MyFont">
<?PHP //needs attn //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4' AND status.retainerstatus='Received NEEDSATTN' AND status.retainercountersignsent IS NULL";

if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' and agentlname='$agentlname' AND status.tenantid='4' AND status.retainerstatus='Received NEEDSATTN' AND status.retainercountersignsent IS NULL";

if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' and brand='$brandname' AND status.tenantid='4' AND status.retainerstatus='Received NEEDSATTN' AND status.retainercountersignsent IS NULL";

if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' AND status.tenantid='4' AND status.retainerstatus='Received NEEDSATTN' AND status.retainercountersignsent IS NULL";

#$querynum = "SELECT count(*) from status where retainerSent='Yes'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=ReceivedRetainersNeedattn.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
	echo "" . $data . " need attn";
	echo "</a>";
// end //
?>
	</li>

      <li class="MyFont">
<?PHP //received and not counter-signed //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent IS NULL";

if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' and agentlname='$agentlname' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent IS NULL";

if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' and brand='$brandname' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent IS NULL";

if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent IS NULL";

#$querynum = "SELECT count(*) from status where retainerSent='Yes'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=ReceivedRetainersNotCountersigned.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
	echo "" . $data . " not countersigned";
	echo "</a>";
// end //
?>
	</li>

      <li class="MyFont">
<?PHP //received and not counter-signed //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent='Yes'";

if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' and agentlname='$agentlname' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent='Yes'";

if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' and brand='$brandname' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent='Yes'";

if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent='Yes'";

#$querynum = "SELECT count(*) from status where retainerSent='Yes'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=ReceivedRetainersCountersigned.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
	echo "" . $data . " countersigned sent";
	echo "</a>";
// end //
?>
	</li>

    </ul>

<!-- Retainers finish-->
  <!-- Auth start-->

    <ul class="nav">
     <div class="MyFont"><u><strong><br />Authorizations<br /><br /></strong></u></div>
         	<li class="MyFont">
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='No' AND status.tenantid='4' and brand='$brandname' and agentlname='$agentlname'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='No' AND status.tenantid='4' and agentlname='$agentlname'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='No' AND status.tenantid='4' and brand='$brandname'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='No' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='No' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=AuthsNotReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " not received";
echo "</a>";
//total end //
?></li>
     <li class="MyFont">
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=AuthsReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " received";
echo "</a>";
//total end //
?></li>
    </ul>
     
<!-- Auth done -->
    
<!-- Demands start-->

    <ul class="nav">
     <div class="MyFont"><u><strong><br />Demands<br /><br /></strong></u></div>
         	<li class="MyFont">
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerRecieved='Yes' AND status.demandcreated IS NULL and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerRecieved='Yes' AND status.demandcreated IS NULL and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerRecieved='Yes' AND status.demandcreated IS NULL and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerRecieved='Yes' AND status.demandcreated IS NULL AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerRecieved='Yes' AND status.demandcreated IS NULL AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=DemandsNotCreated.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " not created";
echo "</a>";
//total end //
?></li>
     <li class="MyFont">
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerRecieved='Yes' AND status.demandcreated='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerRecieved='Yes' AND status.demandcreated='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerRecieved='Yes' AND status.demandcreated='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerRecieved='Yes' AND status.demandcreated='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerRecieved='Yes' AND status.demandcreated='Yes' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=DemandsCreated.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " created";
echo "</a>";
//total end //
?></li>
    </ul>
     
<!-- Demands done -->

<!-- Interviews start--> 

    <div class="MyFont">
     <u><strong>Interviews<br /><br /></strong></u></div>
        <ul class="nav">
        <li class="MyFont">
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where completedonline='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where completedonline='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where completedonline='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where completedonline='Yes' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=AllInterviewsCompletedOnline.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " completed online";
echo "</a>";
//total end //
?>
</li>
      <li class="MyFont">
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where interviewstarted='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where interviewstarted='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where interviewstarted='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where interviewstarted='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status where interviewstarted='Yes'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=AllInterviewsStarted.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " started";
echo "</a>";
//total end //
?>
</li>
	<li class="MyFont">
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where interviewstarted='Yes' and reachedretainerdiscussion='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where interviewstarted='Yes' and reachedretainerdiscussion='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where interviewstarted='Yes' and reachedretainerdiscussion='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where interviewstarted='Yes' and reachedretainerdiscussion='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status where reachedretainerdiscussion='Yes'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=AllInterviewsCompleted.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " completed";
echo "</a>";
//total end //
?>
	</li>
    	<li class="MyFont">
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where interviewstarted='Yes' and reachedretainerdiscussion IS NULL and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where interviewstarted='Yes' and reachedretainerdiscussion IS NULL and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where interviewstarted='Yes' and reachedretainerdiscussion IS NULL and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where interviewstarted='Yes' and reachedretainerdiscussion IS NULL and status.tenantid='4'";
#$querynum = "SELECT count(*) from status where retainerSent<>'Yes' and retainerSent<>'No'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=AllInterviewsInComplete.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " incomplete";
echo "</a>";
//total end //
?>
	</li>

<!-- Agent Metrics start-->    
    
    <div class="MyFont"><u><strong><br />Agent Metrics<br /><br /></strong></u></div>
      <li class="MyFont">
      	  <?PHP 
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where interviewstartday='$date' AND agentlname IS NOT NULL and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where interviewstartday='$date' AND agentlname IS NOT NULL and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where interviewstartday='$date' AND agentlname IS NOT NULL and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where interviewstartday='$date' AND agentlname IS NOT NULL AND status.tenantid='4'";
#$querynum = "SELECT count(*) FROM Status where interviewstartday='$date' AND agentlname IS NOT NULL";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=InterviewsByAgent.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
	echo "" . $data . " Daily Started";
	echo "</a>";

?></li>
      <li class="MyFont">
      
      <?PHP 
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where interviewstartday='$date' AND agentlname IS NOT NULL and reachedretainerdiscussion='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where interviewstartday='$date' AND agentlname IS NOT NULL and reachedretainerdiscussion='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where interviewstartday='$date' AND agentlname IS NOT NULL and reachedretainerdiscussion='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where interviewstartday='$date' AND agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) FROM Status where interviewstartday='$date' AND agentlname IS NOT NULL and reachedretainerdiscussion='Yes'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=InterviewsClosedByAgent.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " Daily Complete";
echo "</a>";

?></li>
            <li class="MyFont">
            
            <?PHP 
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerSentDate='$date' AND agentlname IS NOT NULL and reachedretainerdiscussion='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerSentDate='$date' AND agentlname IS NOT NULL and reachedretainerdiscussion='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSentDate='$date' AND agentlname IS NOT NULL and reachedretainerdiscussion='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSentDate='$date' AND agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) FROM Status where retainerSentDate='$date' AND agentlname IS NOT NULL and reachedretainerdiscussion='Yes'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=DailyRetainersSent.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " Daily Rtrs Sent";
echo "</a>";

?>
            
            </li>
 <li class="MyFont">
            
            <?PHP 
$querynum = "SELECT count(*) FROM Status where retainerRecievedDate='$date' AND agentlname IS NOT NULL and reachedretainerdiscussion='Yes'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=DailyRetainersReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " Daily Rtrs Rcvd";
echo "</a>";
?>
</li>
      <li class="MyFont">
            
            <?PHP 
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.demandcreated='Yes' AND demandcreateddate='$date' AND agentlname IS NOT NULL and reachedretainerdiscussion='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.demandcreated='Yes' AND demandcreateddate='$date' AND agentlname IS NOT NULL and reachedretainerdiscussion='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.demandcreated='Yes' AND demandcreateddate='$date' AND agentlname IS NOT NULL and reachedretainerdiscussion='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.demandcreated='Yes' AND demandcreateddate='$date' AND agentlname IS NOT NULL and reachedretainerdiscussion='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) FROM Status where status.demandcreated='Yes' AND demandcreateddate='$date' AND agentlname IS NOT NULL and reachedretainerdiscussion='Yes'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=DailyDemandsCreated.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " Daily Demands";
echo "</a>";
?>
</li>
      <!-- WEEKLY $weeknow--> 
      
 <li class="MyFont">
            
            <?PHP 
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where interviewstartweek='$weeknow' AND agentlname IS NOT NULL and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where interviewstartweek='$weeknow' AND agentlname IS NOT NULL and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where interviewstartweek='$weeknow' AND agentlname IS NOT NULL and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where interviewstartweek='$weeknow' AND agentlname IS NOT NULL AND status.tenantid='4'";
#$querynum = "SELECT count(*) FROM Status where interviewstartweek='$weeknow' AND agentlname IS NOT NULL";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=InterviewsByAgentWeekly.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " Weekly Started";
echo "</a>";
?>
</li>
       <li class="MyFont">
            
            <?PHP 
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where interviewcompleteweek='$weeknow' AND agentlname IS NOT NULL and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where interviewcompleteweek='$weeknow' AND agentlname IS NOT NULL and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where interviewcompleteweek='$weeknow' AND agentlname IS NOT NULL and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where interviewcompleteweek='$weeknow' AND agentlname IS NOT NULL AND status.tenantid='4'";
#$querynum = "SELECT count(*) FROM Status where interviewcompleteweek='$weeknow' AND agentlname IS NOT NULL";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=InterviewsClosedByAgentWeekly.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " Weekly Complete";
echo "</a>";
?>

</li>
      <li class="MyFont">
            
            <?PHP 
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerSentWeek='$weeknow' AND agentlname IS NOT NULL and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerSentWeek='$weeknow' AND agentlname IS NOT NULL and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSentWeek='$weeknow' AND agentlname IS NOT NULL and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSentWeek='$weeknow' AND agentlname IS NOT NULL AND status.tenantid='4'";
#$querynum = "SELECT count(*) FROM Status where retainerSentWeek='$weeknow' AND agentlname IS NOT NULL";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=RetainersSentAgentWeekly.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " Weekly Rtrs Sent";
echo "</a>";
?>

</li>
<li class="MyFont">
            
            <?PHP 
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerRecievedWeek='$weeknow' AND agentlname IS NOT NULL and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerRecievedWeek='$weeknow' AND agentlname IS NOT NULL and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerRecievedWeek='$weeknow' AND agentlname IS NOT NULL and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerRecievedWeek='$weeknow' AND agentlname IS NOT NULL AND status.tenantid='4'";
#$querynum = "SELECT count(*) FROM Status where retainerRecievedWeek='$weeknow' AND agentlname IS NOT NULL";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=RetainersReceivedAgentWeekly.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " Weekly Rtrs Rcvd";
echo "</a>";
?>

</li>
<li class="MyFont">
            
            <?PHP 
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where demandcreatedweek='$weeknow' AND agentlname IS NOT NULL and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where demandcreatedweek='$weeknow' AND agentlname IS NOT NULL and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where demandcreatedweek='$weeknow' AND agentlname IS NOT NULL and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where demandcreatedweek='$weeknow' AND agentlname IS NOT NULL AND status.tenantid='4'";
#$querynum = "SELECT count(*) FROM Status where demandcreatedweek='$weeknow' AND agentlname IS NOT NULL";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=DemandsCreatedAgentWeekly.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " Weekly Demands";
echo "</a>";
?>
</li>
      
      <!-- MONTHLY --> 
      
<li class="MyFont">
            
            <?PHP 
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where interviewstartmonthyear='$month' AND agentlname IS NOT NULL and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where interviewstartmonthyear='$month' AND agentlname IS NOT NULL and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where interviewstartmonthyear='$month' AND agentlname IS NOT NULL and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where interviewstartmonthyear='$month' AND agentlname IS NOT NULL AND status.tenantid='4'";
#$querynum = "SELECT count(*) FROM Status where interviewstartmonthyear='$month' AND agentlname IS NOT NULL";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=InterviewsByAgentMonthly.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " Monthly Started";
echo "</a>";
?></li>
      <li class="MyFont">
            
            <?PHP 
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where interviewcompletemonthyear='$month' AND agentlname IS NOT NULL and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where interviewcompletemonthyear='$month' AND agentlname IS NOT NULL and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where interviewcompletemonthyear='$month' AND agentlname IS NOT NULL and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where interviewcompletemonthyear='$month' AND agentlname IS NOT NULL AND status.tenantid='4'";
#$querynum = "SELECT count(*) FROM Status where interviewcompletemonthyear='$month' AND agentlname IS NOT NULL";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=InterviewsClosedByAgentMonthly.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " Monthly Complete";
echo "</a>";
?></li>
      <li class="MyFont">
            
            <?PHP 
$querynum = "SELECT count(*) FROM Status where retainerSentMonth='$month' AND agentlname IS NOT NULL";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=RetainersSentByAgentMonthly.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " Monthly Rtrs Sent";
echo "</a>";
?>
</li>
      <li class="MyFont">
            
            <?PHP 
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerRecievedMonth='$month' AND agentlname IS NOT NULL and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerRecievedMonth='$month' AND agentlname IS NOT NULL and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerRecievedMonth='$month' AND agentlname IS NOT NULL and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerRecievedMonth='$month' AND agentlname IS NOT NULL AND status.tenantid='4'";
#$querynum = "SELECT count(*) FROM Status where retainerRecievedMonth='$month' AND agentlname IS NOT NULL";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=RetainersReceivedByAgentMonthly.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " Monthly Rtrs Rcvd";
echo "</a>";
?></li>
<li class="MyFont">
            
            <?PHP 
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where demandcreatedmonth='$month' AND agentlname IS NOT NULL and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where demandcreatedmonth='$month' AND agentlname IS NOT NULL and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where demandcreatedmonth='$month' AND agentlname IS NOT NULL and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where demandcreatedmonth='$month' AND agentlname IS NOT NULL AND status.tenantid='4'";
#$querynum = "SELECT count(*) FROM Status where demandcreatedmonth='$month' AND agentlname IS NOT NULL";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
	echo '<a href=DemandsCreatedAgentMonthly.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "" . $data . " Monthly Demands";
echo "</a>";
?></li>

    </ul>
   
    <p> test</p>
    <p>test</p>
    <!-- end .sidebar1 --></div>
    
<!-- Agent Metrics done-->     
  <div class="content">
  <?php

if (empty($agentlname))
{
	echo "<iframe name='iframe_content' scrolling='yes' width='100%' height='55%' frameboarder='0' src='Search.php?brandname=";
	echo "$brandnameurl";
	echo "&agentlname=$agentlname'' >";
	echo "</iframe>";
	echo "<iframe name='iframe_content2' scrolling='yes' width='100%' height='45%' border='0' frameboarder='0' src='WebCalendar-1.2.4/month.php?login=__public__'>";
	echo "</iframe>";
}

if (isset($agentlname))
{
	echo "<iframe name='iframe_content' scrolling='yes' width='100%' height='50%' frameboarder='0' src='Search.php?brandname=";
	echo "$brandnameurl";
	echo "&agentlname=$agentlname'' >";
	echo "</iframe>";
	echo "<iframe name='iframe_content2' scrolling='yes' width='100%' height='45%' border='0' frameboarder='0' src='WebCalendar-1.2.4/month.php?login=__public__'>";
	echo "</iframe>";
}



  ?>
    <!-- end .content --></div>
  <!-- <div class="sidebar2">-->
    <!-- <h4>test</h4>-->
    <!-- <p>test</p>-->
    <!-- end .sidebar2 --></div>
  <!-- <div class="footer" > -->
    <!-- <p>test</p>  -->
    <!-- end .footer --><!--</div> -->
  <!-- end .container --></div>
</body>
</html>