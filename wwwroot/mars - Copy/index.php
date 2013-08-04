<?PHP 


require("style.php");//docutype, css
?>
<style type="text/css">

/*this centers the whole document :)*/
div#main {

  width:93%;
  height:100%;
  /*width:700px;*/
  margin-left: auto;

  margin-right: auto;

  text-align: left;

}
</style>
<?PHP
require("db.php");//database connection information
require("ifset.php");//assign variables to database fields if they are set via request or post, unset them if they don't contain data(blank)
require("functions.php");//functions

#iframemake('client2.php',$uniqueid,'2000px','contact','0');
#iframemakeclean('search.php','1000px','contact','0');

$page = "search.php?brand=".$_REQUEST['brand']."&ani=".$_REQUEST['ani'];
$border = "0";
$name = "search";
$height = "1000px";

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