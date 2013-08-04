<?PHP

require("style.php");
require("db.php");
require("ifset.php");
require("uniqueid_row.php");
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');
$year = date('Y');
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
    #if (isset($_POST['printingnote']))
    #{
        #if(!empty($_POST['printingnote']))
        #{
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
        #}
    #}    
}

$query = "SELECT uniqueid,IncomingCost,OutgoingCost,ScanningPages,FaxingPages,PrintingPages FROM Tbl_MailRoomOut where uniqueid='$uniqueid';";
$results = sqlsrv_query($conn,$query);

while($row = sqlsrv_fetch_array($results))
{
    if ($row['IncomingCost'] !='')
    {
        $postagearray[] = $row['IncomingCost'];
    }
    if ($row['IncomingCost'] !='')
    {
        $postagearray[] = $row['OutgoingCost'];
    }
    
    if ($row['PrintingPages'] !='')
    {
        $printingarray[] = $row['PrintingPages'];
    }
    if ($row['FaxingPages'] !='')
    {
        $faxingarray[] = $row['FaxingPages'];
    }
    if ($row['ScanningPages'] !='')
    {
        $scanningarray[] = $row['ScanningPages'];
    }
    
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
## Process Postage adding -- end --



#print_r($postagearray);
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
#$totalpostage = 5;
#$totalscanning = 0;
#$totalfaxing = 0;
#$totalprinting = 0;


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
##for faxing
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

##for printing
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

        
echo "<h6>Costs</h6>";
echo "<br><br>";
echo "<form method='POST' action='costsprofile.php?uniqueid=$uniqueid'>";
echo "<table class='costsTable' width='100%' cellspacing='2' cellpadding='4' align='left'>";
    echo "<tr>";
        echo "<td>";
            echo "<strong>Postage: </strong>";
        echo "</td>";
        echo "<td width='250px'>";
            echo "$ <input type='number' name='postageOUT' maxlength='2' step='.01' size='2px'>";
            #echo "    Incoming: <input type='number' name='postageIN' maxlength='2' step='.01' size='2px'>";
        echo "</td>";
        #echo "<td width='250px'>";
            echo "<input type='hidden' name='postagenote' size='20' value='clientprofile'>";
        #echo "</td>";
        echo "<td width='120px' align='center'>";
            echo "<input type='submit' style='width:100px;' name='addpostage' value='Add Postage'>";
        echo "</td>";
        echo "<td>";
            echo "  Total:&nbsp&nbsp$".$totalpostage;
        echo "</td>";
    echo "</tr>";
    
    echo "<tr>";
        echo "<td>";
            echo "<strong>Scanning: </strong>";
        echo "</td>";
        echo "<td>";
            echo "Pages: <input type='number' name='scanning' maxlength='4' step='1' size='4'>";
        echo "</td>";
        #echo "<td>";
            echo "<input type='hidden' name='scanningnote' size='20' value='clientprofile'>";
        #echo "</td>";
        echo "<td align='center'>";
            echo "<input type='submit' style='width:100px;' name='addscanning' value='Add Scan'>";
        echo "</td>";
        echo "<td>";
            echo "  Total:&nbsp&nbsp".$totalscanning."".$scanningpages;
        echo "</td>";
    echo "</tr>";
    
    echo "<tr>";
        echo "<td>";
            echo "<strong>Faxing: </strong>";
        echo "</td>";
        echo "<td>";
            echo "Pages: <input type='number' name='faxing' maxlength='4' step='1' size='4'>";
        echo "</td>";
        #echo "<td>";
            echo "<input type='hidden' name='faxingingnote' size='20' value='clientprofile'>";
        #echo "</td>";
        echo "<td align='center'>";
            echo "<input type='submit' style='width:100px;' name='addfaxing' value='Add Fax'>";
        echo "</td>";
        echo "<td>";
            echo "  Total:&nbsp&nbsp".$totalfaxing."".$faxingpages;
        echo "</td>";
    echo "</tr>";
    
    echo "<tr>";
        echo "<td>";
            echo "<strong>Printing: </strong>";
        echo "</td>";
        echo "<td>";
            echo "Pages: <input type='number' name='printing' maxlength='4' step='1' size='4'>";
        echo "</td>";
        #echo "<td>";
            echo "<input type='hidden' name='printingnote' size='20' value='clientprofile'>";
        #echo "</td>";
        echo "<td align='center'>";
            echo "<input type='submit' style='width:100px;' name='addprinting' value='Add Print'>";
        echo "</td>";
        echo "<td>";
            echo "  Total:&nbsp&nbsp".$totalprinting."".$printingpages;
        echo "</td>";
    echo "</tr>";    
    
echo "</table>";
echo "<input type='hidden' name='uniqueid' value='$uniqueid'>";
echo "</form>";
echo "<br><br>";


echo "<table class='costsTable clear' width='100%' cellspacing='2' cellpadding='4' align='left' style='padding-top:20px;'";
    echo "<tr>";
        echo "<th width='10%'>";
            echo "Date";
        echo "</th>";     
        echo "<th width='10%'>";
            echo "Time";
        echo "</th>";
        echo "<th width='12.5%'>";
            echo "Postage Cost";
        echo "</th>";    
        #echo "<th width='12.5%'>";
        #    echo "Outgoing Cost";
        #echo "</th>";
        //echo "<th width='25%'>";
        //    echo "Document";
        //echo "</th>";        
        echo "<th width='10%'>";
            echo "Scan Pages";
        echo "</th>";
        echo "<th width='10%'>";
            echo "Fax Pages";
        echo "</th>";
        echo "<th width='10%'>";
            echo "Print Pages";
        echo "</th>";                     
    echo "</tr>";

$query2 = "SELECT uniqueid,IncomingCost,OutgoingCost,ScanningPages,FaxingPages,PrintingPages,SentDate,SentTime,DocumentType,SendingInitials FROM Tbl_MailRoomOut where uniqueid='$uniqueid' order by num desc;";
$results2 = sqlsrv_query($conn,$query2);

while($row2 = sqlsrv_fetch_array($results2))
{
 echo "<tr>";
    echo "<td>";
        echo $row2['SentDate'];
    echo "</td>"; 
    echo "<td>";
        echo $row2['SentTime'];
    echo "</td>";
    echo "<td>";
    $printcost = $row2['IncomingCost']+$row2['OutgoingCost'];
       echo "$";
        echo $printcost;
    echo "</td>";
    #echo "<td>";
    #    echo $row2['OutgoingCost'];
    #echo "</td>";
    #echo "<td>";
    #    echo $row2['DocumentType'];
    #echo "</td>";    
    echo "<td>";
        echo $row2['ScanningPages'];
    echo "</td>";
    echo "<td>";
        echo $row2['FaxingPages'];
    echo "</td>";
    echo "<td>";
        echo $row2['PrintingPages'];
    echo "</td>";    
echo "</tr>";    
}    
echo "</table>";
?>