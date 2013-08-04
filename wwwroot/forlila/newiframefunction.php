<?PHP
function iframemake($page,$uniqueid,$height,$name,$border)
{
echo '<table id="frame" width="100%" border="0" cellspacing="0" cellpadding="5" style="height:'.$height.'px;">';
  echo '<tr>';
    echo '<td height="'.$height.'px" valign="top">';
    
IF (isset($_GET['uniqueid']))
{
$uniqueid = $_GET['uniqueid'];
IF (!empty($uniqueid))
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
else
{
    echo "Please be sure to use the link from your email.";
}
}
else
{
    echo "Please be sure to use the link from your email.";
}
echo '</td>';
echo '</tr>';
echo '</table>';
}

    iframemake('http://sql.initiativelegal.com:35535/getretainer.php',$uniqueid,'3200px','getretainer','1');



?>