
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="/js/jquery-1.4.4.js"></script>

<script language="javascript">
function winClose()
{
    if (confirm("Are you sure you want to navigate away from this page?"))
    {
         window.close();
    }

    return false;
}
</script>
</head>

<body onunlod="return confirm('Are you sure you want to navigate away from this page?');">

<script language="JavaScript">
  var needToConfirm = true;
  
  window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    if (needToConfirm)
      return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";
  }
</script>


<?PHP
echo '<form action="form_1.php" method="post">';
echo '<input type="submit" value="Submit" />';
if ($_SERVER['HTTP_REFERER'] !== 'http://sqlsrv.domain.initiativelegal.com/_test/form_1.php?')
{
echo "<br>ARE YOU LOST<br>";
echo  $_SERVER['HTTP_REFERER'];
}
else
{
echo 'Email: <input type="text" name="email" size="35" /><br />';
echo 'PIN: <input type="text" name="pin"  maxlength="4" size="4" /><br />';
echo '<input type="text" name="quantity" min="1" max="5" pattern="[0-9]{7}" title="Three letter country code"/>  ';
echo '<input type="number" name="quantity" min="1" max="5" />';

echo '</form>';
echo '<br />';

$rest = "1a11sinioajsdiojasiodjaiosjdiojiojio2j34ioj234ij1";
$rest = substr($rest, 1, 100);

echo "$rest";


	echo "My dog ate it.";
}
?>

<?PHP
if ( 'POST' == $_SERVER['REQUEST_METHOD'] )
{
    echo "POST IS SET!!";
}  
 else
 {
    echo "POST IS NOT SET!!";
 }
 
//if(!empty( $_POST ))
//{
//    echo "POST IS NOT SET!!";
//}
//else
//{
//    echo "POST IS SET!!";
//}

echo "<br>";
echo "Hello Moto";

?>

</body>
</html>