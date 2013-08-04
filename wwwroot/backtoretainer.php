<?PHP
$uniqueid = $_GET['uniqueid'];
echo '<script type="text/javascript">';
echo 'function reloadPage()';
echo '{';
#echo 'window.top.location.replace("http://yourlawsuit.com/macys/afterauthorization/?uniqueid='.$uniqueid.'");';	
echo 'window.top.location.replace("https://macyslawsuit.com/retainer-version-2/?uniqueid='.$uniqueid.'");';
echo '}';
echo '</script>';
echo '<body onload="reloadPage()">';
?>