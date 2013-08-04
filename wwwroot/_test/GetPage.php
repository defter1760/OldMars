<?php
#$url = https://my.spicecsm.com/srv_calls/print.php?caseid=125&comp=MassAction&brand=1;
$url2 = urlencode('https://my.spicecsm.com/srv_calls/print.php?caseid=125&comp=MassAction&brand=1');
$source = file_get_contents($url2);
echo $source;
?> 