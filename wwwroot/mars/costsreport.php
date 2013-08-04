<?PHP
require("mgmtheader.php");
require("db.php");
require("ifset.php");
require("uniqueid_row.php");
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
$year = date('Y');
?>

<link rel="stylesheet" href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/marsParent.css" type="text/css" />

<?php
$thisbrand = 'Macys';
$mrinitials = 'ClientProfile';
## Process Postage adding -- Start --
if (isset($_POST['addpostage']))
{
    if (isset($_POST['postagenote']))
    {
        if(!empty($_POST['postagenote']))
        {
            $postagein = $_POST['postageIN'];
            $postageout = $_POST['postageOUT'];
            $postagenote = $_POST['postagenote'];
            $query = "insert into Tbl_MailRoomOut
                (FirstName,LastName,uniqueid,SentDate,SentTime,DocumentType,SendingInitials,OutgoingCost,Campaign,IncomingCost,SentWeek,SentMonth,SentYear)
                                VALUES
                                ('$FirstName','$LastName','$uniqueid','$date','$time','$postagenote','$mrinitials','$postageout','$thisbrand','$postagein','$week','$month','$year');";
                                $results = sqlsrv_query($conn,$query);
        }
    }    
}

if (isset($_POST['addscanning']))
{
    if (isset($_POST['scanningnote']))
    {
        if(!empty($_POST['scanningnote']))
        {
            if(!empty($_POST['scanning']))
            {
            $scanningin = $_POST['scanning'];
            $scanningnote = $_POST['scanningnote'];
            $query = "insert into Tbl_MailRoomOut
                (FirstName,LastName,uniqueid,SentDate,SentTime,DocumentType,SendingInitials,ScanningPages,Campaign,SentWeek,SentMonth,SentYear)
                                VALUES
                                ('$FirstName','$LastName','$uniqueid','$date','$time','$scanningnote','$mrinitials','$scanningin','$thisbrand','$week','$month','$year');";
                                $results = sqlsrv_query($conn,$query);
            }
        }
    }    
}

if (isset($_POST['addfaxing']))
{
    if (isset($_POST['faxingingnote']))
    {
        if(!empty($_POST['faxingingnote']))
        {
            if(!empty($_POST['faxing']))
            {
            $faxing = $_POST['faxing'];
            $faxingingnote = $_POST['faxingingnote'];
            $query = "insert into Tbl_MailRoomOut
                (FirstName,LastName,uniqueid,SentDate,SentTime,DocumentType,SendingInitials,FaxingPages,Campaign,SentWeek,SentMonth,SentYear)
                                VALUES
                                ('$FirstName','$LastName','$uniqueid','$date','$time','$faxingingnote','$mrinitials','$faxing','$thisbrand','$week','$month','$year');";
                                $results = sqlsrv_query($conn,$query);
            }
        }
    }    
}

if (isset($_POST['addprinting']))
{
    if (isset($_POST['printingnote']))
    {
        if(!empty($_POST['printingnote']))
        {
            if(!empty($_POST['printing']))
            {
                $printing = $_POST['printing'];
                $printingnote = $_POST['printingnote'];
                $query = "insert into Tbl_MailRoomOut
                    (FirstName,LastName,uniqueid,SentDate,SentTime,DocumentType,SendingInitials,PrintingPages,Campaign,SentWeek,SentMonth,SentYear)
                                    VALUES
                                    ('$FirstName','$LastName','$uniqueid','$date','$time','$printingnote','$mrinitials','$printing','$thisbrand','$week','$month','$year');";
                                    $results = sqlsrv_query($conn,$query);
            }
        }
    }    
}

$query = "SELECT uniqueid,IncomingCost,OutgoingCost,ScanningPages,FaxingPages,PrintingPages FROM Tbl_MailRoomOut where uniqueid='$uniqueid';";
$results = sqlsrv_query($conn,$query);



        
echo "<br>";
echo "<h2>Costs</h2>";
//echo "<form method='POST' action='costsprofile.php?uniqueid=$uniqueid'>";
//echo "<table class='clientProfileTable clear' width='100%' cellspacing='2' cellpadding='4' align='left'>";
//    echo "<tr>";
//        echo "<td valign='top' width='10%'>";
//            echo "Postage: ";
//        echo "</td>";
//        echo "<td valign='top' width='30%'>";
//            echo "Outgoing<input type='number' name='postageOUT' maxlength='2' step='.01' size='2px'>";
//            echo "<br>Incoming<input type='number' name='postageIN' maxlength='2' step='.01' size='2px'>";
//        echo "</td>";
//        echo "<td valign='top' width='30%'>";
//            echo "Note:<input type='text' name='postagenote' size='20' >";
//        echo "</td>";
//        echo "<td valign='top' width='10%'>";
//            echo "<input type='submit' style='width:300px;' name='addpostage' value='Add Postage'>";
//        echo "</td>";
//        echo "<td valign='top' width='20%'>";
//            echo "Total:&nbsp&nbsp$".$totalpostage;
//        echo "</td>";
//    echo "</tr>";
//    
//    echo "<tr>";
//        echo "<td valign='top'>";
//            echo "Scanning: ";
//        echo "</td>";
//        echo "<td valign='top'>";
//            echo "&nbsp&nbsp<input type='number' name='scanning' maxlength='4' step='1' size='4'> Pages";
//        echo "</td>";
//        echo "<td valign='top'>";
//            echo "Note:<input type='text' name='scanningnote' size='20'>";
//        echo "</td>";
//        echo "<td valign='top'>";
//            echo "<input type='submit' style='width:300px;' name='addscanning' value='Add Scan'>";
//        echo "</td>";
//        echo "<td valign='top'>";
//            echo "Total:&nbsp&nbsp".$totalscanning."".$scanningpages;
//        echo "</td>";
//    echo "</tr>";
//    
//    echo "<tr>";
//        echo "<td valign='top'>";
//            echo "Faxing: ";
//        echo "</td>";
//        echo "<td valign='top'>";
//            echo "&nbsp&nbsp<input type='number' name='faxing' maxlength='4' step='1' size='4'> Pages";
//        echo "</td>";
//        echo "<td valign='top'>";
//            echo "Note:<input type='text' name='faxingingnote' size='20'>";
//        echo "</td>";
//        echo "<td valign='top'>";
//            echo "<input type='submit' style='width:300px;' name='addfaxing' value='Add Fax'>";
//        echo "</td>";
//        echo "<td valign='top'>";
//            echo "Total:&nbsp&nbsp".$totalfaxing."".$faxingpages;
//        echo "</td>";
//    echo "</tr>";
//    
//    echo "<tr>";
//        echo "<td valign='top'>";
//            echo "Printing: ";
//        echo "</td>";
//        echo "<td valign='top'>";
//            echo "&nbsp&nbsp<input type='number' name='printing' maxlength='4' step='1' size='4'> Pages";
//        echo "</td>";
//        echo "<td valign='top'>";
//            echo "Note:<input type='text' name='printingnote' size='20'>";
//        echo "</td>";
//        echo "<td valign='top'>";
//            echo "<input type='submit' style='width:300px;' name='addprinting' value='Add Print'>";
//        echo "</td>";
//        echo "<td valign='top'>";
//            echo "Total:&nbsp&nbsp".$totalprinting."".$printingpages;
//        echo "</td>";
//    echo "</tr>";    
//    
//echo "</table>";
//echo "<input type='hidden' name='uniqueid' value='$uniqueid'>";
//echo "</form>";
//echo "<br><br>";


echo "<table class='costsTable' width='100%' cellspacing='2' cellpadding='4' align='left'>";
    echo "<tr>";
        echo "<th width='15%'>";
            echo "Uniqueid";
        echo "</th>";     
        echo "<th width='15%'>";
            echo "First Name";
        echo "</th>";
        echo "<th width='15%'>";
            echo "Last Name";
        echo "</th>";        
        echo "<th width='15%'>";
            echo "Postage Cost";
        echo "</th>";    
        //echo "<th width='12.5%'>";
        //    echo "Outgoing Cost";
        //echo "</th>";
        //echo "<th width='25%'>";
        //    echo "Document";
        //echo "</th>";        
        echo "<th width='15%'>";
            echo "Scan Pages";
        echo "</th>";
        echo "<th width='15%'>";
            echo "Fax Pages";
        echo "</th>";
        echo "<th width='15%'>";
            echo "Print Pages";
        echo "</th>";                     
    echo "</tr>";

            $query3 = "SELECT uniqueid,FirstName,LastName,IncomingCost,OutgoingCost,ScanningPages,FaxingPages,PrintingPages,SentDate,SentTime,DocumentType,SendingInitials FROM Tbl_MailRoomOut order by uniqueid, num desc;";
        $results3 = sqlsrv_query($conn,$query3);
    while($row3 = sqlsrv_fetch_array($results3))
    {
        if ($row3['IncomingCost'] !='')
        {
            $totalpostagearray[] = $row3['IncomingCost'];
        }
        if ($row3['IncomingCost'] !='')
        {
            $postagearray[] = $row3['OutgoingCost'];
        }
        if ($row3['PrintingPages'] !='')
        {
            $totalprintingarray[] = $row3['PrintingPages'];
        }
        if ($row3['FaxingPages'] !='')
        {
            $totalfaxingarray[] = $row3['FaxingPages'];
        }
        if ($row3['ScanningPages'] !='')
        {
            $totalscanningarray[] = $row3['ScanningPages'];
        }
    }
$query = "select distinct uniqueid, FirstName, LastName from Tbl_MailRoomOut;";    
    $results = sqlsrv_query($conn,$query);
    while($row = sqlsrv_fetch_array($results))
    {
        
        $unid = $row['uniqueid'];
        
        $query5 = "select agentlname from status where uniqueid='$unid';";    
        $results5 = sqlsrv_query($conn,$query5);
        while($row5 = sqlsrv_fetch_array($results5))
        {
            $currentagent = $row5['agentlname'];
        }
        #$unid = '2BYTH74N2PH7ACBPD';
        $query2 = "SELECT uniqueid,FirstName,LastName,IncomingCost,OutgoingCost,ScanningPages,FaxingPages,PrintingPages,SentDate,SentTime,DocumentType,SendingInitials FROM Tbl_MailRoomOut where uniqueid='$unid'order by uniqueid, num desc;";
        $results2 = sqlsrv_query($conn,$query2);

        while($row2 = sqlsrv_fetch_array($results2))
        {

            if ($row2['IncomingCost'] !='')
            {
                $postagearray[] = $row2['IncomingCost'];
            }
            if ($row2['IncomingCost'] !='')
            {
                $postagearray[] = $row2['OutgoingCost'];
            }
    
            if ($row2['PrintingPages'] !='')
            {
                $printingarray[] = $row2['PrintingPages'];
            }
            if ($row2['FaxingPages'] !='')
            {
                $faxingarray[] = $row2['FaxingPages'];
            }
            if ($row2['ScanningPages'] !='')
            {
                $scanningarray[] = $row2['ScanningPages'];
            }
            foreach ($postagearray as $key => $value)
            {
                $totalpostage += $value;
            }
            foreach ($scanningarray as $key => $value)
            {
                $totalscanning += $value;
            }
            foreach ($faxingarray as $key => $value)
            {
                $totalfaxing += $value;
            }
            foreach ($printingarray as $key => $value)
            {
                $totalprinting += $value;
            }
            if (empty($totalprinting))
            {
                $totalprinting = '0';
            }
            if (empty($totalpostage))
            {
                $totalpostage = '0';
            }
            if (empty($totalscanning))
            {
                $totalscanning = '0';
            }
            if (empty($totalfaxing))
            {
                $totalfaxing = '0';
            }
            if ($totalscanning > 1)
            {
                $scanningpages = ' pages';
            }
            else
            {
                if ($totalscanning < 1)
                {
                    $scanningpages = ' pages';
                }
                else
                {
                    $scanningpages = ' page';
                }
            }

            if ($totalfaxing > 1)
            {
                $faxingpages = ' pages';
            }
            else
            {
                if ($totalfaxing < 1)
                {
                    $faxingpages = ' pages';
                }
                else
                {
                    $faxingpages = ' page';
                }
            }

            if ($totalprinting > 1)
            {
                $printingpages = ' pages';
            }
            else
            {
                if ($totalprinting < 1)
                {
                    $printingpages = ' pages';
                }
                else
                {
                    $printingpages = ' page';
                }
            }

        $postagearray = array();
        $faxingarray = array();
        $printingarray = array();
        $scanningarray = array();
        }
        if ($totalsreported != '1')
        {
            foreach ($totalpostagearray as $key => $value)
            {
                $totalpostagetotal += $value;
            }
            foreach ($totalscanningarray as $key => $value)
            {
                $totalscanningtotal += $value;
            }
            foreach ($totalfaxingarray as $key => $value)
            {
                $totalfaxingtotal += $value;
            }
            foreach ($totalprintingarray as $key => $value)
            {
                $totalprintingtotal += $value;
            }                        
            echo "<tr>";
               echo "<td>";
				   echo "<strong>";
                   echo 'Total';
				   echo "</strong>";
               echo "</td>"; 
               echo "<td>";
                   echo "";
               echo "</td>";
               echo "<td>";
                   echo "";
               echo "</td>";               
               echo "<td>";
				   echo "<strong>";
                   echo "$";
                   echo $totalpostagetotal;
				   echo "</strong>";
               echo "</td>";
               echo "<td>";
				   echo "<strong>";
                   echo $totalscanningtotal;
				   echo "</strong>";
               echo "</td>";
               echo "<td>";
				   echo "<strong>";
                   echo $totalfaxingtotal;
				   echo "</strong>";
               echo "</td>";
               echo "<td>";
				   echo "<strong>";
                   echo $totalprintingtotal;
				   echo "</strong>";  
               echo "</td>";  
           echo "</tr>";
           $totalsreported = '1';
        }
        else
        {
            echo "<tr>";
               echo "<td><a href='client3.php?uniqueid=".$row['uniqueid']."'>";
                   echo $row['uniqueid'];
               echo "</a></td>"; 
               echo "<td>";
                   echo $row['FirstName'];
               echo "</td>";
               echo "<td>";
                   echo $row['LastName'];
               echo "</td>";               
               echo "<td>";
                   echo "$";
                   echo $totalpostage;
               echo "</td>";
               echo "<td>";
                   echo $totalscanning.$scanningpages;
               echo "</td>";
               echo "<td>";
                   echo $totalfaxing.$faxingpages;
               echo "</td>";
               echo "<td>";
                   echo $totalprinting.$printingpages;
               echo "</td>";    
           echo "</tr>";
        }
        #print_r($postagearray);
        #$postagearray = array();
        $totalpostage = 0;
        $totalprinting = 0;
        $totalfaxing = 0;
        $totalscanning = 0;
        //empty($totalscanning);
        //empty($totalfaxing);
        //empty($totalprinting);        
    }
?>