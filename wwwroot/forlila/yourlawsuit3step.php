<?PHP
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

IF (isset($_GET['uniqueid']))
{
$uniqueid = $_GET['uniqueid'];
IF (!empty($uniqueid))
{
    iframemake('http://sql.initiativelegal.com:35535/3step.php',$uniqueid,'100%','3step','0');
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
?>