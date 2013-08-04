<script src="http://max.jotfor.ms/min/g=jotform?3.0.2679" type="text/javascript"></script>

<script type="text/javascript">
   JotForm.init(function(){
      $('input_3').hint('Last name');
   });
</script>
<script type="text/javascript">
   JotForm.init(function(){
      $('input_4').hint('ex: Macys');
   });
</script>
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
	width: 1000px;
	/*height: auto;*/ /* i added this(ian)*/
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
/*.sidebar1 {
	float: left;
	width: 50%;
	height:50%;
	background: #EADCAE;
	padding-bottom: 15px;
}*/
.content {

	padding: 1px 0;
	width: 49%;

	height: 200px;
	/*height: 1200px;*/
	float: right;
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
.SearchFont { /*  */
	font-size: 12px;

	
}
-->
</style>

<?PHP //admin level 
$serverName = "localhost\SPICE";
$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
$thetimeisnow = date('H').':'.date('i').':'.date('s');
$thedateis =  date('l').' '.date('F').' '.date('j').''.date('S').', '.date('Y');
$thetimezone =  date('T');
$weeknow = date('Y').'-'.date('W');
$month = date('Y').'-'.date('m');
$date = date('Y').'-'.date('m').'-'.date('d');
?>
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
<?PHP
//top header table
	echo "<table border='0' bordercolor='#000000' width='100%' cellpadding='1' cellspacing='0'>";
  	echo "<tr valign='bottom'>";

	echo "<td width='50%' valign='bottom'>";
?>




<div class="SearchFont" align="left">
<?PHP	
	echo "<FORM NAME ='form2' METHOD ='POST' ACTION ='MassActionCM.php'>";
	echo "<label title='Case manager'>Case Manager: <INPUT TYPE = 'text' Name ='agentlname' id='input_3' value= '";
if (isset($agentlname))
	{
	echo "$agentlname";
	}
echo "' style='width:20%; height:24px'></label>";
?>
	&nbsp;&nbsp;
<?PHP
	echo "<label title='Campaign'>Campaign: <INPUT TYPE = 'text' id='input_4' Name='brandname' value='";
	if (isset($brandname))
	{
	echo "$brandname";
	}
	echo "' style='width:20%; height:24px'></label>";
	echo "<INPUT TYPE = 'Submit' Name = 'Submit1'  VALUE = 'Update'>";
	//echo "<INPUT TYPE = 'Reset' Name = 'Submit2'  VALUE = 'Reset'>";
	echo "</FORM>";

?>	
</div>
<?PHP	
    echo "</td>";
?>	
<?PHP
	echo "<td width='50%'>";
?>

<?PHP

	echo "</td>";
	
	echo "</table>";
?>
	

<?PHP
//middle table
	echo "<table border='1px' bordercolor='#000000' width='100%' cellpadding='1' cellspacing='0'>";
  	echo "<tr>";
//Outreach head
	echo "<td width='50%' height='30px'>";
?>
<?PHP
	echo "OUTREACH";
?>
<?PHP	
	echo "</td>";
#echo "<td width='25%' height='30px'>";
?>
<?PHP
	#echo "OUTREACH2";
?>
<?PHP	
	#echo "</td>";	
//Litigiation head
	echo "<td width='50%' height='30px'>";
?>	
<?PHP
echo "LITIGATION";
?>
<?PHP
	echo "</td>";
	echo "</tr>";
//Body start	
	echo "<tr>";
	echo "<td width='50%' height='250px' valign='top'>";
?>
<?PHP	
####echo "outreach body";
  //echo "<tr>"; 
  	 


?>
     <ul class="nav"> <div class="MyFont"><u><strong><br />Retainers<br /></strong></u></div>

<?PHP
//Retainers waiting to send //

if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='No' and brand='$brandname' and agentlname='$agentlname' and retainerRecieved='No' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerSent='No' and agentlname='$agentlname' and retainerRecieved='No' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='No' and brand='$brandname' and retainerRecieved='No' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='No' and retainerRecieved='No' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
echo "<li class='MyFont'>";
	echo '<a href=NeedToSendRetainerCM.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
	echo " Retainers to send:<strong>	" . $data;
	echo "</strong></a>";
	echo "</li>";
}
?>
	
    
          
<?PHP //needs attn //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4' AND status.retainerstatus='Received NEEDSATTN' AND status.retainercountersignsent IS NULL";

if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' and agentlname='$agentlname' AND status.tenantid='4' AND status.retainerstatus='Received NEEDSATTN' AND status.retainercountersignsent IS NULL";

if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' and brand='$brandname' AND status.tenantid='4' AND status.retainerstatus='Received NEEDSATTN' AND status.retainercountersignsent IS NULL";

if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' AND status.tenantid='4' AND status.retainerstatus='Received NEEDSATTN' AND status.retainercountersignsent IS NULL";

#$querynum = "SELECT count(*) from status where retainerSent='Yes'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=ReceivedRetainersNeedattnCM.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
	echo " Deficient retainers:<strong>	" . $data;
	echo "</strong></a>";
	echo "</li>";
// end //
}
?>
	
    
      

      
	  <?PHP //Retainers waiting to come back //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' AND status.tenantid='4' and retainerRecieved='No' and brand='$brandname' and agentlname='$agentlname'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' AND status.tenantid='4' and retainerRecieved='No' and agentlname='$agentlname'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' AND status.tenantid='4' and retainerRecieved='No' and brand='$brandname'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' AND status.tenantid='4' and  retainerRecieved='No'";	  
#$querynum = "SELECT count(*) from status where retainerSent='Yes' and retainerRecieved='No' ";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];

if ($data > 0 )
{
	echo "<li class='MyFont'>";
	echo '<a href=NeedToReceiveRetainerCM.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';

echo "Retainers sent but not received by ILG:<strong> " . $data . "";
echo "</strong></a>";
echo "</li>";
}
//total end //
?>
	
      




      
<?PHP //received and not counter-signed //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent IS NULL";

if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' and agentlname='$agentlname' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent IS NULL";

if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' and brand='$brandname' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent IS NULL";

if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent IS NULL";

#$querynum = "SELECT count(*) from status where retainerSent='Yes'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=ReceivedRetainersNotCountersignedCM.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
	echo "Retainers to countersign: <strong>" . $data;
	echo "</strong></a>";
	echo "</li>";
}
// end //
?>

      
<?PHP 
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent='Yes'";

if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' and agentlname='$agentlname' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent='Yes'";

if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' and brand='$brandname' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent='Yes'";

if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent='Yes'";

#$querynum = "SELECT count(*) from status where retainerSent='Yes'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	#echo '<a href=ReceivedRetainersCountersignedCM.php?brandname=';  
	echo '<a href=ReceivedRetainersCM.php?brandname=';
	
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
	echo "Countersigned retainers to send to client: <strong>" . $data;
	echo "</strong></a>";
	echo "</li>";

}
// end //
?>

<?PHP //received and not counter-signed //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent='Yes'";

if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' and agentlname='$agentlname' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent='Yes'";

if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' and brand='$brandname' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent='Yes'";

if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerRecieved='Yes' AND status.tenantid='4' AND status.retainerstatus!='Received NEEDSATTN' AND status.retainercountersignsent='Yes'";

#$querynum = "SELECT count(*) from status where retainerSent='Yes'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=ReceivedRetainersCountersigned.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
	echo "Undeliverable retainers: <strong>" . $data;
	echo "</strong></a>";
	echo "</li>";

}
// end //
?>
<?PHP //Total Retainers Sent //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' AND brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status where retainerSent='Yes'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);
$data = $rownum[''];
if ($data > 0 )
{
	echo "<li class='MyFont'>";
	echo '<a href=AllSentRetainersCM.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
	echo " All Retainers sent:<strong>	" . $data;
	echo "</strong></a>";
	echo "</li>";
}
// end //

?>
<?PHP //Retainers returned //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' and retainerRecieved='Yes'  AND status.tenantid='4' and brand='$brandname' and agentlname='$agentlname'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' and retainerRecieved='Yes' AND status.tenantid='4' and agentlname='$agentlname'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' and retainerRecieved='Yes' AND status.tenantid='4' and brand='$brandname'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where retainerSent='Yes' AND status.tenantid='4' and retainerRecieved='Yes' ";
#$querynum = "SELECT count(*) from status where retainerSent='Yes' and retainerRecieved='Yes' ";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{	
	echo "<li class='MyFont'>";
	echo '<a href=ReceivedRetainersCM.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
	echo "All Retainers received:<strong> " . $data;
	echo "</strong></a>";//total end //
	echo "</li>";
}
?>
<div class="MyFont"><u><strong><br />Newly assigned from Online Questionnaire <br /></strong></u></div>
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=AuthsReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "Short questionnaires completed, waiting for retainer: <strong>" . $data;
echo "</strong></a>";
echo "</li>";
}

//total end //
?>
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=AuthsReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "Short questionnaires completed, to counter-sign: <strong>" . $data;
echo "</strong></a>";
echo "</li>";
}

//total end //
?>

<div class="MyFont"><u><strong><br />Authorizations<br /></strong></u></div>

<?PHP	
	

 //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='No' AND status.tenantid='4' and brand='$brandname' and agentlname='$agentlname'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='No' AND status.tenantid='4' and agentlname='$agentlname'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='No' AND status.tenantid='4' and brand='$brandname'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='No' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='No' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=AuthsNotReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "Authorizations not received: <strong>" . $data;
echo "</strong></a>";
echo "</li>";
}
//total end //
?>
     
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=AuthsReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "Authorizations received: <strong>" . $data;
echo "</strong></a>";
echo "</li>";
}

//total end //
?>
<div class="MyFont"><u><strong><br />Questionnaires<br /></strong></u></div>
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=AuthsReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "Questionnaires not received: <strong>" . $data;
echo "</strong></a>";
echo "</li>";
}

//total end //
?>
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=AuthsReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "Questionnaires received: <strong>" . $data;
echo "</strong></a>";
echo "</li>";
}

//total end //
?>

    </ul>

<!-- Retainers finish-->



<?PHP	
	echo "</td>";
?>
<?PHP
	#echo "<td width='20%' height='250px' valign='top'>";
?>    



<?PHP	
	#echo "</td>";
?>
<?PHP
	echo "<td width='60%' height='250px' valign='top'>";
?>
<ul class="nav">
<div class="MyFont"><u><strong><br />Demands that need to be filed<br /></strong></u></div>
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=AuthsReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "Demands need to be filed: <strong>" . $data;
echo "</strong></a>";
echo "</li>";
}

//total end //
?>
<div class="MyFont"><u><strong><br />Reply received<br /></strong></u></div>
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=AuthsReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "Reply received: <strong>" . $data;
echo "</strong></a>";
echo "</li>";
}

//total end //
?>
<div class="MyFont"><u><strong><br />Amendments and Counterclaims<br /></strong></u></div>
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=AuthsReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "Amendments and Counterclaims: <strong>" . $data;
echo "</strong></a>";
echo "</li>";
}

//total end //
?>
<div class="MyFont"><u><strong><br />Extension letters<br /></strong></u></div>
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=AuthsReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "Extension letters: <strong>" . $data;
echo "</strong></a>";
echo "</li>";
}

//total end //
?>


<div class="MyFont"><u><strong><br />Arbitration<br /></strong></u></div>
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=AuthsReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "Arbitrations: <strong>" . $data;
echo "</strong></a>";
echo "</li>";
}

//total end //
?>
<div class="MyFont"><u><strong><br />Discovery<br /></strong></u></div>
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=AuthsReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "Discoveries: <strong>" . $data;
echo "</strong></a>";
echo "</li>";
}

//total end //
?>
<div class="MyFont"><u><strong><br />Responses to discovery received<br /></strong></u></div>
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=AuthsReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "Discovery responses: <strong>" . $data;
echo "</strong></a>";
echo "</li>";
}

//total end //
?>
<div class="MyFont"><u><strong><br />Personnel file request<br /></strong></u></div>
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=AuthsReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "Personnel file requests: <strong>" . $data;
echo "</strong></a>";
echo "</li>";
}

//total end //
?>
<div class="MyFont"><u><strong><br />Settlement<br /></strong></u></div>
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=AuthsReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "Settlements: <strong>" . $data;
echo "</strong></a>";
echo "</li>";
}

//total end //
?>
<div class="MyFont"><u><strong><br />Distribution of funds<br /></strong></u></div>
<?PHP //total start //
if (isset($brandname)) if (isset($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($agentlname)) if (empty($brandname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and agentlname='$agentlname' AND status.tenantid='4'";
if (isset($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' and brand='$brandname' AND status.tenantid='4'";
if (empty($brandname)) if (empty($agentlname)) $querynum = "SELECT count(*) from status where status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
#$querynum = "SELECT count(*) from status WHERE status.interviewstarted='Yes' AND status.reachedretainerdiscussion='Yes' AND status.retainerSent='Yes' AND status.authformreceived='Yes' AND status.tenantid='4'";
$numberofresults = sqlsrv_query($conn,$querynum);
$rownum = sqlsrv_fetch_array($numberofresults, SQLSRV_FETCH_ASSOC);

$data = $rownum[''];
if ($data > 0)
{
	echo "<li class='MyFont'>";
	echo '<a href=AuthsReceived.php?brandname=';  
	echo "$brandnameurl"; 
	echo '&agentlname=';
	echo "$agentlname"; 
	echo ' target=\'iframe_content\'>';
echo "Distribution of funds: <strong>" . $data;
echo "</strong></a>";
echo "</li>";
}

//total end //
?>
<?PHP	
	echo "</td>";
?>

<?PHP	
	echo "</tr>";
	
	echo "</table>";
?>

<?PHP
//bottom table
	echo "<table border='1' bordercolor='#000000' width='100%' height='33%' cellpadding='1' cellspacing='0'>";
  	echo "<tr>";

	echo "<td height='600px'>";
?>
<?PHP
		echo "<iframe name='iframe_content' scrolling='yes' width='100%' height='100%' frameboarder='0' src='Search.php?brandname=";
	echo "$brandnameurl";
	echo "&agentlname=$agentlname'' >";
		echo "<iframe name='iframe_content2' scrolling='yes' width='100%' height='45%' border='0' frameboarder='0' src='WebCalendar-1.2.4/month.php?login=__public__'>";
	echo "</iframe>";
?>
<?PHP	
	echo "</td>";
	
	echo "</tr>";
	
	echo "</table>";
		echo "<table border='1' bordercolor='#000000' width='100%' height='33%' cellpadding='1' cellspacing='0'>";
  	echo "<tr>";

	echo "<td height='100%'>";
?>
<?PHP
		
		echo "<iframe name='iframe_content2' scrolling='yes' width='100%' height='100%' border='0' frameboarder='0' src='WebCalendar-1.2.4/month.php?login=__public__'>";
	echo "</iframe>";
?>
<?PHP	
	echo "</td>";
	
	echo "</tr>";
	
	echo "</table>";


?>
