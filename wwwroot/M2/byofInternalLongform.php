<?PHP
##Some functions!
function radiobuttonmake($var,$val,$description,$checked)
{
    if($checked == 'Yes')
    {
        echo '<div class="input radio">';
        echo "\n\t";
	echo "<INPUT TYPE = 'Radio' Name ='".$var."' id ='".$var."' value= '".$val."' checked>".$description;
        echo '</div>';
    }
    else
    {
        echo '<div class="input radio">';
        echo "\n\t";
        echo "<INPUT TYPE = 'Radio' Name ='".$var."' id ='".$var."' value= '".$val."'>".$description;
        echo "\n";
        echo '</div>';    
    }
}

function textareamake($var,$val,$description,$width,$height)
{
    echo '<div class="input textarea">';
    echo "\n\t";
    echo"<textarea class='' name='".$var."' id='".$var."' cols='".$width."' rows='".$height."'>".$val."</textarea>";
    echo "\n";
    echo '</div>';
}
function iframemake($page,$uniqueid,$height,$name,$border)
{
echo "<iframe name='";
echo $name;
echo "' scrolling='auto' width='100%' height='";
echo $height;
echo "' frameborder='".$border."' style='margin:auto;' src='";
echo $page;
echo "?uniqueid=";
echo $uniqueid;
echo "'></iframe>";
}
?>

<?PHP
require("db.php");
$dateNOW = date('Y').'-'.date('m').'-'.date('d');
$dateNOWjason = date('m').'/'.date('d').'/'.date('Y');
$timeNOW = date('H').':'.date('i').':'.date('s');
$monthNOW = date('Y').'-'.date('m');
$weekNOW = date('Y').'-'.date('W');

$hourNOW = date('G');

$formname = 'longform';
$uniqueid = $_GET['uniqueid'];
if (empty($uniqueid)) unset($uniqueid);

##Exit unless uniqueid is set -OPEN-
if (isset($uniqueid))
{
    if ($uniqueid != '')
    {##Doublecheck uniqueid is not empty -OPEN-
        ##Get brand from uniqueid
        $query = "SELECT brand FROM Status where uniqueid = '".$uniqueid."';";		
        $results = sqlsrv_query($conn,$query);
        while($row = sqlsrv_fetch_array($results))
        {
                $brand = $row['brand'];
        }
        if (isset($_POST['section']))
        {
            $lastsection = $_POST['section'];
        }
        if (isset($_POST['Final']))
        {
            if ($_POST['Final'] == 'Final')
            {
                $query = "select nextpage as nextpage from Form_details where formname='".$formname."' and brand='".$brand."';";		
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                    $nextpage = $row['nextpage'];
                }
                
            }
        }
        if (isset($_POST['Forward']))
        {
            if ($_POST['Forward'] == 'Forward')
            {
                $query = "update status  set ".$formname."Section='".$lastsection."' where uniqueid = '".$uniqueid."';";		
                $results = sqlsrv_query($conn,$query);
            }
        }
        if (isset($_POST['Backward']))
        {
            if ($_POST['Backward'] == 'Backward')
            {
                $sectionnext = $_POST['section'] -=1;
                $section[] = $sectionnext;
            }
        }
        else
        {
            ##Get last section as long as we arent going backwards
            $query = "SELECT ".$formname."Section as Section FROM Status where uniqueid = '".$uniqueid."';";		
            $results = sqlsrv_query($conn,$query);
            while($row = sqlsrv_fetch_array($results))
            {
                $sectionlast = $row['Section'];
            }
            if (empty($sectionlast))
            {
                $section[] = 1;
            }
            else
            {
                $sectionnext = $sectionlast +=1;
                $section[] = $sectionnext;
            }
        }
        


        if (empty($brand))
        {
            ##do nothing if no brand set
        }
        else
        {
            if(!isset ($section))## if for some reason there is no section set, then select all the possible sections and pipe them to the section array
            {
                $query = "select Distinct section from Forms where brand ='".$brand."' and formname ='".$formname."';";		   
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                    $section[] = $row['section'];
                }
            }
            $query = "select Distinct TOP 1  section as section from Forms where brand='".$brand."' and formname='".$formname."' order by section desc;";		  
            $results = sqlsrv_query($conn,$query);
            while($row = sqlsrv_fetch_array($results))
            {
                $finalsection = $row['section'];
            }
            $secondtofinalsection = $finalsection -1;
            
            if (!isset($_POST['Final']))
            {
            echo "<head>";
            echo "\n";
            echo "<link href='https://macyslawsuit.com/wp-content/themes/MacysV3/css/newLongForm.css' rel='stylesheet' type='text/css'>";            
            echo "<script src=\"gen_validatorv4.js\" type=\"text/javascript\">";
            echo "\n";
            echo "</script>";
            echo "\n";
            echo "</head>";
            echo "\n";
            echo "<body>";
            echo "\n";
            echo "<form action='byofInternalLongform.php?uniqueid=".$uniqueid."' method='post' id='myform'>";
            echo "\n";
            foreach($section as $key => $value)
            {
                ## Get forms for brand
                $query = "SELECT * FROM Forms where brand = '".$brand."' and section = '".$value."' order by questionnumber asc;";		   
                $results = sqlsrv_query($conn,$query);
                while($row = sqlsrv_fetch_array($results))
                {
                    $desc = $row['Description'];
                    $type = $row['type'];
                    $qname = $row['qname'];
                    $qreq = $row['required'];
                    $sublabel = $row['sublabel'];
                    

                    if ($qreq == 'Yes')
                    {
                        $validatetype = $row['validatetype'];
                        $validatetext = $row['validatetext'];
                        
                        switch ($type) ##build the array that prints all the requried variables at the end of the form
                        {
                            case ($type == 'radio'):
                                $requiredarray[] = 'frmvalidator.addValidation("'.$qname.'","selone","'.$validatetext.'");';
                            break;
                            case ($type == 'textonly'):
                            ##dont do anything for text only, we do need to flag it as required for the red * but not add to the js array
                            break;
                            default:
                                $requiredarray[] = 'frmvalidator.addValidation("'.$qname.'","'.$validatetype.'","'.$validatetext.'");';
                            break;                        
                        }
                        
                        
                    }
                    if ($type == 'radio')
                    {
                        $radioarray[] = $row['radio1'];
                        $radioarray[] = $row['radio2'];
                        $radioarray[] = $row['radio3'];
                        $radioarray[] = $row['radio4'];
                        $radioarray[] = $row['radio5'];
                        $radioarray[] = $row['radio6'];
                        $radioarray[] = $row['radio7'];
                        $radioarray[] = $row['radio8'];
                        $radioarray[] = $row['radio9'];
                        $radioarray[] = $row['radio10'];
                        $radioarray[] = $row['radio11'];
                        $radioarray[] = $row['radio12'];
                        $radioarray[] = $row['radio13'];
                        $radioarray[] = $row['radio14'];
                        $radioarray[] = $row['radio15'];
                    }
                    if ($type == 'textarea')
                    {
                        $width = $row['width'];
                        $height = $row['height'];
                    }
                    if ($type == 'dropdown')
                    {
                        $dropdownarray = json_decode($row['dropdownarray']);
                    }
                    if ($type == 'iframe')
                    {
                        $url = $row['url'];
                        $height = $row['height'];
                    }
                $query2 = "IF EXISTS (SELECT [".$qname."] as name FROM data where uniqueid ='".$uniqueid."') SELECT [".$qname."] as name FROM data where uniqueid ='".$uniqueid."';";		  
                $results2 = sqlsrv_query($conn,$query2);
                $qnameval = '';
                while($row2 = sqlsrv_fetch_array($results2))
                {
                    $qnameval = $row2['name'];
                }
                if ($qnameval == '')
                {
                    unset($qnameval);
                }
                if(empty($qname))## if there is nothing to show don't show anything
                {
                    
                }
                else
                {
                    switch ($type)
                    {
                        case ($type == 'radio'):
                            if(!empty($row['radio1']))
                            {

                                #echo "<br>";
                                echo '<div class="question">';
                                echo "\n";
                                if($qreq == 'Yes')
                                {
                                    echo "\n";
                                    echo "<div class=\"required\"><p>";
                                    echo "\n\t";
                                    echo $desc;
                                    echo "\n";
                                    echo "</p></div>";
                                }
                                else
                                {
                                    echo "\n";
                                    echo "<div class=\"notrequired\"><p>";
                                    echo "\n\t";
                                    echo $desc;
                                    echo "\n";
                                    echo "</p></div>";
                                }
                                echo "\n";
                                foreach($radioarray as $radkey => $radvalue)
                                {
                                    if(isset($qnameval))
                                    {
                                        if ($qnameval == $radvalue)
                                        {
                                            #echo "<br>";
                                            radiobuttonmake($qname,$radvalue,$radvalue,'Yes');
                                            echo "\n";
                                        }
                                        if ($qnameval != $radvalue)
                                            {
                                                if(!empty($radvalue))
                                                {
                                                    #echo "<br>";
                                                    echo "\n";
                                                    radiobuttonmake($qname,$radvalue,$radvalue,'');
                                                    echo "\n";
                                                }
                                            }
                                    }
                                    if(!isset($qnameval))
                                    {
                                        if(!empty($radvalue))
                                        {
                                            #echo "<br>";
                                            echo "\n";
                                            radiobuttonmake($qname,$radvalue,$radvalue,'');
                                            echo "\n";
                                        }
                                    }
                                    
                                }
                                echo '</div>';
                                #echo "<br>";
                            }
                            $radioarray = array();
                        break;##skip if current key is uniqueid
                        case ($type == 'textarea'):
                            if(isset($qnameval))
                            {
                                #echo "<br>";
                                echo "\n";
                                if($qreq == 'Yes')
                                {
                                    echo "\n";
                                    echo "<div class=\"required\"><p>";
                                    echo "\n\t";
                                    echo $desc;
                                    echo "\n";
                                    echo "</p></div>";
                                }
                                else
                                {
                                    echo "\n";
                                    echo "<div class=\"notrequired\"><p>";
                                    echo "\n\t";
                                    echo $desc;
                                    echo "\n";
                                    echo "</p></div>";
                                }
                                #echo "<br>";
                                echo "\n";                                
                                textareamake($qname,$qnameval,'',$width,$height);
                            }
                            else
                            {
                                #echo "<br>";
                                echo "\n";
                                if($qreq == 'Yes')
                                {
                                    echo "\n";
                                    echo "<div class=\"required\"><p>";
                                    echo "\n\t";
                                    echo $desc;
                                    echo "\n";
                                    echo "</p></div>";
                                }
                                else
                                {
                                    echo "\n";
                                    echo "<div class=\"notrequired\"><p>";
                                    echo "\n\t";
                                    echo $desc;
                                    echo "\n";
                                    echo "</p></div>";
                                }
                                #echo "<br>";
                                echo "\n";                                 
                                textareamake($qname,'','',$width,$height);
                            }
                            #echo "<br>";
                        
                        break;
                        case ($type == 'dropdown'):
                            if (isset($desc))
                            {
                                if ($desc != '')
                                {
                                    #echo "<br>";
                                    echo "\n";
                                if($qreq == 'Yes')
                                {
                                    echo "\n";
                                    echo "<div class=\"required\"><p>";
                                    echo "\n\t";
                                    echo $desc;
                                    echo "\n";
                                    echo "</p></div>";
                                }
                                else
                                {
                                    echo "\n";
                                    echo "<div class=\"notrequired\"><p>";
                                    echo "\n\t";
                                    echo $desc;
                                    echo "\n";
                                    echo "</p></div>";
                                }
                                    #echo "<br>";
                                    echo "\n";
                                }
                            }
                            echo '<div class="input dropdown">';
                            if (isset ($sublabel))
                            {
                                #echo "<br>";
                                echo "\n";
                                echo '<label for="'.$qname.'" > '.$sublabel.' </label>';
                            echo "\n";
                            }
                            echo '<select class="" name="'.$qname.'">';
                            foreach($dropdownarray as $dropkey => $dropvalue)
                            {
                                if ($dropvalue == " ")
                                {
                                    echo "\n";
                                    echo '<option name="'.$qname.'" value="">  </option>';
                                }
                                else
                                {
                                    if (isset($qnameval))
                                    {
                                        if ($qnameval == $dropvalue)
                                        {
                                            echo "\n";
                                            echo '<option name="'.$qname.'" value="'.$qnameval.'" selected>'.$qnameval.'</option>';
                                        }
                                        else
                                        {
                                            echo "\n";
                                            echo '<option name="'.$qname.'" value="'.$dropvalue.'">'.$dropvalue.'</option>';
                                        }                                        
                                    }
                                    else
                                    {
                                        echo "\n";
                                        echo '<option name="'.$qname.'" value="'.$dropvalue.'">'.$dropvalue.'</option>';
                                    }
                                    #echo "";
                                }
                            }
                            echo "</select>";
                            echo '</div>';
                            
                            #echo "<br>";
                            echo "\n";
                        break;
                    case ($type == 'textonly'):
                        //echo "\n";
                        //echo "<div class=\"textonly\"><p>";
                        //echo "\n\t";
                        //echo $desc;
                        //echo "</p></div>";
                        //echo "\n";
                        if($qreq == 'Yes')
                            {
                                echo "\n";
                                echo "<div class=\"required\"><p>";
                                echo "\n\t";
                                echo $desc;
                                echo "\n";
                                echo "</p></div>";
                            }
                            else
                            {
                                echo "\n";
                                echo "<div class=\"notrequired\"><p>";
                                echo "\n\t";
                                echo $desc;
                                echo "\n";
                                echo "</p></div>";
                            }                        
                        break;
                    case ($type == 'header'):
                        echo "\n";
                        
                        echo "<div class=\"header\"><p>";
                        echo "\n\t";
                        echo $desc;
                        echo '<p class="required">* Indicates a required filed.</p>';
                        echo "</p></div>";
                        echo "\n";
                        break;
                    case ($type == 'intro'):
                        echo "\n";
                        echo "<div class=\"intro\"><p>";
                        echo "\n\t";
                        echo $desc;
                        echo "</p></div>";
                        echo "\n";
                        break;
                    case ($type == 'iframe'):
                    iframemake($url,$uniqueid,$height.'px',$qname,'0');
                    break;
                    #echo "<br>";
                    }
                }
            }
            echo "<input type=hidden name=section value='".$value."'>";
            #echo "<br>";
            if ($value == '1')##if Section 1, don't show the back button ( since there is no where else to go but forward )
            {
                
            }
            else
            {
                echo "\n";
                #echo '<div class="backward">';
                echo "\n\t";
                echo "<input type=submit name='Backward' value='Backward' onclick=\"frmvalidator.clearAllValidations()\" class='backward'>";
                echo "\n";
                #echo '</div>';
            }
            echo "\n";
            #echo '<div class="forward">';
            echo "\n\t";
            if ($value == $finalsection)
            {
                echo "<input type=submit name='Final' value='Final' class='submit'>";
            }
            else
            {
                echo "<input type=submit name='Forward' value='Forward' class='forward'>";
            }
            echo "\n";
            #echo '</div>';
            echo "</form>";
            
echo '<script  type="text/javascript">';
echo "\n";
echo ' var frmvalidator = new Validator("myform");';
echo "\n";
foreach($requiredarray as $reqkey => $reqval)
{
    echo $reqval."\n";
}
#echo 'frmvalidator.addValidation("recentPositionExplain","req");';
echo "</script>";
        }
    }
    else
    {
        #echo $nextpage;
        require($nextpage);
    }
        }
    }##Doublecheck uniqueid is not empty -CLOSE-
    else
    {
        echo "You forgot something important...";
    }
}##Exit unless uniqueid is set -CLOSE-
else
{
    echo "You forgot something important...";
}
?>


<?PHP

foreach($_POST as $key => $val)

{
    $val = str_replace('\'','',$val);##cleans up any input from POST of single quotes so the SQL queries don't break

    switch ($key)
    {
        case ($key == 'uniqueid'):
            break;##skip if current key is uniqueid
        case ($key == 'Forward'):
            break;##skip if current key is Forward
        case ($key == 'Backward'):
            break;##skip if current key is Backward
        case ($key == 'Final'):
            break;##skip if current key is Final            
        case ($key == 'section'):
            break;##skip if current key is section
        default:
            $query = "IF NOT EXISTS (SELECT * from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'Data' and COLUMN_NAME = '$key' ) ALTER TABLE Data ADD [$key] varchar(max) NULL";
            $results = sqlsrv_query($conn,$query);
    
            $query = "IF EXISTS(SELECT uniqueid FROM data WHERE uniqueid='$uniqueid') UPDATE data SET [$key]='$val' WHERE uniqueid='$uniqueid' ELSE INSERT INTO data (uniqueid,[$key]) VALUES ('$uniqueid','$val')";
            $results = sqlsrv_query($conn,$query);
            break;
    }
}

#print_r($_GET);
#echo "<br><br>";
#print_r($_POST);
#echo "<br><br><br>";
#echo $secondtofinalsection;
#echo "<br><br><br>";
#echo $finalsection;

#print_r($section);


//foreach($cityarray as $key => $value)
//{
//    echo $key;
//    echo "<br><br>";
//    echo $value;
//    echo "<br><br>";
//}


?>