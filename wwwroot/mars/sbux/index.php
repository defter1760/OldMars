<?PHP
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
$year = date('Y');
    $serverName = "localhost\SPICE";
    $connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
    $conn = sqlsrv_connect( $serverName, $connectionInfo );
    
$query = "SELECT TOP 1
            drinktype
            from Table_sbuxdrinktype  ORDER BY NEWID();";

            $results = sqlsrv_query($conn,$query);

            while($row = sqlsrv_fetch_array($results))
            {
                $drinktype = $row['drinktype'];
                
                $sizetable= 'Table_sbux'.$row['drinktype'];
                
                $query2 = "SELECT TOP 1
                Size
                from $sizetable  ORDER BY NEWID();";
    
                $results2 = sqlsrv_query($conn,$query2);
    
                while($row2 = sqlsrv_fetch_array($results2))
                {
                    $size = $row2['Size'];
                }
                
            }
            
        switch ($drinktype)
        {
            case ($drinktype == 'FrapSize'):
            $type = 'Fraps';
                switch ($type)
                {
                    case ($type == 'Fraps'):
                        $teatable = 'Table_sbux'.$drinktype.'type'.$type;
        
                        $query31 = "SELECT TOP 1
                        Fraps
                        from $teatable  ORDER BY NEWID();";
                        $results31 = sqlsrv_query($conn,$query31);
            
                        while($row31 = sqlsrv_fetch_array($results31))
                        {
                            $frap = $row31['Fraps'];
                        }
                        $shottable = 'Table_sbuxCaffeFinisherAddshots';
        
                        $query31 = "SELECT TOP 1
                        Addshots
                        from $shottable  ORDER BY NEWID();";
                        $results31 = sqlsrv_query($conn,$query31);
            
                        while($row31 = sqlsrv_fetch_array($results31))
                        {
                            $addshot = $row31['Addshots'];
                        }
                        $shotstyletable = 'Table_sbuxCaffeFinisherShotStyle';
        
                        $query31 = "SELECT TOP 1
                        ShotStyle
                        from $shotstyletable  ORDER BY NEWID();";
                        $results31 = sqlsrv_query($conn,$query31);
            
                        while($row31 = sqlsrv_fetch_array($results31))
                        {
                            $shotstyle = $row31['ShotStyle'];
                        }
                        $milktable = 'Table_sbuxCaffeFinisherMilk';
        
                        $query31 = "SELECT TOP 1
                        Milk
                        from $milktable  ORDER BY NEWID();";
                        $results31 = sqlsrv_query($conn,$query31);
            
                        while($row31 = sqlsrv_fetch_array($results31))
                        {
                            $milktype = $row31['Milk'];
                        }
                        $whiptable = 'Table_sbuxCaffeFinisherWhip';
        
                        $query31 = "SELECT TOP 1
                        Whip
                        from $whiptable  ORDER BY NEWID();";
                        $results31 = sqlsrv_query($conn,$query31);
            
                        while($row31 = sqlsrv_fetch_array($results31))
                        {
                            $whip = $row31['Whip'];
                        }
                        break;
                }
                
                break;
            case ($drinktype == 'HotSize'):
                $typetable= 'Table_sbux'.$drinktype.'type';

                $query3 = "SELECT TOP 1
                Type
                from $typetable  ORDER BY NEWID();";
                $results3 = sqlsrv_query($conn,$query3);
    
                while($row3 = sqlsrv_fetch_array($results3))
                {
                    $type = $row3['Type'];
                }
                switch ($type)
                {
                    case ($type == 'Tea'):
                        $teatable = 'Table_sbux'.$drinktype.'type'.$type;
        
                        $query31 = "SELECT TOP 1
                        Tea
                        from $teatable  ORDER BY NEWID();";
                        $results31 = sqlsrv_query($conn,$query31);
            
                        while($row31 = sqlsrv_fetch_array($results31))
                        {
                            $tea = $row31['Tea'];
                        }
                        $typeprint = 'Hot Tea';
                        break;
                    case ($type == 'Caffe'):
                        $caffetable = 'Table_sbux'.$drinktype.'type'.$type;
        
                        $query31 = "SELECT TOP 1
                        Caffe
                        from $caffetable  ORDER BY NEWID();";
                        $results31 = sqlsrv_query($conn,$query31);
            
                        while($row31 = sqlsrv_fetch_array($results31))
                        {
                            $caffe = $row31['Caffe'];
                        }
                        $typeprint = 'Hot Caffe';
                        $shottable = 'Table_sbuxCaffeFinisherAddshots';
        
                        $query31 = "SELECT TOP 1
                        Addshots
                        from $shottable  ORDER BY NEWID();";
                        $results31 = sqlsrv_query($conn,$query31);
            
                        while($row31 = sqlsrv_fetch_array($results31))
                        {
                            $addshot = $row31['Addshots'];
                            
                        }
                        $shotstyletable = 'Table_sbuxCaffeFinisherShotStyle';
        
                        $query31 = "SELECT TOP 1
                        ShotStyle
                        from $shotstyletable  ORDER BY NEWID();";
                        $results31 = sqlsrv_query($conn,$query31);
            
                        while($row31 = sqlsrv_fetch_array($results31))
                        {
                            $shotstyle = $row31['ShotStyle'];
                        }
                        $milktable = 'Table_sbuxCaffeFinisherMilk';
        
                        $query31 = "SELECT TOP 1
                        Milk
                        from $milktable  ORDER BY NEWID();";
                        $results31 = sqlsrv_query($conn,$query31);
            
                        while($row31 = sqlsrv_fetch_array($results31))
                        {
                            $milktype = $row31['Milk'];
                        }
                        $whiptable = 'Table_sbuxCaffeFinisherWhip';
        
                        $query31 = "SELECT TOP 1
                        Whip
                        from $whiptable  ORDER BY NEWID();";
                        $results31 = sqlsrv_query($conn,$query31);
            
                        while($row31 = sqlsrv_fetch_array($results31))
                        {
                            $whip = $row31['Whip'];
                        }
                        break;
                }
                break;
            case ($drinktype == 'IcedSize'):
               $typetable= 'Table_sbux'.$drinktype.'type';

                $query3 = "SELECT TOP 1
                Type
                from $typetable  ORDER BY NEWID();";
                $results3 = sqlsrv_query($conn,$query3);
    
                while($row3 = sqlsrv_fetch_array($results3))
                {
                    $type = $row3['Type'];
                }
                switch ($type)
                {
                    case ($type == 'IcedTea'):
                        $teatable = 'Table_sbux'.$drinktype.'type'.$type;
        
                        $query31 = "SELECT TOP 1
                        IcedTea
                        from $teatable  ORDER BY NEWID();";
                        $results31 = sqlsrv_query($conn,$query31);
            
                        while($row31 = sqlsrv_fetch_array($results31))
                        {
                            $tea = $row31['IcedTea'];
                        }
                        #$typeprint = 'Iced Tea';
                        break;
                    case ($type == 'Caffe'):
                        $caffetable = 'Table_sbux'.$drinktype.'type'.$type;
        
                        $query31 = "SELECT TOP 1
                        Caffe
                        from $caffetable  ORDER BY NEWID();";
                        $results31 = sqlsrv_query($conn,$query31);
            
                        while($row31 = sqlsrv_fetch_array($results31))
                        {
                            $caffe = $row31['Caffe'];
                        }
                        $typeprint = 'Iced Caffe';
                        
                        $shottable = 'Table_sbuxCaffeFinisherAddshots';
        
                        $query31 = "SELECT TOP 1
                        Addshots
                        from $shottable  ORDER BY NEWID();";
                        $results31 = sqlsrv_query($conn,$query31);
            
                        while($row31 = sqlsrv_fetch_array($results31))
                        {
                            $addshot = $row31['Addshots'];
                        }
                        
                        $shotstyletable = 'Table_sbuxCaffeFinisherShotStyle';
        
                        $query31 = "SELECT TOP 1
                        ShotStyle
                        from $shotstyletable  ORDER BY NEWID();";
                        $results31 = sqlsrv_query($conn,$query31);
            
                        while($row31 = sqlsrv_fetch_array($results31))
                        {
                            $shotstyle = $row31['ShotStyle'];
                        }
                        
                        $milktable = 'Table_sbuxCaffeFinisherMilk';
        
                        $query31 = "SELECT TOP 1
                        Milk
                        from $milktable  ORDER BY NEWID();";
                        $results31 = sqlsrv_query($conn,$query31);
            
                        while($row31 = sqlsrv_fetch_array($results31))
                        {
                            $milktype = $row31['Milk'];
                        }
                        

                        
                        break;
                }
                break;
        }
            
#echo $drinktype;
//echo $size;
//echo " ";
//echo $typeprint;
//echo " ";
//echo $tea;
//echo $caffe;
//echo $frap;
if (isset($addshot))
{
    if ($addshot != 'No')
    {
    $add = ' with '.$addshot.' add shot '.$shotstyle;
    }
}
if (isset($milktype))
{
    $milkprint = ' '.$milktype;
}
if (isset($whip))
{
    $whipprint = ' and '.$whip;
}
$basedrink =  $size.' '.$typeprint.''.$milkprint.' '.$tea.''.$caffe.''.$frap.''.$add.''.$whipprint;
echo 'Your drink:<br><br>';
echo $basedrink;

$query31 = "select Drink from Table_sbuxDrinklog where waslast='Yes'";
$results31 = sqlsrv_query($conn,$query31);
while($row31 = sqlsrv_fetch_array($results31))
{
$lastdrink = $row31['Drink'];
}

echo "<br><br>";
echo "Last drink made:<br><br>";
echo $lastdrink;
$query31 = "update set Table_sbuxDrinklog waslast='' where waslast='Yes'";
$results31 = sqlsrv_query($conn,$query31);

$query31 = "insert into Table_sbuxDrinklog
(Drink,date,time,week,month,waslast)
VALUES
('".$basedrink."','".$date."','".$time."','$week','$month','Yes');";
$results31 = sqlsrv_query($conn,$query31);

?>