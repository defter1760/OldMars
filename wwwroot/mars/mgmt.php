<?PHP
require("mgmtheader.php");
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
if (empty($_REQUEST['brand'])) $_REQUEST['brand'] = '';
if (empty($_REQUEST['ani'])) $_REQUEST['ani'] = '';
$page = "search.php?brand=".$_REQUEST['brand']."&ani=".$_REQUEST['ani'];
$border = "0";
$name = "search";
$height = "80%";
?>

<link rel="stylesheet" href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/marsParent.css" type="text/css" />

<?PHP
if(isset($_GET['ani']))
{
  if($_GET['ani'] != '')
  {
    echo "<div id='intro'>";
echo "<p>Hi, my name is ___________ and I am an attorney with Initiative Legal Group.</p>";
echo "<p>Are you calling about your employment at Macy's?</p>";
echo "</div>";
  }
}


echo "<iframe name='";
	echo $name;
	echo "' scrolling='auto' width='100%' height='";
	echo $height;
	echo "' frameborder='".$border."' style='margin:auto;' src='";
	echo $page;
echo "'></iframe>";
?>


</body>
</html>