<?PHP

        require("db.php");
        
        $query = "SELECT * FROM ClassListFilter where
        Phone1=Phone2 And Phone2!='' and Phone1!=''
        OR Phone1=Phone3 And Phone2!='' and Phone1!=''
        OR Phone1=Phone4 And Phone2!='' and Phone1!=''
        OR Phone1=Phone5 And Phone2!='' and Phone1!=''
        OR Phone1=Phone6 And Phone2!='' and Phone1!=''
        OR Phone1=Phone7 And Phone2!='' and Phone1!=''
        
        OR Phone2=Phone3 And Phone2!='' and Phone1!=''
        OR Phone2=Phone4 And Phone2!='' and Phone1!=''
        OR Phone2=Phone5 And Phone2!='' and Phone1!=''
        OR Phone2=Phone6 And Phone2!='' and Phone1!=''
        OR Phone2=Phone7 And Phone2!='' and Phone1!=''
        
        OR Phone3=Phone4 And Phone2!='' and Phone1!='' and Phone3!=''
        OR Phone3=Phone5 And Phone2!='' and Phone1!='' and Phone3!=''
        OR Phone3=Phone6 And Phone2!='' and Phone1!='' and Phone3!=''
        OR Phone3=Phone7 And Phone2!='' and Phone1!='' and Phone3!=''
        
        OR Phone4=Phone5 And Phone2!='' and Phone1!='' and Phone3!='' and Phone4!='' And Phone5!=''
        OR Phone4=Phone6 And Phone2!='' and Phone1!='' and Phone3!='' and Phone4!='' And Phone5!=''
        OR Phone4=Phone7 And Phone2!='' and Phone1!='' and Phone3!='' and Phone4!='' And Phone5!=''
        
        OR Phone5=Phone6 And Phone2!='' and Phone1!='' and Phone3!='' and Phone4!='' And Phone5!='' And Phone6!=''
        OR Phone5=Phone7 And Phone2!='' and Phone1!='' and Phone3!='' and Phone4!='' And Phone5!='' And Phone6!=''
        
        OR Phone6=Phone7 And Phone2!='' and Phone1!='' and Phone3!='' and Phone4!='' And Phone5!='' And Phone6!='' And Phone7!=''
        
        ";
        $results = sqlsrv_query($conn,$query);
        
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $stmt = sqlsrv_query( $conn, $query , $params, $options );
                        
        $row_count = sqlsrv_num_rows( $stmt );
        
        echo "Results found: ".$row_count;                
        echo "<table border='1' bordercolor='#000000' style='background-color:#FFFFFF' width='650px' cellpadding='2' cellspacing='0'>";
        echo "<tr height='15' class='MyBody'>";
          echo "<th><font size=2>campaign</th>";
          echo "<th><font size=2>FirstName</th>";
          echo "<th><font size=2>LastName</th>";
          echo "<th><font size=2>Phone1</th>";
          echo "<th><font size=2>Phone2</th>";
          echo "<th><font size=2>Phone3</th>";
          echo "<th><font size=2>Phone4</th>";
          echo "<th><font size=2>Phone5</th>";
          echo "<th><font size=2>Phone6</th>";
          echo "<th><font size=2>Phone7</th>";
        echo "</tr>";
        
        while($row = sqlsrv_fetch_array($results))
        {
            echo "<tr height='15' class='MyBody'>";
            echo "<td><font size=2>" . $row['Campaign'] . "</td>";
            echo "<td><font size=2>" . $row['FirstName'] . "</td>";
            echo "<td><font size=2>" . $row['LastName'] . "</td>";
            echo "<td><font size=2>" . $row['Phone1'] .  "</td>";
            echo "<td><font size=2>" . $row['Phone2'] . "</td>";
            echo "<td><font size=2>" . $row['Phone3'] . "</td>";
            echo "<td><font size=2>" . $row['Phone4'] . "</td>";
            echo "<td><font size=2>" . $row['Phone5'] . "</td>";
            echo "<td><font size=2>" . $row['Phone6'] . "</td>";
            echo "<td><font size=2>" . $row['Phone7'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

?>


<?PHP

#require("db.php");
//
//$query = "SELECT * FROM ClassListFilter where
//Phone2=Phone3 And Phone2!='' and Phone1!=''
//OR Phone2=Phone4 And Phone2!='' and Phone1!=''
//OR Phone2=Phone5 And Phone2!='' and Phone1!=''
//OR Phone2=Phone6 And Phone2!='' and Phone1!=''
//OR Phone2=Phone7 And Phone2!='' and Phone1!=''
//
//";
//$results = sqlsrv_query($conn,$query);
//
//$params = array();
//$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
//$stmt = sqlsrv_query( $conn, $query , $params, $options );
//		
//$row_count = sqlsrv_num_rows( $stmt );
//
//echo "Results found: ".$row_count;                
//echo "<table border='1' bordercolor='#000000' style='background-color:#FFFFFF' width='650px' cellpadding='2' cellspacing='0'>";
//echo "<tr height='15' class='MyBody'>";
//  echo "<th><font size=2>campaign</th>";
//  echo "<th><font size=2>FirstName</th>";
//  echo "<th><font size=2>LastName</th>";
//  echo "<th><font size=2>Phone1</th>";
//  echo "<th><font size=2>Phone2</th>";
//  echo "<th><font size=2>Phone3</th>";
//  echo "<th><font size=2>Phone4</th>";
//  echo "<th><font size=2>Phone5</th>";
//  echo "<th><font size=2>Phone6</th>";
//  echo "<th><font size=2>Phone7</th>";
//echo "</tr>";
//
//while($row = sqlsrv_fetch_array($results))
//{
//    echo "<tr height='15' class='MyBody'>";
//    echo "<td><font size=2>" . $row['Campaign'] . "</td>";
//    echo "<td><font size=2>" . $row['FirstName'] . "</td>";
//    echo "<td><font size=2>" . $row['LastName'] . "</td>";
//    #echo "<td><font size=2>";
//
//    echo "<td><font size=2>";
//    echo $row['Phone1'] .  "</td>";   
//
//    //if ($row['Phone2'] == $row['Phone4'])
//    //{
//    //echo "<td><font size=2>";    
//    //echo "<strong>".$row['Phone1'] .  "</strong></td>";   
//    //}
//    //    if ($row['Phone2'] == $row['Phone5'])
//    //{
//    //echo "<td><font size=2>";    
//    //echo "<strong>".$row['Phone1'] .  "</strong></td>";   
//    //}
//    //    if ($row['Phone2'] == $row['Phone6'])
//    //{
//    //echo "<td><font size=2>";    
//    //echo "<strong>".$row['Phone1'] .  "</strong></td>";   
//    //}
//    //    if ($row['Phone2'] == $row['Phone7'])
//    //{
//    //echo "<td><font size=2>";    
//    //echo "<strong>".$row['Phone1'] .  "</strong></td>";   
//    //}
//    //    if ($row['Phone1'] == $row['Phone7'])
//    //{
//    //echo "<strong>".$row['Phone1'] .  "</strong></td>";   
//    //}
//    if ($row['Phone2'] = $row['Phone3'])
//    {
//        echo "<td><font size=2>";        
//        echo "<strong>".$row['Phone2'] .  "</strong></td>";
//        echo "<td><strong><font size=2>" . $row['Phone3'] . "</strong></td>";
//    }
//    else
//    {
//        if ($row['Phone2'] = $row['Phone4'])
//        {
//            echo "<td><font size=2>";        
//            echo "<strong>".$row['Phone2'] .  "</strong></td>";
//            echo "<td><font size=2>" . $row['Phone3'] . "</td>";
//            echo "<td><strong><font size=2>" . $row['Phone4'] . "</strong></td>";
//        }
//        else
//        {
//            if ($row['Phone2'] = $row['Phone5'])
//            {
//            echo "<td><font size=2>";        
//            echo "<strong>".$row['Phone2'] .  "</strong></td>";
//            echo "<td><font size=2>" . $row['Phone3'] . "</td>";
//            echo "<td><font size=2>" . $row['Phone4'] . "</td>";
//            echo "<td><strong><font size=2>" . $row['Phone5'] . "</strong></td>";
//            }
//            else
//            {
//            echo "<td><font size=2>" . $row['Phone2'] . "</td>";
//            echo "<td><font size=2>" . $row['Phone3'] . "</td>";
//            echo "<td><font size=2>" . $row['Phone4'] . "</td>";
//            echo "<td><font size=2>" . $row['Phone5'] . "</td>";
//            }
//        }
//    }
//    echo "<td><font size=2>" . $row['Phone4'] . "</td>";
//    echo "<td><font size=2>" . $row['Phone5'] . "</td>";
//    echo "<td><font size=2>" . $row['Phone6'] . "</td>";
//    echo "<td><font size=2>" . $row['Phone7'] . "</td>";
//    echo "</tr>";
//}
//echo "</table>";

?>

