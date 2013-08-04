<?PHP
$waffleit = '1';
echo "<br>";
echo "<table>";
if ($waffleit == '1')
{
echo "<tr style='background-color:#FFFFFF'>";
echo "<td>";

}
else
if ($waffleit == '0')
{
echo "<tr style='background-color:#DADADA'>";
echo "<td>";   
#$waffleit = '1';

}
echo "Hello1";
echo "</td>";
echo "</tr>";
if ($waffleit == '1') {$waffleit=$waffleit-'1';} else{ if($waffleit == '0'){ $waffleit=$waffleit-'1'; }};
if ($waffleit == '1')
{
echo "<tr style='background-color:#FFFFFF'>";
echo "<td>";

}
else
if ($waffleit == '0')
{
echo "<tr style='background-color:#DADADA'>";
echo "<td>"; 
#$waffleit = '1';


}
echo "Hello2";
echo "</td>";
if ($waffleit == '1') {$waffleit=$waffleit-'1';} else{ if($waffleit == '0'){ $waffleit=$waffleit-'1'; }};
if ($waffleit == '1')
{
echo "<tr style='background-color:#FFFFFF'>";
echo "<td>";
#$waffleit = '0';
}
else
if ($waffleit == '0')
{
echo "<tr style='background-color:#DADADA'>";
echo "<td>"; 
#$waffleit = '1';


}
echo "Hello2";
echo "</td>";
if ($waffleit == '1') {$waffleit=$waffleit-'1';} else{ if($waffleit == '0'){ $waffleit=$waffleit-'1'; }};
echo "</table>";
?>