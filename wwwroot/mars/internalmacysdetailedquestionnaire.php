<?PHP
require("internalFormsStyle.php");//docutype, css
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("uniqueiddata_row.php");
require("functions.php");//functions

$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
$year = date('Y');
?>

<?PHP
if (isset($_REQUEST['tenantid'])) $tenantid = $_REQUEST['tenantid'];
if (empty($tenantid)) $tenantid = '4';
if (isset($_REQUEST['brandid'])) $brandid = $_REQUEST['brandid'];
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
if (isset($_REQUEST['brand'])) $brand = $_REQUEST['brand'];
if (isset($_REQUEST['WhoFirstName'])) $FirstName = stripcslashes($_REQUEST['WhoFirstName']);
if (isset($_REQUEST['WhoLastName'])) $LastName = stripcslashes($_REQUEST['WhoLastName']);
if (isset($_REQUEST['Email'])) $Email = $_REQUEST['Email'];
if (isset($_REQUEST['StreetLine1'])) $StreetLine1 = stripcslashes($_REQUEST['StreetLine1']);
if (isset($_REQUEST['StreetLine2'])) $StreetLine2 = stripcslashes($_REQUEST['StreetLine2']);
if (isset($_REQUEST['HomeCity'])) $HomeCity = $_REQUEST['HomeCity'];
if (isset($_REQUEST['HomeState'])) $HomeState = $_REQUEST['HomeState'];
if (isset($_REQUEST['Zipcode'])) $Zipcode = $_REQUEST['Zipcode'];
if (isset($_REQUEST['Country'])) $Country = $_REQUEST['Country'];
if (isset($_REQUEST['CallbackNum'])) 
{	
	$phone1 = $_REQUEST['CallbackNum'];
	$phonearea1 = substr("$phone1", 0, 3);
	$phonerest1 = substr("$phone1", 3, 7);
}
if (isset($_REQUEST['SecondaryNum'])) 
{	
	$phone2 = $_REQUEST['SecondaryNum'];
	$phonearea2 = substr("$phone2", 0, 3);
	$phonerest2 = substr("$phone2", 3, 7);
}
?>
<?PHP 
//$serverName = "localhost\SPICE";
//$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
//$conn = sqlsrv_connect( $serverName, $connectionInfo );
$query = "SELECT FirstName,LastName,Street1,Street2,City,State,Zipcode,email,phone1,phone2,brandid,tenantid,brand,completedlongformonline FROM Status WHERE uniqueid='$uniqueid' AND tenantid='$tenantid'";
$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$FirstName = $row['FirstName'];
		$LastName = $row['LastName'];
		$StreetLine1 = $row['Street1'];
		$StreetLine2 = $row['Street2'];
		$HomeCity = $row['City'];
		$HomeState = $row['State'];
		$Zipcode = $row['Zipcode'];
		$Email = $row['email'];
		$phone1 = $row['phone1'];
		$phone2 = $row['phone2'];
		$brandid = $row['brandid'];
		$tenantid = $row['tenantid'];
		$brand = $row['brand'];
		$completedlongformonline = $row['completedlongformonline']; 
  }

$query = "IF EXISTS(SELECT uniqueid FROM data WHERE uniqueid=$uniqueid AND tenantid=4) UPDATE data SET [3Zipcode]='$Zipcode',[3HomeState]='$HomeState',[3HomeCity]='$HomeCity',[3StreetLine2]='$StreetLine2',[3StreetLine1]='$StreetLine1',[3Email]='$Email',[3SecondaryNumber]='$phone2',[1CallBackNum]='$phone1',[1WhoLastName]='$LastName',[1WhoFirstName]='$FirstName' WHERE uniqueid=$uniqueid AND tenantid=4 ELSE INSERT INTO data (uniqueid,[3Zipcode],[3HomeState],[3HomeCity],[3StreetLine2],[3StreetLine1],[3Email],[3SecondaryNumber],[1CallBackNum],[1WhoLastName],[1WhoFirstName],brandid,tenantid,date,time,brand) VALUES ($uniqueid,'$Zipcode','$HomeState','$HomeCity',$StreetLine2,$StreetLine1,$Email,$phone2,$phone1,$LastName,$FirstName,'$brandid','$tenantid','$date','$time','$brand')";
$results = sqlsrv_query($conn,$query);
?>

<body>

<script language="JavaScript">
	var needToConfirm = true;
	window.onbeforeunload = confirmExit;
	function confirmExit()
	{
		if (needToConfirm)
		return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";
	}
</script>

<?PHP
if ($completedlongformonline == 'Yes')
{
	echo "It looks like you've already completed this form, give us a call if you have any questions.";
}
?> 

<script language="JavaScript" src="js/internalValidateMacyLongForm.js">
</script>

<div id="internalLongForm">
    <form action="internaldatabase_write_MacysFull.php" method="post" enctype="multipart/form-data" name="internalLongForm" id="internalLongForm" accept-charset="utf-8" onSubmit="return validateLongFormDiv1();">
        <input type="hidden" name="formID" value="20599278470161" />
        <div class="formWrapper">
            <ul class="form-section">
                <li class="form-line" id="id_17">
                    <div id="cid_17" class="form-input-wide">
                        <div id="text_17" class="form-html">
                            <table width='600px' align='center'>
                                <tr>
                                    <td align='center'>
                                        <h3><u>CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</u></h3>
                                    </td>
                                </tr>
                            </table>
                            <p class="MsoNormal"><span style="font-size: 12.0pt; line-height: 115%;">The following questions are designed to provide us with more detailed information about your potential wage and hour claims against Macy's. Please complete all questions accurately and truthfully, to the best of your recollection. This interview should take between 15-20 minutes to complete. </span></p>
                        </div>
                    </div>
                </li>
                <li id="cid_1" class="form-input-wide">
                    <div class="form-header-group">
                      <h2 id="header_1" class="form-header">Contact Information</h2>
                      <h3>Interview Section 1 of 9</h3>
                    </div>
                </li>
                <li>
					<?PHP
                    	iframemake('contactLongForm.php',$uniqueid,'260px','contact','0');
					?>
                </li>
            </ul>
            <ul class="form-section" id="session2" style="display:block;">
                <li id="cid_16" class="form-input-wide">
                    <div class="form-header-group">
                        <h2 id="header_16" class="form-header">What is your employment background at Macy's?</h2>
                        <h3>Interview Section 2 of 9</h3>
                    </div>
                </li>
                <?PHP include("internalmacysdetailedquestionnaire_SQL.php");?>
                <li class="form-line" id="id_97">
                    <label class="form-label-top" id="label_97" for="input_97">
                        What was your most recent position during your employment at Macy's? (Select the choice that best describes your last position)
                    </label>
                    <div id="cid_97" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                            <input type="hidden" name="recentPosition1"/>
                            <input type="radio" class="form-radio validate[required]" id="input_97_0" name="recentPosition" value="Holiday Associate"                
                            <?PHP if($recentPosition == "Holiday Associate") echo 'CHECKED';?> onClick="showPositionExplain();"/>
                            <label for="input_97_0"> Holiday Associate</label></span><span class="clearfix">
                            </span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                            <input type="radio" class="form-radio validate[required]" id="input_97_1" name="recentPosition" value="Sales Associate - Commissioned"
                            <?PHP if($recentPosition == "Sales Associate - Commissioned") echo 'CHECKED';?> onClick="showPositionExplain();" />
                            <label for="input_97_1"> Sales Associate - Commissioned </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                            <input type="radio" class="form-radio validate[required]" id="input_97_2" name="recentPosition" value="Sales Associate-Retail" 
                            <?PHP if($recentPosition == "Sales Associate-Retail") echo 'CHECKED';?>  onclick="showPositionExplain();"/>
                            <label for="input_97_1"> Sales Associate - Retail</label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                            <input type="radio" class="form-radio validate[required]" id="input_97_3" name="recentPosition" value="Sales Manager" 
                            <?PHP if($recentPosition == "Sales Manager") echo 'CHECKED';?>  onclick="showPositionExplain();"/>
                            <label for="input_97_1">Sales Manager </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                            <input type="radio" class="form-radio validate[required]" id="input_97_4" name="recentPosition" value="Sales Supervisor" 
                            <?PHP if($recentPosition == "Sales Supervisor") echo 'CHECKED';?> onClick="showPositionExplain();"/>
                            <label for="input_97_1">Sales Supervisor</label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_97_5" name="recentPosition" value="Retail Support Associate" 
                                <?PHP if($recentPosition == "Retail Support Associate") echo 'CHECKED';?>  onclick="showPositionExplain();"();/>
                                <label for="input_97_1">Retail Support Associate</label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_97_6" name="recentPosition" value="Cosmetics" 
                                <?PHP if($recentPosition == "Cosmetics") echo 'CHECKED';?> onClick="showPositionExplain();" />
                                <label for="input_97_6">Cosmetics</label>
                            </span>
			                                <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_97_13" name="recentPosition" value="Cashier" 
                                <?PHP if($recentPosition == "Cashier") echo 'CHECKED';?> onClick="showPositionExplain();" />
                                <label for="input_97_13">Cashier</label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_97_7" name="recentPosition" value="Merchandise Team Manager" 
                                <?PHP if($recentPosition == "Merchandise Team Manager") echo 'CHECKED';?> onClick="showPositionExplain();"/>
                                <label for="input_97_7">Merchandise Team Manager</label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_97_8" name="recentPosition" value="Macys By Appointment Executive" 
                                <?PHP if($recentPosition == "Macys By Appointment Executive") echo 'CHECKED';?> onClick="showPositionExplain();"/>
                                <label for="input_97_8">Macy's By Appointment Executive</label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_97_9" name="recentPosition" value="Receiving/Processing Team Lead" 
                                <?PHP if($recentPosition == "Receiving/Processing Team Lead") echo 'CHECKED';?>  onclick="showPositionExplain();"/>
                                <label for="input_97_9">Receiving/Processing Team Lead</label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_97_10" name="recentPosition" value="Assistant Store Manager"
                                <?PHP if($recentPosition == "Assistant Store Manager") echo 'CHECKED';?> onClick="showPositionExplain();" />
                                <label for="input_97_10">Assistant Store Manager</label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_97_11" name="recentPosition" 
                                value="I worked more than one position during my employment at Macys." 
                                <?PHP if($recentPosition == "I worked more than one position during my employment at Macys.") echo 'CHECKED';?> 
                                onclick="showPositionExplain();"/>
                                <label for="input_97_11">I worked more than one position during my employment at Macy's.</label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_97_13" name="recentPosition" 
                                value="Stockroom" <?PHP if($recentPosition == "Stockroom") echo 'CHECKED';?> 
                                onclick="showPositionExplain();"/>
                                <label for="input_97_13">Stockroom</label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_97_12" name="recentPosition" value="Other" 
                                <?PHP if($recentPosition == "Other") echo 'CHECKED';?> 
                                onclick="showPositionExplain();"/>
                                <label for="input_97_12">Other</label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_400" style="display:none;">
        <label class="form-label-top" id="label_400" for="input_99">If you worked as Holiday Associate, please explain:</label>
      			</li>
              <li class="form-line" id="id_401" style="display:none;">
        <label class="form-label-top" id="label_401" for="input_99">If you worked as Sales Associate - Commissioned, please explain:</label>
      			</li>
              <li class="form-line" id="id_402" style="display:none;">
        <label class="form-label-top" id="label_402" for="input_99">If you worked as Sales Associate - Retail, please explain:</label>
      			</li>
               <li class="form-line" id="id_403" style="display:none;">
        <label class="form-label-top" id="label_403" for="input_99">If you worked as Sales Manager, please explain:</label>
     			 </li>
              <li class="form-line" id="id_404" style="display:none;">
        <label class="form-label-top" id="label_404" for="input_99">If you worked as Sales Supervisor, please explain:</label>
             </li>
              <li class="form-line" id="id_405" style="display:none;">
        <label class="form-label-top" id="label_405" for="input_99">If you worked as Retail Support Associate, please explain:</label>
            </li>
              <li class="form-line" id="id_406" style="display:none;">
        <label class="form-label-top" id="label_406" for="input_99">If you worked as Merchandise Team Manager, please explain:</label>
              </li>
              <li class="form-line" id="id_407" style="display:none;">
        <label class="form-label-top" id="label_407" for="input_99">If you worked as  Macy's By Appointment Executive, please explain:</label>
            </li>
              <li class="form-line" id="id_408" style="display:none;">
        <label class="form-label-top" id="label_408" for="input_99">If you worked as  Receiving/Processing Team Lead, please explain:</label>
          </li>
           <li class="form-line" id="id_409" style="display:none;">
        <label class="form-label-top" id="label_409" for="input_99">If you worked as Assistant Store Manager, please explain:</label>
          </li>
          <li class="form-line" id="id_410" style="display:none;">
        <label class="form-label-top" id="label_410" for="input_99">If you worked in Stockroom, please explain:</label>
          </li>
         <li class="form-line" id="id_411" style="display:none;">
        <label class="form-label-top" id="label_411" for="input_99">If you worked as Cashier, please explain:</label>
          </li>
                <li class="form-line" id="id_98" 
                    <?PHP if($recentPosition == "Cosmetics"){echo "style='display:block;'";} else {echo  "style='display:none;'";} ?>>
                    <label class="form-label-top" id="label_98" for="input_99">If you worked in Cosmetics, please explain:</label>
                </li>       
                <li class="form-line" id="id_106" 
                    <?PHP if($recentPosition == "I worked more than one position during my employment at Macys."){echo "style='display:block;'";} else {echo  "style='display:none;'";} ?> >
                    <label class="form-label-top" id="label_106" for="input_99"> If you worked more than one position during your most recent employment with Macy's, please explain and include your start and end dates for each position:</label>
                </li>      
                <li class="form-line" id="id_99"  <?PHP if($recentPosition == "Other"){echo "style='display:block;'";} else {echo  "style='display:none;'";}?> >
                    <label class="form-label-top" id="label_99" for="input_99">If Other, please explain:</label>
                </li>
                <li class="form-line" id="id_300"  <?PHP if($recentPosition == "Cosmetics" || $recentPosition == "I worked more than one position during my employment at Macys." || $recentPosition == "Other"){echo "style='display:block;'";} else {echo  "style='display:none;'";} ?>>
                    <div id="cid_300" class="form-input-wide">
                        <div class="form-textarea-limit">
                            <span>
                                <textarea id="input_99" class="form-textarea" name="recentPositionExplain" cols="70" rows="6" value="<?PHP echo $recentPositionExplain;?>"><?PHP echo $recentPositionExplain;?></textarea>
                                <div class="form-textarea-limit-indicator">
                                    <span type="Letters" limit="1000" id="input_300-limit">(Maximum characters: 1000)</span>
                                </div>
                            </span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_12">
                    <label class="form-label-top" id="label_12" for="input_12">
                        What city was the last Macy's you worked in?
                    </label>
                    <div id="cid_12" class="form-input-wide">
                        <select class="form-dropdown validate[required]" style="width:280px" id="input_12" name="1LocCity" onChange="whatCity();">
                            <option  <?PHP if($LocCity == "") echo "selected";?> value=""></option>
                            <option  <?PHP if($LocCity == "Other") echo "selected";?> value="Other"> Other </option>
                            <option <?PHP if($LocCity == "Antioch - County East Mall") echo "selected";?> 
                            value="Antioch - County East Mall"> Antioch - County East Mall</option>
                            <option <?PHP if($LocCity == "Arcadia - Santa Anita") echo "selected";?> 
                            value="Arcadia - Santa Anita"> Arcadia - Santa Anita </option>
                            <option <?PHP if($LocCity == "Bakersfield - Valley Plaza") echo "selected";?> 
                            value="Bakersfield - Valley Plaza"> Bakersfield - Valley Plaza </option>
                            <option <?PHP if($LocCity == "Brea - Brea Mall") echo "selected";?> 
                            value="Brea - Brea Mall"> Brea - Brea Mall </option>
                            <option <?PHP if($LocCity == "Burbank - Burbank Town Center") echo "selected";?> 
                            value="Burbank - Burbank Town Center"> Burbank - Burbank Town Center </option>
                            <option <?PHP if($LocCity == "Canoga Park - Topanga") echo "selected";?> 
                            value="Canoga Park - Topanga"> Canoga Park - Topanga </option>
                            <option <?PHP if($LocCity == "Capitola - Capitola Mall") echo "selected";?> 
                            value="Capitola - Capitola Mall"> Capitola - Capitola Mall </option>
                            <option <?PHP if($LocCity == "Carlsbad - Plaza Camino Real") echo "selected";?> 
                            value="Carlsbad - Plaza Camino Real"> Carlsbad - Plaza Camino Real </option>
                            <option <?PHP if($LocCity == "Cerritos - Los Cerritos Center") echo "selected";?> 
                            value="Cerritos - Los Cerritos Center"> Cerritos - Los Cerritos Center </option>
                            <option <?PHP if($LocCity == "Chula Vista - Chula Vista Center") echo "selected";?> 
                            value="Chula Vista - Chula Vista Center"> Chula Vista - Chula Vista Center </option>
                            <option <?PHP if($LocCity == "Chula Vista - Otay Ranch Town Center") echo "selected";?> 
                            value="Chula Vista - Otay Ranch Town Center"> Chula Vista - Otay Ranch Town Center </option>
                            <option <?PHP if($LocCity == "Citrus Heights - Sunrise Mall") echo "selected";?> 
                            value="Citrus Heights - Sunrise Mall"> Citrus Heights - Sunrise Mall </option>
                            <option <?PHP if($LocCity == "City of Industry - Puente Hills Mall") echo "selected";?> 
                            value="City of Industry - Puente Hills Mall"> City of Industry - Puente Hills Mall </option>
                            <option <?PHP if($LocCity == "Concord - Sunvalley Shopping Center") echo "selected";?> 
                            value="Concord - Sunvalley Shopping Center"> Concord - Sunvalley Shopping Center </option>
                            <option <?PHP if($LocCity == "Corte Madera - Village at Corte Madera") echo "selected";?> 
                            value="Corte Madera - Village at Corte Madera"> Corte Madera - Village at Corte Madera </option>
                            <option <?PHP if($LocCity == "Costa Mesa - South Coast Plaza") echo "selected";?> 
                            value="Costa Mesa - South Coast Plaza"> Costa Mesa - South Coast Plaza </option>
                            <option <?PHP if($LocCity == "Culver City - Fox Hills") echo "selected";?> 
                            value="Culver City - Fox Hills"> Culver City - Fox Hills </option>
                            <option <?PHP if($LocCity == "Cupertino - Cupertino Square Mall") echo "selected";?> 
                            value="Cupertino - Cupertino Square Mall"> Cupertino - Cupertino Square Mall </option>
                            <option <?PHP if($LocCity == "Daly City - Serramonte") echo "selected";?> 
                            value="Daly City - Serramonte"> Daly City - Serramonte </option>
                            <option <?PHP if($LocCity == "Downey - Stonewood Center") echo "selected";?> 
                            value="Downey - Stonewood Center"> Downey - Stonewood Center </option>
                            <option <?PHP if($LocCity == "El Cajon - Parkway") echo "selected";?> 
                            value="El Cajon - Parkway"> El Cajon - Parkway </option>
                            <option <?PHP if($LocCity == "El Centro - Imperial Valley Mall") echo "selected";?> 
                            value="El Centro - Imperial Valley Mall"> El Centro - Imperial Valley Mall </option>
                            <option <?PHP if($LocCity == "Escondido - North County Fair") echo "selected";?> 
                            value="Escondido - North County Fair"> Escondido - North County Fair </option>
                            <option <?PHP if($LocCity == "Fairfield - Solano") echo "selected";?> 
                            value="Fairfield - Solano"> Fairfield - Solano </option>
                            <option <?PHP if($LocCity == "Fresno - Furniture") echo "selected";?> 
                            value="Fresno - Furniture">Fresno - Furniture</option>
                            <option <?PHP if($LocCity == "Fresno - Salano") echo "selected";?> 
                            value="Fresno - Salano"> Fresno - Salano </option>
                            <option <?PHP if($LocCity == "Fresno - Shops at River Park") echo "selected";?> 
                            value="Fresno - Shops at River Park"> Fresno - Shops at River Park </option>
                            <option <?PHP if($LocCity == "Glendale - Glendale Galleria") echo "selected";?> 
                            value="Glendale - Glendale Galleria"> Glendale - Glendale Galleria </option>
                            <option <?PHP if($LocCity == "Hayward - Southland Mall") echo "selected";?> 
                            value="Hayward - Southland Mall"> Hayward - Southland Mall </option>
                            <option <?PHP if($LocCity == "Irvine - Irvine Spectrum") echo "selected";?> 
                            value="Irvine - Irvine Spectrum"> Irvine - Irvine Spectrum </option>
                            <option <?PHP if($LocCity == "La Mesa - Grossmont Shopping Center") echo "selected";?> 
                            value="La Mesa - Grossmont Shopping Center"> La Mesa - Grossmont Shopping Center </option>
                            <option <?PHP if($LocCity == "Laguna Hills - Laguna Hills") echo "selected";?> 
                            value="Laguna Hills - Laguna Hills"> Laguna Hills - Laguna Hills </option>
                            <option <?PHP if($LocCity == "Lakewood - Lakewood Center") echo "selected";?> 
                            value="Lakewood - Lakewood Center"> Lakewood - Lakewood Center </option>
                            <option <?PHP if($LocCity == "Los Angeles - Baldwin Hills Crenshaw Plaza") echo "selected";?> 
                            value="Los Angeles - Baldwin Hills Crenshaw Plaza"> Los Angeles - Baldwin Hills Crenshaw Plaza </option>
                            <option <?PHP if($LocCity == "Los Angeles - Beverly Center") echo "selected";?> 
                            value="Los Angeles - Beverly Center"> Los Angeles - Beverly Center </option>
                            <option <?PHP if($LocCity == "Los Angeles - Broadway Plaza") echo "selected";?> 
                            value="Los Angeles - Broadway Plaza"> Los Angeles - Broadway Plaza </option>
                            <option <?PHP if($LocCity == "Los Angeles - Century City") echo "selected";?> 
                            value="Los Angeles - Century City"> Los Angeles - Century City </option>
                            <option <?PHP if($LocCity == "Los Angeles - Eagle Rock Plaza") echo "selected";?> 
                            value="Los Angeles - Eagle Rock Plaza"> Los Angeles - Eagle Rock Plaza </option>
                            <option <?PHP if($LocCity == "Los Angeles - Westside Pavilion") echo "selected";?> 
                            value="Los Angeles - Westside Pavilion"> Los Angeles - Westside Pavilion </option>
                            <option <?PHP if($LocCity == "Manhattan Beach - Manhattan Beach") echo "selected";?> 
                            value="Manhattan Beach - Manhattan Beach"> Manhattan Beach - Manhattan Beach </option>
                            <option <?PHP if($LocCity == "Mission Viejo - Mission Viejo Mall") echo "selected";?> 
                            value="Mission Viejo - Mission Viejo Mall"> Mission Viejo - Mission Viejo Mall </option>
                            <option <?PHP if($LocCity == "Modesto - Vintage Faire") echo "selected";?> 
                            value="Modesto - Vintage Faire"> Modesto - Vintage Faire </option>
                            <option <?PHP if($LocCity == "Montclair - Montclair Plaza") echo "selected";?> 
                            value="Montclair - Montclair Plaza"> Montclair - Montclair Plaza </option>
                            <option <?PHP if($LocCity == "Montebello - Montebello Town Center") echo "selected";?> 
                            value="Montebello - Montebello Town Center"> Montebello - Montebello Town Center </option>
                            <option <?PHP if($LocCity == "Monterey - Monterey Furniture") echo "selected";?> 
                            value="Monterey - Monterey Furniture"> Monterey - Monterey Furniture </option>
                            <option <?PHP if($LocCity == "Moreno Valley - Moreno Valley Mall") echo "selected";?> 
                            value="Moreno Valley - Moreno Valley Mall"> Moreno Valley - Moreno Valley Mall </option>
                            <option <?PHP if($LocCity == "Newark - NewPark Mall") echo "selected";?> 
                            value="Newark - NewPark Mall"> Newark - NewPark Mall </option>
                            <option <?PHP if($LocCity == "Newport Beach - Fashion Island") echo "selected";?> 
                            value="Newport Beach - Fashion Island"> Newport Beach - Fashion Island </option>
                            <option <?PHP if($LocCity == "North Hollywood - Laurel Plaza") echo "selected";?> 
                            value="North Hollywood - Laurel Plaza"> North Hollywood - Laurel Plaza </option>
                            <option <?PHP if($LocCity == "Northridge - Northridge Fashion Center") echo "selected";?> 
                            value="Northridge - Northridge Fashion Center"> Northridge - Northridge Fashion Center </option>
                            <option <?PHP if($LocCity == "Novato - Navato Furniture") echo "selected";?> 
                            value="Novato - Navato Furniture"> Novato - Navato Furniture </option>
                            <option <?PHP if($LocCity == "Palm Desert - Palm Desert") echo "selected";?> 
                            value="Palm Desert - Palm Desert"> Palm Desert - Palm Desert </option>
                            <option <?PHP if($LocCity == "Palmdale - Antelope Valley Mall") echo "selected";?> 
                            value="Palmdale - Antelope Valley Mall"> Palmdale - Antelope Valley Mall </option>
                            <option <?PHP if($LocCity == "Palo Alto - Stanford Shopping Center") echo "selected";?> 
                            value="Palo Alto - Stanford Shopping Center"> Palo Alto - Stanford Shopping Center </option>
                            <option <?PHP if($LocCity == "Pasadena - Pasadena") echo "selected";?> 
                            value="Pasadena - Pasadena"> Pasadena - Pasadena </option>
                            <option <?PHP if($LocCity == "Pasadena - Paseo Colorado") echo "selected";?> 
                            value="Pasadena - Paseo Colorado"> Pasadena - Paseo Colorado </option>
                            <option <?PHP if($LocCity == "Pleasanton - Pleasanton Furniture") echo "selected";?> 
                            value="Pleasanton - Pleasanton Furniture"> Pleasanton - Pleasanton Furniture </option>
                            <option <?PHP if($LocCity == "Pleasanton - Stoneridge Shopping Center") echo "selected";?> 
                            value="Pleasanton - Stoneridge Shopping Center"> Pleasanton - Stoneridge Shopping Center </option>
                            <option <?PHP if($LocCity == "Rancho Cucamonga - Victoria Gardens") echo "selected";?> v
                            alue="Rancho Cucamonga - Victoria Gardens"> Rancho Cucamonga - Victoria Gardens </option>
                            <option <?PHP if($LocCity == "Redding - Mt. Shasta Mall") echo "selected";?> 
                            value="Redding - Mt. Shasta Mall"> Redding - Mt. Shasta Mall </option>
                            <option <?PHP if($LocCity == "Redondo Beach - South Bay Galleria") echo "selected";?> v
                            alue="Redondo Beach - South Bay Galleria"> Redondo Beach - South Bay Galleria </option>
                            <option <?PHP if($LocCity == "Richmond - Hilltop") echo "selected";?> 
                            value="Richmond - Hilltop"> Richmond - Hilltop </option>
                            <option <?PHP if($LocCity == "Riverside - Galleria at Tyler") echo "selected";?> 
                            value="Riverside - Galleria at Tyler"> Riverside - Galleria at Tyler </option>
                            <option <?PHP if($LocCity == "Roseville - Galleria at Roseville") echo "selected";?> 
                            value="Roseville - Galleria at Roseville"> Roseville - Galleria at Roseville </option>
                            <option <?PHP if($LocCity == "Roseville - Roseville Furniture") echo "selected";?> 
                            value="Roseville - Roseville Furniture"> Roseville - Roseville Furniture </option>
                            <option <?PHP if($LocCity == "Sacramento - Arden Fair") echo "selected";?> 
                            value="Sacramento - Arden Fair">Sacramento - Arden Fair</option>
                            <option <?PHP if($LocCity == "Sacramento - Country Club Plaza") echo "selected";?> 
                            value="Sacramento - Country Club Plaza"> Sacramento - Country Club Plaza </option>
                            <option <?PHP if($LocCity == "Sacramento - Downtown Plaza") echo "selected";?> 
                            value="Sacramento - Downtown Plaza"> Sacramento - Downtown Plaza </option>
                            <option <?PHP if($LocCity == "Sacramento - Galleria at Roseville") echo "selected";?> 
                            value="Sacramento - Galleria at Roseville"> Sacramento - Galleria at Roseville </option>
                            <option <?PHP if($LocCity == "Sacramento - Roseville Furniture") echo "selected";?> 
                            value="Sacramento - Roseville Furniture"> Sacramento - Roseville Furniture </option>
                            <option <?PHP if($LocCity == "Salinas - Del Monte Center") echo "selected";?> 
                            value="Salinas - Del Monte Center"> Salinas - Del Monte Center </option>
                            <option <?PHP if($LocCity == "Salinas - Monterey Furniture") echo "selected";?> 
                            value="Salinas - Monterey Furniture"> Salinas - Monterey Furniture </option>
                            <option <?PHP if($LocCity == "Salinas - Northridge Furniture") echo "selected";?> 
                            value="Salinas - Northridge Furniture"> Salinas - Northridge Furniture </option>
                            <option <?PHP if($LocCity == "San Bernardino - Inland Center") echo "selected";?> 
                            value="San Bernardino - Inland Center"> San Bernardino - Inland Center </option>
                            <option <?PHP if($LocCity == "San Diego - Fashion Valley") echo "selected";?> 
                            value="San Diego - Fashion Valley"> San Diego - Fashion Valley </option>
                            <option <?PHP if($LocCity == "San Diego - Horton Plaza") echo "selected";?> 
                            value="San Diego - Horton Plaza"> San Diego - Horton Plaza </option>
                            <option <?PHP if($LocCity == "San Diego - Misson Valley") echo "selected";?> 
                            value="San Diego - Misson Valley"> San Diego - Misson Valley </option>
                            <option <?PHP if($LocCity == "San Diego - University Town Center") echo "selected";?> 
                            value="San Diego - University Town Center"> San Diego - University Town Center </option>
                            <option <?PHP if($LocCity == "San Francisco - Stonestown Galleria") echo "selected";?> 
                            value="San Francisco - Stonestown Galleria"> San Francisco - Stonestown Galleria </option>
                            <option <?PHP if($LocCity == "San Francisco - Union Square") echo "selected";?> 
                            value="San Francisco - Union Square"> San Francisco - Union Square </option>
                            <option <?PHP if($LocCity == "San Leandro - Bay Fair") echo "selected";?> 
                            value="San Leandro - Bay Fair"> San Leandro - Bay Fair </option>
                            <option <?PHP if($LocCity == "San Jose - Eastridge") echo "selected";?> 
                            value="San Jose - Eastridge"> San Jose - Eastridge </option>
                            <option <?PHP if($LocCity == "San Jose - Oakridge") echo "selected";?> 
                            value="San Jose - Oakridge"> San Jose - Oakridge </option>
                            <option <?PHP if($LocCity == "San Mateo - Hillsdale Furniture") echo "selected";?> 
                            value="San Mateo - Hillsdale Furniture"> San Mateo - Hillsdale Furniture </option>
                            <option <?PHP if($LocCity == "San Mateo - Hillsdale Shopping Center") echo "selected";?> 
                            value="San Mateo - Hillsdale Shopping Center"> San Mateo - Hillsdale Shopping Center </option>
                            <option <?PHP if($LocCity == "San Rafael - Mall at Northgate") echo "selected";?> 
                            value="San Rafael - Mall at Northgate"> San Rafael - Mall at Northgate </option>
                            <option <?PHP if($LocCity == "Santa Ana - MainPlace") echo "selected";?> 
                            value="Santa Ana - MainPlace"> Santa Ana - MainPlace </option>
                            <option <?PHP if($LocCity == "Santa Barbara - La Cumbre Plaza") echo "selected";?> 
                            value="Santa Barbara - La Cumbre Plaza"> Santa Barbara - La Cumbre Plaza </option>
                            <option <?PHP if($LocCity == "Santa Barbara - Paseo Nuevo") echo "selected";?> 
                            value="Santa Barbara - Paseo Nuevo"> Santa Barbara - Paseo Nuevo </option>
                            <option <?PHP if($LocCity == "Santa Clara - Valley Fair") echo "selected";?> 
                            value="Santa Clara - Valley Fair"> Santa Clara - Valley Fair </option>
                            <option <?PHP if($LocCity == "Santa Clarita - Valencia Town Center") echo "selected";?> 
                            value="Santa Clarita - Valencia Town Center"> Santa Clarita - Valencia Town Center </option>
                            <option <?PHP if($LocCity == "Santa Maria - Santa Maria Town Center") echo "selected";?> 
                            value="Santa Maria - Santa Maria Town Center"> Santa Maria - Santa Maria Town Center </option>
                            <option <?PHP if($LocCity == "Santa Rosa - Coddingtown Mall") echo "selected";?> 
                            value="Santa Rosa - Coddingtown Mall"> Santa Rosa - Coddingtown Mall </option>
                            <option <?PHP if($LocCity == "Santa Rosa - Santa Rosa Mall") echo "selected";?> 
                            value="Santa Rosa - Santa Rosa Mall"> Santa Rosa - Santa Rosa Mall </option>
                            <option <?PHP if($LocCity == "Sherman Oaks - Fashion Square") echo "selected";?> 
                            value="Sherman Oaks - Fashion Square"> Sherman Oaks - Fashion Square </option>
                            <option <?PHP if($LocCity == "Simi Valley - Simi Valley Town Center") echo "selected";?> 
                            value="Simi Valley - Simi Valley Town Center"> Simi Valley - Simi Valley Town Center </option>
                            <option <?PHP if($LocCity == "Stockton - Sherwood Mall") echo "selected";?> 
                            value="Stockton - Sherwood Mall"> Stockton - Sherwood Mall </option>
                            <option <?PHP if($LocCity == "Sunnyvale - Sunnyvale Town Center") echo "selected";?> 
                            value="Sunnyvale - Sunnyvale Town Center"> Sunnyvale - Sunnyvale Town Center </option>
                            <option <?PHP if($LocCity == "Temecula - Promenade in Temecula") echo "selected";?> 
                            value="Temecula - Promenade in Temecula"> Temecula - Promenade in Temecula </option>
                            <option <?PHP if($LocCity == "Thousand Oaks - The Oaks") echo "selected";?> 
                            value="Thousand Oaks - The Oaks"> Thousand Oaks - The Oaks </option>
                            <option <?PHP if($LocCity == "Tracy - West Valley Mall") echo "selected";?> 
                            value="Tracy - West Valley Mall"> Tracy - West Valley Mall </option>
                            <option <?PHP if($LocCity == "Torrance - Del Amo Fashion Center") echo "selected";?> 
                            value="Torrance - Del Amo Fashion Center"> Torrance - Del Amo Fashion Center </option>
                            <option <?PHP if($LocCity == "Union City - Union City Furniture Clearance") echo "selected";?> 
                            value="Union City - Union City Furniture Clearance"> Union City - Union City Furniture Clearance </option>
                            <option <?PHP if($LocCity == "Ventura - Pacific View") echo "selected";?> 
                            value="Ventura - Pacific View">Ventura - Pacific View </option>
                            <option <?PHP if($LocCity == "Visalia - Visalia Mall") echo "selected";?> 
                            value="Visalia - Visalia Mall"> Visalia - Visalia Mall </option>
                            <option <?PHP if($LocCity == "Walnut Creek - Broadway Plaza") echo "selected";?> 
                            value="Walnut Creek - Broadway Plaza"> Walnut Creek - Broadway Plaza </option>
                            <option <?PHP if($LocCity == "West Covina - West Covina") echo "selected";?> 
                            value="West Covina - West Covina"> West Covina - West Covina </option>
                            <option <?PHP if($LocCity == "Westminster - Westminster Mall") echo "selected";?> 
                            value="Westminster - Westminster Mall"> Westminster - Westminster Mall </option>
                            <option <?PHP if($LocCity == "Woodland Hills - Promenade") echo "selected";?> 
                            value="Woodland Hills - Promenade"> Woodland Hills - Promenade </option>
                        </select>
                    </div>
                </li>
                <li class="form-line" id="id_13"  <?PHP if($LocCity =="Other"){echo "style='display:block'";} else {echo "style='display:none'";}?> >
                    <label class="form-label-top" id="label_13" for="input_13">
                        If Other, enter city here:
                    </label>
                    <div id="cid_13" class="form-input-wide">
                        <input type="text" class="form-textbox validate[required]" id="input_13" name="1LocCity2" size="20" value="<?PHP echo $LocCity2; ?>" />
                    </div>
                </li>
                <li class="form-line" id="id_15">
                    <label class="form-label-top" id="label_15" for="input_15">
                        When you worked for Macy's, how were you paid? 
                    </label>
                    <div id="cid_15" class="form-input-wide">
                        <div class="form-single-column"><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" 
                                id="input_15_0" name="EmployeeHourly" value="Hourly" <?PHP if($EmployeeHourly == "Hourly") echo 'CHECKED';?> 
                                onclick="showHowPayExplain();" />
                                <label for="input_15_0">Hourly</label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" 
                                id="input_15_1" name="EmployeeHourly" value="Hourly plus commissions" 
                                <?PHP if($EmployeeHourly == "Hourly plus commissions") echo 'CHECKED';?> onClick="showHowPayExplain();"/>
                                <label for="input_15_1">Hourly plus commissions</label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" 
                                id="input_15_2" name="EmployeeHourly" value="Salaried" <?PHP if($EmployeeHourly == "Salaried") echo 'CHECKED';?> 
                                onclick="showHowPayExplain();"/>
                                <label for="input_15_2"> Salaried </label>	
                            </span>
                            <span class="clearfix"></span>
                            <span class="clearfix"></span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" 
                                id="input_15_3" name="EmployeeHourly" value="Salaried plus commissions" 
                                <?PHP if($EmployeeHourly == "Salaried plus commissions") echo 'CHECKED';?> 
                                onclick="showHowPayExplain();"/>
                                <label for="input_15_2"> Salaried plus commissions</label>
                                </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" 
                                id="input_15_4" name="EmployeeHourly" value="Other" <?PHP if($EmployeeHourly == "Other") echo 'CHECKED';?> 
                                onclick="showHowPayExplain();"/>
                                <label for="input_15_2">Other</label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_110" <?PHP if($EmployeeHourly == "Hourly") echo "style='display:block;'"; else echo "style='display:none;'";?>>
                    <label class="form-label-top" id="label_110" for="input_110"> If Hourly, what was your most recent hourly rate of pay? Please explain:  </label>
                </li>
                <li class="form-line" id="id_111"  <?PHP if($EmployeeHourly == "Hourly plus commissions") echo "style='display:block;'"; else echo "style='display:none;'";?>>
                    <label class="form-label-top" id="label_111" for="input_111">If Hourly plus commissions, please explain:</label>
                </li>
                <li class="form-line" id="id_112"  <?PHP if($EmployeeHourly == "Salaried") echo "style='display:block;'"; else echo "style='display:none;'";?>>
                    <label class="form-label-top" id="label_112" for="input_112">If Salaried, please explain:</label>
                </li>
                <li class="form-line" id="id_113"  <?PHP if($EmployeeHourly == "Salaried plus commissions") echo "style='display:block;'"; else echo "style='display:none;'";?>>
                    <label class="form-label-top" id="label_113" for="input_113"> If Salaried plus commissions, please explain:</label>
                </li>
                <li class="form-line" id="id_114"  <?PHP if($EmployeeHourly == "Other") echo "style='display:block;'"; else echo "style='display:none;'";?>>
                    <label class="form-label-top" id="label_114" for="input_114">If Other, please explain:</label>
                </li>
                <li class="form-line" id="id_301"  <?PHP if($EmployeeHourly == "Hourly" || $EmployeeHourly == "Hourly plus commissions" || 
                    $EmployeeHourly == "Salaried" || $EmployeeHourly == "Salaried plus commissions" || $EmployeeHourly == "Other") 
                    echo "style='display:block;'"; else echo "style='display:none;'";?>>
                    <div id="cid_301" class="form-input-wide">
                        <div class="form-textarea-limit">
                            <span>
                                <textarea id="input_301" class="form-textarea" name="PaidExplain" cols="70" rows="6" value="<?PHP echo $PaidExplain; ?>"><?PHP echo $PaidExplain; ?></textarea>
                                <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_301-limit">(Maximum characters: 1000)</span>
                                </div>
                            </span>
                        </div>
                    </div>
                </li>
        <li class="form-line" id="id_130">
        <label class="form-label-top" id="label_130" for="input_130">
          During your employment at Macy's, did you ever receive any commissions? <span class="form-required">*</span>
        </label>
        <div id="cid_130" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" 
          id="input_130_0" name="ReceiveCommission" value="Yes"   <?PHP if($ReceiveCommission == "Yes") echo 'CHECKED';?> onClick="showReceiveCommExplain();" />
              <label for="input_130_0">Yes</label></span>
              <span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" 
              id="input_130_1" name="ReceiveCommission" value="No" <?PHP if($ReceiveCommission == "No") echo 'CHECKED';?> onClick="showReceiveCommExplain();"/>
              <label for="input_130_1">No</label></span> 
          </div>
        </div>
      </li>
      <li class="form-line" id="id_131" <?PHP if($ReceiveCommission == "Yes"){echo "style='display:block'";} else {echo "style='display:none'";}?>>
        <label class="form-label-top" id="label_131" for="input_131">If Yes, please define commissions: </label>
          <div class="form-textarea-limit"><span><textarea id="input_131" class="form-textarea" name="ReceiveCommissionExplain" cols="70" rows="6" value="<?PHP echo $ReceiveCommissionExplain; ?>"><?PHP echo $ReceiveCommissionExplain; ?></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_131-limit">(Maximum characters: 1000)</span>
              </div></span>
          </div>
      </li>
     <li class="form-line" id="id_132">
        <label class="form-label-top" id="label_132" for="input_132">
          During your employment, did Macy's ever deduct a portion of your commissions from your paycheck? <span class="form-required">*</span>
        </label>
        <div id="cid_132" class="form-input-wide">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;">
          <input type="radio" class="form-radio validate[required]" id="input_132_0" name="DeductCommission" 
          value="Yes"  <?PHP if($DeductCommission == "Yes") echo 'CHECKED';?> onClick="showDeductCommExplain();" />
              <label for="input_132_0">Yes</label></span>
              <span class="clearfix"></span><span class="form-radio-item" style="clear:left;">
              <input type="radio" class="form-radio validate[required]" id="input_132_1" 
              name="DeductCommission" value="No" <?PHP if($DeductCommission == "No") echo 'CHECKED';?>  
              onclick="showDeductCommExplain();"/>
              <label for="input_132_1">No</label></span> 
          </div>
        </div>
      </li>
      <li class="form-line" id="id_133" <?PHP if($DeductCommission == "Yes"){echo "style='display:block'";} else {echo "style='display:none'";}?>>
        <label class="form-label-top" id="label_133" for="input_133">If Yes, how much? Was it a certain percentage of the commission? The whole commission? Did it always vary? Please explain:</label>
          <div class="form-textarea-limit"><span>
          <textarea id="input_133" class="form-textarea" name="DeductCommissionExplain" cols="70" rows="6" value="<?PHP echo $DeductCommissionExplain; ?>"><?PHP echo $DeductCommissionExplain; ?></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_133-limit">(Maximum characters: 1000)</span>
              </div></span>
          </div>
      </li>
      <li class="form-line" id="id_135" <?PHP if($DeductPayCheck == "Yes"){echo "style='display:block'";} else {echo "style='display:none'";}?>>
        <label class="form-label-top" id="label_135" for="input_135">If Yes, please explain: </label>
          <div class="form-textarea-limit"><span><textarea id="input_135" class="form-textarea" name="DeductPayCheckExplain" cols="70" rows="6" value="<?PHP echo $DeductPayCheckExplain; ?>"><?PHP echo $DeductPayCheckExplain; ?></textarea>
              <div class="form-textarea-limit-indicator"><span type="Letters" limit="1000" id="input_135-limit">(Maximum characters: 1000)</span>
              </div></span>
          </div>
      </li>
                <li class="form-line" id="id_22">
                    <label class="form-label-top" id="label_22" for="input_22">
                        Are you currently employed at Macy's?
                    </label>
                    <div id="cid_22" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_22_0" name="4CurrentlyEmployed" value="Yes" 
                                <?PHP if($CurrentlyEmployed  == "Yes") echo 'CHECKED';?> onClick="employed();"/>
                                <label for="input_22_0"> Yes </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_22_1" name="4CurrentlyEmployed" value="No" 
                                <?PHP if($CurrentlyEmployed  == "No") echo 'CHECKED';?> onClick="employed();"/>
                                <label for="input_22_1"> No </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_20">
                    <div id="cid_20" class="form-input-wide">
                        <div id="text_20" class="form-html">
                            <label class="form-label-top"> What are the dates of your most recent employment at Macy's?</label>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_19">
                    <label class="form-label-top" id="label_19" for="input_19">
                        Start date
                    </label>
                    <div id="cid_19" class="form-input-wide">
                        <span class="form-sub-label-container">
                            <select class="form-textbox" id="month_15" name="startdaymonth">
                                <option name="startdaymonth" value="" <?PHP if($startdaymonth == "") echo "selected";?>> </option>
                                <option name="startdaymonth" value="01" <?PHP if($startdaymonth == "01") echo "selected";?>> 01 </option>
                                <option name="startdaymonth" value="02" <?PHP if($startdaymonth == "02") echo "selected";?>> 02 </option>
                                <option name="startdaymonth" value="03" <?PHP if($startdaymonth == "03") echo "selected";?>> 03 </option>
                                <option name="startdaymonth" value="04" <?PHP if($startdaymonth == "04") echo "selected";?>> 04 </option>
                                <option name="startdaymonth" value="05" <?PHP if($startdaymonth == "05") echo "selected";?>> 05 </option>
                                <option name="startdaymonth" value="06" <?PHP if($startdaymonth == "06") echo "selected";?>> 06 </option>
                                <option name="startdaymonth" value="07" <?PHP if($startdaymonth == "07") echo "selected";?>> 07 </option>
                                <option name="startdaymonth" value="08" <?PHP if($startdaymonth == "08") echo "selected";?>> 08 </option>
                                <option name="startdaymonth" value="09" <?PHP if($startdaymonth == "09") echo "selected";?>> 09 </option>
                                <option name="startdaymonth" value="10" <?PHP if($startdaymonth == "10") echo "selected";?>> 10 </option>
                                <option name="startdaymonth" value="11" <?PHP if($startdaymonth == "11") echo "selected";?>> 11 </option>
                                <option name="startdaymonth" value="12" <?PHP if($startdaymonth == "12") echo "selected";?>> 12 </option>
                            </select>
                        <span class="date-separate">&nbsp;/</span>
                            <label class="form-sub-label" for="month_15" id="sublabel_month"> Month </label>
                        </span>
                        <span class="form-sub-label-container">
                            <select class="form-textbox" id="year_15" name="startdayyear">
                                <option name="startdayyear" value="" <?PHP if($startdayyear == "") echo "selected";?>> </option>
                                <option name="startdayyear" value="1980" <?PHP if($startdayyear == "1980") echo "selected";?>> 1980 </option>
                                <option name="startdayyear" value="1981" <?PHP if($startdayyear == "1981") echo "selected";?>> 1981 </option>
                                <option name="startdayyear" value="1982" <?PHP if($startdayyear == "1982") echo "selected";?>> 1982 </option>
                                <option name="startdayyear" value="1983" <?PHP if($startdayyear == "1983") echo "selected";?>> 1983 </option>
                                <option name="startdayyear" value="1984" <?PHP if($startdayyear == "1984") echo "selected";?>> 1984 </option>
                                <option name="startdayyear" value="1985" <?PHP if($startdayyear == "1985") echo "selected";?>> 1985 </option>
                                <option name="startdayyear" value="1986" <?PHP if($startdayyear == "1986") echo "selected";?>> 1986 </option>
                                <option name="startdayyear" value="1987" <?PHP if($startdayyear == "1987") echo "selected";?>> 1987 </option>
                                <option name="startdayyear" value="1988" <?PHP if($startdayyear == "1988") echo "selected";?>> 1988 </option>
                                <option name="startdayyear" value="1989" <?PHP if($startdayyear == "1989") echo "selected";?>> 1989 </option>
                                <option name="startdayyear" value="1990" <?PHP if($startdayyear == "1990") echo "selected";?>> 1990 </option>
                                <option name="startdayyear" value="1991" <?PHP if($startdayyear == "1991") echo "selected";?>> 1991 </option>
                                <option name="startdayyear" value="1992" <?PHP if($startdayyear == "1992") echo "selected";?>> 1992 </option>
                                <option name="startdayyear" value="1993" <?PHP if($startdayyear == "1993") echo "selected";?>> 1993 </option>
                                <option name="startdayyear" value="1994" <?PHP if($startdayyear == "1994") echo "selected";?>> 1994 </option>
                                <option name="startdayyear" value="1995" <?PHP if($startdayyear == "1995") echo "selected";?>> 1995 </option>
                                <option name="startdayyear" value="1996" <?PHP if($startdayyear == "1996") echo "selected";?>> 1996 </option>
                                <option name="startdayyear" value="1997" <?PHP if($startdayyear == "1997") echo "selected";?>> 1997 </option>
                                <option name="startdayyear" value="1998" <?PHP if($startdayyear == "1998") echo "selected";?>> 1998 </option>
                                <option name="startdayyear" value="1999" <?PHP if($startdayyear == "1999") echo "selected";?>> 1999 </option>
                                <option name="startdayyear" value="2000" <?PHP if($startdayyear == "2000") echo "selected";?>> 2000 </option>
                                <option name="startdayyear" value="2001" <?PHP if($startdayyear == "2001") echo "selected";?>> 2001 </option>
                                <option name="startdayyear" value="2002" <?PHP if($startdayyear == "2002") echo "selected";?>> 2002 </option>
                                <option name="startdayyear" value="2003" <?PHP if($startdayyear == "2003") echo "selected";?>> 2003 </option>
                                <option name="startdayyear" value="2004" <?PHP if($startdayyear == "2004") echo "selected";?>> 2004 </option>
                                <option name="startdayyear" value="2005" <?PHP if($startdayyear == "2005") echo "selected";?>> 2005 </option>
                                <option name="startdayyear" value="2006" <?PHP if($startdayyear == "2006") echo "selected";?>> 2006 </option>
                                <option name="startdayyear" value="2007" <?PHP if($startdayyear == "2007") echo "selected";?>> 2007 </option>
                                <option name="startdayyear" value="2008" <?PHP if($startdayyear == "2008") echo "selected";?>> 2008 </option>
                                <option name="startdayyear" value="2009" <?PHP if($startdayyear == "2009") echo "selected";?>> 2009 </option>
                                <option name="startdayyear" value="2010" <?PHP if($startdayyear == "2010") echo "selected";?>> 2010 </option>
                                <option name="startdayyear" value="2011" <?PHP if($startdayyear == "2011") echo "selected";?>> 2011 </option>
                                <option name="startdayyear" value="2012" <?PHP if($startdayyear == "2012") echo "selected";?>> 2012 </option>
                            </select>
                            <label class="form-sub-label" for="year_15" id="sublabel_year"> Year
                            </label>
                        </span>
                        <span class="form-sub-label-container">
                            <label class="form-sub-label" for="input_19_pick"> &nbsp;&nbsp;&nbsp; </label>
                        </span>
                    </div>
                </li>
                <li class="form-line" id="id_21" <?PHP if($CurrentlyEmployed  != "Yes") echo "style='display:block;'"; else echo "style='display:none;'";?>>
                    <label class="form-label-top" id="label_21" for="input_21">
                        End Date
                    </label>
                    <div id="cid_21" class="form-input-wide">
                        <span class="form-sub-label-container">
                            <select class="form-textbox" id="month_19" name="formerlastdaymonth">
                                <option name="formerlastdaymonth" value="" <?PHP if($formerlastdaymonth == "") echo "selected";?>> </option>
                                <option name="formerlastdaymonth" value="01" <?PHP if($formerlastdaymonth == "01") echo "selected";?>> 01 </option>
                                <option name="formerlastdaymonth" value="02" <?PHP if($formerlastdaymonth == "02") echo "selected";?>> 02 </option>
                                <option name="formerlastdaymonth" value="03" <?PHP if($formerlastdaymonth == "03") echo "selected";?>> 03 </option>
                                <option name="formerlastdaymonth" value="04" <?PHP if($formerlastdaymonth == "04") echo "selected";?>> 04 </option>
                                <option name="formerlastdaymonth" value="05" <?PHP if($formerlastdaymonth == "05") echo "selected";?>> 05 </option>
                                <option name="formerlastdaymonth" value="06" <?PHP if($formerlastdaymonth == "06") echo "selected";?>> 06 </option>
                                <option name="formerlastdaymonth" value="07" <?PHP if($formerlastdaymonth == "07") echo "selected";?>> 07 </option>
                                <option name="formerlastdaymonth" value="08" <?PHP if($formerlastdaymonth == "08") echo "selected";?>> 08 </option>
                                <option name="formerlastdaymonth" value="09" <?PHP if($formerlastdaymonth == "09") echo "selected";?>> 09 </option>
                                <option name="formerlastdaymonth" value="10" <?PHP if($formerlastdaymonth == "10") echo "selected";?>> 10 </option>
                                <option name="formerlastdaymonth" value="11" <?PHP if($formerlastdaymonth == "11") echo "selected";?>> 11 </option>
                                <option name="formerlastdaymonth" value="12" <?PHP if($formerlastdaymonth == "12") echo "selected";?>> 12 </option>
                            </select>
                        <span class="date-separate">&nbsp;/</span>
                        <label class="form-sub-label" for="month_19" id="sublabel_month"> Month
                        </label>
                        </span>
                        <span class="form-sub-label-container">
                            <select class="form-textbox" id="year_19" name="formerlastdayyear">
                                <option name="formerlastdayyear" value="" <?PHP if($formerlastdayyear == "") echo "selected";?>> </option>
                                <option name="formerlastdayyear" value="1980" <?PHP if($formerlastdayyear == "1980") echo "selected";?>> 1980 </option>
                                <option name="formerlastdayyear" value="1981" <?PHP if($formerlastdayyear == "1981") echo "selected";?>> 1981 </option>
                                <option name="formerlastdayyear" value="1982" <?PHP if($formerlastdayyear == "1982") echo "selected";?>> 1982 </option>
                                <option name="formerlastdayyear" value="1983" <?PHP if($formerlastdayyear == "1983") echo "selected";?>> 1983 </option>
                                <option name="formerlastdayyear" value="1984" <?PHP if($formerlastdayyear == "1984") echo "selected";?>> 1984 </option>
                                <option name="formerlastdayyear" value="1985" <?PHP if($formerlastdayyear == "1985") echo "selected";?>> 1985 </option>
                                <option name="formerlastdayyear" value="1986" <?PHP if($formerlastdayyear == "1986") echo "selected";?>> 1986 </option>
                                <option name="formerlastdayyear" value="1987" <?PHP if($formerlastdayyear == "1987") echo "selected";?>> 1987 </option>
                                <option name="formerlastdayyear" value="1988" <?PHP if($formerlastdayyear == "1988") echo "selected";?>> 1988 </option>
                                <option name="formerlastdayyear" value="1989" <?PHP if($formerlastdayyear == "1989") echo "selected";?>> 1989 </option>
                                <option name="formerlastdayyear" value="1990" <?PHP if($formerlastdayyear == "1990") echo "selected";?>> 1990 </option>
                                <option name="formerlastdayyear" value="1991" <?PHP if($formerlastdayyear == "1991") echo "selected";?>> 1991 </option>
                                <option name="formerlastdayyear" value="1992" <?PHP if($formerlastdayyear == "1992") echo "selected";?>> 1992 </option>
                                <option name="formerlastdayyear" value="1993" <?PHP if($formerlastdayyear == "1993") echo "selected";?>> 1993 </option>
                                <option name="formerlastdayyear" value="1994" <?PHP if($formerlastdayyear == "1994") echo "selected";?>> 1994 </option>
                                <option name="formerlastdayyear" value="1995" <?PHP if($formerlastdayyear == "1995") echo "selected";?>> 1995 </option>
                                <option name="formerlastdayyear" value="1996" <?PHP if($formerlastdayyear == "1996") echo "selected";?>> 1996 </option>
                                <option name="formerlastdayyear" value="1997" <?PHP if($formerlastdayyear == "1997") echo "selected";?>> 1997 </option>
                                <option name="formerlastdayyear" value="1998" <?PHP if($formerlastdayyear == "1998") echo "selected";?>> 1998 </option>
                                <option name="formerlastdayyear" value="1999" <?PHP if($formerlastdayyear == "1999") echo "selected";?>> 1999 </option>
                                <option name="formerlastdayyear" value="2000" <?PHP if($formerlastdayyear == "2000") echo "selected";?>> 2000 </option>
                                <option name="formerlastdayyear" value="2001" <?PHP if($formerlastdayyear == "2001") echo "selected";?>> 2001 </option>
                                <option name="formerlastdayyear" value="2002" <?PHP if($formerlastdayyear == "2002") echo "selected";?>> 2002 </option>
                                <option name="formerlastdayyear" value="2003" <?PHP if($formerlastdayyear == "2003") echo "selected";?>> 2003 </option>
                                <option name="formerlastdayyear" value="2004" <?PHP if($formerlastdayyear == "2004") echo "selected";?>> 2004 </option>
                                <option name="formerlastdayyear" value="2005" <?PHP if($formerlastdayyear == "2005") echo "selected";?>> 2005 </option>
                                <option name="formerlastdayyear" value="2006" <?PHP if($formerlastdayyear == "2006") echo "selected";?>> 2006 </option>
                                <option name="formerlastdayyear" value="2007" <?PHP if($formerlastdayyear == "2007") echo "selected";?>> 2007 </option>
                                <option name="formerlastdayyear" value="2008" <?PHP if($formerlastdayyear == "2008") echo "selected";?>> 2008 </option>
                                <option name="formerlastdayyear" value="2009" <?PHP if($formerlastdayyear == "2009") echo "selected";?>> 2009 </option>
                                <option name="formerlastdayyear" value="2010" <?PHP if($formerlastdayyear == "2010") echo "selected";?>> 2010 </option>
                                <option name="formerlastdayyear" value="2011" <?PHP if($formerlastdayyear == "2011") echo "selected";?>> 2011 </option>
                                <option name="formerlastdayyear" value="2012" <?PHP if($formerlastdayyear == "2012") echo "selected";?>> 2012 </option>
                            </select>
                            <label class="form-sub-label" for="year_19" id="sublabel_year"> Year </label>
                        </span>
                        <span class="form-sub-label-container">
                            <label class="form-sub-label" for="input_21_pick"> &nbsp;&nbsp;&nbsp; </label>
                        </span>
                    </div>
                </li>
                <li class="form-line" id="id_104">
                    <label class="form-label-top" id="label_104" for="input_104"> Please identify the names and contact information for any of your friends or co-workers who also worked at Macy's. </label>
                    <div id="cid_104" class="form-input-wide">
                        <div class="form-textarea-limit">
                            <span>
                                <textarea id="input_104" class="form-textarea" name="identifypeople" cols="40" rows="6" value="<?PHP echo $identifypeople; ?>"><?PHP echo $identifypeople; ?></textarea>
                                <div class="form-textarea-limit-indicator">
                                    <span type="Letters" limit="1000" id="input_202-limit">(Maximum characters: 1000)</span>
                                </div>
                            </span>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="form-section" id="session3" style="display:block;">
                <li id="cid_23" class="form-input-wide">
                    <div class="form-header-group">
                        <h2 id="header_23" class="form-header">Were you not able to take meal breaks?</h2>
                        <h3>Interview Section 3 of 9</h3>
                    </div>
                </li>
                <li class="form-line" id="id_24">
                    <div id="cid_24" class="form-input-wide">
                        <div id="text_24" class="form-html">            
                            <p>With certain exceptions, California law requires that: (1) employers provide hourly employees with at least a 30-minute <u>uninterrupted</u> meal break each day in which the employee works more than 5 hours; and (2) employers provide employees who work more than 10 hours in one day with two 30-minute <u>uninterrupted</u> meal breaks.<br/></p>
                            <p>For each workday that an employer fails to provide an employee with a required 30-minute <u>uninterrupted</u> meal break, the employee is entitled to recover an additional hour of pay at the employee's regular rate.</p>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_27">
                    <label class="form-label-top" id="label_27" for="input_27">
                        In your most recent position at Macy's, on average, how many hours was your typical shift?  
                    </label>
                    <div id="cid_27" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="hidden" name="Category1"/>
                                <input type="radio" class="form-radio validate[required]" id="input_27_0" name="4Category" 
                                <?PHP if($Category== "Less than 4 hours") echo 'CHECKED';?> value="Less than 4 hours" />
                                <label for="input_27_0"> Less than 4 hours </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_27_1" name="4Category" 
                                <?PHP if($Category== "Between 4 hours to 8 hours") echo 'CHECKED';?> value="Between 4 hours to 8 hours"  />
                                <label for="input_27_1"> Between 4 hours to 8 hours </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_27_2" name="4Category" 
                                <?PHP if($Category== "Between 8 hours to 10 hours") echo 'CHECKED';?> value="Between 8 hours to 10 hours" />
                                <label for="input_27_2">Between 8 hours to 10 hours </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_27_3" name="4Category" 
                                <?PHP if($Category== "More than 10 hours") echo 'CHECKED';?> value="More than 10 hours" />
                                <label for="input_27_3"> More than 10 hours</label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_28">
                    <label class="form-label-top" id="label_28" for="input_28">
                        Did you ever agree to waive your meal breaks in your most recent position at Macy's? In other words, did you ever agree to not take your meal breaks? 
                    </label>
                    <div id="cid_28" class="form-input-wide">
                        <div class="form-single-column">
                        <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_28_0" name="7Cat1MealBreakWaived"  
                                <?PHP if($Cat1MealBreakWaived== "Yes, always") echo 'CHECKED';?> value="Yes, always" />
                                <label for="input_28_0"> Yes, always</label>
                            </span>
                            <span class="clearfix"></span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_28_1" name="7Cat1MealBreakWaived" 
                                <?PHP if($Cat1MealBreakWaived== "Yes, sometimes") echo 'CHECKED';?> value="Yes, sometimes" />
                                <label for="input_28_1"> Yes, sometimes</label>
                            </span>
                            <span class="clearfix"></span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_28_2" name="7Cat1MealBreakWaived"  
                                <?PHP if($Cat1MealBreakWaived== "No, never") echo 'CHECKED';?> value="No, never"  />
                                <label for="input_28_2"> No, never </label>
                            </span>
                            <span class="clearfix"></span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_28_3" name="7Cat1MealBreakWaived"  
                                <?PHP if($Cat1MealBreakWaived== "I do not remember") echo 'CHECKED';?> value="I do not remember"/>
                                <label for="input_28_3"> I don't remember </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_29">
                    <label class="form-label-top" id="label_29" for="input_29">
                        In your most recent position at Macy's, were you ever NOT able to take at least a 30-minute <u>uninterrupted</u> meal break when you worked shifts of more than 5 hours? 
                    </label>
                    <div id="cid_29" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_29_0" name="7MealWhenWorkingBetween5and6hours" 
                                <?PHP if($MealWhenWorkingBetween5and6hours == "Yes") echo 'CHECKED';?>  value="Yes"/>
                                <label for="input_29_0"> Yes </label>
                            </span>
                            <span class="clearfix"></span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_29_1" name="7MealWhenWorkingBetween5and6hours" 
                                <?PHP if($MealWhenWorkingBetween5and6hours == "No") echo 'CHECKED';?>  value="No"/>
                                <label for="input_29_1"> No </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_30">
                    <label class="form-label-top" id="label_30" for="input_30">
                        In your most recent position at Macy's, how often were you NOT able to take an <u>uninterrupted</u> 30-minute meal break? (Check the one that best describes your situation.) 
                    </label>
                    <div id="cid_30" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_30_0" name="7MealBreakMissedCat1Freq"  
                                <?PHP if($MealBreakMissedCat1Freq== "Everyday") echo 'CHECKED';?>  value="Everyday" />
                                <label for="input_30_0"> Everyday </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_30_1" name="7MealBreakMissedCat1Freq"  
                                <?PHP if($MealBreakMissedCat1Freq== "Several times a week") echo 'CHECKED';?>  value="Several times a week" />
                                <label for="input_30_1"> Several times a week </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_30_2" name="7MealBreakMissedCat1Freq"  
                                <?PHP if($MealBreakMissedCat1Freq== "Once a week") echo 'CHECKED';?>  value="Once a week" />
                                <label for="input_30_2"> Once a week </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_30_3" name="7MealBreakMissedCat1Freq"  
                                <?PHP if($MealBreakMissedCat1Freq== "Once a month") echo 'CHECKED';?>  value="Once a month" />
                                <label for="input_30_3"> Once a month </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_30_4" name="7MealBreakMissedCat1Freq"
                                <?PHP if($MealBreakMissedCat1Freq== "Not applicable, I never missed a meal break.") echo 'CHECKED';?>
                                value="Not applicable, I never missed a meal break." />
                                <label for="input_30_4">Not applicable, I never missed a meal break.</label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_31">
                    <label class="form-label-top" id="label_31" for="input_31">
                        In your most recent position at Macy's, in general, why did you NOT take meal breaks?
                    </label>
                    <div id="cid_31" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_31_0" name="7MealBreakMissedCat1Why" 
                                <?PHP if($MealBreakMissedCat1Why== "Employer demands") echo 'CHECKED';?>  value="Employer demands"  onclick="whyMealBreakExplain();"/>
                                <label for="input_31_0">Employer demands (e.g., understaffed, not allowed by supervisor, too busy, too much work, helping customers, etc.) </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_31_1" name="7MealBreakMissedCat1Why" 
                                <?PHP if($MealBreakMissedCat1Why== "I did not want to take a meal break.") echo 'CHECKED';?>  value="I did not want to take a meal break." 
                                onclick="whyMealBreakExplain();" />
                                <label for="input_31_1"> I did not want to take a meal break. </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_31_2" name="7MealBreakMissedCat1Why" 
                                <?PHP if($MealBreakMissedCat1Why== "Other") echo 'CHECKED';?>  value="Other" 
                                onclick="whyMealBreakExplain();" />
                                <label for="input_31_2"> Other </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_31_3" name="7MealBreakMissedCat1Why" 
                                <?PHP if($MealBreakMissedCat1Why== "Not applicable, I never missed a meal break.") echo 'CHECKED';?> 
                                value="Not applicable, I never missed a meal break." onClick="whyMealBreakExplain();" />
                                <label for="input_31_3">Not applicable, I never missed a meal break.</label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_115" <?PHP if($MealBreakMissedCat1Why == "Employer demands") 
                    echo "style='display:block;'"; else echo "style='display:none;'";?>>
                    <label class="form-label-top" id="label_115" for="input_115"> If employer demands, please explain:</label>
                </li>
                <li class="form-line" id="id_116" <?PHP if($MealBreakMissedCat1Why == "I did not want to take a meal break") 
                    echo "style='display:block;'"; else echo "style='display:none;'";?>>
                    <label class="form-label-top" id="label_116" for="input_116"> If you did not want to take your meal breaks, please explain:</label>
                </li>
                <li class="form-line" id="id_117" <?PHP if($MealBreakMissedCat1Why == "Other") echo "style='display:block;'"; else 
                    echo "style='display:none;'";?>>
                    <label class="form-label-top" id="label_117" for="input_117"> If Other, please explain:</label>
                </li>
                <li class="form-line" id="id_302" <?PHP if($MealBreakMissedCat1Why == "Employer demands" 
                || $MealBreakMissedCat1Why == "I did not want to take a meal break" || $MealBreakMissedCat1Why == "Other") 
                echo "style='display:block;'"; else echo "style='display:none;'";?>>
                    <div id="cid_302" class="form-input-wide">
                        <div class="form-textarea-limit">
                            <span>
                                <textarea id="input_302" class="form-textarea" name="missMealBreakrExplain" cols="70" rows="6" value="<?PHP echo $missMealBreakrExplain; ?>"><?PHP echo $missMealBreakrExplain; ?></textarea>
                                <div class="form-textarea-limit-indicator">
                                    <span type="Letters" limit="1000" id="input_302-limit">(Maximum characters: 1000)</span>
                                </div>
                            </span>
                        </div>
                    </div>
                </li>        
                <li class="form-line" id="id_32">
                    <label class="form-label-top" id="label_32" for="input_32">
                        In your most recent position at Macy's, did you ever work shifts of more than 10 hours?
                    </label>
                    <div id="cid_32" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_32_0" name="7EverMoreThan10" 
                                <?PHP if($EverMoreThan10  == "Yes") echo 'CHECKED';?> value="Yes" />
                                <label for="input_32_0"> Yes </label>
                            </span>
                            <span class="clearfix"></span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_32_1" name="7EverMoreThan10" 
                                <?PHP if($EverMoreThan10  == "No") echo 'CHECKED';?> value="No"/>
                                <label for="input_32_1"> No </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_33">
                    <label class="form-label-top" id="label_33" for="input_33">
                    In your most recent position at Macy's, were you ever NOT able to take 2 <u>uninterrupted</u> 30-minute meal breaks when you worked shifts of more than 10 hours? 
                    </label>
                    <div id="cid_33" class="form-input-wide">
                        <div class="form-single-column">
                        <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_33_0" name="7Cat3DidGetSecondMealBreak" 
                                <?PHP if($Cat3DidGetSecondMealBreak == "Yes, always") echo 'CHECKED';?> value="Yes, always" />
                                <label for="input_33_0"> Yes, always </label>
                            </span>
                            <span class="clearfix"></span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_33_1" name="7Cat3DidGetSecondMealBreak" 
                                <?PHP if($Cat3DidGetSecondMealBreak == "Sometimes") echo 'CHECKED';?> value="Sometimes" />
                                <label for="input_33_1"> Sometimes </label>
                            </span>
                            <span class="clearfix"></span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_33_2" name="7Cat3DidGetSecondMealBreak" 
                                <?PHP if($Cat3DidGetSecondMealBreak == "No") echo 'CHECKED';?> value="No" />
                                <label for="input_33_2"> No </label>
                            </span>
                            <span class="clearfix"></span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_33_3" name="7Cat3DidGetSecondMealBreak" 
                                <?PHP if($Cat3DidGetSecondMealBreak == "I do not remember") echo 'CHECKED';?> value="I do not remember" />
                                <label for="input_33_3"> I don't remember </label>
                            </span>
                            <span class="clearfix"></span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_33_4" name="7Cat3DidGetSecondMealBreak"
                                <?PHP if($Cat3DidGetSecondMealBreak == "Not applicable, I never worked a shift that was 10 hours or longer in one day.") echo 'CHECKED';?> 
                                value="Not applicable, I never worked a shift that was 10 hours or longer in one day." />
                                <label for="input_33_4">Not applicable, I never worked a shift that was 10 hours or longer in one day.</label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_34">
                    <label class="form-label-top" id="label_34" for="input_34">
                        How often were you NOT able to take both of your 30-minute meal breaks when you worked more than 10 hours in a day? 
                    </label>
                    <div id="cid_34" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_34_0" name="7Cat3Missed2ndMealBreakOften" 
                                <?PHP if($Cat3Missed2ndMealBreakOften == "Everyday") echo 'CHECKED';?> value="Everyday" />
                                <label for="input_34_0"> Everyday </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_34_1" name="7Cat3Missed2ndMealBreakOften" 
                                <?PHP if($Cat3Missed2ndMealBreakOften == "Several times a week") echo 'CHECKED';?> value="Several times a week" />
                                <label for="input_34_1"> Several times a week </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">	
                                <input type="radio" class="form-radio validate[required]" id="input_34_2" name="7Cat3Missed2ndMealBreakOften" 
                                <?PHP if($Cat3Missed2ndMealBreakOften == "Once a week") echo 'CHECKED';?> value="Once a week" />
                                <label for="input_34_2"> Once a week </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_34_3" name="7Cat3Missed2ndMealBreakOften" 
                                <?PHP if($Cat3Missed2ndMealBreakOften == "Once a month") echo 'CHECKED';?> value="Once a month" />
                                <label for="input_34_3"> Once a month </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_34_4" name="7Cat3Missed2ndMealBreakOften"  
                                <?PHP if($Cat3Missed2ndMealBreakOften == "Not applicable") echo 'CHECKED';?>  value="Not applicable" />
                                <label for="input_34_4">Not applicable</label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_35">
                    <label class="form-label-top" id="label_35" for="input_35">
                    Did you receive an additional hour of pay on those occasions you were NOT able to take an <u>uninterrupted</u> 30-minute meal break?
                    </label>
                    <div id="cid_35" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_35_0" name="7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay" 
                                <?PHP if($Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay == "Always") echo 'CHECKED';?> value="Always" />
                                <label for="input_35_0"> Always </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_35_1" name="7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay" 
                                <?PHP if($Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay == "Usually") echo 'CHECKED';?> value="Usually" />
                                <label for="input_35_1"> Usually </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">             
                                <input type="radio" class="form-radio validate[required]" id="input_35_2" name="7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay" 
                                <?PHP if($Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay == "Never") echo 'CHECKED';?> value="Never" />
                                <label for="input_35_2">  Never </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_35_3" name="7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay" 
                                <?PHP if($Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay == "I do not remember") echo 'CHECKED';?> value="I do not remember" />
                                <label for="input_35_3"> I don't remember </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_35_4" name="7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay" 
                                <?PHP if($Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay == "Not applicable, I never missed a meal break.") 
                                echo 'CHECKED';?> value="Not applicable, I never missed a meal break." />
                                <label for="input_35_4">Not applicable, I never missed a meal break.</label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_36">
                    <label class="form-label-top" id="label_36" for="input_36">If you would like, please explain any of your answers:</label>
                    <div id="cid_36" class="form-input-wide">
                        <div class="form-textarea-limit">
                            <span>
                                <textarea id="input_36" class="form-textarea" name="session3Explain" cols="70" rows="6" value="<?PHP echo $session3Explain;?>"><?PHP echo $session3Explain;?></textarea>
                                <div class="form-textarea-limit-indicator">
                                <span type="Letters" limit="1000" id="input_36-limit">(Maximum characters: 1000)</span>
                                </div>
                            </span>
                        </div>
                    </div>
                </li> 
            </ul>
            <ul class="form-section" id="session4" style="display:block;">
                <li id="cid_36" class="form-input-wide">
                    <div class="form-header-group">
                        <h2 id="header_36" class="form-header">Were you not able to take rest breaks?</h2>
                        <h3>Interview Section 4 of 9</h3>
                    </div>
                </li>
                <li class="form-line" id="id_38">
                    <div id="cid_38" class="form-input-wide">
                        <div id="text_38" class="form-html">
                            <p>With certain exceptions, California law also requires that employers allow employees to take at least a 10-minute <u>uninterrupted</u> rest break for every 4 hours worked. For each day an employer prevents, stops, or interrupts a required 10-minute rest break, the employee is entitled to recover an additional hour of pay at the employee's regular rate of pay.</p>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_39">
                    <label class="form-label-top" id="label_39" for="input_39">
                        In your most recent position at Macy's, were you ever NOT able to take at least a 10-minute <u>uninterrupted</u> rest break for every 4 hours worked in a day? 
                    </label>
                    <div id="cid_39" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;"><input type="hidden" name="RestEverMissed1"/>
                                <input type="radio" class="form-radio validate[required]" id="input_39_0" name="8RestEverMissed" value="Yes" 
                                <?PHP if($RestEverMissed== "Yes") echo 'CHECKED';?>/>
                                <label for="input_39_0"> Yes </label>
                            </span>
                            <span class="clearfix"></span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_39_1" name="8RestEverMissed" value="No" 
                                <?PHP if($RestEverMissed== "No") echo 'CHECKED';?>/>
                                <label for="input_39_1"> No </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_40">
                    <label class="form-label-top" id="label_40" for="input_40">
                        In your most recent position at Macy's, how often were you NOT able to take at least a 10-minute <u>uninterrupted</u> rest break after working 4 hours?
                    </label>
                    <div id="cid_40" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_40_0" name="8HowOftenMissRest" 
                                <?PHP if($HowOftenMissRest == "Everyday") echo 'CHECKED';?> value="Everyday" />
                                <label for="input_40_0"> Everyday </label>
                            </span>
                            <span class="clearfix"></span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_40_1" name="8HowOftenMissRest" 
                                <?PHP if($HowOftenMissRest == "Several times a week") echo 'CHECKED';?> value="Several times a week" />
                                <label for="input_40_1"> Several times a week </label>
                            </span>
                            <span class="clearfix"></span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_40_2" name="8HowOftenMissRest" 
                                <?PHP if($HowOftenMissRest == "Once a week") echo 'CHECKED';?> value="Once a week" />
                                <label for="input_40_2"> Once a week </label>
                            </span>
                            <span class="clearfix"></span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_40_3" name="8HowOftenMissRest" 
                                <?PHP if($HowOftenMissRest == "Once a month") echo 'CHECKED';?> value="Once a month" />
                                <label for="input_40_3"> Once a month </label>
                            </span>
                            <span class="clearfix"></span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_40_4" name="8HowOftenMissRest" 
                                <?PHP if($HowOftenMissRest == "Not applicable, I never missed a rest break.") echo 'CHECKED';?> 
                                value="Not applicable, I never missed a rest break." />
                                <label for="input_40_4">Not applicable, I never missed a rest break.</label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_41">
                    <label class="form-label-top" id="label_41" for="input_41">
                        In your most recent position at Macy's, why would you miss your rest breaks?
                    </label>
                    <div id="cid_41" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_41_0" name="8WhyMiss10MinRest" 
                                <?PHP if($WhyMiss10MinRest == "Employer demands") echo 'CHECKED';?> value="Employer demands" 
                                onclick="whyRestBreakExplain();" />
                                <label for="input_41_0">Employer demands (e.g., understaffed, not allowed by supervisor, too busy, too much work, helping customers, etc.) </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_41_1" name="8WhyMiss10MinRest" 
                                <?PHP if($WhyMiss10MinRest == "I did not want to take a rest break.") echo 'CHECKED';?> value="I did not want to take a rest break." 
                                onclick="whyRestBreakExplain();" />
                                <label for="input_41_1"> I did not want to take a rest break. </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_41_2" name="8WhyMiss10MinRest" 
                                <?PHP if($WhyMiss10MinRest == "Other") echo 'CHECKED';?> value="Other"  onclick="whyRestBreakExplain();"/>
                                <label for="input_41_2"> Other </label>
                            </span>
                            <span class="clearfix"></span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_41_3" name="8WhyMiss10MinRest" 
                                <?PHP if($WhyMiss10MinRest == "Not applicable, I never missed a rest break.") echo 'CHECKED';?> 
                                value="Not applicable, I never missed a rest break." onClick="whyRestBreakExplain();" />
                                <label for="input_41_3">Not applicable, I never missed a rest break.</label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_118" <?PHP if($WhyMiss10MinRest == "Employer demands") echo "style='display:block;'"; else echo "style='display:none;'";?>>
                    <label class="form-label-top" id="label_118" for="input_118"> If employer demands, please explain:</label>
                </li>
                <li class="form-line" id="id_119" <?PHP if($WhyMiss10MinRest == "I did not want to take a rest break.") echo "style='display:block;'"; else echo "style='display:none;'";?>>
                    <label class="form-label-top" id="label_119" for="input_119">If you did not want to take your rest breaks, please explain:</label>
                </li>
                <li class="form-line" id="id_120" <?PHP if($WhyMiss10MinRest == "Other") echo "style='display:block;'"; else echo "style='display:none;'";?>>
                    <label class="form-label-top" id="label_120" for="input_120">If Other, please explain :</label>
                </li>
                <li class="form-line" id="id_303" <?PHP if($WhyMiss10MinRest == "Employer demands" || $WhyMiss10MinRest == "I did not want to take a rest break." 
                || $WhyMiss10MinRest == "Other") echo "style='display:block;'"; else echo "style='display:none;'";?>>
                    <div id="cid_303" class="form-input-wide">
                        <div class="form-textarea-limit">
                            <span>
                                <textarea id="input_303" class="form-textarea" name="missRestBreakExplain" cols="70" rows="6" value="<?PHP echo $missRestBreakExplain;?>"><?PHP echo $missRestBreakExplain;?></textarea>
                                <div class="form-textarea-limit-indicator">
                                    <span type="Letters" limit="1000" id="input_303-limit">(Maximum characters: 1000)</span>
                                </div>
                            </span>
                        </div>
                    </div>
                </li>        
                <li class="form-line" id="id_42">
                    <label class="form-label-top" id="label_42" for="input_42">
                        If you were ever NOT able to take a 10-minute <u>uninterrupted</u> rest break, were you paid an additional hour of pay on each occasion that this occurred?
                    </label>
                    <div id="cid_42" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_42_0" name="8ExtraHourPay" 
                                <?PHP if($ExtraHourPay == "Yes, always") echo 'CHECKED';?> value="Yes, always" />
                                <label for="input_42_0"> Yes, always </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_42_1" name="8ExtraHourPay" 
                                <?PHP if($ExtraHourPay == "Sometimes") echo 'CHECKED';?> value="Sometimes" />
                                <label for="input_42_1"> Sometimes </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_42_2" name="8ExtraHourPay" 
                                <?PHP if($ExtraHourPay == "No") echo 'CHECKED';?> value="No" />
                                <label for="input_42_2"> No </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_42_3" name="8ExtraHourPay" 
                                <?PHP if($ExtraHourPay == "I do not remember") echo 'CHECKED';?> value="I do not remember" />
                                <label for="input_42_3"> I don't remember </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_42_4" name="8ExtraHourPay" 
                                <?PHP if($ExtraHourPay == "Not applicable, I never missed a rest break.") echo 'CHECKED';?> 
                                value="Not applicable, I never missed a rest break." />
                                <label for="input_42_4">Not applicable, I never missed a rest break.</label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_203">
                    <label class="form-label-top" id="label_203" for="input_203">If you would like, please explain any of your answers:</label>
                    <div id="cid_203" class="form-input-wide">
                        <div class="form-textarea-limit">
                            <span>
                                <textarea id="input_203" class="form-textarea" name="session4Explain" cols="70" rows="6" value=<?PHP echo $session4Explain;?>><?PHP echo $session4Explain;?></textarea>
                                <div class="form-textarea-limit-indicator">
                                    <span type="Letters" limit="1000" id="input_203-limit">(Maximum characters: 1000)</span>
                                </div>
                            </span>
                        </div>
                    </div>
                </li> 
            </ul>
            <ul class="form-section" id="session5" style="display:block;">
                <li id="cid_43" class="form-input-wide">
                    <div class="form-header-group">
                        <h2 id="header_43" class="form-header">Were you compensated for off the clock work and overtime?</h2>
                        <h3>Interview Section 5 of 9</h3>
                    </div>
                </li>
                <li class="form-line" id="id_43">
                    <div id="cid_43_0" class="form-input-wide">
                        <div id="text_43" class="form-html">
                            <p>Under California law, employers are required to pay employees at least the current minimum wage for all hours worked. If employees are required to perform work-related tasks either before clocking-in or after clocking-out, the employee is entitled to compensation for such off the clock work. In addition, if an employee works more than 8 hours in a single day or more than 40 hours in a week, the employee is entitled to 1 &frac12; times their regular hourly rate for those hours worked after 8 hours in a single day and/or 40 hours in a week. If an employee works more than 12 hours in a single day, the employee is entitled to double-time pay for those hours worked after 12 hours.</p>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_44">
                    <label class="form-label-top" id="label_44" for="input_44">
                        In your most recent position at Macy's, when you were leaving the store for a meal break or at the end of your shift, were you required to have your personal bag checked before you could leave? 
                    </label>
                    <div id="cid_44" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;"><input type="hidden" name="BagsChecksYesNo1"/>
                                <input type="radio" class="form-radio validate[required]" id="input_44_0" name="9BagsChecksYesNo"		
                                <?PHP if($BagsChecksYesNo == "Yes, and I was off the clock (not paid) during the bag check.") echo 'CHECKED';?>
                                value="Yes, and I was off the clock (not paid) during the bag check." />
                                <label for="input_44_0"> Yes, and I was off the clock (not paid) during the bag check.</label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_44_1" name="9BagsChecksYesNo" 
                                <?PHP if($BagsChecksYesNo == "Yes, and I was on the clock (paid) during the bag check.") echo 'CHECKED';?>
                                value="Yes, and I was on the clock (paid) during the bag check." />
                                <label for="input_44_1"> Yes, and I was on the clock (paid) during the bag check. </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_44_2" name="9BagsChecksYesNo" 
                                <?PHP if($BagsChecksYesNo == "No") echo 'CHECKED';?> value="No" />
                                <label for="input_44_2"> No </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_45">
                    <label class="form-label-top" id="label_45" for="input_45">
                        How often was your bag checked?
                    </label>
                    <div id="cid_45" class="form-input-wide">
                        <div class="form-single-column">
                        <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_45_0" name="9BagsCheckedEverytimeLeaving"
                                <?PHP if($BagsCheckedEverytimeLeaving== "Every shift") echo 'CHECKED';?> value="Every shift" />
                                <label for="input_45_0"> Every shift </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_45_1" name="9BagsCheckedEverytimeLeaving" 
                                <?PHP if($BagsCheckedEverytimeLeaving== "Several times a week") echo 'CHECKED';?> value="Several times a week" />
                                <label for="input_45_1"> Several times a week </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_45_2" name="9BagsCheckedEverytimeLeaving" 
                                <?PHP if($BagsCheckedEverytimeLeaving== "Once a week") echo 'CHECKED';?> value="Once a week" />
                                <label for="input_45_2"> Once a week </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_45_3" name="9BagsCheckedEverytimeLeaving" 
                                <?PHP if($BagsCheckedEverytimeLeaving== "Once a month") echo 'CHECKED';?> value="Once a month" />
                                <label for="input_45_3"> Once a month </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_45_4" name="9BagsCheckedEverytimeLeaving"
                                <?PHP if($BagsCheckedEverytimeLeaving== "Not applicable, I never had my bags checked.") echo 'CHECKED';?> 
                                value="Not applicable, I never had my bags checked." />
                                <label for="input_45_4">Not applicable, I never had my bags checked.</label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_46">
                    <label class="form-label-top" id="label_46" for="input_46">
                        Did you have to wait for your co-workers to have their belongings checked before you could leave?
                    </label>
                    <div id="cid_46" class="form-input-wide">
                        <div class="form-single-column">
                        <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_46_0" name="9BagsCheckedWait" 
                                <?PHP if($BagsCheckedWait == "Yes") echo 'CHECKED';?> value="Yes" onClick="waitCoWorkers()"/>
                                <label for="input_46_0"> Yes </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_46_1" name="9BagsCheckedWait" 
                                <?PHP if($BagsCheckedWait == "No") echo 'CHECKED';?> value="No" onClick="waitCoWorkers()" />
                                <label for="input_46_1"> No </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_46_2" name="9BagsCheckedWait" 
                                <?PHP if($BagsCheckedWait == "Not applicable, I never had my bags checked.") echo 'CHECKED';?>
                                value="Not applicable, I never had my bags checked." onClick="waitCoWorkers()" />
                                <label for="input_46_2">Not applicable, I never had my bags checked.</label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_47">
                    <label class="form-label-top" id="label_47" for="input_47">
                        In general, approximately how long would you have to wait to complete the entire bag check process before you could leave the store? 
                    </label>
                    <div id="cid_47" class="form-input-wide">
                        <span class="form-sub-label-container">
                            <select class="form-textbox" id="hour_109" name="bagCheckWaitHour">
                                <option value="00" <?PHP if($bagCheckWaitHour == "00") echo "selected";?>> 00 </option> 
                                <option value="01" <?PHP if($bagCheckWaitHour == "01") echo "selected";?>> 01 </option>
                                <option value="02" <?PHP if($bagCheckWaitHour == "02") echo "selected";?>> 02 </option>
                                <option value="03" <?PHP if($bagCheckWaitHour == "03") echo "selected";?>> 03 </option>
                                <option value="04" <?PHP if($bagCheckWaitHour == "04") echo "selected";?>> 04 </option>
                                <option value="05" <?PHP if($bagCheckWaitHour == "05") echo "selected";?>> 05 </option>
                                <option value="06" <?PHP if($bagCheckWaitHour == "06") echo "selected";?>> 06 </option>
                                <option value="07" <?PHP if($bagCheckWaitHour == "07") echo "selected";?>> 07 </option>
                                <option value="08" <?PHP if($bagCheckWaitHour == "08") echo "selected";?>> 08 </option>
                                <option value="09" <?PHP if($bagCheckWaitHour == "09") echo "selected";?>> 09 </option>
                                <option value="10" <?PHP if($bagCheckWaitHour == "10") echo "selected";?>> 10 </option>
                                <option value="11" <?PHP if($bagCheckWaitHour == "11") echo "selected";?>> 11 </option>
                                <option value="12" <?PHP if($bagCheckWaitHour == "12") echo "selected";?>> 12 </option>
                                <option value="13" <?PHP if($bagCheckWaitHour == "13") echo "selected";?>> 13 </option>
                                <option value="14" <?PHP if($bagCheckWaitHour == "14") echo "selected";?>> 14 </option>
                                <option value="15" <?PHP if($bagCheckWaitHour == "15") echo "selected";?>> 15 </option>
                                <option value="16" <?PHP if($bagCheckWaitHour == "16") echo "selected";?>> 16 </option>
                                <option value="17" <?PHP if($bagCheckWaitHour == "17") echo "selected";?>> 17 </option>
                                <option value="18" <?PHP if($bagCheckWaitHour == "18") echo "selected";?>> 18 </option>
                                <option value="19" <?PHP if($bagCheckWaitHour == "19") echo "selected";?>> 19 </option>        
                                <option value="20" <?PHP if($bagCheckWaitHour == "20") echo "selected";?>> 20 </option> 
                                <option value="21" <?PHP if($bagCheckWaitHour == "21") echo "selected";?>> 21 </option>
                                <option value="22" <?PHP if($bagCheckWaitHour == "22") echo "selected";?>> 22 </option>
                                <option value="23" <?PHP if($bagCheckWaitHour == "23") echo "selected";?>> 23 </option>
                            </select><label class="form-sub-label" for="hour_109" id="sublabel_bagCheckWaitHour">Hour</label>       
                        </span>
                        <span class="date-separate">&nbsp;</span>
                        <span class="form-sub-label-container">
                            <select class="form-textbox" id="minute_109" name="bagCheckWaitMinute"> 
                                <option  value="00" <?PHP if($bagCheckWaitMinute  == "00") echo "selected";?>>00</option>      
                                <option  value="05" <?PHP if($bagCheckWaitMinute  == "05") echo "selected";?>>05</option>
                                <option  value="10" <?PHP if($bagCheckWaitMinute  == "10") echo "selected";?>>10</option> 
                                <option  value="15" <?PHP if($bagCheckWaitMinute  == "15") echo "selected";?>>15</option>
                                <option  value="20" <?PHP if($bagCheckWaitMinute  == "20") echo "selected";?>>20</option> 
                                <option  value="25" <?PHP if($bagCheckWaitMinute  == "25") echo "selected";?>>25</option>
                                <option  value="30" <?PHP if($bagCheckWaitMinute  == "30") echo "selected";?>>30</option>
                                <option  value="35" <?PHP if($bagCheckWaitMinute  == "35") echo "selected";?>>35</option>
                                <option  value="40" <?PHP if($bagCheckWaitMinute  == "40") echo "selected";?>>40</option>
                                <option  value="45" <?PHP if($bagCheckWaitMinute  == "45") echo "selected";?>>45</option>
                                <option  value="50" <?PHP if($bagCheckWaitMinute  == "50") echo "selected";?>>50</option> 
                                <option  value="55" <?PHP if($bagCheckWaitMinute  == "55") echo "selected";?>>55</option>    
                            </select>
                            <label class="form-sub-label" for="minute_109" id="sublabel_bagCheckWaitMinute">Minute</label>
                        </span>
                    </div>
                </li>
                <li class="form-line" id="id_51">
                    <label class="form-label-top" id="label_51" for="input_51">
                        In your most recent position at Macy's, did you ever work the closing shift?
                    </label>
                    <div id="cid_51" class="form-input-wide">
                        <div class="form-single-column">
                        <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_51_0" name="10EverWorkClosingShift" 
                                <?PHP if($EverWorkClosingShift == "Yes") echo 'CHECKED';?> value="Yes"/>
                                <label for="input_51_0"> Yes </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_51_1" name="10EverWorkClosingShift" 
                                <?PHP if($EverWorkClosingShift == "No") echo 'CHECKED';?> value="No" />
                                <label for="input_51_1"> No </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_52">
                    <label class="form-label-top" id="label_52" for="input_52">
                        If you worked the closing shift, did you ever have to wait to leave the store after you clocked out?
                    </label>
                    <div id="cid_52" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_52_0" name="9BagsCheckedEverytimeWaitToLeaving" 
                                <?PHP if($BagsCheckedEverytimeWaitToLeaving == "Yes, I had to wait for my co-workers before I could leave.") echo 'CHECKED';?>
                                value="Yes, I had to wait for my co-workers before I could leave." onClick="waitToLeave();"/>
                                <label for="input_52_0">Yes, I had to wait for my co-workers before I could leave.</label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_52_1" name="9BagsCheckedEverytimeWaitToLeaving" 
                                <?PHP if($BagsCheckedEverytimeWaitToLeaving == "Yes, I had to wait for a manager or supervisor to let me out of the store.") echo 'CHECKED';?>
                                value="Yes, I had to wait for a manager or supervisor to let me out of the store." onClick="waitToLeave();"/>
                                <label for="input_52_1"> Yes, I had to wait for a manager or supervisor to let me out of the store.</label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_52_2" name="9BagsCheckedEverytimeWaitToLeaving" 
                                <?PHP if($BagsCheckedEverytimeWaitToLeaving == "Both") echo 'CHECKED';?> value="Both" onClick="waitToLeave();" />
                                <label for="input_52_2">Both </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_52_3" name="9BagsCheckedEverytimeWaitToLeaving" 
                                <?PHP if($BagsCheckedEverytimeWaitToLeaving == "No") echo 'CHECKED';?> value="No" onClick="waitToLeave();"/>
                                <label for="input_52_3">No </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_52_4" name="9BagsCheckedEverytimeWaitToLeaving" 
                                <?PHP if($BagsCheckedEverytimeWaitToLeaving == "Not applicable, I never worked the closing shift.") echo 'CHECKED';?> 
                                value="Not applicable, I never worked the closing shift." onClick="waitToLeave();"/>
                                <label for="input_52_4">Not applicable, I never worked the closing shift.</label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                        </div>
                    </div>
                </li>                 
                <li class="form-line" id="id_109">
                    <label class="form-label-top" id="label_109" for="input_109">
                        In general, approximately how long would you have to wait? 
                    </label>
                    <div id="cid_109" class="form-input-wide">
                        <span class="form-sub-label-container">        
                            <select class="form-textbox" id="hour_110" name="generalWaitHour">  
                                <option value="00" <?PHP if($generalWaitHour == "00") echo "selected";?>> 00 </option> 
                                <option value="01" <?PHP if($generalWaitHour == "01") echo "selected";?>> 01 </option>
                                <option value="02" <?PHP if($generalWaitHour == "02") echo "selected";?>> 02 </option>
                                <option value="03" <?PHP if($generalWaitHour == "03") echo "selected";?>> 03 </option>
                                <option value="04" <?PHP if($generalWaitHour == "04") echo "selected";?>> 04 </option>
                                <option value="05" <?PHP if($generalWaitHour == "05") echo "selected";?>> 05 </option>
                                <option value="06" <?PHP if($generalWaitHour == "06") echo "selected";?>> 06 </option>
                                <option value="07" <?PHP if($generalWaitHour == "07") echo "selected";?>> 07 </option>
                                <option value="08" <?PHP if($generalWaitHour == "08") echo "selected";?>> 08 </option>
                                <option value="09" <?PHP if($generalWaitHour == "09") echo "selected";?>> 09 </option>
                                <option value="10" <?PHP if($generalWaitHour == "10") echo "selected";?>> 10 </option>
                                <option value="11" <?PHP if($generalWaitHour == "11") echo "selected";?>> 11 </option>
                                <option value="12" <?PHP if($generalWaitHour == "12") echo "selected";?>> 12 </option>
                                <option value="13" <?PHP if($generalWaitHour == "13") echo "selected";?>> 13 </option>
                                <option value="14" <?PHP if($generalWaitHour == "14") echo "selected";?>> 14 </option>
                                <option value="15" <?PHP if($generalWaitHour == "15") echo "selected";?>> 15 </option>
                                <option value="16" <?PHP if($generalWaitHour == "16") echo "selected";?>> 16 </option>
                                <option value="17" <?PHP if($generalWaitHour == "17") echo "selected";?>> 17 </option>
                                <option value="18" <?PHP if($generalWaitHour == "18") echo "selected";?>> 18 </option>
                                <option value="19" <?PHP if($generalWaitHour == "19") echo "selected";?>> 19 </option>        
                                <option value="20" <?PHP if($generalWaitHour == "20") echo "selected";?>> 20 </option> 
                                <option value="21" <?PHP if($generalWaitHour == "21") echo "selected";?>> 21 </option>
                                <option value="22" <?PHP if($generalWaitHour == "22") echo "selected";?>> 22 </option>
                                <option value="23" <?PHP if($generalWaitHour == "23") echo "selected";?>> 23 </option>
                            </select>
                            <label class="form-sub-label" for="hour_110" id="sublabel_generalWaitHour">Hour</label>
                        </span>
                        <span class="date-separate">&nbsp;</span>
                        <span class="form-sub-label-container">
                            <select class="form-textbox" id="minute_110" name="generalWaitMinute">       
                                <option  value="00" <?PHP if($generalWaitMinute  == "00") echo "selected";?>>00</option>      
                                <option  value="05" <?PHP if($generalWaitMinute  == "05") echo "selected";?>>05</option>
                                <option  value="10" <?PHP if($generalWaitMinute  == "10") echo "selected";?>>10</option> 
                                <option  value="15" <?PHP if($generalWaitMinute  == "15") echo "selected";?>>15</option>
                                <option  value="20" <?PHP if($generalWaitMinute  == "20") echo "selected";?>>20</option> 
                                <option  value="25" <?PHP if($generalWaitMinute  == "25") echo "selected";?>>25</option>
                                <option  value="30" <?PHP if($generalWaitMinute  == "30") echo "selected";?>>30</option>
                                <option  value="35" <?PHP if($generalWaitMinute  == "35") echo "selected";?>>35</option>
                                <option  value="40" <?PHP if($generalWaitMinute  == "40") echo "selected";?>>40</option>
                                <option  value="45" <?PHP if($generalWaitMinute  == "45") echo "selected";?>>45</option>
                                <option  value="50" <?PHP if($generalWaitMinute  == "50") echo "selected";?>>50</option> 
                                <option  value="55" <?PHP if($generalWaitMinute  == "55") echo "selected";?>>55</option>    
                            </select>
                            <label class="form-sub-label" for="minute_110" id="sublabel_generalWaitMinute">Minute</label>       
                        </span>
                    </div>
                </li>
                <li class="form-line" id="id_93">
                    <label class="form-label-top" id="label_93" for="input_93">
                        In your most recent position at Macy's, did you ever perform work-related tasks before clocking-in or after clocking-out for which you believe you were not paid?
                    </label>
                    <div id="cid_93" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_93_0" name="workOutClock" 
                                <?PHP if($workOutClock == "Yes") echo 'CHECKED';?> value="Yes" onClick="outClockExplain();" />
                                <label for="input_93_0"> Yes </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_93_1" name="workOutClock" 
                                <?PHP if($workOutClock == "No") echo 'CHECKED';?> value="No" onClick="outClockExplain();"/>
                                <label for="input_93_1"> No </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_121" <?PHP if($workOutClock == "Yes") echo "style='display:block;'"; else echo "style='display:none;'";?>>
                <label class="form-label-top" id="label_121" for="input_121">If Yes, please explain:</label>
                    <div id="cid_121" class="form-input-wide">
                        <div class="form-textarea-limit">
                            <span>
                                <textarea id="input_121" class="form-textarea" name="afterBeforeClockExplain" cols="70" rows="6" value ="<?PHP echo $afterBeforeClockExplain;?>"><?PHP echo $afterBeforeClockExplain;?></textarea>
                                <div class="form-textarea-limit-indicator">
                                    <span type="Letters" limit="1000" id="input_121-limit">(Maximum characters: 1000)</span>
                                </div>
                            </span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_57">
                    <label class="form-label-top" id="label_57" for="input_57">
                        On average, how much time a week would you perform work-related tasks while you were off the clock?
                    </label>
                    <div id="cid_57" class="form-input-wide">
                        <span class="form-sub-label-container">        
                            <select class="form-textbox" id="hour_57" name="offClockHour">   
                                <option value="00" <?PHP if($offClockHour == "00") echo "selected";?>> 00 </option> 
                                <option value="01" <?PHP if($offClockHour == "01") echo "selected";?>> 01 </option>
                                <option value="02" <?PHP if($offClockHour == "02") echo "selected";?>> 02 </option>
                                <option value="03" <?PHP if($offClockHour == "03") echo "selected";?>> 03 </option>
                                <option value="04" <?PHP if($offClockHour == "04") echo "selected";?>> 04 </option>
                                <option value="05" <?PHP if($offClockHour == "05") echo "selected";?>> 05 </option>
                                <option value="06" <?PHP if($offClockHour == "06") echo "selected";?>> 06 </option>
                                <option value="07" <?PHP if($offClockHour == "07") echo "selected";?>> 07 </option>
                                <option value="08" <?PHP if($offClockHour == "08") echo "selected";?>> 08 </option>
                                <option value="09" <?PHP if($offClockHour == "09") echo "selected";?>> 09 </option>
                                <option value="10" <?PHP if($offClockHour == "10") echo "selected";?>> 10 </option>
                                <option value="11" <?PHP if($offClockHour == "11") echo "selected";?>> 11 </option>
                                <option value="12" <?PHP if($offClockHour == "12") echo "selected";?>> 12 </option>
                                <option value="13" <?PHP if($offClockHour == "13") echo "selected";?>> 13 </option>
                                <option value="14" <?PHP if($offClockHour == "14") echo "selected";?>> 14 </option>
                                <option value="15" <?PHP if($offClockHour == "15") echo "selected";?>> 15 </option>
                                <option value="16" <?PHP if($offClockHour == "16") echo "selected";?>> 16 </option>
                                <option value="17" <?PHP if($offClockHour == "17") echo "selected";?>> 17 </option>
                                <option value="18" <?PHP if($offClockHour == "18") echo "selected";?>> 18 </option>
                                <option value="19" <?PHP if($offClockHour == "19") echo "selected";?>> 19 </option>        
                                <option value="20" <?PHP if($offClockHour == "20") echo "selected";?>> 20 </option> 
                                <option value="21" <?PHP if($offClockHour == "21") echo "selected";?>> 21 </option>
                                <option value="22" <?PHP if($offClockHour == "22") echo "selected";?>> 22 </option>
                                <option value="23" <?PHP if($offClockHour == "23") echo "selected";?>> 23 </option>
                            </select>
                            <label class="form-sub-label" for="hour_57" id="sublabel_offClockHour">Hour</label>
                        </span>
                        <span class="date-separate">&nbsp;</span>
                        <span class="form-sub-label-container">
                            <select class="form-textbox" id="minute_57" name="offClockMinute">
                                <option  value="00" <?PHP if($offClockMinute  == "00") echo "selected";?>>00</option>      
                                <option  value="05" <?PHP if($offClockMinute  == "05") echo "selected";?>>05</option>
                                <option  value="10" <?PHP if($offClockMinute  == "10") echo "selected";?>>10</option> 
                                <option  value="15" <?PHP if($offClockMinute  == "15") echo "selected";?>>15</option>
                                <option  value="20" <?PHP if($offClockMinute  == "20") echo "selected";?>>20</option> 
                                <option  value="25" <?PHP if($offClockMinute  == "25") echo "selected";?>>25</option>
                                <option  value="30" <?PHP if($offClockMinute  == "30") echo "selected";?>>30</option>
                                <option  value="35" <?PHP if($offClockMinute  == "35") echo "selected";?>>35</option>
                                <option  value="40" <?PHP if($offClockMinute  == "40") echo "selected";?>>40</option>
                                <option  value="45" <?PHP if($offClockMinute  == "45") echo "selected";?>>45</option>
                                <option  value="50" <?PHP if($offClockMinute  == "50") echo "selected";?>>50</option> 
                                <option  value="55" <?PHP if($offClockMinute  == "55") echo "selected";?>>55</option>    
                            </select> 
                            <label class="form-sub-label" for="minute_57" id="sublabel_offClockMinute">Minute</label>
                        </span>
                    </div>
                </li>
                <li class="form-line" id="id_200">
                    <label class="form-label-top" id="label_200" for="input_200">If you would like, please explain any of your answers:</label>
                    <div id="cid_200" class="form-input-wide">
                        <div class="form-textarea-limit">
                            <span>
                                <textarea id="input_200" class="form-textarea" name="session5Explain" cols="70" rows="6" value="<?PHP echo $session5Explain;?>"><?PHP echo $session5Explain;?></textarea>
                                <div class="form-textarea-limit-indicator">
                                    <span type="Letters" limit="1000" id="input_200-limit">(Maximum characters: 1000)</span>
                                </div>
                            </span>
                        </div>
                    </div>
                </li> 
            </ul>
            <ul class="form-section" id="session6" style="display:block;">
                <li id="cid_59" class="form-input-wide">
                    <div class="form-header-group">
                        <h2 id="header_59" class="form-header">Were you paid all of your final wages?</h2>
                        <h3>Interview Section 6 of 9</h3>
                    </div>
                </li>
                <li class="form-line" id="id_304">
                    <div id="cid_304" class="form-input-wide">
                        <div id="text_304" class="form-html">
                            <p><em><strong>If the client is a current employee, please skip this section and scroll down to the next. If the employee is a former employee, please proceed with the questions below.</strong></em></p>
                            <p>Under California law, all wages due must be paid at the time of termination of employment, unless the employee quits without giving at least 72 hours notice, in which case the employer must pay the employee's final wages within 72 hours of quitting.   If the employee provides 72 hours notice prior to quitting, all wages due must be paid on the employee's last day of work.</p>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_63">
                    <label class="form-label-top" id="label_63" for="input_63">
                        In your most recent position at Macy's, were you terminated (laid-off or fired) or did you quit your employment? 
                    </label>
                    <div id="cid_63" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="hidden" name="TermType1"/>
                                <input type="radio" class="form-radio validate[required]" id="input_63_0" name="12TermType" 
                                <?PHP if($TermType == "Terminated") echo 'CHECKED';?> value="Terminated" onClick="layOffOrQuit();" />
                                <label for="input_63_0"> Terminated </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_63_1" name="12TermType" 
                                <?PHP if($TermType == "Quit") echo 'CHECKED';?> value="Quit" onClick="layOffOrQuit();"/>
                                <label for="input_63_1"> Quit </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_64">
                    <label class="form-label-top" id="label_64" for="input_64">
                        If you quit, did you provide at least 72 hours notice before quitting?
                    </label>
                    <div id="cid_64" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_64_0" name="12SeventyTwoHoursOrLess" 
                                <?PHP if($SeventyTwoHoursOrLess == "Yes") echo 'CHECKED';?> value="Yes" />
                                <label for="input_64_0"> Yes </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_64_1" name="12SeventyTwoHoursOrLess" 
                                <?PHP if($SeventyTwoHoursOrLess == "No") echo 'CHECKED';?> value="No" />
                                <label for="input_64_1"> No </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_64_2" name="12SeventyTwoHoursOrLess" 
                                <?PHP if($SeventyTwoHoursOrLess == "Not applicable, I did not quit.") echo 'CHECKED';?> value="Not applicable, I did not quit." />
                                <label for="input_64_2"> Not applicable, I did not quit. </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_65">
                    <label class="form-label-top" id="label_65" for="input_65">
                    If you were terminated or you quit after giving at least 72 hours notice, did you receive all your final paycheck on your last day of work?
                    </label>
                    <div id="cid_65" class="form-input-wide">
                        <div class="form-single-column">
                        <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_65_0" name="12DidYouGetFinalCheckOnLastDay" 
                                <?PHP if($DidYouGetFinalCheckOnLastDay == "Yes") echo 'CHECKED';?> value="Yes" />
                                <label for="input_65_0"> Yes </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_65_1" name="12DidYouGetFinalCheckOnLastDay" 
                                <?PHP if($DidYouGetFinalCheckOnLastDay == "No") echo 'CHECKED';?> value="No" />
                                <label for="input_65_1"> No </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_65_2" name="12DidYouGetFinalCheckOnLastDay"
                                <?PHP if($DidYouGetFinalCheckOnLastDay == "Not applicable, I did not quit after giving at least 72 hoursnotice or I was not terminated.")
                                echo 'CHECKED';?>
                                value="Not applicable, I did not quit after giving at least 72 hoursnotice or I was not terminated." />
                                <label for="input_65_2">Not applicable, I did not quit after giving at least 72 hours notice or I was not terminated.</label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_67">
                    <label class="form-label-top" id="label_67" for="input_67">
                        If you quit without providing at least 72 hours notice, did you receive your final paycheck within 72 hours of quitting?
                    </label>
                    <div id="cid_67" class="form-input-wide">
                        <div class="form-single-column">
                        <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_67_0" name="12withoutSeventyTwoHoursOrLess" 
                                <?PHP if($withoutSeventyTwoHoursOrLess == "Yes") echo 'CHECKED';?> value="Yes" />
                                <label for="input_67_0"> Yes </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_67_1" name="12withoutSeventyTwoHoursOrLess" 
                                <?PHP if($withoutSeventyTwoHoursOrLess == "No") echo 'CHECKED';?> value="No" />
                                <label for="input_67_1"> No </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_67_2" name="12withoutSeventyTwoHoursOrLess" 
                                <?PHP if($withoutSeventyTwoHoursOrLess == "Not applicable, I gave at least 72 hours notice before quitting or I was terminated.") echo 'CHECKED';?>
                                value="Not applicable, I gave at least 72 hours notice before quitting or I was terminated." />
                                <label for="input_67_2"> Not applicable, I gave at least 72 hours notice before quitting or I was terminated.</label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_68">
                    <label class="form-label-top" id="label_68" for="input_68">
                        How long after you stopped working for Macy's did you receive your final paycheck?
                    </label>
                    <div id="cid_68" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_68_6" name="12HowLongAfterTermRecieveCheckGreaterThan72" 
                                <?PHP if($HowLongAfterTermRecieveCheckGreaterThan72 == "I received my final paycheck on my last day of work.") echo 'CHECKED';?> value="I received my final paycheck on my last day of work." />
                                <label for="input_68_6">I received my final paycheck on my last day of work.</label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_68_5" name="12HowLongAfterTermRecieveCheckGreaterThan72" 
                                <?PHP if($HowLongAfterTermRecieveCheckGreaterThan72 == "Less than 4 days") echo 'CHECKED';?> value="Less than 4 days" />
                                <label for="input_68_5">Less than 4 days </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_68_0" name="12HowLongAfterTermRecieveCheckGreaterThan72" 
                                <?PHP if($HowLongAfterTermRecieveCheckGreaterThan72 == "Between 4 and 7 days") echo 'CHECKED';?> value="Between 4 and 7 days" />
                                <label for="input_68_0"> Between 4 and 7 days </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">		
                                <input type="radio" class="form-radio validate[required]" id="input_68_1" name="12HowLongAfterTermRecieveCheckGreaterThan72" 
                                <?PHP if($HowLongAfterTermRecieveCheckGreaterThan72 == "Between 1 and 2 weeks") echo 'CHECKED';?> value="Between 1 and 2 weeks" />
                                <label for="input_68_1"> Between 1 and 2 weeks </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_68_2" name="12HowLongAfterTermRecieveCheckGreaterThan72" 
                                <?PHP if($HowLongAfterTermRecieveCheckGreaterThan72 == "Between 2 and 4 weeks") echo 'CHECKED';?> value="Between 2 and 4 weeks" />
                                <label for="input_68_2"> Between 2 and 4 weeks </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_68_3" name="12HowLongAfterTermRecieveCheckGreaterThan72" 
                                <?PHP if($HowLongAfterTermRecieveCheckGreaterThan72 == "More than a month") echo 'CHECKED';?> value="More than a month" />
                                <label for="input_68_3"> More than a month </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_68_4" name="12HowLongAfterTermRecieveCheckGreaterThan72" 
                                <?PHP if($HowLongAfterTermRecieveCheckGreaterThan72 == "I never received my final paycheck.") echo 'CHECKED';?> 
                                value="I never received my final paycheck." />
                                <label for="input_68_4"> I never received my final paycheck. </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_95">
                    <label class="form-label-top" id="label_95" for="input_95">
                        In your most recent position at Macy's, did your final paycheck include all commissions owed to you?
                    </label>
                    <div id="cid_95" class="form-input-wide">
                        <div class="form-single-column">
                        <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_95_0" name="finalcheckincludeallcommissions" 
                                <?PHP if($finalcheckincludeallcommissions == "Yes") echo 'CHECKED';?> value="Yes" onClick="commisionOwn();"/>
                                <label for="input_95_0"> Yes </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_95_1" name="finalcheckincludeallcommissions" 
                                <?PHP if($finalcheckincludeallcommissions == "No") echo 'CHECKED';?> value="No" onClick="commisionOwn();"/>
                                <label for="input_95_1"> No </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_95_2" name="finalcheckincludeallcommissions" 
                                <?PHP if($finalcheckincludeallcommissions == "Not applicable, I was not commissioned.") echo 'CHECKED';?> 
                                value="Not applicable, I was not commissioned." onClick="commisionOwn();"/>
                                <label for="input_95_2"> Not applicable, I was not commissioned. </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_96" <?PHP if($finalcheckincludeallcommissions == "No") echo "style='display:block;'"; else echo "style='display:none;'";?>>
                    <label class="form-label-top" id="label_96" for="input_96"> 
                        How long did it take for Macy's to pay you all commissions owed to you? 
                    </label>
                    <div id="cid_96" class="form-input-wide">
                        <div class="form-single-column">
                        <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_96_0" name="howlongdidittakeformacystopayallcommissions" 
                                <?PHP if($howlongdidittakeformacystopayallcommissions == "Less than 4 days") echo 'CHECKED';?> value="Less than 4 days" />
                                <label for="input_96_0"> Less than 4 days </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">          	 
                                <input type="radio" class="form-radio" id="input_96_1" name="howlongdidittakeformacystopayallcommissions" 
                                <?PHP if($howlongdidittakeformacystopayallcommissions == "Between 4 and 7 days") echo 'CHECKED';?> value="Between 4 and 7 days" />
                                <label for="input_96_1"> Between 4 and 7 days </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_96_2" name="howlongdidittakeformacystopayallcommissions" 
                                <?PHP if($howlongdidittakeformacystopayallcommissions == "Between 1 and 2 weeks") echo 'CHECKED';?> value="Between 1 and 2 weeks" />
                                <label for="input_96_2"> Between 1 and 2 weeks </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_96_3" name="howlongdidittakeformacystopayallcommissions" 
                                <?PHP if($howlongdidittakeformacystopayallcommissions == "Between 2 and 4 weeks") echo 'CHECKED';?> value="Between 2 and 4 weeks" />
                                <label for="input_96_3"> Between 2 and 4 weeks </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_96_4" name="howlongdidittakeformacystopayallcommissions" 
                                <?PHP if($howlongdidittakeformacystopayallcommissions == "More than a month") echo 'CHECKED';?> value="More than a month" />
                                <label for="input_96_4"> More than a month </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_96_5" name="howlongdidittakeformacystopayallcommissions" 
                                <?PHP if($howlongdidittakeformacystopayallcommissions == "I never received all of the commissions owed to me.") echo 'CHECKED';?>
                                value="I never received all of the commissions owed to me." />
                                <label for="input_96_5"> I never received all of the commissions owed to me. </label></span><span class="clearfix">
                                </span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_96_6" name="howlongdidittakeformacystopayallcommissions" 
                                <?PHP if($howlongdidittakeformacystopayallcommissions == "Not applicable, I was not commissioned.") echo 'CHECKED';?>
                                value="Not applicable, I was not commissioned."/>
                                <label for="input_96_6"> Not applicable, I was not commissioned. </label>
                            </span>
                            <span class="clearfix"></span>
                            </span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_96_7" name="howlongdidittakeformacystopayallcommissions" 
                                <?PHP if($howlongdidittakeformacystopayallcommissions == "I received all commissions owed to me on my last day of work.") echo 'CHECKED';?>
                                value="I received all commissions owed to me on my last day of work."/>
                                <label for="input_96_7"> I received all commissions owed to me on my last day of work. </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_201">
                    <label class="form-label-top" id="label_201" for="input_201">If you would like, please explain any of your answers:</label>
                    <div id="cid_201" class="form-input-wide">
                        <div class="form-textarea-limit">
                            <span>
                                <textarea id="input_201" class="form-textarea" name="session6Explain" cols="70" rows="6" value="<?PHP echo $session6Explain;?>"><?PHP echo $session6Explain;?></textarea>
                                <div class="form-textarea-limit-indicator">
                                    <span type="Letters" limit="1000" id="input_201-limit">(Maximum characters: 1000)</span>
                                </div>
                            </span>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="form-section" id="session7" style="display:block;">
                <li id="cid_70" class="form-input-wide">
                    <div class="form-header-group">
                        <h2 id="header_70" class="form-header">Were you provided with a seat during your work shift?</h2>
                        <h3>Interview Section 7 of 9</h3>
                    </div>
                </li>
		
		  <li class="form-line" id="id_71">
                    <label class="form-label-top" id="label_71" for="input_71">
                        In your most recent position working at Macy’s, did you have cashier responsibilities?
                    </label>
                    <div id="cid_71" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                
                                <input type="radio" class="form-radio validate[required]" name="CashierEver" 
                                <?PHP if($CashierEver == "Yes") echo 'CHECKED';?>
                                value="Yes" />
                                <label for="input_71_0">Yes</label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" name="CashierEver" 
                                <?PHP if($CashierEver == "No") echo 'CHECKED';?>
                                value="No" />
                                <label for="input_71_1">No</label>
                            </span>

                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
		
                <li class="form-line" id="id_71">
                    <label class="form-label-top" id="label_71" for="input_71">
                        In your most recent position working at Macy's, did the nature of your job require you to stand?
                    </label>
                    <div id="cid_71" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="hidden" name="DidYourJobRequireStanding1"/>
                                <input type="radio" class="form-radio validate[required]" id="input_71_0" name="14DidYourJobRequireStanding" 
                                <?PHP if($DidYourJobRequireStanding == "Yes, and I was provided with a seat near my work station, other than a seat in the break room.") echo 'CHECKED';?>
                                value="Yes, and I was provided with a seat near my work station, other than a seat in the break room." />
                                <label for="input_71_0">Yes, and I was provided with a seat near my work station, other than a seat in the break room. </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_71_1" name="14DidYourJobRequireStanding" 
                                <?PHP if($DidYourJobRequireStanding == "Yes, and I was not provided with a seat near my work station, other than a seat in the break room.") echo 'CHECKED';?>
                                value="Yes, and I was not provided with a seat near my work station, other than a seat in the break room." />
                                <label for="input_71_1"> Yes, and I was not provided with a seat near my work station, other than a seat in the break room. </label>
                            </span>
                            <span class="clearfix"></span><br>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_71_2" name="14DidYourJobRequireStanding" 
                                <?PHP if($DidYourJobRequireStanding == "No") echo 'CHECKED';?> value="No" />
                                <label for="input_71_2"> No </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_71_3" name="14DidYourJobRequireStanding" 
                                <?PHP if($DidYourJobRequireStanding == "I do not remember") echo 'CHECKED';?> value="I do not remember" />
                                <label for="input_71_3"> I don't remember </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_72">
                    <label class="form-label-top" id="label_72" for="input_72">
                        When you weren't engaged in your work duties, did Macy's ever let you sit in a seat during your work shift? 
                    </label>
                    <div id="cid_72" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_72_0" name="14PermittedToSit" 
                                <?PHP if($PermittedToSit == "Yes") echo 'CHECKED';?> value="Yes" onClick="letYouSit();" />
                                <label for="input_72_0"> Yes </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_72_1" name="14PermittedToSit" 
                                <?PHP if($PermittedToSit == "No") echo 'CHECKED';?> value="No" />
                                <label for="input_72_1"> No </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_74">
                    <label class="form-label-top" id="label_74" for="input_74">
                    On average, how long were you required to work during a normal shift until you were permitted to sit down?
                    </label>
                    <div id="cid_74" class="form-input-wide">
                        <span class="form-sub-label-container"> 
                            <select class="form-textbox" id="hour_74" name="timeBeforeSitHour">  
                                <option value="00" <?PHP if($timeBeforeSitHour == "00") echo "selected";?>> 00 </option> 
                                <option value="01" <?PHP if($timeBeforeSitHour == "01") echo "selected";?>> 01 </option>
                                <option value="02" <?PHP if($timeBeforeSitHour == "02") echo "selected";?>> 02 </option>
                                <option value="03" <?PHP if($timeBeforeSitHour == "03") echo "selected";?>> 03 </option>
                                <option value="04" <?PHP if($timeBeforeSitHour == "04") echo "selected";?>> 04 </option>
                                <option value="05" <?PHP if($timeBeforeSitHour == "05") echo "selected";?>> 05 </option>
                                <option value="06" <?PHP if($timeBeforeSitHour == "06") echo "selected";?>> 06 </option>
                                <option value="07" <?PHP if($timeBeforeSitHour == "07") echo "selected";?>> 07 </option>
                                <option value="08" <?PHP if($timeBeforeSitHour == "08") echo "selected";?>> 08 </option>
                                <option value="09" <?PHP if($timeBeforeSitHour == "09") echo "selected";?>> 09 </option>
                                <option value="10" <?PHP if($timeBeforeSitHour == "10") echo "selected";?>> 10 </option>
                                <option value="11" <?PHP if($timeBeforeSitHour == "11") echo "selected";?>> 11 </option>
                                <option value="12" <?PHP if($timeBeforeSitHour == "12") echo "selected";?>> 12 </option>
                                <option value="13" <?PHP if($timeBeforeSitHour == "13") echo "selected";?>> 13 </option>
                                <option value="14" <?PHP if($timeBeforeSitHour == "14") echo "selected";?>> 14 </option>
                                <option value="15" <?PHP if($timeBeforeSitHour == "15") echo "selected";?>> 15 </option>
                                <option value="16" <?PHP if($timeBeforeSitHour == "16") echo "selected";?>> 16 </option>
                                <option value="17" <?PHP if($timeBeforeSitHour == "17") echo "selected";?>> 17 </option>
                                <option value="18" <?PHP if($timeBeforeSitHour == "18") echo "selected";?>> 18 </option>
                                <option value="19" <?PHP if($timeBeforeSitHour == "19") echo "selected";?>> 19 </option>        
                                <option value="20" <?PHP if($timeBeforeSitHour == "20") echo "selected";?>> 20 </option> 
                                <option value="21" <?PHP if($timeBeforeSitHour == "21") echo "selected";?>> 21 </option>
                                <option value="22" <?PHP if($timeBeforeSitHour == "22") echo "selected";?>> 22 </option>
                                <option value="23" <?PHP if($timeBeforeSitHour == "23") echo "selected";?>> 23 </option>
                            </select>
                            <label class="form-sub-label" for="hour_74" id="sublabel_timeBeforeSitHour">Hour</label>
                        </span> 
                        <span class="date-separate">&nbsp;</span>
                        <span class="form-sub-label-container">
                            <select class="form-textbox" id="minute_74" name="timeBeforeSitMinute">
                                <option  value="00" <?PHP if($timeBeforeSitMinute  == "00") echo "selected";?>>00</option>      
                                <option  value="05" <?PHP if($timeBeforeSitMinute  == "05") echo "selected";?>>05</option>
                                <option  value="10" <?PHP if($timeBeforeSitMinute  == "10") echo "selected";?>>10</option> 
                                <option  value="15" <?PHP if($timeBeforeSitMinute  == "15") echo "selected";?>>15</option>
                                <option  value="20" <?PHP if($timeBeforeSitMinute  == "20") echo "selected";?>>20</option> 
                                <option  value="25" <?PHP if($timeBeforeSitMinute  == "25") echo "selected";?>>25</option>
                                <option  value="30" <?PHP if($timeBeforeSitMinute  == "30") echo "selected";?>>30</option>
                                <option  value="35" <?PHP if($timeBeforeSitMinute  == "35") echo "selected";?>>35</option>
                                <option  value="40" <?PHP if($timeBeforeSitMinute  == "40") echo "selected";?>>40</option>
                                <option  value="45" <?PHP if($timeBeforeSitMinute  == "45") echo "selected";?>>45</option>
                                <option  value="50" <?PHP if($timeBeforeSitMinute  == "50") echo "selected";?>>50</option> 
                                <option  value="55" <?PHP if($timeBeforeSitMinute  == "55") echo "selected";?>>55</option>      
                            </select>       
                            <label class="form-sub-label" for="minute_74" id="sublabel_timeBeforeSitMinute">Minute</label>
                        </span>
                    </div>
                </li>
                <li class="form-line" id="id_75">
                    <label class="form-label-top" id="label_75" for="input_75">
                        Were there any disciplinary consequences if you were to have a seat during your work shift?
                    </label>
                    <div id="cid_75" class="form-input-wide">
                        <div class="form-single-column">
                        <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_75_0" name="14Consequences"  
                                <?PHP if($Consequences == "Yes") echo 'CHECKED';?>  value="Yes" onClick="seatConseq();"/>
                                <label for="input_75_0"> Yes </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_75_1" name="14Consequences" 
                                <?PHP if($Consequences == "No") echo 'CHECKED';?> value="No" onClick="seatConseq();"/>
                                <label for="input_75_1"> No </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_107" 
                    <?PHP if($Consequences == "Yes") echo "style='display:block;'"; else echo "style='display:none;'";?>>
                    <label class="form-label-top" id="label_107" for="input_107">If Yes, please explain:</label>
                    <div id="cid_107" class="form-input-wide">
                        <div class="form-textarea-limit">
                            <span>
                                <textarea id="input_107" class="form-textarea" name="jobListSeated" cols="70" rows="6" value="<?PHP echo $jobListSeated;?>"><?PHP echo $jobListSeated;?></textarea>
                                <div class="form-textarea-limit-indicator">
                                    <span type="Letters" limit="1000" id="input_107-limit">(Maximum characters: 1000)</span>
                                </div>
                            </span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_76">
                    <label class="form-label-top" id="label_76" for="input_76">
                        Do you think you could have performed your job duties while you were seated?
                    </label>
                    <div id="cid_76" class="form-input-wide">
                        <div class="form-single-column">
                        <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_76_0" name="14SittingWouldInterfere" 
                                <?PHP if($SittingWouldInterfere == "Yes") echo 'CHECKED';?> value="Yes" onClick="dutySeatedExplain();" />
                                <label for="input_76_0"> Yes </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio validate[required]" id="input_76_1" name="14SittingWouldInterfere" 
                                <?PHP if($SittingWouldInterfere == "No") echo 'CHECKED';?> value="No" onClick="dutySeatedExplain();"/>
                                <label for="input_76_1"> No </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_122" <?PHP if($SittingWouldInterfere == "Yes") echo "style='display:block;'"; else echo "style='display:none;'";?>>
                    <label class="form-label-top" id="label_122" for="input_122">If Yes, please list the job duties you could have performed while you were seated:</label>
                    <div id="cid_122" class="form-input-wide">
                        <div class="form-textarea-limit">
                            <span>
                                <textarea id="input_122" class="form-textarea" name="jobSeatedExplain" cols="70" rows="6" value="<?PHP echo $jobSeatedExplain; ?>"><?PHP echo $jobSeatedExplain; ?></textarea>
                                <div class="form-textarea-limit-indicator">
                                    <span type="Letters" limit="1000" id="input_122-limit">(Maximum characters: 1000)</span>
                                </div>
                            </span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_202">
                    <label class="form-label-top" id="label_202" for="input_202">If you would like, please explain any of your answers:</label>
                    <div id="cid_202" class="form-input-wide">
                        <div class="form-textarea-limit">
                            <span>
                                <textarea id="input_202" class="form-textarea" name="session7Explain" cols="70" rows="6" value="<?PHP echo $session7Explain; ?>"><?PHP echo $session7Explain; ?></textarea>
                                <div class="form-textarea-limit-indicator">
                                    <span type="Letters" limit="1000" id="input_202-limit">(Maximum characters: 1000)</span>
                                </div>
                            </span>
                        </div>
                    </div>
                </li> 
            </ul>
            <ul class="form-section" id="session8" style="display:block;">
                <li id="cid_87" class="form-input-wide">
                    <div class="form-header-group">
                        <h2 id="header_87" class="form-header">Do you have any documents from your most recent position at Macy's?</h2>
                        <h3>Interview Section 8 of 9</h3>
                    </div>
                </li>
                <li class="form-line" id="id_78">
                    <div id="cid_78" class="form-input-wide">
                        <div id="text_78" class="form-html">
                            <p class="doc">To further assist us in pursuing your potential wage and hour claims against Macy's, you may provide us with documents from your employment.  You can send us your documents in one of three ways:</p>      
                            <p><span class="number">1.</span>  You can scan and e-mail your documents to: <a href="mailto:MacysLawsuit@InitiativeLegal.com">MacysLawsuit@InitiativeLegal.com</a></p>
                            <p><span class="number">2.</span>  You can fax your documents to:  (310) 734 - 1665</p>
                            <p><span class="number">3.</span>  You can mail your documents to: </p>
                            <ul id="address">
                                <li>
                                    <p>
                                        Initiative Legal Group APC <br />
                                        c/o: Macy's Lawsuit<br />
                                        9663 Santa Monica Blvd, #149<br />
                                        Beverly Hills, CA 90210
                                    </p>
                                </li>
                            </ul>
                            <p class="disclaimer">Documents received by Initiative Legal Group APC by any of the above methods will be stored confidentially and securely, either electronically or in physical form.</p>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="form-section" id="session9" style="display:block;">
                <li id="cid_98" class="form-input-wide">
                    <div class="form-header-group">
                        <h2 id="header_87" class="form-header">Do you qualify for a Fee Waiver?</h2>
                        <h3>Interview Section 9 of 9</h3>
                    </div>
                </li>
                <li class="form-line" id="id_101">
                    <div id="cid_101" class="form-input-wide">
                        <div id="text_101" class="form-html">
                        <p>If our law firm elects to pursue your claims on an individual basis through arbitration, we may be entitled to a waiver of the associated cost with filing your case in an arbitration based upon your household size and current gross monthly income.</p>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_102">
                    <label class="form-label-top" id="label_102" for="input_102"> 
                        How many people live in your household, including yourself? 
                    </label>
                    <div id="cid_102" class="form-input-wide">
                        <div class="form-single-column">
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="hidden" name="HouseHoldCount1"/>
                                <input type="radio" class="form-radio" id="input_102_0" name="HouseHoldCount" <?PHP if($HouseHoldCount == "1") echo 'CHECKED';?> value="1" />
                                <label for="input_102_0"> 1 </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_102_1" name="HouseHoldCount" <?PHP if($HouseHoldCount == "2") echo 'CHECKED';?> value="2" />
                                <label for="input_102_1"> 2 </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_102_2" name="HouseHoldCount" <?PHP if($HouseHoldCount == "3") echo 'CHECKED';?> value="3" />
                                <label for="input_102_2"> 3 </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_102_3" name="HouseHoldCount" <?PHP if($HouseHoldCount == "4") echo 'CHECKED';?> value="4" />
                                <label for="input_102_3"> 4 </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_102_4" name="HouseHoldCount" <?PHP if($HouseHoldCount == "5") echo 'CHECKED';?> value="5" />
                                <label for="input_102_4"> 5 </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_102_5" name="HouseHoldCount" <?PHP if($HouseHoldCount == "6") echo 'CHECKED';?> value="6" />
                                <label for="input_102_5"> 6 </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_102_6" name="HouseHoldCount" <?PHP if($HouseHoldCount == "7") echo 'CHECKED';?> value="7" />
                                <label for="input_102_6"> 7 </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_102_7" name="HouseHoldCount" <?PHP if($HouseHoldCount == "8") echo 'CHECKED';?> value="8" />
                                <label for="input_102_7"> 8 </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_102_8" name="HouseHoldCount"
                                <?PHP if($HouseHoldCount == "Decline to answer") echo 'CHECKED';?> value="Decline to answer" />
                                <label for="input_102_8"> Decline to answer </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_103">
                    <label class="form-label-top" id="label_103" for="input_103"> 
                        What is your current gross monthly income?
                     </label>
                    <div id="cid_103" class="form-input-wide">
                        <div class="form-single-column">
                        <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_103_0" name="GrossIncome" 
                                <?PHP if($GrossIncome == "Less than 2793") echo 'CHECKED';?> value="Less than 2793" />
                                <label for="input_103_0"> Less than $2,793 </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_103_1" name="GrossIncome" 
                                <?PHP if($GrossIncome == "2793to3783") echo 'CHECKED';?> value="2793to3783" />
                                <label for="input_103_1"> Between $2,793-$3,782 </label></span>
                            <span class="clearfix"></span><span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_103_2" name="GrossIncome" 
                                <?PHP if($GrossIncome == "3783to4773") echo 'CHECKED';?> value="3783to4773" />
                                <label for="input_103_2"> Between $3,783-$4,772 </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_103_3" name="GrossIncome" 
                                <?PHP if($GrossIncome == "4773to5763") echo 'CHECKED';?> value="4773to5763" />
                                <label for="input_103_3"> Between $4,773- $5,762 </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_103_4" name="GrossIncome" 
                                <?PHP if($GrossIncome == "5763to6753") echo 'CHECKED';?> value="5763to6753" />
                                <label for="input_103_4"> Between $5,763- $6,752 </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_103_5" name="GrossIncome" 
                                <?PHP if($GrossIncome == "6753to7743") echo 'CHECKED';?> value="6753to7743" />
                                <label for="input_103_5"> Between $6,753- $7,742 </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_103_6" name="GrossIncome" 
                                <?PHP if($GrossIncome == "7743to8733") echo 'CHECKED';?> value="7743to8733" />
                                <label for="input_103_6"> Between $7,743- $8,732 </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">
                                <input type="radio" class="form-radio" id="input_103_7" name="GrossIncome" 
                                <?PHP if($GrossIncome == "8733to9723") echo 'CHECKED';?> value="8733to9723" />
                                <label for="input_103_7"> Between $8,733- $9,723 </label>
                            </span>
                            <span class="clearfix"></span>
                            <span class="form-radio-item" style="clear:left; display: block;">           
                                <input type="radio" class="form-radio" id="input_103_8" name="GrossIncome" 
                                <?PHP if($GrossIncome == "Decline") echo 'CHECKED';?> value="Decline" />
                                <label for="input_103_8"> Decline to answer </label>
                            </span>
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="form-section" id="session10" style="display:block;">
                <li class="form-line" id="id_88">
                    <div id="cid_88" class="form-input-wide">
                        <div id="text_88" class="form-html">
                            <!--<p>Thank you for your cooperation and participation. Your case attorney will review the answers you have provided and will contact you if further information is needed.</p>-->
                            <p>Those are all the questions I have for you today. In order to complete the next step, I will be sending you up to three forms for your review and signature:</p>
                            <p>The first is an Authorization for Release of Personnel File and Wage Records form. By signing this Authorization form, you will direct Macy's to release your employment records to our law firm, which may be helpful to support your claims.</p>
                            <p>The second document is an Authorization for Settlement form. Although Initiative Legal Group does not guarantee or promise any specific outcome for your case, by signing this Authorization form, if and when the time comes, you will allow our law firm to settle and release your potential wage and hour claims against Macy's on your behalf for at least $200 total, after the deduction of legal fees or costs.</p>
                            <p>We may include the third form, which is an Affidavit for Waiver of Fees Notice. Our law firm will advance all costs so there are no out-of-pocket costs you will have to pay. If you meet a certain gross income level, you will be asked to complete and sign an Affidavit so that our firm can ask the American Arbitration Association on your behalf to waive any filing fees that our law firm would have to pay if and when your case were to be filed.</p>
                        </div>
                    </div>
                </li>
                <li class="form-line" id="id_2" style="padding: 0px 12px 20px !important;">
                    <div id="cid_2" class="form-input-wide">
                        <div class="form-button-wrapper">
                            <?PHP
                                echo '<input type="submit" onclick="needToConfirm = false;" name="saveClose" value="Save & Close" class="blueBtn" />';
                                echo '<input type="submit" onclick="needToConfirm = false;" name="complete" value="Submit" class="redBtn" />';
                            ?>     
                        </div>
                    </div>
                </li>
                <li style="display:none">
                    Should be Empty:
                    <input type="text" name="website" value="" />
                </li>
            </ul>
        </div>
        <input type="hidden" id="simple_spc" name="simple_spc" value="20599278470161" />
        <script type="text/javascript">
            document.getElementById("si" + "mple" + "_spc").value = "20599278470161-20599278470161";
        </script>
        <?PHP
            echo "<input type='hidden' id='simple_spc' name='uniqueid' value='".$uniqueid."' />";
        ?>
    </form>
</div>  <!--end internalLongForm-->
</body>