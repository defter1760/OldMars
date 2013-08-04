<?PHP
require("style.php");
require("db.php");

$query = "SELECT uniqueid,FirstName,LastName,phone1,Street1,Street2,City,State,Zipcode,Email,barcode FROM Status;";
$results = sqlsrv_query($conn,$query);

	while($row = sqlsrv_fetch_array($results))
	{
            $UNIQUEID[] = $row['uniqueid'];
            $FNAME[] = $row['FirstName'];
            $LNAME[] = $row['LastName'];
            $PHONE[] = $row['phone1'];
            
            $STREET1[] = $row['Street1'];
            $STREET2[] = $row['Street2'];
            $CITY[] = $row['City'];
            $STATE[] = $row['State'];
            $ZIPCODE[] = $row['Zipcode'];            
            $EMAIL[] = $row['Email'];
            $BARCODE[] = $row['barcode'];            
        }

// Array to search:
$array = array('one', 'two', 'three', 'one');
// Array to search:
// $array = array('a'=>'one', 'b'=>'two', 'c'=>'three', 'd'=>'one');
// Temp array so we don't find the same key multipule times:
$temp = array();
// Iterate through the array:
foreach ($UNIQUEID as $key => $value)
{
    #echo $key;
    #echo "<br><br>";
    foreach ($FNAME as $key2 => $value2)
    {
        if ($key2 == $key)
        {
            #echo "Hello<br><br>";
            // Check the key hasn't already been found:
            if (!in_array($value, $temp))
            {
                // Get an array of all the positions of the key:
                $keys = array_keys($FNAME, $value);
                // Check if there is more than one position:
                if (count($keys)>1)
                {
                    // Add the key to the temp array so its not found again:
                    $temp[] = $value;
                    // Do something...
                    echo 'Found: "'.$value.'" '.count($keys).' times at position: ';
                    for($a=0;$a<count($keys);$a++)
                    {
                        echo $keys[$a].',';
                    }
                    echo "<br><br>";
                }
            }
        }
    }
}
echo "<br><br><br>";
 $duplicatearray = array();
 
 $LNAMEUNIQUE = array_unique($LNAME);
 
    foreach ($LNAMEUNIQUE as $key2 => $value2)
    {
        if (array_key_exists( $value2, $lastnameprocessed))
        {
            
        }
        else
        {
            $$value2 = array_keys($LNAMEUNIQUE, "$value2");
            $lnamecount = count($$value2);
            foreach ($$value2 as $key3 => $value3)
            {
                if ($lnamecount >=1)
                {
                    #echo 'WE GOT DUPES';
                    foreach ($UNIQUEID as $keyu => $valueu)
                    {
                        #echo "Value3:".$value3."<br>";
                        if ($value3 == $keyu)
                        {
                            if (array_key_exists($valueu, $duplicatearray))
                            {
                                foreach ($duplicatearray as $dupkey => $dupvalue)
                                {
                                    #echo $dupvalue.'<br>';
                                    if($dupkey == $valueu)
                                    {
                                        
                                        $plusone = ++$dupvalue;
                                        $duplicatearray["$valueu"] = $plusone;
                                        #echo $plusone.',';
                                    }
                                }
                            }
                            else
                            {
                                $duplicatearray["$valueu"] = 1;
                            }
                        }
                    }
                }
            }
            $lastnameprocessed["$value2"] = '1';
        }
            $plusone = 0;
            $lnamecount = array();
            $$value2 = array();
    }

 $FNAMEUNIQUE = array_unique($FNAME);
 
    foreach ($FNAMEUNIQUE as $key2 => $value2)
    {
        if (array_key_exists( $value2, $firstnameprocessed))
        {
            
        }
        else
        {
            $$value2 = array_keys($FNAMEUNIQUE, "$value2");
            $lnamecount = count($$value2);
            foreach ($$value2 as $key3 => $value3)
            {
                if ($lnamecount >=1)
                {
                    #echo 'WE GOT DUPES';
                    foreach ($UNIQUEID as $keyu => $valueu)
                    {
                        #echo "Value3:".$value3."<br>";
                        if ($value3 == $keyu)
                        {
                            if (array_key_exists($valueu, $duplicatearray))
                            {
                                foreach ($duplicatearray as $dupkey => $dupvalue)
                                {
                                    #echo $dupvalue.'<br>';
                                    if($dupkey == $valueu)
                                    {
                                        
                                        $plusone = ++$dupvalue;
                                        $duplicatearray["$valueu"] = $plusone;
                                        #echo $plusone.',';
                                    }
                                }
                            }
                            else
                            {
                                $duplicatearray["$valueu"] = 1;
                            }
                        }
                    }
                }
            }
            $firstnameprocessed["$value2"] = '1';
        }
            $plusone = 0;
            $lnamecount = array();
            $$value2 = array();
    }

$PHONENUMUNIQUE = array_unique($PHONE);
 
    foreach ($PHONENUMUNIQUE as $key2 => $value2)
    {
        if (array_key_exists( $value2, $PHONENUMprocessed))
        {
            
        }
        else
        {
            $$value2 = array_keys($PHONENUMUNIQUE, "$value2");
            $lnamecount = count($$value2);
            foreach ($$value2 as $key3 => $value3)
            {
                if ($lnamecount >=1)
                {
                    #echo 'WE GOT DUPES';
                    foreach ($UNIQUEID as $keyu => $valueu)
                    {
                        #echo "Value3:".$value3."<br>";
                        if ($value3 == $keyu)
                        {
                            if (array_key_exists($valueu, $duplicatearray))
                            {
                                foreach ($duplicatearray as $dupkey => $dupvalue)
                                {
                                    #echo $dupvalue.'<br>';
                                    if($dupkey == $valueu)
                                    {
                                        
                                        $plusone = ++$dupvalue;
                                        $duplicatearray["$valueu"] = $plusone;
                                        #echo $plusone.',';
                                    }
                                }
                            }
                            else
                            {
                                $duplicatearray["$valueu"] = 1;
                            }
                        }
                    }
                }
            }
            $PHONENUMprocessed["$value2"] = '1';
        }
            $plusone = 0;
            $lnamecount = array();
            $$value2 = array();
    }
    
    $PHONENUMUNIQUE = array_unique($PHONE);
 
    foreach ($PHONENUMUNIQUE as $key2 => $value2)
    {
        if (array_key_exists( $value2, $PHONENUMprocessed))
        {
            
        }
        else
        {
            $$value2 = array_keys($PHONENUMUNIQUE, "$value2");
            $lnamecount = count($$value2);
            foreach ($$value2 as $key3 => $value3)
            {
                if ($lnamecount >=1)
                {
                    #echo 'WE GOT DUPES';
                    foreach ($UNIQUEID as $keyu => $valueu)
                    {
                        #echo "Value3:".$value3."<br>";
                        if ($value3 == $keyu)
                        {
                            if (array_key_exists($valueu, $duplicatearray))
                            {
                                foreach ($duplicatearray as $dupkey => $dupvalue)
                                {
                                    #echo $dupvalue.'<br>';
                                    if($dupkey == $valueu)
                                    {
                                        
                                        $plusone = ++$dupvalue;
                                        $duplicatearray["$valueu"] = $plusone;
                                        #echo $plusone.',';
                                    }
                                }
                            }
                            else
                            {
                                $duplicatearray["$valueu"] = 1;
                            }
                        }
                    }
                }
            }
            $PHONENUMprocessed["$value2"] = '1';
        }
            $plusone = 0;
            $lnamecount = array();
            $$value2 = array();
    }
    
    $STREET1UNIQUE = array_unique($STREET1);
 
    foreach ($STREET1UNIQUE as $key2 => $value2)
    {
        if (array_key_exists( $value2, $STREET1processed))
        {
            
        }
        else
        {
            $$value2 = array_keys($STREET1UNIQUE, "$value2");
            $lnamecount = count($$value2);
            foreach ($$value2 as $key3 => $value3)
            {
                if ($lnamecount >=1)
                {
                    #echo 'WE GOT DUPES';
                    foreach ($UNIQUEID as $keyu => $valueu)
                    {
                        #echo "Value3:".$value3."<br>";
                        if ($value3 == $keyu)
                        {
                            if (array_key_exists($valueu, $duplicatearray))
                            {
                                foreach ($duplicatearray as $dupkey => $dupvalue)
                                {
                                    #echo $dupvalue.'<br>';
                                    if($dupkey == $valueu)
                                    {
                                        
                                        $plusone = ++$dupvalue;
                                        $duplicatearray["$valueu"] = $plusone;
                                        #echo $plusone.',';
                                    }
                                }
                            }
                            else
                            {
                                $duplicatearray["$valueu"] = 1;
                            }
                        }
                    }
                }
            }
            $STREET1processed["$value2"] = '1';
        }
            $plusone = 0;
            $lnamecount = array();
            $$value2 = array();
    }
    
    $STREET2UNIQUE = array_unique($STREET2);
 
    foreach ($STREET2UNIQUE as $key2 => $value2)
    {
        if (array_key_exists( $value2, $STREET2processed))
        {
            
        }
        else
        {
            $$value2 = array_keys($STREET2UNIQUE, "$value2");
            $lnamecount = count($$value2);
            foreach ($$value2 as $key3 => $value3)
            {
                if ($lnamecount >=1)
                {
                    #echo 'WE GOT DUPES';
                    foreach ($UNIQUEID as $keyu => $valueu)
                    {
                        #echo "Value3:".$value3."<br>";
                        if ($value3 == $keyu)
                        {
                            if (array_key_exists($valueu, $duplicatearray))
                            {
                                foreach ($duplicatearray as $dupkey => $dupvalue)
                                {
                                    #echo $dupvalue.'<br>';
                                    if($dupkey == $valueu)
                                    {
                                        
                                        $plusone = ++$dupvalue;
                                        $duplicatearray["$valueu"] = $plusone;
                                        #echo $plusone.',';
                                    }
                                }
                            }
                            else
                            {
                                $duplicatearray["$valueu"] = 1;
                            }
                        }
                    }
                }
            }
            $STREET2processed["$value2"] = '1';
        }
            $plusone = 0;
            $lnamecount = array();
            $$value2 = array();
    }
    
    $CITYUNIQUE = array_unique($CITY);
 
    foreach ($CITYUNIQUE as $key2 => $value2)
    {
        if (array_key_exists( $value2, $CITYprocessed))
        {
            
        }
        else
        {
            $$value2 = array_keys($CITYUNIQUE, "$value2");
            $lnamecount = count($$value2);
            foreach ($$value2 as $key3 => $value3)
            {
                if ($lnamecount >=1)
                {
                    #echo 'WE GOT DUPES';
                    foreach ($UNIQUEID as $keyu => $valueu)
                    {
                        #echo "Value3:".$value3."<br>";
                        if ($value3 == $keyu)
                        {
                            if (array_key_exists($valueu, $duplicatearray))
                            {
                                foreach ($duplicatearray as $dupkey => $dupvalue)
                                {
                                    #echo $dupvalue.'<br>';
                                    if($dupkey == $valueu)
                                    {
                                        
                                        $plusone = ++$dupvalue;
                                        $duplicatearray["$valueu"] = $plusone;
                                        #echo $plusone.',';
                                    }
                                }
                            }
                            else
                            {
                                $duplicatearray["$valueu"] = 1;
                            }
                        }
                    }
                }
            }
            $CITYprocessed["$value2"] = '1';
        }
            $plusone = 0;
            $lnamecount = array();
            $$value2 = array();
    }
    
    $STATEUNIQUE = array_unique($STATE);
 
    foreach ($STATEUNIQUE as $key2 => $value2)
    {
        if (array_key_exists( $value2, $STATEprocessed))
        {
            
        }
        else
        {
            $$value2 = array_keys($STATEUNIQUE, "$value2");
            $lnamecount = count($$value2);
            foreach ($$value2 as $key3 => $value3)
            {
                if ($lnamecount >=1)
                {
                    #echo 'WE GOT DUPES';
                    foreach ($UNIQUEID as $keyu => $valueu)
                    {
                        #echo "Value3:".$value3."<br>";
                        if ($value3 == $keyu)
                        {
                            if (array_key_exists($valueu, $duplicatearray))
                            {
                                foreach ($duplicatearray as $dupkey => $dupvalue)
                                {
                                    #echo $dupvalue.'<br>';
                                    if($dupkey == $valueu)
                                    {
                                        
                                        $plusone = ++$dupvalue;
                                        $duplicatearray["$valueu"] = $plusone;
                                        #echo $plusone.',';
                                    }
                                }
                            }
                            else
                            {
                                $duplicatearray["$valueu"] = 1;
                            }
                        }
                    }
                }
            }
            $STATEprocessed["$value2"] = '1';
        }
            $plusone = 0;
            $lnamecount = array();
            $$value2 = array();
    }

    $ZIPCODEUNIQUE = array_unique($ZIPCODE);
 
    foreach ($ZIPCODEUNIQUE as $key2 => $value2)
    {
        if (array_key_exists( $value2, $ZIPCODEprocessed))
        {
            
        }
        else
        {
            $$value2 = array_keys($ZIPCODEUNIQUE, "$value2");
            $lnamecount = count($$value2);
            foreach ($$value2 as $key3 => $value3)
            {
                if ($lnamecount >=1)
                {
                    #echo 'WE GOT DUPES';
                    foreach ($UNIQUEID as $keyu => $valueu)
                    {
                        #echo "Value3:".$value3."<br>";
                        if ($value3 == $keyu)
                        {
                            if (array_key_exists($valueu, $duplicatearray))
                            {
                                foreach ($duplicatearray as $dupkey => $dupvalue)
                                {
                                    #echo $dupvalue.'<br>';
                                    if($dupkey == $valueu)
                                    {
                                        
                                        $plusone = ++$dupvalue;
                                        $duplicatearray["$valueu"] = $plusone;
                                        #echo $plusone.',';
                                    }
                                }
                            }
                            else
                            {
                                $duplicatearray["$valueu"] = 1;
                            }
                        }
                    }
                }
            }
            $ZIPCODEprocessed["$value2"] = '1';
        }
            $plusone = 0;
            $lnamecount = array();
            $$value2 = array();
    }    
    
    
    $EMAILUNIQUE = array_unique($EMAIL);
 
    foreach ($EMAILUNIQUE as $key2 => $value2)
    {
        if (array_key_exists( $value2, $EMAILprocessed))
        {
            
        }
        else
        {
            $$value2 = array_keys($EMAILUNIQUE, "$value2");
            $lnamecount = count($$value2);
            foreach ($$value2 as $key3 => $value3)
            {
                if ($lnamecount >=1)
                {
                    #echo 'WE GOT DUPES';
                    foreach ($UNIQUEID as $keyu => $valueu)
                    {
                        #echo "Value3:".$value3."<br>";
                        if ($value3 == $keyu)
                        {
                            if (array_key_exists($valueu, $duplicatearray))
                            {
                                foreach ($duplicatearray as $dupkey => $dupvalue)
                                {
                                    #echo $dupvalue.'<br>';
                                    if($dupkey == $valueu)
                                    {
                                        
                                        $plusone = ++$dupvalue;
                                        $duplicatearray["$valueu"] = $plusone;
                                        #echo $plusone.',';
                                    }
                                }
                            }
                            else
                            {
                                $duplicatearray["$valueu"] = 1;
                            }
                        }
                    }
                }
            }
            $EMAILprocessed["$value2"] = '1';
        }
            $plusone = 0;
            $lnamecount = array();
            $$value2 = array();
    }
    
    
    $BARCODEUNIQUE = array_unique($BARCODE);
 
    foreach ($BARCODEUNIQUE as $key2 => $value2)
    {
        if (array_key_exists( $value2, $BARCODEprocessed))
        {
            
        }
        else
        {
            $$value2 = array_keys($BARCODEUNIQUE, "$value2");
            $lnamecount = count($$value2);
            foreach ($$value2 as $key3 => $value3)
            {
                if ($lnamecount >=1)
                {
                    #echo 'WE GOT DUPES';
                    foreach ($UNIQUEID as $keyu => $valueu)
                    {
                        #echo "Value3:".$value3."<br>";
                        if ($value3 == $keyu)
                        {
                            if (array_key_exists($valueu, $duplicatearray))
                            {
                                foreach ($duplicatearray as $dupkey => $dupvalue)
                                {
                                    #echo $dupvalue.'<br>';
                                    if($dupkey == $valueu)
                                    {
                                        
                                        $plusone = ++$dupvalue;
                                        $duplicatearray["$valueu"] = $plusone;
                                        #echo $plusone.',';
                                    }
                                }
                            }
                            else
                            {
                                $duplicatearray["$valueu"] = 1;
                            }
                        }
                    }
                }
            }
            $BARCODEprocessed["$value2"] = '1';
        }
            $plusone = 0;
            $lnamecount = array();
            $$value2 = array();
    }
    

    echo "<table border=2>";
        echo "<tr>";
            echo "<th>";
                echo "Score";
            echo "</th>";
            echo "<th>";
                echo "Uniqueid";
            echo "</th>";
            echo "<th>";
                echo "First Name";
            echo "</th>";
            echo "<th>";
                echo "Last Name";
            echo "</th>";
            echo "<th>";
                echo "Phone";
            echo "</th>";
            echo "<th>";
                echo "Street 1";
            echo "</th>";
            echo "<th>";
                echo "Street 2";
            echo "</th>";
            echo "<th>";
                echo "City";
            echo "</th>";
            echo "<th>";
                echo "State";
            echo "</th>";
            echo "<th>";
                echo "Zipcode";
            echo "</th>";
            echo "<th>";
                echo "Email";
            echo "</th>";
            echo "<th>";
                echo "Barcode";
            echo "</th>";
        echo "</tr>";            
foreach ($duplicatearray as $dupkey2 => $dupvalue2)
{
    switch ($dupvalue2)
    {
        case ($dupvalue2 > '10'):
        $query2 = "SELECT uniqueid,FirstName,LastName,phone1,Street1,Street2,City,State,Zipcode,Email,barcode FROM Status WHERE uniqueid = '".$dupkey2."';";
        $results2 = sqlsrv_query($conn,$query2);

	while($row2 = sqlsrv_fetch_array($results2))
	{
        echo "<tr>";
            echo "<td>";
                echo $dupvalue2;
            echo "</td>";
            echo "<td>";
                echo $row2['uniqueid'];
            echo "</td>";
            echo "<td>";
                echo $row2['FirstName'];
            echo "</td>";
            echo "<td>";
                echo $row2['LastName'];
            echo "</td>";
            echo "<td>";
                echo $row2['phone1'];
            echo "</td>";
            echo "<td>";
                echo $row2['Street1'];
            echo "</td>";
            echo "<td>";
                echo $row2['Street2'];
            echo "</td>";
            echo "<td>";
                echo $row2['City'];
            echo "</td>";
            echo "<td>";
                echo $row2['State'];
            echo "</td>";
            echo "<td>";
                echo $row2['Zipcode'];
            echo "</td>";
            echo "<td>";
                echo $row2['Email'];
            echo "</td>";
            echo "<td>";
                echo $row2['barcode'];
            echo "</td>";
        echo "</tr>";
        }
        break;
        case ($dupvalue2 == '10'):
        $query2 = "SELECT uniqueid,FirstName,LastName,phone1,Street1,Street2,City,State,Zipcode,Email,barcode FROM Status WHERE uniqueid = '".$dupkey2."';";
        $results2 = sqlsrv_query($conn,$query2);

	while($row2 = sqlsrv_fetch_array($results2))
	{
        echo "<tr>";
            echo "<td>";
                echo "10";
            echo "</td>";
            echo "<td>";
                echo $row2['uniqueid'];
            echo "</td>";
            echo "<td>";
                echo $row2['FirstName'];
            echo "</td>";
            echo "<td>";
                echo $row2['LastName'];
            echo "</td>";
            echo "<td>";
                echo $row2['phone1'];
            echo "</td>";
            echo "<td>";
                echo $row2['Street1'];
            echo "</td>";
            echo "<td>";
                echo $row2['Street2'];
            echo "</td>";
            echo "<td>";
                echo $row2['City'];
            echo "</td>";
            echo "<td>";
                echo $row2['State'];
            echo "</td>";
            echo "<td>";
                echo $row2['Zipcode'];
            echo "</td>";
            echo "<td>";
                echo $row2['Email'];
            echo "</td>";
            echo "<td>";
                echo $row2['barcode'];
            echo "</td>";
        echo "</tr>";
        }
        break;
    case ($dupvalue2 == '9'):
        $query2 = "SELECT uniqueid,FirstName,LastName,phone1,Street1,Street2,City,State,Zipcode,Email,barcode FROM Status WHERE uniqueid = '".$dupkey2."';";
        $results2 = sqlsrv_query($conn,$query2);

	while($row2 = sqlsrv_fetch_array($results2))
	{
        echo "<tr>";
            echo "<td>";
                echo "9";
            echo "</td>";
            echo "<td>";
                echo $row2['uniqueid'];
            echo "</td>";
            echo "<td>";
                echo $row2['FirstName'];
            echo "</td>";
            echo "<td>";
                echo $row2['LastName'];
            echo "</td>";
            echo "<td>";
                echo $row2['phone1'];
            echo "</td>";
            echo "<td>";
                echo $row2['Street1'];
            echo "</td>";
            echo "<td>";
                echo $row2['Street2'];
            echo "</td>";
            echo "<td>";
                echo $row2['City'];
            echo "</td>";
            echo "<td>";
                echo $row2['State'];
            echo "</td>";
            echo "<td>";
                echo $row2['Zipcode'];
            echo "</td>";
            echo "<td>";
                echo $row2['Email'];
            echo "</td>";
            echo "<td>";
                echo $row2['barcode'];
            echo "</td>";
        echo "</tr>";
        }
        break;
    case ($dupvalue2 == '8'):
        $query2 = "SELECT uniqueid,FirstName,LastName,phone1,Street1,Street2,City,State,Zipcode,Email,barcode FROM Status WHERE uniqueid = '".$dupkey2."';";
        $results2 = sqlsrv_query($conn,$query2);

	while($row2 = sqlsrv_fetch_array($results2))
	{
        echo "<tr>";
            echo "<td>";
                echo "8";
            echo "</td>";
            echo "<td>";
                echo $row2['uniqueid'];
            echo "</td>";
            echo "<td>";
                echo $row2['FirstName'];
            echo "</td>";
            echo "<td>";
                echo $row2['LastName'];
            echo "</td>";
            echo "<td>";
                echo $row2['phone1'];
            echo "</td>";
            echo "<td>";
                echo $row2['Street1'];
            echo "</td>";
            echo "<td>";
                echo $row2['Street2'];
            echo "</td>";
            echo "<td>";
                echo $row2['City'];
            echo "</td>";
            echo "<td>";
                echo $row2['State'];
            echo "</td>";
            echo "<td>";
                echo $row2['Zipcode'];
            echo "</td>";
            echo "<td>";
                echo $row2['Email'];
            echo "</td>";
            echo "<td>";
                echo $row2['barcode'];
            echo "</td>";
        echo "</tr>";
        }    
        break;
    case ($dupvalue2 == '7'):
        $query2 = "SELECT uniqueid,FirstName,LastName,phone1,Street1,Street2,City,State,Zipcode,Email,barcode FROM Status WHERE uniqueid = '".$dupkey2."';";
        $results2 = sqlsrv_query($conn,$query2);

	while($row2 = sqlsrv_fetch_array($results2))
	{
        echo "<tr>";
            echo "<td>";
                echo "7";
            echo "</td>";
            echo "<td>";
                echo $row2['uniqueid'];
            echo "</td>";
            echo "<td>";
                echo $row2['FirstName'];
            echo "</td>";
            echo "<td>";
                echo $row2['LastName'];
            echo "</td>";
            echo "<td>";
                echo $row2['phone1'];
            echo "</td>";
            echo "<td>";
                echo $row2['Street1'];
            echo "</td>";
            echo "<td>";
                echo $row2['Street2'];
            echo "</td>";
            echo "<td>";
                echo $row2['City'];
            echo "</td>";
            echo "<td>";
                echo $row2['State'];
            echo "</td>";
            echo "<td>";
                echo $row2['Zipcode'];
            echo "</td>";
            echo "<td>";
                echo $row2['Email'];
            echo "</td>";
            echo "<td>";
                echo $row2['barcode'];
            echo "</td>";
        echo "</tr>";
        }    
        break;
    case ($dupvalue2 == '6'):
        $query2 = "SELECT uniqueid,FirstName,LastName,phone1,Street1,Street2,City,State,Zipcode,Email,barcode FROM Status WHERE uniqueid = '".$dupkey2."';";
        $results2 = sqlsrv_query($conn,$query2);

	while($row2 = sqlsrv_fetch_array($results2))
	{
        echo "<tr>";
            echo "<td>";
                echo "6";
            echo "</td>";
            echo "<td>";
                echo $row2['uniqueid'];
            echo "</td>";
            echo "<td>";
                echo $row2['FirstName'];
            echo "</td>";
            echo "<td>";
                echo $row2['LastName'];
            echo "</td>";
            echo "<td>";
                echo $row2['phone1'];
            echo "</td>";
            echo "<td>";
                echo $row2['Street1'];
            echo "</td>";
            echo "<td>";
                echo $row2['Street2'];
            echo "</td>";
            echo "<td>";
                echo $row2['City'];
            echo "</td>";
            echo "<td>";
                echo $row2['State'];
            echo "</td>";
            echo "<td>";
                echo $row2['Zipcode'];
            echo "</td>";
            echo "<td>";
                echo $row2['Email'];
            echo "</td>";
            echo "<td>";
                echo $row2['barcode'];
            echo "</td>";
        echo "</tr>";
        }    
        break;
    case ($dupvalue2 == '5'):
        $query2 = "SELECT uniqueid,FirstName,LastName,phone1,Street1,Street2,City,State,Zipcode,Email,barcode FROM Status WHERE uniqueid = '".$dupkey2."';";
        $results2 = sqlsrv_query($conn,$query2);

	while($row2 = sqlsrv_fetch_array($results2))
	{
        echo "<tr>";
            echo "<td>";
                echo "5";
            echo "</td>";
            echo "<td>";
                echo $row2['uniqueid'];
            echo "</td>";
            echo "<td>";
                echo $row2['FirstName'];
            echo "</td>";
            echo "<td>";
                echo $row2['LastName'];
            echo "</td>";
            echo "<td>";
                echo $row2['phone1'];
            echo "</td>";
            echo "<td>";
                echo $row2['Street1'];
            echo "</td>";
            echo "<td>";
                echo $row2['Street2'];
            echo "</td>";
            echo "<td>";
                echo $row2['City'];
            echo "</td>";
            echo "<td>";
                echo $row2['State'];
            echo "</td>";
            echo "<td>";
                echo $row2['Zipcode'];
            echo "</td>";
            echo "<td>";
                echo $row2['Email'];
            echo "</td>";
            echo "<td>";
                echo $row2['barcode'];
            echo "</td>";
        echo "</tr>";
        }    
        break;
    case ($dupvalue2 == '4'):
        $query2 = "SELECT uniqueid,FirstName,LastName,phone1,Street1,Street2,City,State,Zipcode,Email,barcode FROM Status WHERE uniqueid = '".$dupkey2."';";
        $results2 = sqlsrv_query($conn,$query2);

	while($row2 = sqlsrv_fetch_array($results2))
	{
        echo "<tr>";
            echo "<td>";
                echo "4";
            echo "</td>";
            echo "<td>";
                echo $row2['uniqueid'];
            echo "</td>";
            echo "<td>";
                echo $row2['FirstName'];
            echo "</td>";
            echo "<td>";
                echo $row2['LastName'];
            echo "</td>";
            echo "<td>";
                echo $row2['phone1'];
            echo "</td>";
            echo "<td>";
                echo $row2['Street1'];
            echo "</td>";
            echo "<td>";
                echo $row2['Street2'];
            echo "</td>";
            echo "<td>";
                echo $row2['City'];
            echo "</td>";
            echo "<td>";
                echo $row2['State'];
            echo "</td>";
            echo "<td>";
                echo $row2['Zipcode'];
            echo "</td>";
            echo "<td>";
                echo $row2['Email'];
            echo "</td>";
            echo "<td>";
                echo $row2['barcode'];
            echo "</td>";
        echo "</tr>";
        }    
        break;
    case ($dupvalue2 == '3'):
        $query2 = "SELECT uniqueid,FirstName,LastName,phone1,Street1,Street2,City,State,Zipcode,Email,barcode FROM Status WHERE uniqueid = '".$dupkey2."';";
        $results2 = sqlsrv_query($conn,$query2);

	while($row2 = sqlsrv_fetch_array($results2))
	{
        echo "<tr>";
            echo "<td>";
                echo "3";
            echo "</td>";
            echo "<td>";
                echo $row2['uniqueid'];
            echo "</td>";
            echo "<td>";
                echo $row2['FirstName'];
            echo "</td>";
            echo "<td>";
                echo $row2['LastName'];
            echo "</td>";
            echo "<td>";
                echo $row2['phone1'];
            echo "</td>";
            echo "<td>";
                echo $row2['Street1'];
            echo "</td>";
            echo "<td>";
                echo $row2['Street2'];
            echo "</td>";
            echo "<td>";
                echo $row2['City'];
            echo "</td>";
            echo "<td>";
                echo $row2['State'];
            echo "</td>";
            echo "<td>";
                echo $row2['Zipcode'];
            echo "</td>";
            echo "<td>";
                echo $row2['Email'];
            echo "</td>";
            echo "<td>";
                echo $row2['barcode'];
            echo "</td>";
        echo "</tr>";
        }        
        break;
    
    }
}
    echo "</table>";
echo "<br><br><br>";
echo "";
echo "<br><br><br>";

?>